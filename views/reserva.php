<?php
session_start();
include_once "../classes/Areas_lazer.php";
$tipo_usuario = $_SESSION['tipo_usuario'];

$areasLazer = new Areas_lazer();
$areas = $areasLazer->listar();

?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="reservaCSS.css">
    

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
                    <li><a href="login.php">Sair</a></li>
                </ul>
            </nav>
    </header>
    <main>
        <div class="respiro">  
        <?php if($tipo_usuario == 'administrador'): ?> 
            <h1 class="titulo">Cadastrar Área de Lazer</h1>
            <form action="../actions/register_lazer.php" method="POST">
                <label>Nome:</label>
                <input type="text" name="nome" required><br><br>
                <label>Descrição:</label>
                <textarea name="descricao" required></textarea><br><br>
                <label>Capacidade:</label>
                <input type="number" name="capacidade" required><br><br>
                <button type="submit">Cadastrar</button>
            </form>
        <?php endif; ?>
        <h1>Áreas de Lazer</h1>
        <ul class="lazer-ul">
            <?php foreach ($areas as $area): ?>
                <li id="agenda">
                    <strong><?php echo htmlspecialchars($area['nome']); ?></strong><br>
                    <?php echo htmlspecialchars($area['descricao']); ?><br>
                    Capacidade: <?php echo htmlspecialchars($area['capacidade']); ?><br>
                    
                </li>
                <hr>
            <?php endforeach; ?>
        </ul>
        <h1>Agendar Área de Lazer</h1>
        <form action="../actions/agendar_lazer.php" method="POST">
            <label>Nome da Area:</label>
            <input type="text" name="nome_lazer" required>
            <label>Data:</label>
            <input type="date" name="data" required><br><br>
            <button type="submit">Agendar</button>
        </form>
        </div>
    </main>

</body>
</html>