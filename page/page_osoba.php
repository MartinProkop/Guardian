<?php
function vyhledat_osobu_koordinator()
{
	if(!$_POST['firma']) $_POST['firma'] = $_GET['firma'];
	if(!$_POST['provozovna'] && $_POST['provozovna'] != "all") $_POST['provozovna'] = $_GET['provozovna'];
	
	echo "<form method=\"POST\" action=\"".$_SERVER['REQUEST_URI']."\" name=\"najdi osobu\" \">
	<fieldset>
	<legend>Název klienta</legend>
	<label for=\"firma\">klient</label><br />
	<select name=\"firma\" id=\"firma\" class=\"formular\">";
	
	$result = dibi::query('SELECT * FROM [prevent_firmy] ORDER BY [nazev] ASC');
	while($row = $result->fetch())
	{
		if($_POST['firma'])
		{
			$check = "";
			if($row['id'] == $_POST['firma']) $check = "selected";
		}
		echo "<option $check value=\"".$row['id']."\">".$row['nazev']."</option>";
	}
	echo "</select><br />";
	
	if($_POST['firma'])
	{
		echo "<label for=\"provozovna\">pobočka</label><br />
		<select name=\"provozovna\" id=\"provozovna\" class=\"formular\">
		<option value=\"all\">-----</option>";
		$result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $_POST['firma']);
		while($row = $result->fetch())
		{
			if($_POST['provozovna'])
			{
				$check2 = "";

				if($row['id'] == $_POST['provozovna']) $check2 = "selected";
			}
			echo "<option $check2 value=\"".$row['id']."\">".$row['nazev']."</option>";
		}
		echo "</select><br />";
	}
	echo "<input class=\"tlacitko\" type=\"submit\" value=\"vypsat\">
	</fieldset>
	</form><br />";
		
	if($_POST['firma'])
	{
		echo "<table class=\"table\">
		<tr>
		<td><span class=\"subheader\">AKCE</span></td>
		<td><span class=\"subheader\">JMÉNO</span></td>
		<td><span class=\"subheader\">POBOČKA</span></td>
		<td><span class=\"subheader\">POZICE</span></td>
		</tr>";
		if($_POST['provozovna'] && $_POST['provozovna'] != "all")
		{
			$result = dibi::query('SELECT * FROM [prevent_firmy_osoba] WHERE [id_firma] = %i', $_POST['firma']);
			while($row = $result->fetch())
			{
				$result2 = dibi::query('SELECT * FROM [prevent_firmy_osoba_relace] WHERE [id_osoba] = %i', $row['id'], 'AND [objekt] = %s', "provozovna", 'AND [id_objekt] = %i', $_POST['provozovna']);
				while($row2 = $result2->fetch())
				{
					echo_table_osoba($row['id'], $_POST['provozovna']);
				}
			}		
		}
		else
		{
			$result = dibi::query('SELECT * FROM [prevent_firmy_osoba] WHERE [id_firma] = %i', $_POST['firma']);
			while($row = $result->fetch())
			{
				$result2 = dibi::query('SELECT * FROM [prevent_firmy_osoba_relace] WHERE [id_osoba] = %i', $row['id'], 'AND [objekt] = %s', "firma");
				while($row2 = $result2->fetch())
				{
					echo_table_osoba($row['id'], "");
				}
			}			
		}
		echo "</table>
		<p>Přejít na <a href=\"./firmy_koordinator.php?id=detaily_firmy&id_firmy=".$_POST['firma']."\"><img src=\"./design/detaily.png\"/> detaily klienta</a>.</p>";
	}
}

