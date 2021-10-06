<?php
/*Máquina de Refrigerante
Uma máquina de venda de refrigerante automática possui um componente que dá o troco para o cliente. Esse componente tem o objetivo de dar o troco com o menor númerode notas possiveis.
Essa máquina possui notas de R$2, R$5, R$10, R$20 e R$50. Ela não dá troco de moeda e possui notas infinitas. Os valores dos produtos não permite troco para valores que não possam ser compostos
por essas notas.

Por exemplo, para dar um troco de R$89 a máquina reve retornar
    Nota de 50: 1
    Nota de 20: 1
    Nota de 10: 1
    Nota de 5: 1
    Nota de 2: 2

-- RETORNO DE UM ARRAY NO SEGUINTE FORMATO O EXEMPLO ACIMA --
    r[0], r[1], r[2], r[3], r[4]
      1     1     1     1     2   
    $50   $20    $10   $5    $2

Ou seja, para retornar o troco de R$89, a máquina precisa retornar 1 nota de R$50, 1 nota de R$20, 1 nota de R$10, 1 nota de R$5, 2 nota de R$2

Crie uma função que recebe um valor de troca e devolva um array com a composição das notas de troco.

-- DESCRIÇÃO DA FUNÇÃO --
Para resolver o problema, escreva uma função chamada troco(). Essa função deve receber um número inteiro com o valor do troco e retornar um array com a quantidade de notas do troco seguindo a
estrutua a seguir.

A função troco () deve receber os seguintes parâmetros:
    $valor: um inteiro com o valor do troco

-- ESTRUTURA DE TROCOS DA MÁQUINA --
    r[0], r[1], r[2], r[3], r[4]
    $50   $20    $10   $5    $2
    
* O ARRAY r[] REFERE-SE A REAIS *   

Exemplo de entrada e saída
    21      ==>      [0, 0, 0, 3, 3]
    35      ==>      [0, 1, 1, 1, 0]

-- QUAL A LÓGICA UTILIZADA PARA RESOLVER ESTE PROBLEMA?? --
O objetivo é dar o troco com a menor quantidade de notas possíveis, mas atingir o valor certo. Com o primeiro exemplo (R$89), como podemos fazer para dar a quantidade de notas certas
mas sem estourar? Pois se você der 2 notas de R$50, vai passar do valor do troco. 
Para isso, vamos usar a divisão matemática e analisar cada nota possivel para o troco(50, 20, 10, 5 e 2) e o valor do troco (R$89). Se pegarmos o valor do troco (R$89) e dividirmos pela 
maior nota disponivel (50), teremos o valor de 1.78. O que realmente nos interessa é a parte inteira desse resultado (1), que indica quantas notas de 50 precisamos para o troco de R$89.
Após isso, R$89 passa a valer R$39 e devemos dividir R$39 pela próxima nota disponivel para troco, neste caso 20 e assim sucessivamente. No final, teremos quantas e quais notas serão necessárias 
para o troco em questão.


*/

print_r(troco(21));

function troco($valor){
    $r = [0, 0, 0, 0, 0];
    $r[0] = floor($valor / 50); // $r[0] é a posicao da nota de R$50 dentro do array e esta linha de comando esta dividindo $valor(89) por R$50. a função floor() pega somente a parte inteira, que é o que realmente importa
    $valor = $valor - ($r[0] * 50); // atualizando o valor que ainda vamos dar de troco. r[0] * 50 esta subtraindo R$50 de $valor.
    
    $r[1] = floor($valor / 20); // $r[1] é a posicao da nota de R$20 dentro do array e esta linha de comando esta dividindo $valor(R$39) por R$20
    $valor = $valor - ($r[1] * 20); // atualizando o valor que ainda vamos dar de troco. r[1] * 20 esta subtraindo R$20 de $valor.
    
    $r[2] = floor($valor / 10); // $r[2] é a posicao da nota de R$10 dentro do array e esta linha de comando esta dividindo $valor(R$19) por R$10
    $valor = $valor - ($r[2] * 10); // atualizando o valor que ainda vamos dar de troco. r[2] * 10 esta subtraindo R$10 de $valor.
    
    $r[3] = floor($valor / 5); // $r[3] é a posicao da nota de R$5 dentro do array e esta linha de comando esta dividindo $valor(R$9) por R$5
    $valor = $valor - ($r[3] * 5); // atualizando o valor que ainda vamos dar de troco. r[3] * 5 esta subtraindo R$5 de $valor.
    
    $r[4] = floor($valor / 2); // $r[4] é a posicao da nota de R$2 dentro do array e esta linha de comando esta dividindo $valor(R$2) por R$2
    $valor = $valor - ($r[4] * 2); // atualizando o valor que ainda vamos dar de troco. r[4] * 2 esta subtraindo R$2 de $valor.

    
    return $r;
}



?>