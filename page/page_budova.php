<?php
function vyhledat_budova_koordinator()
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
	echo "<input class=\"tlacitko\" type=\"submit\" value=\"vypsat\">";
        if($_POST['provozovna'] && $_POST['provozovna'] != "all") echo "<a href=\"./budova.php?id=nova&id_provozovna=".$_POST['provozovna']."&id_firma=".$_POST['firma']."\"><img src=\"./design/pridat.png\" /> přidat budovu</a>";
	echo "
	</fieldset>
	</form><br />";
		
	if($_POST['firma'])
	{
		echo "<table class=\"table\">
		<tr>
		<td><span class=\"subheader\">AKCE</span></td>
		<td><span class=\"subheader\">pobočka</span></td>
		<td><span class=\"subheader\">JMÉNO</span></td>
		</tr>";
		
		if($_POST['provozovna'] && $_POST['provozovna'] != "all")
		{

			$result = dibi::query('SELECT * FROM [prevent_firmy_budova_relace] WHERE [id_provozovna] = %i', $_POST['provozovna']);
			while($row = $result->fetch())
			{
				echo_table_budova($row['id_budova']);
			}		
		}
		else
		{
			$result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $_POST['firma']);
			while($row = $result->fetch())
			{
				$result2 = dibi::query('SELECT * FROM [prevent_firmy_budova_relace] WHERE [id_provozovna] = %i', $row['id']);
				while($row2 = $result2->fetch())
				{
					echo_table_budova($row2['id_budova']);
				}
			}
		}
		echo "</table>
		<p>Přejít na <a href=\"./firmy_koordinator.php?id=detaily_firmy&id_firmy=".$_POST['firma']."\"><img src=\"./design/detaily.png\"/> detaily klienta</a>.</p>";
	}
}

function vyhledat_budova_technik()
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
	echo "<input class=\"tlacitko\" type=\"submit\" value=\"vypsat\">";
        if($_POST['provozovna'] && $_POST['provozovna'] != "all") echo "<a href=\"./budova.php?id=nova&id_provozovna=".$_POST['provozovna']."&id_firma=".$_POST['firma']."\"><img src=\"./design/pridat.png\" /> přidat budovu</a>";
	echo "
	</fieldset>
	</form><br />";
	
	if($_POST['firma'])
	{

		echo "<table class=\"table\">
		<tr>
		<td><span class=\"subheader\">AKCE</span></td>
		<td><span class=\"subheader\">pobočka</span></td>
		<td><span class=\"subheader\">jméno</span></td>
		</tr>";
		
		if($_POST['provozovna'] && $_POST['provozovna'] != "all")
		{
			$result = dibi::query('SELECT * FROM [prevent_firmy_budova_relace] WHERE [id_provozovna] = %i', $_POST['provozovna']);
			while($row = $result->fetch())
			{
				echo_table_budova($row['id_budova']);
			}			
		}
		else
		{
			$result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $_POST['firma']);
			while($row = $result->fetch())
			{
				$result2 = dibi::query('SELECT * FROM [prevent_firmy_budova_relace] WHERE [id_provozovna] = %i', $row['id']);
				while($row2 = $result2->fetch())
				{
					echo_table_budova($row2['id_budova']);
				}
			}
		}
		echo "</table>
		<p>Přejít na <a href=\"./firmy_technik.php?id=detaily_firmy&id_firmy=".$_POST['firma']."\"><img src=\"./design/detaily.png\"/> detaily klienta</a>.</p>";
	}
}
function vyhledat_budova_zakaznik($prava)
{
	echo "<table class=\"table\">
	<tr>
	<td><span class=\"subheader\">AKCE</span></td>
	<td><span class=\"subheader\">JMÉNO</span></td>
	<td><span class=\"subheader\">POZICE</span></td>
	</tr>";
	if($prava == "admin")
	{
		$result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $_SESSION['firma_usr']);
		while($row = $result->fetch())
		{
			$result2 = dibi::query('SELECT * FROM [prevent_firmy_budova_relace] WHERE [id_provozovna] = %i', $row['id']);
			while($row2 = $result2->fetch())
			{
			echo_table_budova($row2['id_budova']);
			}
		}
	}
	else
	{
			$result = dibi::query('SELECT * FROM [prevent_firmy_uzivatele_prava] WHERE [id_uzivatel] = %i', $_SESSION['id_usr'], 'ORDER BY [id] ASC');
			while($row = $result->fetch())
			{
				$result2 = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [id] = %i', $row['prava'], 'ORDER BY [nazev] ASC');
				while($row2 = $result2->fetch())
				{
					$result3 = dibi::query('SELECT * FROM [prevent_firmy_budova_relace] WHERE [id_provozovna] = %i', $row2['id']);
					while($row3 = $result3->fetch())
					{
						echo_table_budova($row3['id_budova']);
					}					
					
				}				
			}
	}
	echo "</table>";		
}

