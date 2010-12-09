<?php
//include
require("./header/header_budova.php");

//START OBSAHU STRÁNKY
if(login() && ($_SESSION['prava_usr'] == "koordinator" || $_SESSION['prava_usr'] == "admin"))
{
	if($_GET['id'] == null)
	{
		echo "<h3>Vyhledat budovu</h3>";
		vyhledat_budova_koordinator();
	}
	elseif($_GET['id'] == "detaily")
	{
		echo "<h3>Detaily budovy</h3>";
		echo_detail_budova($_GET['id_budova'], "koordinator");
	}
	elseif($_GET['id'] == "smazat")
	{
		echo "<h3>Smazat budovu</h3>";
		smazat_budova($_GET['id_budova']);
	}
	elseif($_GET['id'] == "upravit")
	{
		echo "<h3>Upravit budovu</h3>";
		upravit_budova($_GET['id_budova']);
	}
	elseif($_GET['id'] == "nova")
	{
		echo "<h3>Nová budova</h3>";
		new_budova();
	}
}
elseif(login() && $_SESSION['prava_usr'] == "technik")
{
	if($_GET['id'] == null)
	{
		echo "<h3>Vyhledat budovu</h3>";
		vyhledat_budova_technik();
	}
	elseif($_GET['id'] == "detaily")
	{
		echo "<h3>Detaily budovy</h3>";
		echo_detail_budova($_GET['id_budova'], "technik");
	}
	elseif($_GET['id'] == "smazat")
	{
		echo "<h3>Smazat budovu</h3>";
		smazat_budova($_GET['id_budova']);
	}
	elseif($_GET['id'] == "upravit")
	{
		echo "<h3>Upravit budovu</h3>";
		upravit_budova($_GET['id_budova']);
	}
	elseif($_GET['id'] == "nova")
	{
		echo "<h3>Nová budova</h3>";
		new_budova();
	}
}
//elseif(login() && $_SESSION['prava_usr'] == "firma" )
//{
//	//prava fir usra
//	$result = dibi::query('SELECT * FROM [prevent_firmy_uzivatele_prava] WHERE [id_uzivatel] = %i', $_SESSION['id_usr']);
//	$row = $result->fetch();
//	if($row['prava'] == "admin")
//	{
//		if($_GET['id'] == null)
//		{
//			echo "<h3>Vyhledat budovu</h3>";
//			vyhledat_budova_zakaznik("admin");
//		}
//		elseif($_GET['id'] == "detaily")
//		{
//			echo "<h3>Detaily budovy</h3>";
//			echo_detail_budova($_GET['id_budova'], "zakaznik_admin");
//		}
//		elseif($_GET['id'] == "smazat")
//		{
//			echo "<h3>Smazat budovu</h3>";
//			smazat_budova($_GET['id_budova']);
//		}
//		elseif($_GET['id'] == "upravit")
//		{
//			echo "<h3>Upravit budovu</h3>";
//			upravit_budova($_GET['id_budova']);
//		}
//		elseif($_GET['id'] == "nova")
//		{
//			echo "<h3>Nová budova</h3>";
//			new_budova();
//		}
//	}
//	else
//	{
//		if($_GET['id'] == null)
//		{
//			echo "<h3>Vyhledat budovu</h3>";
//			vyhledat_budova_zakaznik("normal");
//		}
//		elseif($_GET['id'] == "detaily")
//		{
//			echo "<h3>Detaily budovy</h3>";
//			echo_detail_budova($_GET['id_budova'], "zakaznik");
//		}
//
//	}
//}


//KONEC OBSAHU STRÁNKY
patka();
?>