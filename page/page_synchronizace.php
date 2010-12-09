<?php
function prehled_exportovanych_auditu() {
    if($_SESSION['prava_usr'] == "technik") $dotaz = dibi::query('SELECT * FROM [prevent_audit] WHERE [id_technik] = %i', $_SESSION['id_usr'], 'AND [synchronizace] = %s', "local");
    elseif($_SESSION['prava_usr'] == "koordinator") $dotaz = dibi::query('SELECT * FROM [prevent_audit] WHERE [id_koordinator] = %i', $_SESSION['id_usr'], 'AND [synchronizace] = %s', "local");
    elseif($_SESSION['prava_usr'] == "admin") $dotaz = dibi::query('SELECT * FROM [prevent_audit] WHERE [synchronizace] = %s', "local");

    echo "<table class=\"table\">
		<tr>
		<td><span class=\"subheader\">STAV<br />(#id)</span></td>
		<td><span class=\"subheader\">STAV<br />TECHNIK</span></td>
		<td><span class=\"subheader\">STAV<br />KLIENT</span></td>
                <td><span class=\"subheader\">Synchronizace</span></td>
                <td><span class=\"subheader\">vývoj</span></td>
		<td><span class=\"subheader\">AKCE</span></td>
                <td><span class=\"subheader\">název</span></td>
                <td><span class=\"subheader\">klient</span></td>
                <td><span class=\"subheader\">pobočka</span></td>
		<td><span class=\"subheader\">ZMĚNA</span></td>
		<td><span class=\"subheader\">TYP</span></td>
                <td><span class=\"subheader\">technik</span></td>
		<td><span class=\"subheader\">KOORDINÁTOR</span></td>
		<td><span class=\"subheader\">KLIENT</span></td>
		<td><span class=\"subheader\">KOMENTÁŘ</span></td>
		</tr>";

    $result = $dotaz;
    while($row = $result->fetch()) {
        if($row['stav_technik'] == "provedl" && $row['stav_firma'] == "potvrdil") {
            $signal = " class=\"green\"";
            $text = "dokončen<br />".Date("H:i:s d.m.Y",$row['date_technik_potvrdil'])."<br />(#".$row['id'].")";
        }
        else {
            $signal = " class=\"orange\"";
            $text = "nedokončen<br />(#".$row['id'].")";
        }

        if($row['stav_technik'] == "neprijal") {
            $signal2 = " class=\"red\"";
            $text2 = "nepotvrdil<br />přijetí";
        }
        elseif($row['stav_technik'] == "prijal") {
            $signal2 = " class=\"orange\"";
            $text2 = "přijal<br />".Date("H:i:s d.m.Y", $row['date_technik_prijal_provedl']);
        }
        elseif($row['stav_technik'] == "provedl") {
            $signal2 = " class=\"green\"";
            $text2 = "provedl<br />".Date("H:i:s d.m.Y", $row['date_technik_prijal_provedl']);
        }

        if($row['stav_firma'] == "neproveden") {
            $signal3 = " class=\"red\"";
            $text3 = "nebyl<br />proveden";
        }
        elseif($row['stav_firma'] == "nepotvrdil") {
            $signal3 = " class=\"orange\"";
            $text3 = "nepotvrdil";
        }
        elseif($row['stav_firma'] == "potvrdil") {
            $signal3 = " class=\"orange\"";
            $text3 = "potvrdil<br />".Date("H:i:s d.m.Y",$row['date_technik_potvrdil']);
        }


        if($row['synchronizace'] == "local") {
            $signal_synchron = " class=\"orange\"";
            $text_synchron = "vytvořen export<br />".Date("H:i:s d.m.Y",$row['date_synchronizace']);
        }
        elseif($row['synchronizace'] == "synchronizovan") {
            $signal_synchron = " class=\"green\"";
            $text_synchron = "nahrán zpět na server<br />".Date("H:i:s d.m.Y",$row['date_synchronizace']);
        }


        if($row['stav_checklist'] == "uzavren") {
            $text4a = "Checklist: uzavřen (".Date("H:i:s d.m.Y",$row['date_stav_checklist']).")";
            $signal4a = true;
        }
        else {
            $text4a = "Checklist: neuzavřen";
            $signal4a = false;
        }

        if($row['stav_pracoviste'] == "uzavren") {
            $text4b = "<br />Pracoviště: uzavřeno (".Date("H:i:s d.m.Y",$row['date_stav_pracoviste']).")";
            $signal4b = true;
        }
        else {
            $text4b = "<br/>Pracoviště: neuzavřeno";
            $signal4b = false;
        }

        if($row['stav_neshody'] == "uzavren") {
            $text4c = "<br />Neshody: zpracováno (".Date("H:i:s d.m.Y",$row['date_stav_neshody']).")";
            $signal4c = true;
        }
        else {
            $text4c = "<br/>Neshody: nezpracováno";
            $signal4c = false;
        }

        $text4 = $text4a.$text4b.$text4c;
        if($signal4a && $signal4b && $signal4c && barva_info_protokol_audit($row['id'])) $signal4 = " class=\"green\"";
        elseif($signal4a || $signal4b || $signal4c || barva_info_protokol_audit($row['id'])) $signal4 = " class=\"orange\"";
        else $signal4 = " class=\"red\"";

        $result2 = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $row['id_koordinator']);
        $row2 = $result2->fetch();
        $result3 = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $row['id_firemni_uzivatel']);
        $row3 = $result3->fetch();
        $result4 = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $row['id_technik']);
        $row4 = $result4->fetch();

        $result_exporty = dibi::query('SELECT * FROM [prevent_audit_exporty] WHERE [id_audit] = %i', $row['id']);
        $row_exporty = $result_exporty->fetch();

        echo "
			<tr>
			<td ".$signal.">".$text."</td>
			<td ".$signal2.">".$text2."</td>
			<td ".$signal3.">".$text3."</td>
                         <td ".$signal_synchron.">".$text_synchron."</td>
                        <td ".$signal4.">".$text4.echo_info_protokol_audit($row['id'])."</td>
			<td>";
        echo "<a href=\"./sprava_auditu.php?id=detaily_auditu&firma=".get_id_firma_z_provozovny($row['id_provozovna'])."&provozovna=".$row['id_provozovna']."&audit=".$row['id']."\">detaily</a><br /><a href=\"./".$row_exporty['cesta']."\">stáhnout exportovaný soubor</a><br /><a href=\"./synchronizace.php?id=import&id_audit=".$row['id']."\">importovat</a>";
        echo "</td><td>".$row['nazev']."</td>
                        <td>".get_nazev_firmy(get_id_firma_z_provozovny($row['id_provozovna']))."</td>
                        <td>".get_nazev_provozovny($row['id_provozovna'], false)."</td>
                        <td>".Date("H:i:s d.m.Y",$row['date'])."</td>
			<td>".$row['typ']."<br />".$row['typ_po']."</td>
                        <td>".$row4['jmeno']."</td>
			<td>".$row2['jmeno']."</td>
			<td>".$row3['jmeno']."</td>
			<td id=\"maly_info_".$row['id']."\"><a href=\"#\" onClick=\"return show_hide('maly_info_".$row['id']."','velky_info_".$row['id']."')\">ukaž text</a></td>
			<td id=\"velky_info_".$row['id']."\" style=\"display: none;\">".nl2br($row['komentar'])."<br /><a href=\"#\" onClick=\"return show_hide('velky_info_".$row['id']."','maly_info_".$row['id']."')\">uzavřít</a></td>
			</tr>";
    }
    echo "</table>";

}

