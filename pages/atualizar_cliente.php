<?php

session_start();
require '../config/conexao.php';

$stmt = $pdo->prepare("
INSERT INTO clientes
(
    nome,
    cpf_cnpj,
    telefone,
    whatsapp,
    email,
    cep,
    endereco,
    numero,
    bairro,
    cidade,
    estado,
    observacoes
)
VALUES
(
    ?,?,?,?,?,?,?,?,?,?,?,?
)
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
    $_POST['observacoes']

]);

header("Location: clientes.php?sucesso=1");
exit;