<?php
    session_start();
    $logado = $_SESSION['usuario'];

?>

<header>
    
 <!-- Navbar Start -->
 <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a class="navbar-brand" href="#"><img width="120" src="https://www.senac.br/images/logo-senac-cnc-color-100.png"></a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <!-- active -->
                
               
                <?php  
                if($logado) {
                    if(!empty($logado['idProfessor'])) {
                        ?>
                        <a class="nav-item nav-link" href="professor.php">Professor</a>
                    <a class="nav-item nav-link" href="aluno.php">Aluno</a>
                    <a class="nav-item nav-link" href="disciplina.php">Disciplina</a>


                        <?php
                    }else{?>
                    <a class="nav-item nav-link" aria-current="page" href="index.php">Inicial</a>

                   <?php }
                    ?>
                    <a class="nav-item nav-link" href="sair.php">Sair</a>
                    <?php
                } else {
                    ?>
                    <a class="nav-item nav-link" aria-current="page" href="index.php">Inicial</a>
                    <a class="nav-item nav-link" href="login.php">Entrar</a>
                    <?php
                }
                ?>
               
            </div>
        </div>
    </nav>
</header>