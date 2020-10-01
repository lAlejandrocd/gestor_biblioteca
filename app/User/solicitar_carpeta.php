<?php

session_start();

include('../../global/conexion.php');

$usu_id = $_SESSION["id"];


if (empty($_SESSION["id"])) {

    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../index.php';</script>";
} else {

?>

    <?php include("../../templates/header.php");

    ?>



    <?php

    $query_count = mysqli_query($con, "SELECT codigo_carpeta FROM carpetas_prestadas WHERE id_usuario = '$usu_id'");

    $rw = mysqli_num_rows($query_count);

    //echo $rw;

    if ($rw <= 2) { ?>

        <div class="container">
            <div class="jumbotron text-center">
                <h1 class="display-8">Solicitud de carpeta</h1>
                <br>
                <form method="POST" action="enviar_solicitud_carpeta.php">
                    <div class="form-group row">
                        <label for="inputCodigocarpeta" class="col-sm-2 col-form-label">Codigo carpeta</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputEmail3" name="pc_codigo_carpt" REQUIRED>
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" name="usu_email" REQUIRED value="" placeholder="Escribe el correo electrónico del destinatario">
                        </div>
                    </div> -->
                    <!-- <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Asunto</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" name="asunto" REQUIRED>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Contenido</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" aria-label="With textarea" name="contenido" placeholder="..." required></textarea>
                        </div>
                    </div> -->
                    <div class="form-group row">
                        <label for="inputdatetime-local" class="col-sm-2 col-form-label">Fecha final</label>
                        <div class="col-sm-10">
                            <input type="datetime-local" name="pc_fecha_final" class="form-control" REQUIRED>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="btn-send">Enviar autorización.</button>
                        </div>
                    </div>
                </form>


            </div>
        </div>


    <?php } else { ?>

        <div class="container">
            <div class="jumbotron text-center">
                <div class="alert alert-success" role="alert">
                    Tienes un cupo máximo de 10 carpetas.
                </div>
            </div>
        </div>

    <?php  } ?>



<?php } ?>