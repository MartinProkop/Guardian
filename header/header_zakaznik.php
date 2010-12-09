<?php
//hlavni require
require ("./funkce/global_require_config.php");

//stav stranky
$SESSION['autorizovana'] = "1";

$SESSION['search_readonly'] = "readonly";

$SESSION['nadpis_horni_a'] = "Firma";
$SESSION['nadpis_horni_b'] = $_SERVER['REQUEST_URI'];
$SESSION['specmenu_a'] = "Nápověda";
$SESSION['specmenu_b'] = "faq.php?id=o_systemu";

$SESSION['cesta'] = "Na této stránce není cesta podporována.";

//logika k menu
if(login()) $SESSION['menu'] = "firma";
else $SESSION['menu'] = "index";

$SESSION['active_menu'] = $_GET['id'];
//KONEC logika k menu

//dalsi require
require ("./funkce/global_require_page.php");

require ("./page/page_zakaznik.php");
?>