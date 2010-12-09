<?php

function kontrola_pobocka_nahled() {
    $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [id] = %i', get_id_provozovna_z_audit($_GET['id_audit']));
    $row = $result->fetch();

    $disabled = "disabled";

    echo "<form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" name=\"audit pobočky\">
            <input type=\"hidden\" name=\"kontrola_pobocka\" value=\"odeslano\">
		<fieldset>
		<legend>" . $row['nazev'] . "</legend>
		<label for=\"adresa\">adresa pobočky</label><br />
		<textarea name=\"adresa\" id=\"adresa\" class=\"formular\" row=\"5\" cols=\"50\" $disabled>" . $row['adresa'] . "</textarea><br />
                <label for=\"popis\">popis  činnosti na pobočce</label><br />
                <textarea name=\"popis\" id=\"popis\" class=\"formular\" rows=\"10\" cols=\"50\" $disabled>" . $row['popis'] . "</textarea><br />
                <label for=\"zastupce\">Vedoucí pobočky</label><br />";
    echo_name_osoba($row['id'], "provozovna", "z_zastupce_provozovna", "");
    echo "<br />
                <label for=\"kontaktni_osoba\">Kontaktní osoba</label><br />
                <input name=\"kontaktni_osoba\" id=\"kontaktni_osoba\" size=\"50\" value=\"" . $row['kontaktni_osoba'] . "\" class=\"formular\" $disabled /><br />
		<label for=\"telefon\">telefon</label><br />
		<input name=\"telefon\" id=\"telefon\" size=\"50\" value=\"" . $row['telefon'] . "\" class=\"formular\" $disabled/><br />
                <label for=\"email\">email</label><br />
		<input name=\"email\" id=\"email\" size=\"50\" value=\"" . $row['email'] . "\" class=\"formular\" $disabled /><br />
		<label for=\"poznamky\">poznámky</label><br />
		<textarea name=\"poznamky\" id=\"poznamky\" class=\"formular\"  rows=\"10\" cols=\"50\" $disabled>" . $row['poznamky'] . "</textarea><br />
		<input class=\"tlacitko$disabled\" type=\"submit\" value=\"potvrdit\" $disabled />
		</fieldset>
		</form>";
}

function vyber_checklist_nahled($id) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id);
    $row = $result->fetch();

    $disabled = "disabled";



    if ($row['stav_technik'] == "provedl")
        $akce_fotografie = false;
    else
        $akce_fotografie = true;

    $result_check_1 = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [verze] = %i', $row['verze'], ' ORDER BY [cislo] ASC');
    while ($row_check_1 = $result_check_1->fetch()) {
        $result_check_kategorie = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie] WHERE [id_audit] = %i', $id, 'AND [id_kat] = %i', $row_check_1['id']);
        $row_check_kategorie = $result_check_kategorie->fetch();
        if (!$row_check_kategorie) {
            $arr['id_audit'] = $id;
            $arr['id_kat'] = $row_check_1['id'];
            $arr['stav'] = "nezpracovano";
            dibi::query('INSERT INTO [prevent_audit_checklist_kategorie]', $arr);

            $result_check_kategorie = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie] WHERE [id_audit] = %i', $id, 'AND [id_kat] = %i', $row_check_1['id']);
            $row_check_kategorie = $result_check_kategorie->fetch();
        }
        echo "<ul>";
        if ($row_check_kategorie['stav'] == "zpracovano") {
            $link_na_cast_checklistu = "<a href=\"./nahled_audit.php?id_audit=" . $row['id'] . "&id=checklist_vyber&selection=" . $row_check_1['id'] . "\">" . $row_check_1['cislo'] . ". " . $row_check_1[kat_jmeno] . "</a>";
            $text_stav = "okruh zpracován kompletně";
            $hlaska_netykase = "";
            $checked = "checked";
            $readonly = "readonly";


            if ($row_check_kategorie['date'] == 0)
                $datehlaska = "zatím neproběhla";
            else
                $datehlaska = Date("H:i d.m.Y", $row_check_kategorie['date']);

            echo "<li><input type=\"checkbox\" name=\"tykanetykapole[" . $row_check_1[id] . "]\" value=\"ano\" " . $checked . " " . $readonly . " $disabled>" . $link_na_cast_checklistu . " - <b>" . $text_stav . "</b> ";
            //. $hlaska_netykase . "
            echo "<p><i>poslední změna:</i> " . $datehlaska . "<br />
        <i>komentář:</i> " . $row_check_kategorie['komentar'] . "<br />";

            echo_fotografie($row_check_kategorie['id_audit'], "checklist", $row_check_kategorie['id'], $akce_fotografie);
            echo "
        </li>";
        }
        echo "</ul>";
    }
}

