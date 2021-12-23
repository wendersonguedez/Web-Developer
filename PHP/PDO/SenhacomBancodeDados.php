<?php
$erro = null;
$valido = false; // Validação setada como false no inicio da execução do arquivo, pois ela ainda não ocorreu. 

require "conexao.php"; // Conexão com o banco de dados.

// Na primeira execução do arquivo, ele não entra no bloco if, vai direto para o else (39). Ele irá entrar no bloco abaixo, após o envio da senha alterada, para realizar a validação da senha.
if (isset($_REQUEST['validar']) && $_REQUEST['validar'] == true) {
    // Verifica se o campo 'senha' é diferente do campo 'senhaRepete' 
    if ($_POST['senha'] != $_POST['senhaRepete']) {
        $erro = "Senhas digitadas incorretamente.";
        $erro .= "<br><a href='?id=" . $_POST['id'] . "'>Tentar Novamente</a>"; // Link para alterar a senha novamente, recuperando o mesmo id através de $_POST, pois foi passado por um botão oculto.
        echo $erro; // Exibindo a mensagem de erro e logo em seguida o link acima.
        exit();
    } else {
        // Caso nenhum erro ocorra na validação, executa o bloco abaixo, que realiza a atualização da senha desse usuário. 
        $valido = true;
        // Script SQL que realiza a alteração da senha do usuário.
        $sql = "UPDATE usuarios SET
                senha = ? 
                WHERE id = ?";
        $stmt = $connection->prepare($sql); // Preparando o script SQL para ser executado.

        $passwordHash = md5($_POST['senha']);
        $stmt->bindParam(1, $passwordHash); // O valor contido no campo 'senha' do formulário, é associado à 1º interrogação do script SQL.
        $stmt->bindParam(2, $_POST['id']); // O id passado de forma oculta é associado à 2º interrogação do script SQL.

        $stmt->execute(); // Execução do script SQL.

        // Verificando se ocorreu algum erro com o banco. "00000" é um código de sucesso.
        if ($stmt->errorCode() != "00000") {
            $valido = false; // validação não ocorreu com sucesso.
            $erro = "Error code " . $stmt->errorCode() . ": "; // Logo em seguida, apresentando qual o código do erro.
            $erro .= implode(", ", $stmt->errorInfo()); // errorInfo() apresenta informações de texto do erro que ocorreu. implode() esta juntado todo o texto em uma só linha. separando por virgula.
        }
    }

    // A execução cai direto neste bloco de código, onde retorna o nome e o email do usuário, com os campos do formulario  para alterar sua senha.
} else {
    $resultSet = $connection->prepare("SELECT nome, email FROM usuarios WHERE id = ?"); // Preparando o script SQL que retorna o usuário em questão
    $resultSet->bindParam(1, $_REQUEST['id']); // O id passado na URL é associado ao SELECT acima.

    if ($resultSet->execute()) { // Se a execução do script SQL obter sucesso, executa o código abaixo.
        if ($registro = $resultSet->fetch(PDO::FETCH_OBJ)) { // Caso tenha algum registro, ele é capturado pelo comando fetch(). Esse registro é retornado em formato de objeto, por conta do parâmetro PDO::FETCH_OBJ 
            // Capturando os valores de nome e email do usuário e exibindo na tela, através da variável $_POST. Após alterar os dados, ele é enviado para validação. (bloco de código na linha 8)
            $_POST['nome'] = $registro->nome;
            $_POST['email'] = $registro->email;
        } else { // Caso nenhum registro seja encontrado
            $erro = "Registro não encontrado";
        }
    } else { // Caso ocorra uma falha na execução do script SQL
        $erro = "Falha na captura do registro";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco de Dados: Alteração de senha</title>
</head>

<body>
    <?php
    if ($valido == true) {
        echo "Senha alterada com sucesso! <br><br>";
        echo "<a href='ListagemcomBancodeDados.php'>Exibir usuários cadastrados</a>"; // Link para ir a tela de exibição de registros.
    } else { // Caso os dados não sejam enviados com sucesso (ou o arquivo esteja sendo aberto pela 1º vez) ira executar o bloco de código abaixo, que exibe o formulário. 
        if (isset($erro)) { // Caso a variável $erro esteja setada, significa que algum erro ocorreu. O bloco abaixo irá exibir para o usuário qual foi o erro em questão.
            echo $erro . "<br><br>";
        }
    ?>
        <!-- O envio dos dados está sendo feito para o mesmo arquivo. O parâmetro '?validar=true' serve para informar que os dados foram enviados para validação -->
        <form action="?validar=true" method="POST">
            Nova senha para o usuário 
            <?php 
                echo ucfirst($_POST['nome']);
                echo " (" .$_POST['email'] . ")";
                echo "<br><br>";
            ?>
            <input type="password" name="senha" placeholder="Digite sua senha"><br><br>
            <input type="password" name="senhaRepete" placeholder="Digite a senha novamente"><br><br>

            <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>"> <!-- Passando o id do usuário de forma oculta para o PHP -->
            <input type="submit" value="Alterar">
            <input type="reset" value="Limpar">
        </form>
    <?php
        }
    ?>
</body>

</html>