<?php
function nove_zpravy_v_poste()
{
	$result = dibi::query('SELECT * FROM [prevent_posta] WHERE [prijemce_id] = %i',$_SESSION['id_usr'], 'AND [stav_prijemce] = %s', "nova");
	$row = $result->count();
	return $row;
}
?>
