<?php
function pravo_na_provozovnu_firmeni_uzivatel($id)
{
$result = dibi::query('SELECT * FROM [prevent_firmy_uzivatele_prava] WHERE [id_uzivatel] = %i', $_SESSION['id_usr']);
	while($row = $result->fetch())
	{
		if($row['prava'] == "admin")
		{
		$result2 = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $_SESSION['firma_usr']);
			while($row2 = $result2->fetch())
			{
				if($row2['id'] == $id) return true;
			}
		}
		else
		{
			$result2 = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [id] = %i', $row['prava']);
			while($row2 = $result2->fetch())
			{
				if($row2['id'] == $id) return true;
			}
		}
	}
	return false;	
}

function seznam_provozoven()
{
	echo_table_provozovna();
	
		$result = dibi::query('SELECT * FROM [prevent_firmy_uzivatele_prava] WHERE [id_uzivatel] = %i', $_SESSION['id_usr'], 'ORDER BY [id] ASC');
		while($row = $result->fetch())
		{
			if($row['prava'] == "admin")
			{
				$result2 = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $_SESSION['firma_usr'], 'ORDER BY [nazev] ASC');
				while($row2 = $result2->fetch())
				{
					echo_provozovna($row2['id'], "zakaznik");
				}
				
			}
			else
			{
				$result2 = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [id] = %i', $row['prava'], 'ORDER BY [nazev] ASC');
				while($row2 = $result2->fetch())
				{
					echo_provozovna($row2['id'], "zakaznik");
				}
			}
		}
	echo "</table>";
}

function kontaktni_osoby()
{
	echo "<table class=\"table\">
	<tr>
	<td><span class=\"subheader\">AKCE</span></td>
	<td><span class=\"subheader\">POZICE</span></td>
	<td><span class=\"subheader\">JMÉNO</span></td>
	</tr>";

	$result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [prava] = %s', "admin", 'ORDER BY [jmeno]');
	while ($row = $result->fetch())
	{
		
		echo "<tr>
		<td>---</td>
		<td>administrátor</td>
		<td>".$row['jmeno']."</td>
		</tr>";
	}
	$result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [prava] = %s', "koordinator", 'ORDER BY [jmeno]');
	while ($row = $result->fetch())
	{
		
		echo "<tr>
		<td>---</td>
		<td>koordinátor</td>
		<td>".$row['jmeno']."</td>
		</tr>";
	}
	$result = dibi::query('SELECT * FROM [prevent_firmy_technik] WHERE [id_firma] = %i', $_SESSION['firma_usr']);
	while ($row = $result->fetch())
	{
		$result2 = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $row['id_technik'], 'ORDER BY [jmeno]');
		$row2 = $result2->fetch();
		
		echo "<tr>
		<td>---</td>
		<td>technik</td>
		<td>".$row2['jmeno']."</td>
		</tr>";
	}
	$result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [ad] = %i', $_SESSION['firma_usr'], 'ORDER BY [jmeno]');
	while ($row = $result->fetch())
	{
		$result2 = dibi::query('SELECT * FROM [prevent_firmy_uzivatele_prava] WHERE [id_uzivatel] = %i', $row['id']);
		$row2 = $result2->fetch();
		if($row2['prava'] == "admin") $hlaska_prava = "administrátor firmy";
		else $hlaska_prava = "člen firmy";
		
		echo "<tr>
		<td>---</td>
		<td>".$hlaska_prava."</td>
		<td>".$row['jmeno']."</td>
		</tr>";
	}
	echo "</table>";
}

