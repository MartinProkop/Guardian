<?php
//include
require("./header/header_osoba.php");

//START OBSAHU STRÁNKY
if(login() && ($_SESSION['prava_usr'] == "koordinator" || $_SESSION['prava_usr'] == "admin"))
{
	if($_GET['id'] == null)
	{
		echo "<h3>Vyhledat osobu</h3>";
		vyhledat_osobu_koordinator();
	}
	elseif($_GET['id'] == "detaily")
	{
		echo "<h3>Detaily osoby</h3>";
		echo_detail_osoba($_GET['id_osoba'], "koordinator");
	}
	elseif($_GET['id'] == "smazat")
	{
		echo "<h3>Smazat osobu</h3>";
		smazat_osoba($_GET['id_osoba']);
	}
	elseif($_GET['id'] == "upravit")
	{
		echo "<h3>Upravit osobu</h3>";
		upravit_osoba($_GET['id_osoba']);
	}
//	elseif($_GET['id'] == "nova")
//	{
//		echo "<h3>Nová osoba</h3>";
//		new_osoba();
//	}
}
elseif(login() && $_SESSION['prava_usr'] == "technik")
{
	if($_GET['id'] == null)
	{
		echo "<h3>Vyhledat osobu</h3>";
		vyhledat_osobu_technik();
	}
	elseif($_GET['id'] == "detaily")
	{
		echo "<h3>Detaily osoby</h3>";
		echo_detail_osoba($_GET['id_osoba'], "technik");
	}
	elseif($_GET['id'] == "smazat")
	{
		echo "<h3>Smazat osobu</h3>";
		smazat_osoba($_GET['id_osoba']);
	}
	elseif($_GET['id'] == "upravit")
	{
		echo "<h3>Upravit osobu</h3>";
		upravit_osoba($_GET['id_osoba']);
	}
//	elseif($_GET['id'] == "nova")
//	{
//		echo "<h3>Nová osoba</h3>";
//		new_osoba();
//	}
}
elseif(login() && $_SESSION['prava_usr'] == "firma" )
{
	//prava fir usra
	$result = dibi::query('SELECT * FROM [prevent_firmy_uzivatele_prava] WHERE [id_uzivatel] = %i', $_SESSION['id_usr']);
	$row = $result->fetch();
	if($row['prava'] == "admin")
	{
		if($_GET['id'] == null)
		{
			echo "<h3>Vyhledat osobu</h3>";
			vyhledat_osoba_zakaznik();
		}
		elseif($_GET['id'] == "detaily")
		{
			echo "<h3>Detaily osoby</h3>";
			echo_detail_osoba($_GET['id_osoba'], "zakaznik_admin");
		}
		elseif($_GET['id'] == "smazat")
		{
			echo "<h3>Smazat osobu</h3>";
			smazat_osoba($_GET['id_osoba']);
		}
		elseif($_GET['id'] == "upravit")
		{
			echo "<h3>Upravit osobu</h3>";
			upravit_osoba($_GET['id_osoba']);
		}
		elseif($_GET['id'] == "nova")
		{
			echo "<h3>Nová osoba</h3>";
			new_osoba();
		}
	}
	else
	{
		if($_GET['id'] == null)
		{
			echo "<h3>Vyhledat osobu</h3>";
			vyhledat_osoba_zakaznik();
		}
		elseif($_GET['id'] == "detaily")
		{
			echo "<h3>Detaily osoby</h3>";
			echo_detail_osoba($_GET['id_osoba'], "zakaznik");
		}	
		
	}
}

//KONEC OBSAHU STRÁNKY
patka();
?>