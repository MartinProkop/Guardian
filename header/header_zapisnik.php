<?php

//hlavni require
require ("./funkce/global_require_config.php");

//stav stranky
$SESSION['autorizovana'] = "1";

$SESSION['search_readonly'] = "readonly";

$SESSION['nadpis_horni_a'] = "Zápisník";
$SESSION['nadpis_horni_b'] = $_SERVER['REQUEST_URI'];
$SESSION['specmenu_a'] = "Nápověda";
$SESSION['specmenu_b'] = "faq.php?id=o_systemu";

if (!$_GET['id_zapisnik']) {
    $result = dibi::query('SELECT * FROM [prevent_zapisnik] WHERE [ad] = %i', $_SESSION['id_usr'], 'AND [nazev] = %s', "hlavní");
    $row = $result->fetch();
    $cesta_nav = array("Zápisník" => "zapisnik.php", "hlavní" => "zapisnik.php?id_zapisnik=".$row['id']);
} else {
    $result = dibi::query('SELECT * FROM [prevent_zapisnik] WHERE [id] = %i', $_GET['id_zapisnik']);
    $row = $result->fetch();
    $cesta_nav = array("Zápisník" => "zapisnik.php", $row['nazev'] => "zapisnik.php?id_zapisnik=" . $_GET['id_zapisnik']);
}

//logika k menu
if (login ())
    $SESSION['menu'] = "autorizovan";
else
    $SESSION['menu'] = "index";

$SESSION['active_menu'] = "zapisnik";
//KONEC logika k menu
//dalsi require
require ("./funkce/global_require_page.php");

require ("./page/page_zapisnik.php");
?>
