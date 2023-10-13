<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro no Cadastro</title>
</head>
<body>
    <h1>Ocorreram erros durante o cadastro:</h1>
    <ul>
        <?php
        // Verifique se há mensagens de erro na URL
        if (isset($_GET['errors'])) {
            $errorMessages = json_decode($_GET['errors']);
            foreach ($errorMessages as $error) {
                echo "<li>$error</li>";
            }
        } else {
            echo "<li>Erro desconhecido.</li>";
        }
        ?>
    </ul>
    <a href="../pages/Cadastro.php">Voltar para a página de cadastro</a>
</body>
</html>
