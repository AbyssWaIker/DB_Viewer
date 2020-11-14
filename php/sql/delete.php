<?php

require_once 'db.php';

if(!isset($_POST['id']))
{
    echo 'Error with provided data';
    print_r($_POST);
    die();
}

$table_name = $_POST['table_name'];
$id = $_POST['id'];
$id_column_name = $_POST['id_column_name'];
    
$sql = "DELETE FROM $table_name WHERE $id_column_name = :id LIMIT 1;";
$query= $db->prepare($sql);
$query->bindParam('id',$id);


if(!$query->execute())
{
    $err = $query->errorInfo();
    $message = "Error#$err[0];\n$err[2]";
    echo $message ;
    die();
}
echo "UPDATE SUCCESFULL";
    
?>
