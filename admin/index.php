<?php
session_start();
$_SESSION['usuario'] = null;

if (isset($_POST['form_email']) && isset($_POST['form_pass'])) {

    include_once __DIR__ . "/../config/connection.php";

    $email = $_POST['form_email'];
    $pass = $_POST['form_pass'];


    $pass = md5($pass . $chave);


    $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :pass";
    $pdo = $pdo->prepare($sql);
    $pdo->bindParam(":email", $email);
    $pdo->bindParam(":pass", $pass);
    $pdo->execute();

    if ($pdo->rowCount() == 1) {
        $_SESSION['usuario'] = $pdo->fetch(PDO::FETCH_ASSOC)['email'];
        header("Location: dashboard.php"); // https://www.php.net/manual/function.header.php
    }
    // $user = $pdo->fetch(PDO::FETCH_ASSOC);
    // session_start();
    // $_SESSION['user'] = $user;

}

include_once __DIR__ . "/header_dash.php";
?>


<div class="container-fluid bg bg-gradient bg-primary py-5 d-flex justify-content-center align-items-center" style="min-height:100vh">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-6 text-light">
            <h1 >Administrador</h1>
            <p>Seja bem vindo ao painel de controle do site.</p>
        </div>
        <div class="col-md-6">
            <div class="card p-3">
                <form action="" method="post">
                    <div>
                        <label for="email" class="form-label w-100">
                            <input class="form-control " type="email" name="form_email" placeholder="digite seu e-mail"
                                id="email">
                        </label>
                    </div>
                    <div>
                        <label for="password" class="form-label w-100">
                            <input class="form-control" type="password" name="form_pass" placeholder="digite sua senha"
                                id="password">
                        </label>
                    </div>
                    <input type="submit" class="btn btn-success" value="Entrar">
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include_once __DIR__ . "/footer_dash.php";
?>