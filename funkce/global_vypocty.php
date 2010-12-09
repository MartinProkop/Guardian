<?php
function sec_to_time($sec)
{
	$sec_out = $sec % 60;
	$min = ($sec - $sec_out) / 60;
	
	$min_out = $min % 60;
	$hod = ($min - $min_out) / 60;

	$hod_out = $hod % 24;	
	$den_out = ($hod  - $hod_out) / 24;

	return $den_out."d ".$hod_out."h ".$min_out."m ".$sec_out."s";
}

?>