<?php
include('../../global/conexion.php');
session_start();

//$id_admin = (isset($_POST['id_admin'])) ? $_POST['id_admin'] : '';
  if (isset($_POST['id_admin'])) {

  $id_admin = $_POST['id_admin'];

  }else{

  $id_admin = '';

  }

//$admin_password =(isset($_POST['admin_password'])) ? $_POST['admin_password'] : '';

   if (isset($_POST['admin_password'])) {

     $admin_password = $_POST['admin_password'];
     $adpassword = md5($admin_password);
    
   }else{

     $admin_password = '';

   }
  
  //$adpassword = md5($admin_password);


$q = mysqli_query($con , "SELECT * FROM administrador WHERE id_admin = '$id_admin' AND admin_password = '$adpassword'");

$row = mysqli_num_rows($q);

if($row >= 1){

  $fila = mysqli_fetch_assoc($q);
  $_SESSION["ID_Ad"]= $fila["id_admin"];

}else{
 
  $_SESSION["ID_Ad"] = null;
  $fila= null;

}

$json = json_encode($fila);

print $json;

mysqli_close($con);
