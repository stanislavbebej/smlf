<?
include "RestoreArray.php";
include "OptimizeNumbers.php";
include "GetFields1.php";
include "PocetPoliKM.php";
include "GetValues.php";
include "SetTPRow.php";
include "FindColumns.php";
include "DominatingRow.php";
include "ArrayToTable.php";
include "ArrayToTableHeader.php";
include "FinalResult.php";
include "Bin_to_bool_function_item.php";
include "DeleteEmptyRows.php";
include "CheckEmptyTable.php";
include "ChooseOne.php";
include "Vysledok.php";

global $vertical_id;
global $horizontal_id;
global $TP;

RestoreArray($_POST['array_name']);

for ($i = 0; $i < sizeof($implikanty); $i++) { //vytvorenie pola $vertical_id
    $vertical_id[] = $implikanty[$i];
}

for ($i = 0; $i < $_POST['num_functions']; $i++) { //vytvorenie pola $horizontal_id
    $name = chr($i + 97);
    GetFields1($name, PocetPoliKM($_POST['num_variables'])); //napr. GetFields1("a", 15);
}

for ($i = 0; $i < sizeof($vertical_id); $i++) { //vynulovanie prvkov pola $TP
    for ($j = 0; $j < sizeof($horizontal_id); $j++) {
        $TP[$i][$j] = 0;
    }
}

print("Tabuľka pokrytia : <br>\n");

for ($i = 0; $i < sizeof($vertical_id); $i++) {
    GetValues($vertical_id[$i]); //zistovanie, ktore body pokryva neuplny vektor, vysledok je v poli $points
    $points = array_unique($points);
    sort($points); //napr. 00, 01, 02, 03

    for ($j = 0; $j < $_POST['num_functions']; $j++) {
        $name = chr($j + 97);
        SetTPRow($name, $i, sizeof($horizontal_id), $points); //napr. SetTPRow("a", 0, 12 , $points);
    }

    unset($points);
}

do {
    DeleteEmptyRows($TP, sizeof($vertical_id), sizeof($horizontal_id));

    $empty = 0;
    $empty = CheckEmptyTable($TP, sizeof($vertical_id), sizeof($horizontal_id));
    if ($empty == 1) {
        ArrayToTableHeader($TP, sizeof($vertical_id), sizeof($horizontal_id)); //vypisanie tabulky pokrytia
        break;
    }

    ArrayToTableHeader($TP, sizeof($vertical_id), sizeof($horizontal_id)); //vypisanie tabulky pokrytia

    if ($end != -1) {
        $end = FindColumns($TP, sizeof($vertical_id), sizeof($horizontal_id));
    } else {
        $row = DominatingRow($TP, sizeof($vertical_id), sizeof($horizontal_id));
        if ($row != -1) {
            $end = 0;
        } else {
            print("Nenašla sa ani dominancia riadkov, preto sa vyberie prvý z implikantov.<br>\n");
            ChooseOne($TP, sizeof($vertical_id), sizeof($horizontal_id));
            $end = 0;
            $row = 0;
        }
    }
} while ($empty != 1);

print("<hr>\n");
print("<b>Výsledok skupinovej minimalizácie zvoleného systému funkcií :</b><br>\n");

for ($i = 0; $i < $_POST['num_functions']; $i++) {
    $name = chr($i + 97);
    print("f(" . $name . ") = ");
    Vysledok($name);
    print("<br>");
}

// for ($i = 0; $i < $_POST['num_functions']; $i++) {
//     $name = chr($i + 97);
//     print("f(" . $name . ") = ");
//     for ($j = 0; $j < sizeof($needed); $j++) {
//         FinalResult($name, $needed[$j]);
//         unset($points);
//     }
//     print("<br>");
// }
