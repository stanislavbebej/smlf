<?
function SortArrayBy1s($to_do_array_name)
{
    print("<br>");
    print("<center>\n");
    print("<table border=\"0\">\n");
    print("<tr>\n");
    print("<td align=\"center\" width=\"100\"><b>Index bodu</b></td>");
    print("<td align=\"center\" width=\"100\"><b>&nbsp;</b></td>");
    print("<td align=\"center\" width=\"100\"><b>Vektor</b></td>");
    print("</tr>");
    global $$to_do_array_name; //pracujem s globalnym vonkajsim polom
    for ($j = 0; $j <= $_POST['num_variables']; $j++) { //najskor vypisujem prvky, ktore maju 0 jednotiek, potom 1 jednotku az do poctu premennych funkcie
        $found = 0; //pomocna premenna, ktora sluzi len na zistenie, ci sa nasiel nejaky prvok s hladanym poctom jednotiek, aby sa mohla dat ciara (<hr>) za celou skupinou
        for ($k = 0; $k < sizeof($$to_do_array_name); $k++) {
            $temp = count_chars(${$to_do_array_name}[$k], 0); //a dam popocitat pocet jednotlivych znakov
            if ($temp[49] == $j) { //na 49. mieste pola je ulozeny pocet jednotiek, a ak je zhodny s hladanym poctom jednotiek, vypise sa tento prvok spolu s jeho dekadickou hodnotou
                $found = 1; //nasli sme prvok o hladanom pocte jednotiek
                $count_x = 0; //popocitame pocet premennych, ktore je mozne vynechat, aby sme vedeli, co vypisat
                for ($l = 0; $l < $_POST['num_variables']; $l++) {
                    if (${$to_do_array_name}[$k][$l] == 'x') {
                        $count_x++;
                    }

                }
                if ($count_x == 0) { //ak implikant neobsahuje premenne, ktore mozeme vynachat, vypiseme aj jeho dekadicku hodnotu
                    print("<tr>\n");
                    print("<td align=\"center\">");
                    print(bindec(${$to_do_array_name}[$k]));
                    print("</td>");
                    print("<td align=\"center\">");
                    print(" - ");
                    print("</td>");
                    print("<td align=\"center\">");
                    print(${$to_do_array_name}[$k]);
                    print("</td>\n");
                    print("</tr>\n");
                } else {
                    print("<tr>\n");
                    print("<td align=\"center\">");
                    print($k);
                    print("</td>");
                    print("<td align=\"center\">");
                    print(" - ");
                    print("</td>");
                    print("<td align=\"center\">");
                    print(${$to_do_array_name}[$k]);
                    print("</td>\n");
                    print("</tr>\n");
                }
            }
        }
        if ($found == 1) {
            print("<tr><td colspan=\"3\"><hr></td></tr>\n");
        }
        //nakreslenie ciary za skupinou
    }
    print("</table>\n");
    print("</center>\n");
}
