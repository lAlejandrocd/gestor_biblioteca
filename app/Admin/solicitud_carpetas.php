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

                </div>
        </section>


        <!-- Section de tabla  -->
        <section class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="jumbotron">
                            <div class="card">
                                <div class="card card-body">
                                    <div class="table responsive">

                                        <?php

                                        $query = mysqli_query($con, "SELECT * FROM solicitud_prestamo");

                                        $row_f = mysqli_num_rows($query);

                                        if ($row_f >= 1) {



                                            while ($row = mysqli_fetch_array($query)) {




                                        ?>

                                                <table class="table table-dark">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Persona solicitante</th>
                                                            <th scope="col">Codigo carpeta</th>
                                                            <th scope="col">Fecha de inicio</th>
                                                            <th scope="col">Fecha final</th>
                                                            <th scope="col">Autorizar</th>
                                                            <th scope="col">Rechazar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $row['pc_id_usuario']; ?></td>
                                                            <td><?php echo $row['pc_codigo_carpt']; ?></td>
                                                            <td><?php echo $row['pc_fecha_inicio']; ?></td>
                                                            <td><?php echo $row['pc_fecha_final']; ?></td>
                                                            <td>
                                                                <form action="autorizar_carpeta.php" method="post">
                                                                    <input type="hidden" name="ID" value="<?php echo $row['ID']; ?>">
                                                                    <input type="hidden" name="pc_id_usuario" value="<?php echo $row['pc_id_usuario']; ?>">
                                                                    <input type="hidden" name="pc_codigo_carpt" value="<?php echo $row['pc_codigo_carpt']; ?>">
                                                                    <input type="hidden" name="pc_fecha_final" value="<?php echo $row['pc_fecha_final']; ?>">
                                                                    <button class="btn btn-success" type="submit" name="btn-autorizar">Autorizar Prestamo</button>
                                                                </form>

                                                            </td>
                                                            <td>
                                                                <form action="rechazar_carpeta.php" method="post">
                                                                    <input type="hidden" name="ID" value="<?php echo $row['ID']; ?>">
                                                                    <input type="hidden" name="pc_id_usuario" value="<?php echo $row['pc_id_usuario']; ?>">
                                                                    <input type="hidden" name="pc_codigo_carpt" value="<?php echo $row['pc_codigo_carpt']; ?>">
                                                                    <input type="hidden" name="pc_fecha_final" value="<?php echo $row['pc_fecha_final']; ?>">

                                                                    <button class="btn btn-danger" type="submit" name="btn-rechazar">Rechazar Prestamo</button>

                                                                </form>
                                                            </td>
                                                        </tr>
                                                    </tbody>

                                                </table>

                                            <?php  } ?>

                                        <?php } else { ?>

                                            <div class="alert alert-primary" role="alert">
                                                <h3 class="alert-link">No hay solicitudes de carpetas.</h3>
                                            </div>
                                        <?php  }  ?>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div id="autorizar_carpeta" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                    </div>
                    <div class="modal-body">
                        <p>Content</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php include("templates/footer_admin.php"); ?>

<?php } ?>