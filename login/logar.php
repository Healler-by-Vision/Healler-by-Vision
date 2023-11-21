<?php
session_start();

require_once '../evento/conexao.php';

$database = new Database();
$conexao = $database->conectar(); 

if (isset($_POST['email']) && isset($_POST['senha'])) {
    $email = $_POST['email']; 
    $senha = sha1($_POST['senha']); 

    if (!empty($email) && !empty($senha)) {
        $sql = $conexao->prepare("SELECT id FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", $senha); 
        $sql->execute();

        $result = $sql->fetch(PDO::FETCH_ASSOC);
        
        if ($result) {
            $_SESSION['id'] = $result['id']; 
            header("location: ../index.php");
            exit();
        } else {
            $_SESSION['login_error'] = "Usuário e/ou senha incorretos";
           
            print_r( $_SESSION['login_error']);
            header("location: ../index.php");
            exit();
        }
    } else {
        $_SESSION['login_error'] = "Preencha todos os campos!";
        header("location: login.php");
        print_r( $_SESSION['login_error']);
        exit();
    }
}
?>