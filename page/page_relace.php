<?php
function relace_uzivatele()
{
	if($_SESSION['prava_usr'] == "koordinator" || $_SESSION['prava_usr'] == "admin")
	{
		echo "<form method=\"POST\" action=\"./relace.php?id=detaily\" name=\"najdi budovu\" \">
		<fieldset>
		<legend>Zvolte relaci</legend>
		<label for=\"firma\">klient</label><br />
		<select name=\"firma\" id=\"firma\" class=\"formular\">";
		$result = dibi::query('SELECT * FROM [prevent_firmy] ORDER BY [nazev] ASC');
		while($row = $result->fetch()) 
		{	
			if($_POST['firma'] || $_GET['firma'])
			{
				$check = "";
				if(!$_POST['firma']) $_POST['firma'] = $_GET['firma'];
				if($row['id'] == $_POST['firma']) $check = "selected";
			}
			echo "<option $check value=\"".$row['id']."\">".$row['nazev']."</option>";
		}
		echo "</select><br />
		
		<label for=\"typ_relace\">relace</label><br />
		<select name=\"typ_relace\" id=\"typ_relace\" class=\"formular\">
		<option value=\"budova_pracoviste\">BUDOVA * PRACOVIŠTĚ</option>
		</select><br />";
		
		echo "<input class=\"tlacitko\" type=\"submit\" value=\"pokračovat\">
		</fieldset>
		</form><br />";
	}
	elseif($_SESSION['prava_usr'] == "technik")
	{
		echo "<form method=\"POST\" action=\"./relace.php?id=detaily\" name=\"najdi osobu\" \">
		<fieldset>
		<legend>Zvolte relaci</legend>
		<label for=\"firma\">klient</label><br />
		<select name=\"firma\" id=\"firma\" class=\"formular\">";
		$result = dibi::query('SELECT * FROM [prevent_firmy_technik] WHERE [id_technik] = %i', $_SESSION['id_usr']);
		while ($row = $result->fetch())
		{
			$result2 = dibi::query('SELECT * FROM [prevent_firmy] WHERE [id] = %i', $row['id_firma']);
			$row2 = $result2->fetch();
			if($_POST['firma'] || $_GET['firma'])
			{
				$check = "";
				if(!$_POST['firma']) $_POST['firma'] = $_GET['firma'];
				if($row2['id'] == $_POST['firma']) $check = "selected";
			}
			echo "<option $check value=\"".$row2['id']."\">".$row2['nazev']."</option>";
		}	
		echo "</select><br />
		
		<label for=\"typ_relace\">relace</label><br />
		<select name=\"typ_relace\" id=\"typ_relace\" class=\"formular\">
		<option value=\"budova_pracoviste\">BUDOVA * PRACOVIŠTĚ</option>
		</select><br />";

		echo "<input class=\"tlacitko\" type=\"submit\" value=\"vypsat\">
		</fieldset>
		</form><br />";
	}
	elseif($_SESSION['prava_usr'] == "zakaznik")
	{
		
		
	}
}

