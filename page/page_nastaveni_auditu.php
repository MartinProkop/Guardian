<?php

function pridat_verzi() {
    if ($_POST['nazev']) {

        $predpoverze = get_id_nejnovejsi_verze($_POST['typ']);

        $arr = array('nazev' => $_POST['nazev'], 'typ' => $_GET['typ'], 'date' => time());
        dibi::query('INSERT INTO [prevent_audit_verze]', $arr);

        $poverze = get_id_nejnovejsi_verze($_POST['typ']);

        //kopiruju kategorie
        $result_check = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [verze] = %i', $predpoverze, 'ORDER BY [cislo] ASC');
        while ($row_check = $result_check->fetch()) {
            $arr = array('kat_jmeno' => $row_check['kat_jmeno'], 'cislo' => $row_check['cislo'], 'verze' => $poverze);
            dibi::query('INSERT INTO [prevent_audit_checklist_kategorie_schema]', $arr);
            $result_check2 = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] ORDER BY [id] DESC LIMIT 0,1');
            $row_check2 = $result_check2->fetch();
            $id_kat = $row_check2['id'];

            $result_check3 = dibi::query('SELECT * FROM [prevent_audit_checklist_schema] WHERE [verze] = %i', $predpoverze, 'AND [id_kat] = %i', $row_check['id'], 'ORDER BY [cislo] ASC');
            while ($row_check3 = $result_check3->fetch()) {
                $arr = array('id_kat' => $id_kat, 'text' => $row_check3['text'], 'cislo' => $row_check3['cislo'], 'zavaznost' => $row_check3['zavaznost'], 'navrhovane_opatreni' => $row_check3['navrhovane_opatreni'], 'verze' => $poverze);
                dibi::query('INSERT INTO [prevent_audit_checklist_schema]', $arr);
            }
        }




        $arr_log = array('text' => 'Přidal verzi auditu  ' . $_GET['typ'] . ' s názvem: ' . $_POST['naezv'], 'link' => '', 'ad' => $_SESSION['id_usr']);
        vytvor_log($arr_log);



        echo "<div class=\"obdelnik\"><h5>Verze přidána</h5><p>Pokračujte zpět na <a href=\"./nastaveni_auditu.php?id=enter&typ=".$_GET['typ']."\">seznam akcí</a> checklistu.</p></div>";
    } else {
        echo "<form method=\"POST\" action=\"./nastaveni_auditu.php?id=pridat&typ=" . $_GET['typ'] . "\" id=\"pridat_verzi\">
	<fieldset>
        <legend>přidat verzi auditu</legend>
        <label for=\"typ\">Typ</label><br />
        " . $_GET['typ'] . "<br />
        <label for=\"nazev\">Název</label><br />
	<input name=\"nazev\" id=\"nazev\" class=\"formular\" value=\"\" size=\"50\"><br />
        <input class=\"tlacitko\" type=\"submit\" value=\"přidat\"> <a href=\"./nastaveni_auditu.php?id=enter&typ=".$_GET['typ']."\">nepřidávat</a>
	</fieldset>
	</form>
           <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#pridat_verzi').validate({
             rules: {
               nazev: {
                 required: true
               }

               }
             });
           });
           </script>

        <br />";

        echo "<p>Zpět na <a href=\"./nastaveni_auditu.php?id=enter\">seznam akcí</a> s checklistem.</p>";
    }
}

