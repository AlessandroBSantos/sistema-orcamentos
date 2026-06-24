<?php

session_start();
require '../config/conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../login.php");
    exit;
}

$busca = $_GET['busca'] ?? '';

if (!empty($busca)) {

    $sql = $pdo->prepare("
        SELECT *
        FROM clientes
        WHERE nome LIKE ?
        ORDER BY id DESC
    ");

    $sql->execute(["%{$busca}%"]);

} else {

    $sql = $pdo->query("
        SELECT *
        FROM clientes
        ORDER BY id DESC
    ");
}

$clientes = $sql->fetchAll(PDO::FETCH_ASSOC);

$totalClientes = count($clientes);

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Clientes - LLA Software</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

<style>

:root{
    --bg:#0F172A;
    --menu:#1E293B;
    --card:#111827;
    --azul:#06B6D4;
    --verde:#22C55E;
    --cinza:#334155;
}

body{
    background:var(--bg);
    color:white;
}

.card-dashboard{
    background:var(--card);
    border:none;
    border-radius:15px;
    padding:20px;
}

.table{
    color:white;
}

.table tbody tr:hover{
    background:#1e293b;
}

.btn-novo{
    background:var(--verde);
    border:none;
}

.btn-novo:hover{
    opacity:.9;
}

.form-control{
    background:#1e293b;
    border:1px solid #334155;
    color:white;
}

.form-control:focus{
    background:#1e293b;
    color:white;
}

</style>

</head>

<body>

<div class="container-fluid p-4">

```
<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>
        <i class="fa fa-users"></i>
        Clientes
    </h2>

    <a href="cadastrar_cliente.php"
       class="btn btn-success btn-novo">

        <i class="fa fa-plus"></i>
        Novo Cliente

    </a>

</div>

<div class="row mb-4">

    <div class="col-md-3">

        <div class="card-dashboard">

            <h6>Total de Clientes</h6>

            <h1 class="text-info">
                <?= $totalClientes ?>
            </h1>

        </div>

    </div>

</div>

<div class="card-dashboard">

    <form method="GET" class="row mb-4">

        <div class="col-md-10">

            <input
                type="text"
                name="busca"
                class="form-control"
                placeholder="Pesquisar cliente..."
                value="<?= htmlspecialchars($busca) ?>">

        </div>

        <div class="col-md-2">

            <button class="btn btn-primary w-100">

                <i class="fa fa-search"></i>
                Buscar

            </button>

        </div>

    </form>

    <div class="table-responsive">

        <table class="table table-dark table-hover align-middle">

            <thead>

                <tr>

                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF/CNPJ</th>
                    <th>Telefone</th>
                    <th>WhatsApp</th>
                    <th>E-mail</th>
                    <th width="150">Ações</th>

                </tr>

            </thead>

            <tbody>

            <?php if(count($clientes) > 0): ?>

                <?php foreach($clientes as $cliente): ?>

                    <tr>

                        <td>
                            <?= $cliente['id'] ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($cliente['nome']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($cliente['cpf_cnpj'] ?? '') ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($cliente['telefone'] ?? '') ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($cliente['whatsapp'] ?? '') ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($cliente['email'] ?? '') ?>
                        </td>

                        <td>

                            <a href="editar_cliente.php?id=<?= $cliente['id'] ?>"
                               class="btn btn-warning btn-sm">

                                <i class="fa fa-pen"></i>

                            </a>

                            <a href="excluir_cliente.php?id=<?= $cliente['id'] ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Deseja realmente excluir este cliente?')">

                                <i class="fa fa-trash"></i>

                            </a>

                        </td>

                    </tr>

                <?php endforeach; ?>

            <?php else: ?>

                <tr>

                    <td colspan="7" class="text-center">

                        Nenhum cliente cadastrado.

                    </td>

                </tr>

            <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>
```

</div>

</body>
</html>
