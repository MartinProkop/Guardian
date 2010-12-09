<?php
//include
require("./header/header_faq.php");

//START OBSAHU STRÁNKY



if($_GET['id'] == "o_systemu" || !$_GET['id'])
{
	echo "<h3>O systému</h3><p>Část FAQ zabívající se vlastnostma systému a základním helpem.</p>";
}
elseif($_GET['id'] == "prehled_funkci")
{
	echo "<h3>Přehled funkcí</h3><p>Část FAQ zabívající se přehledem možností systému.</p>";
}
elseif($_GET['id'] == "prehled_verzi_systemu")
{
	echo "<h3>Přehled verzí systému</h3>";
	vypis_verzi_systemu();
}

//KONEC OBSAHU STRÁNKY
patka();
?>
