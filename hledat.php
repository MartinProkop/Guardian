<?php

//include
require("./header/header_hledat.php");

//START OBSAHU STRÁNKY
if (login() && ($_SESSION['prava_usr'] == "koordinator" || $_SESSION['prava_usr'] == "admin" || $_SESSION['prava_usr'] == "technik")) {
    if ($_GET['text'] == NULL)
        $_GET['text'] = $_POST['text'];
    hledat($_GET['text']);

    if ($_GET['text']) {
        if ($_SESSION['prava_usr'] == "admin" || $_SESSION['prava_usr'] == "koordinator")
            search_fce_koordinator($_GET['text']);
        elseif ($_SESSION['prava_usr'] == "technik")
            search_fce_technik($_GET['text']);
    }
}

//KONEC OBSAHU STRÁNKY
patka();
?>