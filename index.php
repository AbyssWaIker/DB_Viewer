<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DB viewer</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php
if(!isset($_COOKIE['database_name'])||!isset($_COOKIE['username'])||!isset($_COOKIE['password'])) 
{
    setcookie('login_error', "Please, enter database data");
    header('Location: login.php');
    exit();
}

setcookie('login_error',"", time() - 3600) 
?>

<?php
include('php/tablelist.php');
?>
<div class="table_container"><div id='here_goes_the_table'/> <div>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/scripts.js"></script>

</body>
