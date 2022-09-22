<?
function Quine($var_name, $array_to_use)
{
    $not_used = "not_used_" . $var_name;
    $not_used_counter = "not_used_" . $var_name . "counter";

    global $$not_used;
    global $$not_used_counter;
    $$not_used_counter = 0;

    global $tmpp;
    global $tmpc;
    $tmpc = 0;

    for ($j = 0; $j <= $_POST['num_variables']; $j++) {
        $array_name = $array_to_use . $var_name . $j;
        global $$array_name;

        if (sizeof($$array_name) == 0) {
            continue;
        }
        //ak mame prazdne pole, nema zmysel vypisovat jeho prvky, lebo cyklus for prejde vsetky polia az do poctu premennych, teda napr. pri 4 premennych polia s nazvami od $Pole_pocet_1_a_0 az $Pole_pocet_1_a_4, preto sa odtialto skonci pokracovanie v cykle a overuje (vypisuje) sa dalsie pole v poradi
        for ($r = 0; $r < sizeof($$array_name); $r++) {
            print(bindec(${$array_name}[$r]) . " - \t" . ${$array_name}[$r] . "<br>\n");
        }
        print("<hr>\n");
    }

    for ($j = 0; $j <= $_POST['num_variables']; $j++) { //cyklus na nastavenie vsetkych prvkov na stav, ze neboli este pouzite
        $array_name = $array_to_use . $var_name . $j;
        $size = sizeof($$array_name);
        for ($s = 0; $s < $size; $s++) {
            ${$array_name}[$s][$_POST['num_variables']] = '+';
        }
    }

    for ($j = 0; $j < $_POST['num_variables']; $j++) { //cyklus ide len tolkokrat, kolko mame premennych, aj ked mozeme mat viac poli. Napr. pri 4 premennych mozeme mat 5 poli, ak je zahrnuty aj implikant 15. No posledne porovnavanie bude predposledneho pola s poslednym, teda 4. s 5., piate pole uz nema dalsieho suseda, a teda ho nie je s kym porovnavat
        $array_name = $array_to_use . $var_name . $j;
        $size = sizeof($$array_name);
        if ($size == 0) {
            continue;
        }

        $k = $j + 1; //idem si vytvorit nazov susedneho pola
        $array_name_neighbour = $array_to_use . $var_name . $k;
        $size_neighbour = sizeof($$array_name_neighbour);
        if ($size_neighbour == 0) {
            continue;
        }

        for ($k = 0; $k < $size; $k++) { //porovnavame kazdy prvok prveho pola ...
            for ($l = 0; $l < $size_neighbour; $l++) { //s kazdym prvkom jeho susedneho pola
                $zhoda = 0; //pocet miest, v ktorych sa dva prvky zhoduju, maju sa len v jednom mieste zhodovat
                $temp = ${$array_name}[$k];

                for ($m = 0; $m < $_POST['num_variables']; $m++) { //porovnavam kazdu jednu binarnu cislicu
                    if (${$array_name}[$k][$m] == ${$array_name_neighbour}[$l][$m]) {
                        $zhoda++;
                    } else {
                        $temp[$m] = x;
                    }
                }

                if ($zhoda == ($_POST['num_variables'] - 1)) {
                    ${$array_name}[$k][$_POST['num_variables']] = '*'; //na toto miesto si zapisujem, ci bola pouzita tato bunka pri tvorbe neuplnych vektorov
                    ${$array_name_neighbour}[$l][$_POST['num_variables']] = '*';

                    $new_temp = "0";
                    for ($s = 0; $s < $_POST['num_variables']; $s++) { //ocistenie si hodnot od priznakov
                        $new_temp[$s] = $temp[$s];
                    }

                    $tmpp[$tmpc] = $new_temp;
                    $tmpc++;
                    print(${$array_name}[$k] . " (" . bindec(${$array_name}[$k]) . ") a " . ${$array_name_neighbour}[$l] . " (" . bindec(${$array_name_neighbour}[$l]) . ") sa zhoduju a vytvoria " . $new_temp . "<br>\n");
                }
            }
        }
    }

    for ($j = 0; $j <= $_POST['num_variables']; $j++) { //cyklus na nastavenie vsetkych prvkov na stav, ze neboli este pouzite
        $array_name = $array_to_use . $var_name . $j;
        $size = sizeof($$array_name);
        for ($s = 0; $s < $size; $s++) {
            print(${$array_name}[$s] . "<br>\n");
        }
    }

    print("<hr>");

    for ($j = 0; $j <= $_POST['num_variables']; $j++) { //cyklus na nastavenie vsetkych prvkov na stav, ze neboli este pouzite
        $array_name = $array_to_use . $var_name . $j;
        $size = sizeof($$array_name);
        for ($s = 0; $s < $size; $s++) {
            if (${$array_name}[$s][$_POST['num_variables']] == '+') {
                ${$not_used}[$not_used_counter] = ${$array_name}[$s];
                print(${$not_used}[$not_used_counter] . "<br>");
                $$not_used_counter++;
            }
        }
    }
    // for ($m = 0; $m < sizeof($tmpp); $m++) {
    //     print($tmpp[$m] . "<br>\n");
    // }

}
