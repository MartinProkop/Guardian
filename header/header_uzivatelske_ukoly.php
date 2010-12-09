<?php
//hlavni require
require ("./funkce/global_require_config.php");

//stav stranky
$SESSION['autorizovana'] = "1";

$SESSION['search_readonly'] = "readonly";

$SESSION['nadpis_horni_a'] = "Zadávání úkolů";
$SESSION['nadpis_horni_b'] = $_SERVER['REQUEST_URI'];
$SESSION['specmenu_a'] = "Nápověda";
$SESSION['specmenu_b'] = "faq.php?id=o_systemu";

$cesta_nav = array("Zadávání úkolů" => "uzivatelske_ukoly.php");

//logika k menu
if(login() && $_SESSION['prava_usr'] == "admin") $SESSION['menu'] = "autorizovan_admin";
elseif(login() && $_SESSION['prava_usr'] == "koordinator") $SESSION['menu'] = "autorizovan_koordinator";
else $SESSION['menu'] = "index";

$SESSION['active_menu'] = "uzivatelske_ukoly";
//KONEC logika k menu

//dalsi require
require ("./funkce/global_require_page.php");

require ("./page/page_uzivatelske_ukoly.php");
?>