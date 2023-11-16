<?php
session_start();
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

if (isset($_POST['email']) && isset($_POST['senha'])) {
    $email = $_POST['email']; 
    $senha = sha1($_POST['senha']); 

    if (!empty($email) && !empty($senha)) {
        $sql = $db->prepare("SELECT id FROM usuarios WHERE email = ? AND senha = ?");
        $sql->bind_param("ss", $email, $senha); 
        $sql->execute();
        $result = $sql->get_result()->fetch_assoc();

        if ($result) {
            $_SESSION['id'] = $result['id']; 
            header("location: ../index.php");
            exit();
        } else {
            $_SESSION['login_error'] = "Usuário e/ou senha incorretos";
            header("location: ../index.php");
            exit();
        }
    } else {
        $_SESSION['login_error'] = "Preencha todos os campos!";
        header("location: login.php");
        exit();
    }
}
?>