function vyhledat_osobu_technik()
{
	if(!$_POST['firma']) $_POST['firma'] = $_GET['firma'];
	if(!$_POST['provozovna'] && $_POST['provozovna'] != "all") $_POST['provozovna'] = $_GET['provozovna'];		
	
	echo "<form method=\"POST\" action=\"".$_SERVER['REQUEST_URI']."\" name=\"najdi osobu\" \">
	<fieldset>
	<legend>Název klienta</legend>
	<select name=\"firma\" class=\"formular\">";
	$result = dibi::query('SELECT * FROM [prevent_firmy_technik] WHERE [id_technik] = %i', $_SESSION['id_usr']);
	while ($row = $result->fetch())
	{
		$result2 = dibi::query('SELECT * FROM [prevent_firmy] WHERE [id] = %i', $row['id_firma']);
		$row2 = $result2->fetch();
		if($_POST['firma'])
		{
			$check = "";
			if($row2['id'] == $_POST['firma']) $check = "selected";
		}
		echo "<option $check value=\"".$row2['id']."\">".$row2['nazev']."</option>";
	}
	echo "</select><br />";
	
	if($_POST['firma'])
	{
		echo "<label for=\"provozovna\">pobočka</label><br />
		<select name=\"provozovna\" id=\"provozovna\" class=\"formular\">
		<option value=\"all\">-----</option>";
		$result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $_POST['firma']);
		while($row = $result->fetch())
		{
			if($_POST['provozovna'])
			{
				$check2 = "";
				if($row['id'] == $_POST['provozovna']) $check2 = "selected";
			}
			echo "<option $check2 value=\"".$row['id']."\">".$row['nazev']."</option>";
		}
		echo "</select><br />";
	}
	echo "<input class=\"tlacitko\" type=\"submit\" value=\"vypsat\">
	</fieldset>
	</form><br />";
	
	if($_POST['firma'])
	{
		echo "<table class=\"table\">
		<tr>
		<td><span class=\"subheader\">AKCE</span></td>
		<td><span class=\"subheader\">JMÉNO</span></td>
		<td><span class=\"subheader\">pobočka</span></td>
		<td><span class=\"subheader\">POZICE</span></td>
		</tr>";
		
		if($_POST['provozovna'] && $_POST['provozovna'] != "all")
		{
			$result = dibi::query('SELECT * FROM [prevent_firmy_osoba] WHERE [id_firma] = %i', $_POST['firma']);
			while($row = $result->fetch())
			{
				$result2 = dibi::query('SELECT * FROM [prevent_firmy_osoba_relace] WHERE [id_osoba] = %i', $row['id'], 'AND [objekt] = %s', "provozovna", 'AND [id_objekt] = %i', $_POST['provozovna']);
				while($row2 = $result2->fetch())
				{
					echo_table_osoba($row['id'], $_POST['provozovna']);
				}
			}		
		}
		else
		{
			$result = dibi::query('SELECT * FROM [prevent_firmy_osoba] WHERE [id_firma] = %i', $_POST['firma']);
			while($row = $result->fetch())
			{
				$result2 = dibi::query('SELECT * FROM [prevent_firmy_osoba_relace] WHERE [id_osoba] = %i', $row['id'], 'AND [objekt] = %s', "firma");
				while($row2 = $result2->fetch())
				{
					echo_table_osoba($row['id'], "");
				}
			}			
		}
		echo "</table>
		<p>Přejít na <a href=\"./firmy_technik.php?id=detaily_firmy&id_firmy=".$_POST['firma']."\"><img src=\"./design/detaily.png\"/> detaily klienta</a>.</p>";
	}
}

function vyhledat_osoba_zakaznik()
{
	echo "<table class=\"table\">
	<tr>
	<td><span class=\"subheader\">AKCE</span></td>
	<td><span class=\"subheader\">JMÉNO</span></td>
	<td><span class=\"subheader\">POZICE</span></td>
	</tr>";

	$result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $_SESSION['firma_usr']);
	while($row = $result->fetch())
	{
		$pojistka_postu++;
		$result2 = dibi::query('SELECT * FROM [prevent_firmy_osoba_relace] WHERE [objekt] = %s', "provozovna", 'AND [id_objekt] = %i', $row['id']);
		while($row2 = $result2->fetch())
		{
			if($row2['id_osoba'] == $predchozi_id) $pojistka_postu++;
			else $pojistka_postu = 0;
			
			$predchozi_id = $row2['id_osoba'];
			
			if(!($pojistka_postu > 0)) echo_table_osoba($row2['id_osoba'], $row['id']);					
		}
	}
	$result = dibi::query('SELECT * FROM [prevent_firmy_osoba_relace] WHERE [objekt] = %s', "firma", 'AND [id_objekt] = %i', $_SESSION['firma_usr']);
	while($row = $result->fetch())
	{	
		echo_table_osoba($row['id_osoba'], "");
	}
	echo "</table>";		
}
function echo_table_osoba($id, $id_provozovna)
{
	$result = dibi::query('SELECT * FROM [prevent_firmy_osoba] WHERE [id] = %i', $id);
	$row = $result->fetch();
	echo "<tr>
	<td><a href=\"./osoba.php?id=detaily&id_osoba=".$row['id']."\"><img src=\"./design/detaily.png\" alt=\"detaily\" title=\"detaily\"></a></td>
	<td>".$row['jmeno']."</td>";
	if($id_provozovna) echo "<td>".get_nazev_provozovny($id_provozovna, false)."</td>";
	else  echo "<td>nazeží klientovi</td>";
	echo"<td>".echo_pozice_osoba($id)."</td>
	</tr>";
}