function firemni_uzivatele()
{
	$result = dibi::query('SELECT * FROM [prevent_firmy_uzivatele_prava] WHERE [id_uzivatel] = %i', $_SESSION['id_usr'], 'ORDER BY [id] ASC');
	$row = $result->fetch();
	
			if($row['prava'] == "admin")
			{
				echo "<table class=\"table\">
				<tr>
				<td><span class=\"subheader\">STAV</span></td>
				<td><span class=\"subheader\">AKCE</span></td>
				<td><span class=\"subheader\">JMÉNO</span></td>	
				<td><span class=\"subheader\">EMAIL</span></td>
				<td><span class=\"subheader\">PRÁVA</span></td>
				<td><span class=\"subheader\">POSLEDNÍ NÁVŠŤEVA</span></td>
				<td><span class=\"subheader\">ONLINE<br />poslední klik</span></td>
				</tr>";
			
				$result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [ad] = %i', $_SESSION['firma_usr'], 'ORDER BY [jmeno] ASC');
				while ($row = $result->fetch())
				{
					if ($row['stav'] == "aktivni")
					{
						$stav = "class=\"green\"";
						$stav2 = "<acronym title=\"uživatelský účet je plně v provozu\">aktivní</acronym>";
					}
					elseif($row['stav'] == "ceka_na_autorizaci")
					{
						$stav = "class=\"orange\"";
						$stav2 = "<acronym title=\"je třeba uživateli předat kontrolník kód\">čeká na kód</acronym><br />(kód: \"<strong>".$row['sul']."</strong>\")";
					}
					elseif($row['stav'] == "blokovan")
					{
						$stav = "class=\"red\"";
						$stav2 = "<acronym title=\"uživatelský účet je zablokovát, lze jej odblokovat\">blokován</acronym>";
					}
					
					if($row['posledni_klik'] > (Time()-900))
					{
						$online = Date("H:i:s",$row['posledni_klik']);
						$online_barva = "class=\"green\"";
					}
					else
					{
						$online = "ne";
						$online_barva = "class=\"red\"";
					}
			
					echo "<tr>
					<td ".$stav.">".$stav2."</td>
					<td><a href=\"./zakaznik.php?id=logy&id_uzivatele=".$row['id']."\">log</a> |
					<a href=\"./zakaznik.php?id=firemni_uzivatele&blokovat_uzivatele=".$row['id']."\" onclick=\"if(confirm('Skutečně za/od blokovat uživatele?')) location.href='./zakaznik.php?id=firemni_uzivatele&blokovat_uzivatele=".$row['id']."'; return(false);\">za/od blokovat</a>
					<br /><a href=\"./zakaznik.php?id=upravit_firemniho_uzivatele&id_uzivatele=".$row['id']."\">upravit</a> | <a href=\"./zakaznik.php?id=firemni_uzivatele&smazat_uzivatele=".$row['id']."\" onclick=\"if(confirm('Skutečně smazat uživatele?')) location.href='./zakaznik.php?id=firemni_uzivatele&smazat_uzivatele=".$row['id']."'; return(false);\">smazat</a></td>
					<td>".$row['jmeno']."</td>
					<td>".$row['mail']."</td>
					<td>";
					$result2 = dibi::query('SELECT * FROM [prevent_firmy_uzivatele_prava] WHERE [id_uzivatel] = %i', $row['id'], 'ORDER BY [id] ASC');
					while($row2 = $result2->fetch())
					{
						if($row2['prava'] == "admin") echo "administrátor klienta";
						else
						{
							$result3 = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [id] = %i', $row2['prava'], 'ORDER BY [nazev] ASC');
							while($row3 = $result3->fetch())
							{
								echo $row3['nazev'].", ";
							}
						}
					}
					echo "</td>
					<td>".Date("H:i:s d.m.Y",$row['posledni_login_novy'])."</td>
					<td ".$online_barva.">".$online."</td>
					</tr>";
				}
				echo "<script type=\"text/javascript\">
				function blah(bool)
				{
			   		if(bool)
			   		{
			      		document.getElementById(\"provozovny_novy_uzivatel\").disabled = true;
			   		}
			   		else
			   		{
						document.getElementById(\"provozovny_novy_uzivatel\").disabled = false;
			
			   		}
				}
				</script>";
				echo "<form method=\"POST\" action=\"".$_SERVER['REQUEST_URI']."\" onSubmit=\"return check_novy_uzivatel(this);\">
				<tr>
				<td class=\"green\"><acronym title=\"přidat nového uživatele\">nový</acronym></td>
				<td><input class=\"tlacitko\" type=\"submit\" value=\"vytvořit uživatele\"></td>
				<td><input name=\"novy_uzivatel_jmeno\" class=\"formular\" value=\"jméno uživatele\" size=\"15\"></td>
				<td></td>
				<td><input type=\"checkbox\" id=\"admincheckbox\" name=\"admincheckbox\" value=\"admincheckbox\" onclick=\"blah(this.checked)\"/><label for=\"admincheckbox\">administrátor klienta</label><br />
				<strong>nebo</strong><br />příslušnost k pobočkám:<br />
					<select name=\"novy_uzivatel_prava[]\" id=\"provozovny_novy_uzivatel\" class=\"formular\" multiple>";
						$result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $_SESSION['firma_usr'], 'ORDER BY [nazev] ASC');
						while ($row = $result->fetch())
						{
							echo "<option value=\"".$row['id']."\">".$row['nazev']."</option>";
						}
					echo "
				</select></td>
				<td></td>
				</tr>
				</form>
				</table>";
			}
			else
			{
				echo "<table class=\"table\">
				<tr>
				<td><span class=\"subheader\">STAV</span></td>
				<td><span class=\"subheader\">JMÉNO</span></td>	
				<td><span class=\"subheader\">EMAIL</span></td>
				<td><span class=\"subheader\">PRÁVA</span></td>
				<td><span class=\"subheader\">POSLEDNÍ NÁVŠŤEVA</span></td>
				<td><span class=\"subheader\">ONLINE<br />poslední klik</span></td>
				</tr>";
			
				$result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [ad] = %i', $_SESSION['firma_usr'], 'ORDER BY [jmeno] ASC');
				while ($row = $result->fetch())
				{
					if ($row['stav'] == "aktivni")
					{
						$stav = "class=\"green\"";
						$stav2 = "<acronym title=\"uživatelský účet je plně v provozu\">aktivní</acronym>";
					}
					elseif($row['stav'] == "ceka_na_autorizaci")
					{
						$stav = "class=\"orange\"";
						$stav2 = "<acronym title=\"je třeba uživateli předat kontrolník kód\">čeká na kód</acronym>";
					}
					elseif($row['stav'] == "blokovan")
					{
						$stav = "class=\"red\"";
						$stav2 = "<acronym title=\"uživatelský účet je zablokovát, lze jej odblokovat\">blokován</acronym>";
					}
					
					if($row['posledni_klik'] > (Time()-900))
					{
						$online = Date("H:i:s",$row['posledni_klik']);
						$online_barva = "class=\"green\"";
					}
					else
					{
						$online = "ne";
						$online_barva = "class=\"red\"";
					}
			
					echo "<tr>
					<td ".$stav.">".$stav2."</td>
					<td>".$row['jmeno']."</td>
					<td>".$row['mail']."</td>
					<td>";
					$result2 = dibi::query('SELECT * FROM [prevent_firmy_uzivatele_prava] WHERE [id_uzivatel] = %i', $row['id'], 'ORDER BY [id] ASC');
					while($row2 = $result2->fetch())
					{
						if($row2['prava'] == "admin") echo "administrátor firmy";
						else
						{
							$result3 = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [id] = %i', $row2['prava'], 'ORDER BY [nazev] ASC');
							while($row3 = $result3->fetch())
							{
								echo $row3['nazev'].", ";
							}
						}
					}
					echo "</td>
					<td>".Date("H:i:s d.m.Y",$row['posledni_login_novy'])."</td>
					<td ".$online_barva.">".$online."</td>
					</tr>";
				}
				echo "</form></table>";			
			}
}

function firemni_uzivatel_novy()
{
	$result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [jmeno] = %s',$_POST['novy_uzivatel_jmeno']);
	if($row = $result->fetch())
	{
		echo "<h4>Uživatel \"".$_POST['novy_uzivatel_jmeno']."\" nebyl vytvořen - jmeno již existuje!</h4>";
		return 0;
	}
	$nahoda = Random_Password(10);
  
	$arr = array('jmeno' => $_POST['novy_uzivatel_jmeno'], 'ad' => $_SESSION['firma_usr'] ,'prava'  => "firma", 'sul' => $nahoda, 'stav' => 'ceka_na_autorizaci');
	dibi::query('INSERT INTO [prevent_uzivatele]', $arr);
	
	$result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE jmeno = %s', $_POST['novy_uzivatel_jmeno']);
	$row = $result->fetch();
	
	if($_POST['admincheckbox'])
	{
			$arr_prava = array('id_uzivatel' => $row['id'], 'prava' => "admin");
			dibi::query('INSERT INTO [prevent_firmy_uzivatele_prava]', $arr_prava);
	}
	else
	{
		$novy_uzivatel_prava = $_POST['novy_uzivatel_prava'];
		for($x=0;$x<count($novy_uzivatel_prava);$x++)
		{
			$arr_prava = array('id_uzivatel' => $row['id'], 'prava' => $novy_uzivatel_prava[$x]);
			dibi::query('INSERT INTO [prevent_firmy_uzivatele_prava]', $arr_prava);
		}
	}
  
	$arr_log = array('text'  => 'Vytvořen uživatelský účet', 'link' => '', 'ad' => $row['id']);
	vytvor_log($arr_log);

	$arr_log_firmy = array('text'  => 'Vytvořen uživatelský účet se jménem '.$_POST['novy_uzivatel_jmeno'], 'link' => '', 'ad' => $_SESSION['firma_usr']);
	vytvor_log_firmy($arr_log_firmy);
  
	init_uzivatele($row['id']);
}

function firemni_uzivatel_blokovat()
{
	$result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $_GET['blokovat_uzivatele']);
	$row = $result->fetch();
	
	if($row['stav'] == "aktivni")
	{	
		dibi::query('UPDATE [prevent_uzivatele] SET [stav] = %s', "blokovan", 'WHERE [id] = %i', $_GET['blokovat_uzivatele']);
		$zprava = "Uživatel ".$row['jmeno']." zablokován";
		$zprava2 = "Uživatel zablokován";
	}
	elseif($row['stav'] == "blokovan")
	{
		dibi::query('UPDATE [prevent_uzivatele] SET [stav] = %s', "aktivni", 'WHERE [id] = %i', $_GET['blokovat_uzivatele']);
		$zprava = "Uživatel ".$row['jmeno']." odblokován";
		$zprava2 = "Uživatel odblokován";
	}
	
	$arr_login = array('text'  => $zprava, 'link' => '', 'ad' => $_SESSION['firma_usr']);
	vytvor_log_firmy($arr_login); 
	$arr_log_uzivatele = array('text'  => $zprava2, 'link' => '', 'ad' => $_GET['blokovat_uzivatele']);
	vytvor_log($arr_log_uzivatele);
}

