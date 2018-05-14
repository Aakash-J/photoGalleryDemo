<?php
session_start();
session_destroy();

$url = "login.php";

header('Location: '.$url, true, 301);
exit();


//header('Location: '.$url); 
 //echo "<script language='javascript' type='text/javascript'> location.href='login.php' </script>";

?>