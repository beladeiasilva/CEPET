<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
    $logado = false;
    header('Location: /conexao/paginas/login.php');
} else {
    $logado = true;
    $usuario = $_SESSION['usuario'];  // Nome do usuário

    include('conexao.php');

    $sql="SELECT NOME_COMPLETO, DATA_DE_NASCIMENTO, GENÊRO, EMAIL, TELEFONE, ENDERECO, CEP, UF FROM usuarios WHERE NOME_DE_USUARIO = '$usuario'";


    $result=mysqli_query($mysqli, $sql);
    
    $dados = mysqli_fetch_assoc($result);
    $nome= $dados['NOME_COMPLETO'];
    $data_nasc= $dados['DATA_DE_NASCIMENTO'];
    $genero= $dados['GENÊRO'];
    $email= $dados['EMAIL'];
    $telefone= $dados['TELEFONE'];
    $endereco= $dados['ENDERECO'];
    $cep= $dados['CEP'];
    $uf= $dados['UF'];
}   
?>
