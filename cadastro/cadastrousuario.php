<?php

    

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
    <title>Criar Conta</title>
    <link rel="stylesheet" href="estilocadastro.css"> 
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
            <a href="login.php">
                Faça o login </a>
                <p> ou </p>
            <a href="/cepet/cadastro/cadastrousuario.php">
                Cadastre-se!</a>
        </div>
        <img class="pessoa" src="img/icones variados/perfil.png">
    </header>

    <nav>
    <ul class="barra-navegacao">
        <li><a href="/cepet/usuario/adocao.php">Adoção</a></li>
        <li><a href="/cepet/usuario/ONGs.php">ONGs</a></li>
        <li><a href="/cepet/usuario/doacao.php">Doação</a></li>
        <li><a href="/cepet/usuario/Noticias.php">Notícias e dicas</a></li>
    </ul>
    </nav>

<?php

 ?>    

<!--Método "POST" Essencial para a conexão dos dados.----------------------------------->    
<form action="config/cadastra_usuario.php" method="POST">
<!-------------------------------------------------------------------------------------->    


    <h1>Cadastro de Usuário</h1>

 <!-- Não apagar "name" nos campos de input ou select. PHP precisa dos names para puxar as informações para as variaveis-->

    <!-- Informações de Login -->
        <p>Nome de Usuário</p>
        <input type="text" name="usuariologin" id="usuariologin" maxlength="20" placeholder="Digite um nome de usuário" required>
            
        <p>Senha</p>
        <input type="password" name="usuariosenha" id="usuariosenha" maxlength="30" placeholder="Digite uma senha" required>
        <!-- Informações Pessoais -->
        <p>Nome Completo</p>
        <input type="text" name="usuarionome" id="usuarionome" maxlength="50"  placeholder="Digite seu nome completo" required>

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

       
        <p>CPF</p>
        <input oninput="mascara(this)" type="text" name="usuariocpf" id="usuariocpf" placeholder="Digite seu CPF" max length="11" required>
        
        <p>Data de Nascimento</p>
        <input type="date" name="usuarionascimento" id="usuarionascimento" required>
    
        <p>E-mail</p>
        <input type="email" name="usuarioemail" id="usuarioemail" maxlength="30" placeholder="Digite seu e-mail" required>
    
        <p>Telefone</p>
        <input type="tel" onkeyup="formatartelefone(this)" name="usuariotelefone" maxlength="11" id="usuariotelefone" placeholder="(XX) XXXX-XXXX" required>

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
        <input type="text" name="usuariocep" id="usuariocep" onkeyup="cep(event)" maxlength="9" placeholder="Digite o CEP" required onblur="pesquisacep(this.value);">
        
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
    
        <br>
        <p class="termos1">
            <input class="termos2" name="termosecondicoes" type="radio" required>
        Aceito os Termos e Condições</p>
        <br>
        <button type="submit" name="cadastrar" id="usuariocadastrar">Cadastrar</button>

        <div class='alert alert-danger' role='alert'>
             
                </div>


        <div>

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
