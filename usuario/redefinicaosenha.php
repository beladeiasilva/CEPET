<?php
include("config/redefinicaosenha/redefinirsenha.php");
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
    <link rel="stylesheet" href="/cepet/cadastro/css/estilocadastro.css"> 
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
                <p></p>
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
<form action="" method="POST">
<!-------------------------------------------------------------------------------------->    


    <h1>Redefinição de Senha</h1>

 <!-- Não apagar "name" nos campos de input ou select. PHP precisa dos names para puxar as informações para as variaveis-->

            
        <p>Senha</p>
        <input type="password" name="senha" id="usuariosenha" maxlength="30" placeholder="Digite uma senha" required>
    
        <p>Confirme sua senha</p>
        <input type="password" name="confirmarsenha" id="usuariosenha" maxlength="30" placeholder="Digite uma senha" required>
    
        <br>
        <button type="submit" name="redefinir" id="usuariocadastrar">Redefinir</button>

        <div class='alert alert-danger' role='alert'>
             
                </div>


        

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
