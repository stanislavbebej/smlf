<?
$nazov = "table" . $_POST['num_variables'] . ".txt";
$subor = fopen("$nazov", "r");
$temp = file("$nazov");
fclose($subor);

$table_properties = explode("x", $temp[0]); //[0] hovori o pocte riadkov, [1] o pocte stlpcov, nacitava sa z prveho riadku suboru (teda temp[0] je prvy riadok suboru), napr. table4.txt
$field_identification = explode(" ", $temp[1]); //vytvorenie pola cisel, ktore budu identifikovat jednotlive polia karnaughovej mapy, nacitava sa druhy riadok suboru (teda temp[1] je druhy riadok suboru)
