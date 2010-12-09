<?php

function echo_checklist($id, $prepinac) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id);
    $row = $result->fetch();
    if ($row['typ'] == "bozp")
        $table = "bozp";
    elseif ($row['typ'] == "po")
        $table = "po";
    elseif ($row['typ'] == "bozp+po")
        $table = "bozppo";

    $pocet_ano_celek = 0;
    $pocet_ne_celek = 0;
    $pocet_netyka_celek = 0;
    $pocet_castecne_celek = 0;
    $procenta_castecne_celek = 0;
    $pocet_vsech_all = 0;

    $result_check_1 = dibi::query('SELECT * FROM [prevent_audit_checklist_' . $table . '_kategorie_schema] ORDER BY [cislo] ASC');
    while ($row_check_1 = $result_check_1->fetch()) {
        $result_check_kategorie = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie] WHERE [id_audit] = %i', $id, 'AND [id_kat] = %i', $row_check_1['id']);
        $row_check_kategorie = $result_check_kategorie->fetch();

        if ($row_check_kategorie['stav'] == "castecne") {
            $text_stav = "okruh zpracován částečně";
        } elseif ($row_check_kategorie['stav'] == "nezpracovano") {
            $text_stav = "okruh není zpracován";
        } elseif ($row_check_kategorie['stav'] == "zpracovano") {
            $text_stav = "okruh zpracován kompletně";
        } elseif ($row_check_kategorie['stav'] == "nepatri") {
            $text_stav = "okruh nebude v auditu zahrnut";
        } elseif ($row_check_kategorie['stav'] == "uzavren_nepatri") {
            $text_stav = "okruh uzavřen a netýká se auditu";
        } elseif ($row_check_kategorie['stav'] == "uzavren_zpracovano") {
            $text_stav = "okruh uzavřen a zpracován";
        }

        if ($row_check_kategorie['stav'] == "nepatri" || $row_check_kategorie['stav'] == "uzavren_nepatri") {
            echo "<div class=\"obdelnikchecklist\" align=\"justify\" id=\"plot_short" . $row_check_1['cislo'] . "\">
        <p>" . $row_check_1['cislo'] . ". " . $row_check_1[kat_jmeno] . " - <b>" . $text_stav . "</b></p>
        <p><i>poslední změna:</i> " . Date("H:i d.m.Y", $row_check_kategorie['date']) . "<br />
        <i>komentář:</i> " . $row_check_kategorie['komentar'] . "<br />";

            if ($row['stav_technik'] == "provedl")
                $akce_fotografie = false;
            else
                $akce_fotografie = true;
            echo_fotografie($row_check_kategorie['id_audit'], "checklist", $row_check_kategorie['id'], $akce_fotografie);
            echo "
        </p>
        </div>";
        }
        else {
            echo "<div class=\"obdelnikchecklist\" align=\"justify\" id=\"plot_short" . $row_check_1['cislo'] . "\">
        <p><a href=\"#\" onClick=\"return show_hide('plot_short" . $row_check_1['cislo'] . "','plot_full" . $row_check_1['cislo'] . "')\">" . $row_check_1['cislo'] . ". " . $row_check_1[kat_jmeno] . "</a> - <b>" . $text_stav . "</b></p>
        <p><i>poslední změna:</i> " . Date("H:i d.m.Y", $row_check_kategorie['date']) . "<br />
        <i>komentář:</i> " . $row_check_kategorie['komentar'] . "<br />";

            if ($row['stav_technik'] == "provedl")
                $akce_fotografie = false;
            else
                $akce_fotografie = true;
            echo_fotografie($row_check_kategorie['id_audit'], "checklist", $row_check_kategorie['id'], $akce_fotografie);
            echo "
        </p>
        </div>";

            echo "<div class=\"info2\" align=\"justify\" id=\"plot_full" . $row_check_1['cislo'] . "\" style=\"display: none;\">";

            echo "<table class=\"table\">";
            echo "<tr>
        <td><span class=\"subheader\"><a href=\"#\" onClick=\"return show_hide('plot_full" . $row_check_1['cislo'] . "','plot_short" . $row_check_1['cislo'] . "')\">" . $row_check_1['cislo'] . ". " . $row_check_1[kat_jmeno] . "</a></td>
        <td><span class=\"subheader\">A</span></td>
        <td><span class=\"subheader\">NT</span></td>
        <td><span class=\"subheader\">Č</span></td>
        <td><span class=\"subheader\">N</span></td>
        <td><span class=\"subheader\">Z</span></td>
        <td><span class=\"subheader\">poznámka</span></td>";
            if ($prepinac != "firma")
                echo "<td><span class=\"subheader\">poznámka<br />mimo<br />protokol</span></td>";
            echo "</tr>";

            //vypocet celků
            $pocet_ano = 0;
            $pocet_vsech = 0;
            $pocet_ne = 0;
            $pocet_netyka = 0;
            $pocet_castecne = 0;
            $procenta_castecne = 0;

            $result_check_2 = dibi::query('SELECT * FROM [prevent_audit_checklist_' . $table . '_schema] WHERE [id_kat] = %i', $row_check_1['cislo'], 'ORDER BY [cislo] ASC');
            while ($row_check_2 = $result_check_2->fetch()) {
                $pocet_vsech++;
                $result_check_3 = dibi::query('SELECT * FROM [prevent_audit_checklist] WHERE [id_audit] = %i', $id, 'AND [id_otazka] = %i', $row_check_2['id']);
                $row_check_3 = $result_check_3->fetch();
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
                if ($row_check_3['odpoved'] == "ano") {
                    $ano_pole = "class=\"green\"";
                    $ano_text = "X";
                    $pocet_ano++;
                } elseif ($row_check_3['odpoved'] == "netyka") {
                    $netyka_pole = "class=\"green\"";
                    $netyka_text = "X";
                    $pocet_netyka++;
                } elseif ($row_check_3['odpoved'] == "castecne") {
                    $castecne_pole = "class=\"orange\"";
                    $castecne_text = $row_check_3['castecne'] . "%";
                    $pocet_castecne++;
                    $procenta_castecne += $row_check_3['castecne'];
                } elseif ($row_check_3['odpoved'] == "ne") {
                    $ne_pole = "class=\"red\"";
                    $ne_text = "X";
                    $pocet_ne++;
                } elseif ($row_check_3['odpoved'] == "") {
                    $komplet_pole = "class=\"grey\"";
                }
                echo "<tr " . $komplet_pole . ">
            <td><span class=\"subheader\">" . $row_check_2['cislo'] . ". ";
                for ($i = 0; $i < count($poleotazky); $i++) {
                    echo $poleotazky[$i] . " ";
                    if ($i % 6 == 4)
                        echo "<br />";
                }
                echo "</span></td>
            <td " . $ano_pole . ">" . $ano_text . "</td>
            <td " . $netyka_pole . ">" . $netyka_text . "</td>
            <td " . $castecne_pole . ">" . $castecne_text . "</td>
            <td " . $ne_pole . ">" . $ne_text . "</td>
            <td>" . $row_check_2['zavaznost'] . "</td>
            <td>" . $row_check_3['poznamka'] . "</td>";
                if ($prepinac != "firma")
                    echo "<td>" . $row_check_3['poznamka_mimo_protokol'] . "</td>";
                echo "</tr>";
            }
            echo "<tr><td><span class=\"subheader\">celkem</span></td>
            <td>" . $pocet_ano . " z " . $pocet_vsech . "</td>
            <td>" . $pocet_netyka . " z " . $pocet_vsech . "</td>
            <td>" . round(($procenta_castecne + ($pocet_ano * 100)) / $pocet_vsech, 2) . "% z 100%</td>
            <td>" . $pocet_ne . " z " . $pocet_vsech . "</td>
            <td></td>
            <td></td>";
            if ($prepinac != "firma")
                echo "<td></td>";
            echo "</tr>";
            echo "</table>";
            echo "</div>";

            $pocet_ano_celek += $pocet_ano;
            $pocet_ne_celek += $pocet_ne;
            $pocet_netyka_celek += $pocet_netyka;
            $pocet_castecne_celek += $pocet_castecne;
            $procenta_castecne_celek += $procenta_castecne;
            $pocet_vsech_all += $pocet_vsech;
        }
    }
    echo "<table class=\"table\">";
    echo "<tr>
        <td><span class=\"subheader\">celkové statistiky</td>
        <td><span class=\"subheader\">A</span></td>
        <td><span class=\"subheader\">NT</span></td>
        <td><span class=\"subheader\">Č</span></td>
        <td><span class=\"subheader\">N</span></td>
        </tr>";

    echo "<tr><td><span class=\"subheader\">celkem</span></td>
            <td>" . $pocet_ano_celek . " z " . $pocet_vsech_all . "</td>
            <td>" . $pocet_netyka_celek . " z " . $pocet_vsech_all . "</td>
            <td>" . round(($procenta_castecne_celek + ($pocet_ano_celek * 100)) / $pocet_vsech_all, 2) . "% z 100%</td>
            <td>" . $pocet_ne_celek . " z " . $pocet_vsech_all . "</td>

            </tr>";
    echo "</table>";
}

