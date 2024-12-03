<?php
session_start();
include_once "../classes/Areas_lazer.php";
if(!isset($_SESSION['usuario_id'])){
    header("Location: ../views/login.php");
    exit();
}


$nome_lazer = $_POST['nome_lazer'];
$data = $_POST['data'];

$areas_lazer = new Areas_lazer();

if ($areas_lazer->AgendarLazer( $nome_lazer, $data)) {
    echo "Área de lazer cadastrada com sucesso!";

    
}






?>