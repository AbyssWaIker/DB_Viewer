<?php

require_once 'db.php';

if(!isset($_POST['id']))
{
    print_r($_POST);
    die();
}


$table_name = $_POST['table_name'];
$value = trim($_POST['value']);
$column_name = $_POST['column_name'];
$id = $_POST['id'];
$id_column_name = $_POST['id_column_name'];

$sql = "UPDATE $table_name SET $column_name = :value WHERE $id_column_name = :id LIMIT 1;";
$query= $db->prepare($sql);
$query->bindParam('value',$value);
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
