<?
function GenerateTable($rows, $columns, $name, $fun_name, $array_of_field_id, $align = "center")
{ //funkcia na vygenerovanie karnaughovej mapy z funkcie, ktorej nazov je v $name, nazov jej premennych v $fun_name, napr. ab, a tiez pole, ktore obsahuje identifikator kazdeho pola tabulky, ktore vygenerovala funkcia CreateTableAttributes
    print("Karnaughova mapa pre " . $name);
    print("<table align=\"" . $align . "\" border=\"2\">\n");

    $ident = 0;
    for ($i = 0; $i < $rows; $i++) {
        print("<tr>\n");
        for ($j = 0; $j < $columns; $j++) {
            $temp_identificator = OptimizeNumbers($array_of_field_id[$ident]);
            $temp = $fun_name . "_" . $temp_identificator;
            print("<td width=\"50\" height=\"50\" align=\"center\">");
            global $$temp;
            print($$temp);
            print("</td>\n");

            $ident++;
        }
        print("</tr>\n");
    }
    print("</table>\n<br>\n");
}
