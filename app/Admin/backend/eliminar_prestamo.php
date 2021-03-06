<?php

session_start();
include("../../../global/conexion.php");

$IDAd = $_SESSION['ID_Ad'];
if (empty($_SESSION['ID_Ad'])) {

    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../../index.php';</script>";
} else { ?>

<?php

    $IDeliminar = $_POST['IDeliminar'];
    $numero_itemEliminar = $_POST['numero_itemEliminar'];

    

    // 1 Corresponde al estado de la carpeta -> disponible.
    $update = mysqli_query($con, "UPDATE carpetas SET ca_estado_carpeta =1 WHERE ca_numero_item = '$numero_itemEliminar'");

    $delete = mysqli_query($con, "DELETE FROM carpetas_prestadas WHERE ID = '$IDeliminar'");

    mysqli_close($con);



?>


<?php } ?>