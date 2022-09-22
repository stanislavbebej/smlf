<?
print("<td width=\"50\" height=\"50\" align=\"center\">\n");
print("<select name=\"");
printf("%c_", $id_function);
print($id[$ident]);
print("\">\n");
print("
<option value=\"0\" selected>0</option>\n
<option value=\"1\">1</option>\n
<option value=\"x\">x</option>\n");
print("</select>\n");
print("</td>\n");
