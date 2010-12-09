<?php
function prehled_auditu_koordinator() {
    echo "<p>Čísla u auditů: [nezahájené technikem / nedokončené technikem / provedené technikem / nedokončené klientem / potvrzené klientem / zamítlé klientem / dokončené]</p>";
    echo "<form method=\"POST\" action=\"./sprava_auditu.php?id=enter&firma=" . $_POST['firma'] . "&provozovna=" . $_POST['provozovna'] . "\" name=\"najdi osobu\" \">
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
        echo "<option $check value=\"" . $row['id'] . "\">" . $row['nazev'] . " " . zprava_o_auditech_filtr($row['id'], "firma", "koordinator") . "</option>";
    }
    echo "</select><br />";

    if ($_POST['firma']) {
        echo "<label for=\"provozovna\">pobočka</label><br />
		<select name=\"provozovna\" id=\"provozovna\" class=\"formular\">
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
        echo "</select><br />";
    }
    echo "<input class=\"tlacitko\" type=\"submit\" value=\"vypsat\">
	</fieldset>
	</form>
        <p>Zpět na <a href=\"./sprava_auditu.php?id=enter\">správu auditů</a>.</p>";

    if ($_POST['firma'] && $_POST['provozovna'] && $_POST['provozovna'] != "vybrat") {
        echo "<h4>Existující audity</h4>";
?>
        <div class="info" align="justify" id="plot_short">
            <p><a href="#" onClick="return show_hide('plot_short','plot_full')"><img src="./design/pridat.png" /> přidat audit</a></p>
        </div>
        <div class="info2" align="justify" id="plot_full" style="display: none;">
    <?php zadat_audit("firma_zadana"); ?>
    </div>
<?php
        echo "<table class=\"table\">
		<tr>
                <td><span class=\"subheader\">STAV<br />(#id)</span></td>
		<td><span class=\"subheader\"><a href=\"./sprava_auditu.php?id=enter&firma=" . $_POST['firma'] . "&provozovna=" . $_POST['provozovna'] . "&order_by=stav_technik\">STAV<br />TECHNIK</a></span></td>
		<td><span class=\"subheader\"><a href=\"./sprava_auditu.php?id=enter&firma=" . $_POST['firma'] . "&provozovna=" . $_POST['provozovna'] . "&order_by=stav_firma\">STAV<br />KLIENT</a></span></td>
                <td><span class=\"subheader\">VÝVOJ</span></td>
		<td><span class=\"subheader\">AKCE</span></td>
		<td><span class=\"subheader\">název</span></td>
		<td><span class=\"subheader\"><a href=\"./sprava_auditu.php?id=enter&firma=" . $_POST['firma'] . "&provozovna=" . $_POST['provozovna'] . "&order_by=date\">ZMĚNA</a></span></td>
		<td><span class=\"subheader\"><a href=\"./sprava_auditu.php?id=enter&firma=" . $_POST['firma'] . "&provozovna=" . $_POST['provozovna'] . "&order_by=typ\">TYP</a></span></td>
		<td><span class=\"subheader\"><a href=\"./sprava_auditu.php?id=enter&firma=" . $_POST['firma'] . "&provozovna=" . $_POST['provozovna'] . "&order_by=id_technik\">TECHNIK</a></span></td>
		<td><span class=\"subheader\"><a href=\"./sprava_auditu.php?id=enter&firma=" . $_POST['firma'] . "&provozovna=" . $_POST['provozovna'] . "&order_by=id_firemni_uzivatel\">KLIENT<br />uživatel</a></span></td>
		<td><span class=\"subheader\">KOMENTÁŘ</span></td>
		</tr>";

        $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id_provozovna] = %i', $_POST['provozovna'], 'ORDER BY %by', $_GET['order_by'], 'ASC');
        while ($row = $result->fetch()) {
            echo "<tr>";
            stav_audit($row['id']);
            stav_audit_technik($row['id']);
            stav_audit_firma($row['id']);
            stav_audit_vyvoj($row['id']);
            echo "<td>";
            menu_audit($row['id'], "koordinator");
            echo "</td><td>" . $row['nazev'] . "</td>
                        <td>" . Date("H:i:s d.m.Y", $row['date']) . "</td>
			<td>" . $row['typ'] . "<br />(<a href=\"./audit_schema_nahled.php?typ=" . $row['typ'] . "&verze=" . $row['verze'] . "\" target=\"_blank\">" . get_info_verze($row['verze']). "</a>)</td>
			<td>" . get_jmeno_uzivatele_z_id($row['id_technik']) . "</td>
			<td>" . get_jmeno_uzivatele_z_id($row['id_firemni_uzivatel']) . "</td>
			<td><a href=\"#tooltip_" . $row['id'] . "\" name=\"tooltip_" . $row['id'] . "\"  id=\"tooltip_" . $row['id'] . "\")\"><img src=\"./design/detaily.png\" alt=\"ukázat text\" title=\"ukázat text\"/></a></td>
			</tr>
                            <script type=\"text/javascript\">
                            $(document).ready(function()
                            {
                               $('#tooltip_$row[id]').qtip(
                               {
                                  content: {
                                    text: '".ereg_replace("[\r|\n]+","<br>",$row[komentar])."',
                                    title: {
                                        text: 'Komentář auditu #ID $row[id]',
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
                                  },
                                  position: {
                                    corner: {
                                        tooltip: 'bottomRight',
                                        target: 'bottomRight'

                                    }
                                  }
                               });
                            });
                            </script>
                            ";
        }
        echo "</table>";

        echo "<h4>Plánovač auditů</h4>";
?>
        <div class="info" align="justify" id="plot_short2">
            <p><a href="#" onClick="return show_hide('plot_short2','plot_full2')"><img src="./design/pridat.png" /> přidat plán</a></p>
        </div>
        <div class="info2" align="justify" id="plot_full2" style="display: none;">
    <?php pridat_plan_auditu($_POST['provozovna']); ?>
    </div>
<?php
        if ($_GET['smazat_plan'])
            smazat_plan_auditu($_GET['smazat_plan']);
        if ($_GET['zapnout_plan'])
            zapnout_plan_auditu($_GET['zapnout_plan']);

        echo "<table class=\"table\">
		<tr>
		<td><span class=\"subheader\">STAV</span></td>
		<td><span class=\"subheader\">AKCE</span></td>
                <td><span class=\"subheader\">název</span></td>
		<td><span class=\"subheader\">SPUŠTĚNÍ</span></td>
		<td><span class=\"subheader\">PERIODA</span></td>
		<td><span class=\"subheader\">TYP</span></td>
		<td><span class=\"subheader\">KOMENTÁŘ</span></td>
		<td><span class=\"subheader\">KOORDINÁTOR</span></td>
		</tr>";

        $result = dibi::query('SELECT * FROM [prevent_audit_planovac] WHERE [id_provozovna] = %i', $_POST['provozovna']);
        while ($row = $result->fetch()) {
            if ($row['stav'] == "zapnuto") {
                $signal = " class=\"green\"";
            } else {
                $signal = " class=\"red\"";
            }
            $result2 = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $row['id_koordinator']);
            while ($row2 = $result2->fetch())
                echo "
			<tr>
			<td " . $signal . ">" . $row['stav'] . "</td>
			<td><a href=\"./sprava_auditu.php?id=enter&firma=" . $_POST['firma'] . "&provozovna=" . $_POST['provozovna'] . "&zapnout_plan=" . $row['id'] . "\">vypínač</a><br />
			<a href=\"./sprava_auditu.php?id=enter&firma=" . $_POST['firma'] . "&provozovna=" . $_POST['provozovna'] . "&smazat_plan=" . $row['id'] . "\" onclick=\"if(confirm('Skutečně chcete smazat plán auditu?')) location.href='./sprava_auditu.php?id=enter&firma=" . $_POST['firma'] . "&provozovna=" . $_POST['provozovna'] . "&smazat_plan=" . $row['id'] . "'; return(false);\">smazat</a></td>
			<td>" . $row['nazev'] . "</td>
                        <td>" . Date("d.m.Y", $row['date_start']) . "</td>
			<td>" . $row['perioda'] . " dní</td>
			<td>" . $row['typ'] . "</td>
			<td>" . $row['komentar'] . "</td>
			<td>" . $row2['jmeno'] . "</td>
			</tr>";
        }
        echo "</table>";

        echo "<h4>Log auditů</h4>";
        $result = dibi::query('SELECT * FROM [prevent_audit_log] WHERE [id_provozovna] = %i', $_POST['provozovna'], 'ORDER BY [date] DESC');
        $pocet_logu = $result->count();

        echo "<p><strong>" . $pocet_logu . " záznamů</strong></p>";
        echo "<textarea name=\"log\" cols=\"80\" rows=\"10\" class=\"formular\">";

        while ($row = $result->fetch())
            echo Date("H:i d.m.Y", $row['date']) . " (" . $row['autor'] . ", ID audit: #" . $row['id_audit'] . "): " . $row['text'] . "\n";

        echo "</textarea>";

        $result = dibi::query('SELECT * FROM [prevent_audit_log] WHERE [id_provozovna] = %i', $_POST['provozovna'], 'AND date < %i', Time() - 604800);
        $pocet_logu_ke_smazani = $result->count();

        echo "<p><strong><a href=\"./sprava_auditu.php?id=enter&firma=" . $_POST['firma'] . "&provozovna=" . $_POST['provozovna'] . "&smazat_logy=ano\" onclick=\"if(confirm('Skutečně chcete smazat logy auditů?')) location.href='./sprava_auditu.php?id=enter&firma=" . $_POST['firma'] . "&provozovna=" . $_POST['provozovna'] . "&smazat_logy=ano'; return(false);\">Smazat záznamy starší 7 dny (" . $pocet_logu_ke_smazani . " záznamů)</a></strong></p>";
    }
}

