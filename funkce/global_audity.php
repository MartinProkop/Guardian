<?php

function zprava_o_auditech_filtr($id, $objekt, $prava) {
    $nezahajene_technik = 0;
    $nedokoncene_technik = 0;
    $dokoncene_technik = 0;
    $nedokoncene_firma = 0;
    $potvrzene_firma = 0;
    $zamitle_firma = 0;
    $dokoncene = 0;
    if ($prava == "koordinator") {
        if ($objekt == "firma") {
            $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $id);
            while ($row = $result->fetch()) {
                $result2 = dibi::query('SELECT * FROM [prevent_audit] WHERE [id_provozovna] = %i', $row['id']);
                while ($row2 = $result2->fetch()) {
                    if ($row2['stav_technik'] == "nechce" || $row2['stav_technik'] == "neprijal") {
                        $nezahajene_technik++;
                    } elseif ($row2['stav_technik'] == "prijal") {
                        $nedokoncene_technik++;
                    } elseif ($row2['stav_technik'] == "provedl" && $row2['stav_firma'] == "neproveden") {
                        $dokoncene_technik++;
                    } elseif ($row2['stav_firma'] == "ceka") {
                        $nedokoncene_firma++;
                    } elseif ($row2['stav_firma'] == "potvrdil" && $row2['vytisknut'] != "ano") {
                        $potvrzene_firma++;
                    } elseif ($row2['stav_firma'] == "zamitnul" && $row2['vytisknut'] != "ano") {
                        $zamitle_firma++;
                    } elseif ($row2['vytisknut'] == "ano") {
                        $dokoncene++;
                    }
                }
            }
        } elseif ($objekt == "provozovna") {
            $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id_provozovna] = %i', $id);
            while ($row = $result->fetch()) {
                if ($row['stav_technik'] == "nechce" || $row['stav_technik'] == "neprijal") {
                    $nezahajene_technik++;
                } elseif ($row['stav_technik'] == "prijal") {
                    $nedokoncene_technik++;
                } elseif ($row['stav_technik'] == "provedl" && $row['stav_firma'] == "neproveden") {
                    $dokoncene_technik++;
                } elseif ($row['stav_firma'] == "ceka") {
                    $nedokoncene_firma++;
                } elseif ($row['stav_firma'] == "potvrdil" && $row['vytisknut'] != "ano") {
                    $potvrzene_firma++;
                } elseif ($row['stav_firma'] == "zamitnul" && $row['vytisknut'] != "ano") {
                    $zamitle_firma++;
                } elseif ($row['vytisknut'] == "ano") {
                    $dokoncene++;
                }
            }
        }
    } elseif ($prava == "technik") {
        if ($objekt == "firma") {
            $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $id);
            while ($row = $result->fetch()) {
                $result2 = dibi::query('SELECT * FROM [prevent_audit] WHERE [id_provozovna] = %i', $row['id'], 'AND [id_technik] = %i', $_SESSION['id_usr']);
                while ($row2 = $result2->fetch()) {
                    if ($row2['stav_technik'] == "nechce" || $row2['stav_technik'] == "neprijal") {
                        $nezahajene_technik++;
                    } elseif ($row2['stav_technik'] == "prijal") {
                        $nedokoncene_technik++;
                    } elseif ($row2['stav_technik'] == "provedl" && $row2['stav_firma'] == "neproveden") {
                        $dokoncene_technik++;
                    } elseif ($row2['stav_firma'] == "ceka") {
                        $nedokoncene_firma++;
                    } elseif ($row2['stav_firma'] == "potvrdil" && $row2['vytisknut'] != "ano") {
                        $potvrzene_firma++;
                    } elseif ($row2['stav_firma'] == "zamitnul" && $row2['vytisknut'] != "ano") {
                        $zamitle_firma++;
                    } elseif ($row2['vytisknut'] == "ano") {
                        $dokoncene++;
                    }
                }
            }
        } elseif ($objekt == "provozovna") {
            $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id_provozovna] = %i', $id, 'AND [id_technik] = %i', $_SESSION['id_usr']);
            while ($row = $result->fetch()) {
                if ($row['stav_technik'] == "nechce" || $row['stav_technik'] == "neprijal") {
                    $nezahajene_technik++;
                } elseif ($row['stav_technik'] == "prijal") {
                    $nedokoncene_technik++;
                } elseif ($row['stav_technik'] == "provedl" && $row['stav_firma'] == "neproveden") {
                    $dokoncene_technik++;
                } elseif ($row['stav_firma'] == "ceka") {
                    $nedokoncene_firma++;
                } elseif ($row['stav_firma'] == "potvrdil" && $row['vytisknut'] != "ano") {
                    $potvrzene_firma++;
                } elseif ($row['stav_firma'] == "zamitnul" && $row['vytisknut'] != "ano") {
                    $zamitle_firma++;
                } elseif ($row['vytisknut'] == "ano") {
                    $dokoncene++;
                }
            }
        }
    } elseif ($prava == "firma_admin") {
        if ($objekt == "provozovna") {
            $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id_provozovna] = %i', $id);
            while ($row = $result->fetch()) {
                if ($row['stav_technik'] == "nechce" || $row['stav_technik'] == "neprijal") {
                    $nezahajene_technik++;
                } elseif ($row['stav_technik'] == "prijal") {
                    $nedokoncene_technik++;
                } elseif ($row['stav_technik'] == "provedl" && $row['stav_firma'] == "neproveden") {
                    $dokoncene_technik++;
                } elseif ($row['stav_firma'] == "ceka") {
                    $nedokoncene_firma++;
                } elseif ($row['stav_firma'] == "potvrdil" && $row['vytisknut'] != "ano") {
                    $potvrzene_firma++;
                } elseif ($row['stav_firma'] == "zamitnul" && $row['vytisknut'] != "ano") {
                    $zamitle_firma++;
                } elseif ($row['vytisknut'] == "ano") {
                    $dokoncene++;
                }
            }
        }
    } elseif ($prava == "firma_normal") {
        if ($objekt == "provozovna") {
            $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id_provozovna] = %i', $id, 'AND [id_firemni_uzivatel] = %i', $_SESSION['id_usr']);
            while ($row = $result->fetch()) {
                if ($row['stav_technik'] == "nechce" || $row['stav_technik'] == "neprijal") {
                    $nezahajene_technik++;
                } elseif ($row['stav_technik'] == "prijal") {
                    $nedokoncene_technik++;
                } elseif ($row['stav_technik'] == "provedl" && $row['stav_firma'] == "neproveden") {
                    $dokoncene_technik++;
                } elseif ($row['stav_firma'] == "ceka") {
                    $nedokoncene_firma++;
                } elseif ($row['stav_firma'] == "potvrdil" && $row['vytisknut'] != "ano") {
                    $potvrzene_firma++;
                } elseif ($row['stav_firma'] == "zamitnul" && $row['vytisknut'] != "ano") {
                    $zamitle_firma++;
                } elseif ($row['vytisknut'] == "ano") {
                    $dokoncene++;
                }
            }
        }
    }
    return "[" . $nezahajene_technik . "/" . $nedokoncene_technik . "/" . $dokoncene_technik . "/" . $nedokoncene_firma . "/" . $potvrzene_firma . "/" . $zamitle_firma . "/" . $dokoncene . "]";
}

function zprava_o_auditech_filtr_vse($prava) {
    $nezahajene_technik = 0;
    $nedokoncene_technik = 0;
    $dokoncene_technik = 0;
    $nedokoncene_firma = 0;
    $potvrzene_firma = 0;
    $zamitle_firma = 0;
    $dokoncene = 0;
    if ($prava == "koordinator") {
        $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny]');
        while ($row = $result->fetch()) {
            $result2 = dibi::query('SELECT * FROM [prevent_audit] WHERE [id_provozovna] = %i', $row['id']);
            while ($row2 = $result2->fetch()) {
                if ($row2['stav_technik'] == "nechce" || $row2['stav_technik'] == "neprijal") {
                    $nezahajene_technik++;
                } elseif ($row2['stav_technik'] == "prijal") {
                    $nedokoncene_technik++;
                } elseif ($row2['stav_technik'] == "provedl" && $row2['stav_firma'] == "neproveden") {
                    $dokoncene_technik++;
                } elseif ($row2['stav_firma'] == "ceka") {
                    $nedokoncene_firma++;
                } elseif ($row2['stav_firma'] == "potvrdil" && $row2['vytisknut'] != "ano") {
                    $potvrzene_firma++;
                } elseif ($row2['stav_firma'] == "zamitnul" && $row2['vytisknut'] != "ano") {
                    $zamitle_firma++;
                } elseif ($row2['vytisknut'] == "ano") {
                    $dokoncene++;
                }
            }
        }
    } elseif ($prava == "technik") {
        $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny]');
        while ($row = $result->fetch()) {
            $result2 = dibi::query('SELECT * FROM [prevent_audit] WHERE [id_provozovna] = %i', $row['id'], 'AND [id_technik] = %i', $_SESSION['id_usr']);
            while ($row2 = $result2->fetch()) {
                if ($row2['stav_technik'] == "nechce" || $row2['stav_technik'] == "neprijal") {
                    $nezahajene_technik++;
                } elseif ($row2['stav_technik'] == "prijal") {
                    $nedokoncene_technik++;
                } elseif ($row2['stav_technik'] == "provedl" && $row2['stav_firma'] == "neproveden") {
                    $dokoncene_technik++;
                } elseif ($row2['stav_firma'] == "ceka") {
                    $nedokoncene_firma++;
                } elseif ($row2['stav_firma'] == "potvrdil" && $row2['vytisknut'] != "ano") {
                    $potvrzene_firma++;
                } elseif ($row2['stav_firma'] == "zamitnul" && $row2['vytisknut'] != "ano") {
                    $zamitle_firma++;
                } elseif ($row2['vytisknut'] == "ano") {
                    $dokoncene++;
                }
            }
        }
    } elseif ($prava == "firma_admin") {
        $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $_SESSION['firma_usr']);
        $row = $result->fetch();
        $result2 = dibi::query('SELECT * FROM [prevent_audit] WHERE [id_provozovna] = %i', $row['id']);
        while ($row2 = $result->fetch()) {
            if ($row2['stav_technik'] == "nechce" || $row2['stav_technik'] == "neprijal") {
                $nezahajene_technik++;
            } elseif ($row2['stav_technik'] == "prijal") {
                $nedokoncene_technik++;
            } elseif ($row2['stav_technik'] == "provedl" && $row2['stav_firma'] == "neproveden") {
                $dokoncene_technik++;
            } elseif ($row2['stav_firma'] == "ceka") {
                $nedokoncene_firma++;
            } elseif ($row2['stav_firma'] == "potvrdil" && $row2['vytisknut'] != "ano") {
                $potvrzene_firma++;
            } elseif ($row2['stav_firma'] == "zamitnul" && $row2['vytisknut'] != "ano") {
                $zamitle_firma++;
            } elseif ($row2['vytisknut'] == "ano") {
                $dokoncene++;
            }
        }
    } elseif ($prava == "firma_normal") {
        $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id_firemni_uzivatel] = %i', $_SESSION['id_usr']);
        while ($row = $result->fetch()) {
            if ($row['stav_technik'] == "nechce" || $row['stav_technik'] == "neprijal") {
                $nezahajene_technik++;
            } elseif ($row['stav_technik'] == "prijal") {
                $nedokoncene_technik++;
            } elseif ($row['stav_technik'] == "provedl" && $row['stav_firma'] == "neproveden") {
                $dokoncene_technik++;
            } elseif ($row['stav_firma'] == "ceka") {
                $nedokoncene_firma++;
            } elseif ($row['stav_firma'] == "potvrdil" && $row['vytisknut'] != "ano") {
                $potvrzene_firma++;
            } elseif ($row['stav_firma'] == "zamitnul" && $row['vytisknut'] != "ano") {
                $zamitle_firma++;
            } elseif ($row['vytisknut'] == "ano") {
                $dokoncene++;
            }
        }
    }
    return "[" . $nezahajene_technik . "/" . $nedokoncene_technik . "/" . $dokoncene_technik . "/" . $nedokoncene_firma . "/" . $potvrzene_firma . "/" . $zamitle_firma . "/" . $dokoncene . "]";
}

