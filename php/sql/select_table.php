<?php 
require_once('db.php');
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
if(sizeof($all)==0)
{
    echo "Table is empty";
    die();
}
?>
