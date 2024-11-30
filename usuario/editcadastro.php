<?php

// Verifica se o usuário está logado
include("config/logado.php");


    if(!empty($_GET['ID_USUARIO'])){
   
        
    include_once("config/conexao.php");        

    $idU = $_GET['ID_USUARIO'];
    $sql = "SELECT * FROM usuarios WHERE ID_USUARIO='$idU'";
    $result = mysqli_query($mysqli, $sql);   

    if($result->num_rows >0){

    while($id_usuario = mysqli_fetch_assoc($result)){

    $nomelogin = $id_usuario['NOME_DE_USUARIO'];
    $nome = $id_usuario['NOME_COMPLETO'];
    $nascimento = $id_usuario['DATA_DE_NASCIMENTO'];
    $genero = $id_usuario['GENÊRO'];
    $email = $id_usuario['EMAIL'];
    $telefone = $id_usuario['TELEFONE'];
    $uf = $id_usuario['UF'];
    $cidade = $id_usuario['CIDADE'];
    $bairro = $id_usuario['BAIRRO'];
    $cep = $id_usuario['CEP'];
    $rua = $id_usuario['RUA'];
    $numero = $id_usuario['NUM_CASA'];
    $img_perfil = $id_usuario['IMG_PERFIL'];       
    }          
   
}           
    else{
    header("location: /cepet/ambos/login.php");
    }                    
}

?>
<!-----------------------------------------------------SCRIPT DO CEP (INICIO)------------------------------------------->
<script>

