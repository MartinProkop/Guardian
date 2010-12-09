<?php

function index_admin() {
    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE  [id] = %i', $_SESSION['id_usr']);
    $row = $result->fetch();

    echo "<h3>Vítej v Systému Guardian</h3>
    <h4>Úkoly</h4>";
    ukoly_na_index_usr();
    echo "<h4>Nástěnky</h4>";
    nastenky_na_index_koordinator();
    echo "<h4>Pošta</h4>";
    posta_na_index_usr();
    echo "<h4><a name=\"zapisnik\"></a>Zápisník</h4>";
    zapisnik_nastenka();

//    echo "<h4>Informace koordinátorovi</h4>
//	<p>Naposledy jsi se přihlásil: " . Date("H:i:s d.m.Y", $row['posledni_login_stary']) . "</p>
//	<p>Nástěnka [" . nove_zpravy_v_nastence_koordinator() . " nové]: ";
//    seznam_nastenek();
//    echo" </p>
//	<p>Novinky: <a href=\"./novinky.php\">" . nove_novinky() . " nové</a></p>
//	<p>Pošta: <a href=\"./posta.php?id=prijata\">" . nove_zpravy_v_poste() . " nových zpráv </a></p>
//	<p>Úkoly [nové/akutní/čekající/splněné/odmítnuté]: <a href=\"./ukoly.php\" title=\"[nové/akutní/čekající/splněné/odmítnuté]\">" . zprava_o_ukolech() . "</a></p>
//	<p>Audity [nezahájené technikem / nedokončené technikem / provedené technikem / nedokončené klientem / potvrzené klientem / zamítlé klientem / dokončené]: <a href=\"./sprava_auditu.php?id=enter\" title=\"\">" . zprava_o_auditech_filtr_vse("koordinator") . "</a></p>
//        <p>Audity které se právě provádějí: <a href=\"./provest_audit.php?id=enter\">[" . o_auditech_filtr("koordinator", "nedokoncene_technik") . "]</a></p>";
//    echo "<p><a href=\"./?print=ano\">tiskni</a></p>";

//    require_once './module_include/ProgressBar.class.php';
//    $bar = new ProgressBar($message='Tisknu dokument...', $hide=true, $sleepOnFinish=2, $barLength=500, $domID='progressbar');
//
//    $bar->initialize(4);
//    $bar->increase("Start.");
//
//
//    $bar->increase("start2..");
//        if($_GET['print'] == "ano")
//        {
//            tisk_pdf1("./audit_data/j.pdf", 5785);
//        }
//        $bar->increase("Tisk.");
//
//      $bar->increase("Hotovo!");
}

function index_koordinator() {
    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE  [id] = %i', $_SESSION['id_usr']);
    $row = $result->fetch();

    echo "<h3>Vítej v Systému Guardian</h3>
    <h4>Úkoly</h4>";
    ukoly_na_index_usr();
    echo "<h4>Nástěnky</h4>";
    nastenky_na_index_koordinator();
    echo "<h4>Pošta</h4>";
    posta_na_index_usr();
    echo "<h4><a name=\"zapisnik\"></a>Zápisník</h4>";
    zapisnik_nastenka();

//    echo "<h4>Informace koordinátorovi</h4>
//	<p>Naposledy jsi se přihlásil: " . Date("H:i:s d.m.Y", $row['posledni_login_stary']) . "</p>
//	<p>Nástěnka [" . nove_zpravy_v_nastence_koordinator() . " nové]: ";
//    seznam_nastenek();
//    echo" </p>
//	<p>Novinky: <a href=\"./novinky.php\">" . nove_novinky() . " nové</a></p>
//	<p>Pošta: <a href=\"./posta.php?id=prijata\">" . nove_zpravy_v_poste() . " nových zpráv </a></p>
//	<p>Úkoly [nové/akutní/čekající/splněné/odmítnuté]: <a href=\"./ukoly.php\" title=\"[nové/akutní/čekající/splněné/odmítnuté]\">" . zprava_o_ukolech() . "</a></p>
//	<p>Audity [nezahájené technikem / nedokončené technikem / provedené technikem / nedokončené klientem / potvrzené klientem / zamítlé klientem / dokončené]: <a href=\"./sprava_auditu.php?id=enter\" title=\"\">" . zprava_o_auditech_filtr_vse("koordinator") . "</a></p>
//        <p>Audity které se právě provádějí: <a href=\"./provest_audit.php?id=enter\">[" . o_auditech_filtr("koordinator", "nedokoncene_technik") . "]</a></p>";
}

