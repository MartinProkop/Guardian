-- *** Záloha Systému Guardian ***
-- Vytvořeno: 20:27:07 18.06.2010
-- Vytvořil: kovar

-- Záloha obsahuje kompletní inserty
-- Obnovu může provést pouze hlavní admin

-- Vybrané tabulky: prevent_audit, prevent_audit_checklist, prevent_audit_checklist_bozppo_kategorie_schema, prevent_audit_checklist_bozppo_schema, prevent_audit_checklist_bozp_kategorie_schema, prevent_audit_checklist_bozp_schema, prevent_audit_checklist_kategorie, prevent_audit_checklist_pobezpn_kategorie_schema, prevent_audit_checklist_pobezpn_schema, prevent_audit_checklist_povysokepn_kategorie_schema, prevent_audit_checklist_povysokepn_schema, prevent_audit_checklist_pozvysenepn_kategorie_schema, prevent_audit_checklist_pozvysenepn_schema, prevent_audit_fotografie, prevent_audit_log, prevent_audit_neshody, prevent_audit_planovac, prevent_audit_pracoviste, prevent_audit_protokoly, prevent_audit_soubory, prevent_cron, prevent_cron_log, prevent_firmy, prevent_firmy_budova, prevent_firmy_budova_relace, prevent_firmy_log, prevent_firmy_osoba, prevent_firmy_osoba_preklad, prevent_firmy_osoba_relace, prevent_firmy_pracoviste, prevent_firmy_pracoviste_relace, prevent_firmy_provozovny, prevent_firmy_relace_budova_pracoviste, prevent_firmy_technik, prevent_firmy_uzivatele_prava, prevent_log, prevent_nastenka, prevent_nastenka_shlednuto, prevent_novinky, prevent_posta, prevent_quicklink, prevent_system, prevent_ukoly, prevent_uzivatele, prevent_watchdog, prevent_zalohy, prevent_zapisnik, 

