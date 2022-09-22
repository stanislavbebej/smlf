<?
function Quine($array_name, $final_array_name)
{
    $final_array_name_counter = $final_array_name . "_counter";

    global $$array_name; //pracujeme s globalnymi polami
    global $$final_array_name;
    global $$final_array_name_counter;

    $tmp;
    $tmpc = 0;

    $do_quine_again = 0; //navratova hodnota, ci este treba spustit Quine funkciu

    $size = sizeof($$array_name);
    $size_final = sizeof($$final_array_name);

    for ($s = 0; $s < $size; $s++) { //tu si vynulujem priznakovy bit, ktory hovori, ci uz bol prvok pouzity
        ${$array_name}[$s][$_POST['num_variables']] = '+';
    }

    for ($j = 0; $j < ($size - 1); $j++) { //porovnavam kazdy prvok s kazdym a zistujem, na kolkych miestach sa zhoduju
        for ($k = $j + 1; $k < $size; $k++) {
            $zhoda = 0; //pocet miest, v ktorych sa dva prvky zhoduju, maju sa len v jednom mieste zhodovat
            $temp = ${$array_name}[$j]; //odlozim si prvok, aby som si mohol pridavat x na mieste, kde sa porovnavane prvky lisia

            for ($l = 0; $l < $_POST['num_variables']; $l++) { //porovnavam kazdu jednu binarnu cislicu
                if (${$array_name}[$j][$l] == ${$array_name}[$k][$l]) {
                    $zhoda++;
                } else {
                    $temp[$l] = x; //ak sa nezhoduju, na to miesto dam x
                }
            }

            if ($zhoda == ($_POST['num_variables'] - 1)) {
                $do_quine_again = 1;
                ${$array_name}[$j][$_POST['num_variables']] = '*'; //na toto miesto si zapisujem, ci bola pouzita tato bunka pri tvorbe neuplnych vektorov
                ${$array_name}[$k][$_POST['num_variables']] = '*';

                $new_temp = "0";
                for ($m = 0; $m < $_POST['num_variables']; $m++) { //ocistenie si hodnot od priznakov
                    $new_temp[$m] = $temp[$m];
                }

                $tmpp[$tmpc] = $new_temp; //ulozim si prvok, teda neuplny vektor, do pomocneho pola
                $tmpc++; //a zvysim jeho pocitadlo

                print(${$array_name}[$j] . " a " . ${$array_name}[$k] . " sa zhodujú a vytvoria " . $new_temp . "<br>\n");
            }
        }
    }

    // print("<hr>\n");

    if ($do_quine_again == 1) {
        print("<br>\nVytvoríme ďalší súpis vektorov.<br>\n");
    } else {
        print("<br>\nUž nie je mozné vytvoriť ďalší súpis, preto vypíšeme výsledné prosté implikanty funkcie.<br><br>\n");
    }

    for ($m = 0; $m < $size; $m++) { //vlozime si nepouzite prvky do pola $completed
        if (${$array_name}[$m][$_POST['num_variables']] == '+') {
            $temp = "0";
            for ($n = 0; $n < $_POST['num_variables']; $n++) { //ocistenie si hodnot od priznakov
                $temp[$n] = ${$array_name}[$m][$n];
            }

            for ($n = 0; $n < sizeof($$final_array_name); $n++) { //ocistenie pola od duplicitnych hodnot
                if (${$final_array_name}[$n] == $temp) {
                    continue 2;
                }
                //skok az na zaciatocny cyklus for
            }
            ${$final_array_name}[$$final_array_name_counter] = $temp;
            $$final_array_name_counter++;
        }
    }

    // for ($m = 0; $m < sizeof($$final_array_name); $m++) {
    //     print($final_array_name . " = " . ${$final_array_name}[$m] . "<br>\n");
    // }

    unset($GLOBALS[$array_name]); //zrusim globalnu ...
    unset($$array_name); //aj lokalnu premennu, teda ich vymazem, aby som mal ciste pole
    global $$array_name; //znova ich vytvorim, je to pole $to_do, teda co este treba minimalizovat

    $temp_counter = 0; //pomocne pocitadlo $$array_name, nepotrebujem ho vidiet von, len aby som vedel, aky dalsi prvok zapisat, inak vznikaju nedefinovane prvky, kde by sa preskocilo jedno miesto pola, ak by sa zistila duplicita, pomocou continue 2 v nasledujucom cistiacom for

    for ($m = 0; $m < sizeof($tmpp); $m++) { //a nakopirujem tam prvky pola $tmpp, kde su vytvorene neuplne vektory
        for ($n = 0; $n < sizeof($$array_name); $n++) { //ocistenie pola od duplicitnych hodnot
            if (${$array_name}[$n] == $tmpp[$m]) {
                continue 2;
            }

        }
        ${$array_name}[$temp_counter] = $tmpp[$m];
        $temp_counter++;
    }

    return $do_quine_again;

    // for ($m = 0; $m < sizeof($$array_name); $m++) {
    //     print(${$array_name}[$m] . "<br>\n");
    // }

    // for ($m = 0; $m < sizeof($tmpp); $m++) {
    //     print($tmpp[$m] . "<br>\n");
    // }

}
