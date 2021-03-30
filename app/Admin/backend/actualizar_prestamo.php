<?php

session_start();
include("../../../global/conexion.php");

$IDAd = $_SESSION['ID_Ad'];
if (empty($_SESSION['ID_Ad'])) {

    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../../index.php';</script>";
} else { ?>

<?php

    $IDEdit = $_POST['IDEdit'];
    $id_usuarioEdit = $_POST['id_usuarioEdit'];
    $numero_itemEdit = $_POST['numero_itemEdit'];
    $fecha_inicioEdit = $_POST['fecha_inicioEdit'];
    $fecha_finalEdit = $_POST['fecha_finalEdit'];

    $sql = mysqli_query($con, "UPDATE carpetas_prestadas SET id_usuario ='$id_usuarioEdit', numero_item = '$numero_itemEdit', fecha_inicio ='$fecha_inicioEdit' , fecha_final = '$fecha_finalEdit' WHERE ID = '$IDEdit'");

    $data= 1;

    print json_encode($data, JSON_UNESCAPED_UNICODE);

    mysqli_close($con);


?>



<?php } ?>