function o_auditech_filtr($prava, $co) {
    $nezahajene_technik = 0;
    $nedokoncene_technik = 0;
    $dokoncene_technik = 0;
    $nedokoncene_firma = 0;
    $potvrzene_firma = 0;
    $zamitle_firma = 0;
    $dokoncene = 0;
    if ($prava == "koordinator") {
        $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny]');
        while ($row = $result->fetch()) {
            $result2 = dibi::query('SELECT * FROM [prevent_audit] WHERE [id_provozovna] = %i', $row['id']);
            while ($row2 = $result2->fetch()) {
                if ($row2['stav_technik'] == "nechce" || $row2['stav_technik'] == "neprijal") {
                    $nezahajene_technik++;
                } elseif ($row2['stav_technik'] == "prijal") {
                    $nedokoncene_technik++;
                } elseif ($row2['stav_technik'] == "provedl" && $row2['stav_firma'] == "neproveden") {
                    $dokoncene_technik++;
                } elseif ($row2['stav_firma'] == "ceka") {
                    $nedokoncene_firma++;
                } elseif ($row2['stav_firma'] == "potvrdil" && $row2['vytisknut'] != "ano") {
                    $potvrzene_firma++;
                } elseif ($row2['stav_firma'] == "zamitnul" && $row2['vytisknut'] != "ano") {
                    $zamitle_firma++;
                } elseif ($row2['vytisknut'] == "ano") {
                    $dokoncene++;
                }
            }
        }
    } elseif ($prava == "technik") {
        $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny]');
        while ($row = $result->fetch()) {
            $result2 = dibi::query('SELECT * FROM [prevent_audit] WHERE [id_provozovna] = %i', $row['id'], 'AND [id_technik] = %i', $_SESSION['id_usr']);
            while ($row2 = $result2->fetch()) {
                if ($row2['stav_technik'] == "nechce" || $row2['stav_technik'] == "neprijal") {
                    $nezahajene_technik++;
                } elseif ($row2['stav_technik'] == "prijal") {
                    $nedokoncene_technik++;
                } elseif ($row2['stav_technik'] == "provedl" && $row2['stav_firma'] == "neproveden") {
                    $dokoncene_technik++;
                } elseif ($row2['stav_firma'] == "ceka") {
                    $nedokoncene_firma++;
                } elseif ($row2['stav_firma'] == "potvrdil" && $row2['vytisknut'] != "ano") {
                    $potvrzene_firma++;
                } elseif ($row2['stav_firma'] == "zamitnul" && $row2['vytisknut'] != "ano") {
                    $zamitle_firma++;
                } elseif ($row2['vytisknut'] == "ano") {
                    $dokoncene++;
                }
            }
        }
    } elseif ($prava == "firma_admin") {
        $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $_SESSION['firma_usr']);
        $row = $result->fetch();
        $result2 = dibi::query('SELECT * FROM [prevent_audit] WHERE [id_provozovna] = %i', $row['id']);
        while ($row2 = $result->fetch()) {
            if ($row2['stav_technik'] == "nechce" || $row2['stav_technik'] == "neprijal") {
                $nezahajene_technik++;
            } elseif ($row2['stav_technik'] == "prijal") {
                $nedokoncene_technik++;
            } elseif ($row2['stav_technik'] == "provedl" && $row2['stav_firma'] == "neproveden") {
                $dokoncene_technik++;
            } elseif ($row2['stav_firma'] == "ceka") {
                $nedokoncene_firma++;
            } elseif ($row2['stav_firma'] == "potvrdil" && $row2['vytisknut'] != "ano") {
                $potvrzene_firma++;
            } elseif ($row2['stav_firma'] == "zamitnul" && $row2['vytisknut'] != "ano") {
                $zamitle_firma++;
            } elseif ($row2['vytisknut'] == "ano") {
                $dokoncene++;
            }
        }
    } elseif ($prava == "firma_normal") {
        $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id_firemni_uzivatel] = %i', $_SESSION['id_usr']);
        while ($row = $result->fetch()) {
            if ($row['stav_technik'] == "nechce" || $row['stav_technik'] == "neprijal") {
                $nezahajene_technik++;
            } elseif ($row['stav_technik'] == "prijal") {
                $nedokoncene_technik++;
            } elseif ($row['stav_technik'] == "provedl" && $row['stav_firma'] == "neproveden") {
                $dokoncene_technik++;
            } elseif ($row['stav_firma'] == "ceka") {
                $nedokoncene_firma++;
            } elseif ($row['stav_firma'] == "potvrdil" && $row['vytisknut'] != "ano") {
                $potvrzene_firma++;
            } elseif ($row['stav_firma'] == "zamitnul" && $row['vytisknut'] != "ano") {
                $zamitle_firma++;
            } elseif ($row['vytisknut'] == "ano") {
                $dokoncene++;
            }
        }
    }

    if ($co == "nezahajene_technik")
        return $nezahajene_technik;
    elseif ($co == "nedokoncene_technik")
        return $nedokoncene_technik;
    elseif ($co == "dokoncene_technik")
        return $dokoncene_technik;
    elseif ($co == "nedokoncene_firma")
        return $nedokoncene_firma;
    elseif ($co == "potvrzene_firma")
        return $potvrzene_firma;
    elseif ($co == "zamitle_firma")
        return $zamitle_firma;
    elseif ($co == "dokoncene")
        return $dokoncene;
}

//true = muze, false = nemuze;
function prava_k_auditu($id_audit, $id_usr) {
    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $id_usr);
    $row = $result->fetch();
    $result2 = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id_audit);
    $row2 = $result2->fetch();

    if ($row['prava'] == "koordinator" || $row['prava'] == "admin") {
        return true;
    } elseif ($row['prava'] == "technik") {
        if ($row2['id_technik'] == $id_usr)
            return true;
        else
            return false;
    }
    elseif ($row['prava'] == "firma") {
        $true = false;
        $result3 = dibi::query('SELECT * FROM [prevent_firmy_uzivatele_prava] WHERE [id_uzivatel] = %i', $id_usr);
        while ($row3 = $result3->fetch()) {

            if ($row3['prava'] == "admin" && $row['ad'] == get_id_firma_z_audit($id_audit)) {
//admin firmy
                $true = true;
            } elseif ($row2['id_firemni_uzivatel'] == $id_usr) {
//prideleno firm userovi
                $true = true;
            }
        }
        return $true;
    }
}

function get_id_provozovna_z_audit($id_audit) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id_audit);
    $row = $result->fetch();
    return $row['id_provozovna'];
}

function get_id_firma_z_audit($id_audit) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id_audit);
    $row = $result->fetch();
    $result2 = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [id] = %i', $row['id_provozovna']);
    $row2 = $result2->fetch();

    return $row2['ad'];
}