function provest_checklist_nahled($id, $selection) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id);
    $row = $result->fetch();

    $disabled = "disabled";

    if ($selection == "vse")
        $result_check_1 = dibi::query('SELECT * FROM [prevent_audit_checklistkategorie_schema] WHERE [verze] = %i', $row['verze'], ' ORDER BY [cislo] ASC');
    else
        $result_check_1 = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [id] = %i', $selection, 'ORDER BY [cislo] ASC');

    while ($row_check_1 = $result_check_1->fetch()) {
        $result_check_kategorie = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie] WHERE [id_audit] = %i', $id, 'AND [id_kat] = %i', $row_check_1['id']);
        $row_check_kategorie = $result_check_kategorie->fetch();

        echo "<table class=\"table\">";
        echo "<tr>
        <td><span class=\"subheader\">" . $row_check_1['cislo'] . ". " . $row_check_1[kat_jmeno] . "</td>
        <td><span class=\"subheader\">A</span></td>
        <td><span class=\"subheader\">NT</span></td>
        <td><span class=\"subheader\">Č</span></td>
        <td><span class=\"subheader\">N</span></td>
        <td><span class=\"subheader\">Z</span></td>
        <td><span class=\"subheader\">komentář</span></td>
        <td><span class=\"subheader\">poznámka<br />mimo<br />protokol</span></td>
        </tr>";

        $procenta_castecne = 0;
        $pocet_ano = 0;
        $pocet_ne = 0;
        $pocet_netyka = 0;
        $pocet_castecne = 0;
        $pocet_vsech = 0;

        $result_check_2 = dibi::query('SELECT * FROM [prevent_audit_checklist_schema] WHERE [id_kat] = %i', $row_check_1['id'], ' AND [verze] = %i', $row['verze'], 'ORDER BY [cislo] ASC');
        while ($row_check_2 = $result_check_2->fetch()) {

            $result_check_3 = dibi::query('SELECT * FROM [prevent_audit_checklist] WHERE [id_audit] = %i', $id, 'AND [id_otazka] = %i', $row_check_2['id']);
            $row_check_3 = $result_check_3->fetch();

            if (!$row_check_3) {
                $arr['id_audit'] = $id;
                $arr['id_otazka'] = $row_check_2['id'];
                dibi::query('INSERT INTO [prevent_audit_checklist]', $arr);

                $result_check_3 = dibi::query('SELECT * FROM [prevent_audit_checklist] WHERE [id_audit] = %i', $id, 'AND [id_otazka] = %i', $row_check_2['id']);
                $row_check_3 = $result_check_3->fetch();
            }

            $poleotazky = explode(" ", $row_check_2['text']);
            //výpočet
            $komplet_pole = "";
            $ano_pole = "";
            $ano_text = "";
            $netyka_pole = "";
            $netyka_text = "";
            $castecne_pole = "";
            $castecne_text = "";
            $ne_pole = "";
            $ne_text = "";
            $check_ano = "";
            $check_castecne = "";
            $check_netyka = "";
            $check_ne = "";

            $pocet_vsech++;

            if ($row_check_3['odpoved'] == "ano") {
                $ano_pole = "class=\"green\"";
                $ano_text = "X";
                $pocet_ano++;
                $check_ano = "checked=\"checked\"";
            } elseif ($row_check_3['odpoved'] == "netyka") {
                $netyka_pole = "class=\"green\"";
                $netyka_text = "X";
                $pocet_netyka++;
                $check_netyka = "checked=\"checked\"";
            } elseif ($row_check_3['odpoved'] == "castecne") {
                $castecne_pole = "class=\"orange\"";
                $castecne_text = $row_check_3['castecne'] . "%";
                $pocet_castecne++;
                $procenta_castecne += $row_check_3['castecne'];
                $check_castecne = "checked=\"checked\"";
            } elseif ($row_check_3['odpoved'] == "ne") {
                $ne_pole = "class=\"red\"";
                $ne_text = "X";
                $pocet_ne++;
                $check_ne = "checked=\"checked\"";
            } elseif ($row_check_3['odpoved'] == "") {
                $komplet_pole = "class=\"grey\"";
                $check_netyka = "";
            }

            echo "<tr " . $komplet_pole . ">
            <td><span class=\"subheader\">" . $row_check_2['cislo'] . ". ";
            for ($i = 0; $i < count($poleotazky); $i++) {
                echo $poleotazky[$i] . " ";
                if ($i % 6 == 4)
                    echo "<br />";
            }
            echo "</span></td>
            <td " . $ano_pole . "><input class=\"formular\" type=\"radio\" name=\"odpovedi[" . $row_check_3['id'] . "]\" value=\"ano\" " . $check_ano . " $disabled /></td>
            <td " . $netyka_pole . "><input class=\"formular\" type=\"radio\" name=\"odpovedi[" . $row_check_3['id'] . "]\" value=\"netyka\" " . $check_netyka . "$disabled /></td>
            <td " . $castecne_pole . "><input class=\"formular\" type=\"radio\" name=\"odpovedi[" . $row_check_3['id'] . "]\" value=\"castecne\" " . $check_castecne . "$disabled />
                                   <input type=\"text\" maxlength=\"2\"  class=\"formular\" size=\"3\" name=\"odpovedi_castecne[" . $row_check_3['id'] . "]\" value=\"" . $row_check_3['castecne'] . "\"$disabled /> </td>
            <td " . $ne_pole . "><input class=\"formular\" type=\"radio\" name=\"odpovedi[" . $row_check_3['id'] . "]\" value=\"ne\" " . $check_ne . "$disabled /></td>
            <td>" . $row_check_2['zavaznost'] . "</td>
            <td>";
            echo "<a href=\"./nove_okno_form.php?id=checklist_komentar_k_otazce&disabled=ano&id_audit=" . $row['id'] . "&id_otazka=" . $row_check_3['id'] . "\" target=\"_blank\">zobrazit komentář</a></td>";


            echo "<td><a href=\"./nove_okno_form.php?id=checklist_poznamka_k_otazce_mimo_protokol&disabled=ano&id_audit=" . $row['id'] . "&id_otazka=" . $row_check_3['id'] . "\" target=\"_blank\">zobrazit poznámku</a></td>";
            echo "</tr>";
        }
        echo "<tr><td><span class=\"subheader\">celkem</span></td>
            <td>" . $pocet_ano . " z " . $pocet_vsech . "</td>
            <td>" . $pocet_netyka . " z " . $pocet_vsech . "</td>
            <td>" . round(($procenta_castecne + ($pocet_ano * 100)) / $pocet_vsech, 2) . "% z 100%</td>
            <td>" . $pocet_ne . " z " . $pocet_vsech . "</td>
            <td></td>
            <td></td>
            <td></td>
            </tr>";
        echo "</table>";
        echo "<br />
        <label for=\"komentar_" . $row_check_kategorie['id'] . "\">komentář checklistu mimo protokol</label><br />
        <textarea id=\"komentar_" . $row_check_kategorie['id'] . "\" class=\"formular\" rows=\"6\" cols=\"40\" name=\"komentar\" $disabled>" . $row_check_kategorie['komentar'] . "</textarea><br />
	<br />";
    }
}

