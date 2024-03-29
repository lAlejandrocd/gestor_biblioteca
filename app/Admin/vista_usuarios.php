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
                        <h1 class="font-weight-bold mb-0">Gestor de carpetas - Usuarios</h1>
                    </div>
                    <div class="col-lg-3 d-flex">
                        <button class="btn btn-primary  align-self-center" type="button" name="UsuAgregar" id="UsuAgregar"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                            </svg>Agregar usuario</button>
                    </div>
                </div>
        </section>

        <section class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <table id="users" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Cédula</th>
                                    <th>Nombre completo</th>
                                    <th>Correo electrónico</th>
                                    <th>Acciones</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                $sql_i = mysqli_query($con, "SELECT * FROM usuarios");

                                while ($row = mysqli_fetch_assoc($sql_i)) { ?>


                                    <tr>
                                        <td><?php echo $row['usu_id']; ?></td>
                                        <td><?php echo $row['usu_nombre_cmplt']; ?></td>
                                        <td><?php echo $row['usu_email']; ?></td>
                                        <td></td>

                                    </tr>

                                <?php } ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </section>

        <!-- Modal agregar usuario -->
        <div id="agregar_usuario" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="Modaltitle_E"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                    </div>
                    <form id="FormUsuarios">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="usu_id">C.C:</label>
                                <input class="form-control" type="text" name="usu_id" id="usu_id" required>
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
                                <button class="btn btn-primary" type="submit" name="btnGuardar" id="btnGuardar"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    </svg>Guardar usuario</button>
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
                                <input class="form-control" type="text" name="edusu_id" id="edusu_id" required>
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