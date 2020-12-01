<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../plugins/Bootstrap/css/bootstrap.min.css">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../../plugins/Sweetalert/sweetalert2.all.min.js">


    <!-- <script type="text/javascript" src="js/show_table.js"></script> -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark justify-content-between">

        <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cuenta
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Datos e historial</a>
                        <a class="dropdown-item" href="#">Solicitar carpeta</a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Modificar carpeta</a>
                    </div>
                </li>
            </ul>
        </div>  -->

        <!-- <a class="navbar-brand" href="cuenta.php">Mi Cuenta</a> -->
        <a class="navbar-brand" href="gestor.php">Gestor de busqueda.</a>

        <a class="navbar-brand" href="../../global/cerrar_sesion.php">Cerrar sesión.</a>

        <form class="form-inline" method="POST" action="gestor.php">
            <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" name="buscar">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="btn-success">Buscar</button>
        </form>
    </nav>

    <br>