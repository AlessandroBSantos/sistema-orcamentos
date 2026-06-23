<?php
session_start();
require '../config/conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#f4f6f9;
        }

        .card{
            border:none;
            border-radius:15px;
        }

        .page-title{
            font-weight:600;
            color:#0d6efd;
        }

    </style>

</head>

<body>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">

                    <h4 class="mb-0">
                        Cadastro de Clientes
                    </h4>

                </div>

                <div class="card-body">

                    <?php if(isset($_GET['sucesso'])): ?>

                        <div class="alert alert-success">
                            Cliente cadastrado com sucesso!
                        </div>

                    <?php endif; ?>

                    <form method="POST" action="salvar_cliente.php">

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

                            <div class="col-md-3 mb-3">
                                <label class="form-label">
                                    CEP
                                </label>

                                <input
                                    type="text"
                                    name="cep"
                                    class="form-control">
                            </div>

                            <div class="col-md-7 mb-3">
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

                        <div class="d-flex justify-content-end">

                            <button
                                type="submit"
                                class="btn btn-success">

                                Salvar Cliente

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>