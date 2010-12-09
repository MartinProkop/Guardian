<?php
//include
require("./header/header_pracoviste.php");

//START OBSAHU STRÁNKY
if(login() && ($_SESSION['prava_usr'] == "koordinator" || $_SESSION['prava_usr'] == "admin"))
{
	if($_GET['id'] == null)
	{
		echo "<h3>Vyhledat pracoviště</h3>";
		vyhledat_pracoviste_koordinator();
	}
	elseif($_GET['id'] == "detaily")
	{
		echo "<h3>Detaily pracoviště</h3>";
		echo_detail_pracoviste($_GET['id_pracoviste'], "koordinator");
	}
	elseif($_GET['id'] == "smazat")
	{
		echo "<h3>Smazat pracoviště</h3>";
		smazat_pracoviste($_GET['id_pracoviste']);
	}
	elseif($_GET['id'] == "upravit")
	{
		echo "<h3>Upravit pracoviště</h3>";
		upravit_pracoviste($_GET['id_pracoviste']);
	}
	elseif($_GET['id'] == "nova")
	{
		echo "<h3>Nové pracoviště</h3>";
		new_pracoviste();
	}
}
elseif(login() && $_SESSION['prava_usr'] == "technik")
{
	if($_GET['id'] == null)
	{
		echo "<h3>Vyhledat pracoviště</h3>";
		vyhledat_pracoviste_technik();
	}
	elseif($_GET['id'] == "detaily")
	{
		echo "<h3>Detaily pracoviště</h3>";
		echo_detail_pracoviste($_GET['id_pracoviste'], "technik");
	}
	elseif($_GET['id'] == "upravit")
	{
		echo "<h3>Upravit pracoviště</h3>";
		upravit_pracoviste($_GET['id_pracoviste']);
	}
	elseif($_GET['id'] == "nova")
	{
		echo "<h3>Nové pracoviště</h3>";
		new_pracoviste();
	}
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
			echo "<h3>Vyhledat pracoviště</h3>";
			vyhledat_pracoviste_zakaznik("admin");
		}
		elseif($_GET['id'] == "detaily")
		{
			echo "<h3>Detaily pracoviště</h3>";
			echo_detail_pracoviste($_GET['id_pracoviste'], "zakaznik_admin");
		}
		elseif($_GET['id'] == "smazat")
		{
			echo "<h3>Smazat pracoviště</h3>";
			smazat_pracoviste($_GET['id_pracoviste']);
		}
		elseif($_GET['id'] == "upravit")
		{
			echo "<h3>Upravit pracoviště</h3>";
			upravit_pracoviste($_GET['id_pracoviste']);
		}
		elseif($_GET['id'] == "nova")
		{
			echo "<h3>Nové pracoviště</h3>";
			new_pracoviste();
		}
	}
	else
	{
		if($_GET['id'] == null)
		{
			echo "<h3>Vyhledat pracoviště</h3>";
			vyhledat_pracoviste_zakaznik("normal");
		}
		elseif($_GET['id'] == "detaily")
		{
			echo "<h3>Detaily pracoviště</h3>";
			echo_detail_pracoviste($_GET['id_pracoviste'], "zakaznik");
		}	
		
	}
}

//KONEC OBSAHU STRÁNKY
patka();
?>