-- *** Export auditu Systému Guardian ***
-- Vytvořeno: 10:59:35 13.10.2010
-- Vytvořil: technik

-- Záloha obsahuje kompletní inserty
-- Obnovu může provést pouze hlavní admin

-- Vybrané tabulky: prevent_audit, prevent_audit_synchronizace, prevent_firmy_pracoviste, prevent_firmy_pracoviste_relace, prevent_firmy_provozovny, prevent_firmy, prevent_audit_protokoly, 

-- Tabulka: 'prevent_audit'
-- Počet řádků tabulky: 1
-- Začátek dat tabulky
INSERT INTO `prevent_audit` VALUES 
("6", "local", "1286960375", "ne", "0", "0", "1", "23", "25", "1", "neproveden", "prijal", "ne", "Audit", "1286960375", "1286960340", "0", "bozp", "", "***10:58:41 13.10.2010, kovar (koordinátor)*** 
oip", "", "", "", "", "", "", "neuzavren", "0", "neuzavren", "0", "neuzavren", "0");
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_synchronizace'
-- Počet řádků tabulky: 1
-- Začátek dat tabulky
INSERT INTO `prevent_audit_synchronizace` VALUES 
("1", "6", "1286960375", "uizui", "technik", "firma1", "kovar", "firma1", "firma1provozovna1");
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy_pracoviste'
-- Počet řádků tabulky: 2
-- Začátek dat tabulky
INSERT INTO `prevent_firmy_pracoviste_tmp` VALUES 
("1", "pracoviste1", "", "b", "", "0", "", "", "", "bb", "jkbjk", "jkbj", "", "ano", "kljl", "jkn", "jk", "ano", "bkb"),
("2", "pracoviste2", "", "jhkh", "", "0", "", "", "", "hjkhjk", "hj", "hjk", "", "ano", "hjkh", "jkhkj", "jhk", "ano", "jhk");
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy_pracoviste_relace'
-- Počet řádků tabulky: 2
-- Začátek dat tabulky
INSERT INTO `prevent_firmy_pracoviste_relace_tmp` VALUES 
("1", "1", "1"),
("2", "1", "2");
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy_provozovny'
-- Počet řádků tabulky: 1
-- Začátek dat tabulky
INSERT INTO `prevent_firmy_provozovny_tmp` VALUES 
("1", "1", "firma1provozovna1", "kh", "jkh", "jkh", "jhj", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "kjkh");
-- Konec dat tabulky


-- Tabulka: 'prevent_firmy'
-- Počet řádků tabulky: 1
-- Začátek dat tabulky
INSERT INTO `prevent_firmy_tmp` VALUES 
("1", "firma1", "adr1", "xixaom@centrum.cz1", "f", "adg", "", "gad", "adg", "adg", "ag");
-- Konec dat tabulky


-- Tabulka: 'prevent_audit_protokoly'
-- Počet řádků tabulky: 1
-- Začátek dat tabulky
INSERT INTO `prevent_audit_protokoly` VALUES 
("6", "6", "1286960321", "", "", "", "", "", "", "", "", "", "", "", "");
-- Konec dat tabulky


-- *** Konec exportu auditu Systému Guardian ***
-- Doba vytváření exportu: 0 sec 
-- Celkem vyexportováno řádků: 9
