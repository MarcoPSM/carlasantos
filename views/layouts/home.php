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
    <!-- <div class="container"> -->

        <nav class="navbar navbar-expand-lg"> <!-- navbar-light -->
            <div class="container">
                <a aria-current="page" href="/">
                    <img src="img/carlasantos-preto.png" class="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 font-weight-bold">
                        <li class="nav-item">
                            <a class="link-dark nav-link <?php echo ($this->isActive('carla')) ? 'active' : '' ?>" aria-current="page" href="/carla">Carla</a>
                        </li>
                        <!--
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($this->isActive('contact')) ? 'active' : '' ?>" href="/contact"><b>Contacto</b></a>
                        </li>
                        -->
                        <li class="nav-item">
                            <a class="link-dark nav-link <?php echo ($this->isActive('testemunhos')) ? 'active' : '' ?>" href="/testemunhos">Testemunhos</a>
                        </li>
                        <li class="nav-item">
                            <a class="link-dark nav-link <?php echo ($this->isActive('vendido')) ? 'active' : '' ?>" href="/vendido">Vendido</a>
                        </li>
                        <li class="nav-item">
                            <a class="link-dark nav-link <?php echo ($this->isActive('vendedores')) ? 'active' : '' ?>" href="/vendedores">Vendedores</a>
                        </li>
                        <li class="nav-item">
                            <a class="link-dark nav-link <?php echo ($this->isActive('compradores')) ? 'active' : '' ?>" href="/compradores">Compradores</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    <!-- </div> -->
</header>

<!-- HEADER -->


<!-- CONTENT -->
<div class="container bg-white" >
    {{content}}
</div>
<!-- CONTENT -->


<!-- Footer -->
<footer class="mt-auto fixed-bottom">
    <div class="container">
        <div class="text-center p-4 text-light">
            <a href="https://triomphe.pt/our_team/carla-santos-20">
            <img src="img/triomphe-logo270x100.jpg" id="logohome">
            </a>
            <br>AMI 13164
        </div>
        <!-- Copyright -->
        <div class="text-center p-4 text-light">
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
