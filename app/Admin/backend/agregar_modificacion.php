<?php

session_start();
include("../../../global/conexion.php");
$ID_Ad = $_SESSION["ID_Ad"];
if (empty($_SESSION["ID_Ad"])) {
    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../../index.php';</script>";
} else { ?>

<?php

    $cm_numero_item = $_POST['cm_numero_item'];
    $cm_id_usuario = $_POST['cm_id_usuario'];
    $cm_folios_agregados = $_POST['cm_folios_agregados'];
    $cm_fecha = $_POST['cm_fecha'];

    // $query = mysqli_query(
    //     $con,
    //     "SELECT * FROM carpetas_modificadas WHERE ID = '$ID'"
    // );

    // $row = mysqli_fetch_array($query);
    // $cm_codigo_carpeta = $row['cm_codigo_carpeta'];
    // $cm_folios_agregados = $row['cm_folios_agregados'];


    // Consulta del código de la carpeta para realizar la modificación
    // $query_crpt = mysqli_query($con, "SELECT * FROM carpetas WHERE ca_codigo_carpeta = '$cm_numero_item'");

    // $row_crpt = mysqli_fetch_array($query_crpt);
    // $ca_codigo_carpeta = $row_crpt['ca_codigo_carpeta'];
    // $ca_numero_folios = $row_crpt['ca_numero_folios'];

    // $total = $ca_numero_folios + $cm_folios_agregados;

    // Consulta para agregar los folios agregados con sus datos correspondientes a la tabla carpetas_modificadas.
    $insert_crpt = mysqli_query($con, "INSERT INTO carpetas_modificadas(ID,cm_numero_item,cm_id_usuario,cm_folios_agregados,cm_fecha)VALUES(NULL,'$cm_numero_item','$cm_id_usuario','$cm_folios_agregados','$cm_fecha')");

    // Consulta para actualizar la cantidad total de folios agregados.
    $update_crpt = mysqli_query($con, "UPDATE carpetas SET ca_numero_folios='$cm_folios_agregados' WHERE ca_numero_item = '$cm_numero_item'");


    // $insert_history = mysqli_query($con, "INSERT INTO historial_modificaciones(hm_ID, hm_id_usuario, hm_codigo_carpeta, hm_tipo_modificacion, hm_fecha) VALUES (NULL, '$id_usuario', '$cm_codigo_carpeta', 'modificado', NOW() )");

    // $delete_crpt = mysqli_query($con, "DELETE FROM carpetas_modificadas WHERE ID = '$ID'");

    // $ID = $_POST['ID'];

    $select = mysqli_query($con, "SELECT * FROM carpetas_modificadas ORDER BY cm_numero_item DESC LIMIT 1");

    $data = mysqli_fetch_assoc($select);

    print json_encode($data, JSON_UNESCAPED_UNICODE);

    mysqli_close($con);

?> 
    


<?php } ?>