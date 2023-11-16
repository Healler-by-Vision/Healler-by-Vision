<?php
require_once 'usuarios.php';
$u = new usuario;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "healler";

$db = new mysqli($servername, $username, $password, $dbname);

if ($db->connect_error) {
    die("Erro na conexão com o banco de dados: " . $db->connect_error);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastro.css">
    <title>Cadastro</title>
</head>
<body>
<header>
    <div class="center">
        <?php 
        if (!isset($_SESSION['id'])) {
            echo "<h2><a href='login.php' class='button'>Login</a></h2>"; 
            echo "<h2><a href='cadastro.php' class='button'>Cadastro</a></h2>";
        } else { 
            echo "<h2><a href='logout.php' class='button'>Log Out</a></h2>";
        }
        ?>
    </div>
</header>
<div class="geral">
    <form action="" method="post">
        <input type="text" name="nome" placeholder="Nome completo"> <br> <br>
        <input type="email" name="email" placeholder="E-mail"> <br> <br>
        <input type="password" name="senha" placeholder="Crie Sua Senha">  <br><br>
        <button type="submit">Cadastrar</button>
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    if (!empty($nome) && !empty($email) && !empty($senha)) {
        $u->conectar($dbname, $servername, $username, $password);

        if ($u->msgErro == "") {
            if ($u->cadastrar($nome, $senha, $email)) {  
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
            echo "Erro: " . $u->msgErro;
        }
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
  