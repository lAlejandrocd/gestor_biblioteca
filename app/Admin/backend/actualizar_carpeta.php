<?php 

session_start();
include("../../../global/conexion.php");
$IDAd = $_SESSION['ID_Ad'];
if (empty($_SESSION['ID_Ad'])) {
    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../../index.php';</script>";
}else{  ?>

<?php

    $edit_ca_numero_item = $_POST['edit_ca_numero_item'];
    $edit_ca_nombre_carpeta = $_POST['edit_ca_nombre_carpeta'];
    $edit_ca_fecha_final = $_POST['edit_ca_fecha_final'];
    $edit_ca_numero_folios = $_POST['edit_ca_numero_folios'];

    $sql = mysqli_query($con, "UPDATE carpetas SET ca_nombre_carpeta = '$edit_ca_nombre_carpeta', ca_fecha_final = '$edit_ca_fecha_final', ca_numero_folios = '$edit_ca_numero_folios' WHERE ca_numero_item = '$edit_ca_numero_item'");

    $select = mysqli_query($con, "SELECT * FROM carpetas WHERE ca_numero_item = '$edit_ca_numero_item'");

    $data = mysqli_fetch_assoc($select);

    print json_encode($data, JSON_UNESCAPED_UNICODE);

    mysqli_close($con);


?>


<?php } ?>



