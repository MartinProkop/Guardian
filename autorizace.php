<?php
//include
require("./header/header_autorizace.php");

//START OBSAHU STRÁNKY
if($_GET['id'] == "zapomenute_heslo")
{
	echo "<h3>Zapomenuté heslo</h3>";
	zapomenute_heslo();
}
elseif($_GET['id'] == "autorizace")
{
	echo "<h3>Autorizace do systému</h3>";
	autorizace();
}
elseif($_GET['id'] == "odblokovat")
{
	echo "<h3>Žádost o odblokování</h3>";
	odblokovat();
}

//KONEC OBSAHU STRÁNKY
patka();
?>