function vyber_checklist($id) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id);
    $row = $result->fetch();

    if ($row['stav_technik'] == "provedl")
        $akce_fotografie = false;
    else
        $akce_fotografie = true;

    echo "<form method=\"POST\" id=\"formvyber\" action=\"./provest_audit.php?id_audit=" . $_GET['id_audit'] . "&id=checklist&akce_tyka_netyka=ano\" >";

    $result_check_1 = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [verze] = %i', $row['verze'] ,' ORDER BY [cislo] ASC');
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

        if ($row_check_kategorie['stav'] == "castecne") {
            $link_na_cast_checklistu = "<a href=\"./provest_audit.php?id_audit=" . $row['id'] . "&id=checklist_vyber&selection=" . $row_check_1['id'] . "\">" . $row_check_1['cislo'] . ". " . $row_check_1[kat_jmeno] . "</a>";
            $text_stav = "okruh zpracován částečně";
            $hlaska_netykase = "";
            $checked = "checked";
            $readonly = "readonly";
        } elseif ($row_check_kategorie['stav'] == "nezpracovano") {
            $link_na_cast_checklistu = "<a href=\"./provest_audit.php?id_audit=" . $row['id'] . "&id=checklist_vyber&selection=" . $row_check_1['id'] . "\">" . $row_check_1['cislo'] . ". " . $row_check_1[kat_jmeno] . "</a>";
            $text_stav = "okruh není zpracován";
            $hlaska_netykase = " | <a href=\"./provest_audit.php?id_audit=" . $row['id'] . "&id=checklist&netykase=" . $row_check_1['id'] . "\">okruh se auditu netýká</a>";
            $checked = "checked";
            $readonly = "";
        } elseif ($row_check_kategorie['stav'] == "zpracovano") {
            $link_na_cast_checklistu = "<a href=\"./provest_audit.php?id_audit=" . $row['id'] . "&id=checklist_vyber&selection=" . $row_check_1['id'] . "\">" . $row_check_1['cislo'] . ". " . $row_check_1[kat_jmeno] . "</a>";
            $text_stav = "okruh zpracován kompletně";
            $hlaska_netykase = "";
            $checked = "checked";
            $readonly = "readonly";
        } elseif ($row_check_kategorie['stav'] == "nepatri") {
            $link_na_cast_checklistu = $row_check_1['cislo'] . ". " . $row_check_1[kat_jmeno];
            $text_stav = "okruh nebude v auditu zahrnut";
            $hlaska_netykase = " | <a href=\"./provest_audit.php?id_audit=" . $row['id'] . "&id=checklist&tykase=" . $row_check_1['id'] . "\">okruh se auditu týká</a>";
            $checked = "";
            $readonly = "";
        } elseif ($row_check_kategorie['stav'] == "uzavren_nepatri") {
            $link_na_cast_checklistu = "<a href=\"./provest_audit.php?id_audit=" . $row['id'] . "&id=checklist_vyber&selection=" . $row_check_1['id'] . "\">" . $row_check_1['cislo'] . ". " . $row_check_1[kat_jmeno] . "</a>";
            $hlaska_netykase = "";
            $text_stav = "okruh uzavřen a netýká se auditu";
            $checked = "";
            $readonly = "readonly";
        } elseif ($row_check_kategorie['stav'] == "uzavren_zpracovano") {
            $link_na_cast_checklistu = "<a href=\"./provest_audit.php?id_audit=" . $row['id'] . "&id=checklist_vyber&selection=" . $row_check_1['id'] . "\">" . $row_check_1['cislo'] . ". " . $row_check_1[kat_jmeno] . "</a>";
            $hlaska_netykase = "";
            $text_stav = "okruh uzavřen a zpracován";
            $checked = "checked";
            $readonly = "readonly";
        }

        if ($row_check_kategorie['date'] == 0)
            $datehlaska = "zatím neproběhla";
        else
            $datehlaska = Date("H:i d.m.Y", $row_check_kategorie['date']);

        echo "<ul>
        <li><input type=\"checkbox\" name=\"tykanetykapole[" . $row_check_1[id] . "]\" value=\"ano\" " . $checked . " " . $readonly . ">" . $link_na_cast_checklistu . " - <b>" . $text_stav . "</b> " . $hlaska_netykase . "
        <p><i>poslední změna:</i> " . $datehlaska . "<br />
        <i>komentář:</i> " . $row_check_kategorie['komentar'] . "<br />";

        echo_fotografie($row_check_kategorie['id_audit'], "checklist", $row_check_kategorie['id'], $akce_fotografie);
        echo "
        </li>
        </ul>";
    }
    echo "<br /><fieldset>
	<legend>Zaškrtlé checklisty</legend>
        <label><a  onclick=\"checkni()\">vybrat vše</a> / <a  onclick=\"uncheckni()\">nevybrat nic</a></label><br />
        <Label for=\"provest\">Zašktlé se týkají</label>
        <input type=\"submit\" value=\"provést\" id=\"provest\" class=\"tlacitko\">
        </fieldset></form>";
}

