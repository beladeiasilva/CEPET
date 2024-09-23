<?php

    if(isset($_POST['cadastrar']))
    {
        //teste para verificar informações que irão para o banco de dados:

        //print_r($_POST['usuariologin']);
        //print_r($_POST['usuariosenha']);
        //print_r($_POST['usuarionome']);
        //print_r($_POST['usuariogenero']);
        //print_r($_POST['usuariocpf']);
        //print_r($_POST['usuarionascimento']);
        //print_r($_POST['usuarioemail']);
        //print_r($_POST['usuariotelefone']);
        //print_r($_POST['usuariocep']);
        //print_r($_POST['usuarioestado']);
        //print_r($_POST['usuariocidade']);
        //print_r($_POST['usuariorua']);
        //print_r($_POST['usuarionumero']);
        //print_r($_POST['usuariobairro']);
        //print_r($_POST['termosecondicoes']);

        include_once('conexao.php');

        $nomelogin = $_POST['usuariologin'];
        $senha = $_POST['usuariosenha'];
        $cpf = $_POST['usuariocpf'];
        $nome = $_POST['usuarionome'];
        $nascimento = $_POST['usuarionascimento'];
        $genero = $_POST['usuariogenero'];
        $email = $_POST['usuarioemail'];
        $telefone = $_POST['usuariotelefone'];
        $estado = $_POST['usuarioestado'];
        $cidade = $_POST['usuariocidade'];
        $bairro = $_POST['usuariobairro'];
        $cep = $_POST['usuariocep'];
        $rua = $_POST['usuariorua'];
        $numero = $_POST['usuarionumero'];
        $termosecondicoes = $_POST['termosecondicoes'];
        


        $result = mysqli_query($mysqli, "INSERT INTO usuarios (NOME_DE_USUARIO, SENHA, CPF, NOME_COMPLETO, DATA_DE_NASCIMENTO, GENÊRO, EMAIL, TELEFONE, ESTADO, CIDADE, BAIRRO, CEP, RUA, NÚMERO, Termos_Condições) 
        VALUES ('$nomelogin','$senha','$cpf','$nome','$nascimento','$genero','$email','$telefone','$estado','$cidade','$bairro','$cep','$rua','$numero','$termosecondicoes')");
        
        header("Location: login.php");
    }

?>

<!-----------------------------------------------HTML DO FORMULÁRIO--------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" href="css/estilo.css"> 
    <link rel="icon" href="img/logos/icon.ico">  
    <script src="jscript/main.js" defer></script>
    
</head>
<body>


<!--Método "POST" Essencial para a conexão dos dados.----------------------------------->    
<form action="cadastrousuario.php" method="POST">
<!-------------------------------------------------------------------------------------->    


    <h1>Cadastro de Usuário</h1>


    <!-- Informações de Login -->
        <p>Nome de Usuário</p>
        <input type="text" name="usuariologin" id="usuariologin" placeholder="Digite um nome de usuário" required>
            
        <p>Senha</p>
        <input type="password" name="usuariosenha" id="usuariosenha" placeholder="Digite uma senha" required>
        <!-- Informações Pessoais -->
        <p>Nome Completo</p>
        <input type="text" name="usuarionome" id="usuarionome" placeholder="Digite seu nome completo" required>

        <p>Gênero</p>
        <select name="usuariogenero" id="usuariogenero" required>
            <option value="">Selecione o gênero</option>
            <option value="feminino">Feminino</option>
            <option value="masculino">Masculino</option>
            <option value="nao-binario">Não-Binário</option>
            <option value="agenero">Agênero</option>
            <option value="generofluido">Gênero Fluido</option>
            <option value="transgenero">Transgênero</option>
            <option value="genderqueer">Genderqueer</option>
            <option value="prefironaoinformar">Prefiro não informar</option>
        </select>

        
<!---------------------INSERINDO O CAMPO CPF 20/09/24-------------------------------------------------->
        <p>CPF</p>
        <input type="text" name="usuariocpf" id="usuariocpf" placeholder="Digite seu CPF" required>
<!-------------------------------------------------------------------------------------------->       
        
        <p>Data de Nascimento</p>
        <input type="date" name="usuarionascimento" id="usuarionascimento" required>
    
        <p>E-mail</p>
        <input type="email" name="usuarioemail" id="usuarioemail" placeholder="Digite seu e-mail" required>
    
        <p>Telefone</p>
        <input type="tel" name="usuariotelefone" id="usuariotelefone" placeholder="(XX) XXXX-XXXX" required>
    
        <!-- Informações de Endereço -->
        <p>CEP</p>
        <input type="number" name="usuariocep" id="usuariocep" placeholder="Digite o CEP" required>
    
        <p>Estado</p>
        <select name="usuarioestado" id="usuarioestado" required>
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
        <input type="text" name="usuariocidade" id="usuariocidade" placeholder="Digite sua cidade" required>
    
        <p>Rua</p>
        <input type="text" name="usuariorua" id="usuariorua" placeholder="Digite sua rua" required>
    
        <p>Número</p>
        <input type="number" name="usuarionumero" id="usuarionumero" placeholder="Número da residência" required>
    
        <p>Bairro</p>
        <input type="text" name="usuariobairro" id="usuariobairro" placeholder="Digite seu bairro" required>
    
        <p>
        <input type="checkbox" name="termosecondicoes" id="termosecondicoes">
        Aceito os <a>termos e condições</a>
        </p>
        <button type="submit" name="cadastrar" id="usuariocadastrar">Cadastrar</button>
    
    </form>
    
    
</body>
</html>
