<?
function SetTPRow($fun_name, $id_row, $num_cols, $points_array)
{ //funkcia naplni riadok jednotkami na miestach, ktore pokryva neuplny vektor, napr. SetTPRow("a", 0, 12 , $points);
    global $horizontal_id;
    global $TP;

    $count = 0;
    for ($i = 0; $i < sizeof($points_array); $i++) {
        $item_name = $fun_name . "_" . $points_array[$i]; //napr. a_08
        global $$item_name;

        if ($$item_name == '1' or $$item_name == 'x') {
            $count++;
        } else {
            return;
        }

    }

    if ($count == sizeof($points_array)) {
        for ($i = 0; $i < sizeof($points_array); $i++) {
            $item_name = $fun_name . "_" . $points_array[$i]; //napr. a_08
            $column = -1;
            for ($j = 0; $j < $num_cols; $j++) {
                if ($item_name == $horizontal_id[$j]) {
                    $column = $j;
                    break;
                }
            }
            if ($column == -1) {
                continue;
            } else {
                $where_to_put_1[] = $column;
            }

        }
    } else {
        return;
    }

    for ($i = 0; $i < sizeof($where_to_put_1); $i++) {
        $TP[$id_row][$where_to_put_1[$i]] = 1;
    }
}
