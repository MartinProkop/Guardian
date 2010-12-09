<?php

//uzivatele
function vypis_uzivatelu() {
    echo "<table class=\"table\">
	<tr>
	<td><span class=\"subheader\"><a href=\"?id=sprava_uzivatelu&order_by=stav\">STAV</a></span></td>
	<td><span class=\"subheader\">AKCE</span></td>
	<td><span class=\"subheader\"><a href=\"?id=sprava_uzivatelu&order_by=jmeno\">JMÉNO</a></span></td>
	<td><span class=\"subheader\">EMAIL</span></td>
        <td><span class=\"subheader\">TELEFON</span></td>
        <td><span class=\"subheader\"><a href=\"?id=sprava_uzivatelu&order_by=prava\">PRÁVA</a></span></td>
	<td><span class=\"subheader\"><a href=\"?id=sprava_uzivatelu&order_by=posledni_login_novy\">POSLEDNÍ LOGIN</a></span></td>
	<td><span class=\"subheader\">ONLINE<br />poslední klik</span></td>
	</tr>";

    if (!$_GET['order_by'])
        $_GET['order_by'] = "id";
    if ($_GET['order_by'] == "posledni_login_novy")
        $asc = "DESC";
    else
        $asc = "ASC";

    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [prava] != %s', "firma", 'ORDER BY %by', $_GET['order_by'], $asc);
    while ($row = $result->fetch()) {
        if ($row['stav'] == "aktivni") {
            $stav = "class=\"green\"";
            $stav2 = "<acronym title=\"uživatelský účet je plně v provozu\">aktivní</acronym>";
        } elseif ($row['stav'] == "ceka_na_autorizaci") {
            $stav = "class=\"orange\"";
            $stav2 = "<acronym title=\"je třeba uživateli předat kontrolník kód\">čeká na kód</acronym><br />(kód: \"<strong>" . $row['sul'] . "</strong>\")";
        } elseif ($row['stav'] == "blokovan") {
            $stav = "class=\"red\"";
            $stav2 = "<acronym title=\"uživatelský účet je zablokovát, lze jej odblokovat\">blokován</acronym>";
        }

        if ($row['posledni_klik'] > (Time() - 900)) {
            $online = "ano <br /> (" . Date("H:i:s", $row['posledni_klik']) . ")";
            $online_barva = "class=\"green\"";
        } else {
            $online = "ne";
            $online_barva = "class=\"red\"";
        }

        echo "<tr>
	<td " . $stav . ">" . $stav2 . "</td>";
        echo "<td>
			<a href=\"./administrace.php?id=logy_uzivatelu&id_uzivatele=" . $row['id'] . "\">log</a> |
			<a href=\"./administrace.php?id=ukoly_uzivatelu&id_uzivatele=" . $row['id'] . "\">úkoly</a>
			<br /><a href=\"./administrace.php?id=sprava_uzivatelu&upravit_uzivatele=" . $row['id'] . "\">upravit</a> |
			<a href=\"./administrace.php?id=sprava_uzivatelu&smazat_uzivatele=" . $row['id'] . "\" onclick=\"if(confirm('Skutečně smazat uživatele?')) location.href='./administrace.php?id=sprava_uzivatelu&smazat_uzivatele=" . $row['id'] . "'; return(false);\">smazat</a>
			<br /><a href=\"./administrace.php?id=sprava_uzivatelu&blokovat_uzivatele=" . $row['id'] . "\" onclick=\"if(confirm('Skutečně za/od blokovat uživatele?')) location.href='./administrace.php?id=sprava_uzivatelu&blokovat_uzivatele=" . $row['id'] . "'; return(false);\">za/od blokovat</a></td>
			<td>" . $row['jmeno'] . "</td>
			<td>" . $row['mail'] . "</td>
                        <td>" . $row['telefon'] . "</td>
                        <td>" . $row['prava'] . "</td>
			<td>" . Date("H:i:s d.m.Y", $row['posledni_login_novy']) . "</td>
			<td " . $online_barva . ">" . $online . "</td>";
        echo "</tr>";
    }
    echo "<form method=\"POST\" action=\"./administrace.php?id=sprava_uzivatelu\" onSubmit=\"return check_novy_uzivatel(this);\">
	<tr>
	<td class=\"green\"><acronym title=\"přidat nového uživatele\">nový</acronym></td>
	<td><input class=\"tlacitko\" type=\"submit\" value=\"vytvořit uživatele\"></td>
	<td><input name=\"novy_uzivatel_jmeno\" class=\"formular\" value=\"jméno uživatele\" size=\"15\"></td>
        <td><input name=\"novy_uzivatel_mail\" class=\"formular\" value=\"e-mail uživatele\" size=\"15\"></td>
        <td><input name=\"novy_uzivatel_telefon\" class=\"formular\" value=\"telefon uživatele\" size=\"15\"></td>
	<td><select name=\"novy_uzivatel_prava\" class=\"formular\">
		<option value=\"admin\">administrátor</option>
		<option value=\"koordinator\">koordinátor</option>
		<option value=\"technik\">technik</option>
	</select></td>
	</tr>
	</form>
	</table>";
}