function export($id_audit) {
    $result_audit = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id_audit);
    $row_audit = $result_audit->fetch();
    $soubor = fopen("./audit_data/".$id_audit."/export_audit_".$id_audit.".sql", "w");
    fwrite($soubor, "-- *** Export auditu Systému Guardian ***\n-- Vytvořeno: ".Date("H:i:s d.m.Y", Time())."\n-- Vytvořil: ".$_SESSION['jmeno_usr']."\n\n-- Záloha obsahuje kompletní inserty\n-- Obnovu může provést pouze hlavní admin\n\n-- Vybrané tabulky: ");
    $tabulky_seznam = "";
    $celkem_radku = 0;
    $cas_start = Time();
    $tabulky[0] = "prevent_audit";
    $tabulky[1] = "prevent_audit_synchronizace";
    $tabulky[2] = "prevent_firmy_pracoviste";
    $tabulky[3] = "prevent_firmy_pracoviste_relace";
    $tabulky[4] = "prevent_firmy_provozovny";
    $tabulky[5] = "prevent_firmy";
    $tabulky[6] = "prevent_audit_protokoly";
    
    ini_set("safe_mode", "Off");

    for($x=0;$x<count($tabulky);$x++) $tabulky_seznam .= $tabulky[$x].", ";
    fwrite($soubor, $tabulky_seznam);

    //prevent_audit
    $table = "prevent_audit";
    $result = dibi::query('SHOW COLUMNS FROM %n', $table);
    $count_typ = $result->count();
    $result = dibi::query('SELECT * FROM %n', $table, 'WHERE [id] = %i',$id_audit);
    $count_data = $result->count();
    $count_data_ochrana = 0;
    $celkem_radku += $count_data;
    fwrite($soubor, "\n\n-- Tabulka: '$table'\n-- Počet řádků tabulky: ".$count_data."\n-- Začátek dat tabulky\n");
    if($count_data == 0) {
        fwrite($soubor, "-- Tabulka neobsahuje data\n");
    }
    else {
        fwrite($soubor, "INSERT INTO `$table` VALUES \n");
        $result = dibi::query('SELECT * FROM %n', $table, 'WHERE [id] = %i',$id_audit);
        while($row = $result->fetch()) {
            $result_typ = dibi::query('SHOW COLUMNS FROM %n', $table);
            fwrite($soubor, "(");
            for($i=0;$i<$count_typ;$i++) {
                $columns = $result_typ->fetch();
                fwrite($soubor, "\"".$row[$columns['Field']]."\"");
                if ($i != ($count_typ-1)) fwrite($soubor, ", ");
            }
            $count_data_ochrana++;

            if($count_data_ochrana == $count_data) fwrite($soubor, ");\n");
            else fwrite($soubor, "),\n");
        }
    }
    fwrite($soubor, "-- Konec dat tabulky\n");

    //prevent_audit_synchronizace
    $table = "prevent_audit_synchronizace";
    $result = dibi::query('SHOW COLUMNS FROM %n', $table);
    $count_typ = $result->count();
    $result = dibi::query('SELECT * FROM [prevent_audit_synchronizace]', 'WHERE [id_audit] = %i',$id_audit);
    $count_data = $result->count();
    $count_data_ochrana = 0;
    $celkem_radku += $count_data;
    fwrite($soubor, "\n\n-- Tabulka: '$table'\n-- Počet řádků tabulky: ".$count_data."\n-- Začátek dat tabulky\n");
    if($count_data == 0) {
        fwrite($soubor, "-- Tabulka neobsahuje data\n");
    }
    else {
        fwrite($soubor, "INSERT INTO `$table` VALUES \n");
        $result = dibi::query('SELECT * FROM %n', $table, 'WHERE [id_audit] = %i', $id_audit);
        $row = $result->fetch();
        $result_typ = dibi::query('SHOW COLUMNS FROM %n', $table);
        fwrite($soubor, "(");
        for($i=0;$i<$count_typ;$i++) {
            $columns = $result_typ->fetch();
            fwrite($soubor, "\"".$row[$columns['Field']]."\"");
            if ($i != ($count_typ-1)) fwrite($soubor, ", ");
        }
        $count_data_ochrana++;

        if($count_data_ochrana == $count_data) fwrite($soubor, ");\n");
        else fwrite($soubor, "),\n");
    }
    fwrite($soubor, "-- Konec dat tabulky\n");

    //prevent_firmy_pracoviste
    $table = "prevent_firmy_pracoviste";
    $result = dibi::query('SHOW COLUMNS FROM %n', $table);
    $count_typ = $result->count();
    $result = dibi::query('SELECT * FROM [prevent_firmy_pracoviste_relace]', 'WHERE [id_provozovna] = %i',$row_audit['id_provozovna']);
    $count_data = $result->count();
    $count_data_ochrana = 0;
    $celkem_radku += $count_data;
    fwrite($soubor, "\n\n-- Tabulka: '$table'\n-- Počet řádků tabulky: ".$count_data."\n-- Začátek dat tabulky\n");
    if($count_data == 0) {
        fwrite($soubor, "-- Tabulka neobsahuje data\n");
    }
    else {
        fwrite($soubor, "INSERT INTO `".$table."_tmp` VALUES \n");
        $resultx = dibi::query('SELECT * FROM [prevent_firmy_pracoviste_relace]', 'WHERE [id_provozovna] = %i',$row_audit['id_provozovna']);
        while($rowx = $resultx->fetch()) {
            $result = dibi::query('SELECT * FROM %n', $table, 'WHERE [id] = %i',$rowx['id_pracoviste']);
            $row = $result->fetch();
            $result_typ = dibi::query('SHOW COLUMNS FROM %n', $table);
            fwrite($soubor, "(");
            for($i=0;$i<$count_typ;$i++) {
                $columns = $result_typ->fetch();
                fwrite($soubor, "\"".$row[$columns['Field']]."\"");
                if ($i != ($count_typ-1)) fwrite($soubor, ", ");
            }
            $count_data_ochrana++;

            if($count_data_ochrana == $count_data) fwrite($soubor, ");\n");
            else fwrite($soubor, "),\n");

        }
    }
    fwrite($soubor, "-- Konec dat tabulky\n");

    //prevent_firmy_pracoviste_relace
    $table = "prevent_firmy_pracoviste_relace";
    $result = dibi::query('SHOW COLUMNS FROM %n', $table);
    $count_typ = $result->count();
    $result = dibi::query('SELECT * FROM [prevent_firmy_pracoviste_relace]', 'WHERE [id_provozovna] = %i',$row_audit['id_provozovna']);
    $count_data = $result->count();
    $count_data_ochrana = 0;
    $celkem_radku += $count_data;
    fwrite($soubor, "\n\n-- Tabulka: '$table'\n-- Počet řádků tabulky: ".$count_data."\n-- Začátek dat tabulky\n");
    if($count_data == 0) {
        fwrite($soubor, "-- Tabulka neobsahuje data\n");
    }
    else {
        fwrite($soubor, "INSERT INTO `".$table."_tmp` VALUES \n");
        $result = dibi::query('SELECT * FROM %n', $table, 'WHERE [id_provozovna] = %i',$row_audit['id_provozovna']);
        while($row = $result->fetch()) {
            $result_typ = dibi::query('SHOW COLUMNS FROM %n', $table);
            fwrite($soubor, "(");
            for($i=0;$i<$count_typ;$i++) {
                $columns = $result_typ->fetch();
                fwrite($soubor, "\"".$row[$columns['Field']]."\"");
                if ($i != ($count_typ-1)) fwrite($soubor, ", ");
            }
            $count_data_ochrana++;

            if($count_data_ochrana == $count_data) fwrite($soubor, ");\n");
            else fwrite($soubor, "),\n");

        }
    }
    fwrite($soubor, "-- Konec dat tabulky\n");

    //prevent_firmy_provozovny
    $table = "prevent_firmy_provozovny";
    $result = dibi::query('SHOW COLUMNS FROM %n', $table);
    $count_typ = $result->count();
    $result = dibi::query('SELECT * FROM %n', $table, 'WHERE [id] = %i',$row_audit['id_provozovna']);
    $count_data = $result->count();
    $count_data_ochrana = 0;
    $celkem_radku += $count_data;
    fwrite($soubor, "\n\n-- Tabulka: '$table'\n-- Počet řádků tabulky: ".$count_data."\n-- Začátek dat tabulky\n");
    if($count_data == 0) {
        fwrite($soubor, "-- Tabulka neobsahuje data\n");
    }
    else {
        fwrite($soubor, "INSERT INTO `".$table."_tmp` VALUES \n");
        $result = dibi::query('SELECT * FROM %n', $table, 'WHERE [id] = %i',$row_audit['id_provozovna']);
        while($row = $result->fetch()) {
            $result_typ = dibi::query('SHOW COLUMNS FROM %n', $table);
            fwrite($soubor, "(");
            for($i=0;$i<$count_typ;$i++) {
                $columns = $result_typ->fetch();
                fwrite($soubor, "\"".$row[$columns['Field']]."\"");
                if ($i != ($count_typ-1)) fwrite($soubor, ", ");
            }
            $count_data_ochrana++;

            if($count_data_ochrana == $count_data) fwrite($soubor, ");\n");
            else fwrite($soubor, "),\n");
        }
    }

    fwrite($soubor, "-- Konec dat tabulky\n");

    //prevent_firmy
    $table = "prevent_firmy";
    $result = dibi::query('SHOW COLUMNS FROM %n', $table);
    $count_typ = $result->count();
    $result = dibi::query('SELECT * FROM %n', $table, 'WHERE [id] = %i',get_id_firma_z_audit($id_audit));
    $count_data = $result->count();
    $count_data_ochrana = 0;
    $celkem_radku += $count_data;
    fwrite($soubor, "\n\n-- Tabulka: '$table'\n-- Počet řádků tabulky: ".$count_data."\n-- Začátek dat tabulky\n");
    if($count_data == 0) {
        fwrite($soubor, "-- Tabulka neobsahuje data\n");
    }
    else {
        fwrite($soubor, "INSERT INTO `".$table."_tmp` VALUES \n");
        $result = dibi::query('SELECT * FROM %n', $table, 'WHERE [id] = %i',get_id_firma_z_audit($id_audit));
        while($row = $result->fetch()) {
            $result_typ = dibi::query('SHOW COLUMNS FROM %n', $table);
            fwrite($soubor, "(");
            for($i=0;$i<$count_typ;$i++) {
                $columns = $result_typ->fetch();
                fwrite($soubor, "\"".$row[$columns['Field']]."\"");
                if ($i != ($count_typ-1)) fwrite($soubor, ", ");
            }
            $count_data_ochrana++;

            if($count_data_ochrana == $count_data) fwrite($soubor, ");\n");
            else fwrite($soubor, "),\n");
        }
    }
    fwrite($soubor, "-- Konec dat tabulky\n");

    //prevent_audit_protokoly
    $table = "prevent_audit_protokoly";
    $result = dibi::query('SHOW COLUMNS FROM %n', $table);
    $count_typ = $result->count();
    $result = dibi::query('SELECT * FROM %n', $table, 'WHERE [id_audit] = %i',$id_audit);
    $count_data = $result->count();
    $count_data_ochrana = 0;
    $celkem_radku += $count_data;
    fwrite($soubor, "\n\n-- Tabulka: '$table'\n-- Počet řádků tabulky: ".$count_data."\n-- Začátek dat tabulky\n");
    if($count_data == 0) {
        fwrite($soubor, "-- Tabulka neobsahuje data\n");
    }
    else {
        fwrite($soubor, "INSERT INTO `$table` VALUES \n");
        $result = dibi::query('SELECT * FROM %n', $table, 'WHERE [id_audit] = %i',$id_audit);
        while($row = $result->fetch()) {
            $result_typ = dibi::query('SHOW COLUMNS FROM %n', $table);
            fwrite($soubor, "(");
            for($i=0;$i<$count_typ;$i++) {
                $columns = $result_typ->fetch();
                fwrite($soubor, "\"".$row[$columns['Field']]."\"");
                if ($i != ($count_typ-1)) fwrite($soubor, ", ");
            }
            $count_data_ochrana++;

            if($count_data_ochrana == $count_data) fwrite($soubor, ");\n");
            else fwrite($soubor, "),\n");
        }
    }
    fwrite($soubor, "-- Konec dat tabulky\n");

    $cas_provadeni = Time() - $cas_start;
    fwrite($soubor, "\n\n-- *** Konec exportu auditu Systému Guardian ***\n-- Doba vytváření exportu: ".$cas_provadeni." sec \n-- Celkem vyexportováno řádků: ".$celkem_radku."\n");
    fclose($soubor);

    $file = file_get_contents("./audit_data/".$id_audit."/export_audit_".$id_audit.".sql");
    $crc = md5($file);
    return $crc;
}

