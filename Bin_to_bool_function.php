<?
function Bin_to_bool_function($array_to_convert)
{

    global $$array_to_convert;

    if (sizeof($$array_to_convert) == 0) {
        print("f() = 0<br>\n");
        return;
    } else {
        print("f() = ");
    }

    for ($m = 0; $m < sizeof($$array_to_convert); $m++) { //idem vypisovat kazdy prosty implikant z finalneho pola
        $count_x = 0; //tato premenna bude sluzit v pripade, ze kazdy bod funkcie je zadefinovany ako 1 alebo ako x. Vtedy Quine do pola final zapise implikant xxxx (podla poctu premennych, tu o pocte 4), co hovori, ze cela funkcia sa rovna 1
        print("<i>");
        for ($n = 0; $n < $_POST['num_variables']; $n++) { //pozeram kazdy znak implikanta a vypisujem podla toho prislusnehodnoty
            switch (${$array_to_convert}[$m][$n]) {
            case 'x':$count_x++;
                break; //hovori o premennej, ktora moze byt vynechana
            case '1':print("x" . ($n + 1) . " ");
                break;
            case '0':print("!x" . ($n + 1) . " ");
                break;
            default:print("(" . ${$array_to_convert}[$m][$n] . ") Nastala chyba!\n");
                break;
            }
        }
        print("</i>");
        if ($count_x == $_POST['num_variables']) {
            print(" 1<br>\n");
        }

        if ($m < (sizeof($$array_to_convert) - 1)) {
            print("+ ");
        }
        //medzi implikantmi sa dava +, je to sucet sucinov - DNF
        else {
            print("<br>\n");
        }

    }
}
