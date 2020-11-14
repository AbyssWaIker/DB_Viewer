<?php 
function connect_to_db($dbname, $username, $password)
{
    try
    {
    $db = NEW PDO("mysql:host=localhost;dbname=$dbname",$username,$password);
    }
    catch(PDOException $e)
    {
        echo "<script src='js/scripts.js'></script>
              <script>
                notify('Error: $e->getMessage()');
              </script>";
        header("Location: /db/login.php");
        exit();
    }
    return $db;
}

if (session_id() == "")
  session_start();
if(!isset($_SESSION['database_name'])||!isset($_SESSION['encr_username'])||!isset($_SESSION['encr_password'])) die("no cookies are found");

$username= $_SESSION['encr_username'] ^ session_id();
$password = $_SESSION['encr_password'] ^ session_id();
$db = connect_to_db($_SESSION['database_name'],$username,$password);
?>
