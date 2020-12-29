<?php

session_start();

include("../../../global/conexion.php");

$ID_Ad = $_SESSION["ID_Ad"];

if (empty($_SESSION["ID_Ad"])) {

    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../../index.php';</script>";
} else { ?>

<?php

    if (isset($_POST['btn-register'])) {

        $cedula = $_POST['usu_id'];
        $nombre_completo = $_POST['usu_nombre_cmplt'];
        $email = $_POST['usu_email'];
        $password = $_POST['usu_clave'];

        $sql = mysqli_query($con, "INSERT INTO usuarios (usu_id, usu_nombre_cmplt, usu_email, usu_clave)VALUES('$cedula', '$nombre_completo' , '$email', '$password')");

        if (!empty($sql)) {

            echo "<script> alert('Registro Completo');
 		                window.location.href='../index.php';</script>";
        } else {

            echo "<script> alert('Error de registro');
 		                window.location.href='../registrar_usuario.php';</script>";
        }
    }

?>

<?php } ?>