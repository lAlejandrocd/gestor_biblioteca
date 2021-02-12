<?php 

session_start();
include ("../../../global/conexion.php");

$IDAd = $_SESSION['ID_Ad'];
if (empty($_SESSION['ID_Ad'])) {
    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../../index.php';</script>";
}else{ ?>


<?php

    if (isset($_POST['ca_codigo_carpeta'])) {

        $ca_codigo_carpeta = $_POST['ca_codigo_carpeta'];
    } else {

        $ca_codigo_carpeta = "";
    }

    if (isset($_POST['ca_nombre_carpeta'])) {

        $ca_nombre_carpeta = $_POST['ca_nombre_carpeta'];
    }else{

        $ca_nombre_carpeta = $_POST['ca_nombre_carpeta'];

    }

    if (isset($_POST['ca_numero_folios'])) {
        

        $ca_numero_folios = $_POST['ca_numero_folios'];
    }else{

        $ca_numero_folios = "";

    }

    if (isset($_POST['ca_estado_carpeta'])) {

        $ca_estado_carpeta = $_POST['ca_estado_carpeta'];
    }else{

       $ca_estado_carpeta = "";

    }

    if (isset($_POST['ca_tipo_carpeta'])) {
       
        $ca_tipo_carpeta = $_POST['ca_tipo_carpeta'];
    }else{

        $ca_tipo_carpeta = "";
    }

    $query = mysqli_query($con, "SELECT * FROM carpetas WHERE ca_codigo_carpeta = '$ca_codigo_carpeta'");

    
    if (mysqli_num_rows($query) > 0) {

        $data = 1;

        print json_encode($data, JSON_UNESCAPED_UNICODE);

        mysqli_close($con);
        
    }else{

        $sql = mysqli_query($con, "INSERT INTO carpetas(ca_codigo_carpeta, ca_nombre_carpeta, ca_numero_folios, ca_estado_carpeta, ca_tipo_carpeta)VALUES ('$ca_codigo_carpeta', '$ca_nombre_carpeta', '$ca_numero_folios', '$ca_estado_carpeta', '$ca_tipo_carpeta')");

        $select = mysqli_query($con, "SELECT * FROM carpetas ORDER BY ca_codigo_carpeta DESC LIMIT 1");

        $data = mysqli_fetch_assoc($select);

        print json_encode($data, JSON_UNESCAPED_UNICODE);

        mysqli_close($con);

    }


?>

<?php } ?>
