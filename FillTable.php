<?
function FillTable($rows, $cols, $id, $id_function, $id_kind)
{
    $ident = 0;
    for ($i = 0; $i < $rows; $i++) {
        print("<tr>\n");
        for ($j = 0; $j < $cols; $j++) {
            include $id_kind;
            $ident++;
        }
        print("</tr>\n");
    }
}
