<?php
function get_nazev_checklist_z_verze($id) {
    $result = dibi::query('SELECT * FROM [prevent_audit_verze] WHERE [id] = %i', $id);
    $row = $result->fetch();
    return $row['nazev'];
}

function get_nazev_otazka_z_id($id) {
    $result = dibi::query('SELECT * FROM [prevent_audit_checklist_schema] WHERE [id] = %i', $id);
    $row = $result->fetch();
    return $row['text'];
}

function get_nazev_okruh_z_id($id) {
    $result = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [id] = %i', $id);
    $row = $result->fetch();
    return $row['kat_jmeno'];
}

function get_typ_checklist_z_verze($id) {
    $result = dibi::query('SELECT * FROM [prevent_audit_verze] WHERE [id] = %i', $id);
    $row = $result->fetch();
    return $row['typ'];
}

function get_info_verze($id) {
    $result = dibi::query('SELECT * FROM [prevent_audit_verze] WHERE [id] = %i', $id);
    $row = $result->fetch();
    return $row['nazev']." - ".Date("d.m.Y", $row['date']);
}

function get_id_nejnovejsi_verze($typ)
{
    $result = dibi::query('SELECT * FROM [prevent_audit_verze] WHERE [typ] = %s', $typ, 'ORDER BY [date] DESC LIMIT 0,1');
    $row = $result->fetch();
    return $row['id'];
}

function pocet_schemat_podle_typu($typ) {
    $result = dibi::query('SELECT * FROM [prevent_audit_verze] WHERE [typ] = %s', $typ);
    return $result->count();
}

function pocet_okruhu_ve_verzi($verze) {
    $result = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [verze] = %i', $verze);
    return $result->count();
}

function pocet_otazek_ve_verzi($verze) {
    $result = dibi::query('SELECT * FROM [prevent_audit_checklist_schema] WHERE [verze] = %i', $verze);
    return $result->count();
}

function pocet_otazek_v_okruhu($verze, $okruh) {
    $result = dibi::query('SELECT * FROM [prevent_audit_checklist_schema] WHERE [verze] = %i', $verze, 'AND [id_kat] = %i', $okruh);
    return $result->count();
}

function checklist_nahled($verze) {

    $result_check_1 = dibi::query('SELECT * FROM [prevent_audit_checklist_kategorie_schema] WHERE [verze] = %i', $verze, ' ORDER BY [cislo] ASC');
    while ($row_check_1 = $result_check_1->fetch()) {
        echo "<ul>
            <li>" . $row_check_1['cislo'] . ". " . $row_check_1[kat_jmeno] . "</li>";
        echo "<table class=\"table\">";
        echo "<tr>
        <td><span class=\"subheader\">" . $row_check_1['cislo'] . ". " . $row_check_1[kat_jmeno] . "</td>

        <td><span class=\"subheader\">závažnost</span></td>
        <td><span class=\"subheader\">navrhované opatření</span></td>
        </tr>";
        $result_check_2 = dibi::query('SELECT * FROM [prevent_audit_checklist_schema] WHERE [verze] = %i', $verze, 'AND [id_kat] = %i', $row_check_1['id'], ' ORDER BY [cislo] ASC');
        while ($row_check_2 = $result_check_2->fetch()) {
            echo "<tr>
            <td><span class=\"subheader\">" . $row_check_2['cislo'] . ". " . $row_check_2['text'] . " </span></td>
            <td>" . $row_check_2['zavaznost'] . "</td>
            <td>" . $row_check_2['navrhovane_opatreni'] . "</td>";

            echo "</tr>";
        }

        echo "</table></ul>";
    }
    echo "<p>Zpět na <a href=\"./nastaveni_auditu.php?id=enter&typ=" . $_GET['typ'] . "&verze=" . $_GET['verze'] . "\">seznam akcí</a> s checklistem.</p>";
}

?>
