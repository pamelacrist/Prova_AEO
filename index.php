<?php
include __DIR__ . "/header.php";

?>
<main>
    <div class="container">

        <div id="carinicial" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="//picsum.photos/id/10/1400/300" alt="Montanhas e um lago">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="//picsum.photos/id/11/1400/300" alt="Montanhas e uma floresta">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="//picsum.photos/id/12/1400/300" alt="Uma praia">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carinicial" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carinicial" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Próximo</span>
            </button>
        </div>
    </div>
</main>

<?php
include __DIR__ . "/footer.php";
?>