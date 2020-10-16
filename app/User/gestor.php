<?php

session_start();
include('../../global/conexion.php');

$usu_id = $_SESSION["id"];

if (empty($_SESSION["id"])) {

    echo "<script> alert('No es posible acceder a esta página');
 	window.location.href='../index.php';</script>";
} else {
?>


    <?php
  
    include("../../templates/header.php");

    ?>

    <br>
    <br>


    <!-- Motor de busqueda  -->
    <?php

    if (isset($_POST['btn-success'])) {

        $codigo = $_POST['buscar'];



        $query_b = mysqli_query($con, "SELECT * FROM carpetas WHERE ca_codigo_carpeta LIKE '$codigo'");

        while ($row = mysqli_fetch_array($query_b)) { ?>


            <script type="text/javascript">
                function ocultar() {
                    document.getElementById('hide_table').style.display = "none";
                }
            </script>
            
            <div class="container">
                <div class="card" style="display:block;" id="hide_table">
                    <div class="card-body">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">codigo carpeta</th>
                                    <th scope="col">nombre carpeta</th>
                                    <th scope="col">cantidad de folios</th>
                                    <th scope="col">estado </th>
                                    <th scope="col">tipo carpeta </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><?php echo $row['ca_codigo_carpeta']; ?></th>
                                    <td><?php echo $row['ca_nombre_carpeta']; ?></td>
                                    <td><?php echo $row['ca_numero_folios']; ?></td>
                                    <td><?php echo $row['ca_estado_carpeta']; ?></td>
                                    <td><?php echo $row['ca_tipo_carpeta']; ?></td>
                                </tr>

                                <button class="btn btn-info" type="button" value="ocultar" onclick="ocultar();">Ocultar tabla.</button>
                                <br><br>
                            </tbody>
                        </table>



                    </div>
                </div>
            </div>

        <?php } ?>


    <?php } ?>

    <br><br>


    <!-- Vista de carpetas. -->

    <div class="container">
        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">codigo carpeta</th>
                                <th scope="col">nombre</th>
                                <th scope="col">cantidad folios</th>
                                <th scope="col">estado</th>                                
                            </tr>
                        </thead>


                        <tbody>
                            <?php

                            $query_select = mysqli_query($con, "SELECT * FROM carpetas");

                            while ($show_info = mysqli_fetch_array($query_select)) { ?>

                                <tr>
                                    <th scope="row"><?php echo $show_info['ca_codigo_carpeta']; ?></th>
                                    <td><?php echo $show_info['ca_nombre_carpeta']; ?></td>
                                    <td><?php echo $show_info['ca_numero_folios']; ?></td>
                                    <td><?php echo $show_info['ca_tipo_carpeta']; ?></td>
                                </tr>

                            <?php } ?>



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </body>

    </html>

<?php } ?>