function echo_table_budova($id)
{
	$result = dibi::query('SELECT * FROM [prevent_firmy_budova] WHERE [id] = %i', $id);
	$row = $result->fetch();
	$result2 = dibi::query('SELECT * FROM [prevent_firmy_budova_relace] WHERE [id_budova] = %i', $id);
	$row2 = $result2->fetch();
	$result3 = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [id] = %i', $row2['id_provozovna']);
	$row3 = $result3->fetch();		
	echo "<tr>
	<td><a href=\"./budova.php?id=detaily&id_budova=".$row['id']."\"><img src=\"./design/detaily.png\" alt=\"detaily\" title=\"detaily\"></a></td>
	<td>".get_nazev_provozovny($row3['id'], true)."</td>
	<td>".$row['jmeno']."</td>
	</tr>";
}

function echo_detail_budova($id, $akce)
{
	$result = dibi::query('SELECT * FROM [prevent_firmy_budova] WHERE [id] = %i', $id);
	$row = $result->fetch();
	echo "<table class=\"table\">
	<tr>
	<td><span class=\"subheader\">akce</span></td>
	<td>";
	if($akce == "koordinator")
	{
		echo "<a href=\"./budova.php?id=upravit&id_budova=".$row['id']."\"><img src=\"./design/edit.png\" alt=\"upravit\" title=\"upravit\"></a> <a href=\"./budova.php?id=smazat&id_budova=".$row['id']."\" onclick=\"if(confirm('Skutečně smazat budovu?')) location.href='./budova.php?id=smazat&id_budova=".$row['id']."'; return(false);\"><img src=\"./design/kos.png\" alt=\"smazat\" title=\"smazat\"></a>";
	}
	elseif($akce == "technik")
	{
		echo "<a href=\"./budova.php?id=upravit&id_budova=".$row['id']."\"><img src=\"./design/edit.png\" alt=\"upravit\" title=\"upravit\"></a> <a href=\"./budova.php?id=smazat&id_budova=".$row['id']."\" onclick=\"if(confirm('Skutečně smazat budovu?')) location.href='./budova.php?id=smazat&id_budova=".$row['id']."'; return(false);\"><img src=\"./design/kos.png\" alt=\"smazat\" title=\"smazat\"></a>";
	}
	elseif($akce == "zakaznik")
	{
		echo "---";
	}
	elseif($akce == "zakaznik_admin")
	{
		echo "<a href=\"./budova.php?id=upravit&id_budova=".$row['id']."\"><img src=\"./design/edit.png\" alt=\"upravit\" title=\"upravit\"></a> <a href=\"./budova.php?id=smazat&id_budova=".$row['id']."\" onclick=\"if(confirm('Skutečně smazat budovu?')) location.href='./budova.php?id=smazat&id_budova=".$row['id']."'; return(false);\"><img src=\"./design/kos.png\" alt=\"smazat\" title=\"smazat\"></a>";
	}
	echo "</td></tr>
	<tr>
	<td><span class=\"subheader\">klient</span></td>
	<td>";
	echo get_nazev_firmy(get_id_firma_z_objekt("budova", $_GET['id_budova']))."</td>
	<tr>
	<td><span class=\"subheader\">pobočka</span></td>
	<td>";	
	$result2 = dibi::query('SELECT * FROM [prevent_firmy_budova_relace] WHERE [id_budova] = %i', $_GET['id_budova']);
	$row2 = $result2->fetch();		
	echo get_nazev_provozovny($row2['id_provozovna'], true)."</td>
	<tr>
	<td><span class=\"subheader\">jméno</span></td>
	<td>".$row['jmeno']."</td>
	</tr>
	<tr>
	<td><span class=\"subheader\">popis</span></td>
	<td>".$row['popis']."</td>
	</tr>
	<tr>
	<td><span class=\"subheader\">počet podlaží</span></td>
	<td>".$row['pocet_podlazi']."</td>
	</tr>	
	<tr>
	<td><span class=\"subheader\">Je budova vyšší než 22,5 m?</span></td>
	<td>".$row['q_vyssi_nez_22']."</td>
	</tr>	
	<tr>
	<td><span class=\"subheader\">Shromažďuje se v budově větší počet osob?</span></td>
	<td>".$row['q_shromazduje_se_vetsi_pocet_lidi']."</td>
	</tr>	
	<tr>
	<td><span class=\"subheader\">Je v budově obchod?</span></td>
	<td>".$row['q_je_v_budove_obchod']."</td>
	</tr>
	<tr>
	<td><span class=\"subheader\">Jsou zde ubytovány osoby?</span></td>
	<td>".$row['q_jsou_zde_ubytovany_osoby']."</td>
	</tr>
	<tr>
	<td><span class=\"subheader\">Vyskytují se zde osoby se sníženou schopností pohybu a orientace?</span></td>
	<td>".$row['q_osoby_se_snizenou_schopnosti_orientace']."</td>
	</tr>
	<tr>
	<td><span class=\"subheader\">Jsou zde běžné podmínky pro zásah v případě požáru?</span></td>
	<td>".$row['q_podminky_pro_zasah_proti_pozaru']."</td>
	</tr>	
	<tr>
	<td><span class=\"subheader\">poznámky</span></td>
	<td>".$row['poznamky']."</td>
	</tr>	
	</table>";
	
	echo_relace_objekt("budova", $row['id']);
	
	echo "<p><br />Zpět na <a href=\"./budova.php?firma=".get_id_firma_z_objekt("budova", $row['id'])."\"><img src=\"./design/detaily.png\"/> seznam budov klienta</a>.</p>";
}

