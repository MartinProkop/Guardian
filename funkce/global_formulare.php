<?php

function EchoUzivateleSelect($jmeno_pole, $jmeno_pole_bez_diaktitiky, $admini, $koordinatori, $technici, $firmy) {


    if ($jmeno_pole)
        echo "<label for=\"" . $jmeno_pole_bez_diaktitiky . "\">" . $jmeno_pole . "</label><br />";

    echo "<select name=\"" . $jmeno_pole_bez_diaktitiky . "\" id=\"" . $jmeno_pole_bez_diaktitiky . "\" class=\"formular\">";

    if ($admini) {
        echo "<optgroup label=\"administrátoři\">";
        $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [prava] = %s', "admin", 'ORDER BY [jmeno]');
        while ($row = $result->fetch()) {
            if ($_GET['adresat'] == $row['id'])
                echo "<option value=\"" . $row['id'] . "\" selected=\"selected\">" . $row['jmeno'] . "</option>";
            else
                echo "<option value=\"" . $row['id'] . "\">" . $row['jmeno'] . "</option>";
        }
        echo "</optgroup>";
    }
    if ($koordinatori) {
        echo "<optgroup label=\"koordinátoři\">";
        $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [prava] = %s', "koordinator", 'ORDER BY [jmeno]');
        while ($row = $result->fetch()) {
            if ($_GET['adresat'] == $row['id'])
                echo "<option value=\"" . $row['id'] . "\" selected=\"selected\">" . $row['jmeno'] . "</option>";
            else
                echo "<option value=\"" . $row['id'] . "\">" . $row['jmeno'] . "</option>";
        }
        echo "</optgroup>";
    }
    if ($technici == 1) {//vsichni
        echo "<optgroup label=\"technici\">";
        $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [prava] = %s', "technik", 'ORDER BY [jmeno]');
        while ($row = $result->fetch()) {
            if ($_GET['adresat'] == $row['id'])
                echo "<option value=\"" . $row['id'] . "\" selected=\"selected\">" . $row['jmeno'] . "</option>";
            else
                echo "<option value=\"" . $row['id'] . "\">" . $row['jmeno'] . "</option>";
        }
        echo "</optgroup>";
    } elseif ($technici == 2) {//prideleni firme
        echo "<optgroup label=\"technici\">";
        $result = dibi::query('SELECT * FROM [prevent_firmy_technik] WHERE [id_firma] = %i', $_SESSION['firma_usr']);
        while ($row = $result->fetch()) {
            $result2 = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $row['id_technik']);
            while ($row2 = $result2->fetch()) {

                if ($_GET['adresat'] == $row2['id'])
                    echo "<option value=\"" . $row2['id'] . "\" selected=\"selected\">" . $row2['jmeno'] . "</option>";
                else
                    echo "<option value=\"" . $row2['id'] . "\">" . $row2['jmeno'] . "</option>";
            }
        }
        echo "</optgroup>";
    } elseif ($technici == 3) {//prideleni firme u zadavani auditu
        echo "<optgroup label=\"technici\">";
        $result = dibi::query('SELECT * FROM [prevent_firmy_technik] WHERE [id_firma] = %i', $_POST['firma']);
        while ($row = $result->fetch()) {
            $result2 = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $row['id_technik']);
            while ($row2 = $result2->fetch()) {
                if ($_GET['adresat'] == $row2['id'])
                    echo "<option value=\"" . $row2['id'] . "\" selected=\"selected\">" . $row2['jmeno'] . "</option>";
                else
                    echo "<option value=\"" . $row2['id'] . "\">" . $row2['jmeno'] . "</option>";
            }
        }
        echo "</optgroup>";
    }
    if ($firmy == 1) {//vsechny
        echo "<optgroup label=\"klienti\">";
        $result = dibi::query('SELECT * FROM [prevent_firmy] ORDER BY [nazev]');
        while ($row = $result->fetch()) {
            $result_firma = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [ad] = %i', $row['id']);
            while ($row_firma = $result_firma->fetch())
                if ($_GET['adresat'] == $row_firma['id'])
                    echo "<option value=\"" . $row_firma['id'] . "\" selected=\"selected\">" . $row['nazev'] . " - " . $row_firma['jmeno'] . "</option>";
                else
                    echo "<option value=\"" . $row_firma['id'] . "\">" . $row['nazev'] . " - " . $row_firma['jmeno'] . "</option>";
        }
        echo "</optgroup>";
    } elseif ($firmy == 2) {//prideleny technikovi
        echo "<optgroup label=\"klienti\">";
        $result = dibi::query('SELECT * FROM [prevent_firmy_technik] WHERE [id_technik] = %i', $_SESSION['id_usr']);
        while ($row = $result->fetch()) {
            $result2 = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [ad] = %i', $row['id_firma']);
            while ($row2 = $result2->fetch()) {
                $result3 = dibi::query('SELECT * FROM [prevent_firmy] WHERE [id] = %i', $row['id_firma']);
                $row3 = $result3->fetch();
                if ($_GET['adresat'] == $row2['id'])
                    echo "<option value=\"" . $row2['id'] . "\" selected=\"selected\">" . $row3['nazev'] . " - " . $row2['jmeno'] . "</option>";
                else
                    echo "<option value=\"" . $row2['id'] . "\">" . $row3['nazev'] . " - " . $row2['jmeno'] . "</option>";
            }
        }
        echo "</optgroup>";
    } elseif ($firmy == 3) {//clenove firmy bez zmineneho
        echo "<optgroup label=\"klienti\">";
        $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [ad] = %i', $_SESSION['firma_usr']);
        while ($row = $result->fetch()) {
            if ($row['id'] != $_SESSION['id_usr']) {
                $result2 = dibi::query('SELECT * FROM [prevent_firmy] WHERE [id] = %i', $_SESSION['firma_usr']);
                $row2 = $result2->fetch();
                if ($_GET['adresat'] == $row['id'])
                    echo "<option value=\"" . $row['id'] . "\" selected=\"selected\">" . $row2['nazev'] . " - " . $row['jmeno'] . "</option>";
                else
                    echo "<option value=\"" . $row['id'] . "\">" . $row2['nazev'] . " - " . $row['jmeno'] . "</option>";
            }
        }
        echo "</optgroup>";
    } elseif ($firmy == 4) {//clenove firmy vcetne zmineneho
        echo "<optgroup label=\"klienti\">";
        $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [ad] = %i', $_SESSION['firma_usr']);
        while ($row = $result->fetch()) {
            $result2 = dibi::query('SELECT * FROM [prevent_firmy] WHERE [id] = %i', $_SESSION['firma_usr']);
            $row2 = $result2->fetch();
            if ($_GET['adresat'] == $row['id'])
                echo "<option value=\"" . $row['id'] . "\" selected=\"selected\">" . $row2['nazev'] . " - " . $row['jmeno'] . "</option>";
            else
                echo "<option value=\"" . $row['id'] . "\">" . $row2['nazev'] . " - " . $row['jmeno'] . "</option>";
        }
        echo "</optgroup>";
    } elseif ($firmy == 5) { //clenove firmy u zadavani auditu podle id provozovny ze strany koordinatora
        echo "<optgroup label=\"klienti\">";
        $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [ad] = %i', $_POST['firma']);
        while ($row = $result->fetch()) {
            $result2 = dibi::query('SELECT * FROM [prevent_firmy_uzivatele_prava] WHERE [id_uzivatel] = %i', $row['id'], 'AND ([prava] = %s', $_POST['provozovna'], 'OR [prava] = %s)', "admin");
            while ($row2 = $result2->fetch()) {
                if ($_GET['adresat'] == $row['id'])
                    echo "<option value=\"" . $row['id'] . "\" selected=\"selected\">" . $row['jmeno'] . "</option>";
                else
                    echo "<option value=\"" . $row['id'] . "\">" . $row['jmeno'] . "</option>";
            }
        }
        echo "</optgroup>";
    } elseif ($firmy == 6) { //clenove firmy u zadavani auditu podle id provozovny ze strany firemniho uzivatele
        echo "<optgroup label=\"klienti\">";
        $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [ad] = %i', $_SESSION['firma_usr']);
        while ($row = $result->fetch()) {
            $result2 = dibi::query('SELECT * FROM [prevent_firmy_uzivatele_prava] WHERE [id_uzivatel] = %i', $row['id'], 'AND ([prava] = %s', $_POST['provozovna'], 'OR [prava] = %s)', "admin");
            while ($row2 = $result2->fetch()) {
                if ($_GET['adresat'] == $row['id'])
                    echo "<option value=\"" . $row['id'] . "\" selected=\"selected\">" . $row['jmeno'] . "</option>";
                else
                    echo "<option value=\"" . $row['id'] . "\">" . $row['jmeno'] . "</option>";
            }
        }
        echo "</optgroup>";
    }
    echo "</select><br />";
}

