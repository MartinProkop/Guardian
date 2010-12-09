<?php

function vyhledat_firmu() {  //hledani firem
    echo "<form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" name=\"najdi firmu\" \">
	<fieldset>
	<legend>Název klienta</legend>
	<input name=\"retezec\" class=\"formular\" value=\"" . $_POST['retezec'] . "\"><br />
	<input type=\"hidden\" name=\"vstup\" value=\"true\">
	<input class=\"tlacitko\" type=\"submit\" value=\"hledat\"> <a href=\"./firmy_koordinator.php?vyhledat=vse\">vypsat všechny</a>
	</fieldset>
	</form><br />";

    if ($_POST['vstup']) {
        echo_table_firma();

        $result = dibi::query('SELECT * FROM [prevent_firmy] WHERE [nazev] LIKE %s', "%" . $_POST['retezec'] . "%", 'ORDER BY %by', $_GET['order_by'], 'ASC');
        $pocet = $result->count();
        while ($row = $result->fetch()) {
            echo_firma($row['id'], "koordinator");
        }

        echo "</table>
		<p>Výsledky hledání firem pro řetězec: \"" . $_POST['retezec'] . "\". Nalezeno " . $pocet . " záznamů.</p>";
    } elseif ($_GET['vyhledat']) {
        echo_table_firma();

        $result = dibi::query('SELECT * FROM [prevent_firmy] WHERE [nazev] LIKE %s', "%", 'ORDER BY %by', $_GET['order_by'], 'ASC');
        $pocet = $result->count();
        while ($row = $result->fetch()) {
            echo_firma($row['id'], "koordinator");
        }

        echo "</table>
		<p>Nalezeno " . $pocet . " záznamů.</p>";
    }
}

function pridat_firmu() {
    if ($_POST['nazev']) {
        $arr_log = array('text' => 'Vytvořil nového klienta se jménem ' . $_POST['nazev'] . '.', 'link' => '', 'ad' => $_SESSION['id_usr']);
        vytvor_log($arr_log);

        if ($_POST['pobocky'] == "ano") {
            $jedna_provozovna = "ne";
            $udelej_pobocku = false;
        } else {
            $jedna_provozovna = "ano";
            $udelej_pobocku = true;
        }

        $arr = array('nazev' => $_POST['nazev'], 'adresa' => $_POST['adresa'], 'email' => $_POST['email'], 'telefon' => $_POST['telefon'],
            'popis' => $_POST['popis'], 'ico' => $_POST['ico'], 'dic' => $_POST['dic'], 'pojistovna' => $_POST['pojistovna'], 'kontaktni_osoba' => $_POST['kontaktni_osoba'],
            'poznamky' => $_POST['poznamky'], 'jedna_provozovna' => $jedna_provozovna);
        dibi::query('INSERT INTO [prevent_firmy]', $arr);

        $result = dibi::query('SELECT * FROM [prevent_firmy] WHERE [nazev] = %i', $_POST['nazev']);
        $row = $result->fetch();
        $arr_log_firmy = array('text' => 'Klient vytvořen.', 'link' => '', 'ad' => $row['id']);
        vytvor_log_firmy($arr_log_firmy);

        $result = dibi::query('SELECT * FROM [prevent_firmy] WHERE [nazev] = %s', $_POST['nazev']);
        $row = $result->fetch();
        if ($_POST['z_zastupce_firma'])
            nova_osoba($row['id'], "firma", $_POST['z_zastupce_firma'], "z_zastupce_firma");

        if ($udelej_pobocku) {
            $arr_log = array('text' => 'Vytvořil novou pobočku se jménem ' . $_POST['nazev'] . ' k firmě ' . get_nazev_firmy($row['id']) . '.', 'link' => '', 'ad' => $_SESSION['id_usr']);
            vytvor_log($arr_log);
            $arr_log = array('text' => 'Vytvořena pobočku klienta se jménem ' . $_POST['nazev'], 'link' => '', 'ad' => $row['id']);
            vytvor_log_firmy($arr_log);
            $arr = array('ad' => $row['id'], 'nazev' => $_POST['nazev'], 'adresa' => $_POST['adresa'], 'email' => $_POST['email'], 'telefon' => $_POST['telefon'],
                'popis' => $_POST['popis'], 'kontaktni_osoba' => $_POST['kontaktni_osoba'], 'poznamky' => $_POST['poznamky']);
            dibi::query('INSERT INTO [prevent_firmy_provozovny]', $arr);

            $resultprovoz = dibi::query('SELECT * FROM [prevent_firmy_provozovny] ORDER BY [id] DESC LIMIT 0 , 1');
            $rowprovoz = $resultprovoz->fetch();

            //velmi hnusna pomucka!!!
            $_GET['id_firma'] = $row['id'];
            if ($_POST['z_zastupce_firma'])
                nova_osoba($rowprovoz['id'], "provozovna", $_POST['z_zastupce_firma'], "z_zastupce_provozovna");
        }
        
         echo "<div class=\"obdelnik\"><h4>Klient vytvořen</h4>";

        if ($_FILES['fupload'] != null) {
            if (isset($_FILES['fupload'])) {
                if ($_FILES['fupload']['size'] <= 1024 * 1024 * 8 * 2) {
                    if ($_FILES['fupload']['type'] == "image/jpeg") {
                        $nazev_souboru = $_FILES['fupload']['tmp_name'];

                        nova_slozka("./firma_data/", $row['id']);

                        $cil = "./firma_data/" . $row['id'] . "/" . $_FILES['fupload']['name'];

                        move_uploaded_file($nazev_souboru, $cil) or die("<h4>Chyba uploadu!</h4>");

                        dibi::query('UPDATE [prevent_firmy] SET [logo] = %s', $cil, 'WHERE [id] = %i', $row['id']);
                    } else {
                        echo "<p>Můžete nahrát pouze soubor typu JPG o velikosti max 2MB. Fotografie nebyla nahrána, použijtě nástroj upravit a zkuste to znovu.</p>";
                    }
                } else {
                    echo "<p>Můžete nahrát pouze soubor typu JPG o velikosti max 2MB. Fotografie nebyla nahrána, použijtě nástroj upravit a zkuste to znovu.</p>";
                }
            }
        }

        echo "</div>";

        firemni_uzivatel_novy_z_nova_firma($row['id']);
    }

    echo "<p><a href=\"http://www.justice.cz/or/\" target=\"_blank\">http://www.justice.cz/or/</a></p>
        <form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" name=\"pridej firmu\" id=\"nova_firma\"  enctype=\"multipart/form-data\">
	<fieldset>
	<legend>Nový klient</legend>
	<label for=\"nazev\">jméno klienta</label><br />
	<input name=\"nazev\" id=\"nazev\" size=\"50\" class=\"formular\" /><br />
	<label for=\"adresa\">adresa klienta</label><br />
	<textarea name=\"adresa\" id=\"adresa\" class=\"formular\" rows=\"5\" cols=\"50\"></textarea><br />
	<label for=\"popis\">popis prováděné činnosti</label><br />
	<textarea name=\"popis\" id=\"popis\" class=\"formular\" rows=\"10\" cols=\"50\"></textarea><br />
	<label for=\"z_zastupce_firma\">Statutární zástupce klienta</label><br />
	<input name=\"z_zastupce_firma\" id=\"z_zastupce_firma\" size=\"50\" class=\"formular\" /><br />
	<label for=\"kontaktni_osoba\">Kontaktní osoba</label><br />
	<input name=\"kontaktni_osoba\" id=\"kontaktni_osoba\" size=\"50\" class=\"formular\" /><br />
	<label for=\"telefon\">telefon</label><br />
	<input name=\"telefon\" id=\"telefon\" size=\"50\" class=\"formular\" /><br />
	<label for=\"email\">email</label><br />
	<input name=\"email\" id=\"email\" size=\"50\" class=\"formular\" /><br />
	<label for=\"ico\">ičo</label><br />
	<input name=\"ico\" id=\"ico\" size=\"50\" class=\"formular\" /><br />
	<label for=\"dic\">dič</label><br />
	<input name=\"dic\" id=\"dic\" size=\"50\" class=\"formular\" /><br />
	<label for=\"logo_klienta\">nahrát logo klienta</label><br />
        <input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"16777216\">
        <input type=\"file\" id=\"logo_klienta\" name=\"fupload\" class=\"formular\"><br />
	<label for=\"poznamky\">poznámky</label><br />
	<textarea name=\"poznamky\" id=\"poznamky\" class=\"formular\" rows=\"10\" cols=\"50\"></textarea><br />
	<label for=\"pobocky\">Má klient pobočky?</label><br />
	<input type=\"checkbox\" name=\"pobocky\" id=\"pobocky\" value=\"ano\" class=\"formular\" /><label for=\"pobocky\">ano, má více poboček</label><br />
	<input class=\"tlacitko\" type=\"submit\" value=\"přidat\"> <a href=\"#\" onClick=\"return hide_show('plot_short','plot_full')\">nepřidávat</a>
	</fieldset>
	</form>
        <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#nova_firma').validate({
             rules: {
               nazev: {
                 required: true
               },
               adresa: {
                 required: true
               },
               popis: {
                 required: true
               },
               z_zastupce_firma: {
                 required: true
               },
               kontaktni_osoba: {
                 required: true
               },
               telefon: {
                 required: true
               },
               email: {
                 required: true,
                 email: true
               },
               ico: {
                 required: true
               },
               dic: {
                 required: true
               },
               logo_klienta: {
                 required: true,
                 accept: \".jpg|.jpeg\"
               },
               poznamky: {
                 required: true
               }


               }
             });
           });
           </script>";
}

