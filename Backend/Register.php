<?php
include './db/connect.php';
// Dados do formulário
$nome  = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

// Verifica se alguma das variaveis esta vazia
if (!$nome || !$email || !$senha) {
    //die = Mata o processo
    die("Por favor, preencha todos os campos.");
}


$senhaHash = password_hash($senha, PASSWORD_DEFAULT);


try {
    // Preparar INSERT (evita SQL Injection)
    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)");

    // Executar
    $stmt->execute([
        ':nome' => $nome,
        ':email' => $email,
        ':senha' => $senhaHash
    ]);

    header('Location: ../Frontend/dashboard.html');
} catch (PDOException $e) {
    echo "Erro ao cadastrar: " . $e->getMessage();
}
