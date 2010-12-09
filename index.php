<?php

//include
require("./header/header_index.php");

//START OBSAHU STRÁNKY
if (login ()) {

    if ($_SESSION['prava_usr'] == "admin") {
        index_admin();
    } elseif ($_SESSION['prava_usr'] == "koordinator")
        index_koordinator();
    elseif ($_SESSION['prava_usr'] == "technik")
        index_technik();
    elseif ($_SESSION['prava_usr'] == "firma")
        index_firma();
}

//KONEC OBSAHU STRÁNKY
patka();
?>
