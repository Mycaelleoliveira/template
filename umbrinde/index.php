<?php

// 1 - Resgate de dados da tela
$form = isset($_POST["form"]) ? $_POST["form"] : "nenhum";

// 2 - conectar
//    mysqli_connect(servidor,usuario,senha,banco);
$con = mysqli_connect("localhost", "root", "", "umbrinde");

if ($form == "cadastro") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $celular = $_POST["celular"];
    $senha = sha1($_POST["senha"]);

    // 3 - montar a instrução para gravar
    $sql = "insert into usuarios (nome, email, celular, senha) values('" . $nome . "','" . $email . "','" . $celular . "','" . $senha . "')";
    // 4 - gravar

    if (mysqli_query($con, $sql)) {
        // echo "Cadastro com sucesso!!!";
        $msg = "Gravado com sucesso !!!";
    } else {
        //echo "Erro ao gravar...";
        $msg = "Erro ao cadastrar...";
    }
} elseif ($form == "login") {
    $email = $_POST["email"];
    $senha = sha1($_POST["senha"]);

    $sql = "select * from usuarios where email = '{$email}' and senha = '{$senha}'";

    $data = mysqli_query($con, $sql);
    $usuario = mysqli_fetch_array($data);

    if ($usuario) {
        $msg = "Seja bem vindo, " . $usuario["nome"];
    } else {
        $msg = "Login ou senha incorretos";
    }
} elseif ($form == "contato") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $mensagem = $_POST["mensagem"];

    // 3 - montar a instrução para gravar
    $sql = "insert into contato values(null,'" . $nome . "','" . $email . "','" . $telefone . "','" . $mensagem . "')";
    // 4 - gravar

    if (mysqli_query($con, $sql)) {
        // echo "Gravado com sucesso!!!";
        $msg = "Gravado com sucesso !!!";
    } else {
        //echo "Erro ao gravar...";
        $msg = "Erro ao gravar...";
    }
}

mysqli_close($con);

if (isset($msg)) {
    echo "<script>alert('{$msg}')</script>";
}

include("page.html");