function provest_checklist($id, $selection) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id);
    $row = $result->fetch();

    $odesli = "<input class=\"tlacitko\" type=\"submit\" value=\"uložit\">";
    $disabled = "";

    echo "<form method=\"POST\" action=\"./provest_audit.php?id_audit=" . $_GET['id_audit'] . "&id=checklist&selection=" . $_GET['selection'] . "&checklist_zpracuj=ano\" onSubmit=\"return check_checklist(this);\">";

    if ($selection == "vse")
        $result_check_1 = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [verze] = %i', $row['verze'] ,' ORDER BY [cislo] ASC');
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

        $pocet_ano = 0;
        $pocet_ne = 0;
        $pocet_netyka = 0;
        $pocet_castecne = 0;
        $pocet_vsech = 0;

        $result_check_2 = dibi::query('SELECT * FROM [prevent_audit_checklist_schema] WHERE [id_kat] = %i', $row_check_1['id'], 'AND [verze] = %i', $row['verze'], 'ORDER BY [cislo] ASC');
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
            <td " . $ano_pole . "><input class=\"formular\" type=\"radio\" name=\"odpovedi[" . $row_check_3['id'] . "]\" value=\"ano\" " . $check_ano . "/></td>
            <td " . $netyka_pole . "><input class=\"formular\" type=\"radio\" name=\"odpovedi[" . $row_check_3['id'] . "]\" value=\"netyka\" " . $check_netyka . "/></td>
            <td " . $castecne_pole . "><input class=\"formular\" type=\"radio\" name=\"odpovedi[" . $row_check_3['id'] . "]\" value=\"castecne\" " . $check_castecne . "/>
                                   <input type=\"text\" maxlength=\"2\"  class=\"formular\" size=\"3\" name=\"odpovedi_castecne[" . $row_check_3['id'] . "]\" value=\"" . $row_check_3['castecne'] . "\" /> </td>
            <td " . $ne_pole . "><input class=\"formular\" type=\"radio\" name=\"odpovedi[" . $row_check_3['id'] . "]\" value=\"ne\" " . $check_ne . "/></td>
            <td>" . $row_check_2['zavaznost'] . "</td>
            <td>";
            echo "<a href=\"./nove_okno_form.php?id=checklist_komentar_k_otazce&id_audit=" . $row['id'] . "&id_otazka=" . $row_check_3['id'] . "\" target=\"_blank\">vložit komentář</a></td>";


            echo "<td><a href=\"./nove_okno_form.php?id=checklist_poznamka_k_otazce_mimo_protokol&id_audit=" . $row['id'] . "&id_otazka=" . $row_check_3['id'] . "\" target=\"_blank\">vložit poznámku</a></td>";
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

    echo "<br /><fieldset name = \"vse\">
	<legend>Provést checklist</legend>
        " . $odesli . " <a href=\"./provest_audit.php?id_audit=" . $_GET['id_audit'] . "&id=checklist\" onclick=\"if(confirm('Skutečně neukládat změny?')) location.href='./provest_audit.php?id_audit=" . $_GET['id_audit'] . "&id=checklist'; return(false);\">zahodit změny</a>
	</fieldset>
	</form><br />";
}

