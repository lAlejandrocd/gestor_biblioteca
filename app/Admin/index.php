<?php

session_start();
include('../../global/conexion.php');

$ID_Ad = $_SESSION["ID_Ad"];

if (empty($_SESSION["ID_Ad"])) {

    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../index.php';</script>";
} else {
?>


    <?php include("templates/header_admin.php"); ?>
    
        <a href="buscar_carpeta.php" class="btn btn-dark" name="btn-send">Buscar carpeta</a>
        <a href="vista_usuarios.php" class="btn btn-primary" name="btn-send">Lista usuarios</a>
        <a href="historial_sesion.php" class="btn btn-dark" name="btn-send">Historial de sesion.</a>
        <a href="solicitud_carpetas.php" class="btn btn-primary" name="btn-send">Solicitud prestamo</a>
        <br><br>
        <a href="modificacion_carpetas.php" class="btn btn-dark" name="btn-send">Modificación carpetas</a>
        <a href="registrar_usuario.php" class="btn btn-primary" name="btn-send">Registrar usuario</a>
        <a href="devolucion_carpetas.php" class="btn btn-dark" name="btn-send">Devoluciones</a>

    <?php include("templates/footer_admin.php"); ?>

<?php } ?>