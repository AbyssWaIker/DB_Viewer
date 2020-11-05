<?php
if(!isset($_POST['database_name'])||!isset($_POST['username'])||!isset($_POST['password']))
{
    if(isset($_COOKIE['login_error'])) setcookie ("login_error", "", time() - 3600);
    setcookie('login_error', "No data is entered");
    header("Location: ../login.php");;
    exit();
}

// if (isset($_POST['database_name'])||isset($_POST['username'])||isset($_POST['password']))
// {
//     setcookie ("database_name", "", time() - 3600);
//     setcookie ("username", "", time() - 3600);
//     setcookie ("password", "", time() - 3600);
// }

$options = array();
$options['samesite'] = 'lax';
$options['path'] = '/db/';

setcookie('database_name', $_POST['database_name'],$options);
setcookie('username', $_POST['username'],$options);
setcookie('password', $_POST['password'],$options);


echo "everything is fine";
header("Location: ../index.php");
exit();

?>
