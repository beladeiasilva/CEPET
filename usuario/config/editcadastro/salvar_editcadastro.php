<?php

include_once("C:/xampp/htdocs/cepet/usuario/config/conexao.php");

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $nomelogin = $_POST['usuariologin'];
    $nome = $_POST['usuarionome'];
    $nascimento = $_POST['usuarionascimento'];
    $genero = $_POST['usuariogenero'];
    $email= $_POST['usuarioemail'];
    $telefone = $_POST['usuariotelefone'];
    $uf = $_POST['usuarioestado'];
    $cidade = $_POST['usuariocidade'];
    $bairro = $_POST['usuariobairro'];
    $cep = $_POST['usuariocep'];
    $rua = $_POST['usuariorua'];
    $numero = $_POST['usuarionumero'];
  

    //---------------------------------------------------ENVIA FOTO DE PERFIL-------------------------------------------------//
    if(isset($_FILES['foto'])){

        $arquivoF = $_FILES ['foto'];

    
        if($arquivoF['size'] > 10485760)
            die("Arquivo muito grande! Max: 10MB");

        $pasta= "C:/xampp/htdocs/cepet/usuario/img/imagens_perfil/";
        $nomeDoArquivo = $arquivoF['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));
       
        
        

        if ($extensao != "jpeg" && $extensao != "png" && $extensao != "jpg" && $extensao !="")
            die("Tipo de arquivo inválido");

            if($extensao ==""){
            $sql="SELECT IMG_PERFIL FROM USUARIOS WHERE ID_USUARIO = '$id'";
            $result=mysqli_query($mysqli, $sql);
            $img_atual=mysqli_fetch_assoc($result);
            $img_atual['IMG_PERFIL'];

            
            
            $result= mysqli_query($mysqli, "UPDATE usuarios SET IMG_PERFIL='$img_atual[IMG_PERFIL]' WHERE ID_USUARIO ='$id'");
            }
            else{
                
            include('deletar_imagens.php');
            $result= mysqli_query($mysqli, "UPDATE usuarios SET IMG_PERFIL='$novoNomeDoArquivo.$extensao' WHERE ID_USUARIO ='$id'");
            }

        $path = $pasta . $novoNomeDoArquivo .".". $extensao;
        $deu_certo = move_uploaded_file($arquivoF["tmp_name"], $path);


         //---------------------------------------------VERIFICA EMAIL--------------------------------------------------------------//   
        $sql="SELECT * FROM usuarios WHERE EMAIL = '$email'";
        if($result=mysqli_query($mysqli, $sql))
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
                    <a href='/cepet/usuario/perfilusuario.php'><button class='btn' type='btn'>Retornar</button></a>");

            }else{
    
    
    
    $inserindo = mysqli_query($mysqli, "UPDATE usuarios SET NOME_DE_USUARIO='$nomelogin', NOME_COMPLETO='$nome', DATA_DE_NASCIMENTO='$nascimento', GENÊRO='$genero', EMAIL='$email', TELEFONE='$telefone', UF='$uf', CIDADE='$cidade', BAIRRO='$bairro', RUA='$rua', NUM_CASA='$numero', CEP='$cep' WHERE ID_USUARIO ='$id'");
            }
        }

    header('Location: /cepet/usuario/perfilusuario.php');

   
    }
}
   ?>
    
  



