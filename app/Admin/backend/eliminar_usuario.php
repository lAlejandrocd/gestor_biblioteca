<?php 

session_start();

include("../../../global/conexion.php");
$IDAd = $_SESSION['ID_Ad'];
if (empty($_SESSION['ID_Ad'])) {
    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../../index.php';</script>";

}else{ ?>

<?php 

$usu_id = $_POST['usu_id'];

$sql = mysqli_query($con, "DELETE FROM usuarios WHERE usu_id = '$usu_id'");

$consola = $sql;

print json_encode($consola, JSON_UNESCAPED_UNICODE);


mysqli_close($con);

?>


<?php } ?>