function checklist_zpracuj($id, $selection) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id);
    $row = $result->fetch();


    $result_check_2 = dibi::query('SELECT * FROM [prevent_audit_checklist_schema] WHERE [id_kat] = %i', $selection, 'AND [verze] = %i', $row['verze'] ,'ORDER BY [cislo] ASC');
    $pocet_otazek = $result_check_2->count();

    $time = Time();

    $text = $_POST['komentar'];
    $x = $selection;
    $pocet_otazek_zpracovano = 0;
    $text_odpoved = $_POST['odpovedi'];

    foreach ($text_odpoved as $x => $value) {
        $pocet_otazek_zpracovano++;
        if ($text_odpoved[$x] == "castecne") {
            $text_castecne_1 = $_POST['odpovedi_castecne'];
            $text_castecne = $text_castecne_1[$x];
            $chyba = true; //slouzi k odchyceni chyb vstupu castecne
            for ($fn = 1; $fn < 100; $fn++) {
                if ($fn == $text_castecne)
                    $chyba = false;
            }
        }
        else {
            $text_castecne = "";
        }

        if ($chyba) {
            $text_odpoved[$x] = "ne";
            $chyba = false;
        }

        //tady generuju neshody
        if ($text_odpoved[$x] == "castecne" || $text_odpoved[$x] == "ne") {
            $result_check_audit = dibi::query('SELECT * FROM [prevent_audit_checklist] WHERE [id] = %i', $x);
            $row_check_audit = $result_check_audit->fetch();

            $result_check_navrh = dibi::query('SELECT * FROM [prevent_audit_checklist_schema] WHERE [id] = %i', $row_check_audit['id_otazka'], 'AND [verze] = %i', $row['verze']);
            $row_check_navrh = $result_check_navrh->fetch();

            new_neshoda($id, "checklist", $x, "", $row_check_navrh['navrhovane_opatreni'], $row_check_audit['komentar']);
        }
        else
            delete_neshoda($id, "checklist", $x);


        dibi::query('UPDATE [prevent_audit_checklist] SET [odpoved] = %s', $text_odpoved[$x], ',[castecne] = %s', $text_castecne, ',[date] = %i', $time, 'WHERE [id] = %i', $x);
    }
    $arr_log = array('text' => 'Upraven audit - checklist', 'id_audit' => $id, 'id_provozovna' => $row['id_provozovna']);
    vytvor_log_audit($arr_log);

    //pokud se rovna pocet zpracovanych poctu vsech je okruh zpracovan
    if ($pocet_otazek_zpracovano == $pocet_otazek)
        $new_stav = "zpracovano";
    else
        $new_stav = "castecne";

    dibi::query('UPDATE [prevent_audit_checklist_kategorie] SET [komentar] = %s', $text, ',[date] = %i', $time, ',[stav] = %s', $new_stav, 'WHERE [id_audit] = %i', $id, 'AND [id_kat] = %i', $selection);
    dibi::query('UPDATE [prevent_audit] SET [date_stav_checklist] = %i', $time, 'WHERE [id] = %i', $id);

    echo "<div class=\"obdelnik\"><h5>Změny v checklistu provedeny!</h5></div>";
}

