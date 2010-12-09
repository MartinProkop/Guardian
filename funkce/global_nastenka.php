<?php

function relace_nastenky($nastenka) {
    if ($nastenka != NULL) {
        $result = dibi::query('SELECT * FROM [prevent_nastenka_shlednuto] WHERE [id_uzivatel] = %i', $_SESSION['id_usr'], 'AND [id_nastenka] = %i', $nastenka);
        if (!$row = $result->fetch()) {
            $arr = array('id_uzivatel' => $_SESSION['id_usr'], 'id_nastenka' => $nastenka, 'pozice' => '0');
            dibi::query('INSERT INTO [prevent_nastenka_shlednuto]', $arr);
            $arr_log = array('text' => 'Uživateli byla zaindexována nástěnka s #ID ' . $nastenka, 'link' => '', 'ad' => $_SESSION['id_usr']);
            vytvor_log($arr_log);
        }
    }
}

function nove_zpravy_v_nastence($id_nastenky) {
    relace_nastenky($id_nastenky);
    $result = dibi::query('SELECT * FROM [prevent_nastenka_shlednuto] WHERE [id_uzivatel] = %i', $_SESSION['id_usr'], 'AND [id_nastenka] = %i', $id_nastenky);
    $row = $result->fetch();
    $result2 = dibi::query('SELECT * FROM [prevent_nastenka] WHERE [id] > %i', $row['pozice'], 'AND [typ] = %i', $id_nastenky);
    $rowzprav2 = $result2->count();
    return $rowzprav2;
}

function nove_zpravy_v_nastence_admin() {
    $novych_zprav = 0;
    $novych_zprav += nove_zpravy_v_nastence(0);
    $result = dibi::query('SELECT * FROM [prevent_firmy] ORDER BY [nazev] ASC');
    while ($row = $result->fetch()) {
        $novych_zprav += nove_zpravy_v_nastence($row['id']);
    }
    return $novych_zprav;
}

function nove_zpravy_v_nastence_koordinator() {
    $novych_zprav = 0;
    $novych_zprav += nove_zpravy_v_nastence(0);
    $result = dibi::query('SELECT * FROM [prevent_firmy] ORDER BY [nazev] ASC');
    while ($row = $result->fetch()) {
        $novych_zprav += nove_zpravy_v_nastence($row['id']);
    }
    return $novych_zprav;
}

function nove_zpravy_v_nastence_technik() {
    $novych_zprav = 0;
    $novych_zprav += nove_zpravy_v_nastence(0);
    $result = dibi::query('SELECT * FROM [prevent_firmy_technik] WHERE [id_technik] = %i', $_SESSION['id_usr']);
    while ($row = $result->fetch()) {
        $novych_zprav += nove_zpravy_v_nastence($row['id_firma']);
    }
    return $novych_zprav;
}

function seznam_nastenek() {
    if ($_SESSION['prava_usr'] == "admin" || $_SESSION['prava_usr'] == "koordinator") {
        echo "<a href=\"./nastenka.php?id_nastenky=0\">Obecná [" . nove_zpravy_v_nastence(0) . " nové]</a> | klienti: ";
        $result = dibi::query('SELECT * FROM [prevent_firmy] ORDER BY [nazev] ASC');
        while ($row = $result->fetch()) {
            echo "<a href=\"./nastenka.php?id_nastenky=" . $row['id'] . "\">" . $row['nazev'] . " [" . nove_zpravy_v_nastence($row['id']) . " nové]</a>, ";
        }
    } elseif ($_SESSION['prava_usr'] == "technik") {
        echo "<a href=\"./nastenka.php?id_nastenky=0\">Obecná</a> [" . nove_zpravy_v_nastence(0) . " nové] | klienti: ";
        $result = dibi::query('SELECT * FROM [prevent_firmy_technik] WHERE [id_technik] = %i', $_SESSION['id_usr']);
        while ($row = $result->fetch()) {
            $result2 = dibi::query('SELECT * FROM [prevent_firmy] WHERE [id] = %i', $row['id_firma']);
            $row2 = $result2->fetch();
            echo "<a href=\"./nastenka.php?id_nastenky=" . $row2['id'] . "\">" . $row2['nazev'] . " [" . nove_zpravy_v_nastence($row2['id']) . " nové]</a> | ";
        }
    }
}
?>