function echo_pracoviste_k_auditu_nahled($id, $prepinac) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id);
    $row = $result->fetch();

    $disabled = "disabled";

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
            $text_akce = "<a href=\"./nahled_audit.php?id=pracoviste_proved&id_audit=" . $id . "&id_pracoviste=" . $row_pracoviste2['id'] . "\">prohlédnout</a><br />";
        } elseif ($row_pracoviste3['stav'] == "netykase") {
            $text = "netýká se";
            $styl = "class=\"green\"";
            $text_netykase = "<a href=\"./nahled_audit.php?id=pracoviste&id_audit=" . $id . "&netykase=" . $row_pracoviste2['id'] . "\">týká se</a>";
            $text_akce = "";
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

function provest_audit_pracoviste_nahled($id_audit, $id_pracoviste) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id_audit);
    $row = $result->fetch();
    $result_pracoviste = dibi::query('SELECT * FROM [prevent_audit_pracoviste] WHERE [id_pracoviste] = %i', $id_pracoviste, 'AND [id_audit] = %i', $id_audit);
    $row_pracoviste = $result_pracoviste->fetch();
    $result_pracoviste2 = dibi::query('SELECT * FROM [prevent_firmy_pracoviste] WHERE [id] = %i', $row_pracoviste['id_pracoviste']);
    $row_pracoviste2 = $result_pracoviste2->fetch();

    $disabled = "disabled";

    $result = dibi::query('SELECT * FROM [prevent_firmy_pracoviste] WHERE [id] = %i', $_GET['id_pracoviste']);
    $row = $result->fetch();

    echo "<form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" name=\"provest audit pracoviste\">
		<input type=\"hidden\" name=\"sent\" value=\"true\">
		<fieldset>
		<legend>Provést kontrolu</legend>
		<label for=\"jmeno\">jméno</label><br />
		" . $row_pracoviste2['jmeno'] . "<br />
                <label>Neshody</neshody</label><br />";
    echo_neshoda_pracoviste($id_pracoviste, $id_audit);
    echo "<label for=\"neshoda\">přidat další neshodu</label> a <label for=\"navrh\" >návrh opatření</label><br />
		<textarea name=\"neshoda\" id=\"neshoda\" class=\"formular\" rows=\"5\" cols=\"22\" $disabled>neshoda</textarea>
                <textarea name=\"navrh\" id=\"navrh\" class=\"formular\" rows=\"5\" cols=\"22\" $disabled>návrh opatření</textarea><br />
                <input class=\"tlacitko$disabled\" id=\"send\" name=\"dalsi_neshoda\" type=\"submit\" value=\"přidat další neshodu\" $disabled><br />
                <label for=\"zhodnoceni\">zhodnocení pracoviště</label><br />
		<textarea name=\"zhodnoceni\" id=\"zhodnoceni\" class=\"formular\" rows=\"10\" cols=\"50\" $disabled>" . $row_pracoviste['zhodnoceni'] . "</textarea><br />
		<label for=\"popis\">popis pracoviště</label><br />
		<textarea name=\"popis\" id=\"popis\" class=\"formular\" rows=\"10\" cols=\"50\" $disabled>" . $row['popis'] . "</textarea><br />
		<label for=\"pocet_zamestnancu\">počet zaměstnanců</label><br />
		<input name=\"pocet_zamestnancu\" id=\"pocet_zamestnancu\" class=\"formular\" size=\"10\" value=\"" . $row['pocet_zamestnancu'] . "\"/ $disabled><br />
		<label for=\"chemicke_latky\">chemické látky</label><br />
		<textarea name=\"chemicke_latky\" id=\"chemicke_latky\" class=\"formular\" rows=\"10\" cols=\"50\" $disabled>" . $row['chemicke_latky'] . "</textarea><br />
		<label for=\"nebezpecne_chemicke_latky\">nebezpečné chemické látky</label><br />
		<textarea name=\"nebezpecne_chemicke_latky\" id=\"nebezpecne_chemicke_latky\" class=\"formular\" rows=\"10\" cols=\"50\" $disabled>" . $row['nebezpecne_chemicke_latky'] . "</textarea><br />
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
    echo "<select name=\"dopravni_prostredky_select[]\" multiple=\"multiple\" id=\"dopravni_prostredky_select\" class=\"formular\" $disabled>
                <option value=\"jiné\" $dopravni_prostredky_select_jine>--- jiné ---</option>
                <option value=\"VZZ\" $dopravni_prostredky_select_vvz>VZZ</option>
                <option value=\"nákladní automobily do 3,5t\" $dopravni_prostredky_select_nakl_do_3>nákladní automobily do 3,5t</option>
                <option value=\"nákladní automobily nad 3,5t\" $dopravni_prostredky_select_nakl_nad_3>nákladní automobily nad 3,5t</option>
                <option value=\"osobní automobil\" $dopravni_prostredky_select_osobak>osobní automobil</option>
                <option value=\"traktory\" $dopravni_prostredky_select_traktor>traktory</option>
                <option value=\"speciální dopravní prostředky\" $dopravni_prostredky_select_special>speciální dopravní prostředky</option>
                </select> <label for=\"dopravni_prostredky\">nebo jiné</label><br />
                <textarea name=\"dopravni_prostredky\" id=\"dopravni_prostredky\" class=\"formular\" rows=\"5\" cols=\"50\" $disabled>" . $row['dopravni_prostredky'] . "</textarea><br />
		<label for=\"q_klimatizovano_ano\">Je pracoviště klimatizováno?</label><br />";
    if ($row['q_klimatizovano'] == "ano")
        $checked_q_klimatizovano_ano = "checked";
    elseif ($row['q_klimatizovano'] == "ne")
        $checked_q_klimatizovano_ne = "checked";
    echo "<input type=\"radio\" id=\"q_klimatizovano_ano\" $checked_q_klimatizovano_ano name=\"q_klimatizovano\" value=\"ano\" $disabled><label for=\"q_klimatizovano_ano\">ano</label> / <input type=\"radio\" id=\"q_klimatizovano_ne\" $checked_q_klimatizovano_ne name=\"q_klimatizovano\" value=\"ne\" $disabled><label for=\"q_klimatizovano_ne\>ne</label><br />
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
    echo "<select name=\"vytapeni_select[]\" multiple=\"multiple\" id=\"vytapeni_select\" class=\"formular\" $disabled>
                <option value=\"jiné\" $vytapeni_select_jine>--- jiné ---</option>
                <option value=\"plynem\" $vytapeni_select_plynem>plynem</option>
                <option value=\"elektrickou energií\" $vytapeni_select_elektrika>elektrickou energií</option>
                <option value=\"tuhými palivy\" $vytapeni_select_tuha>tuhými palivy</option>
                <option value=\"infrazářiči\" $vytapeni_select_infra>infrazářiči</option>
                <option value=\"dálkový přenos tepla\" $vytapeni_select_dalka>dálkový přenos tepla</option>
                </select> <label for=\"vytapeni\">nebo jiné</label><br />
		<textarea name=\"vytapeni\" id=\"vytapeni\" class=\"formular\" rows=\"5\" cols=\"50\" $disabled>" . $row['vytapeni'] . "</textarea><br />
		<label for=\"odsavani\">odsávání</label><br />
		<textarea name=\"odsavani\" id=\"odsavani\" class=\"formular\" rows=\"10\" cols=\"50\" $disabled>" . $row['odsavani'] . "</textarea><br />
		<label for=\"osvetleni\">osvětlení</label><br />
		<textarea name=\"osvetleni\" id=\"osvetleni\" class=\"formular\" rows=\"10\" cols=\"50\" $disabled>" . $row['osvetleni'] . "</textarea><br />
		<label for=\"q_osvetleni_dostatecne_ano\">Je osvětlení dostatečné?</label><br />";
    if ($row['q_osvetleni_dostatecne'] == "ano")
        $checked_q_osvetleni_dostatecne_ano = "checked";
    elseif ($row['q_osvetleni_dostatecne'] == "ne")
        $checked_q_osvetleni_dostatecne_ne = "checked";
    echo "<input type=\"radio\" id=\"q_osvetleni_dostatecne_ano\" $checked_q_osvetleni_dostatecne_ano name=\"q_osvetleni_dostatecne\" value=\"ano\" $disabled><label for=\"q_osvetleni_dostatecne_ano\">ano</label> / <input type=\"radio\" id=\"q_osvetleni_dostatecne_ne\" $checked_q_osvetleni_dostatecne_ne  name=\"q_osvetleni_dostatecne\" value=\"ne\" $disabled><label for=\"q_osvetleni_dostatecne_ne\">ne</label><br />
		<label for=\"poznamky\">poznámky</label><br />
		<textarea name=\"poznamky\" id=\"poznamky\" class=\"formular\" rows=\"10\" cols=\"50\" $disabled>" . $row['poznamky'] . "</textarea><br />
                <input class=\"tlacitko$disabled\" id=\"send\" type=\"submit\" value=\"potvrdit\" $disabled> <a href=\"./nahled_audit.php?id=pracoviste&id_audit=" . $id_audit . "\">zpět na audit pracovišť</a>
		</fieldset>
		</form>";
}

