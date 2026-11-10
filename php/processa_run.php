<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "INSERT INTO runs (nome, jogo, tempo, mensagem) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['nome'], $_POST['jogo'], $_POST['tempo'], $_POST['mensagem']]);
    header("Location: ler.php");
    exit();
}
?>