function vyber_oblasti_nastaveni_auditu() {
    if ($_POST['typ'] == "bozp") {
        $checked_bozp = "selected";
    } elseif ($_POST['typ'] == "po") {
        $checked_po = "selected";
    } elseif ($_POST['typ'] == "bozp_po") {
        $checked_bozp_po = "selected";
    }
    echo "<form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" name=\"nastavení auditů\">
		<fieldset>
		<legend>Vyber typ auditu</legend>";

    if ($_POST['verze'])
    {
        echo "<label for=\"typ\">typ</label><br />
		<select name=\"typ\" id=\"typ\" class=\"formular\" disabled>
                <option value=\"bozp\" $checked_bozp >BOZP (" . pocet_schemat_podle_typu("bozp") . ")</option>
                <option value=\"po\" $checked_po >PO (" . pocet_schemat_podle_typu("po") . ")</option>
                <option value=\"bozp_po\" $checked_bozp_po disabled>BOZP+PO (" . pocet_schemat_podle_typu("bozppo") . ")</option>
                </select><a href=\"nastaveni_auditu.php?id=enter\">změnit</a><br />";

        echo "<label for=\"verze\">verze</label><br />
		<select name=\"verze\" id=\"verze\" class=\"formular\">";
        $result_verze = dibi::query('SELECT * FROM [prevent_audit_verze] WHERE [typ] = %s', get_typ_checklist_z_verze($_POST['verze']), 'ORDER BY [date] DESC');
        while ($row_verze = $result_verze->fetch()) {

            if ($_POST['verze'] == $row_verze['id']) {
                echo "<option value=\"" . $row_verze['id'] . "\" selected>" . $row_verze['nazev'] . " - " . Date("d.m.Y", $row_verze['date']) . "</option>";
            } else {
                echo "<option value=\"" . $row_verze['id'] . "\" >" . $row_verze['nazev'] . " - " . Date("d.m.Y", $row_verze['date']) . "</option>";
            }
        }
        echo "</select><br />";
    }

    elseif (!$_POST['typ']) {
        echo "<label for=\"typ\">typ</label><br />
		<select name=\"typ\" id=\"typ\" class=\"formular\">
                <option value=\"bozp\" $checked_bozp >BOZP (" . pocet_schemat_podle_typu("bozp") . ")</option>
                <option value=\"po\" $checked_po >PO (" . pocet_schemat_podle_typu("po") . ")</option>
                <option value=\"bozp_po\" $checked_bozp_po disabled>BOZP+PO (" . pocet_schemat_podle_typu("bozppo") . ")</option>
                </select><br />";
    } elseif ($_POST['typ']) {
        echo "<label for=\"typ\">typ</label><br />
		<select name=\"typ\" id=\"typ\" class=\"formular\" disabled>
                <option value=\"bozp\" $checked_bozp >BOZP (" . pocet_schemat_podle_typu("bozp") . ")</option>
                <option value=\"po\" $checked_po >PO (" . pocet_schemat_podle_typu("po") . ")</option>
                <option value=\"bozp_po\" $checked_bozp_po disabled>BOZP+PO (" . pocet_schemat_podle_typu("bozppo") . ")</option>
                </select><a href=\"nastaveni_auditu.php?id=enter\">změnit</a><br />";

        echo "<label for=\"verze\">verze</label><br />
		<select name=\"verze\" id=\"verze\" class=\"formular\">";
        $result_verze = dibi::query('SELECT * FROM [prevent_audit_verze] WHERE [typ] = %s', $_POST['typ'], 'ORDER BY [date] DESC');
        while ($row_verze = $result_verze->fetch()) {

            if ($_POST['verze'] == $row_verze['id']) {
                echo "<option value=\"" . $row_verze['id'] . "\" selected>" . $row_verze['nazev'] . " - " . Date("d.m.Y", $row_verze['date']) . "</option>";
            } else {
                echo "<option value=\"" . $row_verze['id'] . "\" >" . $row_verze['nazev'] . " - " . Date("d.m.Y", $row_verze['date']) . "</option>";
            }
        }
        echo "</select><br />";
    }



    echo"<input type=\"submit\" value=\"vybrat\" class=\"tlacitko\" />";
    if ($_POST['typ']) {
        echo "<a href=\"./nastaveni_auditu.php?id=pridat&typ=" . $_POST['typ'] . "\"><img src=\"./design/pridat.png\" /> přidat verzi</a>";
    }
    elseif($_POST['verze'])
    {
        echo "<a href=\"./nastaveni_auditu.php?id=pridat&typ=" . get_typ_checklist_z_verze($_POST['verze']) . "\"><img src=\"./design/pridat.png\" /> přidat verzi</a>";
    }
    echo "</fieldset>
		</form>";

    if ($_POST['verze']) {
        echo "<h4>Nastavení checklistu: " . get_nazev_checklist_z_verze($_POST['verze']) . "</h4>
                <ul>
            <li><a href=\"./nastaveni_auditu.php?id=kategorie&typ=" . $_POST['typ'] . "&verze=" . $_POST['verze'] . "\">okruhy otázek checklistu (celkem: " . pocet_okruhu_ve_verzi($_POST['verze']) . ")</a></li>";
            //<li><a href=\"./nastaveni_auditu.php?id=otazky_vyber&typ=" . $_POST['typ'] . "&verze=" . $_POST['verze'] . "\">otázky v okruzích checklistu (celkem: " . pocet_otazek_ve_verzi($_POST['verze']) . ")</a></li>
            echo "<li><a href=\"./nastaveni_auditu.php?id=nahled&typ=" . $_POST['typ'] . "&verze=" . $_POST['verze'] . "\">náhled (jako v auditu)</a></li>
        </ul>";
    }
}

