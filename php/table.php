<?php

require_once 'db.php';
if(!isset($_POST['table_name'])) die("Please, set the table");

$table_name = $_POST['table_name'];

$sql = "SELECT * FROM $table_name";
if(isset($_POST['limit'])&&$_POST['limit']!=0) 
    $sql .= " LIMIT ".$_POST['limit'];

if(!$result = $db->query($sql))
{
    die("table is empty");
}

$all = $result->fetchAll();
$col = $all[0];

$columns = array();

//echo '<pre>';

foreach($col AS $key=>$value)
{
    if(is_string($key))
    {
        $columns[] = $key;
    }
}

echo "<table id='theTable' border='1' class='text-center bg-12 md-12 sm-12'>";

echo "<caption id='table_name'>".strtoupper($table_name)."</caption>";
for($i=1;$i<count($columns);$i++) //начинаем с 1 потому что на нуле id, который мы не хотим показывать
{
    echo "<th>$columns[$i]</th>";
}

for($x=0;$x<count($all);$x++)
{
    echo '<tr>';
    for($y=1;$y<count($columns);$y++) //начинаем с 1 потому что на нуле id, который мы не хотим показывать
    {
        echo "<td> 
        <div contenteditable='true' class='".$table_name." ".$columns[$y]." ".$all[$x][0]." ".$columns[0]."'  onclick='activate(this)' onBlur='update_in_db(this)'>".$all[$x][$y]."</div>
        </td>";
        /*классы 1)имя таблицы sql 2) имя изменяемой колнки 3)id 4)имя колонки id*/
    }
    echo '</tr>';
}

echo "</table>";
?>
