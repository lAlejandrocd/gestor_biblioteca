<?php

session_start();
include("../../global/conexion.php");

if (empty($_SESSION['ID_Ad'])) {
    echo "<script> alert('Usuario no existe');
 		window.location.href='../../login_admin.php';</script>";
} else { ?>



    <?php include("../../templates/header_admin.php");

    if (isset($_POST['btn-autorizar'])) {

        $ID = $_POST['ID'];
        $cm_codigo_carpeta = $_POST['cm_codigo_carpeta'];
        $id_usuario = $_POST['id_usuario'];


        $query = mysqli_query($con, "SELECT * FROM usuarios WHERE usu_id = '$id_usuario'");

        $row = mysqli_fetch_assoc($query);

        $email = $row['usu_email'];
    }



    ?>



    <div class="container">
        <div class="jumbotron text-center">
            <h1 class="display-8">Asunto Autorización de modificación.</h1>
            <form action="backend/envio_modificar.php" method="post">
                <div class="form-group row">
                    <label for="inputCodigocarpeta" class="col-sm-2 col-form-label">Destino</label>
                    <div class="col-sm-10">
                        <input type="email" REQUIRED class="form-control" id="" name="usu_email" value="<?php echo $email; ?>">
                    </div>

                </div>
                <div class="form-group row">
                    <label for="inputCodigocarpeta" class="col-sm-2 col-form-label">Asunto</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" aria-label="With textarea" name="mensaje" placeholder="..."></textarea>
                        <!-- <input type="textarea" REQUIRED class="form-control" id="" name="" value="" placeholder="..."> -->
                    </div>
                </div>
                <div class="col-sm-10">
                    <input type="hidden" REQUIRED class="form-control" id="" name="ID" value="<?php echo $ID; ?>">
                </div>
                <div class="col-sm-10">
                    <input type="hidden" REQUIRED class="form-control" id="" name="cm_codigo_carpeta" value="<?php echo $cm_codigo_carpeta; ?>">
                </div>
                <div class="col-sm-10">
                    <input type="hidden" REQUIRED class="form-control" id="" name="id_usuario" value="<?php echo $id_usuario; ?>">
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" name="btn-submit">Enviar.</button>
                    </div>
                </div>



            </form>
        </div>
    </div>


<?php } ?>