function menu_audit($id_audit, $prava) {
    if ($prava == "admin")
        $prava = "koordinator";
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id_audit);
    $row = $result->fetch();
    if ($row['stav_technik'] == "neprijal") {
        if ($prava == "koordinator") {
            echo "<a href=\"./sprava_auditu.php?id=upravit_audit&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&upravit_audit=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"upravit\" title=\"upravit\"/></a><br />";
        } elseif ($prava == "technik") {
            echo "<a href=\"./sprava_auditu.php?id=detaily_auditu&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&audit=" . $row['id'] . "&prijmout_audit=" . $row['id'] . "\" onclick=\"if(confirm('Přijímáte audit?')) location.href='./sprava_auditu.php?id=detaily_auditu&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&audit=" . $row['id'] . "&prijmout_audit=" . $row['id'] . "'; return(false);\"><img src=\"./design/true.png\" alt=\"přijmout\" title=\"přijmout\"/></a</a><br />";
            echo "<a href=\"./sprava_auditu.php?id=detaily_auditu&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&audit=" . $row['id'] . "&neprijmout_audit=" . $row['id'] . "\" onclick=\"if(confirm('Nepřijímáte audit? Okomentujte prosím audit a v komentáři vysvětlete důvod pro nepřijetí auditu.')) location.href='./sprava_auditu.php?id=detaily_auditu&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&audit=" . $row['id'] . "&neprijmout_audit=" . $row['id'] . "'; return(false);\"><img src=\"./design/false.png\" alt=\"nepřijmout\" title=\"nepřijmout\"/></a><br />";
        } elseif ($prava == "firma_admin") {
            echo "<a href=\"./sprava_auditu.php?id=upravit_audit_firma&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&upravit_audit_firma=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"upravit\" title=\"upravit\"/></a><br />";
        } elseif ($prava == "firma_normal") {
            echo "<a href=\"./sprava_auditu.php?id=komentovat_audit_firma&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&komentovat_audit_firma=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"komentovat\" title=\komentovat\"/></a></a><br />";
        }
    } elseif ($row['stav_technik'] == "prijal") {
        if ($prava == "koordinator") {
            echo "<a href=\"./sprava_auditu.php?id=upravit_audit&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&upravit_audit=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"upravit\" title=\"upravit\"/></a><br />";
            if ($row['synchronizace'] == "local") {

            } elseif ($row['synchronizace'] == "nelze") {
                echo "<a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $row['id'] . "\"><img src=\"./design/true.png\" alt=\"provést\" title=\"provést\"/></a><br />";
            } else {
                echo "<a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $row['id'] . "\" onclick=\"if(confirm('Skutečně provést audit? (již nebude možno ho exportovat!)')) location.href='./provest_audit.php?id=vybrat_oblast&id_audit=" . $row['id'] . "'; return(false);\"><img src=\"./design/true.png\" alt=\"provést\" title=\"provést\"/></a><br />";
            }
        } elseif ($prava == "technik") {
            echo "<a href=\"./sprava_auditu.php?id=komentovat_audit&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&komentovat_audit=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"komentovat\" title=\komentovat\"/></a><br />";
            if ($row['synchronizace'] == "local") {
                $result_exporty = dibi::query('SELECT * FROM [prevent_audit_exporty] WHERE [id_audit] = %i', $row['id']);
                $row_exporty = $result_exporty->fetch();
                echo "<a href=\"./synchronizace.php?id=import&id_audit=" . $row['id'] . "\">importovat</a><br />";
                echo "<a href=\"./" . $row_exporty['cesta'] . "\">stáhnout exportovaný soubor</a><br />";
            } elseif ($row['synchronizace'] == "nelze") {
                echo "<a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $row['id'] . "\"><img src=\"./design/true.png\" alt=\"provést\" title=\"provést\"/></a><br />";
            } else {
                echo "<a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $row['id'] . "\" onclick=\"if(confirm('Skutečně provést audit? (již nebude možno ho exportovat!)')) location.href='./provest_audit.php?id=vybrat_oblast&id_audit=" . $row['id'] . "'; return(false);\">provést</a><br />";
            }
        } elseif ($prava == "firma_admin") {
            echo "<a href=\"./sprava_auditu.php?id=upravit_audit_firma&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&upravit_audit_firma=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"upravit\" title=\"upravit\"/></a><br />";
        } elseif ($prava == "firma_normal") {
            echo "<a href=\"./sprava_auditu.php?id=komentovat_audit_firma&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&komentovat_audit_firma=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"komentovat\" title=\komentovat\"/></a><br />";
        }
    } elseif ($row['stav_technik'] == "provedl" && $row['stav_firma'] == "neproveden") {
        if ($prava == "koordinator") {
            echo "<a href=\"./sprava_auditu.php?id=upravit_audit&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&upravit_audit=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"upravit\" title=\"upravit\"/></a><br />";
            echo "<a href=\"./nahled_audit.php?id=vybrat_oblast&id_audit=" . $row['id'] . "\"><img src=\"./design/nahled.png\" alt=\"náhled\" title=\"náhled\"/></a><br />";
        } elseif ($prava == "technik") {
            echo "<a href=\"./sprava_auditu.php?id=komentovat_audit&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&komentovat_audit=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"komentovat\" title=\komentovat\"/></a><br />";
            echo "<a href=\"./nahled_audit.php?id=vybrat_oblast&id_audit=" . $row['id'] . "\"><img src=\"./design/nahled.png\" alt=\"náhled\" title=\"náhled\"/></a><br />";
        } elseif ($prava == "firma_admin") {
            echo "<a href=\"./sprava_auditu.php?id=upravit_audit_firma&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&upravit_audit_firma=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"upravit\" title=\"upravit\"/></a><br />";
        } elseif ($prava == "firma_normal") {
            echo "<a href=\"./sprava_auditu.php?id=komentovat_audit_firma&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&komentovat_audit_firma=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"komentovat\" title=\komentovat\"/></a><br />";
        }
    } elseif ($row['stav_firma'] == "ceka") {
        if ($prava == "koordinator") {
            echo "<a href=\"./sprava_auditu.php?id=upravit_audit&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&upravit_audit=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"upravit\" title=\"upravit\"/></a><br />";
            echo "<a href=\"./nahled_audit.php?id=vybrat_oblast&id_audit=" . $row['id'] . "\"><img src=\"./design/nahled.png\" alt=\"náhled\" title=\"náhled\"/></a><br />";
        } elseif ($prava == "technik") {
            echo "<a href=\"./sprava_auditu.php?id=komentovat_audit&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&komentovat_audit=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"komentovat\" title=\komentovat\"/></a><br />";
            echo "<a href=\"./nahled_audit.php?id=vybrat_oblast&id_audit=" . $row['id'] . "\"><img src=\"./design/nahled.png\" alt=\"náhled\" title=\"náhled\"/></a><br />";
        } elseif ($prava == "firma_admin") {
//            echo "<a href=\"./sprava_auditu.php?id=upravit_audit_firma&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&upravit_audit_firma=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"upravit\" title=\"upravit\"/></a><br />";
//            echo "<a href=\"./nahled_audit.php?id=vybrat_oblast&id_audit=" . $row['id'] . "\"><img src=\"./design/nahled.png\" alt=\"náhled\" title=\"náhled\"/></a><br />";
        } elseif ($prava == "firma_normal") {
//            echo "<a href=\"./sprava_auditu.php?id=komentovat_audit_firma&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&komentovat_audit_firma=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"komentovat\" title=\komentovat\"/></a><br />";
//            echo "<a href=\"./nahled_audit.php?id=vybrat_oblast&id_audit=" . $row['id'] . "\"><img src=\"./design/nahled.png\" alt=\"náhled\" title=\"náhled\"/></a><br />";
        }
    } elseif ($row['stav_firma'] == "potvrdil" && $row['vytisknut'] != "ano") {
        if ($prava == "koordinator") {
            echo "<a href=\"./sprava_auditu.php?id=upravit_audit&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&upravit_audit=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"upravit\" title=\"upravit\"/></a><br />";
            echo "<a href=\"./nahled_audit.php?id=vybrat_oblast&id_audit=" . $row['id'] . "\"><img src=\"./design/nahled.png\" alt=\"náhled\" title=\"náhled\"/></a><br />";
            //echo "<a href=\"./sprava_auditu.php?id=tisk&id_audit=" . $row['id'] . "\">tisk</a><br />";
        } elseif ($prava == "technik") {
            echo "<a href=\"./sprava_auditu.php?id=komentovat_audit&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&komentovat_audit=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"komentovat\" title=\komentovat\"/></a><br />";
            echo "<a href=\"./nahled_audit.php?id=vybrat_oblast&id_audit=" . $row['id'] . "\"><img src=\"./design/nahled.png\" alt=\"náhled\" title=\"náhled\"/></a><br />";
        } elseif ($prava == "firma_admin") {
//            echo "<a href=\"./sprava_auditu.php?id=upravit_audit_firma&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&upravit_audit_firma=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"upravit\" title=\"upravit\"/></a><br />";
//            echo "<a href=\"./nahled_audit.php?id=vybrat_oblast&id_audit=" . $row['id'] . "\"><img src=\"./design/nahled.png\" alt=\"náhled\" title=\"náhled\"/></a><br />";
        } elseif ($prava == "firma_normal") {
//            echo "<a href=\"./sprava_auditu.php?id=komentovat_audit_firma&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&komentovat_audit_firma=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"komentovat\" title=\komentovat\"/></a><br />";
//            echo "<a href=\"./nahled_audit.php?id=vybrat_oblast&id_audit=" . $row['id'] . "\"><img src=\"./design/nahled.png\" alt=\"náhled\" title=\"náhled\"/></a><br />";
        }
    } elseif ($row['stav_firma'] == "zamitl" && $row['vytisknut'] != "ano") {
        if ($prava == "koordinator") {
            echo "<a href=\"./sprava_auditu.php?id=upravit_audit&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&upravit_audit=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"upravit\" title=\"upravit\"/></a><br />";
            echo "<a href=\"./nahled_audit.php?id=vybrat_oblast&id_audit=" . $row['id'] . "\"><img src=\"./design/nahled.png\" alt=\"náhled\" title=\"náhled\"/></a><br />";
        } elseif ($prava == "technik") {
            echo "<a href=\"./sprava_auditu.php?id=komentovat_audit&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&komentovat_audit=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"komentovat\" title=\komentovat\"/></a><br />";
            echo "<a href=\"./nahled_audit.php?id=vybrat_oblast&id_audit=" . $row['id'] . "\"><img src=\"./design/nahled.png\" alt=\"náhled\" title=\"náhled\"/></a><br />";
        } elseif ($prava == "firma_admin") {
//            echo "<a href=\"./sprava_auditu.php?id=upravit_audit_firma&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&upravit_audit_firma=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"upravit\" title=\"upravit\"/></a><br />";
//            echo "<a href=\"./nahled_audit.php?id=vybrat_oblast&id_audit=" . $row['id'] . "\"><img src=\"./design/nahled.png\" alt=\"náhled\" title=\"náhled\"/></a><br />";
        } elseif ($prava == "firma_normal") {
//            echo "<a href=\"./sprava_auditu.php?id=komentovat_audit_firma&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&komentovat_audit_firma=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"komentovat\" title=\komentovat\"/></a><br />";
//            echo "<a href=\"./nahled_audit.php?id=vybrat_oblast&id_audit=" . $row['id'] . "\"><img src=\"./design/nahled.png\" alt=\"náhled\" title=\"náhled\"/></a><br />";
        }
    } elseif ($row['vytisknut'] == "ano") {
        if ($prava == "koordinator") {
            echo "<a href=\"./sprava_auditu.php?id=upravit_audit&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&upravit_audit=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"upravit\" title=\"upravit\"/></a><br />";
            echo "<a href=\"./nahled_audit.php?id=vybrat_oblast&id_audit=" . $row['id'] . "\"><img src=\"./design/nahled.png\" alt=\"náhled\" title=\"náhled\"/></a><br />";
            echo " <a href=\"./stahnout.php?id=audit_data&id_audit=" . $row['id'] . "\" target=\"_blank\">stáhnout protokoly</a><br /><a href=\"./stahnout.php?id=audit_fotografie&id_audit=" . $row['id'] . "\" target=\"_blank\">stáhnout fotografie</a><br />";
        } elseif ($prava == "technik") {
            echo "<a href=\"./sprava_auditu.php?id=komentovat_audit&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&komentovat_audit=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"komentovat\" title=\komentovat\"/></a><br />";
            echo "<a href=\"./nahled_audit.php?id=vybrat_oblast&id_audit=" . $row['id'] . "\"><img src=\"./design/nahled.png\" alt=\"náhled\" title=\"náhled\"/></a><br />";
            echo " <a href=\"./stahnout.php?id=audit_data&id_audit=" . $row['id'] . "\" target=\"_blank\">stáhnout protokoly</a><br /><a href=\"./stahnout.php?id=audit_fotografie&id_audit=" . $row['id'] . "\" target=\"_blank\">stáhnout fotografie</a><br />";
        } elseif ($prava == "firma_admin") {
//            echo "<a href=\"./sprava_auditu.php?id=upravit_audit_firma&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&upravit_audit_firma=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"upravit\" title=\"upravit\"/></a><br />";
//            echo "<a href=\"./nahled_audit.php?id=vybrat_oblast&id_audit=" . $row['id'] . "\"><img src=\"./design/nahled.png\" alt=\"náhled\" title=\"náhled\"/></a><br />";
//            echo " <a href=\"./stahnout.php?id=audit_data&id_audit=" . $row['id'] . "\" target=\"_blank\">stáhnout protokoly</a><br /><a href=\"./stahnout.php?id=audit_fotografie&id_audit=" . $row['id'] . "\" target=\"_blank\">stáhnout fotografie</a><br />";
        } elseif ($prava == "firma_normal") {
//            echo "<a href=\"./sprava_auditu.php?id=komentovat_audit_firma&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&komentovat_audit_firma=" . $row['id'] . "\"><img src=\"./design/edit.png\" alt=\"komentovat\" title=\komentovat\"/></a><br />";
//            echo "<a href=\"./nahled_audit.php?id=vybrat_oblast&id_audit=" . $row['id'] . "\"><img src=\"./design/nahled.png\" alt=\"náhled\" title=\"náhled\"/></a><br />";
//            echo " <a href=\"./stahnout.php?id=audit_data&id_audit=" . $row['id'] . "\" target=\"_blank\">stáhnout protokoly</a><br /><a href=\"./stahnout.php?id=audit_fotografie&id_audit=" . $row['id'] . "\" target=\"_blank\">stáhnout fotografie</a><br />";
        }
    }
    if ($prava != "firma_admin" && $prava != "firma_normal")
        echo "<a href=\"./sprava_auditu.php?id=detaily_auditu&firma=" . get_id_firma_z_provozovny($row['id_provozovna']) . "&provozovna=" . $row['id_provozovna'] . "&audit=" . $row['id'] . "\"><img src=\"./design/detaily.png\" alt=\"detaily\" title=\"detaily\"/></a>";
    else
        echo "Žádné";
}