function vyhledat_uzivatele_firmy() {  //hledani firem
    echo "<a name=\"vyhledat_firemniho uzivatele\"></a><form method=\"POST\" action=\"./administrace.php?id=sprava_uzivatelu&vyhledat=" . $_GET['vyhledat'] . "#vyhledat_firemniho uzivatele\" name=\"najdi uzivatele firmy\" \">
	<fieldset>
	<legend>Klient - uživatel</legend>
	<label for=\"retezec\">Název klienta</label><br />
	<input name=\"retezec\" id=\"retezec\" class=\"formular\" value=\"" . $_POST['retezec'] . "\"><br />
	<input type=\"hidden\" name=\"vstup\" value=\"true\">
	<input class=\"tlacitko\" type=\"submit\" value=\"hledat\"> <a href=\"./administrace.php?id=sprava_uzivatelu&vyhledat=vse#vyhledat_firemniho uzivatele\">vypsat všechny</a>
	</fieldset>
	</form><br />";

    if ($_POST['vstup'] || $_GET['vyhledat']) {
        if ($_POST['retezec'] == "")
            $_POST['retezec'] = $_GET['vyhledat'];
        if ($_GET['vyhledat'] == "vse") {
            $_POST['retezec'] = "";
        }


        echo "<table class=\"table\">
		<tr>
                <td><span class=\"subheader\"><a href=\"?id=sprava_uzivatelu&order_by=stav&vyhledat=" . $_GET['vyhledat'] . "#vyhledat_firemniho uzivatele\">STAV</a></span></td>
                <td><span class=\"subheader\">AKCE</span></td>
                <td><span class=\"subheader\"><a href=\"?id=sprava_uzivatelu&order_by=jmeno&vyhledat=" . $_GET['vyhledat'] . "#vyhledat_firemniho uzivatele\">JMÉNO</a></span></td>
                <td><span class=\"subheader\">EMAIL</span></td>
                <td><span class=\"subheader\">TELEFON</span></td>
                <td><span class=\"subheader\"><a href=\"?id=sprava_uzivatelu&order_by=prava&vyhledat=" . $_GET['vyhledat'] . "#vyhledat_firemniho uzivatele\">PRÁVA</a></span></td>
                <td><span class=\"subheader\"><a href=\"?id=sprava_uzivatelu&order_by=posledni_login_novy&vyhledat=" . $_GET['vyhledat'] . "#vyhledat_firemniho uzivatele\">POSLEDNÍ LOGIN</a></span></td>
                <td><span class=\"subheader\">ONLINE<br />poslední klik</span></td>    
		</tr>";

        $pocet = 0;

        $result = dibi::query('SELECT * FROM [prevent_firmy] WHERE [nazev] LIKE %s', "%" . $_POST['retezec'] . "%", 'ORDER BY %by', "nazev", 'ASC');
        while ($row = $result->fetch()) {

            $result2 = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [ad] = %i', $row['id'], 'ORDER BY %by', $_GET['order_by'], 'ASC');
            $pocet += $result2->count();
            while ($row2 = $result2->fetch()) {
                if ($row2['stav'] == "aktivni") {
                    $stav = "class=\"green\"";
                    $stav2 = "<acronym title=\"uživatelský účet je plně v provozu\">aktivní</acronym>";
                } elseif ($row2['stav'] == "ceka_na_autorizaci") {
                    $stav = "class=\"orange\"";
                    $stav2 = "<acronym title=\"je třeba uživateli předat kontrolník kód\">čeká na kód</acronym><br />(kód: \"<strong>" . $row2['sul'] . "</strong>\")";
                } elseif ($row2['stav'] == "blokovan") {
                    $stav = "class=\"red\"";
                    $stav2 = "<acronym title=\"uživatelský účet je zablokovát, lze jej odblokovat\">blokován</acronym>";
                }

                if ($row2['posledni_klik'] > (Time() - 900)) {
                    $online = Date("H:i:s", $row['posledni_klik']);
                    $online_barva = "class=\"green\"";
                } else {
                    $online = "ne";
                    $online_barva = "class=\"red\"";
                }

                if ($row2['prava'] == "firma")
                    $text_prava = "klient";
                echo "<tr><td " . $stav . ">" . $stav2 . "</td>";
                echo "<td>
				<a href=\"./administrace.php?id=logy_uzivatelu&id_uzivatele=" . $row2['id'] . "\">log</a> |
				<a href=\"./administrace.php?id=sprava_uzivatelu&blokovat_uzivatele=" . $row2['id'] . "\" onclick=\"if(confirm('Skutečně za/od blokovat uživatele?')) location.href='./administrace.php?id=sprava_uzivatelu&blokovat_uzivatele=" . $row2['id'] . "'; return(false);\">za/od blokovat</a>
				<br /><a href=\"./administrace.php?id=sprava_uzivatelu&smazat_uzivatele=" . $row['id'] . "\" onclick=\"if(confirm('Skutečně smazat uživatele?')) location.href='./administrace.php?id=sprava_uzivatelu&smazat_uzivatele=" . $row['id'] . "'; return(false);\">smazat</a></td>
				<td>" . $row2['jmeno'] . "</td>
                                <td>" . $row2['mail'] . "</td>
                                <td>" . $row2['telefon'] . "</td>
				<td>" . $text_prava . ":<br /><strong>" . $row['nazev'] . "</strong></td>
				<td>" . Date("H:i:s d.m.Y", $row2['posledni_login_stary']) . "</td>
				<td " . $online_barva . ">" . $online . "</td>";
                echo "</tr>";
            }
        }
        echo "</table>
		<p>Výsledky hledání uživatelů klientů pro řetězec: \"" . $_POST['retezec'] . "\". Nalezeno " . $pocet . " záznamů.</p>";
    }
}

function novy_uzivatel() {
    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [jmeno] = %s', $_POST['novy_uzivatel_jmeno']);
    if ($row = $result->fetch()) {
        echo "<h4>Uživatel \"" . $_POST['novy_uzivatel_jmeno'] . "\" nebyl vytvořen - jmeno již existuje!</h4>";
        return 0;
    }
    $nahoda = Random_Password(10);

    $arr = array('jmeno' => $_POST['novy_uzivatel_jmeno'], 'mail' => $_POST['novy_uzivatel_mail'], 'telefon' => $_POST['novy_uzivatel_telefon'], 'prava' => $_POST['novy_uzivatel_prava'], 'sul' => $nahoda, 'stav' => 'ceka_na_autorizaci');
    dibi::query('INSERT INTO [prevent_uzivatele]', $arr);

    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE jmeno = %s', $_POST['novy_uzivatel_jmeno']);
    $row = $result->fetch();

    init_uzivatele($row['id']);

    $arr_log = array('text' => 'Vytvořen uživatelský účet', 'link' => '', 'ad' => $row['id']);
    vytvor_log($arr_log);

    $zprava = "Uživatel: " . $_POST['novy_uzivatel_jmeno'] . "<br />kód: " . $nahoda;
    $arr_ukol = array('deadline' => '', 'text' => 'Předat uživateli kontrolní kód', 'popis' => $zprava, 'link' => '', 'ad' => $_SESSION['id_usr']);
    novy_ukol($arr_ukol);
}

function smazat_uzivatele() {
    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $_GET['smazat_uzivatele']);
    $row = $result->fetch();

    $text = "Uživatel " . $row['jmeno'] . " smazán uživatelem " . $_SESSION['jmeno_usr'];

    $arr_log = array('text' => $text, 'link' => '', 'ad' => '');
    dibi::query('DELETE FROM [prevent_uzivatele] WHERE [id] = %i', $_GET['smazat_uzivatele']);
    vytvor_log($arr_log);

    if ($row['prava'] == "firma") {
        $arr_log_firma = array('text' => $text, 'link' => '', 'ad' => $row['ad']);
        vytvor_log_firmy($arr_log_firma);
    }

    dibi::query('DELETE FROM [prevent_uzivatele] WHERE [id] = %i', $_GET['smazat_uzivatele']);
    dibi::query('DELETE FROM [prevent_watchdog] WHERE [id_uzivatel] = %i', $_GET['smazat_uzivatele']);
    dibi::query('DELETE FROM [prevent_nastenka_shlednuto] WHERE [id_uzivatel] = %i', $_GET['smazat_uzivatele']);
}

function blokovat_uzivatele() {
    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $_GET['blokovat_uzivatele']);
    $row = $result->fetch();

    if ($row['stav'] == "aktivni") {
        dibi::query('UPDATE [prevent_uzivatele] SET [stav] = %s', "blokovan", 'WHERE [id] = %i', $_GET['blokovat_uzivatele']);
        $zprava = "Uživatel zablokován";
    } elseif ($row['stav'] == "blokovan") {
        dibi::query('UPDATE [prevent_uzivatele] SET [stav] = %s', "aktivni", 'WHERE [id] = %i', $_GET['blokovat_uzivatele']);
        $zprava = "Uživatel odblokován";
    }
    $arr_login = array('text' => $zprava, 'link' => '', 'ad' => $_GET['blokovat_uzivatele']);
    vytvor_log($arr_login);
}

