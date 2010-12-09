<?php
//include
require("./header/header_zakaznik.php");

//START OBSAHU STRÁNKY
$result = dibi::query('SELECT * FROM [prevent_firmy_uzivatele_prava] WHERE [id_uzivatel] = %i', $_SESSION['id_usr']);
$row = $result->fetch();

if(login() && $_SESSION['prava_usr'] == "firma" && $row['prava'] == "admin")
{
	if($_GET['id'] == "informace")
	{
		echo "<h3>Informace</h3>
		<h4>O klientovi</h4>";
		echo_detail_firma($_SESSION['firma_usr'], "zakaznik");
		echo "<h4>Pobočky</h4>";
		seznam_provozoven();
	}
	elseif($_GET['id'] == "logy")
	{
		echo "<h3>Log klienta</h3>";
		if($_GET['id_uzivatele']) $_POST['id_uzivatele'] = $_GET['id_uzivatele'];
		firemni_log();	
	}
	elseif($_GET['id'] == "kontaktni_osoby")
	{
		echo "<h3>Kontaktní osoby</h3>";
		kontaktni_osoby();
	}
	elseif($_GET['id'] == "firemni_uzivatele")
	{
		echo "<h3>Firemní uživatelé</h3>";
		if($_GET['blokovat_uzivatele']) firemni_uzivatel_blokovat();
		if($_POST['novy_uzivatel_jmeno']) firemni_uzivatel_novy();
		if($_GET['smazat_uzivatele']) firemni_uzivatel_smazat();
		firemni_uzivatele();
	}
	elseif($_GET['id'] == "upravit_firemniho_uzivatele")
	{
		echo "<h3>Upravit uživatele</h3>";
		firemni_uzivatel_upravit();
	}
	elseif($_GET['id'] == "detaily_provozovny")
	{
		echo "<h3>Detaily pobočky</h3>";
		if(pravo_na_provozovnu_firmeni_uzivatel($_GET['id_provozovny'])) echo_detail_provozovny($_GET['id_provozovny'], "zakaznik");
		else echo "<h4>Nemáte právo nahlížet na detaily zadané pobočky</h4>";
		echo "<p><br />Zpět na <a href=\"./zakaznik.php?id=informace\">detaily pobočky</a></p>";
	}
}
elseif(login() && $_SESSION['prava_usr'] == "firma")
{
	if($_GET['id'] == "informace")
	{

		
		echo "<h3>Informace</h3>
		<h4>O klientovi</h4>";
		echo_detail_firma($_SESSION['firma_usr'], "zakaznik");
		echo "<h4>Pobočky</h4>";
		seznam_provozoven();
	}
	elseif($_GET['id'] == "kontaktni_osoby")
	{
		echo "<h3>Kontaktní osoby</h3>";
		kontaktni_osoby();
	}
	elseif($_GET['id'] == "detaily_provozovny")
	{
		echo "<h3>Detaily provozovny</h3>";
		if(pravo_na_provozovnu_firmeni_uzivatel($_GET['id_provozovny'])) echo_detail_provozovny($_GET['id_provozovny'], "zakaznik");
		else echo "<h4>Nemáte právo nahlížet na detaily zadané pobočky</h4>";
		echo "<p><br />Zpět na <a href=\"./zakaznik.php?id=informace\">detaily klienta</a></p>";
	}
}

//KONEC OBSAHU STRÁNKY
patka();
?>