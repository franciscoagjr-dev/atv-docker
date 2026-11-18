<?php
require_once 'config.php';

$mensagem = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $categoria = trim($_POST['categoria'] ?? '');
    $bairro = trim($_POST['bairro'] ?? '');

    if (!empty($nome) && !empty($categoria) && !empty($bairro)) {
        $stmt =$pdo->prepare("INSERT INTO ecopontos (nome, categoria, bairro) VALUES (:nome, :categoria, :bairro)");
        $stmt->execute([':nome' => $nome, ':categoria' =>$categoria, ':bairro' => $bairro]);$mensagem = "Ecoponto cadastrado com sucesso via Docker!";
    } else {
        $mensagem = "Preencha todos os campos!";
    }
}

$stmt =$pdo->query("SELECT * FROM ecopontos ORDER BY id DESC");
$ecopontos =$stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Recicla Mais - Docker Environment</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f6f9; margin: 0; padding: 20px; color: #333; }
        .container { max-width: 800px; margin: 0 auto; background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h1 { color: #2e7d32; margin-top: 0; }
        .badge { background: #e8f5e9; color: #2e7d32; padding: 4px 8px; border-radius: 4px; font-weight: bold; font-size: 0.9em; }
        form { display: grid; gap: 10px; margin-bottom: 25px; background: #f9f9f9; padding: 15px; border-radius: 6px; }
        input, button { padding: 10px; font-size: 14px; border: 1px solid #ccc; border-radius: 4px; }
        button { background-color: #2e7d32; color: white; border: none; cursor: pointer; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f1f1f1; }
        .alert { padding: 10px; background-color: #e3f2fd; color: #0d47a1; border-radius: 4px; margin-bottom: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🌱 Recicla Mais <span class="badge">Docker Environment</span></h1>
        <p>Sistema PHP + MySQL executando dentro de contêineres isolados.</p>

        <?php if (!empty($mensagem)): ?>
            <div class="alert"><?= htmlspecialchars($mensagem) ?></div>
        <?php endif; ?>

        <h2>Cadastrar Novo Ecoponto</h2>
        <form action="index.php" method="POST">
            <input type="text" name="nome" placeholder="Nome do Local" required>
            <input type="text" name="categoria" placeholder="Categoria" required>
            <input type="text" name="bairro" placeholder="Bairro" required>
            <button type="submit">Cadastrar Ponto</button>
        </form>

        <h2>Ecopontos Cadastrados no Banco MySQL</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th><th>Nome</th><th>Categoria</th><th>Bairro</th><th>Data</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ecopontos as$ponto): ?>
                    <tr>
                        <td><?= $ponto['id'] ?></td>
                        <td><strong><?= htmlspecialchars($ponto['nome']) ?></strong></td>
                        <td><?= htmlspecialchars($ponto['categoria']) ?></td>
                        <td><?= htmlspecialchars($ponto['bairro']) ?></td>
                        <td><?= $ponto['criado_em'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>