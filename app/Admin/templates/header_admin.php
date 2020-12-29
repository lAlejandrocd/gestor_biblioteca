<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../plugins/Bootstrap/css/bootstrap.min.css">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../../plugins/Sweetalert2/sweetalert2.min.css">

    <!-- css admin -->
    <link rel="stylesheet" href="style/admin.css">


    <!-- <script type="text/javascript" src="js/show_table.js"></script> -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
</head>

<body>
    <div class="d-flex">
        <div class="bg-primary" id="sidebar-container">
            <div class="logo">
                <a href="index.php"><img src="img/sena_logo.png" alt="sena_logo" class="img-fluid rounded-circle mr-2 avatar"></a>
            </div>
            <div class="menu">
                <a href="index.php" class="d-block text-dark p-3">Inicio</a>
                <a href="vista_usuarios.php" class="d-block text-dark p-3">Usuarios</a>
                <a href="registrar_usuario.php" class="d-block text-dark p-3">Agregar usuario</a>
                <a href="buscar_carpeta.php" class="d-block text-dark p-3">Buscar carpeta</a>
                <a href="historial_sesion.php" class="d-block text-dark p-3">Historial de sesión</a>
                <a href="devolucion_carpetas.php" class="d-block text-dark p-3">Devoluciones</a>
                <a href="solicitud_carpetas.php" class="d-block text-dark p-3">Solicitudes de carpetas</a>
                <a href="autorizar_devolucion.php" class="d-block text-dark p-3">Autorizar devolución</a>
                <a href="autorizar_carpeta.php" class="d-block text-dark p-3">Autorizar carpeta</a>
                <a href="modificacion_carpetas.php" class="d-block text-dark p-3">Modificaciones</a>

            </div>

        </div>
        <div class="w-100">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="img/sena_logo.png" alt="LOGO" class="img-fluid rounded-circle mr-2 avatar">
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="">Action</a></li>
                                    <li><a class="dropdown-item" href="">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="">Something else here</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
            <div class="" id="content">
                <section class="py-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">
                                <h1 class="font-weight-bold mb-0">Gestor de carpetas.</h1>
                            </div>
                        </div>
                    </div>

                </section>