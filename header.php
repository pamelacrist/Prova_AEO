<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Define a codificação de caracteres do documento -->
    <meta charset="UTF-8">
    <!-- Define a viewport para dispositivos móveis -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Define o título da página -->
    <title>
        <?php echo isset($title) ? $title :  "Título Padrão"; ?>
    </title>

    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
    <!-- Inclui o CSS do Bootstrap via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Inclui o JS do Bootstrap via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Inclui o arquivo CSS principal -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- Template Stylesheet -->
</head>

<body>

    <?php
    $logado = false;
    // Inclui o arquivo de menu
    include __DIR__ . "/menu.php";
    ?>