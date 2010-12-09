<?php

//include
require("./header/header_firmy_technik.php");

//START OBSAHU STRÁNKY
if (login() && ($_SESSION['prava_usr'] == "technik")) {
    if ($_GET['id'] == null) {
        echo "<h3>Přidělení klienti</h3>";
        seznam_pridelenych_firem();
    } elseif ($_GET['id'] == "detaily_firmy") {
        echo "<h3>Detaily klienta</h3>";
        echo_detail_firma($_GET['id_firmy'], "technik");
        echo "<h4>Pobočky</h4>";
        $result = dibi::query('SELECT * FROM [prevent_firmy] WHERE [id] = %i', $_GET['id_firmy']);
        $row = $result->fetch();
        if ($_GET[action] == "pridat_provozovnu" && $row['jedna_provozovna'] != "ano")
            echo "<body onLoad=\"return show_hide('plot_short','plot_full')\">";
        pridat_provozovnu();
        seznam_provozoven();
        echo "<h4>Klient - uživatelé</h4>";
        firemni_uzivatel();
        echo "<h4>Logy firmy</h4>";
        firemni_log();
    }
    elseif ($_GET['id'] == "detaily_provozovny") {
        echo "<h3>Detaily pobočky</h3>";
        echo_detail_provozovny($_GET['id_provozovny'], "technik");
        echo "<p><br />Zpět na <a href=\"./firmy_technik.php?id=detaily_firmy&id_firmy=" . $_GET['id_firmy'] . "\"><img src=\"./design/detaily.png\"/> detaily klienta</a></p>";
    } elseif ($_GET['id'] == "upravit_provozovnu") {
        echo "<h3>Upravit pobočku</h3>";
        upravit_provozovnu();
    } elseif ($_GET['id'] == "smazat_provozovnu") {
        echo "<h3>Smazat pobočku</h3>";
        smazat_provozovnu();
    }
}

//KONEC OBSAHU STRÁNKY
patka();
?>