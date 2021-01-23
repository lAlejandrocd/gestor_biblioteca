<?php

    session_start();
    include("../../../global/conexion.php");

    $IDAd = $_SESSION['ID_Ad'];

    if (empty($_SESSION['ID_Ad'])) {

    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../../index.php';</script>";

    }else{ ?> 

    <?php 

        $correo = $_POST['usu_email'];
        $asunto = $_POST['asunto'];
        $mensaje = $_POST['mensaje'];
        $ID = $_POST['ID'];

    require '../src/Exception.php';
    require '../src/PHPMailer.php';
    require '../src/SMTP.php';



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
            $f =  "Se ha aceptado la autorización";
            json_encode($f);
            print $f;

    } catch (Exception $e) {
        $f = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        json_encode($f);
        print $f;
    
    }

        $query_delete = mysqli_query($con, "DELETE FROM solicitud_prestamo WHERE ID = '$ID'");

        $f =  "Se ha rechazado el prestamo de la carpeta...";
        json_encode($f);
        print $f;

    
    ?>
    
        


<?php } ?> 

    
