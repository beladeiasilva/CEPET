<?php
//-------------------------------SESSÃO DO USUARIO-----------------//

  



    //Testar se os dados estão sendo inseridos:
    //print_r($_REQUEST);


    if(isset($_POST['usuarioentrar']) && !empty($_POST['email']) && !empty($_POST['senha']))
    
    {
        //Acessa
        include('conexao.php');
        $emailU = $_POST['email'];
        $senhaU = $_POST['senha'];

        //Testar a conexão de email e senha:
        //print_r('email: ' . $email);
        //print_r('senha: ' . $senha);
        
        $sql ="SELECT * FROM usuarios WHERE EMAIL='$emailU'";
        $result = $mysqli->query($sql);

        $usuario = $result->fetch_assoc();

        if (password_verify($senhaU, $usuario['SENHA']) ==true)
         {
            session_start();
            
            $sql ="SELECT * FROM usuarios WHERE EMAIL='$emailU'";
            $result = $mysqli->query($sql);
            $usuario = $result->fetch_assoc();
        
            
            $_SESSION['usuario'] = $usuario['NOME_DE_USUARIO'];
            $_SESSION['senha'] = password_verify($senhaU, $usuario['SENHA']);
            $_SESSION['email'] = $emailU;
             
            
            
             header("Location: /conexao/paginas/inicial.php");
        } 
        else
        {
                 unset($_SESSION['email']);
                 unset($_SESSION['senha']);
                 header("Location: /conexao/paginas/login.php");
    //         
        }

    }
    else
    {
        //Não acessa
        header("Location: /conexao/paginas/login.php");
    }
     

  ?>
   

     
    
     




