

<?php

class usuario

{

    private $pdo;

    public $msgErro = "";

 

    public function conectar($nome, $host, $usuario, $senha)

    {

        try

        {

            $this->pdo = new PDO("mysql:dbname=".$nome.";host=".$host, $usuario, $senha);

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }

        catch (PDOException $e)

        {

            $this->msgErro = $e->getMessage();

        }

    }

 

    public function cadastrar($nome, $senha, $email, $data, $cpf, $telefone) {

        $sql = $this->pdo->prepare("SELECT id FROM usuarios WHERE nome = :n");

        $sql->bindValue(":n", $nome);
        $sql->execute();
        if ($sql->rowCount() > 0) {

            return false;

        } else {

            $sql = $this->pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:n, :e,  :s)");

            $sql->bindValue(":n", $nome);


            $sql->bindvalue(":e", $email);



            $sql->bindValue(":s", sha1($senha));

            $sql->execute();

            return true;

        }

    }

}

?>

 