function nastaveni_kategorii() {

    echo "<table class=\"table\">
    <tr><td><span class=\"subheader\">akce</span></td>
        <td><span class=\"subheader\">pořadí</span></td>
        <td><span class=\"subheader\">název</span></td>
        <td><span class=\"subheader\">počet<br />otázek</span></td>
   </tr>";

    $result_check = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [verze] = %i', $_GET['verze'], 'ORDER BY [cislo] ASC');
    $pocet = $result_check->count();
    $iterace = 1;
    while ($row_check = $result_check->fetch()) {
        echo "<tr>
        <td>
        <a href=\"./nastaveni_auditu.php?id=otazky&typ=" . $_GET['typ'] . "&verze=" . $_GET['verze'] . "&id_kategorie=" . $row_check['id'] . "\"><img src=\"./design/detaily.png\" alt=\"otázky\" title=\"otázky\"></a>";

        if ($iterace == 1 && $pocet != 1) {
            echo "<br /><a href=\"./nastaveni_auditu.php?id=kategorie&typ=" . $_GET['typ'] . "&verze=" . $_GET['verze'] . "&dolu=" . $row_check['id'] . "\"><img src=\"./design/dolu.png\" alt=\"dolu\" title=\"dolu\"></a>";
        } elseif ($iterace == $pocet && $pocet != 1) {
            echo "<br /><a href=\"./nastaveni_auditu.php?id=kategorie&typ=" . $_GET['typ'] . "&verze=" . $_GET['verze'] . "&nahoru=" . $row_check['id'] . "\"><img src=\"./design/nahoru.png\" alt=\"nahoru\" title=\"nahoru\"></a>";
        } elseif ($pocet != 1) {
            echo "<br /><a href=\"./nastaveni_auditu.php?id=kategorie&typ=" . $_GET['typ'] . "&verze=" . $_GET['verze'] . "&nahoru=" . $row_check['id'] . "\"><img src=\"./design/nahoru.png\" alt=\"nahoru\" title=\"nahoru\"></a> <a href=\"./nastaveni_auditu.php?id=kategorie&typ=" . $_GET['typ'] . "&verze=" . $_GET['verze'] . "&dolu=" . $row_check['id'] . "\"><img src=\"./design/dolu.png\" alt=\"dolu\" title=\"dolu\"></a>";
        }
        echo "<br /><a href=\"./nastaveni_auditu.php?id=kategorie_upravit&typ=" . $_GET['typ'] . "&verze=" . $_GET['verze'] . "&upravit=" . $row_check['id'] . "\"><img src=\"./design/edit.png\" alt=\"upravit\" title=\"upravit\"></a> <a href=\"./nastaveni_auditu.php?id=kategorie&typ=" . $_GET['typ'] . "&verze=" . $_GET['verze'] . "&smazat_link=" . $row_check['id'] . "\" onclick=\"if(confirm('Skutečně smazat okruh otázek (smažete i otázky v něm)?')) location.href='./nastaveni_auditu.php?id=kategorie&typ=" . $_GET['typ'] . "&verze=" . $_GET['verze'] . "&smazat_link=" . $row_check['id'] . "'; return(false);\"><img src=\"./design/kos.png\" alt=\"smazat\" title=\"smazat\"></a>
            </td>
        <td>" . $row_check['cislo'] . "</td>
        <td>" . $row_check['kat_jmeno'] . "</td>
        <td>" . pocet_otazek_v_okruhu($_GET['verze'], $row_check['id']) . "</td>
   </tr>";
        $iterace++;
    }

    echo "</table><br />";

    echo "<form method=\"POST\" action=\"./nastaveni_auditu.php?id=kategorie&typ=" . $_GET['typ'] . "&verze=" . $_GET['verze'] . "\" id=\"pridat_okruh\">
	<fieldset>
        <legend>přidat okruh otázek</legend>
        <label for=\"text\">Jméno okruhu</label><br />
	<input name=\"text\" id=\"text\" class=\"formular\" value=\"\" size=\"50\"><br />
        <input class=\"tlacitko\" type=\"submit\" value=\"přidat\">
	</fieldset>
	</form>
        <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#pridat_okruh').validate({
             rules: {
               text: {
                 required: true
               }

               }
             });
           });
           </script><br />";

    echo "<p>Zpět na <a href=\"./nastaveni_auditu.php?id=enter&typ=" . $_GET['typ'] . "&verze=" . $_GET['verze'] . "\">seznam akcí</a> s checklistem.</p>";
}