function index_technik() {
    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE  [id] = %i', $_SESSION['id_usr']);
    $row = $result->fetch();

    echo "<h3>Vítej v Systému Guardian</h3>
    <h4>Úkoly</h4>";
    ukoly_na_index_usr();
    echo "<h4>Nástěnky</h4>";
    nastenky_na_index_technik();
    echo "<h4>Pošta</h4>";
    posta_na_index_usr();
    echo "<h4><a name=\"zapisnik\"></a>Zápisník</h4>";
    zapisnik_nastenka();

//
//    echo "<h4>Informace technikovi</h4>
//	<p>Naposledy jsi se přihlásil: " . Date("H:i:s d.m.Y", $row['posledni_login_stary']) . "</p>
//	<p>Nástěnka [" . nove_zpravy_v_nastence_technik() . " nové]: ";
//    seznam_nastenek();
//    echo" </p>
//	<p>Novinky: <a href=\"./novinky.php\">" . nove_novinky() . " nové</a></p>
//	<p>Pošta: <a href=\"./posta.php?id=prijata\">" . nove_zpravy_v_poste() . " nových zpráv </a></p>
//	<p>Úkoly [nové/akutní/čekající/splněné/odmítnuté]: <a href=\"./ukoly.php\" title=\"[nové/akutní/čekající/splněné/odmítnuté]\">" . zprava_o_ukolech() . "</a></p>
//	<p>Audity [nezahájené technikem / nedokončené technikem / provedené technikem / nedokončené klientem / potvrzené klientem / zamítlé klientem / dokončené]: <a href=\"./sprava_auditu.php?id=enter\" title=\"\">" . zprava_o_auditech_filtr_vse("technik") . "</a></p>
//        <p>Audity které se právě provádějí: <a href=\"./provest_audit.php?id=enter\">[" . o_auditech_filtr("ktechnik", "nedokoncene_technik") . "]</a></p>";
}

