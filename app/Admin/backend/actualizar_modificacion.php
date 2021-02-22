<?php

session_start();
include("../../../global/conexion.php");
$ID_Ad = $_SESSION["ID_Ad"];
if (empty($_SESSION["ID_Ad"])) {
    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../../index.php';</script>";
} else { ?>

<?php

    $ID = $_POST['ID'];
    $ca_codigo_carpetaEditMd = $_POST['ca_codigo_carpetaEditMd'];
    $usu_idEditMd = $_POST['usu_idEditMd'];
    $fechaEditMd = $_POST['fechaEditMd'];

    $update_md = mysqli_query($con, "UPDATE carpetas_modificadas SET cm_codigo_carpeta ='$ca_codigo_carpetaEditMd', cm_id_usuario ='$usu_idEditMd', cm_fecha = '$fechaEditMd' WHERE ID = '$ID'");

    $data = 1;

    print json_encode($data, JSON_UNESCAPED_UNICODE);

    mysqli_close($con);

?>

<?php } ?>