function upravit_firmu() {
    if ($_POST['adresa']) {
        $arr_log = array('text' => 'Upravil klienta se jménem ' . $_POST['nazev'] . '.', 'link' => '', 'ad' => $_SESSION['id_usr']);
        vytvor_log($arr_log);
        $arr_log = array('text' => 'Detaily klienta upraveny', 'link' => '', 'ad' => $_GET['id_firmy']);
        vytvor_log_firmy($arr_log);

        if ($_POST['pobocky'] == "ano")
            $jedna_provozovna = "ne";
        else
            $jedna_provozovna = "ano";



        $arr = array('adresa' => $_POST['adresa'], 'email' => $_POST['email'], 'telefon' => $_POST['telefon'],
            'popis' => $_POST['popis'], 'ico' => $_POST['ico'], 'dic' => $_POST['dic'], 'pojistovna' => $_POST['pojistovna'], 'kontaktni_osoba' => $_POST['kontaktni_osoba'],
            'poznamky' => $_POST['poznamky'], 'jedna_provozovna' => $jedna_provozovna);
        dibi::query('UPDATE [prevent_firmy] SET', $arr, 'WHERE [id] = %i', $_GET['id_firmy']);
        echo "<div class=\"obdelnik\"><h4><h4>Klient upraven</h4><p>Pokračujte zpět na <a href=\"./firmy_koordinator.php?id=detaily_firmy&id_firmy=" . $_GET['id_firmy'] . "\">detaily klienta</a>.</p></div>";

        if ($_POST['kontaktni_osoba'] != $_POST['kontaktni_osoba_puvodni']) {
            firemni_uzivatel_edit_z_edit_firma($_GET['id_firmy']);
            if ($jedna_provozovna == "ano") {
                $arr = array('adresa' => $_POST['adresa'], 'email' => $_POST['email'], 'telefon' => $_POST['telefon'], 'kontaktni_osoba' => $_POST['kontaktni_osoba'],
                    'popis' => $_POST['popis'], 'poznamky' => $_POST['poznamky']);
                dibi::query('UPDATE [prevent_firmy_provozovny] SET', $arr, 'WHERE [ad] = %i', $_GET['id_firmy']);
            }
        }


        $result = dibi::query('SELECT * FROM [prevent_firmy] WHERE [id] = %i', $_GET['id_firmy']);
        $row = $result->fetch();

        if ($_FILES['fupload'] != null && $_POST['dat_nove_logo'] == "ano") {
            if (isset($_FILES['fupload'])) {
                if ($_FILES['fupload']['size'] <= 1024 * 1024 * 8 * 2) {
                    if ($_FILES['fupload']['type'] == "image/jpeg") {
                        $nazev_souboru = $_FILES['fupload']['tmp_name'];
                        unlink($row['logo']);

                        $cil = "./firma_data/" . $row['id'] . "/" . $_FILES['fupload']['name'];

                        move_uploaded_file($nazev_souboru, $cil) or die("<h4>Chyba uploadu!</h4>");

                        dibi::query('UPDATE [prevent_firmy] SET [logo] = %s', $cil, 'WHERE [id] = %i', $row['id']);
                    } else {
                        echo "<p>Můžete nahrát pouze soubor typu JPG o velikosti max 2MB. Fotografie nebyla nahrána, zkuste to znovu.</p>";
                    }
                } else {
                    echo "<p>Můžete nahrát pouze soubor typu JPG o velikosti max 2MB. Fotografie nebyla nahrána, zkuste to znovu.</p>";
                }
            }
        }
    } else {
        $result = dibi::query('SELECT * FROM [prevent_firmy] WHERE [id] = %i', $_GET['id_firmy']);
        $row = $result->fetch();

        if ($row['jedna_provozovna'] != "ano")
            $checked_provozovny = "checked";

        echo "<form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" name=\"pridej firmu\" id=\"upravit_firma\"  enctype=\"multipart/form-data\">
		<fieldset>
		<legend>" . $row['nazev'] . "</legend>
		<label for=\"adresa klienta\">adresa klienta</label><br />
		<textarea name=\"adresa\" id=\"adresa\" class=\"formular\" row=\"5\" cols=\"50\">" . $row['adresa'] . "</textarea><br />
                <label for=\"popis\">popis prováděné činnosti</label><br />
                <textarea name=\"popis\" id=\"popis\" class=\"formular\" rows=\"10\" cols=\"50\">" . $row['popis'] . "</textarea><br />
                <label for=\"zastupce\">Statutární zástupce klienta</label><br />";
        echo_name_osoba($row['id'], "firma", "z_zastupce_firma", "admin");
        echo "<br />
                <label for=\"kontaktni_osoba\">Kontaktní osoba <em>(Pokud změníte kontaktní osobu, změní se i jméno uživatele firmy na něj navázané -tím pádem se původní uživatel už nemůže přihlásit a je třeba nového znovu autorizovat - instrukce dostanete v ÚKOLU)</em></label><br />
                <input name=\"kontaktni_osoba\" id=\"kontaktni_osoba\" size=\"50\" value=\"" . $row['kontaktni_osoba'] . "\" class=\"formular\" /><br />
                <input name=\"kontaktni_osoba_puvodni\" id=\"kontaktni_osoba_puvodni\" type=\"hidden\" value=\"" . $row['kontaktni_osoba'] . "\" class=\"formular\" />
		<label for=\"telefon\">telefon</label><br />
		<input name=\"telefon\" id=\"telefon\" size=\"50\" value=\"" . $row['telefon'] . "\" class=\"formular\" /><br />
                <label for=\"email\">email</label><br />
		<input name=\"email\" id=\"email\" size=\"50\" value=\"" . $row['email'] . "\" class=\"formular\" /><br />
		<label for=\"ico\">ičo</label><br />
		<input name=\"ico\" id=\"ico\" value=\"" . $row['ico'] . "\"size=\"50\"  class=\"formular\" /><br />
		<label for=\"dic\">dič</label><br />
		<input name=\"dic\" id=\"dic\" value=\"" . $row['dic'] . "\"size=\"50\"  class=\"formular\" /><br />
                <label for=\"\">logo klienta</label><br />
                <img src=\"" . $row['logo'] . "\" width=\"150px\"/><br />
                <label for=\"logo_klienta_chck\">nové logo klienta</label><br />
                <input type=\"checkbox\" class=\"formular\" id=\"logo_klienta_chck\" name=\"dat_nove_logo\" value=\"ano\"><label for=\"logo_klienta_chck\">ano, nahrát nové</label><br />
                <input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"16777216\">
                <label for=\"logo_klienta\">nové logo klienta</label><br />
                <input type=\"file\" id=\"logo_klienta\" name=\"fupload\" class=\"formular\"><br />
		<label for=\"poznamky\">poznámky</label><br />
		<textarea name=\"poznamky\" id=\"poznamky\" class=\"formular\"  rows=\"10\" cols=\"50\">" . $row['poznamky'] . "</textarea><br />
                <label for=\"pobocky\">Má klient pobočky?</label><br />
                <input type=\"checkbox\" name=\"pobocky\" id=\"pobocky\" value=\"ano\" class=\"formular\" " . $checked_provozovny . "/><label for=\"pobocky\">ano, má více poboček</label><br />
		<input class=\"tlacitko\" type=\"submit\" value=\"upravit\"> <a href=\"./firmy_koordinator.php?id=detaily_firmy&id_firmy=" . $_GET['id_firmy'] . "\">neupravovat</a>
		</fieldset>
		</form>
          <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#upravit_firma').validate({
             rules: {
               nazev: {
                 required: true
               },
               adresa: {
                 required: true
               },
               popis: {
                 required: true
               },
               z_zastupce_firma: {
                 required: true
               },
               kontaktni_osoba: {
                 required: true
               },
               telefon: {
                 required: true
               },
               email: {
                 required: true,
                 email: true
               },
               ico: {
                 required: true
               },
               dic: {
                 required: true
               },
               logo_klienta: {
                 required: true,
                 accept: \".jpg|.jpeg\"
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

function smazat_firmu() {
    $result = dibi::query('SELECT * FROM [prevent_firmy] WHERE [id] = %i', $_GET['id_firmy']);
    $row = $result->fetch();

    $arr_log = array('text' => "Smazána firma " . $row['nazev'] . " včetně všech jejích provozoven.", 'link' => '', 'ad' => $_SESSION['id_usr']);
    dibi::query('DELETE FROM [prevent_firmy] WHERE [id] = %i', $_GET['id_firmy']);
    dibi::query('DELETE FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $_GET['id_firmy']);
    dibi::query('DELETE FROM [prevent_firmy_log] WHERE [ad] = %i', $_GET['id_firmy']);
    dibi::query('DELETE FROM [prevent_uzivatele] WHERE [ad] = %i', $_GET['id_firmy']);
    vytvor_log($arr_log);
    echo "<h4>Klient smazán</h4><p>Pokračujte na <a href=\"./firmy_koordinator.php\">seznam klientů</a>.</p>";
}

function seznam_provozoven() {
    echo_table_provozovna();

    if (!$_GET['order_by'])
        $_GET['order_by'] = "nazev";

    $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $_GET['id_firmy'], 'ORDER BY %by', $_GET['order_by'], 'ASC');
    while ($row = $result->fetch()) {
        echo_provozovna($row['id'], "koordinator");
    }
    echo "</table>";
}

function pridat_provozovnu() {
    if ($_POST['nazev']) {
        $arr_log = array('text' => 'Vytvořil novou pobočku se jménem ' . $_POST['nazev'] . ' k firmě ' . get_nazev_firmy($_GET['id_firmy']) . '.', 'link' => '', 'ad' => $_SESSION['id_usr']);
        vytvor_log($arr_log);
        $arr_log = array('text' => 'Vytvořena pobočku klienta se jménem ' . $_POST['nazev'], 'link' => '', 'ad' => $_GET['id_firmy']);
        vytvor_log_firmy($arr_log);
        $arr = array('ad' => $_GET['id_firmy'], 'nazev' => $_POST['nazev'], 'adresa' => $_POST['adresa'], 'email' => $_POST['email'], 'telefon' => $_POST['telefon'],
            'popis' => $_POST['popis'], 'kontaktni_osoba' => $_POST['kontaktni_osoba'], 'poznamky' => $_POST['poznamky']);
        dibi::query('INSERT INTO [prevent_firmy_provozovny]', $arr);

        $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] ORDER BY [id] DESC LIMIT 0 , 1');
        $row = $result->fetch();

        if ($_POST['z_zastupce_provozovna'])
            nova_osoba($row['id'], "provozovna", $_POST['z_zastupce_provozovna'], "z_zastupce_provozovna");

        firemni_uzivatel_novy_z_nova_provozovna($row['id']);
    }

    $result = dibi::query('SELECT * FROM [prevent_firmy] WHERE [id] = %i', $_GET['id_firmy']);
    $row = $result->fetch();
    if ($row['jedna_provozovna'] != "ano") {
        echo "<div class=\"info\" align=\"justify\" id=\"plot_short\">
                <p><a href=\"#\" onClick=\"return show_hide('plot_short','plot_full')\"><img src=\"./design/pridat.png\" /> přidat pobočku</a></p>
              </div>
	      <div class=\"info2\" align=\"justify\" id=\"plot_full\" style=\"display: none;\">
                <form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" id=\"nova_provozovna\" name=\"pridej provozovnu\">
		<fieldset>
		<legend>Nová pobočka</legend>
                <label for=\"nazev\">jméno pobočky</label><br />
                <input name=\"nazev\" id=\"nazev\" size=\"50\" class=\"formular\" /><br />
                <label for=\"adresa\">adresa pobočky</label><br />
                <textarea name=\"adresa\" id=\"adresa\" class=\"formular\" rows=\"5\" cols=\"50\"></textarea><br />
                <label for=\"popis\">popis činnosti na pobočce</label><br />
                <textarea name=\"popis\" id=\"popis\" class=\"formular\" rows=\"10\" cols=\"50\"></textarea><br />
                <label for=\"z_zastupce_provozovna\">Vedoucí pobočky</label><br />
                <input name=\"z_zastupce_provozovna\" id=\"z_zastupce_provozovna\" size=\"50\" class=\"formular\" /><br />
                <label for=\"kontaktni_osoba\">Kontaktní osoba</label><br />
                <input name=\"kontaktni_osoba\" id=\"kontaktni_osoba\" size=\"50\" class=\"formular\" /><br />
                <label for=\"telefon\">telefon</label><br />
                <input name=\"telefon\" id=\"telefon\" size=\"50\" class=\"formular\" /><br />
                <label for=\"email\">email</label><br />
                <input name=\"email\" id=\"email\" size=\"50\" class=\"formular\" /><br />
                <label for=\"poznamky\">poznámky</label><br />
                <textarea name=\"poznamky\" id=\"poznamky\" class=\"formular\" rows=\"10\" cols=\"50\"></textarea><br />
		<input class=\"tlacitko\" type=\"submit\" value=\"přidat\"> <a href=\"#\" onClick=\"return hide_show('plot_short','plot_full')\">nepřidávat</a>
		</fieldset>
		</form>
           <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#nova_provozovna').validate({
             rules: {
               nazev: {
                 required: true
               },
               adresa: {
                 required: true
               },
               popis: {
                 required: true
               },
               z_zastupce_provozovna: {
                 required: true
               },
               kontaktni_osoba: {
                 required: true
               },
               telefon: {
                 required: true
               },
               email: {
                 required: true,
                 email: true
               },
               poznamky: {
                 required: true
               }

               }
             });
           });
           </script>
	      </div>   ";
    } else {
        echo "<p>Nelze přidávat pobočky - klient je nemá.</p>";
    }
}

