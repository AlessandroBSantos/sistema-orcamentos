<?php include 'includes/menu.php'; ?>

<div class="content" id="content">

    <div class="titulo-dashboard">
        <h1>Bem-vindo, <?= htmlspecialchars($usuario) ?></h1>
        <p>Painel Administrativo LLA Software</p>
    </div>

    <div class="cards">

        <div class="card-info">
            <h5>Clientes</h5>
            <div class="numero azul">
                <?= $totalClientes ?>
            </div>
        </div>

        <div class="card-info">
            <h5>Produtos</h5>
            <div class="numero verde">
                <?= $totalProdutos ?>
            </div>
        </div>

        <div class="card-info">
            <h5>Orçamentos</h5>
            <div class="numero laranja">
                <?= $totalOrcamentos ?>
            </div>
        </div>

        <div class="card-info">
            <h5>Faturamento</h5>
            <div class="numero vermelho">
                R$ <?= number_format($totalFaturamento,2,',','.') ?>
            </div>
        </div>

    </div>

    <div class="painel">

        <h3 class="mb-4">
            Últimos Orçamentos
        </h3>

        <div class="table-responsive">

            <table class="table table-dark table-hover">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Valor</th>
                        <th>Status</th>
                        <th>Data</th>
                    </tr>
                </thead>

                <tbody>

                <?php foreach($ultimosOrcamentos as $orcamento): ?>

                    <tr>

                        <td><?= $orcamento['id'] ?></td>

                        <td>
                            <?= htmlspecialchars($orcamento['nome']) ?>
                        </td>

                        <td>
                            R$ <?= number_format($orcamento['total'],2,',','.') ?>
                        </td>

                        <td>
                            <?= ucfirst($orcamento['status']) ?>
                        </td>

                        <td>
                            <?= date('d/m/Y',strtotime($orcamento['criado_em'])) ?>
                        </td>

                    </tr>

                <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>