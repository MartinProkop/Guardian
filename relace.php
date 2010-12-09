<?php
//include
require("./header/header_relace.php");

//START OBSAHU STRÁNKY
if(login())
{
	if($_GET['id'] == "enter")
	{
		echo "<h3>Vyberte relaci</h3>";
		relace_uzivatele();
	}
	elseif($_GET['id'] == "detaily")
	{
		echo "<h3>Detaily relace</h3>";
		if(!$_POST['firma'] || !$_POST['typ_relace'])
		{
			$_POST['firma'] = $_GET['firma'];
			$_POST['typ_relace'] = $_GET['typ_relace'];
		}
		detaily_relace($_POST['firma'], $_POST['typ_relace']);
	}
	elseif($_GET['id'] == "smazat")
	{
		echo "<h3>Smazat relaci</h3>";
		smazat_relace($_GET['smazat'], $_GET['typ_relace']);
	}
	elseif($_GET['id'] == "pridat")
	{
		echo "<h3>Přidat relaci</h3>";
		if(!pridat_relace($_POST['id_objekt1'], $_POST['id_objekt2'], $_GET['typ_relace']))
		{
			?>
			<div class="info" align="justify" id="plot_short">
				<p>Nyní můžete buď <a href="#" onClick="return show_hide('plot_short','plot_full')">opakovat zadání</a> nebo jít zpět na 
				<?php echo "<a href=\"./relace.php?id=detaily&firma=".$_GET['firma']."&typ_relace=".$_GET['typ_relace']."\">detaily relace</a>.</p>"; ?>
			</div>
			<div class="info2" align="justify" id="plot_full" style="display: none;">
				<?php
					pridat_relace_form($_GET['firma'], $_GET['typ_relace'], true);
				?>
			</div>
			<?php					
		}
	}
}
//KONEC OBSAHU STRÁNKY
patka();
?>