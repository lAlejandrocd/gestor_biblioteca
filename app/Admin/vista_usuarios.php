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
                    <div class="col-lg-12">
                        <div class="table responsive">
                            <table class="display" id="users" style="width: 100%;">
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

                                    <?php

                                    $sql = mysqli_query($con, "SELECT * FROM usuarios");

                                    while ($row = mysqli_fetch_assoc($sql)) { ?>

                                        <tr>
                                            <td><?php echo $row['usu_id']; ?></td>
                                            <td><?php echo $row['usu_nombre_cmplt']; ?></td>
                                            <td><?php echo $row['usu_email']; ?></td>
                                            <td><?php echo $row['usu_clave']; ?></td>
                                            <td>
                                                <div class='text-center'>
                                                    <div class='btn-group' role='group' aria-label='Button group'><button id='btnEditar' class='btn btn-primary UsubtnEditar' type='button'>Editar</button><button id='UsubtnEliminar' class='btn btn-info UsubtnEliminar' type='button'>Eliminar</button></div>
                                                </div>
                                            </td>
                                        </tr>
                                </tbody>

                            <?php } ?>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </section>

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
                                <button class="btn btn-primary" type="button" name="btnGuardar" id="btnGuardar">Guardar usuario</button>

                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>



    </div>

    <?php include("templates/footer_admin.php"); ?>


<?php } ?>