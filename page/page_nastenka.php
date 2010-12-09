<?php
function over_prava_na_nastenku($nastenka, $id)
{
	if($_SESSION['prava_usr'] == "admin" || $_SESSION['prava_usr'] == "koordinator")
	{
		return true;
	}
	elseif($_SESSION['prava_usr'] == "technik")
	{
		if($nastenka == 0) return true;
		else
		{
				$result = dibi::query('SELECT * FROM [prevent_firmy_technik] WHERE [id_technik] = %i', $_SESSION['id_usr']);
				while ($row = $result->fetch())
				{
					if($row['id_firma'] == $nastenka) return true;
				}
				return false;
		}
	}
	elseif($_SESSION['prava_usr'] == "firma")
	{
		$result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $_SESSION['id_usr']);
		$row = $result->fetch();
		if($row['ad'] == $nastenka) return true;
		else return false;
	}
}

function vypis_nastenky($nastenka)
{
	if($nastenka == 0) echo "<h4>Obecná</h4><br />";
	else
	{
		$result = dibi::query('SELECT * FROM [prevent_firmy] WHERE [id] = %i', $nastenka);
		$row = $result->fetch();
		echo"<h4>Klient <em>".$row['nazev']."</em></h4><br />";
	}

	$result = dibi::query('SELECT * FROM [prevent_nastenka] WHERE [typ] = %i', $nastenka);
	$radky = $result->count();

	$limit1 = $_GET['pozice'];
	if($limit1 == null) $limit1 = 0;
	$limit2 = $_SESSION['pocet_prvku_zobrazeni_usr'];
	if($radky < $limit2) $limit2 = $radky;

	$posun_new = $limit1 - $limit2;
	$posun_old = $limit1 + $limit2;

	$last = " | <a href=\"?id_nastenky=".$_GET['id_nastenky']."&pozice=$posun_old\">starší ></a>";
	$next = "<a href=\"?id_nastenky=".$_GET['id_nastenky']."&pozice=$posun_new\">< novější</a> | ";

	$hlaskaklimitu1 = $limit1 + 1;
	$hlaskaklimitu2 = $limit1 + $limit2;

	if($radky <= $hlaskaklimitu2)
	{
		$hlaskaklimitu2 = $radky;
		$last = "&nbsp;";
	}

	if ($limit1 == 0) $next = "&nbsp;";

	$result = dibi::query('SELECT * FROM [prevent_nastenka] WHERE [typ] = %i', $nastenka, 'ORDER BY [id] DESC LIMIT %i, %i', $limit1 , $limit2);
	while ($row= $result->fetch())
	{
		$result2 = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $row['ad']);
		$row2 = $result2->fetch();
		echo "<p><strong>".$row2['jmeno']."</strong> (<i>".Date("H:i d.m.Y", $row['date'])."</i>)<br />".nl2br($row['text'])."</p><div class=\"caradown\"></div>";	
	}

	echo "<p>$next <strong>$hlaskaklimitu1</strong> - <strong>$hlaskaklimitu2</strong> z <strong>$radky</strong>$last</p>";

	$result = dibi::query('SELECT * FROM [prevent_nastenka]  WHERE [typ] = %i', $nastenka, 'ORDER BY [id] DESC LIMIT %i, %i', 0 , 1);
	$row = $result->fetch();
	
	dibi::query('UPDATE [prevent_nastenka_shlednuto] SET [pozice] = %i', $row['id'], 'WHERE [id_uzivatel] = %i', $_SESSION['id_usr'], 'AND [id_nastenka] = %i', $nastenka);
}

function pridat_zaznam()
{
	if(IsSet($_POST['text']))
	{
		$arr = array('ad' => $_SESSION['id_usr'], 'typ' => $_GET['id_nastenky'], 'text'  => $_POST['text'], 'date' => Time());	
		dibi::query('INSERT INTO [prevent_nastenka]', $arr);
	}

	echo "<form method=\"POST\" action=\"?id_nastenky=".$_GET['id_nastenky']."\" name=\"navstevni kniha\" id=\"nastenka\">
	<fieldset>
	<legend>nový záznam</legend>
        <label for=\"text\">text</label><br />
	<textarea name=\"text\" class=\"formular\" id=\"text\" rows=\"6\" cols=\"35\"></textarea><br />
	<input class=\"tlacitko\" type=\"submit\" value=\"přidat záznam\"> <a href=\"#\" onClick=\"return hide_show('plot_short','plot_full')\">nepřidávat</a>
	</fieldset>
	</form>
           <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#nastenka').validate({
             rules: {
               text: {
                 required: true
               }

               }
             });
           });
           </script>";
}
?>