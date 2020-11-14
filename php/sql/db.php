<?php 
function connect_to_db($dbname, $username, $password)
{
    try
    {
    $db = NEW PDO('mysql:host=localhost;dbname='.$dbname,$username,$password);
    }
    catch(PDOException $e)
    {
        setcookie ('login_error',"Error while connecting to database:\n$e->getMessage()",['samesite' => 'Lax']);
        header('Location: /db/login.php');
        exit();
    }
    return $db;
}

if (session_id() == "")
  session_start();
if(!isset($_SESSION['database_name'])||!isset($_SESSION['encr_username'])||!isset($_SESSION['encr_password'])) 
{
    setcookie ('login_error','No data is entered',['samesite' => 'Lax']);
    header('Location: /db/login.php');
    die('No data is entered');
}

$username= $_SESSION['encr_username'] ^ session_id();
$password = $_SESSION['encr_password'] ^ session_id();
$db = connect_to_db($_SESSION['database_name'],$username,$password);
?>