function firemni_uzivatel_smazat()
{
	$result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $_GET['smazat_uzivatele']);
	$row = $result->fetch();
	
	$text = "Uživatel ".$row['jmeno']." smazán";

	$arr_log = array('text'  => $text, 'link' => '', 'ad' => '');
	dibi::query('DELETE FROM [prevent_uzivatele] WHERE [id] = %i', $_GET['smazat_uzivatele']);
	vytvor_log($arr_log);
	
	$arr_log_firma = array('text'  => $text, 'link' => '', 'ad' => $row['ad']);
	vytvor_log_firmy($arr_log_firma);
	
	dibi::query('DELETE FROM [prevent_uzivatele] WHERE [id] = %i', $_GET['smazat_uzivatele']);
	dibi::query('DELETE FROM [prevent_watchdog] WHERE [id_uzivatel] = %i', $_GET['smazat_uzivatele']);	
	dibi::query('DELETE FROM [prevent_nastenka_shlednuto] WHERE [id_uzivatel] = %i', $_GET['smazat_uzivatele']);	
}

function firemni_uzivatel_upravit()
{
	if(IsSet($_POST['upravit_uzivatele']))
	{
		$result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $_GET['id_uzivatele']);
		$row = $result->fetch();
		
		$arr_log = array('text'  => 'Upravena práva uživatele.' , 'link' => '', 'ad' => $_GET['id_uzivatele']);
		vytvor_log($arr_log);
		
		$arr_log_firmy = array('text'  => 'Upravena práva uživatele '.$row['jmeno'] , 'link' => '', 'ad' => $_SESSION['firma_usr']);
		vytvor_log_firmy($arr_log_firmy);
		
		dibi::query('DELETE FROM [prevent_firmy_uzivatele_prava] WHERE [id_uzivatel] = %i', $_GET['id_uzivatele']);
		if($_POST['admincheckbox'])
		{
			$arr_prava = array('id_uzivatel' => $_GET['id_uzivatele'], 'prava' => "admin");
			dibi::query('INSERT INTO [prevent_firmy_uzivatele_prava]', $arr_prava);
		}
		else
		{
			$novy_uzivatel_prava = $_POST['novy_uzivatel_prava'];
			for($x=0;$x<count($novy_uzivatel_prava);$x++)
			{
				$arr_prava = array('id_uzivatel' => $_GET['id_uzivatele'], 'prava' => $novy_uzivatel_prava[$x]);
				dibi::query('INSERT INTO [prevent_firmy_uzivatele_prava]', $arr_prava);
			}
		}
				echo "<h4>Uživatel upraven</h4><p>Pokračujte zpět na <a href=\"./zakaznik.php?id=firemni_uzivatele\">firemní uživatele</a>.</p>";	
	}
	else
	{
		$result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $_GET['id_uzivatele']);
		$row = $result->fetch();

		echo "<script type=\"text/javascript\">
		function blah(bool)
		{
	   		if(bool)
	   		{
	      		document.getElementById(\"provozovny_novy_uzivatel\").disabled = true;
	   		}
	   		else
	   		{
				document.getElementById(\"provozovny_novy_uzivatel\").disabled = false;
	
	   		}
		}
		</script>";
	
		echo "<form method=\"POST\" action=\"./zakaznik.php?id=upravit_firemniho_uzivatele&id_uzivatele=".$_GET['id_uzivatele']."\" >
		<input type=\"hidden\" name=\"upravit_uzivatele\" value=\"ano\" />
		<fieldset>
		<legend>".$row['jmeno']."</legend>
		<p><strong>současná práva:</strong> <em>";
		
		$result2 = dibi::query('SELECT * FROM [prevent_firmy_uzivatele_prava] WHERE [id_uzivatel] = %i', $row['id'], 'ORDER BY [id] ASC');
		while($row2 = $result2->fetch())
		{
			if($row2['prava'] == "admin") echo "administrátor firmy";
			else
			{
				$result3 = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [id] = %i', $row2['prava'], 'ORDER BY [nazev] ASC');
				while($row3 = $result3->fetch())
				{
					echo $row3['nazev'].", ";
				}
			}
		}
		echo "</em></p><div class=\"caradown\"></div><p><strong>nová práva:</strong><br />
		<input type=\"checkbox\" id=\"admincheckbox\" name=\"admincheckbox\" value=\"admincheckbox\" onclick=\"blah(this.checked)\"/><label for=\"admincheckbox\">administrátor firmy</label><br />
		<strong>nebo</strong><br />příslušnost k provozovnám:<br />
		<select name=\"novy_uzivatel_prava[]\" id=\"provozovny_novy_uzivatel\" class=\"formular\" multiple>";
			$result4 = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $_SESSION['firma_usr'], 'ORDER BY [nazev] ASC');
			while ($row4 = $result4->fetch())
			{
				echo "<option value=\"".$row4['id']."\">".$row4['nazev']."</option>";
			}
		echo "</select>
		<input class=\"tlacitko\" type=\"submit\" value=\"upravit\"> <a href=\"./zakaznik.php?id=firemni_uzivatele\">neupravit</a>
		</fieldset>
		</form><br />";
		
	}
}

