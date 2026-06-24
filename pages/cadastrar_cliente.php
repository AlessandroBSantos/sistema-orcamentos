<?php

session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Novo Cliente - LLA Software</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

<style>

:root{
    --bg:#0F172A;
    --card:#111827;
    --azul:#06B6D4;
    --verde:#22C55E;
}

body{
    background:var(--bg);
    color:white;
}

.card-form{
    background:var(--card);
    border:none;
    border-radius:15px;
}

.form-control{
    background:#1E293B;
    border:1px solid #334155;
    color:white;
}

.form-control:focus{
    background:#1E293B;
    color:white;
    border-color:var(--azul);
    box-shadow:none;
}

.form-label{
    color:#CBD5E1;
}

.titulo{
    color:var(--azul);
}

</style>

</head>

<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-4">

        <h2 class="titulo">
            <i class="fa fa-user-plus"></i>
            Novo Cliente
        </h2>

        <a href="clientes.php" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i>
            Voltar
        </a>

    </div>

    <div class="card card-form">

        <div class="card-body p-4">

            <form action="salvar_cliente.php" method="POST">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Nome Completo
                        </label>

                        <input
                            type="text"
                            name="nome"
                            class="form-control"
                            required>

                    </div>

                    <div class="col-md-3 mb-3">

                        <label class="form-label">
                            CPF/CNPJ
                        </label>

                        <input
                            type="text"
                            name="cpf_cnpj"
                            class="form-control">

                    </div>

                    <div class="col-md-3 mb-3">

                        <label class="form-label">
                            Telefone
                        </label>

                        <input
                            type="text"
                            name="telefone"
                            class="form-control">

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            WhatsApp
                        </label>

                        <input
                            type="text"
                            name="whatsapp"
                            class="form-control">

                    </div>

                    <div class="col-md-8 mb-3">

                        <label class="form-label">
                            E-mail
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control">

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-2 mb-3">

                        <label class="form-label">
                            CEP
                        </label>

                        <input
                            type="text"
                            name="cep"
                            class="form-control">

                    </div>

                    <div class="col-md-8 mb-3">

                        <label class="form-label">
                            Endereço
                        </label>

                        <input
                            type="text"
                            name="endereco"
                            class="form-control">

                    </div>

                    <div class="col-md-2 mb-3">

                        <label class="form-label">
                            Número
                        </label>

                        <input
                            type="text"
                            name="numero"
                            class="form-control">

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            Bairro
                        </label>

                        <input
                            type="text"
                            name="bairro"
                            class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Cidade
                        </label>

                        <input
                            type="text"
                            name="cidade"
                            class="form-control">

                    </div>

                    <div class="col-md-2 mb-3">

                        <label class="form-label">
                            UF
                        </label>

                        <input
                            type="text"
                            name="estado"
                            maxlength="2"
                            class="form-control">

                    </div>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Observações
                    </label>

                    <textarea
                        name="observacoes"
                        rows="4"
                        class="form-control"></textarea>

                </div>

                <div class="text-end">

                    <button
                        type="submit"
                        class="btn btn-success">

                        <i class="fa fa-save"></i>
                        Salvar Cliente

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>