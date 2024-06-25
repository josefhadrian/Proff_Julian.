<?php

session_start();

require_once("conexao.php");

if(!empty($_POST['login']) && !empty($_POST['senha'])){
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $query = "SELECT * from usuarios WHERE login = '$login' AND  senha = '$senha'";

    $execucao = mysqli_query($conexao, $query);

    $resultado = mysqli_fetch_assoc($execucao);

    if(!empty($resultado)){
        $_SESSION['nome'] = $resultado['nome'];
        $_SESSION['nivel'] = $resultado['perfil'];

        if($_SESSION['nivel'] == "adm"){
            header("location:dashadm.php");
        }else{
            header("location:dashcliente.php");
        }
    }else{
        $_SESSION['loginError'] ='Usuario e Senha incorretos';
    header("location: dashadm.php");
}
}