<?php
include('../../global/conexion.php');
session_start();
if (isset($_POST['btn-login'])){

  $id_admin = $_POST['id_admin'];
  $admin_password = $_POST['admin_password']; 

}


$q = mysqli_query($con, "SELECT * FROM administrador WHERE id_admin = '$id_admin' AND admin_password = '$admin_password'");


if($fila = mysqli_fetch_assoc($q)){ 
  
  $_SESSION["ID_Ad"]=$fila["id_admin"];
  
  //$q_history_user= mysqli_query($con, "INSERT INTO historial_sesion (ID,hs_usuario_id, hs_fecha) VALUES (NULL, '$user', NOW())");

	header("location: gestor.php"); 
} 
else{ 
  echo "<script> alert('Usuario no existe');
 		window.location.href='../../login_admin.php';</script>";
  // header("location: index.php");
}
