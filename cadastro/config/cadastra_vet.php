<?php 

    if(isset($_POST["cadastrar"])){

        include("conexao.php");

        $nome= $_POST["nome"];
        $sobrenome= $_POST["sobrenome"];
        $cpf= $_POST["cpf"];
        $data_nasc= $_POST["data_nasc"];
        $telefone= $_POST["telefone"];
        $email= $_POST["email"];
        $senha=password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $cep= $_POST["cep"];
        $uf= $_POST["estado"];
        $cidade= $_POST["cidade"];
        $rua= $_POST["rua"];
        $bairro= $_POST["bairro"];
        $numero= $_POST["numero"];
        $crmv= $_POST["crmv"];
        $universidade= $_POST["universidade"];
        $foto= $_FILES["foto"];

        

         //------------------------------------Verifica se há um email já cadastrado----------------------------------------------
         $sqlVCD="SELECT * FROM veterinarios where EMAIL= '$email'";

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
                     <a href='/cepet/cadastro/cadastrovet.php'><button class='btn' type='btn'>Retornar</button></a>");
             
 
             }
             
         $sqlVCD="SELECT * FROM veterinarios where CPF= '$cpf'";
 
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
                     <a href='/cepet/cadastro/cadastrovet.php'><button class='btn' type='btn'>Retornar</button></a>");


                    
                                    }else{

                                        if(isset($_FILES['foto']))
                                        {
                                        $arquivoF = $_FILES ['foto'];
                                
                                        if($arquivoF['error'])
                                            die("Falha ao enviar arquivo");
                                
                                        if($arquivoF['size'] > 10485760)
                                            die("Arquivo muito grande! Max: 10MB");
                                
                                            $pasta= "C:/xampp/htdocs/cepet/veterinario/img/img_perfil/";
                                            $nomeDoArquivo = $arquivoF['name'];
                                            $novoNomeDoArquivo = uniqid();
                                            $extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));
                                            
                                
                                            if ($extensao != "jpeg" && $extensao != "png" && $extensao != "jpg")
                                                die("Tipo de arquivo inválido");
                                
                                            $path = $pasta . $novoNomeDoArquivo .".". $extensao;
                                            $deu_certo = move_uploaded_file($arquivoF["tmp_name"], $path);

                
                $result = mysqli_query($mysqli, "INSERT INTO veterinarios (NOME_COMPLETO, SENHA, CPF, DATA_DE_NASCIMENTO, EMAIL, TELEFONE, UF, CIDADE, CEP, RUA, NUM_CASA, CRMV, UNIVERSIDADE, IMG_PERFIL) 
                VALUES ('$nome $sobrenome','$senha','$cpf','$data_nasc','$email','$telefone','$uf','$cidade','$cep','$rua','$numero','$crmv','$universidade','$novoNomeDoArquivo.$extensao')");

                   //require 'enviaemail.php';                     

                header("Location: /cepet/ambos/login.php");
            }
         }
        }
    }
}
?>