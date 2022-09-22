<?
function CreatePreview($FillTable_input)
{
    include "CreateTableAttributes.php"; //vyhodnocuje premenne $table_properties[0], $table_properties[1], $field_identification

    CreateTable($_POST['num_functions'], $table_properties[0], $table_properties[1], $field_identification, $FillTable_input);
}
