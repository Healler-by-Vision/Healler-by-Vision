<?php 
    if (!isset($_SESSION)) {
        session_start();
    }
    $id_user = $_SESSION['id'];
    if (!isset($_SESSION['id'])) {
        header('Location: login.php');
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "healler";

    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    date_default_timezone_set('America/Sao_Paulo');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $nova_senha = $_POST['nova_senha'];
        if (!empty($nova_senha)) {
            $senha_sha1 = sha1($nova_senha);
            $query = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha_sha1);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } else {
            $query = "UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }
        header('Location: perfil.php');
        exit;
    }
?>