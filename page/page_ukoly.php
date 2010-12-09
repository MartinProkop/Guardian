<?php

function vypis_ukolu_uzivatele() {
    $pocet_uloh_ke_smazani = 0;
    if ($_GET['order_by'] == null)
        $_GET['order_by'] = "id";

    echo "<table class=\"table\">
	<tr>
	<td><span class=\"subheader\"><a href=\"?order_by=stav\">STAV</a></span></td>
	<td><span class=\"subheader\">AKCE</span></td>
	<td><span class=\"subheader\">ÚKOL</span></td>
	<td><span class=\"subheader\">POPIS</span></td>
        
	<td><span class=\"subheader\">ODKAZ</span></td>
        <td><span class=\"subheader\"><a href=\"?order_by=deadline\">DEADLINE</a></span></td>
        <td><span class=\"subheader\"><a href=\"?order_by=date\">ZADÁNO</a></span></td>
	<td><span class=\"subheader\"><a href=\"?order_by=zadal_jmeno\">ZADAL</a></span></td>
	</tr>";

    $result = dibi::query('SELECT * FROM [prevent_ukoly] WHERE [ad] = %i', $_SESSION['id_usr'], 'AND ([stav] != %s', "smazan_splnen", ' AND [stav] != %s)', "smazan_nesplnen", 'ORDER BY %by', $_GET['order_by'], 'ASC');
    while ($row = $result->fetch()) {
        if ($row['deadline'] == "0")
            $deadline_vypis = "nestanoven";
        else
            $deadline_vypis = Date("H:i d.m.Y", $row['deadline']);

        if ($row['stav'] == "nova") {
            $class = "orange";
            $title = "Nový úkol";
            $text = "nový";
            $moznosti = "<a href=\"./ukoly.php?splnen=" . $row['id'] . "\"><img src=\"./design/true.png\" alt=\"splněn\" title=\"splněn\"/></a> <a href=\"./ukoly.php?nesplnen=" . $row['id'] ."\"><img src=\"./design/false.png\" alt=\"nesplním\" title=\"nesplím\"/></a>";
        } elseif ($row['stav'] == "ceka_na_splneni" && $row['deadline'] != 0 && $row['deadline'] < Time()) {
            $class = "red";
            $title = "Proběhl již deadline úkolu";
            $text = "akutní";
            $moznosti = "<a href=\"./ukoly.php?splnen=" . $row['id'] . "\"><img src=\"./design/true.png\" alt=\"splněn\" title=\"splněn\"/></a> <a href=\"./ukoly.php?nesplnen=" . $row['id'] . "\"><img src=\"./design/false.png\" alt=\"nesplním\" title=\"nesplím\"/></a>";
        } elseif ($row['stav'] == "ceka_na_splneni" && $row['deadline'] != 0 && $row['deadline'] > Time()) {
            if ($row['deadline'] - (60 * 60 * 24 * 2) < Time()) {
                $class = "red";
                $title = "Ještě neproběhl dedline úkolu, ale zbývá méně než 2 dny!";
                $text = "akutní - méně než 2 dny!";
            } else {
                $class = "orange";
                $title = "Ještě neproběhl dedline úkolu";
                $text = "čeká";
            }
            $moznosti = "<a href=\"./ukoly.php?splnen=" . $row['id'] . "\"><img src=\"./design/true.png\" alt=\"splněn\" title=\"splněn\"/></a> <a href=\"./ukoly.php?nesplnen=" . $row['id'] . "\"><img src=\"./design/false.png\" alt=\"nesplním\" title=\"nesplím\"/></a>";
        } elseif ($row['stav'] == "ceka_na_splneni" && $row['deadline'] == 0) {
            $class = "orange";
            $title = "Úkol nemá deadline, ale není splňen";
            $text = "čeká";
            $moznosti = "<a href=\"./ukoly.php?splnen=" . $row['id'] . "\"><img src=\"./design/true.png\" alt=\"splněn\" title=\"splněn\"/></a> <a href=\"./ukoly.php?nesplnen=" . $row['id'] . "\"><img src=\"./design/false.png\" alt=\"nesplním\" title=\"nesplím\"/></a>";
        } elseif ($row['stav'] == "splnen") {
            $pocet_uloh_ke_smazani++;
            $class = "green";
            $title = "Úkol jste již splnil";
            $text = "splněn (".Date("H:i:s d.m.Y", $row['date_splnen']).")";
            $moznosti = "<a href=\"./ukoly.php?smazat_splnen=" . $row['id'] . "\" onclick=\"if(confirm('Skutečně chcete záznam smazat?')) location.href='./ukoly.php?smazat_splnen=" . $row['id'] . "'; return(false);\"><img src=\"./design/kos.png\" alt=\"smazat\" title=\"smazat\"/></a>";
        } elseif ($row['stav'] == "nesplnen") {
            $pocet_uloh_ke_smazani++;
            $class = "red";
            $title = "Odmítl jste úkol splnit!";
            $text = "nesplněn (".Date("H:i:s d.m.Y", $row['date_splnen']).")";
            $moznosti = "<a href=\"./ukoly.php?smazat_nesplnen=" . $row['id'] . "\" onclick=\"if(confirm('Skutečně chcete záznam smazat?')) location.href='./ukoly.php?smazat_nesplnen=" . $row['id'] . "'; return(false);\"><img src=\"./design/kos.png\" alt=\"smazat\" title=\"smazat\"/></a>";
        }

        echo "<tr>
		<td class=\"" . $class . "\"><acronym title=\"" . $title . "\">" . $text . "</acronym></td>
		<td>" . $moznosti . "</td>
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
        if ($row['link'] != "")
            echo "<td><a href=\"" . $row['link'] . "\"><img src=\"./design/link.png\" alt=\"přejít na úkol\" title=\"přejít na úkol\"/></a></td>";
        else
            echo "<td>není</td>";
        echo "<td>" . $deadline_vypis . "</td>
            <td>" . Date("H:i d.m.Y", $row['date']) . "</td>
            <td>" . $row['zadal_jmeno'] . "</td>
		</tr>";
    }
    echo "</table>";

//prepsani stavu
    $result = dibi::query('SELECT * FROM [prevent_ukoly] WHERE [ad] = %i', $_SESSION['id_usr'], ' AND [stav] = %s', "nova", 'ORDER BY [deadline] ASC');
    while ($row = $result->fetch())
        dibi::query('UPDATE [prevent_ukoly] SET [stav] = %s', "ceka_na_splneni", 'WHERE [id] = %i', $row['id']);

    echo "<h4>Smazat již uzavřené úlohy (" . $pocet_uloh_ke_smazani . " úloh)</h4><p><a href=\"./ukoly.php?smazat_vse=true\" onclick=\"if(confirm('Skutečně chcete smazat uzavřené úkoly?')) location.href='./ukoly.php?smazat_vse=true'; return(false);\"><img src=\"./design/kos.png\" /> smaže splňené a nespněné úlohy ze seznamu</a></p>";
}

