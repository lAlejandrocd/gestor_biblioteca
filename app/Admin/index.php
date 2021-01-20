<?php

session_start();
include('../../global/conexion.php');

$ID_Ad = $_SESSION["ID_Ad"];

if (empty($_SESSION["ID_Ad"])) {

    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../index.php';</script>";
} else {
?>


    <?php include("templates/header_admin.php"); ?>



    <!-- <a href="vista_usuarios.php" class="btn btn-primary" name="btn-send">Lista usuarios</a>
        <a href="historial_sesion.php" class="btn btn-dark" name="btn-send">Historial de sesion.</a>
        <a href="solicitud_carpetas.php" class="btn btn-primary" name="btn-send">Solicitud prestamo</a>
        <br><br>
        <a href="modificacion_carpetas.php" class="btn btn-dark" name="btn-send">Modificación carpetas</a>
        <a href="registrar_usuario.php" class="btn btn-primary" name="btn-send">Registrar usuario</a>
        <a href="devolucion_carpetas.php" class="btn btn-dark" name="btn-send">Devoluciones</a> -->


    <div class="" id="content">



        <section class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <h1 class="font-weight-bold mb-0">Gestor de carpetas.</h1>
                    </div>
                    <div class="col-lg-3 d-flex">
                        <button class="btn btn-primary  align-self-center" type="button" name="agregar" id="agregar">Agregar carpeta</button>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="display" id="carpetas" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Código carpeta</th>
                                    <th>Nombre de carpeta</th>
                                    <th>Número de folios </th>
                                    <th>Estado carpeta</th>
                                    <th>Tipo de carpeta</th>
                                    <th>Options</th>

                                </tr>
                            </thead>
                            <tbody>



                                <?php

                                $sql = mysqli_query($con, "SELECT * FROM carpetas");

                                while ($row = mysqli_fetch_assoc($sql)) { ?>

                                    <tr>
                                        <td><?php echo $row['ca_codigo_carpeta']; ?></td>
                                        <td><?php echo $row['ca_nombre_carpeta']; ?></td>
                                        <td><?php echo $row['ca_numero_folios']; ?></td>
                                        <td><?php echo $row['ca_estado_carpeta']; ?></td>
                                        <td><?php echo $row['ca_tipo_carpeta']; ?></td>
                                        <td></td>
                                    </tr>

                                <?php } ?>


                            </tbody>

                        </table>
                    </div>
                </div>
            </div>


    </div>

    <!-- Modal editar carpeta -->
    <div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Modaltitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                </div>
                <form id="FormCarpetaEdit">
                    <div class="modal-body">
                        <div class="form-group">
                            <input class="form-control" type="hidden" name="edit_ca_codigo_carpeta" id="edit_ca_codigo_carpeta">
                        </div>
                        <div class="form-group">
                            <label for="edit_ca_nombre_carpeta">Nombre de carpeta</label>
                            <input class="form-control" type="text" name="edit_ca_nombre_carpeta" id="edit_ca_nombre_carpeta" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_ca_numero_folios">Número de folios</label>
                            <input class="form-control" type="number" name="edit_ca_numero_folios" id="edit_ca_numero_folios" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_ca_estado_carpeta">Estado de carpeta</label>
                            <input class="form-control" type="text" name="edit_ca_estado_carpeta" id="edit_ca_estado_carpeta" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_ca_tipo_carpeta">Tipo de carpeta</label>
                            <input class="form-control" type="text" name="edit_ca_tipo_carpeta" id="edit_ca_tipo_carpeta" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit" name="btnEditar">Editar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </section>



    <!-- Modal agregar carpeta -->
    <div id="agregar_carpeta" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Modaltitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                </div>
                <form id="Form_carpeta">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="ca_codigo_carpeta">Código carpeta</label>
                            <input class="form-control" type="number" name="ca_codigo_carpeta" id="ca_codigo_carpeta" required>
                        </div>
                        <div class="form-group">
                            <label for="ca_nombre_carpeta">Nombre carpeta</label>
                            <input class="form-control" type="text" name="ca_nombre_carpeta" id="ca_nombre_carpeta" required>
                        </div>
                        <div class="form-group">
                            <label for="ca_numero_folios">Número folios</label>
                            <input class="form-control" type="number" name="ca_numero_folios" id="ca_numero_folios" required>
                        </div>
                        <div class="form-group">
                            <label for="ca_estado_carpeta">Estado carpeta</label>
                            <input class="form-control" type="text" name="ca_estado_carpeta" id="ca_estado_carpeta" required>
                        </div>
                        <div class="form-group">
                            <label for="ca_tipo_carpeta">Tipo carpeta</label>
                            <input class="form-control" type="text" name="ca_tipo_carpeta" id="ca_tipo_carpeta" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit" name="" id="">Guardar carpeta</button>
                        </div>
                </form>
            </div>
        </div>
    </div>







    </div>

    <?php include("templates/footer_admin.php"); ?>

<?php } ?>