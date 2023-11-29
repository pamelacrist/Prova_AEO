<nav class="navbar navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand">Painel de controle</a>
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#menulateral"
            aria-controls="offcanvasExample"> Abrir menu </button>

    </div>
</nav>


<div class="offcanvas offcanvas-start shadow-lg" tabindex="-1" id="menulateral" data-bs-keyboard="false" data-bs-backdrop="false"
    aria-labelledby="menulateralLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="menulateralLabel">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div id="sidebar" class="border rounded">
            <div class="nav flex-column py-3">
                <a href="add_noticia.php" class="nav-link">Inserir Notícia</a>
                <a href="#" class="nav-link">Item 3</a>
                <a href="#" class="nav-link">Item 4</a>
            </div>
        </div>
    </div>
</div>