function upravit_provozovnu() {
    $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [id] = %i', $_GET['id_provozovny']);
    $row = $result->fetch();
    if ($_POST['adresa']) {
        $arr_log = array('text' => 'Upravil pobočku jménem ' . $row['nazev'] . ' u firmy ' . get_nazev_firmy($_GET['id_firmy']) . '.', 'link' => '', 'ad' => $_SESSION['id_usr']);
        vytvor_log($arr_log);
        $arr_log = array('text' => 'Upravena pobočka klienta jménem ' . $row['nazev'], 'link' => '', 'ad' => $_GET['id_firmy']);
        vytvor_log_firmy($arr_log);
        $arr = array('adresa' => $_POST['adresa'], 'email' => $_POST['email'], 'telefon' => $_POST['telefon'], 'kontaktni_osoba' => $_POST['kontaktni_osoba'],
            'popis' => $_POST['popis'], 'poznamky' => $_POST['poznamky']);
        dibi::query('UPDATE [prevent_firmy_provozovny] SET', $arr, 'WHERE [id] = %i', $_GET['id_provozovny']);

        if ($_POST['kontaktni_osoba'] != $_POST['kontaktni_osoba_puvodni']) {
            firemni_uzivatel_edit_z_edit_firma($_GET['id_firmy']);
        }

        echo "<div class=\"obdelnik\"><h4>Pobočka upravena</h4><p>Pokračujte zpět na <a href=\"./firmy_koordinator.php?id=detaily_provozovny&id_firmy=" . $_GET['id_firmy'] . "&id_provozovny=" . $_GET['id_provozovny'] . "\">detaily pobočky</a>.</p></div>";
    } else {
        echo "<form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" id=\"upravit_provozovna\" name=\"uprav provozovnu\">
		<fieldset>
		<legend>" . $row['nazev'] . "</legend>
		<label for=\"adresa\">adresa pobočky</label><br />
		<textarea name=\"adresa\" id=\"adresa\" class=\"formular\" row=\"5\" cols=\"50\">" . $row['adresa'] . "</textarea><br />
                <label for=\"popis\">popis  činnosti na pobočce</label><br />
                <textarea name=\"popis\" id=\"popis\" class=\"formular\" rows=\"10\" cols=\"50\">" . $row['popis'] . "</textarea><br />
                <label for=\"zastupce\">Vedoucí pobočky</label><br />";
        echo_name_osoba($row['id'], "provozovna", "z_zastupce_provozovna", "admin");
        echo "<br />
                <label for=\"kontaktni_osoba\">Kontaktní osoba (<em>Pokud změníte kontaktní osobu, změní se i jméno uživatele firmy na něj navázané -tím pádem se původní uživatel už nemůže přihlásit a je třeba nového znovu autorizovat - instrukce dostanete v ÚKOLU</em>) </label><br />
                <input name=\"kontaktni_osoba\" id=\"kontaktni_osoba\" size=\"50\" value=\"" . $row['kontaktni_osoba'] . "\" class=\"formular\" /><br />
                <input name=\"kontaktni_osoba_puvodni\" id=\"kontaktni_osoba_puvodni\" type=\"hidden\" value=\"" . $row['kontaktni_osoba'] . "\" class=\"formular\" />
		<label for=\"telefon\">telefon</label><br />
		<input name=\"telefon\" id=\"telefon\" size=\"50\" value=\"" . $row['telefon'] . "\" class=\"formular\" /><br />
                <label for=\"email\">email</label><br />
		<input name=\"email\" id=\"email\" size=\"50\" value=\"" . $row['email'] . "\" class=\"formular\" /><br />
		<label for=\"poznamky\">poznámky</label><br />
		<textarea name=\"poznamky\" id=\"poznamky\" class=\"formular\"  rows=\"10\" cols=\"50\">" . $row['poznamky'] . "</textarea><br />
		<input class=\"tlacitko\" type=\"submit\" value=\"upravit\"> <a href=\"./firmy_koordinator.php?id=detaily_provozovny&id_firmy=" . $_GET['id_firmy'] . "&id_provozovny=" . $_GET['id_provozovny'] . "\">neupravovat</a>
		</fieldset>
		</form>
           <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#upravit_provozovna').validate({
             rules: {
               nazev: {
                 required: true
               },
               adresa: {
                 required: true
               },
               popis: {
                 required: true
               },
               z_zastupce_provozovna: {
                 required: true
               },
               kontaktni_osoba: {
                 required: true
               },
               telefon: {
                 required: true
               },
               email: {
                 required: true,
                 email: true
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

function smazat_provozovnu() {
    $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [id] = %i', $_GET['id_provozovny']);
    $row = $result->fetch();
    $arr_log = array('text' => "Smazána pobočka " . $row['nazev'] . " u firmy " . get_nazev_firmy($_GET['id_firmy']), 'link' => '', 'ad' => $_SESSION['id_usr']);
    dibi::query('DELETE FROM [prevent_firmy_provozovny] WHERE [id] = %i', $_GET['id_provozovny']);
    vytvor_log($arr_log);
    $arr_log = array('text' => 'Smazána pobočka klienta jménem ' . $row['nazev'], 'link' => '', 'ad' => $_GET['id_firmy']);
    vytvor_log_firmy($arr_log);
    echo "<h4>Pobočka smazána</h4><p>Pokračujte zpět na <a href=\"./firmy_koordinator.php?id=detaily_firmy&id_firmy=" . $row['ad'] . "\">detaily firmy</a>.</p>";
}

function firemni_technik() {
    echo "<table class=\"table\">
	<tr>
	<td><span class=\"subheader\">AKCE</span></td>
	<td><span class=\"subheader\">JMÉNO</span></td>
	</tr>";

    $result = dibi::query('SELECT * FROM [prevent_firmy_technik] WHERE [id_firma] = %i', $_GET['id_firmy']);
    while ($row = $result->fetch()) {
        $result2 = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $row['id_technik']);
        $row2 = $result2->fetch();

        echo "<tr>
		<td><a href=\"" . $_SERVER['REQUEST_URI'] . "&odebrat_technika=" . $row['id'] . "\" onclick=\"if(confirm('Skutečně odebrat technika - týká se všech poboček klienta?')) location.href='" . $_SERVER['REQUEST_URI'] . "&odebrat_technika=" . $row['id'] . "'; return(false);\"><img src=\"./design/kos.png\" alt=\"odebrat\" title=\"odebrat\"/></a></td>
		<td>" . $row2['jmeno'] . "</td>
		</tr>";
    }
    echo "</table>";
}

function firemni_technik_pridat() {
    if ($_POST['id_uzivatele']) {

        $result = dibi::query('SELECT * FROM [prevent_firmy_technik] WHERE [id_firma] = %i', $_GET['id_firmy'], 'AND [id_technik] = %i', $_POST['id_uzivatele']);
        $pocet = $result->fetch();

        if (!$pocet > 0) {
            $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $_POST['id_uzivatele']);
            $row = $result->fetch();

            $arr_login = array('text' => "Technik " . $row['jmeno'] . " byl firmě přidělen", 'link' => '', 'ad' => $_GET['id_firmy']);
            vytvor_log_firmy($arr_login);

            $arr_login = array('text' => "Přidělena firma " . get_nazev_firmy($_GET['id_firmy']), 'link' => '', 'ad' => $_POST['id_uzivatele']);
            vytvor_log($arr_login);


            $arr = array('id_firma' => $_GET['id_firmy'], 'id_technik' => $_POST['id_uzivatele']);
            dibi::query('INSERT INTO [prevent_firmy_technik]', $arr);

            $arr_ukol = array('deadline' => '', 'text' => 'Koordinátor ' . $_SESSION['jmeno_usr'] . ' Vám přidělil klienta: ' . get_nazev_firmy($_GET['id_firmy']) . '.', 'popis' => '', 'link' => "", 'ad' => $_POST['id_uzivatele'], 'zadal_jmeno' => $_SESSION['jmeno_usr']);
            novy_ukol($arr_ukol);
        }
    }

    echo "<form method=\"POST\" action=\"./firmy_koordinator.php?id=detaily_firmy&id_firmy=" . $_GET['id_firmy'] . "\" name=\"pridej provozovnu\" onSubmit=\"return check_nova_provozovna(this);\">
		<fieldset>
		<legend>Nový technik</legend>";
    EchoUzivateleSelect("", "id_uzivatele", 0, 0, 1, 0);
    echo "<input class=\"tlacitko\" type=\"submit\" value=\"přidat\"> <a href=\"#\" onClick=\"return hide_show('plot_short2','plot_full2')\">nepřidávat</a>
		</fieldset>
		</form>";
}

function firemni_technik_odebrat() {
    $result = dibi::query('SELECT * FROM [prevent_firmy_technik] WHERE [id] = %i', $_GET['odebrat_technika']);
    $row = $result->fetch();

    $result2 = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $row['id_technik']);
    $row2 = $result2->fetch();

    $arr_login = array('text' => "Technik " . $row2['jmeno'] . " byl firmě odebrán", 'link' => '', 'ad' => $_GET['id_firmy']);
    vytvor_log_firmy($arr_login);

    $arr_login = array('text' => "Odebráno přidělení k firmě " . get_nazev_firmy($_GET['id_firmy']), 'link' => '', 'ad' => $row['id_technik']);
    vytvor_log($arr_login);

    dibi::query('DELETE FROM [prevent_firmy_technik] WHERE [id] = %i', $_GET['odebrat_technika']);
}

function firemni_uzivatel() {
    echo "<table class=\"table\">
	<tr>
	<td><span class=\"subheader\">STAV</span></td>
	<td><span class=\"subheader\">AKCE</span></td>
	<td><span class=\"subheader\">JMÉNO</span></td>	
	<td><span class=\"subheader\">PRÁVA</span></td>
	<td><span class=\"subheader\">POSLEDNÍ NÁVŠŤEVA</span></td>
	<td><span class=\"subheader\">ONLINE<br />poslední klik</span></td>
	</tr>";

    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [ad] = %i', $_GET['id_firmy'], 'ORDER BY [jmeno] ASC');
    while ($row = $result->fetch()) {
        if ($row['stav'] == "aktivni") {
            $stav = "class=\"green\"";
            $stav2 = "<acronym title=\"uživatelský účet je plně v provozu\">aktivní</acronym>";
        } elseif ($row['stav'] == "ceka_na_autorizaci") {
            $stav = "class=\"orange\"";
            $stav2 = "<acronym title=\"je třeba uživateli předat kontrolník kód\">čeká na kód</acronym><br />(kód: \"<strong>" . $row['sul'] . "</strong>\")";
        } elseif ($row['stav'] == "blokovan") {
            $stav = "class=\"red\"";
            $stav2 = "<acronym title=\"uživatelský účet je zablokovát, lze jej odblokovat\">blokován</acronym>";
        }

        if ($row['posledni_klik'] > (Time() - 900)) {
            $online = Date("H:i:s", $row['posledni_klik']);
            $online_barva = "class=\"green\"";
        } else {
            $online = "ne";
            $online_barva = "class=\"red\"";
        }

        echo "<tr>
		<td " . $stav . ">" . $stav2 . "</td>
		<td>
                <a href=\"./uzivatele.php?id_uzivatele=" . $row['id'] . "\"><img src=\"./design/detaily.png\" alt=\"detaily\" title=\"detaily\"/></a><br />
                <a href=\"./administrace.php?id=logy_uzivatelu&id_uzivatele=" . $row['id'] . "\">log</a><br />
		<a href=\"./firmy_koordinator.php?id=detaily_firmy&id_firmy=" . $_GET['id_firmy'] . "&blokovat_uzivatele=" . $row['id'] . "\" onclick=\"if(confirm('Skutečně za/od blokovat uživatele?')) location.href='./firmy_koordinator.php?id=detaily_firmy&id_firmy=" . $_GET['id_firmy'] . "&blokovat_uzivatele=" . $row['id'] . "'; return(false);\">za/od blokovat</a>
		<br /><a href=\"./firmy_koordinator.php?id=upravit_firemniho_uzivatele&id_firmy=" . $_GET['id_firmy'] . "&id_uzivatele=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"upravit\" title=\"upravit\"/></a> <a href=\"" . $_SERVER['REQUEST_URI'] . "&smazat_uzivatele=" . $row['id'] . "\" onclick=\"if(confirm('Skutečně smazat uživatele?')) location.href='" . $_SERVER['REQUEST_URI'] . "&smazat_uzivatele=" . $row['id'] . "'; return(false);\"><img src=\"./design/kos.png\" alt=\"smazat\" title=\"smazat\"/></a></td>
		<td>" . $row['jmeno'] . "</td>
		<td>";
        $result2 = dibi::query('SELECT * FROM [prevent_firmy_uzivatele_prava] WHERE [id_uzivatel] = %i', $row['id'], 'ORDER BY [id] ASC');
        while ($row2 = $result2->fetch()) {
            if ($row2['prava'] == "admin")
                echo "administrátor klienta";
            else {
                $result3 = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [id] = %i', $row2['prava'], 'ORDER BY [nazev] ASC');
                while ($row3 = $result3->fetch()) {
                    echo $row3['nazev'] . ", ";
                }
            }
        }
        echo "</td>
		<td>" . Date("H:i:s d.m.Y", $row['posledni_login_novy']) . "</td>
		<td " . $online_barva . ">" . $online . "</td>
		</tr>";
    }
    echo "<script type=\"text/javascript\">
	function blah(bool)
	{
   		if(bool)
   		{
      		document.getElementById(\"provozovny_novy_uzivatel\").disabled = true;
   		}
   		else
   		{
			document.getElementById(\"provozovny_novy_uzivatel\").disabled = false;

   		}
	}
	</script>";
    echo "<form method=\"POST\" name=\"form_uzivatel\" action=\"" . $_SERVER['REQUEST_URI'] . "\" id=\"novy_usr\">
	<tr>
	<td class=\"green\"><acronym title=\"přidat nového uživatele\">nový</acronym></td>
	<td><input class=\"tlacitko\" type=\"submit\" value=\"vytvořit uživatele\"></td>
	<td>
        <label for=\"novy_uzivatel_jmeno\">jméno</label><br />
        <input name=\"novy_uzivatel_jmeno\" id=\"novy_uzivatel_jmeno\" class=\"formular\" value=\"\" size=\"15\"><br />
        <label for=\"novy_uzivatel_email\">email</label><br />
	<input name=\"novy_uzivatel_email\" id=\"novy_uzivatel_email\" class=\"formular\" value=\"\" size=\"15\"><br />
        <label for=\"novy_uzivatel_telefon\">telefon</label><br />
        <input name=\"novy_uzivatel_telefon\" id=\"novy_uzivatel_telefon\" class=\"formular\" value=\"\" size=\"15\"></td>
	<td><input type=\"checkbox\" id=\"admincheckbox\" name=\"admincheckbox\" value=\"admincheckbox\" onclick=\"blah(this.checked)\"/><label for=\"admincheckbox\">administrátor klienta</label><br />
	<strong>nebo</strong><br />příslušnost k pobočkám:<br />
		<select name=\"novy_uzivatel_prava[]\" id=\"provozovny_novy_uzivatel\" class=\"formular\" multiple>";
    $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $_GET['id_firmy'], 'ORDER BY [nazev] ASC');
    while ($row = $result->fetch()) {
        echo "<option value=\"" . $row['id'] . "\">" . $row['nazev'] . "</option>";
    }
    echo "
	</select></td>
	<td></td>
	</tr>
	</form>
	</table>
           <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#novy_usr').validate({
             rules: {
               novy_uzivatel_jmeno: {
                 required: true,
               },
               novy_uzivatel_telefon: {
                 required: true
               },
               novy_uzivatel_email: {
                 required: true,
                 email: true
               }

               }
             });
           });
           </script>

