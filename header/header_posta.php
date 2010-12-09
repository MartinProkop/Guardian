<?php

//hlavni require
require ("./funkce/global_require_config.php");

//stav stranky
$SESSION['autorizovana'] = "1";

$SESSION['search_readonly'] = "readonly";

$SESSION['nadpis_horni_a'] = "Pošta";
$SESSION['nadpis_horni_b'] = $_SERVER['REQUEST_URI'];
$SESSION['specmenu_a'] = "Nápověda";
$SESSION['specmenu_b'] = "faq.php?id=o_systemu";


if ($_GET['id'] == "prijata")
    $cesta_nav = array("Pošta" => "posta.php", "Přijatá" => "posta.php?id=prijata");
elseif ($_GET['id'] == "odeslana")
    $cesta_nav = array("Pošta" => "posta.php", "Odeslaná" => "posta.php?id=odeslana");
else
    $cesta_nav = array("Pošta" => "posta.php");

//logika k menu
if (login ())
    $SESSION['menu'] = "autorizovan";
else
    $SESSION['menu'] = "index";

$SESSION['active_menu'] = "posta";
//KONEC logika k menu
//dalsi require
require ("./funkce/global_require_page.php");

require ("./page/page_posta.php");
?>