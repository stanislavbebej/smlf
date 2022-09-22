<?
function MultiplyFunctions($name_first, $name_second, $num_of_fields)
{
    global $new_fun_name;
    $new_fun_name = $name_first . $name_second;

    for ($i = 0; $i < $num_of_fields; $i++) {
        $variable_first = $name_first . "_" . OptimizeNumbers($i);
        global $$variable_first;
        $variable_second = $name_second . "_" . OptimizeNumbers($i);
        global $$variable_second;
        $new_variable_name = $new_fun_name . "_" . OptimizeNumbers($i);
        global $$new_variable_name;

        if ($$variable_first == 1 and $$variable_second == 1) {
            $$new_variable_name = 1;
        } else {
            $$new_variable_name = 0;
        }

    }
}
