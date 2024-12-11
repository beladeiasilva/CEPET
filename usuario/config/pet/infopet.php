<?php
// Receber o ID do pet via GET
if(!empty($_GET['ID_PET'])){

include("C:/xampp/htdocs/cepet/usuario/config/conexao.php");


    // Buscar as informações do pet no banco de dados
    $sql = "SELECT p.NOME, p.RAÇA, p.IDADE, p.GENERO, p.PORTE, p.COR, p.HISTÓRICO, p.LINK_FOTO, o.NOME AS ONG_NOME, o.ESTADO 
            FROM pets p
            JOIN ongs o ON p.FK_ONG_CNPJ = o.CNPJ
            WHERE p.ID_PET = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $_GET['ID_PET']);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar se o pet foi encontrado
    if ($result->num_rows > 0) {
        $pet = $result->fetch_assoc();
    } else {
        echo "Pet não encontrado!";
        exit;
    }

    $stmt->close();
} else {
    echo "ID do pet não informado!";
    exit;
}

$mysqli->close();
?>