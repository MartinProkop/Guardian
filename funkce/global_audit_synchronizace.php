<?php
function pocet_auditu_na_localu_koordinator() {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [synchronizace] = %s', "local");
    return $result->count();
}

function pocet_auditu_na_localu_technik() {
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [synchronizace] = %s', "local", 'AND [id_technik] = %i', $_SESSION['id_usr']);
    return $result->count();
}

?>
