<?php

session_start();
include("../../global/conexion.php");

$IDAd = $_SESSION['ID_Ad'];

if (empty($_SESSION['ID_Ad'])) {

    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../../index.php';</script>";
} else { ?>


    <?php include("templates/header_admin.php"); ?>

    <div class="container">
        <div class="jumbotron">
            <div class="card">
                <div class="card card-body">
                    <div class="table responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Fecha de inicio de sesión.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $query = mysqli_query($con, "SELECT * FROM historial_sesion");

                                while ($row = mysqli_fetch_assoc($query)) {  ?>

                                    <tr>
                                        <td><?php echo $row['hs_usuario_id']; ?></td>
                                        <td><?php echo $row['hs_fecha']; ?></td>
                                    </tr>


                            </tbody>
                        <?php  } ?>
                        </table>

                    </div>


                </div>
            </div>
        </div>
    </div>

    <?php include("templates/footer_admin.php"); ?>


<?php }  ?>