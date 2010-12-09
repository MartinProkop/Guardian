-- *** Záloha Systému Guardian ***
-- Vytvořeno: 23:51:35 08.11.2010
-- Vytvořil: kovar

-- Záloha obsahuje kompletní inserty
-- Obnovu může provést pouze hlavní admin

-- Vybrané tabulky: prevent_audit, prevent_audit_checklist, prevent_audit_checklist_kategorie, prevent_audit_checklist_kategorie_schema, prevent_audit_checklist_schema, prevent_audit_dokument, prevent_audit_exporty, prevent_audit_fotografie, prevent_audit_log, prevent_audit_neshody, prevent_audit_planovac, prevent_audit_pracoviste, prevent_audit_pripominky, prevent_audit_protokoly, prevent_audit_soubory, prevent_audit_synchronizace, prevent_audit_zip, prevent_cron, prevent_cron_log, prevent_firmy, prevent_firmy_budova, prevent_firmy_budova_relace, prevent_firmy_log, prevent_firmy_osoba, prevent_firmy_osoba_preklad, prevent_firmy_osoba_relace, prevent_firmy_pracoviste, prevent_firmy_pracoviste_relace, prevent_firmy_provozovny, prevent_firmy_relace_budova_pracoviste, prevent_firmy_technik, prevent_firmy_uzivatele_prava, prevent_log, prevent_nastenka, prevent_nastenka_shlednuto, prevent_novinky, prevent_posta, prevent_quicklink, prevent_system, prevent_ukoly, prevent_uzivatele, prevent_watchdog, prevent_zalohy, prevent_zapisnik, 

