<?php

require '../config/conexao.php';

$stmt = $pdo->prepare("
    UPDATE clientes SET
        nome=?,
        cpf_cnpj=?,
        telefone=?,
        whatsapp=?,
        email=?
    WHERE id=?
");

$stmt->execute([

    $_POST['nome'],
    $_POST['cpf_cnpj'],
    $_POST['telefone'],
    $_POST['whatsapp'],
    $_POST['email'],
    $_POST['id']

]);

header("Location: clientes.php?editado=1");
exit;