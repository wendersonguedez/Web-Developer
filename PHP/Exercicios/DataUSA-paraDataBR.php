<?php
// EFETUANDO A FORMATAÇÃO DE DATA AMERICANA E EXIBINDO A MESMA.
$formatoUS = mktime(12, 0, 0, 12, 31, 2010);
echo "Formato americano: " . date("Y-m-d H:i:s", $formatoUS);

// QUEBRA DE LINHA
echo "<br><br>";

// CHAMANDO A FUNÇÃO PARA REALIZAR A FORMATAÇÃO E EXIBIR ELA.
$formatoBR = dataBR($formatoUS);
echo "Formato brasileiro: " . $formatoBR;

// FUNÇÃO PARA FORMATAR UMA DATA NO FORMATO BRASILEIRO
function dataBR(){
    $formatoBR = date("d/m/Y H:i:s", mktime(12, 0, 0, 12, 31, 2010));
    return $formatoBR;
}