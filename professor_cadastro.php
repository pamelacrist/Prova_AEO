<?php
include __DIR__ . "/header.php"; // Inclui o arquivo de cabeçalho
?>
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
        $sql = "INSERT INTO professores (nome, email, telefone , cpf)
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

            header("Location: professor.php"); // Redireciona para a página do professor
        }
    }
    if (
        // Verifica se os campos do formulário 
        //foram submetidos e se há um 'id' na URL (para atualização do professor existente)
        isset($_POST['email']) &&
        isset($_POST['nome']) &&
        isset($_POST['telefone']) &&
        isset($_POST['cpf']) && isset($_GET['id'])
    ) {
        include_once __DIR__ . "/config/connection.php"; // Inclui o arquivo de conexão com o banco de dados
        // Obtém os valores do formulário e o ID do professor
        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $cpf = $_POST['cpf'];
        $id = $_GET['id'];

        // Prepara a query SQL para atualizar um professor no banco de dados
        $sql = "UPDATE professores SET nome = :nome, email = :email, telefone = :telefone, cpf = :cpf WHERE idProfessor = :id";

        $pdo = $pdo->prepare($sql);
        // Substitui os valores do SQL pelos valores do formulário
        $pdo->bindParam(":email", $email);
        $pdo->bindParam(":nome", $nome);
        $pdo->bindParam(":telefone", $telefone);
        $pdo->bindParam(":cpf", $cpf);
        $pdo->bindParam(":id", $id);
        $pdo->execute(); // Executa a query

        // Verifica se a atualização foi bem-sucedida e redireciona para outra página
        if ($pdo->rowCount() == 1) {
            header("Location: professor.php");
        }
    }
    // Verifica se há um ID na URL
    if (isset($_GET['id'])) {
        include_once __DIR__ . "/config/connection.php"; // Inclui o arquivo de conexão com o banco de dados   
        $id = $_GET['id'];
        // Prepara a query SQL para buscar um professor no banco de dados
        $sql = "SELECT * FROM professores WHERE idProfessor = :id";
        $pdo = $pdo->prepare($sql);
        $pdo->bindParam(":id", $id);
        $pdo->execute();
        $professor = $pdo->fetch(PDO::FETCH_ASSOC);
    }
} catch (\Throwable $th) {
    var_dump($th);  // Mostra o erro
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
                <form action="professor_cadastro.php?id=<?php echo $professor['idProfessor']; ?>" method="post">
                    <div>
                        <label for="form_nome" class="form-label">Digite o seu nome</label>
                        <input id="form_nome" value="<?php echo isset($professor['nome']) ? $professor['nome'] : ''; ?>" type="text" placeholder="Nome completo" name="nome" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label for="form_email" class="form-label">Digite o seu e-mail</label>
                        <input id="form_email" value="<?php echo isset($professor['email']) ? $professor['email'] : ''; ?>" type="email" placeholder="eu@examepl.com" name="email" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label for="form_telefone" class="form-label">Digite o seu telefone</label>
                        <input id="form_telefone" value="<?php echo isset($professor['telefone']) ? $professor['telefone'] : ''; ?>" type="text" placeholder="DDD + Completo" name="telefone" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label for="form_cpf" class="form-label">Digite o seu CPF</label>
                        <input id="form_cpf" value="<?php echo isset($professor['cpf']) ? $professor['cpf'] : ''; ?>" type="text" placeholder="CPF" name="cpf" class="form-control" required>
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