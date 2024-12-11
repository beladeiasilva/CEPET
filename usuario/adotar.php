<?php

// Verifica se o usuário está logado
include("config/logado.php");
include("config/adotar/fazendo_pedido.php");


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/adotar.css">
    <link rel="stylesheet" type="text/css" href="css/padrao.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adotar</title>
    <link rel="icon" href="img/logos/icon.ico"> 
</head>

<body>
<?php include 'padrao/header.php'; ?>

    <section id="bloco1" class="active">
        <h2>Formulário de Interesse de adoção</h2>
        <p>Estamos muito felizes por você estar dando esse importante passo para adotar um pet e oferecer um lar cheio de carinho e cuidado!
        </p>
        <p>
        Ao prosseguir, você concorda em compartilhar as suas informações pessoais, como nome, CPF, endereço, telefone, e e-mail, já salvas no seu cadastro, diretamente com a ONG responsável pelo pet. Essas informações serão usadas exclusivamente para que a ONG possa entrar em contato com você e dar continuidade ao processo de adoção.
        Você terá a opção de escrever uma mensagem para a ONG na próxima etapa, se desejar. Essa mensagem será enviada junto com suas informações pessoais.
        </p>
        <p>
        Queremos reforçar que todo o processo de adoção, incluindo entrevistas e o contato direto, é de responsabilidade da ONG . Eles terão até 48 horas para entrar em contato com você após a submissão dos seus dados.
        Lembre-se que estamos aqui para apoiar e garantir que o processo seja o mais tranquilo possível. Agradecemos por confiar na nossa plataforma e por ajudar a transformar a vida de um animalzinho!
        </p>
        <div class="checkbox-container">
            <input type="checkbox" id="termos" onclick="verificarTermos()">
            <label for="termos">
            Declaro que sou maior de 18 anos, li e estou ciente das informações fornecidas, e concordo em compartilhar meus dados pessoais com a ONG/protetor parceiro do programa CEPET para fins de contato referente ao processo de adoção. Entendo que o envio dos meus dados demonstra o meu interesse em ser contactado pela ONG/protetor para dar continuidade ao processo, incluindo entrevistas e etapas posteriores.
            </label>
          
        </div>
      
        <button class="btn"  id="btnContinuar1" disabled>Continuar</button>
       
    </section>

   
    <section id="bloco2" class="hidden">
  
        <h2>Deixe uma Mensagem para ONG (opcional):</h2>
        <textarea placeholder="Escreva aqui uma mensagem para ONG..."></textarea>
        
        <style>
            a:link{
                text-decoration: none;
            }
        </style>
        <form action="" method="POST">
        <!-- Botão para colocar função que vai mandar dados para ong -->
         <a href="adotar_pedido_realizado.php"><button class="btn" name="submit">Realizar Pedido!</button></a>
         </form>




    <?php include 'padrao/footer.php'; ?>
    

    <script>
    // Função para mostrar o próximo bloco
    function mostrarBloco(bloco) {
        // Oculta todos os blocos e remove a classe 'active'
        document.getElementById('bloco1').classList.add('hidden');
        document.getElementById('bloco1').classList.remove('active');
        
        document.getElementById('bloco2').classList.add('hidden');
        document.getElementById('bloco2').classList.remove('active');
        
        

        // Mostra apenas o bloco atual
        document.getElementById('bloco' + bloco).classList.remove('hidden');
        document.getElementById('bloco' + bloco).classList.add('active');
    }

    // Função para verificar se o checkbox está selecionado
    function verificarTermos() {
        var checkbox = document.getElementById("termos");
        var btn = document.getElementById("btnContinuar1");

        // Habilita ou desabilita o botão de continuar com base no checkbox
        btn.disabled = !checkbox.checked;  // Habilita o botão apenas se o checkbox estiver marcado
    }

    // Adicionando um evento de clique no botão "Continuar" do bloco 1
    document.getElementById('btnContinuar1').addEventListener('click', function() {
        var checkbox = document.getElementById("termos");

        if (checkbox.checked) {
            // Se o checkbox estiver marcado, permite continuar
            mostrarBloco(2);
        } else {
            // Caso contrário, exibe um alerta
            alert('Você deve concordar com os termos de adoção para continuar.');
        }
    });

    // Adicionando evento de clique no botão "Continuar" do bloco 2 para ir para o bloco 3
    document.getElementById('btnContinuar2').addEventListener('click', function() {
        mostrarBloco(3);
    });
    
</script>
</body>
</html>