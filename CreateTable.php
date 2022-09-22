<?
function CreateTable($howmany, $lines, $columns, $id, $id_druh)
{
    for ($k = 0; $k < $howmany; $k++) {
        $zarovnaj = "center";
        $id_funkcia = $k + 97;

        print("Karnaughova mapa pre funkciu ");
        printf("<b>%c</b> : \n", $id_funkcia);
        print("<table align=\"" . $zarovnaj . "\" border=\"2\">\n");
        FillTable($lines, $columns, $id, $id_funkcia, $id_druh);
        print("</table>\n<br>\n");
    }
}
