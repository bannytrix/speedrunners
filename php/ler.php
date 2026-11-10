<?php
require_once 'conexao.php';

$sql = "SELECT * FROM runs ORDER BY id DESC";
$stmt = $pdo->query($sql);
$runs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Runs</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Document</h1>
        <nav>
            <a href="../index.html">Início</a>
            <a href="../pages/contato.html">Enviar Run</a>
            <a href="ler.php">Listar Runs</a>
        </nav>
    </header>
    <main>
        <h2>Runs Cadastradas</h2>
        <table border="1" style="width: 100%; text-align: left; margin-top: 20px;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>runner</th>
                    <th>jogo</th>
                    <th>tempo</th>
                    <th>VOD / mensagem</th>
                    <th>ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($runs as $run): ?>
                <tr>
                    <td><?= $run['id'] ?></td>
                    <td><?= htmlspecialchars($run['nome']) ?></td>
                    <td><?= htmlspecialchars($run['jogo']) ?></td>
                    <td><?= htmlspecialchars($run['tempo']) ?></td>
                    <td><?= htmlspecialchars($run['mensagem']) ?></td>
                    <td>
                        <a href="editar.php?id=<?= $run['id'] ?>">editar</a> | 
                        <a href="deletar.php?id=<?= $run['id'] ?>">deletar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>