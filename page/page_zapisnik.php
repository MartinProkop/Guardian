<?php

function zapisnik() {
    if ($_GET['id_zapisnik'] == "") {
        $result = dibi::query('SELECT * FROM [prevent_zapisnik] WHERE [ad] = %i', $_SESSION['id_usr'], 'AND [nazev] = %s', "hlavní");
        $row = $result->fetch();
        $_GET['id_zapisnik'] = $row['id'];
    }
    if ($_POST['odeslano']) {
        dibi::query('UPDATE [prevent_zapisnik] SET [text] = %s', $_POST['text'], 'WHERE [ad] = %i', $_SESSION['id_usr'], 'AND [id] = %i', $_GET['id_zapisnik']);
    }
    $result = dibi::query('SELECT * FROM [prevent_zapisnik] WHERE [ad] = %i', $_SESSION['id_usr'], 'AND [id] = %i', $_GET['id_zapisnik']);
    $row = $result->fetch();

    echo "<form method=\"POST\" action\=./zapisnik.php?id_zapisnik=" . $row[id] . "\">
	<input type=\"hidden\" name=\"odeslano\" value=\"ano\" />
	<fieldset>
	<legend>Zápisník - " . $row['nazev'] . "</legend>
	<textarea cols=\"100\" rows=\"20\" name=\"text\" id=\"text\" class=\"formular\">" . $row['text'] . "</textarea><br />
	<input class=\"tlacitko\" type=\"submit\" value=\"zapsat\">
	</fieldset>
	</form>";
}

function menu_zapisnik() {
    echo "<div class=\"info\" align=\"justify\" id=\"plot_short\">
        <p><strong>Zápisníky:</strong> ";

    $result = dibi::query('SELECT * FROM [prevent_zapisnik] WHERE [ad] = %i', $_SESSION['id_usr']);
    while ($row = $result->fetch()) {
        if ($row['nazev'] == "hlavní")
            echo "<a href=\"./zapisnik.php?id_zapisnik=" . $row['id'] . "\">" . $row['nazev'] . "</a> | ";
        else
            echo "<a href=\"./zapisnik.php?id_zapisnik=" . $row['id'] . "\">" . $row['nazev'] . "</a> (<a href=\"./zapisnik.php?smazat_zapisnik=" . $row['id'] . "\" onclick=\"if(confirm('Skutečně chcete smazat zápisník?')) location.href='./zapisnik.php?smazat_zapisnik=" . $row['id'] . "'; return(false);\">smazat</a>) | ";
    }
?>

    <a href="#" onClick="return show_hide('plot_short','plot_full')"><img src="./design/pridat.png" /> přidat zápisník</a>
    </div>
    <div class="info2" align="justify" id="plot_full" style="display: none;">
    <?php pridat_zapisnik(); ?>
</div>

<?php
}

function smazat_zapisnik() {
    $result = dibi::query('SELECT * FROM [prevent_zapisnik] WHERE [id] = %i', $_GET['smazat_zapisnik']);
    $row = $result->fetch();

    dibi::query('DELETE FROM [prevent_zapisnik] WHERE [id] = %i', $_GET['smazat_zapisnik']);

    $arr_log = array('text' => 'Smazal si zápisník s názvem ' . $row['nazev'] . '.', 'link' => '', 'ad' => $_SESSION['id_usr']);
    vytvor_log($arr_log);
}

function pridat_zapisnik() {
    echo "<form method=\"POST\" action\=./zapisnik.php\" id=\"novy_zapisnik\" >
	<input type=\"hidden\" name=\"odeslano_novy\" value=\"ano\" />
	<fieldset>
	<legend>nový zápisník</legend>
        <label for=\"nazev\">název</label>
	<input name=\"nazev\" id=\"nazev\" class=\"formular\" size=\"25\" /><br />
	<input class=\"tlacitko\" type=\"submit\" value=\"vytvořit\"> <a href=\"#\" onClick=\"return show_hide('plot_full','plot_short')\">nevytvářet</a>
	</fieldset>
	</form>
           <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#novy_zapisnik').validate({
             rules: {
               nazev: {
                 required: true
               }

               }
             });
           });
           </script>

            <br />";
}

function pridat_zapisnik_dva() {
    if ($_POST['odeslano_novy']) {
        $arr = array('nazev' => $_POST['nazev'], 'ad' => $_SESSION['id_usr']);
        dibi::query('INSERT INTO [prevent_zapisnik]', $arr);

        $result = dibi::query('SELECT * FROM [prevent_zapisnik] WHERE [ad] = %i', $_SESSION['id_usr'], 'AND [nazev] = %s', $_POST['nazev']);
        $row = $result->fetch();

        $_GET['id_zapisnik'] = $row['id'];

        $arr_log = array('text' => 'Vytvořil si zápisník s názvem' . $_POST['nazev'] .'.', 'link' => '', 'ad' => $_SESSION['id_usr']);
        vytvor_log($arr_log);
    }
}
?>