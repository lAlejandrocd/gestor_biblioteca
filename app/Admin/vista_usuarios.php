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
                                    <th scope="col">Id usuario</th>
                                    <th scope="col">Nombre completo</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Contraseña</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $query = mysqli_query($con, "SELECT * FROM usuarios");

                                while ($row = mysqli_fetch_assoc($query)) { ?>

                                    <tr>
                                        <td><?php echo $row['usu_id']; ?></td>
                                        <td><?php echo $row['usu_nombre_cmplt']; ?></td>
                                        <td><?php echo $row['usu_email']; ?></td>
                                        <td><?php echo $row['usu_clave']; ?></td>
                                        <form action="#" method="post">
                                            <td><button class="btn btn-success" type="button" name="btn-success">##</button></td>
                                        </form>

                                    </tr>
                            </tbody>      
                            </table>
                                <?php } ?>


                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>