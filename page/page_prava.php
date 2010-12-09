<?php
function prava()
{
	if($_SESSION['prava_usr'] == "admin")
	{
		echo "
		<h4>Obecné</h4>
		<ul>
			<li".$active['hlavni_strana']."><a href=\"./index.php\">Hlavní stránka</a> - úvodní stránka s informacema</li> 
			<li".$active['nastenka']."><a href=\"./nastenka.php\">Nástěnka [".nove_zpravy_v_nastence_admin()." nové]</a> - portál nástěnky pro komunikaci s ostatními uživateli Guardianu (nikoliv firemními)</li>
			<li".$active['novinky']."><a href=\"./novinky.php\">Novinky [".nove_novinky()." nové]</a> - stánka sloužící pro předávání informací od adminu systému všem uživatelům</li>
			<li".$active['posta']."><a href=\"./posta.php?id=prijata\">Pošta [".nove_zpravy_v_poste()." nové]</a> - funkcionalita pošty</li>
			<li".$active['ukoly']."><a href=\"./ukoly.php\" title=\"[nové/akutní/čekající/splněné/odmítnuté]\">Úkoly ".zprava_o_ukolech()."</a> - funkcionalita úkolů, zde si vyzvedáváte úkoly, hlásíte jejich splnění atd.</li>
			<li".$active['nastaveni']."><a href=\"./nastaveni.php\">Nastavení</a> - nastavení uživatele</li>
			<li".$active['prava']."><a href=\"./prava.php\">Práva: ".hlaska_prav()."</a> - tato informativní stránka o vašich možnostech</li>
		</ul>
		<h4>Administrátor</h4>
		<ul>
			<li".$active['uzivatelske_ukoly']."><a href=\"./uzivatelske_ukoly.php\">Zadávání ukolů</a> - zde můžete zadávat úkoly jiným uživatelům, zjistíte zde i jestli úkol splnili atd.</li>
			<li".$active['sprava_uzivatelu']."><a href=\"./administrace.php?id=sprava_uzivatelu\">Správa uživatelů</a> - administrátor zde vytváří, blokuje a zjišťuje informace o uživatelích.</li>
			<li".$active['ukoly_uzivatelu']."><a href=\"./administrace.php?id=ukoly_uzivatelu\">Úkoly uživatelů</a> - admin zde zjistí všechny úkoly uživatelů</li>
			<li".$active['logy_uzivatelu']."><a href=\"./administrace.php?id=logy_uzivatelu\">Logy uživatelů</a> - admin zde může prohlédnout logy aktivity užibvatelů a systému.</li>
			<li".$active['zalohy']."><a href=\"./administrace.php?id=zalohy\">Zálohy</a> - vytváření záloh systému</li>
			<li".$active['udrzba']."><a href=\"./administrace.php?id=udrzba\">Údržba</a> - čištění tabulek systému, údržba db</li>
			<li".$active['system']."><a href=\"./administrace.php?id=system\">Systém</a> - zadávání informacích o verzích systému</li>
			<li".$active['novinky']."><a href=\"./administrace.php?id=novinky\">Novinky</a> - admin zde vytváří novinky ro uživatele</li>
		</ul>
		<h4>Koordinátor</h4>
		<ul>
			<li".$active['firmy']."><a href=\"./firmy_koordinator.php\">Firmy</a> - správa firem (vytváření, mazání, úprava), správa firemního uživatele (blokování, logy)</li>
		</ul>";

	}
	elseif($_SESSION['prava_usr'] == "koordinator")
	{
		echo "
		<h4>Obecné</h4>
		<ul>
			<li".$active['hlavni_strana']."><a href=\"./index.php\">Hlavní stránka</a> - úvodní stránka s informacema</li> 
			<li".$active['nastenka']."><a href=\"./nastenka.php\">Nástěnka [".nove_zpravy_v_nastence_koordinator()." nové]</a> - portál nástěnky pro komunikaci s ostatními uživateli Guardianu (nikoliv firemními)</li>
			<li".$active['novinky']."><a href=\"./novinky.php\">Novinky [".nove_novinky()." nové]</a> - stánka sloužící pro předávání informací od adminu systému všem uživatelům</li>
			<li".$active['posta']."><a href=\"./posta.php?id=prijata\">Pošta [".nove_zpravy_v_poste()." nové]</a> - funkcionalita pošty</li>
			<li".$active['ukoly']."><a href=\"./ukoly.php\" title=\"[nové/akutní/čekající/splněné/odmítnuté]\">Úkoly ".zprava_o_ukolech()."</a> - funkcionalita úkolů, zde si vyzvedáváte úkoly, hlásíte jejich splnění atd.</li>
			<li".$active['nastaveni']."><a href=\"./nastaveni.php\">Nastavení</a> - nastavení uživatele</li>
			<li".$active['prava']."><a href=\"./prava.php\">Práva: ".hlaska_prav()."</a> - tato informativní stránka o vašich možnostech</li>
		</ul>
		<h4>Administrátor</h4>
		<ul>
			<li".$active['uzivatelske_ukoly']."><a href=\"./uzivatelske_ukoly.php\">Zadávání ukolů</a> - zde můžete zadávat úkoly jiným uživatelům, zjistíte zde i jestli úkol splnili atd.</li>
			<li".$active['ukoly_uzivatelu']."><a href=\"./administrace.php?id=ukoly_uzivatelu\">Úkoly uživatelů</a> - koorninátor zde zjistí všechny úkoly uživatelů</li>
			<li".$active['logy_uzivatelu']."><a href=\"./administrace.php?id=logy_uzivatelu\">Logy uživatelů</a> - koordinátor zde může prohlédnout logy aktivity užibvatelů a systému.</li>		
		</ul>
		<h4>Koordinátor</h4>
		<ul>
			<li".$active['firmy']."><a href=\"./firmy_koordinator.php\">Firmy</a> - správa firem (vytváření, mazání, úprava), správa firemního uživatele (blokování, logy)</li>
		</ul>";	
	}
	elseif($_SESSION['prava_usr'] == "technik")
	{
		echo "
		<h4>Obecné</h4>
		<ul>
			<li".$active['hlavni_strana']."><a href=\"./index.php\">Hlavní stránka</a> - úvodní stránka s informacema</li> 
			<li".$active['nastenka']."><a href=\"./nastenka.php\">Nástěnka [".nove_zpravy_v_nastence_technik()." nové]</a> - portál nástěnky pro komunikaci s ostatními uživateli Guardianu (nikoliv firemními)</li>
			<li".$active['novinky']."><a href=\"./novinky.php\">Novinky [".nove_novinky()." nové]</a> - stánka sloužící pro předávání informací od adminu systému všem uživatelům</li>
			<li".$active['posta']."><a href=\"./posta.php?id=prijata\">Pošta [".nove_zpravy_v_poste()." nové]</a> - funkcionalita pošty</li>
			<li".$active['ukoly']."><a href=\"./ukoly.php\" title=\"[nové/akutní/čekající/splněné/odmítnuté]\">Úkoly ".zprava_o_ukolech()."</a> - funkcionalita úkolů, zde si vyzvedáváte úkoly, hlásíte jejich splnění atd.</li>
			<li".$active['nastaveni']."><a href=\"./nastaveni.php\">Nastavení</a> - nastavení uživatele</li>
			<li".$active['prava']."><a href=\"./prava.php\">Práva: ".hlaska_prav()."</a> - tato informativní stránka o vašich možnostech</li>
		</ul>
		<h4>Koordinátor</h4>
		<ul>
			<li".$active['firmy']."><a href=\"./firmy_technik.php\">Firmy</a> - technik zde zjistí informace o jemu přidělených firmách</li>
		</ul>";	
	}
	elseif($_SESSION['prava_usr'] == "firma")
	{
		$result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE  [id] = %i',$_SESSION['id_usr']);
		$row = $result->fetch();
		echo "
		<h4>Obecné</h4>
		<ul>
			<li".$active['hlavni_strana']."><a href=\"./index.php\">Hlavní stránka</a> - úvodní stránka s informacema</li> 
			<li".$active['nastenka']."><a href=\"./nastenka.php\">Nástěnka [".nove_zpravy_v_nastence($row['ad'])." nové]</a> - portál nástěnky pro komunikaci s ostatnímy členy firmy a členy GUARDIANU</li> 
			<li".$active['novinky']."><a href=\"./novinky.php\">Novinky [".nove_novinky()." nové]</a> - stánka sloužící pro předávání informací od adminu systému všem uživatelům</li>
			<li".$active['posta']."><a href=\"./posta.php?id=prijata\">Pošta [".nove_zpravy_v_poste()." nové]</a> - funkcionalita pošty</li>
			<li".$active['nastaveni']."><a href=\"./nastaveni.php\">Nastavení</a> - nastavení uživatele</li>
			<li".$active['prava']."><a href=\"./prava.php\">Práva: ".hlaska_prav()."</a> - tato informativní stránka o vašich možnostech</li>
		</ul>";		
	}
}



?>