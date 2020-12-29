<?php 

session_start();
include("../../../global/conexion.php");
$user_id = $_SESSION["id"];

if (empty($_SESSION["id"])) {

    echo "<script> alert('No es posible acceder a esta página');
 		window.location.href='../../../index.php';</script>";

}else{ ?> 


<?php

    if (isset($_POST['btn-devolver'])) {

        $user_id = $_POST['user_id'];
        $codigo_carpeta = $_POST['ca_codigo_carpeta'];

        $query = mysqli_query($con, "SELECT dc_codigo_carpeta, dc_id_usuario FROM devolucion_carpeta WHERE dc_id_usuario = '$user_id'");

        $row_dc = mysqli_fetch_assoc($query);

        $codigo_devolucion = $row_dc['dc_codigo_carpeta'];

        $dc_id_usuario = $row_dc['dc_id_usuario'];

        if($user_id == $dc_id_usuario && $codigo_carpeta == $codigo_devolucion) {

            echo "<script> alert('Ya se ha enviado la solicitud de devolución.');
 		                window.location.href='../index.php';</script>";


        }else{

            $user_id = $_POST['user_id'];
            $codigo_carpeta = $_POST['ca_codigo_carpeta'];

            $sql = mysqli_query($con, "SELECT * FROM usuarios WHERE usu_id = '$user_id'");

            $row = mysqli_fetch_assoc($sql);

            $nombre_usuario = $row['usu_nombre_cmplt'];

            //$correo = $row['usu_email'];

            require '../src/Exception.php';
            require '../src/PHPMailer.php';
            require '../src/SMTP.php';

            $correo = "lalejandrocd1@gmail.com";

            //$asunto = $_POST['asunto'];


            $mensaje = '<html lang="en">
                            <head>
                                <meta charset="UTF-8">
                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                <title>Document</title>
                            </head>
                            <body>

                                    <p> El usuario ' . $nombre_usuario . ' ha solicitado una devolución a la carpeta número: ' . $codigo_carpeta . '.</p>
    
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
                $mail->Subject = "Solicitud devolucion de carpeta";
                $mail->Body    = $mensaje;
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                $mail->send();

                $insert = mysqli_query($con, "INSERT INTO devolucion_carpeta (ID, dc_codigo_carpeta, dc_id_usuario, dc_fecha_devolucion) VALUES (NULL, '$codigo_carpeta', '$user_id', NOW())");

                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

            echo "<script> alert('Se ha enviado la solicitud al administrador.');
 		                window.location.href='../index.php';</script>";
        }



    }

    

?>

<?php } ?>