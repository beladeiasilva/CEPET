<?php
    session_start();
    //Testar se os dados estão sendo inseridos:
    //print_r($_REQUEST);


    if(isset($_POST['entrar']) && !empty($_POST['email']) && !empty($_POST['senha']))
    {
        //Acessa
        include_once('conexao.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        //Testar a conexão de email e senha:
        //print_r('email: ' . $email);
        //print_r('senha: ' . $senha);
        
        $sql ="SELECT * FROM usuarios WHERE EMAIL ='$email' and SENHA ='$senha'";

        $result = $mysqli->query($sql);

        //Verifcar se os dados batem com os do banco:
        //print_r($result);

        if(mysqli_num_rows($result) < 1)

        {
           unset($_SESSION['email']);
           unset($_SESSION['senha']);

            header('Location: login.php');
        }
        else
        {
           $_SESSION['email'] = $email;
           $_SESSION['senha'] = $senha;

            header('Location: inicial.php');
        }
    }
    else
    {
        //Não acessa
        header('Location: login.php');
    
    }
?>