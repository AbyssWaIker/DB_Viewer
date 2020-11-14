<?php
session_start();
if(!isset($_POST['database_name'])||!isset($_POST['username'])||!isset($_POST['password']))
{
    setcookie('login_error','no data is recieved',['samesite' => 'Lax']);
    header("Location: ../login.php");;
    exit();
}
$_SESSION['database_name'] = $_POST['database_name'];
$_SESSION['encr_username'] = $_POST['username'] ^ session_id();
$_SESSION['encr_password'] = $_POST['password'] ^ session_id();


header("Location: ../index.php");
exit();

?>
