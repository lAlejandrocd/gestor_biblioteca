<?php 

session_start();
include ("../../../global/conexion.php");

$IDAd = $_SESSION['ID_Ad'];
if (empty($_SESSION['ID_Ad'])) {
    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../../index.php';</script>";
}else{ ?>


<?php

    $ca_codigo_carpeta = $_POST['ca_codigo_carpeta'];
    $ca_nombre_carpeta = $_POST['ca_nombre_carpeta'];
    $ca_fecha_inicial = $_POST['ca_fecha_inicial'];
    $ca_fecha_final = $_POST['ca_fecha_final'];
    $ca_caja = $_POST['ca_caja'];
    $ca_carpeta = $_POST['ca_carpeta'];
    $ca_tomo = $_POST['ca_tomo'];
    $ca_otro = $_POST['ca_otro'];
    $ca_numero_folios = $_POST['ca_numero_folios'];
    $ca_soporte = $_POST['ca_soporte'];
    $ca_frecuencia_consulta = $_POST['ca_frecuencia_consulta'];
    $ca_notas = $_POST['ca_notas'];

    $query = mysqli_query($con, "SELECT * FROM carpetas WHERE ca_codigo_carpeta = '$ca_codigo_carpeta'");

        $sql = mysqli_query($con, "INSERT INTO carpetas(ca_numero_item,ca_codigo_carpeta, ca_nombre_carpeta,ca_fecha_inicial,ca_fecha_final ,ca_caja,ca_carpeta,ca_tomo,ca_otro,ca_numero_folios,ca_soporte ,ca_frecuencia_consulta,ca_notas)VALUES (NULL,'$ca_codigo_carpeta' ,'$ca_nombre_carpeta','$ca_fecha_inicial','$ca_fecha_final','$ca_caja','$ca_carpeta','$ca_tomo','$ca_otro','$ca_numero_folios', '$ca_soporte', '$ca_frecuencia_consulta', '$ca_notas')");

        $select = mysqli_query($con, "SELECT * FROM carpetas ORDER BY ca_codigo_carpeta DESC LIMIT 1");

        $data = mysqli_fetch_assoc($select);

        print json_encode($data, JSON_UNESCAPED_UNICODE);

        mysqli_close($con);

    


?>

<?php } ?>
