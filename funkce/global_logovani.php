<?php
function vytvor_log($arr)
{
	$arr['date'] = Time();
	$arr['autor'] = $_SESSION['jmeno_usr'];
	dibi::query('INSERT into [prevent_log]', $arr);
}

function vytvor_log_firmy($arr)
{
	$arr['date'] = Time();
	$arr['autor'] = $_SESSION['jmeno_usr'];
	dibi::query('INSERT into [prevent_firmy_log]', $arr);
}

function vytvor_log_audit($arr)
{
	$arr['date'] = Time();
	$arr['autor'] = $_SESSION['jmeno_usr'];
	dibi::query('INSERT into [prevent_audit_log]', $arr);
}

function vytvor_log_cron($arr)
{
	$arr['date'] = Time();
	if($_SESSION['jmeno_usr'] != null) $arr['autor'] = $_SESSION['jmeno_usr'];
	else $arr['autor'] = "PLÁN";
	dibi::query('INSERT into [prevent_cron_log]', $arr);
}
?>