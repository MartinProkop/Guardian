<?php
//hlavni require
require ("./funkce/global_require_config.php");

//stav stranky
$SESSION['autorizovana'] = "1";

$SESSION['search_readonly'] = "readonly";

$SESSION['nadpis_horni_a'] = "Nastavení auditů";
$SESSION['nadpis_horni_b'] = $_SERVER['REQUEST_URI'];
$SESSION['specmenu_a'] = "Nápověda";
$SESSION['specmenu_b'] = "faq.php?id=o_systemu";

if ($_GET['id'] == "enter") {
    if (!$_POST['typ'])
        $_POST['typ'] = $_GET['typ'];
    if (!$_POST['verze'])
        $_POST['verze'] = $_GET['verze'];

    if ($_POST['typ'] && !$_POST['verze'])
        $cesta_nav = array("Nastavení auditů" => "nastaveni_auditu.php?id=enter", "Typ (" . $_POST['typ'] . ")" => "nastaveni_auditu.php?id=enter&typ=" . $_POST['typ']);
    elseif ($_POST['verze'])
        $cesta_nav = array("Nastavení auditů" => "nastaveni_auditu.php?id=enter", "Typ (" . get_typ_checklist_z_verze ($_POST['verze']) . ")" => "nastaveni_auditu.php?id=enter&typ=" . get_typ_checklist_z_verze ($_POST['verze']), "Verze (" . get_nazev_checklist_z_verze ($_POST['verze']) . ")" => "nastaveni_auditu.php?id=enter&typ=" . $_POST['typ'] . "&verze=" . $_POST['verze']);
    else
        $cesta_nav = array("Nastavení auditů" => "nastaveni_auditu.php?id=enter");
}
elseif($_GET['id'] == "pridat")
{
    $cesta_nav = array("Nastavení auditů" => "nastaveni_auditu.php?id=enter", "Typ (" . $_GET['typ'] . ")" => "nastaveni_auditu.php?id=enter&typ=" . $_GET['typ'],  "Přidat verzi" => "nastaveni_auditu.php?id=pridat&typ=".$_GET['typ']);
}
elseif($_GET['id'] == "nahled")
{
        $cesta_nav = array("Nastavení auditů" => "nastaveni_auditu.php?id=enter", "Typ (" . get_typ_checklist_z_verze ($_GET['verze']) . ")" => "nastaveni_auditu.php?id=enter&typ=" . get_typ_checklist_z_verze ($_GET['verze']), "Verze (" . get_nazev_checklist_z_verze ($_GET['verze']) . ")" => "nastaveni_auditu.php?id=enter&typ=" . $_GET['typ'] . "&verze=" . $_GET['verze'], "Náhled (".  get_nazev_checklist_z_verze($_GET['verze']).")"=> "nastaveni_auditu.php?id=nahled&typ=".$_GET['typ']."&verze=".$_GET['verze']);
}
elseif($_GET['id'] == "kategorie")
{
        $cesta_nav = array("Nastavení auditů" => "nastaveni_auditu.php?id=enter", "Typ (" . get_typ_checklist_z_verze ($_GET['verze']) . ")" => "nastaveni_auditu.php?id=enter&typ=" . get_typ_checklist_z_verze ($_GET['verze']), "Verze (" . get_nazev_checklist_z_verze ($_GET['verze']) . ")" => "nastaveni_auditu.php?id=enter&typ=" . $_GET['typ'] . "&verze=" . $_GET['verze'], "Okruhy otázek (".  get_nazev_checklist_z_verze($_GET['verze']).")"=> "nastaveni_auditu.php?id=kategorie&typ=".$_GET['typ']."&verze=".$_GET['verze']);
}
elseif($_GET['id'] == "kategorie_upravit")
{
        $cesta_nav = array("Nastavení auditů" => "nastaveni_auditu.php?id=enter", "Typ (" . get_typ_checklist_z_verze ($_GET['verze']) . ")" => "nastaveni_auditu.php?id=enter&typ=" . get_typ_checklist_z_verze ($_GET['verze']), "Verze (" . get_nazev_checklist_z_verze ($_GET['verze']) . ")" => "nastaveni_auditu.php?id=enter&typ=" . $_GET['typ'] . "&verze=" . $_GET['verze'], "Okruhy otázek (".  get_nazev_checklist_z_verze($_GET['verze']).")"=> "nastaveni_auditu.php?id=kategorie&typ=".$_GET['typ']."&verze=".$_GET['verze'], "Upravit okruh (".  get_nazev_okruh_z_id($_GET['upravit']).")" => "nastaveni_auditu.php?id=kategorie_upravit&typ=".$_GET['typ']."&verze=".$_GET['verze']."&upravit=".$_GET['upravit']);
}
elseif($_GET['id'] == "otazky")
{
        $cesta_nav = array("Nastavení auditů" => "nastaveni_auditu.php?id=enter", "Typ (" . get_typ_checklist_z_verze ($_GET['verze']) . ")" => "nastaveni_auditu.php?id=enter&typ=" . get_typ_checklist_z_verze ($_GET['verze']), "Verze (" . get_nazev_checklist_z_verze ($_GET['verze']) . ")" => "nastaveni_auditu.php?id=enter&typ=" . $_GET['typ'] . "&verze=" . $_GET['verze'], "Okruhy otázek (".  get_nazev_checklist_z_verze($_GET['verze']).")"=> "nastaveni_auditu.php?id=kategorie&typ=".$_GET['typ']."&verze=".$_GET['verze'], "Otázky okruhu (".  get_nazev_okruh_z_id($_GET['id_kategorie']).")" => "nastaveni_auditu.php?id=otazky&typ=".$_GET['typ']."&verze=".$_GET['verze']."&id_kategorie=".$_GET['id_kategorie']);
}
elseif($_GET['id'] == "otazky_upravit")
{
        $cesta_nav = array("Nastavení auditů" => "nastaveni_auditu.php?id=enter", "Typ (" . get_typ_checklist_z_verze ($_GET['verze']) . ")" => "nastaveni_auditu.php?id=enter&typ=" . get_typ_checklist_z_verze ($_GET['verze']), "Verze (" . get_nazev_checklist_z_verze ($_GET['verze']) . ")" => "nastaveni_auditu.php?id=enter&typ=" . $_GET['typ'] . "&verze=" . $_GET['verze'], "Okruhy otázek (".  get_nazev_checklist_z_verze($_GET['verze']).")"=> "nastaveni_auditu.php?id=kategorie&typ=".$_GET['typ']."&verze=".$_GET['verze'], "Otázky okruhu (".  get_nazev_okruh_z_id($_GET['id_kategorie']).")" => "nastaveni_auditu.php?id=otazky&typ=".$_GET['typ']."&verze=".$_GET['verze']."&id_kategorie=".$_GET['id_kategorie'], "Upravit otázku (".  get_nazev_otazka_z_id($_GET['upravit']).")" => "nastaveni_auditu.php?id=otazky_upravit&typ=".$_GET['typ']."&verze=".$_GET['verze']."&id_kategorie=".$_GET['id_kategorie']."&upravit=".$_GET['upravit']);
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

$SESSION['active_menu'] = "nastaveni_auditu";
//KONEC logika k menu
//dalsi require
require ("./funkce/global_require_page.php");

require ("./page/page_nastaveni_auditu.php");
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