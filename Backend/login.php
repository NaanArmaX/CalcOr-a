<?php
session_start();
include './db/connect.php';

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';


// Busca o usuário
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
$stmt->execute([':email' => $email]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario && password_verify($senha, $usuario['senha'])) {
     $_SESSION['usuario_id'] = $usuario['id'];
    $_SESSION['usuario_nome'] = $usuario['nome'];
    header("Location: ../Frontend/dashboard.html"); 
    exit;
} else {
    echo "E-mail ou senha inválidos.";
}
?>
