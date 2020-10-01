<?php

session_start();

include("../../global/conexion.php");

if (empty($_SESSION['ID_Ad'])) {
    echo "<script> alert('Usuario no existe');
 		window.location.href='../../login_admin.php';</script>";
} else { ?>

<?php

    $ID = $_POST['ID'];
    $correo = $_POST['usu_email'];
    $mensaje = $_POST['mensaje'];
    $cm_codigo_carpeta = $_POST['cm_codigo_carpeta'];


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
        $mail->Subject = 'Mensaje automatico';
        $mail->Body    = $mensaje;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();


        $delete_crpt = mysqli_query($con, "DELETE FROM carpetas_modificadas WHERE cm_id_usuario = '$ID' AND cm_codigo_carpeta = '$cm_codigo_carpeta'");

        mysqli_close($con);

        

        //echo 'Message has been sent';
         echo "<script> alert('Enviado correctamente.');
 	     window.location.href='gestor.php';</script>";

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    


    // echo "<script> alert('Enviado correctamente.');
 	// window.location.href='gestor.php';</script>";

?>


<?php } ?>
 