<form action="index.php?pagina=smlf&ident=070" method="post">
<?
include "OptimizeNumbers.php";
include "OptimizeBinaryNumbers.php";
include "PocetPoliKM.php";
include "DoQuine.php";
include "Quine.php";
include "Bin_to_bool_function.php";
include "SortArrayBy1s.php";
include "Values2pass.php";
include "ValuesOfFunction.php";
include "DoQuine_silent.php";
include "Quine_silent.php";
include "PassArray.php";

global $all_implicants;

for ($i = 0; $i < $_POST['num_functions']; $i++) {
    $fun_name = chr($i + 97);
    unset($$completed_name);
    print("Množina prostých implikantov pre funkciu f(" . $fun_name . ")<br>\n");
    DoQuine_silent($fun_name);
    print("<br>\n");
    for ($j = 0; $j < sizeof($$completed_name); $j++) {
        $all_implicants[] = ${$completed_name}[$j];
    }
}

unset($$completed_name);
print("Množina prostých implikantov pre funkciu f(" . $_POST['function_name'] . ")<br>\n");
DoQuine_silent($_POST['function_name']);
print("<br>\n");
for ($i = 0; $i < sizeof($$completed_name); $i++) {
    $all_implicants[] = ${$completed_name}[$i];
}

$all_implicants = array_unique($all_implicants);
print("<hr>");
print("Zoznam nájdených jedinečných implikantov, ktoré budú použité pri tvorbe tabuľky pokrytia : \n");
print("(");
for ($i = 0; $i < sizeof($all_implicants); $i++) {
    print($all_implicants[$i]);
    if ($i < (sizeof($all_implicants) - 1)) {
        print(", ");
    } else {
        print(")<br>\n");
    }

}

PassArray($all_implicants, "implikanty");
Values2pass($_POST['num_functions'], PocetPoliKM($_POST['num_variables']));
ValuesOfFunction($_POST['function_name'], PocetPoliKM($_POST['num_variables']));
include "fun_var_number.php";
?>
<input type="image" src="image/next.jpg">
</form>