function pridat_kategorii() {
    $result = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [verze] = %i', $_GET['verze'], 'ORDER BY [cislo] ASC');
    $pocet = $result->count() + 1;
    $arr = array('verze' => $_GET['verze'], 'kat_jmeno' => $_POST['text'], 'cislo' => $pocet);
    dibi::query('INSERT INTO [prevent_audit_checklist_kategorie_schema]', $arr);

    $arr_log = array('text' => 'Přidal kategorii s názvem: ' . $_POST['text'] . ' do checklistu: ' . get_nazev_checklist_z_verze($_GET['verze']) . '.', 'link' => '', 'ad' => $_SESSION['id_usr']);
    vytvor_log($arr_log);
}

function upravit_kategorii($id_kategorie) {
    $result_check = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [id] = %i', $id_kategorie);
    $row_check = $result_check->fetch();

    echo "<form method=\"POST\" action=\"./nastaveni_auditu.php?id=kategorie&typ=" . $_GET['typ'] . "&verze=" . $_GET['verze'] . "&upravit=" . $id_kategorie . "\" id=\"upravit_okruh\">
	<fieldset>
        <legend>upravit okruh otázek</legend>
        <label for=\"text\">Jméno kategorie</label><br />
	<input name=\"text\" id=\"text\" class=\"formular\" value=\"" . $row_check['kat_jmeno'] . "\" size=\"50\"><br />
        <input class=\"tlacitko\" type=\"submit\" value=\"upravit\">  <a href=\"./nastaveni_auditu.php?id=kategorie&typ=" . $_GET['typ'] . "&verze=" . $_GET['verze'] . "\">neupravovat</a>
	</fieldset>
	</form>
               <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#upravit_okruh').validate({
             rules: {
               text: {
                 required: true
               }

               }
             });
           });
           </script><br />";
}

function upravit_kategorii_dve($id_kategorie) {
    $result_check = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [id] = %i', $id_kategorie);
    $row_check = $result_check->fetch();
    $jmeno_old = $row_check['kat_jmeno'];
    $arr = array('kat_jmeno' => $_POST['text']);
    dibi::query('UPDATE [prevent_audit_checklist_kategorie_schema] SET', $arr, 'WHERE [id] = %i', $id_kategorie);

    $arr_log = array('text' => 'Upravil kategorii s názvem: ' . $jmeno_old . ' na: ' . $_POST['text'] . ' v checklistu: ' . get_nazev_checklist_z_verze($_GET['verze']) . '.', 'link' => '', 'ad' => $_SESSION['id_usr']);
    vytvor_log($arr_log);
}

function smazat_kategorii() {

    dibi::query('DELETE FROM [prevent_audit_checklist_schema] WHERE [id_kat] = %i', $_GET['smazat_link'], 'AND [verze] = %i', $_GET['verze']);

    $resultx = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [id] = %i', $_GET['smazat_link']);
    $rowx = $resultx->fetch();
    $jmeno = $rowx['kat_jmeno'];

    dibi::query('DELETE FROM [prevent_audit_checklist_kategorie_schema] WHERE [id] = %i', $_GET['smazat_link']);
    $result = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [verze] = %i', $_GET['verze'], 'ORDER BY [cislo] ASC');
    $pozice = 1;
    while ($row = $result->fetch()) {
        $arr = array('cislo' => $pozice);
        dibi::query('UPDATE [prevent_audit_checklist_kategorie_schema] SET', $arr, 'WHERE [id] = %i', $row['id']);
        $pozice++;
    }

    $arr_log = array('text' => 'Smazal kategorii s názvem: ' . $jmeno . ' z checklistu: ' . get_nazev_checklist_z_verze($_GET['verze']) . '.', 'link' => '', 'ad' => $_SESSION['id_usr']);
    vytvor_log($arr_log);
}