function prehled_auditu_koordinator_dva() {
    if ($_GET['filtr'] && !$_POST['filtr'])
        $_POST['filtr'] = $_GET['filtr'];
    if ($_POST['filtr'] == "nezahajene_technik")
        $nezahajene_technik_select = "selected=\"selected\"";
    elseif ($_POST['filtr'] == "nedokoncene_technik")
        $nedokoncene_technik_select = "selected=\"selected\"";
    elseif ($_POST['filtr'] == "dokoncene_technik")
        $dokoncene_technik_select = "selected=\"selected\"";
    elseif ($_POST['filtr'] == "nedokoncene_firma")
        $nedokoncene_firma_select = "selected=\"selected\"";
    elseif ($_POST['filtr'] == "potvrzene_firma")
        $potvrzene_firma_select = "selected=\"selected\"";
    elseif ($_POST['filtr'] == "zamitle_firma")
        $zamitlefirma_select = "selected=\"selected\"";
    elseif ($_POST['filtr'] == "dokoncene")
        $dokoncene_select = "selected=\"selected\"";

    echo "
        <form method=\"POST\" action=\"./sprava_auditu.php?id=filtr\" name=\"najdi osobu\" \">
	<fieldset>
	<legend>Filtrovat audity</legend>
        <select name=\"filtr\" class=\"formular\">
        <option value=\"nezahajene_technik\" " . $nezahajene_technik_select . ">nezahájené technikem [" . o_auditech_filtr("koordinator", "nezahajene_technik") . "]</option>
        <option value=\"nedokoncene_technik\" " . $nedokoncene_technik_select . ">nedokončené technikem [" . o_auditech_filtr("koordinator", "nedokoncene_technik") . "]</option>
        <option value=\"dokoncene_technik\" " . $dokoncene_technik_select . ">předané k připomínkování [" . o_auditech_filtr("koordinator", "dokoncene_technik") . "]</option>
        <option value=\"nedokoncene_firma\" " . $nedokoncene_firma_select . ">nedokončené klientem [" . o_auditech_filtr("koordinator", "nedokoncene_firma") . "]</option>
        <option value=\"potvrzene_firma\" " . $potvrzene_firma_select . ">potvrzené klientem [" . o_auditech_filtr("koordinator", "potvrzene_firma") . "]</option>
        <option value=\"zamitle_firma\" " . $zamitle_firma_select . ">zamitlé klientem [" . o_auditech_filtr("koordinator", "zamitle_firma") . "]</option>
        <option value=\"dokoncene\" " . $dokoncene_select . ">dokončené [" . o_auditech_filtr("koordinator", "dokoncene") . "]</option>
        </select><br />
        <input class=\"tlacitko\" type=\"submit\" value=\"vypsat\">
	</fieldset>
        <p>Zpět na <a href=\"./sprava_auditu.php?id=enter\">správu auditů</a>.</p>";

    if ($_POST['filtr']) {
        echo "<h4>Existující audity</h4>";

        echo "<table class=\"table\">
		<tr>
		<td><span class=\"subheader\">STAV<br />(#id)</span></td>
		<td><span class=\"subheader\"><a href=\"./sprava_auditu.php?id=filtr&filtr=" . $_POST['filtr'] . "&order_by=stav_technik\">STAV<br />TECHNIK</a></span></td>
		<td><span class=\"subheader\"><a href=\"./sprava_auditu.php?id=filtr&filtr=" . $_POST['filtr'] . "&order_by=stav_firma\">STAV<br />KLIENT</a></span></td>
                <td><span class=\"subheader\">VÝVOJ</span></td>
		<td><span class=\"subheader\">AKCE</span></td>
		<td><span class=\"subheader\">název</span></td>
		<td><span class=\"subheader\"><a href=\"./sprava_auditu.php?id=filtr&filtr=" . $_POST['filtr'] . "&order_by=date\">ZMĚNA</a></span></td>
		<td><span class=\"subheader\"><a href=\"./sprava_auditu.php?id=filtr&filtr=" . $_POST['filtr'] . "&order_by=typ\">TYP</a></span></td>
                <td><span class=\"subheader\"><a href=\"./sprava_auditu.php?id=filtr&filtr=" . $_POST['filtr'] . "&order_by=id_provozovna\">KLIENT</a></span></td>
		<td><span class=\"subheader\"><a href=\"./sprava_auditu.php?id=filtr&filtr=" . $_POST['filtr'] . "&order_by=id_technik\">TECHNIK</a></span></td>
		<td><span class=\"subheader\"><a href=\"./sprava_auditu.php?id=filtr&filtr=" . $_POST['filtr'] . "&order_by=id_firemni_uzivatel\">KLIENT<br />uživatel</a></span></td>
		<td><span class=\"subheader\">KOMENTÁŘ</span></td>
		</tr>";

        if (!$_GET['order_by'])
            $_GET['order_by'] = "id";

        if ($_POST['filtr'] == "nezahajene_technik")
            $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [stav_technik] = %s', "nechce", 'OR [stav_technik] = %s', "neprijal", 'ORDER BY %by', $_GET['order_by'], 'ASC');
        elseif ($_POST['filtr'] == "nedokoncene_technik")
            $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [stav_technik] = %s', "prijal", 'ORDER BY %by', $_GET['order_by'], 'ASC');
        elseif ($_POST['filtr'] == "dokoncene_technik")
            $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [stav_technik] = %s', "provedl", 'AND [stav_firma] = %s', "neproveden", 'ORDER BY %by', $_GET['order_by'], 'ASC');
        elseif ($_POST['filtr'] == "nedokoncene_firma")
            $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [stav_firma] = %s', "ceka", 'ORDER BY %by', $_GET['order_by'], 'ASC');
        elseif ($_POST['filtr'] == "potvrzene_firma") {
            $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [stav_firma] = %s', "potvrdil", 'AND [vytisknut] != %s', "ano", 'ORDER BY %by', $_GET['order_by'], 'ASC');
        } elseif ($_POST['filtr'] == "zamitle_firma")
            $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [stav_firma] = %s', "zamitl", 'AND [vytisknut] != %s', "ano", 'ORDER BY %by', $_GET['order_by'], 'ASC');
        elseif ($_POST['filtr'] == "dokoncene")
            $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [vytisknut] = %s', "ano", 'ORDER BY %by', $_GET['order_by'], 'ASC');

        while ($row = $result->fetch()) {
            echo "<tr>";
            stav_audit($row['id']);
            stav_audit_technik($row['id']);
            stav_audit_firma($row['id']);
            stav_audit_vyvoj($row['id']);
            echo "<td>";
            menu_audit($row['id'], "koordinator");
            echo "</td><td>" . $row['nazev'] . "</td>
                        <td>" . Date("H:i:s d.m.Y", $row['date']) . "</td>
			<td>" . $row['typ'] . "<br />(<a href=\"./audit_schema_nahled.php?typ=" . $row['typ'] . "&verze=" . $row['verze'] . "\" target=\"_blank\">" . get_info_verze($row['verze']). "</a>)</td>
                        <td>" . get_nazev_firmy(get_id_firma_z_audit($row['id'])) . " - " . get_nazev_provozovny(get_id_provozovna_z_audit($row['id']), false) . "</td>
			<td>" . get_jmeno_uzivatele_z_id($row['id_technik']) . "</td>
			<td>" . get_jmeno_uzivatele_z_id($row['id_firemni_uzivatel']) . "</td>
			<td><a href=\"#tooltip_" . $row['id'] . "\" name=\"tooltip_" . $row['id'] . "\"  id=\"tooltip_" . $row['id'] . "\")\"><img src=\"./design/detaily.png\" alt=\"ukázat text\" title=\"ukázat text\"/></a></td>
			</tr>
                            <script type=\"text/javascript\">
                            $(document).ready(function()
                            {
                               $('#tooltip_$row[id]').qtip(
                               {
                                  content: {
                                    text: '".ereg_replace("[\r|\n]+","<br>",$row[komentar])."',
                                    title: {
                                        text: 'Komentář auditu #ID $row[id]',
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
                                  },
                                  position: {
                                    corner: {
                                        tooltip: 'bottomRight',
                                        target: 'bottomRight'

                                    }
                                  }
                               });
                            });
                            </script>
                            ";
        }
        echo "</table>";
    }
}

function prehled_auditu_technik() {
    echo "<p>Čísla u auditů: [nezahájené technikem / nedokončené technikem / provedené technikem / nedokončené klientem / potvrzené klientem / zamítlé klientem / dokončené]</p>";
    echo "<form method=\"POST\" action=\"./sprava_auditu.php?id=enter&firma=" . $_POST['firma'] . "&provozovna=" . $_POST['provozovna'] . "\" name=\"najdi osobu\" \">
	<fieldset>
	<legend>Název klienta</legend>
	<label for=\"firma\">klient</label><br />
	<select name=\"firma\" id=\"firma\" class=\"formular\">";
    $result = dibi::query('SELECT * FROM [prevent_firmy_technik] WHERE [id_technik] = %i', $_SESSION['id_usr']);
    while ($row = $result->fetch()) {
        $result2 = dibi::query('SELECT * FROM [prevent_firmy] WHERE [id] = %i', $row['id_firma'], 'ORDER BY [nazev] ASC');
        while ($row2 = $result2->fetch()) {
            if ($_POST['firma']) {
                $check = "";
                if ($row2['id'] == $_POST['firma'])
                    $check = "selected";
            }
            echo "<option $check value=\"" . $row2['id'] . "\">" . $row2['nazev'] . " " . zprava_o_auditech_filtr($row2['id'], "firma", "technik") . "</option>";
        }
    }
    echo "</select><br />";

    if ($_POST['firma']) {
        echo "<label for=\"provozovna\">pobočka</label><br />
		<select name=\"provozovna\" id=\"provozovna\" class=\"formular\">
		<option value=\"vybrat\">--- vyberte ---</option>";
        $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $_POST['firma'], 'ORDER BY [nazev] ASC');
        while ($row = $result->fetch()) {
            if ($_POST['provozovna']) {
                $check2 = "";
                if ($row['id'] == $_POST['provozovna'])
                    $check2 = "selected";
            }
            echo "<option $check2 value=\"" . $row['id'] . "\">" . $row['nazev'] . " " . zprava_o_auditech_filtr($row['id'], "provozovna", "technik") . "</option>";
        }
        echo "</select><br />";
    }
    echo "<input class=\"tlacitko\" type=\"submit\" value=\"vypsat\">
	</fieldset>
	</form>
        <p>Zpět na <a href=\"./sprava_auditu.php?id=enter\">správu auditů</a>.</p>";

    if ($_POST['firma'] && $_POST['provozovna'] && $_POST['provozovna'] != "vybrat") {
        echo "<table class=\"table\">
		<tr>
		<td><span class=\"subheader\">STAV<br />(#id)</span></td>
		<td><span class=\"subheader\">STAV<br />TECHNIK</span></td>
		<td><span class=\"subheader\">STAV<br />KLIENT</span></td>
                <td><span class=\"subheader\">VÝVOJ</td>
		<td><span class=\"subheader\">AKCE</span></td>
		<td><span class=\"subheader\">název</span></td>
		<td><span class=\"subheader\">ZMĚNA</span></td>
		<td><span class=\"subheader\">TYP</span></td>
		<td><span class=\"subheader\">KLIENT<br />uživatel</span></td>
		<td><span class=\"subheader\">KOMENTÁŘ</span></td>
		</tr>";

        $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id_technik] = %i', $_SESSION['id_usr'], 'AND [id_provozovna] = %i', $_POST['provozovna']);
        while ($row = $result->fetch()) {
            echo "<tr>";
            stav_audit($row['id']);
            stav_audit_technik($row['id']);
            stav_audit_firma($row['id']);
            stav_audit_vyvoj($row['id']);
            echo "<td>";
            menu_audit($row['id'], "technik");
            echo "</td><td>" . $row['nazev'] . "</td>
                        <td>" . Date("H:i:s d.m.Y", $row['date']) . "</td>
			<td>" . $row['typ'] . "</td>
			<td>" . get_jmeno_uzivatele_z_id($row['id_firemni_uzivatel']) . "</td>
			<td><a href=\"#tooltip_" . $row['id'] . "\" name=\"tooltip_" . $row['id'] . "\"  id=\"tooltip_" . $row['id'] . "\")\"><img src=\"./design/detaily.png\" alt=\"ukázat text\" title=\"ukázat text\"/></a></td>
			</tr>
                            <script type=\"text/javascript\">
                            $(document).ready(function()
                            {
                               $('#tooltip_$row[id]').qtip(
                               {
                                  content: {
                                    text: '".ereg_replace("[\r|\n]+","<br>",$row[komentar])."',
                                    title: {
                                        text: 'Komentář auditu #ID $row[id]',
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
                                  },
                                  position: {
                                    corner: {
                                        tooltip: 'bottomRight',
                                        target: 'bottomRight'

                                    }
                                  }
                               });
                            });
                            </script>
                            ";
        }
        echo "</table>";
    }
}

function prehled_auditu_technik_dva() {
    if ($_GET['filtr'] && !$_POST['filtr'])
        $_POST['filtr'] = $_GET['filtr'];
    if ($_POST['filtr'] == "nezahajene_technik")
        $nezahajene_technik_select = "selected=\"selected\"";
    elseif ($_POST['filtr'] == "nedokoncene_technik")
        $nedokoncene_technik_select = "selected=\"selected\"";
    elseif ($_POST['filtr'] == "dokoncene_technik")
        $dokoncene_technik_select = "selected=\"selected\"";
    elseif ($_POST['filtr'] == "nedokoncene_firma")
        $nedokoncene_firma_select = "selected=\"selected\"";
    elseif ($_POST['filtr'] == "potvrzene_firma")
        $potvrzene_firma_select = "selected=\"selected\"";
    elseif ($_POST['filtr'] == "zamitle_firma")
        $zamitlefirma_select = "selected=\"selected\"";
    elseif ($_POST['filtr'] == "dokoncene")
        $dokoncene_select = "selected=\"selected\"";

    echo "
        <form method=\"POST\" action=\"./sprava_auditu.php?id=filtr\" name=\"najdi osobu\" \">
	<fieldset>
	<legend>Filtrovat audity</legend>
        <select name=\"filtr\" class=\"formular\">
        <option value=\"nezahajene_technik\" " . $nezahajene_technik_select . ">nezahájené technikem [" . o_auditech_filtr("koordinator", "nezahajene_technik") . "]</option>
        <option value=\"nedokoncene_technik\" " . $nedokoncene_technik_select . ">nedokončené technikem [" . o_auditech_filtr("koordinator", "nedokoncene_technik") . "]</option>
        <option value=\"dokoncene_technik\" " . $dokoncene_technik_select . ">předané k připomínkování [" . o_auditech_filtr("koordinator", "dokoncene_technik") . "]</option>
        <option value=\"nedokoncene_firma\" " . $nedokoncene_firma_select . ">nedokončené klientem [" . o_auditech_filtr("koordinator", "nedokoncene_firma") . "]</option>
        <option value=\"potvrzene_firma\" " . $potvrzene_firma_select . ">potvrzené klientem [" . o_auditech_filtr("koordinator", "potvrzene_firma") . "]</option>
        <option value=\"zamitle_firma\" " . $zamitle_firma_select . ">zamitlé klientem [" . o_auditech_filtr("koordinator", "zamitle_firma") . "]</option>
        <option value=\"dokoncene\" " . $dokoncene_select . ">dokončené [" . o_auditech_filtr("koordinator", "dokoncene") . "]</option>
        </select><br />
        <input class=\"tlacitko\" type=\"submit\" value=\"vypsat\">
	</fieldset>
        <p>Zpět na <a href=\"./sprava_auditu.php?id=enter\">správu auditů</a>.</p>";

    if ($_POST['filtr']) {
        echo "<h4>Existující audity</h4>";

        echo "<table class=\"table\">
		<tr>
		<td><span class=\"subheader\">STAV<br />(#id)</span></td>
		<td><span class=\"subheader\"><a href=\"./sprava_auditu.php?id=filtr&filtr=" . $_POST['filtr'] . "&order_by=stav_technik\">STAV<br />TECHNIK</a></span></td>
		<td><span class=\"subheader\"><a href=\"./sprava_auditu.php?id=filtr&filtr=" . $_POST['filtr'] . "&order_by=stav_firma\">STAV<br />KLIENT</a></span></td>
                <td><span class=\"subheader\">VÝVOJ</span></td>
		<td><span class=\"subheader\">AKCE</span></td>
		<td><span class=\"subheader\">název</span></td>
		<td><span class=\"subheader\"><a href=\"./sprava_auditu.php?id=filtr&filtr=" . $_POST['filtr'] . "&order_by=date\">ZMĚNA</a></span></td>
		<td><span class=\"subheader\"><a href=\"./sprava_auditu.php?id=filtr&filtr=" . $_POST['filtr'] . "&order_by=typ\">TYP</a></span></td>
                <td><span class=\"subheader\"><a href=\"./sprava_auditu.php?id=filtr&filtr=" . $_POST['filtr'] . "&order_by=id_provozovna\">KLIENT</a></span></td>
		<td><span class=\"subheader\"><a href=\"./sprava_auditu.php?id=filtr&filtr=" . $_POST['filtr'] . "&order_by=id_firemni_uzivatel\">KLIENT<br />uživatel</a></span></td>
		<td><span class=\"subheader\">KOMENTÁŘ</span></td>
		</tr>";

        if (!$_GET['order_by'])
            $_GET['order_by'] = "id";

        if ($_POST['filtr'] == "nezahajene_technik")
            $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [stav_technik] = %s', "nechce", 'OR [stav_technik] = %s', "neprijal", 'AND [id_technik] = %i', $_SESSION['id_usr'], 'ORDER BY %by', $_GET['order_by'], 'ASC');
        elseif ($_POST['filtr'] == "nedokoncene_technik")
            $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [stav_technik] = %s', "prijal", 'AND [id_technik] = %i', $_SESSION['id_usr'], 'ORDER BY %by', $_GET['order_by'], 'ASC');
        elseif ($_POST['filtr'] == "dokoncene_technik")
            $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [stav_technik] = %s', "provedl", 'AND [stav_firma] = %s', "neproveden", 'AND [id_technik] = %i', $_SESSION['id_usr'], 'ORDER BY %by', $_GET['order_by'], 'ASC');
        elseif ($_POST['filtr'] == "nedokoncene_firma")
            $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [stav_firma] = %s', "ceka", 'AND [id_technik] = %i', $_SESSION['id_usr'], 'ORDER BY %by', $_GET['order_by'], 'ASC');
        elseif ($_POST['filtr'] == "potvrzene_firma") {
            $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [stav_firma] = %s', "potvrdil", 'AND [vytisknut] != %s', "ano", 'AND [id_technik] = %i', $_SESSION['id_usr'], 'ORDER BY %by', $_GET['order_by'], 'ASC');
        } elseif ($_POST['filtr'] == "zamitle_firma")
            $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [stav_firma] = %s', "zamitl", 'AND [vytisknut] != %s', "ano", 'AND [id_technik] = %i', $_SESSION['id_usr'], 'ORDER BY %by', $_GET['order_by'], 'ASC');
        elseif ($_POST['filtr'] == "dokoncene")
            $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [vytisknut] = %s', "ano", 'AND [id_technik] = %i', $_SESSION['id_usr'], 'ORDER BY %by', $_GET['order_by'], 'ASC');

        while ($row = $result->fetch()) {
            echo "<tr>";
            stav_audit($row['id']);
            stav_audit_technik($row['id']);
            stav_audit_firma($row['id']);
            stav_audit_vyvoj($row['id']);
            echo "<td>";
            menu_audit($row['id'], "technik");
            echo "</td><td>" . $row['nazev'] . "</td>
                        <td>" . Date("H:i:s d.m.Y", $row['date']) . "</td>
			<td>" . $row['typ'] . "</td>
                        <td>" . get_nazev_firmy(get_id_firma_z_audit($row['id'])) . " - " . get_nazev_provozovny(get_id_provozovna_z_audit($row['id']), false) . "</td>
			<td>" . get_jmeno_uzivatele_z_id($row['id_firemni_uzivatel']) . "</td>
			<td><a href=\"#tooltip_" . $row['id'] . "\" name=\"tooltip_" . $row['id'] . "\"  id=\"tooltip_" . $row['id'] . "\")\"><img src=\"./design/detaily.png\" alt=\"ukázat text\" title=\"ukázat text\"/></a></td>
			</tr>
                            <script type=\"text/javascript\">
                            $(document).ready(function()
                            {
                               $('#tooltip_$row[id]').qtip(
                               {
                                  content: {
                                    text: '".ereg_replace("[\r|\n]+","<br>",$row[komentar])."',
                                    title: {
                                        text: 'Komentář auditu #ID $row[id]',
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
                                  },
                                  position: {
                                    corner: {
                                        tooltip: 'bottomRight',
                                        target: 'bottomRight'

                                    }
                                  }
                               });
                            });
                            </script>
                            ";
        }
        echo "</table>";
    }
}

function prehled_auditu_firma_admin() {
    echo "<p>Čísla u auditů: [nedokončené technik/nezahájené technik/nedokončené klient/dokončené]</p>";
    echo "<form method=\"POST\" action=\"./sprava_auditu.php?id=prehled_auditu&provozovna=" . $_POST['provozovna'] . "\" name=\"najdi osobu\" \">
	<fieldset>
	<legend>Název pobočky</legend>";

    echo "<label for=\"provozovna\">pobočka</label><br />
	<select name=\"provozovna\" id=\"provozovna\" class=\"formular\">
	<option value=\"vybrat\">--- vyberte ---</option>";
    $result = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $_SESSION['firma_usr'], 'ORDER BY [nazev] ASC');
    while ($row = $result->fetch()) {
        if ($_POST['provozovna']) {
            $check2 = "";
            if ($row['id'] == $_POST['provozovna'])
                $check2 = "selected";
        }
        echo "<option $check2 value=\"" . $row['id'] . "\">" . $row['nazev'] . " " . zprava_o_auditech_filtr($row['id'], "provozovna", "firma_admin") . "</option>";
    }
    echo "</select><br />";
    echo "<input class=\"tlacitko\" type=\"submit\" value=\"vypsat\">
	</fieldset>
	</form><br />";

    if ($_POST['provozovna'] && $_POST['provozovna'] != "vybrat") {
        echo "<h4>Existující audity</h4>";
        echo "<table class=\"table\">
		<tr>
		<td><span class=\"subheader\">STAV<br />(#id)</span></td>
		<td><span class=\"subheader\">STAV<br />TECHNIK</span></td>
		<td><span class=\"subheader\">STAV<br />klient</span></td>
                <td><span class=\"subheader\">VÝVOJ</span></td>
		<td><span class=\"subheader\">AKCE</span></td>
                <td><span class=\"subheader\">název</span></td>
		<td><span class=\"subheader\">ZMĚNA</span></td>
		<td><span class=\"subheader\">TYP</span></td>
		<td><span class=\"subheader\">TECHNIK</span></td>
		<td><span class=\"subheader\">klient<br />uživatel</span></td>
		<td><span class=\"subheader\">KOMENTÁŘ</span></td>
		</tr>";

        $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id_provozovna] = %i', $_POST['provozovna']);
        while ($row = $result->fetch()) {
            if ($row['stav_technik'] == "provedl" && $row['stav_firma'] == "potvrdil") {
                $signal = " class=\"green\"";
                $text = "dokončen<br />" . Date("H:i:s d.m.Y", $row['date_zakaznik_potvrdil']) . "<br />(#" . $row['id'] . ")";
            } else {
                $signal = " class=\"orange\"";
                $text = "nedokončen<br />(#" . $row['id'] . ")";
            }

            if ($row['stav_technik'] == "neprijal") {
                $signal2 = " class=\"red\"";
                $text2 = "nepotvrdil<br />přijetí";
            } elseif ($row['stav_technik'] == "prijal") {
                $signal2 = " class=\"orange\"";
                $text2 = "přijal<br />" . Date("H:i:s d.m.Y", $row['date_technik_prijal_provedl']);
            } elseif ($row['stav_technik'] == "nechce") {
                $signal2 = " class=\"red\"";
                $text2 = "nepřijal<br />" . Date("H:i:s d.m.Y", $row['date_technik_prijal_provedl']);
            } elseif ($row['stav_technik'] == "provedl") {
                $signal2 = " class=\"green\"";
                $text2 = "provedl<br />" . Date("H:i:s d.m.Y", $row['date_technik_prijal_provedl']);
            }

            if ($row['stav_firma'] == "neproveden") {
                $signal3 = " class=\"red\"";
                $text3 = "nebyl<br />proveden";
            } elseif ($row['stav_firma'] == "zamitnul") {
                $signal3 = " class=\"red\"";
                $text3 = "zamítnul<br />" . Date("H:i:s d.m.Y", $row['date_zakaznik_potvrdil']);
            } elseif ($row['stav_firma'] == "potvrdil") {
                $signal3 = " class=\"green\"";
                $text3 = "potvrdil<br />" . Date("H:i:s d.m.Y", $row['date_zakaznik_potvrdil']);
            }

            if ($row['stav_checklist'] == "neuzavren") {
                $text4a = "Checklist: neuzavřen";
                $signal4a = false;
            } else {
                $text4a = "Checklist: uzavřen (" . Date("H:i:s d.m.Y", $row['date_stav_checklist']) . ")";
                $signal4a = true;
            }

            if ($row['stav_pracoviste'] == "neuzavren") {
                $text4b = "<br />Pracoviště: neuzavřeno";
                $signal4b = false;
            } else {
                $text4b = "<br/>Pracoviště: uzavřeno (" . Date("H:i:s d.m.Y", $row['date_stav_pracoviste']) . ")";
                $signal4b = true;
            }

            if ($row['stav_neshody'] == "uzavren") {
                $text4c = "<br />Neshody: zpracováno (" . Date("H:i:s d.m.Y", $row['date_stav_neshody']) . ")";
                $signal4c = true;
            } else {
                $text4c = "<br/>Neshody: nezpracováno";
                $signal4c = false;
            }

            $text4 = $text4a . $text4b . $text4c;
            if ($signal4a && $signal4b && $signal4c && barva_info_protokol_audit($row['id']))
                $signal4 = " class=\"green\"";
            elseif ($signal4a || $signal4b || $signal4c || barva_info_protokol_audit($row['id']))
                $signal4 = " class=\"orange\"";
            else
                $signal4 = " class=\"red\"";

            $result2 = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $row['id_technik']);
            $row2 = $result2->fetch();
            $result4 = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $row['id_firemni_uzivatel']);
            $row4 = $result4->fetch();

            echo "
			<tr>
			<td " . $signal . ">" . $text . "</td>
			<td " . $signal2 . ">" . $text2 . "</td>
			<td " . $signal3 . ">" . $text3 . "</td>
                        <td " . $signal4 . ">" . $text4 . echo_info_protokol_audit($row['id']) . "</td>
			<td>";
            menu_audit($row['id'], "firma_admin");
            echo "</td><td>" . $row['nazev'] . "</td>
                        <td>" . Date("H:i:s d.m.Y", $row['date']) . "</td>
			<td>" . $row['typ'] . "<br />(" . get_info_verze($row['verze']). ")</td>
			<td>" . $row2['jmeno'] . "</td>
			<td>" . $row4['jmeno'] . "</td>
			<td id=\"maly_info_" . $row['id'] . "\"><a href=\"#\" onClick=\"return show_hide('maly_info_" . $row['id'] . "','velky_info_" . $row['id'] . "')\">ukaž text</a></td>
			<td id=\"velky_info_" . $row['id'] . "\" style=\"display: none;\">" . nl2br($row['komentar']) . "<br /><a href=\"#\" onClick=\"return show_hide('velky_info_" . $row['id'] . "','maly_info_" . $row['id'] . "')\">uzavřít</a></td>
			</tr>";
        }
        echo "</table>";

        echo "<h4>Plánovač auditů</h4>";
        echo "<table class=\"table\">
		<tr>
		<td><span class=\"subheader\">STAV</span></td>
		<td><span class=\"subheader\">SPUŠTĚNÍ</span></td>
		<td><span class=\"subheader\">PERIODA</span></td>
		<td><span class=\"subheader\">TYP</span></td>
		<td><span class=\"subheader\">KOMENTÁŘ</span></td>
		<td><span class=\"subheader\">KOORDINÁTOR</span></td>
		</tr>";

        $result = dibi::query('SELECT * FROM [prevent_audit_planovac] WHERE [id_provozovna] = %i', $_POST['provozovna']);
        while ($row = $result->fetch()) {
            if ($row['stav'] == "zapnuto") {
                $signal = " class=\"green\"";
            } else {
                $signal = " class=\"red\"";
            }

            $result2 = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $row['id_koordinator']);
            while ($row2 = $result2->fetch())
                echo "
			<tr>
			<td " . $signal . ">" . $row['stav'] . "</td>
			<td>" . Date("d.m.Y", $row['date_start']) . "</td>
			<td>" . $row['perioda'] . " dní</td>
			<td>" . $row['typ'] . "</td>
			<td>" . $row['komentar'] . "</td>
			<td>" . $row2['jmeno'] . "</td>
			</tr>";
        }
        echo "</table>";

        echo "<h4>Log auditů</h4>";
        $result = dibi::query('SELECT * FROM [prevent_audit_log] WHERE [id_provozovna] = %i', $_POST['provozovna'], 'ORDER BY [date] DESC');
        $pocet_logu = $result->count();

        echo "<p><strong>" . $pocet_logu . " záznamů</strong></p>";
        echo "<textarea name=\"log\" cols=\"80\" rows=\"10\" class=\"formular\">";

        while ($row = $result->fetch())
            echo Date("H:i d.m.Y", $row['date']) . " (" . $row['autor'] . ", ID audit: #" . $row['id_audit'] . "): " . $row['text'] . "\n";

        echo "</textarea>";
    }
}

