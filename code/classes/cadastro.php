<?php
class Cadastro
{
    private $host = "localhost";
    private $dbname = "vagas";
    private $username = "root";
    private $password = "";
    private $conexao;

    public function __construct()
    {
        $this->conectar();
    }

    public function __destruct()

    {
        $this->conexao = null;
    }

    public function conectar()
    {
        if($this->conexao === null)
        {
            try
            {
                $this->conexao = new PDO("mysql:host={$this->host};dbname={$this->dbname}",
                $this->username,
                $this->password);
                $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            }
            catch(PDOException $e)
            {
                echo "Erro na conexao!!" . $e->getMessage();
                exit;
            }
        }
    }

    public function cadastroVagas($nome_empresa, $numero_whatsapp, $email_contato, $descritivo_vaga, $curso)
    {
        $sql = "INSERT INTO VAGAS (nome_empresa, numero_whatsapp, email_contato, descritivo_vaga, curso) VALUES (:nome_empresa, :numero_whatsapp, :email_contato, :descritivo_vaga, :curso)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':nome_empresa', $nome_empresa);
        $stmt->bindParam(':numero_whatsapp', $numero_whatsapp);
        $stmt->bindParam(':email_contato', $email_contato);
        $stmt->bindParam(':descritivo_vaga', $descritivo_vaga);
        $stmt->bindParam(':curso', $curso);
        
        return $stmt->execute();
    }

    public function removerVagas($id)
    {
        $sql = "DELETE FROM VAGAS WHERE ID = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function visualizarVagas()
    {
        $sql = "SELECT * FROM VAGAS";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>