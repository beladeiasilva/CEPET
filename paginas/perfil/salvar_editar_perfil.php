<?php

include_once('conexao.php');

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
  
    if(isset($_FILES['foto'])){

        $arquivoF = $_FILES ['foto'];

    
        if($arquivoF['size'] > 10485760)
            die("Arquivo muito grande! Max: 10MB");

        $pasta= "imagens_perfil/";
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
                
            include('deletar_imagens');
            $result= mysqli_query($mysqli, "UPDATE usuarios SET IMG_PERFIL='$novoNomeDoArquivo.$extensao' WHERE ID_USUARIO ='$id'");


            }


        $path = $pasta . $novoNomeDoArquivo .".". $extensao;
        $deu_certo = move_uploaded_file($arquivoF["tmp_name"], $path);
    
    
    
    $inserindo = mysqli_query($mysqli, "UPDATE usuarios SET NOME_DE_USUARIO='$nomelogin', NOME_COMPLETO='$nome', DATA_DE_NASCIMENTO='$nascimento', GENÊRO='$genero', EMAIL='$email', TELEFONE='$telefone', UF='$uf', CIDADE='$cidade', BAIRRO='$bairro', RUA='$rua', NUM_CASA='$numero', CEP='$cep' WHERE ID_USUARIO ='$id'");

  

    header('Location: perfilusuario.php');

   
    }
}
   ?>
    
  