function nahoru_kategorii() {
    $result = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [id] = %i', $_GET['nahoru']);
    $row = $result->fetch();
    $pozice_new = $row['cislo'] - 1;
    $result2 = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [cislo] = %i', $pozice_new, 'AND [verze] = %i', $_GET['verze']);
    $row2 = $result2->fetch();
    $dolu = $row2['id'];

    $arr = array('cislo' => $pozice_new);
    dibi::query('UPDATE [prevent_audit_checklist_kategorie_schema] SET', $arr, 'WHERE [id] = %i', $_GET['nahoru']);
    $arr = array('cislo' => ($pozice_new + 1));
    dibi::query('UPDATE [prevent_audit_checklist_kategorie_schema] SET', $arr, 'WHERE [id] = %i', $dolu);

    $arr_log = array('text' => 'Změnil pořadí kategorie v checklistu: ' . get_nazev_checklist_z_verze($_GET['verze']) . '.', 'link' => '', 'ad' => $_SESSION['id_usr']);
    vytvor_log($arr_log);
}

function dolu_kategorii() {
    $result = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [id] = %i', $_GET['dolu']);
    $row = $result->fetch();
    $pozice_new = $row['cislo'] + 1;
    $result2 = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [cislo] = %i', $pozice_new, 'AND [verze] = %i', $_GET['verze']);
    $row2 = $result2->fetch();
    $nahoru = $row2['id'];

    $arr = array('cislo' => $pozice_new);
    dibi::query('UPDATE [prevent_audit_checklist_kategorie_schema] SET', $arr, 'WHERE [id] = %i', $_GET['dolu']);
    $arr = array('cislo' => ($pozice_new - 1));
    dibi::query('UPDATE [prevent_audit_checklist_kategorie_schema] SET', $arr, 'WHERE [id] = %i', $nahoru);

    $arr_log = array('text' => 'Změnil pořadí kategorie v checklistu: ' . get_nazev_checklist_z_verze($_GET['verze']) . '.', 'link' => '', 'ad' => $_SESSION['id_usr']);
    vytvor_log($arr_log);
}

function vyber_kategorie_otazek() {

    echo "<table class=\"table\">
    <tr><td><span class=\"subheader\">akce</span></td>
        <td><span class=\"subheader\">pořadí</span></td>
        <td><span class=\"subheader\">název</span></td>
        <td><span class=\"subheader\">počet<br />otázek</span></td>
   </tr>";

    $result_check = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [verze] = %i', $_GET['verze'], 'ORDER BY [cislo] ASC');
    $pocet = $result_check->count();
    $iterace = 1;
    while ($row_check = $result_check->fetch()) {
        echo "<tr>
        <td>
        <a href=\"./nastaveni_auditu.php?id=otazky&typ=" . $_GET['typ'] . "&verze=" . $_GET['verze'] . "&id_kategorie=" . $row_check['id'] . "\">otázky</a>";
        echo "</td>
        <td>" . $row_check['cislo'] . "</td>
        <td>" . $row_check['kat_jmeno'] . "</td>
        <td>" . pocet_otazek_v_okruhu($_GET['verze'], $row_check['id']) . "</td>
   </tr>";
        $iterace++;
    }

    echo "</table><br />";

    echo "<p>Zpět na <a href=\"./nastaveni_auditu.php?id=enter&typ=" . $_GET['typ'] . "&verze=" . $_GET['verze'] . "\">seznam akcí</a> s checklistem.</p>";
}

