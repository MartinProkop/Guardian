<?php
hlavicka();

nadpis_horni($SESSION['nadpis_horni_a'], $SESSION['nadpis_horni_b']);

navigace_horni();

search($SESSION['search_readonly']);

menu($SESSION['menu'], $SESSION['active_menu']);

cesta($cesta_nav);

specmenu($SESSION['specmenu_a'], $SESSION['specmenu_b']);

if($SESSION['autorizovana']) login_form();
?>