function echo_neshody_nahled($id, $prepinac) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id);
    $row = $result->fetch();

    $disabled = "disabled";

    echo "<form method=\"POST\" id=\"formvyber\" action=\"./provest_audit.php?id_audit=" . $_GET['id_audit'] . "&id=neshody&akce_tyka_netyka=ano\" >";
    echo "<table class=\"table\">";
    echo "<tr>
        <td><span class=\"subheader\">STAV</span></td>
        <td><span class=\"subheader\">AKCE</span></td>
        <td><span class=\"subheader\">neshoda</span></td>
        <td><span class=\"subheader\">komentář</span></td>
        <td><span class=\"subheader\">navrhované<br />opatření</span></td>
        <td><span class=\"subheader\">poslední<br />změna</span></td>
        </tr>";

    $result_neshody = dibi::query('SELECT * FROM [prevent_audit_neshody] WHERE [id_audit] = %i', $id, 'ORDER BY [id] ASC');
    while ($row_neshody = $result_neshody->fetch()) {
        if ($row_neshody['id_otazka'] != null) {



            $result_check_audit = dibi::query('SELECT * FROM [prevent_audit_checklist] WHERE [id] = %i', $row_neshody['id_otazka']);
            $row_check_audit = $result_check_audit->fetch();

            $result_check_1 = dibi::query('SELECT * FROM [prevent_audit_checklist_schema] WHERE [id] = %i', $row_check_audit['id_otazka']);
            $row_check_1 = $result_check_1->fetch();

            $result_check_2 = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [id] = %i', $row_check_1['id_kat']);
            $row_check_2 = $result_check_2->fetch();

            if ($row_check_audit['odpoved'] == "castecne")
                $odpoved = "<br /><strong>ODPOVĚĎ</strong>: částečně (" . $row_check_audit['castecne'] . "%)";
            else
                $odpoved = "<br /><strong>ODPOVĚĎ</strong>: ne";

            $text_puvod = "<strong>CHECKLIST</strong>: " . $row_check_2['cislo'] . ". " . $row_check_2['kat_jmeno'] . ": " . $row_check_1['cislo'] . ". " . $row_check_1['text'] . $odpoved;
        }
        elseif ($row_neshody['id_pracoviste'] != null) {
            $text_puvod = "<strong>PRACOVIŠTĚ</strong> - <em>" . get_jmeno_objekt("pracoviste", $row_neshody['id_pracoviste']) . "</em>: " . $row_neshody['neshoda'];
        }

        if ($row_neshody['stav'] == "zpracovano") {
            $text = "zpracováno";
            $styl = "class=\"green\"";
            $checked = "checked";
            $readonly = "readonly";
        } elseif ($row_neshody['stav'] == "nezpracovano" || $row_neshody['stav'] == "") {
            $text = "nezpracováno";
            $styl = "class=\"red\"";
            $checked = "";
            $readonly = "";
        }

        echo "<tr>
        <td " . $styl . ">" . $text . "</td>
        <td><a href=\"./nahled_audit.php?id=neshoda&id_audit=" . $_GET['id_audit'] . "&neshoda=" . $row_neshody['id'] . "\">prohlédnout</a><br /><label for=\"tykanetykapole" . $row_neshody['id'] . "\">potvrdit</label><input type=\"checkbox\" name=\"tykanetykapole[" . $row_neshody['id'] . "]\" id=\"tykanetykapole" . $row_neshody['id'] . "\"  value=\"ano\" " . $checked . " " . $readonly . " $disabled></td>
            <td>" . $text_puvod . "</td>
        <td>" . $row_neshody['komentar'] . "</td>
            <td>" . $row_neshody['opatreni'] . "</td>

        <td>" . Date("H:i d.m.Y", $row_neshody['date']) . "</td>
        </tr>";
    }

    echo "</table>";
}

