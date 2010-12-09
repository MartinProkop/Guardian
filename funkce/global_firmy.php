<?php

function echo_table_firma() {
    echo "<table class=\"table\">
	<tr>
	<td><span class=\"subheader\">AKCE</span></td>
	<td><span class=\"subheader\">NÁZEV</span></td>
	<td><span class=\"subheader\">ADRESA</span></td>
	<td><span class=\"subheader\">EMAIL</span></td>
	<td><span class=\"subheader\">TELEFON</span></td>
	</tr>";
}

function echo_firma($id, $akce) {
    $result = dibi::query('SELECT * FROM [prevent_firmy] WHERE [id] = %s', $id);
    $row = $result->fetch();
    echo "<tr>
	<td>";

    if ($akce == "koordinator") {
        echo "<a href=\"./firmy_koordinator.php?id=detaily_firmy&id_firmy=" . $row['id'] . "\"><img src=\"./design/detaily.png\" alt=\"detaily\" title=\"detaily\"/></a>";
    } elseif ($akce == "technik") {
        echo "<a href=\"./firmy_technik.php?id=detaily_firmy&id_firmy=" . $row['id'] . "\"><img src=\"./design/detaily.png\" alt=\"detaily\" title=\"detaily\"/></a>";
    } elseif ($akce == "zakaznik") {
        echo "---";
    }

    echo "</td>
	<td>" . $row['nazev'] . "</td>
	<td>" . $row['adresa'] . "</td>
	<td>" . $row['email'] . "</td>
	<td>" . $row['telefon'] . "</td>
	</tr>";
}

function echo_detail_firma($id, $akce) {
    echo "<table class=\"table\">";

    $result = dibi::query('SELECT * FROM [prevent_firmy] WHERE [id] = %i', $id);
    $row = $result->fetch();
    echo "
	<tr>
		<td><span class=\"subheader\">AKCE</span></td>
		<td>";

    if ($akce == "koordinator") {
        echo "<a href=\"./firmy_koordinator.php?id=upravit_firmu&id_firmy=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"upravit\" title=\"upravit\"/></a> <a href=\"./firmy_koordinator.php?id=smazat_firmu&id_firmy=" . $row['id'] . "\" onclick=\"if(confirm('Skutečně smazat klienta?')) location.href='./firmy_koordinator.php?id=smazat_firmu&id_firmy=" . $row['id'] . "'; return(false);\"><img src=\"./design/kos.png\" alt=\"smazat\" title=\"smazat\"/></a>";
        $pravanaosoby = "admin";
    } elseif ($akce == "technik") {
        echo "---";
    } elseif ($akce == "zakaznik") {
        $result2 = dibi::query('SELECT * FROM [prevent_firmy_uzivatele_prava] WHERE [id_uzivatel] = %i', $_SESSION['id_usr']);
        $row2 = $result2->fetch();
        if ($row2['prava'] == "admin")
            $pravanaosoby = "admin";
        echo "---";
    }

    echo "</td>
	</tr>
	<tr>
		<td><span class=\"subheader\">jméno klienta</span></td>
		<td>" . $row['nazev'] . "</td>
	</tr>
	<tr>
		<td><span class=\"subheader\">logo klienta</span></td>
		<td><img src=\"" . $row['logo'] . "\" width=\"150px\"/></td>
	</tr>
	<tr>
		<td><span class=\"subheader\">ADRESA klienta</span></td>
		<td>" . $row['adresa'] . "</td>
	</tr>
	<tr>
		<td><span class=\"subheader\">POPIS<br />prováděné<br />činnosti</span></td>
		<td>" . $row['popis'] . "</td>
	</tr>
	<tr>
		<td><span class=\"subheader\">Statutární<br />zástupce<br />klienta</span></td>
		<td>";
    echo_name_osoba($row['id'], "firma", "z_zastupce_firma", $pravanaosoby);
    echo "</td>";
    $result_kontaktni_osoba = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [jmeno] = %s', $row['kontaktni_osoba']);
    $row_kontaktni_osoba = $result_kontaktni_osoba->fetch();
    echo "<tr>
		<td><span class=\"subheader\">kontaktní osoba</span></td>
		<td><a href=\"./uzivatele.php?id_uzivatele=".$row_kontaktni_osoba['id']."\"><img src=\"./design/detaily.png\"/> " . $row['kontaktni_osoba'] . "</a></td>
	</tr>
	<tr>
		<td><span class=\"subheader\">TELEFON</span></td>
		<td>" . $row['telefon'] . "</td>
	</tr>
	<tr>
		<td><span class=\"subheader\">EMAIL</span></td>
		<td>" . $row['email'] . "</td>
	</tr>
	<tr>
		<td><span class=\"subheader\">IČO</span></td>
		<td>" . $row['ico'] . "</td>
	</tr>
	<tr>
		<td><span class=\"subheader\">DIČ</span></td>
		<td>" . $row['dic'] . "</td>
	</tr>
	<tr>
		<td><span class=\"subheader\">POZNÁMKY</span></td>
		<td>" . $row['poznamky'] . "</td>
	</tr>";
    echo "</table>";
}

function echo_table_provozovna() {
    echo "<table class=\"table\">
	<tr>
	<td><span class=\"subheader\">AKCE</a></span></td>
	<td><span class=\"subheader\">NÁZEV</span></td>
	<td><span class=\"subheader\">ADRESA</span></td>
	<td><span class=\"subheader\">EMAIL</span></td>
	<td><span class=\"subheader\">TELEFON</span></td>
	</tr>";
}