-- Tabulka: 'prevent_audit'
-- Počet řádků tabulky: 3
-- Začátek dat tabulky
INSERT INTO `prevent_audit` VALUES 
("1", "0", "0", "0", "0", "1", "23", "25", "24", "0", "provedl", "ne", "Audit", "1288564306", "1288451238", "0", "0", "0", "", "0", "***16:38:44 30.10.20", "", "", "", "", "", "", "neuzavren", "1288564306", "neuzavren", "1288623874", "neuzavren", "1288626573", "neuzavren", "1288626668", ""),
("nelze", "0", "5", "ne", "0", "0", "24", "46", "47", "1", "ceka", "provedl", "ne", "Audit", "1289233105", "1289229628", "0", "0", "bozp", "1", "", "***16:20:16 08.11.2010, kovar (koordinátor)*** 
firma1pobocka1", "", "", "", "", "", "uzavren", "1289229852", "neuzavren", "1289230655", "neuzavren", "1289230709", "", "1289231001", "neuzavren"),
("nelze", "0", "6", "ne", "0", "0", "24", "46", "47", "45", "ceka", "provedl", "ne", "Audit", "1289233123", "1289232480", "0", "0", "bozp", "2", "", "***17:07:50 08.11.2010, koordinator (koordinátor)*** 
saf", "", "", "", "", "", "uzavren", "1289232488", "neuzavren", "1289232930", "neuzavren", "1289232546", "", "0", "neuzavren");
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_checklist'
-- Počet řádků tabulky: 6
-- Začátek dat tabulky
INSERT INTO `prevent_audit_checklist` VALUES 
("15", "5", "212", "castecne", "1", "asfe", "", "", "fdh", "1289230655"),
("16", "6", "214", "castecne", "2", "sdassag", "", "", "", "1289232519"),
("17", "6", "215", "ne", "0", "asdgag", "", "", "", "1289232519"),
("18", "6", "216", "ne", "0", "asdg", "", "", "", "1289232880"),
("19", "6", "218", "netyka", "0", "", "", "", "", "1289232880"),
("20", "6", "219", "netyka", "0", "", "", "", "", "1289232930");
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_checklist_kategorie'
-- Počet řádků tabulky: 5
-- Začátek dat tabulky
INSERT INTO `prevent_audit_checklist_kategorie` VALUES 
("79", "5", "27", "zpracovano", "1289230655", "dfh"),
("80", "6", "29", "zpracovano", "1289232519", "sdg"),
("81", "6", "30", "zpracovano", "1289232880", "sdghaGasf"),
("82", "6", "32", "zpracovano", "1289232930", "h"),
("83", "5", "31", "nezpracovano", "0", "");
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_checklist_kategorie_schema'
-- Počet řádků tabulky: 6
-- Začátek dat tabulky
INSERT INTO `prevent_audit_checklist_kategorie_schema` VALUES 
("27", "1", "uj", "1"),
("29", "2", "kategorie nova", "1"),
("30", "2", "kategorie nova2", "2"),
("31", "1", "nastaveni", "2"),
("32", "2", "asg", "3"),
("34", "1", "ujkddddd", "3");
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_checklist_schema'
-- Počet řádků tabulky: 12
-- Začátek dat tabulky
INSERT INTO `prevent_audit_checklist_schema` VALUES 
("212", "1", "27", "jedna", "2", "1", "fdh"),
("214", "2", "29", "2.1", "1", "8", "2.1.opatteni"),
("215", "2", "29", "2.2", "2", "23", "2.2.opatřenio"),
("216", "2", "30", "3.2", "1", "0", "asg"),
("217", "1", "31", "wet", "1", "3", "wet"),
("218", "2", "30", "6", "2", "2", "sdg"),
("219", "2", "32", "hl", "1", "32", "sdh"),
("221", "1", "31", "nastaveni", "2", "0", "dsg"),
("222", "1", "27", "ku", "1", "2", "kuuu"),
("223", "2", "32", "sdg", "2", "0", "sgd"),
("224", "1", "27", "pesa", "3", "1", "pesa"),
("225", "1", "34", "dfht", "1", "2", "dfhu");
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_dokument'
-- Počet řádků tabulky: 0
-- Začátek dat tabulky
-- Tabulka neobsahuje data
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_exporty'
-- Počet řádků tabulky: 0
-- Začátek dat tabulky
-- Tabulka neobsahuje data
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_fotografie'
-- Počet řádků tabulky: 0
-- Začátek dat tabulky
-- Tabulka neobsahuje data
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_log'
-- Počet řádků tabulky: 60
-- Začátek dat tabulky
INSERT INTO `prevent_audit_log` VALUES 
("192", "24", "5", "1289229616", "Vytvořen nový audit", "", "kovar"),
("193", "24", "5", "1289229628", "Technik technik přijal audit", "", "technik"),
("194", "5", "5", "1289229631", "Byla zahájena práce na auditu - už ho nelze exportovat.", "", "technik"),
("195", "24", "5", "1289229852", "Upravena pobočka jménem firma1pobocka1 v rámci auditu.", "", "technik"),
("196", "24", "5", "1289230655", "Upraven audit - přidána položka do seznamu neshod.", "", "kovar"),
("197", "24", "5", "1289230655", "Upraven audit - checklist", "", "kovar"),
("198", "24", "5", "1289230695", "Audit byl upraven - přidáno pracoviste s názvem jednav rámci auditu.", "", "kovar"),
("199", "24", "5", "1289230702", "Audit byl upraven - kontrola pracoviště jedna přidána další neshoda.", "", "kovar"),
("200", "24", "5", "1289230702", "Upraven audit - přidána položka do seznamu neshod.", "", "kovar"),
("201", "24", "5", "1289230709", "Audit byl upraven - kontrola pracoviště jedna.", "", "kovar"),
("202", "24", "5", "1289230709", "Upraven audit - přidána položka do seznamu neshod.", "", "kovar"),
("203", "24", "", "1289230990", "Audit byl upraven - neshoda", "", "kovar"),
("204", "24", "", "1289230996", "Audit byl upraven - neshoda", "", "kovar"),
("205", "24", "", "1289231001", "Audit byl upraven - neshoda", "", "kovar"),
("206", "24", "5", "1289231022", "Audit (#ID 5) byl komentován a uzavřen - je předán koordinátorovi k připomínkování.", "", "kovar"),
("207", "24", "5", "1289231133", "Koordinátor připomínkoval audit (ID#5) a předal ho technikovi k opravám.", "", "kovar"),
("208", "24", "5", "1289231169", "Audit (#ID 5) byl komentován a uzavřen - je předán koordinátorovi k připomínkování.", "", "technik"),
("209", "24", "5", "1289231198", "Koordinátor připomínkoval audit (ID#5) a předal ho klientovi.", "", "kovar"),
("210", "24", "5", "1289231286", "Koordinátor připomínkoval audit (ID#5) a předal ho klientovi.", "", "kovar"),
("211", "24", "5", "1289231318", "Koordinátor připomínkoval audit (ID#5) a předal ho klientovi.", "", "kovar"),
("212", "24", "5", "1289231366", "Klient připomínkoval audit (ID#5) a předal ho koordinátorovi.", "", "firma1"),
("213", "24", "5", "1289231415", "Klient připomínkoval audit (ID#5) a předal ho koordinátorovi.", "", "firma1"),
("214", "24", "5", "1289231446", "Koordinátor připomínkoval audit (ID#5) a předal ho technikovi k opravám.", "", "kovar"),
("215", "24", "5", "1289231475", "Audit (#ID 5) byl komentován a uzavřen - je předán koordinátorovi k připomínkování.", "", "technik"),
("216", "24", "6", "1289232470", "Vytvořen nový audit", "", "koordinator"),
("217", "24", "6", "1289232480", "Technik technik přijal audit", "", "technik"),
("218", "6", "6", "1289232485", "Byla zahájena práce na auditu - už ho nelze exportovat.", "", "technik"),
("219", "24", "6", "1289232488", "Upravena pobočka jménem firma1pobocka1 v rámci auditu.", "", "technik"),
("220", "24", "6", "1289232519", "Upraven audit - přidána položka do seznamu neshod.", "", "technik"),
("221", "24", "6", "1289232519", "Upraven audit - přidána položka do seznamu neshod.", "", "technik"),
("222", "24", "6", "1289232519", "Upraven audit - checklist", "", "technik"),
("223", "24", "6", "1289232528", "Upraven audit - přidána položka do seznamu neshod.", "", "technik"),
("224", "24", "6", "1289232528", "Upraven audit - checklist", "", "technik"),
("225", "24", "6", "1289232541", "Audit byl upraven - kontrola pracoviště jedna přidána další neshoda.", "", "technik"),
("226", "24", "6", "1289232541", "Upraven audit - přidána položka do seznamu neshod.", "", "technik"),
("227", "24", "6", "1289232546", "Audit byl upraven - kontrola pracoviště jedna.", "", "technik"),
("228", "24", "6", "1289232546", "Upraven audit - přidána položka do seznamu neshod.", "", "technik"),
("229", "24", "6", "1289232560", "Upraven audit - neshoda - potvrzena", "", "technik"),
("230", "24", "6", "1289232560", "Upraven audit - neshoda - potvrzena", "", "technik"),
("231", "24", "6", "1289232560", "Upraven audit - neshoda - potvrzena", "", "technik"),
("232", "24", "6", "1289232560", "Upraven audit - neshoda - potvrzena", "", "technik"),
("233", "24", "6", "1289232560", "Upraven audit - neshoda - potvrzena", "", "technik"),
("234", "24", "6", "1289232562", "Upraven audit - neshoda - potvrzena", "", "technik"),
("235", "24", "6", "1289232562", "Upraven audit - neshoda - potvrzena", "", "technik"),
("236", "24", "6", "1289232562", "Upraven audit - neshoda - potvrzena", "", "technik"),
("237", "24", "6", "1289232562", "Upraven audit - neshoda - potvrzena", "", "technik"),
("238", "24", "6", "1289232562", "Upraven audit - neshoda - potvrzena", "", "technik"),
("239", "24", "6", "1289232574", "Audit (#ID 6) byl komentován a uzavřen - je předán koordinátorovi k připomínkování.", "", "technik"),
("240", "24", "6", "1289232803", "Koordinátor připomínkoval audit (ID#6) a předal ho technikovi k opravám.", "", "koordinator"),
("241", "24", "6", "1289232880", "Upraven audit - upravena položka do seznamu neshod.", "", "koordinator"),
("242", "24", "6", "1289232880", "Upraven audit - odstraněna položka ze seznamu neshod", "", "koordinator"),
("243", "24", "6", "1289232880", "Upraven audit - checklist", "", "koordinator"),
("244", "24", "6", "1289232901", "Upraven audit - checklist - kategorie se netýká", "", "koordinator"),
("245", "24", "6", "1289232922", "Upraven audit - checklist - kategorie se netýká", "", "koordinator"),
("246", "24", "6", "1289232922", "Upraven audit - checklist - kategorie se netýká", "", "koordinator"),
("247", "24", "6", "1289232930", "Upraven audit - odstraněna položka ze seznamu neshod", "", "koordinator"),
("248", "24", "6", "1289232930", "Upraven audit - checklist", "", "koordinator"),
("249", "24", "6", "1289233066", "Audit (#ID 6) byl komentován a uzavřen - je předán koordinátorovi k připomínkování.", "", "koordinator"),
("250", "24", "5", "1289233105", "Koordinátor připomínkoval audit (ID#5) a předal ho klientovi.", "", "koordinator"),
("251", "24", "6", "1289233123", "Koordinátor připomínkoval audit (ID#6) a předal ho klientovi.", "", "koordinator");
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_neshody'
-- Počet řádků tabulky: 8
-- Začátek dat tabulky
INSERT INTO `prevent_audit_neshody` VALUES 
("10", "5", "15", "", "", "", "asfe", "0", "", "1289230990", "zpracovano", "fdher", ""),
("11", "5", "", "27", "", "neshodas", "er", "0", "", "1289230996", "zpracovano", "návrh opatřeníser", ""),
("12", "5", "", "27", "", "neshoda", "erert", "0", "", "1289231001", "zpracovano", "návrh opatření", ""),
("13", "6", "16", "", "", "", "sdassag", "0", "", "1289232562", "zpracovano", "2.1.opatteni", ""),
("14", "6", "17", "", "", "", "asdgag", "0", "", "1289232562", "zpracovano", "2.2.opatřenio", ""),
("15", "6", "18", "", "", "", "asdg", "0", "", "1289232880", "zpracovano", "asg", ""),
("16", "6", "", "27", "", "neshodasfga", "", "0", "", "1289232562", "zpracovano", "návrh opatřeníasg", ""),
("17", "6", "", "27", "", "neshoda", "", "0", "", "1289232562", "zpracovano", "návrh opatření", "");
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_planovac'
-- Počet řádků tabulky: 0
-- Začátek dat tabulky
-- Tabulka neobsahuje data
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_pracoviste'
-- Počet řádků tabulky: 2
-- Začátek dat tabulky
INSERT INTO `prevent_audit_pracoviste` VALUES 
("12", "27", "5", "zpracovano", "", "", "safasf", "", "", "", "1289230709"),
("13", "27", "6", "zpracovano", "", "", "", "", "", "", "1289232546");
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_pripominky'
-- Počet řádků tabulky: 2
-- Začátek dat tabulky
INSERT INTO `prevent_audit_pripominky` VALUES 
("1", "5", "technkovi", "1289231446", "fsg", "1289233105", "asdgag", "1289231415"),
("2", "6", "gfasg", "1289232803", "sdg", "1289233123", "", "0");
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_protokoly'
-- Počet řádků tabulky: 2
-- Začátek dat tabulky
INSERT INTO `prevent_audit_protokoly` VALUES 
("5", "5", "1289231475", "firma1pobocka1
firma1pobocka1fffsd", "technik", "firma1", "sdg", "sdgsdg", "", "", "", "", "", "", "zpracovano", "", "", "", "", ""),
("6", "6", "1289233066", "firma1pobocka1
firma1pobocka1dsf", "techniksdfg", "firma1sdgs", "sdgdsgsdg", "sdgdg", "", "", "", "", "", "", "zpracovano", "", "", "", "", "");
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_soubory'
-- Počet řádků tabulky: 0
-- Začátek dat tabulky
-- Tabulka neobsahuje data
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_synchronizace'
-- Počet řádků tabulky: 0
-- Začátek dat tabulky
-- Tabulka neobsahuje data
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_zip'
-- Počet řádků tabulky: 0
-- Začátek dat tabulky
-- Tabulka neobsahuje data
-- Konec dat tabulky


-- Tabulka: 'prevent_cron'
-- Počet řádků tabulky: 0
-- Začátek dat tabulky
-- Tabulka neobsahuje data
-- Konec dat tabulky


-- Tabulka: 'prevent_cron_log'
-- Počet řádků tabulky: 0
-- Začátek dat tabulky
-- Tabulka neobsahuje data
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy'
-- Počet řádků tabulky: 1
-- Začátek dat tabulky
INSERT INTO `prevent_firmy` VALUES 
("26", "firma1", "firma1", "firma1@firma1.firma1", "firma1telefon", "firma1", "", "firma1", "firma1", "firma1", "", "firma1", "./firma_data/26/viva_la_evolucion.jpg", "ne");
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy_budova'
-- Počet řádků tabulky: 0
-- Začátek dat tabulky
-- Tabulka neobsahuje data
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy_budova_relace'
-- Počet řádků tabulky: 0
-- Začátek dat tabulky
-- Tabulka neobsahuje data
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy_log'
-- Počet řádků tabulky: 18
-- Začátek dat tabulky
INSERT INTO `prevent_firmy_log` VALUES 
("372", "1289229558", "Klient vytvořen.", "", "26", "kovar"),
("373", "1289229558", "Vytvořena osoba jménem firma1zástupce", "", "26", "kovar"),
("374", "1289229558", "Vytvořen uživatelský účet se jménem firma1", "", "26", "kovar"),
("375", "1289229590", "Vytvořena pobočku klienta se jménem firma1pobocka1", "", "26", "kovar"),
("376", "1289229590", "Vytvořena osoba jménem firma1pobocka1vedouci", "", "26", "kovar"),
("377", "1289229590", "Vytvořen uživatelský účet se jménem firma1pobocka1", "", "26", "kovar"),
("378", "1289229599", "Technik technik byl firmě přidělen", "", "26", "kovar"),
("379", "1289229616", "Vytvořen nový audit pobočce firma1pobocka1", "", "26", "kovar"),
("380", "1289229628", "Technik technik přijal audit provozovny firma1pobocka1", "", "26", "technik"),
("381", "1289229852", "Upravena pobočka jménem firma1pobocka1 v rámci auditu.", "", "26", "technik"),
("382", "1289230695", "Přidáno pracoviste s názvem jednav rámci auditu", "", "26", "kovar"),
("383", "1289230702", "Upravena pracoviště s názvem jedna v  rámci auditu.", "", "26", "kovar"),
("384", "1289230709", "Upravena pracoviště s názvem jedna v  rámci auditu.", "", "26", "kovar"),
("385", "1289232470", "Vytvořen nový audit pobočce firma1pobocka1", "", "26", "koordinator"),
("386", "1289232480", "Technik technik přijal audit provozovny firma1pobocka1", "", "26", "technik"),
("387", "1289232488", "Upravena pobočka jménem firma1pobocka1 v rámci auditu.", "", "26", "technik"),
("388", "1289232541", "Upravena pracoviště s názvem jedna v  rámci auditu.", "", "26", "technik"),
("389", "1289232546", "Upravena pracoviště s názvem jedna v  rámci auditu.", "", "26", "technik");
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy_osoba'
-- Počet řádků tabulky: 2
-- Začátek dat tabulky
INSERT INTO `prevent_firmy_osoba` VALUES 
("99", "26", "firma1zástupce", "", "", "", "", "", "", ""),
("100", "26", "firma1pobocka1vedouci", "", "", "", "", "", "", "");
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
("115", "99", "26", "firma", "z_zastupce_firma"),
("116", "100", "24", "provozovna", "z_zastupce_provozovna");
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy_pracoviste'
-- Počet řádků tabulky: 1
-- Začátek dat tabulky
INSERT INTO `prevent_firmy_pracoviste` VALUES 
("27", "jedna", "", "jednsaasg", "", "1", "", "", "", "asfsag", "asgasg", "as", "nákladní automobily do 3,5t;", "", "ne", "sdg", "plynem;elektrickou energií;", "sdg", "sdg", "ano", "sdg");
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy_pracoviste_relace'
-- Počet řádků tabulky: 1
-- Začátek dat tabulky
INSERT INTO `prevent_firmy_pracoviste_relace` VALUES 
("25", "24", "27");
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy_provozovny'
-- Počet řádků tabulky: 1
-- Začátek dat tabulky
INSERT INTO `prevent_firmy_provozovny` VALUES 
("24", "26", "firma1pobocka1", "firma1pobocka1", "firma1pobocka1@firma1pobocka1.firma1pobocka1", "firma1pobocka1tel", "firma1pobocka1", "", "firma1pobocka1", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "firma1pobocka1sdg");
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy_relace_budova_pracoviste'
-- Počet řádků tabulky: 0
-- Začátek dat tabulky
-- Tabulka neobsahuje data
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy_technik'
-- Počet řádků tabulky: 1
-- Začátek dat tabulky
INSERT INTO `prevent_firmy_technik` VALUES 
("24", "26", "46");
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy_uzivatele_prava'
-- Počet řádků tabulky: 2
-- Začátek dat tabulky
INSERT INTO `prevent_firmy_uzivatele_prava` VALUES 
("34", "47", "admin"),
("35", "48", "24");
-- Konec dat tabulky


-- Tabulka: 'prevent_log'
-- Počet řádků tabulky: 88
-- Začátek dat tabulky
INSERT INTO `prevent_log` VALUES 
("992", "1289227969", "Úspěšné přihlášení", "", "1", "kovar"),
("993", "1289228727", "Vytvořen uživatelský účet", "", "45", "kovar"),
("994", "1289228743", "Vytvořen uživatelský účet", "", "46", "kovar"),
("995", "1289228758", "Uživatel autorizován", "", "45", ""),
("996", "1289228762", "Úspěšné přihlášení", "", "45", "koordinator"),
("997", "1289228768", "Úspěšné přihlášení", "", "1", "kovar"),
("998", "1289228780", "Uživatel autorizován", "", "46", ""),
("999", "1289228783", "Úspěšné přihlášení", "", "46", "technik"),
("1000", "1289228787", "Úspěšné přihlášení", "", "1", "kovar"),
("1001", "1289229306", "Vytvořil si zápisník s názvemsdg.", "", "1", "kovar"),
("1002", "1289229473", "Přidal kategorii s názvem: uj do checklistu: bozp1.", "", "1", "kovar"),
("1003", "1289229492", "Přidal otázku do checklistu: bozp1.", "", "1", "kovar"),
("1004", "1289229558", "Vytvořil nového klienta se jménem firma1.", "", "1", "kovar"),
("1005", "1289229558", "Vytvořen uživatelský účet", "", "47", "kovar"),
("1006", "1289229590", "Vytvořil novou pobočku se jménem firma1pobocka1 k firmě firma1.", "", "1", "kovar"),
("1007", "1289229590", "Vytvořen uživatelský účet", "", "48", "kovar"),
("1008", "1289229599", "Přidělena firma firma1", "", "46", "kovar"),
("1009", "1289229616", "Vytvořil nový audit pobočce firma1pobocka1", "", "1", "kovar"),
("1010", "1289229623", "Úspěšné přihlášení", "", "46", "technik"),
("1011", "1289229628", "Přijal audit pobočky firma1pobocka1", "", "46", "technik"),
("1012", "1289229852", "Upravil pobočku jménem firma1pobocka1 u firmy firma1v rámci auditu.", "", "46", "technik"),
("1013", "1289230248", "Úspěšné přihlášení", "", "1", "kovar"),
("1014", "1289231123", "Úspěšné přihlášení", "", "1", "kovar"),
("1015", "1289231146", "Úspěšné přihlášení", "", "46", "technik"),
("1016", "1289231179", "Úspěšné přihlášení", "", "1", "kovar"),
("1017", "1289231341", "Uživatel autorizován", "", "47", ""),
("1018", "1289231343", "Úspěšné přihlášení", "", "47", "firma1"),
("1019", "1289231420", "Úspěšné přihlášení", "", "1", "kovar"),
("1020", "1289231451", "Úspěšné přihlášení", "", "46", "technik"),
("1021", "1289232320", "Úspěšné přihlášení", "", "45", "koordinator"),
("1022", "1289232341", "Odeslal hromadnou poštu VŠEM uživatelům: <br />asg", "", "45", "koordinator"),
("1023", "1289232381", "Přidal verzi auditu  bozp s názvem: ", "", "45", "koordinator"),
("1024", "1289232391", "Smazal kategorii s názvem: uj z checklistu: bozp2.", "", "45", "koordinator"),
("1025", "1289232396", "Přidal kategorii s názvem: kategorie nova do checklistu: bozp2.", "", "45", "koordinator"),
("1026", "1289232404", "Přidal kategorii s názvem: kategorie nova2 do checklistu: bozp2.", "", "45", "koordinator"),
("1027", "1289232418", "Přidal otázku do checklistu: bozp2.", "", "45", "koordinator"),
("1028", "1289232431", "Přidal otázku do checklistu: bozp2.", "", "45", "koordinator"),
("1029", "1289232451", "Přidal otázku do checklistu: bozp2.", "", "45", "koordinator"),
("1030", "1289232470", "Vytvořil nový audit pobočce firma1pobocka1", "", "45", "koordinator"),
("1031", "1289232476", "Úspěšné přihlášení", "", "46", "technik"),
("1032", "1289232480", "Přijal audit pobočky firma1pobocka1", "", "46", "technik"),
("1033", "1289232488", "Upravil pobočku jménem firma1pobocka1 u firmy firma1v rámci auditu.", "", "46", "technik"),
("1034", "1289232798", "Úspěšné přihlášení", "", "45", "koordinator"),
("1035", "1289232832", "Přidal kategorii s názvem: nastaveni do checklistu: bozp1.", "", "45", "koordinator"),
("1036", "1289232838", "Přidal otázku do checklistu: bozp1.", "", "45", "koordinator"),
("1037", "1289232856", "Přidal otázku do checklistu: bozp2.", "", "45", "koordinator"),
("1038", "1289232889", "Přidal kategorii s názvem: asg do checklistu: bozp2.", "", "45", "koordinator"),
("1039", "1289232917", "Přidal otázku do checklistu: bozp2.", "", "45", "koordinator"),
("1040", "1289250738", "Úspěšné přihlášení", "", "45", "koordinator"),
("1041", "1289251941", "Přidal otázku do checklistu: bozp2.", "", "45", "koordinator"),
("1042", "1289251943", "Změnil pořadí otázky v checklistu: bozp2.", "", "45", "koordinator"),
("1043", "1289251945", "Změnil pořadí otázky v checklistu: bozp2.", "", "45", "koordinator"),
("1044", "1289251947", "Smazal otázku z checklistu: bozp2.", "", "45", "koordinator"),
("1045", "1289251969", "Smazal otázku z checklistu: bozp2.", "", "45", "koordinator"),
("1046", "1289253423", "Přidal otázku do checklistu: bozp1.", "", "45", "koordinator"),
("1047", "1289253523", "Přidal otázku do checklistu: bozp1.", "", "45", "koordinator"),
("1048", "1289253525", "Změnil pořadí otázky v checklistu: bozp1.", "", "45", "koordinator"),
("1049", "1289253528", "Změnil pořadí otázky v checklistu: bozp1.", "", "45", "koordinator"),
("1050", "1289253529", "Změnil pořadí otázky v checklistu: bozp1.", "", "45", "koordinator"),
("1051", "1289253530", "Změnil pořadí otázky v checklistu: bozp1.", "", "45", "koordinator"),
("1052", "1289253531", "Změnil pořadí otázky v checklistu: bozp1.", "", "45", "koordinator"),
("1053", "1289253533", "Změnil pořadí otázky v checklistu: bozp1.", "", "45", "koordinator"),
("1054", "1289253534", "Změnil pořadí otázky v checklistu: bozp1.", "", "45", "koordinator"),
("1055", "1289253534", "Změnil pořadí otázky v checklistu: bozp1.", "", "45", "koordinator"),
("1056", "1289253535", "Změnil pořadí otázky v checklistu: bozp1.", "", "45", "koordinator"),
("1057", "1289253535", "Změnil pořadí otázky v checklistu: bozp1.", "", "45", "koordinator"),
("1058", "1289253536", "Změnil pořadí otázky v checklistu: bozp1.", "", "45", "koordinator"),
("1059", "1289253536", "Změnil pořadí otázky v checklistu: bozp1.", "", "45", "koordinator"),
("1060", "1289253537", "Změnil pořadí otázky v checklistu: bozp1.", "", "45", "koordinator"),
("1061", "1289253580", "Úspěšné přihlášení", "", "1", "kovar"),
("1062", "1289253604", "Přidal otázku do checklistu: bozp2.", "", "1", "kovar"),
("1063", "1289253769", "Úspěšné přihlášení", "", "1", "kovar"),
("1064", "1289253943", "Vytvořil zálohu systému", "", "1", "kovar"),
("1065", "1289253943", "Vytvořil zálohu systému", "", "0", "kovar"),
("1066", "1289255582", "Přidal kategorii s názvem: ujj do checklistu: bozp1.", "", "1", "kovar"),
("1067", "1289255683", "Smazal kategorii s názvem: ujj z checklistu: bozp1.", "", "1", "kovar"),
("1068", "1289255687", "Přidal kategorii s názvem: ujk do checklistu: bozp1.", "", "1", "kovar"),
("1069", "1289255746", "Upravil kategorii s názvem: ujkd do checklistu: bozp1.", "", "1", "kovar"),
("1070", "1289255820", "Upravil kategorii s názvem: ujkddddd na: ujkddddd v checklistu: bozp1.", "", "1", "kovar"),
("1071", "1289256346", "Přidal otázku do checklistu: bozp1.", "", "1", "kovar"),
("1072", "1289256373", "Přidal otázku do checklistu: bozp1.", "", "1", "kovar"),
("1073", "1289256381", "Upravil otázku s názvem: dfh na: dfht v checklistu: bozp1.", "", "1", "kovar"),
("1074", "1289256387", "Upravil otázku s názvem: dfht na: dfht v checklistu: bozp1.", "", "1", "kovar"),
("1075", "1289256413", "Upravil otázku s názvem: pes na: ku v checklistu: bozp1.", "", "1", "kovar"),
("1076", "1289256453", "Upravil otázku s názvem: h na: hl v checklistu: bozp2.", "", "1", "kovar"),
("1077", "1289256457", "Upravil otázku s názvem: hl na: hl v checklistu: bozp2.", "", "1", "kovar"),
("1078", "1289256695", "Vytvořil zálohu systému", "", "1", "kovar"),
("1079", "1289256695", "Vytvořil zálohu systému", "", "0", "kovar");
-- Konec dat tabulky


-- Tabulka: 'prevent_nastenka'
-- Počet řádků tabulky: 0
-- Začátek dat tabulky
-- Tabulka neobsahuje data
-- Konec dat tabulky


-- Tabulka: 'prevent_nastenka_shlednuto'
-- Počet řádků tabulky: 4
-- Začátek dat tabulky
INSERT INTO `prevent_nastenka_shlednuto` VALUES 
("126", "45", "0", ""),
("127", "46", "0", ""),
("128", "47", "0", ""),
("129", "48", "0", "");
-- Konec dat tabulky


-- Tabulka: 'prevent_novinky'
-- Počet řádků tabulky: 1
-- Začátek dat tabulky
INSERT INTO `prevent_novinky` VALUES 
("3", "1289253922", "První novinka", "Smazal jsem si kompletně databázi, takže teď jdu od znova:)");
-- Konec dat tabulky


-- Tabulka: 'prevent_posta'
-- Počet řádků tabulky: 8
-- Začátek dat tabulky
INSERT INTO `prevent_posta` VALUES 
("18", "1", "1", "1289229270", "dsgh", "dfh", "prijata", "odeslana"),
("19", "1", "45", "1289232334", "asg", "as", "nova", "odeslana"),
("20", "", "45", "1289232341", "asg", "asf", "nova", "odeslana"),
("21", "1", "45", "1289232341", "asg", "asf", "nova", "smazana"),
("22", "45", "45", "1289232341", "asg", "asf", "prijata", "smazana"),
("23", "46", "45", "1289232341", "asg", "asf", "nova", "smazana"),
("24", "47", "45", "1289232341", "asg", "asf", "nova", "smazana"),
("25", "48", "45", "1289232341", "asg", "asf", "nova", "smazana");
-- Konec dat tabulky


-- Tabulka: 'prevent_quicklink'
-- Počet řádků tabulky: 0
-- Začátek dat tabulky
-- Tabulka neobsahuje data
-- Konec dat tabulky


-- Tabulka: 'prevent_system'
-- Počet řádků tabulky: 192
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
("57", "1250202118", "0.482", "10", "admini mají nyní možnost mazat firemní uživatele."),
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
("85", "1259427958", "0.87.2", "120", "uprava objektu - odkazuji se momentalne na provozovny hypertextove, stejne tak v relacich"),
("86", "1259427985", "0.87.3", "120", "uprava osob, nyni se odkazujou primo na firmy a provozovny"),
("87", "1259490301", "0.87.4", "80", "uprava entit, nyni se filtrují podle firem a provozoven"),
("88", "1259491349", "0.87.41", "15", "integrace filtrovani entit do detailu provozoven"),
("89", "1259496109", "0.87.42", "30", "nalezeni chyby v prihlasovani uzivatelu, jeji oprava a pridani stranky odblokovat uzivatele - blokovaný uživatel podá žádost adminovi pomocí formuláře."),
("90", "1259832276", "0.87.43", "30", "odstraneni chyby - osoby v provozovne mohli být duplicitní - stejné jméno ale dle systému jiná osoba...nyní toto odstraneno..(jeste je treba odstranit duplicitu mezi osobou firmy a provozovny)"),
("91", "1260132248", "0.87.44", "100", "velka oprava osob...bylo to špatně :("),
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
("114", "1266364618", "0.89.5.05", "45", "Vyčešena připomínka #5: Doplnit možnost, aby u celé oblasti v check listu šlo uvést, že se to klientanetýká, ten se stane pasívní (hypertext) a technik se nebude zdržovat otevíráním oblasti buď se to ztratí nebo nebude aktivní

v rámci problému bylo potřeba vyřešit několik chyb v nastavování atributu okruhu otázek (nesprávné označování okruhu za zpracovaný)."),
("115", "1266365222", "0.89.5.06", "10", "Vyřešena připomínka #6: Radiobutony by neměly být předvolené tj. měla by být nastavená  nulová volba, nevybraný žádný radiobuton v okamžiku otevření nového auditu - hrozí nebezpečí omylu"),
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
("164", "1276786468", "0.89.6.1", "40", "příprava databáze na vytváření zamítnutýchauditů, změna relací, příprava stránky na generování zamítlých auditů"),
("165", "1276885893", "0.89.6.2", "160", "implementace funkce vytvoreni noveho auditu - oprava zamitleho (slozite)"),
("166", "1276895471", "0.89.6.3", "30", "doimplementace zamítnutých auditů, přidána signalizace v detailech auditu."),
("167", "1276951631", "0.89.6.4", "60", "Přidáno:
+možnost stažení fotografií hotového auditu
+oprava hotoveho auditu a jeho vyhledavani
+implementace fotografii pro správu auditů "),
("168", "1276958072", "0.89.6.5", "70", "přidáno:
+možnosti stáhnout fotografie auditu
+fotografie se při tisku dokumentu zipují
+stáhnutí zipu"),
("169", "1277228341", "0.89.6.6", "50", "Dodělán systém fotografií:
+při zipování se gneruje soubor fotografie.txt
+u fotografií se zobrazuje záznam PŮVOD nese informace o tom kde je fotografie zařazena"),
("170", "1277228907", "0.89.6.7", "10", "úprava systému logování: 
+nyní se v logu uživatelů zobrazí i operaco, které provedl u auditů"),
("171", "1277324223", "0.89.6.8", "10", "v souboru o fotografiich je i doplneno info o prirazene firmě"),
("172", "1277326620", "0.89.6.9", "40", "fotografie k pracovistim a checklistum nejde přidávat pokud je audit už uzavřen"),
("173", "1277339437", "0.89.6.10", "20", "oprava informace o puvdu fotky
oprava dokoncit_audit_firma.php"),
("174", "1277382515", "0.90.1", "100", "TISK:
+pridana zakladni knihovna
+pridana knihovna cert
+uprava knihovny - lokalizace do guardianu
+priprava souboru na tisk"),
("175", "1278075508", "0.90.2", "200", "oprava knihovny tcpdf, přizpůsobení nové verze, integrace do systému, tisk prvních pdf"),
("176", "1278075544", "0.90.3", "80", "implementace "chytrého" pregress baru k tisku"),
("177", "1278229035", "0.91.1", "300", "práce na připomínkách"),
("178", "1279051640", "0.91.2", "280", "další práce na připomínkách, až je dodělám napíšu seznam všech změn

//tohle je už nové vyúčtování"),
("179", "1279111329", "0.91.2.1", "20", "změna designu hlášek k auditu - hezké přehledné obdelníčky v celé aplikaci AUDIT"),
("180", "1279116149", "0.92.1", "20", "stránka synchronizace - připrava na lokální guardian pro technika"),
("181", "1279118135", "0.92.2", "30", "sprava auditu editace - priprava na sdynchronizaci auditu - omezeni akci kdyz je audit v lokalu..."),
("182", "1279124372", "0.92.3", "70", "technik, koordinator a admin maji moznost exportovat audit do souboru - priprava pav, stranky na export, integrace do provest audit..."),
("183", "1279125111", "0.92.4", "10", "pokud dám provést audit již ho nemohu exportovat!"),
("185", "1279385283", "0.92.5", "80", "vyřešen komplet export auditů, včetně CRC...technik stáhne sql soubor a dostane crc kod, kterej použije při vkládání do lokální verze"),
("195", "1279807395", "0.92.6", "45", "velká chyba v exportech..."),
("206", "1280068605", "0.92.7", "180", "úprava systému pro exporty, zněna databáze, export auditu, vše okolo, snad dobré, bez ošetření duplicit při tom, když už v systému LOCAL audit je..
to bude další vlna..."),
("207", "1285962294", "0.92.7local", "200", "funguje export z localu"),
("208", "1286451680", "0.93.0.1", "20", "uděláno přidělávání firem a navigátor provozoven pro admina a koordinatora"),
("209", "1286835209", "0.93.0.2", "20", "úprava budov a provozoven - přidávání"),
("210", "1286835262", "0.93.1.1", "30", "úprava auditů - modul správa_auditů"),
("211", "1286835302", "0.93.1.2", "25", "pozměnení práv u auditů - přísput firm. uživatelů, nezobrazování poznámek mimo protokol"),
("212", "1286835354", "0.93.1.3", "50", "změna chcklistů - odstraněni položky, úprava poznámky mimo protokol, chyba v algoritmu uzavírání auditů - 0% částečně = NE..."),
("213", "1286835985", "0.93.1.4", "20", "pohrání si se zaškrtáváním checklistů - zaškrtý se týkají, ponechány jednotlivé odkazy...tlačítka pro hromadné výbery"),
("214", "1286836135", "0.93.0.5", "30", "editace auditu pracovišť - ubrány položky, změny názvů, úpravy pohledů z detailů auditu"),
("215", "1286842497", "0.93.0.6", "35", "úprava neshod - přidány a odebrány položky...přidána položka z předchozích fázy auditu.. upraven náhled v detailech auditu"),
("216", "1286844281", "0.93.1.7", "20", "příprava na nástroj pro editaci auditů - automaticky doplňovaných textů k neshodám"),
("217", "1286922439", "0.93.1.8", "50", "kompletní předělání systému protokolů, včetně signalizace stavů, uzavření, ukládání..."),
("218", "1286925838", "0.93.1.9", "30", "editace javascriptu pro vyber checklistu, predelani systemu provest audit"),
("219", "1286925855", "0.93.1.10", "15", "další kus správy audtiu"),
("220", "1287067704", "0.93.1.x", "0", "Nové vyúčtování"),
("221", "1287067728", "0.93.1.11", "10", "změna uzavírání auditů - v souvoslosti se změnou protokolů"),
("222", "1288690983", "číslo 0.94.1", "0", "práce na připomínkách v souboru od tomáše mullera.

Systém prodělal spoustu změn (namátkou):
+úprava QuickLinku
+změna úvodní stránky přihlášení
+úprava pošty
+změna systému úkolů - zavedena povinost napsat proč nesplním úkol, navázání na audity, úkol o nesplněném úkolu
+vylepšený zápisník
+funkce uživatelé
+nové zadávání úkolu - navíc přidělané zadávání auditů
+úprava firmy->klient - editace, přidávání, navázání na uživatele, logo atd
+úprava provozovny->pobočka - úprava navázání na firmu, zavedení jednopobočkové firmy, vytváření uživatelů k pobočce automaticky
+úprava osob
+pracovišť
+budov
+zcela změněn systém auditu
+zadat audit
+změna provést audit
+změna práv technika k auditu a klientovi
+změna signalizace auditu
+změna stavů auditu
");
-- Konec dat tabulky


-- Tabulka: 'prevent_ukoly'
-- Počet řádků tabulky: 27
-- Začátek dat tabulky
INSERT INTO `prevent_ukoly` VALUES 
("128", "1289228727", "1289229283", "1", "0", "Předat uživateli kontrolní kód", "Uživatel: koordinator<br />kód: DLP4ErFoUd", "nesplnen", "", "systém", "dsg"),
("129", "1289228743", "0", "1", "0", "Předat uživateli kontrolní kód", "Uživatel: technik<br />kód: h4nAeOdhak", "ceka_na_splneni", "", "systém", ""),
("130", "1289229283", "0", "1", "0", "Uživatel kovar nesplnil Vámi zadaný úkol.", "<strong>Úkol:</strong> Předat uživateli kontrolní kód<br /><strong>Popis:</strong> Uživatel: koordinator<br />kód: DLP4ErFoUd<br /><strong>Udaný důvod:</strong> dsg.", "ceka_na_splneni", "", "systém", ""),
("131", "1289229511", "0", "46", "1262300400", "sdg", "sdg", "ceka_na_splneni", "", "kovar", ""),
("132", "1289229558", "0", "1", "0", "Předat uživateli kontrolní kód", "Uživatel: firma1<br />kód: w61zoLl3yK", "ceka_na_splneni", "", "systém", ""),
("133", "1289229590", "0", "1", "0", "Předat uživateli kontrolní kód", "Uživatel: firma1pobocka1<br />kód: SPDXpZ6kOI", "ceka_na_splneni", "", "systém", ""),
("134", "1289229599", "0", "46", "0", "Koordinátor kovar Vám přidělil klienta: firma1.", "", "ceka_na_splneni", "", "kovar", ""),
("135", "1289229616", "0", "46", "0", "Byl Vám přidělen audit", "Právě Vám byl koordinátorem kovar přidělen audit, přijměte ho", "ceka_na_splneni", "./sprava_auditu.php?id=detaily_auditu&firma=26&provozovna=24&audit=5", "kovar", ""),
("136", "1289229628", "0", "1", "0", "Technik přijal audit", "Technik technik přijal vámi přidělený audit (#ID 5) pobočky firma1pobocka1.", "ceka_na_splneni", "./sprava_auditu.php?id=detaily_auditu&firma=26&provozovna=24&audit=5", "systém", ""),
("137", "1289231022", "0", "1", "0", "Technik technik provedl Vámi zadaný audit (ID#5)", "Audit je nyní možné připomínkovat.", "ceka_na_splneni", "./nahled_audit.php?id=vybrat_oblast&id_audit=5", "systém", ""),
("138", "1289231133", "0", "46", "0", "Koordinátor připomínkoval Vámi provedený audit (ID#5).", "<strong>Opravte audit podle připomínek:</strong><br />drzsr", "ceka_na_splneni", "./provest_audit.php?id=vybrat_oblast&id_audit=5", "kovar", ""),
("139", "1289231169", "0", "1", "0", "Technik technik provedl Vámi zadaný audit (ID#5)", "Audit je nyní možné připomínkovat.", "ceka_na_splneni", "./nahled_audit.php?id=vybrat_oblast&id_audit=5", "systém", ""),
("140", "1289231198", "0", "1", "0", "Poslal jste audit (ID#5) klientovi. Předejte mu logovací údaje k připomínkování auditu.", "<strong>Připomínkování:</strong><br /><em>odkaz na audit:</em> http://www.guardian.ebozp.cz/?id_audit=5<br /><br /><em>odkaz na přihlášení:</em> http://www.guardian.ebozp.cz/autorizace.php?id=autorizace<br /><em>jméno uživatele:</em> firma1<br /><em>autorizační kód:</em> w61zoLl3yK", "ceka_na_splneni", "", "systém", ""),
("141", "1289231286", "0", "1", "0", "Poslal jste audit (ID#5) klientovi. Předejte mu logovací údaje k připomínkování auditu.", "<strong>Připomínkování:</strong><br /><em>odkaz na audit:</em> http://www.guardian.ebozp.cz/?id_audit=5<br /><br /><em>odkaz na přihlášení:</em> http://www.guardian.ebozp.cz/autorizace.php?id=autorizace<br /><em>jméno uživatele:</em> firma1<br /><em>autorizační kód:</em> w61zoLl3yK", "ceka_na_splneni", "", "systém", ""),
("142", "1289231318", "0", "1", "0", "Poslal jste audit (ID#5) klientovi. Předejte mu logovací údaje k připomínkování auditu.", "<strong>Připomínkování:</strong><br /><em>odkaz na audit:</em> http://www.guardian.ebozp.cz/?id_audit=5<br /><br /><em>odkaz na přihlášení:</em> http://www.guardian.ebozp.cz/autorizace.php?id=autorizace<br /><em>jméno uživatele:</em> firma1<br /><em>autorizační kód:</em> w61zoLl3yK", "ceka_na_splneni", "", "systém", ""),
("143", "1289231366", "0", "1", "0", "Klient připomínkoval audit (ID#5) který jste mu poslal.", "<strong>Opravte audit podle připomínek:</strong><br />asdgag", "nova", "./nahled_audit.php?id=vybrat_oblast&id_audit=5", "firma1", ""),
("144", "1289231415", "0", "1", "0", "Klient připomínkoval audit (ID#5) který jste mu poslal.", "<strong>Opravte audit podle připomínek:</strong><br />asdgag", "nova", "./nahled_audit.php?id=vybrat_oblast&id_audit=5", "firma1", ""),
("145", "1289231446", "0", "46", "0", "Koordinátor připomínkoval Vámi provedený audit (ID#5).", "<strong>Opravte audit podle připomínek:</strong><br />technkovi", "ceka_na_splneni", "./provest_audit.php?id=vybrat_oblast&id_audit=5", "kovar", ""),
("146", "1289231475", "0", "1", "0", "Technik technik provedl Vámi zadaný audit (ID#5)", "Audit je nyní možné připomínkovat.", "nova", "./nahled_audit.php?id=vybrat_oblast&id_audit=5", "systém", ""),
("147", "1289232361", "0", "46", "1262300400", "asf", "as", "nova", "", "koordinator", ""),
("148", "1289232470", "0", "46", "0", "Byl Vám přidělen audit", "Právě Vám byl koordinátorem koordinator přidělen audit, přijměte ho", "nova", "./sprava_auditu.php?id=detaily_auditu&firma=26&provozovna=24&audit=6", "koordinator", ""),
("149", "1289232480", "0", "45", "0", "Technik přijal audit", "Technik technik přijal vámi přidělený audit (#ID 6) pobočky firma1pobocka1.", "ceka_na_splneni", "./sprava_auditu.php?id=detaily_auditu&firma=26&provozovna=24&audit=6", "systém", ""),
("150", "1289232574", "0", "45", "0", "Technik technik provedl Vámi zadaný audit (ID#6)", "Audit je nyní možné připomínkovat.", "ceka_na_splneni", "./nahled_audit.php?id=vybrat_oblast&id_audit=6", "systém", ""),
("151", "1289232803", "0", "46", "0", "Koordinátor připomínkoval Vámi provedený audit (ID#6).", "<strong>Opravte audit podle připomínek:</strong><br />gfasg", "nova", "./provest_audit.php?id=vybrat_oblast&id_audit=6", "koordinator", ""),
("152", "1289233066", "0", "45", "0", "Technik technik provedl Vámi zadaný audit (ID#6)", "Audit je nyní možné připomínkovat.", "nova", "./nahled_audit.php?id=vybrat_oblast&id_audit=6", "systém", ""),
("153", "1289233105", "0", "1", "0", "Poslal jste audit (ID#5) klientovi. Předejte mu logovací údaje k připomínkování auditu.", "<strong>Připomínkování:</strong><br /><em>odkaz na audit:</em> http://www.guardian.ebozp.cz/?id_audit=5<br /><br /><em>odkaz na přihlášení:</em> http://www.guardian.ebozp.cz/<br /><em>jméno uživatele:</em> firma1", "nova", "", "systém", ""),
("154", "1289233123", "0", "45", "0", "Poslal jste audit (ID#6) klientovi. Předejte mu logovací údaje k připomínkování auditu.", "<strong>Připomínkování:</strong><br /><em>odkaz na audit:</em> http://www.guardian.ebozp.cz/?id_audit=6<br /><br /><em>odkaz na přihlášení:</em> http://www.guardian.ebozp.cz/<br /><em>jméno uživatele:</em> firma1", "nova", "", "systém", "");
-- Konec dat tabulky


-- Tabulka: 'prevent_uzivatele'
-- Počet řádků tabulky: 5
-- Začátek dat tabulky
INSERT INTO `prevent_uzivatele` VALUES 
("1", "0", "kovar", "admin", "47bbefc14dcb260a9b0b520da8e65d3e", "sul", "aktivni", "xixaom@centrum.cz", "", "44", "3", "1289253769", "1289253580", "1289256695", "15"),
("45", "0", "koordinator", "koordinator", "8197d66835374c169406679c57573fd1", "kUWPb2cTEQBOBwX", "aktivni", "koordinator@koordinator.cz", "777", "0", "0", "1289250738", "1289232798", "0", "10"),
("46", "0", "technik", "technik", "0dbb7a4c708a89644da4816cd0d44500", "oPhaQeSn64g6eDs", "aktivni", "technik@technik.cz", "888", "0", "0", "1289232476", "1289231451", "0", "10"),
("47", "26", "firma1", "firma", "791fbb2c0cc33e074e1a9360984d20db", "mVgzyYFGybMXCKg", "aktivni", "firma1@firma1.firma1", "firma1telefon", "0", "0", "1289231343", "0", "0", "10"),
("48", "26", "firma1pobocka1", "firma", "", "SPDXpZ6kOI", "ceka_na_autorizaci", "firma1pobocka1@firma1pobocka1.firma1pobocka1", "firma1pobocka1tel", "0", "0", "0", "0", "0", "10");
-- Konec dat tabulky


-- Tabulka: 'prevent_watchdog'
-- Počet řádků tabulky: 4
-- Začátek dat tabulky
INSERT INTO `prevent_watchdog` VALUES 
("45", "45", "ne", "ne", "ne"),
("46", "46", "ne", "ne", "ne"),
("47", "47", "ne", "ne", "ne"),
("48", "48", "ne", "ne", "ne");
-- Konec dat tabulky


-- Tabulka: 'prevent_zalohy'
-- Počet řádků tabulky: 0
-- Začátek dat tabulky
-- Tabulka neobsahuje data
-- Konec dat tabulky


-- Tabulka: 'prevent_zapisnik'
-- Počet řádků tabulky: 6
-- Začátek dat tabulky
INSERT INTO `prevent_zapisnik` VALUES 
("46", "1", "fshsd", "hlavní"),
("95", "45", "sdgweweewr", "hlavní"),
("96", "46", "", "hlavní"),
("97", "1", "sdg", "sdg"),
("98", "47", "", "hlavní"),
("99", "48", "", "hlavní");
-- Konec dat tabulky


-- *** Konec zálohy Systému Guardian ***
-- Doba vytváření zálohy: 0 sec 
-- Celkem vyexportováno řádků: 477
