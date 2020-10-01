<?php

session_start();
include("../../global/conexion.php");

if (empty($_SESSION['ID_Ad'])) {
    echo "<script> alert('Usuario no existe');
 		window.location.href='../../login_admin.php';</script>";
} else { ?> 

<?php

    

    if (isset($_POST['btn-autorizar'])) {

        $ID = $_POST['ID'];

        $query = mysqli_query($con, "SELECT * FROM carpetas_modificadas WHERE ID = '$ID'");

        $row = mysqli_fetch_array($query);
        $cm_codigo_carpeta = $row['cm_codigo_carpeta'];
        $cm_folios_agregados = $row['cm_folios_agregados'];


        $query_crpt = mysqli_query($con, "SELECT * FROM carpetas WHERE ca_codigo_carpeta = '$cm_codigo_carpeta'");

        $row_crpt = mysqli_fetch_array($query_crpt);
        $ca_codigo_carpeta = $row_crpt['ca_codigo_carpeta'];
        $ca_numero_folios = $row_crpt['ca_numero_folios'];

        $total = $ca_numero_folios + $cm_folios_agregados;

        $update_crpt = mysqli_query($con, "UPDATE carpetas SET ca_numero_folios='$total' WHERE ca_codigo_carpeta = '$cm_codigo_carpeta'");


        $delete_crpt = mysqli_query($con, "DELETE FROM carpetas_modificadas WHERE ID = '$ID'");

        echo "<script> alert('AUTORIZACIÓN COMPLETA');
 	  window.location.href='gestor.php';</script>";


        mysqli_close($con);
    }


?>


<?php } ?>