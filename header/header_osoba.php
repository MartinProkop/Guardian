<?php

//hlavni require
require ("./funkce/global_require_config.php");

//stav stranky
$SESSION['autorizovana'] = "1";

$SESSION['search_readonly'] = "readonly";

$SESSION['nadpis_horni_a'] = "Osoba";
$SESSION['nadpis_horni_b'] = $_SERVER['REQUEST_URI'];
$SESSION['specmenu_a'] = "Nápověda";
$SESSION['specmenu_b'] = "faq.php?id=o_systemu";

if (!$_GET['id']) {
    if ($_POST['firma'] || $_GET['firma']) {
        if ($_POST['firma'])
            $_GET['firma'] = $_POST['firma'];
        if ($_POST['provozovna'] || $_GET['provozovna']) {
            if ($_POST['provozovna'])
                $_GET['provozovna'] = $_POST['provozovna'];
            if ($_GET['provozovna'] == "all")
                $cesta_nav = array("Osoba" => "osoba.php", "Klient (" . get_nazev_firmy($_GET['firma']) . ")" => "osoba.php?firma=" . $_GET['firma']);
            else
                $cesta_nav = array("Osoba" => "osoba.php", "Klient (" . get_nazev_firmy($_GET['firma']) . ")" => "osoba.php?firma=" . $_GET['firma'], "Pobočka (" . get_nazev_provozovny($_GET['provozovna']) . ")" => "osoba.php?firma=" . $_GET['firma'] . "&provozovna=" . $_GET['provozovna']);
        }
        else
            $cesta_nav = array("Osoba" => "osoba.php", "Klient (" . get_nazev_firmy($_GET['firma']) . ")" => "osoba.php?firma=" . $_GET['firma']);
    }
    else
        $cesta_nav = array("Osoba" => "osoba.php");
}
elseif ($_GET['id'] == "detaily") {
    if (get_osoba_relace_firma_z_id_osoba($_GET['id_osoba']))
        $cesta_nav = array("Osoba" => "osoba.php", "Klient (" . get_nazev_firmy(get_id_firma_z_id_osoba($_GET['id_osoba'])) . ")" => "osoba.php?firma=" . get_id_firma_z_id_osoba($_GET['id_osoba']), "Detaily osoby (" . get_jmeno_osoba_z_id($_GET['id_osoba']) . ")" => "osoba.php?id=detaily&id_osoba=".$_GET['id_osoba']);
    else
        $cesta_nav = array("Osoba" => "osoba.php", "Klient (" . get_nazev_firmy(get_id_firma_z_id_osoba($_GET['id_osoba'])) . ")" => "osoba.php?firma=" . get_id_firma_z_id_osoba($_GET['id_osoba']), "Pobočka (" . get_nazev_provozovny(get_id_provozovna_z_id_osoba($_GET['id_osoba'])) . ")" => "osoba.php?firma=" . get_id_firma_z_id_osoba($_GET['id_osoba']) . "&provozovna=" . get_id_provozovna_z_id_osoba($_GET['id_osoba']), "Detaily osoby (" . get_jmeno_osoba_z_id($_GET['id_osoba']) . ")" => "osoba.php?id=detaily&id_osoba=".$_GET['id_osoba']);
}
elseif ($_GET['id'] == "upravit") {
    if (get_osoba_relace_firma_z_id_osoba($_GET['id_osoba']))
        $cesta_nav = array("Osoba" => "osoba.php", "Klient (" . get_nazev_firmy(get_id_firma_z_id_osoba($_GET['id_osoba'])) . ")" => "osoba.php?firma=" . get_id_firma_z_id_osoba($_GET['id_osoba']), "Detaily osoby (" . get_jmeno_osoba_z_id($_GET['id_osoba']) . ")" => "osoba.php?id=detaily&id_osoba=".$_GET['id_osoba'], "Upravit osobu" => "osoba.php?id=upravit&id_osoba=".$_GET['id_osoba']);
    else
        $cesta_nav = array("Osoba" => "osoba.php", "Klient (" . get_nazev_firmy(get_id_firma_z_id_osoba($_GET['id_osoba'])) . ")" => "osoba.php?firma=" . get_id_firma_z_id_osoba($_GET['id_osoba']), "Pobočka (" . get_nazev_provozovny(get_id_provozovna_z_id_osoba($_GET['id_osoba'])) . ")" => "osoba.php?firma=" . get_id_firma_z_id_osoba($_GET['id_osoba']) . "&provozovna=" . get_id_provozovna_z_id_osoba($_GET['id_osoba']), "Detaily osoby (" . get_jmeno_osoba_z_id($_GET['id_osoba']) . ")" => "osoba.php?id=detaily&id_osoba=".$_GET['id_osoba'], "Upravit osobu" => "osoba.php?id=upravit&id_osoba=".$_GET['id_osoba']);
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

$SESSION['active_menu'] = "osoba";
//KONEC logika k menu
//dalsi require
require ("./funkce/global_require_page.php");

require ("./page/page_osoba.php");
?>
