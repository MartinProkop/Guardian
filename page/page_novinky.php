<?php
function vypis_novinek()
{
	$result = dibi::query('SELECT * FROM [prevent_novinky] ORDER BY [date] DESC');
	while($row = $result->fetch())
	{
		echo "<h4>".$row['nadpis']."</h4><p><em>".Date("H:i d.m.Y", $row['date'])."</em></p><p>".NL2BR($row['text'])."</p><div class=\"caradown\"></div>";
	}
	$result = dibi::query('SELECT * FROM [prevent_novinky] ORDER BY [id] DESC LIMIT %i, %i', 0 , 1);
	$row = $result->fetch();
	if(login()) dibi::query('UPDATE [prevent_uzivatele] SET [novinky] = %i', $row['id'], 'WHERE [id] = %i', $_SESSION['id_usr']);
}
?>