function index_firma() {

    if ($_POST['id_audit'] == null)
        $_POST['id_audit'] = $_GET['id_audit'];

    echo "<h3>Přípomínkování auditu</h3>";

    if ($_POST['id_audit'] && $_POST['sent'] == "ano") {
        $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $_POST['id_audit']);
        $row = $result->fetch();
        $result_pripominky = dibi::query('SELECT * FROM [prevent_audit_pripominky] WHERE [id_audit] = %i', $_POST['id_audit']);
        $row_pripominky = $result_pripominky->fetch();

        $arr_log = array('text' => 'Klient připomínkoval audit (ID#' . $row['id'] . ') a předal ho koordinátorovi.', 'id_audit' => $row['id'], 'id_provozovna' => $row['id_provozovna']);
        vytvor_log_audit($arr_log);

        $arr_ukol = array('deadline' => '', 'text' => 'Klient připomínkoval audit (ID#' . $row['id'] . ') který jste mu poslal.', 'popis' => "<strong>Opravte audit podle připomínek:</strong><br />" . $_POST['pripominka'], 'link' => "./nahled_audit.php?id=vybrat_oblast&id_audit=" . $row['id'], 'ad' => $row['id_koordinator'], 'zadal_jmeno' => get_jmeno_uzivatele_z_id($_SESSION['id_usr']));
        novy_ukol($arr_ukol);

        $arr_pripominky = array('firma_koordinatorovi' => $_POST['pripominka'], 'date_firma_koordinatorovi' => time());
        dibi::query('UPDATE [prevent_audit_pripominky] SET', $arr_pripominky, 'WHERE [id_audit] = %i', $row['id']);

        $arr_audit = array('stav_firma' => "potvrdil", 'date_zakaznik_potvrdil' => time(), 'date' => time());
        dibi::query('UPDATE [prevent_audit] SET', $arr_audit, 'WHERE [id] = %i', $row['id']);

        echo "<div class=\"obdelnik\"><h4>Děkujeme za připomínkování auditu</h4><p>Audit byl odeslán našemu koordinátorovi. Pokračujte na <a href=\"./index.php\">hlavní stránku</a>.</p></div>";
    } else {

        if ($_POST['id_audit']) {
            echo_nahled_audit($_POST['id_audit'], "firma_normal");


            zprava_o_auditu($_POST['id_audit']);




            echo "<br /><form method=\"POST\" action=\"./index.php?id_audit=" . $_POST['id_audit'] . "\" name=\"akce náhled\">
        <input type=\"hidden\" name=\"sent\" value=\"ano\">

         <fieldset>
        <legend>Připomínkovat audit</legend>
        <label for=\"pripominka\">Připomínka</label><br />
        <textarea name=\"pripominka\" id=\"pripominka\" class=\"formular\" rows=\"20\" cols=\"50\">" . $_POST['pripominka'] . "</textarea><br />
        <input type=\"submit\" class=\"tlacitko\" value=\"odeslat\"/> <a href=\"./index.php\">odejít</a>
        </fieldset>
        </form>";

            $result_pripominky = dibi::query('SELECT * FROM [prevent_audit_pripominky] WHERE [id_audit] = %i', $_POST['id_audit']);
            $row_pripominky = $result_pripominky->fetch();


            echo "<br /><fieldset>
        <legend>Informace o auditu od koordinátora</legend>
        <label for=\"date\">Čas vytvoření připomínky</label><br />
        " . Date("H:i:s d.m.Y", $row_pripominky['date_koordinator_firme']) . "
        <br />
        <label for=\"pripominka\">Informace</label><br />
        <textarea name=\"pripominka\" id=\"pripominka\" class=\"formular\" rows=\"20\" cols=\"50\" readonly>" . $row_pripominky['koordinator_firme'] . "</textarea><br />
        </fieldset>";
        } else {
            echo "<form method=\"POST\" action=\"./index.php?id_audit=" . $_POST['id_audit'] . "\" name=\"pripomínkovat audit\">
		<input type=\"hidden\" name=\"sent\" value=\"true\">
             <fieldset>
                 <legend>Vybrat audit</legend>
		<label for=\"id_audit\">Vyberte audit</label><br />
                <select name=\"id_audit\"id=\"id_audit\" class=\"formular\">";
            $i = 0;
            $resultx = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [ad] = %i', $_SESSION['firma_usr'], 'ORDER BY [nazev] ASC');
            while ($rowx = $resultx->fetch()) {
                echo "kun";
                $resultxx = dibi::query('SELECT * FROM [prevent_audit] WHERE [id_provozovna] = %i', $rowx['id'], 'AND [stav_firma] = %s', "ceka", 'ORDER BY [nazev] ASC');
                while ($rowxx = $resultxx->fetch()) {
                    echo "pes";
                    if (prava_k_auditu($rowxx['id'], $_SESSION['id_usr'])) {
                        echo "<option value=\"" . $rowxx['id'] . "\">" . $rowxx['nazev'] . " - (#ID" . $rowxx['id'] . ") - " . Date("H:i:s d.m.Y", $rowxx['date']) . "</option>";
                        $i++;
                    }
                }
            }
            if ($i < 1) {
                echo "<option value=\"\">Nemáte žádný audit k připomínkování</option>";
            }
            echo "</select><br />
        <input type=\"submit\" class=\"tlacitko\" value=\"vybrat audit\"/>
                </fieldset>
		</form>";
        }

//                $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE  [id] = %i', $_SESSION['id_usr']);
//        $row = $result->fetch();
//        $result2 = dibi::query('SELECT * FROM [prevent_firmy_uzivatele_prava] WHERE [id_uzivatel] = %i', $_SESSION['id_usr']);
//        $row2 = $result2->fetch();
//    echo "<h3>Vítej v Systému Guardian</h3>
//            <h4>Nástěnka</h4>";
//    nastenky_na_index_firma();
//    echo "<h4>Pošta</h4>";
//    posta_na_index_usr();
//    echo "<h4><a name=\"zapisnik\"></a>Zápisník</h4>";
//    zapisnik_nastenka();
//    echo "
//        <h4>Informace klientovi</h4>
//        <p>Naposledy jsi se přihlásil: " . Date("H:i:s d.m.Y", $row['posledni_login_stary']) . "</p>
//	<p>Nástěnka: <a href=\"./nastenka.php\">" . nove_zpravy_v_nastence($row['ad']) . " nové</a></p>
//	<p>Novinky: <a href=\"./novinky.php\">" . nove_novinky() . " nové</a></p>
//	<p>Pošta: <a href=\"./posta.php?id=prijata\">" . nove_zpravy_v_poste() . " nových zpráv </a></p>";
//    if ($row2['prava'] == "admin") {
//
//    } else {
//
//    }
    }
}

