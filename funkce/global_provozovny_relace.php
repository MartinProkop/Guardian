<?php
function get_jmeno_objekt($objekt, $id)
{
	$result = dibi::query('SELECT * FROM [prevent_firmy_'.$objekt.'] WHERE [id] = %i', $id);
	$row = $result->fetch();
	return $row['jmeno'];
}

function get_id_firma_z_objekt($objekt ,$id)
{
	$result = dibi::query('SELECT * FROM [prevent_firmy_'.$objekt.'_relace] WHERE [id_'.$objekt.'] = %i', $id);
	$row = $result->fetch();
	$result2 = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [id] = %i', $row['id_provozovna']);
	$row2 = $result2->fetch();	
	$result3 = dibi::query('SELECT * FROM [prevent_firmy] WHERE [id] = %i', $row2['ad']);
	$row3 = $result3->fetch();
	return $row3['id'];
}

function get_id_provozovna_z_objekt($objekt ,$id)
{
	$result = dibi::query('SELECT * FROM [prevent_firmy_'.$objekt.'_relace] WHERE [id_'.$objekt.'] = %i', $id);
	$row = $result->fetch();
	$result2 = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [id] = %i', $row['id_provozovna']);
	$row2 = $result2->fetch();	
	return $row2['id'];
}

function get_nazev_objekt_z_id($objekt ,$id)
{
	$result = dibi::query('SELECT * FROM [prevent_firmy_'.$objekt.'] WHERE [id] = %i', $id);
	$row = $result->fetch();
	return $row['jmeno'];
}

function get_nazev_firmy($id)
{
	$result = dibi::query('SELECT * FROM [prevent_firmy] WHERE [id] = %i', $id);
	$row = $result->fetch();
	return $row['nazev'];
}

function get_id_firma_z_provozovny($id)
{
	$result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [id] = %i', $id);
	$row = $result->fetch();
	return $row['ad'];
}

function get_nazev_provozovny($id, $link)
{
	$result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [id] = %i', $id);
	$row = $result->fetch();
		
	if($_SESSION['prava_usr'] == "admin" || $_SESSION['prava_usr'] == "koordinator")
	{
		if($link)
		{
			return "<a href=\"./firmy_koordinator.php?id=detaily_provozovny&id_firmy=".$row['ad']."&id_provozovny=".$id."\"><img src=\"./design/detaily.png\"/>  ".$row['nazev']."</a>";
		}
		else
		{
			return $row['nazev'];	
		}
	}
	elseif($_SESSION['prava_usr'] == "technik")
	{
		if($link)
		{
			return "<a href=\"./firmy_technik.php?id=detaily_provozovny&id_firmy=".$row['ad']."&id_provozovny=".$id."\"><img src=\"./design/detaily.png\"/>  ".$row['nazev']."</a>";
		}
		else
		{
			return $row['nazev'];	
		}
		
	}
	elseif($_SESSION['prava_usr'] == "firma")
	{
		$result2 = dibi::query('SELECT * FROM [prevent_firmy_uzivatele_prava] WHERE [id_uzivatel] = %i', $_SESSION['id_usr']);
		$row2 = $result2->fetch();
	
		if($row2['prava'] == "admin")
		{
			if($link)
			{
				return "<a href=\"./zakaznik.php?id=detaily_provozovny&id_provozovny=".$id."\">".$row['nazev']."</a>";	
			}
			else
			{
				return $row['nazev'];	
			}			
		}
		else
		{
			if($link)
			{
				return "<a href=\"./zakaznik.php?id=detaily_provozovny&id_provozovny=".$id."\">".$row['nazev']."</a>";	
			}
			else
			{
				return $row['nazev'];	
			}				
		}
	}
}

