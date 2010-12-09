<?php

//hlavni require
require ("./funkce/global_require_config.php");

//stav stranky
$SESSION['autorizovana'] = "1";

$SESSION['search_readonly'] = "readonly";

$SESSION['nadpis_horni_a'] = "Relace";
$SESSION['nadpis_horni_b'] = $_SERVER['REQUEST_URI'];
$SESSION['specmenu_a'] = "Nápověda";
$SESSION['specmenu_b'] = "faq.php?id=o_systemu";

if ($_GET['id'] == "enter")
    $cesta_nav = array("Relace" => "relace.php?id=enter");
elseif ($_GET['id'] == "detaily") {
    if (!$_GET['firma'] && !$_GET['typ_relace']) {
        $_GET['firma'] = $_POST['firma'];
        $_GET['typ_relace'] = $_POST['typ_relace'];
    }
    $_POST['typ_relace'] = $_GET['typ_relace'];
    $cesta_nav = array("Relace" => "relace.php?id=enter", "Detaily relace (Klient: " . get_nazev_firmy($_GET['firma']) . ", Relace: ".$_GET['typ_relace'].")" => "relace.php?id=detaily&firma=".$_GET['firma']."&typ_relace=".$_GET['typ_relace']);
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

$SESSION['active_menu'] = "relace";
//KONEC logika k menu
//dalsi require
require ("./funkce/global_require_page.php");

require ("./page/page_relace.php");
?>