function prehled_auditu_firma_normal() {
    echo "<p>Čísla u auditů: [nedokončené technik/nezahájené technik/nedokončené klient/dokončené]</p>";
    echo "<form method=\"POST\" action=\"./sprava_auditu.php?id=prehled_auditu&provozovna=" . $_POST['provozovna'] . "\" name=\"najdi osobu\" \">
	<fieldset>
	<legend>Název pobočky</legend>";

    echo "<label for=\"provozovna\">pobočka</label><br />
	<select name=\"provozovna\" id=\"provozovna\" class=\"formular\">
	<option value=\"vybrat\">--- vyberte ---</option>";
    $result = dibi::query('SELECT * FROM [prevent_firmy_uzivatele_prava] WHERE [id_uzivatel] = %i', $_SESSION['id_usr']);
    while ($row = $result->fetch()) {
        $result2 = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [id] = %i', $row['prava'], 'ORDER BY [nazev] ASC');
        while ($row2 = $result2->fetch()) {
            if ($_POST['provozovna']) {
                $check2 = "";
                if ($row2['id'] == $_POST['provozovna'])
                    $check2 = "selected";
            }
            echo "<option $check2 value=\"" . $row2['id'] . "\">" . $row2['nazev'] . " " . zprava_o_auditech_filtr($row2['id'], "provozovna", "firma_normal") . "</option>";
        }
    }
    echo "</select><br />";
    echo "<input class=\"tlacitko\" type=\"submit\" value=\"vypsat\">
	</fieldset>
	</form><br />";

    if ($_POST['provozovna'] && $_POST['provozovna'] != "vybrat") {
        echo "<h4>Existující audity</h4>";
        echo "<table class=\"table\">
		<tr>
		<td><span class=\"subheader\">STAV<br />(#id)</span></td>
		<td><span class=\"subheader\">STAV<br />TECHNIK</span></td>
		<td><span class=\"subheader\">STAV<br />klient</span></td>
                <td><span class=\"subheader\">vývoj</span></td>
		<td><span class=\"subheader\">AKCE</span></td>
                <td><span class=\"subheader\">název</span></td>
		<td><span class=\"subheader\">ZMĚNA</span></td>
		<td><span class=\"subheader\">TYP</span></td>
		<td><span class=\"subheader\">TECHNIK</span></td>
		<td><span class=\"subheader\">KOMENTÁŘ</span></td>
		</tr>";

        $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id_provozovna] = %i', $_POST['provozovna'], 'AND [id_firemni_uzivatel] = %i', $_SESSION['id_usr']);
        while ($row = $result->fetch()) {
            if ($row['stav_technik'] == "provedl" && $row['stav_firma'] == "potvrdil") {
                $signal = " class=\"green\"";
                $text = "dokončen<br />" . Date("H:i:s d.m.Y", $row['date_zakaznik_potvrdil']) . "<br />(#" . $row['id'] . ")";
            } else {
                $signal = " class=\"orange\"";
                $text = "nedokončen<br />(#" . $row['id'] . ")";
            }

            if ($row['stav_technik'] == "neprijal") {
                $signal2 = " class=\"red\"";
                $text2 = "nepotvrdil<br />přijetí";
            } elseif ($row['stav_technik'] == "prijal") {
                $signal2 = " class=\"orange\"";
                $text2 = "přijal<br />" . Date("H:i:s d.m.Y", $row['date_technik_prijal_provedl']);
            } elseif ($row['stav_technik'] == "provedl") {
                $signal2 = " class=\"green\"";
                $text2 = "provedl<br />" . Date("H:i:s d.m.Y", $row['date_technik_prijal_provedl']);
            }

            if ($row['stav_firma'] == "neproveden") {
                $signal3 = " class=\"red\"";
                $text3 = "nebyl<br />proveden";
            } elseif ($row['stav_firma'] == "zamitnul") {
                $signal3 = " class=\"red\"";
                $text3 = "zamítnul<br />" . Date("H:i:s d.m.Y", $row['date_zakaznik_potvrdil']);
            } elseif ($row['stav_firma'] == "potvrdil") {
                $signal3 = " class=\"green\"";
                $text3 = "potvrdil<br />" . Date("H:i:s d.m.Y", $row['date_zakaznik_potvrdil']);
            }

            if ($row['stav_checklist'] == "neuzavren") {
                $text4a = "Checklist: neuzavřen";
                $signal4a = false;
            } else {
                $text4a = "Checklist: uzavřen (" . Date("H:i:s d.m.Y", $row['date_stav_checklist']) . ")";
                $signal4a = true;
            }

            if ($row['stav_pracoviste'] == "neuzavren") {
                $text4b = "<br />Pracoviště: neuzavřeno";
                $signal4b = false;
            } else {
                $text4b = "<br/>Pracoviště: uzavřeno (" . Date("H:i:s d.m.Y", $row['date_stav_pracoviste']) . ")";
                $signal4b = true;
            }

            if ($row['stav_neshody'] == "uzavren") {
                $text4c = "<br />Neshody: zpracováno (" . Date("H:i:s d.m.Y", $row['date_stav_neshody']) . ")";
                $signal4c = true;
            } else {
                $text4c = "<br/>Neshody: nezpracováno";
                $signal4c = false;
            }
            $text4 = $text4a . $text4b . $text4c;
            if ($signal4a && $signal4b && $signal4c && barva_info_protokol_audit($row['id']))
                $signal4 = " class=\"green\"";
            elseif ($signal4a || $signal4b || $signal4c || barva_info_protokol_audit($row['id']))
                $signal4 = " class=\"orange\"";
            else
                $signal4 = " class=\"red\"";

            $result2 = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $row['id_technik']);
            $row2 = $result2->fetch();

            echo "
			<tr>
			<td " . $signal . ">" . $text . "</td>
			<td " . $signal2 . ">" . $text2 . "</td>
			<td " . $signal3 . ">" . $text3 . "</td>
                        <td " . $signal4 . ">" . $text4 . echo_info_protokol_audit($row['id']) . "</td>
			<td>";
            menu_audit($row['id'], "firma_normal");
            echo "</td><td>" . $row['nazev'] . "</td>
                        <td>" . Date("H:i:s d.m.Y", $row['date']) . "</td>
			<td>" . $row['typ'] . "</td>
			<td>" . $row2['jmeno'] . "</td>
			<td id=\"maly_info_" . $row['id'] . "\"><a href=\"#\" onClick=\"return show_hide('maly_info_" . $row['id'] . "','velky_info_" . $row['id'] . "')\">ukaž text</a></td>
			<td id=\"velky_info_" . $row['id'] . "\" style=\"display: none;\">" . nl2br($row['komentar']) . "<br /><a href=\"#\" onClick=\"return show_hide('velky_info_" . $row['id'] . "','maly_info_" . $row['id'] . "')\">uzavřít</a></td>
			</tr>";
        }
        echo "</table>";
    }
}

