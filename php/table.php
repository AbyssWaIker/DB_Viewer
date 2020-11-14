<?php

include('sql/select_table.php');

$col = $all[0];
$columns = array();


foreach($col AS $key=>$value)
{
    if(is_string($key))
    {
        $columns[] = $key;
    }
}

echo "<table id='theTable' class='text-center'>";

echo "<caption id='table_name'>".strtoupper($table_name)."</caption>";
for($i=0;$i<count($columns);$i++) 
{
    echo "<th>$columns[$i]</th>";
}

echo "<th onclick='show_new_row()' id='plus'>+</th>";

include('table_elements/row_to_insert.php');

for($x=0;$x<count($all);$x++)
{
    echo '<tr>';
    for($y=0;$y<count($columns);$y++) 
    {
        echo 
        "<td> 
            <div 
            contenteditable='true'  
            onclick='activate(this)'
            onBlur='update_in_db(this)'
            class='".$table_name." ".$columns[$y]." ".$all[$x][0]." ".$columns[0]."'>
            ".$all[$x][$y]."
            </div>
        </td>";
        /*классы 1)имя таблицы sql 2) имя изменяемой колнки 3)id 4)имя колонки id*/
    }
    include('table_elements/delete_button.php');
    echo '</tr>';
}

echo "</table>";

?>
