<?php

function vyhledat_pracoviste_koordinator() {
    if (!$_POST['firma'])
        $_POST['firma'] = $_GET['firma'];
    if (!$_POST['provozovna'] && $_POST['provozovna'] != "all")
        $_POST['provozovna'] = $_GET['provozovna'];

    echo "<form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" name=\"najdi osobu\" \">
	<fieldset>
	<legend>Název klienta</legend>
	<label for=\"firma\">klient</label><br />
	<select name=\"firma\" id=\"firma\" class=\"formular\">";

    $result = dibi::query('SELECT * FROM [prevent_firmy] ORDER BY [nazev] ASC');
    while ($row = $result->fetch()) {
        if ($_POST['firma']) {
            $check = "";
            if ($row['id'] == $_POST['firma'])
                $check = "selected";
        }
        echo "<option $check value=\"" . $row['id'] . "\">" . $row['nazev'] . "</option>";
    }
    echo "</select><br />";

    if ($_POST['firma']) {
        echo "<label for=\"provozovna\">pobočka</label><br />
		<select name=\"provozovna\" id=\"provozovna\" class=\"formular\">
		<option value=\"all\">-----</option>";
        $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $_POST['firma']);
        while ($row = $result->fetch()) {
            if ($_POST['provozovna']) {
                $check2 = "";

                if ($row['id'] == $_POST['provozovna'])
                    $check2 = "selected";
            }
            echo "<option $check2 value=\"" . $row['id'] . "\">" . $row['nazev'] . "</option>";
        }
        echo "</select><br />";
    }
    echo "<input class=\"tlacitko\" type=\"submit\" value=\"vypsat\">";
    if ($_POST['provozovna'] && $_POST['provozovna'] != "all")
        echo "<a href=\"./pracoviste.php?id=nova&id_provozovna=" . $_POST['provozovna'] . "&id_firma=" . $_POST['firma'] . "\"><img src=\"./design/pridat.png\" /> přidat pracoviště</a>";
    echo "</fieldset>
	</form><br />";

    if ($_POST['firma']) {

        echo "<table class=\"table\">
		<tr>
		<td><span class=\"subheader\">AKCE</span></td>
		<td><span class=\"subheader\">pobočka</span></td>
		<td><span class=\"subheader\">JMÉNO</span></td>
		</tr>";

        if ($_POST['provozovna'] && $_POST['provozovna'] != "all") {
            $result = dibi::query('SELECT * FROM [prevent_firmy_pracoviste_relace] WHERE [id_provozovna] = %i', $_POST['provozovna']);
            while ($row = $result->fetch()) {
                echo_table_pracoviste($row['id_pracoviste']);
            }
        } else {
            $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $_POST['firma']);
            while ($row = $result->fetch()) {
                $result2 = dibi::query('SELECT * FROM [prevent_firmy_pracoviste_relace] WHERE [id_provozovna] = %i', $row['id']);
                while ($row2 = $result2->fetch()) {
                    echo_table_pracoviste($row2['id_pracoviste']);
                }
            }
        }
        echo "</table>
                <p>Přejít na <a href=\"./firmy_koordinator.php?id=detaily_firmy&id_firmy=" . $_POST['firma'] . "\"><img src=\"./design/detaily.png\"/> detaily klienta</a>.</p>";
    }
}

