<?php
session_start();
include_once "../classes/Avisos.php";
if(!isset($_SESSION['usuario_id'])){
    header("Location: ../views/login.php");
    exit();
}

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];


$Aviso = new Avisos();
try{
    if($Aviso->Registrar_Avisos($titulo, $descricao)){
        echo "Animalzinho Cadastrado com sucesso :) !!!";
        exit();
    }else{
        echo "Erro ao cadastrar seu animalzinho";
    }
}catch(Exception $e){
    echo "Erro: " . $e->getMessage();
}



