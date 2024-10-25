<?php
if(isset($_POST['enviar']))
{       

        include_once("config/conexao.php");

        

        $cnpj = $_POST['ongcnpj'];
        $nome = $_POST['ongnome'];
        $senha = password_hash($_POST['ongsenha'], PASSWORD_DEFAULT);
        $email = $_POST['ongemail'];
        $telefone = $_POST['ongtelefone'];
        $cep = $_POST['ongcep'];
        $estado = $_POST['ongestado'];
        $cidade = $_POST['ongcidade'];
        $bairro = $_POST['ongbairro'];
        $rua = $_POST['ongrua'];
        $numero = $_POST['ongnumero'];
        $site = $_POST['ongsite'];
        $redes = $_POST['ongredessociais'];


        $sqlVCD="SELECT CNPJ FROM ongs where CNPJ= '$cnpj'";

        if($rvc=mysqli_query($mysqli,$sqlVCD))
        {
            $qtdLinhas = mysqli_num_rows($rvc);

            if($qtdLinhas>0)
            {
               
            

            }
            else
            {
                header('Location: /cepet/usuario/login.php');
            }
        }
//--------------------------------------------SINTEGRA----------------------------------//
if(isset($_FILES['sintegra']))
{
 $arquivoS = $_FILES ['sintegra'];

 if($arquivoS['error'])
    die("Falha ao enviar arquivo");

 if($arquivoS['size'] > 2097152)
    die("Arquivo muito grande! Max: 2MB");

    $pasta= "documentos_cadastrados/sintegra/";
    $nomeDoArquivo = $arquivoS['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));
    

    if ($extensao != "pdf")
        die("Tipo de arquivo inválido");

    $path1 = $novoNomeDoArquivo . "." .  $extensao;
    $deu_certo = move_uploaded_file($arquivoS["tmp_name"],$pasta . $path1);

       
}

    //----------------------------CCS----------------------------------->
 if(isset($_FILES['ccs']))
 {
  $arquivoC = $_FILES ['ccs'];
 
  if($arquivoC['error'])
     die("Falha ao enviar arquivo");
 
  if($arquivoC['size'] > 2097152)
     die("Arquivo muito grande! Max: 2MB");
 
     $pasta= "documentos_cadastrados/ccs/";
     $nomeDoArquivo = $arquivoC['name'];
     $novoNomeDoArquivo = uniqid();
     $extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));
    
     if ($extensao != "pdf")
         die("Tipo de arquivo inválido");

     $path2 = $novoNomeDoArquivo . "." .  $extensao;
    
     $deu_certo = move_uploaded_file($arquivoC["tmp_name"],$pasta . $path2);

 }
       //----------------------------BACEN----------------------------------->
if(isset($_FILES['bacen']))
{
 $arquivoB = $_FILES ['bacen'];

 if($arquivoB['error'])
    die("Falha ao enviar arquivo");

 if($arquivoB['size'] > 2097152)
    die("Arquivo muito grande! Max: 2MB");

    $pasta= "documentos_cadastrados/bacen/";
    $nomeDoArquivo = $arquivoB['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));
   
    if ($extensao != "pdf")
        die("Tipo de arquivo inválido");
    
        $path3 = $novoNomeDoArquivo . "." .  $extensao;
        $deu_certo = move_uploaded_file($arquivoB["tmp_name"], $pasta . $path3);
 
//-----------------------------------------------INSERINDO AO BANCO DE DADOS-------------------------------------------//

        $result = mysqli_query($mysqli, "INSERT INTO ongs(CNPJ, NOME, SENHA, EMAIL, TELEFONE, CEP, ESTADO, ENDERECO, REDES_SOCIAIS, SITE, DOCUMENTOS_ONGS) 
        VALUES ('$cnpj','$nome','$senha','$email','$telefone','$cep','$estado','$cidade / $bairro / $rua / $numero','$redes','$site', '$path1 / $path2 / $path3')");

       header("Location: /cepet/usuario/login.php");

         
    }
}