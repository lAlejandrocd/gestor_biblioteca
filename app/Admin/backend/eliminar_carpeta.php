<?php 

session_start();
include("../../../global/conexion.php");
$IDAd = $_SESSION['ID_Ad'];
if (empty($_SESSION['ID_Ad'])) {
    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../../index.php';</script>";
}else{ ?>

<?php

    $ca_codigo_carpeta = $_POST['ca_codigo_carpeta'];

    $sql = mysqli_query($con, "DELETE FROM carpetas WHERE ca_codigo_carpeta = '$ca_codigo_carpeta'");

    mysqli_close($con);
    

?>


<?php } ?>