function splnen() {
    dibi::query('UPDATE [prevent_ukoly] SET [stav] = %s', "splnen", ', [date_splnen] = %s' , Time() ,  'WHERE [id] = %i', $_GET['splnen']);
}

function smazat_splnen() {
    dibi::query('UPDATE [prevent_ukoly] SET [stav] = %s', "smazan_splnen", 'WHERE [id] = %i', $_GET['smazat_splnen']);
}

function smazat_nesplnen() {
    dibi::query('UPDATE [prevent_ukoly] SET [stav] = %s', "smazan_nesplnen", 'WHERE [id] = %i', $_GET['smazat_nesplnen']);
}

function nesplnen() {
    $result = dibi::query('SELECT * FROM [prevent_ukoly] WHERE [id] = %i', $_GET['nesplnen']);
    while ($row = $result->fetch()) {
    if($_POST['duvod'])
    {
        if($row['zadal_jmeno'] == "systém") $ad = 1;
        else $ad = get_id_uzivatele_z_jmeno($row['zadal_jmeno']);
        dibi::query('UPDATE [prevent_ukoly] SET [stav] = %s', "nesplnen", ', [date_splnen] = %s' , Time() , ', [nesplnil] = %s' , $_POST['duvod_text'] , 'WHERE [id] = %i', $_GET['nesplnen']);
        $arr_ukol = array('deadline' => 0, 'text' => "Uživatel ".  get_jmeno_uzivatele_z_id($_SESSION['id_usr'])." nesplnil Vámi zadaný úkol.", 'popis' => "<strong>Úkol:</strong> ".$row['text']."<br /><strong>Popis:</strong> ".$row['popis']."<br /><strong>Udaný důvod:</strong> ".$_POST['duvod_text'].".", 'link' => "", 'ad' => $ad, 'zadal_jmeno' => "systém");
        novy_ukol($arr_ukol);
    }
    else
    {


 	echo "<form method=\"POST\" action=\"".$_SERVER['REQUEST_URI']."\" id=\"odmitam_ukol\">
	<fieldset>
	<legend>Nesplním úkol</legend>
        <input type=\"hidden\" name=\"duvod\" value=\"ano\">
	<label for=\"ukol\">úkol</label><br />
        ".$row['text']."<br />
	<label for=\"popis\">popis</label><br />
        ".$row['popis']."<br />
 	<label for=\"deadline\">deadline</label><br />";
        if($row['deadline'] == 0) echo "nezadán";
        else echo Date("H:i d.m.Y", $row['deadline']);
 	echo"<br /><label for=\"zadáno\">zadáno</label><br />
        ".Date("H:i d.m.Y", $row['date'])."<br />
 	<label for=\"link\">odkaz</label><br />";
        if($row['link'] != "") echo "<a href=\"" . $row['link'] . "\">přejít na úkol</a>";
        else echo "nezadán";
	echo "<br /><label for=\"link\">zadal</label><br />
        ".$row['zadal_jmeno']."
        <br /><label for=\"duvod_text\">důvod nesplnění</label><br />
	<textarea name=\"duvod_text\" id=\"duvod_text\" class=\"formular\" rows=\"10\" cols=\"50\"></textarea><br />
	<input class=\"tlacitko\" type=\"submit\" value=\"nesplním\"> <a href=\"./ukoly.php\">odejít</a> / <a href=\"./ukoly.php?splnen=".$row['id']."\">splním</a>
	</fieldset>
	</form>
           <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#odmitam_ukol').validate({
             rules: {
               duvod_text: {
                 required: true
               }
               }
             });
           });
           </script>";
    }
}


    
}

function smazat_vse() {
    dibi::query('UPDATE [prevent_ukoly] SET [stav] = %s', "smazan_splnen", 'WHERE [stav] = %s', "splnen", 'AND [ad] = %i', $_SESSION['id_usr']);
    dibi::query('UPDATE [prevent_ukoly] SET [stav] = %s', "smazan_nesplnen", 'WHERE [stav] = %s', "nesplnen", 'AND [ad] = %i', $_SESSION['id_usr']);
}
?>