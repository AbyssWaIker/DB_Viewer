<?php
require_once('db.php');
if(!isset($_SESSION['database_name'])) die("no database is set");

$database_name = $_SESSION['database_name'];

$start = $db->prepare("USE $database_name;");
if(!$start->execute())
{
    die("can't use $database_name database");
}


$sql = "SELECT table_name FROM information_schema.tables
        WHERE table_schema = '$database_name';";
        
$html = "<div class='text-center bg-12 md-12 sm-12 d-flex justify-content-center' id='select_table'>\n";
$html .= "<button class='btn btn-success' onclick='check_table()'>просмотреть</button>\n";
$html .=  "<input type='number' id='limit' value='100' name='limit'  min='0' max='10000' size='5'> \n";
$html .=  "<label for='limit'><abbr title='ноль = все'>записей в таблице</abbr></label>\n";
$html .= "<select id='table_names' name='tables'>\n";
foreach($db->query($sql ) as $row) 
{
    $html .= "<option value='{$row['table_name']}'>{$row['table_name']}</option>\n";
}
$html .= "</select>\n";
$html .= "</div>\n";

echo $html;
?>
