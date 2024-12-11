<?php
    include('conexao.php');
    
    $sql= "SELECT IMG_PERFIL_ONG FROM ongs WHERE CNPJ = '$cnpj'";
    $result = mysqli_query($mysqli, $sql);
    $img = mysqli_fetch_assoc($result);
    $img['IMG_PERFIL_ONG'];

    if($novoNomeDoArquivo.$extensao != $img['IMG_PERFIL_ONG'])

        if(is_file('C:/xampp/htdocs/cepet/ong/img/imagens_perfil/'.$img['IMG_PERFIL_ONG'])) {

            if($img['IMG_PERFIL_ONG'] != "mascote.jpg")
            
             unlink('C:/xampp/htdocs/cepet/ong/img/imagens_perfil/'.$img['IMG_PERFIL_ONG']);
        }
?>