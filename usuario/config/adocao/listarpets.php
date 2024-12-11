                <!------------------==============================PET(1)=================================---------------------------->
<div class="animal-grid" id="animal-grid">
            <div class="animal-card" data-tipo="cachorro" data-genero="Macho" data-nome="Fred" data-idade="3" data-raca="labrador" data-porte="medio" data-cor="marrom">
                <!---------------------------------IMAGEM DO PET (1)-------------------------------------------------------->
                 <?php
                    include("C:/xampp/htdocs/cepet/usuario/config/conexao.php");
                    $sql1= "SELECT LINK_FOTO FROM pets WHERE ID_PET = 1";
                    $result1 = mysqli_query($mysqli, $sql1);
                    $foto = mysqli_fetch_assoc($result1);
                    if(isset($foto['LINK_FOTO'])) {
                    $foto['LINK_FOTO'];            
                    echo" <a href='pet.php?ID_PET=1'><img src='/cepet/cadastro/img/imagens_pets_cadastrados/$foto[LINK_FOTO]' alt='' > </a>";}
                    else{echo" Não há nenhum pet cadastrado.";}
                        
                    ?>
                <!------------------------------------NOME DO PET (1)------------------------------------------------------->
                <h4><?php 
                    include ("C:/xampp/htdocs/cepet/usuario/config/conexao.php");
                    $sql2= "SELECT NOME FROM pets WHERE ID_PET = 1";
                    $result2 = mysqli_query($mysqli, $sql2);
                    $desc1 = mysqli_fetch_assoc($result2);
                    if(isset($desc1['NOME'])) {
                    $desc1['NOME'];
                    print_r($desc1['NOME']);}
                    else{echo"";}
                ?></h4>
                <!------------------------------------IDADE DO PET (1)------------------------------------------------------->
                    <p> <?php 
                    include ("config/conexao.php");
                    $sql3= "SELECT IDADE FROM pets WHERE ID_PET = 1";
                    $result3 = mysqli_query($mysqli, $sql3);
                    $desc2 = mysqli_fetch_assoc($result3);
                    if(isset($desc2['IDADE'])) {
                    $desc2['IDADE'];
                    echo"$desc2[IDADE]";}
                     else{echo"";}
                    ?></p>
            </div>

        <!------------------==============================PET(2)=================================---------------------------->

            <div class="animal-card" data-tipo="gato" data-genero="Fêmea" data-nome="Luna" data-idade="2" data-raca="persa" data-porte="pequeno" data-cor="branco">
                 <!---------------------------------IMAGEM DO PET (2)-------------------------------------------------------->
                    <?php
                    include("C:/xampp/htdocs/cepet/usuario/config/conexao.php");
                    $sql2= "SELECT LINK_FOTO FROM pets WHERE ID_PET = 2";
                    $result2 = mysqli_query($mysqli, $sql2);
                    $foto = mysqli_fetch_assoc($result2);
                    if(isset($foto['LINK_FOTO'])) {
                    $foto['LINK_FOTO'];            
                    echo" <a href='pet.php?ID_PET=2'><img src='/cepet/cadastro/img/imagens_pets_cadastrados/$foto[LINK_FOTO]' alt='' > </a>";}
                    else{echo" Não há nenhum pet cadastrado.";}
                    
                        
                    
                    ?>
                <!------------------------------------NOME DO PET (2)------------------------------------------------------->
                    <h4><?php 
                    include ("C:/xampp/htdocs/cepet/usuario/config/conexao.php");
                    $sql= "SELECT NOME FROM pets WHERE ID_PET = 2";
                    $result = mysqli_query($mysqli, $sql);
                    $desc = mysqli_fetch_assoc($result);
                    if(isset($desc['NOME'])) {
                    $desc['NOME'];
                    print_r($desc['NOME']);}
                    else{echo"";}
                    
                   
                    
                       
                   
                    
                    ?></h4>
                <!------------------------------------IDADE DO PET (2)------------------------------------------------------->
                    <p> <?php 
                    include ("C:/xampp/htdocs/cepet/usuario/config/conexao.php");
                    $sql= "SELECT IDADE FROM pets WHERE ID_PET = 2";
                    $result = mysqli_query($mysqli, $sql);
                    $desc = mysqli_fetch_assoc($result);
                    if(isset($desc['IDADE'])) {
                    $desc['IDADE'];
                    print_r($desc['IDADE']);}
                    else{echo"";}
                   
                    ?></p>

        <!------------------==============================PET(3)=================================---------------------------->
        </div>
            <div class="animal-card" data-tipo="cachorro" data-genero="Fêmea" data-nome="Bella" data-idade="5" data-raca="beagle" data-porte="medio" data-cor="preto">
                 <!---------------------------------IMAGEM DO PET (3)-------------------------------------------------------->
                 <?php
                    include("C:/xampp/htdocs/cepet/usuario/config/conexao.php");
                    $sql2= "SELECT LINK_FOTO FROM pets WHERE ID_PET = 3";
                    $result2 = mysqli_query($mysqli, $sql2);
                    $foto = mysqli_fetch_assoc($result2);
                    if(isset($foto['LINK_FOTO'])) {
                    $foto['LINK_FOTO'];            
                    echo" <a href='pet.php?ID_PET=3'><img src='/cepet/cadastro/img/imagens_pets_cadastrados/$foto[LINK_FOTO]' alt='' > </a>";}
                    else{echo" Não há nenhum pet cadastrado.";}
                        
                    
                    ?>
                <!------------------------------------NOME DO PET (3)------------------------------------------------------->
                    <h4><?php 
                    include ("C:/xampp/htdocs/cepet/usuario/config/conexao.php");
                    $sql= "SELECT NOME FROM pets WHERE ID_PET = 3";
                    $result = mysqli_query($mysqli, $sql);
                    $desc = mysqli_fetch_assoc($result);
                    if(isset($desc['NOME'])) {
                    $desc['NOME'];
                    print_r($desc['NOME']);}
                    else{echo"";}
                        
                    ?></h4>
               <!------------------------------------IDADE DO PET (3)------------------------------------------------------->
               <p> <?php 
                    include ("C:/xampp/htdocs/cepet/usuario/config/conexao.php");
                    $sql= "SELECT IDADE FROM pets WHERE ID_PET = 3";
                    $result = mysqli_query($mysqli, $sql);
                    $desc = mysqli_fetch_assoc($result);
                    if(isset($desc['IDADE'])) {
                    $desc['IDADE'];
                    print_r($desc['IDADE']);}
                    else{echo"";}
                    ?></p>
            </div>

        <!------------------==============================PET(4)=================================---------------------------->
            <div class="animal-card" data-tipo="gato" data-genero="Macho" data-nome="Tom" data-idade="4" data-raca="siames" data-porte="pequeno" data-cor="cinza">
                <!---------------------------------IMAGEM DO PET (4)-------------------------------------------------------->

                <?php
                    include("C:/xampp/htdocs/cepet/usuario/config/conexao.php");
                    $sql2= "SELECT LINK_FOTO FROM pets WHERE ID_PET = 4";
                    $result2 = mysqli_query($mysqli, $sql2);
                    $foto = mysqli_fetch_assoc($result2);
                    if(isset($foto['LINK_FOTO'])) {
                    $foto['LINK_FOTO'];            
                    echo" <a href='pet.php?ID_PET=4'><img src='/cepet/cadastro/img/imagens_pets_cadastrados/$foto[LINK_FOTO]' alt='' > </a>";}
                    else{echo" Não há nenhum pet cadastrado.";}
                    ?>
      
                <!------------------------------------NOME DO PET (4)------------------------------------------------------->
                <h4><?php 
                    include ("C:/xampp/htdocs/cepet/usuario/config/conexao.php");
                    $sql= "SELECT NOME FROM pets WHERE ID_PET = 4";
                    $result = mysqli_query($mysqli, $sql);
                    $desc = mysqli_fetch_assoc($result);
                    if(isset($desc['NOME'])) {
                    $desc['NOME'];
                    print_r($desc['NOME']);}
                    else{echo"";}
                    ?></h4>
                <!------------------------------------IDADE DO PET (4)------------------------------------------------------->
               <p> <?php 
                    include ("C:/xampp/htdocs/cepet/usuario/config/conexao.php");
                    $sql= "SELECT IDADE FROM pets WHERE ID_PET = 4";
                    $result = mysqli_query($mysqli, $sql);
                    $desc = mysqli_fetch_assoc($result);
                    if(isset($desc['IDADE'])) {
                    $desc['IDADE'];
                    print_r($desc['IDADE']);}
                    else{echo"";}
                    ?></p>
            </div>
            
        <!------------------==============================PET(5)=================================---------------------------->
        <div class="animal-card" data-tipo="cachorro" data-genero="Macho" data-nome="Max" data-idade="7" data-raca="golden" data-porte="grande" data-cor="marrom">
                <!---------------------------------IMAGEM DO PET (5)-------------------------------------------------------->

                <?php
                        include("C:/xampp/htdocs/cepet/usuario/config/conexao.php");
                    $sql2= "SELECT LINK_FOTO FROM pets WHERE ID_PET = 5";
                    $result2 = mysqli_query($mysqli, $sql2);
                    $foto = mysqli_fetch_assoc($result2);
                    if(isset($foto['LINK_FOTO'])) {
                    $foto['LINK_FOTO'];            
                    echo" <a href='pet.php?ID_PET=5'><img src='/cepet/cadastro/img/imagens_pets_cadastrados/$foto[LINK_FOTO]' alt='' > </a>";}
                    else{echo" Não há nenhum pet cadastrado.";}
                    ?>
               
                <!------------------------------------NOME DO PET (5)------------------------------------------------------->
                <h4><?php 
                    include ("C:/xampp/htdocs/cepet/usuario/config/conexao.php");
                    $sql= "SELECT NOME FROM pets WHERE ID_PET = 5";
                    $result = mysqli_query($mysqli, $sql);
                    $desc = mysqli_fetch_assoc($result);
                    if(isset($desc['NOME'])) {
                    $desc['NOME'];
                    print_r($desc['NOME']);}
                    else{echo"";}
                    ?></h4>
                <!------------------------------------IDADE DO PET (5)------------------------------------------------------->
               <p> <?php 
                    include ("C:/xampp/htdocs/cepet/usuario/config/conexao.php");
                    $sql= "SELECT IDADE FROM pets WHERE ID_PET = 5";
                    $result = mysqli_query($mysqli, $sql);
                    $desc = mysqli_fetch_assoc($result);
                    if(isset($desc['IDADE'])) {
                    $desc['IDADE'];
                    print_r($desc['IDADE']);}
                    else{echo"";}
                    ?></p>
            </div>