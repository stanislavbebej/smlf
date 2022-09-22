<?
function ValuesOfFunction($function_name, $howmany)
{
    $meno_premennej = $function_name . "_";
    for ($j = 0; $j < $howmany; $j++) {
        $nazov = $meno_premennej . OptimizeNumbers($j);
        global $$nazov;
        print("<input type=\"hidden\" name=\"" . $nazov . "\" value=\"" . $$nazov . "\">\n");
    }
    print("<input type=\"hidden\" name=\"function_name\" value=\"" . $function_name . "\">\n");
}
