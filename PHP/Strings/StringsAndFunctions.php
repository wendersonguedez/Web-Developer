<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $strExemplo = "frase composta de exemplo para a aula.";

    echo ($strExemplo . "<br>");
    echo $strExemplo . "<br>";

    print($strExemplo . "<br>");
    print $strExemplo . "<br>";

    // FUNÇÃO PARA APRESENTAR O TOTAL DE BYTES DE UMA STRING. CARACTERES ESPECIAIS CONTABILIZAM COMO BYTE (^~´`)
    $x = strlen($strExemplo);
    echo $x . "<br>";

    // utilizar o utf8_decode para acentos e caracteres especiais
    $x = strlen(utf8_decode($strExemplo)); // utf8_decode esta convertendo os caracteres especiais que estao na string $strExemplo para que eles sejam lidos corretamente pelo strlen
    echo $x . "<br>";


    // FUNÇÃO PARA LOCALIZAR UMA PALAVRA DENTRO DE UM TEXTO. O PRIMEIRO PARAMETRO É A STRING, O SEGUNDO PARAMETRO É A PALAVRA QUE DESEJA LOCALIZAR E O TERCEIRO (OPCIONAL) É DE ONDE VC QUER QUE COMECE A BUSCA.
    $x = strpos($strExemplo, "a", 3); // strpos vai fazer uma procura dentro de determinada string. o parametro passado é a palavra ou letra que desejar localizar. o retorno é a posicao da palavra em indice de array.
    echo $x . "<br>";

    $x = strpos($strExemplo, "a"); // strpos vai fazer uma procura dentro de determinada string. o parametro passado é a palavra ou letra que desejar localizar. o retorno é a posicao da palavra em indice de array.
    echo $x . "<br>";

    /*
    $x = strpos($strExemplo, "a");
    echo $x . "<br>"; o indice de busca sempre vai começar pelo numero 0, ou seja, nao adianta duplicar linha tentando retornar um indice em outra posição */

    // LAÇO DE REPETIÇÃO PARA NAVEGAR ENTRE AS OCORRENCIAS DA BUSCA
    $posicao = strpos($strExemplo, "a");
    while($posicao !== false){ // caso exista uma ocorrencia da letra a, vai executar o codigo abaixo
        echo "Posição: " . $posicao . "<br>";
        $posicao = strpos($strExemplo, "a", $posicao += 1); // esse comando ira fazer uma nova busca a partir da posicao encontrada, atualizando a variavel para a proxima posicao.
    }

    // FUNÇÃO PARA FAZER UMA BUSCA EM UMA SUB STRING, DENTRO DE UMA STRING PRINCIPAL. RETORNANDO O TEXTO E TUDO QUE ESTA POSTERIOR A ELE.
    $x = strchr($strExemplo, " ");
    echo $x . "<br>";
    
    $x = strchr($strExemplo, "de");
    echo $x . "<br>";

    // FUNÇÃO QUE IRA A FAZER A BUSCA DE TRAS PARA FRENTE DE UM TEXTO. RETORNANDO O PRIMEIRO INDICE DO PARAMETRO PASSADO (NESTE CASO UM ESPAÇO EM BRANCO)
    $x = strrchr($strExemplo, " ");
    echo $x . "<br>";

    $x = strrchr($strExemplo, "de");
    echo $x . "<br>";

    // FUNÇÃO PARA FAZER UMA BUSCA EM UMA SUB STRING, DENTRO DE UMA STRING PRINCIPAL ATRAVES DE SEU INDICE NUMERICO.
    $x = substr($strExemplo, 4);
    echo $x . "<br>";
    // O TERCEIRO PARAMETRO PASSADO É ATE QUANTOS CARACTERES APOS O INDICE NUMERICO VC GOSTARIA DE CAPTURAR. NESTE CASO, APOS O 4º INDICE IRA SER EXIBIDO NA TELA 10 CARACTERES POSTERIORES.
    $x = substr($strExemplo, 4, 10);
    echo $x . "<br>";

    // FUNÇÃO PARA ALTERAR UMA STRING ATRAVES DE CODIGO. O PRIMEIRO PARAMETRO É A STRING QUE DEVE SER ALTERADA. O SEGUNDO PARAMETRO É POR QUAL VALOR ELA SERA ALTERADA. E O TERCEIRO, É A VARIAVEL STRING QUE VAI SER ALTERADA. 
    $x = str_replace("composta", "criada", $strExemplo);
    echo $x . "<br>"; 
    // FICAR ATENTO, POIS É PRECISO ATRIBUIR O RETORNO DE QUALQUER FUNÇÃO PARA UMA VARIAVEL. POIS É ELA QUE EXIBIRA ESTE RETORNO.
    
    // FUNÇÃO QUE RECEBE UM NUMERO E O CONVERTE PARA STRING LEVANDO EM CONSIDERAÇÃO O CODIGO ASC
    $x = chr(65);
    echo $x . "<br>";

    // FUNÇÃO QUE CONVERTE TODA UMA STRING PARA CAIXA BAIXA
    $x = strtolower($strExemplo);
    echo $x . "<br>";

    // FUNÇÃO QUE CONVERTE TODA UMA STRING PARA CAIXA ALTA
    $x = strtoupper($strExemplo);
    echo $x . "<br>";

    // FUNÇÃO QUE IRA TORNAR A PRIMEIRA LETRA DA STRING MAIUSCULA
    $x = ucfirst($strExemplo);
    echo $x . "<br>";
    
    // FUNÇÃO QUE IRA TORNAR A PRIMEIRA LETRA DE CADA PALAVRA EM MAIUSCULO
    $x = ucwords($strExemplo);
    echo $x . "<br>";

    // FUNÇÃO QUE REVERTE UMA STRING 
    $x = strrev($strExemplo);
    echo $x . "<br>";

    // FUNÇÃO QUE REMOVE ESPAÇOS EM BRANCO DE UMA STRING. NESTE CASO, ESTA REMOVENDO OS ESPAÇOS EM BRANCO DO LADO ESQUERDO E DIREITO, MANTENDO OS ESPAÇOS EM BRANCO QUE APARECEM NO MEIO DA STRING.
    $x = trim($strExemplo);
    $x = str_replace(" ", "_", $x);
    echo $x . "<br>";

    // DOIS ESPAÇOS EM BRANCO
    $x = trim($strExemplo);
    $x = str_replace("  ", "_", $x);
    echo $x . "<br>";

    // CASO QUEIRA REMOVER APENAS OS ESPAÇOS EM BRANCO DO LADO ESQUERDO, VC PODE UTILIZAR O ltrim().
    $x = ltrim($strExemplo);
    $x = str_replace(" ", "_", $x);
    echo $x . "<br>";
    
    // CASO QUEIRA REMOVER APENAS OS ESPAÇOS EM BRANCO DO LADO DIREITO, VC PODE UTILIZAR O rtrim().
    $x = rtrim($strExemplo);
    $x = str_replace(" ", "_", $x);
    echo $x . "<br>";

    $x = trim($strExemplo);
    $espacoBranco = str_replace("   ", " ", $x);
    echo $espacoBranco . "<br>";
    

    /* UMA DAS MANEIRAS DE FAZER A REMOÇÃO DE ESPAÇOS EM BRANCO DE TODA A STRING PODE SER UTILIZANDO UM LAÇO DE REPETIÇÃO --- RESOLVER !!!
    $espbranco = strpos($strExemplo, "  ");
    while($espbranco !== false){
        $espbranco = str_replace("  ", "", $strExemplo);
        echo $espbranco . "<br>";
        $espbranco = strpos($strExemplo, "  ", $strExemplo + 1);
    } */ 
    // 37:10
    // ESTA FUNÇÃO VAI CONVERTER SUA STRING PARA UM ARRAY. O PRIMEIRO PARAMETRO É A STRING DE ENTRADA E O SEGUNDO PARAMETRO É O TAMANHO MAX QUE O ARRAY VAI TER
    $x = str_split($strExemplo, 5);
    echo $x[0] . "<br>";
    echo $x[1] . "<br>";
    echo $x[2] . "<br>";
    echo $x[3] . "<br>";
    echo $x[4] . "<br>";
    echo $x[5] . "<br>";
    echo $x[6] . "<br>";
    echo $x[7] . "<br>";

    // ESTA FUNÇÃO FAZ A SEPARAÇÃO DA STRING QUANDO ENCONTRA O CARACTERE QUE FOI DEFINIDO ATRAVES DO 1º PARAMETRO. NO CASO ABAIXO, A CADA ESPAÇO EM BRANCO ELA VAI SER SEPARADA. O 2º PARAMETRO É A STRING DE ENTRADA
    // POR RETORNAR UM ARRAY, ESTE COMANDO É ACESSADO ATRAVES DE INDICE
    $x = explode(" ",$strExemplo);
    echo $x[0] . "<br>";
    echo $x[1] . "<br>";
    echo $x[2] . "<br>";
    echo $x[3] . "<br>";
    echo $x[4] . "<br>";
    echo $x[5] . "<br>";
    echo $x[6] . "<br>";

    // CRIPTOGRAFIA. AS CRIPTOGRAFIAS SHA1 E MD5 NÃO SÃO MUITO SEGURAS, POIS EXISTEM SITES PROPRIOS PARA DESCOBRIR A SENHA. 
    // O MAIS SEGURO E UTILIZADO É O CRYPT COM UMA STRING BASE PARA A CRIPTOGRAFIA, PODENDO SER UMA PALAVRE CHAVE DO SITE OU ALGUM TOKEN. 
    // UMA FORMA DE TORNA OS METODOS SHA1 E MD5 MAIS SEGUROS, É FAZER UMA CONCATENAÇÃO NA SENHA COM UMA STRING BASE PARA A CRIPTOGRAFIA, COMO NA LINHA 167
    
    // ESTE COMANDO GERA UM CODIGO HASH DE UMA STRING. GERALMENTE UTILIZADO EM CAMPOS DE SENHA
    $x = sha1($strExemplo);
    echo $x . "<br>";
    
    // OUTRO COMANDO PARA CRIPTOGRAFIA DE UMA STRING
    $x = md5($strExemplo);
    echo $x . "<br>";

    // MANEIRA DE TORNAR O METODO MD5 SEGURO
    $x = md5($strExemplo . "123321432WENDYY123TOKENSEGURO");
    echo $x . "<br>";
   
    // ESTE COMANDO RETORNARA UMA STRING COM CRIPTOGRAFIA ALEATORIA A CADA REFRESH NA PAGINA. O SEGUNDO PARAMETRO É ALGUMA STRING PARA BASE DA ENCRIPTAÇÃO 
    $x = crypt($strExemplo, "test123");
    echo $x . "<br>";

    ?>
</body>

</html>