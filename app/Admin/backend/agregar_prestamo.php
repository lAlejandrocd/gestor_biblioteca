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
    $numero_item = $_POST['numero_item'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_final = $_POST['fecha_final'];

    $consulta_carpetas = mysqli_query($con,"SELECT * FROM carpetas WHERE ca_numero_item = '$numero_item'");

   $row_consulta = mysqli_num_rows($consulta_carpetas);
    
   if ($row_consulta > 0 ) {

        $sql = mysqli_query($con, "SELECT * FROM carpetas_prestadas WHERE id_usuario = '$id_usuario' AND numero_item = '$numero_item'");


        if ($row = mysqli_num_rows($sql) > 0) {

            $data =  "Ya se ha aceptado el prestamo";
            json_encode($data);
            print $data;
        } else {

            $query = mysqli_query($con, "INSERT INTO carpetas_prestadas(ID,id_usuario,numero_item,fecha_inicio,fecha_final) VALUES (NULL, '$id_usuario', '$numero_item','$fecha_inicio','$fecha_final')");

            // Número 2 corresponde al estado de carpeta -> ocupado.
            $update_carpt = mysqli_query($con, "UPDATE carpetas SET ca_estado_carpeta = 2 WHERE ca_numero_item = '$numero_item'");

            if ($query) {

                $data =  "Autorización de prestamo completada";
                json_encode($data);
                print $data;
            }
        }
    
    }else{

        $data =  "El número de item de la carpeta es inválido o no existe.";
        json_encode($data);
        print $data;

    }
       
     
   

    



    mysqli_close($con);

    ?>
    

<?php } ?>