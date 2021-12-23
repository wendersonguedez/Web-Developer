<?php
$erro = null;
$valido = false; // VALIDAÇÃO AINDA SETADA COMO FALSE NO INICIO DA EXECUÇÃO DO ARQUIVO, POIS ELA AINDA NÃO OCORREU.

/* BLOCO DE CÓDIGO PARA VERIFICAR SE O ENVIO DOS DADOS ESTAO CORRETOS PARA VALIDAÇÃO. MAS ANTES, VERIFICA SE O INDICE 'validar' EXISTE DENTRO DA SUPERVARIAVEL $_REQUEST.
CASO ESTEJA SETADA, VERIFICA SE O INDICE 'validar' É IGUAL A true na SUPERVARIAVEL $_REQUEST. $_REQUEST CONTÉM OS VALORES DE $_GET E $_POST */
if (isset($_REQUEST['validar']) && $_REQUEST['validar'] == true) {
    // VERIFICANDO SE O CAMPO 'nome' FORMULARIO TEM MENOS QUE CINCO CARACTERES.
    if (strlen(utf8_decode($_POST['nome'])) < 5) {
        $erro = "Preencha o campo nome corretamente (5 ou mais caracteres)";
    }
    // CASO O CAMPO 'nome' ESTEJA CORRETO, VERIFICA O CAMPO EMAIL.
    else if (strlen(utf8_decode($_POST['email'])) < 6) {
        $erro = "Email inválido, preencha o campo corretamente";
    }
    // VERIFICA SE O CARACTERE INSERIDO NO CAMPO 'idade' É NUMÉRICO.
    else if (is_numeric($_POST['idade']) == false) {
        $erro = "Campo idade deve ser numérico";
    }
    // VERIFICANDO SE O CAMPO 'sexo' ESTA SELECIONADO CORRETAMENTE.
    else if ($_POST['sexo'] != "M" && $_POST['sexo'] != "F") {
        $erro = "Selecione o campo sexo corretamente";
    }
    // VERIFICANDOSE O CAMPO 'estadocivil" ESTA SELECIONADO CORRETAMENTE. 
    else if (
        $_POST['estadocivil'] != "Solteiro(a)" &&
        $_POST['estadocivil'] != "Casado(a)" &&
        $_POST['estadocivil'] != "Divorciado(a)" &&
        $_POST['estadocivil'] != "Viúvo(a)"
    ) {
        $erro = "Seleciona o campo de estado civil corretamente";
    } else {
        // CASO NENHUM ERRO SEJA ENCONTRADO, EXECUTA O BLOCO ABAIXO, INDICANDO QUE A VALIDAÇÃO OCORREU COM SUCESSO.
        $valido = true;
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularios Avançados</title>
</head>

<body>
    <?php
    if($valido == true){
        echo "Dados enviados com sucesso!";
    } 
    /* CASO OS DADOS NÃO SEJAM ENVIADOS COM SUCESSO (OU O ARQUIVO ESTEJA SENDO ABERTO PELA 1º VEZ) IRA EXECUTAR O BLOCO DE CÓDIGO ABAIXO, EXIBINDO O FORMULÁRIO
    EM CASO DE ABERTURA DO ARQUIVO PELA 1º VEZ, OU MENSAGEM DE ERRO CASO OS DADOS NÃO ESTAJAM CORRETOS */
    else{
    
    // CASO A VARIÁVEL $erro ESTEJA SETADA, SIGNIFICA QUE ALGUM ERRO OCORREU. O BLOCO ABAIXO IRÁ EXIBIR PARA O USUÁRIO QUAL FOI O ERRO EM QUESTÃO.
    if (isset($erro)) {
        echo $erro . "<br><br>";
    }
    ?>
    <!-- O ENVIO DOS DADOS ESTA SENDO FEITO PARA O MESMO ARQUIVO. O PARAMETRO '?validar=true' SERVE PARA INFORMAR QUE OS DADOS FORAM ENVIADOS PARA VALIDAÇÃO -->
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