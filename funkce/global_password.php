<?php
function Random_Password($length)
{
	srand((double)microtime()*1000000);
	$possible_charactors = "abcdefghijklmnopqrstuvwxyz123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$string="";
	while(strlen($string)<$length)
	{
		$string .= substr($possible_charactors, rand()%(strlen($possible_charactors)),1);
	}
	return ($string);
}
?>
