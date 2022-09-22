<?
function Vysledok($fun_name)
{
    global $needed;
    $temp;

    for ($j = 0; $j < sizeof($needed); $j++) {
        global $points;

        GetValues($needed[$j]); //zistovanie, ktore body pokryva neuplny vektor, vysledok je v poli $points
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
            $temp[] = $needed[$j];
        }
        unset($GLOBALS['points']);
        unset($points);
    }

    for ($j = 0; $j < sizeof($temp); $j++) {
        Bin_to_bool_function_item($temp[$j]);
        if ($j < (sizeof($temp) - 1)) {
            print(" + ");
        }

    }
}
