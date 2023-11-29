<?php

include __DIR__ . "/header.php";

if (isset($_GET['id'])) {
    include_once __DIR__ . "/config/connection.php";
    $id = $_GET['id'];

    $sql = "DELETE FROM professores WHERE idProfessor = :id";
     
    $pdo = $pdo->prepare($sql);
    $pdo->bindParam(":id", $id);
    $pdo->execute();
   
    if ($pdo->rowCount() == 1) {
        header("Location: professor.php");
    }
}
?>

<main>
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-12 bg-primary bg-gradient py-5 ">
                <h1 class="text-center text-light">Cadastro Professor</h1>
            </div>
        </div>
    </div>
    <div class="container py-5">
       
        <div class="mb-1 ms-1 m-4" style="display:flow-root">
            <a type="button" data-bs-toggle="collapse" data-bs-target="#searchForm" class="btn btn-primary float-start"><i class="fas fa-filter"></i></a>
               <div class=" d-inline-flex ms-2">
                <form id="searchForm" action="professor.php" method="get" class="collapse">
                    <div class="d-flex">
                        <input type="text" class="form-control me-2" value="<?php echo $_GET['busca'];?>"  name="busca" placeholder="Buscar por nome, email ou CPF">
                        <button class="btn btn-secondary">Buscar</button>
                        <a type="button" href="professor.php" class="btn btn-secondary">Limpar</a>
                    </div> 
                </form>

                </div>
            <a type="button" href="professor_cadastro.php" class="btn btn-success float-end">+</a>
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
                        try {
                            
                            $registrosPorPagina = 10;
                           
                            $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
                            $inicio = ($registrosPorPagina * $paginaAtual) - $registrosPorPagina;

                        if(isset($_GET['busca']) && !empty($_GET['busca'])){
                            $busca = isset($_GET['busca']) ? $_GET['busca'] : '';
                            $sql = "SELECT * FROM professores WHERE nome LIKE :busca  OR email LIKE :busca OR cpf LIKE :busca LIMIT $inicio, $registrosPorPagina";
                            $sqlTotal = "SELECT COUNT(*) as total FROM professores WHERE nome LIKE :busca  OR email LIKE :busca OR cpf LIKE :busca";
                            $resultadoTotal = $pdo->prepare($sqlTotal);
                            $resultadoTotal->bindValue(':busca', "%$busca%");
                            $resultadoTotal->execute();
                            $totalRegistros = $resultadoTotal->fetch(PDO::FETCH_ASSOC)['total'];
                            $resultado = $pdo->prepare($sql);
                            $resultado->bindValue(':busca', "%$busca%");
                            $resultado->execute();
                        }else{
                            $sql = "SELECT * FROM professores LIMIT $inicio, $registrosPorPagina";
                            $sqlTotal = "SELECT COUNT(*) as total FROM professores";
                            $resultadoTotal = $pdo->query($sqlTotal);
                            $totalRegistros = $resultadoTotal->fetch(PDO::FETCH_ASSOC)['total'];
                            $resultado = $pdo->query($sql);
                        }
                       
                        if ($resultado->rowCount() > 0) {
                            while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                        <th scope="row"><?php  echo $row['idProfessor']; ?></th>
                        <td><?php  echo $row['nome']; ?></td > 
                        <td><?php  echo $row['email']; ?></td>
                        <td><?php  echo $row['telefone']; ?></td>
                        <td><?php  echo $row['cpf']; ?></td>
                        
                        <td>
                            <a type="button"  href="professor_cadastro.php?id=<?php echo $row['idProfessor']; ?>"  class="btn btn-warning">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                        </td>
                        <td>
                            <a type="button" class="btn btn-danger" href="professor.php?id=<?php echo $row['idProfessor']; ?>">
                                <i class="fa-regular fa-trash-can"></i>
                            </a>
                        <td>
                        </tr>
                        <?php  }
            } else {
                echo "Não encontramos professores, que tristeza";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }?>
                    </tbody>
                </table>    
                
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <?php for ($i = 1; $i <= ceil($totalRegistros / $registrosPorPagina); $i++): ?>
      <li class="page-item <?php echo $i == $paginaAtual ? 'active' : '' ?>"><a class="page-link" href="?pagina=<?php echo $i ?>"><?php echo $i ?></a></li>
    <?php endfor; ?>
  </ul>
</nav>
            </div>
           
               
            
        </div>
    </div>
</main>

<?php

include __DIR__ . "/footer.php";

?>