function komentovat_audit($audit) {
    if ($_POST['komentar']) {
        $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $audit);
        $row = $result->fetch();

        $komentar = $row['komentar'] . "\n" . "***" . Date("H:i:s d.m.Y", Time()) . ", " . $_SESSION['jmeno_usr'] . " (technik)*** \n" . $_POST['komentar'];


        $arr = array('komentar' => $komentar, 'date' => Time());
        dibi::query('UPDATE [prevent_audit] SET', $arr, 'WHERE [id] = %i', $audit);

        echo "<div class=\"obdelnik\"><h5>Audit okomentován</h5><p>Pokračujte zpět na <a href=\"./sprava_auditu.php?id=enter&firma=" . $_GET['firma'] . "&provozovna=" . $_GET['provozovna'] . "\">audity pobočky</a>.</p></div>";
    } else {
        $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $audit);
        $row = $result->fetch();

        echo "<form method=\"POST\" action=\"./sprava_auditu.php?id=komentovat_audit&firma=" . $_GET['firma'] . "&provozovna=" . $_GET['provozovna'] . "&komentovat_audit=" . $audit . "\" id=\"koment\">
		<fieldset>
		<legend>Komentovat audit</legend>";
        echo "<label for=\"komentar\">pridat komentář</label><br />
		<textarea name=\"komentar\" id=\"komentar\" class=\"formular\" rows=\"4\" cols=\"35\"></textarea><br />
		<input class=\"tlacitko\" type=\"submit\" value=\"okomentovat\"> <a href=\"./sprava_auditu.php?id=enter&firma=" . $_GET['firma'] . "&provozovna=" . $_GET['provozovna'] . "\">nekomentovat</a>
		</fieldset>
		</form>
           <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#koment').validate({
             rules: {
               komentar: {
                 required: true
               }

               }
             });
           });
           </script>";
    }
}

