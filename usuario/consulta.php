<?php 

include("config/logado.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas</title>
    <link rel="stylesheet" type="text/css" href="css/consulta.css"> 
    <link rel="stylesheet" type="text/css" href="css/padrao.css">
    <link rel="icon" href="img/logos/icon.ico">  
</head>
<body>    <?php include 'padrao/header.php'; ?>

    <?php include("config/consulta/lista_vet.php"); ?>
    <header>
        <h1>Consultas - Encontre um Veterinário</h1>
    </header>
    <main>
        <section class="filtro-container">
            <h2>Filtrar por Localização</h2>
            <form id="filtro-form">
                <select name="estado" id="estado">
                    <option value="">Selecione o Estado</option>
                    <option value="SP">São Paulo</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PR">Paraná</option>
                </select>
                <select name="cidade" id="cidade">
                    <option value="">Selecione a Cidade</option>
                    <option value="São Paulo">São Paulo</option>
                    <option value="Campinas">Campinas</option>
                    <option value="Rio de Janeiro">Rio de Janeiro</option>
                    <option value="Belo Horizonte">Belo Horizonte</option>
                </select>
                <button type="submit">Filtrar</button>
            </form>
        </section>

    
        
        <section class="veterinarios-container">
            <h2>Veterinários Disponíveis</h2>
            <div class="veterinario-card">
            <?php echo"<img src='/cepet/veterinario/img/img_perfil/$dados[IMG_PERFIL]'>";?>
                <h3><?php echo $dados["NOME_COMPLETO"];?></h3>
                <p><strong>Especialidade:</strong> Clínica Geral</p>
                <p><strong>Localização: </strong><?php echo $dados["UF"].", ".$dados["CIDADE"];?></p>
                <a href="<?php echo "perfilvet.php?ID_VETERINARIO=$dados[ID_VETERINARIO]";?>"><button>Ver mais</button></a>
              


            </div>
            <div class="veterinario-card">
                <img src="veterinario2.jpg" alt="Dra. Maria Oliveira">
                <h3>Dra. Maria Oliveira</h3>
                <p><strong>Especialidade:</strong> Dermatologia</p>
                <p><strong>Localização:</strong> Campinas, SP</p>
                <button>Ver Perfil</button>
            </div>
            <div class="veterinario-card">
                <img src="veterinario3.jpg" alt="Dr. Pedro Santos">
                <h3>Dr. Pedro Santos</h3>
                <p><strong>Especialidade:</strong> Cirurgia</p>
                <p><strong>Localização:</strong> Rio de Janeiro, RJ</p>
                <button>Ver Perfil</button>
            </div>
        </section>
    </main>
    <?php include 'padrao/footer.php'; ?>
</body>
</html>
