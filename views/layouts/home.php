<?php

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/cs_preto16.png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="css/styles.css">

    <title><?php echo $this->title ?></title>
</head>

<body class="d-flex flex-column min-vh-100 lisbon">

<!-- HEADER -->
<header class="sticky-md-top">
    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a aria-current="page" href="/">
                    <img src="img/preto1.png" width="200px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($this->isActive('carla')) ? 'active' : '' ?>" aria-current="page" href="/carla"><b>Carla</b></a>
                        </li>
                        <!--
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($this->isActive('contact')) ? 'active' : '' ?>" href="/contact"><b>Contacto</b></a>
                        </li>
                        -->
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($this->isActive('testemunhos')) ? 'active' : '' ?>" href="/testemunhos"><b>Testemunhos</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($this->isActive('vendido')) ? 'active' : '' ?>" href="/vendido"><b>Vendido</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($this->isActive('vendedores')) ? 'active' : '' ?>" href="/vendedores"><b>Vendedores</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($this->isActive('compradores')) ? 'active' : '' ?>" href="/compradores"><b>Compradores</b></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </div>
</header>

<!-- HEADER -->


<!-- CONTENT -->
<div class="container bg-white" id="page-content" >
    {{content}}
</div>
<!-- CONTENT -->


<!-- Footer -->
<footer class="mt-auto fixed-bottom">
    <div class="container">
        <!-- Copyright -->
        <div class="text-center p-4 text-light">
            <img src="img/triomphe-logo270x100.jpg" width="20%" >
            © 2021 Copyright:
            <a class="text-reset fw-bold" href="http://zxcoders.eu/">ZXCoders.eu</a>
        </div>
        <!-- Copyright -->
    </div>
</footer>
<!-- Footer -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>