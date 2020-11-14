<?php

echo '<tr id="rowToInsert">';
for($i=0;$i<count($columns);$i++) //начинаем с 1 потому что на нуле id, который мы не хотим показывать
{
    echo 
        "<td> 
            <div 
            contenteditable='true' class='".$table_name." ".$columns[$i]." insert'></div>
        </td>";
}
echo "<td> 
            <button class='btn btn-success' onclick='insert_in_db()'>вставить</button>
            <button class='btn btn-danger' onclick='hide_new_row()'>отмена</button>
      </td>";
echo '</tr>';

?>
