<?php
//hlavni require
require ("./funkce/global_require_config.php");

//stav stranky
$SESSION['autorizovana'] = "0";

$SESSION['search_readonly'] = "readonly";

$SESSION['nadpis_horni_a'] = "Novinky";
$SESSION['nadpis_horni_b'] = $_SERVER['REQUEST_URI'];
$SESSION['specmenu_a'] = "Nápověda";
$SESSION['specmenu_b'] = "faq.php?id=o_systemu";

$cesta_nav = array("Novinky" => "novinky.php");

//logika k menu
$SESSION['menu'] = "faq";


$SESSION['active_menu'] = "";
//KONEC logika k menu

//dalsi require
require ("./funkce/global_require_page.php");

require ("./page/page_novinky.php");
?>