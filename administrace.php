<?php
//include
require("./header/header_administrace.php");


//START OBSAHU STRÁNKY
if(login() && $_SESSION['prava_usr'] == "admin")
{
	if($_GET['id'] == "sprava_uzivatelu")
	{
		echo "<h3>Správa uživatelů</h3>";
	
		if($_GET['smazat_uzivatele']) smazat_uzivatele();
		if($_POST['novy_uzivatel_jmeno']) novy_uzivatel();
		if($_GET['blokovat_uzivatele']) blokovat_uzivatele();
		if($_GET['upravit_uzivatele']) upravit_uzivatele();
	
		vypis_uzivatelu();
		echo "<h3>Vyhledat klienta - uživatele</h3>";
		vyhledat_uzivatele_firmy();
	}
	elseif($_GET['id'] == "ukoly_uzivatelu")
	{
		echo "<h3>Úkoly uživatelů</h3>";

		if($_GET['id_uzivatele']) $_POST['id_uzivatele'] = $_GET['id_uzivatele'];
		if($_GET['smazat_ukoly']) smazat_ukoly();

		ukoly_uzivatele();
	}
	elseif($_GET['id'] == "logy_uzivatelu")
	{
		echo "<h3>Logy uživatelů</h3>";
	
		if($_GET['id_uzivatele']) $_POST['id_uzivatele'] = $_GET['id_uzivatele'];
		if($_GET['smazat_logy']) smazat_logy();
		
		logy_uzivatele();
	}
	elseif($_GET['id'] == "zalohy")
	{
		echo "<h3>Zálohy</h3>
		<p>Zde můžete pracovat se zálohama systému. Zalohy je možné stáhnout, smazat či aplikovat na systém.</p>";
	
		if($_GET['smazat_zalohu']) smazat_zalohu();
		?>
					<div class="info" align="justify" id="plot_short">
						<p><a href="#" onClick="return show_hide('plot_short','plot_full')">vytvořit zálohu</a></p>
					</div>
					<div class="info2" align="justify" id="plot_full" style="display: none;">
						<?php vytvorit_zalohu(); ?>
					</div>
		<?php

		vypis_zaloh();
	}
	elseif($_GET['id'] == "udrzba")
	{
		echo "<h3>Údržba</h3>
		<p>Zde se nacházejí nástroje na čištění databáze.<br />Operace jsou náročné na výpočetní výkon serveru, skutečně spočítat množství dat k vyčištění?</p>
		<p><a href=\"?id=udrzba&prepocitat=prepocitat\">Provést výpočet nerelevantích dat</a></p>";
	
		if($_GET['cistit']) proved_udrzbu();
		if($_GET['prepocitat']) vypis_urzba();
	}
	elseif($_GET['id'] == "system")
	{
		echo "<h3>Verze systému</h3>";
		?>
					<div class="info" align="justify" id="plot_short">
						<p><a href="#" onClick="return show_hide('plot_short','plot_full')">přidat záznam</a></p>
					</div>
					<div class="info2" align="justify" id="plot_full" style="display: none;">
						<?php pridat_verzi_systemu(); ?>
					</div>
		<?php
		
		o_systemu();
	}
	elseif($_GET['id'] == "novinky")
	{
		echo "<h3>Novinky</h3>";
		?>
					<div class="info" align="justify" id="plot_short">
						<p><a href="#" onClick="return show_hide('plot_short','plot_full')">přidat záznam</a></p>
					</div>
					<div class="info2" align="justify" id="plot_full" style="display: none;">
						<?php pridat_novinku(); ?>
					</div>
		<?php
		
		vypis_novinek();
	}
	elseif($_GET['id'] == "cron")
	{
		echo "<h3>Cron</h3>";
		if($_GET['zapnout']) zapnout_cron();
		cron();
		if($_GET['smazat_logy']) log_cron_smazat();
		echo "<h4>Cron log</h4>";
		log_cron();
	}
}
elseif(login() && $_SESSION['prava_usr'] == "koordinator")
{
	if($_GET['id'] == "ukoly_uzivatelu")
	{
		echo "<h3>Úkoly uživatelů</h3>";

		if($_GET['id_uzivatele']) $_POST['id_uzivatele'] = $_GET['id_uzivatele'];
		if($_GET['smazat_ukoly']) smazat_ukoly();

		ukoly_uzivatele();
	}
	elseif($_GET['id'] == "logy_uzivatelu")
	{
		echo "<h3>Logy uživatelů</h3>";
	
		if($_GET['id_uzivatele']) $_POST['id_uzivatele'] = $_GET['id_uzivatele'];
		if($_GET['smazat_logy']) smazat_logy();
		
		logy_uzivatele();
	}
}

//KONEC OBSAHU STRÁNKY
patka();
?>