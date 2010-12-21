<?php

function echo_pracoviste_k_auditu($id, $prepinac) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id);
    $row = $result->fetch();

    echo "<table class=\"table\">";
    echo "<tr>
        <td><span class=\"subheader\">STAV</span></td>
        <td><span class=\"subheader\">AKCE</span></td>
        <td><span class=\"subheader\">Pracoviště</span></td>
        <td><span class=\"subheader\">fotografie</span></td>
        <td><span class=\"subheader\">Poslední<br />změna</span></td>
        </tr>";
    //koment
    $result_pracoviste = dibi::query('SELECT * FROM [prevent_firmy_pracoviste_relace] WHERE [id_provozovna] = %i', $row['id_provozovna'], 'ORDER BY [id] ASC');
    while ($row_pracoviste = $result_pracoviste->fetch()) {
        $result_pracoviste2 = dibi::query('SELECT * FROM [prevent_firmy_pracoviste] WHERE [id] = %i', $row_pracoviste['id_pracoviste'], 'ORDER BY [id] ASC');
        $row_pracoviste2 = $result_pracoviste2->fetch();
        $result_pracoviste3 = dibi::query('SELECT * FROM [prevent_audit_pracoviste] WHERE [id_pracoviste] = %i', $row_pracoviste['id_pracoviste'], 'AND [id_audit] = %i', $id);
        $row_pracoviste3 = $result_pracoviste3->fetch();

        if ($row_pracoviste3 == null) {
            $arr['id_pracoviste'] = $row_pracoviste['id_pracoviste'];
            $arr['date'] = Time();
            $arr['stav'] = "nezpracovano";
            $arr['id_audit'] = $id;
            dibi::query('INSERT INTO [prevent_audit_pracoviste]', $arr);
            $result_pracoviste3 = dibi::query('SELECT * FROM [prevent_audit_pracoviste] WHERE [id_pracoviste] = %i', $row_pracoviste['id_pracoviste'], 'AND [id_audit] = %i', $id);
            $row_pracoviste3 = $result_pracoviste3->fetch();
        }

        $text_netykase = "";
        $text_akce = "";

        if ($row_pracoviste3['stav'] == "zpracovano") {
            $text = "zpracováno";
            $styl = "class=\"green\"";
            $text_netykase = "";
            $text_akce = "<a href=\"./provest_audit.php?id=pracoviste_proved&id_audit=" . $id . "&id_pracoviste=" . $row_pracoviste2['id'] . "\">prohlédnout</a><br />";
        } elseif ($row_pracoviste3['stav'] == "nezpracovano" || $row_pracoviste3['stav'] == "") {
            $text = "nezpracováno";
            $styl = "class=\"red\"";
            $text_netykase = "<a href=\"./provest_audit.php?id=pracoviste&id_audit=" . $id . "&netykase=" . $row_pracoviste2['id'] . "\">netýká se</a>";
            $text_akce = "<a href=\"./provest_audit.php?id=pracoviste_proved&id_audit=" . $id . "&id_pracoviste=" . $row_pracoviste2['id'] . "\">provést</a><br />";
        } elseif ($row_pracoviste3['stav'] == "castecne") {
            $text = "zpracováno <br /> částečně";
            $styl = "class=\"orange\"";
            $text_netykase = "";
            $text_akce = "<a href=\"./provest_audit.php?id=pracoviste_proved&id_audit=" . $id . "&id_pracoviste=" . $row_pracoviste2['id'] . "\">provést</a><br />";
        } elseif ($row_pracoviste3['stav'] == "netykase") {
            $text = "netýká se";
            $styl = "class=\"green\"";
            $text_netykase = "<a href=\"./provest_audit.php?id=pracoviste&id_audit=" . $id . "&netykase=" . $row_pracoviste2['id'] . "\">týká se</a>";
            $text_akce = "";
        } elseif ($row_pracoviste3['stav'] == "uzavren_netykase") {
            $text = "zpracováno a netýká se";
            $styl = "class=\"green\"";
            $text_netykase = "";
            $text_akce = "";
        } elseif ($row_pracoviste3['stav'] == "uzavren_zpracovano") {
            $text = "zpracováno a uzavřeno";
            $styl = "class=\"green\"";
            $text_netykase = "";
            $text_akce = "<a href=\"./provest_audit.php?id=pracoviste_proved&id_audit=" . $id . "&id_pracoviste=" . $row_pracoviste2['id'] . "\">prohlédnout</a><br />";
        }
        echo "<tr>
            <td " . $styl . ">" . $text . "</td>
            <td>" . $text_akce . "
                " . $text_netykase . "</td>
            <td>" . $row_pracoviste2['jmeno'] . "</td>
            <td>";
        if ($row['stav_technik'] == "provedl")
            $akce_fotografie = false;
        else
            $akce_fotografie = true;
        echo_fotografie($id, "pracoviste", $row_pracoviste2['id'], $akce_fotografie);
        echo "</td>
            <td>" . Date("H:i:s d.m.Y", $row_pracoviste3['date']) . "</a></td>
            </tr>";
    }

    echo "</table>";
}

