<?php
function kontrola_pobocka() {
    $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [id] = %i', get_id_provozovna_z_audit($_GET['id_audit']));
    $row = $result->fetch();

    if ($_POST['kontrola_pobocka']) {
        $arr_log = array('text' => 'Upravil pobočku jménem ' . $row['nazev'] . ' u firmy ' . get_nazev_firmy(get_id_firma_z_audit($_GET['id_audit'])) . 'v rámci auditu.', 'link' => '', 'ad' => $_SESSION['id_usr']);
        vytvor_log($arr_log);
        $arr_log = array('text' => 'Upravena pobočka jménem ' . $row['nazev'] . ' v rámci auditu.', 'link' => '', 'ad' => get_id_firma_z_audit($_GET['id_audit']));
        vytvor_log_firmy($arr_log);
        $arr_log = array('text' => 'Upravena pobočka jménem ' . $row['nazev'] . ' v rámci auditu.', 'id_audit' => $_GET['id_audit'], 'id_provozovna' => $row['id']);
        vytvor_log_audit($arr_log);

        $arr = array('adresa' => $_POST['adresa'], 'email' => $_POST['email'], 'telefon' => $_POST['telefon'], 'kontaktni_osoba' => $_POST['kontaktni_osoba'],
            'popis' => $_POST['popis'], 'poznamky' => $_POST['poznamky']);
        dibi::query('UPDATE [prevent_firmy_provozovny] SET', $arr, 'WHERE [id] = %i', $row['id']);

        $arr = array('stav_kontrola_pobocka' => "uzavren", 'date_kontrola_pobocka' => Time(), 'date' => Time());
        dibi::query('UPDATE [prevent_audit] SET', $arr, 'WHERE [id] = %i', $_GET['id_audit']);

        echo "<div class=\"obdelnik\"><h5>Údaje potvrzeny</h5><p>Pokračujte zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">audit</a>.</p></div>";
    } else {
        echo "<form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" name=\"audit pobočky\" id=\"udaje\">
            <input type=\"hidden\" name=\"kontrola_pobocka\" value=\"odeslano\">
		<fieldset>
		<legend>" . $row['nazev'] . "</legend>
		<label for=\"adresa\">adresa pobočky</label><br />
		<textarea name=\"adresa\" id=\"adresa\" class=\"formular\" row=\"5\" cols=\"50\">" . $row['adresa'] . "</textarea><br />
                <label for=\"popis\">popis  činnosti na pobočce</label><br />
                <textarea name=\"popis\" id=\"popis\" class=\"formular\" rows=\"10\" cols=\"50\">" . $row['popis'] . "</textarea><br />
                <label for=\"zastupce\">Vedoucí pobočky</label><br />";
        echo_name_osoba($row['id'], "provozovna", "z_zastupce_provozovna", "admin");
        echo "<br />
                <label for=\"kontaktni_osoba\">Kontaktní osoba</label><br />
                <input name=\"kontaktni_osoba\" id=\"kontaktni_osoba\" size=\"50\" value=\"" . $row['kontaktni_osoba'] . "\" class=\"formular\" readonly /><br />
		<label for=\"telefon\">telefon</label><br />
		<input name=\"telefon\" id=\"telefon\" size=\"50\" value=\"" . $row['telefon'] . "\" class=\"formular\" /><br />
                <label for=\"email\">email</label><br />
		<input name=\"email\" id=\"email\" size=\"50\" value=\"" . $row['email'] . "\" class=\"formular\" /><br />
		<label for=\"poznamky\">poznámky</label><br />
		<textarea name=\"poznamky\" id=\"poznamky\" class=\"formular\"  rows=\"10\" cols=\"50\">" . $row['poznamky'] . "</textarea><br />
		<input class=\"tlacitko\" type=\"submit\" value=\"potvrdit\">
		</fieldset>
		</form>
          <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#udaje').validate({
             rules: {
               adresa: {
                 required: true
               },
               popis: {
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
?>
