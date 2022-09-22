<?
function DoQuine($function_name)
{
    global $to_do_array_name;

    $to_do_array_name = "to_do"; //nazov pola, ktore sa pouzije pri uchovavani prvkov, ktore este treba spracovat quinom
    $to_do_array_name_counter = "to_do_counter";

    global $completed_name;

    $completed_name = "completed"; //nazov pola, kde uz su spracovane prvky
    $completed_name_counter = "completed_counter";

    global $$to_do_array_name;
    global $$to_do_array_name_counter;
    $$to_do_array_name_counter = 0;

    global $$completed_name;
    global $$completed_name_counter;
    $$completed_name_counter = 0;

    $var_name = $function_name . "_"; //vytvorenie unikatneho identifikatora funkcie

    for ($j = 0; $j < PocetPoliKM($_POST['num_variables']); $j++) {
        $k = OptimizeNumbers($j); //urobim si pekne cislo, napr. z 6 si spravim 06
        $var_name_complete = $var_name . $k; //vytvorim si cele meno premennej, teda napr. $a_12

        global $$var_name_complete;

        if (($$var_name_complete == '1') or ($$var_name_complete == 'x')) { //beriem len jednotkove body, alebo nedefinovane, teda tie sa vlastne dodefinuju na 1. Teraz ma uz nezaujima hodnota premennych, len cislo premennej, ktore sa bude prevadzat na binarny tvar, podla toho zaradovat do prislusneho pola podla poctu jednotiek
            $temp = decbin($j); //prevediem do binarneho tvaru cislo premennej, pri $a_12 to bude 12
            $temp = OptimizeBinaryNumbers($temp, $_POST['num_variables']); //najskor si upravime ukladane data na konstantny pocet znakov

            ${$to_do_array_name}[$$to_do_array_name_counter] = $temp; //do pola, ktore bude obsahovat prvky na spracovanie quinom ulozime hodnotu z $temp, kde je uz upravene binarne cislo
            $$to_do_array_name_counter++; //a zvysime jeho pocitadlo o 1
        }
    }

    $iteracia = 1; //uchovava cislo iteracie, teda kolky beh funkcie Quine nasleduje
    do {
        SortArrayBy1s($to_do_array_name); //zoradenie prvkov pola na spracovanie podla poctu jednotiek
//        print("<br>Poradové číslo iterácie Quine algoritmu - (".$iteracia.")<br><br>\n");
        $again = Quine($to_do_array_name, $completed_name); //$again je navratova hodnota, vdaka nej je mozne vediet, ci boli vytvorene nove neurcite vektory spojenim dvoch predchadzajucich prvkov. Ak ano, pole $to_do_array_name nie je urcite prazdne, a teda ho treba opat spracovat
        $iteracia++;
    } while ($again == 1); //(sizeof($$to_do_array_name) != 0);    //dokial vznikli nove neuplne vektory, alebo dokial je co spracovavat v poli $$to_do_array_name

    Bin_to_bool_function($completed_name); //vypisanie prostych implikantov

    unset($$to_do_array_name); //nulovanie premennych
    unset($$completed_name);
}