function komentovat_audit_firma($audit) {
    if ($_POST['komentar']) {
        $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $audit);
        $row = $result->fetch();

        $komentar = $row['komentar'] . "\n" . "***" . Date("H:i:s d.m.Y", Time()) . ", " . $_SESSION['jmeno_usr'] . " (firemní uživatel)*** \n" . $_POST['komentar'];

        $arr = array('komentar' => $komentar, 'date' => Time());
        dibi::query('UPDATE [prevent_audit] SET', $arr, 'WHERE [id] = %i', $audit);

        echo "<h4>Audit okomentován</h4><p>Pokračujte zpět na <a href=\"./sprava_auditu.php?id=prehled_auditu&provozovna=" . $_GET['provozovna'] . "\">audity pobočky</a>.</p>";
    } else {
        $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $audit);
        $row = $result->fetch();

        echo "<form method=\"POST\" action=\"./sprava_auditu.php?id=komentovat_audit_firma&provozovna=" . $_GET['provozovna'] . "&komentovat_audit_firma=" . $audit . "\">
		<fieldset>
		<legend>Komentovat audit</legend>";
        echo "<label for=\"komentar\">pridat komentář</label><br />
		<textarea name=\"komentar\" id=\"komentar\" class=\"formular\" rows=\"4\" cols=\"35\"></textarea><br />
		<input class=\"tlacitko\" type=\"submit\" value=\"okomentovat\"> <a href=\"./sprava_auditu.php?id=prehled_auditu&provozovna=" . $_GET['provozovna'] . "\">nekomentovat</a>
		</fieldset>
		</form>";
    }
}