function upravit_uzivatele() {
    if (IsSet($_POST['prava']) == "upravit") {
        dibi::query('UPDATE [prevent_uzivatele] SET [prava] = %s', $_POST['prava'], 'WHERE [id] = %i', $_GET['upravit_uzivatele']);

        $arr_log = array('text' => 'Upravena práva uživatele na ' . $_POST['prava'], 'link' => '', 'ad' => $_GET['upravit_uzivatele']);
        vytvor_log($arr_log);
    } else {
        $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $_GET['upravit_uzivatele']);
        $row = $result->fetch();

        if ($row['prava'] == "admin")
            $ukazadmin = "selected = \"selected\"";
        elseif ($row['prava'] == "koordinator")
            $ukazkoordinator = "selected = \"selected\"";
        elseif ($row['prava'] == "technik")
            $ukaztechnik = "selected = \"selected\"";

        echo "<h4>Upravit uživatele</h4>
		<form method=\"POST\" action=\"./administrace.php?id=sprava_uzivatelu&upravit_uzivatele=" . $_GET['upravit_uzivatele'] . "\" >
		<fieldset>
		<legend>" . $row['jmeno'] . "</legend>
		<label for=\"prava\">práva</label><br />
		<select id=\"prava\" name=\"prava\" class=\"formular\">
		<option value=\"admin\" " . $ukazadmin . ">administrátor</option>
		<option value=\"koordinator\" " . $ukazkoordinator . ">koordinátor</option>
		<option value=\"technik\" " . $ukaztechnik . ">technik</option>
		</select><br />
		<input class=\"tlacitko\" type=\"submit\" value=\"upravit\"> <a href=\"?id=sprava_uzivatelu\">neupravit</a>
		</fieldset>
		</form><br />";
    }
}

//ukoly
function ukoly_uzivatele() {
    echo "<form method=\"POST\" action=\"?id=ukoly_uzivatelu\">
	<fieldset>
	<legend>Výběr uživatele</legend>";

    if ($_SESSION['prava_usr'] == "admin")
        EchoUzivateleSelect("vybrat uživatele", "id_uzivatele", 1, 1, 1, 0);
    elseif ($_SESSION['prava_usr'] == "koordinator")
        EchoUzivateleSelect("vybrat uživatele", "id_uzivatele", 0, 1, 1, 0);

    echo "<input class=\"tlacitko\" type=\"submit\" value=\"vypsat úkoly\">
	</fieldset>
	</form>";

    if ($_POST['id_uzivatele']) {
        $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $_POST['id_uzivatele']);
        $row = $result->fetch();
        $result = dibi::query('SELECT * FROM [prevent_ukoly] WHERE [ad] = %i', $_POST['id_uzivatele']);
        $pocet_uloh = $result->count();
        echo "<h3>Úlohy uživatele <em>" . $row['jmeno'] . "</em> (" . $pocet_uloh . " záznamů)</h3>";
        $pocet_uloh_ke_smazani = 0;
        if ($_GET['order_by'] == null)
            $_GET['order_by'] = "id";
        echo "<table class=\"table\">
		<tr>
		<td><span class=\"subheader\"><a href=\"?id=ukoly_uzivatelu&id_uzivatele=" . $_POST['id_uzivatele'] . "&order_by=stav\">STAV</a></span></td>
		<td><span class=\"subheader\">ÚKOL</span></td>
		<td><span class=\"subheader\">POPIS</span></td>
		<td><span class=\"subheader\">ODKAZ</span></td>
                <td><span class=\"subheader\"><a href=\"?id=ukoly_uzivatelu&id_uzivatele=" . $_POST['id_uzivatele'] . "&order_by=deadline\">DEADLINE</a></span></td>
                <td><span class=\"subheader\"><a href=\"?id=ukoly_uzivatelu&id_uzivatele=" . $_POST['id_uzivatele'] . "&order_by=date\">ZADÁNO</a></span></td>
		<td><span class=\"subheader\"><a href=\"?id=ukoly_uzivatelu&id_uzivatele=" . $_POST['id_uzivatele'] . "&order_by=zadal_jmeno\">ZADAL</a></span></td>
		</tr>";

        $result = dibi::query('SELECT * FROM [prevent_ukoly] WHERE [ad] = %i', $_POST['id_uzivatele'], 'ORDER BY', $_GET['order_by'], 'ASC');
        while ($row = $result->fetch()) {
            if ($row['deadline'] == "0")
                $deadline_vypis = "nestanoven";
            else
                $deadline_vypis = Date("H:i d.m.Y", $row['deadline']);

            if ($row['stav'] == "nova") {
                $class = "orange";
                $title = "Nový úkol";
                $text = "nový";
            } elseif ($row['stav'] == "ceka_na_splneni" && $row['deadline'] != 0 && $row['deadline'] < Time()) {
                $class = "red";
                $title = "Proběhl již deadline úkolu";
                $text = "akutní";
            } elseif ($row['stav'] == "ceka_na_splneni" && $row['deadline'] != 0 && $row['deadline'] > Time()) {
                if ($row['deadline'] - (60 * 60 * 24 * 2) < Time()) {
                    $class = "red";
                    $title = "Ještě neproběhl dedline úkolu, ale zbývá méně než 2 dny!";
                    $text = "akutní - méně než 2 dny!";
                } else {
                    $class = "orange";
                    $title = "Ještě neproběhl deadline úkolu";
                    $text = "čeká na splnění";
                }
            } elseif ($row['stav'] == "ceka_na_splneni" && $row['deadline'] == 0) {
                $class = "orange";
                $title = "Úkol nemá deadline, ale není splňen";
                $text = "čeká na splnění";
            } elseif ($row['stav'] == "splnen") {
                $class = "green";
                $title = "Úkol jste již splnil";
                $text = "splněn (" . Date("H:i:s d.m.Y", $row['date_splnen']) . ")";
            } elseif ($row['stav'] == "nesplnen") {
                $class = "red";
                $title = "Odmítl jste úkol splnit!";
                $text = "nesplněn (" . Date("H:i:s d.m.Y", $row['date_splnen']) . ")";
            } elseif ($row['stav'] == "smazan_splnen") {
                $pocet_uloh_ke_smazani++;
                $class = "green";
                $title = "Úkol jste již splnil";
                $text = "splněn";
            } elseif ($row['stav'] == "smazan_nesplnen") {
                $pocet_uloh_ke_smazani++;
                $class = "red";
                $title = "Odmítl jste úkol splnit!";
                $text = "nesplněn";
            }

            echo "<tr>
			<td class=\"" . $class . "\"><acronym title=\"" . $title . "\">" . $text . "</acronym></td>
			<td>" . $row['text'] . "</td>
		<td><a href=\"#tooltip_" . $row['id'] . "\" name=\"tooltip_" . $row['id'] . "\"  id=\"tooltip_" . $row['id'] . "\"><img src=\"./design/detaily.png\" alt=\"podrobně\" title=\"podrobně\"/></a></td>
                    <script type=\"text/javascript\">
                    $(document).ready(function()
                    {
                       $('#tooltip_$row[id]').qtip(
                       {
                          content: {
                            text: '".ereg_replace("[\r|\n]+","<br>",$row[popis])."',
                            title: {
                                text: 'popis úkolu',
                                button: 'Close'
                            }
                          },
                          hide: {
                            when: {
                                event: 'unfocus'
                            }
                          },
                          show: {
                            solo: true,
                            when: {
                                event: 'click'
                            }
                          },
                          style: {
                              width: {
                                 min: 250,
                                 max: 400
                              },
                              padding: 5,
                              background: '#c0d3e2',
                              textAlign: 'left',
                              border: {
                                width: 2,
                                color: '#c0d3e2'
                              },
                              title: {
                                background: '#f9f9ff',
                              }
                          },
                          adjust: {
                                scroll: true,
                                resize: true
                          }
                       });
                    });
                    </script>
                    ";
            if ($row['link'] != "") {
                echo "<td><a href=\"" . $row['link'] . "\"> <img src=\"./design/link.png\" alt=\"přejít na úkol\" title=\"přejít na úkol\"/></a></td>";
            } else {
                echo "<td>není</td>";
            }
            echo "<td>" . $deadline_vypis . "</td>
                <td>" . Date("H:i d.m.Y", $row['date']) . "</td>
                <td>" . $row['zadal_jmeno'] . "</td>
			</tr>";
        }

        echo "</table>
		<h4>Smazat nepotřebné záznamy (" . $pocet_uloh_ke_smazani . " úloh)</h4><p><a href=\"?id=ukoly_uzivatelu&smazat_ukoly=" . $_POST['id_uzivatele'] . "\" onclick=\"if(confirm('Skutečně chcete smazat nepotřebné úkoly?')) location.href='?id=ukoly_uzivatelu&smazat_ukoly=" . $_POST['id_uzivatele'] . "'; return(false);\">smaže z databáze úlohy, které uživatel již smazal, ze svého přehledu úkolů</a></p>";
    }
}

