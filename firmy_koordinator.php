<?php
//include
require("./header/header_firmy_koordinator.php");

//START OBSAHU STRÁNKY
if (login() && ($_SESSION['prava_usr'] == "koordinator" || $_SESSION['prava_usr'] == "admin")) {
    if ($_GET['id'] == null) {
        echo "<h3>Vyhledat klienta</h3>";
        vyhledat_firmu();


        echo "<h3>Přidat klienta</h3>";
        if ($_GET[action])
            echo "<body onLoad=\"return show_hide('plot_short','plot_full')\">";
?>
        <div class="info" align="justify" id="plot_short">
            <p><a href="#" onClick="return show_hide('plot_short','plot_full')"><img src="./design/pridat.png" /> přidat klienta</a></p>
        </div>
        <div class="info2" align="justify" id="plot_full" style="display: none;">
<?php pridat_firmu(); ?>
        </div>
<?php
    }
    elseif ($_GET['id'] == "detaily_firmy") {
        echo "<h3>Detaily klienta - " . get_nazev_firmy($_GET['id_firmy']) . "</h3>";
        echo_detail_firma($_GET['id_firmy'], "koordinator");
        echo "<h4>Pobočky</h4>";
        $result = dibi::query('SELECT * FROM [prevent_firmy] WHERE [id] = %i', $_GET['id_firmy']);
        $row = $result->fetch();
        if ($_GET[action] == "pridat_provozovnu" && $row['jedna_provozovna'] !=  "ano")
            echo "<body onLoad=\"return show_hide('plot_short','plot_full')\">";
        pridat_provozovnu();
        seznam_provozoven();
        echo "<h4>Technik přidělený klientovi</h4>";
?>
        <div class="info" align="justify" id="plot_short2">
            <p><a href="#" onClick="return show_hide('plot_short2','plot_full2')"><img src="./design/pridat.png" /> přidat technika</a></p>
        </div>
        <div class="info2" align="justify" id="plot_full2" style="display: none;">
<?php firemni_technik_pridat(); ?>
        </div>
<?php
        if ($_GET['odebrat_technika'])
            firemni_technik_odebrat();
        firemni_technik();
        echo "<h4>Klient - uživatelé</h4>";
        if ($_POST['novy_uzivatel_jmeno'])
            firemni_uzivatel_novy();
        if ($_GET['blokovat_uzivatele'])
            firemni_uzivatel_blokovat();
        if ($_GET['smazat_uzivatele'])
            firemni_uzivatel_smazat();
        firemni_uzivatel();
        if ($_GET['smazat_logy'])
            firemni_logy_smazat();
        echo "<h4>Logy klienta</h4>";
        firemni_log();
    }
    elseif ($_GET['id'] == "upravit_firmu") {
        echo "<h3>Upravit klienta</h3>";
        upravit_firmu();
    } elseif ($_GET['id'] == "smazat_firmu") {
        echo "<h3>Smazat klienta</h3>";
        smazat_firmu();
    } elseif ($_GET['id'] == "detaily_provozovny") {
        echo "<h3>Detaily pobočky</h3>";
        echo_detail_provozovny($_GET['id_provozovny'], "koordinator");
        echo "<h4>Technik přidělený klientovi</h4><p>Pobočce náleží stejní technikové jako má klient.</p>";
        if ($_GET['odebrat_technika'])
            firemni_technik_odebrat();
        firemni_technik();
        echo "<p><br />Zpět na <a href=\"./firmy_koordinator.php?id=detaily_firmy&id_firmy=" . $_GET['id_firmy'] . "\"><img src=\"./design/detaily.png\"/> detaily klienta</a>.</p>";
    } elseif ($_GET['id'] == "upravit_provozovnu") {
        echo "<h3>Upravit pobočku</h3>";
        upravit_provozovnu();
    } elseif ($_GET['id'] == "smazat_provozovnu") {
        echo "<h3>Smazat pobočku</h3>";
        smazat_provozovnu();
    } elseif ($_GET['id'] == "upravit_firemniho_uzivatele") {
        echo "<h3>Upravit uživatele</h3>";
        firemni_uzivatel_upravit();
    }
}

//KONEC OBSAHU STRÁNKY
patka();
?>