function detaily_relace($id_firma, $typ_relace)
{
	$nazev_relace = explode("_", $typ_relace);
	echo "<h5>klient: ".get_nazev_firmy($id_firma)."<br />relace: ".$nazev_relace[0]." * ".$nazev_relace[1]."</h5>";
	
	echo "<h4>Přidat relaci</h4>";
	?>
			<div class="info" align="justify" id="plot_short">
				<p><a href="#" onClick="return show_hide('plot_short','plot_full')"><img src="./design/pridat.png" /> přidat relaci</a></p>
			</div>
			<div class="info2" align="justify" id="plot_full" style="display: none;">
				<?php
					pridat_relace_form($id_firma, $typ_relace, false);
				?>
			</div>
	<?php	
	echo "<h4>Existující relace</h4>";
	echo "<table class=\"table\">
	<tr>
	<td><span class=\"subheader\">AKCE</span></td>
	<td><span class=\"subheader\">pobočka</span></td>
	<td><span class=\"subheader\">".$nazev_relace[0]."</span></td>
	<td><span class=\"subheader\">".$nazev_relace[1]."</span></td>
	</tr>";
	$result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $id_firma);
	while($row = $result->fetch())
	{
		$result2 = dibi::query('SELECT * FROM [prevent_firmy_relace_'.$typ_relace.'] WHERE [id_provozovna] = %i', $row['id']);
		while($row2 = $result2->fetch())
		{
				echo "<tr>
				<td><a href=\"./relace.php?id=smazat&smazat=".$row2['id']."&typ_relace=".$_POST['typ_relace']."\" onclick=\"if(confirm('Skutečně smazat relaci?')) location.href='./relace.php?id=smazat&smazat=".$row2['id']."&typ_relace=".$_POST['typ_relace']."'; return(false);\"><img src=\"./design/kos.png\" alt=\"smazat\" title=\"smazat\"></a></td>
				<td>".get_nazev_provozovny($row['id'], true)."</span></td>
				<td><a href=\"./".$nazev_relace[0].".php?id=detaily&id_".$nazev_relace[0]."=".$row2['id_'.$nazev_relace[0]]."\"><img src=\"./design/detaily.png\"/> ".get_jmeno_objekt($nazev_relace[0], $row2['id_'.$nazev_relace[0]])."</a></td>
				<td><a href=\"./".$nazev_relace[1].".php?id=detaily&id_".$nazev_relace[1]."=".$row2['id_'.$nazev_relace[1]]."\"><img src=\"./design/detaily.png\"/> ".get_jmeno_objekt($nazev_relace[1], $row2['id_'.$nazev_relace[1]])."</a></td>
				</tr>";
		}
	}		
	echo "</table>";
	
	echo "<h4>Objekty bez relace</h4>";
	echo "<h5>".$nazev_relace[0]."</h5>";
	echo "<table class=\"table\">
	<tr>
	<td><span class=\"subheader\">AKCE</span></td>
	<td><span class=\"subheader\">pobočka</span></td>
	<td><span class=\"subheader\">".$nazev_relace[0]."</span></td>
	</tr>";
	$result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $id_firma);
	while($row = $result->fetch())
	{
		$result2 = dibi::query('SELECT * FROM [prevent_firmy_'.$nazev_relace[0].'_relace] WHERE [id_provozovna] = %i', $row['id']);
		while($row2 = $result2->fetch())
		{
			$result3 = dibi::query('SELECT * FROM [prevent_firmy_'.$nazev_relace[0].'] WHERE [id] = %i', $row2['id_'.$nazev_relace[0]]);
			while($row3 = $result3->fetch())
			{
				$result4 = dibi::query('SELECT * FROM [prevent_firmy_relace_'.$typ_relace.'] WHERE [id_'.$nazev_relace[0].'] = %i', $row2['id_'.$nazev_relace[0]]);
				if(!$result4->fetch())
				{
					echo "<tr>
					<td>zatim nic</td>
					<td>".get_nazev_provozovny($row['id'], true)."</td>
					<td><a href=\"./".$nazev_relace[0].".php?id=detaily&id_".$nazev_relace[0]."=".$row2['id_'.$nazev_relace[0]]."\"><img src=\"./design/detaily.png\"/> ".get_jmeno_objekt($nazev_relace[0], $row2['id_'.$nazev_relace[0]])."</a></td>
					</tr>";
				}
			}
		}		
	}
	echo "</table>";

	echo "<h5>".$nazev_relace[1]."</h5>";
	echo "<table class=\"table\">
	<tr>
	<td><span class=\"subheader\">AKCE</span></td>
	<td><span class=\"subheader\">pobočka</span></td>
	<td><span class=\"subheader\">".$nazev_relace[1]."</span></td>
	</tr>";
	$result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $id_firma);
	while($row = $result->fetch())
	{
		$result2 = dibi::query('SELECT * FROM [prevent_firmy_'.$nazev_relace[1].'_relace] WHERE [id_provozovna] = %i', $row['id']);
		while($row2 = $result2->fetch())
		{
			$result3 = dibi::query('SELECT * FROM [prevent_firmy_'.$nazev_relace[1].'] WHERE [id] = %i', $row2['id_'.$nazev_relace[1]]);
			while($row3 = $result3->fetch())
			{
				$result4 = dibi::query('SELECT * FROM [prevent_firmy_relace_'.$typ_relace.'] WHERE [id_'.$nazev_relace[1].'] = %i', $row2['id_'.$nazev_relace[1]]);
				if(!$result4->fetch())
				{
					echo "<tr>
					<td>zatim nic</td>
					<td>".get_nazev_provozovny($row['id'], true)."</td>
					<td><a href=\"./".$nazev_relace[1].".php?id=detaily&id_".$nazev_relace[1]."=".$row2['id_'.$nazev_relace[1]]."\"><img src=\"./design/detaily.png\"/> ".get_jmeno_objekt($nazev_relace[1], $row2['id_'.$nazev_relace[1]])."</a></td>
					</tr>";
				}
			}
		}		
	}
	echo "</table>";
}

