<?php
function nove_novinky()
{
	if(login())
	{
		$result = dibi::query('SELECT * FROM [prevent_uzivatele] WHERE  [id] = %i',$_SESSION['id_usr']);
		$row = $result->fetch();
		$result = dibi::query('SELECT * FROM [prevent_novinky] WHERE  [id] > %i',$row['novinky']);
		$rowzprav = $result->count();
	}
	else
	{
		$result = dibi::query('SELECT * FROM [prevent_novinky]');
		$rowzprav = $result->count();
	}
	return $rowzprav;
}
?>