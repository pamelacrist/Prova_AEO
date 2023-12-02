<?php
session_start();
include_once 'header.php';
if ($logado) {
    header("Location: index.php");
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    // Verificar login na tabela de professores
    include_once __DIR__ . "/config/connection.php";

    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM professores WHERE email = :email AND senha = :password";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', md5($password));
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        // Login bem-sucedido
        $_SESSION['usuario'] = $row; // Adiciona o usuário logado em uma sessão
        header("Location: professor.php");
    } else {
        // Verificar login na tabela de alunos
        $query = "SELECT * FROM alunos WHERE email = :email AND senha = :password";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', md5($password));
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $_SESSION['usuario'] = $row;
            header("Location: index.php");
        } else {
            $_SESSION['erro_login'] = "Usuário ou senha inválidos.";
        }
    }
}
?>
<link rel="stylesheet" href="assets/css/login.css">
<div class="wrapper">
    <form action="login.php" method="POST">
        <h1>Login</h1>
        <div class="input-box">
            <input type="email" placeholder="Email" id="email" name="email" required>
            <i class='bx bxs-user'></i>
        </div>
        <div class="input-box">
            <input type="password" placeholder="Senha" id="password" name="password" required>
            <i class='bx bxs-lock-alt'></i>
        </div>
            <?php
            if (isset($_SESSION['erro_login'])) {
                echo "<div class='alert alert-danger'>" . $_SESSION['erro_login'] . "</div>";
                unset($_SESSION['erro_login']);
            }
            ?>
        <button type="submit" class="btn">Entrar</button>
    </form>
</div>

<?php
include_once 'footer.php';
?>