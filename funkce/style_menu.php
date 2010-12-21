<?php
function menu($parametr, $active_menu)
{
	//menu dve
	$active_menu_dve['hlavni'] = " class=\"inactive\"";
	$active_menu_dve['admin'] = " class=\"inactive\"";
	$active_menu_dve['admin_firmy'] = " class=\"inactive\"";
	$active_menu_dve['admin_audit'] = " class=\"inactive\"";
	$active_menu_dve['koordinator'] = " class=\"inactive\"";
	$active_menu_dve['koordinator_firmy'] = " class=\"inactive\"";
	$active_menu_dve['koordinator_audit'] = " class=\"inactive\"";
	$active_menu_dve['technik'] = " class=\"inactive\"";
	$active_menu_dve['technik_firmy'] = " class=\"inactive\"";
	$active_menu_dve['technik_audit'] = " class=\"inactive\"";
	$active_menu_dve['firma'] = " class=\"inactive\"";
	$active_menu_dve['firma_audit'] = " class=\"inactive\"";

        $active_menu_dve['synchronizace'] = " class=\"inactive\"";
	
	if($parametr == "autorizovan_admin")
	{
		$parametr = "autorizovan";
		$parametrdve = "admin";
	}
	elseif($parametr == "autorizovan_admin_firmy")
	{
		$parametr = "autorizovan";
		$parametrdve = "admin_firmy";
	}
	elseif($parametr == "autorizovan_admin_audit")
	{
		$parametr = "autorizovan";
		$parametrdve = "admin_audit";
	}
	elseif($parametr == "autorizovan_koordinator")
	{
		$parametr = "autorizovan";
		$parametrdve = "koordinator";
	}
	elseif($parametr == "autorizovan_koordinator_firmy")
	{
		$parametr = "autorizovan";
		$parametrdve = "koordinator_firmy";
	}
	elseif($parametr == "autorizovan_koordinator_audit")
	{
		$parametr = "autorizovan";
		$parametrdve = "koordinator_audit";
	}
	elseif($parametr == "autorizovan_technik")
	{
		$parametr = "autorizovan";
		$parametrdve = "technik";
	}
	elseif($parametr == "autorizovan_technik_firmy")
	{
		$parametr = "autorizovan";
		$parametrdve = "technik_firmy";
	}
	elseif($parametr == "autorizovan_technik_audit")
	{
		$parametr = "autorizovan";
		$parametrdve = "technik_audit";
	}
	elseif($parametr == "firma")
	{
		$parametr = "autorizovan";
		$parametrdve = "firma";
	}
	elseif($parametr == "autorizovan_firma_audit")
	{
		$parametr = "autorizovan";
		$parametrdve = "firma_audit";
	}
	else
	{
		$parametrdve = "hlavni";
	}

	//vyhodnoceni
	$active[$active_menu] = " class=\"active\"";
	$active_menu_dve[$parametrdve] = " class=\"active\"";
	//KONEC matice aktivnich polozek menu

	echo "<div class=\"navboxwrap\">";  echo"<div class=\"navbox\">"; menu_quicklink();
	//zacatek vetveni menu
	if($parametr == "faq")
	{
		echo "<div class=\"active\">
		<h5>Nápověda</h5>
    		<ul>
    			<li".$active['novinky']."><a href=\"./novinky.php\">Novinky [".nove_novinky()." nové]</a></li>
				<li".$active['o_systemu']."><a href=\"./faq.php?id=o_systemu\">O systému</a></li>
     	 		<li".$active['prehled_funkci']."><a href=\"./faq.php?id=prehled_funkci\">Přehled funkcí</a></li>
      			<li".$active['prehled_verzi_systemu']."><a href=\"./faq.php?id=prehled_verzi_systemu\">Přehled verzí systému</a></li>
    		</ul>
  	      </div>";
	}
	elseif($parametr == "index" || $parametr == "autorizace")
	{
		echo "<div class=\"active\">
		<h5>Hlavní stránka</h5>
		<ul>
			<li".$active['prihlasit_se']."><a href=\"./index.php\">Přihlásit se</a></li>
			<li".$active['novinky']."><a href=\"./novinky.php\">Novinky [".nove_novinky()." nové]</a></li>
			<li".$active['zapomenute_heslo']."><a href=\"./autorizace.php?id=zapomenute_heslo\">Zapomenuté heslo</a></li>
			<li".$active['odblokovat']."><a href=\"./autorizace.php?id=odblokovat\">Odblokovat uživatele</a></li>
			<li".$active['autorizace']."><a href=\"./autorizace.php?id=autorizace\">Autorizace do systému</a></li>
		</ul>
		</div>";
	}
	elseif($parametr == "autorizovan")
	{		
		if($_SESSION['prava_usr'] == "firma")
		{
			//zjistuju id nastenky
			$result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $_SESSION['id_usr']);
			$row = $result->fetch();
			echo "<div".$active_menu_dve['hlavni'].">
			<h5>Audity</h5>
			<ul>
				<li".$active['hlavni_strana']."><a href=\"./index.php\">Připomínkovat audit</a></li>
			</ul>
			</div>";


//			echo "<div".$active_menu_dve['hlavni'].">
//			<h5>Obecné</h5>
//			<ul>
//				<li".$active['hlavni_strana']."><a href=\"./index.php\">Hlavní stránka</a></li>
//				<li".$active['nastenka']."><a href=\"./nastenka.php\">Nástěnka [".nove_zpravy_v_nastence($row['ad'])." nové]</a></li>
//				<li".$active['posta']."><a href=\"./posta.php?id=prijata\">Pošta [".nove_zpravy_v_poste()." nové]</a></li>
//				<li".$active['nastaveni']."><a href=\"./nastaveni.php\">Nastavení</a></li>
//				<li".$active['zapisnik']."><a href=\"./zapisnik.php\">Zápisník</a></li>
//				<li".$active['uzivatele']."><a href=\"./uzivatele.php\">Uživatelé</a></li>
//			</ul>
//			</div>";
//
//  			echo "<div".$active_menu_dve['firma_audit'].">
//			<h5>Audity</h5>
//			<ul>
//				<li".$active['sprava_auditu']."><a href=\"./index.php\">Připomínkovat audit</a></li>
//                                    <li".$active['sprava_auditu']."><a href=\"./index.php\">Hotové audity</a></li>
//
//			</ul>
//			</div>";
//
//			$result = dibi::query('SELECT * FROM [prevent_firmy_uzivatele_prava] WHERE [id_uzivatel] = %i', $_SESSION['id_usr']);
//			$row = $result->fetch();
//
//			if($row['prava'] == "admin")
//			{
//				echo "<div".$active_menu_dve['firma'].">
//				<h5>Klient</h5>
//				<ul>
//					<li".$active['informace']."><a href=\"./zakaznik.php?id=informace\">Informace</a></li>
//					<li".$active['logy']."><a href=\"./zakaznik.php?id=logy\">Logy</a></li>
//					<li".$active['kontaktni_osoby']."><a href=\"./zakaznik.php?id=kontaktni_osoby\">Kontaktní osoby</a></li>
//					<li".$active['firemni_uzivatele']."><a href=\"./zakaznik.php?id=firemni_uzivatele\">Klient - uživatelé</a></li>
//					<li".$active['osoba']."><a href=\"./osoba.php\">Osoba</a></li>
//					<li".$active['budova']."><a href=\"./budova.php\">Budova</a></li>
//					<li".$active['pracoviste']."><a href=\"./pracoviste.php\">Pracoviště</a></li>
//					<li".$active['relace']."><a href=\"./relace.php?id=enter\">Relace</a></li>
//				</ul>
//				</div>";
//				
//				echo "<div".$active_menu_dve['firma_audit'].">
//				<h5>Audity</h5>
//				<ul>
//				<li".$active['sprava_auditu']."><a href=\"./sprava_auditu.php?id=prehled_auditu\" title=\"[nezahájené technikem / nedokončené technikem / provedené technikem / nedokončené klientem / potvrzené klientem / zamítlé klientem / dokončené]\">Přehled auditů ".zprava_o_auditech_filtr_vse("firma_admin")."</a></li>
//                                </ul>
//				</div>";
//			}
//			else
//			{
//				echo "<div".$active_menu_dve['firma'].">
//				<h5>Firma</h5>
//				<ul>
//					<li".$active['informace']."><a href=\"./zakaznik.php?id=informace\">Informace</a></li>
//					<li".$active['kontaktni_osoby']."><a href=\"./zakaznik.php?id=kontaktni_osoby\">Kontaktní osoby</a></li>
//					<li".$active['osoba']."><a href=\"./osoba.php\">Osoba</a></li>
//					<li".$active['budova']."><a href=\"./budova.php\">Budova</a></li>
//					<li".$active['pracoviste']."><a href=\"./pracoviste.php\">Pracoviště</a></li>
//					<li".$active['relace']."><a href=\"./relace.php?id=enter\">Relace</a></li>
//				</ul>
//				</div>";
//
//				echo "<div".$active_menu_dve['firma_audit'].">
//				<h5>Audity</h5>
//				<ul>
//				<li".$active['sprava_auditu']."><a href=\"./sprava_auditu.php?id=prehled_auditu\" title=\"[nezahájené technikem / nedokončené technikem / provedené technikem / nedokončené klientem / potvrzené klientem / zamítlé klientem / dokončené]\">Přehled auditů ".zprava_o_auditech_filtr_vse("firma_normal")."</a></li>
//				</ul>
//				</div>";
//			}
		}
		elseif ($_SESSION['prava_usr'] == "admin")
		{
			echo "<div".$active_menu_dve['hlavni'].">
			<h5>Obecné</h5>
			<ul>
				<li".$active['hlavni_strana']."><a href=\"./index.php\">Hlavní stránka</a></li>
				<li".$active['nastenka']."><a href=\"./nastenka.php\">Nástěnka [".nove_zpravy_v_nastence_admin()." nové]</a></li>
				<li".$active['posta']."><a href=\"./posta.php?id=prijata\">Pošta [".nove_zpravy_v_poste()." nové]</a></li>
				<li".$active['ukoly']."><a href=\"./ukoly.php\" title=\"[nové/akutní/čekající/splněné/odmítnuté]\">Úkoly ".zprava_o_ukolech()."</a></li>
				<li".$active['nastaveni']."><a href=\"./nastaveni.php\">Nastavení</a></li>
				<li".$active['zapisnik']."><a href=\"./zapisnik.php\">Zápisník</a></li>
				<li".$active['prava']."><a href=\"./prava.php\">Práva: ".hlaska_prav()."</a></li>
                                <li".$active['uzivatele']."><a href=\"./uzivatele.php\">Uživatelé</a></li>
			</ul>
			</div>";
			
			echo "<div".$active_menu_dve['admin'].">
			<h5>Admistrátor</a></h5>
			<ul>
				<li".$active['uzivatelske_ukoly']."><a href=\"./uzivatelske_ukoly.php\">Zadávání ukolů</a></li>
				<li".$active['sprava_uzivatelu']."><a href=\"./administrace.php?id=sprava_uzivatelu\">Správa uživatelů</a></li>
				<li".$active['ukoly_uzivatelu']."><a href=\"./administrace.php?id=ukoly_uzivatelu\">Úkoly uživatelů</a></li>
				<li".$active['logy_uzivatelu']."><a href=\"./administrace.php?id=logy_uzivatelu\">Logy uživatelů</a></li>
				<li".$active['zalohy']."><a href=\"./administrace.php?id=zalohy\">Zálohy</a></li>
				<li".$active['udrzba']."><a href=\"./administrace.php?id=udrzba\">Údržba</a></li>
				<li".$active['system']."><a href=\"./administrace.php?id=system\">Systém</a></li>
				<li".$active['novinky']."><a href=\"./administrace.php?id=novinky\">Novinky</a></li>
				<li".$active['cron']."><a href=\"./administrace.php?id=cron\">Cron</a></li>
			</ul>
			</div>";
			
			echo "<div".$active_menu_dve['admin_firmy'].">
			<h5>Koordinátor</h5>
			<ul>
				<li".$active['firmy']."><a href=\"./firmy_koordinator.php\">Klienti</a> (<a href=\"./firmy_koordinator.php?action=pridat\">přidat</a>)</li>
				<li".$active['provozovna']."><a href=\"./provozovna.php\">Pobočka</a></li>
                                <li".$active['osoba']."><a href=\"./osoba.php\">Osoba</a></li>
				<li".$active['budova']."><a href=\"./budova.php\">Budova</a></li>
				<li".$active['pracoviste']."><a href=\"./pracoviste.php\">Pracoviště</a></li>
				<li".$active['relace']."><a href=\"./relace.php?id=enter\">Relace</a></li>
			</ul>
			</div>";
			
			echo "<div".$active_menu_dve['admin_audit'].">
			<h5>Audity</h5>
			<ul>
				<li".$active['sprava_auditu']."><a href=\"./sprava_auditu.php?id=enter\" title=\"[nezahájené technikem / nedokončené technikem / provedené technikem / nedokončené klientem / potvrzené klientem / zamítlé klientem / dokončené]\">Správa auditů ".zprava_o_auditech_filtr_vse("koordinator")."</a></li>
                                <li".$active['zadat_audit']."><a href=\"./sprava_auditu.php?id=zadat_audit\">Zadat audit</a></li>
                                <li".$active['synchronizace']."><a href=\"./synchronizace.php?id=synchronizace\" >Synchronizace [".pocet_auditu_na_localu_koordinator()."]</a></li>
                                <li".$active['import']."><a href=\"./synchronizace.php?id=import\" >Import</a></li>
                                <li".$active['nastaveni_auditu']."><a href=\"./nastaveni_auditu.php?id=enter\" title=\"Nastavení auditů\">Nastavení auditů</a></li>
                        </ul>
			</div>";

		}
		elseif ($_SESSION['prava_usr']  == "koordinator")
		{
			echo "<div".$active_menu_dve['hlavni'].">
			<h5>Obecné</h5>
			<ul>
				<li".$active['hlavni_strana']."><a href=\"./index.php\">Hlavní stránka</a></li>
                                <li".$active['firmy']."><a href=\"./firmy_koordinator.php\">Klienti</a>  (<a href=\"./firmy_koordinator.php?action=pridat\">přidat</a>)</li>
                                <li".$active['']."><a href=\"./sprava_auditu.php?id=filtr&filtr=nedokoncene_technik\" title=\"[audity nedokončené technikem]\">Nedokončené technikem [".o_auditech_filtr("koordinator", "nedokoncene_technik")."]</a></li>
                                <li".$active['']."><a href=\"./sprava_auditu.php?id=filtr&filtr=potvrzene_firma\" title=\"[audity nedokončené technikem]\">Dokončit audit [".o_auditech_filtr("koordinator", "potvrzene_firma")."]</a></li>
                                <li".$active['']."><a href=\"./sprava_auditu.php?id=filtr&filtr=dokoncene\" title=\"[audity nedokončené technikem]\">Hotové audity [".o_auditech_filtr("koordinator", "dokoncene")."]</a></li>";

			echo "</ul>
			</div>";
			
			echo "<div".$active_menu_dve['koordinator'].">
			<h5>Administrátor</h5>
			<ul>
				<li".$active['uzivatelske_ukoly']."><a href=\"./uzivatelske_ukoly.php\">Zadávání ukolů</a></li>
				<li".$active['ukoly_uzivatelu']."><a href=\"./administrace.php?id=ukoly_uzivatelu\">Úkoly uživatelů</a></li>
				<li".$active['logy_uzivatelu']."><a href=\"./administrace.php?id=logy_uzivatelu\">Logy uživatelů</a></li>
			</ul>
			</div>";
			
			echo "<div".$active_menu_dve['koordinator_firmy'].">
			<h5>Koordinátor</h5>
			<ul>
				<li".$active['firmy']."><a href=\"./firmy_koordinator.php\">Klienti</a>  (<a href=\"./firmy_koordinator.php?action=pridat\">přidat</a>)</li>
                                <li".$active['provozovna']."><a href=\"./provozovna.php\">Pobočka</a></li>
				<li".$active['osoba']."><a href=\"./osoba.php\">Osoba</a></li>
				<li".$active['budova']."><a href=\"./budova.php\">Budova</a></li>
				<li".$active['pracoviste']."><a href=\"./pracoviste.php\">Pracoviště</a></li>
				<li".$active['relace']."><a href=\"./relace.php?id=enter\">Relace</a></li>
			</ul>
			</div>";
			
			echo "<div".$active_menu_dve['koordinator_audit'].">
			<h5>Audity</h5>
			<ul>
				<li".$active['sprava_auditu']."><a href=\"./sprava_auditu.php?id=enter\" title=\"[nezahájené technikem / nedokončené technikem / provedené technikem / nedokončené klientem / potvrzené klientem / zamítlé klientem / dokončené]\">Správa auditů ".zprava_o_auditech_filtr_vse("koordinator")."</a></li>
                                <li".$active['zadat_audit']."><a href=\"./sprava_auditu.php?id=zadat_audit\">Zadat audit</a></li>
                                <li".$active['']."><a href=\"./sprava_auditu.php?id=filtr&filtr=nezahajene_technik\">Nezahájené audity [".o_auditech_filtr("koordinator", "nezahajene_technik")."]</a></li>
                                <li".$active['']."><a href=\"./sprava_auditu.php?id=filtr&filtr=nedokoncene_technik\">Prováděné audity [".o_auditech_filtr("koordinator", "nedokoncene_technik")."]</a></li>
                                <li".$active['']."><a href=\"./sprava_auditu.php?id=filtr&filtr=dokoncene_technik\">Předané koordinátorovi [".o_auditech_filtr("koordinator", "dokoncene_technik")."]</a></li>
                                <li".$active['']."><a href=\"./sprava_auditu.php?id=filtr&filtr=zamitle_firma\">Připomínkované klientem [".o_auditech_filtr("koordinator", "zamitle_firma")."]</a></li>";
//                                <li".$active['synchronizace']."><a href=\"./synchronizace.php?id=synchronizace\" >Synchronizace [".pocet_auditu_na_localu_koordinator()."]</a></li>
//                                <li".$active['import']."><a href=\"./synchronizace.php?id=import\" >Import</a></li>
                                echo "<li".$active['']."><a href=\"./sprava_auditu.php?id=filtr&filtr=dokoncene\" title=\"Dokončené audity\">Dokončené audity [".o_auditech_filtr("koordinator", "dokoncene")."]</a></li>
                                <li".$active['nastaveni_auditu']."><a href=\"./nastaveni_auditu.php?id=enter\" title=\"Nastavení auditů\">Nastavení auditů</a></li>
			</ul>
			</div>";

		}
		elseif ($_SESSION['prava_usr'] == "technik")
		{
			echo "<div".$active_menu_dve['hlavni'].">
			<h5>Obecné</h5>
			<ul>
				<li".$active['hlavni_strana']."><a href=\"./index.php\">Hlavní stránka</a></li>

                                <li".$active['firmy']."><a href=\"./firmy_technik.php\">Klienti</a></li>
                                <li".$active['']."><a href=\"./sprava_auditu.php?id=filtr&filtr=nezahajene_technik\" title=\"\">Nezahájené audity [".o_auditech_filtr("technik", "nezahajene_technik")."]</a></li>
                                <li".$active['']."><a href=\"./sprava_auditu.php?id=filtr&filtr=nedokoncene_technik\" title=\"\">Prováděné audity [".o_auditech_filtr("technik", "nedokoncene_technik")."]</a></li>
                                <li".$active['']."><a href=\"./sprava_auditu.php?id=filtr&filtr=dokoncene_technik\" title=\"\">Předané audity [".o_auditech_filtr("technik", "dokoncene_technik")."]</a></li>
                                <li".$active['']."><a href=\"./sprava_auditu.php?id=filtr&filtr=dokoncene\" title=\"\">Hotové audity [".o_auditech_filtr("koordinator", "dokoncene")."]</a></li>
			</ul>
			</div>";
			
			echo "<div".$active_menu_dve['technik_firmy'].">
			<h5>Technik</h5>
			<ul>
				<li".$active['firmy']."><a href=\"./firmy_technik.php\">Klienti</a></li>
                                <li".$active['provozovna']."><a href=\"./provozovna.php\">Pobočka</a></li>
				<li".$active['osoba']."><a href=\"./osoba.php\">Osoba</a></li>
				<li".$active['budova']."><a href=\"./budova.php\">Budova</a></li>
				<li".$active['pracoviste']."><a href=\"./pracoviste.php\">Pracoviště</a></li>
				<li".$active['relace']."><a href=\"./relace.php?id=enter\">Relace</a></li>
			</ul>
			</div>";

			echo "<div".$active_menu_dve['technik_audit'].">
			<h5>Audity</h5>
			<ul>
				<li".$active['sprava_auditu']."><a href=\"./sprava_auditu.php?id=enter\" title=\"[nezahájené technikem / nedokončené technikem / provedené technikem / nedokončené klientem / potvrzené klientem / zamítlé klientem / dokončené]\">Přehled auditů ".zprava_o_auditech_filtr_vse("technik")."</a></li>
                                <li".$active['']."><a href=\"./sprava_auditu.php?id=filtr&filtr=nezahajene_technik\" title=\"\">Nezahájené audity [".o_auditech_filtr("technik", "nezahajene_technik")."]</a></li>
                                <li".$active['']."><a href=\"./sprava_auditu.php?id=filtr&filtr=nedokoncene_technik\" title=\"\">Prováděné audity [".o_auditech_filtr("technik", "nedokoncene_technik")."]</a></li>
                                <li".$active['']."><a href=\"./sprava_auditu.php?id=filtr&filtr=dokoncene_technik\" title=\"\">Předané audity [".o_auditech_filtr("technik", "dokoncene_technik")."]</a></li>
                                <li".$active['']."><a href=\"./sprava_auditu.php?id=filtr&filtr=potvrzene_firma\" title=\"\">Připomínkované audity [".o_auditech_filtr("technik", "potvrzene_firma")."]</a></li>";
//                                <li".$active['synchronizace']."><a href=\"./synchronizace.php?id=synchronizace\" >Synchronizace [".pocet_auditu_na_localu_technik()."]</a></li>
//                                <li".$active['import']."><a href=\"./synchronizace.php?id=import\" >Import</a></li>
                                echo "<li".$active['']."><a href=\"./sprava_auditu.php?id=filtr&filtr=dokoncene\" title=\"\">Hotové audity [".o_auditech_filtr("koordinator", "dokoncene")."]</a></li>
			</ul>
			</div>";
		}
	}
//KONEC vetveni menu
	echo "</div></div>";
}
?>