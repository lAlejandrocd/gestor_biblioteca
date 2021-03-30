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
    $dc_numero_item_Editdev = $_POST['dc_numero_item_Editdev'];
    $usu_idEditdev = $_POST['usu_idEditdev'];
    $fechaEditdev = $_POST['fechaEditdev'];

    $query = mysqli_query($con, "UPDATE devolucion_carpeta SET dc_numero_item = '$dc_numero_item_Editdev' , dc_usuario = '$usu_idEditdev', dc_date = '$fechaEditdev' WHERE ID = '$IDEditDev'");

    // $select = mysqli_query($con, "SELECT * FROM devolucion_carpeta WHERE ID = '$IDEditDev'");

    $data = 1;

    print json_encode($data, JSON_UNESCAPED_UNICODE);

    mysqli_close($con);






    ?>

<?php } ?>
