<?
function DeleteEmptyRows($table, $num_rows, $num_cols)
{
    global $TP;

    for ($i = 0; $i < $num_rows; $i++) {
        $count_1 = 0;
        for ($j = 0; $j < $num_cols; $j++) {
            if ($table[$i][$j] == 1) {
                $count_1++;
            }

        }
        if ($count_1 == 0) {
            for ($j = 0; $j < $num_cols; $j++) {
                $TP[$i][$j] = 2;
            }
        }
    }
}
