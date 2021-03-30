<?php

session_start();
include("../../../global/conexion.php");
$ID_Ad = $_SESSION["ID_Ad"];
if (empty($_SESSION["ID_Ad"])) {
    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../../index.php';</script>";
} else { ?>

<?php

    $IDmdeliminar = $_POST['IDmdeliminar'];
    $codigomdeliminar = $_POST['codigomdeliminar'];
    $foliosmdeliminar = $_POST['foliosmdeliminar'];

    // Consulta para traer la carpeta, restaremos el valor de los folios - el valor de la modificación.
    $select = mysqli_query($con, "SELECT * FROM carpetas WHERE ca_codigo_carpeta = '$codigomdeliminar'");

    $row_select = mysqli_fetch_assoc($select);

    $ca_codigo_carpeta = $row_select['ca_codigo_carpeta'];
    $ca_numero_folios = $row_select['ca_numero_folios'];


    $total_resta = $ca_numero_folios - $foliosmdeliminar;

    // Cambiar el número de folios.
    $update = mysqli_query($con, "UPDATE carpetas SET ca_numero_folios = '$total_resta' WHERE ca_codigo_carpeta = '$codigomdeliminar'");


    $delete_crpt = mysqli_query($con, "DELETE FROM carpetas_modificadas WHERE ID = '$IDmdeliminar' AND cm_codigo_carpeta = '$codigomdeliminar'");







    mysqli_close($con);

?>


<?php } ?>
 