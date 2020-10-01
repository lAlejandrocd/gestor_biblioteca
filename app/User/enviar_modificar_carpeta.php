<?php

session_start();

include('../../global/conexion.php');

$usu_id = $_SESSION["id"];


if (empty($_SESSION["id"])) {

    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../index.php';</script>";
} else {

?>

    <?php 

    if (isset($_POST['btn-submit'])) {

        $cm_codigo_carpeta = $_POST['cm_codigo_carpeta'];
        $cm_folios_agregados = $_POST['cm_folios_agregados'];
       
    }
    
    $query_insert = mysqli_query($con, "INSERT INTO carpetas_modificadas(ID, cm_codigo_carpeta, cm_folios_agregados, cm_fecha, cm_id_usuario) VALUES(NULL, '$cm_codigo_carpeta', '$cm_folios_agregados', NOW() , '$usu_id')");

    if (!$query_insert) {

        die("Query failed");
    }

    echo "<script> alert('La modificación será autorizada por el administrador');
 	window.location.href='gestor.php';</script>";
  

    ?>



<?php } ?>