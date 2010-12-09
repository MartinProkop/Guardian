<?php
require("./header/header_nove_okno_form.php");


hlavicka_minipage();

navigace_horni_minipage();
?>
<h2>Vložení textu</h2>
<div class="mainminipage">

    <?php
    if (login ()) {
        if ($_GET['id'] == "checklist_komentar_k_otazce") {
            echo "<h3>Komentář k otázce v checklistu</h3>";
            if (prava_k_auditu($_GET['id_audit'], $_SESSION['id_usr'])) {

                if ($_GET['disabled'] == "ano")
                    $disabled = "disabled";
                else
                    $disabled = "";

                $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $_GET['id_audit']);
                $row = $result->fetch();

                if ($_POST['send'] == "ano") {
                    dibi::query('UPDATE [prevent_audit_checklist] SET [komentar] = %s', $_POST['komentar'], ', [date] = %i', Time(), 'WHERE [id] = %i', $_GET['id_otazka']);
                    echo "<div class=\"obdelnik\"><h5>Komentář uložen</h5><p><a href=\"javascript: self.close ();\">Zavřete okno</a> a pokračujte v auditu.</p></div>";
                } else {



                    $result_check_audit = dibi::query('SELECT * FROM [prevent_audit_checklist] WHERE [id] = %i', $_GET['id_otazka']);
                    $row_check_audit = $result_check_audit->fetch();

                    $result_check_1 = dibi::query('SELECT * FROM [prevent_audit_checklist_schema] WHERE [id] = %i', $row_check_audit['id_otazka']);
                    $row_check_1 = $result_check_1->fetch();

                    $result_check_2 = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [id] = %i', $row_check_1['id_kat']);
                    $row_check_2 = $result_check_2->fetch();

                    $text_puvod = "CHECKLIST: " . $row_check_2['cislo'] . ". " . $row_check_2['kat_jmeno'] . ": " . $row_check_1['cislo'] . ". " . $row_check_1['text'] . $odpoved;

                    echo "<form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" id=\"form\">
                      <input type=\"hidden\" name=\"send\" value=\"ano\" />";
                    echo "<fieldset name>
                    <legend>Komentář k otázce v checklistu</legend>
                    <label for=\"id_audit\">id audit</label><br />
                    #" . $_GET['id_audit'] . "<br />
                    <label for=\"id_audit\">firma</label><br />
                    " . get_nazev_firmy(get_id_firma_z_audit($_GET['id_audit'])) . "<br />
                    <label for=\"provozovna\">provozovna</label><br />
                    " . get_nazev_provozovny($row['id_provozovna'], false) . "<br />
                    <label for=\"puvod\">původ</label><br />
                    " . $text_puvod . "<br />
                    <label for=\"komentar\">komentář</label><br />
                    <textarea id=\"komentar\" class=\"formular\" rows=\"6\" cols=\"40\" name=\"komentar\" $disabled>" . $row_check_audit['komentar'] . "</textarea><br />
                    <input type=\"submit\" class=\"tlacitko$disabled\" value=\"uložit\" $disabled/> <a href=\"javascript: self.close ();\">neukládat</a>
                    </fieldset>
                    </form>
          <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#form').validate({
             rules: {
               komentar: {
                 required: true,
               }

               }
             });
           });
           </script>";
                }
            } else {
                echo "<h4>Nemáte právo pracovat se zvoleným auditem!</h4><p>Přejděte zpět k volbě auditu.</p>";
            }
        } elseif ($_GET['id'] == "checklist_poznamka_k_otazce_mimo_protokol") {
            echo "<h3>Poznámka k otázce v checklistu mimo protokol</h3>";
            if (prava_k_auditu($_GET['id_audit'], $_SESSION['id_usr'])) {

                if ($_GET['disabled'] == "ano")
                    $disabled = "disabled";
                else
                    $disabled = "";

                $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $_GET['id_audit']);
                $row = $result->fetch();

                if ($_POST['send'] == "ano") {
                    dibi::query('UPDATE [prevent_audit_checklist] SET [poznamka_mimo_protokol] = %s', $_POST['poznamka_mimo_protokol'], ', [date] = %i', Time(), 'WHERE [id] = %i', $_GET['id_otazka']);
                    echo "<div class=\"obdelnik\"><h5>Poznámka uložena</h5><p><a href=\"javascript: self.close ();\">Zavřete okno</a> a pokračujte v auditu.</p></div>";
                } else {



                    $result_check_audit = dibi::query('SELECT * FROM [prevent_audit_checklist] WHERE [id] = %i', $_GET['id_otazka']);
                    $row_check_audit = $result_check_audit->fetch();

                    $result_check_1 = dibi::query('SELECT * FROM [prevent_audit_checklist_schema] WHERE [id] = %i', $row_check_audit['id_otazka']);
                    $row_check_1 = $result_check_1->fetch();

                    $result_check_2 = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [id] = %i', $row_check_1['id_kat']);
                    $row_check_2 = $result_check_2->fetch();

                    $text_puvod = "CHECKLIST: " . $row_check_2['cislo'] . ". " . $row_check_2['kat_jmeno'] . ": " . $row_check_1['cislo'] . ". " . $row_check_1['text'] . $odpoved;

                    echo "<form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" id=\"form\">
                      <input type=\"hidden\" name=\"send\" value=\"ano\" />";
                    echo "<fieldset name>
                    <legend>Poznámka k otázce v checklistu</legend>
                    <label for=\"id_audit\">id audit</label><br />
                    #" . $_GET['id_audit'] . "<br />
                    <label for=\"id_audit\">firma</label><br />
                    " . get_nazev_firmy(get_id_firma_z_audit($_GET['id_audit'])) . "<br />
                    <label for=\"provozovna\">provozovna</label><br />
                    " . get_nazev_provozovny($row['id_provozovna'], false) . "<br />
                    <label for=\"puvod\">původ</label><br />
                    " . $text_puvod . "<br />
                    <label for=\"poznamka_mimo_protokol\">poznámka</label><br />
                    <textarea id=\"poznamka_mimo_protokol\" class=\"formular\" rows=\"6\" cols=\"40\" name=\"poznamka_mimo_protokol\" $disabled>" . $row_check_audit['poznamka_mimo_protokol'] . "</textarea><br />
                    <input type=\"submit\" class=\"tlacitko$disabled\" value=\"uložit\" $disabled /> <a href=\"javascript: self.close ();\">neukládat</a>
                    </fieldset>
                    </form>
          <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#form').validate({
             rules: {
               poznamka_mimo_protokol: {
                 required: true,
               }

               }
             });
           });
           </script>";
                }
            } else {
                echo "<h4>Nemáte právo pracovat se zvoleným auditem!</h4><p>Přejděte zpět k volbě auditu.</p>";
            }
        }
    }

    patka_minipage();
    ?>