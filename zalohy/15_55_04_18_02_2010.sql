-- *** Záloha Systému Guardian ***
-- Vytvořeno: 15:55:05 18.02.2010
-- Vytvořil: kovar

-- Záloha obsahuje kompletní inserty
-- Obnovu může provést pouze hlavní admin

-- Vybrané tabulky: prevent_audit, prevent_audit_checklist, prevent_audit_checklist_bozp_kategorie_schema, prevent_audit_checklist_bozp_schema, prevent_audit_checklist_kategorie, prevent_audit_checklist_pobezpn_kategorie_schema, prevent_audit_checklist_pobezpn_schema, prevent_audit_checklist_povysokepn_kategorie_schema, prevent_audit_checklist_povysokepn_schema, prevent_audit_checklist_pozvysenepn_kategorie_schema, prevent_audit_checklist_pozvysenepn_schema, prevent_audit_log, prevent_audit_neshody, prevent_audit_planovac, prevent_audit_pracoviste, prevent_cron, prevent_cron_log, prevent_firmy, prevent_firmy_budova, prevent_firmy_budova_relace, prevent_firmy_log, prevent_firmy_osoba, prevent_firmy_osoba_preklad, prevent_firmy_osoba_relace, prevent_firmy_pracoviste, prevent_firmy_pracoviste_relace, prevent_firmy_provozovny, prevent_firmy_relace_budova_pracoviste, prevent_firmy_technik, prevent_firmy_uzivatele_prava, prevent_log, prevent_nastenka, prevent_nastenka_shlednuto, prevent_novinky, prevent_posta, prevent_quicklink, prevent_system, prevent_ukoly, prevent_uzivatele, prevent_watchdog, prevent_zalohy, prevent_zapisnik, 

