<?php
require_once "./src/config/config.php";
session_start();

if (isset($_SESSION["usuario"])){
    header("Location: ./app/principal.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/icons/favicon-laranja.svg" type="image/svg+xml">
    <link rel="stylesheet" href="./app/styles/style.index.css">
    <title>PlayOn</title>
</head>
<body>
    <nav>
        <img src="./assets/icons/playon vermelho.svg" alt="">
    </nav>
    <div class="container">
        <div class="modal_login">
            <div class="cabecalho_login">
                <h2>LOGIN</h2>
            </div>
            <div class="campos_login">
                <div>
                    <label for="email_login">Email</label>
                    <input type="email" name="email_login" id="email_login" class="input_default">
                </div>
    
                <div>
                    <label for="senha_login">Senha</label>
                    <input type="password" name="senha_login" id="senha_login" class="input_default">
                </div>
            </div>
            <div class="modal_footer">
                <a href="#" class="botao_laranja" id="login" onclick="iniciarSessao()">ENTRAR</a>
                <a href="./cadastro.php" class="link" id="possuo_conta">Não Possuo Conta</a>
            </div>
        </div>
    </div>
    
<script>var baseUrl = <?php echo (API_URL) ? '\'' . API_URL . '\''  : 'window.location.pathname.split(\'/\')[1] + \'/\'' ?>;</script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="./login.js"></script>
</body>
</html>