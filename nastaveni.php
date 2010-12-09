<?php
//include
require("./header/header_nastaveni.php");

//START OBSAHU STRÁNKY
if(login())
{
		echo "<h3>Nastavení</h3>";
		echo "<h4>Účet</h4>";
		nastaveni();
		echo "<h4>QuickLink</h4>";
		echo "<p>Zkopírujte do kolonky LINK http odkaz vaší oblíbené stránky a urychlete si práci. Například přístup na detail určité firmy.</p>";
		if($_POST['text']) pridat_quicklink();
		if ($_GET['smazat_link']) smazat_quicklink();
		if ($_GET['nahoru']) nahoru_quicklink();
		if ($_GET['dolu']) dolu_quicklink();
		quicklink();
		echo "<h4>Změnit heslo</h4>";
                zmenit_heslo();
}

//KONEC OBSAHU STRÁNKY
patka();
?>
