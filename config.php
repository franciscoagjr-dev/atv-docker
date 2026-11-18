<?php
// Configuração de ligação à base de dados para ambiente local / XAMPP / Git
$host = '127.0.0.1';
$usuario = 'root';
$senha = ''; // Deixar vazio se usar XAMPP padrão
$banco = 'db_ecopontos';
$porta = 3306;

try {
    $pdo = new PDO("mysql:host=$host;port=$porta;dbname=$banco;charset=utf8", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar à base de dados: " . $e->getMessage());
}
?>