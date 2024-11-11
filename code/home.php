<?php
require('classes/login.php');
$validador = new Login();
$validador->verificar_logado();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Vagas de Estágio</title>
</head>
<body>
    <center>
        <h2>Vagas de Estágio</h2>
    </center>
    
    <br>
    <a href="remover.php">Remover Vagas</a>
    <br>
    <a href="cadastrar.php">Cadastrar Vagas</a>
    <br>
    <a href="visualizar.php">Visualizar Vagas</a>
    <br>
    <a href="login.php">Logout</a>
</body>
</html>