";
}

function firemni_uzivatel_novy() {
    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [jmeno] = %s', $_POST['novy_uzivatel_jmeno']);
    if ($row = $result->fetch()) {
        echo "<div class=\"obdelnik\"><h5>Uživatel \"" . $_POST['novy_uzivatel_jmeno'] . "\" nebyl vytvořen - jméno již existuje!</h5></div>";
        return 0;
    }
    $nahoda = Random_Password(10);

    $arr = array('jmeno' => $_POST['novy_uzivatel_jmeno'], 'mail' => $_POST['novy_uzivatel_email'], 'telefon' => $_POST['novy_uzivatel_telefon'], 'ad' => $_GET['id_firmy'], 'prava' => "firma", 'sul' => $nahoda, 'stav' => 'ceka_na_autorizaci');
    dibi::query('INSERT INTO [prevent_uzivatele]', $arr);

    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE jmeno = %s', $_POST['novy_uzivatel_jmeno']);
    $row = $result->fetch();

    if ($_POST['admincheckbox']) {
        $arr_prava = array('id_uzivatel' => $row['id'], 'prava' => "admin");
        dibi::query('INSERT INTO [prevent_firmy_uzivatele_prava]', $arr_prava);
    } else {
        $novy_uzivatel_prava = $_POST['novy_uzivatel_prava'];
        for ($x = 0; $x < count($novy_uzivatel_prava); $x++) {
            $arr_prava = array('id_uzivatel' => $row['id'], 'prava' => $novy_uzivatel_prava[$x]);
            dibi::query('INSERT INTO [prevent_firmy_uzivatele_prava]', $arr_prava);
        }
    }

    $arr_log = array('text' => 'Vytvořen uživatelský účet', 'link' => '', 'ad' => $row['id']);
    vytvor_log($arr_log);

    $arr_log_firmy = array('text' => 'Vytvořen uživatelský účet se jménem ' . $_POST['novy_uzivatel_jmeno'], 'link' => '', 'ad' => $_GET['id_firmy']);
    vytvor_log_firmy($arr_log_firmy);

    init_uzivatele($row['id']);

    $zprava = "Uživatel: " . $_POST['novy_uzivatel_jmeno'] . "<br />kód: " . $nahoda;
    $arr_ukol = array('deadline' => '', 'text' => 'Předat uživateli kontrolní kód', 'popis' => $zprava, 'link' => '', 'ad' => $_SESSION['id_usr']);
    novy_ukol($arr_ukol);
}

