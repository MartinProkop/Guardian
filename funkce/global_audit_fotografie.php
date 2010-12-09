<?php
function echo_fotografie($id_audit ,$objekt, $id_objekt, $pridavat) {
    if($_GET['smazat_fotku']) {
        $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $id_audit);
        $row = $result->fetch();

        $result2 = dibi::query('SELECT * FROM [prevent_audit_fotografie] WHERE [id] = %i', $_GET['smazat_fotku']);
        $row2 = $result2->fetch();

        if($objekt == "checklist") $hlaska = "checklist";
        elseif($objekt == "pracoviste") $hlaska = "pracoviště";

        $arr_log = array('text'  => 'Upraven audit - '.$hlaska.' - smazána fotka' , 'id_audit' => $id_audit, 'id_provozovna' => $row['id_provozovna']);
        vytvor_log_audit($arr_log);

        dibi::query('DELETE FROM [prevent_audit_fotografie] WHERE [id] = %i', $_GET[smazat_fotku]);
        unLink ("./audit_data/".$id_audit."/fotografie/".$row2['cesta']);
        $_GET['smazat_fotku'] = null;
    }

    if($objekt == "checklist") {
        if($pridavat) {
            echo "fotografie (<a href=\"./nahrat_soubor.php?typ=fotografie_checklist&id_audit=".$id_audit."&objekt=".$objekt."&id_objekt=".$id_objekt."\" target=\"_blank\">přidat</a>): ";
        }
        else {
            echo "fotografie: ";
        }

    }
    elseif($objekt == "pracoviste") {
        if($pridavat) {
            echo "fotografie (<a href=\"./nahrat_soubor.php?typ=fotografie_pracoviste&id_audit=".$id_audit."&objekt=".$objekt."&id_objekt=".$id_objekt."\" target=\"_blank\">přidat</a>): ";
        }
        else {
            echo "fotografie: ";
        }
    }
    $result = dibi::query('SELECT * FROM [prevent_audit_fotografie] WHERE [id_audit] = %i', $id_audit, 'AND [objekt] = %s', $objekt, 'AND [id_objekt] = %i', $id_objekt);
    while($row = $result->fetch()) {
        if($pridavat) {
            echo "<a href=\"./audit_data/".$id_audit."/fotografie/".$row['cesta']."\" title=\"".$row['nazev']." - ".$row['komentar']." - ".Date("H:i:s d.m.Y",$row['date'])."\" rel=\"lytebox[".$id_audit."]\">".$row['nazev']."</a> (<a href=\"".$_SERVER['REQUEST_URI']."&smazat_fotku=".$row['id']."\" onclick=\"if(confirm('Skutečně smazat fotku?')) location.href='.$_SERVER[REQUEST_URI].'&smazat_fotku='.$row[id].'; return(false);\">smazat</a>), ";
        }
        else {
            echo "<a href=\"./audit_data/".$id_audit."/fotografie/".$row['cesta']."\" title=\"".$row['nazev']." - ".$row['komentar']." - ".Date("H:i:s d.m.Y",$row['date'])."\" rel=\"lytebox[".$id_audit."]\">".$row['nazev']."</a>, ";
        }

    }

}
function pridat_fotografii($id_audit ,$objekt, $id_objekt) {


}





?>