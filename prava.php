<?php
//include
require("./header/header_prava.php");

//START OBSAHU STRÁNKY
if(login())
{
	echo "<h3>Práva: ".hlaska_prav()."</h3>
	<p>Zde Vám nabízíme seznam možností, které Vašemu oprávnění přísluší</p>";

	prava();
}

//KONEC OBSAHU STRÁNKY
patka();
?>
