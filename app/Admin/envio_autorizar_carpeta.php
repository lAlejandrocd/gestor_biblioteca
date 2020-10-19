<?php

session_start();
include("../../global/conexion.php");

$IDAd = $_SESSION['ID_Ad'];
if (empty($_SESSION['ID_Ad'])) {

    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../index.php';</script>";
} else { ?>


    <?php

    if (isset($_POST['btn-submit'])) {

        $ID = $_POST['ID'];
        $pc_id_usuario = $_POST['pc_id_usuario'];
        $pc_codigo_carpt = $_POST['pc_codigo_carpt'];
        $pc_fecha_final = $_POST['pc_fecha_final'];

        $correo = $_POST['usu_email'];
        $mensaje = $_POST['mensaje'];
        $asunto = $_POST['asunto'];

        
    }

    $sql = mysqli_query($con, "SELECT * FROM carpetas_prestadas WHERE id_usuario = '$pc_id_usuario' AND codigo_carpeta = '$pc_codigo_carpt'");


    if ($row = mysqli_num_rows($sql) > 0) {

        echo "<script> alert('Ya se ha aceptado el prestamo. ');
 	window.location.href='gestor.php';</script>";
    } else {


        $correo = $_POST['usu_email'];
        $mensaje = $_POST['mensaje'];
        $asunto = $_POST['asunto'];

    require 'src/Exception.php';
    require 'src/PHPMailer.php';
    require 'src/SMTP.php';



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
        $mail->Username   = 'lalejandrocd1@gmail.com';                     // SMTP username
        $mail->Password   = 'dwyyvxykhmsvykap';                               // SMTP password

        //Recipients
        $mail->setFrom('lalejandrocd1@gmail.com', 'Luis Alejandro Ceron Delgado');

        //La siguiente linea, se repite N cantidad de veces como destinarios tenga
        $mail->addAddress($correo, $correo);     // Add a recipient


        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $asunto;
        $mail->Body    = $mensaje;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();

        //echo 'Message has been sent';
         echo "<script> alert('Enviado correctamente.');
 	     window.location.href='gestor.php';</script>";

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    // echo "<script> alert('Enviado correctamente.');
 	// window.location.href='gestor.php';</script>";

        $update_carpt = mysqli_query($con, "UPDATE carpetas SET ca_estado_carpeta = 'ocupado' WHERE ca_codigo_carpeta = '$pc_codigo_carpt'");

        $query = mysqli_query($con, "INSERT INTO carpetas_prestadas(ID,id_usuario,codigo_carpeta,fecha_final) VALUES (NULL, '$pc_id_usuario', '$pc_codigo_carpt', '$pc_fecha_final')");


        $query_delete = mysqli_query($con, "DELETE FROM solicitud_prestamo WHERE ID = '$ID'");

        if ($query == true) {

        //     echo "<script> alert('Autorización de prestamo completa.');
 	    // window.location.href='gestor.php';</script>";
        }
    }

    ?>
    

<?php } ?>