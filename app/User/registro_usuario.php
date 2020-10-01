<?php


include('../../global/conexion.php');

if (isset($_POST['btn-register'])) {

    $usu_id = $_POST['usu_id'];
    $usu_nombre_cmplt = $_POST['usu_nombre_cmplt'];
    $email = $_POST['usu_email'];
    $clave = $_POST['usu_clave'];
    //$clavehash = password_hash($clave, PASSWORD_BCRYPT);
    //$clavehash = password_hash($clave, PASSWORD_DEFAULT);

    $insert = mysqli_query($con, "INSERT INTO usuarios(usu_id,usu_nombre_cmplt,usu_email,usu_clave) VALUES ('$usu_id', '$usu_nombre_cmplt', '$email' , '$clave')") or die("Problemas al insertar" . mysqli_error($con));

    if (!$insert) {

        die("Query failed");
    }

    echo "<script>alert('Registro exitoso')</script>";
    header("Location: ../../login_user.php");
    
    

    
}



?>

