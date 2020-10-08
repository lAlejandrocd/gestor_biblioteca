<?php

session_start();
include("../../global/conexion.php");

if (empty($_SESSION['ID_Ad'])) {
    echo "<script> alert('Usuario no existe');
 		window.location.href='../../login_admin.php';</script>";
} else { ?> 

<?php

    //var_dump($ID);

    if (isset($_POST['btn-submit'])) {

        $ID = $_POST['ID'];

        $query = mysqli_query(
            $con,
            "SELECT * FROM carpetas_modificadas WHERE ID = '$ID'"
        );

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

        // echo "<script> alert('AUTORIZACIÓN COMPLETA');
 	    //     window.location.href='gestor.php';</script>";


       mysqli_close($con);
    }

    //$ID = $_POST['ID'];
    $correo = $_POST['usu_email'];
    $mensaje = $_POST['mensaje'];
    //$cm_codigo_carpeta = $_POST['cm_codigo_carpeta'];


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
        $mail->Subject = 'Modificación de carpeta.';
        $mail->Body    = $mensaje;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();

        

        //echo 'Message has been sent';
        echo "<script> alert('Enviado correctamente.');
 	    window.location.href='gestor.php';</script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

?> 

<?php } ?>