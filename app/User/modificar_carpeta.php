<?php

session_start();
include('../../global/conexion.php');

$usu_id = $_SESSION["id"];

if (empty($_SESSION["id"])) {

    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../index.php';</script>";
} else {
?>

    <?php include("../../templates/user/header_user.php");

    $sql = mysqli_query($con, "SELECT codigo_carpeta FROM carpetas_prestadas WHERE id_usuario = '$usu_id'");



    ?>


    <div class="container">
        <div class="jumbotron text-center">
            <h1 class="display-8">Agregar modificaciones.</h1>
            <br>
            <form method="POST" action="enviar_modificar_carpeta.php">
                <!-- <div class="form-group row">
                    <label for="inputCodigocarpeta" class="col-sm-2 col-form-label">Codigo carpeta</label>
                    <div class="col-sm-10">
                        <input type="number" REQUIRED class="form-control" id="inputEmail3" name="cm_codigo_carpeta" value="">
                    </div>
                </div> -->
                <div class="form-group row">
                    <label for="my-select" class="col-sm-2 col-form-label">Código carpeta</label>
                    <div class="col -sm-10">
                        <select id="my-select" class="custom-select" name="cm_codigo_carpeta">
                            <?php

                            while ($carpeta = mysqli_fetch_assoc($sql)) { ?>

                                <option value="<?php echo $carpeta['codigo_carpeta']; ?>"><?php echo $carpeta['codigo_carpeta']; ?></option>

                            <?php  } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Folios agregados.</label>
                    <div class="col-sm-10">
                        <input type="number" REQUIRED class="form-control" name="cm_folios_agregados" value="">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" name="btn-submit">Enviar Modificación.</button>
                    </div>
                </div>
            </form>


        </div>
    </div>

    <?php include("../../templates/user/footer_user.php") ?>



<?php } ?>