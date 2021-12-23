<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessão e Cookies: Conteúdo Sigiloso</title>
</head>

<body>
    <?php
    session_start();
    // Se $_SESSION['usuario'] não estiver setado, exibe mensagem de erro e encerra a execução do arquivo PHP
    if (!isset($_SESSION['usuario'])) {
        echo "Erro";
        exit();
    }
    echo "Ola " . $_SESSION['usuario'] . "<br><br>";



    ?>

    [Conteudo privado]
</body>

</html>