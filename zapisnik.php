<?php
//include
require("./header/header_zapisnik.php");

//START OBSAHU STRÁNKY
if (login ()) {
    echo "<h3>Zápisník</h3>";
    if($_GET['smazat_zapisnik']) smazat_zapisnik();
    pridat_zapisnik_dva();
    menu_zapisnik();

    zapisnik();
}
//KONEC OBSAHU STRÁNKY
patka();
?>
