<?
function CheckEmptyTable($table, $num_rows, $num_cols)
{
    $count = 0;
    for ($i = 0; $i < $num_rows; $i++) {
        for ($j = 0; $j < $num_cols; $j++) {
            if (($table[$i][$j] == '0') or ($table[$i][$j] == '1')) {
                $count++;
            }

        }
    }
    if ($count > 0) {
        return 0;
    } else {
        return 1;
    }

}
