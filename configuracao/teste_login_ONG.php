<?php
session_start();

//print_r($_REQUEST);

 if(isset($_POST['ongentrar']) && !empty($_POST['ongcnpj']) && !empty($_POST['ongsenha']))

 {
// //Acessa
 include('conexao.php');
 $cnpjO = $_POST['ongcnpj'];
 $senhaO = $_POST['ongsenha'];


// //Testar se o login está mandando infor mações para as variaveis:
//  print_r('cnpj: ' . $cnpjO);
//  print_r('senha: ' . $senhaO);

 $sql ="SELECT * FROM ongs WHERE CNPJ = '$cnpjO' and SENHA ='$senhaO'";


 $result = $mysqli->query($sql);



 
 //Verifcar se os dados batem com os do banco:
    //print_r($result);
    


 if(mysqli_num_rows($result) < 1)
{
    unset($_SESSION['ongcnpj']);
    unset($_SESSION['ongsenha']);

    header('Location: /conexao/paginas/login.php');
}
else
{
    //Váriaveis SESSION puxando o valor de outras variaveis.
    $_SESSION['ongcnpj'] = $cnpjO;
    $_SESSION['ongsenha'] = $senhaO;

    

    header('Location: /conexao/paginas/inicialong.php');
}
 }

else
{
    //Não acessa
    header('Location: /conexao/paginas/login.php');

}

   


?>



      
        
    }

    