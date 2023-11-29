<?php
// Inclui o cabeçalho da página
include __DIR__ . "/header.php";
?>

<main>
    <div class="container">
        <!-- Início do carrossel -->
        <div id="carinicial" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <!-- Primeiro item do carrossel -->
                <div class="carousel-item active">
                    <!-- Imagem do primeiro item -->
                    <img class="d-block w-100" src="//www.senac.br/images/bg_unidades.jpg" alt="Montanhas e um lago">
                </div>
                <!-- Segundo item do carrossel -->
                <div class="carousel-item">
                    <!-- Imagem do segundo item -->
                    <img class="d-block w-100" src="//www.senac.br/images/bg-senac-empresas.jpg" alt="Montanhas e uma floresta">
                </div>
            </div>
            <!-- Botão para navegar para o item anterior do carrossel -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carinicial" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <!-- Botão para navegar para o próximo item do carrossel -->
            <button class="carousel-control-next" type="button" data-bs-target="#carinicial" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Próximo</span>
            </button>
        </div>
    </div>
</main>

<?php
// Inclui o rodapé da página
include __DIR__ . "/footer.php";
?>