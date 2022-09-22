<?
function Values2pass($variable_num, $howmany)
{
    for ($i = 0; $i < $variable_num; $i++) {
        $meno_premennej = chr($i + 97) . "_";

        for ($j = 0; $j < $howmany; $j++) {
            $k = OptimizeNumbers($j);
            $nazov = $meno_premennej . $k;
            global $$nazov;
            print("<input type=\"hidden\" name=\"" . $nazov . "\" value=\"" . $$nazov . "\">\n");
        }
    }
}
