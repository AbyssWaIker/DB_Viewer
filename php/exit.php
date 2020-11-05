<?php 

$_SESSION = array();
// уничтожение куки с идентификатором сессии
if (session_id() != "" || isset($_COOKIE[session_name()]))
    setcookie(session_name(), '', time()-2592000, '/');
session_destroy();

header("Location: ../login.php");;
exit();
?>