-- Tabulka: 'prevent_audit'
-- Počet řádků tabulky: 6
-- Začátek dat tabulky
INSERT INTO `prevent_audit` VALUES 
("6", "5", "23", "31", "1", "neproveden", "prijal", "", "1265315222", "1265315222", "0", "bozp", "", "***02:47:28 09.12.2009, kovar*** 
prvni koment
***02:47:48 09.12.2009, kovar*** 
druhej koment
***02:50:17 09.12.2009, kovar(koordinátor)*** 
nojono uz to slape jak prase
***02:50:37 09.12.2009, kovar(koordinátor)*** 
chahca
***02:51:07 09.12.2009, kovar(koordinátor)*** 
hi
*** 02:51:38 09.12.2009, kovar(koordinátor) *** 
d
***02:52:00 09.12.2009, kovar (koordinátor)*** 
saf
***11:51:26 02.02.2010, kovar (koordinátor)*** 
pridal jsem technika
***16:28:55 04.02.2010, kovar (koordinátor)*** 

***20:53:58 04.02.2010, usradmin (firemní admin)*** 

***21:01:51 04.02.2010, usrnormal (firemní uživatel)*** 
segt
***21:04:16 04.02.2010, usrnormal (firemní uživatel)*** 
erg", "", "0asdgagsdgsdghsdh", "uzavren"),
("17", "5", "23", "31", "1", "neproveden", "prijal", "", "1265377672", "1265377672", "0", "bozp", "", "***14:29:33 05.02.2010, kovar (koordinátor)*** 
seg", "", "", "neuzavren"),
("18", "5", "23", "27", "1", "neproveden", "nechce", "", "1266341354", "1266341320", "0", "bozp", "", "***18:03:13 16.02.2010, kovar (koordinátor)*** 
asefgaeg
***18:26:36 16.02.2010, kovar (koordinátor)*** 
fh
***18:29:14 16.02.2010, kovar (koordinátor)*** 
erzeruj", "", "", "neuzavren"),
("19", "5", "23", "27", "1", "neproveden", "nechce", "", "1266341067", "1266341067", "0", "bozp", "", "***18:23:59 16.02.2010, kovar (koordinátor)*** 
technikydgsdg", "", "", "neuzavren"),
("20", "5", "23", "27", "1", "neproveden", "prijal", "Roční prověrka", "1266365847", "1266365847", "0", "bozp", "", "***01:17:06 17.02.2010, kovar (koordinátor)*** 
segewg", "", "", "neuzavren"),
("21", "5", "23", "27", "1", "neproveden", "prijal", "Audit", "1266491661", "1266491638", "0", "bozp", "", "***12:13:04 18.02.2010, kovar (koordinátor)*** 
udělej audit
***12:14:21 18.02.2010, technik (technik)*** 
ghjtrkljltrl", "", "erigeruod fuktedw fgjkr", "uzavren");
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_checklist'
-- Počet řádků tabulky: 273
-- Začátek dat tabulky
INSERT INTO `prevent_audit_checklist` VALUES 
("1", "6", "1", "ano", "0", "", "", "0", "", "", "1265372991"),
("2", "6", "2", "netyka", "0", "", "", "0", "", "", "1265372991"),
("3", "6", "3", "castecne", "1", "", "", "0", "", "", "1265372991"),
("4", "6", "4", "ne", "0", "", "", "0", "", "", "1265372991"),
("5", "6", "5", "netyka", "0", "", "", "0", "", "", "1265372991"),
("6", "6", "6", "netyka", "0", "", "", "0", "", "", "1265372991"),
("7", "6", "7", "netyka", "0", "", "", "0", "", "", "1265372991"),
("8", "6", "8", "netyka", "0", "", "", "0", "", "", "1265372991"),
("9", "6", "9", "netyka", "0", "", "", "0", "", "", "1265372991"),
("10", "6", "10", "netyka", "0", "", "", "0", "", "", "1265372991"),
("11", "6", "11", "netyka", "0", "", "", "0", "", "", "1265372991"),
("12", "6", "12", "ne", "0", "", "", "0", "", "", "1265373006"),
("13", "6", "13", "castecne", "1", "", "", "0", "", "", "1265373006"),
("14", "6", "14", "netyka", "0", "", "", "0", "", "", "1265373006"),
("15", "6", "15", "ano", "0", "", "", "0", "", "", "1265373006"),
("16", "6", "16", "netyka", "0", "", "", "0", "", "", "1265373006"),
("17", "6", "17", "netyka", "0", "", "", "0", "", "", "1265373006"),
("18", "6", "18", "netyka", "0", "", "", "0", "", "", "1265373006"),
("19", "6", "19", "netyka", "0", "", "", "0", "", "", "1265373006"),
("20", "6", "20", "netyka", "0", "", "", "0", "", "", "1265373006"),
("21", "6", "21", "netyka", "0", "", "", "0", "", "", "1265373006"),
("22", "6", "22", "netyka", "0", "", "", "0", "", "", "1265373006"),
("23", "6", "23", "netyka", "0", "", "", "0", "", "", "1265373006"),
("24", "6", "24", "netyka", "0", "", "", "0", "", "", "1265373006"),
("25", "6", "25", "netyka", "0", "", "", "0", "", "", "1265373006"),
("26", "6", "26", "netyka", "0", "", "", "0", "", "", "1265373006"),
("27", "6", "27", "", "", "", "", "0", "", "", "0"),
("28", "6", "28", "", "", "", "", "0", "", "", "0"),
("29", "6", "29", "", "", "", "", "0", "", "", "0"),
("30", "6", "30", "", "", "", "", "0", "", "", "0"),
("31", "6", "31", "", "", "", "", "0", "", "", "0"),
("32", "6", "32", "", "", "", "", "0", "", "", "0"),
("33", "6", "33", "", "", "", "", "0", "", "", "0"),
("34", "6", "34", "", "", "", "", "0", "", "", "0"),
("35", "6", "35", "", "", "", "", "0", "", "", "0"),
("36", "6", "36", "", "", "", "", "0", "", "", "0"),
("37", "6", "37", "", "", "", "", "0", "", "", "0"),
("38", "6", "38", "", "", "", "", "0", "", "", "0"),
("39", "6", "39", "", "", "", "", "0", "", "", "0"),
("40", "6", "40", "", "", "", "", "0", "", "", "0"),
("41", "6", "41", "", "", "", "", "0", "", "", "0"),
("42", "6", "42", "", "", "", "", "0", "", "", "0"),
("43", "6", "43", "", "", "", "", "0", "", "", "0"),
("44", "6", "44", "", "", "", "", "0", "", "", "0"),
("45", "6", "45", "", "", "", "", "0", "", "", "0"),
("46", "6", "46", "", "", "", "", "0", "", "", "0"),
("47", "6", "47", "", "", "", "", "0", "", "", "0"),
("48", "6", "48", "", "", "", "", "0", "", "", "0"),
("49", "6", "49", "", "", "", "", "0", "", "", "0"),
("50", "6", "50", "", "", "", "", "0", "", "", "0"),
("51", "6", "51", "", "", "", "", "0", "", "", "0"),
("52", "6", "52", "", "", "", "", "0", "", "", "0"),
("53", "6", "53", "", "", "", "", "0", "", "", "0"),
("54", "6", "54", "", "", "", "", "0", "", "", "0"),
("55", "6", "55", "", "", "", "", "0", "", "", "0"),
("56", "6", "56", "", "", "", "", "0", "", "", "0"),
("57", "6", "57", "", "", "", "", "0", "", "", "0"),
("58", "6", "58", "", "", "", "", "0", "", "", "0"),
("59", "6", "59", "", "", "", "", "0", "", "", "0"),
("60", "6", "60", "", "", "", "", "0", "", "", "0"),
("61", "6", "61", "", "", "", "", "0", "", "", "0"),
("62", "6", "62", "", "", "", "", "0", "", "", "0"),
("63", "6", "63", "", "", "", "", "0", "", "", "0"),
("64", "6", "64", "", "", "", "", "0", "", "", "0"),
("65", "6", "65", "", "", "", "", "0", "", "", "0"),
("66", "6", "66", "", "", "", "", "0", "", "", "0"),
("67", "6", "67", "", "", "", "", "0", "", "", "0"),
("68", "6", "68", "", "", "", "", "0", "", "", "0"),
("69", "6", "69", "", "", "", "", "0", "", "", "0"),
("70", "6", "70", "", "", "", "", "0", "", "", "0"),
("71", "6", "71", "", "", "", "", "0", "", "", "0"),
("72", "6", "72", "", "", "", "", "0", "", "", "0"),
("73", "6", "73", "", "", "", "", "0", "", "", "0"),
("74", "6", "74", "", "", "", "", "0", "", "", "0"),
("75", "6", "75", "", "", "", "", "0", "", "", "0"),
("76", "6", "76", "", "", "", "", "0", "", "", "0"),
("77", "6", "77", "", "", "", "", "0", "", "", "0"),
("78", "6", "78", "", "", "", "", "0", "", "", "0"),
("79", "6", "79", "", "", "", "", "0", "", "", "0"),
("80", "6", "80", "", "", "", "", "0", "", "", "0"),
("81", "6", "81", "", "", "", "", "0", "", "", "0"),
("82", "6", "82", "", "", "", "", "0", "", "", "0"),
("83", "6", "83", "", "", "", "", "0", "", "", "0"),
("84", "6", "84", "", "", "", "", "0", "", "", "0"),
("85", "6", "85", "", "", "", "", "0", "", "", "0"),
("86", "6", "86", "", "", "", "", "0", "", "", "0"),
("87", "6", "87", "", "", "", "", "0", "", "", "0"),
("88", "6", "88", "", "", "", "", "0", "", "", "0"),
("89", "6", "89", "", "", "", "", "0", "", "", "0"),
("90", "6", "90", "", "", "", "", "0", "", "", "0"),
("91", "6", "91", "", "", "", "", "0", "", "", "0"),
("92", "6", "92", "", "", "", "", "0", "", "", "0"),
("93", "6", "93", "", "", "", "", "0", "", "", "0"),
("94", "6", "94", "", "", "", "", "0", "", "", "0"),
("95", "6", "95", "", "", "", "", "0", "", "", "0"),
("96", "6", "96", "", "", "", "", "0", "", "", "0"),
("97", "6", "97", "", "", "", "", "0", "", "", "0"),
("98", "6", "98", "", "", "", "", "0", "", "", "0"),
("99", "6", "99", "", "", "", "", "0", "", "", "0"),
("100", "6", "100", "", "", "", "", "0", "", "", "0"),
("101", "6", "101", "", "", "", "", "0", "", "", "0"),
("102", "6", "102", "", "", "", "", "0", "", "", "0"),
("103", "6", "103", "", "", "", "", "0", "", "", "0"),
("104", "6", "104", "", "", "", "", "0", "", "", "0"),
("105", "6", "105", "", "", "", "", "0", "", "", "0"),
("106", "6", "106", "", "", "", "", "0", "", "", "0"),
("107", "6", "107", "", "", "", "", "0", "", "", "0"),
("108", "6", "108", "", "", "", "", "0", "", "", "0"),
("109", "6", "109", "", "", "", "", "0", "", "", "0"),
("110", "6", "110", "", "", "", "", "0", "", "", "0"),
("111", "6", "111", "", "", "", "", "0", "", "", "0"),
("112", "6", "112", "", "", "", "", "0", "", "", "0"),
("113", "6", "113", "", "", "", "", "0", "", "", "0"),
("114", "6", "114", "", "", "", "", "0", "", "", "0"),
("115", "6", "115", "", "", "", "", "0", "", "", "0"),
("116", "6", "116", "", "", "", "", "0", "", "", "0"),
("117", "6", "117", "", "", "", "", "0", "", "", "0"),
("118", "6", "118", "", "", "", "", "0", "", "", "0"),
("119", "6", "119", "", "", "", "", "0", "", "", "0"),
("120", "6", "120", "", "", "", "", "0", "", "", "0"),
("121", "6", "121", "", "", "", "", "0", "", "", "0"),
("122", "6", "122", "", "", "", "", "0", "", "", "0"),
("123", "6", "123", "", "", "", "", "0", "", "", "0"),
("124", "6", "124", "", "", "", "", "0", "", "", "0"),
("125", "6", "125", "", "", "", "", "0", "", "", "0"),
("126", "6", "126", "", "", "", "", "0", "", "", "0"),
("127", "6", "127", "", "", "", "", "0", "", "", "0"),
("128", "6", "128", "", "", "", "", "0", "", "", "0"),
("129", "6", "129", "", "", "", "", "0", "", "", "0"),
("130", "6", "130", "", "", "", "", "0", "", "", "0"),
("131", "6", "131", "", "", "", "", "0", "", "", "0"),
("132", "6", "132", "", "", "", "", "0", "", "", "0"),
("133", "6", "133", "", "", "", "", "0", "", "", "0"),
("134", "6", "134", "", "", "", "", "0", "", "", "0"),
("135", "6", "135", "", "", "", "", "0", "", "", "0"),
("136", "6", "136", "", "", "", "", "0", "", "", "0"),
("137", "6", "137", "", "", "", "", "0", "", "", "0"),
("138", "6", "138", "", "", "", "", "0", "", "", "0"),
("139", "6", "139", "", "", "", "", "0", "", "", "0"),
("140", "6", "140", "", "", "", "", "0", "", "", "0"),
("141", "6", "141", "", "", "", "", "0", "", "", "0"),
("142", "6", "142", "", "", "", "", "0", "", "", "0"),
("143", "6", "143", "", "", "", "", "0", "", "", "0"),
("144", "6", "144", "", "", "", "", "0", "", "", "0"),
("145", "6", "145", "", "", "", "", "0", "", "", "0"),
("146", "6", "146", "", "", "", "", "0", "", "", "0"),
("147", "6", "147", "", "", "", "", "0", "", "", "0"),
("148", "6", "148", "", "", "", "", "0", "", "", "0"),
("149", "6", "149", "", "", "", "", "0", "", "", "0"),
("150", "6", "150", "", "", "", "", "0", "", "", "0"),
("151", "6", "151", "", "", "", "", "0", "", "", "0"),
("152", "6", "152", "", "", "", "", "0", "", "", "0"),
("153", "6", "153", "", "", "", "", "0", "", "", "0"),
("154", "6", "154", "", "", "", "", "0", "", "", "0"),
("155", "6", "155", "", "", "", "", "0", "", "", "0"),
("156", "6", "156", "", "", "", "", "0", "", "", "0"),
("157", "6", "157", "", "", "", "", "0", "", "", "0"),
("158", "6", "158", "", "", "", "", "0", "", "", "0"),
("159", "6", "159", "", "", "", "", "0", "", "", "0"),
("160", "6", "160", "", "", "", "", "0", "", "", "0"),
("161", "6", "161", "", "", "", "", "0", "", "", "0"),
("162", "6", "162", "", "", "", "", "0", "", "", "0"),
("163", "6", "163", "", "", "", "", "0", "", "", "0"),
("164", "6", "164", "", "", "", "", "0", "", "", "0"),
("165", "6", "165", "", "", "", "", "0", "", "", "0"),
("166", "6", "166", "", "", "", "", "0", "", "", "0"),
("167", "6", "167", "", "", "", "", "0", "", "", "0"),
("168", "6", "168", "", "", "", "", "0", "", "", "0"),
("169", "6", "169", "", "", "", "", "0", "", "", "0"),
("170", "6", "170", "", "", "", "", "0", "", "", "0"),
("171", "6", "171", "", "", "", "", "0", "", "", "0"),
("172", "6", "172", "", "", "", "", "0", "", "", "0"),
("173", "6", "173", "", "", "", "", "0", "", "", "0"),
("174", "6", "174", "", "", "", "", "0", "", "", "0"),
("175", "6", "175", "", "", "", "", "0", "", "", "0"),
("176", "6", "176", "", "", "", "", "0", "", "", "0"),
("177", "6", "177", "", "", "", "", "0", "", "", "0"),
("178", "6", "178", "", "", "", "", "0", "", "", "0"),
("179", "6", "179", "", "", "", "", "0", "", "", "0"),
("180", "6", "180", "", "", "", "", "0", "", "", "0"),
("181", "6", "181", "", "", "", "", "0", "", "", "0"),
("182", "6", "182", "", "", "", "", "0", "", "", "0"),
("183", "6", "183", "", "", "", "", "0", "", "", "0"),
("184", "6", "184", "", "", "", "", "0", "", "", "0"),
("185", "6", "185", "", "", "", "", "0", "", "", "0"),
("186", "6", "186", "", "", "", "", "0", "", "", "0"),
("187", "6", "187", "", "", "", "", "0", "", "", "0"),
("188", "6", "188", "", "", "", "", "0", "", "", "0"),
("189", "6", "189", "", "", "", "", "0", "", "", "0"),
("190", "6", "190", "", "", "", "", "0", "", "", "0"),
("191", "6", "191", "", "", "", "", "0", "", "", "0"),
("192", "6", "192", "", "", "", "", "0", "", "", "0"),
("193", "6", "193", "", "", "", "", "0", "", "", "0"),
("194", "6", "194", "", "", "", "", "0", "", "", "0"),
("195", "6", "195", "", "", "", "", "0", "", "", "0"),
("196", "6", "196", "", "", "", "", "0", "", "", "0"),
("197", "6", "197", "", "", "", "", "0", "", "", "0"),
("198", "6", "198", "", "", "", "", "0", "", "", "0"),
("199", "6", "199", "", "", "", "", "0", "", "", "0"),
("200", "6", "200", "", "", "", "", "0", "", "", "0"),
("201", "6", "201", "", "", "", "", "0", "", "", "0"),
("202", "6", "202", "", "", "", "", "0", "", "", "0"),
("203", "6", "203", "", "", "", "", "0", "", "", "0"),
("204", "6", "204", "", "", "", "", "0", "", "", "0"),
("205", "6", "205", "", "", "", "", "0", "", "", "0"),
("206", "6", "206", "", "", "", "", "0", "", "", "0"),
("207", "6", "207", "", "", "", "", "0", "", "", "0"),
("208", "6", "208", "", "", "", "", "0", "", "", "0"),
("209", "6", "209", "", "", "", "", "0", "", "", "0"),
("210", "6", "210", "", "", "", "", "0", "", "", "0"),
("211", "6", "211", "", "", "", "", "0", "", "", "0"),
("212", "17", "1", "ano", "0", "", "", "1266274800", "", "", "1266361744"),
("213", "17", "2", "ano", "0", "", "", "1266274800", "", "", "1266361744"),
("214", "17", "3", "ano", "0", "", "", "1266274800", "", "", "1266361744"),
("215", "17", "4", "ano", "0", "", "", "1266274800", "", "", "1266361744"),
("216", "17", "5", "ano", "0", "", "", "1266274800", "", "", "1266361744"),
("217", "17", "6", "ano", "0", "", "", "1266274800", "", "", "1266361744"),
("218", "17", "7", "ano", "0", "", "", "1266274800", "", "", "1266361744"),
("219", "17", "8", "ano", "0", "", "", "1266274800", "", "", "1266361744"),
("220", "17", "9", "ano", "0", "", "", "1266274800", "", "", "1266361744"),
("221", "17", "10", "ano", "0", "", "", "1266274800", "", "", "1266361744"),
("222", "17", "11", "ano", "0", "", "", "1266274800", "", "", "1266361744"),
("223", "17", "27", "ano", "0", "", "", "1266274800", "", "", "1266362314"),
("224", "17", "28", "netyka", "0", "", "", "1355266800", "", "", "1266362314"),
("225", "17", "29", "castecne", "1", "", "", "1303250400", "", "", "1266362314"),
("226", "17", "30", "ano", "0", "", "", "1388617200", "", "", "1266362314"),
("227", "17", "31", "ano", "0", "", "", "1262300400", "", "", "1266362314"),
("228", "17", "32", "ano", "0", "", "", "1266361200", "", "", "1266362314"),
("244", "21", "12", "ano", "0", "", "", "1266447600", "", "", "1266492365"),
("229", "17", "12", "netyka", "0", "", "", "1266274800", "", "", "1266361754"),
("230", "17", "13", "netyka", "0", "", "", "1266361200", "", "", "1266361754"),
("231", "17", "14", "", "", "", "", "0", "", "", "0"),
("232", "17", "15", "", "", "", "", "0", "", "", "0"),
("233", "17", "16", "", "", "", "", "0", "", "", "0"),
("234", "17", "17", "", "", "", "", "0", "", "", "0"),
("235", "17", "18", "", "", "", "", "0", "", "", "0"),
("236", "17", "19", "", "", "", "", "0", "", "", "0"),
("237", "17", "20", "", "", "", "", "0", "", "", "0"),
("238", "17", "21", "", "", "", "", "0", "", "", "0"),
("239", "17", "22", "", "", "", "", "0", "", "", "0"),
("240", "17", "23", "", "", "", "", "0", "", "", "0"),
("241", "17", "24", "", "", "", "", "0", "", "", "0"),
("242", "17", "25", "", "", "", "", "0", "", "", "0"),
("243", "17", "26", "", "", "", "", "0", "", "", "0"),
("245", "21", "13", "netyka", "0", "bncvn", "", "1266447600", "", "", "1266492365"),
("246", "21", "14", "castecne", "33", "", "", "1265670000", "", "", "1266492365"),
("247", "21", "15", "ano", "0", "", "", "1266447600", "", "", "1266492365"),
("248", "21", "16", "ano", "0", "", "", "1266447600", "", "", "1266492365"),
("249", "21", "17", "ano", "0", "", "", "1266447600", "", "", "1266492365"),
("250", "21", "18", "ano", "0", "", "", "1266447600", "", "", "1266492365"),
("251", "21", "19", "ano", "0", "", "", "1266447600", "", "", "1266492365"),
("252", "21", "20", "ano", "0", "", "", "1266447600", "", "", "1266492365"),
("253", "21", "21", "netyka", "0", "", "", "1266447600", "", "", "1266492365"),
("254", "21", "22", "netyka", "0", "", "", "1266447600", "", "", "1266492365"),
("255", "21", "23", "netyka", "0", "", "", "1266447600", "", "", "1266492365"),
("256", "21", "24", "netyka", "0", "", "", "1266447600", "", "", "1266492365"),
("257", "21", "25", "netyka", "0", "", "", "1266447600", "", "", "1266492365"),
("258", "21", "26", "netyka", "0", "", "", "1266447600", "", "", "1266492365"),
("259", "21", "1", "", "", "", "", "0", "", "", "0"),
("260", "21", "2", "", "", "", "", "0", "", "", "0"),
("261", "21", "3", "", "", "", "", "0", "", "", "0"),
("262", "21", "4", "", "", "", "", "0", "", "", "0"),
("263", "21", "5", "", "", "", "", "0", "", "", "0"),
("264", "21", "6", "", "", "", "", "0", "", "", "0"),
("265", "21", "7", "", "", "", "", "0", "", "", "0"),
("266", "21", "8", "", "", "", "", "0", "", "", "0"),
("267", "21", "9", "", "", "", "", "0", "", "", "0"),
("268", "21", "10", "", "", "", "", "0", "", "", "0"),
("269", "21", "11", "", "", "", "", "0", "", "", "0"),
("270", "17", "87", "", "", "", "", "0", "", "", "0"),
("271", "17", "88", "", "", "", "", "0", "", "", "0"),
("272", "17", "89", "", "", "", "", "0", "", "", "0"),
("273", "17", "90", "", "", "", "", "0", "", "", "0");
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
-- Počet řádků tabulky: 104
-- Začátek dat tabulky
INSERT INTO `prevent_audit_checklist_kategorie` VALUES 
("1", "6", "1", "castecne", "1265377841", ""),
("2", "6", "2", "zpracovano", "0", "dal sem si to"),
("3", "6", "3", "zpracovano", "0", "rsdzhwrzh"),
("4", "6", "4", "zpracovano", "0", ""),
("13", "6", "13", "zpracovano", "0", ""),
("14", "6", "14", "zpracovano", "0", ""),
("11", "6", "11", "zpracovano", "0", ""),
("8", "6", "8", "zpracovano", "0", ""),
("27", "17", "1", "zpracovano", "1266361744", "dh"),
("12", "6", "12", "zpracovano", "0", ""),
("9", "6", "9", "zpracovano", "0", ""),
("10", "6", "10", "zpracovano", "0", ""),
("5", "6", "5", "zpracovano", "0", ""),
("6", "6", "6", "zpracovano", "0", ""),
("7", "6", "7", "zpracovano", "0", ""),
("15", "6", "15", "zpracovano", "0", ""),
("16", "6", "16", "zpracovano", "0", ""),
("17", "6", "17", "zpracovano", "0", ""),
("18", "6", "18", "zpracovano", "0", ""),
("19", "6", "19", "zpracovano", "0", ""),
("20", "6", "20", "zpracovano", "0", ""),
("21", "6", "21", "zpracovano", "0", ""),
("22", "6", "22", "zpracovano", "0", ""),
("23", "6", "23", "zpracovano", "0", ""),
("24", "6", "24", "zpracovano", "0", ""),
("25", "6", "25", "zpracovano", "0", ""),
("26", "6", "26", "zpracovano", "0", ""),
("28", "17", "2", "castecne", "1266361754", "f"),
("29", "17", "3", "zpracovano", "1266362314", "gsddretewtewtzwrzwerzsdghaerhaerh"),
("30", "17", "4", "nepatri", "1266363982", ""),
("31", "17", "5", "nepatri", "1266364472", ""),
("32", "17", "6", "nezpracovano", "0", ""),
("33", "17", "7", "nezpracovano", "0", ""),
("34", "17", "8", "nezpracovano", "0", ""),
("35", "17", "9", "nezpracovano", "0", ""),
("36", "17", "10", "nezpracovano", "0", ""),
("37", "17", "11", "nezpracovano", "0", ""),
("38", "17", "12", "nezpracovano", "0", ""),
("39", "17", "13", "nezpracovano", "0", ""),
("40", "17", "14", "nezpracovano", "0", ""),
("41", "17", "15", "nezpracovano", "0", ""),
("42", "17", "16", "nezpracovano", "0", ""),
("43", "17", "17", "nezpracovano", "0", ""),
("44", "17", "18", "nezpracovano", "0", ""),
("45", "17", "19", "nezpracovano", "0", ""),
("46", "17", "20", "nezpracovano", "0", ""),
("47", "17", "21", "nezpracovano", "0", ""),
("48", "17", "22", "nezpracovano", "0", ""),
("49", "17", "23", "nezpracovano", "0", ""),
("50", "17", "24", "nezpracovano", "0", ""),
("51", "17", "25", "nezpracovano", "0", ""),
("52", "17", "26", "nezpracovano", "0", ""),
("53", "20", "1", "nezpracovano", "0", ""),
("54", "20", "2", "nezpracovano", "0", ""),
("55", "20", "3", "nezpracovano", "0", ""),
("56", "20", "4", "nezpracovano", "0", ""),
("57", "20", "5", "nezpracovano", "0", ""),
("58", "20", "6", "nezpracovano", "0", ""),
("59", "20", "7", "nezpracovano", "0", ""),
("60", "20", "8", "nezpracovano", "0", ""),
("61", "20", "9", "nezpracovano", "0", ""),
("62", "20", "10", "nezpracovano", "0", ""),
("63", "20", "11", "nezpracovano", "0", ""),
("64", "20", "12", "nezpracovano", "0", ""),
("65", "20", "13", "nezpracovano", "0", ""),
("66", "20", "14", "nezpracovano", "0", ""),
("67", "20", "15", "nezpracovano", "0", ""),
("68", "20", "16", "nezpracovano", "0", ""),
("69", "20", "17", "nezpracovano", "0", ""),
("70", "20", "18", "nezpracovano", "0", ""),
("71", "20", "19", "nezpracovano", "0", ""),
("72", "20", "20", "nezpracovano", "0", ""),
("73", "20", "21", "nezpracovano", "0", ""),
("74", "20", "22", "nezpracovano", "0", ""),
("75", "20", "23", "nezpracovano", "0", ""),
("76", "20", "24", "nezpracovano", "0", ""),
("77", "20", "25", "nezpracovano", "0", ""),
("78", "20", "26", "nezpracovano", "0", ""),
("79", "21", "1", "zpracovano", "0", ""),
("80", "21", "2", "zpracovano", "0", "fzugjgjkčj"),
("81", "21", "3", "zpracovano", "0", ""),
("82", "21", "4", "zpracovano", "0", ""),
("83", "21", "5", "zpracovano", "0", ""),
("84", "21", "6", "zpracovano", "0", ""),
("85", "21", "7", "zpracovano", "0", ""),
("86", "21", "8", "zpracovano", "0", ""),
("87", "21", "9", "zpracovano", "0", ""),
("88", "21", "10", "zpracovano", "0", ""),
("89", "21", "11", "zpracovano", "0", ""),
("90", "21", "12", "zpracovano", "0", ""),
("91", "21", "13", "zpracovano", "0", ""),
("92", "21", "14", "zpracovano", "0", ""),
("93", "21", "15", "zpracovano", "0", ""),
("94", "21", "16", "zpracovano", "0", ""),
("95", "21", "17", "zpracovano", "0", ""),
("96", "21", "18", "zpracovano", "0", ""),
("97", "21", "19", "zpracovano", "0", ""),
("98", "21", "20", "zpracovano", "0", ""),
("99", "21", "21", "zpracovano", "0", ""),
("100", "21", "22", "zpracovano", "0", ""),
("101", "21", "23", "zpracovano", "0", ""),
("102", "21", "24", "zpracovano", "0", ""),
("103", "21", "25", "zpracovano", "0", ""),
("104", "21", "26", "zpracovano", "0", "");
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


-- Tabulka: 'prevent_audit_log'
-- Počet řádků tabulky: 101
-- Začátek dat tabulky
INSERT INTO `prevent_audit_log` VALUES 
("128", "5", "6", "1265107886", "Upraven audit", "", "kovar"),
("130", "5", "6", "1265297335", "Upraven audit", "", "kovar"),
("131", "5", "6", "1265313238", "Upraven audit", "", "usradmin"),
("132", "5", "6", "1265315222", "Technik technik přijal audit", "", "technik"),
("133", "5", "17", "1265376573", "Vytvořen nový audit", "", "kovar"),
("134", "5", "17", "1265377672", "Technik technik přijal audit", "", "technik"),
("135", "5", "18", "1266339793", "Vytvořen nový audit", "", "kovar"),
("136", "5", "18", "1266340462", "Technik technik nepřijal audit", "", "technik"),
("137", "5", "19", "1266341039", "Vytvořen nový audit", "", "kovar"),
("138", "5", "19", "1266341067", "Technik technik nepřijal audit", "", "technik"),
("139", "5", "18", "1266341196", "Upraven audit", "", "kovar"),
("140", "5", "18", "1266341320", "Technik technik nepřijal audit", "", "technik"),
("141", "5", "18", "1266341354", "Upraven audit", "", "kovar"),
("142", "5", "17", "1266355161", "Upraven audit - checklist", "", "technik"),
("143", "5", "17", "1266356871", "Upraven audit - checklist", "", "kovar"),
("144", "5", "17", "1266359348", "Upraven audit - checklist", "", "kovar"),
("145", "5", "17", "1266359593", "Upraven audit - checklist", "", "kovar"),
("146", "5", "17", "1266359642", "Upraven audit - checklist", "", "kovar"),
("147", "5", "17", "1266359654", "Upraven audit - checklist", "", "kovar"),
("148", "5", "17", "1266359713", "Upraven audit - checklist", "", "kovar"),
("149", "5", "17", "1266360049", "Upraven audit - checklist", "", "kovar"),
("150", "5", "17", "1266360078", "Upraven audit - checklist", "", "kovar"),
("151", "5", "17", "1266360295", "Upraven audit - checklist", "", "kovar"),
("152", "5", "17", "1266360356", "Upraven audit - checklist", "", "kovar"),
("153", "5", "17", "1266360468", "Upraven audit - checklist", "", "kovar"),
("154", "5", "17", "1266360502", "Upraven audit - checklist", "", "kovar"),
("155", "5", "17", "1266360601", "Upraven audit - checklist", "", "kovar"),
("156", "5", "17", "1266360610", "Upraven audit - checklist", "", "kovar"),
("157", "5", "17", "1266360719", "Upraven audit - checklist", "", "kovar"),
("158", "5", "17", "1266360750", "Upraven audit - checklist", "", "kovar"),
("159", "5", "17", "1266360793", "Upraven audit - checklist", "", "kovar"),
("160", "5", "17", "1266361065", "Upraven audit - checklist", "", "kovar"),
("161", "5", "17", "1266361073", "Upraven audit - checklist", "", "kovar"),
("162", "5", "17", "1266361085", "Upraven audit - checklist", "", "kovar"),
("163", "5", "17", "1266361112", "Upraven audit - checklist", "", "kovar"),
("164", "5", "17", "1266361134", "Upraven audit - checklist", "", "kovar"),
("165", "5", "17", "1266361141", "Upraven audit - checklist", "", "kovar"),
("166", "5", "17", "1266361252", "Upraven audit - checklist", "", "kovar"),
("167", "5", "17", "1266361600", "Upraven audit - checklist", "", "kovar"),
("168", "5", "17", "1266361614", "Upraven audit - checklist", "", "kovar"),
("169", "5", "17", "1266361633", "Upraven audit - checklist", "", "kovar"),
("170", "5", "17", "1266361646", "Upraven audit - checklist", "", "kovar"),
("171", "5", "17", "1266361665", "Upraven audit - checklist", "", "kovar"),
("172", "5", "17", "1266361692", "Upraven audit - checklist", "", "kovar"),
("173", "5", "17", "1266361700", "Upraven audit - checklist", "", "kovar"),
("174", "5", "17", "1266361744", "Upraven audit - checklist", "", "kovar"),
("175", "5", "17", "1266361754", "Upraven audit - checklist", "", "kovar"),
("176", "5", "17", "1266361766", "Upraven audit - checklist", "", "kovar"),
("177", "5", "17", "1266361784", "Upraven audit - checklist", "", "kovar"),
("178", "5", "17", "1266361795", "Upraven audit - checklist", "", "kovar"),
("179", "5", "17", "1266361805", "Upraven audit - checklist", "", "kovar"),
("180", "5", "17", "1266361845", "Upraven audit - checklist", "", "kovar"),
("181", "5", "17", "1266361854", "Upraven audit - checklist", "", "kovar"),
("182", "5", "17", "1266362142", "Upraven audit - checklist", "", "kovar"),
("183", "5", "17", "1266362149", "Upraven audit - checklist", "", "kovar"),
("184", "5", "17", "1266362161", "Upraven audit - checklist", "", "kovar"),
("185", "5", "17", "1266362169", "Upraven audit - checklist", "", "kovar"),
("186", "5", "17", "1266362177", "Upraven audit - checklist", "", "kovar"),
("187", "5", "17", "1266362230", "Upraven audit - checklist", "", "kovar"),
("188", "5", "17", "1266362238", "Upraven audit - checklist", "", "kovar"),
("189", "5", "17", "1266362314", "Upraven audit - checklist", "", "kovar"),
("190", "5", "17", "1266363935", "Upraven audit - checklist - kategorie se netýká", "", "kovar"),
("191", "5", "17", "1266363938", "Upraven audit - checklist - kategorie se netýká", "", "kovar"),
("192", "5", "17", "1266363982", "Upraven audit - checklist - kategorie se netýká", "", "kovar"),
("193", "5", "17", "1266363984", "Upraven audit - checklist - kategorie se netýká", "", "kovar"),
("194", "5", "17", "1266364086", "Upraven audit - checklist - kategorie se netýká", "", "kovar"),
("195", "5", "17", "1266364088", "Upraven audit - checklist - kategorie se netýká", "", "kovar"),
("196", "5", "17", "1266364113", "Upraven audit - checklist - kategorie se netýká", "", "kovar"),
("197", "5", "17", "1266364212", "Upraven audit - checklist - kategorie se netýká", "", "kovar"),
("198", "5", "17", "1266364217", "Upraven audit - checklist - kategorie se netýká", "", "kovar"),
("199", "5", "17", "1266364221", "Upraven audit - checklist - kategorie se netýká", "", "kovar"),
("200", "5", "17", "1266364222", "Upraven audit - checklist - kategorie se netýká", "", "kovar"),
("201", "5", "17", "1266364240", "Upraven audit - checklist - kategorie se netýká", "", "kovar"),
("202", "5", "17", "1266364245", "Upraven audit - checklist - kategorie se netýká", "", "kovar"),
("203", "5", "17", "1266364247", "Upraven audit - checklist - kategorie se netýká", "", "kovar"),
("204", "5", "17", "1266364248", "Upraven audit - checklist - kategorie se netýká", "", "kovar"),
("205", "5", "17", "1266364472", "Upraven audit - checklist - kategorie se netýká", "", "kovar"),
("206", "5", "20", "1266365826", "Vytvořen nový audit", "", "kovar"),
("207", "5", "20", "1266365847", "Technik technik přijal audit", "", "technik"),
("208", "5", "", "1266366405", "Vytvořen nový plán auditu", "", "kovar"),
("209", "5", "", "1266491550", "Vytvořen nový plán auditu", "", "kovar"),
("210", "5", "21", "1266491584", "Vytvořen nový audit", "", "kovar"),
("211", "5", "21", "1266491638", "Technik technik přijal audit", "", "technik"),
("212", "5", "21", "1266492262", "Upraven audit - checklist - kategorie se netýká", "", "technik"),
("213", "5", "21", "1266492268", "Upraven audit - checklist - kategorie se netýká", "", "technik"),
("214", "5", "21", "1266492268", "Upraven audit - checklist - kategorie se netýká", "", "technik"),
("215", "5", "21", "1266492269", "Upraven audit - checklist - kategorie se netýká", "", "technik"),
("216", "5", "21", "1266492271", "Upraven audit - checklist - kategorie se netýká", "", "technik"),
("217", "5", "21", "1266492273", "Upraven audit - checklist - kategorie se netýká", "", "technik"),
("218", "5", "21", "1266492274", "Upraven audit - checklist - kategorie se netýká", "", "technik"),
("219", "5", "21", "1266492275", "Upraven audit - checklist - kategorie se netýká", "", "technik"),
("220", "5", "21", "1266492276", "Upraven audit - checklist - kategorie se netýká", "", "technik"),
("221", "5", "21", "1266492276", "Upraven audit - checklist - kategorie se netýká", "", "technik"),
("222", "5", "21", "1266492277", "Upraven audit - checklist - kategorie se netýká", "", "technik"),
("223", "5", "21", "1266492277", "Upraven audit - checklist - kategorie se netýká", "", "technik"),
("224", "5", "21", "1266492279", "Upraven audit - checklist - kategorie se netýká", "", "technik"),
("225", "5", "21", "1266492280", "Upraven audit - checklist - kategorie se netýká", "", "technik"),
("226", "5", "21", "1266492281", "Upraven audit - checklist - kategorie se netýká", "", "technik"),
("227", "5", "21", "1266492324", "Upraven audit - checklist", "", "technik"),
("228", "5", "21", "1266492365", "Upraven audit - checklist", "", "technik"),
("229", "5", "21", "1266492373", "Upraven audit - checklist - kategorie se netýká", "", "technik");
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_neshody'
-- Počet řádků tabulky: 2
-- Začátek dat tabulky
INSERT INTO `prevent_audit_neshody` VALUES 
("1", "6", "2", "", "jkbkbjhb ujb hb jkbh bjhjkbkbjhb ujb hb jkbh bjhjkbkbjhb ujb hb jkbh bjhjkbkbjhb ujb hb jkbh bjhjkbkbjhb ujb hb jkbh bjhjkbkbjhb ujb hb jkbh bjh", "", "jkbkbjhb ujb hb jkbh bjhjkbkbjhb ujb hb jkbh bjhjkbkbjhb ujb hb jkbh bjhjkbkbjhb ujb hb jkbh bjhjkbkbjhb ujb hb jkbh bjhjkbkbjhb ujb hb jkbh bjhjkbkbjhb ujb hb jkbh bjh", "0"),
("2", "6", "", "1", "uiirroi iouiiz ioz zu iup uut tzi up ouiirroi iouiiz ioz zu iup uut tzi up ouiirroi iouiiz ioz zu iup uut tzi up ouiirroi iouiiz ioz zu iup uut tzi up ouiirroi iouiiz ioz zu iup uut tzi up ouiirroi iouiiz ioz zu iup uut tzi up ouiirroi iouiiz ioz zu iup uut tzi up o", "uiirroi iouiiz ioz zu iup uut tzi up ouiirroi iouiiz ioz zu iup uut tzi up ouiirroi iouiiz ioz zu iup uut tzi up ouiirroi iouiiz ioz zu iup uut tzi up ouiirroi iouiiz ioz zu iup uut tzi up ouiirroi iouiiz ioz zu iup uut tzi up ouiirroi iouiiz ioz zu iup uut tzi up ouiirroi iouiiz ioz zu iup uut tzi up ouiirroi iouiiz ioz zu iup uut tzi up o", "uiirroi iouiiz ioz zu iup uut tzi up ouiirroi iouiiz ioz zu iup uut tzi up ouiirroi iouiiz ioz zu iup uut tzi up ouiirroi iouiiz ioz zu iup uut tzi up ouiirroi iouiiz ioz zu iup uut tzi up ouiirroi iouiiz ioz zu iup uut tzi up ouiirroi iouiiz ioz zu iup uut tzi up ouiirroi iouiiz ioz zu iup uut tzi up ouiirroi iouiiz ioz zu iup uut tzi up o", "0");
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_planovac'
-- Počet řádků tabulky: 6
-- Začátek dat tabulky
INSERT INTO `prevent_audit_planovac` VALUES 
("7", "5", "1", "", "1230764400", "0", "vypnuto", "bozp", "", "g"),
("8", "5", "1", "", "1230764400", "100", "zapnuto", "bozp", "", "ef"),
("9", "7", "1", "", "1230764400", "0", "zapnuto", "po", "bez_pn", "čt"),
("10", "7", "1", "", "1230764400", "0", "zapnuto", "po", "bez_pn", "čt"),
("11", "5", "1", "Audit", "1230764400", "13", "zapnuto", "bozp", "", "drazhr"),
("12", "5", "1", "Audit", "1293836400", "2332", "zapnuto", "bozp", "", "cvn,");
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_pracoviste'
-- Počet řádků tabulky: 0
-- Začátek dat tabulky
INSERT INTO `prevent_audit_pracoviste` VALUES 
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
-- Počet řádků tabulky: 1
-- Začátek dat tabulky
INSERT INTO `prevent_firmy_budova` VALUES 
("8", "hukh", "jk", "0", "ano", "ano", "ano", "ano", "ano", "ano", "fw");
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy_budova_relace'
-- Počet řádků tabulky: 1
-- Začátek dat tabulky
INSERT INTO `prevent_firmy_budova_relace` VALUES 
("8", "5", "8");
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy_log'
-- Počet řádků tabulky: 19
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
("308", "1266493108", "Vymazány logy starší 3 dny ", "", "31", "kovar");
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy_osoba'
-- Počet řádků tabulky: 2
-- Začátek dat tabulky
INSERT INTO `prevent_firmy_osoba` VALUES 
("1", "4", "Martin Prokop", "", "edg", "h", "gh", "bh", "jb", "bjh
"),
("2", "4", "zjjhbh", "", "dthv", "hbh", "bjk", "bjk", "bjk", "bjkb");
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
-- Počet řádků tabulky: 4
-- Začátek dat tabulky
INSERT INTO `prevent_firmy_pracoviste` VALUES 
("1", "a", "", "b", "", "0", "", "", "", "hjkd", "bhe", "jjf", "", "ano", "hg", "bgh", "bhi", "ne", "hj"),
("2", "a", "", "b", "", "0", "", "", "", "hjkd", "bhe", "jjf", "", "ano", "hg", "bgh", "bhi", "ne", "hj"),
("3", "sdfg", "", "sdfg", "", "0", "", "", "", "sdg", "sdga", "sdg", "", "ne", "sdfg", "sdga", "sdga", "ne", "sgad"),
("4", "lm", "", "kmk", "", "0", "", "", "", "km", "kmk", "dv", "", "ano", "km", "sdv", "mk", "ano", "mllkm");
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy_pracoviste_relace'
-- Počet řádků tabulky: 3
-- Začátek dat tabulky
INSERT INTO `prevent_firmy_pracoviste_relace` VALUES 
("1", "5", "1"),
("2", "5", "3"),
("3", "6", "4");
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy_provozovny'
-- Počet řádků tabulky: 1
-- Začátek dat tabulky
INSERT INTO `prevent_firmy_provozovny` VALUES 
("5", "4", "Moje provozovna", "někde je", "email", "8968á", "popis provozovny", "", "ano", "0121", "", "ano", "ano", "", "ano", "", "", "", "efigh", "wefgwfgwegwegweg", "ano", "ewgweg", "wegewg");
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy_relace_budova_pracoviste'
-- Počet řádků tabulky: 0
-- Začátek dat tabulky
INSERT INTO `prevent_firmy_relace_budova_pracoviste` VALUES 
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
-- Počet řádků tabulky: 53
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
("692", "1266504904", "Vytvořil zálohu systému", "", "0", "kovar");
-- Konec dat tabulky


-- Tabulka: 'prevent_nastenka'
-- Počet řádků tabulky: 3
-- Začátek dat tabulky
INSERT INTO `prevent_nastenka` VALUES 
("1", "1", "5", "Text záznamuasgeag", "1256744558"),
("2", "1", "4", "Text záznamusadged", "1256744561"),
("3", "1", "0", "Text záznamusdgedweg", "1256744565");
-- Konec dat tabulky


-- Tabulka: 'prevent_nastenka_shlednuto'
-- Počet řádků tabulky: 31
-- Začátek dat tabulky
INSERT INTO `prevent_nastenka_shlednuto` VALUES 
("1", "1", "0", "3"),
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
("16", "1", "4", "2"),
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
("20", "1", "firma", "http://localhost/guardian/firmy_koordinator.php?id=detaily_firmy&id_firmy=4", "1");
-- Konec dat tabulky


-- Tabulka: 'prevent_system'
-- Počet řádků tabulky: 107
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
Vyřešeno – u normálního auditu to volí koordinátor - zvolí první plán. Ostatní už systém generuje jako Roční prověrka");
-- Konec dat tabulky


-- Tabulka: 'prevent_ukoly'
-- Počet řádků tabulky: 33
-- Začátek dat tabulky
INSERT INTO `prevent_ukoly` VALUES 
("1", "1259494686", "1", "0", "Přezkoumat žádost o odblokování uživateletechnik.", "", "ceka_na_splneni", "", "systém"),
("2", "1259974171", "1", "0", "Přezkoumat žádost o odblokování uživatele technik.", "", "ceka_na_splneni", "", "systém"),
("3", "1260321320", "26", "0", "Byl Vám přidělen audit", "Právě Vám byl koordinátorem přidělen audit, přijměte ho", "ceka_na_splneni", "", "systém"),
("4", "1260321858", "26", "0", "Byl Vám přidělen audit", "Právě Vám byl koordinátorem přidělen audit, přijměte ho", "nova", "", "systém"),
("5", "1260322386", "26", "0", "Byl Vám přidělen audit", "Právě Vám byl koordinátorem přidělen audit, přijměte ho", "nova", "", "systém"),
("6", "1260322579", "23", "0", "Byl Vám přidělen audit", "Právě Vám byl koordinátorem přidělen audit, přijměte ho", "ceka_na_splneni", "", "systém"),
("7", "1260322609", "26", "0", "Byl Vám přidělen audit", "Právě Vám byl koordinátorem přidělen audit, přijměte ho", "nova", "", "systém"),
("8", "1260323248", "26", "0", "Byl Vám přidělen audit", "Právě Vám byl koordinátorem přidělen audit, přijměte ho", "nova", "", "systém"),
("9", "1260358087", "23", "0", "Byl Vám přidělen audit", "Právě Vám byl koordinátorem přidělen audit, přijměte ho", "ceka_na_splneni", "", "systém"),
("10", "1260358109", "24", "0", "Předat uživateli kontrolní kód", "Uživatel: jméno uživsdgatele<br />kód: m93oXEd1u6", "nova", "", "systém"),
("11", "1260358123", "23", "0", "Byl Vám přidělen audit", "Právě Vám byl koordinátorem přidělen audit, přijměte ho", "ceka_na_splneni", "", "systém"),
("12", "1260358132", "23", "0", "Byl Vám přidělen audit", "Právě Vám byl koordinátorem přidělen audit, přijměte ho", "ceka_na_splneni", "", "systém"),
("13", "1260358359", "23", "0", "Byl Vám přidělen audit", "Právě Vám byl koordinátorem přidělen audit, přijměte ho", "ceka_na_splneni", "", "systém"),
("14", "1260405702", "26", "0", "Byl Vám přidělen audit", "Právě Vám byl koordinátorem přidělen audit, přijměte ho", "nova", "", "systém"),
("15", "1260446251", "26", "0", "Byl Vám přidělen audit", "Právě Vám byl koordinátorem přidělen audit, přijměte ho", "nova", "", "systém"),
("16", "1260446544", "26", "0", "Byl Vám přidělen audit", "Právě Vám byl koordinátorem přidělen audit, přijměte ho", "nova", "", "systém"),
("17", "1261332626", "23", "0", "Byl Vám přidělen audit", "Právě Vám byl koordinátorem přidělen audit, přijměte ho", "ceka_na_splneni", "", "systém"),
("18", "1264958129", "23", "0", "Byl Vám přidělen audit", "Právě Vám byl koordinátorem přidělen audit, přijměte ho", "ceka_na_splneni", "", "systém"),
("19", "1264958152", "23", "0", "Byl Vám přidělen audit", "Právě Vám byl koordinátorem přidělen audit, přijměte ho", "ceka_na_splneni", "", "systém"),
("20", "1265107886", "23", "0", "Byl Vám přidělen audit", "Právě Vám byl koordinátorem přidělen audit, přijměte ho", "ceka_na_splneni", "", "systém"),
("21", "1265296846", "23", "0", "Byl Vám přidělen audit", "Právě Vám byl koordinátorem přidělen audit, přijměte ho", "ceka_na_splneni", "", "systém"),
("22", "1265297335", "23", "0", "Byl Vám přidělen audit", "Právě Vám byl koordinátorem přidělen audit, přijměte ho", "ceka_na_splneni", "", "systém"),
("23", "1265312966", "1", "0", "Předat uživateli kontrolní kód", "Uživatel: usrnormal<br />kód: gtSJjsTbtE", "ceka_na_splneni", "", "systém"),
("24", "1265376573", "23", "0", "Byl Vám přidělen audit", "Právě Vám byl koordinátorem přidělen audit, přijměte ho", "ceka_na_splneni", "", "systém"),
("25", "1266339793", "23", "0", "Byl Vám přidělen audit", "Právě Vám byl koordinátorem přidělen audit, přijměte ho", "ceka_na_splneni", "", "systém"),
("26", "1266341039", "23", "0", "Byl Vám přidělen audit", "Právě Vám byl koordinátorem přidělen audit, přijměte ho", "ceka_na_splneni", "", "systém"),
("27", "1266341067", "1", "0", "Technik nepřijal audit", "Technik technik nepřijal vámi přidělený audit (#ID 19) provozovny Moje provozovna. Přezkoumejte prosím problém.", "ceka_na_splneni", "", "systém"),
("28", "1266341320", "1", "0", "Technik nepřijal audit", "Technik technik nepřijal vámi přidělený audit (#ID 18) provozovny Moje provozovna. Přezkoumejte prosím problém.", "ceka_na_splneni", "", "systém"),
("29", "1266350574", "1", "1262300400", "ghjgz", "ghkhg", "nova", "", "kovar"),
("30", "1266365826", "23", "0", "Byl Vám přidělen audit", "Právě Vám byl koordinátorem přidělen audit, přijměte ho", "ceka_na_splneni", "", "systém"),
("31", "1266365847", "1", "0", "Technik přijal audit", "Technik technik přijal vámi přidělený audit (#ID 20) provozovny Moje provozovna. Přezkoumejte prosím problém.", "nova", "", "systém"),
("32", "1266491584", "23", "0", "Byl Vám přidělen audit", "Právě Vám byl koordinátorem přidělen audit, přijměte ho", "ceka_na_splneni", "", "systém"),
("33", "1266491638", "1", "0", "Technik přijal audit", "Technik technik přijal vámi přidělený audit (#ID 21) provozovny Moje provozovna. Přezkoumejte prosím problém.", "nova", "", "systém");
-- Konec dat tabulky


-- Tabulka: 'prevent_uzivatele'
-- Počet řádků tabulky: 5
-- Začátek dat tabulky
INSERT INTO `prevent_uzivatele` VALUES 
("1", "", "kovar", "admin", "47bbefc14dcb260a9b0b520da8e65d3e", "sul", "aktivni", "xixaom@centrum.cz", "43", "5", "1266504840", "1266492973", "1266504904", "10"),
("23", "", "technik", "technik", "0315dc2b79b1052713ed8c549e357264", "HWGdS4Tv8ojmMEg", "aktivni", "technik@technik.technik", "43", "5", "1266491596", "1266365838", "0", "10"),
("24", "", "koordinator", "koordinator", "d9bc6c628715256fc42ca10a0a867a2f", "PfTpiuooHkBh4wG", "aktivni", "koordinator@prevent.cz", "43", "3", "1265314161", "1260546084", "0", "10"),
("27", "4", "usradmin", "firma", "50a4588c16d69ebe1b701f8ea4669f65", "Sxl2ONKjebloR6s", "aktivni", "", "0", "0", "1266492497", "1265314357", "0", "10"),
("31", "4", "usrnormal", "firma", "f9514f35b73440efe08562bb394d515c", "UdGuNSKDFxECRCD", "aktivni", "jen@wef.cz", "0", "0", "1265314493", "1265313850", "0", "10");
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
-- Počet řádků tabulky: 2
-- Začátek dat tabulky
INSERT INTO `prevent_zalohy` VALUES 
("9", "12_36_32_18_02_2010", "1266492996", "popis zálohytru", "prevent_audit, prevent_audit_checklist, prevent_audit_checklist_bozp_kategorie_schema, prevent_audit_checklist_bozp_schema, prevent_audit_checklist_kategorie, prevent_audit_checklist_pobezpn_kategorie_schema, prevent_audit_checklist_pobezpn_schema, prevent_audit_checklist_povysokepn_kategorie_schema, prevent_audit_checklist_povysokepn_schema, prevent_audit_checklist_pozvysenepn_kategorie_schema, prevent_audit_checklist_pozvysenepn_schema, prevent_audit_log, prevent_audit_neshody, prevent_audit_planovac, prevent_audit_pracoviste, prevent_cron, prevent_cron_log, prevent_firmy, prevent_firmy_budova, prevent_firmy_budova_relace, prevent_firmy_log, prevent_firmy_osoba, prevent_firmy_osoba_preklad, prevent_firmy_osoba_relace, prevent_firmy_pracoviste, prevent_firmy_pracoviste_relace, prevent_firmy_provozovny, prevent_firmy_relace_budova_pracoviste, prevent_firmy_technik, prevent_firmy_uzivatele_prava, prevent_log, prevent_nastenka, prevent_nastenka_shlednuto, prevent_novinky, prevent_posta, prevent_quicklink, prevent_system, prevent_ukoly, prevent_uzivatele, prevent_watchdog, prevent_zalohy, prevent_zapisnik, ", "171110", "kovar"),
("8", "16_31_56_11_12_2009", "1260545520", "popis zálohyh", "prevent_audit, prevent_audit_log, prevent_audit_planovac, prevent_firmy, prevent_firmy_budova, prevent_firmy_budova_relace, prevent_cron, prevent_cron_log, prevent_firmy_log, prevent_firmy_osoba, prevent_firmy_osoba_preklad, prevent_firmy_osoba_relace, prevent_firmy_pracoviste, prevent_firmy_pracoviste_relace, prevent_firmy_provozovny, prevent_firmy_relace_budova_pracoviste, prevent_firmy_technik, prevent_firmy_uzivatele_prava, prevent_log, prevent_nastenka, prevent_nastenka_shlednuto, prevent_novinky, prevent_posta, prevent_quicklink, prevent_system, prevent_ukoly, prevent_uzivatele, prevent_watchdog, prevent_zalohy, prevent_zapisnik, ", "76862", "kovar");
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
-- Doba vytváření zálohy: 5 sec 
-- Celkem vyexportováno řádků: 1757
