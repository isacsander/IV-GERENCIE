<?php
session_start();
$tipoUsuario = $_SESSION['tipo_usuario'];
include_once "../classes/Animal.php";
include_once "../classes/Avisos.php";

$Animal = new Animal();
$animais = $Animal->Listar();
$Aviso = new Avisos();
$avisos = $Aviso->Listar();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Home</title>
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
        <h1>Bem-Vindo Morador, <?php echo htmlspecialchars($_SESSION['usuario_id']); ?></h1>
        <br><br><br>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome do animal</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Raça</th>
                        <th scope="col">Dono</th>
                        <th scope="col">...</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($animais)): ?>
                    <?php foreach ($animais as $animal): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($animal['id']); ?></td>
                            <td><?php echo htmlspecialchars($animal['nome']); ?></td>
                            <td><?php echo htmlspecialchars($animal['tipo']); ?></td>
                            <td><?php echo htmlspecialchars($animal['raca']); ?></td>
                            <td><?php echo htmlspecialchars($animal['dono']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Nenhum animal cadastrado.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        <br><br><br>
        <div>
        <section class="avisos_painel">
            <h1>Painel de Avisos</h1>
            <?php if (!empty($avisos)): ?>
                <ul>
                    <?php foreach ($avisos as $aviso): ?>
                        <li>
                            <h3><?= htmlspecialchars($aviso['titulo']) ?></h3>
                            <p><?= nl2br(htmlspecialchars($aviso['descricao'])) ?></p>
                            <small>Criado por: <?= htmlspecialchars($aviso['criado_por_nome']) ?> em <?= date('d/m/Y H:i', strtotime($aviso['data_criacao'])) ?></small>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Não há avisos cadastrados.</p>
            <?php endif; ?>
        </section>
        </div>    

    </main>
</body>

</html>