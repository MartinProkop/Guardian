<?php
require("./header/header_audit_schema_nahled.php");


hlavicka_minipage();

navigace_horni_minipage();
?>
<h2>Náhled schématu auditu</h2>
<div class="mainminipage">

    <?php
    if (login ()) {
        if (!$_POST['typ'])
            $_POST['typ'] = $_GET['typ'];
        if (!$_POST['verze'])
            $_POST['verze'] = $_GET['verze'];


        if ($_POST['typ'] == "bozp") {
            $checked_bozp = "selected";
        } elseif ($_POST['typ'] == "po") {
            $checked_po = "selected";
        } elseif ($_POST['typ'] == "bozp_po") {
            $checked_bozp_po = "selected";
        }
        echo "<form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" name=\"nastavení auditů\">
		<fieldset>
		<legend>Vyber typ auditu</legend>
		<label for=\"typ\">typ</label><br />
		<select name=\"typ\" id=\"typ\" class=\"formular\">
                <option value=\"bozp\" $checked_bozp >BOZP (" . pocet_schemat_podle_typu("bozp") . ")</option>
                <option value=\"po\" $checked_po >PO (" . pocet_schemat_podle_typu("po") . ")</option>
                <option value=\"bozp_po\" $checked_bozp_po disabled>BOZP+PO (" . pocet_schemat_podle_typu("bozppo") . ")</option>
                </select><br />";
        if ($_POST['typ']) {
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
        echo"<input type=\"submit\" value=\"vybrat\" class=\"tlacitko\" /> <a href=\"javascript: self.close ();\">zavřít okno</a>";

        echo "</fieldset>
		</form><br />";

        if ($_POST['verze'])
            checklist_nahled($_POST['verze']);
    }

    patka_minipage();
    ?>