<?php
session_start();
$tipo_usuario = $_SESSION['tipo_usuario'];
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
    <link rel="stylesheet" href="homeCSS.css">
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
                <li><a href="login.php">Sair</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Bem-Vindo, <?php echo htmlspecialchars($_SESSION['nome_usuario']); ?></h1>
        <br><br><br>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        
                        <?php if($tipo_usuario == 'administrador'): ?> 
                            <th scope="col">#</th>
                        <?php endif; ?>
                        <th scope="col">Nome do animal</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Raça</th>
                        <th scope="col">Dono</th>
                        
                        <?php if($tipo_usuario == 'administrador'): ?> 
                            <th scope="col">...</th>
                        <?php endif;?>

                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($animais)): ?>
                    <?php foreach ($animais as $animal): ?>
                        <tr>
                            
                            <?php if($tipo_usuario == 'administrador'): ?> 
                                <td><?php echo htmlspecialchars($animal['id']); ?></td>
                            <?php endif; ?>

                            <td><?php echo htmlspecialchars($animal['nome']); ?></td>
                            <td><?php echo htmlspecialchars($animal['tipo']); ?></td>
                            <td><?php echo htmlspecialchars($animal['raca']); ?></td>
                            <td><?php echo htmlspecialchars($animal['dono']); ?></td>
                            
                            <?php if($tipo_usuario == 'administrador'): ?> 
                                <td><?php echo "<a style='background-color: blue' href='edit_animal.php?id=$animal[id]'> 
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
                                </svg>"?>
                                <?php echo"<a style='background-color: red' href='delete_animal.php?id=$animal[id]'> 
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0'/>
                                </svg></a>"?>
                                </td>
                            <?php endif;?>
                            
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