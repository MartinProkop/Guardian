<?php

function vybrat_audit() {
    if ($_SESSION['prava_usr'] == "admin" || $_SESSION['prava_usr'] == "koordinator") {
        echo "<form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" name=\"hledat audit\" onSubmit=\"\">
	<fieldset>
	<legend>filtrovat audity</legend>";
        echo "<label for=\"vybertechnik\">technik</label><input type=\"radio\" id=\"vybertechnik\" name=\"vyber\" value=\"technik\" checked>";
        EchoUzivateleSelect("", "technik", 0, 0, 1, 0);
        echo "NEBO<br /><label for=\"vyberfirma\">klient - pobočka</label><input type=\"radio\" id=\"vyberfirma\" name=\"vyber\" value=\"firma\">
	<select name=\"firma\" id=\"firma\" class=\"formular\">";
        $result = dibi::query('SELECT * FROM [prevent_firmy] ORDER BY [nazev] ASC');
        while ($row = $result->fetch()) {
            echo "<optgroup label=" . $row['nazev'] . ">";
            $resultx = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $row['id'], ' ORDER BY [nazev] ASC');
            while ($rowx = $resultx->fetch()) {

                echo "<option value=\"" . $rowx['id'] . "\">" . $row['nazev'] . " - " . $rowx['nazev'] . " </option>";
            }
            echo "</optgroup>";
        }
        echo "</select><br />";
        echo "<input class=\"tlacitko\" type=\"submit\" value=\"hledat\">
	</fieldset>
	</form><br />";
    } elseif ($_SESSION['prava_usr'] == "technik") {
        
    }

    if ($_SESSION['prava_usr'] == "technik") {
        $dotaz = dibi::query('SELECT * FROM [prevent_audit] WHERE [id_technik] = %i', $_SESSION['id_usr'], 'AND ([stav_technik] = %s', "prijal", 'OR [stav_technik] = %s)', "provedl", 'AND [stav_firma] = %s', "neproveden");
    } elseif ($_SESSION['prava_usr'] == "koordinator") {
        if ($_POST['vyber'] == "technik") {
            echo "<div class=\"obdelnik\"><h3>Audity spravující technik: " . get_jmeno_uzivatele_z_id($_POST['technik']) . "</h3></div>";
            $dotaz = dibi::query('SELECT * FROM [prevent_audit] WHERE [id_koordinator] = %i', $_SESSION['id_usr'], 'AND ([stav_technik] = %s', "prijal", 'OR [stav_technik] = %s)', "provedl", 'AND [stav_firma] = %s', "neproveden", 'AND [id_technik] = %i', $_POST['technik']);
        } elseif ($_POST['vyber'] == "firma") {
            echo "<div class=\"obdelnik\"><h3>Audity v klient-pobočka: " . get_nazev_firmy(get_id_firma_z_provozovny($_POST['firma'])) . " -  " . get_nazev_provozovny($_POST['firma'], false) . "</h3></div>";
            $dotaz = dibi::query('SELECT * FROM [prevent_audit] WHERE [id_koordinator] = %i', $_SESSION['id_usr'], 'AND ([stav_technik] = %s', "prijal", 'OR [stav_technik] = %s)', "provedl", 'AND [stav_firma] = %s', "neproveden", 'AND [id_provozovna] = %i', $_POST['firma']);
        } else {
            $dotaz = dibi::query('SELECT * FROM [prevent_audit] WHERE [id_koordinator] = %i', $_SESSION['id_usr'], 'AND ([stav_technik] = %s', "prijal", 'OR [stav_technik] = %s)', "provedl", 'AND [stav_firma] = %s', "neproveden");
        }
    } elseif ($_SESSION['prava_usr'] == "admin") {
        if ($_POST['vyber'] == "technik") {
            echo "<div class=\"obdelnik\"><h3>Audity spravující technik: " . get_jmeno_uzivatele_z_id($_POST['technik']) . "</h3></div>";
            $dotaz = dibi::query('SELECT * FROM [prevent_audit] WHERE ([stav_technik] = %s', "prijal", 'OR [stav_technik] = %s)', "provedl", 'AND [stav_firma] = %s', "neproveden", 'AND [id_technik] = %i', $_POST['technik']);
        } elseif ($_POST['vyber'] == "firma") {
            echo "<div class=\"obdelnik\"><h3>Audity v klient-pobočka: " . get_nazev_firmy(get_id_firma_z_provozovny($_POST['firma'])) . " -  " . get_nazev_provozovny($_POST['firma'], false) . "</h3></div>";
            $dotaz = dibi::query('SELECT * FROM [prevent_audit] WHERE ([stav_technik] = %s', "prijal", 'OR [stav_technik] = %s)', "provedl", 'AND [stav_firma] = %s', "neproveden", 'AND [id_provozovna] = %i', $_POST['firma']);
        } else {
            $dotaz = dibi::query('SELECT * FROM [prevent_audit] WHERE ([stav_technik] = %s', "prijal", 'OR [stav_technik] = %s)', "provedl", 'AND [stav_firma] = %s', "neproveden");
        }
    }
    echo "<table class=\"table\">
		<tr>
		<td><span class=\"subheader\">STAV<br />(#id)</span></td>
		<td><span class=\"subheader\">STAV<br />TECHNIK</span></td>
		<td><span class=\"subheader\">STAV<br />klient</span></td>
                <td><span class=\"subheader\">vývoj</span></td>
		<td><span class=\"subheader\">AKCE</span></td>
                <td><span class=\"subheader\">název</span></td>
                <td><span class=\"subheader\">firma</span></td>
                <td><span class=\"subheader\">pobočka</span></td>
		<td><span class=\"subheader\">ZMĚNA</span></td>
		<td><span class=\"subheader\">TYP</span></td>
                <td><span class=\"subheader\">technik</span></td>
		<td><span class=\"subheader\">klient</span></td>
		<td><span class=\"subheader\">KOMENTÁŘ</span></td>
		</tr>";

    $result = $dotaz;
    while ($row = $result->fetch()) {
        echo "
			<tr>";
        stav_audit($row['id']);
        stav_audit_technik($row['id']);
        stav_audit_firma($row['id']);
        stav_audit_vyvoj($row['id']);
        echo "<td>";
        menu_audit($row['id'], "koordinator");
        echo "</td><td>" . $row['nazev'] . "</td>
                        <td>" . get_nazev_firmy(get_id_firma_z_provozovny($row['id_provozovna'])) . "</td>
                        <td>" . get_nazev_provozovny($row['id_provozovna'], false) . "</td>
                        <td>" . Date("H:i:s d.m.Y", $row['date']) . "</td>
			<td>" . $row['typ'] . "<br />" . $row['typ_po'] . "</td>
                        <td>" . get_jmeno_uzivatele_z_id($row['id_technik']) . "</td>
			<td>" . get_jmeno_uzivatele_z_id($row['id_firemni_uzivatel']) . "</td>
			<td id=\"maly_info_" . $row['id'] . "\"><a href=\"#\" onClick=\"return show_hide('maly_info_" . $row['id'] . "','velky_info_" . $row['id'] . "')\">ukaž text</a></td>
			<td id=\"velky_info_" . $row['id'] . "\" style=\"display: none;\">" . nl2br($row['komentar']) . "<br /><a href=\"#\" onClick=\"return show_hide('velky_info_" . $row['id'] . "','maly_info_" . $row['id'] . "')\">uzavřít</a></td>
			</tr>";
    }
    echo "</table>";
}

function oznac_za_online_audit($id_audit) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id_audit);
    $row = $result->fetch();

    if ($row['synchronizace'] != "nelze") {
        dibi::query('UPDATE [prevent_audit] SET [synchronizace] = %s', "nelze", 'WHERE [id] = %i', $id_audit);
        $arr_log = array('text' => 'Byla zahájena práce na auditu - už ho nelze exportovat.', 'id_audit' => $id_audit, 'id_provozovna' => $row['id']);
        vytvor_log_audit($arr_log);
    }
}
?>