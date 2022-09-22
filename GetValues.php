<?
function GetValues($value)
{ //funkcia ziska z neuplneho vektora jednotkove body, ktore pokryva
    global $points; //vytvorim si globalne pole, kam budem zapisovat vysledky
    $found_x = 0; //sluzi na zistenie, ci uz treba zapisat prvok do pola, alebo ho este treba upravit
    for ($i = 0; $i < $_POST['num_variables']; $i++) {
        if ($value[$i] == 'x') { //ak sa najde na nejakej pozicii x, este treba upraovat
            $found_x = 1; //a preto nastavime priznakovy bit, ze este nebudeme nic zapisovat do pola

            $value[$i] = 1; //pozmenime hodnotu najskor nahradenim x jednotkou
            GetValues($value); //a znova skumame, ci ma ta hodnota nejake x hodnoty

            $value[$i] = 0; //a tiez zmenime hodnotu x na nulu, aby sme mali obidve moznosti
            GetValues($value); //a skumame
        }
    }

    if ($found_x == 0) { //ak sa uz nenasli ziadne pozicie, kde by bolo x, skoncili sme a zapiseme hodnotu do pola
        // for ($i = 0; $i < sizeof($points); $i++) { //vkladanie takych prvkov do pola, ktore sa v nom este nenachadzaju
        //     if (OptimizeNumbers(bindec($value)) == $points[$i]) {
        //         return;
        //     }

        // }
        $points[] = OptimizeNumbers(bindec($value)); //zapisujeme optimalizovanu hodnotu, napr. 08, nie 8
    }
}
