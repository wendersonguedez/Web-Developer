<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Banco de Dados: Listagem dos dados</title>
</head>

<body>
    <table border="1">
        <tr>
            <!-- Linha -->
            <th>Nome</th> <!-- Título -->
            <th>Email</th>
            <th>Idade</th>
            <th>Sexo</th>
            <th>Estado Civil</th>
            <th>Humanas</th>
            <th>Exatas</th>
            <th>Biológicas</th>
            <th>Hash da senha</th>
            <th>Ações</th>
        </tr>
        <?php
        require "conexao.php"; // Chamando o arquivo de conexão com o banco.

        // Verificando se o parâmetro 'excluir' passado na URL esta setada. 
        if (isset($_REQUEST['excluir']) && $_REQUEST['excluir'] == true) {
            // Bloco de código para exclusão de um usuário.
            $stmt = $connection->prepare("DELETE FROM usuarios WHERE id = ?");
            $stmt->bindParam(1, $_REQUEST['id']); // O id passado na URL é associado ao script SQL acima.
            $stmt->execute();

            // Verficando possiveis erros no banco.
            if ($stmt->errorCode() != "00000") {
                echo "Error code " . $stmt->errorCode() . ": ";
                echo implode(", ", $stmt->errorInfo());
            } else {
                echo "Usuário removido com sucesso!\n";
            }
        }

        // A execução do código cai direto no bloco abaixo, que lista todos os usuários do banco.
        $resultSet = $connection->prepare("SELECT * FROM usuarios");

        // Executando o script SQL. Caso o script seja executado com sucesso, exibe os registros/linhas do banco.
        if ($resultSet->execute()) {
            // $registro = $resultSet->fetch(PDO::FETCH_OBJ); fetch() captura a próxima linha de um conjunto de resultados. Seu paramêtro (PDO::FETCH_OBJ) recebe o próximo registro em formato de objeto  
            while ($registro = $resultSet->fetch(PDO::FETCH_OBJ)) { // enquanto houver registro no banco de dados, este laço será true, exibindo os registros contidos no banco. após acabar os registros, é atribuido nulo para $registro, saindo do bloco while()
                echo "<tr>";
                    echo "<td>" . $registro->nome . "</td>"; // Acessando o campo do banco e o valor contido nele, através da variável $registro e o operador seta (->)
                    echo "<td>" . $registro->email . "</td>";
                    echo "<td>" . $registro->idade . "</td>";
                    echo "<td>" . $registro->sexo . "</td>";
                    echo "<td>" . $registro->estado_civil . "</td>";
                    echo "<td>" . $registro->humanas . "</td>";
                    echo "<td>" . $registro->exatas . "</td>";
                    echo "<td>" . $registro->biologicas . "</td>";
                    echo "<td>" . $registro->senha . "</td>";

                    // Ações 
                    echo "<td>";
                    echo "<a href='?excluir=true&id=" . $registro->id . "'>Excluir registro</a> <b>|</b> "; // Excluir usuário passando seu id na URL. 
                    echo "<a href='AlteraçãocomBancodeDados.php?id=" . $registro->id . "'>Alterar registro</a> <b>|</b> "; // Alterar dados de um usuário passando seu id na URL.
                    echo "<a href='SenhacomBancodeDados.php?id=" . $registro->id . "'>Alterar senha</a>";
                echo "</tr>";
            }
        } else {
            echo "Falha na seleção de usuários\n";
        }
        ?>
    </table>
    <br>
    <a href="CadastrocomBancodeDados.php">Cadastrar novo usuário</a>
</body>

</html>