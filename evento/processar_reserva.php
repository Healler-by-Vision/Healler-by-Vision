<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: ../login/login.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['quarto'], $_POST['data_checkin'], $_POST['data_checkout'], $_POST['valor'])) {
        require_once('../evento/conexao.php');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $quarto = $_POST['quarto'];
        $data_checkin = $_POST['data_checkin'];
        $data_checkout = $_POST['data_checkout'];
        $valor = $_POST['valor'];

        $query = "INSERT INTO reservas (nome, email, telefone, quarto, data_checkin, data_checkout, valor) VALUES (:nome, :email, :telefone, :quarto, :data_checkin, :data_checkout, :valor)";
        
        $database = new Database();
        $db = $database->conectar();

        $stmt = $db->prepare($query);
        
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':quarto', $quarto);
        $stmt->bindParam(':data_checkin', $data_checkin);
        $stmt->bindParam(':data_checkout', $data_checkout);
        $stmt->bindParam(':valor', $valor);
        
        if ($stmt->execute()) {
            header('Location: ../');
            exit;
        } else {
            header('Location: erro.php');
            exit;
        }
    } else {
        header('Location: erro.php');
        exit;
    }
}
?>