function smazat_ukoly() {
    dibi::query('DELETE FROM [prevent_ukoly] WHERE [ad] = %i', $_GET['smazat_ukoly'], ' AND ([stav] = %s', "smazan_splnen", ' OR [stav] = %s)', "smazan_nesplnen");
    $arr_log = array('text' => 'Vymazány nepotrebne ukoly uzivatele ', 'link' => '', 'ad' => $_GET['smazat_ukoly']);
    vytvor_log($arr_log);

    $_POST['id_uzivatele'] = $_GET['smazat_ukoly'];
}

//logy
function logy_uzivatele() {
    echo "<form method=\"POST\" action=\"?id=logy_uzivatelu\">
	<fieldset>
	<legend>Výběr uživatele</legend>";

    if ($_SESSION['prava_usr'] == "admin") {
        EchoUzivateleSelect("", "id_uzivatele", 1, 1, 1, 1);
        echo "<p><a href=\"?id=logy_uzivatelu&id_uzivatele=system\">Logy systému</a><br /></p>";
    } elseif ($_SESSION['prava_usr'] == "koordinator")
        EchoUzivateleSelect("", "id_uzivatele", 0, 1, 1, 1);

    echo "<input class=\"tlacitko\" type=\"submit\" value=\"vypsat logy\">
	</fieldset>
	</form>";

    if ($_POST['id_uzivatele']) {
        if ($_POST['id_uzivatele'] == "system")
            $_POST['id_uzivatele'] = 0;
        $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $_POST['id_uzivatele']);
        $row = $result->fetch();
        $result = dibi::query('SELECT date,autor,text FROM [prevent_log] WHERE [ad] = %i', $_POST['id_uzivatele'], 'OR [autor] = %s', $row['jmeno'], ' UNION SELECT date,autor,text FROM [prevent_audit_log] WHERE [autor] = %s', $row['jmeno'], 'ORDER BY [date] DESC');
        $pocet_logu = $result->count();

        echo "<h3>Log uživatele <em>" . $row['jmeno'] . "</em> (" . $pocet_logu . " záznamů)</h3>
            <textarea rows=\"20\" cols=\" 80\" class=\"formular\">";

        while ($row = $result->fetch())
            echo Date("H:i d.m.Y", $row['date']) . " (" . $row['autor'] . "): " . $row['text'] . "\n";
        echo "</textarea>";
        $result = dibi::query('SELECT * FROM [prevent_log] WHERE [ad] = %i', $_POST['id_uzivatele'], 'AND date < %i', Time() - 259200);
        $pocet_logu_ke_smazani = $result->count();

        if ($_POST['id_uzivatele'] == 0)
            $_POST['id_uzivatele'] = "system";

            if($_SESSION['prava_usr'] == "admin")
        echo "<h4>Smazat záznamy starší 3 dny (" . $pocet_logu_ke_smazani . " záznamů) - pouze logy jemu vlastní (ne logy navázané na firmu)</h4><p><a href=\"?id=logy_uzivatelu&smazat_logy=" . $_POST['id_uzivatele'] . "\" onclick=\"if(confirm('Skutečně chcete smazat logy uživatele?')) location.href='?id=logy_uzivatelu&smazat_logy=" . $_POST['id_uzivatele'] . "'; return(false);\">smaže logy uživatele starší 3 dny</a></p>";
    }
}

function smazat_logy() {
    if ($_GET['smazat_logy'] == "system")
        $_GET['smazat_logy'] = 0;
    dibi::query('DELETE FROM [prevent_log] WHERE [ad] = %i', $_GET['smazat_logy'], 'AND date < %i', Time() - 259200);

    $arr_log = array('text' => 'Vymazány logy starší 3 dny ', 'link' => '', 'ad' => $_GET['smazat_logy']);
    vytvor_log($arr_log);

    if ($_GET['smazat_logy'] == 0)
        $_GET['smazat_logy'] = "system";
    $_POST['id_uzivatele'] = $_GET['smazat_logy'];
}

//zalohy
function vypis_zaloh() {
    echo "<h4>Výpis záloh</h4>
	<table class=\"table\">
	<tr>
	<td><span class=\"subheader\">AKCE</span></td>
	<td><span class=\"subheader\">DATUM</span></td>
	<td><span class=\"subheader\">POPIS</span></td>
	<td><span class=\"subheader\">TABULKY</span></td>
	<td><span class=\"subheader\">VELIKOST</span></td>
	<td><span class=\"subheader\">VYTVOŘIL</span></td>
	</tr>";

    $result = dibi::query('SELECT * FROM [prevent_zalohy] ORDER BY %by', "id", 'DESC');
    while ($row = $result->fetch()) {
        echo "<tr>
		<td><a href=\"./zalohy/" . $row['jmeno_souboru'] . ".sql\" target=\"_blank\">stáhnout</a><br /><a href=\"./administrace.php?id=zalohy&smazat_zalohu=" . $row['id'] . "\" onclick=\"if(confirm('Skutečně chcete zálohu smazat?')) location.href='./administrace.php?id=zalohy&smazat_zalohu=" . $row['id'] . "'; return(false);\">smazat</a></td>
		<td>" . Date("H:i:s d.m.Y", $row['date']) . "</td>
		<td>" . $row['popis'] . "</td>
		<td>" . $row['tabulky'] . "</td>
		<td>" . format_size($row['velikost']) . "</td>
		<td>" . $row['autor'] . "</td>
		</tr>";
    }
    echo "</table>";
}

