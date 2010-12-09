<?php
//hlavni require
require ("./funkce/global_require_config.php");

//stav stranky
$SESSION['autorizovana'] = "1";

$SESSION['search_readonly'] = "readonly";

$SESSION['nadpis_horni_a'] = "Zamítlé audity";
$SESSION['nadpis_horni_b'] = $_SERVER['REQUEST_URI'];
$SESSION['specmenu_a'] = "Nápověda";
$SESSION['specmenu_b'] = "faq.php?id=o_systemu";

$SESSION['cesta'] = "Na této stránce není cesta podporována.";

//logika k menu
if(login() && $_SESSION['prava_usr'] == "admin") $SESSION['menu'] = "autorizovan_admin_audit";
elseif(login() && $_SESSION['prava_usr'] == "koordinator") $SESSION['menu'] = "autorizovan_koordinator_audit";
elseif(login() && $_SESSION['prava_usr'] == "technik") $SESSION['menu'] = "autorizovan_technik_audit";
elseif(login() && $_SESSION['prava_usr'] == "firma") $SESSION['menu'] = "autorizovan_firma_audit";
else $SESSION['menu'] = "index";

$SESSION['active_menu'] = "zamitnute_audity";
//KONEC logika k menu

//dalsi require
require ("./funkce/global_require_page.php");

require ("./page/page_zamitnute_audity.php");
?>