function import($tmpname, $name) {
    $nazev_souboru = $tmpname;
    $cil = "./audit_data/tmp/".$name;
    move_uploaded_file($nazev_souboru, $cil);
    $pocetbajtu = filesize($cil);
    if(file_exists($cil)) {
        $kod = explode(".", $name);
        $crc = md5(file_get_contents($cil));
        if($crc != $kod[0]) {
            echo "<div class=\"obdelnik\"><h5>Chyba importu - soubor je poškozen nebo byl změněn.</h5><p>Soubor je poškozen. Zkuste  <a href=\"./synchronizace.php?id=import\">akci opakovat</a>.</p></div>";
        }
        else {
            $result_exporty = dibi::query('SELECT * FROM [prevent_audit_exporty] WHERE [crc] = %s', $crc);
            $row_exporty = $result_exporty->count();

            if($row_exporty > 0) {
                echo "<div class=\"obdelnik\"><h5>Chyba importu - nelze importovat jeden audit dvakrát.</h5><p>Zkuste <a href=\"./synchronizace.php?id=import\">akci opakovat</a>.</p></div>";
                unlink($cil);
            }
            else {
                dibi::loadFile($cil);

                $result = dibi::query('SELECT * FROM [prevent_audit_synchronizace] ORDER BY [id] DESC LIMIT 0, 1');
                $row = $result->fetch();

                $arr_log = array('text'  => 'Importoval audit provozovně '.get_nazev_provozovny(get_id_provozovna_z_audit($row['id_audit']), false).'' , 'link' => '', 'ad' => $_SESSION['id_usr']);
                vytvor_log($arr_log);

                $arr_log = array('text'  => 'Importován audit' , 'id_audit' => $row['id_audit'], 'id_provozovna' => get_id_provozovna_z_audit($row['id_audit']));
                vytvor_log_audit($arr_log);

                $arr = array('id_audit'  => $row['id_audit'], 'typ' => 'in', 'cesta' => "./audit_data/tmp/".$crc.".sql", 'date' => Time(), 'crc' => $crc);
                dibi::query('INSERT INTO [prevent_audit_exporty]', $arr);

                echo "<div class=\"obdelnik\"><h5>Audit importován.</h5><p>Můžete přejít na <a href=\"./sprava_auditu.php?id=detaily_auditu&firma=".get_id_firma_z_audit($row['id_audit'])."&provozovna=".get_id_provozovna_z_audit($row['id_audit'])."&audit=".$row['id_audit']."\">detaily auditu</a>.</p></div>";
            }
        }
    }
    else {
        echo "<div class=\"obdelnik\"><h5>Chyba importu - nelze nahrát soubor.</h5><p>Zkuste <a href=\"./synchronizace.php?id=import\">akci opakovat</a>.</p></div>";
    }
}
?>