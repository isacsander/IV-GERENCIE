<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginCSS.css">
    <title>Tela de login</title>
</head>
<body>
    <div class="tela-login">
        <h1>Login</h1>
        <form action="../actions/login.php" method="POST">
            <input type="email" placeholder="E-mail" id="email" name="email" required>
            <br><br>
            <input type="password" placeholder="Senha" id="senha" name="senha" required>
            <br><br>
        
            <input class="inputSubmit" type="submit" name="submit" value="Entrar">


            <button onclick="window.location.href='register.php';">Cadastra</button>
        </form>

    </div>
</body>
</html>