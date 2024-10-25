<?php
if(isset($_POST['cadastrar']))
    {
  
        include_once("config/conexao.php");

        //--------------------------------------------Declarando váriaveis---------------------------------------------->
        $nomelogin = $_POST['usuariologin'];
        $senhaU = password_hash($_POST['usuariosenha'], PASSWORD_DEFAULT);
        $cpf = $_POST['usuariocpf'];
        $nome = $_POST['usuarionome'];
        $nascimento = $_POST['usuarionascimento'];
        $genero = $_POST['usuariogenero'];
        $emailU = $_POST['usuarioemail'];
        $telefone = $_POST['usuariotelefone'];
        $uf = $_POST['usuarioestado'];
        $cidade = $_POST['usuariocidade'];
        $bairro = $_POST['usuariobairro'];
        $cep = $_POST['usuariocep'];
        $rua = $_POST['usuariorua'];
        $numero = $_POST['usuarionumero'];
        $termosecondicoes = $_POST['termosecondicoes'];
        $img_perfil = "mascote.jpg";
        
       

        //------------------------------------Verifica se há um email já cadastrado----------------------------------------------
        $sqlVCD="SELECT EMAIL FROM usuarios where EMAIL= '$emailU'";

        if($rvc=mysqli_query($mysqli,$sqlVCD))
        {
            $qtdLinhas = mysqli_num_rows($rvc);

            if($qtdLinhas>0)
            {
               
              
             echo "
             <div class='alert alert-danger' role='alert'>
                Este Email já está cadastrado!
                </div>";

            }
            else
            {
                $hash =sprintf('%07X', mt_rand(0,0xFFFFFFF));
                
        //------------------------------------Inserindo ao banco de dados:-------------------------------------------------------//

                $result = mysqli_query($mysqli, "INSERT INTO usuarios (NOME_DE_USUARIO, SENHA, CPF, NOME_COMPLETO, DATA_DE_NASCIMENTO, GENÊRO, EMAIL, TELEFONE, UF, CIDADE, BAIRRO, CEP, RUA, NUM_CASA, Termos_Condições, HASH, IMG_PERFIL) 
                VALUES ('$nomelogin','$senhaU','$cpf','$nome','$nascimento','$genero','$emailU','$telefone','$uf','$cidade','$bairro','$cep','$rua','$numero','$termosecondicoes','$hash','$img_perfil')");


                require 'envia_email.php';
            
                header('Location: /cepet/usuario/login.php');
            }
        }       
    }
    ?>