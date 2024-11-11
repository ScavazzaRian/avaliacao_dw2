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
    $id = $_POST['id'];
    $cadastro = new Cadastro();

    if ($cadastro->removerVagas($id)) 
    {
        echo "Vaga removida com sucesso!";
    } 
    else 
    {
        echo "Erro ao remover vaga.";
    }
    header('Location: home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remover Vaga</title>
</head>
<body>
    

    <form method="POST" action="remover.php">
      ID da Vaga: <input type="number" name="id" required><br>
      <button type="submit">Remover Vaga</button>
    </form>

</body>
</html>