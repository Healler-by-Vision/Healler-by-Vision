<?php
    
    
    if (isset($_SESSION['id'])) {
        $id_user = $_SESSION['id']; 
    }

    require_once('evento/conexao.php');
    date_default_timezone_set('America/Sao_Paulo');

    $database = new Database();
    $db = $database->conectar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/menu1.css">
    <link rel="stylesheet" href="css/mobile-menu.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
</head>
<body>
    <header class="header">
        <div class="logo">
            <img class="logoimg" src="imagens/logo.png" alt="logo"> 
            <span>Healler by Vision</span>
        </div>
        <div class="nav-toggle" onclick="toggleMobileMenu()">&#9776;</div>
        <nav class="nav">
            <ul>
               
                <li class="nav-item2"><a class="navas1" href="login/login.php">Voltar</a></li>
            </ul>
        </nav>
    </header>
    <div class="mobile-menu" id="mobileMenu">
        <div class="nav-toggle" onclick="toggleMobileMenu()">&#10006;</div>
        <ul>

            <li class="nav-item2"><a class="navas1" href="login/login.php">Voltar</a></li>
        </ul>
    </div>
    <script src="js/nav.js"></script>
    <script>
        function toggleMobileMenu() {
            var mobileMenu = document.getElementById("mobileMenu");
            mobileMenu.classList.toggle("show");
        }
    </script>
</body>
</html>