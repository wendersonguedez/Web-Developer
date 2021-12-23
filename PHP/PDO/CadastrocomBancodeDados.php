<?php
$erro = null;
$valido = false; // Validação setada como false no inicio da execução do arquivo, pois ela ainda não ocorreu. 

/* Bloco de código para verificar se o envio dos dados estao corretos para validação.  Mas antes da validação, verifica se o índice 'validar' existe dentro de $_REQUEST.
Caso exista, também verifica se o índice é igual a true. $_REQUEST contém os paramêtros criados no metódo action */
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
        // Caso nenhum erro seja encontrado, executa o bloco abaixo, indicando que a validação ocorreu com sucesso. 
        $valido = true;
        require "conexao.php"; // Chamando o arquivo que realiza a conexão com o banco.

        // Script SQL que realiza a inserção dos dados do usuário no banco.
        $sql = "INSERT INTO usuarios 
                (nome, email, idade, sexo, estado_civil, humanas, exatas, biologicas, senha)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"; // Cada ? refere-se a um campo do banco.
        
        $stmt = $connection->prepare($sql); // Preparando o script SQL para ser executado. ou seja, um statement.

        $stmt->bindParam(1, $_POST['nome']); // Associando o campo nome do formulario à ? na 1º posição da instrução SQL, atraves do paramêtro bindParam.
        $stmt->bindParam(2, $_POST['email']);
        $stmt->bindParam(3, $_POST['idade']);
        $stmt->bindParam(4, $_POST['sexo']);
        $stmt->bindParam(5, $_POST['estadocivil']);

        // Verificando se o campo de interesse 'humanas' foi marcado. ? = caso sim. : = caso nao
        $checkHumanas = isset($_POST['humanas']) ? 1 : 0; // short if. caso 'humanas' tenha sido marcada, é atribuido valor 1. senao, é atribuido 0. 
        $stmt->bindParam(6, $checkHumanas);
    
        $checkExatas = isset($_POST['exatas']) ? 1 : 0;
        $stmt->bindParam(7, $checkExatas);

        $checkBiologicas = isset($_POST['biologicas']) ? 1 : 0;
        $stmt->bindParam(8, $checkBiologicas);

        $passwordHash = md5("wendersontesteoctopusfxsegurançasenhaguedes" . $_POST['senha']); // Armazenando o codigo hash da senha digitada
        $stmt->bindParam(9, $passwordHash); // Inserindo no campo 'senha' o codigo hash da senha digitada 

        $stmt->execute(); // execute() realiza a execução do script SQL, criado logo acima. 
        
        // Em caso de erros no banco, errorCode() é um método que captura eventuais erros. "00000" é um código de sucesso
        if($stmt->errorCode() != "00000"){
            $valido = false; // validação não ocorreu com sucesso.
            $erro = "Error code " . $stmt->errorCode() . ": "; // Logo em seguida, apresentando qual o código do erro
            $erro .= implode(", ", $stmt->errorInfo()); // errorInfo() é um método que apresentado informações de texto do erro que ocorreu. implode() esta juntado todo o texto em uma só linha. separando por virgula.
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco de Dados: Cadastro</title>
</head>

<body>
    <?php
    if($valido == true){
        echo "Dados enviados com sucesso! <br><br>";
        echo "<a href='ListagemcomBancodeDados.php'>Exibir usuários cadastrados</a>"; // Link para ir a tela de exibição de registros.
    } 
    /* Caso os dados não sejam enviados com sucesso (ou o arquivo esteja sendo aberto pela 1º vez) ira executar o bloco de código abaixo, que exibe o formulário. */
    else{    
    // Caso a variável $erro esteja setada, significa que algum erro ocorreu. O bloco abaixo irá exibir para o usuário qual foi o erro em questão.
    if (isset($erro)) {
        echo $erro . "<br><br>";
    }
    ?>
    <!-- O envio dos dados está sendo feito para o mesmo arquivo. O parâmetro '?validar=true' serve para informar que os dados foram enviados para validação --> 
    <form action="?validar=true" method="POST">
        Nome:
        <input type="text" name="nome"
        <?php if(isset($_POST['nome'])) { echo "value='" . $_POST['nome'] . "'"; } ?> 
        ><br><br>
        Email:
        <input type="email" name="email"
        <?php if(isset($_POST['email'])) { echo "value='" . $_POST['email'] . "'"; } ?> 
        ><br><br>
        Idade:
        <input type="text" name="idade"
        <?php if(isset($_POST['idade'])) { echo "value='" . $_POST['idade'] . "'"; } ?> 
        ><br><br>
        Sexo
        <input type="radio" name="sexo" value="M"
        <?php if(isset($_POST['sexo']) && $_POST['sexo'] == "M") { echo "checked"; } ?> 
        >Masculino
        <input type="radio" name="sexo" value="F"
        <?php if(isset($_POST['sexo']) && $_POST['sexo'] == "F") { echo "checked"; } ?> 
        >Feminino
        <br><br>
        Interesses:
        <input type="checkbox" name="humanas"
        <?php if(isset($_POST['humanas'])) { echo "checked"; } ?>
        >Ciências Humanas
        <input type="checkbox" name="exatas"
        <?php if(isset($_POST['exatas'])) { echo "checked"; } ?>
        >Ciências Exatas
        <input type="checkbox" name="biologicas"
        <?php if(isset($_POST['biologicas'])) { echo "checked"; } ?>
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
        Senha:
        <input type="password" name="senha">
        <br><br>
        <input type="submit" value="Enviar">
        <input type="reset" value="Limpar">
    </form>
    <?php
    }
    ?>
</body>

</html>