function nastaveni_otazku() {

    echo "<table class=\"table\">
    <tr><td><span class=\"subheader\">akce</span></td>
        <td><span class=\"subheader\">pořadí</span></td>
        <td><span class=\"subheader\">text</span></td>
        <td><span class=\"subheader\">závažnost</span></td>
        <td><span class=\"subheader\">navrhovaná opatření</span></td>
   </tr>";

    $result_check = dibi::query('SELECT * FROM [prevent_audit_checklist_schema] WHERE [id_kat] = %i', $_GET['id_kategorie'], 'AND [verze] = %i', $_GET['verze'], 'ORDER BY [cislo] ASC');
    $pocet = $result_check->count();
    $iterace = 1;
    while ($row_check = $result_check->fetch()) {
        echo "<tr>
        <td>";

        if ($iterace == 1 && $pocet != 1) {
            echo "<a href=\"./nastaveni_auditu.php?id=otazky&typ=" . $_GET['typ'] . "&verze=" . $_GET['verze'] . "&id_kategorie=" . $_GET['id_kategorie'] . "&dolu=" . $row_check['id'] . "\"><img src=\"./design/dolu.png\" alt=\"dolu\" title=\"dolu\"></a><br />";
        } elseif ($iterace == $pocet && $pocet != 1) {
            echo "<a href=\"./nastaveni_auditu.php?id=otazky&typ=" . $_GET['typ'] . "&verze=" . $_GET['verze'] . "&id_kategorie=" . $_GET['id_kategorie'] . "&nahoru=" . $row_check['id'] . "\"><img src=\"./design/nahoru.png\" alt=\"nahoru\" title=\"nahoru\"></a><br />";
        } elseif ($pocet != 1) {
            echo "<a href=\"./nastaveni_auditu.php?id=otazky&typ=" . $_GET['typ'] . "&verze=" . $_GET['verze'] . "&id_kategorie=" . $_GET['id_kategorie'] . "&nahoru=" . $row_check['id'] . "\"><img src=\"./design/nahoru.png\" alt=\"nahoru\" title=\"nahoru\"></a> <a href=\"./nastaveni_auditu.php?id=otazky&typ=" . $_GET['typ'] . "&verze=" . $_GET['verze'] . "&id_kategorie=" . $_GET['id_kategorie'] . "&dolu=" . $row_check['id'] . "\"><img src=\"./design/dolu.png\" alt=\"dolu\" title=\"dolu\"></a><br />";
        }
        echo "<a href=\"./nastaveni_auditu.php?id=otazky_upravit&typ=" . $_GET['typ'] . "&verze=" . $_GET['verze'] . "&id_kategorie=" . $_GET['id_kategorie'] . "&upravit=" . $row_check['id'] . "\" ><img src=\"./design/edit.png\" alt=\"upravit\" title=\"upravit\"></a> <a href=\"./nastaveni_auditu.php?id=otazky&typ=" . $_GET['typ'] . "&verze=" . $_GET['verze'] . "&id_kategorie=" . $_GET['id_kategorie'] . "&smazat_link=" . $row_check['id'] . "\" onclick=\"if(confirm('Skutečně smazat kategorii (smažete i otázky v ní)?')) location.href='./nastaveni_auditu.php?id=otazky&typ=" . $_GET['typ'] . "&verze=" . $_GET['verze'] . "&id_kategorie=" . $_GET['id_kategorie'] . "&smazat_link=" . $row_check['id'] . "'; return(false);\"><img src=\"./design/kos.png\" alt=\"smazat\" title=\"smazat\"></a>
            </td>
        <td>" . $row_check['cislo'] . "</td>
        <td>" . $row_check['text'] . "</td>
        <td>" . $row_check['zavaznost'] . "</td>
        <td>" . $row_check['navrhovane_opatreni'] . "</td>
        </tr>";
        $iterace++;
    }

    echo "</table><br />";

    echo "<form method=\"POST\" action=\"./nastaveni_auditu.php?id=otazky&typ=" . $_GET['typ'] . "&verze=" . $_GET['verze'] . "&id_kategorie=" . $_GET['id_kategorie'] . "\" id=\"pridat_otazku\">
	<fieldset>
        <legend>přidat otázku</legend>
        <label for=\"text\">Otázka</label><br />
	<textarea name=\"text\" id=\"text\" class=\"formular\" cols=\"50\" rows=\"5\" ></textarea><br />
        <label for=\"text2\">Závažnost</label><br />
        <select name=\"text2\" id=\"text2\" class=\"formular\">
        <option value=\"1\">1</option>
        <option value=\"2\" selected>2</option>
        <option value=\"3\">3</option>
        </select><br />
        <label for=\"text3\">Navrhované opatření</label><br />
	<textarea name=\"text3\" id=\"text3\" class=\"formular\" cols=\"50\" rows=\"5\"></textarea><br />
        <input class=\"tlacitko\" type=\"submit\" value=\"přidat\">
	</fieldset>
	</form>
               <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#pridat_otazku').validate({
             rules: {
               text: {
                 required: true
               },
               text3: {
                 required: true
               }

               }
             });
           });
           </script><br />";

    echo "<p>Zpět na <a href=\"./nastaveni_auditu.php?id=enter&typ=" . $_GET['typ'] . "&verze=" . $_GET['verze'] . "\">seznam akcí</a> s checklistem.</p>";
}

