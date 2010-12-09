<?php

function nastaveni() {
    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $_SESSION['id_usr']);
    $row = $result->fetch();

    if ($_POST['pocet_prvku_zobrazeni']) {


        $arr = array('mail' => $_POST['email'], 'telefon' => $_POST['telefon'], 'pocet_prvku_zobrazeni' => $_POST['pocet_prvku_zobrazeni']);
        dibi::query('UPDATE [prevent_uzivatele] SET', $arr, 'WHERE [id] = %i', $_SESSION['id_usr']);

        $arr_watchdog = array('posta' => $_POST['check_posta'], 'ukoly' => $_POST['check_ukoly'], 'firma' => $_POST['check_firma']);
        dibi::query("UPDATE [prevent_watchdog] SET", $arr_watchdog, 'WHERE [id_uzivatel] = %i', $_SESSION['id_usr']);

        $arr_log = array('text' => 'Uživatel změnil své nastavení', 'link' => '', 'ad' => $_SESSION['id_usr']);
        vytvor_log($arr_log);
    }

    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $_SESSION['id_usr']);
    $row = $result->fetch();

    if (get_watchdog($_SESSION['id_usr'], "posta"))
        $checked_posta = "checked";
    if (get_watchdog($_SESSION['id_usr'], "ukoly"))
        $checked_ukoly = "checked";
    if (get_watchdog($_SESSION['id_usr'], "firma"))
        $checked_firma = "checked";

    echo "<form method=\"POST\" action=\"?id=nastaveni\" id=\"nastaveni\">
	<fieldset>
	<legend>" . $row['jmeno'] . "</legend>
	<label for=\"email\">e-mail</label><br />
	<input name=\"email\" id=\"email\" class=\"formular\" value=\"" . $row['mail'] . "\"><br />
	<label for=\"telefon\">telefon</label><br />
	<input name=\"telefon\" id=\"telefon\" class=\"formular\" value=\"" . $row['telefon'] . "\"><br />
	<label for=\"check_posta\">watchdog - pošta</label><br />
	<input type=\"checkbox\" id=\"check_posta\" name=\"check_posta\" value=\"ano\" " . $checked_posta . "/><label for=\"check_posta\">ano</label><br />
	<label for=\"check_ukoly\">watchdog - úkoly</label><br />
	<input type=\"checkbox\" id=\"check_ukoly\" name=\"check_ukoly\" value=\"ano\" " . $checked_ukoly . "/><label for=\"check_ukoly\">ano</label><br />";

    echo "<label for=\"pocet_prvku_zobrazeni\">stránkování</label><br />
	<input name=\"pocet_prvku_zobrazeni\" id=\"pocet_prvku_zobrazeni\" class=\"formular\" value=\"" . $row['pocet_prvku_zobrazeni'] . "\"><br />
	<input class=\"tlacitko\" type=\"submit\" value=\"upravit\">
	</fieldset>
	</form>

           <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#nastaveni').validate({
             rules: {
               email: {
                 required: true,
                 email: true
               },
               telefon: {
                 required: true
               },
               pocet_prvku_zobrazeni: {
                 required: true,
                 min: 1
               }

               }
             });
           });
           </script>

";
}

