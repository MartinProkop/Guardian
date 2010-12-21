<?php

function echo_neshody($id, $prepinac) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id);
    $row = $result->fetch();

    echo "<form method=\"POST\" id=\"formvyber\" action=\"./provest_audit.php?id_audit=" . $_GET['id_audit'] . "&id=neshody&akce_tyka_netyka=ano\" >";
    echo "<table class=\"table\">";
    echo "<tr>
        <td><span class=\"subheader\">STAV</span></td>
        <td><span class=\"subheader\">AKCE</span></td>
        <td><span class=\"subheader\">neshoda</span></td>
        <td><span class=\"subheader\">komentář</span></td>
        <td><span class=\"subheader\">navrhované<br />opatření</span></td>
        <td><span class=\"subheader\">poslední<br />změna</span></td>
        </tr>";

    $result_neshody = dibi::query('SELECT * FROM [prevent_audit_neshody] WHERE [id_audit] = %i', $id, 'ORDER BY [id] ASC');
    while ($row_neshody = $result_neshody->fetch()) {
        if ($row_neshody['id_otazka'] != null) {


            $result_check_audit = dibi::query('SELECT * FROM [prevent_audit_checklist] WHERE [id] = %i', $row_neshody['id_otazka']);
            $row_check_audit = $result_check_audit->fetch();

            $result_check_1 = dibi::query('SELECT * FROM [prevent_audit_checklist_schema] WHERE [id] = %i', $row_check_audit['id_otazka']);
            $row_check_1 = $result_check_1->fetch();

            $result_check_2 = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [id] = %i', $row_check_1['id_kat']);
            $row_check_2 = $result_check_2->fetch();

            if ($row_check_audit['odpoved'] == "castecne")
                $odpoved = "<br /><strong>ODPOVĚĎ</strong>: částečně (" . $row_check_audit['castecne'] . "%)";
            else
                $odpoved = "<br /><strong>ODPOVĚĎ</strong>: ne";

            $text_puvod = "<strong>CHECKLIST</strong>: " . $row_check_2['cislo'] . ". " . $row_check_2['kat_jmeno'] . ": " . $row_check_1['cislo'] . ". " . $row_check_1['text'] . $odpoved;
        }
        elseif ($row_neshody['id_pracoviste'] != null) {
            $text_puvod = "<strong>PRACOVIŠTĚ</strong> - <em>" . get_jmeno_objekt("pracoviste", $row_neshody['id_pracoviste']) . "</em>: " . $row_neshody['neshoda'];
        }

        if ($row_neshody['stav'] == "zpracovano") {
            $text = "zpracováno";
            $styl = "class=\"green\"";
            $checked = "checked";
            $readonly = "readonly";
        } elseif ($row_neshody['stav'] == "nezpracovano" || $row_neshody['stav'] == "") {
            $text = "nezpracováno";
            $styl = "class=\"red\"";
            $checked = "";
            $readonly = "";
        }

        echo "<tr>
        <td " . $styl . ">" . $text . "</td>
        <td><a href=\"./provest_audit.php?id=neshoda&id_audit=" . $_GET['id_audit'] . "&neshoda=" . $row_neshody['id'] . "\">provést</a><br /><label for=\"tykanetykapole" . $row_neshody['id'] . "\">potvrdit</label><input type=\"checkbox\" name=\"tykanetykapole[" . $row_neshody['id'] . "]\" id=\"tykanetykapole" . $row_neshody['id'] . "\"  value=\"ano\" " . $checked . " " . $readonly . "></td>
            <td>" . $text_puvod . "</td>
        <td>" . $row_neshody['komentar'] . "</td>
            <td>" . $row_neshody['opatreni'] . "</td>
                
        <td>" . Date("H:i d.m.Y", $row_neshody['date']) . "</td>
        </tr>";
    }

    echo "</table>";

    echo "<br /><fieldset>
	<legend>Zaškrtlé neshody</legend>
        <label><a  onclick=\"checkni()\">vybrat vše</a> / <a  onclick=\"uncheckni()\">nevybrat nic</a></label><br />
        <Label for=\"provest\">Zašktlé označit za zpracované</label><br />
        <input type=\"submit\" value=\"provést\" id=\"provest\" class=\"tlacitko\">
        </fieldset></form>";
}

