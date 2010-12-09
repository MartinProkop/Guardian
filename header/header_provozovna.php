<?php

//hlavni require
require ("./funkce/global_require_config.php");

//stav stranky
$SESSION['autorizovana'] = "1";

$SESSION['search_readonly'] = "readonly";

$SESSION['nadpis_horni_a'] = "Pobočka";
$SESSION['nadpis_horni_b'] = $_SERVER['REQUEST_URI'];
$SESSION['specmenu_a'] = "Nápověda";
$SESSION['specmenu_b'] = "faq.php?id=o_systemu";

if (!$_GET['id'])
    if ($_POST['firma'])
        $cesta_nav = array("Pobočka" => "provozovna.php", "Klient (" . get_nazev_firmy($_POST['firma']) . ")" => "provozovna.php?firma=" . $_POST['firma']);
    elseif ($_GET['firma'])
        $cesta_nav = array("Pobočka" => "provozovna.php", "Klient (" . get_nazev_firmy($_GET['firma']) . ")" => "provozovna.php?firma=" . $_GET['firma']);
    else
        $cesta_nav = array("Pobočka" => "provozovna.php");

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

$SESSION['active_menu'] = "provozovna";
//KONEC logika k menu
//dalsi require
require ("./funkce/global_require_page.php");

require ("./page/page_provozovna.php");
?>
