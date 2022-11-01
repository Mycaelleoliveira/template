<?php

// 1 - Resgate de dados da tela


$nome = $_GET["nome"];

$email = $_GET["email"];

$telefone = $_GET["telefone"];

$mensagem = $_GET["mensagem"];    



// 2 - conectar
//    mysqli_connect(servidor,usuario,senha,banco);

$con = mysqli_connect("localhost", "root", "", "projeto1");


// 3 - montar a instrução para gravar
$sql = "insert into contato values(null,'".$nome."','".$email."','".$telefone."','".$mensagem."')";


// 4 - gravar

if (mysqli_query($con,$sql)){
   // echo "Gravado com sucesso!!!";
   $msg = "Gravado com sucesso !!!";
}else{
    //echo "Erro ao gravar...";
    $msg= "Erro ao gravar...";
}


// 5 - fechar a conexão com o banco de dados

mysqli_close($con);
echo "<script>alert('".$msg."');location.href='index.html';</script>";


?>