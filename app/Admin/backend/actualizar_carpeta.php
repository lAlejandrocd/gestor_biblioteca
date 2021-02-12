<?php 

session_start();
include("../../../global/conexion.php");
$IDAd = $_SESSION['ID_Ad'];
if (empty($_SESSION['ID_Ad'])) {
    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../../index.php';</script>";
}else{  ?>

<?php

    $edit_ca_codigo_carpeta = $_POST['edit_ca_codigo_carpeta'];
    $edit_ca_nombre_carpeta = $_POST['edit_ca_nombre_carpeta'];
    $edit_ca_numero_folios = $_POST['edit_ca_numero_folios'];
    $edit_ca_estado_carpeta = $_POST['edit_ca_estado_carpeta'];
    $edit_ca_tipo_carpeta = $_POST['edit_ca_tipo_carpeta'];

    $query = mysqli_query($con, "SELECT * FROM carpetas WHERE ca_codigo_carpeta = '$edit_ca_codigo_carpeta'");

    if (mysqli_num_rows($query) > 0) {

        $data = 1;

        print json_encode($data, JSON_UNESCAPED_UNICODE);

        mysqli_close($con);
        
    }else{


        $sql = mysqli_query($con, "UPDATE carpetas SET ca_nombre_carpeta = '$edit_ca_nombre_carpeta', ca_numero_folios = '$edit_ca_numero_folios', ca_estado_carpeta = '$edit_ca_estado_carpeta', ca_tipo_carpeta = '$edit_ca_tipo_carpeta' WHERE  ca_codigo_carpeta = '$edit_ca_codigo_carpeta'");

        $select = mysqli_query($con, "SELECT * FROM carpetas WHERE ca_codigo_carpeta = '$edit_ca_codigo_carpeta'");

        $data = mysqli_fetch_assoc($select);

        print json_encode($data, JSON_UNESCAPED_UNICODE);

        mysqli_close($con);


    }



?>


<?php } ?>



