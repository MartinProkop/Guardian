<?php

function vypis_zadanych_ukolu() {
    if ($_GET['order_by'] == null)
        $_GET['order_by'] = "id";

    echo "<h4>Výpis Vámi zadaných úkolů</h4>
	<table class=\"table\">
	<tr>
	<td><span class=\"subheader\"><a href=\"?order_by=stav\">STAV</a></span></td>
	<td><span class=\"subheader\">ÚKOL</span></td>
	<td><span class=\"subheader\">POPIS</span></td>
	<td><span class=\"subheader\">ODKAZ</span></td>
        <td><span class=\"subheader\"><a href=\"?order_by=deadline\">DEADLINE</a></span></td>
        <td><span class=\"subheader\"><a href=\"?order_by=date\">ZADÁNO</a></span></td>
	<td><span class=\"subheader\"><a href=\"?order_by=ad\">UŽIVATEL</a></span></td>
	</tr>";

    $result = dibi::query('SELECT * FROM [prevent_ukoly] WHERE [zadal_jmeno] = %s', $_SESSION['jmeno_usr'], 'ORDER BY %by', $_GET['order_by'], 'ASC');
    while ($row = $result->fetch()) {
        if ($row['deadline'] == "0")
            $deadline_vypis = "nestanoven";
        else
            $deadline_vypis = Date("H:i d.m.Y", $row['deadline']);

        if ($row['stav'] == "nova") {
            $class = "orange";
            $title = "Uživatel ještě nepřečetl zadání";
            $text = "nový";
        } elseif ($row['stav'] == "ceka_na_splneni" && $row['deadline'] != 0 && $row['deadline'] < Time()) {
            $class = "red";
            $title = "Proběhl již deadline úkolu";
            $text = "akutní";
        } elseif ($row['stav'] == "ceka_na_splneni" && $row['deadline'] != 0 && $row['deadline'] > Time()) {
            if ($row['deadline'] - (60 * 60 * 24 * 2) < Time()) {
                $class = "red";
                $title = "Ještě neproběhl dedline úkolu, ale zbývá méně než 2 dny!";
                $text = "akutní - méně než 2 dny!";
            } else {
                $class = "orange";
                $title = "Ještě neproběhl deadline úkolu";
                $text = "čeká na splnění";
            }
        } elseif ($row['stav'] == "ceka_na_splneni" && $row['deadline'] == 0) {
            $class = "orange";
            $title = "Úkol nemá deadline, ale není splňen";
            $text = "čeká na splnění";
        } elseif ($row['stav'] == "splnen") {
            $class = "green";
            $title = "Úkol splněn";
            $text = "splněn (" . Date("H:i:s d.m.Y", $row['date_splnen']) . ")";
        } elseif ($row['stav'] == "nesplnen") {
            $class = "red";
            $title = "Uživatel odmítl úkol splnit!";
            $text = "nesplněn (" . Date("H:i:s d.m.Y", $row['date_splnen']) . ")";
        } elseif ($row['stav'] == "smazan_splnen") {
            $pocet_uloh_ke_smazani++;
            $class = "green";
            $title = "Úkol splněn";
            $text = "splněn";
        } elseif ($row['stav'] == "smazan_nesplnen") {
            $pocet_uloh_ke_smazani++;
            $class = "red";
            $title = "Uživatel odmítl úkol splnit!";
            $text = "nesplněn";
        }

        $result2 = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $row['ad']);
        $row2 = $result2->fetch();

        echo "<tr>
		<td class=\"" . $class . "\"><acronym title=\"" . $title . "\">" . $text . "</acronym></td>
		
		
		<td>" . $row['text'] . "</td>
		<td><a href=\"#tooltip_" . $row['id'] . "\" name=\"tooltip_" . $row['id'] . "\"  id=\"tooltip_" . $row['id'] . "\"><img src=\"./design/detaily.png\" alt=\"podrobně\" title=\"podrobně\"/></a></td>
                    <script type=\"text/javascript\">
                    $(document).ready(function()
                    {
                       $('#tooltip_$row[id]').qtip(
                       {
                          content: {
                            text: '".ereg_replace("[\r|\n]+","<br>",$row[popis])."',
                            title: {
                                text: 'popis úkolu',
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
        if ($row['link'] != "") {
            echo "<td><a href=\"" . $row['link'] . "\"><img src=\"./design/link.png\" alt=\"přejít na úkol\" title=\"přejít na úkol\"/></a></a></td>";
        } else {
            echo "<td>není</td>";
        }
        echo "<td>" . $deadline_vypis . "</td>
            <td>" . Date("H:i d.m.Y", $row['date']) . "</td>
            <td>" . $row2['jmeno'] . "</td>
		</tr>";
    }

    echo "</table>";
}

function zadat_ukol() {
    if (IsSet($_POST['ukol'])) {
        if ($_POST['deadlinecheckbox'] == "deadlinecheckbox")
            $deadline = mktime(0, 0, 0, $_POST['mesic'], $_POST['den'], $_POST['rok']);
        else
            $deadline = 0;

        $arr_ukol = array('deadline' => $deadline, 'text' => $_POST['ukol'], 'popis' => $_POST['popis'], 'link' => $_POST['link'], 'ad' => $_POST['prijemce_id'], 'zadal_jmeno' => $_SESSION['jmeno_usr']);
        novy_ukol($arr_ukol);
    }
    echo "<form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" name=\"zadat ukol\" id=\"zadat_ukol\">
	<fieldset>
	<legend>nový úkol</legend>";

    if ($_SESSION['prava_usr'] == "admin")
        EchoUzivateleSelect("příjemce", "prijemce_id", 1, 1, 1, 0);
    elseif ($_SESSION['prava_usr'] == "koordinator")
        EchoUzivateleSelect("příjemce", "prijemce_id", 0, 1, 1, 0);
    elseif ($_SESSION['prava_usr'] == "technik")
        EchoUzivateleSelect("příjemce", "prijemce_id", 0, 0, 1, 0);

    echo "<label for=\"ukol\">úkol</label><br />
	<textarea name=\"ukol\" id=\"ukol\" class=\"formular\" rows=\"10\" cols=\"50\"></textarea><br />";

    echo EchoDateFormDeadline($SYear, $SMonth, $SDay);

    echo "<label for=\"popis\">popis</label><br />
	<textarea name=\"popis\" id=\"popis\" class=\"formular\" rows=\"10\" cols=\"50\"></textarea><br />
	<label for=\"link\">link</label><br />
	<input class=\"formular\" name=\"link\" size=\"50\" id=\"link\" value=\"\"><br />
	<input class=\"tlacitko\" type=\"submit\" value=\"zadat\"> <a href=\"#\" onClick=\"return hide_show('plot_short','plot_full')\">nezadávat</a>
	</fieldset>
	</form>
        <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#zadat_ukol').validate({
             rules: {
               ukol: {
                 required: true
               }
               }
             });
           });
           </script>";
}
?>
