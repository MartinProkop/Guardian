<?php

function hledat($text) {
    echo "<form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" name=\"najdi osobu\" \">
	<fieldset>
	<legend>Hledat</legend>
	<label for=\"text\">hledat</label><br />
	<input name=\"text\" id=\"text\" class=\"formular\" value=\"" . $text . "\" />
         <input class=\"tlacitko\" type=\"submit\" value=\"hledat\">
	</fieldset>
	</form><br />";
}

function search_fce_koordinator($text) {
    echo "<p>Přejít na: <a href=\"#uzivatele\">uživatelé</a>, <a href=\"#firma\">klienti</a>, <a href=\"#provozovny\">pobočky</a>, <a href=\"#osoba\">osoby</a>, <a href=\"#budova\">budovy</a>, <a href=\"#pracoviste\">pracoviště</a></p>";

//uzivatele
    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [jmeno] LIKE %s', "%" . $text . "%", 'ORDER BY %by', "jmeno", 'ASC');
    $pocet = $result->count();
    echo "<a name=\"uzivatele\"></a><h3>Uživatelé</h3>";
    if ($pocet > O) {
        echo "<p>Nalezeno " . $pocet . " záznamů.</p>";
        echo "<ul>";
        while ($row = $result->fetch()) {
            if ($row['prava'] == "firma") {
                echo "<li><a href=\"./uzivatele.php?id_uzivatele=" . $row['id'] . "\">" . $row['jmeno'] . "</a> (klient: <a href=\"./firmy_koordinator.php?id=detaily_firmy&id_firmy=" . $row['ad'] . "\">" . get_nazev_firmy($row['ad']) . "</a>)</li>";
            } else {
                echo "<li><a href=\"./uzivatele.php?id_uzivatele=" . $row['id'] . "\">" . $row['jmeno'] . "</a></li>";
            }
        }
        echo "</ul>";
    } else {
        echo "<p>Nenalezen žádný záznam.</p>";
    }
    echo "<div class=\"caradown\"></div>";

//firma
    $result = dibi::query('SELECT * FROM [prevent_firmy] WHERE [nazev] LIKE %s', "%" . $text . "%", 'ORDER BY %by', "nazev", 'ASC');
    $pocet = $result->count();
    echo "<a name=\"firma\"></a><h3>Klienti</h3>";
    if ($pocet > O) {
        echo "<p>Nalezeno " . $pocet . " záznamů.</p>";
        echo "<ul>";
        while ($row = $result->fetch()) {
            echo "<li><a href=\"./firmy_koordinator.php?id=detaily_firmy&id_firmy=" . $row['id'] . "\">" . $row['nazev'] . "</a></li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Nenalezen žádný záznam.</p>";
    }
    echo "<div class=\"caradown\"></div>";
//provozovna
    $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [nazev] LIKE %s', "%" . $text . "%", 'ORDER BY %by', "nazev", 'ASC');
    $pocet = $result->count();
    echo "<a name=\"provozovny\"></a><h3>Pobočky</h3>";
    if ($pocet > O) {
        echo "<p>Nalezeno " . $pocet . " záznamů.</p>";
        echo "<ul>";
        while ($row = $result->fetch()) {
            echo "<li><a href=\"./firmy_koordinator.php?id=detaily_provozovny&id_firmy=" . $row['ad'] . "&id_provozovny=" . $row['id'] . "\">" . $row['nazev'] . "</a> (klient: <a href=\"./firmy_koordinator.php?id=detaily_firmy&id_firmy=" . $row['ad'] . "\">" . get_nazev_firmy($row['ad']) . "</a>)</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Nenalezen žádný záznam.</p>";
    }
    echo "<div class=\"caradown\"></div>";
//osoba
    $result = dibi::query('SELECT * FROM [prevent_firmy_osoba] WHERE [jmeno] LIKE %s', "%" . $text . "%", 'ORDER BY %by', "jmeno", 'ASC');
    $pocet = $result->count();
    echo "<a name=\"osoba\"></a><h3>Osoby</h3>";
    if ($pocet > O) {
        echo "<p>Nalezeno " . $pocet . " záznamů.</p>";
        echo "<ul>";
        while ($row = $result->fetch()) {
            $result2 = dibi::query('SELECT * FROM [prevent_firmy_osoba_relace] WHERE [id_osoba] = %i', $row['id']);
            $row2 = $result2->fetch();
            if ($row2['objekt'] == "provozovna") {
                echo "<li><a href=\"./osoba.php?id=detaily&id_osoba=" . $row['id'] . "\">" . $row['jmeno'] . "</a> (klient: <a href=\"./firmy_koordinator.php?id=detaily_firmy&id_firmy=" . $row['id_firma'] . "\">" . get_nazev_firmy($row['id_firma']) . "</a>, pobočka: <a href=\"./firmy_koordinator.php?id=detaily_provozovny&id_firmy=" . $row['id_firma'] . "&id_provozovny=" . $row2['id_objekt'] . "\">" . get_nazev_provozovny($row2['id_objekt'], false) . "</a>)</li>";
            } else {
                echo "<li><a href=\"./osoba.php?id=detaily&id_osoba=" . $row['id'] . "\">" . $row['jmeno'] . "</a> (klient: <a href=\"./firmy_koordinator.php?id=detaily_firmy&id_firmy=" . $row['id_firma'] . "\">" . get_nazev_firmy($row['id_firma']) . "</a>)</li>";
            }
        }
        echo "</ul>";
    } else {
        echo "<p>Nenalezen žádný záznam.</p>";
    }
    echo "<div class=\"caradown\"></div>";
//budova
    $result = dibi::query('SELECT * FROM [prevent_firmy_budova] WHERE [jmeno] LIKE %s', "%" . $text . "%", 'ORDER BY %by', "jmeno", 'ASC');
    $pocet = $result->count();
    echo "<a name=\"budova\"></a><h3>Budovy</h3>";
    if ($pocet > O) {
        echo "<p>Nalezeno " . $pocet . " záznamů.</p>";
        echo "<ul>";
        while ($row = $result->fetch()) {
            echo "<li><a href=\"./budova.php?id=detaily&id_budova=" . $row['id'] . "\">" . $row['jmeno'] . "</a> (klient: <a href=\"./firmy_koordinator.php?id=detaily_firmy&id_firmy=" . get_id_firma_z_provozovny(get_id_provozovna_z_objekt("budova", $row['id'])) . "\">" . get_nazev_firmy(get_id_firma_z_objekt("budova", $row['id'])) . "</a>, pobočka: <a href=\"./firmy_koordinator.php?id=detaily_provozovny&id_firmy=" . get_id_firma_z_provozovny(get_id_provozovna_z_objekt("budova", $row['id'])) . "&id_provozovny=" . get_id_provozovna_z_objekt("budova", $row['id']) . "\">" . get_nazev_provozovny(get_id_provozovna_z_objekt("budova", $row['id']), false) . "</a>)</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Nenalezen žádný záznam.</p>";
    }
    echo "<div class=\"caradown\"></div>";
//pracoviste
    $result = dibi::query('SELECT * FROM [prevent_firmy_pracoviste] WHERE [jmeno] LIKE %s', "%" . $text . "%", 'ORDER BY %by', "jmeno", 'ASC');
    $pocet = $result->count();
    echo "<a name=\"pracoviste\"></a><h3>Pracoviště</h3>";
    if ($pocet > O) {
        echo "<p>Nalezeno " . $pocet . " záznamů.</p>";
        echo "<ul>";
        while ($row = $result->fetch()) {
            echo "<li><a href=\"./pracoviste.php?id=detaily&id_pracoviste=" . $row['id'] . "\">" . $row['jmeno'] . "</a> (klient: <a href=\"./firmy_koordinator.php?id=detaily_firmy&id_firmy=" . get_id_firma_z_provozovny(get_id_provozovna_z_objekt("pracoviste", $row['id'])) . "\">" . get_nazev_firmy(get_id_firma_z_objekt("pracoviste", $row['id'])) . "</a>, pobočka: <a href=\"./firmy_koordinator.php?id=detaily_provozovny&id_firmy=" . get_id_firma_z_provozovny(get_id_provozovna_z_objekt("budova", $row['id'])) . "&id_provozovny=" . get_id_provozovna_z_objekt("pracoviste", $row['id']) . "\">" . get_nazev_provozovny(get_id_provozovna_z_objekt("pracoviste", $row['id']), false) . "</a>)</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Nenalezen žádný záznam.</p>";
    }
    echo "<div class=\"caradown\"></div>";
}

function search_fce_technik($text) {
    echo "<p>Přejít na: <a href=\"#uzivatele\">uživatelé</a>, <a href=\"#firma\">klienti</a>, <a href=\"#provozovny\">pobočky</a>, <a href=\"#osoba\">osoby</a>, <a href=\"#budova\">budovy</a>, <a href=\"#pracoviste\">pracoviště</a></p>";
//uzivatele
    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [jmeno] LIKE %s', "%" . $text . "%", 'AND ([prava] = %s', "admin", 'OR [prava] = %s', "koordinator", 'OR [prava] = %s', "technik", ') ORDER BY %by', "jmeno", 'ASC');
    $pocet = $result->count();
    echo "<a name=\"uzivatele\"></a><h3>Uživatelé</h3>";
    echo "<h5>GUARD7</h5>";
    if ($pocet > O) {
        echo "<p>Nalezeno " . $pocet . " záznamů uživatelů GUARD7.</p>";
        echo "<ul>";
        while ($row = $result->fetch()) {

            echo "<li><a href=\"./uzivatele.php?id_uzivatele=" . $row['id'] . "\">" . $row['jmeno'] . "</a></li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Nenalezen žádný záznam uživatelů GUARD7.</p>";
    }

    $result = dibi::query('SELECT * FROM [prevent_firmy_technik] WHERE [id_technik] = %i', $_SESSION['id_usr']);
    $pocet = $result->count();
    if ($pocet > O) {
        while ($row = $result->fetch()) {
            $result1 = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [jmeno] LIKE %s', "%" . $text . "%", 'AND [ad] = %i', $row['id_firma'], 'ORDER BY %by', "jmeno", 'ASC');
            $pocet1 = $result1->count();
            echo "<h5>GUARD7</h5>";
            if ($pocet1 > O) {
                echo "<p>Nalezeno " . $pocet1 . " záznamů uživatelů klienta.</p>";
                echo "<ul>";
                while ($row1 = $result1->fetch()) {

                    echo "<li><a href=\"./uzivatele.php?id_uzivatele=" . $row1['id'] . "\">" . $row1['jmeno'] . "</a> (klient: <a href=\"./firmy_technik.php?id=detaily_firmy&id_firmy=" . $row1['ad'] . "\">" . get_nazev_firmy($row1['ad']) . ")</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>Nenalezen žádný záznam uživatelů klienta.</p>";
            }
        }
    } else {
        echo "<p>Nenalezen žádný záznam uživatelů klienta.</p>";
    }

    echo "<div class=\"caradown\"></div>";

//firma
    $result = dibi::query('SELECT * FROM [prevent_firmy_technik] WHERE [id_technik] = %i', $_SESSION['id_usr']);
    $pocet = $result->count();
    if ($pocet > O) {
        while ($row = $result->fetch()) {
            $result1 = dibi::query('SELECT * FROM [prevent_firmy] WHERE [nazev] LIKE %s', "%" . $text . "%", 'ORDER BY %by', "nazev", 'ASC');
            $pocet1 = $result1->count();
            echo "<a name=\"firma\"></a><h3>Klienti</h3>";
            if ($pocet1 > O) {
                echo "<p>Nalezeno " . $pocet1 . " záznamů.</p>";
                echo "<ul>";
                while ($row1 = $result1->fetch()) {
                    echo "<li><a href=\"./firmy_technik.php?id=detaily_firmy&id_firmy=" . $row1['id'] . "\">" . $row1['nazev'] . "</a></li>";
                }
                echo "</ul>";
            } else {
                echo "<p>Nenalezen žádný záznam.</p>";
            }
        }
    } else {
        echo "<p>Nenalezen žádný záznam.</p>";
    }
    echo "<div class=\"caradown\"></div>";

//provozovna
    $result = dibi::query('SELECT * FROM [prevent_firmy_technik] WHERE [id_technik] = %i', $_SESSION['id_usr']);
    $pocet = $result->count();
    if ($pocet > O) {
        while ($row = $result->fetch()) {
            $result1 = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [nazev] LIKE %s', "%" . $text . "%", 'AND [ad] = %i', $row['id_firma'], 'ORDER BY %by', "nazev", 'ASC');
            $pocet1 = $result1->count();
            echo "<a name=\"provozovny\"></a><h3>Pobočky</h3>";
            if ($pocet1 > O) {
                echo "<p>Nalezeno " . $pocet1 . " záznamů.</p>";
                echo "<ul>";
                while ($row1 = $result1->fetch()) {
                    echo "<li><a href=\"./firmy_technik.php?id=detaily_provozovny&id_firmy=" . $row1['ad'] . "&id_provozovny=" . $row1['id'] . "\">" . $row1['nazev'] . "</a> (klient: <a href=\"./firmy_technik.php?id=detaily_firmy&id_firmy=" . $row1['ad'] . "\">" . get_nazev_firmy($row1['ad']) . "</a>)</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>Nenalezen žádný záznam.</p>";
            }
        }
    } else {
        echo "<p>Nenalezen žádný záznam.</p>";
    }
    echo "<div class=\"caradown\"></div>";



//osoba
    $result = dibi::query('SELECT * FROM [prevent_firmy_technik] WHERE [id_technik] = %i', $_SESSION['id_usr']);
    $pocet = $result->count();
    if ($pocet > O) {
        while ($row = $result->fetch()) {
            $result1 = dibi::query('SELECT * FROM [prevent_firmy_osoba] WHERE [jmeno] LIKE %s', "%" . $text . "%", 'AND [id_firma] = %i', $row['id_firma'], 'ORDER BY %by', "jmeno", 'ASC');
            $pocet1 = $result1->count();
            echo "<a name=\"osoba\"></a><h3>Osoby</h3>";
            if ($pocet > O) {
                echo "<p>Nalezeno " . $pocet1 . " záznamů.</p>";
                echo "<ul>";
                while ($row1 = $result1->fetch()) {
                    $result2 = dibi::query('SELECT * FROM [prevent_firmy_osoba_relace] WHERE [id_osoba] = %i', $row1['id']);
                    $row2 = $result2->fetch();
                    if ($row2['objekt'] == "provozovna") {
                        echo "<li><a href=\"./osoba.php?id=detaily&id_osoba=" . $row1['id'] . "\">" . $row1['jmeno'] . "</a> (klient: <a href=\"./firmy_technik.php?id=detaily_firmy&id_firmy=" . $row1['id_firma'] . "\">" . get_nazev_firmy($row1['id_firma']) . "</a>, pobočka: <a href=\"./firmy_technik.php?id=detaily_provozovny&id_firmy=" . $row1['id_firma'] . "&id_provozovny=" . $row2['id_objekt'] . "\">" . get_nazev_provozovny($row2['id_objekt'], false) . "</a>)</li>";
                    } else {
                        echo "<li><a href=\"./osoba.php?id=detaily&id_osoba=" . $row1['id'] . "\">" . $row1['jmeno'] . "</a> (klient: <a href=\"./firmy_technik.php?id=detaily_firmy&id_firmy=" . $row1['id_firma'] . "\">" . get_nazev_firmy($row1['id_firma']) . "</a>)</li>";
                    }
                }
                echo "</ul>";
            } else {
                echo "<p>Nenalezen žádný záznam.</p>";
            }
        }
    } else {
        echo "<p>Nenalezen žádný záznam.</p>";
    }
    echo "<div class=\"caradown\"></div>";

//budova
    $result = dibi::query('SELECT * FROM [prevent_firmy_technik] WHERE [id_technik] = %i', $_SESSION['id_usr']);
    $pocet = $result->count();
    $ten_pocet = 0;
    echo "<a name=\"budova\"></a><h3>Budovy</h3>";
    if ($pocet > O) {
        while ($row = $result->fetch()) {
            $result1 = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $row['id_firma']);
            $pocet1 = $result1->count();
            if ($pocet1 > O) {
                while ($row1 = $result1->fetch()) {
                    $result2 = dibi::query('SELECT * FROM [prevent_firmy_budova_relace] WHERE [id_provozovna] = %i', $row1['id']);
                    $pocet2 = $result2->count();
                    if ($pocet2 > O) {
                        while ($row2 = $result2->fetch()) {
                            $result3 = dibi::query('SELECT * FROM [prevent_firmy_budova] WHERE [jmeno] LIKE %s', "%" . $text . "%", 'AND [id] = %i', $row2['id_budova'], 'ORDER BY %by', "jmeno", 'ASC');
                            $pocet3 = $result3->count();
                            if ($pocet3 > 0) {
                                echo "<ul>";
                                while ($row3 = $result3->fetch()) {
                                    $ten_pocet++;
                                    echo "<li><a href=\"./budova.php?id=detaily&id_budova=" . $row3['id'] . "\">" . $row3['jmeno'] . "</a> (klient: <a href=\"./firmy_technik.php?id=detaily_firmy&id_firmy=" . $row['id_firma'] . "\">" . get_nazev_firmy($row['id_firma']) . "</a>, pobočka: <a href=\"./firmy_technik.php?id=detaily_provozovny&id_firmy=" . $row['id_firma'] . "&id_provozovny=" . $row1['id'] . "\">" . get_nazev_provozovny($row1['id']) . "</a>)</li>";
                                }
                                echo "</ul>";
                            }
                        }
                    }
                }
            }
        }
    }
    if ($ten_pocet > O)
        echo "<p>Nalezeno " . $pocet . " záznamů.</p>";
    else
        echo "<p>Nenalezen žádný záznam.</p>";

    echo "<div class=\"caradown\"></div>";
//pracoviste
    $result = dibi::query('SELECT * FROM [prevent_firmy_technik] WHERE [id_technik] = %i', $_SESSION['id_usr']);
    $pocet = $result->count();
    $ten_pocet = 0;
    echo "<a name=\"pracoviste\"></a><h3>Pracoviště</h3>";
    if ($pocet > O) {
        while ($row = $result->fetch()) {
            $result1 = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $row['id_firma']);
            $pocet1 = $result1->count();
            if ($pocet1 > O) {
                while ($row1 = $result1->fetch()) {
                    $result2 = dibi::query('SELECT * FROM [prevent_firmy_pracoviste_relace] WHERE [id_provozovna] = %i', $row1['id']);
                    $pocet2 = $result2->count();
                    if ($pocet2 > O) {
                        while ($row2 = $result2->fetch()) {
                            $result3 = dibi::query('SELECT * FROM [prevent_firmy_pracoviste] WHERE [jmeno] LIKE %s', "%" . $text . "%", 'AND [id] = %i', $row2['id_pracoviste'], 'ORDER BY %by', "jmeno", 'ASC');
                            $pocet3 = $result3->count();
                            if ($pocet3 > 0) {
                                echo "<ul>";
                                while ($row3 = $result3->fetch()) {
                                    $ten_pocet++;
                                    echo "<li><a href=\"./pracoviste.php?id=detaily&id_pracoviste=" . $row3['id'] . "\">" . $row3['jmeno'] . "</a> (klient: <a href=\"./firmy_technik.php?id=detaily_firmy&id_firmy=" . $row['id_firma'] . "\">" . get_nazev_firmy($row['id_firma']) . "</a>, pobočka: <a href=\"./firmy_technik.php?id=detaily_provozovny&id_firmy=" . $row['id_firma'] . "&id_provozovny=" . $row1['id'] . "\">" . get_nazev_provozovny($row1['id']) . "</a>)</li>";
                                }
                                echo "</ul>";
                            }
                        }
                    }
                }
            }
        }
    }
    if ($ten_pocet > O)
        echo "<p>Nalezeno " . $pocet . " záznamů.</p>";
    else
        echo "<p>Nenalezen žádný záznam.</p>";

    echo "<div class=\"caradown\"></div>";
}
?>