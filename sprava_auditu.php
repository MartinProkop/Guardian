<?php

//include
require("./header/header_sprava_auditu.php");

//START OBSAHU STRÁNKY
if (login() && ($_SESSION['prava_usr'] == "admin" || $_SESSION['prava_usr'] == "koordinator")) {
    if (!$_POST['firma'])
        $_POST['firma'] = $_GET['firma'];
    if (!$_POST['provozovna'] && $_POST['provozovna'] != "vybrat")
        $_POST['provozovna'] = $_GET['provozovna'];

    if ($_GET['id'] == "enter") {
        echo "<h3>Správa auditů</h3>";

        if ($_POST['typ_novy_audit'])
            echo "<body onLoad=\"show_hide('plot_short','plot_full')\">";
        if ($_GET['typ_novy_audit_zmena'])
            echo "<body onLoad=\"show_hide('plot_short','plot_full')\">";

        if ($_GET['smazat_logy'])
            log_auditu_smazat();
        if ($_GET['id'] != "filtr")
            prehled_auditu_koordinator();
        if (!$_GET['firma']

            )prehled_auditu_koordinator_dva();
    }
    elseif ($_GET['id'] == "filtr") {
        echo "<h3>Správa auditů</h3>";
        prehled_auditu_koordinator_dva();
    } elseif ($_GET['id'] == "zadat_audit") {
        echo "<h3>Zadat audit</h3>";
        zadat_audit("zadat_audit");
    } elseif ($_GET['id'] == "upravit_audit") {
        if (prava_k_auditu($_GET['upravit_audit'], $_SESSION['id_usr'])) {
            echo "<h3>Upravit audit</h3>";
            upravit_audit($_GET['upravit_audit']);
        } else {
            echo "<h4>Nemáte právo pracovat se zvoleným auditem!</h4><p>Přejděte zpět k volbě auditu.</p>";
        }
    } elseif ($_GET['id'] == "detaily_auditu") {
        if (prava_k_auditu($_GET['audit'], $_SESSION['id_usr'])) {
            echo "<h3>Detaily auditu</h3>";
            if ($_GET['prijmout_audit'])
                prijmout_audit($_GET['prijmout_audit']);
            if ($_GET['neprijmout_audit'])
                neprijmout_audit($_GET['neprijmout_audit']);
            detaily_auditu($_GET['audit'], "koordinator");
        } else {
            echo "<h4>Nemáte právo pracovat se zvoleným auditem!</h4><p>Přejděte zpět k volbě auditu.</p>";
        }
    }
} elseif (login() && $_SESSION['prava_usr'] == "technik") {
    if (!$_POST['firma'])
        $_POST['firma'] = $_GET['firma'];
    if (!$_POST['provozovna'] && $_POST['provozovna'] != "vybrat")
        $_POST['provozovna'] = $_GET['provozovna'];

    if ($_GET['id'] == "enter") {

        echo "<h3>Přehled auditů</h3>";
        if ($_GET['id'] != "filtr")
            prehled_auditu_technik();
        if (!$_GET['firma']

            )prehled_auditu_technik_dva();
    }
    elseif ($_GET['id'] == "filtr") {
        echo "<h3>Správa auditů</h3>";
        prehled_auditu_technik_dva();
    } elseif ($_GET['id'] == "komentovat_audit") {
        if (prava_k_auditu($_GET['komentovat_audit'], $_SESSION['id_usr'])) {
            echo "<h3>Komentovat audit</h3>";
            komentovat_audit($_GET['komentovat_audit']);
        } else {
            echo "<h4>Nemáte právo pracovat se zvoleným auditem!</h4><p>Přejděte zpět k volbě auditu.</p>";
        }
    } elseif ($_GET['id'] == "detaily_auditu") {
        if (prava_k_auditu($_GET['audit'], $_SESSION['id_usr'])) {
            echo "<h3>Detaily auditu</h3>";
            if ($_GET['prijmout_audit'])
                prijmout_audit($_GET['prijmout_audit']);
            if ($_GET['neprijmout_audit'])
                neprijmout_audit($_GET['neprijmout_audit']);
            detaily_auditu($_GET['audit'], "technik");
        } else {
            echo "<h4>Nemáte právo pracovat se zvoleným auditem!</h4><p>Přejděte zpět k volbě auditu.</p>";
        }
    }
} elseif (login() && $_SESSION['prava_usr'] == "firma") {
    if (!$_POST['firma'])
        $_POST['firma'] = $_GET['firma'];
    if (!$_POST['provozovna'] && $_POST['provozovna'] != "vybrat")
        $_POST['provozovna'] = $_GET['provozovna'];

    $result = dibi::query('SELECT * FROM [prevent_firmy_uzivatele_prava] WHERE [id_uzivatel] = %i', $_SESSION['id_usr']);
    $row = $result->fetch();
    if ($row['prava'] == "admin") {
        if ($_GET['id'] == "prehled_auditu") {
            echo "<h3>Přehled auditů</h3>";
            prehled_auditu_firma_admin();
        } elseif ($_GET['id'] == "upravit_audit_firma") {
            if (prava_k_auditu($_GET['upravit_audit_firma'], $_SESSION['id_usr'])) {
                echo "<h3>Upravit audit</h3>";
                upravit_audit_firma($_GET['upravit_audit_firma']);
            } else {
                echo "<h4>Nemáte právo pracovat se zvoleným auditem!</h4><p>Přejděte zpět k volbě auditu.</p>";
            }
        } elseif ($_GET['id'] == "detaily_auditu") {
            if (prava_k_auditu($_GET['audit'], $_SESSION['id_usr'])) {
                echo "<h3>Detaily auditu</h3>";
                detaily_auditu($_GET['audit'], "firma_admin");
            } else {
                echo "<h4>Nemáte právo pracovat se zvoleným auditem!</h4><p>Přejděte zpět k volbě auditu.</p>";
            }
        }
    } else {
        if ($_GET['id'] == "prehled_auditu") {
            echo "<h3>Přehled auditů</h3>";
            prehled_auditu_firma_normal($_GET['komentovat_audit']);
        } elseif ($_GET['id'] == "komentovat_audit_firma") {
            if (prava_k_auditu($_GET['komentovat_audit_firma'], $_SESSION['id_usr'])) {
                echo "<h3>Komentovat audit</h3>";
                komentovat_audit_firma($_GET['komentovat_audit_firma']);
            } else {
                echo "<h4>Nemáte právo pracovat se zvoleným auditem!</h4><p>Přejděte zpět k volbě auditu.</p>";
            }
        } elseif ($_GET['id'] == "detaily_auditu") {
            if (prava_k_auditu($_GET['audit'], $_SESSION['id_usr'])) {
                echo "<h3>Detaily auditu</h3>";
                detaily_auditu($_GET['audit'], "firma_normal");
            } else {
                echo "<h4>Nemáte právo pracovat se zvoleným auditem!</h4><p>Přejděte zpět k volbě auditu.</p>";
            }
        }
    }
}

//KONEC OBSAHU STRÁNKY
patka();
?>