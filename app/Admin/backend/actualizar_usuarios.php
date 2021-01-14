<?php 

session_start();

include("../../global/conexion.php");

$IDAd = $_SESSION['ID_Ad'];
if (empty($_SESSION['ID_Ad'])) {

    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../index.php';</script>";
}else{ ?>

<?php 

$usu_id = $_POST['editU'];



?>

<?php } ?>



