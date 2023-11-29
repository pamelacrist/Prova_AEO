<?php
include __DIR__ . "/header.php"; // Inclui o arquivo de cabeçalho
?>

<?php

try {
    // Verifica se os campos do formulário 
    //foram submetidos e se não há um 'id' na URL (para inserção de novo aluno)
    if (
        isset($_POST['email']) &&
        isset($_POST['nome']) &&
        isset($_POST['telefone']) &&
        isset($_POST['cpf']) &&
        empty($_GET['id']) // Verifica se não há um ID na URL
    ) {
        // Inclui o arquivo de conexão com o banco de dados
        include_once __DIR__ . "/config/connection.php";
        // Obtém os valores do formulário
        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $cpf = $_POST['cpf'];

        // Prepara a query SQL para inserir um novo aluno no banco de dados
        $sql = "INSERT INTO alunos (nome, email, telefone , cpf)
        VALUES (:nome, :email, :telefone, :cpf);";

        $pdo = $pdo->prepare($sql); // Prepara a query para execução
        // Substitui os valores do SQL pelos valores do formulário
        $pdo->bindParam(":email", $email);
        $pdo->bindParam(":nome", $nome);
        $pdo->bindParam(":telefone", $telefone);
        $pdo->bindParam(":cpf", $cpf);
        $pdo->execute();

        // Verifica se a inserção foi bem-sucedida e redireciona para outra página
        if ($pdo->rowCount() == 1) {

            header("Location: aluno.php"); // Redireciona para a página de alunos
        }
    }
    if (
        // Verifica se os campos do formulário 
        //foram submetidos e se há um 'id' na URL (para atualização de aluno existente)
        isset($_POST['email']) &&
        isset($_POST['nome']) &&
        isset($_POST['telefone']) &&
        isset($_POST['cpf']) && isset($_GET['id'])
    ) {
        include_once __DIR__ . "/config/connection.php"; // Inclui o arquivo de conexão com o banco de dados
        // Obtém os valores do formulário e o ID do aluno
        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $cpf = $_POST['cpf'];
        $id = $_GET['id'];

        // Prepara a query SQL para atualizar um aluno no banco de dados
        $sql = "UPDATE alunos SET nome = :nome, email = :email, telefone = :telefone, cpf = :cpf WHERE idAluno = :id";

        $pdo = $pdo->prepare($sql); // Prepara a query
        // Substitui os valores do SQL pelos valores do formulário
        $pdo->bindParam(":email", $email);
        $pdo->bindParam(":nome", $nome);
        $pdo->bindParam(":telefone", $telefone);
        $pdo->bindParam(":cpf", $cpf);
        $pdo->bindParam(":id", $id);
        $pdo->execute(); // Executa a query

        // Verifica se a atualização foi bem-sucedida e redireciona para outra página
        if ($pdo->rowCount() == 1) {
            header("Location: aluno.php");
        }
    }
    // Verifica se há um ID na URL
    if (isset($_GET['id'])) {
        include_once __DIR__ . "/config/connection.php"; // Inclui o arquivo de conexão com o banco de dados
        $id = $_GET['id'];
        // Prepara a query SQL para selecionar os dados do aluno específico
        $sql = "SELECT * FROM alunos WHERE idAluno = :id";
        $pdo = $pdo->prepare($sql);
        $pdo->bindParam(":id", $id);
        $pdo->execute();
        $aluno = $pdo->fetch(PDO::FETCH_ASSOC);
    }
} catch (\Throwable $th) {
    var_dump($th); // Em caso de erro, mostra o erro
    exit();
}



?>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 bg-primary bg-gradient py-2 ">
                <img width="100%" src="https://vestibular.sc.senac.br/img/elements/banner-page.jpg?rel=20190926">
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8">
                <form action="aluno_cadastro.php?id=<?php echo $aluno['idAluno']; ?>" method="post">
                    <div>
                        <label for="form_nome" class="form-label">Digite o seu nome</label>
                        <input id="form_nome" value="<?php echo isset($aluno['nome']) ? $aluno['nome'] : ''; ?>" type="text" placeholder="Nome completo" name="nome" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label for="form_email" class="form-label">Digite o seu e-mail</label>
                        <input id="form_email" value="<?php echo isset($aluno['email']) ? $aluno['email'] : ''; ?>" type="email" placeholder="eu@examepl.com" name="email" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label for="form_telefone" class="form-label">Digite o seu telefone</label>
                        <input id="form_telefone" value="<?php echo isset($aluno['telefone']) ? $aluno['telefone'] : ''; ?>" type="text" placeholder="DDD + Completo" name="telefone" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label for="form_cpf" class="form-label">Digite o seu CPF</label>
                        <input id="form_cpf" value="<?php echo isset($aluno['cpf']) ? $aluno['cpf'] : ''; ?>" type="text" placeholder="CPF" name="cpf" class="form-control" required>
                    </div>

                    <div class="">
                        <input type="submit" class="btn btn-primary mt-3" value="Salvar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
include __DIR__ . "/footer.php"; // Inclui o arquivo de rodapé
?>