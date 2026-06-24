<?php

session_start();
require '../config/conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../login.php");
    exit;
}

$id = $_POST['id'];

$stmt = $pdo->prepare("
    UPDATE clientes SET
        nome = ?,
        cpf_cnpj = ?,
        telefone = ?,
        whatsapp = ?,
        email = ?,
        cep = ?,
        endereco = ?,
        numero = ?,
        bairro = ?,
        cidade = ?,
        estado = ?,
        observacoes = ?
    WHERE id = ?
");

$stmt->execute([
    $_POST['nome'],
    $_POST['cpf_cnpj'],
    $_POST['telefone'],
    $_POST['whatsapp'],
    $_POST['email'],
    $_POST['cep'],
    $_POST['endereco'],
    $_POST['numero'],
    $_POST['bairro'],
    $_POST['cidade'],
    $_POST['estado'],
    $_POST['observacoes'],
    $id
]);

header("Location: clientes.php?editado=1");
exit;