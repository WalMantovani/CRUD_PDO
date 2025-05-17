<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card p-4 shadow-sm">
            <h2 class="text-center">Cadastro de Usuário</h2>
            <form action="insert.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Nome:</label>
                    <input type="text" name="nome" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Telefone:</label>
                    <input type="text" name="telefone" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
            </form>
        </div>
    </div>
</body>
</html>

