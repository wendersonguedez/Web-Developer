<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manipulação de Arquivos</title>
</head>

<body>
    <?php
    // VARIAVEL QUE RECEBE O CAMINHO DE UM ARQUIVO  
    $filepath = "/tmp/test.txt";

    /*

    // COMANDO PARA VERIFICAR SE UM ARQUIVO EXISTE. INCLUINDO SE O CAMINHO SE TRATA DE UM ARQUIVO OU DIRETÓRIO.
    if (is_file($filepath)) {
        echo "O arquivo existe! <br>";
    } else {
        echo "O arquivo não existe! <br>";
    }
    /* O COMANDO fopen() TENTAR ABRIR OU REALIZAR A CRIAÇÃO DE UM ARQUIVO CASO ELE AINDA NÃO EXISTA, DEPENDE DO QUE SERÁ PASSADO NO PRIMEIRO PARÂMETRO.
    O 1º PARÂMETRO É O CAMINHO DO ARQUIVO, E O 2º PARÂMETRO É O MODO DE ABERTURA DO ARQUIVO PASSADO. O BLOCO ABAIXO RETORNA UMA REFERÊNCIA DE ACESSO PARA PODER MANIPULAR O ARQUIVO EM QUESTÃO
    $meuArquivo = fopen($filepath, "a+");

    // O COMANDO fwrite() PERMITE A ESCRITA EM DETERMINADO ARQUIVO. O SEU 1º PARÂMETRO É A REFERÊNCIA DO ARQUIVO QUE DESEJA REALIZAR A ESCRITA, E O 2º PARÂMETRO É A INFORMAÇÃO QUE DESEJA GRAVAR NO ARQUIVO. 
    fwrite($meuArquivo, "Hello World!");
    fwrite($meuArquivo, " - PHP");
    fwrite($meuArquivo, "\r\n"); // REALIZANDO A QUEBRA DE LINHA NO FINAL DO TEXTO.
    fclose($meuArquivo); // COMANDO fclose() FECHA UM ARQUIVO QUE ESTAVA ABERTO (SENDO MANIPULADO)

    // COMANDO PARA VERIFICAR SE UM ARQUIVO EXISTE. INCLUINDO SE O CAMINHO SE TRATA DE UM ARQUIVO OU DIRETÓRIO.
    if (is_file($filepath)) {
        echo "O arquivo existe! <br>";
    } else {
        echo "O arquivo não existe! <br>";
    } 
    */
    // BLOCO DE CÓDIGO PARA TESTE, ONDE É REALIZADA A ABERTURA DO ARQUIVO E GRAVAÇÃO DE TEXTO.
    $meuArquivo = fopen($filepath, "a+");
    fwrite($meuArquivo, "Wenderson Guedes ");
    fwrite($meuArquivo, "\r\n");
    fwrite($meuArquivo, "Programação web ");
    fwrite($meuArquivo, "\r\n");
    fclose($meuArquivo);


    // ABRINDO UM ARQUIVO UTILIZANDO SOMENTE O MODO DE LEITURA ("r").
    $meuArquivo = fopen($filepath, "r");
    $buffer = fread($meuArquivo, 16); // O COMANDO fread() REALIZA A LEITURA DE UM ARQUIVO ABERTO, PODENDO ESPECIFICAR ATÉ QUANTOS BYTES SERÃO LIDOS (cada caractere é um byte).
    echo ($buffer) . "<br>"; // O COMANDO fread() MANTEM UM PONTEIRO INTERNO, INDICANDO ONDE A LEITURA PAROU. NA PRÓXIMA EXECUÇÃO DO COMANDO, ELE IRÁ CONTINUAR DE ONDE PAROU.

    $buffer = fread($meuArquivo, 16);
    echo ($buffer) . "<br>";

    $buffer = fread($meuArquivo, 16);
    echo ($buffer) . "<br>";

    $buffer = fread($meuArquivo, 16);
    echo ($buffer) . "<br>";

    fclose($meuArquivo);

    echo "<br><br>";


    // BLOCO DE CÓDIGO PARA REALIZAR A LEITURA DE TODO O CONTEUDO DE UM ARQUIVO.
    $meuArquivo = fopen($filepath, "r"); // ABRINDO O ARQUIVO E ESPECIFICANDO O MODO DE ABERTURA (neste caso, apenas leitura ("r"))
    $buffer = fread($meuArquivo, filesize($filepath)); // EXIBINDO TODO O CONTEUDO DO ARQUIVO ATRAVES DO COMANDO filesize(), TENDO COMO PARÂMETRO O CAMINHO DO ARQUIVO.
    echo ($buffer) . "<br>";
    fclose($meuArquivo);

    echo "<br><br>";

    // A FUNÇÃO file() RETORNA UM ARRAY COMPOSTO PELAS LINHAS DO ARQUIVO EM QUESTÃO, ALOCANDO CADA LINHA EM UMA POSIÇÃO DO ARRAY. O 1º PARÂMETRO É O CAMINHO DO ARQUIVO.
    $meuArray = file($filepath);
    foreach ($meuArray as $elemento) {
        echo "Linha do arquivo: " .  $elemento . "<br><br>";
    }

    // O COMANDO opendir() ABRE UM DIRETÓRIO. SEU UNICO PARÂMETRO NECESSÁRIO É O CAMINHO DO MESMO.
    $dir = opendir("/");
    // O COMANDO readdir() RETORNA O NOME DO PRIMEIRO ARQUIVO EXISTENTE NO DIRETÓRIO QUE FOI ABERTO ATRÁVES DO COMANDO opendir(). O SEU PONTEIRO PARA NO ULTIMO ARQUIVO QUE FOI ENCONTRADO.
    echo readdir($dir) . "<br><br>";
    echo readdir($dir) . "<br><br>";
    echo readdir($dir) . "<br><br>";
    echo readdir($dir) . "<br><br>";
    closedir($dir); // O COMANDO closedir() FECHA UM DIRETÓRIO QUE FOI ABERTO.

    ?>
</body>

</html>