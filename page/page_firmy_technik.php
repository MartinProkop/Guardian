<?php

function seznam_pridelenych_firem() {  //hledani firem

    echo_table_firma();

    if (!$_GET['order_by'])
        $_GET['order_by'] = "nazev";

    $result = dibi::query('SELECT * FROM [prevent_firmy_technik] WHERE [id_technik] = %i', $_SESSION['id_usr']);
    $pocet = $result->count();
    while ($row = $result->fetch()) {
        echo_firma($row['id_firma'], "technik");
    }
    echo "</table>
		<p>Nalezeno " . $pocet . " klientů.</p>";
}

function seznam_provozoven() {
    echo_table_provozovna();

    if (!$_GET['order_by'])
        $_GET['order_by'] = "nazev";

    $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $_GET['id_firmy'], 'ORDER BY %by', $_GET['order_by'], 'ASC');
    while ($row = $result->fetch()) {
        echo_provozovna($row['id'], "technik");
    }

    echo "</table>";
}

function firemni_uzivatel() {
    echo "<table class=\"table\">
	<tr>
	<td><span class=\"subheader\">STAV</span></td>
	<td><span class=\"subheader\">AKCE</span></td>
	<td><span class=\"subheader\">JMÉNO</span></td>	
	<td><span class=\"subheader\">EMAIL</span></td>
        <td><span class=\"subheader\">telefon</span></td>
	<td><span class=\"subheader\">PRÁVA</span></td>
	<td><span class=\"subheader\">POSLEDNÍ NÁVŠŤEVA</span></td>
	<td><span class=\"subheader\">ONLINE<br />poslední klik</span></td>
	</tr>";

    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [ad] = %i', $_GET['id_firmy'], 'ORDER BY [jmeno] ASC');
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
            $online = Date("H:i:s", $row['posledni_klik']);
            $online_barva = "class=\"green\"";
        } else {
            $online = "ne";
            $online_barva = "class=\"red\"";
        }

        echo "<tr>
		<td " . $stav . ">" . $stav2 . "</td>
		<td>zatim nic</td>
		<td>" . $row['jmeno'] . "</td>
		<td>" . $row['mail'] . "</td>
                <td>" . $row['telefon'] . "</td>
		<td>";
        $result2 = dibi::query('SELECT * FROM [prevent_firmy_uzivatele_prava] WHERE [id_uzivatel] = %i', $row['id'], 'ORDER BY [id] ASC');
        while ($row2 = $result2->fetch()) {
            if ($row2['prava'] == "admin")
                echo "administrátor klienta";
            else {
                $result3 = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [id] = %i', $row2['prava'], 'ORDER BY [nazev] ASC');
                while ($row3 = $result3->fetch()) {
                    echo $row3['nazev'] . ", ";
                }
            }
        }
        echo "</td>
		<td>" . Date("H:i:s d.m.Y", $row['posledni_login_novy']) . "</td>
		<td " . $online_barva . ">" . $online . "</td>
		</tr>";
    }
    echo "</table>";
}

function firemni_log() {
    $result = dibi::query('SELECT * FROM [prevent_firmy_log] WHERE [ad] = %i', $_GET['id_firmy'], 'ORDER BY [date] DESC');
    $pocet_logu = $result->count();

    echo "<p><strong>" . $pocet_logu . " záznamů</strong></p>";
    echo "<textarea name=\"log\" cols=\"80\" rows=\"10\" class=\"formular\">";
    while ($row = $result->fetch())
        echo Date("H:i d.m.Y", $row['date']) . " (" . $row['autor'] . "): " . $row['text'] . "\n";
    echo "</textarea>";
}

