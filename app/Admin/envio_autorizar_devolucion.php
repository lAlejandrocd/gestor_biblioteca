<?php 

session_start();
include("../../global/conexion.php");
$ID_Ad = $_SESSION["ID_Ad"];
if (empty($_SESSION["ID_Ad"])) {
    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../index.php';</script>";

}else { ?>

    <?php 

        if (isset($_POST['btn-submit'])) {

            $dc_codigo_carpeta = $_POST['dc_codigo_carpeta'];
            $usu_id = $_POST['usu_id'];
            $usu_email = "lalejandrocd1@gmail.com";
            //$usu_email = $_POST['usu_email'];
            $asunto = $_POST['asunto'];

        require 'src/Exception.php';
        require 'src/PHPMailer.php';
        require 'src/SMTP.php';

        $mensaje = $_POST['mensaje'];
        $correo = "lalejandrocd1@gmail.com";

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

            $update = mysqli_query($con, "UPDATE carpetas SET ca_estado_carpeta = 'disponible' WHERE ca_codigo_carpeta = '$dc_codigo_carpeta' ");


            $delete_devolucion = mysqli_query($con, "DELETE FROM devolucion_carpeta WHERE dc_codigo_carpeta = '$dc_codigo_carpeta' AND dc_id_usuario = '$usu_id'");

            $delete_prestamo = mysqli_query($con, "DELETE FROM carpetas_prestadas WHERE id_usuario = '$usu_id' AND codigo_carpeta = '$dc_codigo_carpeta'");



            //echo 'Message has been sent';
            echo "<script> alert('Se ha Enviado al usuario y autorizado su devolución.');
 	    window.location.href='gestor.php';</script>";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    } else {

        echo "<script> alert('Error...');
 	    window.location.href='../../gestor.php';</script>";
    }

        
    ?>
  
<?php } ?>