function echo_provozovna($id, $akce) {
    $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [id] = %i', $id);
    $row = $result->fetch();
    echo "<tr>
	<td>";

    if ($akce == "koordinator") {
        echo "<a href=\"./firmy_koordinator.php?id=detaily_provozovny&id_firmy=" . $row['ad'] . "&id_provozovny=" . $id . "\"><img src=\"./design/detaily.png\" alt=\"detaily\" title=\"detaily\"/></a>";
    } elseif ($akce == "technik") {
        echo "<a href=\"./firmy_technik.php?id=detaily_provozovny&id_firmy=" . $row['ad'] . "&id_provozovny=" . $id . "\"><img src=\"./design/detaily.png\" alt=\"detaily\" title=\"detaily\"/></a>";
    } elseif ($akce == "zakaznik") {
        echo "<a href=\"./zakaznik.php?id=detaily_provozovny&id_provozovny=" . $id . "\"><img src=\"./design/detaily.png\" alt=\"detaily\" title=\"detaily\"/></a>";
    }

    echo "</td>
	<td>" . $row['nazev'] . "</td>
	<td>" . $row['adresa'] . "</td>
	<td>" . $row['email'] . "</td>
	<td>" . $row['telefon'] . "</td>
	</tr>";
}

function echo_detail_provozovny($id, $akce) {
    echo "<table class=\"table\">";

    $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [id] = %i', $id);
    $row = $result->fetch();
    echo "
	<tr>
		<td><span class=\"subheader\">AKCE</span></td>
		<td>";

    if ($akce == "koordinator") {
        echo "<a href=\"./firmy_koordinator.php?id=upravit_provozovnu&id_firmy=" . $_GET['id_firmy'] . "&id_provozovny=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"upravit\" title=\"upravit\" /></a> <a href=\"./firmy_koordinator.php?id=smazat_provozovnu&id_firmy=" . $_GET['id_firmy'] . "&id_provozovny=" . $row['id'] . "\" onclick=\"if(confirm('Skutečně smazat pobočku?')) location.href='./firmy_koordinator.php?id=smazat_provozovnu&id_firmy=" . $_GET['id_firmy'] . "&id_provozovny=" . $row['id'] . "'; return(false);\"><img src=\"./design/kos.png\" alt=\"smazat\" title=\"smazat\" /></a>";
        $pravanaosoby = "admin";
    } elseif ($akce == "technik") {
        echo "<a href=\"./firmy_technik.php?id=upravit_provozovnu&id_firmy=" . $_GET['id_firmy'] . "&id_provozovny=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"upravit\" title=\"upravit\" /></a> <a href=\"./firmy_technik.php?id=smazat_provozovnu&id_firmy=" . $_GET['id_firmy'] . "&id_provozovny=" . $row['id'] . "\" onclick=\"if(confirm('Skutečně smazat pobočku?')) location.href='./firmy_technik.php?id=smazat_provozovnu&id_firmy=" . $_GET['id_firmy'] . "&id_provozovny=" . $row['id'] . "'; return(false);\"><img src=\"./design/kos.png\" alt=\"smazat\" title=\"smazat\" /></a>";
    } elseif ($akce == "zakaznik_admin") {
        echo "zatim nic zakaznik_admin";
    } elseif ($akce == "zakaznik") {
        echo "zatim nic zakaznik";
    }

    echo "</td>
	</tr>
	<tr>
		<td><span class=\"subheader\">jméno pobočky</span></td>
		<td>" . $row['nazev'] . "</td>
	</tr>
	<tr>
		<td><span class=\"subheader\">ADRESA pobočky</span></td>
		<td>" . $row['adresa'] . "</td>
	</tr>
	<tr>
		<td><span class=\"subheader\">popis<br />činnosti<br />na pobočce</span></td>
		<td>" . $row['popis'] . "</td>
	</tr>
	<tr>
		<td><span class=\"subheader\">Statutární<br />zástupce<br />pobočky</span></td>
		<td>";
    echo_name_osoba($row['id'], "provozovna", "z_zastupce_provozovna", $pravanaosoby);
    echo "</td>";
    $result_kontaktni_osoba = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [jmeno] = %s', $row['kontaktni_osoba']);
    $row_kontaktni_osoba = $result_kontaktni_osoba->fetch();
    echo "<tr>
		<td><span class=\"subheader\">kontaktní osoba</span></td>
		<td><a href=\"./uzivatele.php?id_uzivatele=".$row_kontaktni_osoba['id']."\"><img src=\"./design/detaily.png\"/> " . $row['kontaktni_osoba'] . "</a></td>
	</tr>
	<tr>
		<td><span class=\"subheader\">TELEFON</span></td>
		<td>" . $row['telefon'] . "</td>
	</tr>
	<tr>
		<td><span class=\"subheader\">EMAIL</span></td>
		<td>" . $row['email'] . "</td>
	</tr>
	<tr>
		<td><span class=\"subheader\">POZNÁMKY</span></td>
		<td>" . $row['poznamky'] . "</td>
	</tr>";
    echo "</table>";

    echo_relace_objekt_provozovny($row['id'], $akce);
}