function pridat_provozovnu() {
    if ($_POST['nazev']) {
        $arr_log = array('text' => 'Vytvořil novou pobočku se jménem ' . $_POST['nazev'] . ' k firmě ' . get_nazev_firmy($_GET['id_firmy']) . '.', 'link' => '', 'ad' => $_SESSION['id_usr']);
        vytvor_log($arr_log);
        $arr_log = array('text' => 'Vytvořena pobočku klienta se jménem ' . $_POST['nazev'], 'link' => '', 'ad' => $_GET['id_firmy']);
        vytvor_log_firmy($arr_log);
        $arr = array('ad' => $_GET['id_firmy'], 'nazev' => $_POST['nazev'], 'adresa' => $_POST['adresa'], 'email' => $_POST['email'], 'telefon' => $_POST['telefon'],
            'popis' => $_POST['popis'], 'kontaktni_osoba' => $_POST['kontaktni_osoba'], 'poznamky' => $_POST['poznamky']);
        dibi::query('INSERT INTO [prevent_firmy_provozovny]', $arr);

        $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] ORDER BY [id] DESC LIMIT 0 , 1');
        $row = $result->fetch();

        if ($_POST['z_zastupce_provozovna'])
            nova_osoba($row['id'], "provozovna", $_POST['z_zastupce_provozovna'], "z_zastupce_provozovna");

        firemni_uzivatel_novy_z_nova_provozovna($row['id']);
    }

    $result = dibi::query('SELECT * FROM [prevent_firmy] WHERE [id] = %i', $_GET['id_firmy']);
    $row = $result->fetch();
    if ($row['jedna_provozovna'] != "ano") {
        echo "<div class=\"info\" align=\"justify\" id=\"plot_short\">
                <p><a href=\"#\" onClick=\"return show_hide('plot_short','plot_full')\"><img src=\"./design/pridat.png\" /> přidat pobočku</a></p>
              </div>
	      <div class=\"info2\" align=\"justify\" id=\"plot_full\" style=\"display: none;\">
                <form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" id=\"nova_provozovna\" name=\"pridej provozovnu\">
		<fieldset>
		<legend>Nová pobočka</legend>
                <label for=\"nazev\">jméno pobočky</label><br />
                <input name=\"nazev\" id=\"nazev\" size=\"50\" class=\"formular\" /><br />
                <label for=\"adresa\">adresa pobočky</label><br />
                <textarea name=\"adresa\" id=\"adresa\" class=\"formular\" rows=\"5\" cols=\"50\"></textarea><br />
                <label for=\"popis\">popis činnosti na pobočce</label><br />
                <textarea name=\"popis\" id=\"popis\" class=\"formular\" rows=\"10\" cols=\"50\"></textarea><br />
                <label for=\"z_zastupce_provozovna\">Vedoucí pobočky</label><br />
                <input name=\"z_zastupce_provozovna\" id=\"z_zastupce_provozovna\" size=\"50\" class=\"formular\" /><br />
                <label for=\"kontaktni_osoba\">Kontaktní osoba</label><br />
                <input name=\"kontaktni_osoba\" id=\"kontaktni_osoba\" size=\"50\" class=\"formular\" /><br />
                <label for=\"telefon\">telefon</label><br />
                <input name=\"telefon\" id=\"telefon\" size=\"50\" class=\"formular\" /><br />
                <label for=\"email\">email</label><br />
                <input name=\"email\" id=\"email\" size=\"50\" class=\"formular\" /><br />
                <label for=\"poznamky\">poznámky</label><br />
                <textarea name=\"poznamky\" id=\"poznamky\" class=\"formular\" rows=\"10\" cols=\"50\"></textarea><br />
		<input class=\"tlacitko\" type=\"submit\" value=\"přidat\"> <a href=\"#\" onClick=\"return hide_show('plot_short','plot_full')\">nepřidávat</a>
		</fieldset>
		</form>
           <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#nova_provozovna').validate({
             rules: {
               nazev: {
                 required: true
               },
               adresa: {
                 required: true
               },
               popis: {
                 required: true
               },
               z_zastupce_provozovna: {
                 required: true
               },
               kontaktni_osoba: {
                 required: true
               },
               telefon: {
                 required: true
               },
               email: {
                 required: true,
                 email: true
               },
               poznamky: {
                 required: true
               }

               }
             });
           });
           </script>
	      </div>   ";
    } else {
        echo "<p>Nelze přidávat pobočky - klient je nemá.</p>";
    }
}

function firemni_uzivatel_novy_z_nova_provozovna($id_provozovna) {
    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [jmeno] = %s', $_POST['kontaktni_osoba']);
    if ($row = $result->fetch()) {
        echo "<h4>Uživatel \"" . $_POST['kontaktni_osoba'] . "\" nebyl vytvořen - jméno již existuje!</h4>";
        return 0;
    }
    $nahoda = Random_Password(10);

    $arr = array('jmeno' => $_POST['kontaktni_osoba'], 'mail' => $_POST['email'], 'telefon' => $_POST['telefon'], 'ad' => $_GET['id_firmy'], 'prava' => "firma", 'sul' => $nahoda, 'stav' => 'ceka_na_autorizaci');
    dibi::query('INSERT INTO [prevent_uzivatele]', $arr);

    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE jmeno = %s', $_POST['kontaktni_osoba']);
    $row = $result->fetch();


    $arr_prava = array('id_uzivatel' => $row['id'], 'prava' => $id_provozovna);
    dibi::query('INSERT INTO [prevent_firmy_uzivatele_prava]', $arr_prava);

    $arr_log = array('text' => 'Vytvořen uživatelský účet', 'link' => '', 'ad' => $row['id']);
    vytvor_log($arr_log);

    $arr_log_firmy = array('text' => 'Vytvořen uživatelský účet se jménem ' . $_POST['kontaktni_osoba'], 'link' => '', 'ad' => $_GET['id_firmy']);
    vytvor_log_firmy($arr_log_firmy);

    init_uzivatele($row['id']);

    $zprava = "Uživatel: " . $_POST['kontaktni_osoba'] . "<br />kód: " . $nahoda;
    $arr_ukol = array('deadline' => '', 'text' => 'Předat uživateli kontrolní kód', 'popis' => $zprava, 'link' => '', 'ad' => $_SESSION['id_usr']);
    novy_ukol($arr_ukol);
}