function vytvorit_zalohu() {
    $tabulky = $_POST['tabulky'];

    if (count($tabulky) == 0 && $_POST['popis']) {
        echo "<h4>Nevybral jsi žádnou tabulku k záloze</h4>";
        $_POST['popis'] == null;
    }

    if ($_POST['popis']) {
        $arr_log = array('text' => 'Vytvořil zálohu systému', 'link' => '', 'ad' => $_SESSION['id_usr']);
        vytvor_log($arr_log);
        $arr_log = array('text' => 'Vytvořil zálohu systému', 'link' => '', 'ad' => 0);
        vytvor_log($arr_log);

        $jmeno_souboru = Date("H_i_s_d_m_Y", Time());
        $soubor = fopen("./zalohy/" . $jmeno_souboru . ".sql", "w");

        fwrite($soubor, "-- *** Záloha Systému Guardian ***\n-- Vytvořeno: " . Date("H:i:s d.m.Y", Time()) . "\n-- Vytvořil: " . $_SESSION['jmeno_usr'] . "\n\n-- Záloha obsahuje kompletní inserty\n-- Obnovu může provést pouze hlavní admin\n\n-- Vybrané tabulky: ");

        $tabulky_seznam = "";
        $celkem_radku = 0;
        $cas_start = Time();

        for ($x = 0; $x < count($tabulky); $x++)
            $tabulky_seznam .= $tabulky[$x] . ", ";
        fwrite($soubor, $tabulky_seznam);

        for ($x = 0; $x < count($tabulky); $x++) {
            $table = $tabulky[$x];
            $result = dibi::query('SHOW COLUMNS FROM %n', $table);
            $count_typ = $result->count();

            $result = dibi::query('SELECT * FROM %n', $table);
            $count_data = $result->count();

            $count_data_ochrana = 0;
            $celkem_radku += $count_data;
            fwrite($soubor, "\n\n-- Tabulka: '$table'\n-- Počet řádků tabulky: " . $count_data . "\n-- Začátek dat tabulky\n");

            if ($count_data == 0) {
                fwrite($soubor, "-- Tabulka neobsahuje data\n");
            } else {
                fwrite($soubor, "INSERT INTO `$table` VALUES \n");

                $result = dibi::query('SELECT * FROM %n', $table);
                while ($row = $result->fetch()) {
                    $result_typ = dibi::query('SHOW COLUMNS FROM %n', $table);
                    fwrite($soubor, "(");
                    for ($i = 0; $i < $count_typ; $i++) {
                        $columns = $result_typ->fetch();
                        fwrite($soubor, "\"" . $row[$columns['Field']] . "\"");
                        if ($i != ($count_typ - 1))
                            fwrite($soubor, ", ");
                    }
                    $count_data_ochrana++;

                    if ($count_data_ochrana == $count_data)
                        fwrite($soubor, ");\n");
                    else
                        fwrite($soubor, "),\n");
                }
            }

            fwrite($soubor, "-- Konec dat tabulky\n");
        }

        $cas_provadeni = Time() - $cas_start;
        fwrite($soubor, "\n\n-- *** Konec zálohy Systému Guardian ***\n-- Doba vytváření zálohy: " . $cas_provadeni . " sec \n-- Celkem vyexportováno řádků: " . $celkem_radku . "\n");
        fclose($soubor);

        $velikost = filesize("./zalohy/" . $jmeno_souboru . ".sql");
        $arr = array('date' => Time(), 'popis' => $_POST['popis'], 'velikost' => $velikost, 'jmeno_souboru' => $jmeno_souboru, 'autor' => $_SESSION['jmeno_usr'], 'tabulky' => $tabulky_seznam);
        dibi::query('INSERT INTO [prevent_zalohy]', $arr);
    }

    echo "<form method=\"POST\" action=\"?id=zalohy\" name=\"verze\" onSubmit=\"return check_nova_zaloha(this);\">
	<fieldset>
	<legend>nová záloha</legend>
	<label for=\"popis\">popis zálohy</label><br />
	<textarea name=\"popis\" id=\"popis\" class=\"formular\" rows=\"8\" cols=\"40\">popis zálohy</textarea><br />
	<label for=\"tabulky\">tabulky k záloze</label><br />
	<select name=\"tabulky[]\" id=\"tabulky\" class=\"formular\" size=\"10\" multiple>
            <optgroup label=\"audit\">
		<option value=\"prevent_audit\" selected>prevent_audit</option>
                <option value=\"prevent_audit_checklist\" selected>prevent_audit_checklist</option>
                <option value=\"prevent_audit_checklist_kategorie\" selected>prevent_audit_checklist_kategorie</option>
                <option value=\"prevent_audit_checklist_kategorie_schema\" selected>prevent_audit_checklist_kategorie_schema</option>
                <option value=\"prevent_audit_checklist_schema\" selected>prevent_audit_checklist_schema</option>
                <option value=\"prevent_audit_dokument\" selected>prevent_audit_dokument</option>
                <option value=\"prevent_audit_exporty\" selected>prevent_audit_exporty</option>
                <option value=\"prevent_audit_fotografie\" selected>prevent_audit_fotografie</option>
                <option value=\"prevent_audit_log\" selected>prevent_audit_log</option>
                <option value=\"prevent_audit_neshody\" selected>prevent_audit_neshody</option>
                <option value=\"prevent_audit_planovac\" selected>prevent_audit_planovac</option>
                <option value=\"prevent_audit_pracoviste\" selected>prevent_audit_pracoviste</option>
                <option value=\"prevent_audit_pripominky\" selected>prevent_audit_pripominky</option>
                <option value=\"prevent_audit_protokoly\" selected>prevent_audit_protokoly</option>
                <option value=\"prevent_audit_soubory\" selected>prevent_audit_soubory</option>
                <option value=\"prevent_audit_synchronizace\" selected>prevent_audit_synchronizace</option>
                <option value=\"prevent_audit_zip\" selected>prevent_audit_zip</option>
            </optgroup>
            <optgroup label=\"cron\">
		<option value=\"prevent_cron\" selected>prevent_cron</option>
		<option value=\"prevent_cron_log\" selected>prevent_cron_log</option>
            </optgroup>
            <optgroup label=\"firmy\">
		<option value=\"prevent_firmy\" selected>prevent_firmy</option>
		<option value=\"prevent_firmy_budova\" selected>prevent_firmy_budova</option>
		<option value=\"prevent_firmy_budova_relace\" selected>prevent_firmy_budova_relace</option>
		<option value=\"prevent_firmy_log\" selected>prevent_firmy_log</option>
		<option value=\"prevent_firmy_osoba\" selected>prevent_firmy_osoba</option>
		<option value=\"prevent_firmy_osoba_preklad\" selected>prevent_firmy_osoba_preklad</option>
		<option value=\"prevent_firmy_osoba_relace\" selected>prevent_firmy_osoba_relace</option>
		<option value=\"prevent_firmy_pracoviste\" selected>prevent_firmy_pracoviste</option>
		<option value=\"prevent_firmy_pracoviste_relace\" selected>prevent_firmy_pracoviste_relace</option>
		<option value=\"prevent_firmy_provozovny\" selected>prevent_firmy_provozovny</option>
		<option value=\"prevent_firmy_relace_budova_pracoviste\" selected>prevent_firmy_relace_budova_pracoviste</option>
		<option value=\"prevent_firmy_technik\" selected>prevent_firmy_technik</option>
		<option value=\"prevent_firmy_uzivatele_prava\" selected>prevent_firmy_uzivatele_prava</option>
            </optgroup>
            <optgroup label=\"systém\">
		<option value=\"prevent_log\" selected>prevent_log</option>
		<option value=\"prevent_nastenka\" selected>prevent_nastenka</option>
		<option value=\"prevent_nastenka_shlednuto\" selected>prevent_nastenka_shlednuto</option>
		<option value=\"prevent_novinky\" selected>prevent_novinky</option>
		<option value=\"prevent_posta\" selected>prevent_posta</option>
		<option value=\"prevent_quicklink\" selected>prevent_quicklink</option>
		<option value=\"prevent_system\" selected>prevent_system</option>
		<option value=\"prevent_ukoly\" selected>prevent_ukoly</option>
		<option value=\"prevent_uzivatele\" selected>prevent_uzivatele</option>
		<option value=\"prevent_watchdog\" selected>prevent_watchdog</option>
		<option value=\"prevent_zalohy\" selected>prevent_zalohy</option>
		<option value=\"prevent_zapisnik\" selected>prevent_zapisnik</option>
            </optgroup>
	</select><br />
	<input class=\"tlacitko\" type=\"submit\" value=\"vytvořit\"> <a href=\"#\" onClick=\"return hide_show('plot_short','plot_full')\">nevytvářet</a>
	</fieldset>
	</form>";
}