function prijmout_audit($audit) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $audit);
    $row = $result->fetch();
    if ($row['stav_technik'] == "neprijal") {
        $arr = array('stav_technik' => 'prijal', 'date_technik_prijal_provedl' => Time(), 'date' => Time());
        dibi::query('UPDATE [prevent_audit] SET', $arr, 'WHERE [id] = %i', $audit);

        $arr_log = array('text' => 'Přijal audit pobočky ' . get_nazev_provozovny($_GET['provozovna'], false) . '', 'link' => '', 'ad' => $_SESSION['id_usr']);
        vytvor_log($arr_log);
        $arr_log = array('text' => 'Technik ' . $_SESSION['jmeno_usr'] . ' přijal audit provozovny ' . get_nazev_provozovny($_GET['provozovna'], false) . '', 'link' => '', 'ad' => $_GET['firma']);
        vytvor_log_firmy($arr_log);
        $arr_log = array('text' => 'Technik ' . $_SESSION['jmeno_usr'] . ' přijal audit', 'id_audit' => $row['id'], 'id_provozovna' => $_GET['provozovna']);
        vytvor_log_audit($arr_log);
        $zprava = "Technik " . $_SESSION['jmeno_usr'] . " přijal vámi přidělený audit (#ID " . $row['id'] . ") pobočky " . get_nazev_provozovny($_GET['provozovna'], false) . ".";
        $link = "./sprava_auditu.php?id=detaily_auditu&firma=" . get_id_firma_z_audit($audit) . "&provozovna=" . get_id_provozovna_z_audit($audit) . "&audit=" . $audit;
        $arr_ukol = array('deadline' => '', 'text' => 'Technik přijal audit', 'popis' => $zprava, 'link' => $link, 'ad' => $row['id_koordinator']);
        novy_ukol($arr_ukol);
    }
}

function neprijmout_audit($audit) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $audit);
    $row = $result->fetch();
    if ($row['stav_technik'] == "neprijal") {
        $arr = array('stav_technik' => 'nechce', 'date_technik_prijal_provedl' => Time(), 'date' => Time());
        dibi::query('UPDATE [prevent_audit] SET', $arr, 'WHERE [id] = %i', $audit);

        $arr_log = array('text' => 'Neřijal audit pobočky ' . get_nazev_provozovny($_GET['provozovna'], false) . '', 'link' => '', 'ad' => $_SESSION['id_usr']);
        vytvor_log($arr_log);
        $arr_log = array('text' => 'Technik ' . $_SESSION['jmeno_usr'] . ' nepřijal audit provozovny ' . get_nazev_provozovny($_GET['provozovna'], false) . '', 'link' => '', 'ad' => $_GET['firma']);
        vytvor_log_firmy($arr_log);
        $arr_log = array('text' => 'Technik ' . $_SESSION['jmeno_usr'] . ' nepřijal audit', 'id_audit' => $row['id'], 'id_provozovna' => $_GET['provozovna']);
        vytvor_log_audit($arr_log);
        $zprava = "Technik " . $_SESSION['jmeno_usr'] . " nepřijal vámi přidělený audit (#ID " . $row['id'] . ") pobočky " . get_nazev_provozovny($_GET['provozovna'], false) . ". Přezkoumejte prosím problém.";
        $link = "./sprava_auditu.php?id=detaily_auditu&firma=" . get_id_firma_z_audit($audit) . "&provozovna=" . get_id_provozovna_z_audit($audit) . "&audit=" . $audit;
        $arr_ukol = array('deadline' => '', 'text' => 'Technik nepřijal audit', 'popis' => $zprava, 'link' => $link, 'ad' => $row['id_koordinator']);
        novy_ukol($arr_ukol);
    }
}

