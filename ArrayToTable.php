<?
function ArrayToTable($table, $rows, $cols, $align = "center")
{
    print("<table align=\"" . $align . "\" border=\"1\">\n");
    for ($i = 0; $i < $rows; $i++) {
        print("<tr>\n");
        for ($j = 0; $j < $cols; $j++) {
            print("<td width=\"20\" height=\"20\" align=\"center\">");
            if ($table[$i][$j] == 1 or $table[$i][$j] == 0) {
                print($table[$i][$j]);
            } else {
                print("&nbsp");
            }

            print("</td>\n");
        }
        print("</tr>\n");
    }
    print("</table>\n");
}
