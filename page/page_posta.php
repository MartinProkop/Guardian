<?php

function prijata_posta() {
    echo "<h4>Přijatá pošta</h4>";
    echo "<table class=\"table\">
	<tr>
	<td><span class=\"subheader\">AKCE</span></td>
	<td><span class=\"subheader\"><a href=\"?id=prijata&pozice=" . $_GET['pozice'] . "&order_by=odesilatel_id\">ODESÍLATEL</a></span></td>
	<td><span class=\"subheader\"><a href=\"?id=prijata&pozice=" . $_GET['pozice'] . "&order_by=date\">ČAS</a></span></td>
	<td><span class=\"subheader\">PŘEDMĚT</span></td>
	<td><span class=\"subheader\">TEXT</span></td>
	</tr>";

    if ($_GET['order_by'] == null)
        $_GET['order_by'] = "id";
    $result = dibi::query('SELECT * FROM [prevent_posta] WHERE ([prijemce_id] = %i', $_SESSION['id_usr'], 'AND [stav_prijemce] != %s)', "smazana");
    $radky = $result->count();

    $limit1 = $_GET['pozice'];
    if ($limit1 == null)
        $limit1 = 0;
    $limit2 = $_SESSION['pocet_prvku_zobrazeni_usr'];
    if ($radky < $limit2)
        $limit2 = $radky;

    $posun_new = $limit1 - $limit2;
    $posun_old = $limit1 + $limit2;

    $last = " | <a href=\"?id=prijata&pozice=$posun_old\">starší ></a>";
    $next = "<a href=\"?id=prijata&pozice=$posun_new\">< novější</a> | ";

    $hlaskaklimitu1 = $limit1 + 1;
    $hlaskaklimitu2 = $limit1 + $limit2;

    if ($radky <= $hlaskaklimitu2) {
        $hlaskaklimitu2 = $radky;
        $last = "&nbsp;";
    }

    if ($limit1 == 0)
        $next = "&nbsp;";

    $result = dibi::query('SELECT * FROM [prevent_posta] WHERE ([prijemce_id] = %i', $_SESSION['id_usr'], 'AND [stav_prijemce] != %s)', "smazana", 'ORDER BY %by', $_GET['order_by'], 'DESC LIMIT %i, %i', $limit1, $limit2);
    while ($row = $result->fetch()) {
        $result2 = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $row['odesilatel_id']);
        $row2 = $result2->fetch();

        echo "<tr>
		<td><a href=\"?id=prijata&smazat=" . $row['id'] . "&majitel=prijemce\" onclick=\"if(confirm('Skutečně smazat zprávu?')) location.href='?id=prijata&smazat=" . $row['id'] . "&majitel=prijemce'; return(false);\"><img src=\"./design/kos.png\" alt=\"smazat\" title=\"smazat\"/></a></td>
		<td>" . $row2['jmeno'] . "</td>
		<td>" . Date("H:i d.m.Y", $row['date']) . "</td>
		<td>" . $row['predmet'] . "</td>
		<td><a href=\"#tooltip_" . $row['id'] . "\" name=\"tooltip_" . $row['id'] . "\"  id=\"tooltip_" . $row['id'] . "\"\"><img src=\"./design/detaily.png\" alt=\"ukázat text\" title=\"ukázat text\"/></a></td>";
                //útext bez BR
		echo "</tr>
                    <script type=\"text/javascript\">
                    $(document).ready(function()
                    {
                       $('#tooltip_$row[id]').qtip(
                       {
                          content: {
                            text: '".ereg_replace("[\r|\n]+","<br>",$row[text])."',
                            title: {
                                text: 'Odesílatel: $row2[jmeno]<br />Předmět: ".ereg_replace("[\r|\n]+","<br>",$row[predmet])."',
                                button: 'Close'
                            }
                          },
                          hide: {
                            when: {
                                event: 'unfocus'
                            }
                          },
                          show: {
                            solo: true,
                            when: {
                                event: 'click'
                            }
                          },
                          style: {
                              width: {
                                min: 250,
                                max: 400
                              },
                              padding: 5,
                              background: '#c0d3e2',
                              textAlign: 'left',
                              border: {
                                width: 2,
                                color: '#c0d3e2'
                              },
                              title: {
                                background: '#f9f9ff',
                              }
                          },
                          adjust: {
                                scroll: true,
                                resize: true
                          }
                       });
                    });
                    </script>
                    ";
    }

    echo "</table>";
    echo "<p>$next <strong>$hlaskaklimitu1</strong> - <strong>$hlaskaklimitu2</strong> z <strong>$radky</strong>$last</p>";

    dibi::query('UPDATE [prevent_posta] SET [stav_prijemce] = %s', "prijata", ' WHERE [prijemce_id] = %i', $_SESSION['id_usr'], 'AND [stav_prijemce] = %s', "nova");
}

