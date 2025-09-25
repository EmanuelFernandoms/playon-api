<?php
require_once __DIR__ . '/../../src/config/config.php';
require_once __DIR__ . '/../../src/config/session.php';
require_once __DIR__ . '/../../src/database/conexao.php';
session_start();


if (!isset($connection)) {
    include_once __DIR__ . "/../../src/database/Database.php";
    $connection = Database::getConnection();
}

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if ($_GET["endpoint"] === "teste") {
        $teste = $_GET['teste'] ?? null;
        echo $teste;
    }
} else if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_GET["endpoint"] === "start_session") {
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        
        $stmt = $connection->prepare("
            SELECT
                *
            FROM
                usuarios u
            WHERE
                u.email = :email
        ");
        $stmt->execute([':email' => $email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario == false){
            echo "email_invalido";
            die();
        } else if (!password_verify($senha, $usuario["senha"])){
            echo "senha_invalida";
            die();
        }

        echo "true";
        iniciarSessao(
            $usuario["id"], 
            $usuario["nome_completo"],
            $usuario["email"],
            $usuario["telefone"],
            $usuario["foto_perfil"],
            $usuario["status"],
        );
    } else if ($_GET["endpoint"] === "session_die") {
        session_unset();
        session_destroy();
        header(BASE_URL . `/index.php`);
    } else if ($_GET["endpoint"] === "cadastrar_usuario") {

        $email      = $_POST["email"];
        $senha      = $_POST["senha"];
        $senha      = password_hash($senha, PASSWORD_DEFAULT);
        $nome       = $_POST["nome"];
        $telefone   = $_POST["telefone"];

        $stmt = $connection->prepare("
            SELECT
                *
            FROM
                usuarios u
            WHERE u.email = :email
              AND u.status != 'bloqueado';

        ");
        $stmt->execute([':email' => $email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($usuario !== false) {
            echo "email_existe";
            die();
        }

        $stmt = $connection->prepare("
            INSERT INTO usuarios
            (nome_completo, email, senha, telefone, created_at, updated_at)
            values (
                :nome_completo,
                :email,
                :senha,
                :telefone,
                NOW(),
                NOW()
            )
        ");
        $success = $stmt->execute([
            ':nome_completo'    => $nome,
            ':email'            => $email,
            ':senha'            => $senha,
            ':telefone'         => $telefone
        ]);
        $id = $connection->lastInsertId();
        if ($success){
            iniciarSessao(
                $id, 
                $nome,
                $email,
                $telefone,
                null,
                "ativo",
            );
            echo "true";
        }

    }
} else if ($_SERVER["REQUEST_METHOD"] === "PUT") {
    
} else if ($_SERVER["REQUEST_METHOD"] === "PATCH") {
    
} else if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
    
}