function pridat_relace_form($id_firma ,$typ_relace, $repeat)
{
	$nazev_relace = explode("_", $typ_relace);
	
	echo "<form method=\"POST\" action=\"./relace.php?id=pridat&firma=".$id_firma."&typ_relace=".$typ_relace."\" name=\"pridej relaci\" >
	<fieldset>
	<legend>Nová relace</legend>
	<label for=\"".$nazev_relace[0]."\">".$nazev_relace[0]." (počet relací)</label><br />
	<select name=\"id_objekt1\" id=\"".$nazev_relace[0]."\" size=\"8\" class=\"formular\">";
	$result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $id_firma);
	while($row = $result->fetch())
	{
		echo "<optgroup label=\"".get_nazev_provozovny($row['id'], false)."\">";
		$result2 = dibi::query('SELECT * FROM [prevent_firmy_'.$nazev_relace[0].'_relace] WHERE [id_provozovna] = %i', $row['id']);
		while($row2 = $result2->fetch())
		{
			$result3 = dibi::query('SELECT * FROM [prevent_firmy_'.$nazev_relace[0].'] WHERE [id] = %i', $row2['id_'.$nazev_relace[0]]);
			while($row3 = $result3->fetch())
			{
				$result4 = dibi::query('SELECT * FROM [prevent_firmy_relace_'.$typ_relace.'] WHERE [id_'.$nazev_relace[0].'] = %i', $row3['id']);
				$pocet = $result4->count();
				echo "<option value=\"".$row3['id']."\"><i>".$row3['jmeno']." (".$pocet.")</option>";		
			}
		}
		echo "</optgroup>";
	}
	echo "</select><br />
	<label for=\"".$nazev_relace[1]."\">".$nazev_relace[1]." (počet relací)</label><br />
	<select name=\"id_objekt2\" id=\"".$nazev_relace[1]."\" size=\"8\" class=\"formular\">";
	$result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $id_firma);
	while($row = $result->fetch())
	{
		echo "<optgroup label=\"".get_nazev_provozovny($row['id'], false)."\">";
		$result2 = dibi::query('SELECT * FROM [prevent_firmy_'.$nazev_relace[1].'_relace] WHERE [id_provozovna] = %i', $row['id']);
		while($row2 = $result2->fetch())
		{
			$result3 = dibi::query('SELECT * FROM [prevent_firmy_'.$nazev_relace[1].'] WHERE [id] = %i', $row2['id_'.$nazev_relace[1]]);
			while($row3 = $result3->fetch())
			{
				$result4 = dibi::query('SELECT * FROM [prevent_firmy_relace_'.$typ_relace.'] WHERE [id_'.$nazev_relace[1].'] = %i', $row3['id']);
				$pocet = $result4->count();
				echo "<option value=\"".$row3['id']."\"><i>".$row3['jmeno']." (".$pocet.")</option>";		
			}
		}
		echo "</optgroup>";
	}
	echo "</select><br />				
	<input class=\"tlacitko\" type=\"submit\" value=\"přidat\">";
	if($repeat) echo "<a href=\"relace.php?id=detaily&firma=".$id_firma."&typ_relace=".$typ_relace."\" \">nepřidávat</a>";
	else echo "<a href=\"#\" onClick=\"return hide_show('plot_short','plot_full')\">nepřidávat</a>";
	echo "</form>";
}

