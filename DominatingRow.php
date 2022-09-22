<?
function DominatingRow($table, $num_rows, $num_cols)
{ //funkcia zisti, ktory riadok dominuje nad ktorym riadkom a ten podradeny vysktrtne z tabulky pokrytia
    global $TP;

    for ($i = 0; $i < ($num_rows - 1); $i++) {
        for ($j = $i + 1; $j < $num_rows; $j++) {
            $comparation1_2 = array_diff_assoc($table[$i], $table[$j]);
            $comparation2_1 = array_diff_assoc($table[$j], $table[$i]);

            $num_0_row1 = 0;
            $num_1_row1 = 0;
            $num_2_row1 = 0;

            $num_0_row2 = 0;
            $num_1_row2 = 0;
            $num_2_row2 = 0;

            for ($k = 0; $k < $num_cols; $k++) {
                if ($comparation1_2[$k] == '0') {
                    $num_0_row1++;
                }

                if ($comparation1_2[$k] == '1') {
                    $num_1_row1++;
                } else {
                    $num_2_row1++;
                }

            }
            for ($k = 0; $k < $num_cols; $k++) {
                if ($comparation2_1[$k] == '0') {
                    $num_0_row2++;
                }

                if ($comparation2_1[$k] == '1') {
                    $num_1_row2++;
                } else {
                    $num_2_row2++;
                }

            }

            if (($num_0_row1 != 0) and ($num_0_row1 == $num_1_row2) and ($num_0_row1 > $num_0_row2) and ($num_1_row1 == 0)) {
                print("Riadok " . $i . " je podriadený riadku " . $j . ", a preto bude odstránený.<br>\n");
                for ($l = 0; $l < $num_cols; $l++) {
                    $TP[$i][$l] = 2;
                }
                return $i;
            }
            if (($num_1_row1 != 0) and ($num_1_row1 == $num_0_row2) and ($num_1_row1 > $num_1_row2) and ($num_0_row1 == 0)) {
                print("Riadok " . $i . " dominuje nad riadkom " . $j . ", preto tento odstránime.<br>\n");
                for ($l = 0; $l < $num_cols; $l++) {
                    $TP[$j][$l] = 2;
                }
                return $j;
            }
        }
    }
    return -1;
}
