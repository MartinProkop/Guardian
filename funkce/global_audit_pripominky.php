<?php
function nahled_pripominek_od_koordinatora()
{
    $result = dibi::query('SELECT * FROM [prevent_audit] WHERE [id] = %i', $_GET['id_audit']);
    $row = $result->fetch();

    $result_pripominky = dibi::query('SELECT * FROM [prevent_audit_pripominky] WHERE [id_audit] = %i', $_GET['id_audit']);
    $row_pripominky = $result_pripominky->fetch();

    if($row_pripominky['koordinator_technikovi'] != null)
    {
        echo "<br /><fieldset>
        <legend>Připomínky k auditu od koordinátora</legend>
        <label for=\"date\">Čas vytvoření připomínky</label><br />
        ".Date("H:i:s d.m.Y", $row_pripominky['date_koordinator_technikovi'])."
        <br />
        <label for=\"pripominka\">Připomínka</label><br />
        <textarea name=\"pripominka\" id=\"pripominka\" class=\"formular\" rows=\"20\" cols=\"50\" readonly>".$row_pripominky['koordinator_technikovi']."</textarea><br />
        </fieldset>";
    }
        if($row_pripominky['firma_koordinatorovi'] != null)
    {
        echo "<br /><fieldset>
        <legend>Připomínky k auditu od klienta</legend>
        <label for=\"date\">Čas vytvoření připomínky</label><br />
        ".Date("H:i:s d.m.Y", $row_pripominky['date_firma_koordinatorovi'])."
        <br />
        <label for=\"pripominka\">Připomínka</label><br />
        <textarea name=\"pripominka\" id=\"pripominka\" class=\"formular\" rows=\"20\" cols=\"50\" readonly>".$row_pripominky['firma_koordinatorovi']."</textarea><br />
        </fieldset>";
    }
}

?>
