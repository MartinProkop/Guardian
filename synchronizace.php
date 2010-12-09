<?php
//include
require("./header/header_synchronizace.php");


//START OBSAHU STRÁNKY
if(login() && $_SESSION['prava_usr'] == "admin" || $_SESSION['prava_usr'] == "technik" || $_SESSION['prava_usr'] == "koordinator") {
    if($_GET['id'] == "synchronizace") {
        echo "<h3>Přehled</h3>";
        prehled_exportovanych_auditu();

    }
    elseif($_GET['id'] == "import") {
        echo "<h3>Import</h3>";
        if($_FILES[fupload] != null) {
            import($_FILES['fupload']['tmp_name'], $_FILES['fupload']['name']);
        }
        else {
            echo "<form method=\"POST\" enctype=\"multipart/form-data\"  action=\"".$_SERVER['REQUEST_URI']."\">
                      <input type=\"hidden\" name=\"send\" value=\"ano\" />";
            echo "<fieldset name>
                    <legend>Importovat audit</legend>
                    <label for=\"soubor\">soubor importu</label><br />
                    <input type=\"file\" name=\"fupload\" id=\"soubor\" class=\"tlacitko\" />
                    <input type=\"submit\" class=\"tlacitko\" value=\"importovat\" /> <a href=\"./synchronizace.php?id=enter\">neimportovat</a>
                    </fieldset>
                    </form>";
        }
    }
    elseif($_GET['id'] == "export") {
        echo "<h3>Export</h3>";

        $result_audit = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $_GET['id_audit']);
        $row_audit = $result_audit->fetch();
        if($_POST['send'] == "ano") {
            dibi::query('UPDATE [prevent_audit] SET [synchronizace] = %s', "local", ', [date] = %i', Time(), ', [date_synchronizace] = %i', Time(), 'WHERE [id] = %i',$_GET['id_audit']);
            $arr_log = array('text'  => 'Audit byl exportován' , 'id_audit' => $_GET['id_audit'], 'id_provozovna' => get_id_provozovna_z_audit($_GET['id_audit']));
            vytvor_log_audit($arr);

            $arr = array('id_audit'  => $_GET['id_audit'], 'date' => Time(), 'komentar' => $_POST['komentar'], 'jmeno_technik' => get_jmeno_uzivatele_z_id($row_audit['id_technik']), 'jmeno_firemni_uzivatel' => get_jmeno_uzivatele_z_id($row_audit['id_firemni_uzivatel']), 'jmeno_koordinator'  => get_jmeno_uzivatele_z_id($row_audit['id_koordinator']), 'jmeno_firma'  => get_nazev_firmy(get_id_firma_z_provozovny($row_audit['id_provozovna'])), 'jmeno_provozovna'  => get_nazev_provozovny($row_audit['id_provozovna'], false));
            dibi::query('INSERT INTO [prevent_audit_synchronizace]', $arr);

            $crc = export($_GET['id_audit']);

            $arr_ukol = array('deadline' => '', 'text'  => 'Stáhněte si exportovaný audit', 'popis' => 'Vyexportoval jste audit ID#'.$_GET['id_audit'].', stáhněte si ho a importujte do Vašeho notebooku.', 'link' => './synchronizace.php?id=enter', 'ad' => $_SESSION['id_usr']);
            novy_ukol($arr_ukol);

            rename("./audit_data/".$_GET['id_audit']."/export_audit_".$_GET['id_audit'].".sql", "./audit_data/".$_GET['id_audit']."/".$crc.".sql");

            $arr = array('id_audit'  => $_GET['id_audit'], 'typ' => 'out', 'cesta' => "./audit_data/".$_GET['id_audit']."/".$crc.".sql", 'date' => Time(), 'crc' => $crc);
            dibi::query('INSERT INTO [prevent_audit_exporty]', $arr);
            echo "<div class=\"obdelnik\"><h5>Audit byl vyexportován.</h5><p>Stáhněte si <a href=\"./synchronizace.php?id=synchronizace\">exportovaný soubor</a>.</p></div>";
        }
        else {
            echo "<form method=\"POST\" action=\"".$_SERVER['REQUEST_URI']."\">
                      <input type=\"hidden\" name=\"send\" value=\"ano\" />";
            echo "<fieldset name>
                    <legend>Exportovat audit</legend>
                    <label for=\"id_audit\">id audit</label><br />
                    #".$_GET['id_audit']."<br />
                    <label for=\"id_audit\">klient</label><br />
                    ".get_nazev_firmy(get_id_firma_z_audit($_GET['id_audit']))."<br />
                    <label for=\"provozovna\">pobočka</label><br />
                    ".get_nazev_provozovny($row_audit['id_provozovna'], false)."<br />
                    <label for=\"komentar\">komentář</label><br />
                    <textarea id=\"komentar\" class=\"formular\" rows=\"6\" cols=\"40\" name=\"komentar\"></textarea><br />
                    <input type=\"submit\" class=\"tlacitko\" value=\"vytvořit\" /> <a href=\"./synchronizace.php?id=enter\">nevytvářet</a>
                    </fieldset>
                    </form>";
        }
    }
}

//KONEC OBSAHU STRÁNKY
patka();
?>