function upravit_audit($audit) {
    if ($_POST['technik']) {
        $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $audit);
        $row = $result->fetch();

        $komentar = $row['komentar'] . "\n" . "***" . Date("H:i:s d.m.Y", Time()) . ", " . $_SESSION['jmeno_usr'] . " (koordinátor)*** \n" . $_POST['komentar'];

        if ($row['id_technik'] != $_POST['technik']) {
            $zprava = "Právě Vám byl koordinátorem přidělen audit, přijměte ho";
            $link = "./sprava_auditu.php?id=detaily_auditu&firma=" . get_id_firma_z_audit($audit) . "&provozovna=" . get_id_provozovna_z_audit($audit) . "&audit=" . $audit;
            $arr_ukol = array('deadline' => '', 'text' => 'Byl Vám přidělen audit', 'popis' => $zprava, 'link' => $link, 'ad' => $_POST['technik']);
            novy_ukol($arr_ukol);
            $arr['stav_technik'] == "neprijal";
        }

        $arr = array('id_technik' => $_POST['technik'], 'id_koordinator' => $_SESSION['id_usr'], 'id_firemni_uzivatel' => $_POST['firemni_uzivatel'],
            'date' => Time(), 'komentar' => $komentar);
        dibi::query('UPDATE [prevent_audit] SET', $arr, 'WHERE [id] = %i', $audit);

        $arr_log = array('text' => 'Upravil audit pobočce ' . get_nazev_provozovny($_GET['provozovna'], false) . '', 'link' => '', 'ad' => $_SESSION['id_usr']);
        vytvor_log($arr_log);
        $arr_log = array('text' => 'Upraven audit pobočce ' . get_nazev_provozovny($_GET['provozovna'], false) . '', 'link' => '', 'ad' => get_id_firma_z_provozovny($_GET['provozovna']));
        vytvor_log_firmy($arr_log);
        $arr_log = array('text' => 'Upraven audit', 'id_audit' => $audit, 'id_provozovna' => $_GET['provozovna']);
        vytvor_log_audit($arr_log);

        echo "<h4>Audit upraven</h4><p>Pokračujte zpět na <a href=\"./sprava_auditu.php?id=enter&firma=" . $_GET['firma'] . "&provozovna=" . $_GET['provozovna'] . "\">audity pobočky</a>.</p>";
    } else {
        $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $audit);
        $row = $result->fetch();

        $result2 = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $row['id_technik']);
        $row2 = $result2->fetch();
        $result3 = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $row['id_firemni_uzivatel']);
        $row3 = $result3->fetch();

        echo "<form method=\"POST\" action=\"./sprava_auditu.php?id=upravit_audit&firma=" . $_GET['firma'] . "&provozovna=" . $_GET['provozovna'] . "&upravit_audit=" . $audit . "\">
		<fieldset>
		<legend>Upravit audit</legend>";
        EchoUzivateleSelect("přidělený technik", "technik", false, false, 3, false);
        EchoUzivateleSelect("přidělený klient - uživatel", "firemni_uzivatel", false, false, false, 5);
        echo "<label for=\"komentar\">pridat komentář</label><br />
		<textarea name=\"komentar\" id=\"komentar\" class=\"formular\" rows=\"4\" cols=\"35\"></textarea><br />
		<input class=\"tlacitko\" type=\"submit\" value=\"upravit\"> <a href=\"./sprava_auditu.php?id=enter&firma=" . $_GET['firma'] . "&provozovna=" . $_GET['provozovna'] . "\">neupravovat</a>
		</fieldset>
		</form>";
    }
}

function upravit_audit_firma($audit) {
    if ($_POST['firemni_uzivatel']) {
        $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $audit);
        $row = $result->fetch();

        $komentar = $row['komentar'] . "\n" . "***" . Date("H:i:s d.m.Y", Time()) . ", " . $_SESSION['jmeno_usr'] . " (firemní admin)*** \n" . $_POST['komentar'];

        $arr = array('id_firemni_uzivatel' => $_POST['firemni_uzivatel'], 'date' => Time(), 'komentar' => $komentar);
        dibi::query('UPDATE [prevent_audit] SET', $arr, 'WHERE [id] = %i', $audit);

        $arr_log = array('text' => 'Upravil audit pobočce ' . get_nazev_provozovny($_GET['provozovna'], false) . '', 'link' => '', 'ad' => $_SESSION['id_usr']);
        vytvor_log($arr_log);
        $arr_log = array('text' => 'Upraven audit pobočce ' . get_nazev_provozovny($_GET['provozovna'], false) . '', 'link' => '', 'ad' => get_id_firma_z_provozovny($_GET['provozovna']));
        vytvor_log_firmy($arr_log);
        $arr_log = array('text' => 'Upraven audit', 'id_audit' => $audit, 'id_provozovna' => $_GET['provozovna']);
        vytvor_log_audit($arr_log);

        echo "<h4>Audit upraven</h4><p>Pokračujte zpět na <a href=\"./sprava_auditu.php?id=prehled_auditu&provozovna=" . $_GET['provozovna'] . "\">audity pobočky</a>.</p>";
    } else {
        $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $audit);
        $row = $result->fetch();

        $result2 = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $row['id_firemni_uzivatel']);
        $row2 = $result2->fetch();

        echo "<form method=\"POST\" action=\"./sprava_auditu.php?id=upravit_audit_firma&provozovna=" . $_GET['provozovna'] . "&upravit_audit_firma=" . $audit . "\">
		<fieldset>
		<legend>Upravit audit</legend>";
        EchoUzivateleSelect("přidělený klient - uživatel", "firemni_uzivatel", false, false, false, 6);
        echo "<label for=\"komentar\">pridat komentář</label><br />
		<textarea name=\"komentar\" id=\"komentar\" class=\"formular\" rows=\"4\" cols=\"35\"></textarea><br />
		<input class=\"tlacitko\" type=\"submit\" value=\"upravit\"> <a href=\"./sprava_auditu.php?id=prehled_auditu&provozovna=" . $_GET['provozovna'] . "\">neupravovat</a>
		</fieldset>
		</form>";
    }
}

function zapnout_plan_auditu($audit) {
    $result = dibi::query('SELECT * FROM [prevent_audit_planovac] WHERE [id] = %i', $audit);
    $row = $result->fetch();

    if ($row['stav'] == "vypnuto") {
        dibi::query('UPDATE [prevent_audit_planovac] SET [stav] = %s', "zapnuto", 'WHERE [id] = %i', $audit);
        $zprava1 = "Zapnul plán auditu pobočky " . get_nazev_provozovny($_GET['provozovna'], false);
        $zprava2 = "Zapnut plán auditu pobočky " . get_nazev_provozovny($_GET['provozovna'], false);
        $zprava3 = "Zapnut plán auditu";
    } elseif ($row['stav'] == "zapnuto") {
        dibi::query('UPDATE [prevent_audit_planovac] SET [stav] = %s', "vypnuto", 'WHERE [id] = %i', $audit);
        $zprava = "Cron " . $row['nazev'] . " vypnut";
        $zprava1 = "Vypnul plán auditu pobočky " . get_nazev_provozovny($_GET['provozovna'], false);
        $zprava2 = "Vypnut plán auditu pobočky " . get_nazev_provozovny($_GET['provozovna'], false);
        $zprava3 = "Vypnut plán auditu";
    }
    $arr_log = array('text' => $zprava1, 'link' => '', 'ad' => $_SESSION['id_usr']);
    vytvor_log($arr_log);
    $arr_log = array('text' => $zprava2, 'link' => '', 'ad' => get_id_firma_z_provozovny($_GET['provozovna']));
    vytvor_log_firmy($arr_log);
    $arr_log = array('text' => $zprava3, 'link' => '', 'id_provozovna' => $_GET['provozovna']);
    vytvor_log_audit($arr_log);
}

function smazat_plan_auditu($audit) {
    dibi::query('DELETE FROM [prevent_audit_planovac] WHERE [id] = %i', $audit);

    $arr_log = array('text' => "Smazal plán auditu pobočky " . get_nazev_provozovny($_GET['provozovna'], false), 'link' => '', 'ad' => $_SESSION['id_usr']);
    vytvor_log($arr_log);
    $arr_log = array('text' => "Smazán plán auditu pobočky " . get_nazev_provozovny($_GET['provozovna'], false), 'link' => '', 'ad' => get_id_firma_z_provozovny($_GET['provozovna']));
    vytvor_log_firmy($arr_log);
    $arr_log = array('text' => "Smazán plán auditu", 'link' => '', 'id_provozovna' => $_GET['provozovna']);
    vytvor_log_audit($arr_log);
}

