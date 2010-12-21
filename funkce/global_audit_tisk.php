<?php

function tisk_pdf1($id_audit) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id_audit);
    $row = $result->fetch();

    require_once('./module_include/tcpdf/config/lang/eng.php');
    require_once('./module_include/tcpdf/tcpdf.php');

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Systém GUARDIAN');
    $pdf->SetTitle('Systém GUARDIAN - zpráva o auditu #' . $id_audit . " - " . Date("H:i:s d.m.Y", time()));
    $pdf->SetSubject('Systém GUARDIAN - zpráva o auditu #' . $id_audit . " - " . Date("H:i:s d.m.Y", time()));
    $pdf->SetKeywords('Systém GUARDIAN, zpráva o auditu #' . $id_audit . " - " . Date("H:i:s d.m.Y", time()));

    $pdf->SetHeaderData("../../../design/logo2.jpg", PDF_HEADER_LOGO_WIDTH, 'G U A R D 7 v.o.s', "17. listopadu 203, 530 02 Pardubice, Tel: 466535700, Fax: 466501412, E-mail: guard7@guard7.cz, www.guard7.cz");
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    $pdf->setLanguageArray($l);
    $pdf->setFontSubsetting(true);
    $pdf->SetFont('dejavusans', '', 15, '', true);

    $css = "<style>
    h2.h2 {
        font-weight:normal;DATE
        text-align:left;
        color:black;
        background-color:#ffff99;
        font-size = 20pt;
    }
    table.table {
        margin-left: auto;
        margin-right: auto;
        text-align:center;
        BORDER:1px;
        color:black;
        BORDER-COLLAPSE: collapse;
    }
    td.yellow_small {
        background-color:#ffff99;
        font-size: 8pt;

    }
    td.yellow_big {
        background-color:#ffff99;
        font-size: 18pt;

    }
    td.yellow {
        background-color:#ffff99;
        font-size: 12pt;

    }
    td.nadpis {
        font-size: 20;

    }
    td.nadpis_small {
        font-size: 13;

    }
    p.p {
        font-size: 8pt;
    }

    </style>";


    $pdf->AddPage();

    $result_klient = dibi::query('SELECT * FROM [prevent_firmy] WHERE [id] = %i', get_id_firma_z_audit($id_audit));
    $row_klient = $result_klient->fetch();
    $result_provozovna = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [id] = %i', get_id_provozovna_z_audit($id_audit));
    $row_provozovna = $result_provozovna->fetch();

    $html = $css . "<div style=\"text-align: center;\">
    <br /><br /><table class=\"table\" style=\"border: 0px;\">
        <tr>
            <td class=\"nadpis\"> $row_klient[nazev] </td>
        </tr>
        <tr>
            <td class=\"nadpis_small\">$row_klient[adresa], ičo: $row_klient[ico], $row_provozovna[nazev] , $row_provozovna[adresa]</td>
        </tr>
        </table><br /><br />


        <p><br /><br /><img src=\"" . $row_klient['logo'] . "\"/ height=\"250px\"><br /><br /></p>

        <table class=\"table\">
            <tr>
                <td class=\"nadpis_small\">Název předpisu</td>
            </tr>
            <tr>
                <td class=\"yellow_big\">Zpráva o provedení auditu " . $row['typ'] . "</td>
            </tr>
            </table><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

        <p><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><img src=\"./design/logo2.jpg\"/ width=\"150px\" ><br /><br /></p>

            <p class=\"p\"><strong>G U A R D 7, v.o.s. se sídlem 17.listopadu 203, 530 02 Pardubice<br />IČO 48173622, DIČ CZ48173622</strong><br />
        Společnost je zapsána v OR vedeném KS v Hradci Králové, oddíl A,  vložka 3503<br />
        Telefon: 466535700, fax: 466501412, E-mail: guard7@guard7.cz, www.guard7.cz</p>
        </div>";

    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->AddPage();

    $result2 = dibi::query('SELECT * FROM [prevent_audit_protokoly] WHERE [id_audit] = %i', $id_audit);
    $row2 = $result2->fetch();

    $html = $css . "<div class=\"zprava_audit\"><h2 class=\"h2\">Komentář auditu</h2>
        <table class=\"table\">
            <tr>
                <td class=\"nadpis_small\">Místo auditu</td>
            </tr>
            <tr>
                <td class=\"yellow\"><p>" . $row2['misto'] . "</p></td>
            </tr>
        </table><br /><br /><br />

        <p><br /><br /><br /></p>

        <table class=\"table\" >
            <tr>
                <td class=\"nadpis_small\">Jméno auditora za G U A R D 7, v.o.s.</td>
                <td class=\"nadpis_small\">Jméno zpracovatele za G U A R D 7, v.o.s.</td>
            </tr>
            <tr>
                <td class=\"yellow\">" . $row2['auditor'] . "</td>
                <td class=\"yellow\">" . get_jmeno_uzivatele_z_id($row['id_koordinator']) . "</td>
            </tr>
        </table><br /><br /><br />

        <p><br /><br /><br /></p>

        <table class=\"table\">
            <tr>
                <td class=\"nadpis_small\">Účastníci za klienta</td>
            </tr>
            <tr>
                <td class=\"yellow\">" . $row2['ucastnici'] . "</td>
            </tr>
        </table><br /><br /><br />

        <p><br /><br /><br /></p>

        <table class=\"table\">
            <tr>
                <td class=\"nadpis_small\">Popis průběhu auditu</td>
            </tr>
            <tr>
                <td class=\"yellow\">" . $row2['popis'] . "</td>
             </tr>
        </table><br /><br /><br />

        <p><br /><br /><br /></p>

        <table class=\"table\">
            <tr>
                <td class=\"nadpis_small\">Stručné slovní zhodnocení auditu a upozorněním na nejdůležitější neshody a doporučení dalšího postupu</td>
            </tr>
            <tr>
                <td class=\"yellow\">" . $row2['zhodnoceni'] . "</td>
            </tr>
        </table>
        </div>";

    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->AddPage();


    $html = $css . "<div class=\"zprava_audit\"><h2 class=\"h2\">Vyhodnocení auditu</h2>

         <p><br /><br /><img src=\"./audit_data/".$id_audit."/graf.png\" width=\"600px\" /><br /><br /> </p>

      <table class=\"table\">
        <tr>
            <td class=\"nadpis_small\">Kategorie</td>
            <td class=\"nadpis_small\">Hodnocení</td>
       </tr>";
    $result_check_kategorie = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie] WHERE [id_audit] = %i', $id_audit);
    while ($row_check_kategorie = $result_check_kategorie->fetch()) {
        $result_check_kategorie_schema = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [id] = %i', $row_check_kategorie['id_kat']);
        $row_check_kategorie_schema = $result_check_kategorie_schema->fetch();

        $zpr = false;
        $pocet_vsech = 0;
        $procenta_castecne = 0;
        $pocet_ano = 0;

        $result_check_2 = dibi::query('SELECT * FROM [prevent_audit_checklist_schema] WHERE [id_kat] = %i', $row_check_kategorie_schema['id'], ' AND [verze] = %i', $row['verze'], 'ORDER BY [cislo] ASC');
        while ($row_check_2 = $result_check_2->fetch()) {
            $result_check_3 = dibi::query('SELECT * FROM [prevent_audit_checklist] WHERE [id_audit] = %i', $id_audit, 'AND [id_otazka] = %i', $row_check_2['id']);
            $row_check_3 = $result_check_3->fetch();

            if ($row_check_kategorie['stav'] == "zpracovano") {
                $pocet_vsech++;
                $zpr = true;
                if ($row_check_3['odpoved'] == "ano") {
                    $pocet_ano++;
                } elseif ($row_check_3['odpoved'] == "castecne") {
                    $procenta_castecne += $row_check_3['castecne'];
                }
            }
        }
        if ($zpr) {
            $html = $html . "<tr>
                                <td class=\"yellow\">" . $row_check_kategorie_schema['cislo'] . ". " . $row_check_kategorie_schema['kat_jmeno'] . "</td>
                                <td class=\"yellow\">" . round(($procenta_castecne + ($pocet_ano * 100)) / $pocet_vsech, 2) . "%</td>
                             </tr>";
        }
    }
    $html = $html . "</table>
    </div>";

    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->AddPage();

    $html = $css . "<div class=\"zprava_audit\"><h2 class=\"h2\">Registr neshod</h2>
    <table class=\"table\">
    <tr>
        <td class=\"nadpis_small\">závažnost</td>
        <td class=\"nadpis_small\">neshoda</td>
        <td class=\"nadpis_small\">komentář</td>
        <td class=\"nadpis_small\">navrhované<br />opatření</td>
    </tr>";

    $result_neshody = dibi::query('SELECT * FROM [prevent_audit_neshody] WHERE [id_audit] = %i', $id_audit, 'ORDER BY [id] ASC');
    while ($row_neshody = $result_neshody->fetch()) {
        if ($row_neshody['id_otazka'] != null) {
            $result_check_audit = dibi::query('SELECT * FROM [prevent_audit_checklist] WHERE [id] = %i', $row_neshody['id_otazka']);
            $row_check_audit = $result_check_audit->fetch();

            $result_check_1 = dibi::query('SELECT * FROM [prevent_audit_checklist_schema] WHERE [id] = %i', $row_check_audit['id_otazka']);
            $row_check_1 = $result_check_1->fetch();

            $result_check_2 = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [id] = %i', $row_check_1['id_kat']);
            $row_check_2 = $result_check_2->fetch();

            $zavaznost = $row_check_1['zavaznost'];

            if ($row_check_audit['odpoved'] == "castecne")
                $odpoved = "<br /><strong>ODPOVĚĎ</strong>: částečně (" . $row_check_audit['castecne'] . "%)";
            else
                $odpoved = "<br /><strong>ODPOVĚĎ</strong>: ne";

            $text_puvod = "<strong>CHECKLIST</strong>: " . $row_check_2['cislo'] . ". " . $row_check_2['kat_jmeno'] . ": " . $row_check_1['cislo'] . ". " . $row_check_1['text'] . $odpoved;
        }
        elseif ($row_neshody['id_pracoviste'] != null) {
            $text_puvod = "<strong>PRACOVIŠTĚ</strong> - <em>" . get_jmeno_objekt("pracoviste", $row_neshody['id_pracoviste']) . "</em>: " . $row_neshody['neshoda'];
            $zavaznost = "nic";
        }
        $html = $html . "<tr>
        <td class=\"yellow_small\">" . $zavaznost . "</td>
        <td class=\"yellow_small\">" . $text_puvod . "</td>
        <td class=\"yellow_small\">" . $row_neshody['komentar'] . "</td>
        <td class=\"yellow_small\">" . $row_neshody['opatreni'] . "</td>
        </tr>";
    }
    $html = $html . "</table>
    </div>";



    $pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
    $info = array('Name' => 'jmeno', 'Location' => 'brni', 'Reason' => 'duvod', 'ContactInfo' => 'eco');
    $pdf->setSignature("./module_include/tcpdf/tcpdf.crt", "./module_include/tcpdf/tcpdf.crt", "vomrdamekneze", "", 1, $info);

    $cesta = "./audit_data/" . $id_audit . "/protokoly/";

    $pdf->Output($cesta . 'zprava_o_auditu_' . $id_audit . '.pdf', 'F');

}

