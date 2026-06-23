<?php

session_start();

if (!isset($_SESSION['usuario_id'])) {

    header("Location: login.php");
    exit;
}

include 'includes/header.php';
?>

<div class="container mt-5">

    <div class="alert alert-success">

        Bem-vindo,
        <strong><?= $_SESSION['usuario_nome']; ?></strong>

    </div>

    <h2>Sistema de Orçamentos</h2>

</div>

<?php include 'includes/footer.php'; ?>