function stav_audit($id_audit) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id_audit);
    $row = $result->fetch();
    if ($row['vytisknut'] == "ano") {
        echo "<td class=\"green\">dokončen a vytisknut<br />" . Date("H:i:s d.m.Y", $row['date_vytisknut']) . "<br />(#" . $row['id'] . ")</td>";
    } elseif ($row['stav_technik'] == "provedl") {
        echo "<td class=\"orange\">dokončen a připomínkován<br />" . Date("H:i:s d.m.Y", $row['date_technik_prijal_provedl']) . "<br />(#" . $row['id'] . ")</td>";
    } elseif ($row['stav_technik'] == "prijal") {
        echo "<td class=\"orange\">nedokončen<br />" . Date("H:i:s d.m.Y", $row['date_technik_prijal_provedl']) . "<br />(#" . $row['id'] . ")</td>";
    } elseif ($row['stav_technik'] == "nechce" || $row['stav_technik'] == "neprijal") {
        echo "<td class=\"red\">nezahájen<br />(#" . $row['id'] . ")</td>";
    }
}

function stav_audit_technik($id_audit) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id_audit);
    $row = $result->fetch();
    if ($row['stav_technik'] == "provedl") {
        echo "<td class=\"green\">dokončen<br />" . Date("H:i:s d.m.Y", $row['date_technik_prijal_provedl']) . "</td>";
    } elseif ($row['stav_technik'] == "prijal") {
        echo "<td class=\"orange\">nedokončen<br />" . Date("H:i:s d.m.Y", $row['date_technik_prijal_provedl']) . "</td>";
    } elseif ($row['stav_technik'] == "nechce" || $row['stav_technik'] == "neprijal") {
        echo "<td class=\"red\">nezahájen<br /></td>";
    }
}

function stav_audit_firma($id_audit) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id_audit);
    $row = $result->fetch();
    if ($row['stav_firma'] == "neproveden" && $row['stav_technik'] == "provedl") {
        echo "<td class=\"red\">čeká na koordinátora</td>";
    } elseif ($row['stav_firma'] == "neproveden") {
        echo "<td class=\"red\">čeká na technika</td>";
    } elseif ($row['stav_firma'] == "ceka") {
        echo "<td class=\"orange\">nepřipomínkoval</td>";
    } elseif ($row['stav_firma'] == "potvrdil") {
        echo "<td class=\"green\">potvrdil<br />" . Date("H:i:s d.m.Y", $row['date_zakaznik_potvrdil']) . "</td>";
    } elseif ($row['stav_firma'] == "zamitl") {
        echo "<td class=\"red\">zamítl<br />" . Date("H:i:s d.m.Y", $row['date_zakaznik_potvrdil']) . "</td>";
    }
}

