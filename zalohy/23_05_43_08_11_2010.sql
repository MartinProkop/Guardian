-- *** Záloha Systému Guardian ***
-- Vytvořeno: 23:05:43 08.11.2010
-- Vytvořil: kovar

-- Záloha obsahuje kompletní inserty
-- Obnovu může provést pouze hlavní admin

-- Vybrané tabulky: prevent_audit, prevent_audit_checklist, prevent_audit_checklist_bozppo_kategorie_schema, prevent_audit_checklist_bozppo_schema, prevent_audit_checklist_bozp_kategorie_schema, prevent_audit_checklist_bozp_schema, prevent_audit_checklist_kategorie, prevent_audit_checklist_po_kategorie_schema, prevent_audit_checklist_po_schema, prevent_audit_dokument, prevent_audit_exporty, prevent_audit_fotografie, prevent_audit_log, prevent_audit_neshody, prevent_audit_planovac, prevent_audit_pracoviste, prevent_audit_pripominky, prevent_audit_protokoly, prevent_audit_soubory, prevent_audit_synchronizace, prevent_audit_zip, prevent_cron, prevent_cron_log, prevent_firmy, prevent_firmy_budova, prevent_firmy_budova_relace, prevent_firmy_log, prevent_firmy_osoba, prevent_firmy_osoba_preklad, prevent_firmy_osoba_relace, prevent_firmy_pracoviste, prevent_firmy_pracoviste_relace, prevent_firmy_provozovny, prevent_firmy_relace_budova_pracoviste, prevent_firmy_technik, prevent_firmy_uzivatele_prava, prevent_log, prevent_nastenka, prevent_nastenka_shlednuto, prevent_novinky, prevent_posta, prevent_quicklink, prevent_system, prevent_ukoly, prevent_uzivatele, prevent_watchdog, prevent_zalohy, prevent_zapisnik, 

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