function upravit_provozovnu() {
    $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [id] = %i', $_GET['id_provozovny']);
    $row = $result->fetch();
    if ($_POST['adresa']) {

        $arr_log = array('text' => 'Upravil pobočku jménem ' . $row['nazev'] . ' u firmy ' . get_nazev_firmy($_GET['id_firmy']) . '.', 'link' => '', 'ad' => $_SESSION['id_usr']);
        vytvor_log($arr_log);
        $arr_log = array('text' => 'Upravena pobočka klienta jménem ' . $row['nazev'], 'link' => '', 'ad' => $_GET['id_firmy']);
        vytvor_log_firmy($arr_log);
        $arr = array('adresa' => $_POST['adresa'], 'email' => $_POST['email'], 'telefon' => $_POST['telefon'], 'kontaktni_osoba' => $_POST['kontaktni_osoba'],
            'popis' => $_POST['popis'], 'poznamky' => $_POST['poznamky']);
        dibi::query('UPDATE [prevent_firmy_provozovny] SET', $arr, 'WHERE [id] = %i', $_GET['id_provozovny']);
        echo "<div class=\"obdelnik\"><h4>Pobočka upravena</h4><p>Pokračujte zpět na <a href=\"./firmy_technik.php?id=detaily_provozovny&id_firmy=" . $_GET['id_firmy'] . "&id_provozovny=" . $_GET['id_provozovny'] . "\">detaily pobočky</a>.</p></div>";
    } else {


        echo "<form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" id=\"upravit_provozovna\" name=\"uprav provozovnu\">
		<fieldset>
		<legend>" . $row['nazev'] . "</legend>
		<label for=\"adresa\">adresa pobočky</label><br />
		<textarea name=\"adresa\" id=\"adresa\" class=\"formular\" row=\"5\" cols=\"50\">" . $row['adresa'] . "</textarea><br />
                <label for=\"popis\">popis  činnosti na pobočce</label><br />
                <textarea name=\"popis\" id=\"popis\" class=\"formular\" rows=\"10\" cols=\"50\">" . $row['popis'] . "</textarea><br />
                <label for=\"zastupce\">Vedoucí pobočky</label><br />";
        echo_name_osoba($row['id'], "provozovna", "z_zastupce_provozovna", "admin");
        echo "<br />
                <label for=\"kontaktni_osoba\">Kontaktní osoba</label><br />
                <input name=\"kontaktni_osoba\" id=\"kontaktni_osoba\" size=\"50\" value=\"" . $row['kontaktni_osoba'] . "\" class=\"formular\" readonly /><br />
		<label for=\"telefon\">telefon</label><br />
		<input name=\"telefon\" id=\"telefon\" size=\"50\" value=\"" . $row['telefon'] . "\" class=\"formular\" /><br />
                <label for=\"email\">email</label><br />
		<input name=\"email\" id=\"email\" size=\"50\" value=\"" . $row['email'] . "\" class=\"formular\" /><br />
		<label for=\"poznamky\">poznámky</label><br />
		<textarea name=\"poznamky\" id=\"poznamky\" class=\"formular\"  rows=\"10\" cols=\"50\">" . $row['poznamky'] . "</textarea><br />
		<input class=\"tlacitko\" type=\"submit\" value=\"upravit\"> <a href=\"./firmy_technik.php?id=detaily_provozovny&id_firmy=" . $_GET['id_firmy'] . "&id_provozovny=" . $_GET['id_provozovny'] . "\">neupravovat</a>
		</fieldset>
		</form>
           <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#upravit_provozovna').validate({
             rules: {
               nazev: {
                 required: true
               },
               adresa: {
                 required: true
               },
               popis: {
                 required: true
               },
               z_zastupce_provozovna: {
                 required: true
               },
               telefon: {
                 required: true
               },
               email: {
                 required: true,
                 email: true
               },
               poznamky: {
                 required: true
               }

               }
             });
           });
           </script>";
    }
}

function smazat_provozovnu() {
    $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [id] = %i', $_GET['id_provozovny']);
    $row = $result->fetch();
    $arr_log = array('text' => "Smazána pobočka " . $row['nazev'] . " u firmy " . get_nazev_firmy($_GET['id_firmy']), 'link' => '', 'ad' => $_SESSION['id_usr']);
    dibi::query('DELETE FROM [prevent_firmy_provozovny] WHERE [id] = %i', $_GET['id_provozovny']);
    vytvor_log($arr_log);
    $arr_log = array('text' => 'Smazána pobočka klienta jménem ' . $row['nazev'], 'link' => '', 'ad' => $_GET['id_firmy']);
    vytvor_log_firmy($arr_log);
    echo "<h4>Pobočka smazána</h4><p>Pokračujte zpět na <a href=\"./firmy_technik.php?id=detaily_firmy&id_firmy=" . $row['ad'] . "\">detaily firmy</a>.</p>";
}
?>