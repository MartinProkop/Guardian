<?php

//hlavni require
require ("./funkce/global_require_config.php");

//stav stranky
$SESSION['autorizovana'] = "1";

$SESSION['search_readonly'] = "readonly";

$SESSION['nadpis_horni_a'] = "Audity";
$SESSION['nadpis_horni_b'] = $_SERVER['REQUEST_URI'];
$SESSION['specmenu_a'] = "Nápověda";
$SESSION['specmenu_b'] = "faq.php?id=o_systemu";

if ($_GET['id'] == "enter") {
    if (!$_GET['firma'])
        $_GET['firma'] = $_POST['firma'];
    if (!$_GET['provozovna'] || $_GET['provozovna'] == "vybrat")
        $_GET['provozovna'] = $_POST['provozovna'];

    if ($_GET['firma'] && ($_GET['provozovna'] == "vybrat" || !$_GET['provozovna']))
        $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Klient (" . get_nazev_firmy($_GET['firma']) . ")" => "sprava_auditu.php?id=enter&firma=" . $_GET['firma']);
    elseif ($_GET['provozovna'] != "vybrat" && $_GET['provozovna'])
        $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Klient (" . get_nazev_firmy($_GET['firma']) . ")" => "sprava_auditu.php?id=enter&firma=" . $_GET['firma'], "Pobočka (" . get_nazev_provozovny($_GET['provozovna']) . ")" => "sprava_auditu.php?id=enter&firma=" . $_GET['firma'] . "&provozovna=" . $_GET['provozovna']);
    else
        $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter");
}
elseif ($_GET['id'] == "filtr") {
    if (!$_GET['filtr'])
        $_GET['filtr'] = $_POST['filtr'];
    if ($_GET['filtr'] == "nezahajene_technik")
        $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Nezahájené technikem" => "sprava_auditu.php?id=filtr&filtr=" . $_GET['filtr']);
    elseif ($_GET['filtr'] == "nedokoncene_technik")
        $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Nedokončené technikem" => "sprava_auditu.php?id=filtr&filtr=" . $_GET['filtr']);
    elseif ($_GET['filtr'] == "dokoncene_technik")
        $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Předané k připomínkování" => "sprava_auditu.php?id=filtr&filtr=" . $_GET['filtr']);
    elseif ($_GET['filtr'] == "nedokoncene_firma")
        $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Nedokončené klientem" => "sprava_auditu.php?id=filtr&filtr=" . $_GET['filtr']);
    elseif ($_GET['filtr'] == "potvrzene_firma") {
        $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Potvrzené klientem" => "sprava_auditu.php?id=filtr&filtr=" . $_GET['filtr']);
    } elseif ($_GET['filtr'] == "zamitle_firma")
        $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Zamítlé klientem" => "sprava_auditu.php?id=filtr&filtr=" . $_GET['filtr']);
    elseif ($_GET['filtr'] == "dokoncene")
        $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Dokončené" => "sprava_auditu.php?id=filtr&filtr=" . $_GET['filtr']);
}
elseif ($_GET['id'] == "upravit_audit") {
     $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Klient (" . get_nazev_firmy($_GET['firma']) . ")" => "sprava_auditu.php?id=enter&firma=" . $_GET['firma'], "Pobočka (" . get_nazev_provozovny($_GET['provozovna']) . ")" => "sprava_auditu.php?id=enter&firma=" . $_GET['firma'] . "&provozovna=" . $_GET['provozovna'], "Detaily auditu (#ID ".$_GET['upravit_audit'].")" => "sprava_auditu.php?id=detaily_auditu&firma=".$_GET['firma']."&provozovna=".$_GET['provozovna']."&audit=".$_GET['upravit_audit'], "Upravit audit" => "sprava_auditu.php?id=upravit_audit&firma=".$_GET['firma']."&provozovna=".$_GET['provozovna']."&upravit_audit=".$_GET['upravit_audit']);
}
elseif($_GET['id'] == "detaily_auditu")
{
         $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Klient (" . get_nazev_firmy($_GET['firma']) . ")" => "sprava_auditu.php?id=enter&firma=" . $_GET['firma'], "Pobočka (" . get_nazev_provozovny($_GET['provozovna']) . ")" => "sprava_auditu.php?id=enter&firma=" . $_GET['firma'] . "&provozovna=" . $_GET['provozovna'], "Detaily auditu (#ID ".$_GET['audit'].")" => "sprava_auditu.php?id=detaily_auditu&firma=".$_GET['firma']."&provozovna=".$_GET['provozovna']."&audit=".$_GET['audit']);
}
elseif($_GET['id'] == "zadat_audit")
{
         $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Zadat audit" => "sprava_auditu.php?id=zadat_audit");
}
elseif ($_GET['id'] == "komentovat_audit") {
     $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Klient (" . get_nazev_firmy($_GET['firma']) . ")" => "sprava_auditu.php?id=enter&firma=" . $_GET['firma'], "Pobočka (" . get_nazev_provozovny($_GET['provozovna']) . ")" => "sprava_auditu.php?id=enter&firma=" . $_GET['firma'] . "&provozovna=" . $_GET['provozovna'], "Detaily auditu (#ID ".$_GET['komentovat_audit'].")" => "sprava_auditu.php?id=detaily_auditu&firma=".$_GET['firma']."&provozovna=".$_GET['provozovna']."&audit=".$_GET['komentovat_audit'], "Komentovat audit" => "sprava_auditu.php?id=komentovat_audit&firma=".$_GET['firma']."&provozovna=".$_GET['provozovna']."&komentovat_audit=".$_GET['komentovat_audit']);
}

//logika k menu
if (login() && $_SESSION['prava_usr'] == "admin")
    $SESSION['menu'] = "autorizovan_admin_audit";
elseif (login() && $_SESSION['prava_usr'] == "koordinator")
    $SESSION['menu'] = "autorizovan_koordinator_audit";
elseif (login() && $_SESSION['prava_usr'] == "technik")
    $SESSION['menu'] = "autorizovan_technik_audit";
elseif (login() && $_SESSION['prava_usr'] == "firma")
    $SESSION['menu'] = "autorizovan_firma_audit";
else
    $SESSION['menu'] = "index";

if ($_GET['id'] == "zadat_audit")
    $SESSION['active_menu'] = "zadat_audit";
elseif ($_GET['filtr'] == "nezahajene_technikem")
    $SESSION['active_menu'] = "nezahajene_technikem";
else
    $SESSION['active_menu'] = "sprava_auditu";
//KONEC logika k menu
//dalsi require
require ("./funkce/global_require_page.php");

require ("./page/page_sprava_auditu.php");
?>