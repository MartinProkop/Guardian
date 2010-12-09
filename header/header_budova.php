<?php
//hlavni require
require ("./funkce/global_require_config.php");

//stav stranky
$SESSION['autorizovana'] = "1";

$SESSION['search_readonly'] = "readonly";

$SESSION['nadpis_horni_a'] = "Budova";
$SESSION['nadpis_horni_b'] = $_SERVER['REQUEST_URI'];
$SESSION['specmenu_a'] = "Nápověda";
$SESSION['specmenu_b'] = "faq.php?id=o_systemu";

if (!$_GET['id']) {
    if ($_POST['firma'] || $_GET['firma']) {
        if ($_POST['firma'])
            $_GET['firma'] = $_POST['firma'];
        if ($_POST['provozovna'] || $_GET['provozovna']) {
            if ($_POST['provozovna'])
                $_GET['provozovna'] = $_POST['provozovna'];
            if ($_GET['provozovna'] == "all")
                $cesta_nav = array("Budova" => "budova.php", "Klient (" . get_nazev_firmy($_GET['firma']) . ")" => "budova.php?firma=" . $_GET['firma']);
            else
                $cesta_nav = array("Budova" => "budova.php", "Klient (" . get_nazev_firmy($_GET['firma']) . ")" => "budova.php?firma=" . $_GET['firma'], "Pobočka (" . get_nazev_provozovny($_GET['provozovna']) . ")" => "budova.php?firma=" . $_GET['firma'] . "&provozovna=" . $_GET['provozovna']);
        }
        else {
            $cesta_nav = array("Budova" => "budova.php", "Klient (" . get_nazev_firmy($_GET['firma']) . ")" => "budova.php?firma=" . $_GET['firma']);
        }
    }
    else
        $cesta_nav = array("Budova" => "budova.php");
}
elseif($_GET['id'] == "detaily")
{
    $cesta_nav = array("Budova" => "budova.php", "Klient (" . get_nazev_firmy(get_id_firma_z_objekt("budova", $_GET['id_budova'])) . ")" => "budova.php?firma=" . get_id_firma_z_objekt("budova", $_GET['id_budova']), "Pobočka (" . get_nazev_provozovny(get_id_provozovna_z_objekt("budova", $_GET['id_budova'])) . ")" => "budova.php?firma=" . get_id_firma_z_objekt("budova", $_GET['id_budova']) . "&provozovna=" . get_id_provozovna_z_objekt("budova", $_GET['id_budova']), "Detaily budovy (".  get_nazev_objekt_z_id("budova", $_GET['id_budova']).")" => "budova.php?id=detaily&id_budova=".$_GET['id_budova']);
}
elseif($_GET['id'] == "upravit")
{
    $cesta_nav = array("Budova" => "budova.php", "Klient (" . get_nazev_firmy(get_id_firma_z_objekt("budova", $_GET['id_budova'])) . ")" => "budova.php?firma=" . get_id_firma_z_objekt("budova", $_GET['id_budova']), "Pobočka (" . get_nazev_provozovny(get_id_provozovna_z_objekt("budova", $_GET['id_budova'])) . ")" => "budova.php?firma=" . get_id_firma_z_objekt("budova", $_GET['id_budova']) . "&provozovna=" . get_id_provozovna_z_objekt("budova", $_GET['id_budova']), "Detaily budovy (".  get_nazev_objekt_z_id("budova", $_GET['id_budova']).")" => "budova.php?id=detaily&id_budova=".$_GET['id_budova'], "Upravit budovu (".  get_nazev_objekt_z_id("budova", $_GET['id_budova']).")" => "budova.php?id=upravit&id_budova=".$_GET['id_budova']);
}

elseif($_GET['id'] == "nova")
{
    $cesta_nav = array("Budova" => "budova.php", "Klient (" . get_nazev_firmy($_GET['id_firma']) . ")" => "budova.php?firma=" . $_GET['id_firma'], "Pobočka (" . get_nazev_provozovny($_GET['id_provozovna']) . ")" => "budova.php?firma=" . $_GET['id_firma'] . "&provozovna=" . $_GET['id_provozovna'], "Nová budova" => "budova.php?id=nova&id_firma=" . $_GET['id_firma'] . "&id_provozovna=" .$_GET['id_provozovna']);
}
//logika k menu
if (login() && $_SESSION['prava_usr'] == "koordinator")
    $SESSION['menu'] = "autorizovan_koordinator_firmy";
elseif (login() && $_SESSION['prava_usr'] == "admin")
    $SESSION['menu'] = "autorizovan_admin_firmy";
elseif (login() && $_SESSION['prava_usr'] == "technik")
    $SESSION['menu'] = "autorizovan_technik_firmy";
elseif (login() && $_SESSION['prava_usr'] == "firma")
    $SESSION['menu'] = "firma";
else
    $SESSION['menu'] = "index";

$SESSION['active_menu'] = "budova";
//KONEC logika k menu
//dalsi require
require ("./funkce/global_require_page.php");

require ("./page/page_budova.php");
?>
