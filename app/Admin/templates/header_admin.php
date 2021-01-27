<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../plugins/Bootstrap/css/bootstrap.min.css">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../../plugins/Sweetalert2/sweetalert2.min.css">

    <!-- css admin -->
    <link rel="stylesheet" href="style/admin.css">

    <link rel="stylesheet" href="../../plugins/DataTables/datatables.min.css">


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
                <a href="modificacion_carpetas.php" class="d-block text-dark p-3">Modificaciones</a>
                <a href="devolucion_carpetas.php" class="d-block text-dark p-3">Devoluciones</a>
                <a href="solicitud_carpetas.php" class="d-block text-dark p-3">Solicitudes de carpetas</a>
                <a href="../../global/cerrar_sesion.php" class="d-block text-dark p-3">Cerrar sesión</a>


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
            <!-- En este div iba el texto "gestor de carpeta" pero se cambio a zona index para así poder unir el botón y el texto. -->