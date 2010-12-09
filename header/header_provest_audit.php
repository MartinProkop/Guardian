<?php
//hlavni require
require ("./funkce/global_require_config.php");

//stav stranky
$SESSION['autorizovana'] = "1";

$SESSION['search_readonly'] = "readonly";

$SESSION['nadpis_horni_a'] = "Provést audit";
$SESSION['nadpis_horni_b'] = $_SERVER['REQUEST_URI'];
$SESSION['specmenu_a'] = "Nápověda";
$SESSION['specmenu_b'] = "faq.php?id=o_systemu";

if ($_GET['id'] == "vybrat_oblast") {
    $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Klient (" . get_nazev_firmy(get_id_firma_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']), "Pobočka (" . get_nazev_provozovny(get_id_provozovna_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']) . "&provozovna=" . get_id_provozovna_z_audit($_GET['id_audit']), "Provést audit (#ID " . $_GET['id_audit'] . ")" => "provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit']);
} elseif ($_GET['id'] == "udaje") {
    $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Klient (" . get_nazev_firmy(get_id_firma_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']), "Pobočka (" . get_nazev_provozovny(get_id_provozovna_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']) . "&provozovna=" . get_id_provozovna_z_audit($_GET['id_audit']), "Provést audit (#ID " . $_GET['id_audit'] . ")" => "provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'], "Údaje" => "provest_audit.php?id=udaje&id_audit=" . $_GET['id_audit']);
} elseif ($_GET['id'] == "checklist") {
    $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Klient (" . get_nazev_firmy(get_id_firma_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']), "Pobočka (" . get_nazev_provozovny(get_id_provozovna_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']) . "&provozovna=" . get_id_provozovna_z_audit($_GET['id_audit']), "Provést audit (#ID " . $_GET['id_audit'] . ")" => "provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'], "Checklist" => "provest_audit.php?id=checklist&id_audit=" . $_GET['id_audit']);
} elseif ($_GET['id'] == "checklist_vyber") {
    $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Klient (" . get_nazev_firmy(get_id_firma_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']), "Pobočka (" . get_nazev_provozovny(get_id_provozovna_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']) . "&provozovna=" . get_id_provozovna_z_audit($_GET['id_audit']), "Provést audit (#ID " . $_GET['id_audit'] . ")" => "provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'], "Checklist" => "provest_audit.php?id=checklist&id_audit=" . $_GET['id_audit'], "Okruh otázek (" . get_nazev_okruh_z_id($_GET['selection']) . ")" => "provest_audit.php?id=checklist_vyber&id_audit=" . $_GET['id_audit'] . "&selection=" . $_GET['selection']);
} elseif ($_GET['id'] == "pracoviste") {
    $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Klient (" . get_nazev_firmy(get_id_firma_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']), "Pobočka (" . get_nazev_provozovny(get_id_provozovna_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']) . "&provozovna=" . get_id_provozovna_z_audit($_GET['id_audit']), "Provést audit (#ID " . $_GET['id_audit'] . ")" => "provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'], "Pracoviště" => "provest_audit.php?id=pracoviste&id_audit=" . $_GET['id_audit']);
} elseif ($_GET['id'] == "pracoviste_proved") {
    $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Klient (" . get_nazev_firmy(get_id_firma_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']), "Pobočka (" . get_nazev_provozovny(get_id_provozovna_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']) . "&provozovna=" . get_id_provozovna_z_audit($_GET['id_audit']), "Provést audit (#ID " . $_GET['id_audit'] . ")" => "provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'], "Pracoviště" => "provest_audit.php?id=pracoviste&id_audit=" . $_GET['id_audit'], "Kontrola pracoviště (" . get_jmeno_objekt("pracoviste", $_GET['id_pracoviste']) . ")" => "provest_audit.php?id=pracoviste_proved&id_audit=" . $_GET['id_audit'] . "&id_pracoviste=" . $_GET['id_pracoviste']);
} elseif ($_GET['id'] == "pridat_pracoviste") {
    $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Klient (" . get_nazev_firmy(get_id_firma_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']), "Pobočka (" . get_nazev_provozovny(get_id_provozovna_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']) . "&provozovna=" . get_id_provozovna_z_audit($_GET['id_audit']), "Provést audit (#ID " . $_GET['id_audit'] . ")" => "provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'], "Pracoviště" => "provest_audit.php?id=pracoviste&id_audit=" . $_GET['id_audit'], "Přidat pracoviště" => "provest_audit.php?id=pridat_pracoviste&id_audit=" . $_GET['id_audit']);
}elseif ($_GET['id'] == "neshody") {
    $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Klient (" . get_nazev_firmy(get_id_firma_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']), "Pobočka (" . get_nazev_provozovny(get_id_provozovna_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']) . "&provozovna=" . get_id_provozovna_z_audit($_GET['id_audit']), "Provést audit (#ID " . $_GET['id_audit'] . ")" => "provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'], "Neshody" => "provest_audit.php?id=neshody&id_audit=" . $_GET['id_audit']);
}elseif ($_GET['id'] == "neshoda") {
    $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Klient (" . get_nazev_firmy(get_id_firma_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']), "Pobočka (" . get_nazev_provozovny(get_id_provozovna_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']) . "&provozovna=" . get_id_provozovna_z_audit($_GET['id_audit']), "Provést audit (#ID " . $_GET['id_audit'] . ")" => "provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'], "Neshody" => "provest_audit.php?id=neshody&id_audit=" . $_GET['id_audit'], "Provést neshodu" => "provest_audit.php?id=neshoda&id_audit=" . $_GET['id_audit']."&neshoda=".$_GET['neshoda']);
}elseif ($_GET['id'] == "protokoly") {
    $cesta_nav = array("Správa auditů" => "sprava_auditu.php?id=enter", "Klient (" . get_nazev_firmy(get_id_firma_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']), "Pobočka (" . get_nazev_provozovny(get_id_provozovna_z_audit($_GET['id_audit'])) . ")" => "sprava_auditu.php?id=enter&firma=" . get_id_firma_z_audit($_GET['id_audit']) . "&provozovna=" . get_id_provozovna_z_audit($_GET['id_audit']), "Provést audit (#ID " . $_GET['id_audit'] . ")" => "provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'], "Komentář" => "provest_audit.php?id=protokoly&id_audit=" . $_GET['id_audit']);
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

$SESSION['active_menu'] = "provest_audit";
//KONEC logika k menu
//dalsi require
require ("./funkce/global_require_page.php");

require ("./page/page_provest_audit.php");
?>
<script language="JavaScript" type="text/javascript">
    <!--
    function checkni() {
    var F=document.forms['formvyber'];
    var i;

    for(i=0;i<F.elements.length;i++) {
    var el=F.elements[i];

    if(el.type=="checkbox") el.checked=true;

    }
    }

    function uncheckni() {
    var F=document.forms['formvyber'];
    var i;

    for(i=0;i<F.elements.length;i++) {
    var el=F.elements[i];

    if(el.type=="checkbox") el.checked=false;

    }
    }
    //-->

</script>

<SCRIPT language=JavaScript1.1>
    <!--
    function check_nove_pracoviste(formular) {
    if (formular.jmeno.value=="") {
    alert("Vyplň prosím jméno pracoviště.");
    formular.jmeno.focus();
    return false;
    }
    if (formular.popis.value=="") {
    alert("Vyplň prosím popis pracoviště.");
    formular.popis.focus();
    return false;
    }
    if (formular.pocet_zamestnancu.value=="") {
    alert("Vyplň prosím počet zaměstnanců.");
    formular.pocet_zamestnancu.focus();
    return false;
    }
    if (formular.chemicke_latky.value=="") {
    alert("Vyplň prosím chemické látky.");
    formular.chemicke_latky.focus();
    return false;
    }
    if (formular.nebezpecne_chemicke_latky.value=="") {
    alert("Vyplň prosím nebezpečné chemické látky.");
    formular.nebezpecne_chemicke_latky.focus();
    return false;
    }
    if ((formular.dopravni_prostredky_select.value=="jine" || formular.dopravni_prostredky_select.value=="") && formular.dopravni_prostredky.value=="") {
    alert("Vyplň prosím jiné dopravní prostředky.");
    formular.dopravni_prostredky.focus();
    return false;
    }
    if (!formular.q_klimatizovano[0].checked && !formular.q_klimatizovano[1].checked)
    {
    window.alert("Nevyplnil jsi všechny otázky!");
    formular.q_klimatizovano_ano.focus();
    return false;
    }
    if ((formular.vytapeni_select.value=="jine" || formular.vytapeni_select.value=="") && formular.vytapeni.value=="") {
    alert("Vyplň prosím jiné vytápění.");
    formular.vytapeni.focus();
    return false;
    }
    if (formular.odsavani.value=="") {
    alert("Vyplň prosím odsávání.");
    formular.odsavani.focus();
    return false;
    }
    if (formular.osvetleni.value=="") {
    alert("Vyplň prosím osvětlení.");
    formular.osvetleni.focus();
    return false;
    }
    if (!formular.q_osvetleni_dostatecne[0].checked && !formular.q_osvetleni_dostatecne[1].checked)
    {
    window.alert("Nevyplnil jsi všechny otázky!");
    formular.q_osvetleni_dostatecne_ano.focus();
    return false;
    }

    return true;
    }
    // -->
</SCRIPT>
