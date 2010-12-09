<?php
//hlavni require
require ("./funkce/global_require_config.php");

//stav stranky
$SESSION['autorizovana'] = "1";

$SESSION['search_readonly'] = "readonly";

$SESSION['nadpis_horni_a'] = "Administrace";
$SESSION['nadpis_horni_b'] = $_SERVER['REQUEST_URI'];
$SESSION['specmenu_a'] = "Nápověda";
$SESSION['specmenu_b'] = "faq.php?id=o_systemu";

if ($_GET['id'] == "ukoly_uzivatelu")
    $cesta_nav = array("Úkoly uživatelů" => "administrace.php?id=ukoly_uzivatelu");
elseif($_GET['id'] == "logy_uzivatelu")
    $cesta_nav = array("Logy uživatelů" => "administrace.php?id=logy_uzivatelu");

//logika k menu
if(login() && $_SESSION['prava_usr'] == "admin") $SESSION['menu'] = "autorizovan_admin";
elseif(login() && $_SESSION['prava_usr'] == "koordinator") $SESSION['menu'] = "autorizovan_koordinator";
else $SESSION['menu'] = "index";

$SESSION['active_menu'] = $_GET['id'];
//KONEC logika k menu

//dalsi require
require ("./funkce/global_require_page.php");

require ("./page/page_administrace.php");
?>
<SCRIPT language=JavaScript1.1>
<!--
  function check(formular) {
    if (formular.verze.value=="" || formular.verze.value=="číslo verze") {
      alert("Vyplň prosím korektní číslo verze.");
      formular.verze.focus();
      return false;
    }
    if (formular.popis.value=="" || formular.popis.value=="popis verze systému") {
      alert("Vyplň prosím korektní popis verze systému.");
      formular.popis.focus();
      return false;
    }
    return true;
  }
function check_novinky(formular) {
    if (formular.nadpis.value=="" || formular.nadpis.value=="nadpis") {
      alert("Vyplň prosím nadpis novinky.");
      formular.nadpis.focus();
      return false;
    }
    if (formular.text.value=="" || formular.text.value=="text") {
      alert("Vyplň prosím text novinky.");
      formular.text.focus();
      return false;
    }
    return true;
  }
  function check_novy_uzivatel(formular) {
    if (formular.novy_uzivatel_jmeno.value=="" || formular.novy_uzivatel_jmeno.value=="jméno uživatele") {
      alert("Vyplň prosím korektně jméno nového uživatele.");
      formular.novy_uzivatel_jmeno.focus();
      return false;
    }
    return true;
  }
  function check_nova_zaloha(formular) {
    if (formular.popis.value=="" || formular.popis.value=="popis zálohy") {
      alert("Vyplň prosím korektně popis zálohy.");
      formular.popis.focus();
      return false;
    }
    return true;
  }
// -->
</SCRIPT>