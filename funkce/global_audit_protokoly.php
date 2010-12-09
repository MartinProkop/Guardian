<?php

function echo_protokol_k_auditu($id_audit) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id_audit);
    $row = $result->fetch();

    $result2 = dibi::query('SELECT * FROM [prevent_audit_protokoly] WHERE [id_audit] = %i', $id_audit);
    $row2 = $result2->fetch();


    if ($row2['stav_celek'] == "zpracovano") {
        $odesli_celek = "<label for=\"send\">Protokol je uzavřen, nelze jej měnit</label>";
        $uzavren_celek = "checked";
        $disabled_celek = "disabled";
    }

    $result_pobocka = dibi::query('SELECT * FROM [prevent_firmy_provozovny] WHERE [id] = %i', $row['id_provozovna']);
    $row_pobocka = $result_pobocka->fetch();


    if($row2['misto'] == "") $row2['misto'] = $row_pobocka['nazev']."\n".$row_pobocka['adresa'];
    if($row2['auditor'] == "") $row2['auditor'] = get_jmeno_uzivatele_z_id($row['id_technik']);
    if($row2['ucastnici'] == "") $row2['ucastnici'] = get_jmeno_uzivatele_z_id($row['id_firemni_uzivatel']);

    echo "<form method=\"POST\" action=\"" . $_SERVER['REQUEST_URI'] . "\" name=\"protokol\" id=\"protokol\">
		<input type=\"hidden\" name=\"sent\" value=\"true\">";
    echo "
    <fieldset>
    <legend>Komentář</legend>
		<label for=\"misto\">Místo auditu</label><br />
                <textarea name=\"misto\" id=\"misto\" class=\"formular\" rows=\"10\" cols=\"50\" $disabled_celek>" . $row2['misto'] . "</textarea><br />
		<label for=\"cas\">Čas auditu</label><br />" .
    Date("H:i:s d.m.Y", time()) . "<br />
		<label for=\"auditor\">Jméno auditora popř. složení auditorského týmu</label><br />
                <textarea name=\"auditor\" id=\"auditor\" class=\"formular\" rows=\"10\" cols=\"50\" $disabled_celek>" . $row2['auditor'] . "</textarea><br />
		<label for=\"ucastnici\">Účastníci za klienta</label><br />
                <textarea name=\"ucastnici\" id=\"ucastnici\" class=\"formular\" rows=\"10\" cols=\"50\" $disabled_celek>" . $row2['ucastnici'] . "</textarea><br />
		<label for=\"popis\">Popis průběhu auditu</label><br />
                <textarea name=\"popis\" id=\"popis\" class=\"formular\" rows=\"10\" cols=\"50\" $disabled_celek>" . $row2['popis'] . "</textarea><br />
		<label for=\"zhodnoceni\">stručné slovní zhodnocení auditu s upozorněním na nejdůležitější neshody a doporučení dalšího postupu</label><br />
                <textarea name=\"zhodnoceni\" id=\"zhodnoceni\" class=\"formular\" rows=\"10\" cols=\"50\" $disabled_celek>" . $row2['zhodnoceni'] . "</textarea><br />
                <label for=\"uzavrit_celek\">Uzavřít audit! Audit bude označen za provedený a předán koordinátorovi k připomínkování. Již ho dále nebudete moct editovat.</label><br />
                <input type=\"checkbox\" id=\"uzavrit_celek\" class=\"formular\" name=\"uzavrit_celek\" value=\"ano\" " . $uzavren_celek . " $disabled_celek><br />
                <input type=\"submit\" class=\"tlacitko\" value=\"uložit\" />
                </fieldset>
		</form>
           <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#protokol').validate({
             rules: {
               misto: {
                 required: true
               },
               auditor: {
                 required: true
               },
               ucastnici: {
                 required: true
               },
               popis: {
                 required: true
               },
               zhodnoceni: {
                 required: true
               }

               }
             });
           });
           </script>
            ";
}

function provest_protokol($id_audit) {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id_audit);
    $row = $result->fetch();

    $arr_log = array('text' => 'Audit (#ID '.$id_audit.') byl komentován a uzavřen - je předán koordinátorovi k připomínkování.', 'id_audit' => $id_audit, 'id_provozovna' => $row['id_provozovna']);
    vytvor_log_audit($arr_log);

    if ($_POST['uzavrit_celek'] == "ano")
        $stav_celek = "zpracovano";
    else
        $stav_celek = "nezpracovano";

    $arr = array('misto' => $_POST['misto'], 'auditor' => $_POST['auditor'],
        'ucastnici' => $_POST['ucastnici'], 'popis' => $_POST['popis'],
        'zhodnoceni' => $_POST['zhodnoceni'], 'stav_celek' => $stav_celek,
        'date' => Time());
    dibi::query('UPDATE [prevent_audit_protokoly] SET', $arr, 'WHERE [id_audit] = %i', $id_audit);

    if ($_POST['uzavrit_celek'] == "ano")
        dibi::query('UPDATE [prevent_audit] SET [stav_technik] = %s', "provedl", ', [date] = %i', time(), 'WHERE [id] = %i', $id_audit);

    $arr_ukol = array('deadline' => '', 'text' => 'Technik ' . get_jmeno_uzivatele_z_id($row['id_technik']) . ' provedl Vámi zadaný audit (ID#' . $id_audit . ')', 'popis' => "Audit je nyní možné připomínkovat.", 'link' => "./nahled_audit.php?id=vybrat_oblast&id_audit=" . $id_audit, 'ad' => $row['id_koordinator'], 'zadal_jmeno' => "systém");
    novy_ukol($arr_ukol);
}
?>
