<?php 
function connect_to_db($dbname, $username, $password)
{
    try
    {
        $db = NEW PDO("mysql:host=localhost;dbname=$dbname",$username,$password);
    }
    catch(PDOException $e)
    {
        if(isset($_SESSION['login_error'])) setcookie ("login_error", "", time() - 3600);
        setcookie('login_error', $e->getMessage());
        header("Location: ../login.php");
        exit();
    }
    return $db;
}

if (session_id() == "")
  session_start();
if(!isset($_SESSION['database_name'])||!isset($_SESSION['username'])||!isset($_SESSION['password'])) die("no cookies are found");
$db = connect_to_db($_SESSION['database_name'], $_SESSION['username'], $_SESSION['password']);
?>
