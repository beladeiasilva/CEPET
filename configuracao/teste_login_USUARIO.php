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

        if (password_verify($senhaU, $usuario['SENHA']))
         {
            session_start();
                  
                $_SESSION['usuario'] = $usuario2['NOME_DE_USUARIO'];
                $_SESSION['email'] = $usuario2['EMAIL'];
                $_SESSION['senha'] = $usuario2['SENHA'];
            
                 header("Location: /conexao/paginas/inicial.php");
        } 
        else
        {
                 unset($_SESSION['email']);
                 unset($_SESSION['senha']);
                 header("Location: /conexao/paginas/login.php");
    //         
        }
    
        //Verifcar se os dados batem com os do banco:
        //print_r($result);

    //   
    //     else
    //     {

            
    //      $sql2 ="SELECT * FROM usuarios WHERE EMAIL='$emailU' AND SENHA = '$senhaU'";
    //      $result2 = $mysqli->query($sql2);
    //     $usuario2 = $result2->fetch_assoc();
            
    //        
            
            
    //     }
    // }
    // else
    // {
    //     //Não acessa
    //     header("Location: /conexao/paginas/login.php");
   
     
}
  ?>
   

     
    
     




