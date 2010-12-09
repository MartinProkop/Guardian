<?php
//include
require("./header/header_provest_audit.php");

//START OBSAHU STRÁNKY
if (login() && (($_SESSION['prava_usr'] == "technik") || ($_SESSION['prava_usr'] == "koordinator") || ($_SESSION['prava_usr'] == "admin"))) {
    if (!$_POST['firma'])
        $_POST['firma'] = $_GET['firma'];
    if (!$_POST['provozovna'] && $_POST['provozovna'] != "vybrat")
        $_POST['provozovna'] = $_GET['provozovna'];

    if ($_GET['id'] == "enter") {
        echo "<h3>Výběr auditu</h3>";
        vybrat_audit();
    } elseif ($_GET['id'] == "vybrat_oblast") {
        if (prava_k_auditu($_GET['id_audit'], $_SESSION['id_usr'])) {
            echo "<h3>Provést audit</h3>";
            oznac_za_online_audit($_GET['id_audit']);
            echo_nahled_audit($_GET['id_audit'], $_SESSION['prava_usr']);
            echo "<h4>Vybrat oblast</h4>";
            stav_audit_vyvoj($_GET['id_audit'], true, "provest_audit");

            nahled_pripominek_od_koordinatora();
        } else {
            echo "<h4>Nemáte právo pracovat se zvoleným auditem!</h4><p>Přejděte zpět k volbě auditu.</p>";
        }
    } elseif ($_GET['id'] == "udaje") {
        if (prava_k_auditu($_GET['id_audit'], $_SESSION['id_usr'])) {
            echo "<h3>Provést audit</h3>";
            echo_nahled_audit($_GET['id_audit'], $_SESSION['prava_usr']);
            echo "<h4>Údaje</h4>";
            if (povolit_krok($_GET['id_audit'], "udaje")) {
                kontrola_pobocka();
            }
            echo "<p><br />Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">hlavní stranu auditu</a> bez uložení dat.</p>";
        } else {
            echo "<h4>Nemáte právo pracovat se zvoleným auditem!</h4><p>Přejděte zpět k volbě auditu.</p>";
        }
    } elseif ($_GET['id'] == "checklist") {
        if (prava_k_auditu($_GET['id_audit'], $_SESSION['id_usr'])) {
            echo "<h3>Provést audit</h3>";
            echo_nahled_audit($_GET['id_audit'], $_SESSION['prava_usr']);
            echo "<h4>Checklist</h4>";
            if (povolit_krok($_GET['id_audit'], "checklist")) {
                if ($_GET['checklist_zpracuj'] == "ano")
                    checklist_zpracuj($_GET['id_audit'], $_GET['selection']);
                if ($_GET['netykase'] != null)
                    netykase_checklist($_GET['id_audit'], $_GET['netykase']);
                if ($_GET['tykase'] != null)
                    tykase_checklist($_GET['id_audit'], $_GET['tykase']);
                if ($_GET['akce_tyka_netyka'] == "ano")
                    tyka_netyka_checklist($_GET['id_audit']);
                if ($_GET['zhodnoceni_checklistu'] == "ano")
                    zhodnoceni_checklistu_proved($_GET['id_audit']);

                vyber_checklist($_GET['id_audit']);
            }
            echo "<p><br />Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">hlavní stranu auditu</a> bez uložení dat.</p></div>";
        }
        else {
            echo "<h4>Nemáte právo pracovat se zvoleným auditem!</h4><p>Přejděte zpět k volbě auditu.</p>";
        }
    } elseif ($_GET['id'] == "checklist_vyber") {
        if (prava_k_auditu($_GET['id_audit'], $_SESSION['id_usr'])) {
            echo "<h3>Provést audit</h3>";
            echo_nahled_audit($_GET['id_audit'], $_SESSION['prava_usr']);
            echo "<h4>Checklist</h4>";
            if (povolit_krok($_GET['id_audit'], "checklist")) {
                provest_checklist($_GET['id_audit'], $_GET['selection']);
            }
            echo "<p><br />Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">hlavní stranu auditu</a> bez uložení dat.</p>";
        } else {
            echo "<h4>Nemáte právo pracovat se zvoleným auditem!</h4><p>Přejděte zpět k volbě auditu.</p>";
        }
    } elseif ($_GET['id'] == "pracoviste") {
        if (prava_k_auditu($_GET['id_audit'], $_SESSION['id_usr'])) {
            echo "<h3>Provést audit</h3>";
            echo_nahled_audit($_GET['id_audit'], $_SESSION['prava_usr']);
            echo "<h4>Pracoviště</h4>";
            if (povolit_krok($_GET['id_audit'], "pracoviste")) {
                if ($_GET['netykase'] != null)
                    netykase_pracoviste($_GET['id_audit'], $_GET['netykase']);
                echo "<p><a href=\"./provest_audit.php?id=pridat_pracoviste&id_audit=" . $_GET['id_audit'] . "\">přidejte pracoviště</a></p>";
                echo "<h5>Výběr pracovišťe</h5>";
                echo echo_pracoviste_k_auditu($_GET['id_audit'], $prepinac);
            }
            echo "<p><br />Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">hlavní stranu auditu</a> bez uložení dat.</p>";
        }
        else {
            echo "<h4>Nemáte právo pracovat se zvoleným auditem!</h4><p>Přejděte zpět k volbě auditu.</p>";
        }
    } elseif ($_GET['id'] == "pracoviste_proved") {
        if (prava_k_auditu($_GET['id_audit'], $_SESSION['id_usr'])) {
            echo "<h3>Provést audit</h3>";
            echo_nahled_audit($_GET['id_audit'], $_SESSION['prava_usr']);
            echo "<h4>Pracoviště</h4>";
            if (povolit_krok($_GET['id_audit'], "pracoviste")) {
                echo provest_audit_pracoviste($_GET['id_audit'], $_GET['id_pracoviste']);
            }
            echo "<p><br />Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">hlavní stranu auditu</a> bez uložení dat.</p>";
        } else {
            echo "<h4>Nemáte právo pracovat se zvoleným auditem!</h4><p>Přejděte zpět k volbě auditu.</p>";
        }
    } elseif ($_GET['id'] == "pridat_pracoviste") {
        echo "<h3>Provést audit</h3>";
        echo_nahled_audit($_GET['id_audit'], $_SESSION['prava_usr']);
        echo "<h4>Nové pracoviště</h4>";
        if (povolit_krok($_GET['id_audit'], "pracoviste")) {
            pridat_pracoviste_audit($_GET['id_audit']);
        }
    } elseif ($_GET['id'] == "neshody") {
        if (prava_k_auditu($_GET['id_audit'], $_SESSION['id_usr'])) {
            echo "<h3>Provést audit</h3>";
            echo_nahled_audit($_GET['id_audit'], $_SESSION['prava_usr']);
            echo "<h4>Neshody</h4>";
            if (povolit_krok($_GET['id_audit'], "neshody")) {
                if ($_GET['akce_tyka_netyka'] == "ano")
                    tyka_netyka_neshoda($_GET['id_audit']);
                echo_neshody($_GET['id_audit'], $prepinac);
            }
            echo "<p><br />Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">hlavní stranu auditu</a> bez uložení dat.</p>";
        }
        else {
            echo "<h4>Nemáte právo pracovat se zvoleným auditem!</h4><p>Přejděte zpět k volbě auditu.</p>";
        }
    } elseif ($_GET['id'] == "neshoda") {
        if (prava_k_auditu($_GET['id_audit'], $_SESSION['id_usr'])) {
            echo "<h3>Provést audit</h3>";
            echo_nahled_audit($_GET['id_audit'], $_SESSION['prava_usr']);
            echo "<h4>Neshody</h4>";
            if (povolit_krok($_GET['id_audit'], "neshody")) {
                provest_neshoda($_GET['neshoda']);
            }
            echo "<p><br />Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">hlavní stranu auditu</a> bez uložení dat.</p>";
        } else {
            echo "<h4>Nemáte právo pracovat se zvoleným auditem!</h4><p>Přejděte zpět k volbě auditu.</p>";
        }
    } elseif ($_GET['id'] == "protokoly") {
        if (prava_k_auditu($_GET['id_audit'], $_SESSION['id_usr'])) {
            echo "<h3>Provést audit</h3>";
            echo_nahled_audit($_GET['id_audit'], $_SESSION['prava_usr']);
            echo "<h4>Komentář</h4>";
            if ($_POST['sent']) provest_protokol($_GET['id_audit']);
            if (povolit_krok($_GET['id_audit'], "protokol")) {
                echo_protokol_k_auditu($_GET['id_audit']);
            }
            echo "<p><br />Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">hlavní stranu auditu</a> bez uložení dat.</p>";
        } else {
            echo "<h4>Nemáte právo pracovat se zvoleným auditem!</h4><p>Přejděte zpět k volbě auditu.</p>";
        }
    }
}
//KONEC OBSAHU STRÁNKY
patka();
?>