function echo_pozice_osoba($id)
{
	$string = "";
	$result = dibi::query('SELECT * FROM [prevent_firmy_osoba_relace] WHERE [id_osoba] = %i', $id);
	while($row = $result->fetch())
	{
		$result2 = dibi::query('SELECT * FROM [prevent_firmy_osoba_preklad] WHERE [typ] = %s', $row['typ']);
		$row2 = $result2->fetch();
		$string = $string.$row2['preklad'].", ";
	}
	return $string;
}

function echo_detail_osoba($id, $akce)
{
	$result = dibi::query('SELECT * FROM [prevent_firmy_osoba] WHERE [id] = %i', $id);
	$row = $result->fetch();
	echo "<table class=\"table\">
	<tr>
	<td><span class=\"subheader\">akce</span></td>
	<td>";
	if($akce == "koordinator")
	{
		echo "<a href=\"./osoba.php?id=upravit&id_osoba=".$row['id']."\"><img src=\"./design/edit.png\" alt=\"upravit\" title=\"upravit\"></a> <a href=\"./osoba.php?id=smazat&id_osoba=".$row['id']."\" onclick=\"if(confirm('Skutečně smazat osobu?')) location.href='./osoba.php?id=smazat&id_osoba=".$row['id']."'; return(false);\"><img src=\"./design/kos.png\" alt=\"smazat\" title=\"smazat\"></a>";
	}
	elseif($akce == "technik")
	{
		echo "<a href=\"./osoba.php?id=upravit&id_osoba=".$row['id']."\"><img src=\"./design/edit.png\" alt=\"upravit\" title=\"upravit\"></a> <a href=\"./osoba.php?id=smazat&id_osoba=".$row['id']."\" onclick=\"if(confirm('Skutečně smazat osobu?')) location.href='./osoba.php?id=smazat&id_osoba=".$row['id']."'; return(false);\"><img src=\"./design/kos.png\" alt=\"smazat\" title=\"smazat\"></a>";
	}
	elseif($akce == "zakaznik")
	{
		echo "---";
	}
	elseif($akce == "zakaznik_admin")
	{
		echo "<a href=\"./osoba.php?id=upravit&id_osoba=".$row['id']."\">upravit</a> <a href=\"./osoba.php?id=smazat&id_osoba=".$row['id']."\" onclick=\"if(confirm('Skutečně smazat osobu?')) location.href='./osoba.php?id=smazat&id_osoba=".$row['id']."'; return(false);\">smazat</a>";
	}
	echo "</td></tr>
	<tr>
	<td><span class=\"subheader\">jméno</span></td>
	<td>".$row['jmeno']."</td>
	</tr>
	<tr>
	<td><span class=\"subheader\">klient</span></td>";
	$result2 = dibi::query('SELECT * FROM [prevent_firmy] WHERE [id] = %i', $row['id_firma']);
	$row2 = $result2->fetch();
	echo "<td>".$row2['nazev']."</td>
	</tr>
	<tr>
	<td><span class=\"subheader\">pobočka</span></td>";
	echo "<td>";
	$result3 = dibi::query('SELECT * FROM [prevent_firmy_osoba_relace] WHERE [id_osoba] = %i', $row['id']);
	while($row3 = $result3->fetch())
	{
		if($row3['objekt'] == "firma")
		{
			echo "náleží klientovi, ";
		} 
		else
		{
			echo $osobafirmy.get_nazev_provozovny($row3['id_objekt'], true).", ";
		}	
	}
	echo "</td>";

	echo "</tr>		
	<tr>
	<td><span class=\"subheader\">funkce</span></td>";
	echo "<td>".echo_pozice_osoba($row['id'])."</td>
	</tr>	
	<tr>
	<td><span class=\"subheader\">telefon</span></td>
	<td>".$row['telefon']."</td>
	</tr>
	<tr>
	<td><span class=\"subheader\">mobil</span></td>
	<td>".$row['mobil']."</td>
	</tr>	
	<tr>
	<td><span class=\"subheader\">email</span></td>
	<td>".$row['email']."</td>
	</tr>	
	<tr>
	<td><span class=\"subheader\">icq</span></td>
	<td>".$row['icq']."</td>
	</tr>	
	<tr>
	<td><span class=\"subheader\">skype</span></td>
	<td>".$row['skype']."</td>
	</tr>	
	<tr>
	<td><span class=\"subheader\">poznámky</span></td>
	<td>".$row['poznamky']."</td>
	</tr>	
	</table>";
	echo "<p><br />Zpět na <a href=\"./osoba.php?firma=".$row2['id']."\"><img src=\"./design/detaily.png\"/> seznam osob klienta</a>.</p>";
}

