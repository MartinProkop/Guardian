<?php

require ("../Debug.php");
//Debug::enable();
//error_reporting(E_ALL ^ E_NOTICE);
require ("../dibi/dibi.php");
require ("../../config/db.php");

if (!is_numeric($_GET['graph'])) {
    echo "<img src=\"graf_checklist.php?graph=1&audit=" . $_GET['audit'] . "\" alt=\"graph\" />";
} else {
    include 'lib/graph.php';
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $_GET['audit']);
    $row = $result->fetch();

    $i = 0;
    $result_check_kategorie = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie] WHERE [id_audit] = %i', $_GET['audit']);
    while ($row_check_kategorie = $result_check_kategorie->fetch()) {
        $result_check_kategorie_schema = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [id] = %i', $row_check_kategorie['id_kat']);
        $row_check_kategorie_schema = $result_check_kategorie_schema->fetch();

        $zpr = false;
        $pocet_vsech = 0;
        $procenta_castecne = 0;
        $pocet_ano = 0;

        $result_check_2 = dibi::query('SELECT * FROM [prevent_audit_checklist_schema] WHERE [id_kat] = %i', $row_check_kategorie_schema['id'], ' AND [verze] = %i', $row['verze'], 'ORDER BY [cislo] ASC');
        while ($row_check_2 = $result_check_2->fetch()) {
            $result_check_3 = dibi::query('SELECT * FROM [prevent_audit_checklist] WHERE [id_audit] = %i', $_GET['audit'], 'AND [id_otazka] = %i', $row_check_2['id']);
            $row_check_3 = $result_check_3->fetch();

            if ($row_check_kategorie['stav'] == "zpracovano") {
                $pocet_vsech++;
                $zpr = true;
                if ($row_check_3['odpoved'] == "ano") {
                    $pocet_ano++;
                } elseif ($row_check_3['odpoved'] == "castecne") {
                    $procenta_castecne += $row_check_3['castecne'];
                }
            }
        }
        if ($zpr) {
            $arr_nazvy_sloupce[$i] = $row_check_kategorie_schema['cislo'];
            $arr_cisla_sloupce[$i] = round(($procenta_castecne + ($pocet_ano * 100)) / $pocet_vsech, 2);
            $i++;
        }
    }

    $new = new graph('column', 600, 400, '#c0c0c0', '8x13iso.gdf');
    $new->border('black', 1);
    $new->set_values($arr_cisla_sloupce, 0, 'blue');
    $new->paint_lines('black', 'lines', 'lines');
    $new->paint_axes('black', 'okruhy otazek', 'procent', true);
    $new->points_on_axes('black', $arr_nazvy_sloupce);
    $new->plot();
}
?>