function vyhledat_pracoviste_technik() {
    if (!$_POST['firma'])
        $_POST['firma'] = $_GET['firma'];
    if (!$_POST['provozovna'] && $_POST['provozovna'] != "all")
        $_POST['provozovna'] = $_GET['provozovna'];

    echo "<form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" name=\"najdi osobu\" \">
	<fieldset>
	<legend>Název klienta</legend>
	<select name=\"firma\" class=\"formular\">";
    $result = dibi::query('SELECT * FROM [prevent_firmy_technik] WHERE [id_technik] = %i', $_SESSION['id_usr']);
    while ($row = $result->fetch()) {
        $result2 = dibi::query('SELECT * FROM [prevent_firmy] WHERE [id] = %i', $row['id_firma']);
        $row2 = $result2->fetch();
        if ($_POST['firma']) {
            $check = "";
            if ($row2['id'] == $_POST['firma'])
                $check = "selected";
        }
        echo "<option $check value=\"" . $row2['id'] . "\">" . $row2['nazev'] . "</option>";
    }
    echo "</select><br />";

    if ($_POST['firma']) {
        echo "<label for=\"provozovna\">pobočka</label><br />
		<select name=\"provozovna\" id=\"provozovna\" class=\"formular\">
		<option value=\"all\">-----</option>";
        $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $_POST['firma']);
        while ($row = $result->fetch()) {
            if ($_POST['provozovna']) {
                $check2 = "";
                if ($row['id'] == $_POST['provozovna'])
                    $check2 = "selected";
            }
            echo "<option $check2 value=\"" . $row['id'] . "\">" . $row['nazev'] . "</option>";
        }
        echo "</select><br />";
    }
    echo "<input class=\"tlacitko\" type=\"submit\" value=\"vypsat\">";
    if ($_POST['provozovna'] && $_POST['provozovna'] != "all")
        echo "<a href=\"./pracoviste.php?id=nova&id_provozovna=" . $_POST['provozovna'] . "&id_firma=" . $_POST['firma'] . "\"><img src=\"./design/pridat.png\" /> přidat pracoviště</a>";
    echo "</fieldset>
	</form><br />";

    if ($_POST['firma']) {
        echo "<table class=\"table\">
		<tr>
		<td><span class=\"subheader\">AKCE</span></td>
		<td><span class=\"subheader\">pobočka</span></td>
		<td><span class=\"subheader\">jméno</span></td>
		</tr>";

        if ($_POST['provozovna'] && $_POST['provozovna'] != "all") {
            $result = dibi::query('SELECT * FROM [prevent_firmy_pracoviste_relace] WHERE [id_provozovna] = %i', $_POST['provozovna']);
            while ($row = $result->fetch()) {
                echo_table_pracoviste($row['id_pracoviste']);
            }
        } else {
            $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $_POST['firma']);
            while ($row = $result->fetch()) {
                $result2 = dibi::query('SELECT * FROM [prevent_firmy_pracoviste_relace] WHERE [id_provozovna] = %i', $row['id']);
                while ($row2 = $result2->fetch()) {
                    echo_table_pracoviste($row2['id_pracoviste']);
                }
            }
        }
        echo "</table>
		<p>Přejít na <a href=\"./firmy_koordinator.php?id=detaily_firmy&id_firmy=" . $_POST['firma'] . "\"><img src=\"./design/detaily.png\"/> detaily klienta</a>.</p>";
    }
}

function vyhledat_pracoviste_zakaznik($prava) {
    echo "<table class=\"table\">
	<tr>
	<td><span class=\"subheader\">AKCE</span></td>
	<td><span class=\"subheader\">Pobočka</span></td>
	<td><span class=\"subheader\">JMÉNO</span></td>
	</tr>";


    if ($prava == "admin") {
        $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $_SESSION['firma_usr']);
        while ($row = $result->fetch()) {
            $result2 = dibi::query('SELECT * FROM [prevent_firmy_pracoviste_relace] WHERE [id_provozovna] = %i', $row['id']);
            while ($row2 = $result2->fetch()) {
                echo_table_pracoviste($row2['id_pracoviste']);
            }
        }
    } else {
        $result = dibi::query('SELECT * FROM [prevent_firmy_uzivatele_prava] WHERE [id_uzivatel] = %i', $_SESSION['id_usr'], 'ORDER BY [id] ASC');
        while ($row = $result->fetch()) {
            $result2 = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [id] = %i', $row['prava'], 'ORDER BY [nazev] ASC');
            while ($row2 = $result2->fetch()) {
                $result3 = dibi::query('SELECT * FROM [prevent_firmy_pracoviste_relace] WHERE [id_provozovna] = %i', $row2['id']);
                while ($row3 = $result3->fetch()) {
                    echo_table_pracoviste($row3['id_pracoviste']);
                }
            }
        }
    }
    echo "</table>";
}

function echo_table_pracoviste($id) {
    $result = dibi::query('SELECT * FROM [prevent_firmy_pracoviste] WHERE [id] = %i', $id);
    $row = $result->fetch();
    $result2 = dibi::query('SELECT * FROM [prevent_firmy_pracoviste_relace] WHERE [id_pracoviste] = %i', $id);
    $row2 = $result2->fetch();
    $result3 = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [id] = %i', $row2['id_provozovna']);
    $row3 = $result3->fetch();
    echo "<tr>
	<td><a href=\"./pracoviste.php?id=detaily&id_pracoviste=" . $row['id'] . "\"><img src=\"./design/detaily.png\" alt=\"detaily\" title=\"detaily\"></a></td>
	<td>" . get_nazev_provozovny($row3['id'], true) . "</td>
	<td>" . $row['jmeno'] . "</td>
	</tr>";
}