function smazat_osoba()
{
	$result = dibi::query('SELECT * FROM [prevent_firmy_osoba] WHERE [id] = %i', $_GET['id_osoba']);
	$row = $result->fetch();
	dibi::query('DELETE FROM [prevent_firmy_osoba] WHERE [id] = %i', $_GET['id_osoba']);
	dibi::query('DELETE FROM [prevent_firmy_osoba_relace] WHERE [id_osoba] = %i', $_GET['id_osoba']);
	$arr_log = array('text'  => 'Smazána osoba '.$row['jmeno'], 'link' => '', 'ad' => $row['id_firma']);
	vytvor_log_firmy($arr_log);
	echo "<div class=\"obdelnik\"><h5>Osoba smazána</h5><p>Pokračujte zpět na <a href=\"./osoba.php?firma=".$row['id_firma']."\">seznam osob klienta</a>.</p></div>";
}

function upravit_osoba()
{
	if($_POST['sent'])
	{
		$result = dibi::query('SELECT * FROM [prevent_firmy_osoba] WHERE [id] = %i', $_GET['id_osoba']);
		$row = $result->fetch();
		
		$arr_log = array('text'  => 'Upravena osoba '.$row['jmeno'], 'link' => '', 'ad' => $row['id_firma']);
		vytvor_log_firmy($arr_log);
		$arr = array('telefon' => $_POST['telefon'], 'email' => $_POST['email'], 'mobil' => $_POST['mobil'], 
		'icq' => $_POST['icq'], 'skype' => $_POST['skype'], 'poznamky' => $_POST['poznamky']);
		dibi::query('UPDATE [prevent_firmy_osoba] SET', $arr, 'WHERE [id] = %i', $_GET['id_osoba']);	
		echo "<div class=\"obdelnik\"><h5>Osoba upravena</h5><p>Pokračujte zpět na <a href=\"./osoba.php?firma=".$row['id_firma']."\">seznam osob klienta</a>.</p></div>";
	}
	else
	{
		$result = dibi::query('SELECT * FROM [prevent_firmy_osoba] WHERE [id] = %i', $_GET['id_osoba']);
		$row = $result->fetch();
		
		echo "<form method=\"POST\" action=\"".$_SERVER['REQUEST_URI']."\" name=\"upravit osobu\" id=\"upravit_osobu\">
		<input type=\"hidden\" name=\"sent\" value=\"true\">
		<fieldset>
		<legend>".$row['jmeno']."</legend>
		<label>firma</label><br />";
		$result2 = dibi::query('SELECT * FROM [prevent_firmy] WHERE [id] = %i', $row['id_firma']);
		$row2 = $result2->fetch();
		echo $row2['nazev']."<br />";
		echo "<label>pobočka</label><br />";
		$result3 = dibi::query('SELECT * FROM [prevent_firmy_osoba_relace] WHERE [id_osoba] = %i', $row['id']);
		$row3 = $result3->fetch();
		if($row3['objekt'] == "firma") echo "náleží klientovi<br/>";
		else
		{
			echo get_nazev_provozovny($row3['id_objekt'], false)."<br />";
		} 		
		echo "<label for=\"funkce\">funkce</label><br />
		".echo_pozice_osoba($row['id'])."<br />
		<label for=\"telefon\">telefon</label><br />
		<input name=\"telefon\" id=\"telefon\" class=\"formular\" value=\"".$row['telefon']."\"/><br />
		<label for=\"mobil\">mobil</label><br />
		<input name=\"mobil\" id=\"mobil\" class=\"formular\" value=\"".$row['mobil']."\"/><br />		
		<label for=\"email\">email</label><br />
		<input name=\"email\" id=\"email\" class=\"formular\" value=\"".$row['email']."\"/><br />
		<label for=\"icq\">icq</label><br />
		<input name=\"icq\" id=\"icq\" class=\"formular\" value=\"".$row['icq']."\"/><br />		
		<label for=\"skype\">skype</label><br />
		<input name=\"skype\" id=\"skype\" class=\"formular\" value=\"".$row['skype']."\"/><br />
		<label for=\"poznamky\">poznámky</label><br />
		<textarea name=\"poznamky\" id=\"poznamky\" class=\"formular\" row=\"6\" cols=\"20\">".$row['poznamky']."</textarea><br />
		<input class=\"tlacitko\" type=\"submit\" value=\"upravit\"> <a href=\"./osoba.php?id=detaily&id_osoba=".$row['id']."\">neupravovat</a>
		</fieldset>
		</form>
         <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#upravit_osobu').validate({
             rules: {
               telefon: {
                 required: true
               },
               mobil: {
                 required: true
               },
               email: {
                 required: true,
                 email: true
               },
               icq: {
                 required: true
               },
               skype: {
                 required: true
               },
               poznamky: {
                 required: true
               }

               }
             });
           });
           </script>";
	}
}

