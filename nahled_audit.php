<?php

//include
require("./header/header_nahled_audit.php");

//START OBSAHU STRÁNKY
//if (login() && (($_SESSION['prava_usr'] == "technik") || ($_SESSION['prava_usr'] == "koordinator") || ($_SESSION['prava_usr'] == "admin"))) {
if (login ()) {
    if (!$_POST['firma'])
        $_POST['firma'] = $_GET['firma'];
    if (!$_POST['provozovna'] && $_POST['provozovna'] != "vybrat")
        $_POST['provozovna'] = $_GET['provozovna'];

    if ($_GET['id'] == "enter") {
        echo "<h3>Výběr auditu</h3>";
        vybrat_audit();
    } elseif ($_GET['id'] == "vybrat_oblast") {
        if (prava_k_auditu($_GET['id_audit'], $_SESSION['id_usr'])) {
            echo "<h3>Náhled audit</h3>";
            echo_nahled_audit($_GET['id_audit'], $_SESSION['prava_usr']);
            echo "<h4>Vybrat oblast</h4>";
            stav_audit_vyvoj($_GET['id_audit'], true, "nahled_audit");

            akce_nahled();

            echo "<h3>Zpráva o auditu</h3>";
            zprava_o_auditu($_GET['id_audit']);
        } else {
            echo "<h4>Nemáte právo pracovat se zvoleným auditem!</h4><p>Přejděte zpět k volbě auditu.</p>";
        }
    } elseif ($_GET['id'] == "udaje") {
        if (prava_k_auditu($_GET['id_audit'], $_SESSION['id_usr'])) {
            echo "<h3>Náhled audit</h3>";
            echo_nahled_audit($_GET['id_audit'], $_SESSION['prava_usr']);
            echo "<h4>Údaje</h4>";
            kontrola_pobocka_nahled();

            echo "<p><br />Zpět na <a href=\"./nahled_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\" >hlavní stranu auditu</a>.</p>";
        } else {
            echo "<h4>Nemáte právo pracovat se zvoleným auditem!</h4><p>Přejděte zpět k volbě auditu.</p>";
        }
    } elseif ($_GET['id'] == "checklist") {
        if (prava_k_auditu($_GET['id_audit'], $_SESSION['id_usr'])) {
            echo "<h3>Náhled audit</h3>";
            echo_nahled_audit($_GET['id_audit'], $_SESSION['prava_usr']);
            echo "<h4>Checklist</h4>";
            vyber_checklist_nahled($_GET['id_audit']);
            echo "<p><br />Zpět na <a href=\"./nahled_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\" >hlavní stranu auditu</a>.</p>";
        } else {
            echo "<h4>Nemáte právo pracovat se zvoleným auditem!</h4><p>Přejděte zpět k volbě auditu.</p>";
        }
    } elseif ($_GET['id'] == "checklist_vyber") {
        if (prava_k_auditu($_GET['id_audit'], $_SESSION['id_usr'])) {
            echo "<h3>Náhled audit</h3>";
            echo_nahled_audit($_GET['id_audit'], $_SESSION['prava_usr']);
            echo "<h4>Checklist</h4>";

            provest_checklist_nahled($_GET['id_audit'], $_GET['selection']);

            echo "<p><br />Zpět na <a href=\"./nahled_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\" >hlavní stranu auditu</a>.</p>";
        } else {
            echo "<h4>Nemáte právo pracovat se zvoleným auditem!</h4><p>Přejděte zpět k volbě auditu.</p>";
        }
    } elseif ($_GET['id'] == "pracoviste") {
        if (prava_k_auditu($_GET['id_audit'], $_SESSION['id_usr'])) {
            echo "<h3>Náhled audit</h3>";
            echo_nahled_audit($_GET['id_audit'], $_SESSION['prava_usr']);
            echo "<h4>Pracoviště</h4>";

            echo "<h5>Výběr pracovišťe</h5>";
            echo echo_pracoviste_k_auditu_nahled($_GET['id_audit'], $prepinac);

            echo "<p><br />Zpět na <a href=\"./nahled_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\" >hlavní stranu auditu</a>.</p>";
        } else {
            echo "<h4>Nemáte právo pracovat se zvoleným auditem!</h4><p>Přejděte zpět k volbě auditu.</p>";
        }
    } elseif ($_GET['id'] == "pracoviste_proved") {
        if (prava_k_auditu($_GET['id_audit'], $_SESSION['id_usr'])) {
            echo "<h3>Náhled audit</h3>";
            echo_nahled_audit($_GET['id_audit'], $_SESSION['prava_usr']);
            echo "<h4>Pracoviště</h4>";

            echo provest_audit_pracoviste_nahled($_GET['id_audit'], $_GET['id_pracoviste']);

            echo "<p><br />Zpět na <a href=\"./nahled_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\" >hlavní stranu auditu</a>.</p>";
        } else {
            echo "<h4>Nemáte právo pracovat se zvoleným auditem!</h4><p>Přejděte zpět k volbě auditu.</p>";
        }
    } elseif ($_GET['id'] == "neshody") {
        if (prava_k_auditu($_GET['id_audit'], $_SESSION['id_usr'])) {
            echo "<h3>Náhled audit</h3>";
            echo_nahled_audit($_GET['id_audit'], $_SESSION['prava_usr']);
            echo "<h4>Neshody</h4>";

            echo_neshody_nahled($_GET['id_audit'], $prepinac);

            echo "<p><br />Zpět na <a href=\"./nahled_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\" >hlavní stranu auditu</a>.</p>";
        } else {
            echo "<h4>Nemáte právo pracovat se zvoleným auditem!</h4><p>Přejděte zpět k volbě auditu.</p>";
        }
    } elseif ($_GET['id'] == "neshoda") {
        if (prava_k_auditu($_GET['id_audit'], $_SESSION['id_usr'])) {
            echo "<h3>Náhled audit</h3>";
            echo_nahled_audit($_GET['id_audit'], $_SESSION['prava_usr']);
            echo "<h4>Neshody</h4>";

            provest_neshoda_nahled($_GET['neshoda']);

            echo "<p><br />Zpět na <a href=\"./nahled_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\" >hlavní stranu auditu</a>.</p>";
        } else {
            echo "<h4>Nemáte právo pracovat se zvoleným auditem!</h4><p>Přejděte zpět k volbě auditu.</p>";
        }
    } elseif ($_GET['id'] == "protokoly") {
        if (prava_k_auditu($_GET['id_audit'], $_SESSION['id_usr'])) {
            echo "<h3>Náhled audit</h3>";
            echo_nahled_audit($_GET['id_audit'], $_SESSION['prava_usr']);
            echo "<h4>Komentář</h4>";

            echo_protokol_k_auditu_nahled($_GET['id_audit']);

            echo "<p><br />Zpět na <a href=\"./nahled_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\" >hlavní stranu auditu</a>.</p>";
        } else {
            echo "<h4>Nemáte právo pracovat se zvoleným auditem!</h4><p>Přejděte zpět k volbě auditu.</p>";
        }
    }
}

//KONEC OBSAHU STRÁNKY
patka();
?>