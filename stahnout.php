<?php
require("./header/header_stahnout.php");


hlavicka_minipage();

navigace_horni_minipage();
?>
<h2>Stáhnout</h2>
<div class="mainminipage">
    <?php
    if(login()) {
        if($_GET['id'] == "audit_data") {
            echo "<h3>Prokoly auditu</h3>";
            if(prava_k_auditu($_GET['id_audit'], $_SESSION['id_usr'])) {
                echo "<h4>Jednotlivé soubory</h4>";
                echo "<ul>";
                $result = dibi::query('SELECT * FROM [prevent_audit_soubory] WHERE [id_audit] = %i', $_GET['id_audit']);
                while($row = $result->fetch()) {
                    echo "<li><a href=\"".$row['cesta']."\" target=\"_blank\">".$row['nazev']."</a>
                        <br /><i>Datum:</i> ".Date("H:i:s d.m.Y",$row['date'])."
                        <br /><i>Komentář:</i> ".$row['komentar']."
                        <br /><i>Velikost:</i> ".format_size(filesize($row['cesta']))."</li>";
                }
                echo "</ul>";
//                echo "<h4>Zip soubor se všemi soubory</h4>";
//                echo "<ul>";
//                $result = dibi::query('SELECT * FROM [prevent_audit_zip] WHERE [id_audit] = %i', $_GET['id_audit'], 'AND [typ] = %s', "protokoly");
//                $row = $result->fetch();
//                echo "<li><a href=\"./audit_data/".$_GET['id_audit']."/".$row['cesta']."\">".$row['nazev']."</a>
//                        <br /><i>Datum:</i> ".Date("H:i:s d.m.Y",$row['date'])."
//                        <br /><i>Komentář:</i> ".$row['komentar']."
//                        <br /><i>Velikost:</i> ".format_size(filesize("./audit_data/".$_GET['id_audit']."/".$row['cesta']))."</li>";
//
//                echo "</ul>";
            }
            else {
                echo "<h4>Nemáte právo pracovat se zvoleným auditem!</h4><p>Přejděte zpět k volbě auditu.</p>";
            }
        }
        if($_GET['id'] == "audit_fotografie") {
            echo "<h3>Fotografie auditu</h3>";
            if(prava_k_auditu($_GET['id_audit'], $_SESSION['id_usr'])) {
                $result_audit = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $_GET['id_audit']);
                $row_audit = $result_audit->fetch();

                echo "<h4>Jednotlivé soubory</h4>";
                echo "<ul>";
                $result = dibi::query('SELECT * FROM [prevent_audit_fotografie] WHERE [id_audit] = %i', $_GET['id_audit']);
                while($row = $result->fetch()) {
                    if($row['objekt'] == "checklist") {
                        if ($row_audit['typ'] == "bozp") $table = "bozp";
                        elseif ($row_audit['typ'] == "po") $table = "po";
                        elseif ($row_audit['typ'] == "bozp+po") $table = "bozppo";

                        $result_check_audit= dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie] WHERE [id] = %i', $row['id_objekt']);
                        $row_check_audit = $result_check_audit->fetch();

                        $result_check_1= dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [id] = %i', $row_check_audit['id_kat']);
                        $row_check_1 = $result_check_1->fetch();

                        $puvod = "CHECKLIST: ".$row_check_1['cislo'].". ".$row_check_1['kat_jmeno'];
                    }
                    elseif($row['objekt'] == "pracoviste") {
                        $puvod = "PRACOVIŠTĚ: ".get_jmeno_objekt("pracoviste", $row['id_objekt']);
                    }

                    echo "<li><a href=\"./audit_data/".$_GET['id_audit']."/fotografie/".$row['cesta']."\" target=\"_blank\">".$row['nazev']."</a> (<a href=\"./audit_data/".$_GET['id_audit']."/fotografie/".$row['cesta']."\" title=\"".$row['nazev']." - ".$row['komentar']." - ".Date("H:i:s d.m.Y",$row['date'])."\" rel=\"lytebox[náhled]\">náhled</a>)
                        <br /><i>Datum:</i> ".Date("H:i:s d.m.Y",$row['date'])."
                        <br /><i>Původ:</i> ".$puvod."
                        <br /><i>Komentář:</i> ".$row['komentar']."
                        <br /><i>Velikost:</i> ".format_size(filesize("./audit_data/".$_GET['id_audit']."/fotografie/".$row['cesta']))."</li>";
                }
                echo "</ul>";
                echo "<h4>Zip soubor se všemi soubory</h4>";
                echo "<ul>";
                $result = dibi::query('SELECT * FROM [prevent_audit_zip] WHERE [id_audit] = %i', $_GET['id_audit'], 'AND [typ] = %s', "fotografie");
                $row = $result->fetch();
                echo "<li><a href=\"./audit_data/".$_GET['id_audit']."/".$row['cesta']."\">".$row['nazev']."</a>
                        <br /><i>Datum:</i> ".Date("H:i:s d.m.Y",$row['date'])."
                        <br /><i>Komentář:</i> ".$row['komentar']."
                        <br /><i>Velikost:</i> ".format_size(filesize("./audit_data/".$_GET['id_audit']."/".$row['cesta']))."</li>";

                echo "</ul>";
            }
            else {
                echo "<h4>Nemáte právo pracovat se zvoleným auditem!</h4><p>Přejděte zpět k volbě auditu.</p>";
            }
        }
    }

    patka_minipage();

    ?>