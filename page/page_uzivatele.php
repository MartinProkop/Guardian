<?php
function uzivatele()
{
    echo "<form method=\"POST\" action=\"./uzivatele.php\">
	<fieldset>
	<legend>Výběr uživatele</legend>";

	if ($_SESSION['prava_usr'] == "admin" || $_SESSION['prava_usr'] == "koordinator") EchoUzivateleSelect("", "id_uzivatele", 1, 1, 1, 1);
	elseif ($_SESSION['prava_usr'] == "technik") EchoUzivateleSelect("", "id_uzivatele", 1, 1, 1, 2);
	elseif ($_SESSION['prava_usr'] == "firma") EchoUzivateleSelect("", "id_uzivatele", 1, 1, 2, 3);

    echo "<input class=\"tlacitko\" type=\"submit\" value=\"zobrazit\">
	</fieldset>
	</form>";

    if ($_POST['id_uzivatele']) {

        $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $_POST['id_uzivatele']);
        $row = $result->fetch();
        if($row['prava'] == "admin") $text_prava = "administrátor";
        elseif($row['prava'] == "koordinator") $text_prava = "koordinátor";
        elseif($row['prava'] == "technik") $text_prava = "technik";
        elseif($row['prava'] == "firma") $text_prava = "klient";

        echo "<h3>". $row['jmeno'] ."</h3>
        <p><a href=\"./posta.php?adresat=".$row['id']."\">napsat poštu</a><br />
        <strong>e-mail:</strong> ". $row['mail'] ."<br />
        <strong>telefon:</strong> ". $row['telefon'] ."<br />
        <strong>práva:</strong> ". $text_prava ."<br /></p>";





          }
}
?>