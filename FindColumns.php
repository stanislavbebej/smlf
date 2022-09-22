<?
function FindColumns($table, $num_rows, $num_cols)
{ //hlada stlpce, ktore obsahuju len 1 jednotku
    global $TP;
    global $horizontal_id;
    global $vertical_id;
    global $needed;

    for ($i = 0; $i < $num_cols; $i++) {
        $counter = 0;
        for ($j = 0; $j < $num_rows; $j++) {
            if ($table[$j][$i] == 1) {
                $counter++;
            }

        }
        if ($counter == 1) {
            break;
        }

    }

    if ($counter == 0 or $counter > 1) {
        print("Nenašiel sa stĺpec, ktorý by obsahoval len jednu jednotku, a preto treba hľadať dominanciu v nasledujúcej tabuľke.<br>\n");
        return -1;
    }

    for ($k = 0; $k < $num_rows; $k++) { //zistim si, v ktorom riadku sa ta jedina jednotka nachadza
        if ($table[$k][$i] == 1) {
            break;
        }
        //v $k mame ulozeny riadok, v ktorom sa ta jednotka nachadza
    }
    print("Stĺpec " . $i . ". obsahuje práve jednu jednotku.<br>\n");
    $needed[] = $vertical_id[$k]; //a ten vektor si ulozim medzi irredundantne implikanty

    print("Aktuálne pole irredundantných implikantov : ");
    foreach ($needed as $value) {
        print($value . " ");
    }

    print("<br>\n");

    for ($l = 0; $l < $num_cols; $l++) { //prejdeme vsetky stlpce, v ktorych ma ten vektor hodnotu 1, tieto stlpce sa vyhodia
        if ($table[$k][$l] == 1) {
            // print("Vyhodi sa stlpec " . $l . " z riadku " . $k . "<br>");
            for ($m = 0; $m < $num_rows; $m++) {
                $TP[$m][$l] = 2; //vyhodenie stlpca, teda cely sa vynuluje
            }
        }
    }

    for ($l = 0; $l < $num_cols; $l++) { //znulujeme aj cely riadok toho vektora
        $TP[$k][$l] = 2;
    }
}
