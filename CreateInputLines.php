<?
function CreateInputLines($howmany)
{
    for ($k = 0; $k < $howmany; $k++) {
        $id_funkcia = $k + 97; //97 je ASCII kod znaku 'a', sluzi na identifikaciu poli

        print("<br>\n");
        print("<b>Jednotkové body pre funkciu ");
        printf("\"%c\" : </b> %c() = {\n", $id_funkcia, $id_funkcia);

        print("<input type=\"text\" name=\"");
        printf("%c_", $id_funkcia);
        print("\" value=\"\" size=\"50\">\n");

        print(" ( <input type=\"text\" name=\"");
        printf("%cx_", $id_funkcia);
        print("\" value=\"\" size=\"10\"> ) }\n");

        print("<br>\n");
    }
}
