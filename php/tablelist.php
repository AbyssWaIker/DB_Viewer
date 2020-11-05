<?php
require_once('db.php');
if(!isset($_COOKIE['database_name'])) die("no database is set");

$database_name = $_COOKIE['database_name'];

$start = $db->prepare("USE $database_name;");
if(!$start->execute())
{
    die("can't use $database_name database");
}


$sql = "SELECT table_name FROM information_schema.tables
        WHERE table_schema = '$database_name';";
        
$html = "<div class='text-center bg-12 md-12 sm-12 d-flex justify-content-center' id='select_table'>\n";
$html .= "<label for='limit'>Просмотреть </label>\n";
$html .=  "<input type='number' id='limit' value='100' name='limit'  min='0' max='10000' size='5'> \n";
$html .=  "<label for='limit'><abbr title='ноль = все'>записей</abbr></label>\n";
$html .= "<label for='table_names'>в таблице </label>\n";
$html .= "<select id='table_names' name='tables'>\n";
foreach($db->query($sql ) as $row) 
{
    $html .= "<option value='{$row['table_name']}'>{$row['table_name']}</option>\n";
}
$html .= "</select>\n";
$html .= "<button class='btn btn-success' onclick='check_table()'>просмотреть</button>\n";
$html .= "</div>\n";

echo $html;
?>