function balit_fotky($id_audit) {
    //tisk fotek - zip, dokument
    $soubor = fopen("./audit_data/" . $id_audit . "/fotografie.txt", "w");
    $cas_start = Time();
    $result_firma = dibi::query('SELECT * FROM [prevent_firmy] WHERE [id] = %i', get_id_firma_z_audit($id_audit));
    $row_firma = $result_firma->fetch();
    $result_provozovna = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [id] = %i', get_id_provozovna_z_audit($id_audit));
    $row_provozovna = $result_provozovna->fetch();
    $text = "*** Systém GUARDIAN ***\n** Informace o fotografiích v archivu **\n#ID audit: " . $row['id'] . "\nFirma: " . $row_firma['nazev'] . "\nProvozovna: " . $row_provozovna['nazev'] . "\n\nVytvořeno: " . Date("H:i:s d.m.Y", Time()) . "\nVytvořil: " . $_SESSION['jmeno_usr'] . "\n\n";
    fwrite($soubor, $text);
    $i = 0;
    $result_foto = dibi::query('SELECT * FROM [prevent_audit_fotografie] WHERE [id_audit] = %i', $id_audit);
    while ($row_foto = $result_foto->fetch()) {
        if ($row_foto['objekt'] == "checklist") {
            if ($row['typ'] == "bozp")
                $table = "bozp";
            elseif ($row['typ'] == "po")
                $table = "po";
            elseif ($row['typ'] == "bozp+po")
                $table = "bozppo";
            $result_check_audit = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie] WHERE [id] = %i', $row_foto['id_objekt']);
            $row_check_audit = $result_check_audit->fetch();
            $result_check_1 = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [id] = %i', $row_check_audit['id_kat']);
            $row_check_1 = $result_check_1->fetch();
            $puvod = "CHECKLIST: " . $row_check_1['cislo'] . ". " . $row_check_1['kat_jmeno'];
        }
        elseif ($row_foto['objekt'] == "pracoviste") {
            $puvod = "PRACOVIŠTĚ: " . get_jmeno_objekt("pracoviste", $row_foto['id_objekt']);
        }
        $files_to_zip[$i] = "./audit_data/" . $id_audit . "/fotografie/" . $row_foto['cesta'];
        $files_to_zip_local[$i] = $row_foto['cesta'];
        $i++;
        $text = "* Název: " . $row_foto['nazev'] . "\nSoubor: " . $row_foto['cesta'] . "\nDatum: " . Date("H:i:s d.m.Y", $row_foto['date']) . "\nPůvod: " . $puvod . "\nKomentář: " . $row_foto['komentar'] . "\n\n";
        fwrite($soubor, $text);
    }
    $cas_provadeni = Time() - $cas_start;
    fwrite($soubor, "\n** Konec informací o fotografiích v archivu  ** \nDoba vytváření archivu fotografií: " . $cas_provadeni . " sec\n*** Systém GUARDIAN ***");
    fclose($soubor);
    $files_to_zip[$i] = "./audit_data/" . $id_audit . "/fotografie.txt";
    $files_to_zip_local[$i] = "fotografie.txt";
    if (count($files_to_zip) > 0) {
        create_zip($files_to_zip, $files_to_zip_local, "./audit_data/" . $id_audit . "/fotografie.zip");
        $arr = array('id_audit' => $id_audit, 'typ' => "fotografie", 'nazev' => "Fotografie auditu #ID" . $id_audit, 'komentar' => "Kompletní zip soubor fotografií k auditu #ID" . $id_audit, 'cesta' => "fotografie.zip", 'date' => Time());
        dibi::query('INSERT INTO [prevent_audit_zip]', $arr);
    }
}
?>
