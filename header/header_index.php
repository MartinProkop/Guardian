<?php
//hlavni require
require ("./funkce/global_require_config.php");

//stav stranky
$SESSION['autorizovana'] = "1";

$SESSION['search_readonly'] = "readonly";

$SESSION['nadpis_horni_a'] = "Přihlášení";
$SESSION['nadpis_horni_b'] = $_SERVER['REQUEST_URI'];
$SESSION['specmenu_a'] = "Nápověda";
$SESSION['specmenu_b'] = "faq.php?id=o_systemu";

$cesta_nav = array("Hlavní strana" => "index.php",);

//logika k menu
if(login()): $SESSION['menu'] = "autorizovan"; $SESSION['active_menu'] = "hlavni_strana";
else: $SESSION['menu'] = "index"; $SESSION['active_menu'] = "prihlasit_se";
endif;


//KONEC logika k menu

//dalsi require
require ("./funkce/global_require_page.php");

require ("./page/page_index.php");
?>