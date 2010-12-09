<?php
require("./header/header_nahrat_soubor.php");


hlavicka_minipage();

navigace_horni_minipage();
?>
<h2>Nahrát Soubor</h2>
<div class="mainminipage">

<?php
if(login() && (($_SESSION['prava_usr'] == "technik") || ($_SESSION['prava_usr'] == "koordinator") || ($_SESSION['prava_usr'] == "admin")))
{
    if($_GET['typ'] == "fotografie_checklist")
    {
        echo "<h3>Přidat fotografii k checklistu</h3>";

        if ($_FILES['fupload'] != null)
        {
              if (isset($_FILES['fupload']))
              {
                  if($_FILES['fupload']['size'] <= 1024*1024*8*2)
                  {
                      if ($_FILES['fupload']['type'] == "image/jpeg")
                      {
                          $nazev_souboru = $_FILES['fupload']['tmp_name'];
                          $cil = "./audit_data/".$_GET['id_audit']."/fotografie/".$_FILES['fupload']['name'];

                          move_uploaded_file($nazev_souboru, $cil)or die ("<h4>Chyba uploadu!</h4>");

                          $arr = array('id_audit' => $_GET['id_audit'], 'objekt' => $_GET['objekt'], 'id_objekt' => $_GET['id_objekt'], 'nazev' => $_POST['nazev'], 'komentar' => $_POST['komentar'], 'cesta' => $_FILES['fupload']['name'], 'date' => Time());
                          dibi::query('INSERT INTO [prevent_audit_fotografie]', $arr);

                          $arr_log = array('text' => 'Upraven checklist - přidána fotografie' , 'id_audit' => $_GET['id_audit'], 'id_provozovna' => get_id_provozovna_z_audit($_GET['id_audit']));
                          vytvor_log_audit($arr_log);

                          echo "<h4>Fotografie nahrána</h4><p>Fotografie byla úspěšně nahrána <a href=\"javascript: self.close ();\">zavřete okno</a>.</p>";
                      }
                      else
                      {
                          echo "<h4>Můžete nahrát pouze soubor typu JPG o velikosti max 2MB.</h4>";
                      }
                  }
                  else
                  {
                      echo "<h4>Můžete nahrát pouze soubor typu JPG o velikosti max 2MB.</h4>";
                  }
              }
        }
        else
        {
            //nastaveno 2MB max
            echo "
            <form method=\"post\" action=\"".$_SERVER['REQUEST_URI']."\" enctype=\"multipart/form-data\" id=\"nahrat\">
            <fieldset>
            <legend>Přidat soubor</legend>
            <label for=\"soubor\">Vyberte obrázek</label><br />
            <input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"16777216\">
            <input type=\"file\" id=\"soubor\" name=\"fupload\" class=\"formular\"><br />
            <label for=\"nazev\">Název</label><br />
            <input name=\"nazev\" class=\"formular\" id=\"nazev\" size=\"15\" maxlength=\"15\"><br />
            <label for=\"komentar\">Komentář</label><br />
            <textarea name=\"komentar\" cols=\"40\" rows=\"6\" class=\"formular\" id=\"komentar\"></textarea><br />
            <input class=\"tlacitko\" type=\"submit\" value=\"Přidat\"> <a href=\"javascript: self.close ();\">nepřidávat</a>
            </fieldset>
            </form>
           <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#nahrat').validate({
             rules: {
               nazev: {
                 required: true
               },
               komentar: {
                 required: true
               }

               }
             });
           });
           </script>";
        }
 
    }
    elseif($_GET['typ'] == "fotografie_pracoviste")
    {
        echo "<h3>Přidat fotografii k auditu pracoviště</h3>";

        if ($_FILES['fupload'] != null)
        {
              if (isset($_FILES['fupload']))
              {
                  if($_FILES['fupload']['size'] <= 1024*1024*8*2)
                  {
                      if ($_FILES['fupload']['type'] == "image/jpeg")
                      {
                          $nazev_souboru = $_FILES['fupload']['tmp_name'];
                          $cil = "./audit_data/".$_GET['id_audit']."/fotografie/".$_FILES['fupload']['name'];

                          move_uploaded_file($nazev_souboru, $cil)or die ("<h4>Chyba uploadu!</h4>");

                          $arr = array('id_audit' => $_GET['id_audit'], 'objekt' => $_GET['objekt'], 'id_objekt' => $_GET['id_objekt'], 'nazev' => $_POST['nazev'], 'komentar' => $_POST['komentar'], 'cesta' => $_FILES['fupload']['name'], 'date' => Time());
                          dibi::query('INSERT INTO [prevent_audit_fotografie]', $arr);

                          $arr_log = array('text' => 'Upraven audit pracoviste - přidána fotografie' , 'id_audit' => $_GET['id_audit'], 'id_provozovna' => get_id_provozovna_z_audit($_GET['id_audit']));
                          vytvor_log_audit($arr_log);

                          echo "<h4>Fotografie nahrána</h4><p>Fotografie byla úspěšně nahrána <a href=\"javascript: self.close ();\">zavřete okno</a>.</p>";
                      }
                      else
                      {
                          echo "<h4>Můžete nahrát pouze soubor typu JPG o velikosti max 2MB.</h4>";
                      }
                  }
                  else
                  {
                      echo "<h4>Můžete nahrát pouze soubor typu JPG o velikosti max 2MB.</h4>";
                  }
              }
        }
        else
        {
            //nastaveno 2MB max
            echo "
            <form method=\"post\" action=\"".$_SERVER['REQUEST_URI']."\" enctype=\"multipart/form-data\" id=\"nahrat\">
            <fieldset>
            <legend>Přidat soubor</legend>
            <label for=\"soubor\">Vyberte obrázek</label><br />
            <input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"16777216\">
            <input type=\"file\" id=\"soubor\" name=\"fupload\" class=\"formular\"><br />
            <label for=\"nazev\">Název</label><br />
            <input name=\"nazev\" class=\"formular\" id=\"nazev\" size=\"15\" maxlength=\"15\"><br />
            <label for=\"komentar\">Komentář</label><br />
            <textarea name=\"komentar\" cols=\"40\" rows=\"6\" class=\"formular\" id=\"komentar\"></textarea><br />
            <input class=\"tlacitko\" type=\"submit\" value=\"Přidat\"> <a href=\"javascript: self.close ();\">nepřidávat</a>
            </fieldset>
            </form>
           <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#nahrat').validate({
             rules: {
               nazev: {
                 required: true
               },
               komentar: {
                 required: true
               }

               }
             });
           });
           </script>";
        }

    }


}

patka_minipage();

?>