function pridat_plan_auditu($id_provozovna) {
    if ($_POST['typ']) {
        $date_start = mktime(0, 0, 0, $_POST['mesic'], $_POST['den'], $_POST['rok']);


        if ($_POST['nazev_audit_plan'] == "audit")
            $nazev = "Audit";
        elseif ($_POST['nazev_audit_plan'] == "rocni_proverka")
            $nazev = "Roční prověrka";

        $arr = array('id_provozovna' => $id_provozovna, 'id_koordinator' => $_SESSION['id_usr'], 'date_start' => $date_start, 'perioda' => $_POST['perioda'], 'stav' => "zapnuto", 'typ' => $_POST['typ'], 'komentar' => $_POST['komentar'], 'nazev' => $nazev);
        dibi::query('INSERT INTO [prevent_audit_planovac]', $arr);

        $arr_log = array('text' => 'Vytvořil nový plán auditu pobočce ' . get_nazev_provozovny($id_provozovna, false) . '', 'link' => '', 'ad' => $_SESSION['id_usr']);
        vytvor_log($arr_log);
        $arr_log = array('text' => 'Vytvořen nový plán auditu pobočce ' . get_nazev_provozovny($id_provozovna, false) . '', 'link' => '', 'ad' => get_id_firma_z_provozovny($id_provozovna));
        vytvor_log_firmy($arr_log);
        $arr_log = array('text' => 'Vytvořen nový plán auditu', 'link' => '', 'id_provozovna' => $id_provozovna);
        vytvor_log_audit($arr_log);
    }
    else {
        echo "<form method=\"POST\" action=\"./sprava_auditu.php?id=enter&firma=" . $_POST['firma'] . "&provozovna=" . $_POST['provozovna'] . "\" name=\"verze\" onSubmit=\"return check_nova_zaloha(this);\">
		<fieldset>
		<legend>Nový plán auditu</legend>
		<label for=\"typ\">typ auditu</label><br />
		<select name=\"typ\" id=\"typ\" class=\"formular\">
			<option value=\"bozp\" selected>BOZP</option>
                        <option value=\"po\">PO</option>
                        <option value=\"bozp+po\">BOZP + PO</option>
		</select><br />
                <label for=\"nazev_audit_plan\">název auditu - prvního auditu spuštěného plánem</label><br />
		<select name=\"nazev_audit_plan\" id=\"nazev_audit_plan\" class=\"formular\">
			<option value=\"audit\" selected>Audit</option>
                        <option value=\"rocni_proverka\">Roční prověrka</option>
		</select><br />
		<label for=\"den\">den, měsíc a rok prvního spuštění</label><br />
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
        for ($i = 2009; $i < 2015; $i++) {
            echo "<option value='$i'";
            if ($i == $SYear)
                echo " selected";
            echo ">$i</option>\n";
        }
        echo "</select><br />
		<label for=\"perioda\">perioda opakování (dny)</label><br />
		<input name=\"perioda\" nid=\"perioda\" class=\"formular\" value=\"\"><br />
		<label for=\"komentar\">komentář</label><br />
		<textarea name=\"komentar\" id=\"komentar\" class=\"formular\" rows=\"5\" cols=\"40\"></textarea><br />
		<input class=\"tlacitko\" type=\"submit\" value=\"vytvořit\"> <a href=\"#\" onClick=\"return hide_show('plot_short2','plot_full2')\">nevytvářet</a>
		</fieldset>
		</form>";
    }
}

function log_auditu_smazat() {
    dibi::query('DELETE FROM [prevent_audit_log] WHERE [id_provozovna] = %i', $_GET['provozovna'], 'AND date < %i', Time() - 604800);


    $arr_log = array('text' => 'Vymazány logy auditů starší 7 dní', 'ad' => $_GET['firma'], 'link' => '');
    vytvor_log_firmy($arr_log);
}

function detaily_auditu($audit, $prepinac_prava) {
    if (prava_k_auditu($audit, $_SESSION['id_usr'])) {
        $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $audit);
        $row = $result->fetch();
        echo "<table class=\"table\">
			<tr>
			<td><span class=\"subheader\">STAV<br />(#id)</span></td>";
        stav_audit($row['id']);
        echo "</tr>
			<tr>
			<td><span class=\"subheader\">STAV<br />TECHNIK</span></td>";
        stav_audit_technik($row['id']);
        echo "</tr>
			<tr>
			<td><span class=\"subheader\">STAV<br />KLIENT</span></td>";
        stav_audit_firma($row['id']);
        echo "</tr>
			<tr>
			<td><span class=\"subheader\">vývoj</span></td>";
        stav_audit_vyvoj($row['id']);
        echo "</tr>
			<tr>
			<td><span class=\"subheader\">AKCE</span></td>
			<td>";
        menu_audit($row['id'], $prepinac_prava);
        echo "</td>
			</tr>
			<tr>
			<td><span class=\"subheader\">název</span></td>
			<td>" . $row['nazev'] . "</td>
			</tr>
			<tr>
			<td><span class=\"subheader\">ZMĚNA</span></td>			
			<td>" . Date("H:i:s d.m.Y", $row['date']) . "</td>
			</tr>
			<tr>
			<td><span class=\"subheader\">TYP/verze</span></td>";
        if($prepinac_prava == "koordinator" || $prepinac_prava == "admin") echo "<td>" . $row['typ'] . "<br />(<a href=\"./audit_schema_nahled.php?typ=" . $row['typ'] . "&verze=" . $row['verze'] . "\" target=\"_blank\">" . get_info_verze($row['verze']). "</a>)</td>";
        else echo "<td>" . $row['typ'] . "<br />(" . get_info_verze($row['verze']). ")</td>";
			echo"</tr>
			<tr>
			<td><span class=\"subheader\">TECHNIK</span></td>
			<td>" . get_jmeno_uzivatele_z_id($row['id_technik']) . "</td>
			</tr>
			<tr>
			<td><span class=\"subheader\">KLIENT</span></td>
			<td>" . get_jmeno_uzivatele_z_id($row['id_firemni_uzivatel']) . "</td>
			</tr>
			<tr>
			<td><span class=\"subheader\">KOMENTÁŘ</span></td>
			<td id=\"maly_info_" . $row['id'] . "\"><a href=\"#\" onClick=\"return show_hide('maly_info_" . $row['id'] . "','velky_info_" . $row['id'] . "')\">ukaž text</a></td>
			<td id=\"velky_info_" . $row['id'] . "\" style=\"display: none;\">" . nl2br($row['komentar']) . "<br /><a href=\"#\" onClick=\"return show_hide('velky_info_" . $row['id'] . "','maly_info_" . $row['id'] . "')\">uzavřít</a></td>
			</tr>";

        echo "</table>";

//cesta zpet pro firemni uzivate
        if ($prepinac_prava == "koordinator") {
            echo "<p>Zpět na <a href=\"./sprava_auditu.php?id=enter&firma=" . $_GET['firma'] . "&provozovna=" . $_GET['provozovna'] . "\">přehled auditů</a></p>";
        } elseif ($prepinac_prava == "technik") {
            echo "<p>Zpět na <a href=\"./sprava_auditu.php?id=enter&firma=" . $_GET['firma'] . "&provozovna=" . $_GET['provozovna'] . "\">přehled auditů</a></p>";
        } elseif ($prepinac_prava == "firma_admin") {
            echo "<p>Zpět na <a href=\"./sprava_auditu.php?id=prehled_auditu&provozovna=" . $_GET['provozovna'] . "\">přehled auditů</a></p>";
        } elseif ($prepinac_prava == "firma_normal") {
            echo "<p>Zpět na <a href=\"./sprava_auditu.php?id=prehled_auditu&provozovna=" . $_GET['provozovna'] . "\">přehled auditů</a></p>";
        }

        echo "<h4>Dodatečné informace</h4>
            <div class=\"obdelnikchecklist\">";
        $dodat_info_status_prazdny = true;
        if ($row['zamitnut'] == "ano" && $row['id_oprava'] != 0) {
            echo "<h5>Tento audit byl firmou zamítnut a nyní je veden nový.</h5><p> <a href=\"./sprava_auditu.php?id=detaily_auditu&firma=" . $_GET['firma'] . "&provozovna=" . $_GET['provozovna'] . "&audit=" . $row['id_oprava'] . "\">detaily nového auditu #ID " . $row['id_oprava'] . "</a></p><div class=\"caradown\"></div>";
            $dodat_info_status_prazdny = false;
        }
        if ($row['id_puvodni'] != 0) {
            echo "<h5>Tento audit navazuje na audit, který byl firmou zamítnut.</h5><p> <a href=\"./sprava_auditu.php?id=detaily_auditu&firma=" . $_GET['firma'] . "&provozovna=" . $_GET['provozovna'] . "&audit=" . $row['id_puvodni'] . "\">detaily původního auditu #ID " . $row['id_puvodni'] . "</a></p><div class=\"caradown\"></div>";
            $dodat_info_status_prazdny = false;
        }
        if ($row['synchronizace'] == "local") {
            echo "<h5>Audit je v současné chvíli exportován na lokální počítač technika. Nelze ho upravovat</h5> <p>Technik audit provádí na svém počítači a prto s ím nelze manipulovat. Vyčkejte než ho nahraje zpět do Systému.</p><div class=\"caradown\"></div>";
            $dodat_info_status_prazdny = false;
        }
        if ($dodat_info_status_prazdny) {
            echo "<h5>Žádné dodatečné informace.</h5>";
        }
        echo "</div>";
        echo "<h4>Log auditu</h4>";
        $result_log_auditu = dibi::query('SELECT * FROM [prevent_audit_log] WHERE [id_audit] = %i', $audit, 'ORDER BY [date] DESC');
        $pocet_logu = $result_log_auditu->count();

        echo "<p><strong>" . $pocet_logu . " záznamů</strong></p>";
        echo "<textarea name=\"log\" cols=\"80\" rows=\"10\" class=\"formular\">";

        while ($row_log_auditu = $result_log_auditu->fetch())
            echo Date("H:i d.m.Y", $row_log_auditu['date']) . " (" . $row_log_auditu['autor'] . ", ID audit: #" . $row_log_auditu['id_audit'] . "): " . $row_log_auditu['text'] . "\n";

        echo "</textarea>";
    } else {
        echo "<h4>Nemáte právo číst zvolený audit!</h4><p>Přejděte zpět k volbě auditu na přehled auditů provozovny.</p>";
    }
}
?>