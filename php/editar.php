<?php
require_once 'conexao.php';

if (!isset($_GET['id'])) {
    header('Location: ler.php');
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM runs WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$run = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$run) {
    header('Location: ler.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <main>
        <h2>editar registro <?= $run['id'] ?></h2>
        <form action="atualizar.php" method="POST">
            <input type="hidden" name="id" value="<?= $run['id'] ?>">
            <div class="campo">
                <label>nick:</label>
                <input type="text" name="nome" value="<?= htmlspecialchars($run['nome']) ?>" required>
            </div>
            <div class="campo">
                <label>jogo:</label>
                <input type="text" name="jogo" value="<?= htmlspecialchars($run['jogo']) ?>" required>
            </div>
            <div class="campo">
                <label>tempo:</label>
                <input type="text" name="tempo" value="<?= htmlspecialchars($run['tempo']) ?>" required>
            </div>
            <div class="campo">
                <label>mensagem/vOD:</label>
                <textarea name="mensagem" required><?= htmlspecialchars($run['mensagem']) ?></textarea>
            </div>
            <button type="submit">salvar alterações</button>
        </form>
    </main>
</body>
</html>