function smazat_zalohu() {
    $result = dibi::query('SELECT * FROM [prevent_zalohy] WHERE id = %i', $_GET['smazat_zalohu']);
    $row = $result->fetch();

    unlink("./zalohy/" . $row['jmeno_souboru'] . ".sql");
    dibi::query('DELETE FROM [prevent_zalohy] WHERE [id] = %i', $_GET['smazat_zalohu']);

    $arr_log = array('text' => 'Vymazal zálohu s datem: ' . Date("H:i:s d.m.Y", $row['date']), 'link' => '', 'ad' => $_SESSION['id_usr']);
    vytvor_log($arr_log);
    $arr_log = array('text' => 'Vymazána záloha s datem: ' . Date("H:i:s d.m.Y", $row['date']), 'link' => '', 'ad' => 'systém');
    vytvor_log($arr_log);
}

//udrzba
function vypis_urzba() {
    echo "<table class=\"table\">
	<tr>
	<td><span class=\"subheader\">STAV</span></td>
	<td><span class=\"subheader\">TABULKA</span></td>
	<td><span class=\"subheader\">POČET ŘÁDKŮ</span></td>
	<td><span class=\"subheader\">NEPOTŘEBNÉ</span></td>
	<td><span class=\"subheader\">AKCE</span></td>
	</tr>";

    //prevent_firmy_log
    $result = dibi::query('SELECT * FROM [prevent_firmy_log]');
    $row = $result->count();
    $result = dibi::query('SELECT * FROM [prevent_firmy_log] WHERE date < %i', Time() - 259200);
    $row2 = $result->count();
    if ($row2 > $row - $row2) {
        $signal = " class=\"red\"";
        $text = "přeplněna";
        $acronym = "Je doporučeno tabulku pročistit";
    } else {
        $signal = " class=\"green\"";
        $text = "v pořádku";
        $acronym = "Tabulka neobsahuje mnoho nerelevantních dat";
    }
    echo "<tr>
	<td " . $signal . "><acronym title=\"" . $acronym . "\">" . $text . "</acronym></td>
	<td>prevent_firmy_log</td>
	<td>" . $row . "</td>
	<td>" . $row2 . "</td>
	<td><a href=\"?id=udrzba&cistit=prevent_firmy_log\" onclick=\"if(confirm('Skutečně chcete vyčistit tabulku prevent_firmy_log?')) location.href='?id=udrzba&cistit=prevent_firmy_log'; return(false);\">čistit</a></td>
	</tr>";

    //prevent_audit_log
    $result = dibi::query('SELECT * FROM [prevent_audit_log]');
    $row = $result->count();
    $result = dibi::query('SELECT * FROM [prevent_audit_log] WHERE date < %i', Time() - 604800);
    $row2 = $result->count();
    if ($row2 > $row - $row2) {
        $signal = " class=\"red\"";
        $text = "přeplněna";
        $acronym = "Je doporučeno tabulku pročistit";
    } else {
        $signal = " class=\"green\"";
        $text = "v pořádku";
        $acronym = "Tabulka neobsahuje mnoho nerelevantních dat";
    }
    echo "<tr>
	<td " . $signal . "><acronym title=\"" . $acronym . "\">" . $text . "</acronym></td>
	<td>prevent_audit_log</td>
	<td>" . $row . "</td>
	<td>" . $row2 . "</td>
	<td><a href=\"?id=udrzba&cistit=prevent_audit_log\" onclick=\"if(confirm('Skutečně chcete vyčistit tabulku prevent_audit_log?')) location.href='?id=udrzba&cistit=prevent_audit_log'; return(false);\">čistit</a></td>
	</tr>";

    //prevent_audit_log
    $result = dibi::query('SELECT * FROM [prevent_cron_log]');
    $row = $result->count();
    $result = dibi::query('SELECT * FROM [prevent_cron_log] WHERE date < %i', Time() - 604800);
    $row2 = $result->count();
    if ($row2 > $row - $row2) {
        $signal = " class=\"red\"";
        $text = "přeplněna";
        $acronym = "Je doporučeno tabulku pročistit";
    } else {
        $signal = " class=\"green\"";
        $text = "v pořádku";
        $acronym = "Tabulka neobsahuje mnoho nerelevantních dat";
    }
    echo "<tr>
	<td " . $signal . "><acronym title=\"" . $acronym . "\">" . $text . "</acronym></td>
	<td>prevent_cron_log</td>
	<td>" . $row . "</td>
	<td>" . $row2 . "</td>
	<td><a href=\"?id=udrzba&cistit=prevent_cron_log\" onclick=\"if(confirm('Skutečně chcete vyčistit tabulku prevent_cron_log?')) location.href='?id=udrzba&cistit=prevent_cron_log'; return(false);\">čistit</a></td>
	</tr>";

    //prevent_log
    $result = dibi::query('SELECT * FROM [prevent_log]');
    $row = $result->count();
    $result = dibi::query('SELECT * FROM [prevent_log] WHERE date < %i', Time() - 259200);
    $row2 = $result->count();
    if ($row2 > $row - $row2) {
        $signal = " class=\"red\"";
        $text = "přeplněna";
        $acronym = "Je doporučeno tabulku pročistit";
    } else {
        $signal = " class=\"green\"";
        $text = "v pořádku";
        $acronym = "Tabulka neobsahuje mnoho nerelevantních dat";
    }
    echo "<tr>
	<td " . $signal . "><acronym title=\"" . $acronym . "\">" . $text . "</acronym></td>
	<td>prevent_log</td>
	<td>" . $row . "</td>
	<td>" . $row2 . "</td>
	<td><a href=\"?id=udrzba&cistit=prevent_log\" onclick=\"if(confirm('Skutečně chcete vyčistit tabulku prevent_log?')) location.href='?id=udrzba&cistit=prevent_log'; return(false);\">čistit</a></td>
	</tr>";

    //prevent_posta
    $result = dibi::query('SELECT * FROM [prevent_posta]');
    $row = $result->count();
    $result = dibi::query('SELECT * FROM [prevent_posta] WHERE ([stav_odesilatel] = %s', "smazana", ' AND [stav_prijemce] = %s)', "smazana");
    $row2 = $result->count();
    if ($row2 > $row - $row2) {
        $signal = " class=\"red\"";
        $text = "přeplněna";
        $acronym = "Je doporučeno tabulku pročistit";
    } else {
        $signal = " class=\"green\"";
        $text = "v pořádku";
        $acronym = "Tabulka neobsahuje mnoho nerelevantních dat";
    }
    echo "<tr>
	<td " . $signal . "><acronym title=\"" . $acronym . "\">" . $text . "</acronym></td>
	<td>prevent_posta</td>
	<td>" . $row . "</td>
	<td>" . $row2 . "</td>
	<td><a href=\"?id=udrzba&cistit=prevent_posta\" onclick=\"if(confirm('Skutečně chcete vyčistit tabulku prevent_posta?')) location.href='?id=udrzba&cistit=prevent_posta'; return(false);\">čistit</a></td>
	</tr>";

    //prevent_ukoly
    $result = dibi::query('SELECT * FROM [prevent_ukoly]');
    $row = $result->count();
    $result = dibi::query('SELECT * FROM [prevent_ukoly] WHERE ([stav] = %s', "smazan_splnen", ' OR [stav] = %s)', "smazan_nesplnen");
    $row2 = $result->count();
    if ($row2 > $row - $row2) {
        $signal = " class=\"red\"";
        $text = "přeplněna";
        $acronym = "Je doporučeno tabulku pročistit";
    } else {
        $signal = " class=\"green\"";
        $text = "v pořádku";
        $acronym = "Tabulka neobsahuje mnoho nerelevantních dat";
    }
    echo "<tr>
	<td " . $signal . "><acronym title=\"" . $acronym . "\">" . $text . "</acronym></td>
	<td>prevent_ukoly</td>
	<td>" . $row . "</td>
	<td>" . $row2 . "</td>
	<td><a href=\"?id=udrzba&cistit=prevent_ukoly\" onclick=\"if(confirm('Skutečně chcete vyčistit tabulku prevent_ukoly?')) location.href='?id=udrzba&cistit=prevent_ukoly'; return(false);\">čistit</a></td>
	</tr>";

    //prevent_zalohy
    $result = dibi::query('SELECT * FROM [prevent_zalohy]');
    $row = $result->count();
    $velikost_row = 0;
    while ($pocitam_velikost_row = $result->fetch())
        $velikost_row += filesize("./zalohy/" . $pocitam_velikost_row['jmeno_souboru'] . ".sql");
    $result = dibi::query('SELECT * FROM [prevent_zalohy] WHERE date < %i', Time() - 604800, 'ORDER BY [id] DESC LIMIT %i, %i', 1, 1000);
    $row2 = $result->count();
    $velikost_row2 = 0;
    while ($pocitam_velikost_row2 = $result->fetch())
        $velikost_row2 += filesize("./zalohy/" . $pocitam_velikost_row2['jmeno_souboru'] . ".sql");
    if ($row2 > $row - $row2) {
        $signal = " class=\"red\"";
        $text = "přeplněna";
        $acronym = "Je doporučeno tabulku pročistit";
    } else {
        $signal = " class=\"green\"";
        $text = "v pořádku";
        $acronym = "Tabulka neobsahuje mnoho nerelevantních dat";
    }
    echo "<tr>
	<td " . $signal . "><acronym title=\"" . $acronym . "\">" . $text . "</acronym></td>
	<td>prevent_zalohy</td>
	<td>" . $row . " (" . format_size($velikost_row) . ")</td>
	<td>" . $row2 . " (" . format_size($velikost_row2) . ")</td>
	<td><a href=\"?id=udrzba&cistit=prevent_zalohy\" onclick=\"if(confirm('Skutečně chcete vyčistit tabulku prevent_zalohy?')) location.href='?id=udrzba&cistit=prevent_zalohy'; return(false);\">čistit</a></td>
	</tr>";
    echo "</table>";
}

