<?php
session_start();
include './db/connect.php';

// Dados do formulário
$nome  = $_POST['nome'] ?? '';
$preco_str = $_POST['preco'] ?? '';  

// Remove "R$", espaços, pontos e troca vírgula por ponto para converter em float
$preco_limpo = str_replace(['R$', ' ', '.'], '', $preco_str);
$preco_limpo = str_replace(',', '.', $preco_limpo);

// Agora converte para float
$preco_float = floatval($preco_limpo);

// Pega o usuário logado
$usuario_id = $_SESSION['usuario_id'] ?? null;
if (!$usuario_id) {
    die("Usuário não autenticado.");
}

// Validação mínima
if (!$nome || !$preco_float ) {
    die("Por favor, preencha todos os campos.");
}

try {
    // Preparar INSERT com foreign key usuario_id
    $stmt = $pdo->prepare("INSERT INTO material (nome, preco, usuario_id) VALUES (:nome, :preco, :usuario_id)");

    // Executar
    $stmt->execute([
        ':nome' => $nome,
        ':preco' => $preco_float,
        ':usuario_id' => $usuario_id,
    ]);

    header('Location: ../Frontend/material.html');
} catch (PDOException $e) {
    echo "Erro ao cadastrar: " . $e->getMessage();
}
?>
