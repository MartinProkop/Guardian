<?php

//include
require("./header/header_nastaveni_auditu.php");

//START OBSAHU STRÁNKY
if (login() && ($_SESSION['prava_usr'] == "koordinator" || $_SESSION['prava_usr'] == "admin")) {
    if (!$_POST['typ'])
        $_POST['typ'] = $_GET['typ'];
    if (!$_POST['verze'])
        $_POST['verze'] = $_GET['verze'];
    if ($_GET['id'] == "enter") {
        echo "<h3>Nastavení auditů</h3>";
        vyber_oblasti_nastaveni_auditu();
    } elseif ($_GET['id'] == "pridat") {
        echo "<h3>Nastavení auditů - přidat verzi</h3>";
        pridat_verzi();
    } elseif ($_GET['id'] == "nahled") {
        echo "<h3>Nastavení auditů - náhled (" . get_nazev_checklist_z_verze($_GET['verze']) . ")</h3>";
        checklist_nahled($_GET['verze']);
    } elseif ($_GET['id'] == "kategorie") {
        echo "<h3>Nastavení auditů - okruhy otázek (" . get_nazev_checklist_z_verze($_GET['verze']) . ")</h3>";
        if ($_POST['text'] && !$_GET['upravit'])
            pridat_kategorii();
        if ($_GET['smazat_link'])
            smazat_kategorii();
        if ($_GET['nahoru'])
            nahoru_kategorii();
        if ($_GET['dolu'])
            dolu_kategorii();
        if ($_GET['upravit']) {
            upravit_kategorii_dve($_GET['upravit']);
        }

        nastaveni_kategorii();
        echo "<h4>Dbejte na to, že jakokáliv změna ve schématu auditů zasáhne všechny prováděné i proběhlé audity!</h4>";
    } elseif ($_GET['id'] == "kategorie_upravit") {
        echo "<h3>Nastavení auditů - okruhy otázek (" . get_nazev_checklist_z_verze($_GET['verze']) . ")</h3>";
        upravit_kategorii($_GET['upravit']);
        echo "<h4>Dbejte na to, že jakokáliv změna ve schématu auditů zasáhne všechny prováděné i proběhlé audity!</h4>";
    }
//    elseif ($_GET['id'] == "otazky_vyber") {
//        echo "<h3>Nastavení auditů - otázky (" . get_nazev_checklist_z_verze($_GET['verze']) . ")</h3>";
//        vyber_kategorie_otazek();
//    }
    elseif ($_GET['id'] == "otazky") {
        $resultx = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [id] = %i', $_GET['id_kategorie']);
        $rowx = $resultx->fetch();
        echo "<h3>Nastavení auditů - otázky (" . get_nazev_checklist_z_verze($_GET['verze']) . " - " . $rowx['cislo'] . ". " . $rowx['kat_jmeno'] . ")</h3>";

        if ($_POST['text'] && !$_GET['upravit'])
            pridat_otazku();
        if ($_GET['smazat_link'])
            smazat_otazku();
        if ($_GET['nahoru'])
            nahoru_otazku();
        if ($_GET['dolu'])
            dolu_otazku();
        if ($_GET['upravit']) {
            upravit_otazku_dve($_GET['upravit']);
        }

        nastaveni_otazku();
        echo "<h4>Dbejte na to, že jakokáliv změna ve schématu auditů zasáhne všechny prováděné i proběhlé audity!</h4>";
    } elseif ($_GET['id'] == "otazky_upravit") {
        echo "<h3>Nastavení auditů - otázky (" . get_nazev_checklist_z_verze($_GET['verze']) . ")</h3>";
        upravit_otazku($_GET['upravit']);
        echo "<h4>Dbejte na to, že jakokáliv změna ve schématu auditů zasáhne všechny prováděné i proběhlé audity!</h4>";
    }
}

//KONEC OBSAHU STRÁNKY
patka();
?>