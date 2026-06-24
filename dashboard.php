<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

$usuario = $_SESSION['usuario_nome'];
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

.table{
    color:white;
}

</style>

</head>

<body>

<div class="sidebar">

    <div class="logo">
        <span>LLA</span> Software
    </div>

    <div class="menu">

        <a href="#">
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
        Bem-vindo, <?= $usuario ?>
    </h2>

    <div class="row">

        <div class="col-md-3 mb-3">

            <div class="card-dashboard">

                <h6>Clientes</h6>

                <div class="valor azul">
                    15
                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card-dashboard">

                <h6>Orçamentos</h6>

                <div class="valor verde">
                    42
                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card-dashboard">

                <h6>Aprovados</h6>

                <div class="valor amarelo">
                    28
                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card-dashboard">

                <h6>Faturamento</h6>

                <div class="valor vermelho">
                    R$ 89.000
                </div>

            </div>

        </div>

    </div>

    <div class="card-dashboard mt-4">

        <h4>Últimos Orçamentos</h4>

        <table class="table mt-3">

            <thead>

                <tr>
                    <th>Código</th>
                    <th>Cliente</th>
                    <th>Valor</th>
                    <th>Status</th>
                </tr>

            </thead>

            <tbody>

                <tr>
                    <td>ORC-001</td>
                    <td>Empresa ABC</td>
                    <td>R$ 2.500,00</td>
                    <td><span class="badge bg-success">Aprovado</span></td>
                </tr>

                <tr>
                    <td>ORC-002</td>
                    <td>Empresa XYZ</td>
                    <td>R$ 1.800,00</td>
                    <td><span class="badge bg-warning">Pendente</span></td>
                </tr>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>