<?php

// Verifica se o usuário está logado
include("config/logado.php");
include("config/conexao.php");

$sql = "SELECT * FROM ongs;";
$result = mysqli_query($mysqli, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/adocao.css"">
    <link rel="stylesheet" type="text/css" href="css/padrao.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoção</title>
    <link rel="icon" href="img/logos/icon.ico"> 
</head>
<body>
<?php include 'padrao/header.php'; ?>


    <div class="container">
        <!-- Sidebar de Filtros -->
        <div class="sidebar">
            <h3>Filtros</h3>
            
            <p>Animal</p>
            <select name="tipoanimal" id="tipoanimal">
                <option value="">Selecione o tipo de animal</option>
                <option value="gato">Gato</option>
                <option value="cachorro">Cachorro</option>
            </select>
            <p>Estado</p>
            <select name="estado" id="estado">
                <option value="">Selecione o estado</option>
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
            <select name="cidade" id="cidade">
                <option value="">Selecione a cidade</option>
            </select>

            <p>Gênero</p>
            <select name="generoanimal" id="generoanimal">
                <option value="">Selecione o gênero</option>    
                <option value="Macho">Macho</option>    
                <option value="Fêmea">Fêmea</option>
            </select>

            <p>ONGs</p>
            <select name="ongs"id="ongs">
                <option value="Selecione" selected>Selecione...</option>
                <?php while ($dados = mysqli_fetch_assoc($result)){ ?>
                <option value="<?php echo $dados['NOME'] ?>"> 
                <?php echo $dados['NOME']?>
                </option> 
                <?php }   ?>
            </select>   

            <p id="pCachorroRaca">Raça Cachorro</p>
            <select name="cachorroraca" id="cachorroRaca">
            <option value="">Selecione a raça do cachorro</option>
                <option value="viralata">Vira-Lata</option>
                <option value="labrador">Labrador Retriever</option>
                <option value="golden-retriever">Golden Retriever</option>
                <option value="bulldog-ingles">Bulldog Inglês</option>
                <option value="poodle">Poodle</option>
                <option value="pastor-alemao">Pastor Alemão</option>
                <option value="beagle">Beagle</option>
                <option value="rottweiler">Rottweiler</option>
                <option value="chihuahua">Chihuahua</option>
                <option value="dachshund">Dachshund</option>
                <option value="shihtzu">Shih Tzu</option>
                <option value="boxer">Boxer</option>
                <option value="pug">Pug</option>
                <option value="husky-siberiano">Husky Siberiano</option>
                <option value="border-collie">Border Collie</option>
                <option value="yorkshire">Yorkshire Terrier</option>
                <option value="pitbull">Pit Bull</option>
                <option value="weimaraner">Weimaraner</option>
                <option value="outro">Outro</option>
            </select>

            <p id="pGatoRaca">Raça Gato</p>
            <select name="gatoraca" id="gatoRaca">
            <option value="">Selecione a raça do gato</option>
                <option value="persa">Persa</option>
                <option value="siames">Siamês</option>
                <option value="maine-coon">Maine Coon</option>
                <option value="bengal">Bengal</option>
                <option value="sphynx">Sphynx</option>
                <option value="british-shorthair">British Shorthair</option>
                <option value="ragdoll">Ragdoll</option>
                <option value="angora">Angorá</option>
                <option value="scottish-fold">Scottish Fold</option>
                <option value="burmes">Burmês</option>
                <option value="chartreux">Chartreux</option>
                <option value="exotic-shorthair">Exotic Shorthair</option>
                <option value="russian-blue">Russian Blue</option>
                <option value="outro">Outro</option>
            </select>

            <p>Porte</p>
            <select name="porte" id="porte">
                <option value="">Selecione o porte</option>
                <option value="pequeno">Pequeno</option>
                <option value="medio">Médio</option>
                <option value="grande">Grande</option>
            </select>

            <p id="pCachorroCor">Cor Cachorro</p>
            <select name="cachorrocor" id="cachorrocor">
                <option value="">Selecione a cor do cachorro</option>
                <option value="preto">Preto</option>
                <option value="branco">Branco</option>
                <option value="cinza">Cinza</option>
                <option value="tigrado">Tigrado</option>
                <option value="tricolor">Tricolor</option>
                <option value="siames">Siamês</option>
                <option value="laranja">Laranja</option>
                <option value="creme">Creme</option>
                <option value="chocolate">Chocolate</option>
            </select>

            <p id="pGatoCor">Cor Gato</p>
            <select name="gatocor" id="gatocor">
                <option value="">Selecione a cor do gato</option>
                <option value="preto">Preto</option>
                <option value="branco">Branco</option>
                <option value="cinza">Cinza</option>
                <option value="tigrado">Tigrado</option>
                <option value="tricolor">Tricolor</option>
                <option value="siames">Siamês</option>
                <option value="laranja">Laranja</option>
                <option value="creme">Creme</option>
                <option value="chocolate">Chocolate</option>
            </select>
            <br>
            <button onclick="filtrar()">Filtrar</button>
        </div>


        <!-- Grid de Animais -->

        <?php include("config/adocao/listarpets.php"); ?>
                

       
            
            <div class="animal-card" data-tipo="gato" data-genero="Fêmea" data-nome="Mimi" data-idade="1" data-raca="angora" data-porte="pequeno" data-cor="branco">
                <img src="" alt="">
                <h4></h4>
                <p></p>
            </div>
            
            <div class="animal-card" data-tipo="cachorro" data-genero="Fêmea" data-nome="Daisy" data-idade="3" data-raca="poodle" data-porte="pequeno" data-cor="branco">
                <img src="" alt="">
                <h4></h4>
                <p></p>
            </div>
            
            <div class="animal-card" data-tipo="gato" data-genero="Macho" data-nome="Simba" data-idade="2" data-raca="bengal" data-porte="medio" data-cor="marrom">
                <img src="img/animais/cat (3).png" alt="">
                <h4></h4>
                <p></p>
            </div>
            <div class="animal-card" >
                <img src="" alt="">
                <h4> </h4>
                <p> </p>
            </div>        
        </div>
    </div>
    <?php include 'padrao/footer.php'; ?>

    <script>
    function filtrar() {
        // Seleciona todos os cartões de animais
        const cards = document.querySelectorAll(".animal-card");

        // Coleta os valores dos filtros
        const tipoAnimal = document.getElementById("tipoanimal").value;
        const estado = document.getElementById("estado").value;
        const cidade = document.getElementById("cidade").value;
        const generoAnimal = document.getElementById("generoanimal").value;
        const idade = document.getElementById("idade").value;
        const ong = document.getElementById("ongs").value;
        const cachorroRaca = document.getElementById("cachorroRaca").value;
        const gatoRaca = document.getElementById("gatoRaca").value;
        const porte = document.getElementById("porte").value;
        const cachorroCor = document.getElementById("cachorrocor").value;
        const gatoCor = document.getElementById("gatocor").value;

        // Itera sobre cada cartão de animal e aplica os filtros
        cards.forEach(card => {
            // Acessa os dados do animal diretamente dos atributos do elemento
            const tipo = card.getAttribute("data-tipo");
            const genero = card.getAttribute("data-genero");
            const raca = card.getAttribute("data-raca");
            const animalIdade = card.getAttribute("data-idade");
            const animalPorte = card.getAttribute("data-porte");
            const cor = card.getAttribute("data-cor");

            // Lógica para verificar se o cartão atende a todos os critérios de filtro
            let exibir = true;

            if (tipoAnimal && tipoAnimal !== tipo) exibir = false;
            if (generoAnimal && generoAnimal !== genero) exibir = false;
            if (idade && idade !== animalIdade) exibir = false;
            if (porte && porte !== animalPorte) exibir = false;
            if ((cachorroRaca && tipo === "cachorro" && cachorroRaca !== raca) || 
                (gatoRaca && tipo === "gato" && gatoRaca !== raca)) exibir = false;
            if ((cachorroCor && tipo === "cachorro" && cachorroCor !== cor) ||
                (gatoCor && tipo === "gato" && gatoCor !== cor)) exibir = false;

            // Mostra ou oculta o cartão de acordo com os filtros
            card.style.display = exibir ? "block" : "none";
        });
    }
</script>

</body>
</html>