function pridat_pracoviste_audit($id_audit) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id_audit);
    $row = $result->fetch();
    if ($_POST['sent']) {


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

        $resultx = dibi::query('SELECT * FROM [prevent_firmy_pracoviste] WHERE [jmeno] = %s', $_POST['jmeno'], 'ORDER BY [id] DESC LIMIT 0, 1');
        $rowx = $resultx->fetch();

        $arr = array('id_pracoviste' => $rowx['id'], 'id_provozovna' => get_id_provozovna_z_audit($id_audit));
        dibi::query('INSERT INTO [prevent_firmy_pracoviste_relace]', $arr);

        $arr_log_firmy = array('text' => 'Přidáno pracoviste s názvem ' . $_POST['jmeno'] . 'v rámci auditu', 'link' => '', 'ad' => get_id_firma_z_audit($id_audit));
        vytvor_log_firmy($arr_log_firmy);

        $arr_log_audit = array('text' => 'Audit byl upraven - přidáno pracoviste s názvem ' . $_POST['jmeno'] . 'v rámci auditu.', 'id_audit' => $id_audit, 'id_provozovna' => get_id_provozovna_z_audit($id_audit));
        vytvor_log_audit($arr_log_audit);

        echo "<div class=\"obdelnik\"><h5>Pracoviště přidáno</h5><p>Pokračujte na <a href=\"./provest_audit.php?id=pracoviste&id_audit=" . $id_audit . "\">audit pracovišť</a>.</p></div>";
    } else {
        echo "<form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" name=\"pridat pracoviště\"  id=\"nove_pracoviste\">
		<input type=\"hidden\" name=\"sent\" value=\"true\">
		<fieldset>
		<legend>Nové pracoviště</legend>
		<label for=\"provozovna\">pobočka</label><br />";
        echo get_nazev_provozovny(get_id_provozovna_z_audit($id_audit), true) . "<br />
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
		<input class=\"tlacitko\" type=\"submit\" value=\"přidat\"> <a href=\"./provest_audit.php?id=pracoviste&id_audit=" . $id_audit . "\">nepřidávat</a>
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

function provest_audit_pracoviste($id_audit, $id_pracoviste) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id_audit);
    $row = $result->fetch();
    $result_pracoviste = dibi::query('SELECT * FROM [prevent_audit_pracoviste] WHERE [id_pracoviste] = %i', $id_pracoviste, 'AND [id_audit] = %i', $id_audit);
    $row_pracoviste = $result_pracoviste->fetch();
    $result_pracoviste2 = dibi::query('SELECT * FROM [prevent_firmy_pracoviste] WHERE [id] = %i', $row_pracoviste['id_pracoviste']);
    $row_pracoviste2 = $result_pracoviste2->fetch();

    $zobraz_audit = true;
    if ($_POST['sent'] && $_POST['neshoda'] != "neshoda" && $_POST['navrh'] != "návrh opatření") {
        $zobraz_audit = true;
        $arr_log = array('text' => 'Audit byl upraven - kontrola pracoviště ' . $row_pracoviste2['jmeno'] . ' přidána další neshoda.', 'id_audit' => $id_audit, 'id_provozovna' => $row['id_provozovna']);
        vytvor_log_audit($arr_log);
        $arr_log_firmy = array('text' => 'Upravena pracoviště s názvem ' . $row_pracoviste2['jmeno'] . ' v  rámci auditu.', 'link' => '', 'ad' => get_id_firma_z_objekt("pracoviste", $id_pracoviste));
        vytvor_log_firmy($arr_log_firmy);

        new_neshoda($id_audit, "pracoviste", $id_pracoviste, $_POST['neshoda'], $_POST['navrh']);

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
        $arr = array('popis' => $_POST['popis'], 'pocet_zamestnancu' => $_POST['pocet_zamestnancu'],
            'chemicke_latky' => $_POST['chemicke_latky'], 'nebezpecne_chemicke_latky' => $_POST['nebezpecne_chemicke_latky'], 'dopravni_prostredky' => $_POST['dopravni_prostredky'], 'dopravni_prostredky_select' => $dopravni_prostredkyx,
            'q_klimatizovano' => $_POST['q_klimatizovano'], 'vytapeni' => $_POST['vytapeni'], 'vytapeni_select' => $vytapenix, 'odsavani' => $_POST['odsavani'], 'osvetleni' => $_POST['osvetleni'],
            'q_osvetleni_dostatecne' => $_POST['q_osvetleni_dostatecne'], 'poznamky' => $_POST['poznamky']);
        dibi::query('UPDATE [prevent_firmy_pracoviste] SET', $arr, 'WHERE [id] = %i', $id_pracoviste);

        $arr = array('zhodnoceni' => $_POST['zhodnoceni'], 'stav' => "zpracovano", 'date' => Time());
        dibi::query('UPDATE [prevent_audit_pracoviste] SET', $arr, 'WHERE [id_pracoviste] = %i', $id_pracoviste, 'AND [id_audit] = %i', $id_audit);
        dibi::query('UPDATE [prevent_audit] SET [date_stav_pracoviste] = %i', Time(), 'WHERE [id] = %i', $id_audit);
    } elseif ($_POST['sent'] && $_POST['neshoda'] == "neshoda" && $_POST['navrh'] == "návrh opatření") {
        $zobraz_audit = false;
        $arr_log = array('text' => 'Audit byl upraven - kontrola pracoviště ' . $row_pracoviste2['jmeno'] . '.', 'id_audit' => $id_audit, 'id_provozovna' => $row['id_provozovna']);
        vytvor_log_audit($arr_log);
        $arr_log_firmy = array('text' => 'Upravena pracoviště s názvem ' . $row_pracoviste2['jmeno'] . ' v  rámci auditu.', 'link' => '', 'ad' => get_id_firma_z_objekt("pracoviste", $id_pracoviste));
        vytvor_log_firmy($arr_log_firmy);

        //new_neshoda($id_audit, "pracoviste", $id_pracoviste, $_POST['neshoda'], $_POST['navrh']);

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
        $arr = array('popis' => $_POST['popis'], 'pocet_zamestnancu' => $_POST['pocet_zamestnancu'],
            'chemicke_latky' => $_POST['chemicke_latky'], 'nebezpecne_chemicke_latky' => $_POST['nebezpecne_chemicke_latky'], 'dopravni_prostredky' => $_POST['dopravni_prostredky'], 'dopravni_prostredky_select' => $dopravni_prostredkyx,
            'q_klimatizovano' => $_POST['q_klimatizovano'], 'vytapeni' => $_POST['vytapeni'], 'vytapeni_select' => $vytapenix, 'odsavani' => $_POST['odsavani'], 'osvetleni' => $_POST['osvetleni'],
            'q_osvetleni_dostatecne' => $_POST['q_osvetleni_dostatecne'], 'poznamky' => $_POST['poznamky']);
        dibi::query('UPDATE [prevent_firmy_pracoviste] SET', $arr, 'WHERE [id] = %i', $id_pracoviste);

        $arr = array('zhodnoceni' => $_POST['zhodnoceni'], 'stav' => "zpracovano", 'date' => Time());
        dibi::query('UPDATE [prevent_audit_pracoviste] SET', $arr, 'WHERE [id_pracoviste] = %i', $id_pracoviste, 'AND [id_audit] = %i', $id_audit);
        dibi::query('UPDATE [prevent_audit] SET [date_stav_pracoviste] = %i', Time(), 'WHERE [id] = %i', $id_audit);

        echo "<div class=\"obdelnik\"><h5>Audit pracoviště upraven</h5><p>Pokračujte na <a href=\"./provest_audit.php?id=pracoviste&id_audit=" . $id_audit . "\">audit pracovišť</a>.</p></div>";
    }

    if ($zobraz_audit) {

        $disabled = "";
        $uzavren = "";

        if ($row_pracoviste['stav'] == "zpracovano" || $row_pracoviste['stav'] == "uzavren_netykase" || $row_pracoviste['stav'] == "uzavren_zpracovano") {
            $odesli = "<label for=\"send\">Audit tohoto pracoviště je uzavřen, nelze jej měnit</label><br /><input class=\"tlacitko\" id=\"send\" type=\"submit\" value=\"uložit\" disabled />";
            $uzavren = "checked";
            $disabled = "disabled";
        }
        $result_pracoviste = dibi::query('SELECT * FROM [prevent_audit_pracoviste] WHERE [id_pracoviste] = %i', $id_pracoviste, 'AND [id_audit] = %i', $id_audit);
        $row_pracoviste = $result_pracoviste->fetch();
        $result = dibi::query('SELECT * FROM [prevent_firmy_pracoviste] WHERE [id] = %i', $_GET['id_pracoviste']);
        $row = $result->fetch();

        echo "<form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" name=\"provest audit pracoviste\" id=\"pracoviste\">
		<input type=\"hidden\" name=\"sent\" value=\"true\">
		<fieldset>
		<legend>Provést kontrolu</legend>
		<label for=\"jmeno\">jméno</label><br />
		" . $row_pracoviste2['jmeno'] . "<br />
                <label>Neshody</neshody</label><br />";
        echo_neshoda_pracoviste($id_pracoviste, $id_audit);
        echo "<label for=\"neshoda\">přidat další neshodu</label> a <label for=\"navrh\">návrh opatření</label><br />
		<textarea name=\"neshoda\" id=\"neshoda\" class=\"formular\" rows=\"5\" cols=\"22\">neshoda</textarea>
                <textarea name=\"navrh\" id=\"navrh\" class=\"formular\" rows=\"5\" cols=\"22\">návrh opatření</textarea><br />
                <input class=\"tlacitko\" id=\"send\" name=\"dalsi_neshoda\" type=\"submit\" value=\"přidat další neshodu\"><br />
                <label for=\"zhodnoceni\">zhodnocení pracoviště</label><br />
		<textarea name=\"zhodnoceni\" id=\"zhodnoceni\" class=\"formular\" rows=\"10\" cols=\"50\">" . $row_pracoviste['zhodnoceni'] . "</textarea><br />
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
                <input class=\"tlacitko\" id=\"send\" type=\"submit\" value=\"potvrdit\"> <a href=\"./provest_audit.php?id=pracoviste&id_audit=" . $id_audit . "\">neukládat</a>
		</fieldset>
		</form>
           <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#pracoviste').validate({
             rules: {
               zhodnoceni: {
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

function netykase_pracoviste($audit, $netykase) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $audit);
    $row = $result->fetch();

    $result2 = dibi::query('SELECT * FROM [prevent_audit_pracoviste] WHERE [id_pracoviste] = %i', $netykase, 'AND [id_audit] = %i', $audit);
    $row2 = $result2->fetch();

    $result3 = dibi::query('SELECT * FROM [prevent_firmy_pracoviste] WHERE [id] = %i', $netykase);
    $row3 = $result3->fetch();

    if ($row2['stav'] == "nezpracovano") {
        $stav = "netykase";
        $hlaska = "netýká se";

        $arr_log = array('text' => 'Upraven audit - pracoviště ' . $row3['jmeno'] . ' - ' . $hlaska . ' auditu', 'id_audit' => $audit, 'id_provozovna' => $row['id_provozovna']);
        vytvor_log_audit($arr_log);

        dibi::query('UPDATE [prevent_audit_pracoviste] SET [date] = %i', Time(), ',[stav] = %s', $stav, 'WHERE [id_pracoviste] = %i', $netykase, 'AND [id_audit] = %i', $audit);
    } elseif ($row2['stav'] != "zpracovano") {
        $stav = "castecne";
        $hlaska = "týká se";

        $arr_log = array('text' => 'Upraven audit - pracoviště ' . $row3['jmeno'] . ' - ' . $hlaska . ' auditu', 'id_audit' => $audit, 'id_provozovna' => $row['id_provozovna']);
        vytvor_log_audit($arr_log);

        dibi::query('UPDATE [prevent_audit_pracoviste] SET [date] = %i', Time(), ',[stav] = %s', $stav, 'WHERE [id_pracoviste] = %i', $netykase, 'AND [id_audit] = %i', $audit);
    }
}

function echo_pracoviste($id, $prepinac) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id);
    $row = $result->fetch();

    $result_pracoviste = dibi::query('SELECT * FROM [prevent_firmy_pracoviste_relace] WHERE [id_provozovna] = %i', $row['id_provozovna'], 'ORDER BY [id] ASC');
    while ($row_pracoviste = $result_pracoviste->fetch()) {
        $result_pracoviste2 = dibi::query('SELECT * FROM [prevent_firmy_pracoviste] WHERE [id] = %i', $row_pracoviste['id_pracoviste'], 'ORDER BY [id] ASC');
        $row_pracoviste2 = $result_pracoviste2->fetch();
        $result_pracoviste3 = dibi::query('SELECT * FROM [prevent_audit_pracoviste] WHERE [id_pracoviste] = %i', $row_pracoviste['id_pracoviste'], 'AND [id_audit] = %i', $id);
        $row_pracoviste3 = $result_pracoviste3->fetch();


        echo "<div class=\"obdelnikchecklist\" align=\"justify\" id=\"plot_full_pracoviste" . $row_pracoviste2['id'] . "\" style=\"display: none;\">
            <table class=\"table\">
            <tr>
                <td><span class=\"subheader\">AKCE</span></td>
                <td><a href=\"#\" onClick=\"return show_hide('plot_full_pracoviste" . $row_pracoviste2['id'] . "','plot_short_pracoviste" . $row_pracoviste2['id'] . "')\">zavřít</a></td>
            </tr>
            <tr>
                <td><span class=\"subheader\">PRACOVIŠTĚ</span></td>
                <td>" . $row_pracoviste2['jmeno'] . "</td>
            </tr>
            <tr>
                <td><span class=\"subheader\">POPIS</span></td>
                <td>" . $row_pracoviste3['popis'] . "</td>
            </tr>
            <tr>
                <td><span class=\"subheader\">POZNÁMKY</span></td>
                <td>" . $row_pracoviste3['poznamky'] . "</td>
            </tr>
            </table>
            </div>";
    }

    echo "<table class=\"table\">";
    echo "<tr>
        <td><span class=\"subheader\">STAV</span></td>
        <td><span class=\"subheader\">AKCE</span></td>
        <td><span class=\"subheader\">Pracoviště</span></td>
        <td><span class=\"subheader\">fotografie</span></td>
        <td><span class=\"subheader\">Poslední<br />změna</span></td>
        </tr>";
    //koment
    $result_pracoviste = dibi::query('SELECT * FROM [prevent_firmy_pracoviste_relace] WHERE [id_provozovna] = %i', $row['id_provozovna'], 'ORDER BY [id] ASC');
    while ($row_pracoviste = $result_pracoviste->fetch()) {
        $result_pracoviste2 = dibi::query('SELECT * FROM [prevent_firmy_pracoviste] WHERE [id] = %i', $row_pracoviste['id_pracoviste'], 'ORDER BY [id] ASC');
        $row_pracoviste2 = $result_pracoviste2->fetch();
        $result_pracoviste3 = dibi::query('SELECT * FROM [prevent_audit_pracoviste] WHERE [id_pracoviste] = %i', $row_pracoviste['id_pracoviste'], 'AND [id_audit] = %i', $id);
        $row_pracoviste3 = $result_pracoviste3->fetch();

        if ($row_pracoviste3 == null) {
            $arr['id_pracoviste'] = $row_pracoviste['id_pracoviste'];
            $arr['date'] = Time();
            $arr['stav'] = "nezpracovano";
            $arr['id_audit'] = $id;
            dibi::query('INSERT INTO [prevent_audit_pracoviste]', $arr);
            $result_pracoviste3 = dibi::query('SELECT * FROM [prevent_audit_pracoviste] WHERE [id_pracoviste] = %i', $row_pracoviste['id_pracoviste'], 'AND [id_audit] = %i', $id);
            $row_pracoviste3 = $result_pracoviste3->fetch();
        }

        if ($row_pracoviste3['stav'] == "zpracovano") {
            $text = "zpracováno";
            $styl = "class=\"green\"";
            $text_netykase = "<a href=\"./provest_audit.php?id=pracoviste&id_audit=" . $id . "&netykase=" . $row_pracoviste2['id'] . "\">netýká se</a>";
        } elseif ($row_pracoviste3['stav'] == "nezpracovano" || $row_pracoviste3['stav'] == "") {
            $text = "nezpracováno";
            $styl = "class=\"red\"";
            $text_netykase = "<a href=\"./provest_audit.php?id=pracoviste&id_audit=" . $id . "&netykase=" . $row_pracoviste2['id'] . "\">netýká se</a>";
        } elseif ($row_pracoviste3['stav'] == "castecne") {
            $text = "zpracováno <br /> částečně";
            $styl = "class=\"orange\"";
            $text_netykase = "<a href=\"./provest_audit.php?id=pracoviste&id_audit=" . $id . "&netykase=" . $row_pracoviste2['id'] . "\">netýká se</a>";
        } elseif ($row_pracoviste3['stav'] == "netykase") {
            $text = "netýká se";
            $styl = "class=\"green\"";
            $text_netykase = "<a href=\"./provest_audit.php?id=pracoviste&id_audit=" . $id . "&netykase=" . $row_pracoviste2['id'] . "\">týká se</a>";
        } elseif ($row_pracoviste3['stav'] == "uzavren_netykase") {
            $text = "zpracováno a netýká se";
            $styl = "class=\"green\"";
            $text_netykase = "";
        } elseif ($row_pracoviste3['stav'] == "uzavren_zpracovano") {
            $text = "zpracováno a uzavřeno";
            $styl = "class=\"green\"";
            $text_netykase = "";
        }
        echo "
            <div align=\"justify\" id=\"plot_short_pracoviste" . $row_pracoviste2['id'] . "\">
            <tr>
            <td " . $styl . ">" . $text . "</td>
            <td><a href=\"#\" onClick=\"return show_hide('plot_short_pracoviste" . $row_pracoviste2['id'] . "','plot_full_pracoviste" . $row_pracoviste2['id'] . "')\">zobrazit</a></td>
            <td><a href=\"./pracoviste.php?id=detaily&id_pracoviste=" . $row_pracoviste2['id'] . "\">" . $row_pracoviste2['jmeno'] . "</a></td>
            <td>";
        if ($row['stav_technik'] == "provedl")
            $akce_fotografie = false;
        else
            $akce_fotografie = true;
        echo_fotografie($id, "pracoviste", $row_pracoviste2['id'], $akce_fotografie);
        echo "</td>
            <td>" . Date("H:i:s d.m.Y", $row_pracoviste3['date']) . "</a></td>
            </tr>
            </div>";
    }

    echo "</table>";
}

function pracoviste_zpracovano($id_audit) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id_audit);
    $row = $result->fetch();

    $uzavrit_true = true;
    $result_check = dibi::query('SELECT * FROM [prevent_firmy_pracoviste_relace] WHERE [id_provozovna] = %i', get_id_provozovna_z_audit($id_audit));
    while ($row_check = $result_check->fetch()) {
        if ($result_check->count() < 1)
            return false;
        $result_check2 = dibi::query('SELECT * FROM [prevent_audit_pracoviste] WHERE [id_pracoviste] = %i', $row_check['id_pracoviste'], 'AND [id_audit] = %i', $id_audit);
        $row_check2 = $result_check2->fetch();

        if (($row_check2['stav'] == "netykase" || $row_check2['stav'] == "zpracovano") && $uzavrit_true) {
            $uzavrit_true = true;
        } else {
            $uzavrit_true = false;
        }
    }
    return $uzavrit_true;
}
?>