function stav_audit_vyvoj($id_audit, $link = false, $adr = null) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id_audit);
    $row = $result->fetch();

    if ($row['stav_kontrola_pobocka'] == "neuzavren" || $row['stav_technik'] == "nechce" || $row['stav_technik'] == "neprijal") {
        if ($link)
            $text4e = "<li><a href=\"./" . $adr . ".php?id=udaje&id_audit=" . $id_audit . "\">Údaje: nezkontrolováno</a></li>";
        else
            $text4e = "Údaje: nezkontrolováno";
        $signal4e = false;
    } else {
        if ($link)
            $text4e = "<li><a href=\"./" . $adr . ".php?id=udaje&id_audit=" . $id_audit . "\">Údaje: zkontrolováno (" . Date("H:i:s d.m.Y", $row['date_kontrola_pobocka']) . ")</a></li>";
        else
            $text4e = "Údaje: zkontrolováno (" . Date("H:i:s d.m.Y", $row['date_kontrola_pobocka']) . ")";
        $signal4e = true;
    }

    if (!checklistu_zpracovan($id_audit) || $row['stav_technik'] == "nechce" || $row['stav_technik'] == "neprijal") {
        if ($link)
            $text4a = "<li><a href=\"./" . $adr . ".php?id=checklist&id_audit=" . $id_audit . "\">Checklist: nezpracován</a></li>";
        else
            $text4a = "<br />Checklist: nezpracován";
        $signal4a = false;
    } else {
        if ($link)
            $text4a = "<li><a href=\"./" . $adr . ".php?id=checklist&id_audit=" . $id_audit . "\">Checklist: zpracován (" . Date("H:i:s d.m.Y", $row['date_stav_checklist']) . ")</a></li>";
        else
            $text4a = "<br />Checklist: zpracován (" . Date("H:i:s d.m.Y", $row['date_stav_checklist']) . ")";
        $signal4a = true;
    }

    if (!pracoviste_zpracovano($id_audit) || $row['stav_technik'] == "nechce" || $row['stav_technik'] == "neprijal") {
        if ($link)
            $text4b = "<li><a href=\"./" . $adr . ".php?id=pracoviste&id_audit=" . $id_audit . "\">Pracoviště: nezpracováno";
        else
            $text4b = "<br />Pracoviště: nezpracováno";

        $signal4b = false;
    } else {
        if ($link)
            $text4b = "<li><a href=\"./" . $adr . ".php?id=pracoviste&id_audit=" . $id_audit . "\">Pracoviště:  zpracováno  (" . Date("H:i:s d.m.Y", $row['date_stav_pracoviste']) . ")</a></li>";
        else
            $text4b = "<br/>Pracoviště: zpracováno (" . Date("H:i:s d.m.Y", $row['date_stav_pracoviste']) . ")";
        $signal4b = true;
    }

    if (!neshody_zpracovano($id_audit) || $row['stav_technik'] == "nechce" || $row['stav_technik'] == "neprijal") {
        if ($link)
            $text4c = "<li><a href=\"./" . $adr . ".php?id=neshody&id_audit=" . $id_audit . "\">Neshody: nezpracováno</a></li>";
        else
            $text4c = "<br />Neshody: nezpracováno";
        $signal4c = false;
    } else {
        if ($link)
            $text4c = "<li><a href=\"./" . $adr . ".php?id=neshody&id_audit=" . $id_audit . "\">Neshody: zpracováno (" . Date("H:i:s d.m.Y", $row['date_stav_neshody']) . ")</a></li>";
        else
            $text4c = "<br/>Neshody: zpracováno (" . Date("H:i:s d.m.Y", $row['date_stav_neshody']) . ")";
        $signal4c = true;
    }

    $resultx = dibi::query('SELECT * FROM [prevent_audit_protokoly] WHERE [id_audit] = %i', $id_audit);
    $rowx = $resultx->fetch();

    if ($rowx['stav_celek'] != "zpracovano" || $row['stav_technik'] == "nechce" || $row['stav_technik'] == "neprijal") {
        $signal4d = false;
        if ($link)
            $text4d = $text4d . "<li><a href=\"./" . $adr . ".php?id=protokoly&id_audit=" . $id_audit . "\">Komentář: nezpracováno</a></li>";
        else
            $text4d = $text4d . "<br/>Komentář: nezpracováno";
    } elseif ($rowx['stav_celek'] == "zpracovano") {
        $signal4d = true;
        if ($link)
            $text4d = $text4d . "<li><a href=\"./" . $adr . ".php?id=protokoly&id_audit=" . $id_audit . "\">Komentář: hotovo (" . Date("H:i:s d.m.Y", $rowx['date']) . ")</a></li>";
        else
            $text4d = $text4d . "<br/>Komentář: hotovo (" . Date("H:i:s d.m.Y", $rowx['date']) . ")";
    }

    $text4 = $text4e . $text4a . $text4b . $text4c . $text4d;
    if ($link)
        echo "<ul>";
    if ($signal4e && $signal4a && $signal4b && $signal4c && $signal4d)
        echo "<td class=\"green\">" . $text4 . "</td>";
    elseif ($signal4e || $signal4a || $signal4b || $signal4c || $signal4d)
        echo "<td class=\"orange\">" . $text4 . "</td>";
    else
        echo "<td class=\"red\">" . $text4 . "</td>";

    if ($link)
        echo "</ul>";
}

function echo_nahled_audit($id_audit, $prava = "koordinator") {
    echo "<table class=\"table\">
		<tr>
		<td><span class=\"subheader\">STAV<br />(#id)</span></td>
		<td><span class=\"subheader\">STAV<br />TECHNIK</span></td>
		<td><span class=\"subheader\">STAV<br />klient</span></td>
                <td><span class=\"subheader\">vývoj</span></td>
                <td><span class=\"subheader\">AKCE</span></td>
                <td><span class=\"subheader\">název</span></td>
                <td><span class=\"subheader\">klient</span></td>
                <td><span class=\"subheader\">pobočka</span></td>
		<td><span class=\"subheader\">ZMĚNA</span></td>
		<td><span class=\"subheader\">TYP</span></td>
                <td><span class=\"subheader\">technik</span></td>
		<td><span class=\"subheader\">klient</span></td>
		</tr>";
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id_audit);
    $row = $result->fetch();
    echo "
			<tr>";
    stav_audit($row['id']);
    stav_audit_technik($row['id']);
    stav_audit_firma($row['id']);
    stav_audit_vyvoj($row['id']);
    echo "<td>";
    menu_audit($row['id'], $prava);
    echo "</td>
        <td>" . $row['nazev'] . "</td>
			<td>" . get_nazev_firmy(get_id_firma_z_provozovny($row['id_provozovna'])) . "</td>
                        <td>" . get_nazev_provozovny($row['id_provozovna'], false) . "</td>
                        <td>" . Date("H:i:s d.m.Y", $row['date']) . "</td>";
    if ($prava == "koordinator" || $prava == "admin")
        echo "<td>" . $row['typ'] . "<br />(<a href=\"./audit_schema_nahled.php?typ=" . $row['typ'] . "&verze=" . $row['verze'] . "\" target=\"_blank\">" . get_info_verze($row['verze']) . "</a>)</td>";
    else
        echo "<td>" . $row['typ'] . "<br />(" . get_info_verze($row['verze']) . ")</td>";

    echo "<td>" . get_jmeno_uzivatele_z_id($row['id_technik']) . "</td>
			<td>" . get_jmeno_uzivatele_z_id($row['id_firemni_uzivatel']) . "</td>
                        </tr>";

    echo "</table>";
}

