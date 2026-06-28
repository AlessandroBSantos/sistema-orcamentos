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

<link rel="stylesheet" href="/sistema-orcamentos/assets/css/variables.css">
<link rel="stylesheet" href="/sistema-orcamentos/assets/css/style.css">
<link rel="stylesheet" href="/sistema-orcamentos/assets/css/menu.css">
<link rel="stylesheet" href="/sistema-orcamentos/assets/css/dashboard.css">
<link rel="stylesheet" href="/sistema-orcamentos/assets/css/cards.css">
<link rel="stylesheet" href="/sistema-orcamentos/assets/css/table.css">
<link rel="stylesheet" href="/sistema-orcamentos/assets/css/buttons.css">
<link rel="stylesheet" href="/sistema-orcamentos/assets/css/forms.css">
<link rel="stylesheet" href="/sistema-orcamentos/assets/css/responsive.css">
</head>

<body>
<body data-bs-theme="dark">
<?php include 'includes/menu.php'; ?>

<script src="/sistema-orcamentos/assets/js/menu.js"></script>
<script src="/sistema-orcamentos/assets/js/dashboard.js"></script>
<script src="/sistema-orcamentos/assets/js/app.js"></script>
</body>
</html>