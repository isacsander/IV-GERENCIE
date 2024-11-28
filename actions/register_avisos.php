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
        echo "
        <script> 
            alert('Aviso publicado!');
            window.location.href = '../views/avisos.php'
        </script>
        ";
        exit();
    }else{
        echo "
        <script> 
            alert('Falha em publicar o aviso!');
            window.location.href = '../views/avisos.php'
        </script>
        ";
    }
}catch(Exception $e){
    echo "Erro: " . $e->getMessage();
}



