<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../plugins/Bootstrap/css/bootstrap.min.css">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../../plugins/Sweetalert2/sweetalert2.min.css">

    <!-- css -->
    <link rel="stylesheet" href="style/user.css">
</head>

<body>

    <div class="d-flex">
        <div class="bg-primary" id="sidebar-container">
            <div class="logo">
                <!-- <h1 class="text-dark font-weight-bold">GESTOR</h1> -->
                <img src="img/logo.png" alt="LOGO" class="img-fluid rounded-circle mr-2 avatar">
            </div>
            <div class="menu">
                <a href="index.php" class="d-block text-dark p-3">Gestor</a>
                <a href="cuenta.php" class="d-block text-dark p-3">Mi cuenta</a>
                <a href="modificar_carpeta.php" class="d-block text-dark p-3">modificar carpeta</a>
                <a href="solicitar_carpeta.php" class="d-block text-dark p-3">Solicitar carpeta</a>
                <a href="backend/cerrar_sesion.php" class="d-block text-dark p-3">Cerrar sesión</a>
            </div>

        </div>
        <div class="w-100">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">BUSCAR</button>
                    </form>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="img/logo.png" alt="LOGO" class="img-fluid rounded-circle mr-2 avatar">
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
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
                                <h1 class="font-weight-bold mb-0">Bienvenido, </h1>
                            </div>
                        </div>
                    </div>
                </section>