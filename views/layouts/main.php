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
    <!-- Para os botoes das redes osciais -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- os meus styles -->
    <link rel="stylesheet" href="css/styles.css">

    <title><?php echo $this->title ?></title>
</head>

<body class="d-flex flex-column min-vh-100">

<!-- HEADER -->
<header class="sticky-md-top">
    <div class="container">

    <nav class="navbar navbar-expand-lg  bg-white">
    <div class="container-fluid">
        <a aria-current="page" href="/">
            <img src="img/carlasantos-preto.png" width="200px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="link-dark nav-link <?php echo ($this->isActive('carla')) ? 'active' : '' ?>" aria-current="page" href="/carla"><b>Carla</b></a>
                </li>
<!--
                <li class="nav-item">
                    <a class="nav-link <?php echo ($this->isActive('contact')) ? 'active' : '' ?>" href="/contact"><b>Contacto</b></a>
                </li>
-->
                <li class="nav-item">
                    <a class="link-dark nav-link <?php echo ($this->isActive('testemunhos')) ? 'active' : '' ?>" href="/testemunhos"><b>Testemunhos</b></a>
                </li>
                <li class="nav-item">
                    <a class="link-dark nav-link <?php echo ($this->isActive('vendido')) ? 'active' : '' ?>" href="/vendido"><b>Vendido</b></a>
                </li>
                <li class="nav-item">
                    <a class="link-dark nav-link <?php echo ($this->isActive('vendedores')) ? 'active' : '' ?>" href="/vendedores"><b>Proprietários</b></a>
                </li>
                <li class="nav-item">
                    <a class="link-dark nav-link <?php echo ($this->isActive('compradores')) ? 'active' : '' ?>" href="/compradores"><b>Compradores</b></a>
                </li>
            </ul>

<!--
            <?php if (\app\core\Application::isGest()): ?>
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
            </ul>
            <?php else: ?>
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/profile">
                        Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/logout">
                        Welcome <?php echo \app\core\Application::$app->user->getDisplayName() ?> [Logout]
                    </a>
                </li>
            </ul>
            <?php endif; ?>
-->
        </div>
    </div>
    </nav>

    </div>
</header>

<!-- HEADER -->


<!-- CONTENT -->
<div class="container bg-white" id="page-content" >
    <?php if (\app\core\Application::$app->session->getFlash('success')): ?>
        <div class="alert alert-success">
            <?php echo \app\core\Application::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>
    {{content}}
</div>
<!-- CONTENT -->


<!-- Footer -->
<footer class="mt-auto">
    <hr/>
    <div class="container bg-white">


        <div class="row" id="contact">
            <div class="col col-12 col-sm-4 text-center">
                Envie uma mensagem à Carla
                <form action="" method="post" id="msg-form">
                    <div class="input-group input-group-sm mb-3">
                        <!-- <span class="input-group-text" id="inputGroup-sizing-sm">Nome</span> -->
                        <input type="text" name="name" class="form-control form-control-sm" placeholder="Nome" aria-label="Nome" aria-describedby="inputGroup-sizing-sm" required>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <!-- <span class="input-group-text" id="inputGroup-sizing-sm">Email</span> -->
                        <input type="email"  name="email" class="form-control form-control-sm" placeholder="Email" aria-label="Email" aria-describedby="inputGroup-sizing-sm" required>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <!-- <span class="input-group-text">Mensagem</span> -->
                        <textarea class="form-control"  name="message" aria-label="Mensagem" placeholder="Mensagem" required></textarea>
                    </div>
<!--
                    <button type="submit" class="btn btn-primary  btn-sm">Enviar</button>
-->
                    <button class="g-recaptcha btn btn-primary"
                            data-sitekey="6Le3rI8dAAAAAGTdvR2Ff089ROl0TljQV3qv-blr"
                            data-callback='onSubmit'
                            data-action='submit'>Enviar</button>

                </form>

            </div>
            <div class="col col-12 col-sm-4">
                <a href="https://triomphe.pt/our_team/carla-santos-20">
                <img src="img/triomphe-logo270x100.jpg" width="100%" >
                </a>
            </div>

            <div class="col col-12 col-sm-4 text-center p-6 align-bottom">
                <br>
                <p>Tel: 925981150<br>
                carla.santos@imo-triomphe.pt</p>
                <p>
                    <a href="https://www.facebook.com/Carla-Santos-Consultora-Imobili%C3%A1ria-270642826620430/"
                       class="fa fa-facebook"
                       target="_blank"></a>
                    <a href="https://www.linkedin.com/in/carla-santos-2218bab9/"
                       class="fa fa-linkedin"
                       target="_blank"></a>
                    <!-- <a href="#" class="fa fa-instagram"></a> -->
                </p>
                <p>
                    <br><br>
                    © 2021
                    <a class="text-reset fw-bold" href="http://zxcoders.eu/">ZXCoders.eu</a>
                </p>
            </div>

        </div>
    </div>
</footer>
<!-- Footer -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/main.js"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
</body>
</html>
