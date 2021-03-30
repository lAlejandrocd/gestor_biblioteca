<?php 

session_start();
include("../../../global/conexion.php");
$ID_Ad = $_SESSION["ID_Ad"];
if (empty($_SESSION["ID_Ad"])) {
    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../../index.php';</script>";

}else { ?>

<?php

    $ca_codigo_carpetadev = $_POST['ca_codigo_carpetadev'];
    $usu_iddev = $_POST['usu_iddev'];
    $dc_date = $_POST['dc_date'];

    $insert = mysqli_query($con, "INSERT INTO devolucion_carpeta(ID, dc_numero_item, dc_usuario, dc_date) VALUES (NULL, '$ca_codigo_carpetadev', '$usu_iddev', '$dc_date')");

    // $update = mysqli_query($con, "UPDATE carpetas SET ca_estado_carpeta = 'disponible' WHERE ca_codigo_carpeta = '$ca_codigo_carpetadev'");

    // $delete_devolucion = mysqli_query($con, "DELETE FROM devolucion_carpeta WHERE dc_codigo_carpeta = '$dc_codigo_carpeta' AND dc_id_usuario = '$usu_id'");

    // Cuando se agrega un prestamo, las carpetas prestadas deben eliminarse de la tabla carpetas prestadas.
    // $delete_prestamo = mysqli_query($con, "DELETE FROM carpetas_prestadas WHERE id_usuario = '$usu_id' AND codigo_carpeta = '$dc_codigo_carpeta'");

    $select = mysqli_query($con, "SELECT * FROM devolucion_carpeta ORDER BY dc_numero_item DESC LIMIT 1");

    $data = mysqli_fetch_assoc($select);

    print json_encode($data, JSON_UNESCAPED_UNICODE);

    mysqli_close($con);

?>

    
  
<?php } ?>



