<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="animais.css">
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
        <h1>Cadastre seu Animalzinho!</h1>
        <form action="../actions/register_animal.php" method="POST">
            <label for="nome">Nome do seu pet:</label>
            <input type="text" id="nome" name="nome" required>
            <br><br>
            <label for="tipo">Tipo:</label>
            <input type="text" id="tipo" name="tipo" required>
            <br><br>
            <label for="raca">Raça:</label>
            <input type="text" id="raca" name="raca" required>
            <br><br>
            <label for="dono">Dono do Animalzinho: </label>
            <input type="text" id="dono" name="dono" required>
            <br><br>
            <button type="submit">Cadastrar</button>
        </form>
    </main>
</body>
</html>