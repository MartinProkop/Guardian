<?php
//include
require("./header/header_uzivatelske_ukoly.php");

//START OBSAHU STRÁNKY
if(login() && ($_SESSION['prava_usr'] == "admin" || $_SESSION['prava_usr'] == "koordinator"))
{
    if ($_POST['firma'])
        echo "<body onLoad=\"show_hide('plot_short_audit_zadat','plot_full_audit_zadat')\">";
	echo "<h3>Zadávání ukolů</h3>";


        if($_GET['zadat_audit'] == "ano")
        {
            echo "<body onLoad=\"show_hide('plot_short_audit_zadat','plot_full_audit_zadat')\">";
        }
?>
  <div class="info" align="justify" id="plot_short">
    <p><a href="#" onClick="return show_hide('plot_short','plot_full')"><img src="./design/pridat.png" /> zadat nový úkol</a></p>
  </div>
  <div class="info2" align="justify" id="plot_full" style="display: none;">
  <?php zadat_ukol(); ?>

  </div>

  <div class="infox" align="justify" id="plot_short_audit_zadat">
    <p><a href="#" onClick="return show_hide('plot_short_audit_zadat','plot_full_audit_zadat')"><img src="./design/pridat.png" /> zadat audit</a></p>
  </div>
  <div class="info2x" align="justify" id="plot_full_audit_zadat" style="display: none;">
  <?php zadat_audit("uzivatelske_ukoly"); ?>

  </div>
<?php
vypis_zadanych_ukolu();
}

//KONEC OBSAHU STRÁNKY
patka();
?>