function limpa_formulário_cep() {
    // Limpa valores do formulário de cep.
    document.getElementById('usuariorua').value = ("");
    document.getElementById('usuariobairro').value = ("");
    document.getElementById('usuariocidade').value = ("");
    document.getElementById('usuarioestado').value = ("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        // Atualiza os campos com os valores.
        document.getElementById('usuariorua').value = (conteudo.logradouro);
        document.getElementById('usuariobairro').value = (conteudo.bairro);
        document.getElementById('usuariocidade').value = (conteudo.localidade);
        document.getElementById('usuarioestado').value = (conteudo.uf);
    
    } else {
        // CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}

function pesquisacep(valor) {
    // Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    // Verifica se campo cep possui valor informado.
    if (cep != ""){

        // Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        // Valida o formato do CEP.
        if (validacep.test(cep)) {

            // Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('usuariorua').value = "...";
            document.getElementById('usuariobairro').value = "...";
            document.getElementById('usuariocidade').value = "...";
            document.getElementById('usuarioestado').value = "...";
        

            // Cria um elemento javascript.
            var script = document.createElement('script');

            // Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

            // Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);
        }
         else {
            // cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
            }
        }

         else {
        // cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
}


</script>
<!-----------------------------------------------SCRIPT DO CEP (FIM)------------------------------------------------------------------->

<!-----------------------------------------------SCRIPT DO CPF (INICIO)---------------------------------------------------------------->
<script>
                function mascara(i){
                        
                 var v = i.value;
                        
                 if(isNaN(v[v.length-1])){ 
                     i.value = v.substring(0, v.length-1);
                            return;
                 }
                    
                i.setAttribute("maxlength", "14");
                 if (v.length == 3 || v.length == 7) i.value += ".";
                 if (v.length == 11) i.value += "-";
            }
</script>    

<!-----------------------------------------------SCRIPT DO CPF (FIM)---------------------------------------------------------------->


<!--------------------*HTML DO FORMULÁRIO*----------------------------------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Conta</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" href="/cepet/cadastro/css/estilocadastro.css"> 
    <link rel="stylesheet" type="text/css" href="css/padrao.css">
    <link rel="stylesheet" type="text/css" href="css/estilo_editar_perfil.css"> 
    <link rel="icon" href="img/logos/icon.ico">  
     <script src="jscript/main.js" defer> </script>
</head>

    <body>
    <?php include 'padrao/header.php'; ?>
  





<!--Método "POST" Essencial para a conexão dos dados.----------------------------------->    
<form action="config/editcadastro/salvar_editcadastro.php" method="POST" enctype="multipart/form-data">
<!-------------------------------------------------------------------------------------->    


    <h1>Alteração de cadastro</h1>

 <!-- Não apagar "name" nos campos de input ou select. PHP precisa dos names para puxar as informações para as variaveis-->
 <main>
    <div class="profile-container">
        <div class="profile-info">
            <div class="profile-picture">

        <!--------------------------------------------IMAGEM EM DESTAQUE DO USUARIO-------------------------------------------------->        
             <?php
             include("config/conexao.php");                        
            $sql2="SELECT IMG_PERFIL FROM usuarios WHERE ID_USUARIO ='$id'";
            $result2= mysqli_query($mysqli, $sql2);
            $img_perfil = mysqli_fetch_assoc($result2);
            echo"<img src='img/imagens_perfil/$img_perfil[IMG_PERFIL]';";
            ?>                                 
         <!--------------------------------------------------------------------------------------------------------------------------->        
    
            </div>
        </div>
    </div>

     <input  type="file" name="foto" value="<?php echo $img_perfil; ?>">
    
    </main>
    
    <!-- Informações de Login -->
        <p>Nome de Usuário</p>
        <input type="text" name="usuariologin" id="usuariologin" maxlength="20" placeholder="Digite um nome de usuário" value="<?php echo $nomelogin; ?>" required>
            
        <!-- Informações Pessoais -->
        <p>Nome Completo</p>
        <input type="text" name="usuarionome" id="usuarionome" maxlength="100"  placeholder="Digite seu nome completo" value="<?php echo $nome; ?>" required>

        <p>Gênero</p>
        <select name="usuariogenero" id="usuariogenero" value="<?php echo $genero; ?>" required>
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

       
        
        
        <p>Data de Nascimento</p>
        <input type="date" name="usuarionascimento" id="usuarionascimento" value="<?php echo $nascimento; ?>" required>
    
        <p>E-mail</p>
        <input type="email" name="usuarioemail" id="usuarioemail" maxlength="30" placeholder="Digite seu e-mail" value="<?php echo $email; ?>" required>
    
        <p>Telefone</p>
        <input type="tel" onkeyup="formatartelefone(this)" name="usuariotelefone" maxlength="11" id="usuariotelefone" placeholder="(XX) XXXX-XXXX" value="<?php echo $telefone; ?>"required>

        <!-----------------------------------------------SCRIPT DO TELEFONE "MASCARA" (INICIO)-------------------------------------------------------->
        <script>

         function formatartelefone(input) {
        // Remove todos os caracteres não numéricos
        var telefone = input.value.replace(/\D/g, '');

        // Insere os parênteses, espaço e traço nos lugares corretos
        telefone = telefone.replace(/(\d{2})(\d{5})(\d{4})/, '($1)$2-$3');

        // Atualiza o valor do campo de entrada com o telefone formatado
        input.value = telefone;
        }
        </script>
        <!-----------------------------------------------SCRIPT DO TELEFONE "MASCARA" (FIM)------------------------------------------------------------>


    
        <!-- Informações de Endereço -->
        <p>CEP</p>
        <input type="text" name="usuariocep" id="usuariocep" onkeyup="cep(event)" maxlength="9" placeholder="Digite o CEP"value="<?php echo $cep; ?>" required onblur="pesquisacep(this.value);">
        
        <!-----------------------------------------------SCRIPT DO CEP "MASCARA" (INCIO)--------------------------------------------------------------->
        <script>

        const cep = (event) => {
        let input = event.target
         input.value = zipCodeMask(input.value)
        }

        const zipCodeMask = (value) => {
        if (!value) return ""
        value = value.replace(/\D/g,'')
        value = value.replace(/(\d{5})(\d)/,'$1-$2')
        return value
        }
        </script>
        <!-----------------------------------------------SCRIPT DO CEP "MASCARA" (FIM)---------------------------------------------------------------->

        <p>Estado</p>
        <select name="usuarioestado" id="usuarioestado" value=" <?php print_r($uf); ?>"  required>
            <option value="<?php print_r($uf); ?>">Selecione o estado</option>
            <option value="AL">Alagoas (AL)</option>
            <option value="AC">Acre (AC)</option>
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
        <input type="text" name="usuariocidade" id="usuariocidade" placeholder="Digite sua cidade" value="<?php echo $cidade; ?>" required>
    
        <p>Rua</p>
        <input type="text" name="usuariorua" id="usuariorua" placeholder="Digite sua rua"value="<?php echo $rua; ?>" required>
    
        <p>Número</p>
        <input type="number" name="usuarionumero" id="usuarionumero" placeholder="Número da residência"value="<?php echo $numero; ?>" required>
    
        <p>Bairro</p>
        <input type="text" name="usuariobairro" id="usuariobairro" placeholder="Digite seu bairro" value="<?php echo $bairro; ?>" required>

        <input type="hidden" name="id" value="<?php echo $idU ?>">
    
        <br>

        <br>
        <button type="submit" name="update" id="usuariocadastrar">Alterar</button>

        <div class='alert alert-danger' role='alert'>
             
                </div>


        <div>

    </form>
    <?php include 'padrao/footer.php'; ?>
    
</body>
</html>
