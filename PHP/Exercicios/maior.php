<?php
/*Quem é o maior?
Em um sistema de logistca, a organização do pacote de entregas é uma tarefa fundamental para o bom desempenho dos processos. Alocar volumes para as entregas de forma eficiente permite uma 
economia significativa no final do mês. 

O módulo do sistema de logistica que determina a ordem em que os pacotes devem ser alocados para transporte precisa de uma função que retorne o pacote com maior volume dentro de uma lista de pacotes
candidatos.

Nesta tarefa você deve construir uma função chamada maior(). Essa função deve receber um array com o volume dos pacotes e retornar o volume do maior pacote.

A função maior() deve receber o seguinte paramêtro:
    $pacotes: um array de numeros decimais maiores que zero

Exemplo de entrada e saída:
    [20, 33.5, 10.8, 50, 5.9, 8]      ==>  50
*/

echo maior([20, 33.5, 10.8, 50, 50.9, 8]) . "<br>";
echo maior([30, 10.5]) . "<br>";

function maior($pacotes){
    // a variavel $maior vai armazenar o elemento com maior valor do array, que na primeira execução não existe valor maior do que 0.
    $maior = 0;
    // loop para percorrer todos os elementos do array. a função count faz a contagem de elementos de um array. ou seja, a condição para a execução do loop é até que a variavel de controle seja menor que a quantidade de elementos do array passado no paramêtro da função count()
    for($i=0; $i < count($pacotes); $i++){
       // condição para verificar se o elemento atual que esta no loop é maior que 0. se for, esse valor é armazenado na variavel $maior
        if($pacotes[$i] > $maior){
            $maior = $pacotes[$i];
        }         
    }
    return $maior;
}

/* a mesma função acima sendo escrita com uma quantidade menor de linhas. 
function maior($pacotes){
    // a função max() recebe um array e retorna o maior valor que esta dentro do array.
    return max($pacotes);
} */





?>