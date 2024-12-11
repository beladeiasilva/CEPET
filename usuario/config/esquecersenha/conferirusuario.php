<?php
    include("C:/xampp/htdocs/cepet/usuario/config/logado.php");

    if(isset($_POST['enviar'])){

    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    
    include("C:/xampp/htdocs/cepet/usuario/config/conexao.php");
    $sql="SELECT * FROM usuarios WHERE CPF = '$cpf' and EMAIL = '$email'";
    $result = mysqli_query($mysqli, $sql);
    $dados = mysqli_fetch_assoc($result);

    if($result->num_rows >0 ){ 
  

    require 'enviaemail.php';
    


    }else {

    echo"Usuario não existe!";
    }
    }
?>