function povolit_krok($id_audit, $krok) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id_audit);
    $row = $result->fetch();

    if ($row['stav_technik'] == "prijal") {
        if ($krok == "udaje") {
            return true;
        } elseif ($krok == "checklist") {
            if ($row['stav_kontrola_pobocka'] == "uzavren") {
                return true;
            } else {
                echo "<div class=\"obdelnik\"><h5>Checklist - nepovolený krok!</h5><p>Nejprve je třeba:</p>
                <ul>
                <li>potvrdit údaje o pobočce</li>
                </ul>
                <p>Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">audit</a>.</p>
                    </div>";
                return false;
            }
        } elseif ($krok == "pracoviste") {
            if ($row['stav_kontrola_pobocka'] == "uzavren" && checklistu_zpracovan($id_audit)) {
                return true;
            } elseif ($row['stav_kontrola_pobocka'] != "uzavren" && checklistu_zpracovan($id_audit)) {
                echo "<div class=\"obdelnik\"><h5>Audit pracovišť - nepovolený krok!</h5><p>Nejprve je třeba:</p>
                <ul>
                <li>potvrdit údaje o pobočce</li>
                </ul>
                <p>Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">audit</a>.</p>
                    </div>";
                return false;
            } elseif ($row['stav_kontrola_pobocka'] == "uzavren" && !checklistu_zpracovan($id_audit)) {
                echo "<div class=\"obdelnik\"><h5>Audit pracovišť - nepovolený krok!</h5><p>Nejprve je třeba:</p>
                <ul>
                <li>provést checklist</li>
                </ul>
                <p>Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">audit</a>.</p>
                    </div>";
                return false;
            } else {
                echo "<div class=\"obdelnik\"><h5>Audit pracovišť - nepovolený krok!</h5><p>Nejprve je třeba:</p>
                <ul>
                <li>potvrdit údaje o pobočce</li>
                <li>provést checklist</li>
                </ul>
                <p>Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">audit</a>.</p>
                    </div>";
                return false;
            }
        } elseif ($krok == "neshody") {
            if ($row['stav_kontrola_pobocka'] == "uzavren" && checklistu_zpracovan($id_audit) && pracoviste_zpracovano($id_audit)) {
                return true;
            } elseif ($row['stav_kontrola_pobocka'] != "uzavren" && checklistu_zpracovan($id_audit) && pracoviste_zpracovano($id_audit)) {
                echo "<div class=\"obdelnik\"><h5>Neshody - nepovolený krok!</h5><p>Nejprve je třeba:</p>
                <ul>
                <li>potvrdit údaje o pobočce</li>
                </ul>
                <p>Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">audit</a>.</p>
                    </div>";
                return false;
            } elseif ($row['stav_kontrola_pobocka'] == "uzavren" && !checklistu_zpracovan($id_audit) && pracoviste_zpracovano($id_audit)) {
                echo "<div class=\"obdelnik\"><h5>Neshody - nepovolený krok!</h5><p>Nejprve je třeba:</p>
                <ul>
                <li>provést checklist</li>
                </ul>
                <p>Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">audit</a>.</p>
                    </div>";
                return false;
            } elseif ($row['stav_kontrola_pobocka'] == "uzavren" && checklistu_zpracovan($id_audit) && !pracoviste_zpracovano($id_audit)) {
                echo "<div class=\"obdelnik\"><h5>Neshody - nepovolený krok!</h5><p>Nejprve je třeba:</p>
                <ul>
                <li>provést audit pracovišť</li>
                </ul>
                <p>Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">audit</a>.</p>
                    </div>";
                return false;
            } elseif ($row['stav_kontrola_pobocka'] != "uzavren" && !checklistu_zpracovan($id_audit) && pracoviste_zpracovano($id_audit)) {
                echo "<div class=\"obdelnik\"><h5>Neshody - nepovolený krok!</h5><p>Nejprve je třeba:</p>
                <ul>
                <li>potvrdit údaje o pobočce</li>
                <li>provést checklist</li>
                </ul>
                <p>Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">audit</a>.</p>
                    </div>";
                return false;
            } elseif ($row['stav_kontrola_pobocka'] != "uzavren" && checklistu_zpracovan($id_audit) && !pracoviste_zpracovano($id_audit)) {
                echo "<div class=\"obdelnik\"><h5>Neshody - nepovolený krok!</h5><p>Nejprve je třeba:</p>
                <ul>
                <li>potvrdit údaje o pobočce</li>
                <li>provést audit pracovišť</li>
                </ul>
                <p>Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">audit</a>.</p>
                    </div>";
                return false;
            } elseif ($row['stav_kontrola_pobocka'] == "uzavren" && !checklistu_zpracovan($id_audit) && !pracoviste_zpracovano($id_audit)) {
                echo "<div class=\"obdelnik\"><h5>Neshody - nepovolený krok!</h5><p>Nejprve je třeba:</p>
                <ul>
                <li>provést checklist</li>
                <li>provést audit pracovišť</li>
                </ul>
                <p>Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">audit</a>.</p>
                    </div>";
                return false;
            } else {
                echo "<div class=\"obdelnik\"><h5>Neshody - nepovolený krok!</h5><p>Nejprve je třeba:</p>
                <ul>
                <li>potvrdit údaje o pobočce</li>
                <li>provést checklist</li>
                <li>provést audit pracovišť</li>
                </ul>
                <p>Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">audit</a>.</p>
                    </div>";
                return false;
            }
        } elseif ($krok == "protokol") {
            if ($row['stav_kontrola_pobocka'] == "uzavren" && checklistu_zpracovan($id_audit) && pracoviste_zpracovano($id_audit) && neshody_zpracovano($id_audit)) {
                return true;
            } elseif ($row['stav_kontrola_pobocka'] != "uzavren" && checklistu_zpracovan($id_audit) && pracoviste_zpracovano($id_audit) && neshody_zpracovano($id_audit)) {
                echo "<div class=\"obdelnik\"><h5>Komentář - nepovolený krok!</h5><p>Nejprve je třeba:</p>
                <ul>
                <li>potvrdit údaje o pobočce</li>
                </ul>
                <p>Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">audit</a>.</p>
                    </div>";
                return false;
            } elseif ($row['stav_kontrola_pobocka'] == "uzavren" && !checklistu_zpracovan($id_audit) && pracoviste_zpracovano($id_audit) && neshody_zpracovano($id_audit)) {
                echo "<div class=\"obdelnik\"><h5>Komentář - nepovolený krok!</h5><p>Nejprve je třeba:</p>
                <ul>
                <li>provést chcklist</li>
                </ul>
                <p>Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">audit</a>.</p>
                    </div>";
                return false;
            } elseif ($row['stav_kontrola_pobocka'] == "uzavren" && checklistu_zpracovan($id_audit) && !pracoviste_zpracovano($id_audit) && neshody_zpracovano($id_audit)) {
                echo "<div class=\"obdelnik\"><h5>Komentář - nepovolený krok!</h5><p>Nejprve je třeba:</p>
                <ul>
                <li>provést audit pracovišť</li>
                </ul>
                <p>Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">audit</a>.</p>
                    </div>";
                return false;
            } elseif ($row['stav_kontrola_pobocka'] == "uzavren" && checklistu_zpracovan($id_audit) && pracoviste_zpracovano($id_audit) && !neshody_zpracovano($id_audit)) {
                echo "<div class=\"obdelnik\"><h5>Komentář - nepovolený krok!</h5><p>Nejprve je třeba:</p>
                <ul>
                <li>zpracovat neshody</li>
                </ul>
                <p>Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">audit</a>.</p>
                    </div>";
                return false;
            } elseif ($row['stav_kontrola_pobocka'] != "uzavren" && !checklistu_zpracovan($id_audit) && pracoviste_zpracovano($id_audit) && neshody_zpracovano($id_audit)) {
                echo "<div class=\"obdelnik\"><h5>Komentář - nepovolený krok!</h5><p>Nejprve je třeba:</p>
                <ul>
                <li>potvrdit údaje o pobočce</li>
                <li>provést chcklist</li>
                </ul>
                <p>Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">audit</a>.</p>
                    </div>";
                return false;
            } elseif ($row['stav_kontrola_pobocka'] != "uzavren" && checklistu_zpracovan($id_audit) && !pracoviste_zpracovano($id_audit) && neshody_zpracovano($id_audit)) {
                echo "<div class=\"obdelnik\"><h5>Komentář - nepovolený krok!</h5><p>Nejprve je třeba:</p>
                <ul>
                <li>potvrdit údaje o pobočce</li>
                <li>provést audit pracovišť</li>
                </ul>
                <p>Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">audit</a>.</p>
                    </div>";
                return false;
            } elseif ($row['stav_kontrola_pobocka'] != "uzavren" && checklistu_zpracovan($id_audit) && pracoviste_zpracovano($id_audit) && !neshody_zpracovano($id_audit)) {
                echo "<div class=\"obdelnik\"><h5>Komentář - nepovolený krok!</h5><p>Nejprve je třeba:</p>
                <ul>
                <li>potvrdit údaje o pobočce</li>
                <li>zpracovat neshody</li>
                </ul>
                <p>Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">audit</a>.</p>
                    </div>";
                return false;
            } elseif ($row['stav_kontrola_pobocka'] == "uzavren" && !checklistu_zpracovan($id_audit) && !pracoviste_zpracovano($id_audit) && neshody_zpracovano($id_audit)) {
                echo "<div class=\"obdelnik\"><h5>Komentář - nepovolený krok!</h5><p>Nejprve je třeba:</p>
                <ul>
                <li>provést checklist</li>
                <li>provést audit pracovišť</li>
                </ul>
                <p>Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">audit</a>.</p>
                    </div>";
                return false;
            } elseif ($row['stav_kontrola_pobocka'] == "uzavren" && !checklistu_zpracovan($id_audit) && pracoviste_zpracovano($id_audit) && !neshody_zpracovano($id_audit)) {
                echo "<div class=\"obdelnik\"><h5>Komentář - nepovolený krok!</h5><p>Nejprve je třeba:</p>
                <ul>
                <li>provést checklist</li>
                <li>zpracovat neshody</li>
                </ul>
                <p>Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">audit</a>.</p>
                    </div>";
                return false;
            } elseif ($row['stav_kontrola_pobocka'] == "uzavren" && checklistu_zpracovan($id_audit) && !pracoviste_zpracovano($id_audit) && !neshody_zpracovano($id_audit)) {
                echo "<div class=\"obdelnik\"><h5>Komentář - nepovolený krok!</h5><p>Nejprve je třeba:</p>
                <ul>
                <li>provést audit pracovišť</li>
                <li>zpracovat neshody</li>
                </ul>
                <p>Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">audit</a>.</p>
                    </div>";
                return false;
            } elseif ($row['stav_kontrola_pobocka'] != "uzavren" && !checklistu_zpracovan($id_audit) && !pracoviste_zpracovano($id_audit) && neshody_zpracovano($id_audit)) {
                echo "<div class=\"obdelnik\"><h5>Komentář - nepovolený krok!</h5><p>Nejprve je třeba:</p>
                <ul>
                <li>potvrdit údaje o pobočce</li>
                <li>provést checklist</li>
                <li>provést audit pracovišť</li>
                </ul>
                <p>Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">audit</a>.</p>
                    </div>";
                return false;
            } elseif ($row['stav_kontrola_pobocka'] != "uzavren" && checklistu_zpracovan($id_audit) && !pracoviste_zpracovano($id_audit) && !neshody_zpracovano($id_audit)) {
                echo "<div class=\"obdelnik\"><h5>Komentář - nepovolený krok!</h5><p>Nejprve je třeba:</p>
                <ul>
                <li>potvrdit údaje o pobočce</li>
                <li>provést audit pracovišť</li>
                <li>zpracovat neshody</li>
                </ul>
                <p>Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">audit</a>.</p>
                    </div>";
                return false;
            } elseif ($row['stav_kontrola_pobocka'] != "uzavren" && !checklistu_zpracovan($id_audit) && pracoviste_zpracovano($id_audit) && !neshody_zpracovano($id_audit)) {
                echo "<div class=\"obdelnik\"><h5>Komentář - nepovolený krok!</h5><p>Nejprve je třeba:</p>
                <ul>
                <li>potvrdit údaje o pobočce</li>
                <li>provést checklist</li>
                <li>zpracovat neshody</li>
                </ul>
                <p>Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">audit</a>.</p>
                    </div>";
                return false;
            } elseif ($row['stav_kontrola_pobocka'] == "uzavren" && !checklistu_zpracovan($id_audit) && !pracoviste_zpracovano($id_audit) && !neshody_zpracovano($id_audit)) {
                echo "<div class=\"obdelnik\"><h5>Komentář - nepovolený krok!</h5><p>Nejprve je třeba:</p>
                <ul>
                <li>provést checklist</li>
                <li>provést audit pracovišť</li>
                <li>zpracovat neshody</li>
                </ul>
                <p>Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">audit</a>.</p>
                    </div>";
                return false;
            } else {
                echo "<div class=\"obdelnik\"><h5>Komentář - nepovolený krok!</h5><p>Nejprve je třeba:</p>
                <ul>
                <li>potvrdit údaje o pobočce</li>
                <li>provést checklist</li>
                <li>provést audit pracovišť</li>
                <li>zpracovat neshody</li>
                </ul>
                <p>Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">audit</a>.</p>
                    </div>";
                return false;
            }
        }
    } else {
        echo "<div class=\"obdelnik\"><h5>Audit je uzavřen a předán koordinátorovi</h5>
            <p>Nelze na něm pracovat!</p>
                <p>Zpět na <a href=\"./provest_audit.php?id=vybrat_oblast&id_audit=" . $_GET['id_audit'] . "\">audit</a>.</p>
                    </div>";
        return false;
    }
}

