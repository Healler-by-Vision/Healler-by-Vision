<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="../css/login.css">
    <title>Document</title>
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
    <form action="logar.php" method="post">

            <input type="email" name="email" id="" placeholder="Insira Seu E-mail">
                    <input type="password" name="senha" id="" placeholder="Insira Sua Senha"> 
                    <button  type="submit">Login</button>


    </form> 
    <a href="cadastro.php">Cadastre-se</a>
                 
                </div>
</body>
</html>