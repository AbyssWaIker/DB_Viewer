<?php 
function connect_to_db($dbname, $username, $password)
{
    try
    {
        $db = NEW PDO("mysql:host=localhost;dbname=$dbname",$username,$password);
    }
    catch(PDOException $e)
    {
        if(isset($_COOKIE['login_error'])) setcookie ("login_error", "", time() - 3600);
        setcookie('login_error', $e->getMessage());
        header("Location: ../login.php");
        exit();
    }
    return $db;
}

if(!isset($_COOKIE['database_name'])||!isset($_COOKIE['username'])||!isset($_COOKIE['password'])) die("no cookies are found");
$db = connect_to_db($_COOKIE['database_name'], $_COOKIE['username'], $_COOKIE['password']);
?>
