<?php

require_once 'db.php';

if(!isset($_POST['table_name']))
{
    print_r($_POST);
    die();
}


$table_name = $_POST['table_name'];
$ArrayLength = $_POST['ArrayLength'];
$tablenames = $_POST['tablenames'];
$values = $_POST['insert_values'];

//    "INSERT INTO table_name (column1, column2, column3, ...)
//    VALUES (value1, value2, value3, ...); "
$sql = "INSERT INTO $table_name ($tablenames[0]";

for($i=1;$i<$ArrayLength;$i++)
{
    $sql .= ',';
    $sql .= "$tablenames[$i]";
}
$sql .=") VALUES (:$tablenames[0]";
for($i=1;$i<$ArrayLength;$i++)
{
    $sql .= ',';
    $sql .= ":$tablenames[$i]";
}
$sql .=');';
$query= $db->prepare($sql);
for($i=0;$i<$ArrayLength;$i++)
{
    $query->bindParam(":$tablenames[$i]",$values[$i]);
}
    
if(!$query->execute())
{
    $err = $query->errorInfo();
    $message = "Error#$err[0];\n$err[2]";
    echo $message ;
    die();
}
echo "UPDATE SUCCESFULL";


?>