function firemni_log()
{
	echo "<form method=\"POST\" action=\"?id=logy\">
	<fieldset>
	<legend>Výběr uživatele</legend>";
			
	EchoUzivateleSelect("", "id_uzivatele", 0, 0, 0, 4);
	echo "<p><a href=\"?id=logy&id_uzivatele=firma\">Log klienta</a><br /></p>";

	echo "<input class=\"tlacitko\" type=\"submit\" value=\"vypsat logy\">
	</fieldset>
	</form>";
	
	if ($_POST['id_uzivatele'])
	{
		if($_POST['id_uzivatele'] == "firma")
		{
			$result2 = dibi::query('SELECT * FROM [prevent_firmy_log] WHERE [ad] = %i', $_SESSION['firma_usr'], 'ORDER BY [date] DESC');
			$pocet_logu = $result2->count();
			$row['jmeno'] = "firma - ".get_nazev_firmy($_SESSION['firma_usr']);
		}
		else
		{
			
			$result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $_POST['id_uzivatele']);
			$row = $result->fetch();
			$result2 = dibi::query('SELECT * FROM [prevent_log] WHERE [ad] = %i', $_POST['id_uzivatele'], 'OR [autor] = %s', $row['jmeno'], 'ORDER BY [date] DESC');
			$pocet_logu = $result2->count();
		}
		echo "<h3>Log uživatele <em>".$row['jmeno']."</em> (".$pocet_logu." záznamů)</h3>";

		while ($row2 = $result2->fetch()) echo "<p>".Date("H:i d.m.Y", $row2['date'])." (".$row2['autor']."): ".$row2['text']."</p>";
	}
}
?>