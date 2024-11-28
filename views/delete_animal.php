<?php
session_start();
include_once "../classes/Animal.php";


if(!isset($_SESSION['usuario_id'])){
    header("Location: ../views/login.php");
    exit();
}

if(!empty($_GET['id'])){
    include_once "../classes/Conexao.php"; //incluido a conexao com banco de dados 
    $id = $_GET['id'];
    $conexao = new Conexao();
    $pdo= $conexao->connect(); 
    $stmt = $pdo->prepare("SELECT * FROM pets WHERE id=$id");
    $stmt->execute();

if($stmt->rowCount() > 0){ // se o numero for maior que zero o registro existe na tabela 
 
    $stmt= $pdo->prepare("DELETE FROM pets WHERE id=$id");
    $stmt->execute();

}
}
header('Location: home.php');
?>