function firemni_uzivatel_novy_z_nova_firma($id_firma) {
    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [jmeno] = %s', $_POST['kontaktni_osoba']);
    if ($row = $result->fetch()) {
        echo "<h4>Uživatel \"" . $_POST['kontaktni_osoba'] . "\" nebyl vytvořen - jmeno již existuje!</h4>";
        return 0;
    }
    $nahoda = Random_Password(10);

    $arr = array('jmeno' => $_POST['kontaktni_osoba'], 'mail' => $_POST['email'], 'telefon' => $_POST['telefon'], 'ad' => $id_firma, 'prava' => "firma", 'sul' => $nahoda, 'stav' => 'ceka_na_autorizaci');
    dibi::query('INSERT INTO [prevent_uzivatele]', $arr);

    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE jmeno = %s', $_POST['kontaktni_osoba']);
    $row = $result->fetch();


    $arr_prava = array('id_uzivatel' => $row['id'], 'prava' => "admin");
    dibi::query('INSERT INTO [prevent_firmy_uzivatele_prava]', $arr_prava);

    $arr_log = array('text' => 'Vytvořen uživatelský účet', 'link' => '', 'ad' => $row['id']);
    vytvor_log($arr_log);

    $arr_log_firmy = array('text' => 'Vytvořen uživatelský účet se jménem ' . $_POST['kontaktni_osoba'], 'link' => '', 'ad' => $id_firma);
    vytvor_log_firmy($arr_log_firmy);

    init_uzivatele($row['id']);

    $zprava = "Uživatel: " . $_POST['kontaktni_osoba'] . "<br />kód: " . $nahoda;
    $arr_ukol = array('deadline' => '', 'text' => 'Předat uživateli kontrolní kód', 'popis' => $zprava, 'link' => '', 'ad' => $_SESSION['id_usr']);
    novy_ukol($arr_ukol);
}

