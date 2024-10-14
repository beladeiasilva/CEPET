<?php
session_start();

// Verifica se há um usuário ou ONG logado
if ((!isset($_SESSION['cnpj']) && !isset($_SESSION['senha'])) && 
    (!isset($_SESSION['user_id']) && !isset($_SESSION['user_password']))) {
    
    // Se ninguém estiver logado, limpa as sessões e redireciona para o login
    unset($_SESSION['cnpj']);
    unset($_SESSION['senha']);
    unset($_SESSION['ong']);
    unset($_SESSION['user_id']);
    unset($_SESSION['user_password']);
    unset($_SESSION['user_name']);
    
    // Redireciona para a página de login (ou apenas define o status como deslogado)
    $logged_in = false;
} else {
    // Se ONG estiver logada
    if (isset($_SESSION['cnpj']) && isset($_SESSION['ong'])) {
        $logged_in = true;
        $ong_name = $_SESSION['ong'];
        $user_type = 'ong'; // Para identificar o tipo de sessão
    }

    // Se usuário estiver logado
    if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {
        $logged_in = true;
        $user_name = $_SESSION['user_name'];
        $user_type = 'usuario'; // Para identificar o tipo de sessão
    }
}
?>
