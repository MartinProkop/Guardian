<?php
//include
require("./header/header_ukoly.php");

//START OBSAHU STRÁNKY
if(login())
{
	echo "<h3>Úkoly</h3>";
	if ($_GET['splnen']) splnen();
	if ($_GET['smazat_splnen']) smazat_splnen();
	if ($_GET['smazat_nesplnen']) smazat_nesplnen();
	if ($_GET['nesplnen']) nesplnen();
	if ($_GET['smazat_vse'] == true) smazat_vse();



	vypis_ukolu_uzivatele();
}

//KONEC OBSAHU STRÁNKY
patka();
?>

