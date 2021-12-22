<?php
/** @var $this \app\core\View */
$this->title = 'Vendido';
$this->activeMenu = 'vendido';


?>
<h1>Vendas recentes</h1>

<br>
<div id="vendido-content">

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/vendidas/LoftVendaNova900x600.jpg" class="d-block w-100" alt="LoftVendaNova900x600">
            </div>
            <div class="carousel-item">
                <img src="img/vendidas/MoradiaAzenhasDoMar900x600.jpg" class="d-block w-100" alt="MoradiaAzenhasDoMar900x600">
            </div>
            <div class="carousel-item">
                <img src="img/vendidas/MoradiaSantaCruz-TorresVedras900x617.jpg" class="d-block w-100" alt="MoradiaSantaCruz-TorresVedras900x617">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


</div>

