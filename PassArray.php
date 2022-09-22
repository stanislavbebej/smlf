<?
function PassArray($name, $name_of_array)
{
    $size = sizeof($name);
    for ($i = 0; $i < $size; $i++) {
        print("<input type=\"hidden\" name=\"" . $name_of_array . "_" . OptimizeNumbers($i) . "\" value=\"" . $name[$i] . "\">\n");
    }
    print("<input type=\"hidden\" name=\"array_size\" value=\"" . $size . "\">\n");
    print("<input type=\"hidden\" name=\"array_name\" value=\"" . $name_of_array . "\">\n");
}
