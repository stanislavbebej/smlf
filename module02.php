<?
if (!isset($_GET['pagina'])) {
    print("&nbsp;<br>");
    include "c_vitajte.php";
} else {
    print("&nbsp;<br>");
    include "c_" . $_GET['pagina'] . "_" . $_GET['ident'] . ".php";
}
