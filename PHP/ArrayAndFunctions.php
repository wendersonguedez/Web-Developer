<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays e Funções</title>
</head>
<body>
    <?php
        //criando o primeiro array.
        $arrayExemplo = array("PHP", "SQL", "Java", 2);
        /*
        na linha abaixo, os indices do array foram definidos manualmente 
        $arrayExemplo = array(0 => "PHP", 1 => "SQL", 5 => 2, "Curso" => "Java");
        */
        
        //o comando print_r vai exibir os elementos do array e a qual indice eles pertencem.
        print_r($arrayExemplo);
        echo "<br> <br>";

        //exibindo o valor que esta armazenado no indice 0 do array em questao
        echo "Posicao 0: " . $arrayExemplo[0] . "<br>";
        echo "Posicao 1: " . $arrayExemplo[1] . "<br>";
        echo "Posicao 2: " . $arrayExemplo[2] . "<br>";
        echo "Posicao 3: " . $arrayExemplo[3] . "<br><br>";

        //o comando unset ira excluir um elemento especifico de um array. o parametro passado é o array de entrada e em qual posicao esta o elemento que deseja excluir. 
        unset($arrayExemplo[3]);
        print_r($arrayExemplo);
        echo "<br><br>";

        /* se o indice do array nao for informado, todos os elementos do array serao excluidos.
        unset($arrayExemplo);
        print_r($arrayExemplo);
        echo "<br><br>"; */

        //o comando count() faz a contagem de elementos dentro de um array. o retorno é um valor do tipo inteiro.
        echo count($arrayExemplo) . "<br>";
        
        //o comando sizeof() tem a mesma função que o comando count.
        echo sizeof($arrayExemplo) . "<br>";

        //o comando foreach() é um laço de repetição que faz com que seja feita uma navegação em cada elemento que esta dentro do array informado. a cada iteração do laço, o valor do elemento atual vai ser atribuido a variavel $elemento. apos isso, o laço avança para o proximo elemento do array.
        foreach($arrayExemplo as $elemento){
            echo "Tem no array: " . $elemento . ". <br>";
        }
        echo "<br>";

        //o comando array_push() vai adicionar um ou mais elementos no final de um array. este comando trata-se de uma pilha, que esta relacionado com estrutura de dados.
        array_push($arrayExemplo, "wenderson");
        print_r($arrayExemplo);
        echo "<br><br>";

        //o comando array_pop vai retornar o ultimo elemento de um array. apos o retorno, o ultimo elemento é removido do array, como pode ser visto na linha 58.
        $x = array_pop($arrayExemplo);
        echo $x . "<br><br>";
        print_r($arrayExemplo); //exibindo o array com seus elementos e indices atualizados.
        echo "<br><br>";

        //o comando array_shift vai retornar o primeiro elemento do começo do array. apos o retorno, o primeiro elemento é removido do array, como pode ser visto na linha 64.
        $x = array_shift($arrayExemplo);
        echo $x . "<br><br>";
        print_r($arrayExemplo);
        echo "<br><br>";

        //o comando array_unshift() vai adicionar um ou mais elementos no inicio de um array. este comando trata-se de uma fila, que esta relacionado com estrutura de dados.
        array_unshift($arrayExemplo, "guedes");
        print_r($arrayExemplo);
        echo "<br><br>";

        $arrayExemplo = array(140.10, 200, 215.05, 550);
        print_r($arrayExemplo);
        echo "<br><br>";

        //esta função ira aplicar uma string que refere a moeda REAL para todos os valores de qualquer array.
        function moeda($valor){
            $valor = "R$ " . $valor;
            return $valor;
        }

        //o comando array_map vai aplicar determinada função em um array, assim, atigindo todos os elementos que ele possui. o 1º parametro é a função que deseja aplicar, e o 2º parametro é o array que sera afetado.
        //tomar cuidado com o comando array_map, pois o retorno dele precisa ser atribuido a uma variavel.
        $x = array_map("moeda", $arrayExemplo);
        print_r($x);
        echo "<br><br>";

        $arrayExemplo = array(  "Linguagem1" => "PHP",
                                "Linguagem2" => "SQL",
                                "Linguagem3" => 100,
                                "Linguagem4" => "JavaScript");
        print_r($arrayExemplo);
        echo "<br><br>";
        
        //o comando array_key_exists vai verificar a existencia de um indice ou chave dentro de um array. o 1º parametro é o indice ou chave que voce esta buscando, e o 2º parametro é o array em questao. o valor de retorno é booleano (true ou false).
        if(array_key_exists("Linguagem2", $arrayExemplo)){
            echo "Existe 'Linguagem2' no array <br>";
        }else{
            echo "Não existe 'Linguagem2' no array <br>";
        }
        //exemplo de um indice/chave que nao existe no array que foi pesquisado.
        if(array_key_exists("Linguagem70", $arrayExemplo)){
            echo "Existe 'Linguagem70' no array <br>";
        }else{
            echo "Não existe 'Linguagem70' no array <br><br>";
        }

        //o comando array_keys vai retornar todas as chaves de um array. diferente do array_keys_exists, que faz a verificação da existencia de uma chave/indice. o unico parametro é o array que voce deseja fazer essa busca.
        //essa função retorna um novo array, que seria o resultado dessa busca. com isso, o comando nao aplica esse resultado no array que foi passado, como é feitos no comando unset, por exemplo.
        $keys = array_keys($arrayExemplo);
        foreach($keys as $key){
            echo $key . ", ";
        }
        echo "<br><br>";

        //o comando array_search vai fazer uma busca no array por determinado elemento e vai retornar o seu indice. o 1º parametro é o elemento que voce deseja buscar, e o 2º parametro é em qual array gostaria de fazer essa busca
        $key = array_search("PHP", $arrayExemplo);
        echo "A chave do elemento PHP é: " . $key . "<br><br>";

        //o comando in_array vai fazer uma busca por determinado elemento dentro de um array. o retorno é do tipo booleano (true ou false).
        $isIn = in_array("PHP", $arrayExemplo);
        if($isIn){
            echo "Elemento PHP existe no array!";
        }else{
            echo "Elemento PHP nao existe no array!";
        }
        echo "<br><br>";
        //exemplo com um elemento que nao existe no array.
        $isIn = in_array("C++", $arrayExemplo);
        if($isIn){
            echo "Elemento C++ existe no array!";
        }else{
            echo "Elemento C++ nao existe no array!";
        }
        echo "<br><br>";

        print_r($arrayExemplo);
        echo "<br><br>";
        //o comando shuffle() embaralha todo os elementos do array. o comando shuffle, faz com que chaves definidas manualmente sejam apagadas, colocando no lugar indices numericos.
        shuffle($arrayExemplo);
        print_r($arrayExemplo);
        echo "<br><br>";

        //o comando sort ordena um vetor de forma alfabetica e depois numericamente. (a-z, 0-100).
        sort($arrayExemplo);
        print_r($arrayExemplo);
        echo "<br><br>";
        
        //o comando rsort ordena um vetor de forma decrescente, começando primeiro pelo alfabeto e depois numericamente (z-a, 0-100).
        rsort($arrayExemplo);
        print_r($arrayExemplo);
        echo "<br><br>";

        $stringExemplo = "10;20;30;40;50";
        //o comando explode() vai separar uma string em posicoes de um array. o 1º parametro é o caractere especifico que informa onde deseja quebrar a string (neste caso, a cada ocorrencia de um ;). o 2º parametro é a string de entrada.
        //o retorno desta funcao é um array. ou seja, a variavel $x passa a ser um array quando o retorno de explode() é atribuido a ela.
        $x = explode(";", $stringExemplo);
        print_r($x);
        echo "<br><br>";

        $arrayExemplo = array("a", "b", "c", "d", "e");
        //o comando implode() junta os elementos de um array e constroi uma string com base nisso. o 1º parametro é opcional e ele sera um caractere que ira separar os valores na string(neste caso um ;). o 2º parametro é o array de entrada.
        //a funcao implode() retorna uma string, devido a junção dos elementos do array.
        $stringExemplo = implode("; ", $arrayExemplo);
        echo $stringExemplo;
        echo "<br><br>";

        $stringExemplo = "chave=valor&chave2=valor2&var1=php";
        //o comando parse_str converte uma string em variaveis. usa uma string como se ela tivesse sido passada via url (get ou post). o 1º parametro é a string de entrada,  e o 2º parametro vai receber o retorno da funcao parse_str
        parse_str($stringExemplo, $resultado);
        print_r($resultado);


    ?>

</body>

</html>