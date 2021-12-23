<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Arquivos</title>
</head>

<body>
    <?php
    // VERIFICANDO SE OS DADOS DO FORMULÁRIO ESTÃO SENDO ENVIADOS. ATRAVÉS DO PARAMÊTRO (envio) CRIADO NO METODO action="" É POSSIVEL VERIFICAR ISSO.
    if (isset($_REQUEST['envio']) && $_REQUEST['envio'] == "true") {
        $erro = 0;
        // VERIFICANDO SE UM ARQUIVO FOI ENVIADO COM SUCESSO ATRAVES DO FORMULARIO HTML. A SUPERVARIAVEL $_FILES['nomedoCampo'] RECEBE OS ARQUIVOS ENVIADOS.
        if (isset($_FILES['campoArquivo'])) {
            // CAPTURANDO ALGUMAS INFORMAÇÕES DO ARQUIVO ENVIADO.
            $arquivoNome = $_FILES['campoArquivo']['name']; // O 2º ARRAY ACESSA O NOME DO ARQUIVO ENVIADO.
            $arquivoTipo = $_FILES['campoArquivo']['type']; // O 2º ARRAY ACESSA O TIPO DO ARQUIVO ENVIADO.
            $arquivoTamanho = $_FILES['campoArquivo']['size']; // O 2º ARRAY ACESSA O TAMANHO DO ARQUIVO ENVIADO.
            $arquivoNomeTemp = $_FILES['campoArquivo']['tmp_name']; // O 2º ARRAY ACESSA O NOME TEMPORARIO DO ARQUIVO ENVIADO.
            $erro = $_FILES['campoArquivo']['error']; // // O 2º ARRAY RETORNA UM VALOR BOOLEANO. EM CASO DE SUCESSO(sem erros) RETORNA 0, INDICANDO QUE NÃO HOUVE ERRO NO ENVIO DO ARQUIVO. EM CASO DE ERRO, ELE É EXIBIDO NA LINHA 27

            // BLOCO DE CÓDIGO INDICANDO QUE NÃO OCORREU ERRO ALGUM
            if ($erro == 0) {
                // VALIDAÇÕES PARA ASSEGURAR QUE O ARQUIVO FOI RECEBIDO COM SUCESSO.
                if (is_uploaded_file($arquivoNomeTemp)) { // is_uploaded_file() VERIFICA SE O ARQUIVO FOI ENVIADO COM SUCESSO, PASSANDO O SEU NOME TEMPORARIO COMO PARAMÊTRO. O SEU RETORNO É BOOLEANO.
                    if (move_uploaded_file($arquivoNomeTemp, "uploads/" . $arquivoNome)) { // MOVENDO DE PASTA O ARQUIVO QUE FOI ENVIADO. O 1º PARAMETRO É PARA INDICAR ONDE SE LOCALIZA O ARQUIVO, EM SEGUIDO 2º, INDICANDO PARA ONDE GOSTARIA DE MOVER E O NOME QUE GOSTARIA DE COLOCAR.
                        echo "Sucesso! <br><br>";

                        echo "Nome original do arquivo: " . $arquivoNome . "<br><br>";
                        echo "Tipo: " . $arquivoTipo . "<br><br>";
                        echo "Tamanho: " . $arquivoTamanho . "<br><br>";
                        echo "Nome temporário " . $arquivoNomeTemp . "<br><br>";
                    } else {
                        echo "Falha ao mover o arquivo.";
                    }
                } else {
                    $erro = "Erro no envio: O arquivo não foi recebido com sucesso.";
                }
            } else {
                $erro = "Erro no envio: " . $erro; // EXIBINDO O ERRO QUE FOI CAPTURADO NA SUPERVARIAVEL $_FILE['campoArquivo']['error']
            }
        } else {
            $erro = "Arquivo enviado não encontrado.";
        }

        // SE NO FINAL DO CÓDIGO A VARIAVEL $erro FOR DIFERENTE DE 0, INDICA QUE ALGUM ERRO OCORREU.
        if ($erro !== 0) {
            echo $erro;
        }
    }
    ?>
    <!-- O ATRIBUTO enctype="" É O QUE PERMITE O ENVIO DE ARQUIVOS ATRAVÉS DE UM FORMULÁRIO -->
    <form action="FormularioUpload.php?envio=true" method="POST" enctype="multipart/form-data">
        Arquivo:
        <input type="file" name="campoArquivo"><br><br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>