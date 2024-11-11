<?php
session_start();
if (!isset($_SESSION['logged_in'])) 
{
    header("Location: index.php");
    exit();
}

require './classes/cadastro.php';

$cadastro = new Cadastro();
$vagas = $cadastro->visualizarVagas();

if (count($vagas) > 0) 
{
    echo "<table border='1'>
            <tr>
                <th>Id vaga</th>
                <th>Empresa</th>
                <th>WhatsApp</th>
                <th>Email</th>
                <th>Descrição</th>
                <th>Id Curso</th>
            </tr>";
    foreach ($vagas as $vaga) 
    {
        echo "<tr>
                <td>{$vaga['id']}</td>
                <td>{$vaga['nome_empresa']}</td>
                <td>{$vaga['numero_whatsapp']}</td>
                <td>{$vaga['email_contato']}</td>
                <td>{$vaga['descritivo_vaga']}</td>
                <td>" . ($vaga['curso'] == 1 ? "DSM" : "GE") . "</td>
              </tr>";
    }
    echo "</table>";
} 
else 
{
    echo "Nenhuma vaga disponível.";
}
?>
