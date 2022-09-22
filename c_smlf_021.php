<form action="index.php?pagina=smlf&ident=031" method="post">
<?
include "Help.php";
include "FillTable.php";
include "CreateTable.php";
include "CreateInputLines.php";
include "CreateTableAttributes.php"; //vyhodnocuje premenne $table_properties[0], $table_properties[1], $field_identification

print("Vzor karnaughovej mapy pre " . $_POST['num_variables'] . " premenné\n<br>(číslovanie jednotlivých buniek) : \n<br>\n");

CreateTable("1", $table_properties[0], $table_properties[1], $field_identification, "FillTable_numbers.php");
CreateInputLines($_POST['num_functions']);
?>
<br>
<?
include "fun_var_number.php";
?>
<input type="image" src="image/ok.jpg">
</form>
