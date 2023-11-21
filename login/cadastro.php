<?php

require_once 'usuarios.php';

$u = new usuario;

require_once '../evento/conexao.php';

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/cadastro.css">

    <title>Cadastro</title>

</head>




<body>
    

 <?php include '../menu/nav.php'; ?>

<div class="geral">

<form action="" method="post">

 

        <input type="text" name="nome" placeholder="Nome completo"> <br> <br>
        <input type="email" name="email" placeholder="E-mail"> <br> <br>
        <input type="senha" name="senha" placeholder="Crie Sua Senha">  <br><br>

        <button type="submit">Cadastrar</button>
 

</form>
<p>Dados serão armazenados até o lançamento do APP agradecemos o registro!</p>


</div>

<?php

 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];

 
            if (!empty($nome)  && !empty($email)  && !empty($senha)) {

                $database = new Database();

                $connection = $database->conectar();
                $u->conectar("hotelreserve", "localhost", "root", "");

       

                if ($u->msgErro == "") {

                 

                        if ($u->cadastrar($nome, $senha, $email, $data, $cpf, $telefone)) {  

                            ?>

                            <div id="msg-sucesso">

                            Cadastrado com sucesso! Volte para fazer o login!

                            </div>

                            <?php

                        } else {

                            ?>

                            <div class="msg-erro">

                            Erro ao cadastrar no sistema!

                            </div>

                            <?php

                        }

                 

       

                    header("location: ../index.php");

                } else {

                    echo "Erro: ".$u->msgErro;

                }

       

                $connection = null;

            } else {

                ?>

                <div class="msg-erro">

                Preencha todos os campos!

                </div>

                <?php

            }

        }

        ?>

 

 

</body>

</html>