<?php

require_once 'db.php';

if(isset($_POST['id']))
{
    $table_name = $_POST['table_name'];
    $value = rtrim($_POST['value']);
    $column_name = $_POST['column_name'];
    $id = $_POST['id'];
    $id_column_name = $_POST['id_column_name'];
    
    $sql = "UPDATE $table_name SET $column_name = :value WHERE $id_column_name = :id;";
    $query= $db->prepare($sql);
    $query->bindParam('value',$value);
    $query->bindParam('id',$id);
    
    if($query->execute())
    {
        echo "UPDATE SUCESSFULL";
    } else echo "Failure";
    
} else print_r($_POST);

?>
