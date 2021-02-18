<?php

session_start();

include("../../../global/conexion.php");

$IDAd = $_SESSION['ID_Ad'];
if (empty($_SESSION['ID_Ad'])) {

    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../index.php';</script>";
} else { ?>

    <?php

    $IDEditDev = $_POST['IDEditDev'];
    $ca_codigo_carpetaEditdev = $_POST['ca_codigo_carpetaEditdev'];
    $usu_idEditdev = $_POST['usu_idEditdev'];
    $fechaEditdev = $_POST['fechaEditdev'];

    $query = mysqli_query($con, "UPDATE devolucion_carpeta SET dc_codigo_carpeta = '$ca_codigo_carpetaEditdev' , dc_id_usuario = '$usu_idEditdev', dc_fecha_devolucion = '$fechaEditdev' WHERE ID = '$IDEditDev'");

    // $select = mysqli_query($con, "SELECT * FROM devolucion_carpeta WHERE ID = '$IDEditDev'");

    $data = 1;

    print json_encode($data, JSON_UNESCAPED_UNICODE);

    mysqli_close($con);






    ?>

<?php } ?>
