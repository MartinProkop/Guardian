<?php

function vyzva_login($varovat = "") {
    if ($_GET['action'] == "logout")
        $route = "index.php";
    else
        $route = $_SERVER['REQUEST_URI'];
    echo "<h3>Přihlášení do systému</h3>";
    if ($varovat)
        echo "<div class=\"obdelnik\"><h5>" . $varovat . "</h5></div>";
    echo "<form method=\"POST\" id=\"prihlaseni\" action=\"" . $route . "\" name=\"prihlaseni\">
	<fieldset>
	<legend>přihlašovací údaje</legend>
        <label for=\"jmenolog\">login</label><br />
	<input type=\"hidden\"  name=\"pokuslog\" value=\"true\">
	<input name=\"jmenolog\" id=\"jmenolog\" class=\"formular\" value=\"\"><br />
        <label for=\"heslolog\">heslo</label><br />
	<input type=\"password\"  id=\"heslolog\" name=\"heslolog\" class=\"formular\" value=\"\"><br />
	<input class=\"tlacitko\" type=\"submit\" value=\"přihlásit\">
	</fieldset>
	</form>

         <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#prihlaseni').validate({
             rules: {
               jmenolog: {
                 required: true
               },
               heslolog: {
                 required: true
               }
               }
             });
           });
           </script>
";
}

function login() {
    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %s', $_SESSION['id_usr']);

    if ($row = $result->fetch())
        $jmeno = $row['jmeno'];
    else
        $jmeno = $_SESSION['id_usr'];

    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [jmeno] = %s', $jmeno);
    if (!$row = $result->fetch())
        return 0;


    if (!strpos($_SERVER['REQUEST_URI'], "provest_audit.php")) {
        if ($row['posledni_klik'] < (Time() - 1800) && $_POST['pokuslog'] == null) {
            logout();
            return 0;
        }
    }

    $hash = md5($_SESSION['heslo_usr'] . $row['sul']);

    if ($hash == $row['heslo'] && $row['stav'] == "aktivni") {
        $_SESSION['id_usr'] = $row['id'];
        $_SESSION['jmeno_usr'] = $row['jmeno'];
        $_SESSION['prava_usr'] = $row['prava'];
        $_SESSION['firma_usr'] = $row['ad'];
        $_SESSION['pocet_prvku_zobrazeni_usr'] = $row['pocet_prvku_zobrazeni'];
        dibi::query('UPDATE [prevent_uzivatele] SET [posledni_klik] = %i', Time(), 'WHERE [jmeno] = %s', $jmeno);
        return 1;
    } elseif ($row['stav'] == "ceka_na_autorizaci") {
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; url=./autorizace.php?id=autorizace'>";
    } elseif ($row['stav'] == "blokovan") {
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; url=./autorizace.php?id=odblokovat'>";
    } else {       //asi bug
        //echo "<META HTTP-EQUIV='REFRESH' CONTENT='0; url=".$_SERVER['REQUEST_URI']."'>";
        return 0;
    }
}

function login_form() {
    if (!login()) {
        if ($_POST['pokuslog'])
            vyzva_login("Špatně zadané jméno nebo heslo!");
        //doma
      //elseif ($_SERVER['REQUEST_URI'] != "/guardian/index.php" && $_SERVER['REQUEST_URI'] != "/guardian/index.php?action=logout")
      //
        //server    
        elseif ($_SERVER['REQUEST_URI'] != "/" && $_SERVER['REQUEST_URI'] != "/index.php" && $_SERVER['REQUEST_URI'] != "/index.php?action=logout")
            vyzva_login("Neautorizovaný přístup. Přihlašte se!");
        else
            vyzva_login();
    }
    elseif ($_POST['jmenolog']) {
        $arr = array('text' => 'Úspěšné přihlášení', 'link' => '', 'ad' => $_SESSION['id_usr']);
        vytvor_log($arr);
        $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $_SESSION['id_usr']);
        $row = $result->fetch();
        $arr = array('posledni_login_novy' => Time(), 'posledni_login_stary' => $row['posledni_login_novy']);
        dibi::query('UPDATE [prevent_uzivatele] SET', $arr, 'WHERE [id] = %i', $_SESSION['id_usr']);
        dibi::query('UPDATE [prevent_uzivatele] SET [posledni_login_novy] = %i', Time(), 'WHERE [id] = %i', $_SESSION['id_usr']);
    }
}

function logout() {
    dibi::query('UPDATE [prevent_uzivatele] SET [posledni_klik] = %i', "0", 'WHERE [id] = %i', $_SESSION['id_usr']);
    $_SESSION['id_usr'] = "";
    $_SESSION['heslo_usr'] = "";
    $_SESSION['jmeno_usr'] = "";
    $_SESSION['prava_usr'] = "";
    $_SESSION['pocet_prvku_zobrazeni_usr'] = "";
}
?>