function provest_neshoda_nahled($id) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $_GET['id_audit']);
    $row = $result->fetch();

    $disabled = "disabled";

    $result_neshody = dibi::query('SELECT * FROM [prevent_audit_neshody] WHERE [id] = %i', $_GET['neshoda'], 'ORDER BY [id] ASC');
    while ($row_neshody = $result_neshody->fetch()) {
        if ($row_neshody['id_otazka'] != null) {


            $result_check_audit = dibi::query('SELECT * FROM [prevent_audit_checklist] WHERE [id] = %i', $row_neshody['id_otazka']);
            $row_check_audit = $result_check_audit->fetch();

            $result_check_1 = dibi::query('SELECT * FROM [prevent_audit_checklist_schema] WHERE [id] = %i', $row_check_audit['id_otazka']);
            $row_check_1 = $result_check_1->fetch();

            $result_check_2 = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [id] = %i', $row_check_1['id_kat']);
            $row_check_2 = $result_check_2->fetch();

            if ($row_check_audit['odpoved'] == "castecne")
                $odpoved = "<br /><strong>ODPOVĚĎ</strong>: částečně (" . $row_check_audit['castecne'] . "%)";
            else
                $odpoved = "<br /><strong>ODPOVĚĎ</strong>: ne";

            $text_puvod = "<strong>CHECKLIST</strong>: " . $row_check_2['cislo'] . ". " . $row_check_2['kat_jmeno'] . ": " . $row_check_1['cislo'] . ". " . $row_check_1['text'] . $odpoved;
        }
        elseif ($row_neshody['id_pracoviste'] != null) {

            $text_puvod = "<strong>PRACOVIŠTĚ</strong> - <em>" . get_jmeno_objekt("pracoviste", $row_neshody['id_pracoviste']) . "</em>: " . $row_neshody['neshoda'];
        }

        if ($row_neshody['stav'] == "zpracovano") {
            $text = "zpracováno";
            $styl = "class=\"green\"";
        } elseif ($row_neshody['stav'] == "nezpracovano" || $row_neshody['stav'] == "") {
            $text = "nezpracováno";
            $styl = "class=\"red\"";
        }
    }
    $result_neshody = dibi::query('SELECT * FROM [prevent_audit_neshody] WHERE [id] = %i', $id);
    $row_neshody = $result_neshody->fetch();




    echo "<form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" name=\"provest audit neshoda\">
		<input type=\"hidden\" name=\"sent\" value=\"true\">
		<fieldset>
		<legend>Neshoda</legend>
		<label for=\"jmeno\">Původ neshody</label><br />
		" . $text_puvod . "<br />
                 <label for=\"komentar\">Komentář</label><br />
                 <textarea name=\"komentar\" id=\"komentar\" class=\"formular\" rows=\"10\" cols=\"50\" $disabled>" . $row_neshody['komentar'] . "</textarea><br />
                <label for=\"opatreni\">Návrh opatření</label><br />
		<textarea name=\"opatreni\" id=\"opatreni\" class=\"formular\" rows=\"10\" cols=\"50\" $disabled>" . $row_neshody['opatreni'] . "</textarea><br />";
    echo "       <input class=\"tlacitko$disabled\" id=\"send\" type=\"submit\" value=\"uložit\" $disabled><a href=\"./nahled_audit.php?id=neshody&id_audit=" . $_GET['id_audit'] . "\">zpět na neshody</a>
		</fieldset>
		</form>";
}

