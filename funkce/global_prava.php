<?php
function hlaska_prav()
{
	if($_SESSION['prava_usr'] == "admin") return "administrátor";
	elseif($_SESSION['prava_usr'] == "koordinator") return "koordinátor";
	elseif($_SESSION['prava_usr'] == "technik") return "technik";
	elseif($_SESSION['prava_usr'] == "firma") return "zákazník";

}