function new_neshoda($id_audit, $prepinac, $id_relace, $neshoda = "", $navrh = "", $komentar = "") {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id_audit);
    $row = $result->fetch();
    $arr['id_audit'] = $id_audit;
    $arr['komentar'] = $komentar;
    $arr['opatreni'] = $navrh;
    $arr['date'] = Time();

    if ($prepinac == "checklist") {
        $arr['id_otazka'] = $id_relace;

        $result2 = dibi::query('SELECT * FROM [prevent_audit_neshody] WHERE [id_audit] = %i', $id_audit, 'AND [id_otazka] = %i', $id_relace);
        if (!$row2 = $result2->fetch()) {

            dibi::query('INSERT INTO [prevent_audit_neshody]', $arr);

            $arr_log = array('text' => 'Upraven audit - přidána položka do seznamu neshod.', 'id_audit' => $id_audit, 'id_provozovna' => $row['id_provozovna']);
            vytvor_log_audit($arr_log);
        } else {
            dibi::query('UPDATE [prevent_audit_neshody] SET', $arr, 'WHERE [id_audit] = %i', $id_audit, 'AND [id_otazka] = %i', $id_relace);
            $arr_log = array('text' => 'Upraven audit - upravena položka do seznamu neshod.', 'id_audit' => $id_audit, 'id_provozovna' => $row['id_provozovna']);
            vytvor_log_audit($arr_log);
        }
    } elseif ($prepinac == "pracoviste") {
        $arr['id_pracoviste'] = $id_relace;
        $arr['neshoda'] = $neshoda;

        dibi::query('INSERT INTO [prevent_audit_neshody]', $arr);

        $arr_log = array('text' => 'Upraven audit - přidána položka do seznamu neshod.', 'id_audit' => $id_audit, 'id_provozovna' => $row['id_provozovna']);
        vytvor_log_audit($arr_log);
    }
}

function delete_neshoda($id_audit, $prepinac, $id_relace) {

    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id_audit);
    $row = $result->fetch();

    if ($prepinac == "checklist") {
        $result2 = dibi::query('SELECT * FROM [prevent_audit_neshody] WHERE [id_audit] = %i', $id_audit, 'AND [id_otazka] = %i', $id_relace);
        if ($row2 = $result2->fetch()) {
            dibi::query('DELETE FROM [prevent_audit_neshody] WHERE [id] = %i', $row2['id']);
        } elseif ($prepinac == "checklist") {
            $result2 = dibi::query('SELECT * FROM [prevent_audit_neshody] WHERE [id_audit] = %i', $id_audit, 'AND [id_pracoviste] = %i', $id_relace);
            if ($row2 = $result2->fetch()) {
                dibi::query('DELETE FROM [prevent_audit_neshody] WHERE [id] = %i', $row2['id']);
            }
        }

        $arr_log = array('text' => 'Upraven audit - odstraněna položka ze seznamu neshod', 'id_audit' => $id_audit, 'id_provozovna' => $row['id_provozovna']);
        vytvor_log_audit($arr_log);
    }
}

function provest_neshoda($id) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $_GET['id_audit']);
    $row = $result->fetch();

    $result_neshody = dibi::query('SELECT * FROM [prevent_audit_neshody] WHERE [id] = %i', $_GET['neshoda'], 'ORDER BY [id] ASC');
    while ($row_neshody = $result_neshody->fetch()) {
        if ($row_neshody['id_otazka'] != null) {

            $result_check_audit = dibi::query('SELECT * FROM [prevent_audit_checklist] WHERE [id] = %i', $row_neshody['id_otazka']);
            $row_check_audit = $result_check_audit->fetch();

            $result_check_1 = dibi::query('SELECT * FROM [prevent_audit_checklist_schema] WHERE [id] = %i', $row_check_audit['id_otazka']);
            $row_check_1 = $result_check_1->fetch();

            $result_check_2 = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [id] = %i', $row_check_1['id_kat']);
            $row_check_2 = $result_check_2->fetch();

            if ($row_check_audit['odpoved'] == "castecne")
                $odpoved = "<br /><strong>ODPOVĚĎ</strong>: částečně (" . $row_check_audit['castecne'] . "%)";
            else
                $odpoved = "<br /><strong>ODPOVĚĎ</strong>: ne";

            $text_puvod = "<strong>CHECKLIST</strong>: " . $row_check_2['cislo'] . ". " . $row_check_2['kat_jmeno'] . ": " . $row_check_1['cislo'] . ". " . $row_check_1['text'] . $odpoved;
        }
        elseif ($row_neshody['id_pracoviste'] != null) {

            $text_puvod = "<strong>PRACOVIŠTĚ</strong> - <em>" . get_jmeno_objekt("pracoviste", $row_neshody['id_pracoviste']) . "</em>: " . $row_neshody['neshoda'];
        }

        if ($row_neshody['stav'] == "zpracovano") {
            $text = "zpracováno";
            $styl = "class=\"green\"";
        } elseif ($row_neshody['stav'] == "nezpracovano" || $row_neshody['stav'] == "") {
            $text = "nezpracováno";
            $styl = "class=\"red\"";
        }
    }
    $result_neshody = dibi::query('SELECT * FROM [prevent_audit_neshody] WHERE [id] = %i', $id);
    $row_neshody = $result_neshody->fetch();

    if ($_POST['sent']) {
        $arr_log = array('text' => 'Audit byl upraven - neshoda', 'id_audit' => $id_audit, 'id_provozovna' => $row['id_provozovna']);
        vytvor_log_audit($arr_log);


        $arr = array('komentar' => $_POST['komentar'], 'opatreni' => $_POST['opatreni'], 'stav' => 'zpracovano', 'date' => Time());
        dibi::query('UPDATE [prevent_audit_neshody] SET', $arr, 'WHERE [id] = %i', $_GET['neshoda']);

        if ($row_neshody['id_otazka']) {
            $arrkoment['komentar'] = $_POST['komentar'];
            dibi::query('UPDATE [prevent_audit_checklist] SET', $arrkoment, 'WHERE [id] = %i', $row_neshody['id_otazka']);
        }

        dibi::query('UPDATE [prevent_audit] SET [date_stav_neshody] = %i', Time(), 'WHERE [id] = %i', $_GET['id_audit']);

        echo "<div class=\"obdelnik\"><h5>Neshoda upravena</h5><p>Pokračujte na <a href=\"./provest_audit.php?id=neshody&id_audit=" . $_GET['id_audit'] . "\">databázi neshod</a>.</p></div>";
    } else {


        echo "<form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" name=\"provest audit neshoda\" id=\"neshoda\">
		<input type=\"hidden\" name=\"sent\" value=\"true\">
		<fieldset>
		<legend>Neshoda</legend>
		<label for=\"jmeno\">Původ neshody</label><br />
		" . $text_puvod . "<br />
                 <label for=\"komentar\">Komentář</label><br />
                 <textarea name=\"komentar\" id=\"komentar\" class=\"formular\" rows=\"10\" cols=\"50\">" . $row_neshody['komentar'] . "</textarea><br />
                <label for=\"opatreni\">Návrh opatření</label><br />
		<textarea name=\"opatreni\" id=\"opatreni\" class=\"formular\" rows=\"10\" cols=\"50\">" . $row_neshody['opatreni'] . "</textarea><br />";
        echo "       <input class=\"tlacitko\" id=\"send\" type=\"submit\" value=\"uložit\"><a href=\"./provest_audit.php?id=neshody&id_audit=" . $_GET['id_audit'] . "\">neukládat</a>
		</fieldset>
		</form>
           <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#neshoda').validate({
             rules: {
               komentar: {
                 required: true
               },
               opatreni: {
                 required: true
               }

               }
             });
           });
           </script>";
    }
}

