<?php
//include
require("./header/header_uzivatele.php");

//START OBSAHU STRÁNKY
if(login())
{
		echo "<h3>Uživatelé</h3>";
                if($_GET['id_uzivatele'] != NULL) $_POST['id_uzivatele'] = $_GET['id_uzivatele'];
		uzivatele();
}

//KONEC OBSAHU STRÁNKY
patka();
?>
