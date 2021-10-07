<?php
// EFETUANDO A FORMATAÇÃO DE DATA BRASILEIRA E EXIBINDO A MESMA.
$formatoBR = mktime(12, 0, 0, 12, 31, 2010); 
echo "Formato brasileiro: " . date("d/m/Y H:i:s", $formatoBR);

// QUEBRA DE LINHA
echo "<br><br>";

// CHAMANDO A FUNÇÃO PARA REALIZAR A FORMATAÇÃO E EXIBIR ELA.
$formatoUS = dataUS();
echo "Formato americano: " . $formatoUS;

// FUNÇÃO PARA FORMATAR UMA DATA NO FORMATO AMERICANO.
function dataUS(){
    $formatoUS = date("Y-m-d H:i:s", mktime(12, 0, 0, 12, 31, 2010));
    return $formatoUS;
}
?>