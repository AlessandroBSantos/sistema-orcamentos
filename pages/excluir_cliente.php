<?php

session_start();
require '../config/conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../login.php");
    exit;
}

$id = $_GET['id'] ?? 0;

if ($id > 0) {

    $stmt = $pdo->prepare("
        DELETE FROM clientes
        WHERE id = ?
    ");

    $stmt->execute([$id]);
}

header("Location: clientes.php?excluido=1");
exit;