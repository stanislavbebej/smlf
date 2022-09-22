<!-- <center> -->
<?
include "PocetPoliKM.php";
include "OptimizeNumbers.php";
include "OptimizeBinaryNumbers.php";
include "Quine.php";

for ($i = 0; $i < $_POST['num_functions']; $i++) {
    $var_name = chr($i + 97) . "_";
    $array_to_use = "Pole_pocet_1_";
    $array_to_use_counter = "CPP1_";

    for ($j = 0; $j <= $_POST['num_variables']; $j++) { //<= lebo napr. 15 ma 4 jednotky po prevedeni do binarneho kodu, a teda treba vytvorit aj pole $Pole_pocet_1_4, inak by posledne pole bolo $Pole_pocet_1_3. To iste plati aj o pocitadlach
        $array_name = $array_to_use . $var_name . $j; //vytvorim si globalne pole. Napr. pole pre prvky, kde bude pocet jednotiek po prevedeni dekadickeho cisla na binarne rovny 2.
        $array_counter = $array_to_use_counter . $var_name . $j; //vytvorim si pocitadlo pre vzniknute pole, aby som vedel, na ktore miesto mozem pridat dalsi prvok, Counter Pocet Poli 1 (jednotiek, nie prve pole)

        $$array_counter = 0;
    }

    for ($j = 0; $j < PocetPoliKM($_POST['num_variables']); $j++) {
        $k = OptimizeNumbers($j);
        $var_name_complete = $var_name . $k; //vytvorim si cele meno premennej, teda napr. $a_12

        if (($$var_name_complete == '1') or ($$var_name_complete == 'x')) { //beriem len jednotkove body, alebo nedefinovane, teda tie sa vlastne dodefinuju na 1. Teraz ma uz nezaujima hodnota premennych, len cislo premennej, ktore sa bude prevadzat na binarny tvar, podla toho zaradovat do prislusneho pola podla poctu jednotiek
            $temp = decbin($j); //prevediem do binarneho tvaru cislo premennej, pri $a_12 to bude 12
            $temp_num_1 = count_chars($temp, 0); //a dam popocitat pocet jednotlivych znakov
            $array_name = $array_to_use . $var_name . $temp_num_1[49]; //na 49. mieste funkcia count_chars ulozila pocet jednotiek v retazci
            $array_counter = $array_to_use_counter . $var_name . $temp_num_1[49];

            $temp = OptimizeBinaryNumbers($temp, $_POST['num_variables']); //najskor si upravime ukladane data na konstantny pocet znakov

            ${$array_name}[$$array_counter] = $temp; //do pola napr. $Pole_pocet_1_3 na poziciu jeho pocitadla ulozime hodnotu z $temp, kde je uz upravene binarne cislo
            $$array_counter++; //a zvysime jeho pocitadlo o 1
        }
    }
    Quine($var_name, $array_to_use);

    //unset($GLOBALS['tmpp']);
    //unset($GLOBALS['tmpc']);
}
?>
<!-- </center> -->
