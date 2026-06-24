<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once 'config/conexao.php';



session_start();
require_once 'config/conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

$usuario = $_SESSION['usuario_nome'];

// Totais
$totalClientes = $pdo->query("SELECT COUNT(*) FROM clientes")->fetchColumn();

$totalProdutos = $pdo->query("SELECT COUNT(*) FROM produtos")->fetchColumn();

$totalOrcamentos = $pdo->query("SELECT COUNT(*) FROM orcamentos")->fetchColumn();

// Ajuste o nome do campo se necessário
$totalFaturamento = $pdo->query("
    SELECT COALESCE(SUM(valor_total),0)
    FROM orcamentos
")->fetchColumn();

// Últimos orçamentos
$ultimosOrcamentos = $pdo->query("
    SELECT *
    FROM orcamentos
    ORDER BY id DESC
    LIMIT 10
")->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

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
}

.sidebar{
    width:250px;
    height:100vh;
    background:var(--menu);
    position:fixed;
    left:0;
    top:0;
}

.logo{
    padding:20px;
    text-align:center;
    font-size:24px;
    font-weight:bold;
    border-bottom:1px solid #334155;
}

.logo span{
    color:var(--azul);
}

.menu{
    padding:20px;
}

.menu a{
    display:block;
    color:white;
    text-decoration:none;
    padding:12px;
    margin-bottom:5px;
    border-radius:10px;
}

.menu a:hover{
    background:#334155;
}

.content{
    margin-left:250px;
    padding:30px;
}

.card-dashboard{
    background:var(--card);
    border-radius:15px;
    padding:20px;
    min-height:130px;
}

.valor{
    font-size:32px;
    font-weight:bold;
}

.verde{
    color:var(--verde);
}

.azul{
    color:var(--azul);
}

.amarelo{
    color:var(--amarelo);
}

.vermelho{
    color:var(--vermelho);
}

.table-dark{
    --bs-table-bg:#111827;
}

</style>

</head>

<body>

<div class="sidebar">

    <div class="logo">
        <span>LLA</span> Software
    </div>

    <div class="menu">

        <a href="dashboard.php">
            <i class="fa fa-chart-line"></i>
            Dashboard
        </a>

        <a href="pages/clientes.php">
            <i class="fa fa-users"></i>
            Clientes
        </a>

        <a href="#">
            <i class="fa fa-box"></i>
            Produtos
        </a>

        <a href="#">
            <i class="fa fa-file-invoice-dollar"></i>
            Orçamentos
        </a>

        <a href="#">
            <i class="fa fa-chart-pie"></i>
            Financeiro
        </a>

        <a href="#">
            <i class="fa fa-cog"></i>
            Configurações
        </a>

        <a href="logout.php">
            <i class="fa fa-sign-out-alt"></i>
            Sair
        </a>

    </div>

</div>

<div class="content">

    <h2 class="mb-4">
        Bem-vindo, <?= htmlspecialchars($usuario) ?>
    </h2>

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

        <table class="table table-dark table-hover">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Valor</th>
                    <th>Status</th>
                </tr>

            </thead>

            <tbody>

            <?php foreach($ultimosOrcamentos as $orcamento): ?>

                <tr>

                    <td><?= $orcamento['id'] ?></td>

                    <td><?= $orcamento['cliente'] ?? '-' ?></td>

                    <td>
                        R$ <?= number_format($orcamento['valor_total'] ?? 0,2,',','.') ?>
                    </td>

                    <td>

                        <?php
                        $status = $orcamento['status'] ?? 'Pendente';

                        if($status == 'Aprovado'){
                            echo '<span class="badge bg-success">Aprovado</span>';
                        } elseif($status == 'Reprovado'){
                            echo '<span class="badge bg-danger">Reprovado</span>';
                        } else {
                            echo '<span class="badge bg-warning">Pendente</span>';
                        }
                        ?>

                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>