function odeslana_posta() {
    echo "<h4>Odeslaná pošta</h4>";
    echo "<table class=\"table\">
	<tr>
        <td><span class=\"subheader\">STAV</span></td>
	<td><span class=\"subheader\">AKCE</span></td>
	<td><span class=\"subheader\"><a href=\"?id=odeslana&pozice=" . $_GET['pozice'] . "&order_by=prijemce_id\">PŘÍJEMCE</a></span></td>
	<td><span class=\"subheader\"><a href=\"?id=odeslana&pozice=" . $_GET['pozice'] . "&order_by=date\">ČAS</a></span></td>
	<td><span class=\"subheader\">PŘEDMĚT</span></td>
	<td><span class=\"subheader\">TEXT</span></td>
	</tr>";

    if ($_GET['order_by'] == null)
        $_GET['order_by'] = "id";
    $result = dibi::query('SELECT * FROM [prevent_posta] WHERE ([odesilatel_id] = %i', $_SESSION['id_usr'], 'AND [stav_odesilatel] != %s)', "smazana");
    $radky = $result->count();

    $limit1 = $_GET['pozice'];
    if ($limit1 == null)
        $limit1 = 0;
    $limit2 = $_SESSION['pocet_prvku_zobrazeni_usr'];
    if ($radky < $limit2)
        $limit2 = $radky;

    $posun_new = $limit1 - $limit2;
    $posun_old = $limit1 + $limit2;

    $last = " | <a href=\"?id=odeslana&pozice=$posun_old\">starší ></a>";
    $next = "<a href=\"?id=odeslana&pozice=$posun_new\">< novější</a> | ";

    $hlaskaklimitu1 = $limit1 + 1;
    $hlaskaklimitu2 = $limit1 + $limit2;

    if ($radky <= $hlaskaklimitu2) {
        $hlaskaklimitu2 = $radky;
        $last = "&nbsp;";
    }
    if ($limit1 == 0)
        $next = "&nbsp;";

    $result = dibi::query('SELECT * FROM [prevent_posta] WHERE ([odesilatel_id] = %i', $_SESSION['id_usr'], 'AND [stav_odesilatel] != %s)', "smazana", 'ORDER BY [' . $_GET['order_by'] . '] DESC LIMIT %i, %i', $limit1, $limit2);
    while ($row = $result->fetch()) {
        $result2 = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $row['prijemce_id']);
        $row2 = $result2->fetch();

        if ($row2['jmeno'] == null) {
            $prijemce = "hromadná pošta";
                $stav_clas = "class=\"green\"";
                $stav_text = "přečtená";
        } else {
            $prijemce = $row2['jmeno'];
            if ($row['stav_prijemce'] == "nova") {
                $stav_clas = "class=\"red\"";
                $stav_text = "nepřečtená";
            } else {
                $stav_clas = "class=\"green\"";
                $stav_text = "přečtená";
            }
        }





        echo "<tr>
                <td " . $stav_clas . ">" . $stav_text . "</td>
		<td><a href=\"?id=odeslana&smazat=" . $row['id'] . "&majitel=odesilatel\" onclick=\"if(confirm('Skutečně smazat zprávu?')) location.href='?id=odeslana&smazat=" . $row['id'] . "&majitel=odesilatel'; return(false);\"><img src=\"./design/kos.png\" alt=\"smazat\" title=\"smazat\"/></a></td>
		<td>" . $prijemce . "</td>
		<td>" . Date("H:i d.m.Y", $row['date']) . "</td>
		<td>" . $row['predmet'] . "</td>
		<td><a href=\"#tooltip_" . $row['id'] . "\" name=\"tooltip_" . $row['id'] . "\"  id=\"tooltip_" . $row['id'] . "\"\"><img src=\"./design/detaily.png\" alt=\"ukázat text\" title=\"ukázat text\"/></a></td>";
                //útext bez BR
		echo "</tr>
                    <script type=\"text/javascript\">
                    $(document).ready(function()
                    {
                       $('#tooltip_$row[id]').qtip(
                       {
                          content: {
                            text: '".ereg_replace("[\r|\n]+","<br>",$row[text])."',
                            title: {
                                text: 'Příjemce: $prijemce<br />Předmět: ".ereg_replace("[\r|\n]+","<br>",$row[predmet])."',
                                button: 'Close'
                            }
                          },
                          hide: {
                            when: {
                                event: 'unfocus'
                            }
                          },
                          show: {
                            solo: true,
                            when: {
                                event: 'click'
                            }
                          },
                          style: {
                              width: {
                                min: 250,
                                max: 400
                              },
                              padding: 5,
                              background: '#c0d3e2',
                              textAlign: 'left',
                              border: {
                                width: 2,
                                color: '#c0d3e2'
                              },
                              title: {
                                background: '#f9f9ff',
                              }
                          },
                          adjust: {
                                scroll: true,
                                resize: true
                          }
                       });
                    });
                    </script>
                    ";
    }

    echo "</table>";
    echo "<p>$next <strong>$hlaskaklimitu1</strong> - <strong>$hlaskaklimitu2</strong> z <strong>$radky</strong>$last</p>";
}

