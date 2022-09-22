<?
function GetFields1($function, $num_fields)
{ //napr. GetFields1("a", 15); funkcia vybera do TP jednotkove body funkcie
    for ($i = 0; $i < $num_fields; $i++) {
        $item = $function . "_" . OptimizeNumbers($i); //napr. a_01, ... a_15

        global $$item;
        global $horizontal_id;

        if ($$item == 1) {
            $horizontal_id[] = $item;
        }
    }
}
