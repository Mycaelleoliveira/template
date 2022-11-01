<?php
// 1- resgate de dados da tela

$nome = $_GET["nome"];
$email = $_GET["email"];
$telefone = $_GET["telefone"];
$mensagem = $_GET["mensagem"];


// 2- conectar a base de dados

$con = mysqli_connect("localhost", "root", "", "projeto1");

//montar a instrução para gravar

$sql = "insert into contato values(null,'".$nome."','".$email."','".$telefone."','".$mensagem."')";


// 3- gravar no banco

if (mysqli_query($con,$sql)) {
    $msg = "Gravado com sucesso!";
} else {
    $msg = "Erro ao gravar!";
}


//4- fechar conexão com o banco

mysqli_close($con);

echo"<script>
    alert('".$msg."');
    location.href='index.html';

</script>";


?>