<?php

function nova_osoba($id_objekt, $objekt, $jmeno, $typ) {
    if ($objekt == "firma") {
        $id_firmy_do_logu = $id_objekt;
    } else {
        $id_firmy_do_logu = $_GET['id_firmy'];
        if ($id_firmy_do_logu == null)
            $id_firmy_do_logu = $_GET['id_firma'];
    }

    $result = dibi::query('SELECT * FROM [prevent_firmy_osoba] WHERE [jmeno] = %s', $jmeno, 'AND [id_firma] = %i', $id_firmy_do_logu);
    if ($row = $result->fetch()) {
        $arr = array('id_osoba' => $row['id'], 'id_objekt' => $id_objekt, 'objekt' => $objekt, 'typ' => $typ);
        dibi::query('INSERT INTO [prevent_firmy_osoba_relace]', $arr);
    } else {
        $arr = array('jmeno' => $jmeno, 'id_firma' => $id_firmy_do_logu);
        dibi::query('INSERT INTO [prevent_firmy_osoba]', $arr);

        $result = dibi::query('SELECT * FROM [prevent_firmy_osoba] WHERE [jmeno] = %s', $jmeno, 'AND [id_firma] = %s', $id_firmy_do_logu);
        $row = $result->fetch();

        $arr = array('id_osoba' => $row['id'], 'id_objekt' => $id_objekt, 'objekt' => $objekt, 'typ' => $typ);
        dibi::query('INSERT INTO [prevent_firmy_osoba_relace]', $arr);

        $arr_log = array('text' => 'Vytvořena osoba jménem ' . $jmeno, 'link' => '', 'ad' => $id_firmy_do_logu);
        vytvor_log_firmy($arr_log);
    }
}

function echo_name_osoba($id_objekt, $objekt, $typ, $akce) {
    echo "<span class=\"link_osoba\">";
    $result = dibi::query('SELECT * FROM [prevent_firmy_osoba_relace] WHERE [id_objekt] = %i', $id_objekt, 'AND [typ] = %s', $typ, 'AND [objekt] = %s', $objekt);
    if ($result->count()) {
        while ($row = $result->fetch()) {
            $result2 = dibi::query('SELECT * FROM [prevent_firmy_osoba] WHERE [id] = %i', $row['id_osoba']);
            while ($row2 = $result2->fetch()) {
                if ($akce == "admin") {
                    echo "<a href=\"./osoba.php?id=detaily&id_osoba=" . $row2['id'] . "\"><img src=\"./design/detaily.png\" alt=\"detaily\" title=\"detaily\"/> " . $row2['jmeno'] . "</a> (<a href=\"./osoba.php?id=upravit&id_osoba=" . $row2['id'] . "\"><img src=\"./design/edit.png\" alt=\"upravit\" title=\"upravit\"></a> <a href=\"./osoba.php?id=smazat&id_osoba=" . $row2['id'] . "\" onclick=\"if(confirm('Skutečně smazat osobu?')) location.href='./osoba.php?id=smazat&id_osoba=" . $row2['id'] . "'; return(false);\"><img src=\"./design/kos.png\" alt=\"smazat\" title=\"smazat\"></a>) ";
                } else {
                    echo "<a href=\"./osoba.php?id=detaily&id_osoba=" . $row2['id'] . "\"><img src=\"./design/detaily.png\" alt=\"detaily\" title=\"detaily\"/>" . $row2['jmeno'] . "</a>";
                }
            }
        }
    } else {
        if ($akce == "admin") {
            echo "<a href=\"./osoba.php?id=nova&typ=" . $typ . "&objekt=" . $objekt . "&id_objekt=" . $id_objekt . "&id_firma=" . $_GET['id_firmy'] . "\">přidat osobu</a>";
        }
    }
    echo "</span>";
}

function get_id_firma_z_id_osoba($id) {
    $result = dibi::query('SELECT * FROM [prevent_firmy_osoba] WHERE [id] = %i', $id);
    $row = $result->fetch();
    return $row['id_firma'];
}

function get_id_provozovna_z_id_osoba($id) {
    $result = dibi::query('SELECT * FROM [prevent_firmy_osoba_relace] WHERE [id_osoba] = %i', $id);
    $row = $result->fetch();
    return $row['id_objekt'];
}

function get_osoba_relace_firma_z_id_osoba($id) {
    $result = dibi::query('SELECT * FROM [prevent_firmy_osoba_relace] WHERE [id_osoba] = %i', $id);
    $row = $result->fetch();
    if ($row['objekt'] == "firma")
        return true;
    else
        return false;
}

function get_jmeno_osoba_z_id($id) {
    $result = dibi::query('SELECT * FROM [prevent_firmy_osoba] WHERE [id] = %i', $id);
    $row = $result->fetch();
    return $row['jmeno'];
}
?>