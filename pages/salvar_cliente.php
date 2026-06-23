<?php

require '../config/conexao.php';

$stmt = $pdo->prepare("
INSERT INTO clientes
(
nome,
cpf_cnpj,
telefone,
whatsapp,
email
)
VALUES
(
?,
?,
?,
?,
?
)
");

$stmt->execute([
$_POST['nome'],
$_POST['cpf_cnpj'],
$_POST['telefone'],
$_POST['whatsapp'],
$_POST['email']
]);

header("Location: clientes.php?sucesso=1");