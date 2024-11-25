<?php
session_start();
include_once "../classes/Animal.php";


if(!isset($_SESSION['usuario_id'])){
    header("Location: ../views/login.php");
    exit();
}
//dados enviados do formulario
$nome = $_POST['nome'];
$tipo = $_POST['tipo'];
$raca= $_POST['raca'];
$dono= $_POST['dono'];

$Animal = new Animal();
try{
    if($Animal->Cadastrar($nome, $tipo, $raca, $dono)){
        echo "Animalzinho Cadastrado com sucesso :) !!!";
        exit();
    }else{
        echo "Erro ao cadastrar seu animalzinho";
    }
}catch(Exception $e){
    echo "Erro: " . $e->getMessage();
}



