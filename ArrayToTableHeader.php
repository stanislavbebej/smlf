<?
function ArrayToTableHeader($table, $rows, $cols, $align = "center")
{
    global $horizontal_id;
    global $vertical_id;

    print("<br>");
    print("<table align=\"" . $align . "\" border=\"1\">\n");
    print("<tr>\n");
    print("<td>&nbsp</td>\n");
    print("<td>&nbsp</td>\n");
    for ($i = 0; $i < $cols; $i++) {
        print("<td><b>");
        print($horizontal_id[$i]);
        print("</b></td>\n");
    }
    print("</tr>");

    print("<tr>\n");
    print("<td>&nbsp</td>\n");
    print("<td>&nbsp</td>\n");
    for ($i = 0; $i < $cols; $i++) {
        print("<td align=\"center\"><b>");
        print($i);
        print("</b></td>\n");
    }
    print("</tr>");

    for ($i = 0; $i < $rows; $i++) {
        print("<tr>\n");
        print("<td><b>");
        print($vertical_id[$i]);
        print("</b></td>\n");
        print("<td width=\"20\" height=\"20\" align=\"center\"><b>");
        print($i);
        print("</b></td>\n");
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
    print("<br>");
}
