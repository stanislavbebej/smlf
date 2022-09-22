<?
function ConvertLines2Tables($lines2convert, $variables_num)
{ //vytvori zo zadanych hodnot v input riadkoch taky pocet premennych, kolko by zodpovedalo poctu poli karnaughovej mapy, aby sa zlucili cesty zadavania do tabulky a zadavania jadnotkovych bodov, aby sa dali pouzit funkcie pouzite pri prvom menovanom zadavani. Najskor sa vytvara pole, pricom oddelovacom je ciarka, jednotlive prvky pola sa nasledne upravia (aby neboli medzery navyse) a potom sa vytvoria jednotlive premenne a v urcitych premennych, zvolenych uzivatelom zadanim jednotkovych bodov, sa ich hodnota zmeni na 1
    for ($j = 0; $j < $lines2convert; $j++) { //prechadza sa tolkokrat, kolko mame riadkov funkcii, tak sa vytvoria postupne prisluchajuce nazvy premennych a poli, napr. $a_01, $array_a atd.
        $id_function = chr($j + 97); //ziskanie charu z int, teda z 97 ziskame a
        $nazov_riadku = $id_function . "_"; //vytvorenie nazvu riadku z formulara, teda napr. a_
        $array_name = "array_" . $id_function; //vytvorenie nazvu pola, napr. array_a
        $$array_name = explode(",", $_POST[$nazov_riadku]); //vytvarame pole zadanych prvkov, teda jednotkove body, ukladaju sa do pola s prislusnym nazvom, teda ku riadku a_ sa vytvori pole $array_a

        $nazov_riadku = $id_function . "x_"; //ako vyssie, no na ucely priradovania x
        $arrayx_name = "arrayx_" . $id_function;
        $$arrayx_name = explode(",", $_POST[$nazov_riadku]);

        for ($k = 0; $k < PocetPoliKM($variables_num); $k++) { //tu sa vytvaraju premenne, napr. od $a_01 az po $a_15 pri styroch boolovskych funkciach
            $k_optimized = OptimizeNumbers($k);
            $variable_name = $id_function . "_" . $k_optimized; //vytvorime si konkretne meno premennej
            global $$variable_name; //spravime z nej globalnu premennu, aby ju bolo vidiet aj mimo funkcie, lebo ju potrebujeme potom dostat do funkcie CreatePraview po opusteni aktualnej funkcie
            $$variable_name = 0; //vsetky premenne nastavime na 0, teda default hodnota
        }

        for ($l = 0; $l < sizeof($$array_name); $l++) { //tu sa zmenia hodnoty vytvorenych premennych na 1, podla toho, ake body zadal uzivatel do riakdu. Teda sa prejde vytvorene pole a tym premennym, ktorych poradove cislo je ulozene v poli, sa priradi 1
            ${$array_name}[$l] = trim(${$array_name}[$l]); //najskor si osetrime medzery navyse
            $array_value_optimized = OptimizeNumbers(${$array_name}[$l]); //upravime si hodnoty prvkov v poli na take, aby mohli identifikovat premennu, teda napr. hodnotu 8 prerobime na 08, aby sme mohli identifikovat premennu $a_08 alebo $b_08 a pod.
            $syn_variable_name = $id_function . "_" . $array_value_optimized; //tu sa vytvara meno premennej, ktora bude nastavena na 1
            $$syn_variable_name = 1; //a priradi sa jej hodnota 1
        }

        for ($m = 0; $m < sizeof($$arrayx_name); $m++) { //tu sa robi podobne, co v minulom cykle, avsak do premennych sa priraduje hodnota x
            ${$arrayx_name}[$m] = trim(${$arrayx_name}[$m]);
            $array_value_optimized = OptimizeNumbers(${$arrayx_name}[$m]);
            $syn_variable_name = $id_function . "_" . $array_value_optimized;
            $$syn_variable_name = x;
        }
    }
}