function firemni_uzivatel_edit_z_edit_firma($id_firma) {
    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [jmeno] = %s', $_POST['kontaktni_osoba_puvodni']);
    $row = $result->fetch();

    $nahoda = Random_Password(10);

    $arr = array('jmeno' => $_POST['kontaktni_osoba'], 'mail' => $_POST['email'], 'telefon' => $_POST['telefon'], 'ad' => $id_firma, 'prava' => "firma", 'sul' => $nahoda, 'stav' => 'ceka_na_autorizaci');
    dibi::query('UPDATE [prevent_uzivatele] SET', $arr, 'WHERE [id] = %i', $row['id']);


    $arr_log = array('text' => 'Upraven uživatelský účet', 'link' => '', 'ad' => $row['id']);
    vytvor_log($arr_log);

    $arr_log_firmy = array('text' => 'Upraven uživatelský účet se jménem ' . $_POST['kontaktni_osoba_puvodni'] . 'na ' . $_POST['kontaktni_osoba'], 'link' => '', 'ad' => $id_firma);
    vytvor_log_firmy($arr_log_firmy);

    $zprava = "Uživatel: " . $_POST['kontaktni_osoba'] . "<br />kód: " . $nahoda;
    $arr_ukol = array('deadline' => '', 'text' => 'Předat uživateli kontrolní kód', 'popis' => $zprava, 'link' => '', 'ad' => $_SESSION['id_usr']);
    novy_ukol($arr_ukol);
}

