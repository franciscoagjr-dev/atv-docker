<?php
// O host aponta para o NOME DO SERVIÇO do banco no docker-compose.yml
$host = 'db';
$usuario = 'root';$senha = 'root';
$banco = 'db_ecopontos';$porta = 3306;

try {
    $pdo = new PDO("mysql:host=$host;port=$porta;dbname=$banco;charset=utf8", $usuario, $senha);$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco MySQL no Docker: " . $e->getMessage());
}
?>