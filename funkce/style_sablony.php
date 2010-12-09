<?php
//                                <script src=\"./module_include/validate/jquery.js\" type=\"text/javascript\"></script>
function hlavicka() {
    echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\"\"http://www.w3.org/TR/xhtml1/DTD/xhtml11.dtd\">
	<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\">
	<head>
		<title>Systém Guardian</title>
		<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />
		<meta http-equiv=\"content-language\" content=\"cs\" />
		<link rel=\"stylesheet\" type=\"text/css\" href=\"./design/style.css\" media=\"screen\" />
		<meta name=\"description\" content=\"Systém prevent\" />
		<meta name=\"author\" content=\"Martin Prokop\" />
		<meta name=\"copyright\" content=\"Martin Prokop\" />

                <script type=\"text/javascript\" src=\"./design/lytebox/lytebox.js\"></script>
                <link rel=\"stylesheet\" href=\"./design/lytebox/lytebox.css\" type=\"text/css\" media=\"screen\" />

                <script type=\"text/javascript\" src=\"./module_include/qtip/jquery-1.3.2.min.js\"></script>
                <script type=\"text/javascript\" src=\"./module_include/qtip/jquery.qtip-1.0.0-rc3.min.js\"></script>

                <script src=\"./module_include/validate/jquery.validate.pack.js\" type=\"text/javascript\"></script>
                <script src=\"./module_include/validate/jquery.metadata.js\" type=\"text/javascript\"></script>
                <script src=\"./module_include/validate/messages_cs.js\" type=\"text/javascript\"></script>

	</head>
	<body>

		<script language=\"Javascript\">
			function show_hide(div1, div2)
			{
				document.getElementById(div1).style.display = \"none\";
				document.getElementById(div2).style.display = \"\";
				return false;
			}
			function hide_show(div1, div2)
			{
				document.getElementById(div1).style.display = \"\";
				document.getElementById(div2).style.display = \"none\";
				return false;
			}
		</script>
		<script language=\"Javascript\">
			function hide(div1)
			{
				document.getElementById(div1).style.display = \"none\";
				return false;
			}
			function show(div1)
			{
				document.getElementById(div1).style.display = \"\";
				return false;
			}
		</script>
    <h1><a id=\"top\"></a><a href=\"./index.php\">Systém Guardian</a></h1>";
}

function hlavicka_minipage() {
    echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\"\"http://www.w3.org/TR/xhtml1/DTD/xhtml11.dtd\">
	<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\">
	<head>
		<title>Systém Guardian</title>
		<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />
		<meta http-equiv=\"content-language\" content=\"cs\" />
		<link rel=\"stylesheet\" type=\"text/css\" href=\"./design/style.css\" media=\"screen\" />
		<meta name=\"description\" content=\"Systém prevent\" />
		<meta name=\"author\" content=\"Martin Prokop\" />
		<meta name=\"copyright\" content=\"Martin Prokop\" />

                <script type=\"text/javascript\" src=\"./design/lytebox/lytebox.js\"></script>
                <link rel=\"stylesheet\" href=\"./design/lytebox/lytebox.css\" type=\"text/css\" media=\"screen\" />

                <script type=\"text/javascript\" src=\"./module_include/qtip/jquery-1.3.2.min.js\"></script>
                <script type=\"text/javascript\" src=\"./module_include/qtip/jquery.qtip-1.0.0-rc3.min.js\"></script>

                <script src=\"./module_include/validate/jquery.validate.pack.js\" type=\"text/javascript\"></script>
                <script src=\"./module_include/validate/jquery.metadata.js\" type=\"text/javascript\"></script>
                <script src=\"./module_include/validate/messages_cs.js\" type=\"text/javascript\"></script>

	</head>
	<body>
		<script language=\"Javascript\">
			function show_hide(div1, div2)
			{
				document.getElementById(div1).style.display = \"none\";
				document.getElementById(div2).style.display = \"\";
				return false;
			}
			function hide_show(div1, div2)
			{
				document.getElementById(div1).style.display = \"\";
				document.getElementById(div2).style.display = \"none\";
				return false;
			}
		</script>
<h1><a id=\"top\"></a><a href=\"./index.php\">Systém Guardian</a></h1>";
}

function nadpis_horni($a, $b) {
    echo "<h2><a href=\"$b\">$a</a></h2>";
}

