
<?php

session_start();

include('../../global/conexion.php');

$usu_id = $_SESSION["id"];

if (empty($_SESSION["id"])) {

    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../index.php';</script>";
} else {

?>

<?php

    include("../../global/conexion.php");

    //Traemos datos del usuario solicitante para usarlos en el envio de email.

    $datos_usuario = mysqli_query($con, "SELECT * FROM usuarios WHERE usu_id = '$usu_id'");

    $row_user = mysqli_fetch_array($datos_usuario);

    $nombre_usuario = $row_user['usu_nombre_cmplt'];

   


    //Condicional validando la existencia del nombre del botón. 
    //Dentro de este condicional se ejecuta toda la operación de validación de los datos. 
    if (isset($_POST['btn-send'])) {

        $codigo_carpeta = $_POST['pc_codigo_carpt'];

        $fecha_final = $_POST['pc_fecha_final'];

        $verifi_isset_crpt = mysqli_query($con, "SELECT * FROM carpetas WHERE ca_codigo_carpeta = '$codigo_carpeta'");

        $row_isset_crpt = mysqli_num_rows($verifi_isset_crpt);

        $nombre_carpeta = $row_isset_crpt['ca_nombre_carpeta'];

        //var_dump($row_isset_crpt);

        //Verificamos la existencia de la carpeta con el código de la carpeta, si es así entonces ejecuta las demás validaciones. 
        if ($row_isset_crpt > 0) {

            //Query para verificar si el usuario tiene en poseción la carpeta que está solicitando. 
            $query_verif_carpt_prst = mysqli_query($con, "SELECT * FROM carpetas_prestadas WHERE id_usuario = '$usu_id' AND codigo_carpeta = '$codigo_carpeta'");

            //validamos si el número de columnas es mayor a 0 dependiendo de la consulta anterior. 
            //Si es mayor a 0 entonces lanza un alert y re ubica al usuario en una página en específico. 
            if ($row_verif_carpt_prst = mysqli_num_rows($query_verif_carpt_prst) > 0) {

                echo "<script> alert('tienes esta carpeta en tu pocesión.');
 		    window.location.href='solicitar_carpeta.php';</script>";
            } else {

                //En caso de que no tenga en pocesión la carpeta, entonces valida la existencia de una solicitud de prestamo. 
                $query_verif = mysqli_query($con, "SELECT * FROM solicitud_prestamo WHERE pc_id_usuario = '$usu_id' AND pc_codigo_carpt = '$codigo_carpeta'");

                //Si hay una solicitud de prestamo, entonces nofifica a la persona y re direcciona. 
                if ($row_verif = mysqli_num_rows($query_verif) > 0) {

                    echo "Ya hay una solicitud disponible.";
                    echo "<script> alert('Ya hay una solicitud disponible, el administrador te informará el rechazo o autorización del prestamo. .');
                  window.location.href='solicitar_carpeta.php';</script>";

                    //Ejecutamos sentencia else en caso de que no haya una solicitud, agrega la solicitud a una tabla en concreto. 
                } else {

                    $query_prst_carpeta = mysqli_query($con, "INSERT INTO solicitud_prestamo (ID, pc_id_usuario,pc_codigo_carpt, pc_fecha_inicio, pc_fecha_final) VALUES (NULL, '$usu_id', '$codigo_carpeta', NOW(), '$fecha_final')");

                    //Si no está vacío el query insertado, entonces notifica que se ha enviado su solicitud. 
                    if (!empty($query_prst_carpeta)) {


                        require 'src/Exception.php';
                        require 'src/PHPMailer.php';
                        require 'src/SMTP.php';

                        $correo = "lalejandrocd1@gmail.com";

                        //$asunto = $_POST['asunto'];
                        //$mensaje = "El usuario $nombre_usuario ha solicitado un prestamo a la carpeta $nombre_carpeta.";

                        $mensaje = '<html lang="en">
                            <head>
                                <meta charset="UTF-8">
                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                <title>Document</title>
                            </head>
                            <body>

                                    <p> El usuario ' . $nombre_usuario . ' ha solicitado un prestamo a la carpeta número: ' . $codigo_carpeta . ' hasta el día ' . $fecha_final . '.</p>
    
                            </body>
                            </html>';

                        $mail = new PHPMailer\PHPMailer\PHPMailer(true);

                        try {
                            //Server settings
                            $mail->SMTPDebug = 2;                                       // Enable verbose debug output
                            $mail->isSMTP();                                            // Set mailer to use SMTP
                            $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                            $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                            $mail->Port       = 587;                                    // TCP port to connect to


                            //https://support.google.com/mail/answer/185833?hl=es-419 POR ACA INGRESAN PARA CREAR LA CLAVE DE LA APP
                            $mail->Username   =  'lalejandrocd1@gmail.com';                     // SMTP username
                            $mail->Password   = 'dwyyvxykhmsvykap';                               // SMTP password

                            //Recipients
                            $mail->setFrom('lalejandrocd1@gmail.com', 'Luis Alejandro Ceron Delgado');

                            //La siguiente linea, se repite N cantidad de veces como destinarios tenga
                            $mail->addAddress($correo, $correo);     // Add a recipient


                            // Content
                            $mail->isHTML(true);                                  // Set email format to HTML
                            $mail->Subject = "Solicitud prestamo de carpeta";
                            $mail->Body    = $mensaje;
                            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                            $mail->send();

                            echo 'Message has been sent';
                        } catch (Exception $e) {
                            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                        }

                        echo "<script> alert('Se ha enviado la solicitud al administrador.');
 		                window.location.href='solicitar_carpeta.php';</script>";
                    } else {

                        echo "<script> alert('Error al solicitar el prestamo.');
 		                window.location.href='solicitar_carpeta.php';</script>";
                    }
                }
            }

        }else{
            
                echo "<script> alert('Está carpeta no existe. ');
 		        window.location.href='solicitar_carpeta.php';</script>";

        }
  
    }


?>




<?php } ?>



