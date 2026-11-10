<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "UPDATE runs SET nome = ?, jogo = ?, tempo = ?, mensagem = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST['nome'], 
        $_POST['jogo'], 
        $_POST['tempo'], 
        $_POST['mensagem'], 
        $_POST['id']
    ]);

    header("Location: ler.php");
    exit();
}
?>