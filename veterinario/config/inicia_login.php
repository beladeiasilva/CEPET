<?php 



    //Testar se os dados estão sendo inseridos:
    //print_r($_REQUEST);


    if(isset($_POST['entrar']) && !empty($_POST['email']) && !empty($_POST['senha']))
    
    {
        //Acessa
        include('conexao.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        //Testar a conexão de email e senha:
        //print_r('email: ' . $email);
        //print_r('senha: ' . $senha);
        
        $sql ="SELECT * FROM veterinarios WHERE EMAIL='$email'";
        $result = $mysqli->query($sql);

        $vet = $result->fetch_assoc();

        if (password_verify($senha, $vet['SENHA']) ==true) //and $autentica['AUTENTICACAO'] == 1)
         {
            session_start();
            
            $sql ="SELECT * FROM veterinarios WHERE EMAIL='$email'";
            $result = $mysqli->query($sql);
            $usuario = $result->fetch_assoc();
        
            
            $_SESSION['usuario'] = $vet['NOME'];
            $_SESSION['senha'] = password_verify($senha, $vet['SENHA']);
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $vet['ID_VETERINARIO'];
            
     
             header("Location: /cepet/veterinario/inicial.php");
        } 
        else
        {
                 unset($_SESSION['email']);
                 unset($_SESSION['senha']);
                 header("Location: /cepet/ambos/login.php");
    //         
        }

    }
    else
    {
        //Não acessa
        header("Location: /cepet/ambos/login.php");
    }
     

  ?>
   

     
    
     








