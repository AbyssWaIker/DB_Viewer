<?php
session_start();
if(!isset($_POST['database_name'])||!isset($_POST['username'])||!isset($_POST['password']))
{
    if(isset($_SESSION['login_error'])) $_SESSION['login_error'] = "No data is entered";
    header("Location: ../login.php");;
    exit();
}

if (isset($_SESSION['database_name'])||isset($_SESSION['username'])||isset($_SESSION['password']))
{
    $_SESSION = array();
    // уничтожение куки с идентификатором сессии
    if (session_id() != "" || isset($_COOKIE[session_name()]))
        setcookie(session_name(), '', time()-2592000, '/');
    session_destroy();
}

$_SESSION['database_name'] = $_POST['database_name'];
$_SESSION['username'] = $_POST['username'];
$_SESSION['password'] = $_POST['password'];


echo "everything is fine";
header("Location: ../index.php");
exit();

?>
