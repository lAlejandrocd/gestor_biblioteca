<?php

session_start();

include("../../../global/conexion.php");

$ID_Ad = $_SESSION["ID_Ad"];

if (empty($_SESSION["ID_Ad"])) {

    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../../index.php';</script>";
} else { ?>

<?php

    $usu_id = $_POST['usu_id'];
    $nombre_completo = $_POST['usu_nombre_cmplt'];
    $email = $_POST['usu_email'];
    $password = $_POST['usu_clave'];

    $query = mysqli_query($con, "SELECT * FROM usuarios WHERE usu_id = '$usu_id'");

    if (mysqli_num_rows($query) > 0 ) {

        $data = 1;

        print json_encode($data, JSON_UNESCAPED_UNICODE);
       

    }else{

        $sql = mysqli_query($con, "INSERT INTO usuarios (usu_id, usu_nombre_cmplt, usu_email, usu_clave)VALUES('$usu_id', '$nombre_completo' , '$email', '$password')");

        $select = mysqli_query($con, "SELECT * FROM usuarios ORDER BY usu_id DESC LIMIT 1");
        
        $data = mysqli_fetch_assoc($select);

        print json_encode($data, JSON_UNESCAPED_UNICODE);

    
    }

    mysqli_close($con);
    

?>

<?php } ?>