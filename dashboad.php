<?php

session_start();

include '../includes/header.php';
include '../includes/menu.php';

?>

<div class="container mt-4">

<h2 class="mb-4">
Painel de Orçamentos
</h2>

<div class="row">

<div class="col-md-3">

<div class="card card-dark p-3">

<h6>Orçamentos</h6>

<div class="card-number">
0
</div>

</div>

</div>

<div class="col-md-3">

<div class="card card-dark p-3">

<h6>Aprovados</h6>

<div class="card-number text-success">
0
</div>

</div>

</div>

<div class="col-md-3">

<div class="card card-dark p-3">

<h6>Pendentes</h6>

<div class="card-number text-warning">
0
</div>

</div>

</div>

<div class="col-md-3">

<div class="card card-dark p-3">

<h6>Reprovados</h6>

<div class="card-number text-danger">
0
</div>

</div>

</div>

</div>

<div class="row mt-4">

<div class="col-md-8">

<div class="card card-dark p-3">

<h5>Orçamentos Recentes</h5>

<table class="table table-dark">

<thead>

<tr>

<th>Código</th>
<th>Cliente</th>
<th>Valor</th>
<th>Status</th>

</tr>

</thead>

<tbody>

<tr>

<td>ORC-001</td>
<td>Cliente Teste</td>
<td>R$ 1.500,00</td>
<td>
<span class="badge bg-success">
Aprovado
</span>
</td>

</tr>

</tbody>

</table>

</div>

</div>

<div class="col-md-4">

<div class="card card-dark p-3">

<h5>Atividades</h5>

<p>
Sistema iniciado com sucesso.
</p>

</div>

</div>

</div>

</div>

</body>
</html>