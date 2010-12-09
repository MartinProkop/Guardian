<?php

function novy_ukol($arr) {
    $arr['date'] = Time();
    dibi::query('INSERT into [prevent_ukoly]', $arr);

    //mailuju
    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE id = %i', $arr['ad']);
    $row = $result->fetch();
    if (get_watchdog($arr['ad'], "ukoly"))
        odesli_mail($row['mail'],
                "Watchdog Systému Guardian: Nový úkol",
                "Dobrý den,\r\nprávě Vám byl v Systému Guardian zadán nový úkol.\r\n\r\nText úkolu: " . $arr['text'] . "\r\n\r\nPro bližší informace se přihlašte do Guardian.\r\n\r\nHezký den.",
                "watchdog");
}

function zprava_o_ukolech() {
    $pocet_new = 0;
    $pocet_chvata = 0;
    $pocet_cekaji = 0;
    $pocet_splnene = 0;
    $pocet_odmitnute = 0;

    $result = dibi::query('SELECT * FROM [prevent_ukoly] WHERE ad = %i', $_SESSION['id_usr']);
    while ($row = $result->fetch()) {
        if ($row['stav'] == "nova")
            $pocet_new += 1;
        elseif ($row['stav'] == "ceka_na_splneni" && $row['deadline'] != 0 && $row['deadline'] < Time())
            $pocet_chvata += 1;
        elseif ($row['stav'] == "ceka_na_splneni")
            if($row['deadline'] - (60 * 60 * 24 * 2) < Time() && $row['deadline'] != 0) $pocet_chvata += 1;
            else $pocet_cekaji += 1;
        elseif ($row['stav'] == "splnen")
            $pocet_splnene += 1;
        elseif ($row['stav'] == "nesplnen")
            $pocet_odmitnute += 1;
    }
    return "[$pocet_new/$pocet_chvata/$pocet_cekaji/$pocet_splnene/$pocet_odmitnute]";
}

?>