function navigace_horni() {
    echo "<div class=\"quicknav\">
	<a href=\"./index.php\">Hlavní stránka</a> | <a href=\"./novinky.php\">Novinky [" . nove_novinky() . " nové]</a> | <a href=\"./faq.php?id=o_systemu\">Nápověda</a> ";
    if (login ()) {
        echo "| <a href=\"./index.php?action=logout\">Odhlásit [ " . $_SESSION['jmeno_usr'] . " ]</a>";
        if (!strpos($_SERVER['REQUEST_URI'], "provest_audit.php")) {
            echo "<script type=\"text/javascript\">
			mytime=setTimeout('remind(5)',1500000);
			function remind(msg1)
			{
				var msg = \"Systém Guardian: Za \" + msg1 +\" minut budete automaticky odhlášen!\\n\\rPokud neprovedete akci v Systému!\";
				alert(msg);
			}
		</script> ";
        }
    } else {
        echo "| <a href=\"./index.php\">Přihlásit</a>";
    }
}

function navigace_horni_minipage() {
    echo "<div class=\"quicknav\">";
    if (login ()) {
        echo "<a href=\"javascript: self.close ();\">Zavřít okno</a> | Přihlášen [ " . $_SESSION['jmeno_usr'] . " ]</a>";
    } else {
        echo "<a href=\"javascript: self.close ();\">Neautorizován! Zavřít okno</a>";
    }

    echo "</div>";
}

function search($readonly) {
    echo "<form method=\"post\" action=\"./hledat.php\">
	<p>
	<input class=\"formular\" type=\"text\" name=\"text\" value=\"zadejte výraz\" onClick=\"this.value=''\" size=\"21\" maxlength=\"255\"/>
	<input class=\"tlacitko\" type=\"submit\" name=\"sa\" value=\"Hledat\" />
	</p>
	</form>";
    echo "	</div>";
}

function cesta($nazev) {
    $cesta = "";
    if (count($nazev) > 0) {
        $cesta = " <a href=\"./index.php\" title=\"Guardian\">Guardian</a> > ";
        foreach ($nazev as $i => $v) {
            $cesta = $cesta . " <a href=\"./" . $v . "\" title=\"" . $i . "\">" . $i . "</a> ";
            if (end($nazev) != $v)
                $cesta = $cesta . " > ";
        }
    } else {
        $cesta = "Na této stránce není cesta podporována.";
    }
    echo "<div class=\"path\"><strong>Navigace:</strong> $cesta</div>";
}

function specmenu($a, $b) {
    $onlick = "";
    echo "<div class=\"main\">";
    if (!($a == "" && $b == ""))
        echo "<div class=\"printlink\"><a href=\"./$b\">$a &raquo;</a></div>";
}

function patka() {
    $result = dibi::query('SELECT * FROM [prevent_system] ORDER BY [date] DESC');
    $row = $result->fetch();
    $result2 = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [posledni_klik] > %i', (Time() - 900));
    $online = $result2->count();
    echo "</div>
	<div class=\"toplink\">
		<a href=\"" . $_SERVER['REQUEST_URI'] . "#top\"><img src=\"./design/arrow_top.gif\" alt=\"top\" width=\"9\" height=\"7\" />nahoru</a>
	</div>
	<div class=\"footer\">
		<address>Systém Guardian, G U A R D 7, v.o.s. | <a href=\"http://www.guard7.cz/\">http://www.guard7.cz/</a></address>
		Čas: " . Date("H:i:s d.m.Y", Time()) . " | Uživatelů online: " . $online . "<br />
		Verze systému: <a href=\"./faq.php?id=prehled_verzi_systemu\">" . $row['verze'] . "</a>
		 | Aktualizace systému: " . Date("H:i:s d.m.Y", $row['date']) . " <br />
		Created by <a href=\"mailto:xixaom [at] centrum.cz\">Martin Prokop</a>
	</div>
	</body>
	</html>";
}

function patka_minipage() {
    $result = dibi::query('SELECT * FROM [prevent_system] ORDER BY [date] DESC');
    $row = $result->fetch();
    $result2 = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [posledni_klik] > %i', (Time() - 900));
    $online = $result2->count();
    echo "</div>

	<div class=\"footer\">
		<address>Systém Guardian, G U A R D 7, v.o.s. | <a href=\"http://www.guard7.cz/\">http://www.guard7.cz/</a></address>
		Čas: " . Date("H:i:s d.m.Y", Time()) . " | Uživatelů online: " . $online . "<br />
		Verze systému: <a href=\"./faq.php?id=prehled_verzi_systemu\">" . $row['verze'] . "</a>
		 | Aktualizace systému: " . Date("H:i:s d.m.Y", $row['date']) . " <br />
		Created by <a href=\"mailto:xixaom [at] centrum.cz\">Martin Prokop</a>
	</div>
	</body>
	</html>";
}
?>