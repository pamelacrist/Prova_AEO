<?php

include __DIR__ . "/header.php";

if (isset($_GET['id'])) {
    include_once __DIR__ . "/config/connection.php";
    $id = $_GET['id'];

    $sql = "DELETE FROM disciplinas WHERE idDisciplina = :id";
     
    $pdo = $pdo->prepare($sql);
    $pdo->bindParam(":id", $id);
    $pdo->execute();
   
    if ($pdo->rowCount() == 1) {
        header("Location: disciplina.php");
    }
}
?>

<main>
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-12 bg-primary bg-gradient py-5 ">
                <h1 class="text-center text-light">Cadastro Disciplina</h1>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="d-flex flex-row-reverse mb-1">
            <a type="button" href="disciplina_cadastro.php" class="btn btn-success">+</a>
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
                        $sql = "SELECT * FROM disciplinas";
                        $resultado = $pdo->query($sql);
                        if ($resultado->rowCount() > 0) {
                            while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                        <th scope="row"><?php  echo $row['idDisciplina']; ?></th>
                        <td><?php  echo $row['nome']; ?></td > 
                        <td><?php  echo $row['email']; ?></td>
                        <td><?php  echo $row['telefone']; ?></td>
                        <td><?php  echo $row['cpf']; ?></td>
                        
                        <td>
                            <a type="button"  href="disciplina_cadastro.php?id=<?php echo $row['idDisciplina']; ?>"  class="btn btn-warning">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                        </td>
                        <td>
                            <a type="button" class="btn btn-danger" href="disciplina.php?id=<?php echo $row['idDisciplina']; ?>">
                                <i class="fa-regular fa-trash-can"></i>
                            </a>
                        <td>
                        </tr>
                        <?php  }
            } else {
                echo "Não encontramos disciplinas, que tristeza";
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