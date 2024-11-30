<?php
include("logado.php");



if(isset($_POST['cadastrar']))
    {
  
        include_once("conexao.php");

        //--------------------------------------------Declarando váriaveis---------------------------------------------->
     
        $nome= $_POST['nome'];
        $genero= $_POST['genero'];
        $data_nasc= $_POST['data_nasc'];
        $telefone= $_POST['telefone'];
        $cep= $_POST['cep'];
        $estado= $_POST['estado'];
        $cidade= $_POST['cidade'];
        $rua= $_POST['rua'];
        $numero= $_POST['numero'];
        $bairro= $_POST['bairro'];
        $termos_condicoes= $_POST['termosecondicoes'];

        
    

        //------------------------------------Verifica se há um email já cadastrado---------------------------------------------->

        
        //------------------------------------Inserindo ao banco de dados:-------------------------------------------------------//

                $result = mysqli_query($mysqli, "UPDATE usuarios SET NOME_COMPLETO ='$nome', DATA_DE_NASCIMENTO ='$data_nasc', GENÊRO ='$genero', TELEFONE ='$telefone', UF ='$estado', 
                CIDADE = '$cidade', BAIRRO = '$bairro', CEP ='$cep', RUA = '$rua', NUM_CASA= '$numero', Termos_Condições='$termos_condicoes' WHERE ID_USUARIO = $id"); 

                

                

                

                header("Location: /cepet/usuario/adotar.php");
            }
            
    
    ?>