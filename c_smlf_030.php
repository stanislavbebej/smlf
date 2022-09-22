<form action="index.php?pagina=smlf&ident=040" method="post">
<?
include "Help.php";
include "OptimizeNumbers.php";
include "PocetPoliKM.php";
include "FillTable.php";
include "CreateTable.php";
include "CreatePreview.php";
include "Values2pass.php";

CreatePreview("FillTable_values.php");
?>
<br>
<?
Values2pass($_POST['num_functions'], PocetPoliKM($_POST['num_variables']));
include "fun_var_number.php";
?>
<input type="image" src="image/ok.jpg">
</form>