-- Tabulka: 'prevent_audit'
-- Počet řádků tabulky: 0
-- Začátek dat tabulky
INSERT INTO `prevent_audit` VALUES 
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_checklist'
-- Počet řádků tabulky: 0
-- Začátek dat tabulky
INSERT INTO `prevent_audit_checklist` VALUES 
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_checklist_bozppo_kategorie_schema'
-- Počet řádků tabulky: 26
-- Začátek dat tabulky
INSERT INTO `prevent_audit_checklist_bozppo_kategorie_schema` VALUES 
("1", "Povinnosti a odpovědnosti", "1"),
("2", "Kontrola a monitorování", "2"),
("3", "Identifikace a hodnocení rizik", "3"),
("4", "Kategorizace prací", "4"),
("5", "Dokumentace BOZP", "5"),
("6", "Dokumentace BOZP - školení", "6"),
("7", "Dokumentace PO", "7"),
("8", "Účast zaměstnanců na zajišťování práce", "8"),
("9", "Organizace práce - pracovní postupy", "9"),
("10", "Kvalifikace", "10"),
("11", "Lhůty a lhůntíky", "11"),
("12", "Výchova", "12"),
("13", "Odborná školení", "13"),
("14", "Motivace", "14"),
("15", "Zdravotní péče", "15"),
("16", "Osobní ochranné pracovní prostředky (OOPP)", "16"),
("17", "Inventáře a technologické postupy", "17"),
("18", "Stroje", "18"),
("19", "Vyhrazené elektrická zařízení", "19"),
("20", "Vyhrazená tlaková zařízení", "20"),
("21", "Vyhrazené zdvihací zařízení", "21"),
("22", "Vyhrazená plynová zařízení", "22"),
("23", "Sklady", "23"),
("24", "Doprava", "24"),
("25", "Motorové vozíky", "25"),
("26", "Sváření", "26");
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_checklist_bozppo_schema'
-- Počet řádků tabulky: 211
-- Začátek dat tabulky
INSERT INTO `prevent_audit_checklist_bozppo_schema` VALUES 
("1", "1", "Je v rámci vedení podniku určen pracovník odpovědný celkově za oblast BOZP ?", "1", "1"),
("2", "1", "Je  pracovník odpovědný celkově za oblast BOZP podřízen přímo řediteli podniku?", "2", "1"),
("3", "1", "Je v pracovník odpovědný za oblast BOZP odborně způsobilý", "3", "1"),
("4", "1", "Je v rámci vedení podniku určen pracovník odpovědný celkově za oblast PO ?", "4", "1"),
("5", "1", "Je  pracovník odpovědný celkově za oblast PO podřízen přímo řediteli podniku?", "5", "1"),
("6", "1", "Je v pracovník odpovědný za oblast PO odborně způsobilý", "6", "1"),
("7", "1", "Jsou stanovené povinnosti v zajišťování BOZP rozpracovány na jednotlivé články řízení? (Odpovědnostní řád –Směrnice řízení BOZP)", "7", "1"),
("8", "1", "Je prokazatelně řešen vztah  k externím dodavatelům i odběratelům  a spolupracujícím organizacím vyskytujících se na pracovištích ?", "8", "1"),
("9", "1", "Jsou otázky BOZP pravidelně projednávány vedením podniku?", "9", "1"),
("10", "1", "Jsou sledovány  relevantní  legislativní předpisy ?", "10", "1"),
("11", "1", "Jsou v nájemní smlouvě ošetřeny záležitosti zajišťování BOZP a PO?", "11", "1"),
("12", "2", "Jsou stanovena kritéria pro posuzování stavu BOZP a PO?", "1", "1"),
("13", "2", "Je stanoven způsob monitorování překročení limitních expozic?", "2", "1"),
("14", "2", "Existuje popis monitorování expozic pro všechny používané nebezpečné látky a činnosti?", "3", "1"),
("15", "2", "Provádí kontrolu: a) vedoucí pracovníci?", "4", "1"),
("16", "2", "Provádí kontrolu: b) pověření zaměstnanci (např. bezpečnostní či revizní technik, požární technik apod.)?", "5", "1"),
("17", "2", "Provádí kontrolu: c) externí pracovníci?", "6", "1"),
("18", "2", "Jsou u pracovníků v provozu namátkovou kontrolou ověřovány znalosti: - technologických a pracovních  postupů?", "7", "1"),
("19", "2", "Jsou u pracovníků v provozu namátkovou kontrolou ověřovány znalosti: - rizik, která je ohrožují při práci  a způsobu ochrany proti nim?", "8", "1"),
("20", "2", "Jsou u pracovníků v provozu namátkovou kontrolou ověřovány znalosti: - postupu při vzniku úrazu, havárie, požáru, nehody?", "9", "1"),
("21", "2", "Jsou u pracovníků v provozu namátkovou kontrolou ověřovány znalosti: - zásad první pomoci?", "10", "1"),
("22", "2", "Je ve firmě organizačně zajištěna kontrola zaměstnanců zda nejsou pod vlivem alkoholu nebo jiných omamných látek?", "11", "1"),
("23", "2", "Upozorňují zaměstnanci vedoucí zaměstnance na závady na pracovištích?", "12", "1"),
("24", "2", "Jsou stanovena opatření k odstranění nedostatků zjištěných při kontrolách a určeny osoby odpovědné za jejich splnění?", "13", "1"),
("25", "2", "Jsou zjištěné nedostatky odstraňovány?", "14", "1"),
("26", "2", "Je provádění kontrol dokumentováno (zprávou, záznamem)?", "15", "1"),
("27", "3", "Je provedena prvotní evidence a analýza rizik dle § 132a Zákoníku práce?", "1", "1"),
("28", "3", "Jsou zdokumentována všechna známá nebo očekávaná rizika ohrožení zdraví a života?", "2", "1"),
("29", "3", "Jsou organizační směrnice firmy vydané k zabezpečení BOZP zpracovány v závislosti na provedené evidenci a analýze rizik ?", "3", "1"),
("30", "3", "Jsou směrnice pro poskytování OOPP zpracovány v závislosti na provedené evidenci a analýze rizik ?", "4", "1"),
("31", "3", "Je zajištěna prokazatelně písemná výměna informací o rizicích práce se spolupracujícími firmami § 132 odst. 4. Zákoníku práce?", "5", "1"),
("32", "3", "Jsou zaměstnanci seznámeni s riziky možného ohrožení a opatřeními k jejich ochraně?", "6", "1"),
("33", "4", "Je provedena kategorizace prací podle Zákona 258/2000 Sb. ", "1", "1"),
("34", "4", "Je provedená kategorizace prací schválená KHS?", "2", "1"),
("35", "5", "Je zpracovaná  Směrnice pro řízení BOZP v podniku? (kdo, kdy)", "1", "1"),
("36", "5", "Je zpracovaná  Směrnice pro poskytování OOPP? (kdo, kdy)", "2", "1"),
("37", "5", "Jsou zpracovány  Provozní řády a Pracovní postupy? (kdo, kdy)", "3", "1"),
("38", "5", "Je zpracovaná  Směrnice pro práci žen a mladistvých? (kdo, kdy)", "4", "1"),
("39", "5", "Je zpracován Místní řád skladu? (kdo, kdy)", "5", "1"),
("40", "5", "Je zpracován  Dopravně provozní řád? (kdo, kdy)", "6", "1"),
("41", "5", "Je zpracována Dokumentace o nakládání s odpady? (kdo, kdy)", "7", "1"),
("42", "5", "Jsou vedeny zápisníky BOZP popř. evidenční listy BOZP u zaměstnanců?", "8", "1"),
("43", "6", "Je zpracována osnova vstupního školení zaměstnanců? (kdo, kdy)", "1", "1"),
("44", "6", "Jsou zpracována Osnovy školení zaměstnanců pro pracoviště resp. prováděné činnosti? (kdo, kdy)", "2", "1"),
("45", "6", "Je zpracována Osnova školení vedoucích zaměstnanců? (kdo, kdy)", "3", "1"),
("46", "6", "Je vedena dokumentace o prováděných školeních zaměstnanců? (kdo, kdy)", "4", "1"),
("47", "6", "Jsou zpracovány lhůtníky odborných školení pracovníků?", "5", "1"),
("48", "7", "Je provedeno  začlenění provozovaných činnosti do kategorii požárního nebezpečí v podniku? (kdo, kdy)", "1", "1"),
("49", "7", "Je zpracováno Posouzení požárního nebezpečí? (kdo, kdy)", "2", "1"),
("50", "7", "Je zpracováno Stanovení organizace zabezpečení PO v podniku? (kdo, kdy)", "3", "1"),
("51", "7", "Jsou zpracovány požární řády? (kdo, kdy)", "4", "1"),
("52", "7", "Je zpracován řád ohlašovny požáru? (kdo, kdy)", "5", "1"),
("53", "7", "Jsou zpracovány Požárně poplachové směrnice? (kdo, kdy)", "6", "1"),
("54", "7", "Jsou zavedeny požární knihy?", "7", "1"),
("55", "7", "Je zpracována Dokumentace o činnosti a akceschopnosti jednotky PO? (kdo, kdy)", "8", "1"),
("56", "7", "Je zpracován Přehled bezpečnostního značení? (kdo, kdy)", "9", "1"),
("57", "7", "Je zpracován Přehled PHP a hydrantů? (kdo, kdy)", "10", "1"),
("58", "7", "Je zpracován Požární evakuační plán? (kdo, kdy)", "11", "1"),
("59", "7", "Je zpracována dokumentace zdolávání požáru? (kdo, kdy)
", "12", "1"),
("60", "7", "Tématický plán a časový rozvrh odborné přípravy preventistů PO? (kdo, kdy)", "13", "1"),
("61", "7", "Jsou zpracovány Záznamy o provedení odborné přípravy preventistů PO? (kdo, kdy)", "14", "1"),
("62", "7", "Je zpracován Tématický plán a časový rozvrh školení o PO vedoucích zaměstnanců? (kdo, kdy)", "15", "1"),
("63", "7", "Je zpracován Tématický plán a časový rozvrh školení o PO zaměstnanců? (kdo, kdy)", "16", "1"),
("64", "7", "Jsou vedeny záznamy o provedeném školení?", "17", "1"),
("65", "7", "Jsou zpracovány Směrnice pro  zřizování a činnost preventivní požární hlídky? (kdo, kdy)", "18", "1"),
("66", "7", "Je zpracovántématický plán a časový rozvrh odborné přípravy členů preventivních požárních hlídek? (kdo, kdy)", "19", "1"),
("67", "7", "Jsou vedeny záznamy o provedené odborné přípravě členů preventivních požárních hlídek?", "20", "1"),
("68", "8", "Jsou otázky BOZP pravidelně projednávány vedením podniku?", "1", "1"),
("69", "8", "Zahrnují tato jednání kontrolu plnění přijatých opatření?", "2", "1"),
("70", "8", "Jsou stanovena pravidla pro spoluúčast zaměstnanců se zaměstnavatelem při řešení otázek  na úseku bezpečnosti práce?", "3", "1"),
("71", "8", "Pracuje v organizaci odborová organizace?", "4", "1"),
("72", "8", "Je v organizaci zvolen zástupce zaměstnanců?", "5", "1"),
("73", "8", "Jsou prováděny roční prověrky BOZP všech pracovišť?", "6", "1"),
("74", "8", "Mají zaměstnanci přístup k veškerým dokumentům týkajícím se jejich činnosti a vědí kde se nacházejí (pracovní postupy, směrnice atd.)?", "7", "1"),
("75", "8", "Je zajištěna informovanost příslušných útvarů a pracovníků o skutečnostech, které mohou mít vliv na ohrožení zdraví a životního prostředí (výsledky šetření úrazů a havárií, změny technologií apod.)?", "8", "1"),
("76", "9", "Jsou zpracovány pracovní postupy pro jednotlivé činnosti ve firmě prováděné?", "1", "1"),
("77", "9", "Řeší tyto pracovní postupy i problematiku BOZP?", "2", "1"),
("78", "9", "Pracovníci vykonávají činnosti jednotvárně a jednostranně zatěžující organismus?", "3", "1"),
("79", "9", "Jsou pracovníci ohrožování padajícími nebo klouzajícími předměty?", "4", "1"),
("80", "9", "Jsou pracovníci chránění proti pádu či zřícení?", "5", "1"),
("81", "9", "Pracují pracovníci osamoceni na pracovišti se zvýšeným rizikem?", "6", "1"),
("82", "9", "Jsou pracovníci ohroženi dopravou na pracovištích?", "7", "1"),
("83", "9", "Vykonávají ruční manipulaci s ručními břemeny, která vytvářejí možnost poškození zdraví, zejména páteře?", "8", "1"),
("84", "10", "Jsou stanoveny kvalifikační požadavky pro výběr zaměstnanců?", "1", "1"),
("85", "10", "Je stanoven způsob zácviku a ověření znalostí a dovedností?", "2", "1"),
("86", "10", "Je stanoven způsob prověření kvalifikace externích dodavatelů služeb (např. projektování, údržba atd.)?", "3", "1"),
("87", "11", "Je pověřen konkrétní  zaměstnanec sledující lhůty školení a zdravotních prohlídek?", "1", "1"),
("88", "11", "Jsou zpracovány lhůtníky školení BOZP a PO pro zaměstnance?", "2", "1"),
("89", "11", "Jsou zpracovány lhůtníky školení BOZP a PO pro vedoucí zaměstnance?", "3", "1"),
("90", "11", "Jsou zpracovány lhůtníky profesních (odborných) školení pro zaměstnance?", "4", "1"),
("91", "12", "Je zpracován program školení a výcviku: a) pro nové pracovníky?", "1", "1"),
("92", "12", "Je zpracován program školení a výcviku: b) pro změnu pracovního zařazení?", "2", "1"),
("93", "12", "Je zpracován program školení a výcviku: c) pro krátkodobé pracovníky (brigádníky)?
", "3", "1"),
("94", "12", "Je prováděno: a) povinné školení a výcvik v oblasti BOZP a PO pro všechny zaměstnance?", "4", "1"),
("95", "12", "Je prováděno: b) vstupní školení / zácvik na pracovišti?", "5", "1"),
("96", "12", "Je prováděno: c) speciální školení a výcvik vedoucích pracovníků?
", "6", "1"),
("97", "12", "Je prováděno: d) speciální (odborné) školení a výcvik specialistů (svářeči, elektrikáři apod.)?", "7", "1"),
("98", "12", "Je stanoveno, kdo a jakému typu školení / výcviku se musí podrobit   s ohledem na svoji funkci, pracovní zařazení?", "8", "1"),
("99", "12", "Obsahuje školení informace: a) o identifikaci a hodnocení rizik u používaných strojů, zařízení a prováděných činností?", "9", "1"),
("100", "12", "Obsahuje školení informace: b) o způsobech ochrany proti pracovním rizikům a používání OOPP?", "10", "1"),
("101", "12", "Obsahuje školení informace: c) o bezpečných pracovních postupech a zásadách bezpečné práce?", "11", "1"),
("102", "12", "Obsahuje školení informace: d) o zásadách první pomoci?
", "12", "1"),
("103", "12", "Obsahuje školení informace: e) o postupu pracovníků při vzniku nehody?", "13", "1"),
("104", "12", "Je vedena dokumentace: a) o školení a výcviku / zácviku, pracovníků?", "14", "1"),
("105", "12", "Je vedena dokumentace: b) o  přezkoušení  pracovníků v závěru školení?", "15", "1"),
("106", "12", "Obsahuje dokumentace o školení, výcviku / zácviku, jméno školeného pracovníka  a školitele, jejich podpisy, datum a rozsah školení (podle profesní, funkční náplně), s uvedením, z čeho konkrétně byl pracovník školen a vyjádření o znalostech a schopnostech školeného zaměstnance vykonávat určenou práci?", "16", "1"),
("107", "12", "Jsou organizovány výchovné a vzdělávací akce v oblasti BOZP?", "17", "1"),
("108", "12", "Je prováděna osvětová činnost (nástěnky, plakáty) zaměřená na: a) výstrahu před nebezpečím ohrožujícím zaměstnance při práci?
", "18", "1"),
("109", "12", "Je prováděna osvětová činnost (nástěnky, plakáty) zaměřená na: a) výstrahu před nebezpečím ohrožujícím zaměstnance při práci?
", "19", "1"),
("110", "13", "Svářeči", "1", "1"),
("111", "13", "Vazači břemen", "2", "1"),
("112", "13", "Obsluhy ZZ", "3", "1"),
("113", "13", "Jeřábníci", "4", "1"),
("114", "13", "Práce ve výškách", "5", "1"),
("115", "13", "Lešenáři", "6", "1"),
("116", "13", "Dřevoobrábění", "7", "1"),
("117", "13", "Obsluhy tlakových nádob", "8", "1"),
("118", "13", "Neelektrikáři (vyhl.č.50/1978 Sb., §3,4)", "9", "1"),
("119", "13", "Elektrikáři §5 – 10", "10", "1"),
("120", "13", "Řidiči referentských“vozidel", "11", "1"),
("121", "13", "Řidiči z povolání", "12", "1"),
("122", "13", "Řidiči motorových  vozíků", "13", "1"),
("123", "13", "Obsluha kovových nádob na plyny – mimo svářeče", "14", "1"),
("124", "13", "Obsluha motorových řetězových pil", "15", "1"),
("125", "13", "Obsluha křovinořezů", "16", "1"),
("126", "13", "Obsluha plynových zařízení do 50 kW", "17", "1"),
("127", "13", "Obsluha stavebních a zemních strojů", "18", "1"),
("128", "13", "Pracovníci pracující s chemickými karcinogeny", "19", "1"),
("129", "13", "Topiči nízkotlakých kotelen nad 50  kW", "20", "1"),
("130", "13", "Topiči parních a horkovodních kotlů", "21", "1"),
("131", "14", "Je systém odměňování v souladu s požadavky na BOZP?", "1", "1"),
("132", "14", "Jsou pracovníci vedením podniku motivováni k dodržování požadavků předpisů  k zajištění BOZP a ke spoluúčasti na plnění bezpečnostní politiky (koncepce) podniku?", "2", "1"),
("133", "15", "Je uzavřena smlouva se závodním lékařem (jméno)?", "1", "1"),
("134", "15", "Jsou pracoviště vybavena odpovídajícími prostředky první pomoci?", "2", "1"),
("135", "15", "Je ověřována zdravotní způsobilost pracovníků?", "3", "1"),
("136", "15", "Je zaveden systém zdravotních prohlídek: a) vstupních / výstupních?
", "4", "1"),
("137", "15", "Je zaveden systém zdravotních prohlídek: b) preventivních  / periodických?
", "5", "1"),
("138", "15", "Je na každém pracovišti vedena kniha úrazů?", "6", "1"),
("139", "15", "Je zpracována Směrnice k zajištění povinností zaměstnavatele při vzniku pracovních úrazů a nemocích z povolání?", "7", "1"),
("140", "15", "Je ve firmě určen zaměstnanec pověřený řešením pracovních úrazů?", "8", "1"),
("141", "15", "Je firma pojištěna pro PÚ a nemoci z povolání podle vyhlášky č. 125/1993 Sb.?", "9", "1"),
("142", "16", "Je zpracovaná  Směrnice OOPP ?", "1", "1"),
("143", "16", "Jsou součástí  Směrnici OOPP tabulky pro zhodnocení rizik?", "2", "1"),
("144", "16", "Jsou stanovena kritéria pro výběr a používání OOPP, jejich údržbu  a skladování?", "3", "1"),
("145", "16", "Provádí se kontrola používání OOPP?", "4", "1"),
("146", "16", "Jsou pracovníci proškoleni o používání OOPP?", "5", "1"),
("147", "16", "Jsou OOPP certifikované?", "6", "1"),
("148", "16", "Je požadováno aby návštěvníci používali OOPP?", "7", "1"),
("149", "17", "Jsou zpracovány přehledy (inventáře) zařízení?", "1", "1"),
("150", "17", "Jsou zpracovány technologické postupy prací?", "2", "1"),
("151", "18", "Jsou stroje vybaveny průvodní dokumentací a návody k obsluze?", "1", "1"),
("152", "18", "Je obsluha prokazatelně proškolena k obsluze stroje?", "2", "1"),
("153", "18", "Je zpracován plán údržby a prohlídek  strojů?", "3", "1"),
("154", "18", "Byly provedeny elektrorevize všech strojů ?", "4", "1"),
("155", "18", "Jsou zjištěné závady z kontrol odstraňovány v termínech?", "5", "1"),
("156", "18", "Jsou kontrolována všechna nová či opravená zařízení, aby se zajistilo jejich vhodné zabezpečení před zahájením provozu?", "6", "1"),
("157", "18", "Provádí se minimálně jednou za rok celková kontrola a údržba bezpečnostních spínačů a nouzových tlačítek?", "7", "1"),
("158", "18", "Jsou u strojů BT s hlavními pravidly bezpečné práce?", "8", "1"),
("159", "18", "Jsou u strojů funkční ochranná zařízení?", "9", "1"),
("160", "19", "Je zpracován harmonogram revizí el. zařízení?", "1", "1"),
("161", "19", "Je určeno prostředí pro účely stanovení periody reviizí?", "2", "1"),
("162", "19", "Je provoz zařízení řešen vnitropodnikovým předpisem?", "3", "1"),
("163", "19", "Jsou prováděny revize elektrorozvodů?", "4", "1"),
("164", "19", "Kdy bude nejbližší revize elektrorozvodů?", "5", "1"),
("165", "19", "Jsou prováděny revize elektrospotřebičů?", "6", "1"),
("166", "19", "Kdy bude nejbližší revize elektrospotřebičů?", "7", "1"),
("167", "19", "Jsou prováděny revize el. ručního nářadí?", "8", "1"),
("168", "19", "Kdy bude nejbližší revize el. ručního nářadí?", "9", "1"),
("169", "19", "Provádí elektrické instalace pouze kvalifikovaní elektrikáři?", "10", "1"),
("170", "19", "Jsou k dispozici návody k obsluze?", "11", "1"),
("171", "20", "Je zpracován harmonogram revizí a kontrol?", "1", "1"),
("172", "20", "Je provoz zařízení řešen vnitropodnikovým předpisem?", "2", "1"),
("173", "20", "Je písemně ustanovena  osoba odpovědná za bezpečný a hospodárný provoz tlakových nádob?", "3", "1"),
("174", "20", "Má osoba odpovědná za bezpečný a hospodárný provoz tlakových nádob platné proškolení revizním technikem TN?", "4", "1"),
("175", "20", "Kdy je příští proškolení odpovědné osoby za bezpečný?
", "5", "1"),
("176", "20", "Jsou obsluhy tlakových nádob prokazatelně proškoleny?", "6", "1"),
("177", "20", "Je pro každou tlakovou nádobu veden provozní deník?", "7", "1"),
("178", "20", "Provádějí se  prokazatelně kontroly správné činnosti tlakoměrů ? (nejméně 1x za 3 měsíce)", "8", "1"),
("179", "20", "Provádějí se prokazatelně zkoušky pojistného ventilu? (nejméně 1x za měsíc)", "9", "1"),
("180", "20", "Je zpracován provozní řád pro tlakové nádoby? (tam kde jsou používány média otravná, výbušná)", "10", "1"),
("181", "20", "Jsou k dispozici návody k obsluze?", "11", "1"),
("182", "21", "Je zpracován harmonogram revizí a kontrol?", "1", "1"),
("183", "21", "Je provoz zařízení řešen vnitropodnikovým předpisem?", "2", "1"),
("184", "21", "Je zpracován systém bezpečné práce?", "3", "1"),
("185", "21", "Je obsluha odborně způsobilá?", "4", "1"),
("186", "21", "Jsou k dispozici návody k obsluze?", "5", "1"),
("187", "22", "Je zpracován harmonogram revizí a kontrol?", "1", "1"),
("188", "22", "Je zpracován místní provozní řád?", "2", "1"),
("189", "22", "Je obsluha poučená a zaškolená?", "3", "1"),
("190", "22", "Je veden provozní deník?", "4", "1"),
("191", "22", "Zkouška netěsností min. 1x za rok  je prováděna?", "5", "1"),
("192", "22", "Je ve vnitřních prostorách kde jsou umístěny PZ je zajištěno dostatečné odvětrání?", "6", "1"),
("193", "22", "Je podtrubí pro rozvod je plynu natřeno žlutě?", "7", "1"),
("194", "22", "Je hlavní uzávěr plynu označen?", "8", "1"),
("195", "22", "Jsou k dispozici návody k obsluze?", "9", "1"),
("196", "23", "Je zpracován místní provozní řád skladu?", "1", "1"),
("197", "23", "Je vypracován schématický půdorysný plán?", "2", "1"),
("198", "23", "Jsou k dispozici statické výpočty regálů nebo výsledky zátěžové zkoušky?", "3", "1"),
("199", "23", "Jsou vedeny knihy regálů?", "4", "1"),
("200", "24", "Je zpracován dopravně provozní řád?", "1", "1"),
("201", "24", "Je  zpracován harmonogram STK motorových vozidel?", "2", "1"),
("202", "24", "Obsahuje dopravně provozní řád termíny a lhůty oprav a údržby?", "3", "1"),
("203", "24", "Je vedena evidence řidičů? (odborné způsobilosti)", "4", "1"),
("204", "24", "Je zpracován harmonogram lékařských prohlídek a přezkoušení řidičů (profesionálů)?", "5", "1"),
("205", "25", "Je písemně jmenován uživatel - zaměstnanec celkově odpovědný za technický stav jednot­livých vozíků a výcvik řidičů?", "1", "1"),
("206", "25", "Obsahuje dopravní řád termíny a lhůty oprav a údržby?", "2", "1"),
("207", "25", "Listy řidičů motorových vozíků jsou vedeny?", "3", "1"),
("208", "25", "Je vedena evidence průkazů řidičů motorových vozíků?", "4", "1"),
("209", "26", "Je zpracována směrnice pro sváření?", "1", "1"),
("210", "26", "Provádějí svářecí práce pouze odborně způsobilé osoby?", "2", "1"),
("211", "26", "Jsou svářeči seznámení se směrnicí pro sváření?", "3", "1");
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_checklist_bozp_kategorie_schema'
-- Počet řádků tabulky: 26
-- Začátek dat tabulky
INSERT INTO `prevent_audit_checklist_bozp_kategorie_schema` VALUES 
("1", "Povinnosti a odpovědnosti", "1"),
("2", "Kontrola a monitorování", "2"),
("3", "Identifikace a hodnocení rizik", "3"),
("4", "Kategorizace prací", "4"),
("5", "Dokumentace BOZP", "5"),
("6", "Dokumentace BOZP - školení", "6"),
("7", "Dokumentace PO", "7"),
("8", "Účast zaměstnanců na zajišťování práce", "8"),
("9", "Organizace práce - pracovní postupy", "9"),
("10", "Kvalifikace", "10"),
("11", "Lhůty a lhůntíky", "11"),
("12", "Výchova", "12"),
("13", "Odborná školení", "13"),
("14", "Motivace", "14"),
("15", "Zdravotní péče", "15"),
("16", "Osobní ochranné pracovní prostředky (OOPP)", "16"),
("17", "Inventáře a technologické postupy", "17"),
("18", "Stroje", "18"),
("19", "Vyhrazené elektrická zařízení", "19"),
("20", "Vyhrazená tlaková zařízení", "20"),
("21", "Vyhrazené zdvihací zařízení", "21"),
("22", "Vyhrazená plynová zařízení", "22"),
("23", "Sklady", "23"),
("24", "Doprava", "24"),
("25", "Motorové vozíky", "25"),
("26", "Sváření", "26");
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_checklist_bozp_schema'
-- Počet řádků tabulky: 211
-- Začátek dat tabulky
INSERT INTO `prevent_audit_checklist_bozp_schema` VALUES 
("1", "1", "Je v rámci vedení podniku určen pracovník odpovědný celkově za oblast BOZP ?", "1", "1"),
("2", "1", "Je  pracovník odpovědný celkově za oblast BOZP podřízen přímo řediteli podniku?", "2", "1"),
("3", "1", "Je v pracovník odpovědný za oblast BOZP odborně způsobilý", "3", "1"),
("4", "1", "Je v rámci vedení podniku určen pracovník odpovědný celkově za oblast PO ?", "4", "1"),
("5", "1", "Je  pracovník odpovědný celkově za oblast PO podřízen přímo řediteli podniku?", "5", "1"),
("6", "1", "Je v pracovník odpovědný za oblast PO odborně způsobilý", "6", "1"),
("7", "1", "Jsou stanovené povinnosti v zajišťování BOZP rozpracovány na jednotlivé články řízení? (Odpovědnostní řád –Směrnice řízení BOZP)", "7", "1"),
("8", "1", "Je prokazatelně řešen vztah  k externím dodavatelům i odběratelům  a spolupracujícím organizacím vyskytujících se na pracovištích ?", "8", "1"),
("9", "1", "Jsou otázky BOZP pravidelně projednávány vedením podniku?", "9", "1"),
("10", "1", "Jsou sledovány  relevantní  legislativní předpisy ?", "10", "1"),
("11", "1", "Jsou v nájemní smlouvě ošetřeny záležitosti zajišťování BOZP a PO?", "11", "1"),
("12", "2", "Jsou stanovena kritéria pro posuzování stavu BOZP a PO?", "1", "1"),
("13", "2", "Je stanoven způsob monitorování překročení limitních expozic?", "2", "1"),
("14", "2", "Existuje popis monitorování expozic pro všechny používané nebezpečné látky a činnosti?", "3", "1"),
("15", "2", "Provádí kontrolu: a) vedoucí pracovníci?", "4", "1"),
("16", "2", "Provádí kontrolu: b) pověření zaměstnanci (např. bezpečnostní či revizní technik, požární technik apod.)?", "5", "1"),
("17", "2", "Provádí kontrolu: c) externí pracovníci?", "6", "1"),
("18", "2", "Jsou u pracovníků v provozu namátkovou kontrolou ověřovány znalosti: - technologických a pracovních  postupů?", "7", "1"),
("19", "2", "Jsou u pracovníků v provozu namátkovou kontrolou ověřovány znalosti: - rizik, která je ohrožují při práci  a způsobu ochrany proti nim?", "8", "1"),
("20", "2", "Jsou u pracovníků v provozu namátkovou kontrolou ověřovány znalosti: - postupu při vzniku úrazu, havárie, požáru, nehody?", "9", "1"),
("21", "2", "Jsou u pracovníků v provozu namátkovou kontrolou ověřovány znalosti: - zásad první pomoci?", "10", "1"),
("22", "2", "Je ve firmě organizačně zajištěna kontrola zaměstnanců zda nejsou pod vlivem alkoholu nebo jiných omamných látek?", "11", "1"),
("23", "2", "Upozorňují zaměstnanci vedoucí zaměstnance na závady na pracovištích?", "12", "1"),
("24", "2", "Jsou stanovena opatření k odstranění nedostatků zjištěných při kontrolách a určeny osoby odpovědné za jejich splnění?", "13", "1"),
("25", "2", "Jsou zjištěné nedostatky odstraňovány?", "14", "1"),
("26", "2", "Je provádění kontrol dokumentováno (zprávou, záznamem)?", "15", "1"),
("27", "3", "Je provedena prvotní evidence a analýza rizik dle § 132a Zákoníku práce?", "1", "1"),
("28", "3", "Jsou zdokumentována všechna známá nebo očekávaná rizika ohrožení zdraví a života?", "2", "1"),
("29", "3", "Jsou organizační směrnice firmy vydané k zabezpečení BOZP zpracovány v závislosti na provedené evidenci a analýze rizik ?", "3", "1"),
("30", "3", "Jsou směrnice pro poskytování OOPP zpracovány v závislosti na provedené evidenci a analýze rizik ?", "4", "1"),
("31", "3", "Je zajištěna prokazatelně písemná výměna informací o rizicích práce se spolupracujícími firmami § 132 odst. 4. Zákoníku práce?", "5", "1"),
("32", "3", "Jsou zaměstnanci seznámeni s riziky možného ohrožení a opatřeními k jejich ochraně?", "6", "1"),
("33", "4", "Je provedena kategorizace prací podle Zákona 258/2000 Sb. ", "1", "1"),
("34", "4", "Je provedená kategorizace prací schválená KHS?", "2", "1"),
("35", "5", "Je zpracovaná  Směrnice pro řízení BOZP v podniku? (kdo, kdy)", "1", "1"),
("36", "5", "Je zpracovaná  Směrnice pro poskytování OOPP? (kdo, kdy)", "2", "1"),
("37", "5", "Jsou zpracovány  Provozní řády a Pracovní postupy? (kdo, kdy)", "3", "1"),
("38", "5", "Je zpracovaná  Směrnice pro práci žen a mladistvých? (kdo, kdy)", "4", "1"),
("39", "5", "Je zpracován Místní řád skladu? (kdo, kdy)", "5", "1"),
("40", "5", "Je zpracován  Dopravně provozní řád? (kdo, kdy)", "6", "1"),
("41", "5", "Je zpracována Dokumentace o nakládání s odpady? (kdo, kdy)", "7", "1"),
("42", "5", "Jsou vedeny zápisníky BOZP popř. evidenční listy BOZP u zaměstnanců?", "8", "1"),
("43", "6", "Je zpracována osnova vstupního školení zaměstnanců? (kdo, kdy)", "1", "1"),
("44", "6", "Jsou zpracována Osnovy školení zaměstnanců pro pracoviště resp. prováděné činnosti? (kdo, kdy)", "2", "1"),
("45", "6", "Je zpracována Osnova školení vedoucích zaměstnanců? (kdo, kdy)", "3", "1"),
("46", "6", "Je vedena dokumentace o prováděných školeních zaměstnanců? (kdo, kdy)", "4", "1"),
("47", "6", "Jsou zpracovány lhůtníky odborných školení pracovníků?", "5", "1"),
("48", "7", "Je provedeno  začlenění provozovaných činnosti do kategorii požárního nebezpečí v podniku? (kdo, kdy)", "1", "1"),
("49", "7", "Je zpracováno Posouzení požárního nebezpečí? (kdo, kdy)", "2", "1"),
("50", "7", "Je zpracováno Stanovení organizace zabezpečení PO v podniku? (kdo, kdy)", "3", "1"),
("51", "7", "Jsou zpracovány požární řády? (kdo, kdy)", "4", "1"),
("52", "7", "Je zpracován řád ohlašovny požáru? (kdo, kdy)", "5", "1"),
("53", "7", "Jsou zpracovány Požárně poplachové směrnice? (kdo, kdy)", "6", "1"),
("54", "7", "Jsou zavedeny požární knihy?", "7", "1"),
("55", "7", "Je zpracována Dokumentace o činnosti a akceschopnosti jednotky PO? (kdo, kdy)", "8", "1"),
("56", "7", "Je zpracován Přehled bezpečnostního značení? (kdo, kdy)", "9", "1"),
("57", "7", "Je zpracován Přehled PHP a hydrantů? (kdo, kdy)", "10", "1"),
("58", "7", "Je zpracován Požární evakuační plán? (kdo, kdy)", "11", "1"),
("59", "7", "Je zpracována dokumentace zdolávání požáru? (kdo, kdy)
", "12", "1"),
("60", "7", "Tématický plán a časový rozvrh odborné přípravy preventistů PO? (kdo, kdy)", "13", "1"),
("61", "7", "Jsou zpracovány Záznamy o provedení odborné přípravy preventistů PO? (kdo, kdy)", "14", "1"),
("62", "7", "Je zpracován Tématický plán a časový rozvrh školení o PO vedoucích zaměstnanců? (kdo, kdy)", "15", "1"),
("63", "7", "Je zpracován Tématický plán a časový rozvrh školení o PO zaměstnanců? (kdo, kdy)", "16", "1"),
("64", "7", "Jsou vedeny záznamy o provedeném školení?", "17", "1"),
("65", "7", "Jsou zpracovány Směrnice pro  zřizování a činnost preventivní požární hlídky? (kdo, kdy)", "18", "1"),
("66", "7", "Je zpracovántématický plán a časový rozvrh odborné přípravy členů preventivních požárních hlídek? (kdo, kdy)", "19", "1"),
("67", "7", "Jsou vedeny záznamy o provedené odborné přípravě členů preventivních požárních hlídek?", "20", "1"),
("68", "8", "Jsou otázky BOZP pravidelně projednávány vedením podniku?", "1", "1"),
("69", "8", "Zahrnují tato jednání kontrolu plnění přijatých opatření?", "2", "1"),
("70", "8", "Jsou stanovena pravidla pro spoluúčast zaměstnanců se zaměstnavatelem při řešení otázek  na úseku bezpečnosti práce?", "3", "1"),
("71", "8", "Pracuje v organizaci odborová organizace?", "4", "1"),
("72", "8", "Je v organizaci zvolen zástupce zaměstnanců?", "5", "1"),
("73", "8", "Jsou prováděny roční prověrky BOZP všech pracovišť?", "6", "1"),
("74", "8", "Mají zaměstnanci přístup k veškerým dokumentům týkajícím se jejich činnosti a vědí kde se nacházejí (pracovní postupy, směrnice atd.)?", "7", "1"),
("75", "8", "Je zajištěna informovanost příslušných útvarů a pracovníků o skutečnostech, které mohou mít vliv na ohrožení zdraví a životního prostředí (výsledky šetření úrazů a havárií, změny technologií apod.)?", "8", "1"),
("76", "9", "Jsou zpracovány pracovní postupy pro jednotlivé činnosti ve firmě prováděné?", "1", "1"),
("77", "9", "Řeší tyto pracovní postupy i problematiku BOZP?", "2", "1"),
("78", "9", "Pracovníci vykonávají činnosti jednotvárně a jednostranně zatěžující organismus?", "3", "1"),
("79", "9", "Jsou pracovníci ohrožování padajícími nebo klouzajícími předměty?", "4", "1"),
("80", "9", "Jsou pracovníci chránění proti pádu či zřícení?", "5", "1"),
("81", "9", "Pracují pracovníci osamoceni na pracovišti se zvýšeným rizikem?", "6", "1"),
("82", "9", "Jsou pracovníci ohroženi dopravou na pracovištích?", "7", "1"),
("83", "9", "Vykonávají ruční manipulaci s ručními břemeny, která vytvářejí možnost poškození zdraví, zejména páteře?", "8", "1"),
("84", "10", "Jsou stanoveny kvalifikační požadavky pro výběr zaměstnanců?", "1", "1"),
("85", "10", "Je stanoven způsob zácviku a ověření znalostí a dovedností?", "2", "1"),
("86", "10", "Je stanoven způsob prověření kvalifikace externích dodavatelů služeb (např. projektování, údržba atd.)?", "3", "1"),
("87", "11", "Je pověřen konkrétní  zaměstnanec sledující lhůty školení a zdravotních prohlídek?", "1", "1"),
("88", "11", "Jsou zpracovány lhůtníky školení BOZP a PO pro zaměstnance?", "2", "1"),
("89", "11", "Jsou zpracovány lhůtníky školení BOZP a PO pro vedoucí zaměstnance?", "3", "1"),
("90", "11", "Jsou zpracovány lhůtníky profesních (odborných) školení pro zaměstnance?", "4", "1"),
("91", "12", "Je zpracován program školení a výcviku: a) pro nové pracovníky?", "1", "1"),
("92", "12", "Je zpracován program školení a výcviku: b) pro změnu pracovního zařazení?", "2", "1"),
("93", "12", "Je zpracován program školení a výcviku: c) pro krátkodobé pracovníky (brigádníky)?
", "3", "1"),
("94", "12", "Je prováděno: a) povinné školení a výcvik v oblasti BOZP a PO pro všechny zaměstnance?", "4", "1"),
("95", "12", "Je prováděno: b) vstupní školení / zácvik na pracovišti?", "5", "1"),
("96", "12", "Je prováděno: c) speciální školení a výcvik vedoucích pracovníků?
", "6", "1"),
("97", "12", "Je prováděno: d) speciální (odborné) školení a výcvik specialistů (svářeči, elektrikáři apod.)?", "7", "1"),
("98", "12", "Je stanoveno, kdo a jakému typu školení / výcviku se musí podrobit   s ohledem na svoji funkci, pracovní zařazení?", "8", "1"),
("99", "12", "Obsahuje školení informace: a) o identifikaci a hodnocení rizik u používaných strojů, zařízení a prováděných činností?", "9", "1"),
("100", "12", "Obsahuje školení informace: b) o způsobech ochrany proti pracovním rizikům a používání OOPP?", "10", "1"),
("101", "12", "Obsahuje školení informace: c) o bezpečných pracovních postupech a zásadách bezpečné práce?", "11", "1"),
("102", "12", "Obsahuje školení informace: d) o zásadách první pomoci?
", "12", "1"),
("103", "12", "Obsahuje školení informace: e) o postupu pracovníků při vzniku nehody?", "13", "1"),
("104", "12", "Je vedena dokumentace: a) o školení a výcviku / zácviku, pracovníků?", "14", "1"),
("105", "12", "Je vedena dokumentace: b) o  přezkoušení  pracovníků v závěru školení?", "15", "1"),
("106", "12", "Obsahuje dokumentace o školení, výcviku / zácviku, jméno školeného pracovníka  a školitele, jejich podpisy, datum a rozsah školení (podle profesní, funkční náplně), s uvedením, z čeho konkrétně byl pracovník školen a vyjádření o znalostech a schopnostech školeného zaměstnance vykonávat určenou práci?", "16", "1"),
("107", "12", "Jsou organizovány výchovné a vzdělávací akce v oblasti BOZP?", "17", "1"),
("108", "12", "Je prováděna osvětová činnost (nástěnky, plakáty) zaměřená na: a) výstrahu před nebezpečím ohrožujícím zaměstnance při práci?
", "18", "1"),
("109", "12", "Je prováděna osvětová činnost (nástěnky, plakáty) zaměřená na: a) výstrahu před nebezpečím ohrožujícím zaměstnance při práci?
", "19", "1"),
("110", "13", "Svářeči", "1", "1"),
("111", "13", "Vazači břemen", "2", "1"),
("112", "13", "Obsluhy ZZ", "3", "1"),
("113", "13", "Jeřábníci", "4", "1"),
("114", "13", "Práce ve výškách", "5", "1"),
("115", "13", "Lešenáři", "6", "1"),
("116", "13", "Dřevoobrábění", "7", "1"),
("117", "13", "Obsluhy tlakových nádob", "8", "1"),
("118", "13", "Neelektrikáři (vyhl.č.50/1978 Sb., §3,4)", "9", "1"),
("119", "13", "Elektrikáři §5 – 10", "10", "1"),
("120", "13", "Řidiči referentských“vozidel", "11", "1"),
("121", "13", "Řidiči z povolání", "12", "1"),
("122", "13", "Řidiči motorových  vozíků", "13", "1"),
("123", "13", "Obsluha kovových nádob na plyny – mimo svářeče", "14", "1"),
("124", "13", "Obsluha motorových řetězových pil", "15", "1"),
("125", "13", "Obsluha křovinořezů", "16", "1"),
("126", "13", "Obsluha plynových zařízení do 50 kW", "17", "1"),
("127", "13", "Obsluha stavebních a zemních strojů", "18", "1"),
("128", "13", "Pracovníci pracující s chemickými karcinogeny", "19", "1"),
("129", "13", "Topiči nízkotlakých kotelen nad 50  kW", "20", "1"),
("130", "13", "Topiči parních a horkovodních kotlů", "21", "1"),
("131", "14", "Je systém odměňování v souladu s požadavky na BOZP?", "1", "1"),
("132", "14", "Jsou pracovníci vedením podniku motivováni k dodržování požadavků předpisů  k zajištění BOZP a ke spoluúčasti na plnění bezpečnostní politiky (koncepce) podniku?", "2", "1"),
("133", "15", "Je uzavřena smlouva se závodním lékařem (jméno)?", "1", "1"),
("134", "15", "Jsou pracoviště vybavena odpovídajícími prostředky první pomoci?", "2", "1"),
("135", "15", "Je ověřována zdravotní způsobilost pracovníků?", "3", "1"),
("136", "15", "Je zaveden systém zdravotních prohlídek: a) vstupních / výstupních?
", "4", "1"),
("137", "15", "Je zaveden systém zdravotních prohlídek: b) preventivních  / periodických?
", "5", "1"),
("138", "15", "Je na každém pracovišti vedena kniha úrazů?", "6", "1"),
("139", "15", "Je zpracována Směrnice k zajištění povinností zaměstnavatele při vzniku pracovních úrazů a nemocích z povolání?", "7", "1"),
("140", "15", "Je ve firmě určen zaměstnanec pověřený řešením pracovních úrazů?", "8", "1"),
("141", "15", "Je firma pojištěna pro PÚ a nemoci z povolání podle vyhlášky č. 125/1993 Sb.?", "9", "1"),
("142", "16", "Je zpracovaná  Směrnice OOPP ?", "1", "1"),
("143", "16", "Jsou součástí  Směrnici OOPP tabulky pro zhodnocení rizik?", "2", "1"),
("144", "16", "Jsou stanovena kritéria pro výběr a používání OOPP, jejich údržbu  a skladování?", "3", "1"),
("145", "16", "Provádí se kontrola používání OOPP?", "4", "1"),
("146", "16", "Jsou pracovníci proškoleni o používání OOPP?", "5", "1"),
("147", "16", "Jsou OOPP certifikované?", "6", "1"),
("148", "16", "Je požadováno aby návštěvníci používali OOPP?", "7", "1"),
("149", "17", "Jsou zpracovány přehledy (inventáře) zařízení?", "1", "1"),
("150", "17", "Jsou zpracovány technologické postupy prací?", "2", "1"),
("151", "18", "Jsou stroje vybaveny průvodní dokumentací a návody k obsluze?", "1", "1"),
("152", "18", "Je obsluha prokazatelně proškolena k obsluze stroje?", "2", "1"),
("153", "18", "Je zpracován plán údržby a prohlídek  strojů?", "3", "1"),
("154", "18", "Byly provedeny elektrorevize všech strojů ?", "4", "1"),
("155", "18", "Jsou zjištěné závady z kontrol odstraňovány v termínech?", "5", "1"),
("156", "18", "Jsou kontrolována všechna nová či opravená zařízení, aby se zajistilo jejich vhodné zabezpečení před zahájením provozu?", "6", "1"),
("157", "18", "Provádí se minimálně jednou za rok celková kontrola a údržba bezpečnostních spínačů a nouzových tlačítek?", "7", "1"),
("158", "18", "Jsou u strojů BT s hlavními pravidly bezpečné práce?", "8", "1"),
("159", "18", "Jsou u strojů funkční ochranná zařízení?", "9", "1"),
("160", "19", "Je zpracován harmonogram revizí el. zařízení?", "1", "1"),
("161", "19", "Je určeno prostředí pro účely stanovení periody reviizí?", "2", "1"),
("162", "19", "Je provoz zařízení řešen vnitropodnikovým předpisem?", "3", "1"),
("163", "19", "Jsou prováděny revize elektrorozvodů?", "4", "1"),
("164", "19", "Kdy bude nejbližší revize elektrorozvodů?", "5", "1"),
("165", "19", "Jsou prováděny revize elektrospotřebičů?", "6", "1"),
("166", "19", "Kdy bude nejbližší revize elektrospotřebičů?", "7", "1"),
("167", "19", "Jsou prováděny revize el. ručního nářadí?", "8", "1"),
("168", "19", "Kdy bude nejbližší revize el. ručního nářadí?", "9", "1"),
("169", "19", "Provádí elektrické instalace pouze kvalifikovaní elektrikáři?", "10", "1"),
("170", "19", "Jsou k dispozici návody k obsluze?", "11", "1"),
("171", "20", "Je zpracován harmonogram revizí a kontrol?", "1", "1"),
("172", "20", "Je provoz zařízení řešen vnitropodnikovým předpisem?", "2", "1"),
("173", "20", "Je písemně ustanovena  osoba odpovědná za bezpečný a hospodárný provoz tlakových nádob?", "3", "1"),
("174", "20", "Má osoba odpovědná za bezpečný a hospodárný provoz tlakových nádob platné proškolení revizním technikem TN?", "4", "1"),
("175", "20", "Kdy je příští proškolení odpovědné osoby za bezpečný?
", "5", "1"),
("176", "20", "Jsou obsluhy tlakových nádob prokazatelně proškoleny?", "6", "1"),
("177", "20", "Je pro každou tlakovou nádobu veden provozní deník?", "7", "1"),
("178", "20", "Provádějí se  prokazatelně kontroly správné činnosti tlakoměrů ? (nejméně 1x za 3 měsíce)", "8", "1"),
("179", "20", "Provádějí se prokazatelně zkoušky pojistného ventilu? (nejméně 1x za měsíc)", "9", "1"),
("180", "20", "Je zpracován provozní řád pro tlakové nádoby? (tam kde jsou používány média otravná, výbušná)", "10", "1"),
("181", "20", "Jsou k dispozici návody k obsluze?", "11", "1"),
("182", "21", "Je zpracován harmonogram revizí a kontrol?", "1", "1"),
("183", "21", "Je provoz zařízení řešen vnitropodnikovým předpisem?", "2", "1"),
("184", "21", "Je zpracován systém bezpečné práce?", "3", "1"),
("185", "21", "Je obsluha odborně způsobilá?", "4", "1"),
("186", "21", "Jsou k dispozici návody k obsluze?", "5", "1"),
("187", "22", "Je zpracován harmonogram revizí a kontrol?", "1", "1"),
("188", "22", "Je zpracován místní provozní řád?", "2", "1"),
("189", "22", "Je obsluha poučená a zaškolená?", "3", "1"),
("190", "22", "Je veden provozní deník?", "4", "1"),
("191", "22", "Zkouška netěsností min. 1x za rok  je prováděna?", "5", "1"),
("192", "22", "Je ve vnitřních prostorách kde jsou umístěny PZ je zajištěno dostatečné odvětrání?", "6", "1"),
("193", "22", "Je podtrubí pro rozvod je plynu natřeno žlutě?", "7", "1"),
("194", "22", "Je hlavní uzávěr plynu označen?", "8", "1"),
("195", "22", "Jsou k dispozici návody k obsluze?", "9", "1"),
("196", "23", "Je zpracován místní provozní řád skladu?", "1", "1"),
("197", "23", "Je vypracován schématický půdorysný plán?", "2", "1"),
("198", "23", "Jsou k dispozici statické výpočty regálů nebo výsledky zátěžové zkoušky?", "3", "1"),
("199", "23", "Jsou vedeny knihy regálů?", "4", "1"),
("200", "24", "Je zpracován dopravně provozní řád?", "1", "1"),
("201", "24", "Je  zpracován harmonogram STK motorových vozidel?", "2", "1"),
("202", "24", "Obsahuje dopravně provozní řád termíny a lhůty oprav a údržby?", "3", "1"),
("203", "24", "Je vedena evidence řidičů? (odborné způsobilosti)", "4", "1"),
("204", "24", "Je zpracován harmonogram lékařských prohlídek a přezkoušení řidičů (profesionálů)?", "5", "1"),
("205", "25", "Je písemně jmenován uživatel - zaměstnanec celkově odpovědný za technický stav jednot­livých vozíků a výcvik řidičů?", "1", "1"),
("206", "25", "Obsahuje dopravní řád termíny a lhůty oprav a údržby?", "2", "1"),
("207", "25", "Listy řidičů motorových vozíků jsou vedeny?", "3", "1"),
("208", "25", "Je vedena evidence průkazů řidičů motorových vozíků?", "4", "1"),
("209", "26", "Je zpracována směrnice pro sváření?", "1", "1"),
("210", "26", "Provádějí svářecí práce pouze odborně způsobilé osoby?", "2", "1"),
("211", "26", "Jsou svářeči seznámení se směrnicí pro sváření?", "3", "1");
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_checklist_kategorie'
-- Počet řádků tabulky: 0
-- Začátek dat tabulky
INSERT INTO `prevent_audit_checklist_kategorie` VALUES 
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_checklist_pobezpn_kategorie_schema'
-- Počet řádků tabulky: 26
-- Začátek dat tabulky
INSERT INTO `prevent_audit_checklist_pobezpn_kategorie_schema` VALUES 
("1", "Povinnosti a odpovědnosti", "1"),
("2", "Kontrola a monitorování", "2"),
("3", "Identifikace a hodnocení rizik", "3"),
("4", "Kategorizace prací", "4"),
("5", "Dokumentace BOZP", "5"),
("6", "Dokumentace BOZP - školení", "6"),
("7", "Dokumentace PO", "7"),
("8", "Účast zaměstnanců na zajišťování práce", "8"),
("9", "Organizace práce - pracovní postupy", "9"),
("10", "Kvalifikace", "10"),
("11", "Lhůty a lhůntíky", "11"),
("12", "Výchova", "12"),
("13", "Odborná školení", "13"),
("14", "Motivace", "14"),
("15", "Zdravotní péče", "15"),
("16", "Osobní ochranné pracovní prostředky (OOPP)", "16"),
("17", "Inventáře a technologické postupy", "17"),
("18", "Stroje", "18"),
("19", "Vyhrazené elektrická zařízení", "19"),
("20", "Vyhrazená tlaková zařízení", "20"),
("21", "Vyhrazené zdvihací zařízení", "21"),
("22", "Vyhrazená plynová zařízení", "22"),
("23", "Sklady", "23"),
("24", "Doprava", "24"),
("25", "Motorové vozíky", "25"),
("26", "Sváření", "26");
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_checklist_pobezpn_schema'
-- Počet řádků tabulky: 211
-- Začátek dat tabulky
INSERT INTO `prevent_audit_checklist_pobezpn_schema` VALUES 
("1", "1", "Je v rámci vedení podniku určen pracovník odpovědný celkově za oblast BOZP ?", "1", "1"),
("2", "1", "Je  pracovník odpovědný celkově za oblast BOZP podřízen přímo řediteli podniku?", "2", "1"),
("3", "1", "Je v pracovník odpovědný za oblast BOZP odborně způsobilý", "3", "1"),
("4", "1", "Je v rámci vedení podniku určen pracovník odpovědný celkově za oblast PO ?", "4", "1"),
("5", "1", "Je  pracovník odpovědný celkově za oblast PO podřízen přímo řediteli podniku?", "5", "1"),
("6", "1", "Je v pracovník odpovědný za oblast PO odborně způsobilý", "6", "1"),
("7", "1", "Jsou stanovené povinnosti v zajišťování BOZP rozpracovány na jednotlivé články řízení? (Odpovědnostní řád –Směrnice řízení BOZP)", "7", "1"),
("8", "1", "Je prokazatelně řešen vztah  k externím dodavatelům i odběratelům  a spolupracujícím organizacím vyskytujících se na pracovištích ?", "8", "1"),
("9", "1", "Jsou otázky BOZP pravidelně projednávány vedením podniku?", "9", "1"),
("10", "1", "Jsou sledovány  relevantní  legislativní předpisy ?", "10", "1"),
("11", "1", "Jsou v nájemní smlouvě ošetřeny záležitosti zajišťování BOZP a PO?", "11", "1"),
("12", "2", "Jsou stanovena kritéria pro posuzování stavu BOZP a PO?", "1", "1"),
("13", "2", "Je stanoven způsob monitorování překročení limitních expozic?", "2", "1"),
("14", "2", "Existuje popis monitorování expozic pro všechny používané nebezpečné látky a činnosti?", "3", "1"),
("15", "2", "Provádí kontrolu: a) vedoucí pracovníci?", "4", "1"),
("16", "2", "Provádí kontrolu: b) pověření zaměstnanci (např. bezpečnostní či revizní technik, požární technik apod.)?", "5", "1"),
("17", "2", "Provádí kontrolu: c) externí pracovníci?", "6", "1"),
("18", "2", "Jsou u pracovníků v provozu namátkovou kontrolou ověřovány znalosti: - technologických a pracovních  postupů?", "7", "1"),
("19", "2", "Jsou u pracovníků v provozu namátkovou kontrolou ověřovány znalosti: - rizik, která je ohrožují při práci  a způsobu ochrany proti nim?", "8", "1"),
("20", "2", "Jsou u pracovníků v provozu namátkovou kontrolou ověřovány znalosti: - postupu při vzniku úrazu, havárie, požáru, nehody?", "9", "1"),
("21", "2", "Jsou u pracovníků v provozu namátkovou kontrolou ověřovány znalosti: - zásad první pomoci?", "10", "1"),
("22", "2", "Je ve firmě organizačně zajištěna kontrola zaměstnanců zda nejsou pod vlivem alkoholu nebo jiných omamných látek?", "11", "1"),
("23", "2", "Upozorňují zaměstnanci vedoucí zaměstnance na závady na pracovištích?", "12", "1"),
("24", "2", "Jsou stanovena opatření k odstranění nedostatků zjištěných při kontrolách a určeny osoby odpovědné za jejich splnění?", "13", "1"),
("25", "2", "Jsou zjištěné nedostatky odstraňovány?", "14", "1"),
("26", "2", "Je provádění kontrol dokumentováno (zprávou, záznamem)?", "15", "1"),
("27", "3", "Je provedena prvotní evidence a analýza rizik dle § 132a Zákoníku práce?", "1", "1"),
("28", "3", "Jsou zdokumentována všechna známá nebo očekávaná rizika ohrožení zdraví a života?", "2", "1"),
("29", "3", "Jsou organizační směrnice firmy vydané k zabezpečení BOZP zpracovány v závislosti na provedené evidenci a analýze rizik ?", "3", "1"),
("30", "3", "Jsou směrnice pro poskytování OOPP zpracovány v závislosti na provedené evidenci a analýze rizik ?", "4", "1"),
("31", "3", "Je zajištěna prokazatelně písemná výměna informací o rizicích práce se spolupracujícími firmami § 132 odst. 4. Zákoníku práce?", "5", "1"),
("32", "3", "Jsou zaměstnanci seznámeni s riziky možného ohrožení a opatřeními k jejich ochraně?", "6", "1"),
("33", "4", "Je provedena kategorizace prací podle Zákona 258/2000 Sb. ", "1", "1"),
("34", "4", "Je provedená kategorizace prací schválená KHS?", "2", "1"),
("35", "5", "Je zpracovaná  Směrnice pro řízení BOZP v podniku? (kdo, kdy)", "1", "1"),
("36", "5", "Je zpracovaná  Směrnice pro poskytování OOPP? (kdo, kdy)", "2", "1"),
("37", "5", "Jsou zpracovány  Provozní řády a Pracovní postupy? (kdo, kdy)", "3", "1"),
("38", "5", "Je zpracovaná  Směrnice pro práci žen a mladistvých? (kdo, kdy)", "4", "1"),
("39", "5", "Je zpracován Místní řád skladu? (kdo, kdy)", "5", "1"),
("40", "5", "Je zpracován  Dopravně provozní řád? (kdo, kdy)", "6", "1"),
("41", "5", "Je zpracována Dokumentace o nakládání s odpady? (kdo, kdy)", "7", "1"),
("42", "5", "Jsou vedeny zápisníky BOZP popř. evidenční listy BOZP u zaměstnanců?", "8", "1"),
("43", "6", "Je zpracována osnova vstupního školení zaměstnanců? (kdo, kdy)", "1", "1"),
("44", "6", "Jsou zpracována Osnovy školení zaměstnanců pro pracoviště resp. prováděné činnosti? (kdo, kdy)", "2", "1"),
("45", "6", "Je zpracována Osnova školení vedoucích zaměstnanců? (kdo, kdy)", "3", "1"),
("46", "6", "Je vedena dokumentace o prováděných školeních zaměstnanců? (kdo, kdy)", "4", "1"),
("47", "6", "Jsou zpracovány lhůtníky odborných školení pracovníků?", "5", "1"),
("48", "7", "Je provedeno  začlenění provozovaných činnosti do kategorii požárního nebezpečí v podniku? (kdo, kdy)", "1", "1"),
("49", "7", "Je zpracováno Posouzení požárního nebezpečí? (kdo, kdy)", "2", "1"),
("50", "7", "Je zpracováno Stanovení organizace zabezpečení PO v podniku? (kdo, kdy)", "3", "1"),
("51", "7", "Jsou zpracovány požární řády? (kdo, kdy)", "4", "1"),
("52", "7", "Je zpracován řád ohlašovny požáru? (kdo, kdy)", "5", "1"),
("53", "7", "Jsou zpracovány Požárně poplachové směrnice? (kdo, kdy)", "6", "1"),
("54", "7", "Jsou zavedeny požární knihy?", "7", "1"),
("55", "7", "Je zpracována Dokumentace o činnosti a akceschopnosti jednotky PO? (kdo, kdy)", "8", "1"),
("56", "7", "Je zpracován Přehled bezpečnostního značení? (kdo, kdy)", "9", "1"),
("57", "7", "Je zpracován Přehled PHP a hydrantů? (kdo, kdy)", "10", "1"),
("58", "7", "Je zpracován Požární evakuační plán? (kdo, kdy)", "11", "1"),
("59", "7", "Je zpracována dokumentace zdolávání požáru? (kdo, kdy)
", "12", "1"),
("60", "7", "Tématický plán a časový rozvrh odborné přípravy preventistů PO? (kdo, kdy)", "13", "1"),
("61", "7", "Jsou zpracovány Záznamy o provedení odborné přípravy preventistů PO? (kdo, kdy)", "14", "1"),
("62", "7", "Je zpracován Tématický plán a časový rozvrh školení o PO vedoucích zaměstnanců? (kdo, kdy)", "15", "1"),
("63", "7", "Je zpracován Tématický plán a časový rozvrh školení o PO zaměstnanců? (kdo, kdy)", "16", "1"),
("64", "7", "Jsou vedeny záznamy o provedeném školení?", "17", "1"),
("65", "7", "Jsou zpracovány Směrnice pro  zřizování a činnost preventivní požární hlídky? (kdo, kdy)", "18", "1"),
("66", "7", "Je zpracovántématický plán a časový rozvrh odborné přípravy členů preventivních požárních hlídek? (kdo, kdy)", "19", "1"),
("67", "7", "Jsou vedeny záznamy o provedené odborné přípravě členů preventivních požárních hlídek?", "20", "1"),
("68", "8", "Jsou otázky BOZP pravidelně projednávány vedením podniku?", "1", "1"),
("69", "8", "Zahrnují tato jednání kontrolu plnění přijatých opatření?", "2", "1"),
("70", "8", "Jsou stanovena pravidla pro spoluúčast zaměstnanců se zaměstnavatelem při řešení otázek  na úseku bezpečnosti práce?", "3", "1"),
("71", "8", "Pracuje v organizaci odborová organizace?", "4", "1"),
("72", "8", "Je v organizaci zvolen zástupce zaměstnanců?", "5", "1"),
("73", "8", "Jsou prováděny roční prověrky BOZP všech pracovišť?", "6", "1"),
("74", "8", "Mají zaměstnanci přístup k veškerým dokumentům týkajícím se jejich činnosti a vědí kde se nacházejí (pracovní postupy, směrnice atd.)?", "7", "1"),
("75", "8", "Je zajištěna informovanost příslušných útvarů a pracovníků o skutečnostech, které mohou mít vliv na ohrožení zdraví a životního prostředí (výsledky šetření úrazů a havárií, změny technologií apod.)?", "8", "1"),
("76", "9", "Jsou zpracovány pracovní postupy pro jednotlivé činnosti ve firmě prováděné?", "1", "1"),
("77", "9", "Řeší tyto pracovní postupy i problematiku BOZP?", "2", "1"),
("78", "9", "Pracovníci vykonávají činnosti jednotvárně a jednostranně zatěžující organismus?", "3", "1"),
("79", "9", "Jsou pracovníci ohrožování padajícími nebo klouzajícími předměty?", "4", "1"),
("80", "9", "Jsou pracovníci chránění proti pádu či zřícení?", "5", "1"),
("81", "9", "Pracují pracovníci osamoceni na pracovišti se zvýšeným rizikem?", "6", "1"),
("82", "9", "Jsou pracovníci ohroženi dopravou na pracovištích?", "7", "1"),
("83", "9", "Vykonávají ruční manipulaci s ručními břemeny, která vytvářejí možnost poškození zdraví, zejména páteře?", "8", "1"),
("84", "10", "Jsou stanoveny kvalifikační požadavky pro výběr zaměstnanců?", "1", "1"),
("85", "10", "Je stanoven způsob zácviku a ověření znalostí a dovedností?", "2", "1"),
("86", "10", "Je stanoven způsob prověření kvalifikace externích dodavatelů služeb (např. projektování, údržba atd.)?", "3", "1"),
("87", "11", "Je pověřen konkrétní  zaměstnanec sledující lhůty školení a zdravotních prohlídek?", "1", "1"),
("88", "11", "Jsou zpracovány lhůtníky školení BOZP a PO pro zaměstnance?", "2", "1"),
("89", "11", "Jsou zpracovány lhůtníky školení BOZP a PO pro vedoucí zaměstnance?", "3", "1"),
("90", "11", "Jsou zpracovány lhůtníky profesních (odborných) školení pro zaměstnance?", "4", "1"),
("91", "12", "Je zpracován program školení a výcviku: a) pro nové pracovníky?", "1", "1"),
("92", "12", "Je zpracován program školení a výcviku: b) pro změnu pracovního zařazení?", "2", "1"),
("93", "12", "Je zpracován program školení a výcviku: c) pro krátkodobé pracovníky (brigádníky)?
", "3", "1"),
("94", "12", "Je prováděno: a) povinné školení a výcvik v oblasti BOZP a PO pro všechny zaměstnance?", "4", "1"),
("95", "12", "Je prováděno: b) vstupní školení / zácvik na pracovišti?", "5", "1"),
("96", "12", "Je prováděno: c) speciální školení a výcvik vedoucích pracovníků?
", "6", "1"),
("97", "12", "Je prováděno: d) speciální (odborné) školení a výcvik specialistů (svářeči, elektrikáři apod.)?", "7", "1"),
("98", "12", "Je stanoveno, kdo a jakému typu školení / výcviku se musí podrobit   s ohledem na svoji funkci, pracovní zařazení?", "8", "1"),
("99", "12", "Obsahuje školení informace: a) o identifikaci a hodnocení rizik u používaných strojů, zařízení a prováděných činností?", "9", "1"),
("100", "12", "Obsahuje školení informace: b) o způsobech ochrany proti pracovním rizikům a používání OOPP?", "10", "1"),
("101", "12", "Obsahuje školení informace: c) o bezpečných pracovních postupech a zásadách bezpečné práce?", "11", "1"),
("102", "12", "Obsahuje školení informace: d) o zásadách první pomoci?
", "12", "1"),
("103", "12", "Obsahuje školení informace: e) o postupu pracovníků při vzniku nehody?", "13", "1"),
("104", "12", "Je vedena dokumentace: a) o školení a výcviku / zácviku, pracovníků?", "14", "1"),
("105", "12", "Je vedena dokumentace: b) o  přezkoušení  pracovníků v závěru školení?", "15", "1"),
("106", "12", "Obsahuje dokumentace o školení, výcviku / zácviku, jméno školeného pracovníka  a školitele, jejich podpisy, datum a rozsah školení (podle profesní, funkční náplně), s uvedením, z čeho konkrétně byl pracovník školen a vyjádření o znalostech a schopnostech školeného zaměstnance vykonávat určenou práci?", "16", "1"),
("107", "12", "Jsou organizovány výchovné a vzdělávací akce v oblasti BOZP?", "17", "1"),
("108", "12", "Je prováděna osvětová činnost (nástěnky, plakáty) zaměřená na: a) výstrahu před nebezpečím ohrožujícím zaměstnance při práci?
", "18", "1"),
("109", "12", "Je prováděna osvětová činnost (nástěnky, plakáty) zaměřená na: a) výstrahu před nebezpečím ohrožujícím zaměstnance při práci?
", "19", "1"),
("110", "13", "Svářeči", "1", "1"),
("111", "13", "Vazači břemen", "2", "1"),
("112", "13", "Obsluhy ZZ", "3", "1"),
("113", "13", "Jeřábníci", "4", "1"),
("114", "13", "Práce ve výškách", "5", "1"),
("115", "13", "Lešenáři", "6", "1"),
("116", "13", "Dřevoobrábění", "7", "1"),
("117", "13", "Obsluhy tlakových nádob", "8", "1"),
("118", "13", "Neelektrikáři (vyhl.č.50/1978 Sb., §3,4)", "9", "1"),
("119", "13", "Elektrikáři §5 – 10", "10", "1"),
("120", "13", "Řidiči referentských“vozidel", "11", "1"),
("121", "13", "Řidiči z povolání", "12", "1"),
("122", "13", "Řidiči motorových  vozíků", "13", "1"),
("123", "13", "Obsluha kovových nádob na plyny – mimo svářeče", "14", "1"),
("124", "13", "Obsluha motorových řetězových pil", "15", "1"),
("125", "13", "Obsluha křovinořezů", "16", "1"),
("126", "13", "Obsluha plynových zařízení do 50 kW", "17", "1"),
("127", "13", "Obsluha stavebních a zemních strojů", "18", "1"),
("128", "13", "Pracovníci pracující s chemickými karcinogeny", "19", "1"),
("129", "13", "Topiči nízkotlakých kotelen nad 50  kW", "20", "1"),
("130", "13", "Topiči parních a horkovodních kotlů", "21", "1"),
("131", "14", "Je systém odměňování v souladu s požadavky na BOZP?", "1", "1"),
("132", "14", "Jsou pracovníci vedením podniku motivováni k dodržování požadavků předpisů  k zajištění BOZP a ke spoluúčasti na plnění bezpečnostní politiky (koncepce) podniku?", "2", "1"),
("133", "15", "Je uzavřena smlouva se závodním lékařem (jméno)?", "1", "1"),
("134", "15", "Jsou pracoviště vybavena odpovídajícími prostředky první pomoci?", "2", "1"),
("135", "15", "Je ověřována zdravotní způsobilost pracovníků?", "3", "1"),
("136", "15", "Je zaveden systém zdravotních prohlídek: a) vstupních / výstupních?
", "4", "1"),
("137", "15", "Je zaveden systém zdravotních prohlídek: b) preventivních  / periodických?
", "5", "1"),
("138", "15", "Je na každém pracovišti vedena kniha úrazů?", "6", "1"),
("139", "15", "Je zpracována Směrnice k zajištění povinností zaměstnavatele při vzniku pracovních úrazů a nemocích z povolání?", "7", "1"),
("140", "15", "Je ve firmě určen zaměstnanec pověřený řešením pracovních úrazů?", "8", "1"),
("141", "15", "Je firma pojištěna pro PÚ a nemoci z povolání podle vyhlášky č. 125/1993 Sb.?", "9", "1"),
("142", "16", "Je zpracovaná  Směrnice OOPP ?", "1", "1"),
("143", "16", "Jsou součástí  Směrnici OOPP tabulky pro zhodnocení rizik?", "2", "1"),
("144", "16", "Jsou stanovena kritéria pro výběr a používání OOPP, jejich údržbu  a skladování?", "3", "1"),
("145", "16", "Provádí se kontrola používání OOPP?", "4", "1"),
("146", "16", "Jsou pracovníci proškoleni o používání OOPP?", "5", "1"),
("147", "16", "Jsou OOPP certifikované?", "6", "1"),
("148", "16", "Je požadováno aby návštěvníci používali OOPP?", "7", "1"),
("149", "17", "Jsou zpracovány přehledy (inventáře) zařízení?", "1", "1"),
("150", "17", "Jsou zpracovány technologické postupy prací?", "2", "1"),
("151", "18", "Jsou stroje vybaveny průvodní dokumentací a návody k obsluze?", "1", "1"),
("152", "18", "Je obsluha prokazatelně proškolena k obsluze stroje?", "2", "1"),
("153", "18", "Je zpracován plán údržby a prohlídek  strojů?", "3", "1"),
("154", "18", "Byly provedeny elektrorevize všech strojů ?", "4", "1"),
("155", "18", "Jsou zjištěné závady z kontrol odstraňovány v termínech?", "5", "1"),
("156", "18", "Jsou kontrolována všechna nová či opravená zařízení, aby se zajistilo jejich vhodné zabezpečení před zahájením provozu?", "6", "1"),
("157", "18", "Provádí se minimálně jednou za rok celková kontrola a údržba bezpečnostních spínačů a nouzových tlačítek?", "7", "1"),
("158", "18", "Jsou u strojů BT s hlavními pravidly bezpečné práce?", "8", "1"),
("159", "18", "Jsou u strojů funkční ochranná zařízení?", "9", "1"),
("160", "19", "Je zpracován harmonogram revizí el. zařízení?", "1", "1"),
("161", "19", "Je určeno prostředí pro účely stanovení periody reviizí?", "2", "1"),
("162", "19", "Je provoz zařízení řešen vnitropodnikovým předpisem?", "3", "1"),
("163", "19", "Jsou prováděny revize elektrorozvodů?", "4", "1"),
("164", "19", "Kdy bude nejbližší revize elektrorozvodů?", "5", "1"),
("165", "19", "Jsou prováděny revize elektrospotřebičů?", "6", "1"),
("166", "19", "Kdy bude nejbližší revize elektrospotřebičů?", "7", "1"),
("167", "19", "Jsou prováděny revize el. ručního nářadí?", "8", "1"),
("168", "19", "Kdy bude nejbližší revize el. ručního nářadí?", "9", "1"),
("169", "19", "Provádí elektrické instalace pouze kvalifikovaní elektrikáři?", "10", "1"),
("170", "19", "Jsou k dispozici návody k obsluze?", "11", "1"),
("171", "20", "Je zpracován harmonogram revizí a kontrol?", "1", "1"),
("172", "20", "Je provoz zařízení řešen vnitropodnikovým předpisem?", "2", "1"),
("173", "20", "Je písemně ustanovena  osoba odpovědná za bezpečný a hospodárný provoz tlakových nádob?", "3", "1"),
("174", "20", "Má osoba odpovědná za bezpečný a hospodárný provoz tlakových nádob platné proškolení revizním technikem TN?", "4", "1"),
("175", "20", "Kdy je příští proškolení odpovědné osoby za bezpečný?
", "5", "1"),
("176", "20", "Jsou obsluhy tlakových nádob prokazatelně proškoleny?", "6", "1"),
("177", "20", "Je pro každou tlakovou nádobu veden provozní deník?", "7", "1"),
("178", "20", "Provádějí se  prokazatelně kontroly správné činnosti tlakoměrů ? (nejméně 1x za 3 měsíce)", "8", "1"),
("179", "20", "Provádějí se prokazatelně zkoušky pojistného ventilu? (nejméně 1x za měsíc)", "9", "1"),
("180", "20", "Je zpracován provozní řád pro tlakové nádoby? (tam kde jsou používány média otravná, výbušná)", "10", "1"),
("181", "20", "Jsou k dispozici návody k obsluze?", "11", "1"),
("182", "21", "Je zpracován harmonogram revizí a kontrol?", "1", "1"),
("183", "21", "Je provoz zařízení řešen vnitropodnikovým předpisem?", "2", "1"),
("184", "21", "Je zpracován systém bezpečné práce?", "3", "1"),
("185", "21", "Je obsluha odborně způsobilá?", "4", "1"),
("186", "21", "Jsou k dispozici návody k obsluze?", "5", "1"),
("187", "22", "Je zpracován harmonogram revizí a kontrol?", "1", "1"),
("188", "22", "Je zpracován místní provozní řád?", "2", "1"),
("189", "22", "Je obsluha poučená a zaškolená?", "3", "1"),
("190", "22", "Je veden provozní deník?", "4", "1"),
("191", "22", "Zkouška netěsností min. 1x za rok  je prováděna?", "5", "1"),
("192", "22", "Je ve vnitřních prostorách kde jsou umístěny PZ je zajištěno dostatečné odvětrání?", "6", "1"),
("193", "22", "Je podtrubí pro rozvod je plynu natřeno žlutě?", "7", "1"),
("194", "22", "Je hlavní uzávěr plynu označen?", "8", "1"),
("195", "22", "Jsou k dispozici návody k obsluze?", "9", "1"),
("196", "23", "Je zpracován místní provozní řád skladu?", "1", "1"),
("197", "23", "Je vypracován schématický půdorysný plán?", "2", "1"),
("198", "23", "Jsou k dispozici statické výpočty regálů nebo výsledky zátěžové zkoušky?", "3", "1"),
("199", "23", "Jsou vedeny knihy regálů?", "4", "1"),
("200", "24", "Je zpracován dopravně provozní řád?", "1", "1"),
("201", "24", "Je  zpracován harmonogram STK motorových vozidel?", "2", "1"),
("202", "24", "Obsahuje dopravně provozní řád termíny a lhůty oprav a údržby?", "3", "1"),
("203", "24", "Je vedena evidence řidičů? (odborné způsobilosti)", "4", "1"),
("204", "24", "Je zpracován harmonogram lékařských prohlídek a přezkoušení řidičů (profesionálů)?", "5", "1"),
("205", "25", "Je písemně jmenován uživatel - zaměstnanec celkově odpovědný za technický stav jednot­livých vozíků a výcvik řidičů?", "1", "1"),
("206", "25", "Obsahuje dopravní řád termíny a lhůty oprav a údržby?", "2", "1"),
("207", "25", "Listy řidičů motorových vozíků jsou vedeny?", "3", "1"),
("208", "25", "Je vedena evidence průkazů řidičů motorových vozíků?", "4", "1"),
("209", "26", "Je zpracována směrnice pro sváření?", "1", "1"),
("210", "26", "Provádějí svářecí práce pouze odborně způsobilé osoby?", "2", "1"),
("211", "26", "Jsou svářeči seznámení se směrnicí pro sváření?", "3", "1");
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_checklist_povysokepn_kategorie_schema'
-- Počet řádků tabulky: 26
-- Začátek dat tabulky
INSERT INTO `prevent_audit_checklist_povysokepn_kategorie_schema` VALUES 
("1", "Povinnosti a odpovědnosti", "1"),
("2", "Kontrola a monitorování", "2"),
("3", "Identifikace a hodnocení rizik", "3"),
("4", "Kategorizace prací", "4"),
("5", "Dokumentace BOZP", "5"),
("6", "Dokumentace BOZP - školení", "6"),
("7", "Dokumentace PO", "7"),
("8", "Účast zaměstnanců na zajišťování práce", "8"),
("9", "Organizace práce - pracovní postupy", "9"),
("10", "Kvalifikace", "10"),
("11", "Lhůty a lhůntíky", "11"),
("12", "Výchova", "12"),
("13", "Odborná školení", "13"),
("14", "Motivace", "14"),
("15", "Zdravotní péče", "15"),
("16", "Osobní ochranné pracovní prostředky (OOPP)", "16"),
("17", "Inventáře a technologické postupy", "17"),
("18", "Stroje", "18"),
("19", "Vyhrazené elektrická zařízení", "19"),
("20", "Vyhrazená tlaková zařízení", "20"),
("21", "Vyhrazené zdvihací zařízení", "21"),
("22", "Vyhrazená plynová zařízení", "22"),
("23", "Sklady", "23"),
("24", "Doprava", "24"),
("25", "Motorové vozíky", "25"),
("26", "Sváření", "26");
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_checklist_povysokepn_schema'
-- Počet řádků tabulky: 211
-- Začátek dat tabulky
INSERT INTO `prevent_audit_checklist_povysokepn_schema` VALUES 
("1", "1", "Je v rámci vedení podniku určen pracovník odpovědný celkově za oblast BOZP ?", "1", "1"),
("2", "1", "Je  pracovník odpovědný celkově za oblast BOZP podřízen přímo řediteli podniku?", "2", "1"),
("3", "1", "Je v pracovník odpovědný za oblast BOZP odborně způsobilý", "3", "1"),
("4", "1", "Je v rámci vedení podniku určen pracovník odpovědný celkově za oblast PO ?", "4", "1"),
("5", "1", "Je  pracovník odpovědný celkově za oblast PO podřízen přímo řediteli podniku?", "5", "1"),
("6", "1", "Je v pracovník odpovědný za oblast PO odborně způsobilý", "6", "1"),
("7", "1", "Jsou stanovené povinnosti v zajišťování BOZP rozpracovány na jednotlivé články řízení? (Odpovědnostní řád –Směrnice řízení BOZP)", "7", "1"),
("8", "1", "Je prokazatelně řešen vztah  k externím dodavatelům i odběratelům  a spolupracujícím organizacím vyskytujících se na pracovištích ?", "8", "1"),
("9", "1", "Jsou otázky BOZP pravidelně projednávány vedením podniku?", "9", "1"),
("10", "1", "Jsou sledovány  relevantní  legislativní předpisy ?", "10", "1"),
("11", "1", "Jsou v nájemní smlouvě ošetřeny záležitosti zajišťování BOZP a PO?", "11", "1"),
("12", "2", "Jsou stanovena kritéria pro posuzování stavu BOZP a PO?", "1", "1"),
("13", "2", "Je stanoven způsob monitorování překročení limitních expozic?", "2", "1"),
("14", "2", "Existuje popis monitorování expozic pro všechny používané nebezpečné látky a činnosti?", "3", "1"),
("15", "2", "Provádí kontrolu: a) vedoucí pracovníci?", "4", "1"),
("16", "2", "Provádí kontrolu: b) pověření zaměstnanci (např. bezpečnostní či revizní technik, požární technik apod.)?", "5", "1"),
("17", "2", "Provádí kontrolu: c) externí pracovníci?", "6", "1"),
("18", "2", "Jsou u pracovníků v provozu namátkovou kontrolou ověřovány znalosti: - technologických a pracovních  postupů?", "7", "1"),
("19", "2", "Jsou u pracovníků v provozu namátkovou kontrolou ověřovány znalosti: - rizik, která je ohrožují při práci  a způsobu ochrany proti nim?", "8", "1"),
("20", "2", "Jsou u pracovníků v provozu namátkovou kontrolou ověřovány znalosti: - postupu při vzniku úrazu, havárie, požáru, nehody?", "9", "1"),
("21", "2", "Jsou u pracovníků v provozu namátkovou kontrolou ověřovány znalosti: - zásad první pomoci?", "10", "1"),
("22", "2", "Je ve firmě organizačně zajištěna kontrola zaměstnanců zda nejsou pod vlivem alkoholu nebo jiných omamných látek?", "11", "1"),
("23", "2", "Upozorňují zaměstnanci vedoucí zaměstnance na závady na pracovištích?", "12", "1"),
("24", "2", "Jsou stanovena opatření k odstranění nedostatků zjištěných při kontrolách a určeny osoby odpovědné za jejich splnění?", "13", "1"),
("25", "2", "Jsou zjištěné nedostatky odstraňovány?", "14", "1"),
("26", "2", "Je provádění kontrol dokumentováno (zprávou, záznamem)?", "15", "1"),
("27", "3", "Je provedena prvotní evidence a analýza rizik dle § 132a Zákoníku práce?", "1", "1"),
("28", "3", "Jsou zdokumentována všechna známá nebo očekávaná rizika ohrožení zdraví a života?", "2", "1"),
("29", "3", "Jsou organizační směrnice firmy vydané k zabezpečení BOZP zpracovány v závislosti na provedené evidenci a analýze rizik ?", "3", "1"),
("30", "3", "Jsou směrnice pro poskytování OOPP zpracovány v závislosti na provedené evidenci a analýze rizik ?", "4", "1"),
("31", "3", "Je zajištěna prokazatelně písemná výměna informací o rizicích práce se spolupracujícími firmami § 132 odst. 4. Zákoníku práce?", "5", "1"),
("32", "3", "Jsou zaměstnanci seznámeni s riziky možného ohrožení a opatřeními k jejich ochraně?", "6", "1"),
("33", "4", "Je provedena kategorizace prací podle Zákona 258/2000 Sb. ", "1", "1"),
("34", "4", "Je provedená kategorizace prací schválená KHS?", "2", "1"),
("35", "5", "Je zpracovaná  Směrnice pro řízení BOZP v podniku? (kdo, kdy)", "1", "1"),
("36", "5", "Je zpracovaná  Směrnice pro poskytování OOPP? (kdo, kdy)", "2", "1"),
("37", "5", "Jsou zpracovány  Provozní řády a Pracovní postupy? (kdo, kdy)", "3", "1"),
("38", "5", "Je zpracovaná  Směrnice pro práci žen a mladistvých? (kdo, kdy)", "4", "1"),
("39", "5", "Je zpracován Místní řád skladu? (kdo, kdy)", "5", "1"),
("40", "5", "Je zpracován  Dopravně provozní řád? (kdo, kdy)", "6", "1"),
("41", "5", "Je zpracována Dokumentace o nakládání s odpady? (kdo, kdy)", "7", "1"),
("42", "5", "Jsou vedeny zápisníky BOZP popř. evidenční listy BOZP u zaměstnanců?", "8", "1"),
("43", "6", "Je zpracována osnova vstupního školení zaměstnanců? (kdo, kdy)", "1", "1"),
("44", "6", "Jsou zpracována Osnovy školení zaměstnanců pro pracoviště resp. prováděné činnosti? (kdo, kdy)", "2", "1"),
("45", "6", "Je zpracována Osnova školení vedoucích zaměstnanců? (kdo, kdy)", "3", "1"),
("46", "6", "Je vedena dokumentace o prováděných školeních zaměstnanců? (kdo, kdy)", "4", "1"),
("47", "6", "Jsou zpracovány lhůtníky odborných školení pracovníků?", "5", "1"),
("48", "7", "Je provedeno  začlenění provozovaných činnosti do kategorii požárního nebezpečí v podniku? (kdo, kdy)", "1", "1"),
("49", "7", "Je zpracováno Posouzení požárního nebezpečí? (kdo, kdy)", "2", "1"),
("50", "7", "Je zpracováno Stanovení organizace zabezpečení PO v podniku? (kdo, kdy)", "3", "1"),
("51", "7", "Jsou zpracovány požární řády? (kdo, kdy)", "4", "1"),
("52", "7", "Je zpracován řád ohlašovny požáru? (kdo, kdy)", "5", "1"),
("53", "7", "Jsou zpracovány Požárně poplachové směrnice? (kdo, kdy)", "6", "1"),
("54", "7", "Jsou zavedeny požární knihy?", "7", "1"),
("55", "7", "Je zpracována Dokumentace o činnosti a akceschopnosti jednotky PO? (kdo, kdy)", "8", "1"),
("56", "7", "Je zpracován Přehled bezpečnostního značení? (kdo, kdy)", "9", "1"),
("57", "7", "Je zpracován Přehled PHP a hydrantů? (kdo, kdy)", "10", "1"),
("58", "7", "Je zpracován Požární evakuační plán? (kdo, kdy)", "11", "1"),
("59", "7", "Je zpracována dokumentace zdolávání požáru? (kdo, kdy)
", "12", "1"),
("60", "7", "Tématický plán a časový rozvrh odborné přípravy preventistů PO? (kdo, kdy)", "13", "1"),
("61", "7", "Jsou zpracovány Záznamy o provedení odborné přípravy preventistů PO? (kdo, kdy)", "14", "1"),
("62", "7", "Je zpracován Tématický plán a časový rozvrh školení o PO vedoucích zaměstnanců? (kdo, kdy)", "15", "1"),
("63", "7", "Je zpracován Tématický plán a časový rozvrh školení o PO zaměstnanců? (kdo, kdy)", "16", "1"),
("64", "7", "Jsou vedeny záznamy o provedeném školení?", "17", "1"),
("65", "7", "Jsou zpracovány Směrnice pro  zřizování a činnost preventivní požární hlídky? (kdo, kdy)", "18", "1"),
("66", "7", "Je zpracovántématický plán a časový rozvrh odborné přípravy členů preventivních požárních hlídek? (kdo, kdy)", "19", "1"),
("67", "7", "Jsou vedeny záznamy o provedené odborné přípravě členů preventivních požárních hlídek?", "20", "1"),
("68", "8", "Jsou otázky BOZP pravidelně projednávány vedením podniku?", "1", "1"),
("69", "8", "Zahrnují tato jednání kontrolu plnění přijatých opatření?", "2", "1"),
("70", "8", "Jsou stanovena pravidla pro spoluúčast zaměstnanců se zaměstnavatelem při řešení otázek  na úseku bezpečnosti práce?", "3", "1"),
("71", "8", "Pracuje v organizaci odborová organizace?", "4", "1"),
("72", "8", "Je v organizaci zvolen zástupce zaměstnanců?", "5", "1"),
("73", "8", "Jsou prováděny roční prověrky BOZP všech pracovišť?", "6", "1"),
("74", "8", "Mají zaměstnanci přístup k veškerým dokumentům týkajícím se jejich činnosti a vědí kde se nacházejí (pracovní postupy, směrnice atd.)?", "7", "1"),
("75", "8", "Je zajištěna informovanost příslušných útvarů a pracovníků o skutečnostech, které mohou mít vliv na ohrožení zdraví a životního prostředí (výsledky šetření úrazů a havárií, změny technologií apod.)?", "8", "1"),
("76", "9", "Jsou zpracovány pracovní postupy pro jednotlivé činnosti ve firmě prováděné?", "1", "1"),
("77", "9", "Řeší tyto pracovní postupy i problematiku BOZP?", "2", "1"),
("78", "9", "Pracovníci vykonávají činnosti jednotvárně a jednostranně zatěžující organismus?", "3", "1"),
("79", "9", "Jsou pracovníci ohrožování padajícími nebo klouzajícími předměty?", "4", "1"),
("80", "9", "Jsou pracovníci chránění proti pádu či zřícení?", "5", "1"),
("81", "9", "Pracují pracovníci osamoceni na pracovišti se zvýšeným rizikem?", "6", "1"),
("82", "9", "Jsou pracovníci ohroženi dopravou na pracovištích?", "7", "1"),
("83", "9", "Vykonávají ruční manipulaci s ručními břemeny, která vytvářejí možnost poškození zdraví, zejména páteře?", "8", "1"),
("84", "10", "Jsou stanoveny kvalifikační požadavky pro výběr zaměstnanců?", "1", "1"),
("85", "10", "Je stanoven způsob zácviku a ověření znalostí a dovedností?", "2", "1"),
("86", "10", "Je stanoven způsob prověření kvalifikace externích dodavatelů služeb (např. projektování, údržba atd.)?", "3", "1"),
("87", "11", "Je pověřen konkrétní  zaměstnanec sledující lhůty školení a zdravotních prohlídek?", "1", "1"),
("88", "11", "Jsou zpracovány lhůtníky školení BOZP a PO pro zaměstnance?", "2", "1"),
("89", "11", "Jsou zpracovány lhůtníky školení BOZP a PO pro vedoucí zaměstnance?", "3", "1"),
("90", "11", "Jsou zpracovány lhůtníky profesních (odborných) školení pro zaměstnance?", "4", "1"),
("91", "12", "Je zpracován program školení a výcviku: a) pro nové pracovníky?", "1", "1"),
("92", "12", "Je zpracován program školení a výcviku: b) pro změnu pracovního zařazení?", "2", "1"),
("93", "12", "Je zpracován program školení a výcviku: c) pro krátkodobé pracovníky (brigádníky)?
", "3", "1"),
("94", "12", "Je prováděno: a) povinné školení a výcvik v oblasti BOZP a PO pro všechny zaměstnance?", "4", "1"),
("95", "12", "Je prováděno: b) vstupní školení / zácvik na pracovišti?", "5", "1"),
("96", "12", "Je prováděno: c) speciální školení a výcvik vedoucích pracovníků?
", "6", "1"),
("97", "12", "Je prováděno: d) speciální (odborné) školení a výcvik specialistů (svářeči, elektrikáři apod.)?", "7", "1"),
("98", "12", "Je stanoveno, kdo a jakému typu školení / výcviku se musí podrobit   s ohledem na svoji funkci, pracovní zařazení?", "8", "1"),
("99", "12", "Obsahuje školení informace: a) o identifikaci a hodnocení rizik u používaných strojů, zařízení a prováděných činností?", "9", "1"),
("100", "12", "Obsahuje školení informace: b) o způsobech ochrany proti pracovním rizikům a používání OOPP?", "10", "1"),
("101", "12", "Obsahuje školení informace: c) o bezpečných pracovních postupech a zásadách bezpečné práce?", "11", "1"),
("102", "12", "Obsahuje školení informace: d) o zásadách první pomoci?
", "12", "1"),
("103", "12", "Obsahuje školení informace: e) o postupu pracovníků při vzniku nehody?", "13", "1"),
("104", "12", "Je vedena dokumentace: a) o školení a výcviku / zácviku, pracovníků?", "14", "1"),
("105", "12", "Je vedena dokumentace: b) o  přezkoušení  pracovníků v závěru školení?", "15", "1"),
("106", "12", "Obsahuje dokumentace o školení, výcviku / zácviku, jméno školeného pracovníka  a školitele, jejich podpisy, datum a rozsah školení (podle profesní, funkční náplně), s uvedením, z čeho konkrétně byl pracovník školen a vyjádření o znalostech a schopnostech školeného zaměstnance vykonávat určenou práci?", "16", "1"),
("107", "12", "Jsou organizovány výchovné a vzdělávací akce v oblasti BOZP?", "17", "1"),
("108", "12", "Je prováděna osvětová činnost (nástěnky, plakáty) zaměřená na: a) výstrahu před nebezpečím ohrožujícím zaměstnance při práci?
", "18", "1"),
("109", "12", "Je prováděna osvětová činnost (nástěnky, plakáty) zaměřená na: a) výstrahu před nebezpečím ohrožujícím zaměstnance při práci?
", "19", "1"),
("110", "13", "Svářeči", "1", "1"),
("111", "13", "Vazači břemen", "2", "1"),
("112", "13", "Obsluhy ZZ", "3", "1"),
("113", "13", "Jeřábníci", "4", "1"),
("114", "13", "Práce ve výškách", "5", "1"),
("115", "13", "Lešenáři", "6", "1"),
("116", "13", "Dřevoobrábění", "7", "1"),
("117", "13", "Obsluhy tlakových nádob", "8", "1"),
("118", "13", "Neelektrikáři (vyhl.č.50/1978 Sb., §3,4)", "9", "1"),
("119", "13", "Elektrikáři §5 – 10", "10", "1"),
("120", "13", "Řidiči referentských“vozidel", "11", "1"),
("121", "13", "Řidiči z povolání", "12", "1"),
("122", "13", "Řidiči motorových  vozíků", "13", "1"),
("123", "13", "Obsluha kovových nádob na plyny – mimo svářeče", "14", "1"),
("124", "13", "Obsluha motorových řetězových pil", "15", "1"),
("125", "13", "Obsluha křovinořezů", "16", "1"),
("126", "13", "Obsluha plynových zařízení do 50 kW", "17", "1"),
("127", "13", "Obsluha stavebních a zemních strojů", "18", "1"),
("128", "13", "Pracovníci pracující s chemickými karcinogeny", "19", "1"),
("129", "13", "Topiči nízkotlakých kotelen nad 50  kW", "20", "1"),
("130", "13", "Topiči parních a horkovodních kotlů", "21", "1"),
("131", "14", "Je systém odměňování v souladu s požadavky na BOZP?", "1", "1"),
("132", "14", "Jsou pracovníci vedením podniku motivováni k dodržování požadavků předpisů  k zajištění BOZP a ke spoluúčasti na plnění bezpečnostní politiky (koncepce) podniku?", "2", "1"),
("133", "15", "Je uzavřena smlouva se závodním lékařem (jméno)?", "1", "1"),
("134", "15", "Jsou pracoviště vybavena odpovídajícími prostředky první pomoci?", "2", "1"),
("135", "15", "Je ověřována zdravotní způsobilost pracovníků?", "3", "1"),
("136", "15", "Je zaveden systém zdravotních prohlídek: a) vstupních / výstupních?
", "4", "1"),
("137", "15", "Je zaveden systém zdravotních prohlídek: b) preventivních  / periodických?
", "5", "1"),
("138", "15", "Je na každém pracovišti vedena kniha úrazů?", "6", "1"),
("139", "15", "Je zpracována Směrnice k zajištění povinností zaměstnavatele při vzniku pracovních úrazů a nemocích z povolání?", "7", "1"),
("140", "15", "Je ve firmě určen zaměstnanec pověřený řešením pracovních úrazů?", "8", "1"),
("141", "15", "Je firma pojištěna pro PÚ a nemoci z povolání podle vyhlášky č. 125/1993 Sb.?", "9", "1"),
("142", "16", "Je zpracovaná  Směrnice OOPP ?", "1", "1"),
("143", "16", "Jsou součástí  Směrnici OOPP tabulky pro zhodnocení rizik?", "2", "1"),
("144", "16", "Jsou stanovena kritéria pro výběr a používání OOPP, jejich údržbu  a skladování?", "3", "1"),
("145", "16", "Provádí se kontrola používání OOPP?", "4", "1"),
("146", "16", "Jsou pracovníci proškoleni o používání OOPP?", "5", "1"),
("147", "16", "Jsou OOPP certifikované?", "6", "1"),
("148", "16", "Je požadováno aby návštěvníci používali OOPP?", "7", "1"),
("149", "17", "Jsou zpracovány přehledy (inventáře) zařízení?", "1", "1"),
("150", "17", "Jsou zpracovány technologické postupy prací?", "2", "1"),
("151", "18", "Jsou stroje vybaveny průvodní dokumentací a návody k obsluze?", "1", "1"),
("152", "18", "Je obsluha prokazatelně proškolena k obsluze stroje?", "2", "1"),
("153", "18", "Je zpracován plán údržby a prohlídek  strojů?", "3", "1"),
("154", "18", "Byly provedeny elektrorevize všech strojů ?", "4", "1"),
("155", "18", "Jsou zjištěné závady z kontrol odstraňovány v termínech?", "5", "1"),
("156", "18", "Jsou kontrolována všechna nová či opravená zařízení, aby se zajistilo jejich vhodné zabezpečení před zahájením provozu?", "6", "1"),
("157", "18", "Provádí se minimálně jednou za rok celková kontrola a údržba bezpečnostních spínačů a nouzových tlačítek?", "7", "1"),
("158", "18", "Jsou u strojů BT s hlavními pravidly bezpečné práce?", "8", "1"),
("159", "18", "Jsou u strojů funkční ochranná zařízení?", "9", "1"),
("160", "19", "Je zpracován harmonogram revizí el. zařízení?", "1", "1"),
("161", "19", "Je určeno prostředí pro účely stanovení periody reviizí?", "2", "1"),
("162", "19", "Je provoz zařízení řešen vnitropodnikovým předpisem?", "3", "1"),
("163", "19", "Jsou prováděny revize elektrorozvodů?", "4", "1"),
("164", "19", "Kdy bude nejbližší revize elektrorozvodů?", "5", "1"),
("165", "19", "Jsou prováděny revize elektrospotřebičů?", "6", "1"),
("166", "19", "Kdy bude nejbližší revize elektrospotřebičů?", "7", "1"),
("167", "19", "Jsou prováděny revize el. ručního nářadí?", "8", "1"),
("168", "19", "Kdy bude nejbližší revize el. ručního nářadí?", "9", "1"),
("169", "19", "Provádí elektrické instalace pouze kvalifikovaní elektrikáři?", "10", "1"),
("170", "19", "Jsou k dispozici návody k obsluze?", "11", "1"),
("171", "20", "Je zpracován harmonogram revizí a kontrol?", "1", "1"),
("172", "20", "Je provoz zařízení řešen vnitropodnikovým předpisem?", "2", "1"),
("173", "20", "Je písemně ustanovena  osoba odpovědná za bezpečný a hospodárný provoz tlakových nádob?", "3", "1"),
("174", "20", "Má osoba odpovědná za bezpečný a hospodárný provoz tlakových nádob platné proškolení revizním technikem TN?", "4", "1"),
("175", "20", "Kdy je příští proškolení odpovědné osoby za bezpečný?
", "5", "1"),
("176", "20", "Jsou obsluhy tlakových nádob prokazatelně proškoleny?", "6", "1"),
("177", "20", "Je pro každou tlakovou nádobu veden provozní deník?", "7", "1"),
("178", "20", "Provádějí se  prokazatelně kontroly správné činnosti tlakoměrů ? (nejméně 1x za 3 měsíce)", "8", "1"),
("179", "20", "Provádějí se prokazatelně zkoušky pojistného ventilu? (nejméně 1x za měsíc)", "9", "1"),
("180", "20", "Je zpracován provozní řád pro tlakové nádoby? (tam kde jsou používány média otravná, výbušná)", "10", "1"),
("181", "20", "Jsou k dispozici návody k obsluze?", "11", "1"),
("182", "21", "Je zpracován harmonogram revizí a kontrol?", "1", "1"),
("183", "21", "Je provoz zařízení řešen vnitropodnikovým předpisem?", "2", "1"),
("184", "21", "Je zpracován systém bezpečné práce?", "3", "1"),
("185", "21", "Je obsluha odborně způsobilá?", "4", "1"),
("186", "21", "Jsou k dispozici návody k obsluze?", "5", "1"),
("187", "22", "Je zpracován harmonogram revizí a kontrol?", "1", "1"),
("188", "22", "Je zpracován místní provozní řád?", "2", "1"),
("189", "22", "Je obsluha poučená a zaškolená?", "3", "1"),
("190", "22", "Je veden provozní deník?", "4", "1"),
("191", "22", "Zkouška netěsností min. 1x za rok  je prováděna?", "5", "1"),
("192", "22", "Je ve vnitřních prostorách kde jsou umístěny PZ je zajištěno dostatečné odvětrání?", "6", "1"),
("193", "22", "Je podtrubí pro rozvod je plynu natřeno žlutě?", "7", "1"),
("194", "22", "Je hlavní uzávěr plynu označen?", "8", "1"),
("195", "22", "Jsou k dispozici návody k obsluze?", "9", "1"),
("196", "23", "Je zpracován místní provozní řád skladu?", "1", "1"),
("197", "23", "Je vypracován schématický půdorysný plán?", "2", "1"),
("198", "23", "Jsou k dispozici statické výpočty regálů nebo výsledky zátěžové zkoušky?", "3", "1"),
("199", "23", "Jsou vedeny knihy regálů?", "4", "1"),
("200", "24", "Je zpracován dopravně provozní řád?", "1", "1"),
("201", "24", "Je  zpracován harmonogram STK motorových vozidel?", "2", "1"),
("202", "24", "Obsahuje dopravně provozní řád termíny a lhůty oprav a údržby?", "3", "1"),
("203", "24", "Je vedena evidence řidičů? (odborné způsobilosti)", "4", "1"),
("204", "24", "Je zpracován harmonogram lékařských prohlídek a přezkoušení řidičů (profesionálů)?", "5", "1"),
("205", "25", "Je písemně jmenován uživatel - zaměstnanec celkově odpovědný za technický stav jednot­livých vozíků a výcvik řidičů?", "1", "1"),
("206", "25", "Obsahuje dopravní řád termíny a lhůty oprav a údržby?", "2", "1"),
("207", "25", "Listy řidičů motorových vozíků jsou vedeny?", "3", "1"),
("208", "25", "Je vedena evidence průkazů řidičů motorových vozíků?", "4", "1"),
("209", "26", "Je zpracována směrnice pro sváření?", "1", "1"),
("210", "26", "Provádějí svářecí práce pouze odborně způsobilé osoby?", "2", "1"),
("211", "26", "Jsou svářeči seznámení se směrnicí pro sváření?", "3", "1");
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_checklist_pozvysenepn_kategorie_schema'
-- Počet řádků tabulky: 26
-- Začátek dat tabulky
INSERT INTO `prevent_audit_checklist_pozvysenepn_kategorie_schema` VALUES 
("1", "Povinnosti a odpovědnosti", "1"),
("2", "Kontrola a monitorování", "2"),
("3", "Identifikace a hodnocení rizik", "3"),
("4", "Kategorizace prací", "4"),
("5", "Dokumentace BOZP", "5"),
("6", "Dokumentace BOZP - školení", "6"),
("7", "Dokumentace PO", "7"),
("8", "Účast zaměstnanců na zajišťování práce", "8"),
("9", "Organizace práce - pracovní postupy", "9"),
("10", "Kvalifikace", "10"),
("11", "Lhůty a lhůntíky", "11"),
("12", "Výchova", "12"),
("13", "Odborná školení", "13"),
("14", "Motivace", "14"),
("15", "Zdravotní péče", "15"),
("16", "Osobní ochranné pracovní prostředky (OOPP)", "16"),
("17", "Inventáře a technologické postupy", "17"),
("18", "Stroje", "18"),
("19", "Vyhrazené elektrická zařízení", "19"),
("20", "Vyhrazená tlaková zařízení", "20"),
("21", "Vyhrazené zdvihací zařízení", "21"),
("22", "Vyhrazená plynová zařízení", "22"),
("23", "Sklady", "23"),
("24", "Doprava", "24"),
("25", "Motorové vozíky", "25"),
("26", "Sváření", "26");
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_checklist_pozvysenepn_schema'
-- Počet řádků tabulky: 211
-- Začátek dat tabulky
INSERT INTO `prevent_audit_checklist_pozvysenepn_schema` VALUES 
("1", "1", "Je v rámci vedení podniku určen pracovník odpovědný celkově za oblast BOZP ?", "1", "1"),
("2", "1", "Je  pracovník odpovědný celkově za oblast BOZP podřízen přímo řediteli podniku?", "2", "1"),
("3", "1", "Je v pracovník odpovědný za oblast BOZP odborně způsobilý", "3", "1"),
("4", "1", "Je v rámci vedení podniku určen pracovník odpovědný celkově za oblast PO ?", "4", "1"),
("5", "1", "Je  pracovník odpovědný celkově za oblast PO podřízen přímo řediteli podniku?", "5", "1"),
("6", "1", "Je v pracovník odpovědný za oblast PO odborně způsobilý", "6", "1"),
("7", "1", "Jsou stanovené povinnosti v zajišťování BOZP rozpracovány na jednotlivé články řízení? (Odpovědnostní řád –Směrnice řízení BOZP)", "7", "1"),
("8", "1", "Je prokazatelně řešen vztah  k externím dodavatelům i odběratelům  a spolupracujícím organizacím vyskytujících se na pracovištích ?", "8", "1"),
("9", "1", "Jsou otázky BOZP pravidelně projednávány vedením podniku?", "9", "1"),
("10", "1", "Jsou sledovány  relevantní  legislativní předpisy ?", "10", "1"),
("11", "1", "Jsou v nájemní smlouvě ošetřeny záležitosti zajišťování BOZP a PO?", "11", "1"),
("12", "2", "Jsou stanovena kritéria pro posuzování stavu BOZP a PO?", "1", "1"),
("13", "2", "Je stanoven způsob monitorování překročení limitních expozic?", "2", "1"),
("14", "2", "Existuje popis monitorování expozic pro všechny používané nebezpečné látky a činnosti?", "3", "1"),
("15", "2", "Provádí kontrolu: a) vedoucí pracovníci?", "4", "1"),
("16", "2", "Provádí kontrolu: b) pověření zaměstnanci (např. bezpečnostní či revizní technik, požární technik apod.)?", "5", "1"),
("17", "2", "Provádí kontrolu: c) externí pracovníci?", "6", "1"),
("18", "2", "Jsou u pracovníků v provozu namátkovou kontrolou ověřovány znalosti: - technologických a pracovních  postupů?", "7", "1"),
("19", "2", "Jsou u pracovníků v provozu namátkovou kontrolou ověřovány znalosti: - rizik, která je ohrožují při práci  a způsobu ochrany proti nim?", "8", "1"),
("20", "2", "Jsou u pracovníků v provozu namátkovou kontrolou ověřovány znalosti: - postupu při vzniku úrazu, havárie, požáru, nehody?", "9", "1"),
("21", "2", "Jsou u pracovníků v provozu namátkovou kontrolou ověřovány znalosti: - zásad první pomoci?", "10", "1"),
("22", "2", "Je ve firmě organizačně zajištěna kontrola zaměstnanců zda nejsou pod vlivem alkoholu nebo jiných omamných látek?", "11", "1"),
("23", "2", "Upozorňují zaměstnanci vedoucí zaměstnance na závady na pracovištích?", "12", "1"),
("24", "2", "Jsou stanovena opatření k odstranění nedostatků zjištěných při kontrolách a určeny osoby odpovědné za jejich splnění?", "13", "1"),
("25", "2", "Jsou zjištěné nedostatky odstraňovány?", "14", "1"),
("26", "2", "Je provádění kontrol dokumentováno (zprávou, záznamem)?", "15", "1"),
("27", "3", "Je provedena prvotní evidence a analýza rizik dle § 132a Zákoníku práce?", "1", "1"),
("28", "3", "Jsou zdokumentována všechna známá nebo očekávaná rizika ohrožení zdraví a života?", "2", "1"),
("29", "3", "Jsou organizační směrnice firmy vydané k zabezpečení BOZP zpracovány v závislosti na provedené evidenci a analýze rizik ?", "3", "1"),
("30", "3", "Jsou směrnice pro poskytování OOPP zpracovány v závislosti na provedené evidenci a analýze rizik ?", "4", "1"),
("31", "3", "Je zajištěna prokazatelně písemná výměna informací o rizicích práce se spolupracujícími firmami § 132 odst. 4. Zákoníku práce?", "5", "1"),
("32", "3", "Jsou zaměstnanci seznámeni s riziky možného ohrožení a opatřeními k jejich ochraně?", "6", "1"),
("33", "4", "Je provedena kategorizace prací podle Zákona 258/2000 Sb. ", "1", "1"),
("34", "4", "Je provedená kategorizace prací schválená KHS?", "2", "1"),
("35", "5", "Je zpracovaná  Směrnice pro řízení BOZP v podniku? (kdo, kdy)", "1", "1"),
("36", "5", "Je zpracovaná  Směrnice pro poskytování OOPP? (kdo, kdy)", "2", "1"),
("37", "5", "Jsou zpracovány  Provozní řády a Pracovní postupy? (kdo, kdy)", "3", "1"),
("38", "5", "Je zpracovaná  Směrnice pro práci žen a mladistvých? (kdo, kdy)", "4", "1"),
("39", "5", "Je zpracován Místní řád skladu? (kdo, kdy)", "5", "1"),
("40", "5", "Je zpracován  Dopravně provozní řád? (kdo, kdy)", "6", "1"),
("41", "5", "Je zpracována Dokumentace o nakládání s odpady? (kdo, kdy)", "7", "1"),
("42", "5", "Jsou vedeny zápisníky BOZP popř. evidenční listy BOZP u zaměstnanců?", "8", "1"),
("43", "6", "Je zpracována osnova vstupního školení zaměstnanců? (kdo, kdy)", "1", "1"),
("44", "6", "Jsou zpracována Osnovy školení zaměstnanců pro pracoviště resp. prováděné činnosti? (kdo, kdy)", "2", "1"),
("45", "6", "Je zpracována Osnova školení vedoucích zaměstnanců? (kdo, kdy)", "3", "1"),
("46", "6", "Je vedena dokumentace o prováděných školeních zaměstnanců? (kdo, kdy)", "4", "1"),
("47", "6", "Jsou zpracovány lhůtníky odborných školení pracovníků?", "5", "1"),
("48", "7", "Je provedeno  začlenění provozovaných činnosti do kategorii požárního nebezpečí v podniku? (kdo, kdy)", "1", "1"),
("49", "7", "Je zpracováno Posouzení požárního nebezpečí? (kdo, kdy)", "2", "1"),
("50", "7", "Je zpracováno Stanovení organizace zabezpečení PO v podniku? (kdo, kdy)", "3", "1"),
("51", "7", "Jsou zpracovány požární řády? (kdo, kdy)", "4", "1"),
("52", "7", "Je zpracován řád ohlašovny požáru? (kdo, kdy)", "5", "1"),
("53", "7", "Jsou zpracovány Požárně poplachové směrnice? (kdo, kdy)", "6", "1"),
("54", "7", "Jsou zavedeny požární knihy?", "7", "1"),
("55", "7", "Je zpracována Dokumentace o činnosti a akceschopnosti jednotky PO? (kdo, kdy)", "8", "1"),
("56", "7", "Je zpracován Přehled bezpečnostního značení? (kdo, kdy)", "9", "1"),
("57", "7", "Je zpracován Přehled PHP a hydrantů? (kdo, kdy)", "10", "1"),
("58", "7", "Je zpracován Požární evakuační plán? (kdo, kdy)", "11", "1"),
("59", "7", "Je zpracována dokumentace zdolávání požáru? (kdo, kdy)
", "12", "1"),
("60", "7", "Tématický plán a časový rozvrh odborné přípravy preventistů PO? (kdo, kdy)", "13", "1"),
("61", "7", "Jsou zpracovány Záznamy o provedení odborné přípravy preventistů PO? (kdo, kdy)", "14", "1"),
("62", "7", "Je zpracován Tématický plán a časový rozvrh školení o PO vedoucích zaměstnanců? (kdo, kdy)", "15", "1"),
("63", "7", "Je zpracován Tématický plán a časový rozvrh školení o PO zaměstnanců? (kdo, kdy)", "16", "1"),
("64", "7", "Jsou vedeny záznamy o provedeném školení?", "17", "1"),
("65", "7", "Jsou zpracovány Směrnice pro  zřizování a činnost preventivní požární hlídky? (kdo, kdy)", "18", "1"),
("66", "7", "Je zpracovántématický plán a časový rozvrh odborné přípravy členů preventivních požárních hlídek? (kdo, kdy)", "19", "1"),
("67", "7", "Jsou vedeny záznamy o provedené odborné přípravě členů preventivních požárních hlídek?", "20", "1"),
("68", "8", "Jsou otázky BOZP pravidelně projednávány vedením podniku?", "1", "1"),
("69", "8", "Zahrnují tato jednání kontrolu plnění přijatých opatření?", "2", "1"),
("70", "8", "Jsou stanovena pravidla pro spoluúčast zaměstnanců se zaměstnavatelem při řešení otázek  na úseku bezpečnosti práce?", "3", "1"),
("71", "8", "Pracuje v organizaci odborová organizace?", "4", "1"),
("72", "8", "Je v organizaci zvolen zástupce zaměstnanců?", "5", "1"),
("73", "8", "Jsou prováděny roční prověrky BOZP všech pracovišť?", "6", "1"),
("74", "8", "Mají zaměstnanci přístup k veškerým dokumentům týkajícím se jejich činnosti a vědí kde se nacházejí (pracovní postupy, směrnice atd.)?", "7", "1"),
("75", "8", "Je zajištěna informovanost příslušných útvarů a pracovníků o skutečnostech, které mohou mít vliv na ohrožení zdraví a životního prostředí (výsledky šetření úrazů a havárií, změny technologií apod.)?", "8", "1"),
("76", "9", "Jsou zpracovány pracovní postupy pro jednotlivé činnosti ve firmě prováděné?", "1", "1"),
("77", "9", "Řeší tyto pracovní postupy i problematiku BOZP?", "2", "1"),
("78", "9", "Pracovníci vykonávají činnosti jednotvárně a jednostranně zatěžující organismus?", "3", "1"),
("79", "9", "Jsou pracovníci ohrožování padajícími nebo klouzajícími předměty?", "4", "1"),
("80", "9", "Jsou pracovníci chránění proti pádu či zřícení?", "5", "1"),
("81", "9", "Pracují pracovníci osamoceni na pracovišti se zvýšeným rizikem?", "6", "1"),
("82", "9", "Jsou pracovníci ohroženi dopravou na pracovištích?", "7", "1"),
("83", "9", "Vykonávají ruční manipulaci s ručními břemeny, která vytvářejí možnost poškození zdraví, zejména páteře?", "8", "1"),
("84", "10", "Jsou stanoveny kvalifikační požadavky pro výběr zaměstnanců?", "1", "1"),
("85", "10", "Je stanoven způsob zácviku a ověření znalostí a dovedností?", "2", "1"),
("86", "10", "Je stanoven způsob prověření kvalifikace externích dodavatelů služeb (např. projektování, údržba atd.)?", "3", "1"),
("87", "11", "Je pověřen konkrétní  zaměstnanec sledující lhůty školení a zdravotních prohlídek?", "1", "1"),
("88", "11", "Jsou zpracovány lhůtníky školení BOZP a PO pro zaměstnance?", "2", "1"),
("89", "11", "Jsou zpracovány lhůtníky školení BOZP a PO pro vedoucí zaměstnance?", "3", "1"),
("90", "11", "Jsou zpracovány lhůtníky profesních (odborných) školení pro zaměstnance?", "4", "1"),
("91", "12", "Je zpracován program školení a výcviku: a) pro nové pracovníky?", "1", "1"),
("92", "12", "Je zpracován program školení a výcviku: b) pro změnu pracovního zařazení?", "2", "1"),
("93", "12", "Je zpracován program školení a výcviku: c) pro krátkodobé pracovníky (brigádníky)?
", "3", "1"),
("94", "12", "Je prováděno: a) povinné školení a výcvik v oblasti BOZP a PO pro všechny zaměstnance?", "4", "1"),
("95", "12", "Je prováděno: b) vstupní školení / zácvik na pracovišti?", "5", "1"),
("96", "12", "Je prováděno: c) speciální školení a výcvik vedoucích pracovníků?
", "6", "1"),
("97", "12", "Je prováděno: d) speciální (odborné) školení a výcvik specialistů (svářeči, elektrikáři apod.)?", "7", "1"),
("98", "12", "Je stanoveno, kdo a jakému typu školení / výcviku se musí podrobit   s ohledem na svoji funkci, pracovní zařazení?", "8", "1"),
("99", "12", "Obsahuje školení informace: a) o identifikaci a hodnocení rizik u používaných strojů, zařízení a prováděných činností?", "9", "1"),
("100", "12", "Obsahuje školení informace: b) o způsobech ochrany proti pracovním rizikům a používání OOPP?", "10", "1"),
("101", "12", "Obsahuje školení informace: c) o bezpečných pracovních postupech a zásadách bezpečné práce?", "11", "1"),
("102", "12", "Obsahuje školení informace: d) o zásadách první pomoci?
", "12", "1"),
("103", "12", "Obsahuje školení informace: e) o postupu pracovníků při vzniku nehody?", "13", "1"),
("104", "12", "Je vedena dokumentace: a) o školení a výcviku / zácviku, pracovníků?", "14", "1"),
("105", "12", "Je vedena dokumentace: b) o  přezkoušení  pracovníků v závěru školení?", "15", "1"),
("106", "12", "Obsahuje dokumentace o školení, výcviku / zácviku, jméno školeného pracovníka  a školitele, jejich podpisy, datum a rozsah školení (podle profesní, funkční náplně), s uvedením, z čeho konkrétně byl pracovník školen a vyjádření o znalostech a schopnostech školeného zaměstnance vykonávat určenou práci?", "16", "1"),
("107", "12", "Jsou organizovány výchovné a vzdělávací akce v oblasti BOZP?", "17", "1"),
("108", "12", "Je prováděna osvětová činnost (nástěnky, plakáty) zaměřená na: a) výstrahu před nebezpečím ohrožujícím zaměstnance při práci?
", "18", "1"),
("109", "12", "Je prováděna osvětová činnost (nástěnky, plakáty) zaměřená na: a) výstrahu před nebezpečím ohrožujícím zaměstnance při práci?
", "19", "1"),
("110", "13", "Svářeči", "1", "1"),
("111", "13", "Vazači břemen", "2", "1"),
("112", "13", "Obsluhy ZZ", "3", "1"),
("113", "13", "Jeřábníci", "4", "1"),
("114", "13", "Práce ve výškách", "5", "1"),
("115", "13", "Lešenáři", "6", "1"),
("116", "13", "Dřevoobrábění", "7", "1"),
("117", "13", "Obsluhy tlakových nádob", "8", "1"),
("118", "13", "Neelektrikáři (vyhl.č.50/1978 Sb., §3,4)", "9", "1"),
("119", "13", "Elektrikáři §5 – 10", "10", "1"),
("120", "13", "Řidiči referentských“vozidel", "11", "1"),
("121", "13", "Řidiči z povolání", "12", "1"),
("122", "13", "Řidiči motorových  vozíků", "13", "1"),
("123", "13", "Obsluha kovových nádob na plyny – mimo svářeče", "14", "1"),
("124", "13", "Obsluha motorových řetězových pil", "15", "1"),
("125", "13", "Obsluha křovinořezů", "16", "1"),
("126", "13", "Obsluha plynových zařízení do 50 kW", "17", "1"),
("127", "13", "Obsluha stavebních a zemních strojů", "18", "1"),
("128", "13", "Pracovníci pracující s chemickými karcinogeny", "19", "1"),
("129", "13", "Topiči nízkotlakých kotelen nad 50  kW", "20", "1"),
("130", "13", "Topiči parních a horkovodních kotlů", "21", "1"),
("131", "14", "Je systém odměňování v souladu s požadavky na BOZP?", "1", "1"),
("132", "14", "Jsou pracovníci vedením podniku motivováni k dodržování požadavků předpisů  k zajištění BOZP a ke spoluúčasti na plnění bezpečnostní politiky (koncepce) podniku?", "2", "1"),
("133", "15", "Je uzavřena smlouva se závodním lékařem (jméno)?", "1", "1"),
("134", "15", "Jsou pracoviště vybavena odpovídajícími prostředky první pomoci?", "2", "1"),
("135", "15", "Je ověřována zdravotní způsobilost pracovníků?", "3", "1"),
("136", "15", "Je zaveden systém zdravotních prohlídek: a) vstupních / výstupních?
", "4", "1"),
("137", "15", "Je zaveden systém zdravotních prohlídek: b) preventivních  / periodických?
", "5", "1"),
("138", "15", "Je na každém pracovišti vedena kniha úrazů?", "6", "1"),
("139", "15", "Je zpracována Směrnice k zajištění povinností zaměstnavatele při vzniku pracovních úrazů a nemocích z povolání?", "7", "1"),
("140", "15", "Je ve firmě určen zaměstnanec pověřený řešením pracovních úrazů?", "8", "1"),
("141", "15", "Je firma pojištěna pro PÚ a nemoci z povolání podle vyhlášky č. 125/1993 Sb.?", "9", "1"),
("142", "16", "Je zpracovaná  Směrnice OOPP ?", "1", "1"),
("143", "16", "Jsou součástí  Směrnici OOPP tabulky pro zhodnocení rizik?", "2", "1"),
("144", "16", "Jsou stanovena kritéria pro výběr a používání OOPP, jejich údržbu  a skladování?", "3", "1"),
("145", "16", "Provádí se kontrola používání OOPP?", "4", "1"),
("146", "16", "Jsou pracovníci proškoleni o používání OOPP?", "5", "1"),
("147", "16", "Jsou OOPP certifikované?", "6", "1"),
("148", "16", "Je požadováno aby návštěvníci používali OOPP?", "7", "1"),
("149", "17", "Jsou zpracovány přehledy (inventáře) zařízení?", "1", "1"),
("150", "17", "Jsou zpracovány technologické postupy prací?", "2", "1"),
("151", "18", "Jsou stroje vybaveny průvodní dokumentací a návody k obsluze?", "1", "1"),
("152", "18", "Je obsluha prokazatelně proškolena k obsluze stroje?", "2", "1"),
("153", "18", "Je zpracován plán údržby a prohlídek  strojů?", "3", "1"),
("154", "18", "Byly provedeny elektrorevize všech strojů ?", "4", "1"),
("155", "18", "Jsou zjištěné závady z kontrol odstraňovány v termínech?", "5", "1"),
("156", "18", "Jsou kontrolována všechna nová či opravená zařízení, aby se zajistilo jejich vhodné zabezpečení před zahájením provozu?", "6", "1"),
("157", "18", "Provádí se minimálně jednou za rok celková kontrola a údržba bezpečnostních spínačů a nouzových tlačítek?", "7", "1"),
("158", "18", "Jsou u strojů BT s hlavními pravidly bezpečné práce?", "8", "1"),
("159", "18", "Jsou u strojů funkční ochranná zařízení?", "9", "1"),
("160", "19", "Je zpracován harmonogram revizí el. zařízení?", "1", "1"),
("161", "19", "Je určeno prostředí pro účely stanovení periody reviizí?", "2", "1"),
("162", "19", "Je provoz zařízení řešen vnitropodnikovým předpisem?", "3", "1"),
("163", "19", "Jsou prováděny revize elektrorozvodů?", "4", "1"),
("164", "19", "Kdy bude nejbližší revize elektrorozvodů?", "5", "1"),
("165", "19", "Jsou prováděny revize elektrospotřebičů?", "6", "1"),
("166", "19", "Kdy bude nejbližší revize elektrospotřebičů?", "7", "1"),
("167", "19", "Jsou prováděny revize el. ručního nářadí?", "8", "1"),
("168", "19", "Kdy bude nejbližší revize el. ručního nářadí?", "9", "1"),
("169", "19", "Provádí elektrické instalace pouze kvalifikovaní elektrikáři?", "10", "1"),
("170", "19", "Jsou k dispozici návody k obsluze?", "11", "1"),
("171", "20", "Je zpracován harmonogram revizí a kontrol?", "1", "1"),
("172", "20", "Je provoz zařízení řešen vnitropodnikovým předpisem?", "2", "1"),
("173", "20", "Je písemně ustanovena  osoba odpovědná za bezpečný a hospodárný provoz tlakových nádob?", "3", "1"),
("174", "20", "Má osoba odpovědná za bezpečný a hospodárný provoz tlakových nádob platné proškolení revizním technikem TN?", "4", "1"),
("175", "20", "Kdy je příští proškolení odpovědné osoby za bezpečný?
", "5", "1"),
("176", "20", "Jsou obsluhy tlakových nádob prokazatelně proškoleny?", "6", "1"),
("177", "20", "Je pro každou tlakovou nádobu veden provozní deník?", "7", "1"),
("178", "20", "Provádějí se  prokazatelně kontroly správné činnosti tlakoměrů ? (nejméně 1x za 3 měsíce)", "8", "1"),
("179", "20", "Provádějí se prokazatelně zkoušky pojistného ventilu? (nejméně 1x za měsíc)", "9", "1"),
("180", "20", "Je zpracován provozní řád pro tlakové nádoby? (tam kde jsou používány média otravná, výbušná)", "10", "1"),
("181", "20", "Jsou k dispozici návody k obsluze?", "11", "1"),
("182", "21", "Je zpracován harmonogram revizí a kontrol?", "1", "1"),
("183", "21", "Je provoz zařízení řešen vnitropodnikovým předpisem?", "2", "1"),
("184", "21", "Je zpracován systém bezpečné práce?", "3", "1"),
("185", "21", "Je obsluha odborně způsobilá?", "4", "1"),
("186", "21", "Jsou k dispozici návody k obsluze?", "5", "1"),
("187", "22", "Je zpracován harmonogram revizí a kontrol?", "1", "1"),
("188", "22", "Je zpracován místní provozní řád?", "2", "1"),
("189", "22", "Je obsluha poučená a zaškolená?", "3", "1"),
("190", "22", "Je veden provozní deník?", "4", "1"),
("191", "22", "Zkouška netěsností min. 1x za rok  je prováděna?", "5", "1"),
("192", "22", "Je ve vnitřních prostorách kde jsou umístěny PZ je zajištěno dostatečné odvětrání?", "6", "1"),
("193", "22", "Je podtrubí pro rozvod je plynu natřeno žlutě?", "7", "1"),
("194", "22", "Je hlavní uzávěr plynu označen?", "8", "1"),
("195", "22", "Jsou k dispozici návody k obsluze?", "9", "1"),
("196", "23", "Je zpracován místní provozní řád skladu?", "1", "1"),
("197", "23", "Je vypracován schématický půdorysný plán?", "2", "1"),
("198", "23", "Jsou k dispozici statické výpočty regálů nebo výsledky zátěžové zkoušky?", "3", "1"),
("199", "23", "Jsou vedeny knihy regálů?", "4", "1"),
("200", "24", "Je zpracován dopravně provozní řád?", "1", "1"),
("201", "24", "Je  zpracován harmonogram STK motorových vozidel?", "2", "1"),
("202", "24", "Obsahuje dopravně provozní řád termíny a lhůty oprav a údržby?", "3", "1"),
("203", "24", "Je vedena evidence řidičů? (odborné způsobilosti)", "4", "1"),
("204", "24", "Je zpracován harmonogram lékařských prohlídek a přezkoušení řidičů (profesionálů)?", "5", "1"),
("205", "25", "Je písemně jmenován uživatel - zaměstnanec celkově odpovědný za technický stav jednot­livých vozíků a výcvik řidičů?", "1", "1"),
("206", "25", "Obsahuje dopravní řád termíny a lhůty oprav a údržby?", "2", "1"),
("207", "25", "Listy řidičů motorových vozíků jsou vedeny?", "3", "1"),
("208", "25", "Je vedena evidence průkazů řidičů motorových vozíků?", "4", "1"),
("209", "26", "Je zpracována směrnice pro sváření?", "1", "1"),
("210", "26", "Provádějí svářecí práce pouze odborně způsobilé osoby?", "2", "1"),
("211", "26", "Jsou svářeči seznámení se směrnicí pro sváření?", "3", "1");
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_fotografie'
-- Počet řádků tabulky: 0
-- Začátek dat tabulky
INSERT INTO `prevent_audit_fotografie` VALUES 
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_log'
-- Počet řádků tabulky: 0
-- Začátek dat tabulky
INSERT INTO `prevent_audit_log` VALUES 
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_neshody'
-- Počet řádků tabulky: 0
-- Začátek dat tabulky
INSERT INTO `prevent_audit_neshody` VALUES 
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_planovac'
-- Počet řádků tabulky: 0
-- Začátek dat tabulky
INSERT INTO `prevent_audit_planovac` VALUES 
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_pracoviste'
-- Počet řádků tabulky: 0
-- Začátek dat tabulky
INSERT INTO `prevent_audit_pracoviste` VALUES 
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_protokoly'
-- Počet řádků tabulky: 0
-- Začátek dat tabulky
INSERT INTO `prevent_audit_protokoly` VALUES 
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_soubory'
-- Počet řádků tabulky: 0
-- Začátek dat tabulky
INSERT INTO `prevent_audit_soubory` VALUES 
-- Konec dat tabulky


-- Tabulka: 'prevent_cron'
-- Počet řádků tabulky: 3
-- Začátek dat tabulky
INSERT INTO `prevent_cron` VALUES 
("1", "provest zalohu", "vypnuto", "false", "ještě nebyla spuštěna", "59", "1260304781", "Událost vytváří zálohu systému"),
("2", "prevest udrzbu", "vypnuto", "false", "ještě nebyla spuštěna", "300", "1260304781", "Událost spouští údržbu systému"),
("3", "vytvorit audity podle planu", "vypnuto", "false", "ještě nebyla spuštěna", "3601", "1260304781", "Tato událost vytváří nové audity podle planu");
-- Konec dat tabulky


-- Tabulka: 'prevent_cron_log'
-- Počet řádků tabulky: 2
-- Začátek dat tabulky
INSERT INTO `prevent_cron_log` VALUES 
("1", "2", "1266491521", "Cron zapnut", "kovar"),
("2", "2", "1266491525", "Cron vypnut", "kovar");
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy'
-- Počet řádků tabulky: 1
-- Začátek dat tabulky
INSERT INTO `prevent_firmy` VALUES 
("4", "Martin Prokop", "Lukavec", "lukavec@lukavec.lukavec", "8970908", "popis me firmy", "", "8790790", "JK868709", "CSOB", "neni co dodat");
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy_budova'
-- Počet řádků tabulky: 2
-- Začátek dat tabulky
INSERT INTO `prevent_firmy_budova` VALUES 
("9", "prvni budova", "jkhjkjk", "3", "ano", "ano", "ano", "ano", "ano", "ano", "f"),
("10", "druha budova", "jkhk", "56", "ano", "ano", "ano", "ano", "ano", "ano", "dsg");
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy_budova_relace'
-- Počet řádků tabulky: 2
-- Začátek dat tabulky
INSERT INTO `prevent_firmy_budova_relace` VALUES 
("9", "5", "9"),
("10", "5", "10");
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy_log'
-- Počet řádků tabulky: 84
-- Začátek dat tabulky
INSERT INTO `prevent_firmy_log` VALUES 
("290", "1266339793", "Vytvořen nový audit provozovně Moje provozovna", "", "4", "kovar"),
("291", "1266340462", "Technik technik nepřijal audit provozovny Moje provozovna", "", "4", "technik"),
("292", "1266341039", "Vytvořen nový audit provozovně Moje provozovna", "", "4", "kovar"),
("293", "1266341067", "Technik technik nepřijal audit provozovny Moje provozovna", "", "4", "technik"),
("294", "1266341196", "Upraven audit provozovně Moje provozovna", "", "4", "kovar"),
("295", "1266341320", "Technik technik nepřijal audit provozovny Moje provozovna", "", "4", "technik"),
("296", "1266341354", "Upraven audit provozovně Moje provozovna", "", "4", "kovar"),
("297", "1266365826", "Vytvořen nový audit provozovně Moje provozovna", "", "4", "kovar"),
("298", "1266365847", "Technik technik přijal audit provozovny Moje provozovna", "", "4", "technik"),
("299", "1266366405", "Vytvořen nový plán auditu provozovně Moje provozovna", "", "4", "kovar"),
("300", "1266491178", "Vytvořena osoba jménem zjjhbh", "", "4", "kovar"),
("301", "1266491412", "Přidána budova s názvem hukh", "", "4", "kovar"),
("302", "1266491431", "Vytvořena relace provozovny Moje provozovna mezi: hukh (budova) * sdfg (pracoviste)", "", "4", "kovar"),
("303", "1266491454", "Smazána relace provozovny Moje provozovna mezi: hukh (budova) * sdfg (pracoviste)", "", "4", "kovar"),
("304", "1266491550", "Vytvořen nový plán auditu provozovně Moje provozovna", "", "4", "kovar"),
("305", "1266491584", "Vytvořen nový audit provozovně Moje provozovna", "", "4", "kovar"),
("306", "1266491638", "Technik technik přijal audit provozovny Moje provozovna", "", "4", "technik"),
("307", "1266493108", "Vymazány logy starší 3 dny ", "", "27", "kovar"),
("308", "1266493108", "Vymazány logy starší 3 dny ", "", "31", "kovar"),
("309", "1266579668", "Vytvořen nový audit provozovně Moje provozovna", "", "4", "kovar"),
("310", "1266579781", "Technik technik přijal audit provozovny Moje provozovna", "", "4", "technik"),
("311", "1266762767", "Vytvořen nový audit provozovně Moje provozovna", "", "4", "kovar"),
("312", "1266762831", "Technik technik přijal audit provozovny Moje provozovna", "", "4", "technik"),
("313", "1266763553", "Vytvořen nový audit provozovně Moje provozovna", "", "4", "kovar"),
("314", "1266763563", "Technik technik přijal audit provozovny Moje provozovna", "", "4", "technik"),
("315", "1267191659", "Vytvořen nový audit provozovně Moje provozovna", "", "4", "kovar"),
("316", "1267191674", "Technik technik přijal audit provozovny Moje provozovna", "", "4", "technik"),
("317", "1267198419", "Vytvořen nový audit provozovně Moje provozovna", "", "4", "kovar"),
("318", "1267198432", "Vytvořen nový plán auditu provozovně Moje provozovna", "", "4", "kovar"),
("319", "1267198649", "Technik technik přijal audit provozovny Moje provozovna", "", "4", "technik"),
("320", "1267800053", "Vytvořen nový audit provozovně Moje provozovna", "", "4", "kovar"),
("321", "1267800103", "Vytvořen nový audit provozovně Moje provozovna", "", "4", "kovar"),
("322", "1267800472", "Vytvořen nový audit provozovně Moje provozovna", "", "4", "kovar"),
("323", "1267800540", "Vytvořen nový audit provozovně Moje provozovna", "", "4", "kovar"),
("324", "1267800563", "Vytvořen nový audit provozovně Moje provozovna", "", "4", "kovar"),
("325", "1267812584", "Technik technik přijal audit provozovny Moje provozovna", "", "4", "technik"),
("326", "1268424332", "Vytvořen nový audit provozovně Moje provozovna", "", "4", "kovar"),
("327", "1268424370", "Technik technik nepřijal audit provozovny Moje provozovna", "", "4", "technik"),
("328", "1268425867", "Vytvořena relace provozovny Moje provozovna mezi: hukh (budova) * a (pracoviste)", "", "4", "kovar"),
("329", "1268425873", "Vytvořena relace provozovny Moje provozovna mezi: hukh (budova) * sdfg (pracoviste)", "", "4", "kovar"),
("330", "1268426342", "Upravena osoba zjjhbh", "", "4", "kovar"),
("331", "1270383599", "Přidána budova s názvem prvni budova", "", "4", "kovar"),
("332", "1270383616", "Přidána budova s názvem druha budova", "", "4", "kovar"),
("333", "1270383640", "Přidáno pracoviste s názvem prvni pracoviste", "", "4", "kovar"),
("334", "1270383662", "Přidáno pracoviste s názvem druhe pracoviste", "", "4", "kovar"),
("335", "1270383728", "Vytvořena relace provozovny Moje provozovna mezi: prvni budova (budova) * druhe pracoviste (pracoviste)", "", "4", "technik"),
("336", "1270383735", "Vytvořena relace provozovny Moje provozovna mezi: druha budova (budova) * prvni pracoviste (pracoviste)", "", "4", "technik"),
("337", "1270847944", "Vytvořen nový audit provozovně Moje provozovna", "", "4", "kovar"),
("338", "1270848003", "Technik technik přijal audit provozovny Moje provozovna", "", "4", "technik"),
("339", "1270848296", "Vytvořen nový audit provozovně Moje provozovna", "", "4", "kovar"),
("340", "1270848342", "Vytvořen nový audit provozovně Moje provozovna", "", "4", "kovar"),
("341", "1270848370", "Vytvořen nový audit provozovně Moje provozovna", "", "4", "kovar"),
("342", "1270848399", "Technik technik přijal audit provozovny Moje provozovna", "", "4", "technik"),
("343", "1271087035", "Přidáno pracoviste s názvem ", "", "4", "kovar"),
("344", "1271087044", "Smazáno pracoviště ", "", "4", "kovar"),
("345", "1271088130", "Přidáno pracoviste s názvem treti pracoviste", "", "4", "kovar"),
("346", "1271088149", "Přidáno pracoviste s názvem treti pracoviste", "", "4", "kovar"),
("347", "1272547799", "Přidáno pracoviste s názvem ctvrte", "", "4", "kovar"),
("348", "1272547871", "Přidáno pracoviste s názvem pate", "", "4", "kovar"),
("349", "1272548769", "Smazán plán auditu provozovny Moje provozovna", "", "4", "kovar"),
("350", "1272548774", "Smazán plán auditu provozovny Moje provozovna", "", "4", "kovar"),
("351", "1272548777", "Smazán plán auditu provozovny Moje provozovna", "", "4", "kovar"),
("352", "1272548781", "Smazán plán auditu provozovny Moje provozovna", "", "4", "kovar"),
("353", "1272548817", "Smazán plán auditu provozovny Moje provozovna", "", "4", "kovar"),
("354", "1272548922", "Smazán plán auditu provozovny Moje provozovna", "", "4", "kovar"),
("355", "1272884229", "Vytvořen nový audit provozovně Moje provozovna", "", "4", "kovar"),
("356", "1272884254", "Technik technik přijal audit provozovny Moje provozovna", "", "4", "technik"),
("357", "1273926757", "Přidáno pracoviste s názvem fgj", "", "4", "technik"),
("358", "1273926878", "Upravena pracoviště s názvem prvni pracovistef", "", "4", "technik"),
("359", "1275662626", "Vytvořen nový audit provozovně Moje provozovna", "", "4", "kovar"),
("360", "1275662647", "Technik technik přijal audit provozovny Moje provozovna", "", "4", "technik"),
("361", "1276626529", "Upraven audit provozovně Moje provozovna", "", "4", "usradmin"),
("362", "1276881855", "Vytvořen opravný audit provozovně Moje provozovna k auditu #ID38", "", "4", "kovar"),
("363", "1276881903", "Vytvořen opravný audit provozovně Moje provozovna k auditu #ID38", "", "4", "kovar"),
("364", "1276882446", "Vytvořen opravný audit provozovně Moje provozovna k auditu #ID38", "", "4", "kovar"),
("365", "1276882665", "Vytvořen opravný audit provozovně Moje provozovna k auditu #ID38", "", "4", "kovar"),
("366", "1276884812", "Vytvořen opravný audit provozovně Moje provozovna k auditu #ID38", "", "4", "kovar"),
("367", "1276884928", "Vytvořen opravný audit provozovně Moje provozovna k auditu #ID38", "", "4", "kovar"),
("368", "1276885100", "Vytvořen opravný audit provozovně Moje provozovna k auditu #ID38", "", "4", "kovar"),
("369", "1276885143", "Vytvořen opravný audit provozovně Moje provozovna k auditu #ID38", "", "4", "kovar"),
("370", "1276885205", "Vytvořen opravný audit provozovně Moje provozovna k auditu #ID38", "", "4", "kovar"),
("371", "1276885220", "Vytvořen opravný audit provozovně Moje provozovna k auditu #ID38", "", "4", "kovar"),
("372", "1276885339", "Vytvořen opravný audit provozovně Moje provozovna k auditu #ID38", "", "4", "kovar"),
("373", "1276885381", "Vytvořen opravný audit provozovně Moje provozovna k auditu #ID38", "", "4", "kovar");
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy_osoba'
-- Počet řádků tabulky: 2
-- Začátek dat tabulky
INSERT INTO `prevent_firmy_osoba` VALUES 
("1", "4", "Martin Prokop", "", "edg", "h", "gh", "bh", "jb", "bjh
"),
("2", "4", "zjjhbh", "", "dthv", "hbh", "bjk", "bjk", "bjk", "jhuiohjio");
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy_osoba_preklad'
-- Počet řádků tabulky: 7
-- Začátek dat tabulky
INSERT INTO `prevent_firmy_osoba_preklad` VALUES 
("4", "z_zastupce_firma", "Zástupce firmy"),
("2", "z_opravnena_osoba_bozp_po", "Osoba oprávněná podepisovat dokumenty BOZP a PO"),
("5", "z_vedouci_rady_zamestnancu", "Vedoucí rady zaměstnanců"),
("6", "z_zastupce_bozp", "Zástupce pro oblast BOZP"),
("7", "z_odpovedny_za_urazy", "Osoba odpovědná za evidenci úrazů"),
("8", "z_likvidace_urazu", "Osoba odpovědná za likvidaci úrazů"),
("9", "z_zastupce_provozovna", "Zástupce provozovny");
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy_osoba_relace'
-- Počet řádků tabulky: 2
-- Začátek dat tabulky
INSERT INTO `prevent_firmy_osoba_relace` VALUES 
("1", "1", "4", "firma", "z_zastupce_firma"),
("7", "2", "5", "provozovna", "z_opravnena_osoba_bozp_po");
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy_pracoviste'
-- Počet řádků tabulky: 8
-- Začátek dat tabulky
INSERT INTO `prevent_firmy_pracoviste` VALUES 
("6", "druhe pracoviste", "", "jknjk", "", "0", "", "", "", "hb", "kb", "hkbjk", "", "ano", "sdg", "jkb", "kbk", "ano", "jkbk"),
("5", "prvni pracovistef", "", "jhjk", "", "6", "", "", "", "nbh", "bjh", "bhjb", "", "ano", "jhkh", "jkh", "hkh", "ano", "jkk"),
("8", "treti pracoviste", "", "treti", "", "3", "", "", "", "3sou", "3dalsi", "3auta", "", "ano", "3v", "3p", "3os", "ano", "3p"),
("9", "treti pracoviste", "", "treti", "", "3", "", "", "", "3sou", "3dalsi", "3auta", "", "ano", "3v", "3p", "3os", "ano", "3p"),
("10", "ctvrte", "", "jkh", "", "0", "", "", "", "jk", "njk", "bj", "", "ano", "jkbn", "dfhdfh", "jkjk", "ano", "jkbjk"),
("11", "pate", "", "jkb", "", "0", "", "", "", "hb", "hk", "bh", "", "ano", "b", "hb", "jh", "ano", "jnk"),
("12", "fgj", "", "fgj", "", "0", "", "", "", "jfsjgf", "sgjsj", "sggsj", "", "ano", "sgjgdjdfs", "jsdfjs", "sdj", "ano", "sgj"),
("13", "prvni pracovistef", "", "jhjk", "", "6", "", "", "", "nbh", "bjh", "bhjb", "", "ano", "jhkh", "jkh", "hkh", "ano", "jkk");
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy_pracoviste_relace'
-- Počet řádků tabulky: 6
-- Začátek dat tabulky
INSERT INTO `prevent_firmy_pracoviste_relace` VALUES 
("7", "5", "8"),
("5", "5", "6"),
("4", "5", "5"),
("8", "5", "10"),
("9", "5", "11"),
("10", "5", "12");
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy_provozovny'
-- Počet řádků tabulky: 1
-- Začátek dat tabulky
INSERT INTO `prevent_firmy_provozovny` VALUES 
("5", "4", "Moje provozovna", "někde je", "email", "8968á", "popis provozovny", "", "ano", "0121", "", "ano", "ano", "", "ano", "", "", "", "efigh", "wefgwfgwegwegweg", "ano", "ewgweg", "wegewg");
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy_relace_budova_pracoviste'
-- Počet řádků tabulky: 2
-- Začátek dat tabulky
INSERT INTO `prevent_firmy_relace_budova_pracoviste` VALUES 
("13", "5", "10", "5"),
("12", "5", "9", "6");
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy_technik'
-- Počet řádků tabulky: 1
-- Začátek dat tabulky
INSERT INTO `prevent_firmy_technik` VALUES 
("7", "4", "23");
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy_uzivatele_prava'
-- Počet řádků tabulky: 10
-- Začátek dat tabulky
INSERT INTO `prevent_firmy_uzivatele_prava` VALUES 
("1", "41", "admin"),
("2", "42", "1"),
("3", "43", "admin"),
("4", "44", "3"),
("5", "27", "admin"),
("9", "28", "7"),
("7", "29", "5"),
("8", "30", "admin"),
("10", "28", "5"),
("11", "31", "5");
-- Konec dat tabulky


-- Tabulka: 'prevent_log'
-- Počet řádků tabulky: 364
-- Začátek dat tabulky
INSERT INTO `prevent_log` VALUES 
("640", "1266245377", "Úspěšné přihlášení", "", "1", "kovar"),
("641", "1266339748", "Úspěšné přihlášení", "", "1", "kovar"),
("642", "1266339768", "Úspěšné přihlášení", "", "23", "technik"),
("643", "1266339782", "Úspěšné přihlášení", "", "1", "kovar"),
("644", "1266339793", "Vytvořil nový audit provozovně Moje provozovna", "", "1", "kovar"),
("645", "1266339797", "Úspěšné přihlášení", "", "23", "technik"),
("646", "1266340462", "Neřijal audit provozovny Moje provozovna", "", "23", "technik"),
("647", "1266341027", "Úspěšné přihlášení", "", "1", "kovar"),
("648", "1266341039", "Vytvořil nový audit provozovně Moje provozovna", "", "1", "kovar"),
("649", "1266341043", "Úspěšné přihlášení", "", "23", "technik"),
("650", "1266341067", "Neřijal audit provozovny Moje provozovna", "", "23", "technik"),
("651", "1266341080", "Úspěšné přihlášení", "", "1", "kovar"),
("652", "1266341196", "Upravil audit provozovně Moje provozovna", "", "1", "kovar"),
("653", "1266341274", "Úspěšné přihlášení", "", "23", "technik"),
("654", "1266341320", "Neřijal audit provozovny Moje provozovna", "", "23", "technik"),
("655", "1266341325", "Úspěšné přihlášení", "", "1", "kovar"),
("656", "1266341354", "Upravil audit provozovně Moje provozovna", "", "1", "kovar"),
("657", "1266347323", "Úspěšné přihlášení", "", "1", "kovar"),
("658", "1266348463", "Úspěšné přihlášení", "", "23", "technik"),
("659", "1266350566", "Úspěšné přihlášení", "", "1", "kovar"),
("660", "1266350761", "Úspěšné přihlášení", "", "23", "technik"),
("661", "1266353515", "Úspěšné přihlášení", "", "23", "technik"),
("662", "1266353629", "Úspěšné přihlášení", "", "23", "technik"),
("663", "1266353913", "Úspěšné přihlášení", "", "1", "kovar"),
("664", "1266355051", "Úspěšné přihlášení", "", "23", "technik"),
("665", "1266355495", "Úspěšné přihlášení", "", "1", "kovar"),
("666", "1266356943", "Úspěšné přihlášení", "", "1", "kovar"),
("667", "1266365826", "Vytvořil nový audit provozovně Moje provozovna", "", "1", "kovar"),
("668", "1266365838", "Úspěšné přihlášení", "", "23", "technik"),
("669", "1266365847", "Přijal audit provozovny Moje provozovna", "", "23", "technik"),
("670", "1266365856", "Úspěšné přihlášení", "", "1", "kovar"),
("671", "1266366405", "Vytvořil nový plán auditu provozovně Moje provozovna", "", "1", "kovar"),
("672", "1266491139", "Úspěšné přihlášení", "", "1", "kovar"),
("673", "1266491521", "Cron zapnut - prevest udrzbu", "", "0", "kovar"),
("674", "1266491525", "Cron vypnut - prevest udrzbu", "", "0", "kovar"),
("675", "1266491550", "Vytvořil nový plán auditu provozovně Moje provozovna", "", "1", "kovar"),
("676", "1266491584", "Vytvořil nový audit provozovně Moje provozovna", "", "1", "kovar"),
("677", "1266491596", "Úspěšné přihlášení", "", "23", "technik"),
("678", "1266491638", "Přijal audit provozovny Moje provozovna", "", "23", "technik"),
("679", "1266492497", "Úspěšné přihlášení", "", "27", "usradmin"),
("680", "1266492973", "Úspěšné přihlášení", "", "1", "kovar"),
("681", "1266492992", "Vytvořil zálohu systému", "", "1", "kovar"),
("682", "1266492992", "Vytvořil zálohu systému", "", "0", "kovar"),
("683", "1266493095", "Vymazány logy starší 3 dny ", "", "1", "kovar"),
("684", "1266493095", "Vymazány logy starší 3 dny ", "", "23", "kovar"),
("685", "1266493095", "Vymazány logy starší 3 dny ", "", "24", "kovar"),
("686", "1266493095", "Vymazány logy starší 3 dny ", "", "27", "kovar"),
("687", "1266493095", "Vymazány logy starší 3 dny ", "", "31", "kovar"),
("688", "1266493095", "Vymazány logy starší 3 dny ", "", "0", "kovar"),
("689", "1266493108", "Vymazány logy firem starší 3 dny ", "", "0", "kovar"),
("690", "1266504840", "Úspěšné přihlášení", "", "1", "kovar"),
("691", "1266504904", "Vytvořil zálohu systému", "", "1", "kovar"),
("692", "1266504904", "Vytvořil zálohu systému", "", "0", "kovar"),
("693", "1266512812", "Úspěšné přihlášení", "", "1", "kovar"),
("694", "1266569993", "Úspěšné přihlášení", "", "1", "kovar"),
("695", "1266570596", "Úspěšné přihlášení", "", "1", "kovar"),
("696", "1266579250", "Úspěšné přihlášení", "", "1", "kovar"),
("697", "1266579668", "Vytvořil nový audit provozovně Moje provozovna", "", "1", "kovar"),
("698", "1266579752", "Úspěšné přihlášení", "", "23", "technik"),
("699", "1266579781", "Přijal audit provozovny Moje provozovna", "", "23", "technik"),
("700", "1266579809", "Úspěšné přihlášení", "", "27", "usradmin"),
("701", "1266579849", "Úspěšné přihlášení", "", "23", "technik"),
("702", "1266760171", "Úspěšné přihlášení", "", "1", "kovar"),
("703", "1266762767", "Vytvořil nový audit provozovně Moje provozovna", "", "1", "kovar"),
("704", "1266762777", "Úspěšné přihlášení", "", "23", "technik"),
("705", "1266762831", "Přijal audit provozovny Moje provozovna", "", "23", "technik"),
("706", "1266763543", "Úspěšné přihlášení", "", "1", "kovar"),
("707", "1266763553", "Vytvořil nový audit provozovně Moje provozovna", "", "1", "kovar"),
("708", "1266763557", "Úspěšné přihlášení", "", "23", "technik"),
("709", "1266763563", "Přijal audit provozovny Moje provozovna", "", "23", "technik"),
("710", "1266763808", "Úspěšné přihlášení", "", "1", "kovar"),
("711", "1267191483", "Úspěšné přihlášení", "", "1", "kovar"),
("712", "1267191659", "Vytvořil nový audit provozovně Moje provozovna", "", "1", "kovar"),
("713", "1267191665", "Úspěšné přihlášení", "", "23", "technik"),
("714", "1267191674", "Přijal audit provozovny Moje provozovna", "", "23", "technik"),
("715", "1267196229", "Úspěšné přihlášení", "", "1", "kovar"),
("716", "1267196389", "Úspěšné přihlášení", "", "1", "kovar"),
("717", "1267198419", "Vytvořil nový audit provozovně Moje provozovna", "", "1", "kovar"),
("718", "1267198432", "Vytvořil nový plán auditu provozovně Moje provozovna", "", "1", "kovar"),
("719", "1267198640", "Úspěšné přihlášení", "", "23", "technik"),
("720", "1267198649", "Přijal audit provozovny Moje provozovna", "", "23", "technik"),
("721", "1267198653", "Úspěšné přihlášení", "", "1", "kovar"),
("722", "1267798895", "Úspěšné přihlášení", "", "1", "kovar"),
("723", "1267800053", "Vytvořil nový audit provozovně Moje provozovna", "", "1", "kovar"),
("724", "1267800103", "Vytvořil nový audit provozovně Moje provozovna", "", "1", "kovar"),
("725", "1267800472", "Vytvořil nový audit provozovně Moje provozovna", "", "1", "kovar"),
("726", "1267800540", "Vytvořil nový audit provozovně Moje provozovna", "", "1", "kovar"),
("727", "1267800563", "Vytvořil nový audit provozovně Moje provozovna", "", "1", "kovar"),
("728", "1267806208", "Úspěšné přihlášení", "", "1", "kovar"),
("729", "1267807469", "Úspěšné přihlášení", "", "1", "kovar"),
("730", "1267807865", "Úspěšné přihlášení", "", "1", "kovar"),
("731", "1267807882", "Úspěšné přihlášení", "", "1", "kovar"),
("732", "1267812549", "Úspěšné přihlášení", "", "1", "kovar"),
("733", "1267812574", "Úspěšné přihlášení", "", "23", "technik"),
("734", "1267812584", "Přijal audit provozovny Moje provozovna", "", "23", "technik"),
("735", "1267837923", "Úspěšné přihlášení", "", "1", "kovar"),
("736", "1267872820", "Úspěšné přihlášení", "", "1", "kovar"),
("737", "1267873833", "Úspěšné přihlášení", "", "1", "kovar"),
("738", "1267876492", "Úspěšné přihlášení", "", "1", "kovar"),
("739", "1268089970", "Úspěšné přihlášení", "", "1", "kovar"),
("740", "1268421122", "Úspěšné přihlášení", "", "1", "kovar"),
("741", "1268424278", "Úspěšné přihlášení", "", "1", "kovar"),
("742", "1268424332", "Vytvořil nový audit provozovně Moje provozovna", "", "1", "kovar"),
("743", "1268424340", "Úspěšné přihlášení", "", "23", "technik"),
("744", "1268424370", "Neřijal audit provozovny Moje provozovna", "", "23", "technik"),
("745", "1268424487", "Úspěšné přihlášení", "", "1", "kovar"),
("746", "1268426231", "Vytvořil zálohu systému", "", "1", "kovar"),
("747", "1268426231", "Vytvořil zálohu systému", "", "0", "kovar"),
("748", "1268479869", "Úspěšné přihlášení", "", "1", "kovar"),
("749", "1268485834", "Úspěšné přihlášení", "", "1", "kovar"),
("750", "1268486089", "Úspěšné přihlášení", "", "1", "kovar"),
("751", "1268486202", "Úspěšné přihlášení", "", "1", "kovar"),
("752", "1268486320", "Úspěšné přihlášení", "", "1", "kovar"),
("753", "1268486387", "Úspěšné přihlášení", "", "1", "kovar"),
("754", "1268486449", "Úspěšné přihlášení", "", "1", "kovar"),
("755", "1268486500", "Úspěšné přihlášení", "", "1", "kovar"),
("756", "1268486536", "Úspěšné přihlášení", "", "1", "kovar"),
("757", "1268487103", "Úspěšné přihlášení", "", "1", "kovar"),
("758", "1268487708", "Úspěšné přihlášení", "", "1", "kovar"),
("759", "1268488312", "Úspěšné přihlášení", "", "1", "kovar"),
("760", "1268640008", "Úspěšné přihlášení", "", "1", "kovar"),
("761", "1269432713", "Úspěšné přihlášení", "", "1", "kovar"),
("762", "1269432848", "Úspěšné přihlášení", "", "1", "kovar"),
("763", "1269432932", "Úspěšné přihlášení", "", "27", "usradmin"),
("764", "1269432974", "Úspěšné přihlášení", "", "1", "kovar"),
("765", "1269434403", "Úspěšné přihlášení", "", "1", "kovar"),
("766", "1269434418", "Úspěšné přihlášení", "", "1", "kovar"),
("767", "1269435595", "Úspěšné přihlášení", "", "1", "kovar"),
("768", "1270381966", "Úspěšné přihlášení", "", "1", "kovar"),
("769", "1270382603", "Úspěšné přihlášení", "", "1", "kovar"),
("770", "1270383201", "Úspěšné přihlášení", "", "27", "usradmin"),
("771", "1270383556", "Úspěšné přihlášení", "", "1", "kovar"),
("772", "1270383698", "Úspěšné přihlášení", "", "23", "technik"),
("773", "1270383771", "Úspěšné přihlášení", "", "27", "usradmin"),
("774", "1270384278", "Úspěšné přihlášení", "", "1", "kovar"),
("775", "1270847856", "Úspěšné přihlášení", "", "1", "kovar"),
("776", "1270847944", "Vytvořil nový audit provozovně Moje provozovna", "", "1", "kovar"),
("777", "1270847991", "Úspěšné přihlášení", "", "23", "technik"),
("778", "1270848003", "Přijal audit provozovny Moje provozovna", "", "23", "technik"),
("779", "1270848014", "Úspěšné přihlášení", "", "1", "kovar"),
("780", "1270848295", "Vytvořil nový audit provozovně Moje provozovna", "", "1", "kovar"),
("781", "1270848342", "Vytvořil nový audit provozovně Moje provozovna", "", "1", "kovar"),
("782", "1270848370", "Vytvořil nový audit provozovně Moje provozovna", "", "1", "kovar"),
("783", "1270848390", "Úspěšné přihlášení", "", "23", "technik"),
("784", "1270848399", "Přijal audit provozovny Moje provozovna", "", "23", "technik"),
("785", "1270848404", "Úspěšné přihlášení", "", "1", "kovar"),
("786", "1270904298", "Úspěšné přihlášení", "", "1", "kovar"),
("787", "1271086845", "Úspěšné přihlášení", "", "1", "kovar"),
("788", "1272312112", "Úspěšné přihlášení", "", "1", "kovar"),
("789", "1272312997", "Úspěšné přihlášení", "", "23", "technik"),
("790", "1272320406", "Úspěšné přihlášení", "", "23", "technik"),
("791", "1272544899", "Úspěšné přihlášení", "", "23", "technik"),
("792", "1272547773", "Úspěšné přihlášení", "", "1", "kovar"),
("793", "1272548769", "Smazal plán auditu provozovny Moje provozovna", "", "1", "kovar"),
("794", "1272548773", "Smazal plán auditu provozovny Moje provozovna", "", "1", "kovar"),
("795", "1272548777", "Smazal plán auditu provozovny Moje provozovna", "", "1", "kovar"),
("796", "1272548781", "Smazal plán auditu provozovny Moje provozovna", "", "1", "kovar"),
("797", "1272548817", "Smazal plán auditu provozovny Moje provozovna", "", "1", "kovar"),
("798", "1272548922", "Smazal plán auditu provozovny Moje provozovna", "", "1", "kovar"),
("799", "1272615323", "Úspěšné přihlášení", "", "1", "kovar"),
("800", "1272718573", "Úspěšné přihlášení", "", "1", "kovar"),
("801", "1272806211", "Úspěšné přihlášení", "", "1", "kovar"),
("802", "1272810284", "Úspěšné přihlášení", "", "1", "kovar"),
("803", "1272812376", "Úspěšné přihlášení", "", "1", "kovar"),
("804", "1272832592", "Úspěšné přihlášení", "", "1", "kovar"),
("805", "1272883884", "Úspěšné přihlášení", "", "1", "kovar"),
("806", "1272884229", "Vytvořil nový audit provozovně Moje provozovna", "", "1", "kovar"),
("807", "1272884239", "Úspěšné přihlášení", "", "23", "technik"),
("808", "1272884254", "Přijal audit provozovny Moje provozovna", "", "23", "technik"),
("809", "1272884259", "Úspěšné přihlášení", "", "1", "kovar"),
("810", "1272885638", "Úspěšné přihlášení", "", "1", "kovar"),
("811", "1272923704", "Úspěšné přihlášení", "", "1", "kovar"),
("812", "1272925386", "Úspěšné přihlášení", "", "1", "kovar"),
("813", "1272926040", "Úspěšné přihlášení", "", "1", "kovar"),
("814", "1272926054", "Úspěšné přihlášení", "", "1", "kovar"),
("815", "1273362854", "Úspěšné přihlášení", "", "1", "kovar"),
("816", "1273394334", "Úspěšné přihlášení", "", "1", "kovar"),
("817", "1273396343", "Úspěšné přihlášení", "", "1", "kovar"),
("818", "1273482583", "Úspěšné přihlášení", "", "1", "kovar"),
("819", "1273484754", "Úspěšné přihlášení", "", "23", "technik"),
("820", "1273484781", "Úspěšné přihlášení", "", "27", "usradmin"),
("821", "1273485014", "Úspěšné přihlášení", "", "23", "technik"),
("822", "1273485059", "Úspěšné přihlášení", "", "27", "usradmin"),
("823", "1273615396", "Úspěšné přihlášení", "", "1", "kovar"),
("824", "1273615537", "Úspěšné přihlášení", "", "27", "usradmin"),
("825", "1273615695", "Úspěšné přihlášení", "", "27", "usradmin"),
("826", "1273615698", "Úspěšné přihlášení", "", "27", "usradmin"),
("827", "1273615782", "Úspěšné přihlášení", "", "27", "usradmin"),
("828", "1273615789", "Úspěšné přihlášení", "", "27", "usradmin"),
("829", "1273615978", "Úspěšné přihlášení", "", "1", "kovar"),
("830", "1273616253", "Úspěšné přihlášení", "", "27", "usradmin"),
("831", "1273667425", "Úspěšné přihlášení", "", "1", "kovar"),
("832", "1273667445", "Úspěšné přihlášení", "", "27", "usradmin"),
("833", "1273667566", "Úspěšné přihlášení", "", "1", "kovar"),
("834", "1273668484", "Úspěšné přihlášení", "", "1", "kovar"),
("835", "1273668570", "Úspěšné přihlášení", "", "1", "kovar"),
("836", "1273669001", "Úspěšné přihlášení", "", "1", "kovar"),
("837", "1273769019", "Úspěšné přihlášení", "", "1", "kovar"),
("838", "1273924529", "Úspěšné přihlášení", "", "1", "kovar"),
("839", "1273926669", "Vytvořil zálohu systému", "", "1", "kovar"),
("840", "1273926669", "Vytvořil zálohu systému", "", "0", "kovar"),
("841", "1273926700", "Vytvořil zálohu systému", "", "1", "kovar"),
("842", "1273926700", "Vytvořil zálohu systému", "", "0", "kovar"),
("843", "1273926735", "Úspěšné přihlášení", "", "23", "technik"),
("844", "1273926903", "Úspěšné přihlášení", "", "1", "kovar"),
("845", "1273927130", "Úspěšné přihlášení", "", "27", "usradmin"),
("846", "1273932065", "Úspěšné přihlášení", "", "1", "kovar"),
("847", "1273933103", "Úspěšné přihlášení", "", "23", "technik"),
("848", "1273933124", "Úspěšné přihlášení", "", "1", "kovar"),
("849", "1273935711", "Úspěšné přihlášení", "", "1", "kovar"),
("850", "1273935738", "Úspěšné přihlášení", "", "27", "usradmin"),
("851", "1273935764", "Úspěšné přihlášení", "", "1", "kovar"),
("852", "1273945268", "Úspěšné přihlášení", "", "1", "kovar"),
("853", "1273960981", "Úspěšné přihlášení", "", "1", "kovar"),
("854", "1273961283", "Úspěšné přihlášení", "", "1", "kovar"),
("855", "1273961727", "Úspěšné přihlášení", "", "27", "usradmin"),
("856", "1273961745", "Úspěšné přihlášení", "", "23", "technik"),
("857", "1273961771", "Úspěšné přihlášení", "", "1", "kovar"),
("858", "1273961801", "Úspěšné přihlášení", "", "1", "kovar"),
("859", "1274019987", "Úspěšné přihlášení", "", "1", "kovar"),
("860", "1274020188", "Úspěšné přihlášení", "", "27", "usradmin"),
("861", "1274020205", "Úspěšné přihlášení", "", "23", "technik"),
("862", "1274020226", "Úspěšné přihlášení", "", "1", "kovar"),
("863", "1274540014", "Úspěšné přihlášení", "", "1", "kovar"),
("864", "1274540473", "Úspěšné přihlášení", "", "23", "technik"),
("865", "1274540486", "Úspěšné přihlášení", "", "24", "koordinator"),
("866", "1274540547", "Úspěšné přihlášení", "", "1", "kovar"),
("867", "1274540554", "Úspěšné přihlášení", "", "24", "koordinator"),
("868", "1274540564", "Úspěšné přihlášení", "", "1", "kovar"),
("869", "1274540826", "Úspěšné přihlášení", "", "27", "usradmin"),
("870", "1274541124", "Úspěšné přihlášení", "", "1", "kovar"),
("871", "1274541137", "Úspěšné přihlášení", "", "1", "kovar"),
("872", "1275653788", "Úspěšné přihlášení", "", "1", "kovar"),
("873", "1275656968", "Úspěšné přihlášení", "", "1", "kovar"),
("874", "1275661540", "Úspěšné přihlášení", "", "1", "kovar"),
("875", "1275662626", "Vytvořil nový audit provozovně Moje provozovna", "", "1", "kovar"),
("876", "1275662633", "Úspěšné přihlášení", "", "23", "technik"),
("877", "1275662647", "Přijal audit provozovny Moje provozovna", "", "23", "technik"),
("878", "1275664480", "Úspěšné přihlášení", "", "1", "kovar"),
("879", "1275739365", "Úspěšné přihlášení", "", "1", "kovar"),
("880", "1275742485", "Úspěšné přihlášení", "", "1", "kovar"),
("881", "1275742546", "Úspěšné přihlášení", "", "1", "kovar"),
("882", "1275742668", "Úspěšné přihlášení", "", "1", "kovar"),
("883", "1275742693", "Úspěšné přihlášení", "", "1", "kovar"),
("884", "1275742737", "Úspěšné přihlášení", "", "1", "kovar"),
("885", "1275742787", "Úspěšné přihlášení", "", "1", "kovar"),
("886", "1275742824", "Úspěšné přihlášení", "", "1", "kovar"),
("887", "1275742853", "Úspěšné přihlášení", "", "1", "kovar"),
("888", "1275742946", "Úspěšné přihlášení", "", "1", "kovar"),
("889", "1275742997", "Úspěšné přihlášení", "", "1", "kovar"),
("890", "1275743021", "Úspěšné přihlášení", "", "1", "kovar"),
("891", "1275743039", "Úspěšné přihlášení", "", "1", "kovar"),
("892", "1275744452", "Úspěšné přihlášení", "", "1", "kovar"),
("893", "1275745063", "Úspěšné přihlášení", "", "1", "kovar"),
("894", "1275745389", "Úspěšné přihlášení", "", "1", "kovar"),
("895", "1275745430", "Úspěšné přihlášení", "", "1", "kovar"),
("896", "1275745480", "Úspěšné přihlášení", "", "1", "kovar"),
("897", "1275745505", "Úspěšné přihlášení", "", "1", "kovar"),
("898", "1275745508", "Úspěšné přihlášení", "", "1", "kovar"),
("899", "1275750358", "Úspěšné přihlášení", "", "1", "kovar"),
("900", "1275750495", "Úspěšné přihlášení", "", "1", "kovar"),
("901", "1276003072", "Úspěšné přihlášení", "", "1", "kovar"),
("902", "1276006916", "Úspěšné přihlášení", "", "27", "usradmin"),
("903", "1276006979", "Úspěšné přihlášení", "", "1", "kovar"),
("904", "1276007583", "Úspěšné přihlášení", "", "1", "kovar"),
("905", "1276007726", "Úspěšné přihlášení", "", "27", "usradmin"),
("906", "1276008038", "Úspěšné přihlášení", "", "1", "kovar"),
("907", "1276008643", "Úspěšné přihlášení", "", "1", "kovar"),
("908", "1276103722", "Úspěšné přihlášení", "", "1", "kovar"),
("909", "1276268808", "Úspěšné přihlášení", "", "1", "kovar"),
("910", "1276501936", "Úspěšné přihlášení", "", "1", "kovar"),
("911", "1276503821", "Úspěšné přihlášení", "", "23", "technik"),
("912", "1276503830", "Úspěšné přihlášení", "", "27", "usradmin"),
("913", "1276506532", "Úspěšné přihlášení", "", "1", "kovar"),
("914", "1276506606", "Úspěšné přihlášení", "", "27", "usradmin"),
("915", "1276506620", "Úspěšné přihlášení", "", "1", "kovar"),
("916", "1276506693", "Úspěšné přihlášení", "", "27", "usradmin"),
("917", "1276506769", "Úspěšné přihlášení", "", "1", "kovar"),
("918", "1276506954", "Úspěšné přihlášení", "", "1", "kovar"),
("919", "1276506959", "Úspěšné přihlášení", "", "27", "usradmin"),
("920", "1276507162", "Úspěšné přihlášení", "", "1", "kovar"),
("921", "1276508444", "Úspěšné přihlášení", "", "27", "usradmin"),
("922", "1276508480", "Úspěšné přihlášení", "", "1", "kovar"),
("923", "1276508513", "Úspěšné přihlášení", "", "1", "kovar"),
("924", "1276508528", "Úspěšné přihlášení", "", "1", "kovar"),
("925", "1276509288", "Úspěšné přihlášení", "", "1", "kovar"),
("926", "1276510735", "Úspěšné přihlášení", "", "1", "kovar"),
("927", "1276510782", "Úspěšné přihlášení", "", "27", "usradmin"),
("928", "1276512125", "Úspěšné přihlášení", "", "23", "technik"),
("929", "1276512977", "Úspěšné přihlášení", "", "1", "kovar"),
("930", "1276622664", "Úspěšné přihlášení", "", "1", "kovar"),
("931", "1276622765", "Úspěšné přihlášení", "", "1", "kovar"),
("932", "1276623023", "Úspěšné přihlášení", "", "1", "kovar"),
("933", "1276623042", "Úspěšné přihlášení", "", "27", "usradmin"),
("934", "1276623166", "Úspěšné přihlášení", "", "1", "kovar"),
("935", "1276623425", "Úspěšné přihlášení", "", "27", "usradmin"),
("936", "1276623495", "Úspěšné přihlášení", "", "1", "kovar"),
("937", "1276623499", "Úspěšné přihlášení", "", "1", "kovar"),
("938", "1276625696", "Úspěšné přihlášení", "", "31", "usrnormal"),
("939", "1276625707", "Úspěšné přihlášení", "", "27", "usradmin"),
("940", "1276625759", "Úspěšné přihlášení", "", "1", "kovar"),
("941", "1276625786", "Úspěšné přihlášení", "", "27", "usradmin"),
("942", "1276626529", "Upravil audit provozovně Moje provozovna", "", "27", "usradmin"),
("943", "1276626538", "Úspěšné přihlášení", "", "31", "usrnormal"),
("944", "1276626946", "Úspěšné přihlášení", "", "1", "kovar"),
("945", "1276716967", "Úspěšné přihlášení", "", "1", "kovar"),
("946", "1276717369", "Úspěšné přihlášení", "", "23", "technik"),
("947", "1276717438", "Úspěšné přihlášení", "", "27", "usradmin"),
("948", "1276717495", "Úspěšné přihlášení", "", "1", "kovar"),
("949", "1276718108", "Úspěšné přihlášení", "", "27", "usradmin"),
("950", "1276718131", "Úspěšné přihlášení", "", "27", "usradmin"),
("951", "1276718239", "Úspěšné přihlášení", "", "27", "usradmin"),
("952", "1276718243", "Úspěšné přihlášení", "", "23", "technik"),
("953", "1276718281", "Úspěšné přihlášení", "", "27", "usradmin"),
("954", "1276718395", "Úspěšné přihlášení", "", "23", "technik"),
("955", "1276718457", "Úspěšné přihlášení", "", "23", "technik"),
("956", "1276718470", "Úspěšné přihlášení", "", "23", "technik"),
("957", "1276718485", "Úspěšné přihlášení", "", "23", "technik"),
("958", "1276718501", "Úspěšné přihlášení", "", "23", "technik"),
("959", "1276718517", "Úspěšné přihlášení", "", "23", "technik"),
("960", "1276718567", "Úspěšné přihlášení", "", "24", "koordinator"),
("961", "1276718616", "Úspěšné přihlášení", "", "24", "koordinator"),
("962", "1276718630", "Úspěšné přihlášení", "", "1", "kovar"),
("963", "1276718643", "Úspěšné přihlášení", "", "1", "kovar"),
("964", "1276718664", "Úspěšné přihlášení", "", "1", "kovar"),
("965", "1276718686", "Úspěšné přihlášení", "", "27", "usradmin"),
("966", "1276718753", "Úspěšné přihlášení", "", "27", "usradmin"),
("967", "1276718761", "Úspěšné přihlášení", "", "27", "usradmin"),
("968", "1276718770", "Úspěšné přihlášení", "", "27", "usradmin"),
("969", "1276718792", "Úspěšné přihlášení", "", "31", "usrnormal"),
("970", "1276718803", "Úspěšné přihlášení", "", "31", "usrnormal"),
("971", "1276718808", "Úspěšné přihlášení", "", "1", "kovar"),
("972", "1276761867", "Úspěšné přihlášení", "", "27", "usradmin"),
("973", "1276761877", "Úspěšné přihlášení", "", "31", "usrnormal"),
("974", "1276762638", "Úspěšné přihlášení", "", "1", "kovar"),
("975", "1276763013", "Úspěšné přihlášení", "", "27", "usradmin"),
("976", "1276776989", "Úspěšné přihlášení", "", "1", "kovar"),
("977", "1276777289", "Úspěšné přihlášení", "", "27", "usradmin"),
("978", "1276777354", "Úspěšné přihlášení", "", "1", "kovar"),
("979", "1276782936", "Úspěšné přihlášení", "", "1", "kovar"),
("980", "1276784285", "Vytvořil zálohu systému", "", "1", "kovar"),
("981", "1276784285", "Vytvořil zálohu systému", "", "0", "kovar"),
("982", "1276784756", "Uživatel změnil své nastavení", "", "1", "kovar"),
("983", "1276784761", "Uživatel změnil své nastavení", "", "1", "kovar"),
("984", "1276797853", "Úspěšné přihlášení", "", "1", "kovar"),
("985", "1276860698", "Úspěšné přihlášení", "", "1", "kovar"),
("986", "1276880743", "Úspěšné přihlášení", "", "1", "kovar"),
("987", "1276881855", "Vytvořil opravný audit provozovně Moje provozovna k auditu #ID38", "", "1", "kovar"),
("988", "1276881903", "Vytvořil opravný audit provozovně Moje provozovna k auditu #ID38", "", "1", "kovar"),
("989", "1276882446", "Vytvořil opravný audit provozovně Moje provozovna k auditu #ID38", "", "1", "kovar"),
("990", "1276882665", "Vytvořil opravný audit provozovně Moje provozovna k auditu #ID38", "", "1", "kovar"),
("991", "1276882892", "Vytvořil zálohu systému", "", "1", "kovar"),
("992", "1276882892", "Vytvořil zálohu systému", "", "0", "kovar"),
("993", "1276883842", "Úspěšné přihlášení", "", "1", "kovar"),
("994", "1276884812", "Vytvořil opravný audit provozovně Moje provozovna k auditu #ID38", "", "1", "kovar"),
("995", "1276884928", "Vytvořil opravný audit provozovně Moje provozovna k auditu #ID38", "", "1", "kovar"),
("996", "1276885100", "Vytvořil opravný audit provozovně Moje provozovna k auditu #ID38", "", "1", "kovar"),
("997", "1276885143", "Vytvořil opravný audit provozovně Moje provozovna k auditu #ID38", "", "1", "kovar"),
("998", "1276885204", "Vytvořil opravný audit provozovně Moje provozovna k auditu #ID38", "", "1", "kovar"),
("999", "1276885220", "Vytvořil opravný audit provozovně Moje provozovna k auditu #ID38", "", "1", "kovar"),
("1000", "1276885339", "Vytvořil opravný audit provozovně Moje provozovna k auditu #ID38", "", "1", "kovar"),
("1001", "1276885381", "Vytvořil opravný audit provozovně Moje provozovna k auditu #ID38", "", "1", "kovar"),
("1002", "1276885627", "Vytvořil zálohu systému", "", "1", "kovar"),
("1003", "1276885627", "Vytvořil zálohu systému", "", "0", "kovar");
-- Konec dat tabulky


-- Tabulka: 'prevent_nastenka'
-- Počet řádků tabulky: 7
-- Začátek dat tabulky
INSERT INTO `prevent_nastenka` VALUES 
("1", "1", "5", "Text záznamuasgeag", "1256744558"),
("2", "1", "4", "Text záznamusadged", "1256744561"),
("3", "1", "0", "Text záznamusdgedweg", "1256744565"),
("4", "1", "4", "Text dfzuherj", "1268425079"),
("5", "1", "4", "Text dfzuherj", "1268425085"),
("6", "1", "0", "Text záznamusgnk", "1276622774"),
("7", "1", "0", "Text záznamusgnk", "1276622780");
-- Konec dat tabulky


-- Tabulka: 'prevent_nastenka_shlednuto'
-- Počet řádků tabulky: 31
-- Začátek dat tabulky
INSERT INTO `prevent_nastenka_shlednuto` VALUES 
("1", "1", "0", "7"),
("2", "1", "1", "81"),
("3", "41", "0", ""),
("4", "42", "0", ""),
("5", "23", "0", "3"),
("6", "23", "1", "80"),
("7", "41", "1", "81"),
("8", "42", "1", ""),
("9", "1", "2", ""),
("10", "1", "3", ""),
("11", "23", "3", ""),
("12", "43", "0", ""),
("13", "43", "3", ""),
("14", "44", "0", ""),
("15", "44", "3", ""),
("16", "1", "4", "5"),
("17", "27", "0", ""),
("34", "31", "4", ""),
("19", "27", "4", ""),
("33", "31", "0", ""),
("21", "23", "4", ""),
("23", "1", "5", "1"),
("24", "1", "6", ""),
("25", "26", "0", ""),
("26", "26", "4", ""),
("27", "24", "0", ""),
("28", "24", "5", ""),
("29", "24", "4", ""),
("30", "24", "6", ""),
("31", "30", "0", ""),
("32", "23", "6", "");
-- Konec dat tabulky


-- Tabulka: 'prevent_novinky'
-- Počet řádků tabulky: 2
-- Začátek dat tabulky
INSERT INTO `prevent_novinky` VALUES 
("5", "1260187122", "nadpisas", "textasf"),
("4", "1260187109", "První?", "tak tedy novinka :)");
-- Konec dat tabulky


-- Tabulka: 'prevent_posta'
-- Počet řádků tabulky: 0
-- Začátek dat tabulky
INSERT INTO `prevent_posta` VALUES 
-- Konec dat tabulky


-- Tabulka: 'prevent_quicklink'
-- Počet řádků tabulky: 1
-- Začátek dat tabulky
INSERT INTO `prevent_quicklink` VALUES 
("21", "1", "poslední audit", "http://localhost/guardian/provest_audit.php?id=vybrat_oblast&id_audit=37", "1");
-- Konec dat tabulky


-- Tabulka: 'prevent_system'
-- Počet řádků tabulky: 155
-- Začátek dat tabulky
INSERT INTO `prevent_system` VALUES 
("8", "1244078504", "0.1", "0", "Tohle je verze 0.1.

Umí správu úkolů, správu uživatelů, logovat a komunikaci uživatelů."),
("9", "1244159227", "0.2", "0", "dneska jsem přidal stránku:
**nastavení** uživatel tam:
*zandá svůj mail
*nastavi si stránkování
*změní heslo
*nastaví si mailování udalostí - to eště pořešim jak přesně

**udržba**
*třeba pořešit co budu mazat a jak hromadně
"),
("10", "1244167746", "0.21", "0", "nyní funguje změna hesla, mailu a stránkování"),
("13", "1244203750", "0.22", "0", "funguje čištění tabulek: prevent_log a prevent_ukoly"),
("14", "1244204747", "0.225", "0", "otunil jsem pridavani verzi systemu :)"),
("15", "1244290792", "0.226", "0", "systém nyní vypisuje zadavatele úkolu"),
("16", "1244418020", "0.23", "0", "funguje pošta mezi uživateli!"),
("17", "1244418440", "0.231", "0", "funguje čištění tabulky: prevent_posta"),
("18", "1244589158", "0.24", "0", "předělány výpisu úkolů - možno nyní užít order_by"),
("19", "1244590903", "0.25", "0", "nyní může každý uživatel zadat jinému uživateli úkol...

!!!musím pořešit!!!
***form na určení deadline 
***omezit zadavání úkolu podle hierarchie uživatele..."),
("20", "1244735491", "0.251", "0", "form na deadline vyřešen!"),
("21", "1244735510", "0.252", "0", "hierarchie pořešena"),
("22", "1244736166", "0.26", "0", "oprava chybky ve vypisech ukolu - uz funguje order_by"),
("23", "1244738049", "-0.26", "0", "ty voe osetri ruzny pristupy ke tránkam pres login a prava_usr"),
("24", "1244797341", "0.27", "0", "ošetřena práva kompletně...ostrá verze, petře kontroluj:)"),
("25", "1244797373", "0.3", "0", "Když u ostrá verze tak tedy rovnou verze 0.3! :)"),
("26", "1245190777", "0.301", "5", "do parametrů systému přidán záznam o době vytváření další verze."),
("27", "1245196653", "0.31", "35", "připravil jsem si stránku záloha...nyní musim udělat funkci pro vytvoření souboru se zálohou, funkci pro použití zálohy z adresáře systému a funkci pro užití zálohy rovnou z localdisku"),
("28", "1245697626", "0.32", "200", "Prevent právě zvládá zálohování dat z tabulky.
Uživatel vybere tabulku jenž chce zálohovat a prevent vyexportuje data do složky \"./root/zálohy/\" do souboru pojmenovaného podle aktuálního času. Soubor je možné stáhnout i přes administraci. Můžeme zálohu i smazat (občas bude potřeba kvůli velikosti záloh - zavedu to do údržby). Obnovu nelze realizovat pomocí systému bezpečně a efektivně, proto bude obnovu moct provést pouze hlavní admin přímo v administraci MySQL."),
("29", "1245700229", "0.33", "30", "prevent nyní umožňuje v nástroji ÚDRŽBA vymazat zálohy databáze. (konkrétně umožní smaže ty které jsou v systému déle než týden a zároveň mají jednu novější která se mazat nebude)"),
("30", "1245701259", "0.331", "5", "lehká úprava kódu:

funkce show_hide/hide_show přesunuta do soubory ./style/style_sablony.php

to proto aby nebyla duplikována po více spouborech zbytečně."),
("31", "1245709020", "0.34", "100", "Systém umí nyní funkci WATCHDOG.

WATCHDOG pošle email uživateli přijde nová pošta nebo dostane nový úkol.

Upozorňování zprovozníte na stránce nastavení."),
("32", "1245753205", "0.341", "15", "oprava mailování - blbne kódování, eště je třeba ošetřit chyby v subjectu!

oprava zadávání úloh - prohozen měsíc s dnem v deadlinu - dělalo to chyby..."),
("33", "1245801190", "0.3411", "5", "Nyní se jmenuji SYSTÉM GUARDIAN:)"),
("34", "1245834409", "0.35", "30", "Guardian umí automaticky odhlásit uživatele po 15 minutách neaktivity. 5 minut před koncem limitu uživatele upozorní. Do budoucna u operací jenž trvají dlouho dobu (přidání auditu...) zavedu operaci \"průběžně uložit\" uživatel po 15 minutach nepřišel o vkládaný form, prostě ho průběžně uloží čimž obnoví timeout."),
("35", "1246231638", "0.36", "60", "definovan uzivatel koordinator..nyni k němu du začít přidělovat práva."),
("36", "1246359365", "-0.37", "60", "úprava vnitřku kódu - formuláře zahrnuty do šablon (opakují se často příkazy select_users)...

změna notace if(): endif; na if() {}

uprava stranky sablon menu"),
("37", "1246371202", "-0.38", "60", "rebuild systemu stránke...nyní zavedena slozka ./header která obsahuje hlavicky stránkek, vcetne vsechny includu, stavu stranky a scriptu..."),
("38", "1246371922", "0.39", "10", "systém zná uživatele typu technik"),
("39", "1246751409", "0.391", "15", "systém nynéí obsahuje možnost vypisovat novinky do neautorizované sekce"),
("40", "1248135296", "0.4", "240", "Po dlouhý nečinnosti. Koordinátor a administrátor mají přístup k seznamu firem. Můžou je vytvářet, mazat, upravovat a to samé s provozovnama firmem.

Navíc dodělány zálohy dalších tabulek.

V další fázy jdu na další tabulky závoslé na firmách - dokumentaceš, projednáho, lhůtníky...."),
("41", "1248196683", "0.45", "150", "Update firem. 
Nyní se při přidáni firmy do seznamu firem vytvoří i plnohodnotný uživatel s právama firmy (spravu je se přímo v administraci firmy - nezasahuje do uživatelů z guardianu)..v budoucnu ho bude spravovat pouze koordinator, kteremu bude přidělen (resp. který danouo firmu vytvořil)...
v BUDOUCNU: po přihlášení firma bude moct požádat o upravu udaju o sobě, vyzvedávat formuláře atd atd..."),
("42", "1248198368", "0.451", "20", "rozsáhlejší integrace funkcionality \"novinky\" do systému. Každému uživateli se vypisuje na uvítací stránce, dopočítává se kolik jich uživatel neshlédl (u nepřihlášeného uživatele je počet neshlédlých aktualit roven jejich počtu). Odkazují na ně všechny nosné menu - cílem je možnost administrátorů efektivně sdělovat informace uživatelům systému."),
("43", "1248217707", "0.452", "10", "Firemné zákazník má nyní možnost stejně jako ostatní uživatelé měnit své nastavení - email pro watchdog, watchdog a heslo. Funkce watchdoga pro firemní zákazníky bude specifikována později"),
("44", "1249995648", "0.453", "10", "U uživatelů - jak ve sprácě tak firemních se zebrazuje ny\\\\ní zda jsou online a popřípadě jejich poslední klik."),
("45", "1249995678", "0.454", "5", "Pokud není uživatel autorizován a snaží se přihlásit, je přesměrován na stránku autorizace."),
("46", "1249995693", "0.455", "20", "Koordinátor nyní může přidělit firmě technika, ten bude mít v budoucnu přístup k datům firmy...."),
("47", "1249995717", "-0.456", "15", "Opravy v administraci firmy... - drobné chybi, chyba logování, upravy provozovny..."),
("48", "1249995759", "0.46", "30", "oprava administrace uživatelů - nyní u firemní, tpo samé s logovánim."),
("49", "1249995839", "0.47", "30", "firemní zákazník má nyní přístup k poště - může odesílat poštu svým technikům a koordinátorům. Technik může odesílat poštu svým firmám a koordinátorům a technikům."),
("50", "1249995950", "0.471", "15", "hromadná pošta - admin a koordinátor může odesílat poštu hromadně a to skupinám: ADMINI, KOORDINATORI, TECHNICI, FIRMY, VŠICHNI. Možno vytvořit další skupiny dle potřeb uživatelů."),
("51", "1249998055", "0.472", "20", "změna systému watchdogu - zápis do tabulek.

změna nastavování firemního uživatele - je postave na stejnou úroveň jako zaměstnanec guardianu."),
("52", "1249998887", "0.473", "10", "Opraveny problémy s watchdogem pošty a firmy - v souvislosti s předchozí verzí systému."),
("53", "1249999261", "0.474", "5", "přidány tabulky do funkcionality: ZÁLOHY"),
("54", "1250002585", "0.475", "10", "info o firmách: po změně uživatelských účtu vypisuje se na této stránce log firmy a ne jejích užiivatelů"),
("55", "1250036986", "0.48", "80", "Kompletní rebuilt funkcionality NÁSŤENKA, nyní existuje v systému několik nástěnek.

:Obecná - přístup mají admini, technici a koordinátoři

:Nástěnky jendotlivých firem - do těch mají přístup admini, koordinátoři, uživatelé z dané firmy a technici kterým je firma přidělena. Takto nová nástěnka je ideální k předávání informací."),
("56", "1250159776", "0.481", "10", "Ve správě uživatelů lze nyní hledat firemní uživatele - z praktických důvodů - bude jich mnoho."),
("57", "1250202118", "číslo 0.482", "10", "admini mají nyní možnost mazat firemní uživatele."),
("58", "1250203914", "0.843", "15", "Koordinátoři nyní můžou firmám přidělovat nové firemní uživatele."),
("59", "1251466825", "0.844", "20", "kontrola integrity odesílání počty mezi techniky, firemními zákazníky..."),
("60", "1251468630", "0.845", "20", "Při vytvoření firemního uživatele můžeme nastavit práva tohoto uživatele. Buď admin firmy a nebo příslušnost k vybraným provozovnám."),
("61", "1251730447", "0.846", "15", "technik se nyní již může podivat na detaily firem co zpravuje."),
("62", "1251994730", "0.847", "10", "Nyní je možno upravit práva firemních uživatelů ve vztahu ke své firmě."),
("63", "1252152464", "0.848", "15", "firemní uživatel může zjistit informace o svývé formě a sobě přidělených provozovnách..."),
("64", "1252160240", "0.849", "15", "firemní admin může vidět logy ostatních uživatelů své firmy i logy firmy."),
("65", "1252160284", "0.8410", "10", "firemní uživatel může nyní jako admin zjistit seznam uživatelů své firmy."),
("66", "1252161578", "0.8411", "10", "admin firmy může od/za blokovat firemního uživatele"),
("67", "1252163083", "0.85", "15", "Zásadní změna: systém nyní při logování uchovává i údaj původce logu. Například: Dopud pokud byl zablokován účet fir. uživatele. Zobrazil se tento údaj v logu daného uživatele a v logu firmy. Nyní je uchovávan i údaj o původci akce (může to být, admin, koordinator, admin firmy, systém....)"),
("68", "1252164403", "0.851", "10", "firemní admin může smazat uživatele."),
("69", "1252332856", "0.852", "15", "firemní admin může upravit uživatele."),
("70", "1252333832", "0.853", "10", "koordinator a admin můžou odesílat hromadnou poštu uživatelům jedné firmy."),
("71", "1252404732", "0.854", "15", "Přidána funkcionalita zpísiník."),
("72", "1252417891", "0.855", "10", "Dodělána základní sada stránek pro firemní uživatele."),
("73", "1252425214", "0.856", "15", "funkcionalita QUICKLINK - zpříjemnění rozhraní a rychlost práce..."),
("74", "1252971492", "0.86", "120", "Rebuilt systému výpisu firem a provozoven...stránky ./funkce/global_firmy.php"),
("75", "1252971540", "0.861", "300", "Komplet předělání firem a provozoven (podle analýzy).
Vytvoření entity OSOBA.
Při založení firmy a provozovny vznikají osoby."),
("76", "1253015414", "0.862", "60", "Problémy s provozovnama...vážně mravenčí práce u nástroje na úpravu provozoven a firem..."),
("77", "1253015448", "číslo 0.863", "10", "přidány tabulky, do záloh a v rámci toho odhalena závažná chyba v nástroji na vytváření záloh..."),
("78", "1255095731", "0.864", "240", "Kompletní funkcionalita OSOBA!"),
("79", "1255265632", "0.865", "60", "Tak uplne kompletni ta funkcionalita nebyla :)"),
("80", "1256208114", "0.865", "120", "funkcionalita BUDOVA zařazena..proběhne testování verzí pro různé uživatele..."),
("81", "1256215827", "0.8651", "60", "budovy zcela funkčni, ošetřeny relace firemnicfh uživatelu."),
("82", "1256743747", "0.87", "120", "přidány pracoviště včetně relace na provozovny...ostatni relace nejsou - čekám na analýzu...."),
("83", "1256744485", "0.87.001", "10", "aktualizace funkcionality zaloha a udržba"),
("84", "1259427931", "0.87.1", "300", "kompletni funkcionalita relaci mezi objektama"),
("85", "1259427958", "0.87.2", "120", "uprava objektu - odkazuji se momentalne na provozovny hypertextove, stejne tak v relacich"),
("86", "1259427985", "0.87.3", "120", "uprava osob, nyni se odkazujou primo na firmy a provozovny"),
("87", "1259490301", "0.87.4", "80", "uprava entit, nyni se filtrují podle firem a provozoven"),
("88", "1259491326", "0.87.41", "15", "integrace filtrovani entit do detailu provozoven"),
("89", "1259496088", "0.87.42", "30", "nalezeni chyby v prihlasovani uzivatelu, jeji oprava a pridani stranky odblokovat uzivatele - blokovaný uživatel podá žádost adminovi pomocí formuláře."),
("90", "1259832329", "0.87.43", "30", "odstraneni chyby - osoby v provozovne mohli být duplicitní - stejné jméno ale dle systému jiná osoba...nyní toto odstraneno..(jeste je treba odstranit duplicitu mezi osobou firmy a provozovny)
"),
("91", "1259941714", "0.87.44", "100", "velka oprava osob...bylo to špatně :("),
("92", "1260136467", "0.88.01", "120", "do DB zavedeny AUDITY a jejich logy. Pro koordinatora a admina vytvoreny filtrovaci stranky pro zobrazeni auditu. Vypis logů auditu, mazani logu. Zavedeni auditu do funkcionality údržba a zálohy."),
("93", "1260187068", "0.88.02", "120", "V navaznosti na audity jsem přišel na potřebu vytvořeni funkcionality CRON. Tato funkcionalita budu ridit spousteni planovanych uloh v systemu...(konkretne pro audity: prepocitavani periody opakavani auditu, dale údržby, zálohy, odesilani upozorneni atd.)"),
("94", "1260313051", "0.88.03", "100", "****NOVE UČTOVANI****
Zprovozněn planovac auditu. Koordinator vytvori plan a ten ho ve spravny den upozorni na potrebu vytvorit audit a predat ho technikovy. Plany lze deaktivovat/aktivovat a mazat. Vse se loguje."),
("95", "1260318388", "0.88.04", "40", "akce u CRONu se loguji. Uprava logu."),
("96", "1260323356", "0.88.05", "100", "Zprovoznena cas spravy auditu, kde muzu koordinator vytvorit audit a pridelit mu technika a firemniho zakaznika. Technik je o tom spraven. Koordinator zde muze v kazdou chvili kontrolovat stav auditu. Muze jej i upravit"),
("97", "1260360416", "0.88.06", "90", "pridana cast spravy auditu urcena technikovy - vyhleda sve audity, muze je upravit a prijmout."),
("98", "1260405769", "0.88.07", "15", "oprava chyby v auditech - vybrat firmeniho usera pro audit de jen toho co nalezi provozovne nebo je admin"),
("99", "1260446702", "0.88.08", "60", "uprava prehledu auditu pro technika a koordinatora, nyni uz uplne slape, na indexu a v menu se zobrazuje aktualni pocet auditu nalezicich danemu koordinatorovy a technikovy. I ve filtrech jsou tyto hodnoty zavedeny."),
("100", "1260545182", "0.88.09", "30", "číslování počtu auditů nyní i ve filtrování auditů pro technika a koordinatora."),
("101", "1260551308", "0.88.10", "80", "nyni funkcionalita AUDIT funguje kompletne pro vsechny urovne uzivatelu.

PRINCIP fungovani:
(admin + koordinator):
- vidi kompletni seznam auditu (dokoncene, nededokoncene a jejich stav)
- vidi plany auditu (ten se stara o vytvareni novych auditu)
- vytvori plan auditu 
- smazou plan auditu
- vypnout/zapnou plan auditu
- vytvori audit (zadaji ho technikovi a firemnimu uzivateli)
- upravi audit (okomentuje, zmeni zadaneho technika a firm. uzivatele)
- vidi a maze logy auditu

(technik):
- vidi seznam svych auditu (dokoncene, nededokoncene a jejich stav)
- komentuje audit
- prijme audit (da koordinatorovi vedet ze ho zpracuje)

(firemni admin):
- vidi kompletni seznam auditu sve firmy (dokoncene, nededokoncene a jejich stav)
- vidi plany auditu
- upravi audit (okomentuje, zmeni zadaneho firm. uzivatele)
- vidi logy auditu

(firemni uzivatel):
- vidi seznam svych auditu (dokoncene, nededokoncene a jejich stav)
- komentuje audit"),
("102", "1260626209", "0.88.10.1", "15", "funkce která zjisti prava uzivatele na cteni detailu nejakeho auditu - priprava na stránku DETAILY AUDITU"),
("103", "1261332658", "0.88.10.2", "20", "přidani cleneni PO auditu"),
("104", "1265042006", "0.89.1", "150", "kopletni zavedeni auditu do DB (11 tabulek + data)

***tady zacina nove uctovani***"),
("105", "1265150349", "0.89.2", "300", "pokracovani v auditu,dalsi tabulky, kopletni stranka detailu auditu a priprava stranek s logikou."),
("106", "1265298648", "0.89.2.1", "15", "auprava zalohovani dat a udrzby"),
("107", "1265298682", "0.89.3", "30", "uprava detailu auditu, priprava na vytvoreni a vyplneni prvniho auditu."),
("108", "1265314965", "0.89.3.1", "20", "chyba v auditech - technik nevidel pocet auditu ve sverene firme. potom taky uprava detailu auditu podle moznosti jednotlivyhc urovni uzivatelu."),
("109", "1265379940", "0.89.4", "360", "velka uprava, ty chcklisty slapou, upravy dalsich nabalenejch chyb. Technik ma proste komplet nastroj na spravu chcklistu a je to pripraveny na pridani pracovist, generovani protokolu atd..."),
("110", "1266341442", "0.89.5.01", "15", "Vyřešen požadavek #10: Technik potvrdí koordinátorovi přijetí nebo odmítnutí úkolu – při odmítnutí musí okomentovat (zdůvodnit proč odmítl) "),
("111", "1266342158", "0.89.5.02", "10", "Vyřešen požadavek #11: Koordinátor dostane oznámení o přijetí úkolu – auditu, nebo oznámení o odmítnutí a zdůvodnění odmítnutí."),
("112", "1266356370", "0.89.5.03", "40", "Vyřešena připomínka #3: Koordinátor nemůže upravovat audit – měl by tuto možnost mít – se záznamem v histori.

navíc přidáno logování akcí pro technika (zapomněl jsem na to při psani checklistu)"),
("113", "1266359125", "0.89.5.04", "50", "Vyřešena připomínka #1>Check-list auditu 
a.doplnit formát - procenta – možnost výběru po 10 tj. od 10 do 90 nebo možnost zadat číslo od 1 do 99.
      ----vstup omezen na 2znaky,pokud technik zadá: 0,nic,text systém nastavi odpoved za nevyplnenou
b.u termínu odstranění závady povolit pouze zadávání datumu – ne textu nebo čísel ve tvaru jiném, nežli je datum – buď zobrazit kalendář, ze kterého vybere datum nebo zadá ve tvaru dd mm rrrr
      ----vyřešeno – formulář pro datum
c.možnost otevírat samostatná okna– poznámka, poznámka mimo protokol a navrhovaná opatření jako samostatná okna. Jsou příliš malá a při zápisu delšího záznamu je velmi pravděpodobný vznik chyby.
      ----Vyřešeno – pomocí skrytých divů, testovano v Firefoxu, Google Chrome a vypada to použitelně"),
("114", "1266364618", "0.89.5.05", "45", "Vyčešena připomínka #5: Doplnit možnost, aby u celé oblasti v check listu šlo uvést, že se to klientanetýká, ten se stane pasívní (hypertext) a technik se nebude zdržovat otevíráním oblasti buď se to ztratí nebo nebude aktivní

v rámci problému bylo potřeba vyřešit několik chyb v nastavování atributu okruhu otázek (nesprávné označování okruhu za zpracovaný)."),
("115", "1266365222", "0.89.5.06", "10", "Vyřešena připomínka #6: Radiobutony by neměly být předvolené tj. měla by být nastavená  nulová volba, nevybraný žádný radiobuton v okamžiku otevření nového auditu - hrozí nebezpečí omylu"),
("116", "1266366573", "0.89.5.07", "20", "1.Možnost zvolit název Audit BOZP nebo  Vyřešena připomínka #2: Možnost zvolit název Audit BOZP nebo  Roční prověrka BOZP a PO. Audit je název pro stejný úkon, který se již při druhém opakování ale nejmenuje audit, ale Roční prověrka BOZP a PO.
Vyřešeno – u normálního auditu to volí koordinátor - zvolí první plán. Ostatní už systém generuje jako Roční prověrka"),
("117", "1266572945", "0.89.5.08", "30", "Opraveno několik chyb: uzavření auditu provede změnu stavu kategorii checklistu, změnu data, logování."),
("118", "1266574027", "0.89.5.09", "10", "upravena shrnuti kategorii u okruhu checklistu."),
("119", "1266762208", "číslo 0.89.5.10", "20", "změna v DB stav auditu - pridany priznaky stavu checklistu a pracoviště a změna ve všech vypisech auditu."),
("120", "1266763859", "0.89.5.11", "20", "Checklist du uzavřít pouze tehny jsou li všechny okruhy otázek kompletně zpracovány nebo označeny jako \"netýkající se\""),
("121", "1267197022", "0.89.5.12", "15", "konečně správně opravené vzorce pro výpočet procent u auditů."),
("122", "1267199641", "0.89.5.13", "20", "Systém nyní zná typ azuditu: BOZP, PO, BOZP+PO....

členění na různé druhy PN budou vedeny pouze pro pracoviště."),
("123", "1268479955", "0.89.5.14", "60", "oprava DB, přidány vypisy fotogalerii k jednotlivym okruhum cecklistu.

Priprava aplikace na nahravani souboru do guardianu.

///**** NOVÉ VYÚČTOVÁNÍ ****////"),
("124", "1268641870", "0.89.5.15", "30", "už šlape nahrávání a mazání fotek k checklistům, včetně názvů, komentářů atd."),
("125", "1270384442", "0.89.5.16", "15", "opraveno bug u provozoven a pracovist..."),
("126", "1270849821", "0.890:5:17", "40", "velkej refactoring auditu...uz de spravne :)"),
("127", "1271088212", "0.89.5.18", "40", "v auditu se pridavaj pracoviste firem...vcetne vsech logu"),
("128", "1272548987", "0.89.5.19", "180", "je audit pracovist, kazde pracoviste ma svuj audit, ke kazdemu se da pridat fotografie a da se odmitnout z auditu pokud technik chce vse se loguje"),
("129", "1272615920", "0.89.5.20", "10", "hlavicka auditu ma odkaz na detaily a start provadeni auditu :)"),
("130", "1272616775", "0.89.5.21", "10", "uprava vytvareni polozek auditu provozovny"),
("131", "1272810901", "0.89.5.22", "60", "audit pracovist de uzavrit a zhodnotit...pak nejde editovat...nevraty proces..."),
("132", "1272835098", "0.89.5.23", "60", "ve všech informacich o auditech je videt jak je na tom stav protokolu."),
("133", "1272886424", "0.89.5.24", "60", "uprava zamykani checklistu a pracovišť"),
("134", "1272887502", "0.89.5.25", "15", "tedka jde volit druh auditu pracoviošť na každé pracoviště zvlášť... zatim ale nevim jaky v nich bude rozdil :)"),
("135", "1272888315", "0.89.5.26", "10", "menší úprava navigace v detailech auditu"),
("136", "1272926011", "0.89.5.27", "60", "priprava na protokoly - jejich databaze funguje."),
("137", "1273483204", "0.89.5.28", "60", "audit jde kompletně uzavřít ze strany technika."),
("138", "1273616042", "0.89.5.29", "20", "Lide z firmy maji report o tom, ze maji dokoncit audit..."),
("139", "1273670025", "0.89.5.30", "60", "v detailech auditu je zobrazen stav uzavreneho auditu pracovist"),
("140", "1273769607", "0.89.5.31", "80", "v detailech auditu jsou kompletni informace o auditech pracoviŠtě a jednotlivých protokolech."),
("141", "1273926243", "0.89.5.31", "20", "úprava detailů auditu."),
("142", "1273926977", "0.89.5.31", "10", "upraven zalohavoci system - priodany dalsi data

uprava prav technika - pri auditu muze menit detaily pracovist."),
("143", "1273932143", "0.89.5.32", "80", "firemní uživatel může audit který byl technikem dokončen prohlédnout a buď ho potvrdit nebo zamítnout. To se dozví prostřednictvím úkolů technik a koordinátor a budou na to moci reagovat."),
("144", "1273933058", "0.89.5.34", "10", "chyba v detekovani stavu auditu - pokud je zamitnut - opraveno."),
("145", "1273961880", "0.89.5.35", "20", "Technik a koordinator auditu jsou formou ukolu spraveni o tom, jak firemni uzivatel reagoval na provedeny audit."),
("146", "1274542064", "0.89.5.36", "40", "pripraveny stranky:
+strkna kde koordinator potvrdi vytbvoreni protokolu a pred je firme.

+strana kde koordinatpor muze zjistit proc firma zamitla audit

lehke predelani systemu stzavu auditu"),
("147", "1275740116", "0.89.5.37", "70", "u checklistu a pracovist se generuji neshody.

((tohle je uz do noveho vyuctovani)"),
("148", "1275746046", "0.89.5.38", "40", "přidány informaci o stavu neshod do celého systému auditů - všechny hlavičky auditů a detaily, stejně tak do detailů auditu"),
("149", "1275750600", "0.89.5.39", "30", "neshody lzue editovatjen když je uzavřen audit pracovišť a checklist - kvuli integrite dat."),
("150", "1276006726", "0.89.5.40", "80", "priprava DB neshod - uzavreni neshod, integrace do uzavreni protokolu, moznost komentovat neshody."),
("151", "1276007647", "0.89.5.41", "10", "v detailech auditu se nini vypisuji i zapisky mimo protokol"),
("152", "1276008632", "0.89.5.42", "10", "uprava dokončit audit - dodan nahled neshod"),
("153", "1276270114", "0.89.5.43", "20", "uprava detailu neshod, ted uz fin verze, vypada to pekne...dalsi na rade je samotna uprava neshod."),
("154", "1276506563", "0.89.5.44", "60", "kompletni uprava neshod a jjich uzavreni v ramci celeho auditu."),
("155", "1276507245", "0.89.5.45", "10", "uprava potvrzovani auditu firmou."),
("156", "1276509958", "0.89.5.46", "20", "upravena stranka dokoncit audit, staci iplementovat tisk."),
("157", "1276510706", "0.89.5.47", "10", "připravena stranka na přezkoumati auditu"),
("158", "1276513019", "0.89.5.49", "40", "Doladění a nahrání aktuální verze na server, provedení cvičného auditu, jeho potvrzeni."),
("159", "1276623976", "0.89.5.50", "20", "uprava detailu auditu - tiskne i poznámky, stejne tak dokoncit audit u koordinatora."),
("160", "1276627021", "0.89.5.51", "40", "připrava strqnky na stahovani dat o protokolu, uprava funkce na check prav k auditu, uprava detailu auditu."),
("161", "1276718843", "0.89.5.52", "60", "kompletni signalizace ohledně vytisklých auditů a všech stupňů jejich zpracování"),
("162", "1276762674", "0.89.5.53", "40", "vypis hotových auditů včetně napojeni na seznam dat auditu."),
("163", "1276784084", "0.89.5.54", "20", "realizace funkcionality stahovani protokolů, "),
("164", "1276786468", "0.89.6.1", "40", "příprava databáze na vytváření zamítnutýchauditů, změna relací, příprava stránky na generování zamítlých auditů");
-- Konec dat tabulky


-- Tabulka: 'prevent_ukoly'
-- Počet řádků tabulky: 18
-- Začátek dat tabulky
INSERT INTO `prevent_ukoly` VALUES 
("1", "1275662626", "23", "0", "Byl Vám přidělen audit", "Právě Vám byl koordinátorem přidělen audit, přijměte ho", "nova", "", "systém"),
("2", "1275662647", "1", "0", "Technik přijal audit", "Technik technik nepřijal vámi přidělený audit (#ID 38) provozovny Moje provozovna. Přezkoumejte prosím problém.", "splnen", "", "systém"),
("3", "1276507149", "23", "0", "Firemní zákazník potvrdil audit (#ID 38)", "Firemní zákazník usradmin potvrdil vámi provedený audit (#ID 38) provozovny Moje provozovna.", "nova", "", "systém"),
("4", "1276507149", "1", "0", "Firemní zákazník potvrdil audit (#ID 38)", "Firemní zákazník usradmin potvrdil vámi spravovaný audit (#ID 38) provozovny Moje provozovna. Přezkoumejte prosím problém.", "splnen", "", "systém"),
("5", "1276622808", "23", "1262300400", "vypnout pocitas", "", "nova", "", "kovar"),
("6", "1276623102", "23", "0", "Firemní zákazník potvrdil audit (#ID 38)", "Firemní zákazník usradmin potvrdil vámi provedený audit (#ID 38) provozovny Moje provozovna.", "nova", "", "systém"),
("7", "1276623102", "1", "0", "Firemní zákazník potvrdil audit (#ID 38)", "Firemní zákazník usradmin potvrdil vámi spravovaný audit (#ID 38) provozovny Moje provozovna. Přezkoumejte prosím problém.", "ceka_na_splneni", "", "systém"),
("8", "1276881903", "23", "0", "Byl Vám přidělen opravný audit k auditu #ID38", "Právě Vám byl koordinátorem kovar přidělen audit, přijměte ho", "nova", "", "systém"),
("9", "1276882446", "23", "0", "Byl Vám přidělen opravný audit k auditu #ID38", "Právě Vám byl koordinátorem kovar přidělen audit, přijměte ho", "nova", "", "systém"),
("10", "1276882665", "23", "0", "Byl Vám přidělen opravný audit k auditu #ID38", "Právě Vám byl koordinátorem kovar přidělen audit, přijměte ho", "nova", "", "systém"),
("11", "1276884812", "23", "0", "Byl Vám přidělen opravný audit k auditu #ID38", "Právě Vám byl koordinátorem kovar přidělen audit, přijměte ho", "nova", "", "systém"),
("12", "1276884928", "23", "0", "Byl Vám přidělen opravný audit k auditu #ID38", "Právě Vám byl koordinátorem kovar přidělen audit, přijměte ho", "nova", "", "systém"),
("13", "1276885100", "23", "0", "Byl Vám přidělen opravný audit k auditu #ID38", "Právě Vám byl koordinátorem kovar přidělen audit, přijměte ho", "nova", "", "systém"),
("14", "1276885144", "23", "0", "Byl Vám přidělen opravný audit k auditu #ID38", "Právě Vám byl koordinátorem kovar přidělen audit, přijměte ho", "nova", "", "systém"),
("15", "1276885205", "23", "0", "Byl Vám přidělen opravný audit k auditu #ID38", "Právě Vám byl koordinátorem kovar přidělen audit, přijměte ho", "nova", "", "systém"),
("16", "1276885220", "23", "0", "Byl Vám přidělen opravný audit k auditu #ID38", "Právě Vám byl koordinátorem kovar přidělen audit, přijměte ho", "nova", "", "systém"),
("17", "1276885339", "23", "0", "Byl Vám přidělen opravný audit k auditu #ID38", "Právě Vám byl koordinátorem kovar přidělen audit, přijměte ho", "nova", "", "systém"),
("18", "1276885381", "23", "0", "Byl Vám přidělen opravný audit k auditu #ID38", "Právě Vám byl koordinátorem kovar přidělen audit, přijměte ho", "nova", "", "systém");
-- Konec dat tabulky


-- Tabulka: 'prevent_uzivatele'
-- Počet řádků tabulky: 5
-- Začátek dat tabulky
INSERT INTO `prevent_uzivatele` VALUES 
("1", "", "kovar", "admin", "47bbefc14dcb260a9b0b520da8e65d3e", "sul", "aktivni", "xixaom@centrum.cz", "43", "5", "1276883842", "1276880743", "1276885627", "1"),
("23", "", "technik", "technik", "0315dc2b79b1052713ed8c549e357264", "HWGdS4Tv8ojmMEg", "aktivni", "technik@technik.technik", "43", "5", "1276718517", "1276718501", "0", "10"),
("24", "", "koordinator", "koordinator", "d9bc6c628715256fc42ca10a0a867a2f", "PfTpiuooHkBh4wG", "aktivni", "koordinator@prevent.cz", "43", "3", "1276718616", "1276718567", "0", "10"),
("27", "4", "usradmin", "firma", "50a4588c16d69ebe1b701f8ea4669f65", "Sxl2ONKjebloR6s", "aktivni", "", "0", "0", "1276777289", "1276763013", "0", "10"),
("31", "4", "usrnormal", "firma", "f9514f35b73440efe08562bb394d515c", "UdGuNSKDFxECRCD", "aktivni", "jen@wef.cz", "0", "0", "1276761877", "1276718804", "0", "10");
-- Konec dat tabulky


-- Tabulka: 'prevent_watchdog'
-- Počet řádků tabulky: 11
-- Začátek dat tabulky
INSERT INTO `prevent_watchdog` VALUES 
("1", "1", "", "ano", ""),
("22", "42", "ne", "ne", "ne"),
("23", "43", "ne", "ne", "ne"),
("20", "40", "ne", "ne", "ne"),
("21", "41", "ne", "ne", "ne"),
("15", "35", "ne", "ne", "ne"),
("17", "37", "ne", "ne", "ne"),
("24", "44", "ne", "ne", "ne"),
("25", "27", "ne", "ne", "ne"),
("29", "31", "", "ano", ""),
("28", "30", "ne", "ne", "ne");
-- Konec dat tabulky


-- Tabulka: 'prevent_zalohy'
-- Počet řádků tabulky: 7
-- Začátek dat tabulky
INSERT INTO `prevent_zalohy` VALUES 
("9", "12_36_32_18_02_2010", "1266492996", "popis zálohytru", "prevent_audit, prevent_audit_checklist, prevent_audit_checklist_bozp_kategorie_schema, prevent_audit_checklist_bozp_schema, prevent_audit_checklist_kategorie, prevent_audit_checklist_pobezpn_kategorie_schema, prevent_audit_checklist_pobezpn_schema, prevent_audit_checklist_povysokepn_kategorie_schema, prevent_audit_checklist_povysokepn_schema, prevent_audit_checklist_pozvysenepn_kategorie_schema, prevent_audit_checklist_pozvysenepn_schema, prevent_audit_log, prevent_audit_neshody, prevent_audit_planovac, prevent_audit_pracoviste, prevent_cron, prevent_cron_log, prevent_firmy, prevent_firmy_budova, prevent_firmy_budova_relace, prevent_firmy_log, prevent_firmy_osoba, prevent_firmy_osoba_preklad, prevent_firmy_osoba_relace, prevent_firmy_pracoviste, prevent_firmy_pracoviste_relace, prevent_firmy_provozovny, prevent_firmy_relace_budova_pracoviste, prevent_firmy_technik, prevent_firmy_uzivatele_prava, prevent_log, prevent_nastenka, prevent_nastenka_shlednuto, prevent_novinky, prevent_posta, prevent_quicklink, prevent_system, prevent_ukoly, prevent_uzivatele, prevent_watchdog, prevent_zalohy, prevent_zapisnik, ", "171110", "kovar"),
("10", "15_55_04_18_02_2010", "1266504910", "popis zálohuiohujhy", "prevent_audit, prevent_audit_checklist, prevent_audit_checklist_bozp_kategorie_schema, prevent_audit_checklist_bozp_schema, prevent_audit_checklist_kategorie, prevent_audit_checklist_pobezpn_kategorie_schema, prevent_audit_checklist_pobezpn_schema, prevent_audit_checklist_povysokepn_kategorie_schema, prevent_audit_checklist_povysokepn_schema, prevent_audit_checklist_pozvysenepn_kategorie_schema, prevent_audit_checklist_pozvysenepn_schema, prevent_audit_log, prevent_audit_neshody, prevent_audit_planovac, prevent_audit_pracoviste, prevent_cron, prevent_cron_log, prevent_firmy, prevent_firmy_budova, prevent_firmy_budova_relace, prevent_firmy_log, prevent_firmy_osoba, prevent_firmy_osoba_preklad, prevent_firmy_osoba_relace, prevent_firmy_pracoviste, prevent_firmy_pracoviste_relace, prevent_firmy_provozovny, prevent_firmy_relace_budova_pracoviste, prevent_firmy_technik, prevent_firmy_uzivatele_prava, prevent_log, prevent_nastenka, prevent_nastenka_shlednuto, prevent_novinky, prevent_posta, prevent_quicklink, prevent_system, prevent_ukoly, prevent_uzivatele, prevent_watchdog, prevent_zalohy, prevent_zapisnik, ", "166787", "kovar"),
("11", "21_37_11_12_03_2010", "1268426242", "popis zájhgjhlohy", "prevent_audit, prevent_audit_checklist, prevent_audit_checklist_bozp_kategorie_schema, prevent_audit_checklist_bozp_schema, prevent_audit_checklist_kategorie, prevent_audit_checklist_pobezpn_kategorie_schema, prevent_audit_checklist_pobezpn_schema, prevent_audit_checklist_povysokepn_kategorie_schema, prevent_audit_checklist_povysokepn_schema, prevent_audit_checklist_pozvysenepn_kategorie_schema, prevent_audit_checklist_pozvysenepn_schema, prevent_audit_log, prevent_audit_neshody, prevent_audit_planovac, prevent_audit_pracoviste, prevent_cron, prevent_cron_log, prevent_firmy, prevent_firmy_budova, prevent_firmy_budova_relace, prevent_firmy_log, prevent_firmy_osoba, prevent_firmy_osoba_preklad, prevent_firmy_osoba_relace, prevent_firmy_pracoviste, prevent_firmy_pracoviste_relace, prevent_firmy_provozovny, prevent_firmy_relace_budova_pracoviste, prevent_firmy_technik, prevent_firmy_uzivatele_prava, prevent_log, prevent_nastenka, prevent_nastenka_shlednuto, prevent_novinky, prevent_posta, prevent_quicklink, prevent_system, prevent_ukoly, prevent_uzivatele, prevent_watchdog, prevent_zalohy, prevent_zapisnik, ", "211437", "kovar"),
("8", "16_31_56_11_12_2009", "1260545520", "popis zálohyh", "prevent_audit, prevent_audit_log, prevent_audit_planovac, prevent_firmy, prevent_firmy_budova, prevent_firmy_budova_relace, prevent_cron, prevent_cron_log, prevent_firmy_log, prevent_firmy_osoba, prevent_firmy_osoba_preklad, prevent_firmy_osoba_relace, prevent_firmy_pracoviste, prevent_firmy_pracoviste_relace, prevent_firmy_provozovny, prevent_firmy_relace_budova_pracoviste, prevent_firmy_technik, prevent_firmy_uzivatele_prava, prevent_log, prevent_nastenka, prevent_nastenka_shlednuto, prevent_novinky, prevent_posta, prevent_quicklink, prevent_system, prevent_ukoly, prevent_uzivatele, prevent_watchdog, prevent_zalohy, prevent_zapisnik, ", "76862", "kovar"),
("12", "14_31_40_15_05_2010", "1273926703", "popis zálohyfj", "prevent_audit, prevent_audit_checklist, prevent_audit_checklist_bozppo_kategorie_schema, prevent_audit_checklist_bozppo_schema, prevent_audit_checklist_bozp_kategorie_schema, prevent_audit_checklist_bozp_schema, prevent_audit_checklist_kategorie, prevent_audit_checklist_pobezpn_kategorie_schema, prevent_audit_checklist_pobezpn_schema, prevent_audit_checklist_povysokepn_kategorie_schema, prevent_audit_checklist_povysokepn_schema, prevent_audit_checklist_pozvysenepn_kategorie_schema, prevent_audit_checklist_pozvysenepn_schema, prevent_audit_fotografie, prevent_audit_log, prevent_audit_neshody, prevent_audit_planovac, prevent_audit_pracoviste, prevent_audit_protokoly, prevent_cron, prevent_cron_log, prevent_firmy, prevent_firmy_budova, prevent_firmy_budova_relace, prevent_firmy_log, prevent_firmy_osoba, prevent_firmy_osoba_preklad, prevent_firmy_osoba_relace, prevent_firmy_pracoviste, prevent_firmy_pracoviste_relace, prevent_firmy_provozovny, prevent_firmy_relace_budova_pracoviste, prevent_firmy_technik, prevent_firmy_uzivatele_prava, prevent_log, prevent_nastenka, prevent_nastenka_shlednuto, prevent_novinky, prevent_posta, prevent_quicklink, prevent_system, prevent_ukoly, prevent_uzivatele, prevent_watchdog, prevent_zalohy, prevent_zapisnik, ", "297718", "kovar"),
("13", "16_18_06_17_06_2010", "1276784292", "popis zálohyhi
", "prevent_audit, prevent_audit_checklist, prevent_audit_checklist_bozppo_kategorie_schema, prevent_audit_checklist_bozppo_schema, prevent_audit_checklist_bozp_kategorie_schema, prevent_audit_checklist_bozp_schema, prevent_audit_checklist_kategorie, prevent_audit_checklist_pobezpn_kategorie_schema, prevent_audit_checklist_pobezpn_schema, prevent_audit_checklist_povysokepn_kategorie_schema, prevent_audit_checklist_povysokepn_schema, prevent_audit_checklist_pozvysenepn_kategorie_schema, prevent_audit_checklist_pozvysenepn_schema, prevent_audit_fotografie, prevent_audit_log, prevent_audit_neshody, prevent_audit_planovac, prevent_audit_pracoviste, prevent_audit_protokoly, prevent_audit_soubory, prevent_cron, prevent_cron_log, prevent_firmy, prevent_firmy_budova, prevent_firmy_budova_relace, prevent_firmy_log, prevent_firmy_osoba, prevent_firmy_osoba_preklad, prevent_firmy_osoba_relace, prevent_firmy_pracoviste, prevent_firmy_pracoviste_relace, prevent_firmy_provozovny, prevent_firmy_relace_budova_pracoviste, prevent_firmy_technik, prevent_firmy_uzivatele_prava, prevent_log, prevent_nastenka, prevent_nastenka_shlednuto, prevent_novinky, prevent_posta, prevent_quicklink, prevent_system, prevent_ukoly, prevent_uzivatele, prevent_watchdog, prevent_zalohy, prevent_zapisnik, ", "316267", "kovar"),
("14", "19_41_32_18_06_2010", "1276882900", "popis zálerohy", "prevent_audit, prevent_audit_checklist, prevent_audit_checklist_bozppo_kategorie_schema, prevent_audit_checklist_bozppo_schema, prevent_audit_checklist_bozp_kategorie_schema, prevent_audit_checklist_bozp_schema, prevent_audit_checklist_kategorie, prevent_audit_checklist_pobezpn_kategorie_schema, prevent_audit_checklist_pobezpn_schema, prevent_audit_checklist_povysokepn_kategorie_schema, prevent_audit_checklist_povysokepn_schema, prevent_audit_checklist_pozvysenepn_kategorie_schema, prevent_audit_checklist_pozvysenepn_schema, prevent_audit_fotografie, prevent_audit_log, prevent_audit_neshody, prevent_audit_planovac, prevent_audit_pracoviste, prevent_audit_protokoly, prevent_audit_soubory, prevent_cron, prevent_cron_log, prevent_firmy, prevent_firmy_budova, prevent_firmy_budova_relace, prevent_firmy_log, prevent_firmy_osoba, prevent_firmy_osoba_preklad, prevent_firmy_osoba_relace, prevent_firmy_pracoviste, prevent_firmy_pracoviste_relace, prevent_firmy_provozovny, prevent_firmy_relace_budova_pracoviste, prevent_firmy_technik, prevent_firmy_uzivatele_prava, prevent_log, prevent_nastenka, prevent_nastenka_shlednuto, prevent_novinky, prevent_posta, prevent_quicklink, prevent_system, prevent_ukoly, prevent_uzivatele, prevent_watchdog, prevent_zalohy, prevent_zapisnik, ", "342233", "kovar");
-- Konec dat tabulky


-- Tabulka: 'prevent_zapisnik'
-- Počet řádků tabulky: 12
-- Začátek dat tabulky
INSERT INTO `prevent_zapisnik` VALUES 
("1", "1", "sadf"),
("4", "1", ""),
("5", "1", ""),
("2", "40", ""),
("3", "37", ""),
("6", "1", ""),
("7", "1", ""),
("8", "1", ""),
("9", "1", ""),
("10", "27", ""),
("11", "24", ""),
("12", "1", "");
-- Konec dat tabulky


-- *** Konec zálohy Systému Guardian ***
-- Doba vytváření zálohy: 2 sec 
-- Celkem vyexportováno řádků: 1931
