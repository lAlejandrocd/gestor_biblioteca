<?php 

session_start();

include("../../../global/conexion.php");

$IDAd = $_SESSION['ID_Ad'];
if (empty($_SESSION['ID_Ad'])) {

    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../index.php';</script>";
}else{ ?>

<?php

    $edusu_id = $_POST['edusu_id'];
    $edusu_nombre_cmplt = $_POST['edusu_nombre_cmplt'];
    $edusu_email = $_POST['edusu_email'];
    $edusu_clave = $_POST['edusu_clave'];

    $sql = mysqli_query($con, "UPDATE usuarios SET usu_nombre_cmplt = '$edusu_nombre_cmplt', usu_email = '$edusu_email', usu_clave = '$edusu_clave' WHERE usu_id = '$edusu_id'");

    // $select = mysqli_query($con, "SELECT * FROM usuarios WHERE usu_id = '$edusu_id'");

    // $data_e = mysqli_fetch_assoc($select);

    $data_e = 1;

    print json_encode($data_e, JSON_UNESCAPED_UNICODE);

    mysqli_close($con);

?>

<?php } ?>



