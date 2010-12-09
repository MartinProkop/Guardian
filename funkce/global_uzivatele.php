<?php
function init_uzivatele($id) {
//watchdog
    $arr_watchdog = array('id_uzivatel' => $id);
    dibi::query('INSERT INTO [prevent_watchdog]', $arr_watchdog);
//nastenka
    $arr_nastenka = array('id_uzivatel' => $id);
    dibi::query('INSERT INTO [prevent_nastenka_shlednuto]', $arr_nastenka);
//zapisnik
    $arr_zapisnik['ad'] = $id;
    $arr_zapisnik['nazev'] = "hlavní";
    dibi::query('INSERT INTO [prevent_zapisnik]', $arr_zapisnik);

}

function get_jmeno_uzivatele_z_id($id) {
    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [id] = %i', $id);
    $row = $result->fetch();
    return $row['jmeno'];
}

function get_id_uzivatele_z_jmeno($jmeno) {
    $result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE [jmeno] = %i', $jmeno);
    $row = $result->fetch();
    return $row['id'];
}