<?php
// Realizando a conexão com o banco de dados.
try {
    $connection = new PDO("mysql:host=127.0.0.1;dbname=cursoPHP", "wendy", "caraidigdin");
    $connection->exec("set names uft8"); // Garantindo que a troca de dados entre PHP e MySQL esteja fornecendo suporte para caracteres especiais.
} catch (PDOException $e) { // Eventuais erros são armazenados em $e
    echo "Falha: " . $e->getMessage();
    exit(); // Finaliza a execução do script.
}
