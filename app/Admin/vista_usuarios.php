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
                        <h1 class="font-weight-bold mb-0">Gestor de carpetas.</h1>
                    </div>
                    <div class="col-lg-3 d-flex">
                        <button class="btn btn-primary  align-self-center" type="button" name="UsuAgregar" id="UsuAgregar">Agregar usuario</button>
                    </div>
                </div>
        </section>

        <section class="py-3">
            <div class="container">
                <div class="row">
                    <!-- col-lg-6 para cambiar el tamaño de tabla. -->
                    <div class="col-lg-12">
                        <div class="jumbotron">
                            <div class="card">
                                <div class="card card-body">
                                    <div class="table responsive">

                                        <?php
                                        $sql = mysqli_query($con, "SELECT * FROM usuarios");

                                        $row_f = mysqli_num_rows($sql);

                                        if ($row_f >= 1) {

                                            while ($row = mysqli_fetch_array($sql)) {

                                                $datos = $row[0] . "||" . $row[1] . "||" . $row[2] . "||" . $row[3];

                                                $ID = $row[0];

                                        ?>
                                                <table class="table table-dark display" id="users" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <td>Cédula</td>
                                                            <td>Nombre</td>
                                                            <td>Correo</td>
                                                            <td>Contraseña</td>
                                                            <td>Acciones</td>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $row[0]; ?></td>
                                                            <td><?php echo $row[1]; ?></td>
                                                            <td><?php echo $row[2]; ?></td>
                                                            <td><?php echo $row[3]; ?></td>
                                                            <td>
                                                                <div class='text-center'>
                                                                    <div class='btn-group' role='group' aria-label='Button group'>
                                                                        <button class="btn btn-primary UsubtnEditar" type="button" name="UsubtnEditar" edit="UsubtnEditar" onclick="llenar_modal('<?php echo $datos; ?>');">Editar</button>
                                                                        <button class="btn btn-warning" type="button" name="UsubtnEliminar" id="UsubtnEliminar" onclick="eliminar_datos('<?php echo $ID; ?>');">eliminar</button>
                                                                    </div>
                                                                </div>

                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            <?php  } ?>

                                        <?php } else { ?>
                                            <div class="alert alert-primary" role="alert">
                                                <h3 class="alert-link">No hay usuarios registrados.</h3>
                                            </div>
                                        <?php } ?>








                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Modal agregar usuario -->
        <div id="agregar_usuario" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="Modaltitle"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                    </div>
                    <form id="FormUsuarios">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="usu_id">C.C:</label>
                                <input class="form-control" type="number" name="usu_id" id="usu_id" required>
                            </div>
                            <div class="form-group">
                                <label for="usu_nombre_cmplt">Nombre completo</label>
                                <input class="form-control" type="text" name="usu_nombre_cmplt" id="usu_nombre_cmplt">
                            </div>
                            <div class="form-group">
                                <label for="usu_email">Email</label>
                                <input class="form-control" type="email" name="usu_email" id="usu_email">
                            </div>
                            <div class="form-group">
                                <label for="usu_clave">Contraseña</label>
                                <input class="form-control" type="password" name="usu_clave" id="usu_clave">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" name="btnGuardar" id="btnGuardar">Guardar usuario</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal editar usuario -->
        <div id="editar_usuario" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="Modaltitle"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                    </div>
                    <form id="FormEditUsuarios">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="edusu_id">C.C:</label>
                                <input class="form-control" type="number" name="edusu_id" id="edusu_id" required>
                            </div>
                            <div class="form-group">
                                <label for="edusu_nombre_cmplt">Nombre completo</label>
                                <input class="form-control" type="text" name="edusu_nombre_cmplt" id="edusu_nombre_cmplt">
                            </div>
                            <div class="form-group">
                                <label for="edusu_email">Email</label>
                                <input class="form-control" type="email" name="edusu_email" id="edusu_email">
                            </div>
                            <div class="form-group">
                                <label for="edusu_clave">Contraseña</label>
                                <input class="form-control" type="text" name="edusu_clave" id="edusu_clave">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" name="UsuBtnEnviar" id="UsuBtnEnviar">Actualizar</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>

    <?php include("templates/footer_admin.php"); ?>

<?php } ?>