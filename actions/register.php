<?php
include_once "../classes/Usuario.php";
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$tipo_usuario = $_POST['tipo_usuario'];

$usuario = new Usuario();
try{
    if($usuario->cadastrar($nome, $email, $senha, $tipo_usuario)){
        header("Location: ../views/login.php");
        exit;
    }else{
        echo"Erro ao cadastrar o usuário";
    }
}catch(Exception $e){
    echo "Erro: " . $e->getMessage();
}

?>