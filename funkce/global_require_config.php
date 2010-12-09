<?php
//ladenka a dibi
require ("./module_include/Debug.php");
Debug::enable();
//error_reporting(E_ALL);
error_reporting(E_ALL ^ ~E_STRICT);
// ^ E_NOTICE ^ E_WARNING
require ("./module_include/dibi/dibi.php");
//KONEC ladenka a dibi

//sesniky a prihlaseni
session_start();

if($_POST['jmenolog'] && $_POST['heslolog']) {
    $_SESSION['id_usr']= $_POST['jmenolog'];
    $_SESSION['heslo_usr'] = $_POST['heslolog'];

}
//KONEC sesniky a prihlaseni

//require - konfigurace
require ("./config/db.php");

//require - sablony
require ("./funkce/style_sablony.php");
require ("./funkce/style_menu.php");

//require - login
require ("./funkce/global_prihlaseni.php");

//require - globani fce
require ("./funkce/global_logovani.php");
require ("./funkce/global_ukoly.php");
require ("./funkce/global_nastenka.php");
require ("./funkce/global_novinky.php");
require ("./funkce/global_password.php");
require ("./funkce/global_posta.php");
require ("./funkce/global_formulare.php");
require ("./funkce/global_mail.php");
require ("./funkce/global_soubory.php");
require ("./funkce/global_prava.php");
require ("./funkce/global_watchdog.php");
require ("./funkce/global_quicklink.php");
require ("./funkce/global_uzivatele.php");
require ("./funkce/global_firmy.php");
require ("./funkce/global_osoba.php");
require ("./funkce/global_provozovny_relace.php");
require ("./funkce/global_vypocty.php");
require ("./funkce/global_audity.php");
require ("./funkce/global_audit_kontrola_pobocka.php");
require ("./funkce/global_audit_checklisty.php");
require ("./funkce/global_audit_neshody.php");
require ("./funkce/global_audit_pracoviste.php");
require ("./funkce/global_audit_pripominky.php");
require ("./funkce/global_audit_protokoly.php");
require ("./funkce/global_audit_fotografie.php");
require ("./funkce/global_audit_tisk.php");
require ("./funkce/global_audit_synchronizace.php");
require ("./funkce/global_audit_verze.php");

//KONEC require

//osetreni loginu
if ($_GET['action'] == "logout") logout();
//KONEC osetreni loginu
?>
