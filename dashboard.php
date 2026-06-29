<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

$usuario = $_SESSION['usuario_nome'];
?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - LLA Software</title>

    <!-- CSS -->

    <link rel="stylesheet" href="/sistema-orcamentos/assets/css/reset.css">

    <link rel="stylesheet" href="/sistema-orcamentos/assets/css/variables.css">

    <link rel="stylesheet" href="/sistema-orcamentos/assets/css/layout.css">

    <link rel="stylesheet" href="/sistema-orcamentos/assets/css/menu.css">

    <link rel="stylesheet" href="/sistema-orcamentos/assets/css/dashboard.css">

</head>

<body>

    <!-- MENU -->

    <?php include 'includes/menu.php'; ?>


    <!-- CONTEÚDO -->

    <main class="content" id="content">

        <div class="container">

            <header class="topo">

                <h1>Dashboard</h1>

                <p>

                    Bem-vindo,

                    <strong><?= htmlspecialchars($usuario) ?></strong>

                </p>

            </header>


            <section class="dashboard">

                <h2>LLA Software</h2>

                <p>

                    Sistema de gerenciamento de orçamentos.

                </p>

            </section>

        </div>

    </main>


    <!-- JAVASCRIPT -->

    <script src="/sistema-orcamentos/assets/js/menu.js"></script>

    <script src="/sistema-orcamentos/assets/js/app.js"></script>

</body>

</html>