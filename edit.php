<?php
require 'database.php';

// Capturar o ID passado via GET
$id = $_GET['id'] ?? null;
if (!$id) {
    die("ID inválido.");
}

// Buscar os dados do usuário no banco de dados
$sql = "SELECT * FROM usuarios WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Se o usuário não for encontrado, exibir erro
if (!$usuario) {
    die("Usuário não encontrado.");
}

// Atualizar os dados quando o formulário for enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sql = "UPDATE usuarios SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "<script>alert('Usuário atualizado com sucesso!'); window.location.href='select.php';</script>";
    } else {
        echo "<script>alert('Erro ao atualizar usuário!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h2 class="text-center">Editar Usuário</h2>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Nome:</label>
                    <input type="text" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Telefone:</label>
                    <input type="text" name="telefone" value="<?= htmlspecialchars($usuario['telefone']) ?>" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Atualizar</button>
            </form>
        </div>
    </div>
</body>
</html>
