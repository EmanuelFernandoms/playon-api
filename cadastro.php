<?php
session_start();
require_once "./src/config/config.php";

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
    <div class="alerta" id="alerta">
        <div class="contador" id="contador"></div>
        <span id="mensagemAlerta"></span>
    </div>



    <div class="container">
        <div class="modal_cadastro">
            <div class="cabecalho_login">
                <h2>CADASTRO</h2>
            </div>
            <div class="campos_login">
                <div>
                    <label for="email_cadastro">Email</label>
                    <input type="email" name="email_cadastro" id="email_cadastro" class="input_cadastro">
                </div>
    
                <div>
                    <label for="senha_cadastro">Senha</label>
                    <input type="password" name="senha_cadastro" id="senha_cadastro" class="input_cadastro">
                </div>
    
                <div>
                    <label for="confirmar_senha_cadastro">Confirmar Senha</label>
                    <input type="password" name="confirmar_senha_cadastro" id="confirmar_senha_cadastro" class="input_cadastro">
                </div>
    
                <div>
                    <label for="nome_completo_cadastro">Nome Completo</label>
                    <input type="text" name="nome_completo_cadastro" id="nome_completo_cadastro" class="input_cadastro">
                </div>
    
                <div>
                    <label for="telefone_cadastro">Telefone</label>
                    <input type="text" name="telefone_cadastro" id="telefone_cadastro" class="input_cadastro">
                </div>
            </div>
            <div class="modal_footer">
                <a href="#" class="botao_laranja" id="login" onclick="cadastrarUsuario()">CADASTRAR</a>
                <a href="./index.php" class="link" id="possuo_conta">Já Possuo Conta</a>
            </div>
        </div>
    </div>
    
<script>var baseUrl = <?php echo (API_URL) ? '\'' . API_URL . '\''  : 'window.location.pathname.split(\'/\')[1] + \'/\'' ?>;</script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>     
<script src="./login.js"></script>
</body>
</html>