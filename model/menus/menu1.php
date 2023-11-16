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
                <li class="nav-item navas"><a class="navas" href="index.php">Home Healler by Vision</a></li>
                <li class="nav-item dropdown">
                    <a class="navas" href="#">Serviços &#9660;</a>
                    <div class="dropdown-content">
                        <a href="admcon.php">Funcionalidades</a>
                        <a href="ttstech.php">Estudos</a>
                    </div>
                </li>
                <li class="nav-item"><a class="navas" href="#">Fale Conosco</a></li>
                <li class="nav-item1"><a class="navas" href="#">Nosso Aplicativo</a></li>
                <li class="nav-item2"><a class="navas1" href="#">Logar By Vision</a></li>
            </ul>
        </nav>
    </header>
    <div class="mobile-menu" id="mobileMenu">
        <div class="nav-toggle" onclick="toggleMobileMenu()">&#10006;</div>
        <ul>
                <li class="nav-item navas especmob"><a class="navas" href="index.php">Home TTS</a></li>
                <li class="nav-item dropdown especmob"> <br>
                    <a class="navas" href="#">Serviços &#9660;</a> <br>
                    <div class="dropdown-content"> 
                        <a href="admcon.php">Administração de Condomínios</a> 
                        <a href="ttstech.php">TTS Tech</a>
                        <a href="mobra.php">Facilitação de Mão de Obra</a>
                        <a href="facilities.php">TTS Facilities</a>
                        <a href="inventor1.php">Seja um Inventor</a>
                        <a href="posobra.php">Pós Obra</a>
                        <a href="dp.php">Departamento Pessoal</a>
                        <a href="imp.php">Implantação para Construtoras</a>
                        <a href="somostts.php">Somos TTS</a>
                        <a href="rh.php">RH</a>
                    </div> <br> 
                </li>
                <li class="nav-item especmob"><a class="navas" href="fale_conosco.php">Fale Conosco</a></li> <br>
                <li class="nav-item1 especmob"><a class="navas" href="celapp.php">Meu Aplicativo Com21</a></li> <br>
                <li class="nav-item2 especmob"><a class="navas1" href="https://ttdash.com">Experiência TTS</a></li>
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