function EchoDateFormDeadline($SYear, $SMonth, $SDay) {
    echo "<script type=\"text/javascript\">
	function blah(bool)
	{
   		if(bool)
   		{
      		document.getElementById(\"den\").disabled = false;
      		document.getElementById(\"mesic\").disabled = false;
      		document.getElementById(\"rok\").disabled = false;
   		}
   		else
   		{
			document.getElementById(\"den\").disabled = true;
			document.getElementById(\"mesic\").disabled = true;
			document.getElementById(\"rok\").disabled = true;
   		}
	}
	</script>
	<label for=\"deadlinecheckbox\">zadat deadline?</label><br />
	<input type=\"checkbox\" id=\"deadlinecheckbox\" name=\"deadlinecheckbox\" value=\"deadlinecheckbox\" onclick=\"blah(this.checked)\" checked/><label for=\"deadlinecheckbox\">ano</label><br />
	<label for=\"den\">deadline: den, </label>
	<label for=\"mesic\">měsíc a </label>
	<label for=\"rok\">rok</label><br />
	<select name=\"den\" id=\"den\" class=\"formular\">";
    for ($i = 1; $i < 32; $i++) {
        echo "<option value='$i'";
        if ($i == $SDay)
            echo " selected";
        echo ">$i</option>\n";
    }
    echo "</select>.<select name=\"mesic\" id=\"mesic\" class=\"formular\">";
    for ($i = 1; $i < 13; $i++) {
        echo "<option value='$i'";
        if ($i == $SMonth)
            echo " selected";
        echo ">$i</option>\n";
    }
    echo "</select>.<select name=\"rok\" id=\"rok\" class=\"formular\">";
    for ($i = 2010; $i < 2015; $i++) {
        echo "<option value='$i'";
        if ($i == $SYear)
            echo " selected";
        echo ">$i</option>\n";
    }
    echo "</select><br />";
}

function EchoDateFormChecklist($SYear, $SMonth, $SDay) {
    echo "<select name=\"termin_odstraneni_den\" id=\"termin_odstraneni_den\" class=\"formular\">";
    for ($i = 1; $i < 32; $i++) {
        echo "<option value='$i'";
        if ($i == $SDay)
            echo " selected";
        echo ">$i</option>\n";
    }
    echo "</select>.<select name=\"termin_odstraneni_mesic\" id=\"termin_odstraneni_mesic\" class=\"formular\">";
    for ($i = 1; $i < 13; $i++) {
        echo "<option value='$i'";
        if ($i == $SMonth)
            echo " selected";
        echo ">$i</option>\n";
    }
    echo "</select>.<select name=\"termin_odstraneni_rok\" id=\"termin_odstraneni_rok\" class=\"formular\">";
    for ($i = 2010; $i < 2015; $i++) {
        echo "<option value='$i'";
        if ($i == $SYear)
            echo " selected";
        echo ">$i</option>\n";
    }
    echo "</select>";
}
?>