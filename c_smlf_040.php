<?
if (!isset($_POST['function_id'])) {
    $function_id = 0;
    $function_id_new = $function_id + 1;
} else {
    $function_id_new = $function_id + 1;
}

if (($_POST['function_id'] + 1) == $_POST['num_functions']) {
    $end = 1;
} else {
    $end = 0;
}

if ($end == 1) {
    print("<form action=\"index.php?pagina=smlf&ident=050\" method=\"post\">");
} else {
    print("<form action=\"index.php?pagina=smlf&ident=040\" method=\"post\">");
}

?>
<!-- <form action="index.php?pagina=smlf&ident=050" method="post"> -->
<!-- <center> -->
<?
include "PocetPoliKM.php";
include "OptimizeNumbers.php";
include "OptimizeBinaryNumbers.php";
include "DoQuine.php";
include "Quine.php";
include "SortArrayBy1s.php";
include "Bin_to_bool_function.php";
include "Values2pass.php";

$function_name = chr($function_id + 97);
print("Hľadanie prostých implikantov pre funkciu f(" . $function_name . ")<br>");
DoQuine($function_name);

print("<input type=\"hidden\" name=\"function_id\" value=\"" . $function_id_new . "\">\n");

include "fun_var_number.php";
Values2pass($_POST['num_functions'], PocetPoliKM($_POST['num_variables']));
?>
<!-- </center> -->
<br>
<input type="image" src="image/next.jpg">
</form>
