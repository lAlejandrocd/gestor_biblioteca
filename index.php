<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de biblioteca.</title>

    <link rel="stylesheet" href="style/style_index.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="plugins/Bootstrap/css/bootstrap.min.css">

    <!-- Llamamos a sweetalert2 mimificado -->
    <link rel="stylesheet" href="plugins/Sweetalert2/sweetalert2.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">



</head>

<body>

    <br>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table class="table table-light">
                    <tbody>
                        <tr>

                            <td>

                                <h5 class="card-title">Usuario Administrador</h5>

                                <a href="#" id="Admin"> <img src="img/Admin.png" width="350" height="300">
                                </a>

                            </td>

                            <td>

                                <h5 class="card-title">Usuario estandar</h5>

                                <a href="#" id="User"><img src="img/User.png" alt="" width="350" height="300"></a>

                            </td>


                        </tr>
                        <tr>
                        </tr>
                    </tbody>
                </table>


            </div>
        </div>
    </div>

    <!-- MODAL USUARIO ADMINISTRADOR -->
    <div id="modal_admin" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Usuario Administrador</p>
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <h1>Inicio de sesión</h1>
                                <form id="form_admin" class="form" action="#" method="POST">
                                    <div class="row">
                                        <div class="form-group col">
                                            <label for="id_admin">Documento identidad</label>
                                            <input class="form-control" type="text" name="id_admin" id="id_admin">
                                        </div>
                                        <div class="form-group col">
                                            <label for="admin_password">Contraseña</label>
                                            <input class="form-control" type="password" name="admin_password" id="admin_password">
                                        </div>
                                    </div>

                                    <button class="btn btn-success" type="submit" name="btn-login">Ingresar</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL USUARIO ESTANDAR -->
    <div id="modal_user" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Usuario Estandar</p>
                    <div class="container">
                        <div class="card">
                            <div class="card-body">

                                <h1>Inicio de sesión</h1>
                                <form method="post" action="app/User/validar_usuario.php">
                                    <div class="row">
                                        <div class="form-group col">
                                            <label for="my-input">Documento identidad</label>
                                            <input class="form-control" type="number" name="usu_id" REQUIRED>
                                        </div>
                                        <div class="form-group col">
                                            <label for="my-input">Contraseña</label>
                                            <input class="form-control" type="password" name="usu_clave" REQUIRED>
                                        </div>
                                    </div>
                                    <button class="btn btn-success" type="submit" name="btn-login">Ingresar</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="plugins/Sweetalert2/sweetalert2.all.min.js"></script>

    <script src="plugins/JQuery/jquery-3.5.1.min.js"></script>

    <script src="plugins/Bootstrap/js/bootstrap.min.js"></script>

    <script src="plugins/Popper/popper.min.js"></script>

    <script src="js/index.js"></script>
</body>

</html>