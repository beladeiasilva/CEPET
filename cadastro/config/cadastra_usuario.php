<?php
if(isset($_POST['cadastrar']))
    {
  
        include_once("conexao.php");

        //--------------------------------------------Declarando váriaveis---------------------------------------------->
        $nomelogin = $_POST['usuariologin'];
        $senhaU = password_hash($_POST['usuariosenha'], PASSWORD_DEFAULT);
        $emailU = $_POST['usuarioemail'];
        $img_perfil = "mascote.jpg";
        
    

        //------------------------------------Verifica se há um email já cadastrado----------------------------------------------
        $sqlVCD="SELECT * FROM usuarios where EMAIL= '$emailU'";

        if($result=mysqli_query($mysqli,$sqlVCD))
        {
            $qtdLinhas = mysqli_num_rows($result);

            if($qtdLinhas>0)
            {

                die("<link rel='stylesheet' type='text/css' href='/cepet/usuario/css/adotar.css'>
                <link rel='stylesheet' type='text/css' href='/cepet/usuario/css/padrao.css'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <link rel='icon' href='/cepet/usuario/img/logos/icon.ico'>
                   <style>
                   a:link{
                   text-decoration:none;}
                   </style>
                   <br><br><br><br><br><br><br>
                    <h1> Este email já está cadastrado! </h1>
                    <br> <br> <br>
                    <a href='/cepet/cadastro/cadastrousuario.php'><button class='btn' type='btn'>Retornar</button></a>");
            

            }
            
        $sqlVCD="SELECT * FROM usuarios where CPF= '$cpf'";

        if($result=mysqli_query($mysqli,$sqlVCD))
        {
            $qtdLinhas = mysqli_num_rows($result);

            if($qtdLinhas>0)
            {
                die("<link rel='stylesheet' type='text/css' href='/cepet/usuario/css/adotar.css'>
                <link rel='stylesheet' type='text/css' href='/cepet/usuario/css/padrao.css'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <link rel='icon' href='/cepet/usuario/img/logos/icon.ico'>
                <style>
                a:link{
                text-decoration:none;}
                </style>
                <br><br><br><br><br><br><br>
                    <h1> Este CPF já está cadastrado! </h1>
                    <br> <br> <br>
                    <a href='/cepet/cadastro/cadastrousuario.php'><button class='btn' type='btn'>Retornar</button></a>");
            }else{
        
        //------------------------------------Inserindo ao banco de dados:-------------------------------------------------------//

                $result = mysqli_query($mysqli, "INSERT INTO usuarios (NOME_DE_USUARIO, SENHA, CPF, EMAIL, IMG_PERFIL) 
                VALUES ('$nomelogin','$senhaU','$cpf','$emailU','$img_perfil')");

                

                $sql="SELECT ID_USUARIO FROM usuarios WHERE CPF = '$cpf'";
                $result2= mysqli_query($mysqli, $sql);
                $id= mysqli_fetch_assoc($result2);
                $id['ID_USUARIO'];

        //------------------------------------------Conexão com email------------------------//        
                //require 'enviaemail.php';
        //-----------------------------------------------------------------------------------//    
                header("Location: /cepet/ambos/login.php");
            }
        }       
    }
}
    ?>