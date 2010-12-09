<?php
//hlavni require
require ("./funkce/global_require_config.php");

//stav stranky
$SESSION['autorizovana'] = "0";

$SESSION['search_readonly'] = "readonly";

$SESSION['nadpis_horni_a'] = "Přihlášení";
$SESSION['nadpis_horni_b'] = $_SERVER['REQUEST_URI'];
$SESSION['specmenu_a'] = "Nápověda";
$SESSION['specmenu_b'] = "faq.php?id=o_systemu";

if($_GET['id'] == "zapomenute_heslo")
{
$cesta_nav = array("Zapomenuté heslo" => "autorizace.php?id=zapomenute_heslo");
}
elseif($_GET['id'] == "autorizace")
{
$cesta_nav = array("Autorizace do systému" => "autorizace.php?id=autorizace");
}
elseif($_GET['id'] == "odblokovat")
{
$cesta_nav = array("Žádost o odblokování" => "autorizace.php?id=odblokovat");
}

//logika k menu
$SESSION['menu'] = "index";


$SESSION['active_menu'] = $_GET['id'];
//KONEC logika k menu

//dalsi require
require ("./funkce/global_require_page.php");

require ("./page/page_autorizace.php");
?>
<SCRIPT language=JavaScript1.1>
<!--
  function check(formular) {
    if (formular.jmeno.value=="" || formular.jmeno.value=="jméno uživatele") {
      alert("Vypln prosím své jméno.");
      formular.jmeno.focus();
      return false;
    }
    if (formular.kontrolni_kod.value=="" || formular.kontrolni_kod.value=="kontrolní kód") {
      alert("Vyplň prosím kontrolní kód.");
      formular.kontrolni_kod.focus();
      return false;
    }
    if (formular.heslo.value=="" || formular.heslo.value=="heslo") {
      alert("Vyplň prosím heslo.");
      formular.heslo.focus();
      return false;
    }
    return true;
  }
  function check_zap_heslo(formular) {
    if (formular.jmeno.value=="" || formular.jmeno.value=="jméno uživatele" || formular.jmeno.value=="admin") {
      alert("Vyplň prosím jméno.");
      formular.jmeno.focus();
      return false;
    }
    return true;
  }
// -->
</SCRIPT>