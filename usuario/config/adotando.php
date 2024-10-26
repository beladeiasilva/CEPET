<?php
if(!empty($_GET['ID_PET']) && isset($_POST['continuar'])){

  
$id_pet = $_GET['ID_PET'];
include('conexao.php');
$sql1="SELECT * FROM pets WHERE ID_PET = '$id_pet'";
$sql2="SELECT * FROM adocao WHERE FK_PET_ID='$id_pet'";
$result1=mysqli_query($mysqli, $sql1);
$result2=mysqli_query($mysqli, $sql2);

$cnpj=mysqli_fetch_assoc($result1);
$cnpj['FK_ONG_CNPJ'];


if($result2->num_rows > 0){
die("<h1> Você ja adotou esse pet! <h1>");
}
else{
$result= mysqli_query($mysqli, "INSERT INTO ADOCAO (DATA_ADO, HORA_ADO, FK_PET_ID, FK_USUARIO_ID, FK_ONG_CNPJ) VALUES (now(), now(),'$id_pet','$id','$cnpj[FK_ONG_CNPJ]')");
}


}

?>




