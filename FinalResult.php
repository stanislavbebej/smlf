<?
function FinalResult($fun_name, $implikant)
{
    global $points;

    GetValues($implikant); //zistovanie, ktore body pokryva neuplny vektor, vysledok je v poli $points
    $points = array_unique($points);
    sort($points);

    $count = 0;
    for ($i = 0; $i < sizeof($points); $i++) {
        $item = $fun_name . "_" . $points[$i];
        global $$item;
        if ($$item == '1' or $$item == 'x') {
            $count++;
        }

    }

    if ($count == sizeof($points)) {
        Bin_to_bool_function_item($implikant);
        print(" + ");
    }
}
