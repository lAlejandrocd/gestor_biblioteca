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
    $cm_numero_itemEditMd = $_POST['cm_numero_itemEditMd'];
    $cm_numero_foliosEditMd = $_POST['cm_numero_foliosEditMd'];
    $usu_idEditMd = $_POST['usu_idEditMd'];
    $fechaEditMd = $_POST['fechaEditMd'];

    $update_md = mysqli_query($con, "UPDATE carpetas_modificadas SET cm_numero_item ='$cm_numero_itemEditMd', cm_id_usuario ='$usu_idEditMd', cm_folios_agregados ='$cm_numero_foliosEditMd', cm_fecha = '$fechaEditMd' WHERE ID = '$ID'");

    $update_folios = mysqli_query($con, "UPDATE carpetas SET ca_numero_folios = '$cm_numero_foliosEditMd' WHERE ca_numero_item = '$cm_numero_itemEditMd'");


    $data = 1;

    print json_encode($data, JSON_UNESCAPED_UNICODE);

    mysqli_close($con);

?>

<?php } ?>


