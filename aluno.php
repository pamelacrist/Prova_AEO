<?php

include __DIR__ . "/header.php";

if (isset($_GET['id'])) {
    try {
        include_once __DIR__ . "/config/connection.php";
        $id = $_GET['id'];
        $sql = "DELETE FROM alunos WHERE idAluno = :id";
        $pdo = $pdo->prepare($sql);
        $pdo->bindParam(":id", $id);
        $pdo->execute();
        $aluno = $pdo->fetch(PDO::FETCH_ASSOC);
        if ($pdo->rowCount() == 1) {
            header("Location: aluno.php");
        }else{
            echo "Não foi possível excluir o aluno!";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
   
}
?>

<main>
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-12 bg-primary bg-gradient py-5 ">
                <h1 class="text-center text-light">Cadastro Aluno</h1>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="d-flex flex-row-reverse mb-1">
            <a type="button" href="aluno_cadastro.php" class="btn btn-success">+</a>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex flex-column justify-content-center">
                <table class="table">
                    <thead class="table-dark">
                        <tr >
                        <th scope="col">#</th>
                        <th scope="col">Nome </th >
                        <th scope="col">Email</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">CPF</th>
                        <th colspan="2" scope="col">Ação</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include_once __DIR__ . "/config/connection.php";
                        $sql = "SELECT * FROM alunos";
                        $resultado = $pdo->query($sql);
                        if ($resultado->rowCount() > 0) {
                            while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                        <th scope="row"><?php  echo $row['idAlunos']; ?></th>
                        <td><?php  echo $row['nome']; ?></td > 
                        <td><?php  echo $row['email']; ?></td>
                        <td><?php  echo $row['telefone']; ?></td>
                        <td><?php  echo $row['cpf']; ?></td>
                        
                        <td>
                            <a type="button"  href="aluno_cadastro.php?id=<?php echo $row['idAluno']; ?>"  class="btn btn-warning">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                        </td>
                        <td>
                            <a type="button" class="btn btn-danger" href="aluno.php?id=<?php echo $row['idAluno']; ?>">
                                <i class="fa-regular fa-trash-can"></i>
                            </a>
                        <td>
                        </tr>
                        <?php  }
            } else {
                echo "Não foi encontrado o aluno!";
            }?>
                    </tbody>
                </table>    
            </div>
           
               
            
        </div>
    </div>
</main>

<?php

include __DIR__ . "/footer.php";

?>