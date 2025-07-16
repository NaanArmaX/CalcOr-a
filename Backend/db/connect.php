<?php
$host = 'localhost';       
$dbname = 'calcorca';     
$usuario = 'root';         
$senha = '';   

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);
    
    // Ativar o modo de erros com exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
} catch (PDOException $e) {
    echo "❌ Erro na conexão: " . $e->getMessage();
    exit;
}
?>
