
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

    if (empty($_POST['btn-send'])) {

        $codigo_carpeta = $_POST['pc_codigo_carpt'];

        $fecha_final = $_POST['pc_fecha_final'];

        // $correo1 = $_POST['usu_email'];


        $query_verif = mysqli_query($con, "SELECT * FROM solicitud_prestamo WHERE pc_id_usuario = '$usu_id' AND pc_codigo_carpt = '$codigo_carpeta'");

        if ($row_verif = mysqli_num_rows($query_verif) > 0) {

            echo "<script> alert('Ya hay una solicitud disponible, el administrador te informará el rechazo o autorización del prestamo. .');
 		window.location.href='solicitar_carpeta.php';</script>";

        }else {

            $query_prst_carpeta = mysqli_query($con, "INSERT INTO solicitud_prestamo (ID, pc_id_usuario,pc_codigo_carpt, pc_fecha_inicio, pc_fecha_final) VALUES (NULL, '$usu_id', '$codigo_carpeta', NOW(), '$fecha_final')");

            if (!empty($query_prst_carpeta)) {

                echo "<script> alert('Se ha enviado la solicitud al administrador.');
 		        window.location.href='solicitar_carpeta.php';</script>";
            } else {
                echo "<script> alert('Error..';</script>";
            }

        }



        mysqli_close($con);
    }



?>

<?php

    

    require 'src/Exception.php';
    require 'src/PHPMailer.php';
    require 'src/SMTP.php';

    $correo = $_POST['usu_email'];
    $mensaje = "Se ha enviado tu solicitud correctamente.";

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

        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

?>


<?php } ?>



