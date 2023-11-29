<?php

include __DIR__ . "/header.php"; // Incluindo o arquivo de cabeçalho

// Verifica se foi passado um parâmetro 'id' na URL (método GET)
if (isset($_GET['id'])) {
    try {
        // Incluindo arquivo de conexão com o banco de dados
        include_once __DIR__ . "/config/connection.php";
        // Obtém o ID do aluno a ser excluído da URL
        $id = $_GET['id'];
        // Prepara e executa a consulta SQL para excluir o aluno com base no ID
        $sql = "DELETE FROM alunos WHERE idAluno = :id";
        $pdo = $pdo->prepare($sql);
        $pdo->bindParam(":id", $id);
        $pdo->execute();
        $aluno = $pdo->fetch(PDO::FETCH_ASSOC);

        // Verifica se a exclusão foi bem-sucedida
        if ($pdo->rowCount() == 1) {
            header("Location: aluno.php"); // Redireciona para a página de listagem de alunos após a exclusão
        } else {
            echo "Não foi possível excluir o aluno!"; // Caso a exclusão não tenha sido bem-sucedida, exibe uma mensagem
        }
    } catch (PDOException $e) {
        echo $e->getMessage(); // Exibe uma mensagem de erro caso ocorra uma exceção durante o processo
    }
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
        <h1 class=" text-black text-center text-light">Listagem Aluno</h1>

        <div class="mb-1 ms-1 m-4" style="display:flow-root">
            <a type="button" data-bs-toggle="collapse" data-bs-target="#searchForm" class="btn btn-primary float-start"><i class="fas fa-filter"></i></a>
            <div class=" d-inline-flex ms-2">
                <form id="searchForm" action="aluno.php" method="get" class="collapse">
                    <div class="d-flex">
                        <input type="text" class="form-control me-2" value="<?php echo $_GET['busca']; ?>" name="busca" placeholder="Buscar por nome, email ou CPF">
                        <button class="btn btn-secondary">Buscar</button>
                        <a type="button" href="aluno.php" class="btn btn-secondary">Limpar</a>
                    </div>
                </form>

            </div>
            <a type="button" href="aluno_cadastro.php" class="btn btn-success float-end">+</a>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex flex-column justify-content-center">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome </th>
                            <th scope="col">Email</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">CPF</th>
                            <th colspan="2" scope="col">Ação</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Inclui o arquivo de conexão com o banco de dados
                        include_once __DIR__ . "/config/connection.php";

                        try {
                            // Define o número de registros por página
                            $registrosPorPagina = 10;
                            // Obtém a página atual da URL ou define como 1 se não estiver presente
                            $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
                            // Calcula o início da seleção de registros com base na página atual
                            $inicio = ($registrosPorPagina * $paginaAtual) - $registrosPorPagina;

                            // Verifica se uma busca foi realizada
                            if (isset($_GET['busca']) && !empty($_GET['busca'])) {
                                // Obtém o termo de busca da URL
                                $busca = isset($_GET['busca']) ? $_GET['busca'] : '';
                                // Prepara a consulta SQL para buscar alunos com base no termo de busca
                                $sql = "SELECT * FROM alunos WHERE nome LIKE :busca  OR email LIKE :busca OR cpf LIKE :busca LIMIT $inicio, $registrosPorPagina";
                                // Prepara a consulta SQL para contar o total de registros que correspondem ao termo de busca
                                $sqlTotal = "SELECT COUNT(*) as total FROM alunos WHERE nome LIKE :busca  OR email LIKE :busca OR cpf LIKE :busca";

                                // Executa a consulta SQL para contar o total de registros
                                $resultadoTotal = $pdo->prepare($sqlTotal);
                                $resultadoTotal->bindValue(':busca', "%$busca%");
                                $resultadoTotal->execute();

                                // Obtém o total de registros que correspondem ao termo de busca
                                $totalRegistros = $resultadoTotal->fetch(PDO::FETCH_ASSOC)['total'];

                                // Executa a consulta SQL para buscar alunos
                                $resultado = $pdo->prepare($sql);
                                $resultado->bindValue(':busca', "%$busca%");
                                $resultado->execute();
                            } else {
                                // Define a consulta SQL para selecionar todos os alunos com um limite definido para paginação
                                $sql = "SELECT * FROM alunos LIMIT $inicio, $registrosPorPagina";

                                // Define a consulta SQL para contar o total de alunos
                                $sqlTotal = "SELECT COUNT(*) as total FROM alunos";

                                // Executa a consulta SQL para contar o total de alunos
                                $resultadoTotal = $pdo->query($sqlTotal);

                                // Obtém o total de alunos
                                $totalRegistros = $resultadoTotal->fetch(PDO::FETCH_ASSOC)['total'];

                                // Executa a consulta SQL para selecionar os alunos
                                $resultado = $pdo->query($sql);
                            }

                            // Verifica se a consulta retornou algum registro
                            if ($resultado->rowCount() > 0) {
                                // Itera sobre cada registro retornado pela consulta
                                while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                                    // Inicia a linha da tabela
                        ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['idAluno']; ?></th>
                                        <td><?php echo $row['nome']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['telefone']; ?></td>
                                        <td><?php echo $row['cpf']; ?></td>

                                        <!-- Exibe o botão de edição do aluno -->
                                        <td>
                                            <a type="button" href="aluno_cadastro.php?id=<?php echo $row['idAluno']; ?>" class="btn btn-warning">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                        </td>
                                        <!-- Exibe o botão de exclusão do aluno -->
                                        <td>
                                            <a type="button" class="btn btn-danger" href="aluno.php?id=<?php echo $row['idAluno']; ?>">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </a>
                                        <td>
                                    </tr>
                        <?php
                                }
                            } else {
                                // Exibe uma mensagem se não foram encontrados alunos
                                echo "Não encontramos alunos cadastrados!";
                            }
                        } catch (PDOException $e) {
                            // Exibe a mensagem de erro se ocorrer uma exceção
                            echo $e->getMessage();
                        } ?>
                    </tbody>
                </table>

                <!-- Início da navegação de paginação -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <!-- Loop para gerar os números de página -->
                        <?php for ($i = 1; $i <= ceil($totalRegistros / $registrosPorPagina); $i++) : ?>
                            <!-- Cria um item de página. Adiciona a classe 'active' se esta é a página atual -->
                            <li class="page-item <?php echo $i == $paginaAtual ? 'active' : '' ?>">
                                <!-- Link para a página -->
                                <a class="page-link" href="?pagina=<?php echo $i ?>"><?php echo $i ?></a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </nav>
                <!-- Fim da navegação de paginação -->

            </div>
        </div>
    </div>
</main>

<!-- Inclui o rodapé da página -->
<?php include __DIR__ . "/footer.php"; ?>