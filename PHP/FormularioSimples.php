<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Simples</title>
</head>
<body>
    <form action="FormularioSimplesTratamento.php" method="POST">
        <label for="nome">Nome</label>
        <input type="text" name="nome">
        <br><br>
        <label for="sobrenome">Sobrenome</label>
        <input type="text" name="sobrenome">
        <br><br>
        <label for="estadocivil">Estado Civil</label>
        <br><br>
        <select name="estadocivil">
            <option>Solteiro</option>
            <option>Casado</option>
            <option>Divorciado</option>
            <option>Viúvo</option>
        </select> <br><br>
        <input type="reset" value="Limpar">
        <input type="submit" value="Enviar">
    </form>
</body>

</html>