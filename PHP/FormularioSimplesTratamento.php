<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tratamento do Formulario Simples</title>
</head>

<body>
    <?php
    // RECEBENDO OS DADOS INSERIDOS PELO USUÁRIO NO ARQUIVO FormularioSimples.php
    echo "O nome informado foi: " . $_POST['nome'] . "<br>";
    echo "O sobrenome informado foi: " . $_POST['sobrenome'] . "<br>";
    echo "O estado civil informado foi: " . $_POST['estadocivil'] . "<br>";
    ?>

</body>

</html>