function smazat_budova()
{
	$result = dibi::query('SELECT * FROM [prevent_firmy_budova] WHERE [id] = %i', $_GET['id_budova']);
	$row = $result->fetch();
	$arr_log = array('text'  => 'Smazána budova '.$row['jmeno'], 'link' => '', 'ad' => get_id_firma_z_objekt("budova", $_GET['id_budova']));
	vytvor_log_firmy($arr_log);
        $id_firma = get_id_firma_z_objekt("budova", $_GET['id_budova']);
	dibi::query('DELETE FROM [prevent_firmy_budova] WHERE [id] = %i', $_GET['id_budova']);
	dibi::query('DELETE FROM [prevent_firmy_budova_relace] WHERE [id_budova] = %i', $_GET['id_budova']);
	echo "<div class=\"obdelnik\"><h5>Budova smazána</h4><p>Pokračujte zpět na <a href=\"./budova.php?firma=".$id_firma."\">seznam budov klienta</a>.</p></div>";
}


function upravit_budova()
{
	if($_POST['sent'])
	{
		$arr_log_firmy = array('text'  => 'Upravena budova s názvem '.$_POST['jmeno'], 'link' => '', 'ad' => get_id_firma_z_objekt("budova", $_GET['id_budova']));
		vytvor_log_firmy($arr_log_firmy);

		$arr = array('jmeno' => $_POST['jmeno'], 'popis' => $_POST['popis'], 'pocet_podlazi' => $_POST['pocet_podlazi'], 
		'q_vyssi_nez_22' => $_POST['q_vyssi_nez_22'], 'q_shromazduje_se_vetsi_pocet_lidi' => $_POST['q_shromazduje_se_vetsi_pocet_lidi'], 'q_je_v_budove_obchod' => $_POST['q_je_v_budove_obchod'], 
		'q_jsou_zde_ubytovany_osoby' => $_POST['q_jsou_zde_ubytovany_osoby'], 'q_osoby_se_snizenou_schopnosti_orientace' => $_POST['q_osoby_se_snizenou_schopnosti_orientace'],
		'q_podminky_pro_zasah_proti_pozaru' => $_POST['q_podminky_pro_zasah_proti_pozaru'], 'poznamky' => $_POST['poznamky']);
		dibi::query('UPDATE [prevent_firmy_budova] SET', $arr, 'WHERE [id] = %i',$_GET['id_budova']);
		
		echo "<div class=\"obdelnik\"><h5>Budova upravena</h5><p>Pokračujte zpět na <a href=\"./budova.php?firma=".get_id_firma_z_objekt("budova", $_GET['id_budova'])."\">seznam budov klienta</a>.</p></div>";
	}
	else
	{
		$result = dibi::query('SELECT * FROM [prevent_firmy_budova] WHERE [id] = %i', $_GET['id_budova']);
		$row = $result->fetch();
		
		echo "<form method=\"POST\" action=\"".$_SERVER['REQUEST_URI']."\" name=\"upravit budovu\" id=\"upravit_budova\">
		<input type=\"hidden\" name=\"sent\" value=\"true\">
		<fieldset>
		<legend>Upravit budovu</legend>
		<label for=\"firma\">klient</label><br />";
		echo get_nazev_firmy(get_id_firma_z_objekt("budova", $_GET['id_budova']))."<br />
		<label for=\"provozovna\">pobočka</label><br />";
		$result2 = dibi::query('SELECT * FROM [prevent_firmy_budova_relace] WHERE [id_budova] = %i', $_GET['id_budova']);
		$row2 = $result2->fetch();		
		echo get_nazev_provozovny($row2['id_provozovna'], true)."<br />
		<label for=\"jmeno\">jméno</label><br />
		<input name=\"jmeno\" id=\"jmeno\" class=\"formular\" size=\"50\" value=\"".$row['jmeno']."\"/><br />
		<label for=\"popis\">popis</label><br />
		<textarea name=\"popis\" id=\"popis\" class=\"formular\" rows=\"10\" cols=\"50\">".$row['popis']."</textarea><br />
		<label for=\"pocet_podlazi\">počet podlaží</label><br />
		<input name=\"pocet_podlazi\" id=\"pocet_podlazi\" class=\"formular\" value=\"".$row['pocet_podlazi']."\"/><br />
		<label for=\"q_vyssi_nez_22_ano\">Je budova vyšší než 22,5 m?</label><br />";
		if($row['q_vyssi_nez_22'] == "ano") $checked_q_vyssi_nez_22_ano = "checked";
		elseif($row['q_vyssi_nez_22'] == "ne") $checked_q_vyssi_nez_22_ne = "checked";				
		echo "<input type=\"radio\" id=\"q_vyssi_nez_22_ano\" $checked_q_vyssi_nez_22_ano  name=\"q_vyssi_nez_22\" value=\"ano\"><label for=\"q_vyssi_nez_22_ano\">ano</label> / <input type=\"radio\" id=\"q_vyssi_nez_22_ne\" $checked_q_vyssi_nez_22_ne name=\"q_vyssi_nez_22\" value=\"ne\"><label for=\"q_vyssi_nez_22_ne\">ne</label><br />
		<label for=\"q_shromazduje_se_vetsi_pocet_lidi_ano\">Shromažďuje se v budově větší počet osob?</label><br />";
		if($row['q_shromazduje_se_vetsi_pocet_lidi'] == "ano") $checked_q_shromazduje_se_vetsi_pocet_lidi_ano = "checked";
		elseif($row['q_shromazduje_se_vetsi_pocet_lidi'] == "ne") $checked_q_shromazduje_se_vetsi_pocet_lidi_ne = "checked";			
		echo "<input type=\"radio\" id=\"q_shromazduje_se_vetsi_pocet_lidi_ano\" $checked_q_shromazduje_se_vetsi_pocet_lidi_ano name=\"q_shromazduje_se_vetsi_pocet_lidi\" value=\"ano\"><label for=\"q_shromazduje_se_vetsi_pocet_lidi_ano\">ano</label> / <input type=\"radio\" id=\"q_shromazduje_se_vetsi_pocet_lidi_ne\" $checked_q_shromazduje_se_vetsi_pocet_lidi_ne name=\"q_shromazduje_se_vetsi_pocet_lidi\" value=\"ne\"><label for=\"q_shromazduje_se_vetsi_pocet_lidi_ne\">ne</label><br />
		<label for=\"q_je_v_budove_obchod_ano\">Je v budově obchod?</label><br />";
		if($row['q_je_v_budove_obchod'] == "ano") $checked_q_je_v_budove_obchod_ano = "checked";
		elseif($row['q_je_v_budove_obchod'] == "ne") $checked_q_je_v_budove_obchod_ne = "checked";		
		echo "<input type=\"radio\" id=\"q_je_v_budove_obchod_ano\"  $checked_q_je_v_budove_obchod_ano name=\"q_je_v_budove_obchod\" value=\"ano\"><label for=\"q_je_v_budove_obchod_ano\">ano</label> / <input type=\"radio\" id=\"q_je_v_budove_obchod_ne\"  $checked_q_je_v_budove_obchod_ne name=\"q_je_v_budove_obchod\" value=\"ne\"><label for=\"q_je_v_budove_obchod_ne\">ne</label><br />
		<label for=\"q_jsou_zde_ubytovany_osoby_ano\">Jsou zde ubytovány osoby?</label><br />";
		if($row['q_jsou_zde_ubytovany_osoby'] == "ano") $checked_q_jsou_zde_ubytovany_osoby_ano = "checked";
		elseif($row['q_jsou_zde_ubytovany_osoby'] == "ne") $checked_q_jsou_zde_ubytovany_osoby_ne = "checked";			
		echo "<input type=\"radio\" id=\"q_jsou_zde_ubytovany_osoby_ano\" $checked_q_jsou_zde_ubytovany_osoby_ano name=\"q_jsou_zde_ubytovany_osoby\" value=\"ano\"><label for=\"q_jsou_zde_ubytovany_osoby_ano\">ano</label> / <input type=\"radio\" id=\"q_jsou_zde_ubytovany_osoby_ne\" $checked_q_jsou_zde_ubytovany_osoby_ne name=\"q_jsou_zde_ubytovany_osoby\" value=\"ne\"><label for=\"q_jsou_zde_ubytovany_osoby_ne\">ne</label><br />
		<label for=\"q_osoby_se_snizenou_schopnosti_orientace_ano\">Vyskytují se zde osoby se sníženou schopností pohybu a orientace?</label><br />";
		if($row['q_osoby_se_snizenou_schopnosti_orientace'] == "ano") $checked_q_osoby_se_snizenou_schopnosti_orientace_ano = "checked";
		elseif($row['q_osoby_se_snizenou_schopnosti_orientace'] == "ne") $checked_q_osoby_se_snizenou_schopnosti_orientace_ne = "checked";				
		echo "<input type=\"radio\" id=\"q_osoby_se_snizenou_schopnosti_orientace_ano\" $checked_q_osoby_se_snizenou_schopnosti_orientace_ano name=\"q_osoby_se_snizenou_schopnosti_orientace\" value=\"ano\"><label for=\"q_osoby_se_snizenou_schopnosti_orientace_ano\">ano</label> / <input type=\"radio\" id=\"q_osoby_se_snizenou_schopnosti_orientace_ne\" $checked_q_osoby_se_snizenou_schopnosti_orientace_ne name=\"q_osoby_se_snizenou_schopnosti_orientace\" value=\"ne\"><label for=\"q_osoby_se_snizenou_schopnosti_orientace_ne\">ne</label><br />
		<label for=\"q_podminky_pro_zasah_proti_pozaru_ano\">Jsou zde běžné podmínky pro zásah v případě požáru?</label><br />";
		if($row['q_podminky_pro_zasah_proti_pozaru'] == "ano") $checked_q_podminky_pro_zasah_proti_pozaru_ano = "checked";
		elseif($row['q_podminky_pro_zasah_proti_pozaru'] == "ne") $checked_q_podminky_pro_zasah_proti_pozaru_ne = "checked";			
		echo "<input type=\"radio\" id=\"q_podminky_pro_zasah_proti_pozaru_ano\" $checked_q_podminky_pro_zasah_proti_pozaru_ano name=\"q_podminky_pro_zasah_proti_pozaru\" value=\"ano\"><label for=\"q_podminky_pro_zasah_proti_pozaru_ano\">ano</label> / <input type=\"radio\" id=\"q_podminky_pro_zasah_proti_pozaru_ne\" $checked_q_podminky_pro_zasah_proti_pozaru_ne name=\"q_podminky_pro_zasah_proti_pozaru\" value=\"ne\"><label for=\"q_podminky_pro_zasah_proti_pozaru_ne\">ne</label><br />
		<label for=\"poznamky\">poznámky</label><br />
		<textarea name=\"poznamky\" id=\"poznamky\" class=\"formular\" rows=\"10\" cols=\"50\">".$row['poznamky']."</textarea><br />
		<input class=\"tlacitko\" type=\"submit\" value=\"upravit\"> <a href=\"./budova.php?id=detaily&id_budova=".$row['id']."\">neupravovat</a>
		</fieldset>
		</form>
                           <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#upravit_budova').validate({
             rules: {
               jmeno: {
                 required: true
               },
               popis: {
                 required: true
               },
               pocet_podlazi: {
                 required: true,
                 min: 1
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

function new_budova()
{
	if($_POST['sent'])
	{
		$arr_log_firmy = array('text'  => 'Přidána budova s názvem '.$_POST['jmeno'], 'link' => '', 'ad' => $_GET['id_firma']);
		vytvor_log_firmy($arr_log_firmy);

		$arr = array('jmeno' => $_POST['jmeno'], 'popis' => $_POST['popis'], 'pocet_podlazi' => $_POST['pocet_podlazi'], 
		'q_vyssi_nez_22' => $_POST['q_vyssi_nez_22'], 'q_shromazduje_se_vetsi_pocet_lidi' => $_POST['q_shromazduje_se_vetsi_pocet_lidi'], 'q_je_v_budove_obchod' => $_POST['q_je_v_budove_obchod'], 
		'q_jsou_zde_ubytovany_osoby' => $_POST['q_jsou_zde_ubytovany_osoby'], 'q_osoby_se_snizenou_schopnosti_orientace' => $_POST['q_osoby_se_snizenou_schopnosti_orientace'],
		'q_podminky_pro_zasah_proti_pozaru' => $_POST['q_podminky_pro_zasah_proti_pozaru'], 'poznamky' => $_POST['poznamky']);
		dibi::query('INSERT INTO [prevent_firmy_budova]', $arr);	
		
		$result = dibi::query('SELECT * FROM [prevent_firmy_budova] WHERE [jmeno] = %s', $_POST['jmeno']);
		$row = $result->fetch();
		
		$arr = array('id_budova' => $row['id'], 'id_provozovna' => $_GET['id_provozovna']);
		dibi::query('INSERT INTO [prevent_firmy_budova_relace]', $arr);
		
		echo "<div class=\"obdelnik\"><h5>Budova přidána</h5><p>Pokračujte na <a href=\"./budova.php?firma=".$_GET['id_firma']."\">seznam budov klienta</a>.</p></div>";
	}
	else
	{
		echo "<form method=\"POST\" action=\"".$_SERVER['REQUEST_URI']."\" name=\"pridat budovu\" id=\"nova_budova\" >
		<input type=\"hidden\" name=\"sent\" value=\"true\">
		<fieldset>
		<legend>Nová budova</legend>
		<label for=\"firma\">klient</label><br />";
		if(!$_GET['id_firma']) $_GET['id_firma'] = $_SESSION['firma_usr'];
		echo get_nazev_firmy($_GET['id_firma'])."<br />
		<label for=\"provozovna\">pobočka</label><br />";
		echo get_nazev_provozovny($_GET['id_provozovna'], true)."<br />
		<label for=\"jmeno\">jméno budovy</label><br />
		<input name=\"jmeno\" id=\"jmeno\" size=\"50\" class=\"formular\" value=\"\"/><br />
		<label for=\"popis\">popis budovy</label><br />
		<textarea name=\"popis\" id=\"popis\" class=\"formular\" rows=\"10\" cols=\"50\"></textarea><br />
		<label for=\"pocet_podlazi\">počet podlaží</label><br />
		<input name=\"pocet_podlazi\" id=\"pocet_podlazi\"  size=\"10\" class=\"formular\" value=\"\"/><br />
		<table class=\"table_hide\">
                <tr>
                <td><label for=\"q_vyssi_nez_22_ano\">Je budova vyšší než 22,5 m?</label><br />
		<input type=\"radio\" id=\"q_vyssi_nez_22_ano\"  name=\"q_vyssi_nez_22\" value=\"ano\"><label for=\"q_vyssi_nez_22_ano\">ano</label> / <input type=\"radio\" id=\"q_vyssi_nez_22_ne\"  name=\"q_vyssi_nez_22\" value=\"ne\"><label for=\"q_vyssi_nez_22_ne\">ne</label><br /></td>
                <td><label for=\"q_vyssi_nez_22\" class=\"error\" style=\"display:none;\">Odpovězte</label></td>
                </tr>
                </table>
                <table class=\"table_hide\">
                <tr>
                <td><label for=\"q_shromazduje_se_vetsi_pocet_lidi_ano\">Shromažďuje se v budově větší počet osob?</label><br />
		<input type=\"radio\" id=\"q_shromazduje_se_vetsi_pocet_lidi_ano\" name=\"q_shromazduje_se_vetsi_pocet_lidi\" value=\"ano\"><label for=\"q_shromazduje_se_vetsi_pocet_lidi_ano\">ano</label> / <input type=\"radio\" id=\"q_shromazduje_se_vetsi_pocet_lidi_ne\"  name=\"q_shromazduje_se_vetsi_pocet_lidi\" value=\"ne\"><label for=\"q_shromazduje_se_vetsi_pocet_lidi_ne\">ne</label><br /></td>
                <td><label for=\"q_shromazduje_se_vetsi_pocet_lidi\" class=\"error\" style=\"display:none;\">Odpovězte</label></td>
                </tr>
                </table>
                <table class=\"table_hide\">
                <tr>
		<td><label for=\"q_je_v_budove_obchod_ano\">Je v budově obchod?</label><br />
		<input type=\"radio\" id=\"q_je_v_budove_obchod_ano\" name=\"q_je_v_budove_obchod\" value=\"ano\"><label for=\"q_je_v_budove_obchod_ano\">ano</label> / <input type=\"radio\" id=\"q_je_v_budove_obchod_ne\" name=\"q_je_v_budove_obchod\" value=\"ne\"><label for=\"q_je_v_budove_obchod_ne\">ne</label><br /></td>
		<td><label for=\"q_je_v_budove_obchod\" class=\"error\" style=\"display:none;\">Odpovězte</label></td>
                </tr>
                </table>
                <table class=\"table_hide\">
                <tr>
                <td><label for=\"q_jsou_zde_ubytovany_osoby_ano\">Jsou zde ubytovány osoby?</label><br />
		<input type=\"radio\" id=\"q_jsou_zde_ubytovany_osoby_ano\" name=\"q_jsou_zde_ubytovany_osoby\" value=\"ano\"><label for=\"q_jsou_zde_ubytovany_osoby_ano\">ano</label> / <input type=\"radio\" id=\"q_jsou_zde_ubytovany_osoby_ne\" name=\"q_jsou_zde_ubytovany_osoby\" value=\"ne\"><label for=\"q_jsou_zde_ubytovany_osoby_ne\">ne</label><br /></td>
		<td><label for=\"q_jsou_zde_ubytovany_osoby\" class=\"error\" style=\"display:none;\">Odpovězte</label></td>
                </tr>
                </table>
                <table class=\"table_hide\">
                <tr>
                <td><label for=\"q_osoby_se_snizenou_schopnosti_orientace_ano\">Vyskytují se zde osoby se sníženou schopností pohybu a orientace?</label><br />
		<input type=\"radio\" id=\"q_osoby_se_snizenou_schopnosti_orientace_ano\" name=\"q_osoby_se_snizenou_schopnosti_orientace\" value=\"ano\"><label for=\"q_osoby_se_snizenou_schopnosti_orientace_ano\">ano</label> / <input type=\"radio\" id=\"q_osoby_se_snizenou_schopnosti_orientace_ne\" name=\"q_osoby_se_snizenou_schopnosti_orientace\" value=\"ne\"><label for=\"q_osoby_se_snizenou_schopnosti_orientace_ne\">ne</label><br /></td>
		<td><label for=\"q_osoby_se_snizenou_schopnosti_orientace\" class=\"error\" style=\"display:none;\">Odpovězte</label></td>
                </tr>
                </table>
                <table class=\"table_hide\">
                <tr>
                <td><label for=\"q_podminky_pro_zasah_proti_pozaru_ano\">Jsou zde běžné podmínky pro zásah v případě požáru?</label><br />
		<input type=\"radio\" id=\"q_podminky_pro_zasah_proti_pozaru_ano\" name=\"q_podminky_pro_zasah_proti_pozaru\" value=\"ano\"><label for=\"q_podminky_pro_zasah_proti_pozaru_ano\">ano</label> / <input type=\"radio\" id=\"q_podminky_pro_zasah_proti_pozaru_ne\" name=\"q_podminky_pro_zasah_proti_pozaru\" value=\"ne\"><label for=\"q_podminky_pro_zasah_proti_pozaru_ne\">ne</label><br /></td>
		<td><label for=\"q_podminky_pro_zasah_proti_pozaru\" class=\"error\" style=\"display:none;\">Odpovězte</label></td>
                </tr>
                </table>
                <label for=\"poznamky\">poznámky</label><br />
		<textarea name=\"poznamky\" id=\"poznamky\" class=\"formular\" rows=\"10\" cols=\"50\"></textarea><br />
		<input class=\"tlacitko\" type=\"submit\" value=\"přidat\"> <a href=\"./budova.php?firma=".$_GET['id_firma']."&provozovna=".$_GET['id_provozovna']."\">nepřidávat</a>
		</fieldset>
		</form>
           <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#nova_budova').validate({
             rules: {
               jmeno: {
                 required: true
               },
               popis: {
                 required: true
               },
               pocet_podlazi: {
                 required: true,
                 min: 1
               },
               q_vyssi_nez_22: {
                 required: true
               },
               q_shromazduje_se_vetsi_pocet_lidi: {
                 required: true
               },
               q_je_v_budove_obchod: {
                 required: true
               },
               q_jsou_zde_ubytovany_osoby: {
                 required: true
               },
               q_osoby_se_snizenou_schopnosti_orientace: {
                 required: true
               },
               q_podminky_pro_zasah_proti_pozaru: {
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
?>