function zmenit_heslo() {
    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $_SESSION['id_usr']);
    $row = $result->fetch();

    if ($_POST['nove_heslo_jedna']) {
        if (md5($_POST['stare_heslo'] . $row['sul']) != $row['heslo']) {
            echo "<div class=\"obdelnik\"><h5>Špatně zadané staré heslo!</h5></div>";
        }
        elseif ($_POST['nove_heslo_jedna'] != null && $_POST['nove_heslo_jedna'] != $_POST['nove_heslo_dva']) {
            echo "<div class=\"obdelnik\"><h5>Nová hesla se nechodují!</h5></div>";
        } elseif ($_POST['nove_heslo_jedna'] == $_POST['nove_heslo_dva'] && $_POST['nove_heslo_jedna'] != null) {
            $hash = md5($_POST['nove_heslo_jedna'] . $row['sul']);
            $arr = array('mail' => $_POST['email'], 'telefon' => $_POST['telefon'], 'pocet_prvku_zobrazeni' => $_POST['pocet_prvku_zobrazeni'], 'heslo' => $hash);
            dibi::query('UPDATE [prevent_uzivatele] SET', $arr, 'WHERE [id] = %i', $_SESSION['id_usr']);

            $arr_watchdog = array('posta' => $_POST['check_posta'], 'ukoly' => $_POST['check_ukoly'], 'firma' => $_POST['firma']);
            dibi::query("UPDATE [prevent_watchdog] SET", $arr_watchdog, 'WHERE [id_uzivatel] = %i', $_SESSION['id_usr']);

            $arr_log = array('text' => 'Uživatel změnil své nastavení', 'link' => '', 'ad' => $_SESSION['id_usr']);
            vytvor_log($arr_log);

            echo "<div class=\"obdelnik\"><h5>Změna nastavení uživatele proběhla úspěšně, nyní jste odhlášen, k přihlášení použijte již nové heslo</h5>
			<p>Můžete se nyní <a href=\"./index.php\">přihlásit do systému</a>.</p></div>";
        }
    }

    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $_SESSION['id_usr']);
    $row = $result->fetch();

    echo "<a name=\"hesla\"></a><form method=\"POST\" action=\"?id=nastaveni#hesla\" id=\"zmen_heslo\">
	<fieldset>
	<legend>" . $row['jmeno'] . "</legend>
			<label for=\"stare_heslo\">staré heslo</label><br />
			<input type=\"password\" name=\"stare_heslo\" id=\"stare_heslo\" class=\"formular\" value=\"\"><br />
			<label for=\"nove_heslo_jedna\">nové heslo</label><br />
			<input type=\"password\" name=\"nove_heslo_jedna\" id=\"nove_heslo_jedna\" class=\"formular\" value=\"\"><br />
			<label for=\"nove_heslo_dva\">nové heslo znovu</label><br />
			<input type=\"password\" name=\"nove_heslo_dva\" id=\"nove_heslo_dva\" class=\"formular\" value=\"\"><br />
	<input class=\"tlacitko\" type=\"submit\" value=\"změnit\">
	</fieldset>
	</form>

           <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#zmen_heslo').validate({
             rules: {
               stare_heslo: {
                 required: true,
               },
               nove_heslo_jedna: {
                 required: true,
                 minlength: 1
               },
               nove_heslo_dva: {
                 required: true,
                 minlength: 1
               }

               }
             });
           });
           </script>

";
}

function quicklink() {
    echo "<table class=\"table\">
	<tr>
	<td><span class=\"subheader\">AKCE</span></td>
	<td><span class=\"subheader\">TEXT</span></td>
	<td><span class=\"subheader\">LINK</span></td>
	</tr>";
    $result = dibi::query('SELECT * FROM [prevent_quicklink] WHERE [ad] = %i', $_SESSION['id_usr'], 'ORDER BY [pozice] ASC');
    $pocet = $result->count();
    $iterace = 1;
    while ($row = $result->fetch()) {
        echo "<tr>
			<td><a href=\"./nastaveni.php?smazat_link=" . $row['id'] . "\" onclick=\"if(confirm('Skutečně smazat?')) location.href='./nastaveni.php?smazat_link=" . $row['id'] . "'; return(false);\"><img src=\"./design/kos.png\" alt=\"smazat\" title=\"smazat\"></a>";
        if ($iterace == 1 && $pocet != 1) {
            echo "<a href=\"./nastaveni.php?dolu=" . $row['id'] . "\"><img src=\"./design/dolu.png\" alt=\"dolu\" title=\"dolu\"></a>";
        } elseif ($iterace == $pocet && $pocet != 1) {
            echo "<a href=\"./nastaveni.php?nahoru=" . $row['id'] . "\"><img src=\"./design/nahoru.png\" alt=\"nahoru\" title=\"nahoru\"></a>";
        } elseif ($pocet != 1) {
            echo "<a href=\"./nastaveni.php?nahoru=" . $row['id'] . "\"><img src=\"./design/nahoru.png\" alt=\"nahoru\" title=\"nahoru\"></a> <a href=\"./nastaveni.php?dolu=" . $row['id'] . "\"><img src=\"./design/dolu.png\" alt=\"dolu\" title=\"dolu\"></a>";
        }
        echo "</td>
			<td>" . $row['text'] . "</td>
			<td><a href=\"" . $row['link'] . "\">" . $row['link'] . "</a></td>
			</tr>";
        $iterace++;
    }
    echo "<form method=\"POST\" action=\"./nastaveni.php\" id=\"quicklink\">
	<tr>
	<td><input class=\"tlacitko\" type=\"submit\" value=\"přidat\"></td>
	<td><input name=\"text\" id=\"text\" class=\"formular\" value=\"text\" onClick=\"this.value=''\" size=\"10\"></td>
	<td><textarea name=\"link\" id=\"link\" cols=\"50\" rows=\"2\" class=\"formular\" size=\"20\">http://</textarea></td>
	</tr>
	</form>
	</table>
           <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#quicklink').validate({
             rules: {
               text: {
                 required: true,
               },
               link: {
                 required: true
               }
               }
             });
           });
           </script>";
}

