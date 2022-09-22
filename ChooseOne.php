<?
function ChooseOne($table, $num_rows, $num_cols)
{
    global $TP;
    global $horizontal_id;
    global $vertical_id;
    global $needed;

    for ($i = 0; $i < $num_cols; $i++) {
        for ($j = 0; $j < $num_rows; $j++) {
            if ($table[$j][$i] == '1') {
                $found = 1;
                $needed[] = $vertical_id[$j]; //a ten vektor si ulozim medzi irredundantne implikanty
                print("Aktuálne pole irredundantných implikantov : ");
                foreach ($needed as $value) {
                    print($value . " ");
                }

                print("<br>\n");

                for ($k = 0; $k < $num_cols; $k++) { //prejdeme vsetky stlpce, v ktorych ma ten vektor hodnotu 1, tieto stlpce sa vyhodia
                    if ($table[$j][$k] == '1') {
                        for ($l = 0; $l < $num_rows; $l++) {
                            $TP[$l][$k] = 2; //vyhodenie stlpca, teda cely sa vynuluje
                        }
                    }
                }
                for ($l = 0; $l < $num_cols; $l++) { //znulujeme aj cely riadok toho vektora
                    $TP[$j][$l] = 2;
                }
                return;
            }
        }
    }
}
