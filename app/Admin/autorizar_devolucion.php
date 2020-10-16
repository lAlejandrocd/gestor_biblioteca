<?php 

session_start();
include("../../global/conexion.php");
$ID_Ad = $_SESSION["ID_Ad"];

if (empty($_SESSION["ID_Ad"])) {
    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../index.php';</script>";
}else { ?>
  
  <?php 
  
    if (isset($_POST['btn-aceptar'])) {

        echo "<script> alert('aceptar');
 	window.location.href='devolucion_carpetas.php';</script>";

    }



    
  
  ?>








<?php } ?>


