<?php
//include
require("./header/header_posta.php");

//START OBSAHU STRÁNKY
if(login())
{
	echo "<h3>Pošta</h3>";

	if($_GET['smazat']) smazat();
	
	$result = dibi::query('SELECT * FROM [prevent_posta] WHERE ([prijemce_id] = %i', $_SESSION['id_usr'], 'AND [stav_prijemce] != %s)', "smazana");
	$radkyprijemce = $result->count();
	$result = dibi::query('SELECT * FROM [prevent_posta] WHERE ([odesilatel_id] = %i', $_SESSION['id_usr'], 'AND [stav_odesilatel] != %s)', "smazana");
	$radkyodesilatel = $result->count();

        if($_POST['prijemce_id']) $_GET['adresat'] = null;
        if($_GET['adresat'])
        {
            echo "<body onLoad=\"show_hide('plot_short','plot_full')\">";

        }
?>
  <div class="info" align="justify" id="plot_short">
    <p><a href="#" onClick="return show_hide('plot_short','plot_full')"><img src="./design/pridat.png" /> nová zpráva</a> |
    <?php 
		if($_SESSION['prava_usr'] == "admin" || $_SESSION['prava_usr'] == "koordinator")
		echo "<a href=\"#\" onClick=\"return show_hide('plot_short','plot_full_hromadna')\"><img src=\"./design/pridat.png\" /> hromadná pošta</a> | ";
    ?>
    <a href="?id=prijata">přijatá (<?php echo $radkyprijemce;?> zpráv)</a> | 
    <a href="?id=odeslana">odeslaná (<?php echo $radkyodesilatel;?> zpráv)</a></p>
  </div>
  <div class="info2" align="justify" id="plot_full" style="display: none;">
  <?php poslat_zpravu(); ?>
  </div>
  <div class="info2" align="justify" id="plot_full_hromadna" style="display: none;">
  <?php poslat_hromadnou_zpravu(); ?>
  </div>
<?php

	if ($_GET['id'] == "prijata") prijata_posta();
	elseif ($_GET['id'] == "odeslana") odeslana_posta();
}

//KONEC OBSAHU STRÁNKY
patka();
?>