function echo_protokol_k_auditu_nahled($id_audit) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id_audit);
    $row = $result->fetch();

    $result2 = dibi::query('SELECT * FROM [prevent_audit_protokoly] WHERE [id_audit] = %i', $id_audit);
    $row2 = $result2->fetch();

    $disabled_celek = "disabled";

    if ($row2['stav_celek'] == "zpracovano") {
        $odesli_celek = "<label for=\"send\">Protokol je uzavřen, nelze jej měnit</label>";
        $uzavren_celek = "checked";
        $disabled_celek = "disabled";
    }
    echo "<form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" name=\"provest audit pracoviste\">
		<input type=\"hidden\" name=\"sent\" value=\"true\">";
    echo "
    <fieldset>
    <legend>Komentář</legend>
		<label for=\"misto\">Místo auditu</label><br />
                <textarea name=\"misto\" id=\"misto\" class=\"formular\" rows=\"10\" cols=\"50\" $disabled_celek>" . $row2['misto'] . "</textarea><br />
		<label for=\"cas\">Čas auditu</label><br />" .
    Date("H:i:s d.m.Y", $row2['date']) . "<br />
		<label for=\"auditor\">Jméno auditora popř. složení auditorského týmu</label><br />
                <textarea name=\"auditor\" id=\"auditor\" class=\"formular\" rows=\"10\" cols=\"50\" $disabled_celek>" . $row2['auditor'] . "</textarea><br />
		<label for=\"ucastnici\">Účastníci za klienta</label><br />
                <textarea name=\"ucastnici\" id=\"ucastnici\" class=\"formular\" rows=\"10\" cols=\"50\" $disabled_celek>" . $row2['ucastnici'] . "</textarea><br />
		<label for=\"popis\">Popis průběhu auditu</label><br />
                <textarea name=\"popis\" id=\"popis\" class=\"formular\" rows=\"10\" cols=\"50\" $disabled_celek>" . $row2['popis'] . "</textarea><br />
		<label for=\"zhodnoceni\">stručné slovní zhodnocení auditu s upozorněním na nejdůležitější neshody a doporučení dalšího postupu</label><br />
                <textarea name=\"zhodnoceni\" id=\"zhodnoceni\" class=\"formular\" rows=\"10\" cols=\"50\" $disabled_celek>" . $row2['zhodnoceni'] . "</textarea><br />
                <label for=\"uzavrit_celek\">Uzavřít audit! Audit bude označen za provedený a předán koordinátorovi k připomínkování. Již ho dále nebudete moct editovat.</label><br />
                <input type=\"checkbox\" id=\"uzavrit_celek\" class=\"formular\" name=\"uzavrit_celek\" value=\"ano\" " . $uzavren_celek . " $disabled_celek><br />
                <input type=\"submit\" class=\"tlacitko$disabled_celek\" value=\"uložit\" $disabled_celek/>
                </fieldset>
		</form>";
}

