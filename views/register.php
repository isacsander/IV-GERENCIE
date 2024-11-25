<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Cadastrar</title>
</head>
<body>
    <div class="tela-register">
        <h1>Registra-se</h1>
        <form action="../actions/register.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <br><br>
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
            <br><br>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
            <br><br>
            <label for="tipo_usuario">Tipo de Usuário:</label>
            <select id="tipo_usuario" name="tipo_usuario" required>
                <option value="morador">Morador</option>
                <option value="administrador">Administrador</option>
            </select>
            <br><br>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>