<?php
include __DIR__ . "/header.php";  // Inclui o arquivo de cabeçalho
?>

<?php

try {
    if (
        // Verifica se os campos do formulário 
        //foram submetidos e se não há um 'id' na URL (para inserção de uma nova disciplina)
        isset($_POST['nome']) &&
        isset($_POST['sala']) &&
        isset($_POST['cargaHoraria']) &&
        isset($_POST['dataInicial']) &&
        isset($_POST['dataFinal']) &&
        empty($_GET['id'])  // Verifica se não há um ID na URL
    ) {
        // Inclui o arquivo de conexão com o banco de dados
        include_once __DIR__ . "/config/connection.php";
        // Obtém os valores do formulário
        $nome = $_POST['nome'];
        $sala = $_POST['sala'];
        $cargaHoraria = $_POST['cargaHoraria'];
        $dataInicial = $_POST['dataInicial'];
        $dataFinal = $_POST['dataFinal'];

        // Prepara a query SQL para inserir uma nova disciplina no banco de dados
        $sql = "INSERT INTO disciplinas (nome, sala, cargaHoraria, dataInicial , dataFinal)
        VALUES (:nome, :sala, :cargaHoraria, :dataInicial, :dataFinal);";

        $mysql = $pdo->prepare($sql); // Prepara a query para execução
        // Substitui os valores do SQL pelos valores do formulário
        $mysql->bindParam(":nome", $nome);
        $mysql->bindParam(":sala", $sala);
        $mysql->bindParam(":cargaHoraria", $cargaHoraria);
        $mysql->bindParam(":dataInicial", $dataInicial);
        $mysql->bindParam(":dataFinal", $dataFinal);
        $mysql->execute();

        // Verifica se a inserção foi bem-sucedida e redireciona para outra página
        if ($mysql->rowCount() == 1) {

            header("Location: disciplina.php"); // Redireciona para a página de disciplinas
        }
    }
    if (
        // Verifica se os campos do formulário
        //foram submetidos e se há um 'id' na URL (para atualização de disciplina existente)
        isset($_POST['nome']) &&
        isset($_POST['sala']) &&
        isset($_POST['cargaHoraria']) &&
        isset($_POST['dataInicial']) &&
        isset($_POST['dataFinal']) && isset($_GET['id'])
    ) {

        include_once __DIR__ . "/config/connection.php"; // Inclui o arquivo de conexão com o banco de dados
        // Obtém os valores do formulário e o ID da disciplina
        $nome = $_POST['nome'];
        $sala = $_POST['sala'];
        $cargaHoraria = $_POST['cargaHoraria'];
        $dataInicial = $_POST['dataInicial'];
        $dataFinal = $_POST['dataFinal'];
        $id = $_GET['id'];

        // Prepara a query SQL para atualizar uma disciplina no banco de dados
        $sql = "UPDATE disciplinas SET nome = :nome,
          sala = :sala,
          cargaHoraria = :cargaHoraria, 
          dataInicial = :dataInicial, 
          dataFinal = :dataFinal 
          WHERE idDisciplina = :id";

        $mysql = $pdo->prepare($sql); // Prepara a query
        // Substitui os valores do SQL pelos valores do formulário
        $mysql->bindParam(":nome", $nome);
        $mysql->bindParam(":sala", $sala);
        $mysql->bindParam(":cargaHoraria", $cargaHoraria);
        $mysql->bindParam(":dataInicial", $dataInicial);
        $mysql->bindParam(":dataFinal", $dataFinal);
        $mysql->bindParam(":id", $id);
        $mysql->execute(); // Executa a query

        // Verifica se a atualização foi bem-sucedida e redireciona para outra página
        if ($mysql->rowCount() == 1) {
            header("Location: disciplina.php");
        }
    }
    // Verifica se há um ID na URL
    if (isset($_GET['id'])) {
        include_once __DIR__ . "/config/connection.php";  // Inclui o arquivo de conexão com o banco de dados
        $id = $_GET['id'];
        // Prepara a query SQL para obter os dados da disciplina
        $sql = "SELECT * FROM disciplinas WHERE idDisciplina = :id";
        $pdo = $pdo->prepare($sql);
        $pdo->bindParam(":id", $id);
        $pdo->execute();
        $disciplina = $pdo->fetch(PDO::FETCH_ASSOC);
    }
} catch (\Throwable $th) {
    var_dump($th);  // Imprime o erro
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
                <form action="disciplina_cadastro.php?id=<?php echo $disciplina['idDisciplina']; ?>" method="post">
                    <div>
                        <label for="form_nome" class="form-label">Digite o nome da matéria</label>
                        <input id="form_nome" value="<?php echo isset($disciplina['nome']) ? $disciplina['nome'] : ''; ?>" type="text" placeholder="Nome completo" name="nome" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label for="form_sala" class="form-label">Digite o numero da sala</label>
                        <input id="form_sala" value="<?php echo isset($disciplina['sala']) ? $disciplina['sala'] : ''; ?>" type="text" name="sala" class="form-control" required>
                    </div>
                    <div class="mt-3">
                        <label for="form_cargaHoraria" class="form-label">Digite a carga horária</label>
                        <input id="form_cargaHoraria" value="<?php echo isset($disciplina['cargaHoraria']) ? $disciplina['cargaHoraria'] : ''; ?>" type="text" name="cargaHoraria" class="form-control" required>
                        <div class="mt-3">
                            <label for="form_dataInicial" class="form-label">Digite a data inicial</label>
                            <input id="form_dataInicial" value="<?php echo isset($disciplina['dataInicial']) ?  date('Y-m-d', strtotime($disciplina['dataInicial'])) : ''; ?>" type="date" name="dataInicial" class="form-control" required>
                        </div>
                        <div class="mt-3">
                            <label for="form_dataFinal" class="form-label">Digite a data final</label>
                            <input id="form_dataFinal" value="<?php echo isset($disciplina['dataFinal']) ?  date('Y-m-d', strtotime($disciplina['dataFinal'])) : ''; ?>" type="date" name="dataFinal" class="form-control" required>
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