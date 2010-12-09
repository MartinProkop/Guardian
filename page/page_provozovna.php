<?php

function vyhledat_provozovna_koordinator() {
    if (!$_POST['firma'])
        $_POST['firma'] = $_GET['firma'];


    echo "<form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" name=\"najdi osobu\" \">
	<fieldset>
	<legend>Název klienta</legend>
	<label for=\"firma\">klient</label><br />
	<select name=\"firma\" id=\"firma\" class=\"formular\">";

    $result = dibi::query('SELECT * FROM [prevent_firmy] ORDER BY [nazev] ASC');
    while ($row = $result->fetch()) {
        if ($_POST['firma']) {
            $check = "";
            if ($row['id'] == $_POST['firma'])
                $check = "selected";
        }
        echo "<option $check value=\"" . $row['id'] . "\">" . $row['nazev'] . "</option>";
    }
    echo "</select><br />";

    echo "<input class=\"tlacitko\" type=\"submit\" value=\"vypsat\">";
    if ($_POST['firma'])
        echo "<a href=\"./firmy_koordinator.php?id=detaily_firmy&id_firmy=" . $_POST['firma'] . "&action=pridat_provozovnu\"><img src=\"./design/pridat.png\" /> přidat poboču</a>";
    echo "
	</fieldset>
	</form><br />";

    if ($_POST['firma']) {
        echo_table_provozovna();

        $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $_POST['firma']);
        while ($row = $result->fetch()) {
            echo_provozovna($row['id'], "koordinator");
        }

        echo "</table>
		<p>Přejít na <a href=\"./firmy_koordinator.php?id=detaily_firmy&id_firmy=" . $_POST['firma'] . "\"><img src=\"./design/detaily.png\"/> detaily klienta</a>.</p>";
    }
}

function vyhledat_provozovna_technik() {
    if (!$_POST['firma'])
        $_POST['firma'] = $_GET['firma'];

    echo "<form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" name=\"najdi osobu\" \">
	<fieldset>
	<legend>Název klienta</legend>
	<label for=\"firma\">klient</label><br />
	<select name=\"firma\" id=\"firma\" class=\"formular\">";

    $resultx = dibi::query('SELECT * FROM [prevent_firmy_technik] WHERE [id_technik] = %i', $_SESSION['id_usr']);
    while ($rowx = $resultx->fetch()) {
        $result = dibi::query('SELECT * FROM [prevent_firmy] WHERE [id] = %i', $rowx['id_firma'], 'ORDER BY [nazev] ASC');
        while ($row = $result->fetch()) {
            if ($_POST['firma']) {
                $check = "";
                if ($row['id'] == $_POST['firma'])
                    $check = "selected";
            }
            echo "<option $check value=\"" . $row['id'] . "\">" . $row['nazev'] . "</option>";
        }
    }
    echo "</select><br />";

    echo "<input class=\"tlacitko\" type=\"submit\" value=\"vypsat\">";
    if ($_POST['firma'])
        echo "<a href=\"./firmy_technik.php?id=detaily_firmy&id_firmy=" . $_POST['firma'] . "&action=pridat_provozovnu\"><img src=\"./design/pridat.png\" /> přidat poboču</a>";
    echo "
	</fieldset>
	</form><br />";

    if ($_POST['firma']) {
        echo_table_provozovna();

        $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $_POST['firma']);
        while ($row = $result->fetch()) {
            echo_provozovna($row['id'], "technik");
        }

        echo "</table>
		<p>Přejít na <a href=\"./firmy_technik.php?id=detaily_firmy&id_firmy=" . $_POST['firma'] . "\"><img src=\"./design/detaily.png\"/> detaily klienta</a>.</p>";
    }
}
?>