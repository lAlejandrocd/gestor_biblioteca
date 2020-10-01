<?php
include('../../global/conexion.php');
session_start();
if (isset($_POST['btn-login'])){

    $user = $_POST['usu_id'];
    $password = $_POST['usu_clave'];

}


$q = mysqli_query($con, "SELECT * FROM usuarios WHERE usu_id = '$user' AND usu_clave = '$password'");


if($fila = mysqli_fetch_assoc($q)){ 
  $_SESSION["id"]=$fila["usu_id"];
  
  $q_history_user= mysqli_query($con, "INSERT INTO historial_sesion (ID,hs_usuario_id, hs_fecha) VALUES (NULL, '$user', NOW())");

	header("location: gestor.php"); 
} 
else{ 
  echo "<script> alert('Usuario no existe');
 		window.location.href='../../login_user.php';</script>";
  // header("location: index.php");
}