function pridat_relace($id_objekt1, $id_objekt2 ,$typ_relace)
{
	$nazev_relace = explode("_", $typ_relace);
	
	$result_obj1 = dibi::query('SELECT * FROM [prevent_firmy_'.$nazev_relace[0].'] WHERE [id] = %i', $id_objekt1);
	$row_obj1 = $result_obj1->fetch();
	$result_obj2 = dibi::query('SELECT * FROM [prevent_firmy_'.$nazev_relace[1].'] WHERE [id] = %i', $id_objekt2);
	$row_obj2 = $result_obj2->fetch();
	$id_provozovna_obj1 = get_id_provozovna_z_objekt($nazev_relace[0] ,$id_objekt1);
	$id_provozovna_obj2 = get_id_provozovna_z_objekt($nazev_relace[1] ,$id_objekt2);
	
	$result_is_exist = dibi::query('SELECT * FROM [prevent_firmy_relace_'.$typ_relace.'] WHERE [id_'.$nazev_relace[0].'] = %i', $id_objekt1, 'AND [id_'.$nazev_relace[1].'] = %i', $id_objekt2);
	
	
	//overeni chyb, spatny provozovny
	if($id_provozovna_obj1 != $id_provozovna_obj2)
	{
		echo "<h4>Relaci nelze vytvořit</h4><h5>V relaci nemouhou být objekty příslušící různým provozovnám.</h5>";
		return false;
	}
	elseif($row_is_exist = $result_is_exist->fetch())
	{
		echo "<h4>Relaci nelze vytvořit</h4><h5>Váme zvolené objekty již v relaci jsou.</h5>";
		return false;		
	}
	else
	{
		$provozovna = get_nazev_provozovny($id_provozovna_obj1, false);
		
		$arr_log = array('text'  => 'Vytvořena relace provozovny '.$provozovna.' mezi: '.get_jmeno_objekt($nazev_relace[0], $id_objekt1).' ('.$nazev_relace[0].') * '.get_jmeno_objekt($nazev_relace[1], $id_objekt2).' ('.$nazev_relace[1].')', 'link' => '', 'ad' => get_id_firma_z_objekt($nazev_relace[0], $id_objekt1));
		vytvor_log_firmy($arr_log);
		
		$arr = array('id_provozovna' => $id_provozovna_obj1, 'id_'.$nazev_relace[0] => $id_objekt1, 'id_'.$nazev_relace[1] => $id_objekt2);
		dibi::query('INSERT INTO [prevent_firmy_relace_'.$typ_relace.']', $arr);	
	
		echo "<h4>Relace vytvořena</h4><p>Pokračujte zpět na <a href=\"./relace.php?id=detaily&firma=".get_id_firma_z_objekt($nazev_relace[0], $id_objekt1)."&typ_relace=".$typ_relace."\">detaily relace</a>.</p>";		
	}
	return true;
}

function smazat_relace($id, $typ_relace)
{
	$nazev_relace = explode("_", $typ_relace);
	
	$result = dibi::query('SELECT * FROM [prevent_firmy_relace_'.$typ_relace.'] WHERE [id] = %i', $id);
	$row = $result->fetch();
	$objekt1id = $row['id_'.$nazev_relace[0]];
	$objekt2id = $row['id_'.$nazev_relace[1]];
	$provozovna = get_nazev_provozovny($row['id_provozovna'], false);
	$arr_log = array('text'  => 'Smazána relace provozovny '.$provozovna.' mezi: '.get_jmeno_objekt($nazev_relace[0], $objekt1id).' ('.$nazev_relace[0].') * '.get_jmeno_objekt($nazev_relace[1], $objekt2id).' ('.$nazev_relace[1].')', 'link' => '', 'ad' => get_id_firma_z_objekt($nazev_relace[0], $objekt1id));
	vytvor_log_firmy($arr_log);
	dibi::query('DELETE FROM [prevent_firmy_relace_'.$typ_relace.'] WHERE [id] = %i', $id);
	echo "<h4>Relace smazána</h4><p>Pokračujte zpět na <a href=\"./relace.php?id=detaily&firma=".get_id_firma_z_objekt($nazev_relace[0], $objekt1id)."&typ_relace=".$typ_relace."\">detaily relace</a>.</p>";		
}
?>