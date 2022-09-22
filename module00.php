<?
$color00 = "darkblue";
?>

<DIV id="HEADER">
	<div align="justify">
		<?
print("<font color=\"$color00\">");

if (!isset($_GET['pagina'])) {
    include "h_vitajte.php";
} else {
    include "h_" . $_GET['pagina'] . "_" . $_GET['ident'] . ".php";
}

print("</font>");
?>
	</div>
</DIV>
