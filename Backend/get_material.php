<?php
session_start();
header('Content-Type: application/json');
include './db/connect.php';

$usuario_id = $_SESSION['usuario_id'] ?? null;
if (!$usuario_id) {
    echo json_encode(['error' => 'Usuário não autenticado']);
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT id, nome, preco FROM material WHERE usuario_id = :usuario_id");
    $stmt->execute([':usuario_id' => $usuario_id]);
    $materiais = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($materiais);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