function pridat_quicklink() {
    $result = dibi::query('SELECT * FROM [prevent_quicklink] WHERE [ad] = %i', $_SESSION['id_usr'], 'ORDER BY [pozice] ASC');
    $pocet = $result->count() + 1;
    $arr = array('ad' => $_SESSION['id_usr'], 'text' => $_POST['text'], 'link' => $_POST['link'], 'pozice' => $pocet);
    dibi::query('INSERT INTO [prevent_quicklink]', $arr);
}

function smazat_quicklink() {
    dibi::query('DELETE FROM [prevent_quicklink] WHERE [id] = %i', $_GET['smazat_link']);
    $result = dibi::query('SELECT * FROM [prevent_quicklink] WHERE [ad] = %i', $_SESSION['id_usr'], 'ORDER BY [pozice] ASC');
    $pozice = 1;
    while ($row = $result->fetch()) {
        $arr = array('pozice' => $pozice);
        dibi::query('UPDATE [prevent_quicklink] SET', $arr, 'WHERE [id] = %i', $row['id']);
        $pozice++;
    }
}

function nahoru_quicklink() {
    $result = dibi::query('SELECT * FROM [prevent_quicklink] WHERE [id] = %i', $_GET['nahoru']);
    $row = $result->fetch();
    $pozice_new = $row['pozice'] - 1;
    $result2 = dibi::query('SELECT * FROM [prevent_quicklink] WHERE [pozice] = %i', $pozice_new);
    $row2 = $result2->fetch();
    $dolu = $row2['id'];

    $arr = array('pozice' => $pozice_new);
    dibi::query('UPDATE [prevent_quicklink] SET', $arr, 'WHERE [id] = %i', $_GET['nahoru']);
    $arr = array('pozice' => ($pozice_new + 1));
    dibi::query('UPDATE [prevent_quicklink] SET', $arr, 'WHERE [id] = %i', $dolu);
}

function dolu_quicklink() {
    $result = dibi::query('SELECT * FROM [prevent_quicklink] WHERE [id] = %i', $_GET['dolu']);
    $row = $result->fetch();
    $pozice_new = $row['pozice'] + 1;
    $result2 = dibi::query('SELECT * FROM [prevent_quicklink] WHERE [pozice] = %i', $pozice_new);
    $row2 = $result2->fetch();
    $nahoru = $row2['id'];

    $arr = array('pozice' => $pozice_new);
    dibi::query('UPDATE [prevent_quicklink] SET', $arr, 'WHERE [id] = %i', $_GET['dolu']);
    $arr = array('pozice' => ($pozice_new - 1));
    dibi::query('UPDATE [prevent_quicklink] SET', $arr, 'WHERE [id] = %i', $nahoru);
}
?>