function pridat_otazku() {
    $result = dibi::query('SELECT * FROM [prevent_audit_checklist_schema] WHERE [id_kat] = %i', $_GET['id_kategorie'], 'AND [verze] = %i', $_GET['verze'], 'ORDER BY [cislo] ASC');
    $pocet = $result->count() + 1;
    $arr = array('verze' => $_GET['verze'], 'id_kat' => $_GET['id_kategorie'], 'text' => $_POST['text'], 'zavaznost' => $_POST['text2'], 'navrhovane_opatreni' => $_POST['text3'], 'cislo' => $pocet);
    dibi::query('INSERT INTO [prevent_audit_checklist_schema]', $arr);

    $arr_log = array('text' => 'Přidal otázku do checklistu: ' . get_nazev_checklist_z_verze($_GET['verze']) . '.', 'link' => '', 'ad' => $_SESSION['id_usr']);
    vytvor_log($arr_log);
}

function upravit_otazku($id_otazka) {
    $result_check = dibi::query('SELECT * FROM [prevent_audit_checklist_schema] WHERE [id] = %i', $id_otazka);
    $row_check = $result_check->fetch();

    if ($row_check['zavaznost'] == 1)
        $select1 = "selected";
    elseif ($row_check['zavaznost'] == 2)
        $select2 = "selected";
    elseif ($row_check['zavaznost'] == 3)
        $select3 = "selected";

    echo "<form method=\"POST\" action=\"./nastaveni_auditu.php?id=otazky&typ=" . $_GET['typ'] . "&verze=" . $_GET['verze'] . "&id_kategorie=" . $_GET['id_kategorie'] . "&upravit=" . $id_otazka . "\" id=\"upravit_otazku\">
	<fieldset>
        <legend>upravit otázku</legend>
        <label for=\"text\">Otázka</label><br />
	<textarea name=\"text\" id=\"text\" class=\"formular\" cols=\"50\" rows=\"5\" >" . $row_check['text'] . "</textarea><br />
        <label for=\"text2\">Závažnost</label><br />
        <select name=\"text2\" id=\"text2\" class=\"formular\">
        <option value=\"1\" $select1>1</option>
        <option value=\"2\" $select2>2</option>
        <option value=\"3\" $select3>3</option>
        </select><br />
        <label for=\"text3\">Navrhované opatření</label><br />
	<textarea name=\"text3\" id=\"text3\" class=\"formular\" cols=\"50\" rows=\"5\">" . $row_check['navrhovane_opatreni'] . "</textarea><br />
        <input class=\"tlacitko\" type=\"submit\" value=\"upravit\"> <a href=\"./nastaveni_auditu.php?id=otazky&typ=" . $_GET['typ'] . "&verze=" . $_GET['verze'] . "&id_kategorie=" . $_GET['id_kategorie'] . "\">neupravovat</a>
	</fieldset>
	</form>
               <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#upravit_otazku').validate({
             rules: {
               text: {
                 required: true
               },
               text3: {
                 required: true
               }

               }
             });
           });
           </script><br />";
}

