<form action="index.php?pagina=smlf&ident=060" method="post">
<?
include "OptimizeNumbers.php";
include "OptimizeBinaryNumbers.php";
include "PocetPoliKM.php";
include "CreateTableAttributes.php";
include "GenerateTable.php";
include "MultiplyFunctions.php";
include "DoQuine.php";
include "Quine.php";
include "Bin_to_bool_function.php";
include "SortArrayBy1s.php";
include "Values2pass.php";
include "ValuesOfFunction.php";

for ($m = 0; $m < ($_POST['num_functions'] - 1); $m++) {
    $first = chr($m + 97);
    for ($n = $m + 1; $n < $_POST['num_functions']; $n++) {
        $second = chr($n + 97);
        MultiplyFunctions($first, $second, PocetPoliKM($_POST['num_variables']));

        $text = "súčin funkcií <b>" . $first . "</b> a <b>" . $second . "</b> : \n";
        $text1 = "funkciu <b>" . $first . "</b> : <br>\n";
        $text2 = "funkciu <b>" . $second . "</b> : <br>\n";

        GenerateTable($table_properties[0], $table_properties[1], $text1, $first, $field_identification);
        print("<center><b>*</b></center>\n");
        GenerateTable($table_properties[0], $table_properties[1], $text2, $second, $field_identification);
        print("<center><b>=</b></center>\n");
        GenerateTable($table_properties[0], $table_properties[1], $text, $new_fun_name, $field_identification);
    }
}
?>
<br>
<?
Values2pass($_POST['num_functions'], PocetPoliKM($_POST['num_variables'])); //tu to funguje len pre dvojicu funkcii, pretoze by sa mali prenasat vsetky suciny funkcii, tu sa prenesie len jeden
ValuesOfFunction($new_fun_name, PocetPoliKM($_POST['num_variables']));
include "fun_var_number.php";
?>
<div align="center">
	<input type="image" src="image/ok.jpg">
</div>
</form>
