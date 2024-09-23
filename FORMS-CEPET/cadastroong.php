
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
    
<h1>Cadastre sua ONG!</h1>

<p>CNPJ</p>
<input type="number" id="ongcnpj" placeholder="Digite o CNPJ">

<p>Nome</p>
<input type="text" id="ongnome" placeholder="Nome da ONG">

<p>Cartão Sintegra</p>
<input type="file" id="ongccs">

<p>CCS</p>
<input type="file" id="ongcartaosintegra">

<p>Bacen</p>
<input type="file" id="ongbacen">

<p>E-mail</p>
<input type="email" id="ongemail" placeholder="Digite o e-mail da ONG">

<p>Telefone</p>
<input type="tel" id="ongtelefone" placeholder="(XX) XXXXX-XXXX">

<p>CEP</p>
<input type="number" id="ongcep" placeholder="Digite o CEP">

<p>Estado</p>
<select id="ongestado">
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
<input type="text" id="ongcidade" placeholder="Digite a cidade">

<p>Bairro</p>
<input type="text" id="ongbairro" placeholder="Digite o bairro">

<p>Rua</p>
<input type="text" id="ongrua" placeholder="Digite a rua">

<p>Número</p>
<input type="number" id="ongnumero" placeholder="Número do imóvel">

<!-- Campo opcional -->
<p>Site</p>
<input type="url" id="ongsite" placeholder="URL do site da ONG (opcional)">

<p>Redes Sociais</p>
<input type="url" id="ongredessociais" placeholder="URL das redes sociais da ONG (opcional)">


<button id="enviarcadastroong">Enviar</button>

</body>
</html>