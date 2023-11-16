<?php
if (!isset($_SESSION)) {
    session_start();
}
$id_user = $_SESSION['id'];
if (!isset($_SESSION['id'])) {
    header('Location: ../login/login.php');
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "healler";

$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
date_default_timezone_set('America/Sao_Paulo');

$query = "SELECT id, nome, email  FROM usuarios WHERE id = :id";
$stmt = $db->prepare($query);
$stmt->bindParam(':id', $id_user, PDO::PARAM_INT);
$stmt->execute();
$user_data = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$user_data) {
    header('Location: erro.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="../css/perfil.css">
    <title>Perfil</title>
</head>
<body>
<header>
            <div class="center">
                <?php 
                    if (!isset($_SESSION['id'])) {
                        echo "<h2><a href='login.php' class='button'>Login</a></h2>"; 
                        echo "<h2><a href='cadastro.php' class='button'>Cadastro</a></h2>";
                    } else { 
                        echo "<h2><a href='perfil.php' class='button'>Perfil</a></h2>";
                        echo "<h2><a href='logout.php' class='button'>Log Out</a></h2>";
                    }
                ?>
            </div>
    </header>
<div class="geral">
<h2>Editar Perfil</h2>
    <form action="atualizar_perfil.php" method="post">
        <input type="hidden" name="id" value="<?php echo $user_data['id']; ?>">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $user_data['nome']; ?>">
        <label for="email">E-mail:</label>
        <input type="text" name="email" value="<?php echo $user_data['email']; ?>">
        <label for="nova_senha">Nova Senha (deixe em branco para não alterar):</label>
        <input type="password" name="nova_senha">
        <input type="submit" value="Salvar Alterações">
    </form>
    <a href="../">Voltar</a>
</div>
</body>
</html>