function echo_detail_pracoviste($id, $akce) {
    $result = dibi::query('SELECT * FROM [prevent_firmy_pracoviste] WHERE [id] = %i', $id);
    $row = $result->fetch();
    echo "<table class=\"table\">
	<tr>
	<td><span class=\"subheader\">akce</span></td>
	<td>";
    if ($akce == "koordinator") {
        echo "<a href=\"./pracoviste.php?id=upravit&id_pracoviste=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"upravit\" title=\"upravit\"></a> <a href=\"./pracoviste.php?id=smazat&id_pracoviste=" . $row['id'] . "\" onclick=\"if(confirm('Skutečně smazat pracoviště?')) location.href='./pracoviste.php?id=smazat&id_pracoviste=" . $row['id'] . "'; return(false);\"><img src=\"./design/kos.png\" alt=\"smazat\" title=\"smazat\"></a>";
    } elseif ($akce == "technik") {
        echo "<a href=\"./pracoviste.php?id=upravit&id_pracoviste=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"upravit\" title=\"upravit\"></a> <a href=\"./pracoviste.php?id=smazat&id_pracoviste=" . $row['id'] . "\" onclick=\"if(confirm('Skutečně smazat pracoviště?')) location.href='./pracoviste.php?id=smazat&id_pracoviste=" . $row['id'] . "'; return(false);\"><img src=\"./design/kos.png\" alt=\"smazat\" title=\"smazat\"></a>";
    } elseif ($akce == "zakaznik") {
        echo "---";
    } elseif ($akce == "zakaznik_admin") {
        echo "<a href=\"./pracoviste.php?id=upravit&id_pracoviste=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"upravit\" title=\"upravit\"></a> <a href=\"./pracoviste.php?id=smazat&id_pracoviste=" . $row['id'] . "\" onclick=\"if(confirm('Skutečně smazat pracoviště?')) location.href='./pracoviste.php?id=smazat&id_pracoviste=" . $row['id'] . "'; return(false);\"><img src=\"./design/kos.png\" alt=\"smazat\" title=\"smazat\"></a>";
    }
    echo "</td></tr>
	<tr>
	<td><span class=\"subheader\">klient</span></td>
	<td>";
    echo get_nazev_firmy(get_id_firma_z_objekt("pracoviste", $_GET['id_pracoviste'])) . "</td>
	<tr>
	<td><span class=\"subheader\">pobočka</span></td>
	<td>";
    $result2 = dibi::query('SELECT * FROM [prevent_firmy_pracoviste_relace] WHERE [id_pracoviste] = %i', $_GET['id_pracoviste']);
    $row2 = $result2->fetch();
    echo get_nazev_provozovny($row2['id_provozovna'], true) . "</td>
	<tr>
	<td><span class=\"subheader\">jméno pracoviště</span></td>
	<td>" . $row['jmeno'] . "</td>
	</tr>
	<tr>
	<td><span class=\"subheader\">popis pracoviště</span></td>
	<td>" . $row['popis'] . "</td>
	</tr>
	<tr>
	<td><span class=\"subheader\">počet zaměstnanců</span></td>
	<td>" . $row['pocet_zamestnancu'] . "</td>
	</tr>	
	<tr>
	<td><span class=\"subheader\">chemické látky</span></td>
	<td>" . $row['chemicke_latky'] . "</td>
	</tr>	
	<tr>
	<td><span class=\"subheader\">nebezpečné chemické látky</span></td>
	<td>" . $row['nebezpecne_chemicke_latky'] . "</td>
	</tr>
	<tr>
	<td><span class=\"subheader\">dopravní prostředky</span></td><td>";
    $pieces = explode(";", $row['dopravni_prostredky_select']);
    for ($i = 0; $i < count($pieces); $i++) {
        if ($pieces[$i] != "")
            echo $pieces[$i] . ", ";
    }
    echo "</td></tr>
	<tr>
	<td><span class=\"subheader\">jiné dopravní prostředky</span></td>
	<td>" . $row['dopravni_prostredky'] . "</td>
	</tr>
	<tr>
	<td><span class=\"subheader\">Je pracoviště klimatizováno?</span></td>
	<td>" . $row['q_klimatizovano'] . "</td>
	</tr>
	<tr>
	<td><span class=\"subheader\">vytápění</span></td><td>";
    $pieces = explode(";", $row['vytapeni_select']);
    for ($i = 0; $i < count($pieces); $i++) {
        if ($pieces[$i] != "")
            echo $pieces[$i] . ", ";
    }
    echo "</td></tr>
	<tr>
	<td><span class=\"subheader\">jiné vytápění</span></td>
	<td>" . $row['vytapeni'] . "</td>
	</tr>
	<tr>
	<td><span class=\"subheader\">odsávání</span></td>
	<td>" . $row['odsavani'] . "</td>
	</tr>	
	<tr>
	<td><span class=\"subheader\">osvětlení</span></td>
	<td>" . $row['osvetleni'] . "</td>
	</tr>		
	<tr>
	<td><span class=\"subheader\">Je osvětlení dostatečné?</span></td>
	<td>" . $row['q_osvetleni_dostatecne'] . "</td>
	</tr>		
	<tr>
	<td><span class=\"subheader\">poznámky</span></td>
	<td>" . $row['poznamky'] . "</td>
	</tr>	
	</table>";

    echo_relace_objekt("pracoviste", $row['id']);

    echo "<p><br />Zpět na <a href=\"./pracoviste.php?firma=" . get_id_firma_z_objekt("pracoviste", $row['id']) . "\">seznam pracovišť klienta</a>.</p>";
}

