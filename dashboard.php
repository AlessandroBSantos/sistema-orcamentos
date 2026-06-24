<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'config/conexao.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
$usuario = $_SESSION['usuario_nome'];
// Estatísticas
$totalClientes = $pdo->query("SELECT COUNT(*) FROM clientes")->fetchColumn();
$totalProdutos = $pdo->query("SELECT COUNT(*) FROM produtos")->fetchColumn();
$totalOrcamentos = $pdo->query("SELECT COUNT(*) FROM orcamentos")->fetchColumn();
$totalFaturamento = $pdo->query("
    SELECT COALESCE(SUM(total),0)
    FROM orcamentos
")->fetchColumn();
// Últimos orçamentos
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

<link rel="stylesheet" href="/sistema-orcamentos/assets/css/menu.css">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard - LLA Software</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
<style>
:root{
    --bg:#0F172A;
    --menu:#1E293B;
    --card:#111827;
    --azul:#06B6D4;
    --verde:#22C55E;
    --amarelo:#F59E0B;
    --vermelho:#EF4444;
}
body{
    background:var(--bg);
    color:white;
    margin:0;
    overflow-x:hidden;
}
.content.menu-aberto{
    margin-left:250px;
}
.content{
    padding:30px;
    transition:all .3s ease;
    margin-left:0;
}

.content.menu-aberto{
    margin-left:250px;
}
@media(max-width:768px){

    .content.menu-aberto{
        margin-left:0;
        width:100%;
    }

}
</style>
</head>
<body>
    <?php include 'includes/menu.php'; ?>
<div class="content" id="content">
<div class="topo">
    <h2>
        Bem-vindo,
        <?= htmlspecialchars($usuario) ?>
    </h2>
</div>
<div class="row">
    <div class="col-md-3 mb-3">
        <div class="card-dashboard">
            <h6>Clientes</h6>
            <div class="valor azul">
                <?= $totalClientes ?>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card-dashboard">
            <h6>Produtos</h6>
            <div class="valor verde">
                <?= $totalProdutos ?>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card-dashboard">
            <h6>Orçamentos</h6>
            <div class="valor amarelo">
                <?= $totalOrcamentos ?>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card-dashboard">
            <h6>Faturamento</h6>
            <div class="valor vermelho">
                R$ <?= number_format($totalFaturamento,2,',','.') ?>
            </div>
        </div>
    </div>
</div>
<div class="card-dashboard mt-4">
    <h4 class="mb-4">
        Últimos Orçamentos
    </h4>
    <div class="table-responsive">
        <table class="table table-dark table-hover">
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
            <?php foreach($ultimosOrcamentos as $orcamento): ?>
                <tr>
                    <td><?= $orcamento['id'] ?></td>
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
                            echo '<span class="badge bg-warning">Rascunho</span>';
                            break;
                    }
                    ?>
                    </td>
                    <td>
                        <?= date('d/m/Y', strtotime($orcamento['criado_em'])) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>
<script src="assets/js/menu.js"></script>
</body>
</html>
