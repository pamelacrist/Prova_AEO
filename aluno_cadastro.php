<?php
include __DIR__ . "/header.php";
?>

<?php

try {
    if (isset($_POST['email']) &&
        isset($_POST['nome']) && 
        isset($_POST['telefone'])&& 
        isset($_POST['cpf']) && 
        !isset($_GET['id'])) {
           
        include_once __DIR__ . "/config/connection.php";
        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $cpf = $_POST['cpf'];
        //$diciplina = $_POST['diciplina'];

        $sql = "INSERT INTO alunos (nome, email, telefone , cpf)
        VALUES (:nome, :email, :telefone, :cpf);";
         
        $pdo = $pdo->prepare($sql);
        $pdo->bindParam(":email", $email);
        $pdo->bindParam(":nome", $nome);
        $pdo->bindParam(":telefone", $telefone);
        $pdo->bindParam(":cpf", $cpf);
        //$pdo->bindParam(":diciplina", $diciplina);
        $pdo->execute();
       
        if ($pdo->rowCount() == 1) {
           // $_SESSION['usuario'] = $pdo->fetch(PDO::FETCH_ASSOC)['email'];
            header("Location: aluno.php"); // https://www.php.net/manual/function.header.php
        }
        // $user = $pdo->fetch(PDO::FETCH_ASSOC);
        // session_start();
        // $_SESSION['user'] = $user;

    }
    if (isset($_POST['email']) &&
        isset($_POST['nome']) && 
        isset($_POST['telefone']) && 
        isset($_POST['cpf']) && isset($_GET['id'])) {
        include_once __DIR__ . "/config/connection.php";
        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $cpf = $_POST['cpf'];
        $id = $_GET['id'];

        $sql = "UPDATE alunos SET nome = :nome, email = :email, telefone = :telefone, cpf = :cpf WHERE idAluno = :id";
        
        $pdo = $pdo->prepare($sql);
        $pdo->bindParam(":email", $email);
        $pdo->bindParam(":nome", $nome);
        $pdo->bindParam(":telefone", $telefone);
        $pdo->bindParam(":cpf", $cpf);
        $pdo->bindParam(":id", $id);
        $pdo->execute();
    
        if ($pdo->rowCount() == 1) {
            header("Location: aluno.php");
        }
    }
    if(isset($_GET['id'])){
        include_once __DIR__ . "/config/connection.php";
        $id = $_GET['id'];
        $sql = "SELECT * FROM alunos WHERE idAluno = :id";
        $pdo = $pdo->prepare($sql);
        $pdo->bindParam(":id", $id);
        $pdo->execute();
        $aluno = $pdo->fetch(PDO::FETCH_ASSOC);
    }
} catch (\Throwable $th) {
   var_dump($th);
   exit();
}
    


?>
<main>
    <div class="container-fluid py-5 bg-primary bg-gradient">
        <h1 class="text-center text-light"> </h1>
    </div>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8">
                <form action="aluno_cadastro.php?id=<?php echo $aluno['idAluno']; ?>" method="post">
                    <div>
                        <label for="form_nome" class="form-label">Digite o seu nome</label>
                        <input id="form_nome" value="<?php echo isset($aluno['nome']) ? $aluno['nome'] : ''; ?>" type="text" placeholder="Nome completo" name="nome" class="form-control"
                            required>
                    </div>
                    <div class="mt-3">
                        <label for="form_email" class="form-label">Digite o seu e-mail</label>
                        <input id="form_email" value="<?php echo isset($aluno['email']) ? $aluno['email'] : ''; ?>" type="email" placeholder="eu@examepl.com" name="email"
                            class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label for="form_telefone" class="form-label">Digite o seu telefone</label>
                        <input id="form_telefone" 
                        value="<?php echo isset($aluno['telefone']) ? $aluno['telefone'] : ''; ?>" 
                        type="text" placeholder="DDD + Completo" name="telefone"
                            class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label for="form_cpf" class="form-label">Digite o seu CPF</label>
                        <input id="form_cpf" 
                        value="<?php echo isset($aluno['cpf']) ? $aluno['cpf'] : ''; ?>"
                        type="text" placeholder="CPF" name="cpf"
                            class="form-control" required>
                    </div>

                    <div class="">
                        <input type="submit" class="btn btn-primary mt-3" value="Enviar contato">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
include __DIR__ . "/footer.php";
?>