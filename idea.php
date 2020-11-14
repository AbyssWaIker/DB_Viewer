<?php
//программа, которая может просмотреть (и редактировать) данные в любой базе данных
$host='localhost';
$dbname='NWind';
$username='test';
$password='test';

$db = NEW PDO("mysql:host=$host;dbname=$dbname",$username,$password);

$table_name = 'OrderList';
$LIMIT = 100;

$result = $db->query("SELECT * FROM $table_name LIMIT $LIMIT");

$all = $result->fetchAll();//вся таблица

$col = $all[0];//первая запись, из которой вытащатся названия колонок

$columns = array();

foreach($col AS $key=>$value)//вытаскиваем названия колонок
{
    if(is_string($key))
    {
        $columns[] = $key;
    }
}

echo "<table border='1'>";

for($i=0;$i<count($columns);$i++) //пишем названия колонок
{
    echo "<th>$columns[$i]</th>";
}

for($x=0;$x<count($all);$x++)//пишем содержимое таблицы
{
    echo '<tr>';
    for($y=0;$y<count($columns);$y++) 
    {
        echo "<td> <div>".$all[$x][$y]."</div> </td>";
    }
    echo '</tr>';
}

echo "</table>";
?>



