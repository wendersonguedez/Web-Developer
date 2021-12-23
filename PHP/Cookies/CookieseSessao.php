<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Wenderson Guedes">
    <title>Sessão e Cookies: Autenticação</title>
</head>

<body>
    <?php

    // Verificando se o cookie de visitas do usuario esta setado, caso sim, a cada visita ele recebe +1. Caso não, recebe 1
    if (isset($_COOKIE['visitas'])) {
        $visitas = $_COOKIE['visitas'] + 1; // Caso o cookie já esteja setado, é adicionado +1 a cada visita do usuario
    } else {
        $visitas = 1;
    }

    // Criando um cookie chamado visitas, tendo o seu valor retornado do código acima.
    setcookie("visitas", $visitas, time() + 30 * 24 * 60 * 60);

    echo "Essa é sua visita número " . $visitas . " no site. <br><br>";


    // Validação do formulario

    if (isset($_REQUEST['autenticar']) && $_REQUEST['autenticar'] == true) {
        $passHash = md5($_POST['senha']);

        try {
            $connection = new PDO("mysql:host=localhost; dbname=cursoPHP", "wendy", "caraidigdin");
            $connection->exec("set names utf8");
        } catch (PDOException $e) { // Eventuais erros são armazenados em $e
            echo "Falha: " . $e->getMessage();
            exit();
        }

        $sql = "SELECT nome FROM usuarios WHERE email = ? AND senha = ?";
        $resultSet = $connection->prepare($sql);

        $resultSet->bindParam(1, $_POST['email']);
        $resultSet->bindParam(2, $passHash);

        if ($resultSet->execute()) { // Verificando se a execução ao banco ocorreu com sucesso.
            if ($registro = $resultSet->fetch(PDO::FETCH_OBJ)) { // $registro recebe o próximo registro encontrado no banco.
                session_start(); // Iniciando uma sessão
                $_SESSION['usuario'] = $registro->nome; // Gravando na sessão o nome do usuário que fez login
            
                header("location: CookieseSessao2.php"); // Encamihando o usuário para a tela em questão
            } else {
                echo "Dados inválidos";
            }
        } else {
            echo "Falha no acesso";
        }
    }
    ?>

</body>
<form action="?autenticar=true" method="POST">
    Email:
    <input type="email" name="email">
    Senha:
    <input type="password" name="senha"><br><br>

    <input type="submit" value="Autenticar"><br><br>
    
</form>

</html>