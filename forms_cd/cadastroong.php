<?php
session_start();



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
        
        //---------------------------------------Insert das variaveis para o MYSQL-----------------------------------------//

        include_once('conexao.php');

        

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
                header('Location: /conexao/paginas/login.php');
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

       header("Location: /conexao/paginas/login.php");

         
    }
}


?>
<!-----------------------------------------------------SCRIPT DO CEP (INICIO)------------------------------------------->
<script>

function limpa_formulário_cep() {
    // Limpa valores do formulário de cep.
    document.getElementById('ongrua').value = ("");
    document.getElementById('ongbairro').value = ("");
    document.getElementById('ongcidade').value = ("");
    document.getElementById('ongestado').value = ("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        // Atualiza os campos com os valores.
        document.getElementById('ongrua').value = (conteudo.logradouro);
        document.getElementById('ongbairro').value = (conteudo.bairro);
        document.getElementById('ongcidade').value = (conteudo.localidade);
        document.getElementById('ongestado').value = (conteudo.uf);
    
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
            document.getElementById('ongrua').value = "...";
            document.getElementById('ongbairro').value = "...";
            document.getElementById('ongcidade').value = "...";
            document.getElementById('ongestado').value = "...";
        

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


<!-----------------------------------------------HTML DO FORMULÁRIO--------------------------------------------------------------------->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Cadastro ONG</title>
    <link rel="stylesheet" href="estilocadastro.css"> 
    <link rel="stylesheet" type="text/css" href="/conexao/paginas/css/padrao.css">
    <link rel="icon" href="img/logos/icon.ico">  
     <script src="jscript/main.js" defer> </script>
</head>

    <body>
    <header>
        <div class="logoimg">
            <img src="img/logos/cepet-preto.png" width="20%" alt="Logo Cepet">
        </div>
        <div class="headerlogin">
            <a href="login.php">
                Faça o login </a>
                <p> ou </p>
            <a href="/conexao/forms_cd/cadastrousuario.php">
                Cadastre-se!</a>
        </div>
        <img class="pessoa" src="img/icones variados/perfil.png">
    </header>

    <nav>
    <ul class="barra-navegacao">
        <li><a href="/conexao/paginas/adocao.php">Adoção</a></li>
        <li><a href="/conexao/paginas/ONGs.php">ONGs</a></li>
        <li><a href="/conexao/paginas/doacao.php">Doação</a></li>
        <li><a href="/conexao/paginas/Noticias.php">Notícias e dicas</a></li>
    </ul>
    </nav>
<!--Método "POST" Essencial para a conexão dos dados.----------------------------------->  
        <form action="cadastroong.php" method="POST" enctype="multipart/form-data">
    <!-- Não apagar "name" nos campos de input ou select. PHP precisa dos names para puxar as informações para as variaveis-->
        <h1>Cadastre sua ONG!</h1>

        <p>CNPJ</p>
        <input type="text" name="ongcnpj" class="form-control rounded-form"  id="ongcnpj" placeholder="Digite o CNPJ" maxlength="18"/>


<!-----------------------------------------------SCRIPT DO CNPJ (INICIO)------------------------------------------------------------------->

<script>
document.getElementById('ongcnpj').addEventListener('input', function (e) {
      var x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,3})(\d{0,3})(\d{0,4})(\d{0,2})/);
      e.target.value = !x[2] ? x[1] : x[1] + '.' + x[2] + '.' + x[3] + '/' + x[4] + (x[5] ? '-' + x[5] : '');
    });
</script>

<!-----------------------------------------------SCRIPT DO CNPJ (FIM)------------------------------------------------------------------->

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
        <input type="tel" onkeyup="formatartelefone(this)" maxlength="11" name="ongtelefone" id="ongtelefone" placeholder="(XX) XXXXX-XXXX">
<!-----------------------------------------------SCRIPT DO TELEFONE (INICIO)------------------------------------------------------------------->
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
<!-----------------------------------------------SCRIPT DO TELEFONE (FIM)------------------------------------------------------------------->





        <label>
        <p>CEP</p> 
        <input name="ongcep" type="text" onkeyup="cep(event)" id="ongcep" placeholder="Digite o CEP" value="" size="10" maxlength="9"
                            onblur="pesquisacep(this.value);" >
        </label>

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

        <label>
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
        </label>

        <label>
        <p>Cidade</p>
        <input type="text" name="ongcidade" id="ongcidade" placeholder="Digite a cidade" size="40">
        </label>

        <label>
        <p>Bairro</p>
        <input type="text" name="ongbairro" id="ongbairro" placeholder="Digite o bairro" size="40">
        </label>

        <label>
        <p>Rua</p>
        <input type="text" name="ongrua" id="ongrua" placeholder="Digite a rua " size="60" >
        </label>

        <label>
        <p>Número</p>
        <input type="number" name="ongnumero" id="ongnumero" placeholder="Número do imóvel">
        </label>

        <!-- Campo opcional -->
        <p>Site</p>
        <input type="url" name="ongsite" id="ongsite" placeholder="URL do site da ONG (opcional)">

        <p>Redes Sociais</p>
        <input type="url" name="ongredessociais" id="ongredessociais" placeholder="URL das redes sociais da ONG (opcional)">
        <br>
        <p class="termos1"><input class="termos2" type="radio" required>Aceito os Termos e Condições</p>
        <br>
        
        <button type="submit" name="enviar" id="enviarcadastroong">Enviar</button>
        
        
    </form>
    

    <footer>
        <div class="footer-content">
            <div class="faq-section">
                <h3>Dúvidas ?</h3>
                <ul>
                    <li>Como funciona a adoção?</li>
                    <li>Como doar?</li>
                    <li>Como cadastrar minha ong?</li>
                </ul>
                <br>
                <h3>Acompanhe a Cepet nas redes</h3>
                <div class="social-links">
                    <a href="#"><img src="/conexao/paginas/img/redes sociais/instagram.png" alt="Instagram"></a>
                    <a href="#"><img src="/conexao/paginas/img/redes sociais/facebook.png" alt="Facebook"></a>
                    <a href="#"><img src="/conexao/paginas/img/redes sociais/linkedin.png" alt="LinkedIn"></a>
                    <a href="#"><img src="/conexao/paginas/img/redes sociais/twitter.png" alt="Twitter"></a>
                </div>
            </div>
            <div class="suggestion-section">
                <h3>Sugestões</h3>
                <p>Nos ajude a melhorar deixando sua sugestão:</p>
                <textarea placeholder="Digite sua sugestão de melhoria :"></textarea>
                <button>Enviar</button>
            </div>
            
        </div>
        <p>© 2024 Cepet - Todos os direitos reservados.</p>
    </footer>
</body>
</html>