function firemni_uzivatel_novy_z_nova_provozovna($id_provozovna) {
    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [jmeno] = %s', $_POST['kontaktni_osoba']);
    if ($row = $result->fetch()) {
        echo "<h4>Uživatel \"" . $_POST['kontaktni_osoba'] . "\" nebyl vytvořen - jméno již existuje!</h4>";
        return 0;
    }
    $nahoda = Random_Password(10);

    $arr = array('jmeno' => $_POST['kontaktni_osoba'], 'mail' => $_POST['email'], 'telefon' => $_POST['telefon'], 'ad' => $_GET['id_firmy'], 'prava' => "firma", 'sul' => $nahoda, 'stav' => 'ceka_na_autorizaci');
    dibi::query('INSERT INTO [prevent_uzivatele]', $arr);

    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE jmeno = %s', $_POST['kontaktni_osoba']);
    $row = $result->fetch();


    $arr_prava = array('id_uzivatel' => $row['id'], 'prava' => $id_provozovna);
    dibi::query('INSERT INTO [prevent_firmy_uzivatele_prava]', $arr_prava);

    $arr_log = array('text' => 'Vytvořen uživatelský účet', 'link' => '', 'ad' => $row['id']);
    vytvor_log($arr_log);

    $arr_log_firmy = array('text' => 'Vytvořen uživatelský účet se jménem ' . $_POST['kontaktni_osoba'], 'link' => '', 'ad' => $_GET['id_firmy']);
    vytvor_log_firmy($arr_log_firmy);

    init_uzivatele($row['id']);

    $zprava = "Uživatel: " . $_POST['kontaktni_osoba'] . "<br />kód: " . $nahoda;
    $arr_ukol = array('deadline' => '', 'text' => 'Předat uživateli kontrolní kód', 'popis' => $zprava, 'link' => '', 'ad' => $_SESSION['id_usr']);
    novy_ukol($arr_ukol);
}

function firemni_uzivatel_edit_z_edit_provozovna($id_provozovna) {
    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [jmeno] = %s', $_POST['kontaktni_osoba_puvodni']);
    $row = $result->fetch();

    $nahoda = Random_Password(10);

    $arr = array('jmeno' => $_POST['kontaktni_osoba'], 'mail' => $_POST['email'], 'telefon' => $_POST['telefon'], 'ad' => $_GET['id_firmy'], 'prava' => "firma", 'sul' => $nahoda, 'stav' => 'ceka_na_autorizaci');
    dibi::query('UPDATE [prevent_uzivatele] SET', $arr, 'WHERE [id] = %i', $row['id']);



    $arr_log = array('text' => 'Upraven uživatelský účet', 'link' => '', 'ad' => $row['id']);
    vytvor_log($arr_log);

    $arr_log_firmy = array('text' => 'Upraven uživatelský účet se jménem ' . $_POST['kontaktni_osoba_puvodni'] . 'na ' . $_POST['kontaktni_osoba'], 'link' => '', 'ad' => $_GET['id_firmy']);
    vytvor_log_firmy($arr_log_firmy);

    init_uzivatele($row['id']);

    $zprava = "Uživatel: " . $_POST['kontaktni_osoba'] . "<br />kód: " . $nahoda;
    $arr_ukol = array('deadline' => '', 'text' => 'Předat uživateli kontrolní kód', 'popis' => $zprava, 'link' => '', 'ad' => $_SESSION['id_usr']);
    novy_ukol($arr_ukol);
}

function firemni_uzivatel_blokovat() {
    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $_GET['blokovat_uzivatele']);
    $row = $result->fetch();

    if ($row['stav'] == "aktivni") {
        dibi::query('UPDATE [prevent_uzivatele] SET [stav] = %s', "blokovan", 'WHERE [id] = %i', $_GET['blokovat_uzivatele']);
        $zprava = "Uživatel " . $row['jmeno'] . " zablokován";
        $zprava2 = "Uživatel zablokován";
    } elseif ($row['stav'] == "blokovan") {
        dibi::query('UPDATE [prevent_uzivatele] SET [stav] = %s', "aktivni", 'WHERE [id] = %i', $_GET['blokovat_uzivatele']);
        $zprava = "Uživatel " . $row['jmeno'] . " odblokován";
        $zprava2 = "Uživatel odblokován";
    }

    $arr_login = array('text' => $zprava, 'link' => '', 'ad' => $_GET['id_firmy']);
    vytvor_log_firmy($arr_login);
    $arr_log_uzivatele = array('text' => $zprava2, 'link' => '', 'ad' => $_GET['blokovat_uzivatele']);
    vytvor_log($arr_log_uzivatele);
}