function akce_nahled() {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $_GET['id_audit']);
    $row = $result->fetch();

    $result_pripominky = dibi::query('SELECT * FROM [prevent_audit_pripominky] WHERE [id_audit] = %i', $_GET['id_audit']);
    $row_pripominky = $result_pripominky->fetch();

    if ($row_pripominky == null) {
        $arr_pripominky_init = array('id_audit' => $row['id']);
        dibi::query('INSERT INTO [prevent_audit_pripominky]', $arr_pripominky_init);
    }

    if (prava_k_auditu($_GET['id_audit'], $_SESSION['id_usr'])) {

        if (($_SESSION['prava_usr'] == "koordinator" || $_SESSION['prava_usr'] == "admin") && $row['stav_technik'] == "provedl" && $row['stav_firma'] == "neproveden") {
            if ($_POST['sent']) {
                //pripominkuje koordinator technikovi
                if ($_POST['uzavrit'] == "jedna") {
                    $arr_log = array('text' => 'Koordinátor připomínkoval audit (ID#' . $row['id'] . ') a předal ho technikovi k opravám.', 'id_audit' => $row['id'], 'id_provozovna' => $row['id_provozovna']);
                    vytvor_log_audit($arr_log);

                    $arr_ukol = array('deadline' => '', 'text' => 'Koordinátor připomínkoval Vámi provedený audit (ID#' . $row['id'] . ').', 'popis' => "<strong>Opravte audit podle připomínek:</strong><br />" . $_POST['pripominka'], 'link' => "./provest_audit.php?id=vybrat_oblast&id_audit=" . $row['id'], 'ad' => $row['id_technik'], 'zadal_jmeno' => get_jmeno_uzivatele_z_id($row['id_koordinator']));
                    novy_ukol($arr_ukol);

                    $arr_pripominky = array('koordinator_technikovi' => $_POST['pripominka'], 'date_koordinator_technikovi' => time());
                    dibi::query('UPDATE [prevent_audit_pripominky] SET', $arr_pripominky, 'WHERE [id_audit] = %i', $row['id']);

                    $arr_audit = array('stav_technik' => "prijal", 'date' => time());
                    dibi::query('UPDATE [prevent_audit] SET', $arr_audit, 'WHERE [id] = %i', $row['id']);

                    $arr_protokoly = array('stav_celek' => "nezpracovano", 'date' => time());
                    dibi::query('UPDATE [prevent_audit_protokoly] SET', $arr_protokoly, 'WHERE [id_audit] = %i', $row['id']);

                    echo "<div class=\"obdelnik\"><h5>Audit byl předán zpět technikovi k opravám.</h5></div>";
                }
                //koordinator ho da technikovi
                elseif ($_POST['uzavrit'] == "dva") {
                    $arr_log = array('text' => 'Koordinátor připomínkoval audit (ID#' . $row['id'] . ') a předal ho klientovi.', 'id_audit' => $row['id'], 'id_provozovna' => $row['id_provozovna']);
                    vytvor_log_audit($arr_log);

                    $result_klient = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $row['id_firemni_uzivatel']);
                    $row_klient = $result_klient->fetch();

                    if ($row_klient['stav'] == "ceka_na_autorizaci")
                        $text = "<strong>Připomínkování:</strong><br /><em>odkaz na audit:</em> http://guardian.ebozp.cz/?id_audit=" . $row['id'] . "<br /><br /><em>odkaz na přihlášení:</em> http://guardian.ebozp.cz/autorizace.php?id=autorizace<br /><em>jméno uživatele:</em> " . $row_klient['jmeno'] . "<br /><em>autorizační kód:</em> " . $row_klient['sul'] . "";
                    else
                        $text = "<strong>Připomínkování:</strong><br /><em>odkaz na audit:</em> http://guardian.ebozp.cz/?id_audit=" . $row['id'] . "<br /><br /><em>odkaz na přihlášení:</em> http://guardian.ebozp.cz/<br /><em>jméno uživatele:</em> " . $row_klient['jmeno'];

                    $arr_ukol = array('deadline' => '', 'text' => 'Poslal jste audit (ID#' . $row['id'] . ') klientovi. Předejte mu logovací údaje k připomínkování auditu.', 'popis' => $text, 'link' => "", 'ad' => $row['id_koordinator'], 'zadal_jmeno' => "systém");
                    novy_ukol($arr_ukol);

                    $arr_pripominky = array('koordinator_firme' => $_POST['pripominka'], 'date_koordinator_firme' => time());
                    dibi::query('UPDATE [prevent_audit_pripominky] SET', $arr_pripominky, 'WHERE [id_audit] = %i', $row['id']);

                    $arr_audit = array('stav_technik' => "provedl", 'stav_firma' => "ceka", 'date' => time());
                    dibi::query('UPDATE [prevent_audit] SET', $arr_audit, 'WHERE [id] = %i', $row['id']);

                    echo "<div class=\"obdelnik\"><h5>Audit byl předán klientovi k připomínkování.</h5></div>";
                }

                $disabled = "disabled";
            }
            echo "<br /><form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" name=\"akce náhled\">
         <fieldset>
        <legend>Odeslat audit zpět technikovi nebo<br />předat klientovi k připomínkování</legend>
        <input type=\"hidden\" name=\"sent\" value=\"true\">
        <input type=\"radio\" id=\"jedna\" class=\"formular\" name=\"uzavrit\" value=\"jedna\" checked $disabled>
        <label for=\"jedna\">Odeslat audit zpět technikovi k přepracování</label><br /><br />
        <input type=\"radio\" id=\"dva\" class=\"formular\" name=\"uzavrit\" value=\"dva\" $disabled>
        <label for=\"dva\">Předat audit klientovi k připomínkování</label><br />
        <br />
        <label for=\"pripominka\">Připomínka</label><br />
        <textarea name=\"pripominka\" id=\"pripominka\" class=\"formular\" rows=\"20\" cols=\"50\" $disabled>" . $_POST['pripominka'] . "</textarea><br />
        <input type=\"submit\" class=\"tlacitko$disabled\" value=\"potvrdit\" $disabled/>
        </fieldset>
        </form>";
        }
        //koordinator ho ma od firmy
        elseif (($_SESSION['prava_usr'] == "koordinator" || $_SESSION['prava_usr'] == "admin") && $row['stav_technik'] == "provedl" && $row['stav_firma'] == "potvrdil" && $row['vytisknut'] != "ano") {
            if ($_POST['sent']) {
                if ($_POST['uzavrit'] == "jedna") {
                    $arr_log = array('text' => 'Koordinátor připomínkoval audit (ID#' . $row['id'] . ') a předal ho technikovi k opravám.', 'id_audit' => $row['id'], 'id_provozovna' => $row['id_provozovna']);
                    vytvor_log_audit($arr_log);

                    $arr_ukol = array('deadline' => '', 'text' => 'Koordinátor připomínkoval Vámi provedený audit (ID#' . $row['id'] . ').', 'popis' => "<strong>Opravte audit podle připomínek:</strong><br />" . $_POST['pripominka'], 'link' => "./provest_audit.php?id=vybrat_oblast&id_audit=" . $row['id'], 'ad' => $row['id_technik'], 'zadal_jmeno' => get_jmeno_uzivatele_z_id($row['id_koordinator']));
                    novy_ukol($arr_ukol);

                    $arr_pripominky = array('koordinator_technikovi' => $_POST['pripominka'], 'date_koordinator_technikovi' => time());
                    dibi::query('UPDATE [prevent_audit_pripominky] SET', $arr_pripominky, 'WHERE [id_audit] = %i', $row['id']);

                    $arr_audit = array('stav_technik' => "prijal", 'stav_firma' => "neproveden", 'date' => time());
                    dibi::query('UPDATE [prevent_audit] SET', $arr_audit, 'WHERE [id] = %i', $row['id']);

                    $arr_protokoly = array('stav_celek' => "nezpracovano", 'date' => time());
                    dibi::query('UPDATE [prevent_audit_protokoly] SET', $arr_protokoly, 'WHERE [id_audit] = %i', $row['id']);

                    echo "<div class=\"obdelnik\"><h5>Audit byl předán zpět technikovi k opravám.</h5></div>";
                } elseif ($_POST['uzavrit'] == "dva") {
                    $arr_log = array('text' => 'Koordinátor vytisknul audit (ID#' . $row['id'] . ').', 'id_audit' => $row['id'], 'id_provozovna' => $row['id_provozovna']);
                    vytvor_log_audit($arr_log);

                    $arr_ukol = array('deadline' => '', 'text' => 'Předejte klientovy zprávu o auditu (ID#' . $row['id'] . ').', 'popis' => "<strong>Klient:</strong><br /><em>" . get_nazev_firmy(get_id_firma_z_audit($row['id'])) . "</em><br /><strong>Odkaz:</strong><br /><em>http://guardian.ebozp.cz/stahnout.php?id=audit_data&id_audit=" . $row['id'] . "</em>", 'link' => "./stahnout.php?id=audit_data&id_audit=" . $row['id'], 'ad' => $_SESSION['id_usr'], 'zadal_jmeno' => "systém");
                    novy_ukol($arr_ukol);


                    $arr_audit = array('vytisknut' => "ano", 'date_vytisknut' => time(), 'date' => time());
                    dibi::query('UPDATE [prevent_audit] SET', $arr_audit, 'WHERE [id] = %i', $row['id']);


                    //tisknu si graf auditu
                    include_once "./module_include/graph_class/graf_checklist_save.php";
                    save($row['id']);
                    //KONEC tisknu si graf auditu

                    tisk_pdf1($row['id']);

                    balit_fotky($row['id']);

                    $cesta = "./audit_data/" . $row['id'] . "/protokoly/zprava_o_auditu_" . $row['id'] . ".pdf";

                    $arr_audit = array('id_audit' => $row['id'], 'nazev' => "zpráva o auditu #" . $row['id'], 'komentar' => $_POST['pripominka'], 'cesta' => $cesta, 'date' => time());
                    dibi::query('INSERT INTO [prevent_audit_soubory]', $arr_audit);

                    echo "<div class=\"obdelnik\"><h5>Audit byl vytisknut</h5></div>";
                }

                $disabled = "disabled";
            }
            //tak tedka ho uz tisknu

            $result_pripominky = dibi::query('SELECT * FROM [prevent_audit_pripominky] WHERE [id_audit] = %i', $_GET['id_audit']);
            $row_pripominky = $result_pripominky->fetch();


            echo "<br /><fieldset>
        <legend>Připomínky k auditu od klienta</legend>
        <label for=\"date\">Čas vytvoření připomínky</label><br />
        " . Date("H:i:s d.m.Y", $row_pripominky['date_firma_koordinatorovi']) . "
        <br />
        <label for=\"pripominka\">Připomínka</label><br />
        <textarea name=\"pripominka\" id=\"pripominka\" class=\"formular\" rows=\"20\" cols=\"50\" readonly>" . $row_pripominky['firma_koordinatorovi'] . "</textarea><br />
        </fieldset>";


            echo "<br /><form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" name=\"akce náhled\">
         <fieldset>
        <legend>Odeslat audit zpět technikovi nebo<br />vytisknout</legend>
        <input type=\"hidden\" name=\"sent\" value=\"true\">
        <input type=\"radio\" id=\"jedna\" class=\"formular\" name=\"uzavrit\" value=\"jedna\" checked $disabled>
        <label for=\"jedna\">Odeslat audit zpět technikovi k přepracování</label><br /><br />
        <input type=\"radio\" id=\"dva\" class=\"formular\" name=\"uzavrit\" value=\"dva\" $disabled>
        <label for=\"dva\">Vytisknout audit</label><br />
        <br />
        <label for=\"pripominka\">Připomínka</label><br />
        <textarea name=\"pripominka\" id=\"pripominka\" class=\"formular\" rows=\"20\" cols=\"50\" $disabled>" . $_POST['pripominka'] . "</textarea><br />
        <input type=\"submit\" class=\"tlacitko$disabled\" value=\"potvrdit\" $disabled/>
        </fieldset>
        </form>";
        }
    }
}
?>