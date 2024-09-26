<?php
//-------------------------------SESSÃO DO USUARIO-----------------//

    session_start();



    //Testar se os dados estão sendo inseridos:
    //print_r($_REQUEST);


    if(isset($_POST['usuarioentrar']) && !empty($_POST['email']) && !empty($_POST['senha']))
    
    {
        //Acessa
        include_once('conexao.php');
        $emailU = $_POST['email'];
        $senhaU = $_POST['senha'];

        //Testar a conexão de email e senha:
        //print_r('email: ' . $email);
        //print_r('senha: ' . $senha);
        
        $sql ="SELECT * FROM usuarios WHERE EMAIL ='$emailU' and SENHA ='$senhaU'";

        $result = $mysqli->query($sql);

        //Verifcar se os dados batem com os do banco:
        //print_r($result);

        if(mysqli_num_rows($result) < 1)

        {
           unset($_SESSION['email']);
           unset($_SESSION['senha']);

            header("Location: /conexao/paginas/login.php");
        }
        else
        {
           $_SESSION['email'] = $emailU;
           $_SESSION['senha'] = $senhaU;

            header("Location: /conexao/paginas/inicial.php");
        }
    }
    else
    {
        //Não acessa
        header('Location: /conexao/paginas/login.php');
   
    }
   
   

     
    
     




?>