function echo_relace_objekt($objekt ,$id)
{
	//preklad adres tabulek
	if($objekt == "budova")
	{
		$dotaz[0] = "SELECT * FROM [prevent_firmy_relace_budova_pracoviste]"; $rel_objekt[0] = "pracoviste"; $typ_relace = "budova_pracoviste";
	}
	elseif($objekt == "pracoviste")
	{
		$dotaz[0] = "SELECT * FROM [prevent_firmy_relace_budova_pracoviste]"; $rel_objekt[0] = "budova"; $typ_relace = "budova_pracoviste";
	}
	
	echo "<h4>Relace objektu</h4>";
	
	echo "<table class=\"table\">
	<tr>
	<td><span class=\"subheader\">AKCE</span></td>
	<td><span class=\"subheader\">objekt</span></td>
	<td><span class=\"subheader\">název</span></td>
	</tr>";
	for($i = 0; $i<count($dotaz); $i++)
	{
			$result = dibi::query($dotaz[$i].' WHERE [id_'.$objekt.'] = %i', $id);
			while($row = $result->fetch())
			{
				echo "<tr>
				<td><a href=\"./relace.php?id=smazat&smazat=".$row['id']."&typ_relace=".$typ_relace."\" onclick=\"if(confirm('Skutečně smazat relaci?')) location.href='./relace.php?id=smazat&smazat=".$row['id']."&typ_relace=".$typ_relace."'; return(false);\"><img src=\"./design/kos.png\" alt=\"smazat\" title=\"smazat\"></a></td>
				<td>".$rel_objekt[$i]."</td>
				<td><a href=\"./".$rel_objekt[$i].".php?id=detaily&id_".$rel_objekt[$i]."=".$row['id_'.$rel_objekt[$i]]."\">".get_jmeno_objekt($rel_objekt[$i], $row['id_'.$rel_objekt[$i]])."</td>
				</tr>";
			}
	
	}
	echo "</table>";
}

function echo_relace_objekt_provozovny($id, $prava)
{
	$objekt[0] = "budova";
	$objekt[1] = "pracoviste";
	
	echo "<h4>Objekty náležící pobočce</h4>";
	
	echo "<table class=\"table\">
	<tr>
	<td><span class=\"subheader\">AKCE</span></td>
	<td><span class=\"subheader\">typ objektu</span></td>
	<td><span class=\"subheader\">seznam</span></td>
	</tr>";
	for($i = 0; $i<count($objekt); $i++)
	{
		
		if($prava == "koordinator")
		{
			echo "<tr>
			<td><a href=\"./".$objekt[$i].".php?firma=".$_GET['id_firmy']."&provozovna=".$id."\"><img src=\"./design/detaily.png\" alt=\"detaily\" title=\"detaily\"/></a> <a href=\"./".$objekt[$i].".php?id=nova&id_provozovna=".$id."&id_firma=".$_GET['id_firmy']."\"><img src=\"./design/pridat.png\" alt=\"přidat\" title=\"přidat\" /></a></td>
			<td>".$objekt[$i]."</td>
			<td>";		
		}
		elseif($prava == "technik")
		{
			echo "<tr>
			<td><a href=\"./".$objekt[$i].".php?firma=".$_GET['id_firmy']."&provozovna=".$id."\"><img src=\"./design/detaily.png\" alt=\"detaily\" title=\"detaily\"/></a></td>
			<td>".$objekt[$i]."</td>
			<td>";		
		}
		elseif($prava == "zakaznik_admin")
		{
			echo "<tr>
			<td><a href=\"./".$objekt[$i].".php?firma=".$_GET['id_firmy']."\"><img src=\"./design/detaily.png\" alt=\"detaily\" title=\"detaily\"/></a> <a href=\"./".$objekt[$i].".php?id=nova&id_provozovna=".$id."&id_firma=".$_GET['id_firmy']."\"><img src=\"./design/pridat.png\" alt=\"přidat\" title=\"přidat\" /></a></td>
			<td>".$objekt[$i]."</td>
			<td>";		
		}
		elseif($prava == "zakaznik")
		{
			echo "<tr>
			<td><a href=\"./".$objekt[$i].".php?firma=".$_GET['id_firmy']."\"><img src=\"./design/detaily.png\" alt=\"detaily\" title=\"detaily\"/></a></td>
			<td>".$objekt[$i]."</td>
			<td>";		
		}
	
		$result = dibi::query('SELECT * FROM [prevent_firmy_'.$objekt[$i].'_relace] WHERE [id_provozovna] = %i', $id);
		while($row = $result->fetch())
		{
			echo "<a href=\"./".$objekt[$i].".php?id=detaily&id_".$objekt[$i]."=".$row['id_'.$objekt[$i]]."\"><img src=\"./design/detaily.png\"/> ".get_jmeno_objekt($objekt[$i], $row['id_'.$objekt[$i]])."</a>, ";
		}
		
		echo "</td></tr>";
	
	}
	echo "</table>";
}