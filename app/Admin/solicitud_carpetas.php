<?php

session_start();
include("../../global/conexion.php");

$IDAd = $_SESSION['ID_Ad'];

if (empty($_SESSION['ID_Ad'])) {

    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../index.php';</script>";
} else { ?>

    <?php include("templates/header_admin.php"); ?>



    <div class="" id="content">
        <section class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <h1 class="font-weight-bold mb-0">Gestor de carpetas - Listado de prestamos</h1>
                    </div>
                    <div class="col-lg-3">
                        <button type="button" name="" id="btnaddPrestamo" class="btn btn-primary" btn-lg btn-block">Registrar prestamo</button>
                    </div>
                </div>
        </section>


        <!-- Section de tabla  -->
        <section class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="display" id="solicitudes">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Id usuario</th>
                                    <th scope="col">Código de carpeta</th>
                                    <th scope="col">Fecha inicio</th>
                                    <th scope="col">Fecha final</th>
                                    <th scope="col">Opciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($con, "SELECT * FROM carpetas_prestadas");

                                while ($row_f = mysqli_fetch_assoc($query)) {   ?>


                                    <tr>
                                        <td><?php echo $row_f['ID']; ?></td>
                                        <td><?php echo $row_f['id_usuario']; ?></td>
                                        <td><?php echo $row_f['codigo_carpeta']; ?></td>
                                        <td><?php echo $row_f['fecha_inicio']; ?></td>
                                        <td><?php echo $row_f['fecha_final']; ?></td>
                                        <td>
                                        </td>
                                    </tr>
                                <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        <!-- Autorizar carpeta -->
        <div id="addPrestamo" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" id="modal-header_prs">
                        <h5 class="modal-title" id="modal-title_prs"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                    </div>
                    <?php

                    $sqldv_c1 = mysqli_query($con, "SELECT * FROM carpetas");

                    $sqldv_c2 = mysqli_query($con, "SELECT * FROM usuarios");

                    ?>

                    <form id="FormAddPrestamo">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="id_usuario">Documento de identidad : </label>
                                <select class="form-control" id="id_usuario">
                                    <?php

                                    while ($sql_row2 = mysqli_fetch_assoc($sqldv_c2)) {  ?>
                                        <option value="<?php echo $sql_row2['usu_id']; ?>"><?php echo $sql_row2['usu_id'] . " - " . $sql_row2['usu_nombre_cmplt']; ?></option>
                                        <small class="form-text text-muted">Este corresponde a la persona que tendrá la carpeta. </small>

                                    <?php  } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="codigo_carpeta">Código de carpeta: </label>
                                <select class="form-control" id="codigo_carpeta">
                                    <?php

                                    while ($sql_row1 = mysqli_fetch_assoc($sqldv_c1)) {  ?>
                                        <option value="<?php echo $sql_row1['ca_codigo_carpeta']; ?>"><?php echo $sql_row1['ca_codigo_carpeta'] . " - " . $sql_row1['ca_nombre_carpeta']; ?></option>

                                    <?php   } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fecha_inicio">Fecha inicio: </label>
                                <input type="date" id="fecha_inicio" name="" class="custom-select custom-select-lg mb-3">
                            </div>
                            <div class="form-group">
                                <label for="fecha_final">Fecha final: </label>
                                <input type="date" id="fecha_final" name="" class="custom-select custom-select-lg mb-3">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" id="btnPrestamo"></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Rechazar carpeta -->
        <div id="EditPrestamo" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" id="modalheader-EditPrstm">
                        <h5 class="modal-title" id="modal-title_Prstm"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                    </div>
                    <?php

                    $sqldv_edit1 = mysqli_query($con, "SELECT * FROM carpetas");

                    $sqldv_edit2 = mysqli_query($con, "SELECT * FROM usuarios");

                    ?>
                    <form id="FormEditPrestamo">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" class="form-control form-control-sm" name="" id="IDEdit" aria-describedby="helpId" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="id_usuarioEdit">Documento de identidad : </label>
                                <select class="form-control" id="id_usuarioEdit">
                                    <?php

                                    while ($sql_row_edit2 = mysqli_fetch_assoc($sqldv_edit2)) {  ?>
                                        <option value="<?php echo $sql_row_edit2['usu_id']; ?>"><?php echo $sql_row_edit2['usu_id'] . " - " . $sql_row_edit2['usu_nombre_cmplt']; ?></option>
                                        <small class="form-text text-muted">Este corresponde a la persona que tendrá la carpeta. </small>

                                    <?php  } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="codigo_carpetaEdit">Código de carpeta: </label>
                                <select class="form-control" id="codigo_carpetaEdit">
                                    <?php

                                    while ($sql_row_edit1 = mysqli_fetch_assoc($sqldv_edit1)) {  ?>
                                        <option value="<?php echo $sql_row_edit1['ca_codigo_carpeta']; ?>"><?php echo $sql_row_edit1['ca_codigo_carpeta'] . " - " . $sql_row_edit1['ca_nombre_carpeta']; ?></option>

                                    <?php   } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fecha_inicio">Fecha inicio: </label>
                                <input type="date" id="fecha_inicioEdit" name="" class="custom-select custom-select-lg mb-3">
                            </div>
                            <div class="form-group">
                                <label for="fecha_final">Fecha final: </label>
                                <input type="date" id="fecha_finalEdit" name="" class="custom-select custom-select-lg mb-3">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" id="btnEditPrestamo"></button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    </div>
    <?php include("templates/footer_admin.php"); ?>

<?php } ?>