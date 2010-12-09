<?php
//hlavni require
require ("./funkce/global_require_config.php");

//stav stranky
$SESSION['autorizovana'] = "1";

$SESSION['search_readonly'] = "readonly";

$SESSION['nadpis_horni_a'] = "Pracoviště";
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
                $cesta_nav = array("Pracoviště" => "pracoviste.php", "Klient (" . get_nazev_firmy($_GET['firma']) . ")" => "pracoviste.php?firma=" . $_GET['firma']);
            else
                $cesta_nav = array("Pracoviště" => "pracoviste.php", "Klient (" . get_nazev_firmy($_GET['firma']) . ")" => "pracoviste.php?firma=" . $_GET['firma'], "Pobočka (" . get_nazev_provozovny($_GET['provozovna']) . ")" => "pracoviste.php?firma=" . $_GET['firma'] . "&provozovna=" . $_GET['provozovna']);
        }
        else {
            $cesta_nav = array("Pracoviště" => "pracoviste.php", "Klient (" . get_nazev_firmy($_GET['firma']) . ")" => "pracoviste.php?firma=" . $_GET['firma']);
        }
    }
    else
        $cesta_nav = array("Pracoviště" => "pracoviste.php");
}
elseif($_GET['id'] == "detaily")
{
    $cesta_nav = array("Pracoviště" => "pracoviste.php", "Klient (" . get_nazev_firmy(get_id_firma_z_objekt("pracoviste", $_GET['id_pracoviste'])) . ")" => "pracoviste.php?firma=" . get_id_firma_z_objekt("pracoviste", $_GET['id_pracoviste']), "Pobočka (" . get_nazev_provozovny(get_id_provozovna_z_objekt("pracoviste", $_GET['id_pracoviste'])) . ")" => "pracoviste.php?firma=" . get_id_firma_z_objekt("pracoviste", $_GET['id_pracoviste']) . "&provozovna=" . get_id_provozovna_z_objekt("pracoviste", $_GET['id_pracoviste']), "Detaily pracoviště (".  get_nazev_objekt_z_id("pracoviste", $_GET['id_pracoviste']).")" => "pracoviste.php?id=detaily&id_pracoviste=".$_GET['id_pracoviste']);
}
elseif($_GET['id'] == "upravit")
{
    $cesta_nav = array("Pracoviště" => "pracoviste.php", "Klient (" . get_nazev_firmy(get_id_firma_z_objekt("pracoviste", $_GET['id_pracoviste'])) . ")" => "pracoviste.php?firma=" . get_id_firma_z_objekt("pracoviste", $_GET['id_pracoviste']), "Pobočka (" . get_nazev_provozovny(get_id_provozovna_z_objekt("pracoviste", $_GET['id_pracoviste'])) . ")" => "pracoviste.php?firma=" . get_id_firma_z_objekt("pracoviste", $_GET['id_pracoviste']) . "&provozovna=" . get_id_provozovna_z_objekt("pracoviste", $_GET['id_pracoviste']), "Detaily pracoviště (".  get_nazev_objekt_z_id("pracoviste", $_GET['id_pracoviste']).")" => "pracoviste.php?id=detaily&id_pracoviste=".$_GET['id_pracoviste'], "Upravit pracoviště (".  get_nazev_objekt_z_id("pracoviste", $_GET['id_pracoviste']).")" => "pracoviste.php?id=upravit&id_pracoviste=".$_GET['id_pracoviste']);
}

elseif($_GET['id'] == "nova")
{
    $cesta_nav = array("Pracoviště" => "pracoviste.php", "Klient (" . get_nazev_firmy($_GET['id_firma']) . ")" => "pracoviste.php?firma=" . $_GET['id_firma'], "Pobočka (" . get_nazev_provozovny($_GET['id_provozovna']) . ")" => "pracoviste.php?firma=" . $_GET['id_firma'] . "&provozovna=" . $_GET['id_provozovna'], "Nové pracoviště" => "pracoviste.php?id=nova&id_firma=" . $_GET['id_firma'] . "&id_provozovna=" .$_GET['id_provozovna']);
}

//logika k menu
if(login() && $_SESSION['prava_usr'] == "koordinator") $SESSION['menu'] = "autorizovan_koordinator_firmy";
elseif(login() && $_SESSION['prava_usr'] == "admin") $SESSION['menu'] = "autorizovan_admin_firmy";
elseif(login() && $_SESSION['prava_usr'] == "technik") $SESSION['menu'] = "autorizovan_technik_firmy";
elseif(login() && $_SESSION['prava_usr'] == "firma") $SESSION['menu'] = "firma";
else $SESSION['menu'] = "index";

$SESSION['active_menu'] = "pracoviste";
//KONEC logika k menu

//dalsi require
require ("./funkce/global_require_page.php");

require ("./page/page_pracoviste.php");
?>
