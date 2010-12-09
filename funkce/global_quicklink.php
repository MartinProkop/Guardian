<?php
function menu_quicklink()
{
	$result = dibi::query('SELECT * FROM [prevent_quicklink] WHERE [ad] = %i', $_SESSION['id_usr'], 'ORDER BY [pozice] ASC');
	if($result->count())
	{
		echo "<div class=\"inactive\">
		<h5>QuickLink</h5>
		<ul>";
		while($row = $result->fetch())
		{
			echo "<li><a href=\"".$row['link']."\">".$row['text']."</a></li>";
		}
		echo "</ul>
		</div>";
	}
}