function zadat_audit($link) {
    if (!$_POST['firma'])
        $_POST['firma'] = $_GET['firma'];
    if (!$_POST['provozovna'] && $_POST['provozovna'] != "vybrat")
        $_POST['provozovna'] = $_GET['provozovna'];
    if (!$_POST['typ_novy_audit'])
        $_POST['typ_novy_audit'] = $_GET['typ_novy_audit'];

    if ($_POST['nazev_audit']) {
        $time = Time(); //osetreni vybrani spravneho auditu

        if ($_POST['nazev_audit'] == "audit")
            $nazev = "Audit";
        elseif ($_POST['nazev_audit'] == "rocni_proverka")
            $nazev = "Roční prověrka";

        $komentar = "***" . Date("H:i:s d.m.Y", Time()) . ", " . $_SESSION['jmeno_usr'] . " (koordinátor)*** \n" . $_POST['komentar'];
        $arr = array('id_provozovna' => $_GET['provozovna'], 'id_technik' => $_POST['technik'], 'id_koordinator' => $_SESSION['id_usr'], 'id_firemni_uzivatel' => $_POST['firemni_uzivatel'],
            'date' => $time, 'typ' => $_POST['typ_novy_audit'], 'verze' => $_POST['verze_audit'], 'komentar' => $komentar, 'vytisknut' => "ne", 'zamitnut' => "ne",
            'stav_technik' => "neprijal", 'stav_firma' => "neproveden", 'stav_checklist' => "neuzavren", 'stav_pracoviste' => "neuzavren", 'stav_neshody' => "neuzavren", 'nazev' => $nazev);
        dibi::query('INSERT INTO [prevent_audit]', $arr);

        $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [date] = %i', $time);
        $row = $result->fetch();

        //tvorim adresar pro guardian
        nova_slozka("./audit_data/", $row['id']);
        nova_slozka("./audit_data/" . $row['id'] . "/", "fotografie");
        nova_slozka("./audit_data/" . $row['id'] . "/", "protokoly");

        //tvorim protokoly
        $arr = array('id_audit' => $row['id'], 'date' => Time());
        dibi::query('INSERT INTO [prevent_audit_protokoly]', $arr);

        $arr_log = array('text' => 'Vytvořil nový audit pobočce ' . get_nazev_provozovny($_GET['provozovna'], false) . '', 'link' => '', 'ad' => $_SESSION['id_usr']);
        vytvor_log($arr_log);
        $arr_log = array('text' => 'Vytvořen nový audit pobočce ' . get_nazev_provozovny($_GET['provozovna'], false) . '', 'link' => '', 'ad' => get_id_firma_z_provozovny($_GET['provozovna']));
        vytvor_log_firmy($arr_log);
        $arr_log = array('text' => 'Vytvořen nový audit', 'id_audit' => $row['id'], 'id_provozovna' => $_GET['provozovna']);
        vytvor_log_audit($arr_log);
        $zprava = "Právě Vám byl koordinátorem " . $_SESSION['jmeno_usr'] . " přidělen audit, přijměte ho";
        $link_ukol = "./sprava_auditu.php?id=detaily_auditu&firma=" . get_id_firma_z_audit($row['id']) . "&provozovna=" . get_id_provozovna_z_audit($row['id']) . "&audit=" . $row['id'];
        $arr_ukol = array('deadline' => '', 'text' => 'Byl Vám přidělen audit', 'popis' => $zprava, 'link' => $link_ukol, 'ad' => $_POST['technik'], 'zadal_jmeno' => $_SESSION['jmeno_usr']);
        novy_ukol($arr_ukol);
        if ($link == "uzivatelske_ukoly")
            echo "<div class=\"obdelnik\"><h4>Audit vytvořen!</h4><p>Zadat <a href=\"./uzivatelske_ukoly.php?zadat_audit=ano&firma=" . $_POST['firma'] . "&provozovna=" . $_POST['provozovna'] . "\">Zadat další audit</a>.</p></div>";
        elseif ($link == "zadat_audit")
            echo "<div class=\"obdelnik\"><h4>Audit vytvořen!</h4><p>Zadat <a href=\"./sprava_auditu.php?id=zadat_audit&firma=" . $_POST['firma'] . "&provozovna=" . $_POST['provozovna'] . "\">Zadat další audit</a>.</p></div>";

        elseif ($link == "firma_zadana")
            echo "<div class=\"obdelnik\"><h4>Audit vytvořen!</h4><p>Zadat <a href=\"./sprava_auditu.php?id=enter&firma=" . $_POST['firma'] . "&provozovna=" . $_POST['provozovna'] . "\">Zadat další audit</a>.</p></div>";
    }
    else {
        if ($_POST['firma'])
            $firma_readonly = "disabled";
        if ($_POST['provozovna'])
            $provozovna_readonly = "disabled";
        if ($_POST['typ_novy_audit'])
            $typ_readonly = "disabled";

        if ($link == "uzivatelske_ukoly")
            echo "<form method=\"POST\" action=\"./uzivatelske_ukoly.php?zadat_audit=ano&firma=" . $_POST['firma'] . "&provozovna=" . $_POST['provozovna'] . "&typ_novy_audit=" . $_POST['typ_novy_audit'] . "\" name=\"zadat_audit\" \">";
        elseif ($link == "zadat_audit")
            echo "<form method=\"POST\" action=\"./sprava_auditu.php?id=zadat_audit&firma=" . $_POST['firma'] . "&provozovna=" . $_POST['provozovna'] . "&typ_novy_audit=" . $_POST['typ_novy_audit'] . "\" name=\"zadat_audit\" \">";
        elseif ($link == "firma_zadana")
            echo "<form method=\"POST\" action=\"./sprava_auditu.php?id=enter&firma=" . $_POST['firma'] . "&provozovna=" . $_POST['provozovna'] . "&typ_novy_audit=" . $_POST['typ_novy_audit'] . "\" name=\"zadat_audit\" \">";

        echo "<fieldset>
	<legend>Nový audit</legend>
	<label for=\"firma\">klient</label><br />
	<select name=\"firma\" id=\"firma\" class=\"formular\" $firma_readonly>";
        $result = dibi::query('SELECT * FROM [prevent_firmy] ORDER BY [nazev] ASC');
        while ($row = $result->fetch()) {
            if ($_POST['firma']) {
                $check = "";
                if ($row['id'] == $_POST['firma'])
                    $check = "selected";
            }
            echo "<option $check value=\"" . $row['id'] . "\">" . $row['nazev'] . " " . zprava_o_auditech_filtr($row['id'], "firma", "koordinator") . "</option>";
        }
        echo "</select>";

        if ($_POST['firma']) {
            if ($link == "uzivatelske_ukoly")
                echo "<a href=\"./uzivatelske_ukoly.php?zadat_audit=ano\">změnit</a>";
            elseif ($link == "zadat_audit")
                echo "<a href=\"./sprava_auditu.php?id=zadat_audit\">změnit</a>";

            echo "<br /><label for=\"provozovna\">pobočka</label><br />
		<select name=\"provozovna\" id=\"provozovna\" class=\"formular\" $provozovna_readonly>
		<option value=\"vybrat\">--- vyberte ---</option>";
            $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $_POST['firma'], 'ORDER BY [nazev] ASC');
            while ($row = $result->fetch()) {
                if ($_POST['provozovna']) {
                    $check2 = "";

                    if ($row['id'] == $_POST['provozovna'])
                        $check2 = "selected";
                }
                echo "<option $check2 value=\"" . $row['id'] . "\">" . $row['nazev'] . " " . zprava_o_auditech_filtr($row['id'], "provozovna", "koordinator") . "</option>";
            }
            echo "</select>";
            if ($_POST['provozovna']) {
                if ($link == "uzivatelske_ukoly")
                    echo "<a href=\"./uzivatelske_ukoly.php?zadat_audit=ano&firma=" . $_POST['firma'] . "\">změnit</a>";
                elseif ($link == "zadat_audit")
                    echo "<a href=\"./sprava_auditu.php?id=zadat_audit&firma=" . $_POST['firma'] . "\">změnit</a>";
                if ($_POST['typ_novy_audit'] == "bozp")
                    $checked_bozp = "selected";
                elseif ($_POST['typ_novy_audit'] == "po")
                    $checked_po = "selected";
                elseif ($_POST['typ_novy_audit'] == "bozp_po")
                    $checked_bozp_po = "selected";

                echo "<br /><label for=\"typ_novy_audit\">typ auditu</label><br />
		<select name=\"typ_novy_audit\" id=\"typ_novy_audit\" class=\"formular\"  $typ_readonly>
			<option value=\"bozp\" $checked_bozp>BOZP</option>
                        <option value=\"po\" $checked_po>PO</option>
                        <option value=\"bozp+po\" disabled>BOZP + PO</option>
		</select>";
            }

            if ($_POST['typ_novy_audit']) {
                if ($link == "uzivatelske_ukoly")
                    echo "<a href=\"./uzivatelske_ukoly.php?zadat_audit=ano&firma=" . $_POST['firma'] . "&provozovna=" . $_POST['provozovna'] . "\">změnit</a>";
                elseif ($link == "zadat_audit")
                    echo "<a href=\"./sprava_auditu.php?id=zadat_audit&firma=" . $_POST['firma'] . "&provozovna=" . $_POST['provozovna'] . "\">změnit</a>";
                elseif ($link == "firma_zadana")
                    echo "<a href=\"./sprava_auditu.php?id=enter&firma=" . $_POST['firma'] . "&provozovna=" . $_POST['provozovna'] . "&typ_novy_audit_zmena=ano\">změnit</a>";

                echo "<br /><label for=\"verze_audit\">verze auditu</label><br />
		<select name=\"verze_audit\" id=\"verze_audit\" class=\"formular\">";
                $result_verze = dibi::query('SELECT * FROM [prevent_audit_verze] WHERE [typ] = %s', $_POST['typ_novy_audit'], 'ORDER BY [date] DESC');
                while ($row_verze = $result_verze->fetch()) {
                    echo "<option value=\"" . $row_verze['id'] . "\">" . $row_verze['nazev'] . " - " . Date("d.m.Y", $row_verze['date']) . "</option>";
                }
                echo "</select><a href=\"./audit_schema_nahled.php?typ=" . $_POST['typ_novy_audit'] . "\" target=\"_blank\">náhled verzí</a><br />";

                echo "<label for=\"nazev_audit\">název auditu</label><br />
		<select name=\"nazev_audit\" id=\"nazev_audit\" class=\"formular\">
			<option value=\"audit\" selected>Audit</option>
                        <option value=\"rocni_proverka\">Roční prověrka</option>
		</select><br />";
                EchoUzivateleSelect("přidělený technik", "technik", false, false, 3, false);
                EchoUzivateleSelect("přidělený klient - uživatel", "firemni_uzivatel", false, false, false, 5);
                echo "<label for=\"komentar\">komentář</label><br />
		<textarea name=\"komentar\" id=\"komentar\" class=\"formular\" rows=\"4\" cols=\"35\"></textarea><br />";
            }
        }
        echo "<br /><input class=\"tlacitko\" type=\"submit\" value=\"nový\">";
        if ($link == "uzivatelske_ukoly")
            echo "<a href=\"\" onClick=\"return show_hide('plot_full_audit_zadat','plot_short_audit_zadat')\">nevytvářet</a>";
        elseif ($link == "zadat_audit"

            );
        elseif ($link == "firma_zadana")
            echo "<a href=\"\" onClick=\"return show_hide('plot_full','plot_short')\">nevytvářet</a>";

        echo "</fieldset>
	</form>";
    }
}

