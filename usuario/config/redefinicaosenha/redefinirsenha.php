<?php
        
     if(isset($_POST['redefinir']) && !empty($_GET['ID_USUARIO'])){

        $senha = $_POST['senha']; 
        $confirmarsenha = $_POST['confirmarsenha'];
        $_GET['ID_USUARIO'];
     
      
    
         if($senha == $confirmarsenha) {



             include("config/conexao.php");
        
             $senha =  password_hash($_POST['senha'], PASSWORD_DEFAULT); //Criptografia

             $sql=mysqli_query($mysqli, "UPDATE usuarios SET SENHA = '$senha' WHERE ID_USUARIO = '$_GET[ID_USUARIO]'");

             if($sql ==true)

                echo " Senha redefinida com Sucesso!";

         }else{

                echo " As senhas não correspondem!";
         }

     }

    

?>
