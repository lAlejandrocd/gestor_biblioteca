<?php

session_start();
include("../../../global/conexion.php");

$IDAd = $_SESSION['ID_Ad'];
if (empty($_SESSION['ID_Ad'])) {

    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../../index.php';</script>";
} else { ?>


    <?php

    $id_usuario = $_POST['id_usuario'];
    $codigo_carpeta = $_POST['codigo_carpeta'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_final = $_POST['fecha_final'];


    $sql = mysqli_query($con, "SELECT * FROM carpetas_prestadas WHERE id_usuario = '$id_usuario' AND codigo_carpeta = '$codigo_carpeta'");


    if ($row = mysqli_num_rows($sql) > 0) {

        $data =  "Ya se ha aceptado el prestamo";
        json_encode($data);
        print $data;

    } else {     

        $query = mysqli_query($con, "INSERT INTO carpetas_prestadas(ID,id_usuario,codigo_carpeta,fecha_inicio,fecha_final) VALUES (NULL, '$id_usuario', '$codigo_carpeta','$fecha_inicio','$fecha_final')");

        $update_carpt = mysqli_query($con, "UPDATE carpetas SET ca_estado_carpeta = 'ocupado' WHERE ca_codigo_carpeta = '$codigo_carpeta'");

        if ($query == true) {

            $data =  "Autorización de prestamo completada";
            json_encode($data);
            print $data;

        
        }
    }

    ?>
    

<?php } ?>