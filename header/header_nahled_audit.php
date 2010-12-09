<?php
//hlavni require
require ("./funkce/global_require_config.php");

//stav stranky
$SESSION['autorizovana'] = "1";

$SESSION['search_readonly'] = "readonly";

$SESSION['nadpis_horni_a'] = "Dokončit audit";
$SESSION['nadpis_horni_b'] = $_SERVER['REQUEST_URI'];
$SESSION['specmenu_a'] = "Nápověda";
$SESSION['specmenu_b'] = "faq.php?id=o_systemu";

if ($_GET['id'] == "vybrat_oblast") {
    $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Klient (" . get_nazev_firmy(get_id_firma_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']), "Pobočka (" . get_nazev_provozovny(get_id_provozovna_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']) . "&provozovna=" . get_id_provozovna_z_audit($_GET['id_audit']), "Náhled auditu (#ID " . $_GET['id_audit'] . ")" => "nahled_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit']);
} elseif ($_GET['id'] == "udaje") {
    $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Klient (" . get_nazev_firmy(get_id_firma_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']), "Pobočka (" . get_nazev_provozovny(get_id_provozovna_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']) . "&provozovna=" . get_id_provozovna_z_audit($_GET['id_audit']), "Náhled auditu (#ID " . $_GET['id_audit'] . ")" => "nahled_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'], "Údaje" => "nahled_audit.php?id=udaje&id_audit=" . $_GET['id_audit']);
} elseif ($_GET['id'] == "checklist") {
    $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Klient (" . get_nazev_firmy(get_id_firma_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']), "Pobočka (" . get_nazev_provozovny(get_id_provozovna_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']) . "&provozovna=" . get_id_provozovna_z_audit($_GET['id_audit']), "Náhled auditu (#ID " . $_GET['id_audit'] . ")" => "nahled_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'], "Checklist" => "nahled_audit.php?id=checklist&id_audit=" . $_GET['id_audit']);
} elseif ($_GET['id'] == "checklist_vyber") {
    $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Klient (" . get_nazev_firmy(get_id_firma_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']), "Pobočka (" . get_nazev_provozovny(get_id_provozovna_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']) . "&provozovna=" . get_id_provozovna_z_audit($_GET['id_audit']), "Náhled auditu (#ID " . $_GET['id_audit'] . ")" => "nahled_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'], "Checklist" => "nahled_audit.php?id=checklist&id_audit=" . $_GET['id_audit'], "Okruh otázek (" . get_nazev_okruh_z_id($_GET['selection']) . ")" => "nahled_audit.php?id=checklist_vyber&id_audit=" . $_GET['id_audit'] . "&selection=" . $_GET['selection']);
} elseif ($_GET['id'] == "pracoviste") {
    $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Klient (" . get_nazev_firmy(get_id_firma_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']), "Pobočka (" . get_nazev_provozovny(get_id_provozovna_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']) . "&provozovna=" . get_id_provozovna_z_audit($_GET['id_audit']), "Náhled auditu (#ID " . $_GET['id_audit'] . ")" => "nahled_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'], "Pracoviště" => "nahled_audit.php?id=pracoviste&id_audit=" . $_GET['id_audit']);
} elseif ($_GET['id'] == "pracoviste_proved") {
    $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Klient (" . get_nazev_firmy(get_id_firma_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']), "Pobočka (" . get_nazev_provozovny(get_id_provozovna_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']) . "&provozovna=" . get_id_provozovna_z_audit($_GET['id_audit']), "Náhled auditu (#ID " . $_GET['id_audit'] . ")" => "nahled_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'], "Pracoviště" => "nahled_audit.php?id=pracoviste&id_audit=" . $_GET['id_audit'], "Kontrola pracoviště (" . get_jmeno_objekt("pracoviste", $_GET['id_pracoviste']) . ")" => "nahled_audit.php?id=pracoviste_proved&id_audit=" . $_GET['id_audit'] . "&id_pracoviste=" . $_GET['id_pracoviste']);
} elseif ($_GET['id'] == "pridat_pracoviste") {
    $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Klient (" . get_nazev_firmy(get_id_firma_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']), "Pobočka (" . get_nazev_provozovny(get_id_provozovna_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']) . "&provozovna=" . get_id_provozovna_z_audit($_GET['id_audit']), "Náhled auditu (#ID " . $_GET['id_audit'] . ")" => "nahled_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'], "Pracoviště" => "nahled_audit.php?id=pracoviste&id_audit=" . $_GET['id_audit'], "Přidat pracoviště" => "nahled_audit.php?id=pridat_pracoviste&id_audit=" . $_GET['id_audit']);
}elseif ($_GET['id'] == "neshody") {
    $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Klient (" . get_nazev_firmy(get_id_firma_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']), "Pobočka (" . get_nazev_provozovny(get_id_provozovna_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']) . "&provozovna=" . get_id_provozovna_z_audit($_GET['id_audit']), "Náhled auditu (#ID " . $_GET['id_audit'] . ")" => "nahled_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'], "Neshody" => "nahled_audit.php?id=neshody&id_audit=" . $_GET['id_audit']);
}elseif ($_GET['id'] == "neshoda") {
    $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Klient (" . get_nazev_firmy(get_id_firma_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']), "Pobočka (" . get_nazev_provozovny(get_id_provozovna_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']) . "&provozovna=" . get_id_provozovna_z_audit($_GET['id_audit']), "Náhled auditu (#ID " . $_GET['id_audit'] . ")" => "nahled_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'], "Neshody" => "nahled_audit.php?id=neshody&id_audit=" . $_GET['id_audit'], "Provést neshodu" => "nahled_audit.php?id=neshoda&id_audit=" . $_GET['id_audit']."&neshoda=".$_GET['neshoda']);
}elseif ($_GET['id'] == "protokoly") {
    $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Klient (" . get_nazev_firmy(get_id_firma_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']), "Pobočka (" . get_nazev_provozovny(get_id_provozovna_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']) . "&provozovna=" . get_id_provozovna_z_audit($_GET['id_audit']), "Náhled auditu (#ID " . $_GET['id_audit'] . ")" => "nahled_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'], "Komentář" => "nahled_audit.php?id=protokoly&id_audit=" . $_GET['id_audit']);
}

//logika k menu
if(login() && $_SESSION['prava_usr'] == "admin") $SESSION['menu'] = "autorizovan_admin_audit";
elseif(login() && $_SESSION['prava_usr'] == "koordinator") $SESSION['menu'] = "autorizovan_koordinator_audit";
elseif(login() && $_SESSION['prava_usr'] == "technik") $SESSION['menu'] = "autorizovan_technik_audit";
elseif(login() && $_SESSION['prava_usr'] == "firma") $SESSION['menu'] = "autorizovan_firma_audit";
else $SESSION['menu'] = "index";

$SESSION['active_menu'] = "sprava_auditu";
//KONEC logika k menu

//dalsi require
require ("./funkce/global_require_page.php");

require ("./page/page_nahled_audit.php");
?>
