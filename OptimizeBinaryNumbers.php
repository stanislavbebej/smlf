<?
function OptimizeBinaryNumbers($value, $format)
{
    $num_positions = strlen($value); //zistujem si aktualnu dlzku retazca, ten uz je v binarnom tvare v premennej $value
    for ($w = 0; $w < ($format - $num_positions); $w++) { //odcitam preto, aby som zistil, kolko este miest s hodnotou 0 treba pred aktualnu binarnu hodnotu doplnit. Napr. ak cislo 5 ma hodnotu 101 a $format, teda num_variables, mahodnotu 4 (pocet premennych karnaughovej mapy), treba doplnit jednu 0 pred toto cislo : 0101
        $value = "0" . $value;
    }
    return $value;
}