function poslat_zpravu() {
    if (IsSet($_POST['text'])) {
        $arr = array('prijemce_id' => $_POST['prijemce_id'], 'odesilatel_id' => $_SESSION['id_usr'], 'text' => $_POST['text'], 'predmet' => $_POST['predmet'], 'stav_odesilatel' => "odeslana", 'stav_prijemce' => "nova", 'date' => Time());
        dibi::query('INSERT INTO [prevent_posta]', $arr);
        //mailuju
        $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE id = %i', $arr['prijemce_id']);
        $row = $result->fetch();

        if (get_watchdog($arr['prijemce_id'], "posta"))
            odesli_mail($row['mail'],
                    "Watchdog Systému Guardian: Nová pošta",
                    "Dobrý den,\r\nprávě Vám byla v Systému Guardian poslána pošta.\r\n\r\nOdesílatel: " . $_SESSION['jmeno_usr'] . "\r\nPředmět: " . $arr['predmet'] . "\r\nText: " . $arr['text'] . "\r\n\r\nHezký den.",
                    "watchdog");
    }





    echo "<form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" name=\"posta\" id=\"posta\">
	<fieldset>
	<legend>nová zpráva</legend>";

    if ($_SESSION['prava_usr'] == "admin" || $_SESSION['prava_usr'] == "koordinator")
        EchoUzivateleSelect("příjemce", "prijemce_id", 1, 1, 1, 1);
    elseif ($_SESSION['prava_usr'] == "technik")
        EchoUzivateleSelect("příjemce", "prijemce_id", 1, 1, 1, 2);
    elseif ($_SESSION['prava_usr'] == "firma")
        EchoUzivateleSelect("příjemce", "prijemce_id", 1, 1, 2, 3);

    echo "<label for=\"predmet\">předmět</label><br />
	<input class=\"formular\" name=\"predmet\" size=\"50\"  id=\"predmet\" value=\"\"><br />
	<label for=\"text\">text</label><br />
	<textarea name=\"text\" id=\"text\" class=\"formular\" rows=\"10\" cols=\"50\"></textarea><br />
	<input class=\"tlacitko\" type=\"submit\" value=\"poslat\"> <a href=\"#\" onClick=\"return hide_show('plot_short','plot_full')\">neposílat</a>
	</fieldset>
	</form>

           <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#posta').validate({
             rules: {
               predmet: {
                 required: true
               },
               text: {
                 required: true
               },
               }
             });
           });
           </script>