function upravit_otazku_dve($id_otazka) {
    $result_check = dibi::query('SELECT * FROM [prevent_audit_checklist_schema] WHERE [id] = %i', $id_otazka);
    $row_check = $result_check->fetch();
    $jmeno_old = $row_check['text'];
    $arr = array('text' => $_POST['text'], 'zavaznost' => $_POST['text2'], 'navrhovane_opatreni' => $_POST['text3']);
    dibi::query('UPDATE [prevent_audit_checklist_schema] SET', $arr, 'WHERE [id] = %i', $id_otazka);

    $arr_log = array('text' => 'Upravil otázku s názvem: ' . $jmeno_old . ' na: ' . $_POST['text'] . ' v checklistu: ' . get_nazev_checklist_z_verze($_GET['verze']) . '.', 'link' => '', 'ad' => $_SESSION['id_usr']);
    vytvor_log($arr_log);
}

function smazat_otazku() {

    dibi::query('DELETE FROM [prevent_audit_checklist_schema] WHERE [id] = %i', $_GET['smazat_link']);

    $result = dibi::query('SELECT * FROM [prevent_audit_checklist_schema]  WHERE [id_kat] = %i', $_GET['id_kategorie'], 'AND [verze] = %i', $_GET['verze'], 'ORDER BY [cislo] ASC');
    $pozice = 1;
    while ($row = $result->fetch()) {
        $arr = array('cislo' => $pozice);
        dibi::query('UPDATE [prevent_audit_checklist_schema] SET', $arr, 'WHERE [id] = %i', $row['id']);
        $pozice++;
    }

    $arr_log = array('text' => 'Smazal otázku z checklistu: ' . get_nazev_checklist_z_verze($_GET['verze']) . '.', 'link' => '', 'ad' => $_SESSION['id_usr']);
    vytvor_log($arr_log);
}

function nahoru_otazku() {
    $result = dibi::query('SELECT * FROM [prevent_audit_checklist_schema] WHERE [id_kat] = %i', $_GET['id_kategorie'], 'AND [id] = %i', $_GET['nahoru']);
    $row = $result->fetch();
    $pozice_new = $row['cislo'] - 1;
    $result2 = dibi::query('SELECT * FROM [prevent_audit_checklist_schema] WHERE [id_kat] = %i', $_GET['id_kategorie'], 'AND [verze] = %i', $_GET['verze'], 'AND [cislo] = %i', $pozice_new);
    $row2 = $result2->fetch();
    $dolu = $row2['id'];

    $arr = array('cislo' => $pozice_new);
    dibi::query('UPDATE [prevent_audit_checklist_schema] SET', $arr, 'WHERE  [id] = %i', $_GET['nahoru']);
    $arr = array('cislo' => ($pozice_new + 1));
    dibi::query('UPDATE [prevent_audit_checklist_schema] SET', $arr, 'WHERE [id] = %i', $dolu);

    $arr_log = array('text' => 'Změnil pořadí otázky v checklistu: ' . get_nazev_checklist_z_verze($_GET['verze']) . '.', 'link' => '', 'ad' => $_SESSION['id_usr']);
    vytvor_log($arr_log);
}

function dolu_otazku() {
    $result = dibi::query('SELECT * FROM [prevent_audit_checklist_schema] WHERE [id_kat] = %i', $_GET['id_kategorie'], 'AND [id] = %i', $_GET['dolu']);
    $row = $result->fetch();
    $pozice_new = $row['cislo'] + 1;
    $result2 = dibi::query('SELECT * FROM [prevent_audit_checklist_schema] WHERE [id_kat] = %i', $_GET['id_kategorie'], 'AND [verze] = %i', $_GET['verze'], 'AND [cislo] = %i', $pozice_new);
    $row2 = $result2->fetch();
    $nahoru = $row2['id'];

    $arr = array('cislo' => $pozice_new);
    dibi::query('UPDATE [prevent_audit_checklist_schema] SET', $arr, 'WHERE [id] = %i', $_GET['dolu']);
    $arr = array('cislo' => ($pozice_new - 1));
    dibi::query('UPDATE [prevent_audit_checklist_schema] SET', $arr, 'WHERE [id] = %i', $nahoru);

    $arr_log = array('text' => 'Změnil pořadí otázky v checklistu: ' . get_nazev_checklist_z_verze($_GET['verze']) . '.', 'link' => '', 'ad' => $_SESSION['id_usr']);
    vytvor_log($arr_log);
}
?>