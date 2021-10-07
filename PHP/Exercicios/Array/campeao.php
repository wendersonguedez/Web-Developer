<?php
/*Campeão
Alan e Bruna inventaram um exercicio para o Hackademia. O professor avaliou os dois exercicios concedendo pontos em uma escala de 1 a 100 para três categorias: clareza do problema originalidade 
e dificuldade.

Partindo do principio que as notas de Alan são representadas por a[0], a[1] e a[2] e as notas de Bruna são representadas por b[0], b[1] e b[2].

Sua tarefa é definir a pontuação dessa competição através da comparação de cada um dos três critérios avaliados:
    Se a[i] > b[i], Alan ganhou um ponto
    Se a[i] < b[i], Bruna ganhou um ponto
    Se a[i] = b[i], ninguem ganhou ponto

A pontuação final é a soma de pontos de cada critério.

-- DESCRIÇÃO DA FUNÇÃO -- 
Para resolver o problema escreva uma função chamada campeao(). Essa função deve receber dois array com a nota dos concorrentes e retornar um array com a pontuação final de cada um.

A função campeão() deve receber os seguintes parâmetro:
    $a: um array de numeros inteiros entre 1 a 100 com as notas do primeiro competidor
    $b: um array de numeros inteiros entre 1 a 100 com as notas do segundo competidor

O retorno deve ser um array com duas posições com valores entre 0 e 3.

Exemplo de entrada e saída:
    [5, 6, 7]      ==>     [1, 1] 1x1 para os dois
    [3, 6, 10]

    [17, 28, 30]   ==>     [1, 2] 1x2 para Bruna
    [99, 66, 8]

*/

print_r(campeao([5, 6, 7], [3, 6, 10]));
echo "<br><br>";
print_r(campeao([17, 28, 30], [99, 66, 8]));
echo "<br><br>";
print_r(campeao([1, 1, 1], [1, 1, 1]));
echo "<br><br>";
print_r(campeao([1, 1, 1], [3, 3, 3]));
echo "<br><br>";

function campeao($a, $b){
    // o arrat $placar inicia com 0x0 
    $placar = [0, 0];
    // loop para percorrer toda a estrutura do array.
    for($i=0; $i < count($a); $i++){
        // comando para verificar se o valor de $b é maior que o valor de $a
        if($a[$i] < $b[$i]){
            // acrescentando um ponto no placar para o elemento na posição 1 do array $placar
            $placar[1] += 1;
        } else // quando a condição acima for falsa, vai executar o bloco abaixo, que verifica se o valor $a é maior que $b
        if($a[$i] > $b[$i]){
            $placar[0] += 1;
        }
    }
    return $placar; // retorna o valor do placar para onde foi invocada a função campeao()
}


?>