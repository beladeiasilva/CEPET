<?php

include_once('conexao.php');

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $nomelogin = $_POST['usuariologin'];
    $cpf = $_POST['usuariocpf'];
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

        if($arquivoF['error'])
            die("Falha ao enviar arquivo");

        if($arquivoF['size'] > 10485760)
            die("Arquivo muito grande! Max: 10MB");

        $pasta= "imagens_perfil/";
        $nomeDoArquivo = $arquivoF['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));
        

        if ($extensao != "jpeg" && $extensao != "png" && $extensao != "jpg")
            die("Tipo de arquivo inválido");

        $path = $pasta . $novoNomeDoArquivo .".". $extensao;
        $deu_certo = move_uploaded_file($arquivoF["tmp_name"], $path);
    }
    
    
    $result = mysqli_query($mysqli, "UPDATE usuarios SET NOME_DE_USUARIO='$nomelogin', CPF='$cpf', NOME_COMPLETO='$nome', DATA_DE_NASCIMENTO='$nascimento', GENÊRO='$genero', EMAIL='$email', TELEFONE='$telefone', UF='$uf', CIDADE='$cidade', BAIRRO='$bairro', RUA='$rua', NUM_CASA='$numero', CEP='$cep', IMG_PERFIL='$novoNomeDoArquivo.$extensao' WHERE ID_USUARIO ='$id'");

    header('Location: perfilusuario.php');

   
    }
   
    
  





        //------------------------------------Verifica se há um email já cadastrado----------------------------------------------

   