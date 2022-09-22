<form action="index.php?pagina=smlf&ident=030" method="post">
<?
include "Help.php";
include "OptimizeNumbers.php";
include "FillTable.php";
include "CreateTable.php";
include "CreateTableAttributes.php"; //vyhodnocuje premenne $table_properties[0], $table_properties[1], $field_identification

for ($i = 0; $i < sizeof($field_identification); $i++) { //optimalizacia cisel z formatu napr. 1 do 01. Cisla sa nacitavaju z pola $field_identification a po prejdeni funkciou OptimizeNumbers sa don naspat ulozia {
    $field_identification[$i] = OptimizeNumbers($field_identification[$i]);
}

CreateTable($_POST['num_functions'], $table_properties[0], $table_properties[1], $field_identification, "FillTable_selects.php");
?>
<?
include "fun_var_number.php";
?>
<input type="image" src="image/ok.jpg">
</form>
