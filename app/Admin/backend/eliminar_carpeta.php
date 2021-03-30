<?php 

session_start();
include("../../../global/conexion.php");
$IDAd = $_SESSION['ID_Ad'];
if (empty($_SESSION['ID_Ad'])) {
    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../../index.php';</script>";
}else{ ?>

<?php

    $ca_numero_item = $_POST['ca_numero_item'];

    $sql = mysqli_query($con, "DELETE FROM carpetas WHERE ca_numero_item = '$ca_numero_item'");

    mysqli_close($con);
    

?>


<?php } ?>



