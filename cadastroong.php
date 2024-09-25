<?php


if(isset($_POST['enviar']))
{       
        //teste para verificar informações que irão para o banco de dados:

        //print_r($_POST['ongcnpj']);
        //print_r($_POST['ongnome']);
        //print_r($_POST['ongsenha']);
        //print_r($_POST['ongcartaosintegra']);
        //print_r($_POST['ongccs']);
        //print_r($_POST['ongbacen']);
        //print_r($_POST['ongemail']);
        //print_r($_POST['ongtelefone']);
        //print_r($_POST['ongcep']);
        //print_r($_POST['ongestado']);
        //print_r($_POST['ongcidade']);
        //print_r($_POST['ongbairro']);
        //print_r($_POST['ongrua']);
        //print_r($_POST['ongnumero']);
        //print_r($_POST['ongsite']);
        //print_r($_POST['ongredessociais']);
        
        //--------------------Insert das variaveis para o MYSQL---------------------//

        include_once('conexao.php');

        $cnpj = $_POST['ongcnpj'];
        $nome = $_POST['ongnome'];
        $senha = $_POST['ongsenha'];
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

        $result = mysqli_query($mysqli, "INSERT INTO ongs(CNPJ, NOME, SENHA, EMAIL, TELEFONE, CEP, ESTADO, ENDERECO, REDES_SOCIAIS, SITE) 
        VALUES ('$cnpj','$nome','$senha','$email','$telefone','$cep','$estado','$cidade / $bairro / $rua / $numero','$redes','$site')");

       header("Location: login.php");
}

 //------------------Estrutura para os Arquivos-------------// 

    include('conexao.php');

 //----------------------------Sintegra----------------------------------->
if(isset($_FILES['sintegra']))
{
 $arquivoS = $_FILES ['sintegra'];

 if($arquivoS['error'])
    die("Falha ao enviar arquivo");

 if($arquivoS['size'] > 2097152)
    die("Arquivo muito grande! Max: 2MB");

    $pasta= "uploads_arquivos_ongs/sintegra/";
    $nomeDoArquivo = $arquivoS['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));
    

    if ($extensao != "pdf")
        die("Tipo de arquivo inválido");

    $path = $pasta . $novoNomeDoArquivo . "." .  $extensao;
    $deu_certo = move_uploaded_file($arquivoS["tmp_name"], $path);

    //Testar o envio dos arquivos

    //if($deu_certo)
        //echo "<p>Arquivo enviado com sucesso! </p>";
    //else
        //echo "<p> Falha ao enviar arquivo </p>";


        //----------------------Inserindo ao Banco -----------------//
        $mysqli->query("INSERT INTO arquivos_ongs(NOME,PATH)
        VALUES('$nomeDoArquivo','$path')") or die($mysqli->error);
        //---------------------------------------------------------//
}  

//----------------------------CCS----------------------------------->
 if(isset($_FILES['ccs']))
 {
  $arquivoC = $_FILES ['ccs'];
 
  if($arquivoC['error'])
     die("Falha ao enviar arquivo");
 
  if($arquivoC['size'] > 2097152)
     die("Arquivo muito grande! Max: 2MB");
 
     $pasta= "uploads_arquivos_ongs/ccs/";
     $nomeDoArquivo = $arquivoC['name'];
     $novoNomeDoArquivo = uniqid();
     $extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));
    
     if ($extensao != "pdf")
         die("Tipo de arquivo inválido");

     $path =  $pasta . $novoNomeDoArquivo . "." .  $extensao;
     $deu_certo = move_uploaded_file($arquivoC["tmp_name"], $path);
 
   //Testar o envio dos arquivos
    
    //if($deu_certo)
        //echo "<p>Arquivo enviado com sucesso! </p>";
    //else
        //echo "<p> Falha ao enviar arquivo </p>";

        
        
        //----------------------Inserindo ao Banco -----------------//
        $mysqli->query("INSERT INTO arquivos_ongs(NOME,PATH)
        VALUES('$nomeDoArquivo', '$path')") or die($mysqli->error);
         //---------------------------------------------------------//
    }

     //----------------------------BACEN----------------------------------->
if(isset($_FILES['bacen']))
{
 $arquivoB = $_FILES ['bacen'];

 if($arquivoB['error'])
    die("Falha ao enviar arquivo");

 if($arquivoB['size'] > 2097152)
    die("Arquivo muito grande! Max: 2MB");

    $pasta= "uploads_arquivos_ongs/bacen/";
    $nomeDoArquivo = $arquivoB['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));
   
    if ($extensao != "pdf")
        die("Tipo de arquivo inválido");
    
        $path =  $pasta . $novoNomeDoArquivo . "." .  $extensao;
        $deu_certo = move_uploaded_file($arquivoB["tmp_name"], $path);

   //Testar o envio dos arquivos
    
    //if($deu_certo)
        //echo "<p>Arquivo enviado com sucesso! </p>";
    //else
        //echo "<p> Falha ao enviar arquivo </p>";

        
        //----------------------Inserindo ao Banco ----------------//
        $mysqli->query("INSERT INTO arquivos_ongs(NOME,PATH)
        VALUES('$nomeDoArquivo', '$path')") or die($mysqli->error);
        //---------------------------------------------------------//
}



?>
<!--fazer php-->


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro ONG</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" href="css/estilo.css"> 
    <link rel="icon" href="img/logos/icon.ico">  
    <script src="jscript/main.js" defer></script>
</head>
<body>


    <!--Método "POST" Essencial para a conexão dos dados.----------------------------------->  
    <form action="cadastroong.php" method="POST" enctype="multipart/form-data">
    <!-------------------------------------------------------------------------------------->  


    <header>
        <img src="img/logos/cepet-preto.png" width="10%" alt="Logo Cepet">

        <a class="cadastro" href="CadastroUsuario.html">
            Faça login ou cadastre-se 
            <img src="img/icones variados/perfil.png">
        </a>

        <!Troca para o nome dos outros htmls para ir para outra página. href="Index.html">
        <ul class="barra-navegacao">
            <li><a href="#Adocao">Adoção</a></li>
            <li><a href="#ONGs">ONGs</a></li>
            <li><a href="#Doações">Doação</a></li>
            <li><a href="#Noticias">Noticias e dicas</a></li>
        </ul>
    </header>


    <!-- Não apagar "name" nos campos de input ou select. PHP precisa dos names para puxar as informações para as variaveis-->
<h1>Cadastre sua ONG!</h1>

<p>CNPJ</p>
<input type="number" name="ongcnpj" id="ongcnpj" placeholder="Digite o CNPJ">

<p>Nome</p>
<input type="text" name="ongnome" id="ongnome" placeholder="Nome da ONG">

<p>Senha</p>
<input type="password" name="ongsenha" id="ongsenha" placeholder="Crie uma Senha">

<p>Cartão Sintegra</p>
<input type="file" name="sintegra" id="ongcartaosintegra">

<p>CCS</p>
<input type="file" name="ccs" id="ongccs">

<p>Bacen</p>
<input type="file" name="bacen" id="ongbacen">

<p>E-mail</p>
<input type="email" name="ongemail" id="ongemail" placeholder="Digite o e-mail da ONG">

<p>Telefone</p>
<input type="tel" name="ongtelefone" id="ongtelefone" placeholder="(XX) XXXXX-XXXX">

<p>CEP</p>
<input type="number" name="ongcep" id="ongcep" placeholder="Digite o CEP">

<p>Estado</p>
<select name="ongestado" id="ongestado">
    <option value="">Selecione o estado</option>
    <option value="AC">Acre (AC)</option>
    <option value="AL">Alagoas (AL)</option>
    <option value="AP">Amapá (AP)</option>
    <option value="AM">Amazonas (AM)</option>
    <option value="BA">Bahia (BA)</option>
    <option value="CE">Ceará (CE)</option>
    <option value="DF">Distrito Federal (DF)</option>
    <option value="ES">Espírito Santo (ES)</option>
    <option value="GO">Goiás (GO)</option>
    <option value="MA">Maranhão (MA)</option>
    <option value="MT">Mato Grosso (MT)</option>
    <option value="MS">Mato Grosso do Sul (MS)</option>
    <option value="MG">Minas Gerais (MG)</option>
    <option value="PA">Pará (PA)</option>
    <option value="PB">Paraíba (PB)</option>
    <option value="PR">Paraná (PR)</option>
    <option value="PE">Pernambuco (PE)</option>
    <option value="PI">Piauí (PI)</option>
    <option value="RJ">Rio de Janeiro (RJ)</option>
    <option value="RN">Rio Grande do Norte (RN)</option>
    <option value="RS">Rio Grande do Sul (RS)</option>
    <option value="RO">Rondônia (RO)</option>
    <option value="RR">Roraima (RR)</option>
    <option value="SC">Santa Catarina (SC)</option>
    <option value="SP">São Paulo (SP)</option>
    <option value="SE">Sergipe (SE)</option>
    <option value="TO">Tocantins (TO)</option>
</select>

<p>Cidade</p>
<input type="text" name="ongcidade" id="ongcidade" placeholder="Digite a cidade">

<p>Bairro</p>
<input type="text" name="ongbairro" id="ongbairro" placeholder="Digite o bairro">

<p>Rua</p>
<input type="text" name="ongrua" id="ongrua" placeholder="Digite a rua">

<p>Número</p>
<input type="number" name="ongnumero" id="ongnumero" placeholder="Número do imóvel">

<!-- Campo opcional -->
<p>Site</p>
<input type="url" name="ongsite" id="ongsite" placeholder="URL do site da ONG (opcional)">

<p>Redes Sociais</p>
<input type="url" name="ongredessociais" id="ongredessociais" placeholder="URL das redes sociais da ONG (opcional)">


<button type="submit" name="enviar" id="enviarcadastroong">Enviar</button>

</body>
</html>