function smazat_pracoviste() {
    $result = dibi::query('SELECT * FROM [prevent_firmy_pracoviste] WHERE [id] = %i', $_GET['id_pracoviste']);
    $row = $result->fetch();
    $arr_log = array('text' => 'Smazáno pracoviště ' . $row['jmeno'], 'link' => '', 'ad' => get_id_firma_z_objekt("pracoviste", $_GET['id_pracoviste']));
    dibi::query('DELETE FROM [prevent_firmy_pracoviste] WHERE [id] = %i', $_GET['id_pracoviste']);
    dibi::query('DELETE FROM [prevent_firmy_pracoviste_relace] WHERE [id_pracoviste] = %i', $_GET['id_pracoviste']);
    vytvor_log_firmy($arr_log);
    echo "<div class=\"obdelnik\"><h5>Pracoviště smazáno</h5><p>Pokračujte zpět na <a href=\"./pracoviste.php?firma=" . get_id_firma_z_objekt("pracoviste", $_GET['id_pracoviste']) . "\">seznam pracovišť klienta</a>.</p></div>";
}

function upravit_pracoviste() {
    if ($_POST['sent']) {
        $arr_log_firmy = array('text' => 'Upravena pracoviště s názvem ' . $_POST['jmeno'], 'link' => '', 'ad' => get_id_firma_z_objekt("pracoviste", $_GET['id_pracoviste']));
        vytvor_log_firmy($arr_log_firmy);

        $dopravni_prostredky_select = $_POST['dopravni_prostredky_select'];
        $dopravni_prostredkyx = "";
        for ($i = 0; $i < count($dopravni_prostredky_select); $i++) {

            $dopravni_prostredkyx = $dopravni_prostredkyx . $dopravni_prostredky_select[$i] . ";";
        }

        $vytapeni_select = $_POST['vytapeni_select'];
        $vytapenix = "";
        for ($i = 0; $i < count($vytapeni_select); $i++) {

            $vytapenix = $vytapenix . $vytapeni_select[$i] . ";";
        }


        $arr = array('jmeno' => $_POST['jmeno'], 'popis' => $_POST['popis'], 'pocet_zamestnancu' => $_POST['pocet_zamestnancu'],
            'chemicke_latky' => $_POST['chemicke_latky'], 'nebezpecne_chemicke_latky' => $_POST['nebezpecne_chemicke_latky'], 'dopravni_prostredky' => $_POST['dopravni_prostredky'], 'dopravni_prostredky_select' => $dopravni_prostredkyx,
            'q_klimatizovano' => $_POST['q_klimatizovano'], 'vytapeni' => $_POST['vytapeni'], 'vytapeni_select' => $vytapenix, 'odsavani' => $_POST['odsavani'], 'osvetleni' => $_POST['osvetleni'],
            'q_osvetleni_dostatecne' => $_POST['q_osvetleni_dostatecne'], 'poznamky' => $_POST['poznamky']);
        dibi::query('UPDATE [prevent_firmy_pracoviste] SET', $arr, 'WHERE [id] = %i', $_GET['id_pracoviste']);

        echo "<div class=\"obdelnik\"><h5>Pracoviště upraveno</h5><p>Pokračujte zpět na <a href=\"./pracoviste.php?firma=" . get_id_firma_z_objekt("pracoviste", $_GET['id_pracoviste']) . "\">seznam pracovišť klienta</a>.</p></div>";
    } else {
        $result = dibi::query('SELECT * FROM [prevent_firmy_pracoviste] WHERE [id] = %i', $_GET['id_pracoviste']);
        $row = $result->fetch();

        echo "<form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" name=\"upravitpracoviste\" id=\"upravit_pracoviste\">
		<input type=\"hidden\" name=\"sent\" value=\"true\">
		<fieldset>
		<legend>Nová pracoviste</legend>
		<label for=\"firma\">klient</label><br />";
        echo get_nazev_firmy(get_id_firma_z_objekt("pracoviste", $_GET['id_pracoviste'])) . "<br />
		<label for=\"provozovna\">pobočka</label><br />";
        $result2 = dibi::query('SELECT * FROM [prevent_firmy_pracoviste_relace] WHERE [id_pracoviste] = %i', $_GET['id_pracoviste']);
        $row2 = $result2->fetch();
        echo get_nazev_provozovny($row2['id_provozovna'], true) . "<br />
		<label for=\"jmeno\">jméno pracoviště</label><br />
		<input name=\"jmeno\" id=\"jmeno\" class=\"formular\" size=\"50\" value=\"" . $row['jmeno'] . "\"/><br />
		<label for=\"popis\">popis pracoviště</label><br />
		<textarea name=\"popis\" id=\"popis\" class=\"formular\" rows=\"10\" cols=\"50\">" . $row['popis'] . "</textarea><br />
		<label for=\"pocet_zamestnancu\">počet zaměstnanců</label><br />
		<input name=\"pocet_zamestnancu\" id=\"pocet_zamestnancu\" class=\"formular\" size=\"10\" value=\"" . $row['pocet_zamestnancu'] . "\"/><br />
		<label for=\"chemicke_latky\">chemické látky</label><br />
		<textarea name=\"chemicke_latky\" id=\"chemicke_latky\" class=\"formular\" rows=\"10\" cols=\"50\">" . $row['chemicke_latky'] . "</textarea><br />
		<label for=\"nebezpecne_chemicke_latky\">nebezpečné chemické látky</label><br />
		<textarea name=\"nebezpecne_chemicke_latky\" id=\"nebezpecne_chemicke_latky\" class=\"formular\" rows=\"10\" cols=\"50\">" . $row['nebezpecne_chemicke_latky'] . "</textarea><br />
		<label for=\"dopravni_prostredky_select\">dopravní prostředky</label><br />";
        if (strpos(" " . $row['dopravni_prostredky_select'], "jiné") || $row['dopravni_prostredky_select'] == "")
            $dopravni_prostredky_select_jine = "selected=\"selected\"";
        if (strpos(" " . $row['dopravni_prostredky_select'], "VZZ"))
            $dopravni_prostredky_select_vvz = "selected=\"selected\"";
        if (strpos(" " . $row['dopravni_prostredky_select'], "nákladní automobily do 3,5t"))
            $dopravni_prostredky_select_nakl_do_3 = "selected=\"selected\"";
        if (strpos(" " . $row['dopravni_prostredky_select'], "nákladní automobily nad 3,5t"))
            $dopravni_prostredky_select_nakl_nad_3 = "selected=\"selected\"";
        if (strpos(" " . $row['dopravni_prostredky_select'], "osobní automobil"))
            $dopravni_prostredky_select_osobak = "selected=\"selected\"";
        if (strpos(" " . $row['dopravni_prostredky_select'], "traktory"))
            $dopravni_prostredky_select_traktor = "selected=\"selected\"";
        if (strpos(" " . $row['dopravni_prostredky_select'], "speciální dopravní prostředky"))
            $dopravni_prostredky_select_special = "selected=\"selected\"";
        echo "<select name=\"dopravni_prostredky_select[]\" multiple=\"multiple\" id=\"dopravni_prostredky_select\" class=\"formular\">
                <option value=\"jiné\" $dopravni_prostredky_select_jine>--- jiné ---</option>
                <option value=\"VZZ\" $dopravni_prostredky_select_vvz>VZZ</option>
                <option value=\"nákladní automobily do 3,5t\" $dopravni_prostredky_select_nakl_do_3>nákladní automobily do 3,5t</option>
                <option value=\"nákladní automobily nad 3,5t\" $dopravni_prostredky_select_nakl_nad_3>nákladní automobily nad 3,5t</option>
                <option value=\"osobní automobil\" $dopravni_prostredky_select_osobak>osobní automobil</option>
                <option value=\"traktory\" $dopravni_prostredky_select_traktor>traktory</option>
                <option value=\"speciální dopravní prostředky\" $dopravni_prostredky_select_special>speciální dopravní prostředky</option>
                </select> <label for=\"dopravni_prostredky\">nebo jiné</label><br />
                <textarea name=\"dopravni_prostredky\" id=\"dopravni_prostredky\" class=\"formular\" rows=\"5\" cols=\"50\">" . $row['dopravni_prostredky'] . "</textarea><br />
		<label for=\"q_klimatizovano_ano\">Je pracoviště klimatizováno?</label><br />";
        if ($row['q_klimatizovano'] == "ano")
            $checked_q_klimatizovano_ano = "checked";
        elseif ($row['q_klimatizovano'] == "ne")
            $checked_q_klimatizovano_ne = "checked";
        echo "<input type=\"radio\" id=\"q_klimatizovano_ano\" $checked_q_klimatizovano_ano name=\"q_klimatizovano\" value=\"ano\"><label for=\"q_klimatizovano_ano\">ano</label> / <input type=\"radio\" id=\"q_klimatizovano_ne\" $checked_q_klimatizovano_ne name=\"q_klimatizovano\" value=\"ne\"><label for=\"q_klimatizovano_ne\">ne</label><br />
                <label for=\"vytapeni_select\">vytápění</label><br />";
        if (strpos(" " . $row['vytapeni_select'], "jiné") || $row['vytapeni_select'] == "")
            $vytapeni_select_jine = "selected=\"selected\"";
        if (strpos(" " . $row['vytapeni_select'], "plynem"))
            $vytapeni_select_plynem = "selected=\"selected\"";
        if (strpos(" " . $row['vytapeni_select'], "elektrickou energií"))
            $vytapeni_select_elektrika = "selected=\"selected\"";
        if (strpos(" " . $row['vytapeni_select'], "tuhými palivy"))
            $vytapeni_select_tuha = "selected=\"selected\"";
        if (strpos(" " . $row['vytapeni_select'], "infrazářiči"))
            $vytapeni_select_infra = "selected=\"selected\"";
        if (strpos(" " . $row['vytapeni_select'], "dálkový přenos tepla"))
            $vytapeni_select_dalka = "selected=\"selected\"";
        echo "<select name=\"vytapeni_select[]\" multiple=\"multiple\" id=\"vytapeni_select\" class=\"formular\">
                <option value=\"jiné\" $vytapeni_select_jine>--- jiné ---</option>
                <option value=\"plynem\" $vytapeni_select_plynem>plynem</option>
                <option value=\"elektrickou energií\" $vytapeni_select_elektrika>elektrickou energií</option>
                <option value=\"tuhými palivy\" $vytapeni_select_tuha>tuhými palivy</option>
                <option value=\"infrazářiči\" $vytapeni_select_infra>infrazářiči</option>
                <option value=\"dálkový přenos tepla\" $vytapeni_select_dalka>dálkový přenos tepla</option>
                </select> <label for=\"vytapeni\">nebo jiné</label><br />
		<textarea name=\"vytapeni\" id=\"vytapeni\" class=\"formular\" rows=\"5\" cols=\"50\">" . $row['vytapeni'] . "</textarea><br />
		<label for=\"odsavani\">odsávání</label><br />
		<textarea name=\"odsavani\" id=\"odsavani\" class=\"formular\" rows=\"10\" cols=\"50\">" . $row['odsavani'] . "</textarea><br />
		<label for=\"osvetleni\">osvětlení</label><br />
		<textarea name=\"osvetleni\" id=\"osvetleni\" class=\"formular\" rows=\"10\" cols=\"50\">" . $row['osvetleni'] . "</textarea><br />
		<label for=\"q_osvetleni_dostatecne_ano\">Je osvětlení dostatečné?</label><br />";
        if ($row['q_osvetleni_dostatecne'] == "ano")
            $checked_q_osvetleni_dostatecne_ano = "checked";
        elseif ($row['q_osvetleni_dostatecne'] == "ne")
            $checked_q_osvetleni_dostatecne_ne = "checked";
        echo "<input type=\"radio\" id=\"q_osvetleni_dostatecne_ano\" $checked_q_osvetleni_dostatecne_ano name=\"q_osvetleni_dostatecne\" value=\"ano\"><label for=\"q_osvetleni_dostatecne_ano\">ano</label> / <input type=\"radio\" id=\"q_osvetleni_dostatecne_ne\" $checked_q_osvetleni_dostatecne_ne  name=\"q_osvetleni_dostatecne\" value=\"ne\"><label for=\"q_osvetleni_dostatecne_ne\">ne</label><br />
		<label for=\"poznamky\">poznámky</label><br />
		<textarea name=\"poznamky\" id=\"poznamky\" class=\"formular\" rows=\"10\" cols=\"50\">" . $row['poznamky'] . "</textarea><br />
		<input class=\"tlacitko\" type=\"submit\" value=\"upravit\"> <a href=\"./pracoviste.php?id=detaily&id_pracoviste=" . $row['id'] . "\">neupravovat</a>
		</fieldset>
		</form>
           <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#upravit_pracoviste').validate({
             rules: {
               jmeno: {
                 required: true
               },
               popis: {
                 required: true
               },
               pocet_zamestnancu: {
                 required: true,
                 min: 1
               },
               chemicke_latky: {
                 required: true
               },
               nebezpecne_chemicke_latky: {
                 required: true
               },
               odsavani: {
                 required: true
               },
               osvetleni: {
                 required: true
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

function new_pracoviste() {
    if ($_POST['sent']) {
        $arr_log_firmy = array('text' => 'Přidáno pracoviste s názvem ' . $_POST['jmeno'], 'link' => '', 'ad' => $_GET['id_firma']);
        vytvor_log_firmy($arr_log_firmy);

        $dopravni_prostredky_select = $_POST['dopravni_prostredky_select'];
        $dopravni_prostredkyx = "";
        for ($i = 0; $i < count($dopravni_prostredky_select); $i++) {

            $dopravni_prostredkyx = $dopravni_prostredkyx . $dopravni_prostredky_select[$i] . ";";
        }

        $vytapeni_select = $_POST['vytapeni_select'];
        $vytapenix = "";
        for ($i = 0; $i < count($vytapeni_select); $i++) {

            $vytapenix = $vytapenix . $vytapeni_select[$i] . ";";
        }

        $arr = array('jmeno' => $_POST['jmeno'], 'popis' => $_POST['popis'], 'pocet_zamestnancu' => $_POST['pocet_zamestnancu'],
            'chemicke_latky' => $_POST['chemicke_latky'], 'nebezpecne_chemicke_latky' => $_POST['nebezpecne_chemicke_latky'], 'dopravni_prostredky' => $_POST['dopravni_prostredky'], 'dopravni_prostredky_select' => $dopravni_prostredkyx,
            'q_klimatizovano' => $_POST['q_klimatizovano'], 'vytapeni' => $_POST['vytapeni'], 'vytapeni_select' => $vytapenix, 'odsavani' => $_POST['odsavani'], 'osvetleni' => $_POST['osvetleni'],
            'q_osvetleni_dostatecne' => $_POST['q_osvetleni_dostatecne'], 'poznamky' => $_POST['poznamky']);
        dibi::query('INSERT INTO [prevent_firmy_pracoviste]', $arr);

        $result = dibi::query('SELECT * FROM [prevent_firmy_pracoviste] WHERE [jmeno] = %s', $_POST['jmeno'], 'ORDER BY [id] DESC LIMIT 0, 1');
        $row = $result->fetch();

        $arr = array('id_pracoviste' => $row['id'], 'id_provozovna' => $_GET['id_provozovna']);
        dibi::query('INSERT INTO [prevent_firmy_pracoviste_relace]', $arr);

        echo "<div class=\"obdelnik\"><h5>Pracoviště přidáno</h5><p>Pokračujte na <a href=\"./pracoviste.php?firma=" . $_GET['id_firma'] . "\">seznam pracovišť klienta</a>.</p></div>";
    } else {
        echo "<form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" name=\"pridat pracoviště\"  id=\"nove_pracoviste\">
		<input type=\"hidden\" name=\"sent\" value=\"true\">
		<fieldset>
		<legend>Nové pracoviště</legend>
		<label for=\"firma\">klient</label><br />";
        if (!$_GET['id_firma'])
            $_GET['id_firma'] = $_SESSION['firma_usr'];
        echo get_nazev_firmy($_GET['id_firma']) . "<br />
		<label for=\"provozovna\">pobočka</label><br />";
        echo get_nazev_provozovny($_GET['id_provozovna'], true) . "<br />
		<label for=\"jmeno\">jméno pracoviště</label><br />
		<input name=\"jmeno\" id=\"jmeno\" class=\"formular\" size=\"50\" value=\"\"/><br />
		<label for=\"popis\">popis pracoviště</label><br />
		<textarea name=\"popis\" id=\"popis\" class=\"formular\" rows=\"10\" cols=\"50\"></textarea><br />
		<label for=\"pocet_zamestnancu\">počet zaměstnanců</label><br />
		<input name=\"pocet_zamestnancu\" id=\"pocet_zamestnancu\" class=\"formular\" size=\"10\" value=\"\"/><br />
		<label for=\"chemicke_latky\">chemické látky</label><br />
		<textarea name=\"chemicke_latky\" id=\"chemicke_latky\" class=\"formular\" rows=\"10\" cols=\"50\"></textarea><br />
		<label for=\"nebezpecne_chemicke_latky\">nebezpečné chemické látky</label><br />
		<textarea name=\"nebezpecne_chemicke_latky\" id=\"nebezpecne_chemicke_latky\" class=\"formular\" rows=\"10\" cols=\"50\"></textarea><br />
		<label for=\"dopravni_prostredky_select[]\">dopravní prostředky</label><br />
                <select name=\"dopravni_prostredky_select[]\" multiple=\"multiple\" id=\"dopravni_prostredky_select[]\" class=\"formular\">
                <option value=\"jiné\">--- jiné ---</option>
                <option value=\"VZZ\">VZZ</option>
                <option value=\"nákladní automobily do 3,5t\">nákladní automobily do 3,5t</option>
                <option value=\"nákladní automobily nad 3,5t\">nákladní automobily nad 3,5t</option>
                <option value=\"osobní automobil\">osobní automobil</option>
                <option value=\"traktory\">traktory</option>
                <option value=\"speciální dopravní prostředky\">speciální dopravní prostředky</option>
                </select> <br /> <label for=\"dopravni_prostredky\">nebo jiné</label><br />
                <textarea name=\"dopravni_prostredky\" id=\"dopravni_prostredky\" class=\"formular\" rows=\"5\" cols=\"50\"></textarea><br />
                <table class=\"table_hide\">
                <tr>
		<td><label for=\"q_klimatizovano_ano\">Je pracoviště klimatizováno?</label><br />
		<input type=\"radio\" id=\"q_klimatizovano_ano\" name=\"q_klimatizovano\" value=\"ano\"><label for=\"q_klimatizovano_ano\">ano</label> / <input type=\"radio\" id=\"q_klimatizovano_ne\"  name=\"q_klimatizovano\" value=\"ne\"><label for=\"q_klimatizovano_ne\">ne</label><br /></td>
		<td><label for=\"q_klimatizovano\" class=\"error\" style=\"display:none;\">Odpovězte</label></td>
                </tr>
                </table>
                <label for=\"vytapeni_select[]\">vytápění</label><br />
                <select name=\"vytapeni_select[]\" multiple=\"multiple\" id=\"vytapeni_select[]\" class=\"formular\">
                <option value=\"jiné\">--- jiné ---</option>
                <option value=\"plynem\">plynem</option>
                <option value=\"elektrickou energií\">elektrickou energií</option>
                <option value=\"tuhými palivy\">tuhými palivy</option>
                <option value=\"infrazářiči\">infrazářiči</option>
                <option value=\"dálkový přenos tepla\">dálkový přenos tepla</option>
                </select><br /><label for=\"vytapeni\">nebo jiné</label><br />
		<textarea name=\"vytapeni\" id=\"vytapeni\" class=\"formular\" rows=\"5\" cols=\"50\"></textarea><br />
		<label for=\"odsavani\">odsávání</label><br />
		<textarea name=\"odsavani\" id=\"odsavani\" class=\"formular\" rows=\"10\" cols=\"50\"></textarea><br />
		<label for=\"osvetleni\">osvětlení</label><br />
		<textarea name=\"osvetleni\" id=\"osvetleni\" class=\"formular\" rows=\"10\" cols=\"50\"></textarea><br />
                <table class=\"table_hide\">
                <tr>
		<td>
                <label for=\"q_osvetleni_dostatecne_ano\">Je osvětlení dostatečné?</label><br />
		<input type=\"radio\" id=\"q_osvetleni_dostatecne_ano\" name=\"q_osvetleni_dostatecne\" value=\"ano\"><label for=\"q_osvetleni_dostatecne_ano\">ano</label> / <input type=\"radio\" id=\"q_osvetleni_dostatecne_ne\"  name=\"q_osvetleni_dostatecne\" value=\"ne\"><label for=\"q_osvetleni_dostatecne_ne\">ne</label><br /></td>
		<td><label for=\"q_osvetleni_dostatecne\" class=\"error\" style=\"display:none;\">Odpovězte</label></td>
                </tr>
                </table>
		<label for=\"poznamky\">poznámky</label><br />
		<textarea name=\"poznamky\" id=\"poznamky\" class=\"formular\" rows=\"10\" cols=\"50\"></textarea><br />
		<input class=\"tlacitko\" type=\"submit\" value=\"přidat\"> <a href=\"./pracoviste.php?firma=" . $_GET['id_firma'] . "&provozovna=" . $_GET['id_provozovna'] . "\">nepřidávat</a>
		</fieldset>
		</form>
           <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#nove_pracoviste').validate({
             rules: {
               jmeno: {
                 required: true
               },
               popis: {
                 required: true
               },
               pocet_zamestnancu: {
                 required: true,
                 min: 1
               },
               chemicke_latky: {
                 required: true
               },
               nebezpecne_chemicke_latky: {
                 required: true
               },
               'dopravni_prostredky_select[]': {
                 required: true
               },
               q_klimatizovano: {
                 required: true
               },
               'vytapeni_select[]': {
                 required: true
               },
               odsavani: {
                 required: true
               },
               osvetleni: {
                 required: true
               },
               q_osvetleni_dostatecne: {
                 required: true
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
?>