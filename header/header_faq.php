<?php

//hlavni require
require ("./funkce/global_require_config.php");

//stav stranky
$SESSION['autorizovana'] = "0";

$SESSION['search_readonly'] = "readonly";

$SESSION['nadpis_horni_a'] = "Nápověda";
$SESSION['nadpis_horni_b'] = $_SERVER['REQUEST_URI'];
$SESSION['specmenu_a'] = "Nápověda";
$SESSION['specmenu_b'] = "faq.php?id=o_systemu";

if ($_GET['id'] == "o_systemu" || !$_GET['id'])
    $cesta_nav = array("Nápověda" => "faq.php", "O systému" => "faq.php?id=o_systemu");
elseif ($_GET['id'] == "prehled_funkci") {
    $cesta_nav = array("Nápověda" => "faq.php", "Přehled funkcí" => "faq.php?id=prehled_funkci");
} elseif ($_GET['id'] == "prehled_verzi_systemu") {
    $cesta_nav = array("Nápověda" => "faq.php", "Přehled verzí systému" => "faq.php?id=prehled_verzi_systemu");
}

//logika k menu
$SESSION['menu'] = "faq";


$SESSION['active_menu'] = $_GET['id'];
//KONEC logika k menu
//dalsi require
require ("./funkce/global_require_page.php");

require ("./page/page_faq.php");
?>