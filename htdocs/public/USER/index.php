<?php 
    use HTDOCS\funcoes\VerificarPagina;
    require_once __DIR__."/../../vendor/autoload.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../app/assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../../app/assets/css/style.css">
    <link rel="stylesheet" href="../../app/assets/css/user.css">
    <title>Parametrização Expert</title>
</head>
<body>
    <div class="alert"><small></small>
    </div> <!-- alert -->
    <div class="container center h-100"> 
    <?php new VerificarPagina("USER"); ?>
    </div> <!-- container -->

    <script src="../../app/assets/js/Funcoes.Feitas.js"></script>
    <script src="../../app/assets/js/Validacao.Index.js"></script>
</body>
</html>