function netykase_checklist($audit, $netykase) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $audit);
    $row = $result->fetch();

    $arr_log = array('text' => 'Upraven audit - checklist - kategorie se netýká', 'id_audit' => $audit, 'id_provozovna' => $row['id_provozovna']);
    vytvor_log_audit($arr_log);

    dibi::query('UPDATE [prevent_audit_checklist_kategorie] SET [date] = %i', Time(), ',[stav] = %s', "nepatri", 'WHERE [id_audit] = %i', $audit, 'AND [id_kat] = %i', $netykase);
}

function tykase_checklist($audit, $netykase) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $audit);
    $row = $result->fetch();

    $arr_log = array('text' => 'Upraven audit - checklist - kategorie se netýká', 'id_audit' => $audit, 'id_provozovna' => $row['id_provozovna']);
    vytvor_log_audit($arr_log);

    dibi::query('UPDATE [prevent_audit_checklist_kategorie] SET [date] = %i', Time(), ',[stav] = %s', "nezpracovano", 'WHERE [id_audit] = %i', $audit, 'AND [id_kat] = %i', $netykase);
}

function tyka_netyka_checklist($audit) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $audit);
    $row = $result->fetch();

    $pole = $_POST[tykanetykapole];

    $resultx = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie] WHERE [id_audit] = %i', $audit);
    while ($rowx = $resultx->fetch()) {
        if ($pole[$rowx[id_kat]] == "ano" && $rowx[stav] == "nepatri") {
            dibi::query('UPDATE [prevent_audit_checklist_kategorie] SET [date] = %i', Time(), ',[stav] = %s', "nezpracovano", 'WHERE [id_audit] = %i', $audit, 'AND [id_kat] = %i', $rowx[id_kat]);
            $arr_log = array('text' => 'Upraven audit - checklist - kategorie se týká', 'id_audit' => $audit, 'id_provozovna' => $row['id_provozovna']);
            vytvor_log_audit($arr_log);
        } elseif ($pole[$rowx[id_kat]] != "ano" && $rowx[stav] == "nezpracovano") {
            dibi::query('UPDATE [prevent_audit_checklist_kategorie] SET [date] = %i', Time(), ',[stav] = %s', "nepatri", 'WHERE [id_audit] = %i', $audit, 'AND [id_kat] = %i', $rowx[id_kat]);
            $arr_log = array('text' => 'Upraven audit - checklist - kategorie se netýká', 'id_audit' => $audit, 'id_provozovna' => $row['id_provozovna']);
            vytvor_log_audit($arr_log);
        }
    }
}

function checklistu_zpracovan($id_audit) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id_audit);
    $row = $result->fetch();



    $uzavrit_true = true;

    $result_check = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie] WHERE [id_audit] = %i', $id_audit);
    if ($result_check->count() < 1)
        return false;
    while ($row_check = $result_check->fetch()) {
        if (($row_check['stav'] == "nepatri" || $row_check['stav'] == "zpracovano") && $uzavrit_true) {
            $uzavrit_true = true;
        } else {
            $uzavrit_true = false;
        }
    }

    return $uzavrit_true;
}
?>
