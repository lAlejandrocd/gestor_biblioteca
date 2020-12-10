<?php
include('../../global/conexion.php');
session_start();

  $id_admin = (isset($_POST['id_admin'])) ? $_POST['id_admin'] : '';
//  if (isset($_POST['id_admin'])) {

//  $id_admin = $_POST['id_admin'];

//  }else{

//  $id_admin = '';

//  }

$admin_password =(isset($_POST['admin_password'])) ? $_POST['admin_password'] : '';

  // if (isset($_POST['admin_password'])) {

  //   $admin_password = $_POST['admin_password'];
  //   $adpassword = md5($admin_password);
    
  // }else{

  //   $admin_password = '';

  // }
  
  $adpassword = md5($admin_password);


$q = mysqli_query($con , "SELECT * FROM administrador WHERE id_admin = '$id_admin' AND admin_password = '$adpassword'");

$row = mysqli_num_rows($q);

if($row >= 1){

  $data = mysqli_fetch_assoc($q);

  $_SESSION["ID_Ad"]=$data["id_admin"];

  //$q_history_user= mysqli_query($con, "INSERT INTO historial_sesion (ID,hs_usuario_id, hs_fecha) VALUES (NULL, '$user', NOW())");

  //header("location: gestor.php");
  
}else{
 
  //echo "<script> alert('Usuario no existe');
 	//window.location.href='../../login_admin.php';</script>";
  //header("location: index.php");
  $_SESSION["ID_Ad"] = null;
  $data = null;
  
}

print json_encode($data);
//print json_encode($data, JSON_UNESCAPED_UNICODE);

mysqli_close($con);
