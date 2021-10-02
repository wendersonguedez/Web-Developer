<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    // include("ComandoPHPauxiliar.php"); se  o mesmo arquivo é chamado duas vezes, o include ira incluir ele duas vezes

    // include_once("ComandoPHPauxiliar.php"); o include_once incluira o arquivo somente uma vez, mesmo sendo chamado duas vzs
    // include_once("ComandoPHPauxiliar.php");

    require("ComandoPHPauxiliar.php"); // ele faz uma requisao, exigindo a existencia deste arquivo. caso nao exista, os blocos de codigo abaixo nao serao executados. é incluido todas as vezes que for chamado

    require_once("ComandoPHPauxiliar.php"); // importa o arquivo apenas uma vez e é necessario que ele exista

    function Dobro(float $valor): float {
        $valor *= 2;
        return $valor;
    }

    $x = Dobro(5);
    echo $x . "<br>";


    function Soma(int $valor1, int $valor2): int {
        return $valor1 + $valor2;
    }

    $x = Soma(10, 54);
    echo $x . "<br>";
    ?>
</body>

</html>