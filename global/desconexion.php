<?php
session_start();
unset ($_SESSION['usuario']);
$_SESSION["conectadp"]==false;
session_destroy(); 
header('Location: index.php');
?>