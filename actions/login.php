<?php
require_once "../classes/Usuario.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

$usuario = new Usuario();
if($usuario->login($email, $senha)){
    header("Location: ../views/home.php");
}else{
    echo "Credencias inválidas!";
}

?>