function proved_udrzbu() {
    if ($_GET['cistit'] == "prevent_firmy_log") {
        dibi::query('DELETE FROM [prevent_firmy_log] WHERE date < %i', Time() - 259200);
        $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [ad] != %s', "0");
        while ($row = $result->fetch()) {
            $arr_log = array('text' => 'Vymazány logy starší 3 dny ', 'link' => '', 'ad' => $row['id']);
            vytvor_log_firmy($arr_log);
        }
        $arr_log = array('text' => 'Vymazány logy firem starší 3 dny ', 'link' => '', 'ad' => 0);
        vytvor_log($arr_log);
    } elseif ($_GET['cistit'] == "prevent_audit_log") {
        dibi::query('DELETE FROM [prevent_audit_log] WHERE date < %i', Time() - 604800);
        $result = dibi::query('SELECT * FROM [prevent_firmy]');
        while ($row = $result->fetch()) {
            $arr_log = array('text' => 'Vymazány logy auditů starší 7 dní', 'link' => '', 'ad' => $row['id']);
            vytvor_log_firmy($arr_log);
        }
        $arr_log = array('text' => 'Vymazány logy firem starší 7 dní', 'link' => '', 'ad' => 0);
        vytvor_log($arr_log);
    } elseif ($_GET['cistit'] == "prevent_cron_log") {
        dibi::query('DELETE FROM [prevent_cron_log] WHERE date < %i', Time() - 604800);

        $arr_log = array('text' => 'Vymazány logy firem starší 7 dní', 'link' => '', 'ad' => 0);
        vytvor_log($arr_log);
    } elseif ($_GET['cistit'] == "prevent_log") {
        dibi::query('DELETE FROM [prevent_log] WHERE date < %i', Time() - 259200);
        $result = dibi::query('SELECT * FROM [prevent_uzivatele]');
        while ($row = $result->fetch()) {
            $arr_log = array('text' => 'Vymazány logy starší 3 dny ', 'link' => '', 'ad' => $row['id']);
            vytvor_log($arr_log);
        }
        $arr_log = array('text' => 'Vymazány logy starší 3 dny ', 'link' => '', 'ad' => 0);
        vytvor_log($arr_log);
    } elseif ($_GET['cistit'] == "prevent_posta") {
        dibi::query('DELETE FROM [prevent_posta] WHERE ([stav_odesilatel] = %s', "smazana", ' AND [stav_prijemce] = %s)', "smazana");
    } elseif ($_GET['cistit'] == "prevent_ukoly") {
        dibi::query('DELETE FROM [prevent_ukoly] WHERE ([stav] = %s', "smazan_splnen", ' OR [stav] = %s)', "smazan_nesplnen");
        $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [prava] != %s', "firma");
        while ($row = $result->fetch()) {
            $arr_log = array('text' => 'Vymazány nepotrebne ukoly uzivatele ', 'link' => '', 'ad' => $row['id']);
            vytvor_log($arr_log);
        }
    } elseif ($_GET['cistit'] == "prevent_zalohy") {
        $result = dibi::query('SELECT * FROM [prevent_zalohy] WHERE date < %i', Time() - 604800, 'ORDER BY [id] DESC LIMIT %i, %i', 1, 1000);
        while ($row = $result->fetch()) {
            unlink("./zalohy/" . $row['jmeno_souboru'] . ".sql");
            dibi::query('DELETE FROM [prevent_zalohy] WHERE [id] = %i', $row['id']);
        }
        $arr_log = array('text' => 'Vymazána nepotřebné zálohy ', 'link' => '', 'ad' => 0);
        vytvor_log($arr_log);
    }
}

//system
function o_systemu() {
    $result = dibi::query('SELECT * FROM [prevent_system] ORDER BY [date] DESC');
    while ($row = $result->fetch())
        echo "<h4>" . $row['verze'] . "</h4><p><em>" . Date("H:i d.m.Y", $row['date']) . ", doba vytváření verze: " . $row['doba'] . " minut</em></p><p>" . NL2BR($row['popis']) . "</p><div class=\"caradown\"></div>";
}

