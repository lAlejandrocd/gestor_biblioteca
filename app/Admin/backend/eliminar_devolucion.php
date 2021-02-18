<?php

session_start();
include("../../../global/conexion.php");
$ID_Ad = $_SESSION["ID_Ad"];
if (empty($_SESSION["ID_Ad"])) {
    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../../index.php';</script>";
} else { ?>

    <?php 

    $IDDev = $_POST['IDDev'];

    $sql = mysqli_query($con, "DELETE FROM devolucion_carpeta WHERE ID = '$IDDev'");

    mysqli_close($con);

    
        
    
    ?>


<?php } ?>