<?php
function autorizace()
{	
	if(IsSet($_POST['jmeno']))
	{
		$result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [jmeno] = %s',$_POST['jmeno']);
		if(!$row = $result->fetch())
		{
			echo "<h4>Autorizace neproběhla úspěšně - uživatel neexistuje</h4>
			<p>Některý ze zadaných údajů není správný <a href=\"./autorizace.php?id=autorizace\">opakujte autorizaci</a>.</p>";
			return 1;
		}
	
		$kontrolnikod = $row['sul'];
		$id_autorizovaneho = $row['id'];
		$stav = $row['stav'];

		if($kontrolnikod == $_POST['kontrolni_kod'] && $stav == "ceka_na_autorizaci")
		{
			echo "<h4>Autorizace proběhla úspěšně</h4>
			<p>Můžete se nyní <a href=\"./index.php\">přihlásit do systému</a>.</p>";
    
			$sul = Random_Password(15);
			$hash = md5 ($_POST['heslo'] . $sul);
      
			$arr_login = array('text'  => 'Uživatel autorizován', 'link' => '', 'ad' => $id_autorizovaneho);
			vytvor_log($arr_login);       
      
			$arr = array('heslo' => $hash, 'sul'  => $sul, 'stav' => 'aktivni');
			dibi::query('UPDATE [prevent_uzivatele] SET ', $arr, 'WHERE [id] =%i', $id_autorizovaneho);
		}
		else
		{
			echo "<h4>Autorizace neproběhla úspěšně</h4>
			<p>Některý ze zadaných údajů není správný <a href=\"./autorizace.php?id=autorizace\">opakujte autorizaci</a>.</p>";
			return 1;
		}
	}
	else
	{
		echo "<form method=\"POST\" action=\"./autorizace.php?id=autorizace\" name=\"autorizace\" onSubmit=\"return check(this);\">
		<fieldset>
		<legend>přihlašovací údaje</legend> 
		<input name=\"jmeno\" class=\"formular\" value=\"jméno uživatele\"><br />
		<input name=\"kontrolni_kod\" class=\"formular\" value=\"kontrolní kód\"><br />
		<input type= \"password\" name=\"heslo\" class=\"formular\" value=\"heslo\"><br />
		<input class=\"tlacitko\" type=\"submit\" value=\"autorizovat\">
		</fieldset>
		</form>";
	}
}

function zapomenute_heslo()
{
	if(IsSet($_POST['jmeno']))
	{
		$result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [jmeno] = %s',$_POST['jmeno']);
		if(!$row = $result->fetch())
		{
			echo "<h4>Žádost neproběhla úspěšně - uživatel neexistuje</h4>
			<p>Některý ze zadaných údajů není správný <a href=\"./autorizace.php?id=zapomenute_heslo\">opakujte akci</a>.</p>";
			return 1;
		}
	
		$stav = $row['stav'];
		$id_uzivatele = $row['id'];
		$jmeno_uzivatele = $row['jmeno'];
	
		if($stav == "aktivni")
		{
			echo "<h4>Požádal jste úspěšbě o nové heslo</h4>
			<p>Nyní je potřeba aby jste se autorizoval do systému.<br />
			Autorizace probíhá na stránce <strong>autorizace do systému</strong>.<br />
			Je nutné aby jste vyplnil Vámi zvolené <strong>heslo</strong> a správně udal <strong>kontrolní kód</strong>.<br />
			Kontroní kód Vám sdělí administrátor.</p>";
  	
			$nahoda = Random_Password(10);
  	
			$zprava = "Uživatel: ".$jmeno_uzivatele."<br />kód: ".$nahoda;
			$arr = array('heslo' => '', 'sul'  => $nahoda, 'stav' => 'ceka_na_autorizaci');
			dibi::query('UPDATE [prevent_uzivatele] SET ', $arr, 'WHERE [id] =%i', $id_uzivatele);
  	
			$arr_login = array('text'  => 'Uživatel požádal o nové heslo', 'link' => '', 'ad' => $id_uzivatele);
			vytvor_log($arr_login);    

			$arr_ukol = array('deadline' => '', 'text'  => 'Předat uživateli kontrolní kód', 'popis' => $zprava, 'link' => '', 'ad' => '1');
			novy_ukol($arr_ukol);	
		}
		else
		{
			echo "<h4>Žádost neproběhla úspěšně - nelze požádat o heslo</h4>
			<p>Některý ze zadaných údajů není správný <a href=\"./autorizace.php?id=zapomenute_heslo\">opakujte akci</a>.</p>";
			return 1;
		}
	}
	else
	{
		echo "<form method=\"POST\" action=\"./autorizace.php?id=zapomenute_heslo\" name=\"zapomenute_heslo\" onSubmit=\"return check_zap_heslo(this);\">
		<fieldset>
		<legend>jméno uživatele</legend> 
		<input name=\"jmeno\" class=\"formular\" value=\"jméno uživatele\"><br />
		<input class=\"tlacitko\" type=\"submit\" value=\"požádat o nové heslo\">
		</fieldset>
		</form>";
	}
}

function odblokovat()
{
	if(IsSet($_POST['jmeno']))
	{
		$result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [jmeno] = %s',$_POST['jmeno']);
		if(!$row = $result->fetch())
		{
			echo "<h4>Žádost nebyla podána - uživatel neexistuje</h4>
			<p>Můžete <a href=\"./autorizace.php?id=odblokovat\">opakovat akci</a>.</p>";
			return 1;
		}
	
		$hash = md5 ($_POST['heslo'] . $row['sul']);
		
		if($row['heslo'] == $hash && $row['stav'] == "blokovan")
		{
			echo "<h4>Žádost podána</h4>
			<p>Nyní musíte vyčkat než Vás admin odblokuje.</p>";
    
			$arr_login = array('text'  => 'Uživatel požádal o odblokování', 'link' => '', 'ad' => $row['id']);
			vytvor_log($arr_login);    

			$arr_ukol = array('deadline' => '', 'text'  => 'Přezkoumat žádost o odblokování uživatele '.$_POST['jmeno'].'.', 'popis' => '', 'link' => '', 'ad' => '1');
			novy_ukol($arr_ukol);	
		}
		else
		{
			echo "<h4>Žádost nebyla podána</h4>
			<p>Nesprávně zadané heslo nebo uživatel není blokován. Můžete <a href=\"./autorizace.php?id=odblokovat\">opakovat akci</a>.</p>";
			return 1;
		}
	}
	else
	{
		
		echo "
		<h4>Váš účet je blokován</h4><p>Můžete požádat adminstrátora o odblokování</p>
		<form method=\"POST\" action=\"./autorizace.php?id=odblokovat\" name=\"odblokovat\">
		<fieldset>
		<legend>přihlašovací údaje</legend> 
		<input name=\"jmeno\" class=\"formular\" value=\"jméno uživatele\"><br />
		<input type= \"password\" name=\"heslo\" class=\"formular\" value=\"heslo\"><br />
		<input class=\"tlacitko\" type=\"submit\" value=\"požádat\">
		</fieldset>
		</form>";
	}	
}
?>