";
}

function poslat_hromadnou_zpravu() {
    if (IsSet($_POST['prijemci'])) {
        if ($_POST['prijemci'] == "vsem") {
            $result = dibi::query('SELECT * FROM [prevent_uzivatele]');
            while ($row = $result->fetch()) {
                $arr = array('prijemce_id' => $row['id'], 'odesilatel_id' => $_SESSION['id_usr'], 'text' => $_POST['text'], 'predmet' => $_POST['predmet'], 'stav_odesilatel' => "smazana", 'stav_prijemce' => "nova", 'date' => Time());
                dibi::query('INSERT INTO [prevent_posta]', $arr);

                if (get_watchdog($arr['id'], "posta"))
                    odesli_mail($row['mail'],
                            "Watchdog Systému Guardian: Nová hromadná pošta",
                            "Dobrý den,\r\nprávě Vám byla v Systému Guardian poslána pošta.\r\n\r\nOdesílatel: " . $_SESSION['jmeno_usr'] . "\r\nPředmět: " . $arr['predmet'] . "\r\nText: " . $arr['text'] . "\r\n\r\nHezký den.",
                            "watchdog");
            }
            $arr_log = array('text' => 'Odeslal hromadnou poštu VŠEM uživatelům: <br />' . $_POST['text'], 'link' => '', 'ad' => $_SESSION['id_usr']);
            vytvor_log($arr_log);
        }
        elseif ($_POST['prijemci'] == "administratori") {
            $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [prava] = %s', "admin");
            while ($row = $result->fetch()) {
                $arr = array('prijemce_id' => $row['id'], 'odesilatel_id' => $_SESSION['id_usr'], 'text' => $_POST['text'], 'predmet' => $_POST['predmet'], 'stav_odesilatel' => "smazana", 'stav_prijemce' => "nova", 'date' => Time());
                dibi::query('INSERT INTO [prevent_posta]', $arr);

                if (get_watchdog($arr['id'], "posta"))
                    odesli_mail($row['mail'],
                            "Watchdog Systému Guardian: Nová hromadná pošta",
                            "Dobrý den,\r\nprávě Vám byla v Systému Guardian poslána pošta.\r\n\r\nOdesílatel: " . $_SESSION['jmeno_usr'] . "\r\nPředmět: " . $arr['predmet'] . "\r\nText: " . $arr['text'] . "\r\n\r\nHezký den.",
                            "watchdog");
            }
            $arr_log = array('text' => 'Odeslal hromadnou poštu ADMINŮM: <br />' . $_POST['text'], 'link' => '', 'ad' => $_SESSION['id_usr']);
            vytvor_log($arr_log);
        }
        elseif ($_POST['prijemci'] == "koordintori") {
            $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [prava] = %s', "koordinator");
            while ($row = $result->fetch()) {
                $arr = array('prijemce_id' => $row['id'], 'odesilatel_id' => $_SESSION['id_usr'], 'text' => $_POST['text'], 'predmet' => $_POST['predmet'], 'stav_odesilatel' => "smazana", 'stav_prijemce' => "nova", 'date' => Time());
                dibi::query('INSERT INTO [prevent_posta]', $arr);

                if (get_watchdog($arr['id'], "posta"))
                    odesli_mail($row['mail'],
                            "Watchdog Systému Guardian: Nová hromadná pošta",
                            "Dobrý den,\r\nprávě Vám byla v Systému Guardian poslána pošta.\r\n\r\nOdesílatel: " . $_SESSION['jmeno_usr'] . "\r\nPředmět: " . $arr['predmet'] . "\r\nText: " . $arr['text'] . "\r\n\r\nHezký den.",
                            "watchdog");
            }
            $arr_log = array('text' => 'Odeslal hromadnou poštu KOORDINÁTORŮM: <br />' . $_POST['text'], 'link' => '', 'ad' => $_SESSION['id_usr']);
            vytvor_log($arr_log);
        }
        elseif ($_POST['prijemci'] == "technici") {
            $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [prava] = %s', "technik");
            while ($row = $result->fetch()) {
                $arr = array('prijemce_id' => $row['id'], 'odesilatel_id' => $_SESSION['id_usr'], 'text' => $_POST['text'], 'predmet' => $_POST['predmet'], 'stav_odesilatel' => "smazana", 'stav_prijemce' => "nova", 'date' => Time());
                dibi::query('INSERT INTO [prevent_posta]', $arr);

                if (get_watchdog($arr['id'], "posta"))
                    odesli_mail($row['mail'],
                            "Watchdog Systému Guardian: Nová hromadná pošta",
                            "Dobrý den,\r\nprávě Vám byla v Systému Guardian poslána pošta.\r\n\r\nOdesílatel: " . $_SESSION['jmeno_usr'] . "\r\nPředmět: " . $arr['predmet'] . "\r\nText: " . $arr['text'] . "\r\n\r\nHezký den.",
                            "watchdog");
            }
            $arr_log = array('text' => 'Odeslal hromadnou poštu TECHNIKŮM: <br />' . $_POST['text'], 'link' => '', 'ad' => $_SESSION['id_usr']);
            vytvor_log($arr_log);
        }
        elseif ($_POST['prijemci'] == "firmy") {
            $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [prava] = %s', "firma");
            while ($row = $result->fetch()) {
                $arr = array('prijemce_id' => $row['id'], 'odesilatel_id' => $_SESSION['id_usr'], 'text' => $_POST['text'], 'predmet' => $_POST['predmet'], 'stav_odesilatel' => "smazana", 'stav_prijemce' => "nova", 'date' => Time());
                dibi::query('INSERT INTO [prevent_posta]', $arr);

                if (get_watchdog($arr['id'], "posta"))
                    odesli_mail($row['mail'],
                            "Watchdog Systému Guardian: Nová hromadná pošta",
                            "Dobrý den,\r\nprávě Vám byla v Systému Guardian poslána pošta.\r\n\r\nOdesílatel: " . $_SESSION['jmeno_usr'] . "\r\nPředmět: " . $arr['predmet'] . "\r\nText: " . $arr['text'] . "\r\n\r\nHezký den.",
                            "watchdog");
            }
            $arr_log = array('text' => 'Odeslal hromadnou poštu FIREMNÍM ZÁKAZNÍKŮM: <br />' . $_POST['text'], 'link' => '', 'ad' => $_SESSION['id_usr']);
            vytvor_log($arr_log);
        }
        elseif ($_POST['prijemci'] == "firmy_vyber") {
            $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [ad] = %i', $_POST['posta_firme']);
            while ($row = $result->fetch()) {
                $arr = array('prijemce_id' => $row['id'], 'odesilatel_id' => $_SESSION['id_usr'], 'text' => $_POST['text'], 'predmet' => $_POST['predmet'], 'stav_odesilatel' => "smazana", 'stav_prijemce' => "nova", 'date' => Time());
                dibi::query('INSERT INTO [prevent_posta]', $arr);

                if (get_watchdog($arr['id'], "posta"))
                    odesli_mail($row['mail'],
                            "Watchdog Systému Guardian: Nová hromadná pošta",
                            "Dobrý den,\r\nprávě Vám byla v Systému Guardian poslána pošta.\r\n\r\nOdesílatel: " . $_SESSION['jmeno_usr'] . "\r\nPředmět: " . $arr['predmet'] . "\r\nText: " . $arr['text'] . "\r\n\r\nHezký den.",
                            "watchdog");
            }
            $arr_log = array('text' => 'Odeslal hromadnou poštu FIREMNÍM ZÁKAZNÍKŮM: <br />' . $_POST['text'], 'link' => '', 'ad' => $_SESSION['id_usr']);
            vytvor_log($arr_log);
        }
    }
    echo "<script type=\"text/javascript\">
				function blah(bool)
				{
			   		if(bool)
			   		{
			      		document.getElementById(\"posta_firme\").disabled = false;
			   		}
			   		else
			   		{
						document.getElementById(\"posta_firme\").disabled = true;
			
			   		}
				}
				</script>";
    echo "<form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" name=\"posta\" id=\"posta_hromadna\">
	<fieldset>
	<legend>nová hromadná zpráva</legend>
        <table class=\"table_hide\">
        <tr>
        <td>
        <label for=\"prijemci_vsem\">Všem</label><br />
	<input type=\"radio\" name=\"prijemci\" value=\"vsem\" id=\"prijemci_vsem\"><sem>všem uživatelům Guardianu</em><br />
	<label for=\"prijemci_administratori\">Administrátorům</label><br />
	<input type=\"radio\" name=\"prijemci\" value=\"administratori\" id=\"prijemci_administratori\"><em>administrátorům Guardianu</em><br />
	<label for=\"prijemci_koordinatori\">Koordinátorům</label><br />
	<input type=\"radio\" name=\"prijemci\" value=\"koordinatori\" id=\"prijemci_koordinatori\"><em>koordinátorům Guardianu</em><br />
	<label for=\"prijemci_technici\">Technikům</label><br />
	<input type=\"radio\" name=\"prijemci\" value=\"technici\" id=\"prijemci_technici\"><em>technikům Guardianu</em><br />
	<label for=\"prijemci_firmy\">Všem klientům</label><br />
	<input type=\"radio\" name=\"prijemci\" value=\"firmy\" id=\"prijemci_firmy\"><em>všem firemním uživatelům Guardianu</em><br />
	<label for=\"prijemci_firmyvyber\">Uživatelé jednoho klienta</label><br />
	<input type=\"radio\" name=\"prijemci\" value=\"firmy\" id=\"prijemci_firmyvyber\" onclick=\"blah(this.checked)\"><em>firemní uživatelé Guardianu z jedné firmy</em><br />
		<select name=\"posta_firme\" id=\"posta_firme\" class=\"formular\" disabled>";
    $result = dibi::query('SELECT * FROM [prevent_firmy] ORDER BY [nazev] ASC');
    while ($row = $result->fetch()) {
        echo "<option value=\"" . $row['id'] . "\">" . $row['nazev'] . "</option>";
    }
    echo "
				</select>
	
	<br /><br />";

    echo "</td><td><label for=\"prijemci\" class=\"error\" style=\"display:none;\">Vyberte příjemce</label></td></tr></table><label for=\"predmet\">předmět</label><br />
	<input class=\"formular\" name=\"predmet\" size=\"50\"  id=\"predmet\" value=\"\"><br />
	<label for=\"text\">text</label><br />
	<textarea name=\"text\" id=\"text\" class=\"formular\" rows=\"10\" cols=\"50\"></textarea><br />
	<input class=\"tlacitko\" type=\"submit\" value=\"poslat\"> <a href=\"#\" onClick=\"return hide_show('plot_short','plot_full_hromadna')\">neposílat</a>
	</fieldset>
	</form>

           <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#posta_hromadna').validate({
             rules: {
               predmet: {
                 required: true
               },
               text: {
                 required: true
               },
               prijemci: {
                 required: true
               }
               }
             });
           });
           </script>
";
}

function smazat() {
    dibi::query('UPDATE [prevent_posta] SET [stav_' . $_GET['majitel'] . '] = %s', "smazana", 'WHERE [id] = %i', $_GET['smazat']);
}
?>
