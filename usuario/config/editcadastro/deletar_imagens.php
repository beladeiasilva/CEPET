<?php
    include("C:/xampp/htdocs/cepet/usuario/config/conexao.php");
    
    $sql= "SELECT IMG_PERFIL FROM usuarios WHERE ID_USUARIO = '$id'";
    $result = mysqli_query($mysqli, $sql);
    $img = mysqli_fetch_assoc($result);
    $img['IMG_PERFIL'];

    if($novoNomeDoArquivo.$extensao != $img['IMG_PERFIL'])

        if(is_file('C:/xampp/htdocs/cepet/usuario/img/imagens_perfil/'.$img['IMG_PERFIL'])) {

            if($img['IMG_PERFIL'] != "mascote.jpg")
            
             unlink('C:/xampp/htdocs/cepet/usuario/img/imagens_perfil/'.$img['IMG_PERFIL']);
        }
?>