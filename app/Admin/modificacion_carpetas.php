<?php

session_start();

include("../../global/conexion.php");

$IDAd = $_SESSION['ID_Ad'];

if (empty($_SESSION['ID_Ad'])) {


    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../index.php';</script>";
} else { ?>

    <?php include("../../templates/header_admin.php"); ?>

    <!-- <div class="container"> -->
        <div class="jumbotron text-center">
            <div class="card">
                <div class="card card-body">
                    <div class="table responsive">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">Código de carpeta </th>
                                    <th scope="col">Folios Agregados</th>
                                    <th scope="col">Fecha de modificación</th>
                                    <th scope="col">Id de usuario</th>
                                    <th scope="col">Nombre usuario</th>
                                    <th scope="col">Autorizar</th>
                                    <th scope="col">Rechazar</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $query = mysqli_query($con, "SELECT usu.*, cm.* FROM usuarios usu INNER JOIN carpetas_modificadas cm ON cm.`cm_id_usuario` = usu.`usu_id`;");

                                // $query = mysqli_query($con, "SELECT * FROM carpetas_modificadas");

                                while ($row = mysqli_fetch_assoc($query)) { ?>


                                    <tr>
                                        <td><?php echo $row['cm_codigo_carpeta']; ?></td>
                                        <td><?php echo $row['cm_folios_agregados']; ?></td>
                                        <td><?php echo $row['cm_fecha']; ?></td>
                                        <td><?php echo $row['cm_id_usuario']; ?></td>
                                        <td><?php echo $row['usu_nombre_cmplt']; ?></td>
                                        <td>
                                            <form action="modificar.php" method="post">

                                                <input type="hidden" name="cm_codigo_carpeta" value="<?php echo $row['cm_codigo_carpeta'] ?> ">

                                                <input type="hidden" name="id_usuario" value="<?php echo $row['cm_id_usuario'] ?> ">

                                                <input type="hidden" name="ID" value=" <?php echo $row['ID'] ?>">
                                                <button class="btn btn-success" type="submit" name="btn-autorizar">(Y)</button>

                                            </form>
                                        </td>

                                        <td>
                                            <form action="rechazar.php" method="post">

                                                <input type="hidden" name="ID" value="<?php echo $row['cm_id_usuario'] ?> ">
                                                <input type="hidden" name="cm_codigo_carpeta" value="<?php echo $row['cm_codigo_carpeta'] ?> ">
                                                <button class="btn btn-danger" type="submit" name="btn-rechazar">(Y)</button>

                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>



    </body>

    </html>

<?php } ?>