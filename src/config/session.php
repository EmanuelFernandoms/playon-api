<?php
function iniciarSessao($id, $nome, $email, $telefone, $foto_perfil, $status){
    $lifetime = 60 * 60 * 24 * 30;

    if (session_status() === PHP_SESSION_NONE) {
        // Só define os parâmetros se a sessão ainda não foi iniciada
        session_set_cookie_params([
            'lifetime' => $lifetime, 
            'path' => '/',
            'domain' => '', // vazio = válido apenas para o domínio atual
            'secure' => false, // true se for HTTPS
            'httponly' => true
        ]);
        session_start();
    }

    $_SESSION['usuario'] = [
        'id' => $id,
        'nome' => $nome,
        'email' => $email,
        'telefone' => $telefone,
        'foto_perfil' => $foto_perfil,
        'status' => $status
    ];
}
