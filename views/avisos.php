<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="avisos.css">
    <title>Document</title>
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
        <form action="../actions/register_avisos.php" method="POST">
            <h2>Deixe seu aviso:</h2>
            <h5>Titulo:</h5>
            <input type="text" id="titulo" name="titulo" placeholder="Digite o titulo do aviso" required><br>
            <h5>Descrição</h5>
            <textarea name="descricao" id="descricao" rows="4" cols="50" placeholder="Escreva seu aviso aqui..." required></textarea><br><br>
            <input type="submit" value="Enviar">
        </form>
    </main>
</body>
</html>