function echo_neshoda_pracoviste($id_pracoviste, $id_audit) {
    echo "<table class=\"table\">
    <tr><td><span class=\"subheader\">neshoda</span></td><td><span class=\"subheader\">Navrhované opatření</span></td>
    </tr>";

    $result_neshody = dibi::query('SELECT * FROM [prevent_audit_neshody] WHERE [id_pracoviste] = %i', $id_pracoviste, 'AND [id_audit] = %i', $id_audit, 'ORDER BY [id] ASC');
    while ($row_neshody = $result_neshody->fetch()) {
        echo "<tr><td>" . $row_neshody['neshoda'] . "</td><td>" . $row_neshody['opatreni'] . "</td></tr>";
    }
    echo "</table>";
}

function neshody_zpracovano($id_audit) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id_audit);
    $row = $result->fetch();

    $uzavrit_true = true;
    $result_check = dibi::query('SELECT * FROM [prevent_audit_neshody] WHERE [id_audit] = %i', $id_audit);
    if ($result_check->count() < 1)
        return false;
    while ($row_check = $result_check->fetch()) {

        if (($row_check['stav'] == "zpracovano") && $uzavrit_true) {
            $uzavrit_true = true;
        } else {
            $uzavrit_true = false;
        }
    }
    return $uzavrit_true;
}

function tyka_netyka_neshoda($audit) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $audit);
    $row = $result->fetch();

    $pole = $_POST[tykanetykapole];

    $varovani = false;

    $resultx = dibi::query('SELECT * FROM [prevent_audit_neshody] WHERE [id_audit] = %i', $audit);
    while ($rowx = $resultx->fetch()) {
        //   if ($pole[$rowx[id]] == "ano" && $rowx['komentar'] != "" && $rowx['opatreni'] != "") {
        if ($pole[$rowx[id]] == "ano" && $rowx['opatreni'] != "") {
            dibi::query('UPDATE [prevent_audit_neshody] SET [date] = %i', Time(), ',[stav] = %s', "zpracovano", 'WHERE [id] = %i', $rowx[id]);
            $arr_log = array('text' => 'Upraven audit - neshoda - potvrzena', 'id_audit' => $audit, 'id_provozovna' => $row['id_provozovna']);
            vytvor_log_audit($arr_log);
        } elseif($pole[$rowx[id]] == "ano" && $rowx['opatreni'] = "") {
            $varovani = true;
        }
    }

    if ($varovani)
        echo "<div class=\"obdelnik\"><h5>Některé neshody nebyly označeny za provedené</h5><p>Je potřeba aby neshody měli vyplněnou položku <em>opatření</em>.</p></div>";
}
?>

