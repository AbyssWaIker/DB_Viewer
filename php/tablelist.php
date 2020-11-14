<?php
include('sql/select_tablelist.php');
        
$html = "<div class='text-center bg-12 md-12 sm-12 d-flex justify-content-center' id='select_table'>\n";
$html .= "<button class='btn btn-success' onclick='check_table()'>просмотреть</button>\n";
$html .= "<select id='table_names' name='tables'>\n";
foreach($db->query($sql) as $row) 
{
    $html .= "<option value='{$row['table_name']}'>{$row['table_name']}</option>\n";
}
$html .= "</select>\n";
$html .=  "<label for='tables'>таблицу. &nbsp;&nbsp;</label>\n";
$html .=  "<label for='limit'><abbr title='ноль = все'>Лимит</abbr></label>\n";
$html .=  "<input type='number' id='limit' value='100' name='limit'  min='0' max='10000' size='5'> \n";
$html .= "</div>\n";

echo $html;
?>
