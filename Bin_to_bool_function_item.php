<?
function Bin_to_bool_function_item($item)
{
    print("<i>");
    for ($m = 0; $m < $_POST['num_variables']; $m++) { //pozeram kazdy znak implikantu a vypisujem podla toho prislusne hodnoty
        switch ($item[$m]) {
            case 'x':break; //hovori o premennej, ktora moze byt vynechana
            case '1':print("x" . ($m + 1) . " ");
                break;
            case '0':print("!x" . ($m + 1) . " ");
                break;
            default:print("Nastala chyba!\n");
                break;
        }
    }
    print("</i>");
}