function pridat_verzi_systemu() {
    if ($_POST['verze']) {
        $arr = array('verze' => $_POST['verze'], 'doba' => $_POST['doba'], 'date' => Time(), 'popis' => $_POST['popis']);
        dibi::query('INSERT INTO [prevent_system]', $arr);
    }
    echo "<form method=\"POST\" action=\"?id=system\" name=\"verze\" onSubmit=\"return check(this);\">
	<fieldset>
	<legend>parametry nové verze</legend>
	<input name=\"verze\" class=\"formular\" value=\"číslo verze\"><br />
	<input name=\"doba\" class=\"formular\" value=\"počet minut\"><br />
	<textarea name=\"popis\" class=\"formular\" rows=\"8\" cols=\"40\">popis verze systému</textarea><br />
	<input class=\"tlacitko\" type=\"submit\" value=\"přidat\"> <a href=\"#\" onClick=\"return hide_show('plot_short','plot_full')\">nepřidávat</a>
	</fieldset>
	</form>";
}

//novinky
function vypis_novinek() {
    $result = dibi::query('SELECT * FROM [prevent_novinky] ORDER BY [date] DESC');
    while ($row = $result->fetch())
        echo "<h4>" . $row['nadpis'] . "</h4><p><em>" . Date("H:i d.m.Y", $row['date']) . "</em></p><p>" . NL2BR($row['text']) . "</p><div class=\"caradown\"></div>";
}

function pridat_novinku() {
    if ($_POST['nadpis']) {
        $arr = array('nadpis' => $_POST['nadpis'], 'date' => Time(), 'text' => $_POST['text']);
        dibi::query('INSERT INTO [prevent_novinky]', $arr);
    }
    echo "<form method=\"POST\" action=\"?id=novinky\" name=\"verze\" onSubmit=\"return check_novinky(this);\">
	<fieldset>
	<legend>nová novinka</legend>
	<input name=\"nadpis\" class=\"formular\" value=\"nadpis\"><br />
	<textarea name=\"text\" class=\"formular\" rows=\"8\" cols=\"40\">text</textarea><br />
	<input class=\"tlacitko\" type=\"submit\" value=\"přidat\"> <a href=\"#\" onClick=\"return hide_show('plot_short','plot_full')\">nepřidávat</a>
	</fieldset>
	</form>";
}

function cron() {
    echo "<table class=\"table\">
	<tr>
	<td><span class=\"subheader\">STAV</span></td>
	<td><span class=\"subheader\">AKCE</span></td>
	<td><span class=\"subheader\">NÁZEV</span></td>
	<td><span class=\"subheader\">INFO<br />POSLEDNÍ<br />SPUŠTĚNÍ</span></td>	
	<td><span class=\"subheader\">POSLEDNÍ<br />SPUŠTĚNÍ</span></td>
	<td><span class=\"subheader\">PERIODA</span></td>
	<td><span class=\"subheader\">PLÁNOVANÉ<br />SPUŠTĚNÍ</span></td>
	<td><span class=\"subheader\">KOMENTÁŘ</span></td>
	</tr>";

    //zalohy
    $result = dibi::query('SELECT * FROM [prevent_cron] ORDER BY %by', "nazev");
    while ($row = $result->fetch()) {
        if ($row['stav'] == "vypnuto") {
            $signal = " class=\"red\"";
            $text = "vypnuto";
            $acronym = "Úloha je deaktitována";
        } elseif ($row['stav'] == "zapnuto") {
            $signal = " class=\"green\"";
            $text = "zapnuto";
            $acronym = "Úloha je aktitvní";
        }
        if ($row['stav_posledni_spusteni'] == "false") {
            $signal2 = " class=\"red\"";
        } elseif ($row['stav_posledni_spusteni'] == "true") {
            $signal2 = " class=\"green\"";
        }

        echo "<tr>
		<td " . $signal . "><acronym title=\"" . $acronym . "\">" . $text . "</acronym></td>
		<td>spustit<br /><a href=\"./administrace.php?id=cron&zapnout=" . $row['id'] . "\" onclick=\"if(confirm('Skutečně vypnout/zapnout událost?')) location.href='./administrace.php?id=cron&zapnout=" . $row['id'] . "'; return(false);\">vypínač</a></td>
		<td>" . $row['nazev'] . "</td>
		<td " . $signal2 . ">" . $row['komentar_posledni_spusteni'] . "</td>
		<td>" . Date("H:i:s d.m.Y", $row['date_posledni_spusteni']) . "</td>
		<td>" . sec_to_time($row['perioda']) . "</td>
		<td>" . Date("H:i:s d.m.Y", $row['date_posledni_spusteni'] + $row['perioda']) . "</td>
		<td>" . $row['komentar'] . "</td>
		</tr>";
    }

    echo "</table>";
}

function zapnout_cron() {
    $result = dibi::query('SELECT * FROM [prevent_cron] WHERE [id] = %i', $_GET['zapnout']);
    $row = $result->fetch();

    if ($row['stav'] == "vypnuto") {
        dibi::query('UPDATE [prevent_cron] SET [stav] = %s', "zapnuto", 'WHERE [id] = %i', $_GET['zapnout']);
        $zprava = "Cron zapnut";
    } elseif ($row['stav'] == "zapnuto") {
        dibi::query('UPDATE [prevent_cron] SET [stav] = %s', "vypnuto", 'WHERE [id] = %i', $_GET['zapnout']);
        $zprava = "Cron vypnut";
    }
    $arr_login = array('text' => $zprava . " - " . $row['nazev'] . "", 'link' => '', 'ad' => "0");
    vytvor_log($arr_login);
    $arr_login = array('text' => $zprava, 'id_cron' => $_GET['zapnout']);
    vytvor_log_cron($arr_login);
}

function log_cron() {
    $result = dibi::query('SELECT * FROM [prevent_cron_log] ORDER BY [date] DESC');
    $pocet_logu = $result->count();

    echo "<p><strong>" . $pocet_logu . " záznamů</strong></p>";
    echo "<textarea name=\"log\" cols=\"80\" rows=\"10\" class=\"formular\">";

    while ($row = $result->fetch()) {
        $result2 = dibi::query('SELECT * FROM [prevent_cron] WHERE [id] = %i', $row['id_cron']);
        $row2 = $result2->fetch();
        echo Date("H:i d.m.Y", $row['date']) . " (" . $row['autor'] . ", CRON: " . $row2['nazev'] . "): " . $row['text'] . "\n";
    }

    echo "</textarea>";

    $result = dibi::query('SELECT * FROM [prevent_cron_log] WHERE date < %i', Time() - 604800);
    $pocet_logu_ke_smazani = $result->count();

    echo "<p><strong><a href=\"./administrace.php?id=cron&smazat_logy=ano\" onclick=\"if(confirm('Skutečně chcete smazat logy auditů?')) location.href='./administrace.php?id=cron&smazat_logy=ano'; return(false);\">Smazat záznamy starší 7 dny (" . $pocet_logu_ke_smazani . " záznamů)</a></strong></p>";
}

function log_cron_smazat() {
    dibi::query('DELETE FROM [prevent_cron_log] WHERE date < %i', Time() - 604800);


    $arr_log = array('text' => 'Vymazány logy cronu starší 7 dny', 'ad' => "0", 'link' => '');
    vytvor_log($arr_log);
}
?>
