<?php

    session_start();
    include("../../global/conexion.php");

    $IDAd = $_SESSION['ID_Ad'];

    if (empty($_SESSION['ID_Ad'])) {

    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../index.php';</script>";

    }else{ ?> 

        <?php 

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


        $query_delete = mysqli_query($con, "DELETE FROM solicitud_prestamo WHERE ID = '$ID'");

        if ($query == true) {

        //     echo "<script> alert('Autorización de prestamo completa.');
 	    // window.location.href='gestor.php';</script>";
        }
    

    ?>
    
        


<?php } ?> 

    
