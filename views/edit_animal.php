<?php
session_start();
include_once "../classes/Animal.php";


if(!isset($_SESSION['usuario_id'])){
    header("Location: ../views/login.php");
    exit();
}
//PEGAR OS DADOS DO BANCO DE DADOS para exibir essas dados pq vai ser editado
if(!empty($_GET['id'])){
include_once "../classes/Conexao.php"; //incluido a conexao com banco de dados 
$id = $_GET['id'];
$conexao = new Conexao();
$pdo= $conexao->connect(); 
$stmt = $pdo->prepare("SELECT * FROM pets WHERE id=$id");
$stmt->execute();

if($stmt->rowCount() > 0){ // se o numero for maior que zero o registro existe na tabela 
    while($user_data = $stmt->fetch(PDO::FETCH_ASSOC)){
    $nome = $user_data['nome']; // pegou o dado do banco de dados e guardou em $nome para ser exbido na interface
    $tipo = $user_data['tipo'];
    $raca= $user_data['raca'];
    $dono= $user_data['dono'];
    }
}else{
    header('Location: ../views/home.php');
}

}
else{
    header('Location: ../views/home.php');
}

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="animaisCSS.css">
    <title>Document</title>

    <style>
        .container{
            margin-left: 20px;
        }
    </style>
</head>
<body>
<header>
        <nav>
            <a class="logo" href="/">IV Gerencie</a>
            <ul class="nav-list">
                <li><a href="home.php">Início</a></li>
                <li><a href="reserva.php">Reserva</a></li>
                <li><a href="animais.php">Animais</a></li>
                <li><a href="avisos.php">Avisos</a></li>
                <li><a href="/">Sobre</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Edição das informações!</h1>
        <form action="../actions/saveEdit_Animal.php" method="POST">
            <label for="nome">Nome do seu pet:</label>
            <input type="text" id="nome" name="nome" value="<?php echo $nome?> " required> 
            <br><br>
            <label for="tipo">Tipo:</label>
            <input type="text" id="tipo" name="tipo" value="<?php echo $tipo?> " required>
            <br><br>
            <label for="raca">Raça:</label>
            <input type="text" id="raca" name="raca" value="<?php echo $raca?> " required>
            <br><br>
            <label for="dono">Dono do Animalzinho: </label>
            <input type="text" id="dono" name="dono" value="<?php echo $dono?> " required>
            <br><br>
            <input type="hidden" name="id" value="<?php echo $id?>"> 
            <button type="submit" name="update" id="update">EDITAR</button>
        </form>
    </main>
</body>
</html>