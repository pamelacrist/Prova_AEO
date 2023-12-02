<?php 

session_start(); // Inicia a sessão

// Verifica se a sessão está ativa
if (isset($_SESSION['usuario'])) {
    // Destroi todas as variáveis de sessão
    session_unset();

    // Destrói a sessão
    session_destroy();

    // Redireciona para a página de login
    header("Location: login.php");
    exit();
} else {
    // Caso a sessão não esteja ativa, redireciona para a página de login
    header("Location: login.php");
    exit();
}

?>