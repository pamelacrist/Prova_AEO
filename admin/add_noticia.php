<?php
@session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['form_titulo']) && isset($_POST['form_texto'])) {

    include_once __DIR__ . "/../config/connection.php";

    $titulo = $_POST['form_titulo'];
    $texto = $_POST['form_texto'];
    $data_hoje = date("Y-m-d H:i:s");
    //  id	 titulo	 data	 conteudo
    $sql = "INSERT INTO noticias (titulo, data, conteudo) VALUES (:titulo, :data, :conteudo)";
    $pdo = $pdo->prepare($sql);
    $pdo->bindParam(":titulo", $titulo);
    $pdo->bindParam(":data", $data_hoje);
    $pdo->bindParam(":conteudo", $texto);
    $pdo->execute();


    if ($pdo->rowCount() == 1) {
        $mensagem = "Notícia inserida com sucesso!";
    } else {
        $mensagem = "Erro ao inserir notícia!";

    }
}


$titulo = "Adicionar Notícia";
include_once __DIR__ . "/header_dash.php";
?>

<?php
include_once __DIR__ . "/menu.php";
?>
<div class="container p-3">

    <div>

        <div class="row">
            <div class="col-md-6">
                <h3>Adicionar Notícia</h3>
                <p>A página de adicionar notícia é uma ferramenta que permite aos usuários criar e publicar notícias em
                    um site. Nesta página, o usuário pode inserir o título, o conteúdo da notícia. O usuário também pode visualizar a notícia antes de publicá-la ou salvá-la como
                    rascunho. A página de adicionar notícia facilita a comunicação e a divulgação de informações
                    relevantes para o público-alvo do site.


                </p>
                <?php
                if (isset($mensagem)) {
                    echo "<p>$mensagem</p>";
                }
                ?>
            </div>
            <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="titulo" class="form-label w-100">
                            <input class="form-control" type="text" name="form_titulo" placeholder="Título da notícia"
                                id="titulo">
                        </label>
                    </div>
                    <div>
                        <label for="texto" class="form-label w-100">
                            <textarea class="form-control" name="form_texto" id="texto" cols="30" rows="10"
                                placeholder="Texto da notícia"></textarea>
                        </label>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Enviar">
                </form>


            </div>
        </div>

    </div>

</div>
<?php
include_once __DIR__ . "/footer_dash.php";
?>