function vypis_nastenky_na_index($nastenka) {

    echo "<div class=\"obdelnik\">  ";
    if ($nastenka == 0)
        echo "<h5>Obecná</h5><br />";
    else {
        $result = dibi::query('SELECT * FROM [prevent_firmy] WHERE [id] = %i', $nastenka);
        $row = $result->fetch();
        if ($_SESSION['prava_usr'] != "firma")
            echo"<h5>Klient <em>" . $row['nazev'] . "</em></h5><br />";
    }

    $resultx = dibi::query('SELECT * FROM [prevent_nastenka_shlednuto] WHERE [id_uzivatel] = %i', $_SESSION['id_usr'], 'AND [id_nastenka] = %i', $nastenka);
    $rowx = $resultx->fetch();

    $result = dibi::query('SELECT * FROM [prevent_nastenka] WHERE [typ] = %i', $nastenka, 'AND [id] > %i', $rowx['pozice']);
    $radky = $result->count();

    $limit1 = $_GET['pozice'];
    if ($limit1 == null)
        $limit1 = 0;
    $limit2 = $_SESSION['pocet_prvku_zobrazeni_usr'];
    if ($radky < $limit2)
        $limit2 = $radky;

    $posun_new = $limit1 - $limit2;
    $posun_old = $limit1 + $limit2;


    $hlaskaklimitu1 = $limit1 + 1;
    $hlaskaklimitu2 = $limit1 + $limit2;

    $result = dibi::query('SELECT * FROM [prevent_nastenka] WHERE [typ] = %i', $nastenka, 'AND [id] > %i', $rowx['pozice'], 'ORDER BY [id] DESC LIMIT %i, %i', $limit1, $limit2);
    while ($row = $result->fetch()) {
        $result2 = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $row['ad']);
        $row2 = $result2->fetch();
        echo "<p><strong>" . $row2['jmeno'] . "</strong> (<i>" . Date("H:i d.m.Y", $row['date']) . "</i>)<br />" . nl2br($row['text']) . "</p><div class=\"caradown\"></div>";
    }

    echo "<p><strong>$hlaskaklimitu2</strong> z <strong>$radky</strong> nových zpráv | <a href=\"./nastenka.php?id_nastenky=" . $nastenka . "\"><img src=\"./design/detaily.png\" /> přejít na nástěnku</a></p>";

    echo "</div>";
}

function nastenky_na_index_koordinator() {
    $zasah = 0;
    if (nove_zpravy_v_nastence(0) > 0) {
        $zasah++;
        vypis_nastenky_na_index(0);
    }
    $result = dibi::query('SELECT * FROM [prevent_firmy] ORDER BY [nazev] ASC');
    while ($row = $result->fetch()) {
        if (nove_zpravy_v_nastence($row['id']) > 0) {
            $zasah++;
            vypis_nastenky_na_index($row['id']);
        }
    }
    if ($zasah == 0)
        echo "<p>Žádné nové zprávy na <a href=\"./nastenka.php\"><img src=\"./design/detaily.png\" /> nástěnkách</a>.<p>";
}

function nastenky_na_index_technik() {
    $zasah = 0;
    if (nove_zpravy_v_nastence(0) > 0) {
        $zasah++;
        vypis_nastenky_na_index(0);
    }
    $result = dibi::query('SELECT * FROM [prevent_firmy_technik] WHERE [id_technik] = %i', $_SESSION['id_usr']);
    while ($row = $result->fetch()) {
        if (nove_zpravy_v_nastence($row['id_firma']) > 0) {
            $zasah++;
            vypis_nastenky_na_index($row['id_firma']);
        }
    }
    if ($zasah == 0)
        echo "<p>Žádné nové zprávy na <a href=\"./nastenka.php\"><img src=\"./design/detaily.png\" /> nástěnkách</a>.<p>";
}

function nastenky_na_index_firma() {
    $zasah = 0;
    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE  [id] = %i', $_SESSION['id_usr']);

    while ($row = $result->fetch()) {
        if (nove_zpravy_v_nastence($row['ad']) > 0) {
            $zasah++;
            vypis_nastenky_na_index($row['ad']);
        }
    }
    if ($zasah == 0)
        echo "<p>Žádné nové zprávy na <a href=\"./nastenka.php\"><img src=\"./design/detaily.png\" /> nástěnkách</a>.<p>";
}

