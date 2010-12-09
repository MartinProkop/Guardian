<?php
//hlavni require
require ("./funkce/global_require_config.php");

//stav stranky
$SESSION['autorizovana'] = "1";

$SESSION['search_readonly'] = "readonly";

$SESSION['nadpis_horni_a'] = "Firmy";
$SESSION['nadpis_horni_b'] = $_SERVER['REQUEST_URI'];
$SESSION['specmenu_a'] = "Nápověda";
$SESSION['specmenu_b'] = "faq.php?id=o_systemu";

if (!$_GET['id'])
    if ($_GET['action'] == "pridat")
        $cesta_nav = array("Klienti" => "firmy_technik.php", "Přidat klienta" => "firmy_technik.php?action=pridat");
    else
        $cesta_nav = array("Klienti" => "firmy_technik.php");
elseif ($_GET['id'] == "detaily_firmy")
    if ($_GET['action'] == "pridat_provozovnu")
        $cesta_nav = array("Klienti" => "firmy_technik.php", "Detaily klienta (" . get_nazev_firmy($_GET['id_firmy']) . ")" => "firmy_technik.php?id=detaily_firmy&id_firmy=" . $_GET['id_firmy'], "Přidat pobočku" => "firmy_technik.php?id=detaily_firmy&id_firmy=".$_GET['id_firmy']."&action=pridat_provozovnu");
    else
        $cesta_nav = array("Klienti" => "firmy_technik.php", "Detaily klienta (" . get_nazev_firmy($_GET['id_firmy']) . ")" => "firmy_technik.php?id=detaily_firmy&id_firmy=" . $_GET['id_firmy']);
elseif ($_GET['id'] == "upravit_firmu")
    $cesta_nav = array("Klienti" => "firmy_technik.php", "Detaily klienta (" . get_nazev_firmy($_GET['id_firmy']) . ")" => "firmy_technik.php?id=detaily_firmy&id_firmy=" . $_GET['id_firmy'], "Upravit klienta (" . get_nazev_firmy($_GET['id_firmy']) . ")" => "firmy_technik.php?id=upravit_firmu&id_firmy=" . $_GET['id_firmy']);
elseif ($_GET['id'] == "detaily_provozovny")
    $cesta_nav = array("Klienti" => "firmy_technik.php", "Detaily klienta (" . get_nazev_firmy($_GET['id_firmy']) . ")" => "firmy_technik.php?id=detaily_firmy&id_firmy=" . $_GET['id_firmy'], "Detaily pobočky (" . get_nazev_provozovny($_GET['id_provozovny'], false) . ")" => "firmy_technik.php?id=detaily_provozovny&id_firmy=" . $_GET['id_firmy'] . "&id_provozovny=" . $_GET['id_provozovny']);
elseif ($_GET['id'] == "upravit_provozovnu")
    $cesta_nav = array("Klienti" => "firmy_technik.php", "Detaily klienta (" . get_nazev_firmy($_GET['id_firmy']) . ")" => "firmy_technik.php?id=detaily_firmy&id_firmy=" . $_GET['id_firmy'], "Detaily pobočky (" . get_nazev_provozovny($_GET['id_provozovny'], false) . ")" => "firmy_technik.php?id=detaily_provozovny&id_firmy=" . $_GET['id_firmy'] . "&id_provozovny=" . $_GET['id_provozovny'], "Upravit pobočku (" . get_nazev_provozovny($_GET['id_provozovny'], false) . ")" => "firmy_technik.php?id=upravit_provozovnu&id_firmy=" . $_GET['id_firmy'] . "&id_provozovny=" . $_GET['id_provozovny']);
elseif ($_GET['id'] == "upravit_firemniho_uzivatele")
    $cesta_nav = array("Klienti" => "firmy_technik.php", "Detaily klienta (" . get_nazev_firmy($_GET['id_firmy']) . ")" => "firmy_technik.php?id=detaily_firmy&id_firmy=" . $_GET['id_firmy'], "Upravit uživatele (" . get_jmeno_uzivatele_z_id($_GET['id_uzivatele']) . ")" => "firmy_technik.php?id=upravit_firemniho_uzivatele&id_firmy=" . $_GET['id_firmy'] . "&id_uzivatele=" . $_GET['id_uzivatele']);


//logika k menu
if(login() && $_SESSION['prava_usr'] == "technik") $SESSION['menu'] = "autorizovan_technik_firmy";
else $SESSION['menu'] = "index";

$SESSION['active_menu'] = "firmy";
//KONEC logika k menu

//dalsi require
require ("./funkce/global_require_page.php");

require ("./page/page_firmy_technik.php");
?>