function zprava_o_auditu($id_audit) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id_audit);
    $row = $result->fetch();

    $result_klient = dibi::query('SELECT * FROM [prevent_firmy] WHERE [id] = %i', get_id_firma_z_audit($id_audit));
    $row_klient = $result_klient->fetch();

    $result_provozovna = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [id] = %i', get_id_provozovna_z_audit($id_audit));
    $row_provozovna = $result_provozovna->fetch();

    echo "<div class=\"zprava_audit\">";
    echo "<table class=\"table\" style=\"margin-left: auto; margin-right: auto;text-align:center;\" >
        <tr><td><h3 style=\"color:red;\">" . $row_klient['nazev'] . "</h3></td></tr>
        <tr><td><h5 style=\"color:red;\">" . $row_klient['adresa'] . ", " . $row_klient['ico'] . ", " . $row_provozovna['nazev'] . " , " . $row_provozovna['adresa'] . "</h5></td></tr>
        </table>";

    echo "<img src=\"" . $row_klient['logo'] . "\"/ width=\"200px\"><br />";

    echo "<table class=\"table\" style=\"margin-left: auto; margin-right: auto;text-align:center;\"  >
        <tr><td><h5>Název předpisu</h5></td></tr>
        <tr><td style=\"background-color:#ffff99;\"><h3 >Zpráva o provedení auditu " . $row['typ'] . "</h3></td></tr>
        </table><br /><br /><br />";

    echo "<img src=\"./design/logo2.jpg\"/ width=\"200px\" style=\"float:left;\"><br />";

    echo "<p style=\"text-align:right;font-size:10px;\"><strong>G U A R D 7, v.o.s. se sídlem 17.listopadu 203, 530 02 Pardubice<br />IČO 48173622, DIČ CZ48173622</strong><br />";
    echo "Společnost je zapsána v OR vedeném KS v Hradci Králové, oddíl A,  vložka 3503<br />";
    echo "Telefon: 466535700, fax: 466501412, E-mail: guard7@guard7.cz, www. guard7.cz </p>";
    echo "</div>";

    echo "<div class=\"zprava_audit\"><h2>Komentář auditu</h2>";

    $result2 = dibi::query('SELECT * FROM [prevent_audit_protokoly] WHERE [id_audit] = %i', $id_audit);
    $row2 = $result2->fetch();

    echo "<table class=\"table\" style=\"margin-left: auto; margin-right: auto;text-align:center;\"  >
        <tr><td><h5>Místo auditu</h5></td></tr>
        <tr><td style=\"background-color:#ffff99;\"><p>" . $row2['misto'] . "</p></td></tr>
        </table><br />";

    echo "<table class=\"table\" style=\"margin-left: auto; margin-right: auto;text-align:center;\"  >
        <tr><td><h5>Jméno auditora za G U A R D 7, v.o.s.</h5></td><td><h5>Jméno zpracovatele za G U A R D 7, v.o.s.</h5></td></tr>
        <tr><td style=\"background-color:#ffff99;\"><p>" . $row2['auditor'] . "</p></td><td style=\"background-color:#ffff99;\"><p>" . get_jmeno_uzivatele_z_id($row['id_koordinator']) . "</p></td></tr>
        </table><br />";

    echo "<table class=\"table\" style=\"margin-left: auto; margin-right: auto;text-align:center;\"  >
        <tr><td><h5>Účastníci za klienta</h5></td></tr>
        <tr><td style=\"background-color:#ffff99;\"><p>" . $row2['ucastnici'] . "</p></td></tr>
        </table><br />";

    echo "<table class=\"table\" style=\"margin-left: auto; margin-right: auto;text-align:center;\"  >
        <tr><td><h5>Popis průběhu auditu</h5></td></tr>
        <tr><td style=\"background-color:#ffff99;\"><p>" . $row2['popis'] . "</p></td></tr>
        </table><br />";

    echo "<table class=\"table\" style=\"margin-left: auto; margin-right: auto;text-align:center;\"  >
        <tr><td><h5>Stručné slovní zhodnocení auditu a upozorněním na nejdůležitější neshody a doporučení dalšího postupu</h5></td></tr>
        <tr><td style=\"background-color:#ffff99;\"><p>" . $row2['zhodnoceni'] . "</p></td></tr>
        </table><br />";

    echo "</div>";

    echo "<div class=\"zprava_audit\"><h2>Vyhodnocení auditu</h2>";
    echo "<img src=\"./module_include/graph_class/graf_checklist_show.php?graph=1&audit=" . $id_audit . "\" />";

    echo "<table class=\"table\" style=\"margin-left: auto; margin-right: auto;text-align:center;\"  >
        <tr><td><h5>Kategorie</h5></td><td><h5>Hodnocení</h5></td></tr>";

    $result_check_kategorie = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie] WHERE [id_audit] = %i', $id_audit);
    while ($row_check_kategorie = $result_check_kategorie->fetch()) {
        $result_check_kategorie_schema = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [id] = %i', $row_check_kategorie['id_kat']);
        $row_check_kategorie_schema = $result_check_kategorie_schema->fetch();

        $zpr = false;
        $pocet_vsech = 0;
        $procenta_castecne = 0;
        $pocet_ano = 0;

        $result_check_2 = dibi::query('SELECT * FROM [prevent_audit_checklist_schema] WHERE [id_kat] = %i', $row_check_kategorie_schema['id'], ' AND [verze] = %i', $row['verze'], 'ORDER BY [cislo] ASC');
        while ($row_check_2 = $result_check_2->fetch()) {
            $result_check_3 = dibi::query('SELECT * FROM [prevent_audit_checklist] WHERE [id_audit] = %i', $id_audit, 'AND [id_otazka] = %i', $row_check_2['id']);
            $row_check_3 = $result_check_3->fetch();

            if ($row_check_kategorie['stav'] == "zpracovano") {
                $pocet_vsech++;
                $zpr = true;
                if ($row_check_3['odpoved'] == "ano") {
                    $pocet_ano++;
                } elseif ($row_check_3['odpoved'] == "castecne") {
                    $procenta_castecne += $row_check_3['castecne'];
                }
            }
        }
        if ($zpr) {
            echo "<tr><td style=\"background-color:#ffff99;\"><p>" . $row_check_kategorie_schema['cislo'] . ". " . $row_check_kategorie_schema['kat_jmeno'] . "</p></td><td style=\"background-color:#ffff99;\"><p>" . round(($procenta_castecne + ($pocet_ano * 100)) / $pocet_vsech, 2) . "%</p></td></tr>";
        }
    }
    echo "</table>";
    echo "</div>";

    echo "<div class=\"zprava_audit\"><h2>Registr neshod</h2>";


    echo "<table class=\"table\" style=\"margin-left: auto; margin-right: auto;text-align:center;\">";
    echo "<tr>
        <td><h5>závažnost</h5></td>
        <td><h5>neshoda</h5></td>
        <td><h5>komentář</h5></td>
        <td><h5>navrhované<br />opatření</h5></td>
        </tr>";

    $result_neshody = dibi::query('SELECT * FROM [prevent_audit_neshody] WHERE [id_audit] = %i', $id_audit, 'ORDER BY [id] ASC');
    while ($row_neshody = $result_neshody->fetch()) {
        if ($row_neshody['id_otazka'] != null) {
            $result_check_audit = dibi::query('SELECT * FROM [prevent_audit_checklist] WHERE [id] = %i', $row_neshody['id_otazka']);
            $row_check_audit = $result_check_audit->fetch();

            $result_check_1 = dibi::query('SELECT * FROM [prevent_audit_checklist_schema] WHERE [id] = %i', $row_check_audit['id_otazka']);
            $row_check_1 = $result_check_1->fetch();

            $result_check_2 = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [id] = %i', $row_check_1['id_kat']);
            $row_check_2 = $result_check_2->fetch();

            $zavaznost = $row_check_1['zavaznost'];

            if ($row_check_audit['odpoved'] == "castecne")
                $odpoved = "<br /><strong>ODPOVĚĎ</strong>: částečně (" . $row_check_audit['castecne'] . "%)";
            else
                $odpoved = "<br /><strong>ODPOVĚĎ</strong>: ne";

            $text_puvod = "<strong>CHECKLIST</strong>: " . $row_check_2['cislo'] . ". " . $row_check_2['kat_jmeno'] . ": " . $row_check_1['cislo'] . ". " . $row_check_1['text'] . $odpoved;
        }
        elseif ($row_neshody['id_pracoviste'] != null) {
            $text_puvod = "<strong>PRACOVIŠTĚ</strong> - <em>" . get_jmeno_objekt("pracoviste", $row_neshody['id_pracoviste']) . "</em>: " . $row_neshody['neshoda'];
            $zavaznost = "nic";
        }
        echo "<tr>
        <td style=\"background-color:#ffff99;\">" . $zavaznost . "</td>
        <td style=\"background-color:#ffff99;\">" . $text_puvod . "</td>
        <td style=\"background-color:#ffff99;\">" . $row_neshody['komentar'] . "</td>
        <td style=\"background-color:#ffff99;\">" . $row_neshody['opatreni'] . "</td>
        </tr>";
    }
    echo "</table>";
    echo "</div>";
}
?>




