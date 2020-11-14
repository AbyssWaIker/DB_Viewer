<?php
session_start();
if(!isset($_POST['database_name'])||!isset($_POST['username'])||!isset($_POST['password']))
{
    $_SESSION['login_error'] = "No data is entered";
    header("Location: ../login.php");;
    exit();
}

if (isset($_SESSION['database_name'])||isset($_SESSION['encr_username'])||isset($_SESSION['encr_password']))
{
    $_SESSION = array();
    // уничтожение куки с идентификатором сессии
    if (session_id() != "" || isset($_COOKIE[session_name()]))
        setcookie(session_name(), '', time()-2592000, '/');
    session_destroy();
}

$_SESSION['database_name'] = $_POST['database_name'];
$_SESSION['encr_username'] = $_POST['username'] ^ session_id();
$_SESSION['encr_password'] = $_POST['password'] ^ session_id();


echo "everything is fine";
header("Location: ../index.php");
exit();

?>
