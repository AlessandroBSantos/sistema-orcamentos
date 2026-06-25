<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once 'config/conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

$usuario = $_SESSION['usuario_nome'];

/*
|--------------------------------------------------------------------------
| Estatísticas
|--------------------------------------------------------------------------
*/

$totalClientes = $pdo->query("
    SELECT COUNT(*) FROM clientes
")->fetchColumn();

$totalProdutos = $pdo->query("
    SELECT COUNT(*) FROM produtos
")->fetchColumn();

$totalOrcamentos = $pdo->query("
    SELECT COUNT(*) FROM orcamentos
")->fetchColumn();

$totalFaturamento = $pdo->query("
    SELECT COALESCE(SUM(total),0)
    FROM orcamentos
")->fetchColumn();

/*
|--------------------------------------------------------------------------
| Últimos Orçamentos
|--------------------------------------------------------------------------
*/

$ultimosOrcamentos = $pdo->query("
    SELECT
        o.id,
        c.nome,
        o.total,
        o.status,
        o.criado_em

    FROM orcamentos o

    LEFT JOIN clientes c
        ON c.id = o.cliente_id

    ORDER BY o.id DESC
    LIMIT 10
")->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Dashboard - LLA Software</title>

<link rel="stylesheet" href="/sistema-orcamentos/assets/css/menu.css">
<link rel="stylesheet" href="/sistema-orcamentos/assets/css/style.css">

</head>

<body>
<body data-bs-theme="dark">
<?php include 'includes/menu.php'; ?>

<div class="content" id="content">

    <div class="titulo-dashboard">

        <h1>
            Bem-vindo, <?= htmlspecialchars($usuario) ?>
        </h1>

        <p>
            Painel Administrativo LLA Software
        </p>

    </div>

    <div class="cards">

        <div class="card-info">

            <h5>Clientes</h5>

            <div class="numero azul">
                <?= $totalClientes ?>
            </div>

        </div>

        <div class="card-info">

            <h5>Produtos</h5>

            <div class="numero verde">
                <?= $totalProdutos ?>
            </div>

        </div>

        <div class="card-info">

            <h5>Orçamentos</h5>

            <div class="numero laranja">
                <?= $totalOrcamentos ?>
            </div>

        </div>

        <div class="card-info">

            <h5>Faturamento</h5>

            <div class="numero vermelho">
                R$ <?= number_format($totalFaturamento,2,',','.') ?>
            </div>

        </div>

    </div>

    <div class="painel">

        <h3 class="mb-4">
            Últimos Orçamentos
        </h3>

        <div class="table-responsive">

            <table class="table table-dark table-hover align-middle">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Valor</th>
                        <th>Status</th>
                        <th>Data</th>
                    </tr>

                </thead>

                <tbody>

                <?php if(count($ultimosOrcamentos) > 0): ?>

                    <?php foreach($ultimosOrcamentos as $orcamento): ?>

                        <tr>

                            <td>
                                <?= $orcamento['id'] ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($orcamento['nome'] ?? 'Sem Cliente') ?>
                            </td>

                            <td>
                                R$ <?= number_format($orcamento['total'],2,',','.') ?>
                            </td>

                            <td>

                                <?php

                                switch($orcamento['status']){

                                    case 'aprovado':
                                        echo '<span class="badge bg-success">Aprovado</span>';
                                    break;

                                    case 'reprovado':
                                        echo '<span class="badge bg-danger">Reprovado</span>';
                                    break;

                                    case 'enviado':
                                        echo '<span class="badge bg-primary">Enviado</span>';
                                    break;

                                    default:
                                        echo '<span class="badge bg-warning text-dark">Rascunho</span>';
                                    break;
                                }

                                ?>

                            </td>

                            <td>
                                <?= date('d/m/Y', strtotime($orcamento['criado_em'])) ?>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>

                        <td colspan="5" class="text-center">

                            Nenhum orçamento encontrado.

                        </td>

                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<script src="/sistema-orcamentos/assets/js/menu.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>