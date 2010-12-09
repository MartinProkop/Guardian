<?php
function vypis_verzi_systemu()
{
	$result = dibi::query('SELECT * FROM [prevent_system] ORDER BY [date] DESC');
	while($row = $result->fetch())
	{
		echo "<h4>".$row['verze']."</h4><p><em>".Date("H:i d.m.Y", $row['date']).", doba vytváření verze: ".$row['doba']." minut</em></p><p>".NL2BR($row['popis'])."</p><div class=\"caradown\"></div>";
	}
}
?>