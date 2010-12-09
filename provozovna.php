<?php
//include
require("./header/header_provozovna.php");

//START OBSAHU STRÁNKY
if(login() && ($_SESSION['prava_usr'] == "koordinator" || $_SESSION['prava_usr'] == "admin"))
{
	if($_GET['id'] == null)
	{
		echo "<h3>Vyhledat pobočku</h3>";
		vyhledat_provozovna_koordinator();
	}
}
elseif(login() && $_SESSION['prava_usr'] == "technik")
{
	if($_GET['id'] == null)
	{
		echo "<h3>Vyhledat pobočku</h3>";
		vyhledat_provozovna_technik();
	}
}

//KONEC OBSAHU STRÁNKY
patka();
?>