function firemni_uzivatel_smazat() {
    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $_GET['smazat_uzivatele']);
    $row = $result->fetch();

    $text = "Uživatel " . $row['jmeno'] . " smazán";

    $arr_log = array('text' => $text, 'link' => '', 'ad' => '');
    vytvor_log($arr_log);

    $arr_log_firma = array('text' => $text, 'link' => '', 'ad' => $row['ad']);
    vytvor_log_firmy($arr_log_firma);

    dibi::query('DELETE FROM [prevent_uzivatele] WHERE [id] = %i', $_GET['smazat_uzivatele']);
    dibi::query('DELETE FROM [prevent_uzivatele] WHERE [id] = %i', $_GET['smazat_uzivatele']);
    dibi::query('DELETE FROM [prevent_watchdog] WHERE [id_uzivatel] = %i', $_GET['smazat_uzivatele']);
    dibi::query('DELETE FROM [prevent_nastenka_shlednuto] WHERE [id_uzivatel] = %i', $_GET['smazat_uzivatele']);
}

function firemni_uzivatel_upravit() {
    if (IsSet($_POST['upravit_uzivatele'])) {
        $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $_GET['id_uzivatele']);
        $row = $result->fetch();

        $arr_log = array('text' => 'Upravena práva uživatele.', 'link' => '', 'ad' => $_GET['id_uzivatele']);
        vytvor_log($arr_log);

        $arr_log_firmy = array('text' => 'Upravena práva uživatele ' . $row['jmeno'], 'link' => '', 'ad' => $_GET['id_firmy']);
        vytvor_log_firmy($arr_log_firmy);

        dibi::query('DELETE FROM [prevent_firmy_uzivatele_prava] WHERE [id_uzivatel] = %i', $_GET['id_uzivatele']);
        if ($_POST['admincheckbox']) {
            $arr_prava = array('id_uzivatel' => $_GET['id_uzivatele'], 'prava' => "admin");
            dibi::query('INSERT INTO [prevent_firmy_uzivatele_prava]', $arr_prava);
        } else {
            $novy_uzivatel_prava = $_POST['novy_uzivatel_prava'];
            for ($x = 0; $x < count($novy_uzivatel_prava); $x++) {
                $arr_prava = array('id_uzivatel' => $_GET['id_uzivatele'], 'prava' => $novy_uzivatel_prava[$x]);
                dibi::query('INSERT INTO [prevent_firmy_uzivatele_prava]', $arr_prava);
            }
        }
        echo "<h4>Uživatel upraven</h4><p>Pokračujte zpět na <a href=\"./firmy_koordinator.php?id=detaily_firmy&id_firmy=" . $_GET['id_firmy'] . "\">detaily firmy</a>.</p>";
    } else {
        $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $_GET['id_uzivatele']);
        $row = $result->fetch();

        echo "<script type=\"text/javascript\">
		function blah(bool)
		{
	   		if(bool)
	   		{
	      		document.getElementById(\"provozovny_novy_uzivatel\").disabled = true;
	   		}
	   		else
	   		{
				document.getElementById(\"provozovny_novy_uzivatel\").disabled = false;
	
	   		}
		}
		</script>";

        echo "<form method=\"POST\" action=\"./firmy_koordinator.php?id=upravit_firemniho_uzivatele&id_firmy=" . $_GET['id_firmy'] . "&id_uzivatele=" . $_GET['id_uzivatele'] . "\" >
		<input type=\"hidden\" name=\"upravit_uzivatele\" value=\"ano\" />
		<fieldset>
		<legend>" . $row['jmeno'] . "</legend>
		<p><strong>současná práva:</strong> <em>";

        $result2 = dibi::query('SELECT * FROM [prevent_firmy_uzivatele_prava] WHERE [id_uzivatel] = %i', $row['id'], 'ORDER BY [id] ASC');
        while ($row2 = $result2->fetch()) {
            if ($row2['prava'] == "admin")
                echo "administrátor firmy";
            else {
                $result3 = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [id] = %i', $row2['prava'], 'ORDER BY [nazev] ASC');
                while ($row3 = $result3->fetch()) {
                    echo $row3['nazev'] . ", ";
                }
            }
        }
        echo "</em></p><div class=\"caradown\"></div><p><strong>nová práva:</strong><br />
		<input type=\"checkbox\" id=\"admincheckbox\" name=\"admincheckbox\" value=\"admincheckbox\" onclick=\"blah(this.checked)\"/><label for=\"admincheckbox\">administrátor firmy</label><br />
		<strong>nebo</strong><br />příslušnost k provozovnám:<br />
		<select name=\"novy_uzivatel_prava[]\" id=\"provozovny_novy_uzivatel\" class=\"formular\" multiple>";
        $result4 = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $_GET['id_firmy'], 'ORDER BY [nazev] ASC');
        while ($row4 = $result4->fetch()) {
            echo "<option value=\"" . $row4['id'] . "\">" . $row4['nazev'] . "</option>";
        }
        echo "</select><br />
		<input class=\"tlacitko\" type=\"submit\" value=\"upravit\"> <a href=\"./firmy_koordinator.php?id=detaily_firmy&id_firmy=" . $_GET['id_firmy'] . "\">neupravit</a>
		</fieldset>
		</form><br />";
    }
}

function firemni_log() {
    $result = dibi::query('SELECT * FROM [prevent_firmy_log] WHERE [ad] = %i', $_GET['id_firmy'], 'ORDER BY [date] DESC');
    $pocet_logu = $result->count();

    echo "<p><strong>" . $pocet_logu . " záznamů</strong></p>";
    echo "<textarea name=\"log\" cols=\"80\" rows=\"10\" class=\"formular\">";
    while ($row = $result->fetch())
        echo Date("H:i d.m.Y", $row['date']) . " (" . $row['autor'] . "): " . $row['text'] . "\n";

    echo "</textarea>";

    $result = dibi::query('SELECT * FROM [prevent_firmy_log] WHERE [ad] = %i', $_GET['id_firmy'], 'AND date < %i', Time() - 259200);
    $pocet_logu_ke_smazani = $result->count();

    echo "<p><strong><a href=\"" . $_SERVER['REQUEST_URI'] . "&smazat_logy=ano\" onclick=\"if(confirm('Skutečně chcete smazat logy uživatele?')) location.href='" . $_SERVER['REQUEST_URI'] . "&smazat_logy=ano'; return(false);\">Smazat záznamy starší 3 dny (" . $pocet_logu_ke_smazani . " záznamů)</a></strong></p>";
}

function firemni_logy_smazat() {
    dibi::query('DELETE FROM [prevent_firmy_log] WHERE [ad] = %i', $_GET['id_firmy'], 'AND date < %i', Time() - 259200);

    $arr_log = array('text' => 'Vymazány logy starší 3 dny ', 'link' => '', 'ad' => $_GET['id_firmy']);
    vytvor_log_firmy($arr_log);
}
?>