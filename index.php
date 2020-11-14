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

session_start();
if(!isset($_SESSION['database_name'])||!isset($_SESSION['encr_username'])||!isset($_SESSION['encr_password'])) 
{
    echo "<script>
            notify('Error: No data is entered');
          </script>";
    header('Location: login.php');
    exit();
}
?>
<div class="navbar">
<?php
include('php/tablelist.php');
?>
<button class="btn btn-danger" onclick="exit()">Exit</button>
</div>
<div><div id='here_goes_the_table'/> <div>

<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/scripts.js"></script>

</body>
