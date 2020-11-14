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
?>
