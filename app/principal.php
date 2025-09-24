<?php
session_start();
require_once "../src/config/config.php";

if (!isset($_SESSION['usuario'])) {
    die('<script>
        window.alert("Você não está logado no sistema!");
        window.location.href = "../index.php";
    </script>');
    session_unset();
    session_destroy();
}

echo $_SESSION["usuario"]["id"];

$link = BASE_URL . "/app/js/usuario.js"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayOn</title>
</head>
<body>

<button onclick="session_die()">sair</button>

<script>var baseUrl = <?php echo (API_URL) ? '\'' . API_URL . '\''  : 'window.location.pathname.split(\'/\')[1] + \'/\'' ?>;</script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="<?php echo BASE_URL . "/app/js/usuario.js"?>"></script>
</body>
</html>