<?php
$erro = null;
$valido = false; // Validação setada como false no inicio da execução do arquivo, pois ela ainda não ocorreu. 

require "conexao.php"; // Conexão com o banco de dados.

// Na primeira execução do arquivo, cai direto para o bloco else (78). Ele irá entrar no bloco if, após o envio dos dados alterados, para realizar a validação.
if (isset($_REQUEST['validar']) && $_REQUEST['validar'] == true) {
    // Verifica se o campo 'nome' do formulario tem menos que cinco caracteres. 
    if (strlen(utf8_decode($_POST['nome'])) < 5) {
        $erro = "Preencha o campo nome corretamente (5 ou mais caracteres)";
    }
    // Caso o campo 'nome' esteja correto, verifica o campo email. 
    else if (strlen(utf8_decode($_POST['email'])) < 6) {
        $erro = "Email inválido, preencha o campo corretamente";
    }
    // Verificando se o caractere inserido no campo 'idade' é numérico. 
    else if (is_numeric($_POST['idade']) == false) {
        $erro = "Campo idade deve ser numérico";
    }
    // Verificando se o campo 'sexo' está selecionado corretamente. 
    else if ($_POST['sexo'] != "M" && $_POST['sexo'] != "F") {
        $erro = "Selecione o campo sexo corretamente";
    }
    // Verificando se o campo 'estadocivil" esta selecionado corretamente. 
    else if (
        $_POST['estadocivil'] != "Solteiro(a)" &&
        $_POST['estadocivil'] != "Casado(a)" &&
        $_POST['estadocivil'] != "Divorciado(a)" &&
        $_POST['estadocivil'] != "Viúvo(a)"
    ) {
        $erro = "Seleciona o campo de estado civil corretamente";
    } else {
        // Caso nenhum erro ocorra na validação, executa o bloco abaixo, indicando que a validação ocorreu com sucesso. 
        $valido = true;
        // Script SQL que realiza a alterações dos dados do usuário no banco. '?' é um parâmetro, não tendo um valor especificado.
        $sql = "UPDATE usuarios SET
                nome = ?, 
                email = ?,
                idade = ?,
                sexo = ?,
                estado_civil = ?,
                humanas = ?,
                exatas = ?,
                biologicas = ?
                WHERE id = ?";
        
        $stmt = $connection->prepare($sql); // Preparando o script SQL para ser executado.

        $stmt->bindParam(1, $_POST['nome']); // Inserindo o valor contido no campo 'nome' ao campo nome do banco de dados. 
        $stmt->bindParam(2, $_POST['email']); // Inserindo o valor contido no campo 'email' ao campo email.
        $stmt->bindParam(3, $_POST['idade']);
        $stmt->bindParam(4, $_POST['sexo']);
        $stmt->bindParam(5, $_POST['estadocivil']);

        // Verificando se o campo de interesse 'humanas' foi marcado, através do short if.
        $checkHumanas = isset($_POST['humanas']) ? 1 : 0; // caso 'humanas' tenha sido marcada, é atribuido valor 1. senao, é atribuido 0. 
        $stmt->bindParam(6, $checkHumanas); // Valor contido em $checkHumanas, é inserido na interrogação de posição 6.
    
        $checkExatas = isset($_POST['exatas']) ? 1 : 0;
        $stmt->bindParam(7, $checkExatas);

        $checkBiologicas = isset($_POST['biologicas']) ? 1 : 0;
        $stmt->bindParam(8, $checkBiologicas);

        $stmt->bindParam(9, $_POST['id']);

        $stmt->execute(); // Executando todo o statement, que realiza a alteração dos dados do usuário. 
        
        // errorCode() é um método que captura eventuais erros no banco. "00000" é um código de sucesso
        if ($stmt->errorCode() != "00000") {
            $valido = false; // Indicando que a validação não ocorreu
            $erro = "Error code " . $stmt->errorCode() . ": "; // Apresentando o código do erro que ocorreu
            $erro .= implode(", ", $stmt->errorInfo()); // Apresentado informações de texto do erro em questão. implode() esta juntado todo o texto em uma só linha e separando por virgula.
        }
    }
// Retornando o formulário com os campos preenchidos pelo usuário selecionado.
} else {
    $resultSet = $connection->prepare("SELECT * FROM usuarios WHERE id = ?"); // Preparando o script SQL que retorna o usuário selecionado.
    $resultSet->bindParam(1, $_REQUEST['id']); // O id do usuário que foi passado via URL.

    if ($resultSet->execute()) { // Se a execução do script SQL obter sucesso, executa o código abaixo.
        if ($registro = $resultSet->fetch(PDO::FETCH_OBJ)) { // Caso tenha algum registro, ele é capturado pelo comando fetch() e retornado como objeto devido seu parâmetro. 
            $_POST['nome'] = $registro->nome; // O campo 'nome' do formulário está recebendo o valor contido no campo 'nome' do banco.
            $_POST['email'] = $registro->email;
            $_POST['idade'] = $registro->idade;
            $_POST['sexo'] = $registro->sexo;
            $_POST['estadocivil'] = $registro->estado_civil;
            $_POST['humanas'] = $registro->humanas == 1 ? true : null; // Caso o usuário tenha marcado este campo, trará ele marcado. Caso não, trará ele desmarcado.
            $_POST['exatas'] = $registro->exatas == 1 ? true : null;
            $_POST['biologicas'] = $registro->biologicas == 1 ? true : null;
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
    <title>Banco de Dados: Alteração</title>
</head>

<body>
    <?php
    if ($valido == true) { // Validação e alteração ocorreram com sucesso.
        echo "Dados alterados com sucesso! <br><br>";
        echo "<a href='ListagemcomBancodeDados.php'>Exibir usuários cadastrados</a>"; // Link para ir a tela de exibição de registros.
    } else { // Caso os dados não sejam enviados com sucesso (ou o arquivo esteja sendo aberto pela 1º vez) ira executar o bloco de código abaixo, que exibe o formulário. 
        if (isset($erro)) { // Caso algum erro tenha ocorrido durante a validação ou alteração dos dados, ele é exibido pelo usuário.
            echo $erro . "<br><br>";
        }
    ?>
    <!-- O envio dos dados está sendo feito para o mesmo arquivo. O parâmetro '?validar=true' serve para informar que os dados foram enviados para validação --> 
    <form action="?validar=true" method="POST">
        Nome:
        <input type="text" name="nome"
        <?php // Caso este campo tenha algum valor, ele é recuperado do banco e preenchido no campo.
        if(isset($_POST['nome'])) { echo "value='" . $_POST['nome'] . "'"; }  ?> 
        ><br><br>
        Email:
        <input type="email" name="email"
        <?php 
        if(isset($_POST['email'])) { echo "value='" . $_POST['email'] . "'"; } ?> 
        ><br><br>
        Idade:
        <input type="text" name="idade"
        <?php 
        if(isset($_POST['idade'])) { echo "value='" . $_POST['idade'] . "'"; } ?> 
        ><br><br>
        Sexo
        <input type="radio" name="sexo" value="M"
        <?php 
        if(isset($_POST['sexo']) && $_POST['sexo'] == "M") { echo "checked"; } ?> 
        >Masculino
        <input type="radio" name="sexo" value="F"
        <?php 
        if(isset($_POST['sexo']) && $_POST['sexo'] == "F") { echo "checked"; } ?> 
        >Feminino
        <br><br>
        Interesses:
        <input type="checkbox" name="humanas"
        <?php 
        if(isset($_POST['humanas'])) { echo "checked"; } ?>
        >Ciências Humanas
        <input type="checkbox" name="exatas"
        <?php 
        if(isset($_POST['exatas'])) { echo "checked"; } ?>
        >Ciências Exatas
        <input type="checkbox" name="biologicas"
        <?php 
        if(isset($_POST['biologicas'])) { echo "checked"; } ?>
        >Ciências Biologicas
        <br><br>
        
        Estado Civil:
        <select name="estadocivil">
            <option>Selecione...</option>
            <option
            <?php if(isset($_POST['estadocivil']) && $_POST['estadocivil'] == "Solteiro(a)") { echo "selected"; } ?>
            >Solteiro(a)</option>

            <option
            <?php if(isset($_POST['estadocivil']) && $_POST['estadocivil'] == "Casado(a)") { echo "selected"; } ?>
            >Casado(a)</option>

            <option
            <?php if(isset($_POST['estadocivil']) && $_POST['estadocivil'] == "Divorciado(a)") { echo "selected"; } ?>
            >Divorciado(a)</option>
            
            <option
            <?php if(isset($_POST['estadocivil']) && $_POST['estadocivil'] == "Viúvo(a)") { echo "selected"; } ?>
            >Viúvo(a)</option>
        </select>
        <br><br>
        <br><br>
        <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>"> <!-- Passando o id do usuário de forma oculta para o PHP -->
        <input type="submit" value="Alterar">
        <input type="reset" value="Limpar">
    </form>
    <?php
    }
    ?>
</body>

</html>