function new_osoba()
{
	if($_POST['sent'])
	{
		nova_osoba($_GET['id_objekt'], $_GET['objekt'], $_POST['jmeno'], $_GET['typ']);
		
		$result = dibi::query('SELECT * FROM [prevent_firmy_osoba] WHERE [jmeno] = %s', $_POST['jmeno']);
		$row = $result->fetch();
		
		$arr = array('telefon' => $_POST['telefon'], 'email' => $_POST['email'], 'mobil' => $_POST['mobil'], 
		'icq' => $_POST['icq'], 'skype' => $_POST['skype'], 'poznamky' => $_POST['poznamky']);
		dibi::query('UPDATE [prevent_firmy_osoba] SET', $arr, 'WHERE [id] = %i', $row['id']);	
		echo "<h4>Osoba přidána</h4><p>Pokračujte na <a href=\"./osoba.php?firma=".$row['id_firma']."\">seznam osob klienta</a>.</p>";
	}
	else
	{
		echo "<form method=\"POST\" action=\"".$_SERVER['REQUEST_URI']."\" name=\"pridat osobu\">
		<input type=\"hidden\" name=\"sent\" value=\"true\">
		<fieldset>
		<legend>Nová osoba</legend>
		<label for=\"firma\">klient</label><br />";
		if(!$_GET['id_firma']) $_GET['id_firma'] = $_SESSION['firma_usr'];
		echo get_nazev_firmy($_GET['id_firma'])."<br />
		<label for=\"jmeno\">jméno</label><br />
		<input name=\"jmeno\" id=\"jmeno\" class=\"formular\" value=\"\"/><br />
		<label for=\"funkce\">funkce</label><br />";
		$result = dibi::query('SELECT * FROM [prevent_firmy_osoba_preklad] WHERE [typ] = %s', $_GET['typ']);
		$row = $result->fetch();
		echo $row['preklad']."<br />";
		echo "<label for=\"telefon\">telefon</label><br />
		<input name=\"telefon\" id=\"telefon\" class=\"formular\" value=\"\"/><br />
		<label for=\"mobil\">mobil</label><br />
		<input name=\"mobil\" id=\"mobil\" class=\"formular\" value=\"\"/><br />		
		<label for=\"email\">email</label><br />
		<input name=\"email\" id=\"email\" class=\"formular\" value=\"\"/><br />
		<label for=\"icq\">icq</label><br />
		<input name=\"icq\" id=\"icq\" class=\"formular\" value=\"\"/><br />		
		<label for=\"skype\">skype</label><br />
		<input name=\"skype\" id=\"skype\" class=\"formular\" value=\"\"/><br />
		<label for=\"poznamky\">poznámky</label><br />
		<textarea name=\"poznamky\" id=\"poznamky\" class=\"formular\" row=\"6\" cols=\"20\"></textarea><br />
		<input class=\"tlacitko\" type=\"submit\" value=\"přidat\">
		</fieldset>
		</form>";
	}
}
?>