<?php
function get_watchdog($id, $typ)
{
	$result = dibi::query('SELECT * FROM [prevent_watchdog] WHERE [id_uzivatel] = %i', $id);
	$row = $result->fetch();
	
	if($row[$typ] == "ano") return true;
	else return false;
}
?>