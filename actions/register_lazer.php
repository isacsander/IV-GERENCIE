<?php
session_start();
include_once "../classes/Areas_lazer.php";


if(!isset($_SESSION['usuario_id'])){
    header("Location: ../views/login.php");
    exit();
}

//dados enviados do formulario
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$capacidade = $_POST['capacidade'];


$areas_lazer = new Areas_lazer();
if ($areas_lazer->Cadastrar($nome, $descricao, $capacidade)) {
    echo "
    <script> 
        alert('Área de lazer cadastrado com sucesso :) !');
        window.location.href = '../views/animais.php'
    </script>
    ";
} else 
    echo "
    <script> 
        alert('Erro em cadastrar a área de lazer :) !');
        window.location.href = '../views/animais.php'
    </script>
    ";