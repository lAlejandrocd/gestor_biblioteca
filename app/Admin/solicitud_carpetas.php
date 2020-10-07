<?php

session_start();
include("../../global/conexion.php");

$IDAd = $_SESSION['ID_Ad'];

if (empty($_SESSION['ID_Ad'])) {

    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../index.php';</script>";
} else { ?>

    <?php include("../../templates/header_admin.php"); ?>

    <div class="container">
        <div class="jumbotron">
            <div class="card">
                <div class="card card-body">
                    <div class="table responsive">
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
                                <?php

                                $query = mysqli_query($con, "SELECT * FROM solicitud_prestamo");



                                while ($row = mysqli_fetch_assoc($query)) { ?>

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
                        <?php } ?>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>





<?php } ?>