function ukoly_na_index_usr() {
    if ($_GET['order_by'] == null)
        $_GET['order_by'] = "id";

    $result = dibi::query('SELECT * FROM [prevent_ukoly] WHERE [ad] = %i', $_SESSION['id_usr'], 'AND ([stav] != %s', "smazan_splnen", ' AND [stav] != %s', "smazan_nesplnen", ' AND [stav] != %s', "splnen", ' AND [stav] != %s)', "nesplnen", 'ORDER BY %by', $_GET['order_by'], 'ASC');
    $soucet = $result->count();

    if ($soucet < 1) {
        echo "<p>Žádné úkoly.</p>";
    } else {
        echo "<table class=\"table\">
	<tr>
	<td><span class=\"subheader\"><a href=\"?order_by=stav\">STAV</a></span></td>
	<td><span class=\"subheader\">AKCE</span></td>
	<td><span class=\"subheader\">ÚKOL</span></td>
	<td><span class=\"subheader\">POPIS</span></td>
	<td><span class=\"subheader\">ODKAZ</span></td>
	<td><span class=\"subheader\"><a href=\"?order_by=deadline\">DEADLINE</a></span></td>
        <td><span class=\"subheader\"><a href=\"?order_by=date\">ZADÁNO</a></span></td>
	<td><span class=\"subheader\"><a href=\"?order_by=zadal_jmeno\">ZADAL</a></span></td>
	</tr>";

        while ($row = $result->fetch()) {
            $soucet++;

            if ($row['deadline'] == "0")
                $deadline_vypis = "nestanoven";
            else
                $deadline_vypis = Date("H:i d.m.Y", $row['deadline']);

            if ($row['stav'] == "nova") {
                $class = "orange";
                $title = "Nový úkol";
                $text = "nový";
                $moznosti = "<a href=\"./ukoly.php?splnen=" . $row['id'] . "\"><img src=\"./design/true.png\" alt=\"splněn\" title=\"splněn\"/></a> <a href=\"./ukoly.php?nesplnen=" . $row['id'] . "\"><img src=\"./design/false.png\" alt=\"nesplním\" title=\"nesplím\"/></a>";
            } elseif ($row['stav'] == "ceka_na_splneni" && $row['deadline'] != 0 && $row['deadline'] < Time()) {
                $class = "red";
                $title = "Proběhl již deadline úkolu";
                $text = "akutní";
                $moznosti = "<a href=\"./ukoly.php?splnen=" . $row['id'] . "\"><img src=\"./design/true.png\" alt=\"splněn\" title=\"splněn\"/></a> <a href=\"./ukoly.php?nesplnen=" . $row['id'] . "\"><img src=\"./design/false.png\" alt=\"nesplním\" title=\"nesplím\"/></a>";
            } elseif ($row['stav'] == "ceka_na_splneni" && $row['deadline'] != 0 && $row['deadline'] > Time()) {
                if ($row['deadline'] - (60 * 60 * 24 * 2) < Time()) {
                    $class = "red";
                    $title = "Ještě neproběhl deadline úkolu, ale zbývá méně než 2 dny!";
                    $text = "akutní - méně než 2 dny!";
                } else {
                    $class = "orange";
                    $title = "Ještě neproběhl deadline úkolu";
                    $text = "čeká";
                }
                $moznosti = "<a href=\"./ukoly.php?splnen=" . $row['id'] . "\"><img src=\"./design/true.png\" alt=\"splněn\" title=\"splněn\"/></a> <a href=\"./ukoly.php?nesplnen=" . $row['id'] . "\"><img src=\"./design/false.png\" alt=\"nesplním\" title=\"nesplím\"/></a>";
            } elseif ($row['stav'] == "ceka_na_splneni" && $row['deadline'] == 0) {
                $class = "orange";
                $title = "Úkol nemá deadline, ale není splňen";
                $text = "čeká";
                $moznosti = "<a href=\"./ukoly.php?splnen=" . $row['id'] . "\"><img src=\"./design/true.png\" alt=\"splněn\" title=\"splněn\"/></a> <a href=\"./ukoly.php?nesplnen=" . $row['id'] . "\"><img src=\"./design/false.png\" alt=\"nesplním\" title=\"nesplím\"/></a>";
            }

            echo "<tr>
		<td class=\"" . $class . "\"><acronym title=\"" . $title . "\">" . $text . "</acronym></td>
		<td>" . $moznosti . "</td>
		<td>" . $row['text'] . "</td>
		<td><a href=\"#tooltip_" . $row['id'] . "\" name=\"tooltip_" . $row['id'] . "\"  id=\"tooltip_" . $row['id'] . "\"><img src=\"./design/detaily.png\" alt=\"podrobně\" title=\"podrobně\"/></a></td>
                    <script type=\"text/javascript\">
                    $(document).ready(function()
                    {
                       $('#tooltip_$row[id]').qtip(
                       {
                          content: {
                            text: '".ereg_replace("[\r|\n]+","<br>",$row[popis])."',
                            title: {
                                text: 'popis úkolu',
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
                          }
                       });
                    });
                    </script>
                    ";
            if ($row['link'] != "")
                echo "<td><a href=\"" . $row['link'] . "\"><img src=\"./design/link.png\" alt=\"přejít na úkol\" title=\"přejít na úkol\"/></a></td>";
            else
                echo "<td>nic</td>";
            echo "
		<td>" . $deadline_vypis . "</td>
                    <td>" . Date("H:i d.m.Y", $row['date']) . "</td>
                <td>" . $row['zadal_jmeno'] . "</td>
		</tr>";
        }
        echo "</table>";
    }
}

function posta_na_index_usr() {
    if (nove_zpravy_v_poste() == 0) {
        echo "<p>Žádná nová <a href=\"./posta.php?id=prijata\"><img src=\"./design/detaily.png\" /> pošta</a>.</p>";
    } else {

        $result = dibi::query('SELECT * FROM [prevent_posta] WHERE ([prijemce_id] = %i', $_SESSION['id_usr'], 'AND [stav_prijemce] = %s)', "nova");
        $radky = $result->count();

        $limit1 = $_GET['pozice'];
        if ($limit1 == null)
            $limit1 = 0;
        $limit2 = $_SESSION['pocet_prvku_zobrazeni_usr'];
        if ($radky < $limit2)
            $limit2 = $radky;

        $posun_new = $limit1 - $limit2;
        $posun_old = $limit1 + $limit2;

        $hlaskaklimitu1 = $limit1 + 1;
        $hlaskaklimitu2 = $limit1 + $limit2;

        $result = dibi::query('SELECT * FROM [prevent_posta] WHERE ([prijemce_id] = %i', $_SESSION['id_usr'], 'AND [stav_prijemce] != %s)', "smazana", 'ORDER BY %by', "id", 'DESC LIMIT %i, %i', $limit1, $limit2);
        while ($row = $result->fetch()) {
            $result2 = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $row['odesilatel_id']);
            $row2 = $result2->fetch();

            echo "<div class=\"obdelnik\"><p>
		<strong>" . $row2['jmeno'] . "</strong>
		(<i>" . Date("H:i d.m.Y", $row['date']) . "</i>) -
		<strong>" . $row['predmet'] . "</strong><br />" . nl2br($row['text']) . "
                </div>";
        }

        echo "<p><strong>$hlaskaklimitu2</strong> z <strong>$radky</strong> nových zpráv | <a href=\"./posta.php?id=prijata\"><img src=\"./design/detaily.png\" /> přejít do pošty</a> </p>";
    }
}

function zapisnik_nastenka() {
    if ($_POST['odeslano_zapisnik']) {
        dibi::query('UPDATE [prevent_zapisnik] SET [text] = %s', $_POST['text_zapisnik'], 'WHERE [ad] = %i', $_SESSION['id_usr'], 'AND [nazev] = %s', "hlavní");
    }

    $result = dibi::query('SELECT * FROM [prevent_zapisnik] WHERE [ad] = %i', $_SESSION['id_usr'], 'AND [nazev] = %s', "hlavní");
    $row = $result->fetch();

    echo "<form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "#zapisnik\">
	<input type=\"hidden\" name=\"odeslano_zapisnik\" value=\"ano\" />
	<fieldset>
	<legend>Zápisník - hlavní</legend>
	<textarea cols=\"50\" rows=\"10\" name=\"text_zapisnik\" id=\"text\" class=\"formular\">" . $row['text'] . "</textarea><br />
	<input class=\"tlacitko\" type=\"submit\" value=\"zapsat\"> <a href=\"./zapisnik.php\"><img src=\"./design/detaily.png\" /> přejít do zápisníku</a>
	</fieldset>
	</form>";
}
?>