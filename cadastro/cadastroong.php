<?php
session_start();


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
    <link rel="stylesheet" href="css/estilocadastro.css"> 
    <link rel="stylesheet" type="text/css" href="/cepet/usuario/css/padrao.css">
    <link rel="icon" href="img/logos/icon.ico">  
     <script src="jscript/main.js" defer> </script>
</head>

    <body>
    <header>
        <div class="logoimg">
            <img src="img/logos/cepet-preto.png" width="20%" alt="Logo Cepet">
        </div>
        <div class="headerlogin">
            <a href="/cepet/ambos/login.php">
                Faça o login ! </a>
    
        
        </div>
        <img class="pessoa" src="img/icones variados/perfil.png">
    </header>

    <nav>
    <ul class="barra-navegacao">
        <li><a href="/cepet/usuario/adocao.php">Adoção</a></li>
        <li><a href="/cepet/usuario/ONGs.php">ONGs</a></li>
        <li><a href="/cepet/usuario/doacao.php">Doação</a></li>
        <li><a href="/cepet/usuario/consultas.php">Consulta</a></li>
        <li><a href="/cepet/usuario/noticias.php">Notícias e dicas</a></li>
    </ul>
    </nav>
<!--Método "POST" Essencial para a conexão dos dados.----------------------------------->  
        <form action="config/cadastra_ong.php" method="POST" enctype="multipart/form-data">
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
                    <a href="#"><img src="/cepet/usuario/img/redes sociais/instagram.png" alt="Instagram"></a>
                    <a href="#"><img src="/cepet/usuario/img/redes sociais/facebook.png" alt="Facebook"></a>
                    <a href="#"><img src="/cepet/usuario/img/redes sociais/linkedin.png" alt="LinkedIn"></a>
                    <a href="#"><img src="/cepet/usuario/img/redes sociais/twitter.png" alt="Twitter"></a>
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
