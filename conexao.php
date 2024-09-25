<?php
    $dbHost = 'localhost';
    $dbUsername ='root' ;
    $dbPassword ='';
    $dbName = 'cepet';

    $mysqli = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    //Teste para a conexão ok.
    //if ($mysqli->connect_errno)
    //{
       //echo "falha ao conectar";
    //}
    //else
        //echo "Conectado ao Banco de Dados";
?>
