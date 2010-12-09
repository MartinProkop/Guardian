<?php
//hlavni require
require ("./funkce/global_require_config.php");

//stav stranky
$SESSION['autorizovana'] = "1";

$SESSION['search_readonly'] = "readonly";

$SESSION['nadpis_horni_a'] = "Nástěnka";
$SESSION['nadpis_horni_b'] = $_SERVER['REQUEST_URI'];
$SESSION['specmenu_a'] = "Nápověda";
$SESSION['specmenu_b'] = "faq.php?id=o_systemu";


if ($_GET['id_nastenky'] == 0 || !$_GET['id_nastenky'])
    $cesta_nav = array("Nástěnka" => "nastenka.php", "Obecná" => "nastenka.php?id_nastenky=0");
else
    $cesta_nav = array("Nástěnka" => "nastenka.php", get_nazev_firmy($_GET['id_nastenky']) => "nastenka.php?id_nastenky=" . $_GET['id_nastenky']);

//logika k menu
if (login ())
    $SESSION['menu'] = "autorizovan";
else
    $SESSION['menu'] = "index";

$SESSION['active_menu'] = "nastenka";
//KONEC logika k menu
//dalsi require
require ("./funkce/global_require_page.php");

require ("./page/page_nastenka.php");
?>
<SCRIPT language=JavaScript1.1>
    <!--
    function check(formular) {
    if (formular.text.value=="" || formular.text.value=="Text záznamu") {
    alert("Vyplň prosím text zprávy.");
    formular.text.focus();
    return false;
    }

    return true;
    }
    // -->
</script>