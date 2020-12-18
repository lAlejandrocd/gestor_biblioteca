<?php

session_start();
include ("../../../global/conexion.php");

$usu_id = $_SESSION["id"];


if (empty($_SESSION["id"])) {
    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../index.php';</script>";
}else{ ?>

    <?php


    if (isset($_POST['ca_codigo_carpeta'])) {
        $ca_codigo_carpeta = $_POST['ca_codigo_carpeta'];
        
    }else{
        $ca_codigo_carpeta = '';

    }

    if (isset($_POST['ca_nombre_carpeta'])) {
        $ca_nombre_carpeta = $_POST['ca_nombre_carpeta'];
    } else {
        $ca_nombre_carpeta = '';
    }

    if (isset($_POST['ca_numero_folios'])) {
        $ca_numero_folios = $_POST['ca_numero_folios'];
    } else {
        $ca_numero_folios = '';
    }

    if (isset($_POST['ca_estado_carpeta'])) {
        $ca_estado_carpeta = $_POST['ca_estado_carpeta'];
    } else {
        $ca_estado_carpeta = '';
    }

    if (isset($_POST['ca_tipo_carpeta'])) {
        $ca_tipo_carpeta = $_POST['ca_tipo_carpeta'];
    } else {
        $ca_tipo_carpeta = '';
    }

    


    

    
    
    ?>


<?php } ?>






