<?php
include('../../global/conexion.php');
session_start();

if (isset($_POST['usu_id'])) {
  
  $usu_id = $_POST['usu_id'];

}else{

  $usu_id = "";

}

if (isset($_POST['usu_clave'])) {

  $usu_clave = $_POST['usu_clave'];
  $password = md5($usu_clave);

}else{

  $usu_clave = "";

}


$q = mysqli_query($con, "SELECT * FROM usuarios WHERE usu_id = '$usu_id' AND usu_clave = '$password'");

$row = mysqli_num_rows($q);

if($row >= 1){

  $data = mysqli_fetch_assoc($q);
  $_SESSION["id"]=$data["usu_id"];
  
} 
else{ 
  
  $_SESSION['id']= null;
  $data = null;
  
}

$json = json_encode($data);

print $json;

mysqli_close($con);
