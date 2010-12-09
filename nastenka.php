<?php
//include
require("./header/header_nastenka.php");

//START OBSAHU STRÁNKY
if(login())
{?>

<h3>Nástěnka</h3>
<?php
	//seznam nastenek pro nefirmu
	if($_SESSION['prava_usr'] != "firma") echo "<p>".seznam_nastenek()."</p>";

	//poreseni podstrceni id_nastenky pri null
	if($_GET['id_nastenky'] == null && $_SESSION['prava_usr'] != "firma") $_GET['id_nastenky'] = 0;
	if($_SESSION['prava_usr'] == "firma")
	{
		$result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $_SESSION['id_usr']);
		$row = $result->fetch();
		$_GET['id_nastenky'] = $row['ad'];
	}
	//resim pravo k nastence
	if(over_prava_na_nastenku($_GET['id_nastenky'], $_SESSION['id_usr']))
	{
	?>	
<div class="caradown"></div>
<br />
  <div class="info" align="justify" id="plot_short">
    <p><a href="#" onClick="return show_hide('plot_short','plot_full')"><img src="./design/pridat.png" /> přidat záznam</a></p>
  </div>
  <div class="info2" align="justify" id="plot_full" style="display: none;">
  <?php pridat_zaznam(); ?>
  </div>
  
<?php
	vypis_nastenky($_GET['id_nastenky']);
	}
	//nema pravo k nastence
	else
	{
		echo "<h4>Nemáte právo k přístupu k nástěnce</h4><p><a href=\"./nastenka.php\">zkuste opakovat přístup</a></p>";
	}

}

//KONEC OBSAHU STRÁNKY
patka();
?>
