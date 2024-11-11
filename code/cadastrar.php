<?php
session_start();
if (!isset($_SESSION['logged_in']))
{
    header("Location: index.php");
    exit();
}

require './classes/cadastro.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $nome_empresa = $_POST['nome_empresa'];
    $numero_whatsapp = $_POST['numero_whatsapp'];
    $email_contato = $_POST['email_contato'];
    $descritivo_vaga = $_POST['descritivo_vaga'];
    $curso = $_POST['curso'];

    $cadastro = new Cadastro();
    if ($cadastro->cadastroVagas($nome_empresa, $numero_whatsapp, $email_contato, $descritivo_vaga, $curso)) 
    {
        echo "Vaga cadastrada com sucesso!";
    } 
    else 
    {
        echo "Erro ao cadastrar vaga.";
    }
    header('Location: home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Vaga</title>
    <link rel="stylesheet" href="./css/cadastro.css">
</head>
<body>
    

<div class="container">
<form method="POST" action="cadastrar.php">

    <div class="inputs">
    Nome da Empresa: <input type="text" name="nome_empresa" required><br>
    </div>

    <div class="inputs">
    Numero de WhatsApp: <input type="text" name="numero_whatsapp" required><br>
    </div>

    <div class="inputs">
    E-mail para contato: <input type="email" name="email_contato" required><br>
    </div>

    <div class="inputs">
    Descrição: <input type="text" name="descritivo_vaga" required><br>
    </div>

    <div class="dropdown">
    Curso: 
    <select name="curso" required>
        <option value="1">DSM</option>
        <option value="2">GE</option>
    </select><br>
    </div>

    <div class="button">
        <button type="submit">Cadastrar Vaga</button>
    </div>

    <a href="home.php" class="voltar">Voltar</a>
</form>
</div>
</body>
</html>