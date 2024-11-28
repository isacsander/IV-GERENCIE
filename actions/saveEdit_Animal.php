<?php
session_start();
include_once "../classes/Animal.php";
include_once "../classes/Conexao.php";

if(!isset($_SESSION['usuario_id'])){
    header("Location: ../views/login.php");
    exit();
}


if(isset($_POST['update'])){//verificar se existe update no post -> se nao existir volta para home.php
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $raca= $_POST['raca'];
    $dono= $_POST['dono'];

    $conexao = new Conexao();
    $pdo= $conexao->connect(); 
    $stmt = $pdo->prepare("UPDATE pets SET nome='$nome', tipo='$tipo', raca='$raca', dono='$dono'WHERE id='$id'");
    $stmt->execute();


}
header("Location: ../views/home.php");









