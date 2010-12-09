<?php
function odesli_mail($to, $subject, $text, $kdo)
{
	if(!mail($to, $subject, $text, 'From: ' .$kdo. '@guardian.cz' . "\r\n" . 'Reply-To: ' .$kdo. '@guardian.cz' . "\r\n" . 'X-Mailer: PHP/' . phpversion(). "\r\n" . "Content-Type: text/html; charset=UTF-8\r\n")) echo "<p>Prosím nahlašte správci systému chybu odesílání emailů!</p>";
}

?>
