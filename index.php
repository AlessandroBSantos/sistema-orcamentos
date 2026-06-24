<!DOCTYPE html>

<html lang="pt-br">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>LLA Software</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:#0F172A;
    color:white;
    overflow-x:hidden;
}

/* FUNDO */

.background-slider{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    z-index:-2;
}

.slide{
    position:absolute;
    width:100%;
    height:100%;
    opacity:0;
    transition:opacity 2s ease-in-out;
    background-size:cover;
    background-position:center;
}

.slide.active{
    opacity:1;
}

.slide:nth-child(1){
    background-image:url('assets/img/datacenter.jpg');
}

.slide:nth-child(2){
    background-image:url('assets/img/rede.jpg');
}

.slide:nth-child(3){
    background-image:url('assets/img/programacao.jpg');
}

.slide:nth-child(4){
    background-image:url('assets/img/automacao.jpg');
}

.background-slider::after{
    content:'';
    position:absolute;
    width:100%;
    height:100%;
    top:0;
    left:0;
    background:rgba(0,0,0,.75);
}

/* MENU */

.navbar{
    background:rgba(0,0,0,.4)!important;
    backdrop-filter:blur(10px);
}

/* HERO */

.hero{
    min-height:100vh;
    display:flex;
    align-items:center;
}

.hero h1{
    font-size:4rem;
    font-weight:800;
}

.hero p{
    font-size:1.3rem;
    margin-top:20px;
}

.btn-sistema{
    margin-top:25px;
    padding:15px 35px;
    font-size:20px;
}

/* SERVIÇOS */

.servicos{
    margin-top:50px;
}

.card-servico{
    background:rgba(255,255,255,.08);
    backdrop-filter:blur(10px);
    border-radius:20px;
    padding:25px;
    text-align:center;
    transition:.3s;
    cursor:pointer;
    height:100%;
}

.card-servico:hover{
    transform:translateY(-10px);
    background:rgba(6,182,212,.25);
}

.card-servico h5{
    margin-top:15px;
}

.card-servico i{
    font-size:40px;
    color:#06B6D4;
}

footer{
    background:rgba(0,0,0,.5);
    padding:30px;
    text-align:center;
}

</style>

</head>

<body>

<div class="background-slider">

```
<div class="slide active"></div>
<div class="slide"></div>
<div class="slide"></div>
<div class="slide"></div>
```

</div>

<nav class="navbar navbar-expand-lg navbar-dark">

<div class="container">

<a class="navbar-brand fw-bold" href="#">
LLA Software
</a>

</div>

</nav>

<section class="hero">

<div class="container">

<div class="row align-items-center">

<div class="col-lg-7">

<h1>
Soluções em Tecnologia
</h1>

<p>
Desenvolvimento Web, Redes, Automação, Monitoramento,
VoIP, Mikrotik, Infraestrutura e Sistemas Corporativos.
</p>

<a href="/sistema-orcamentos/login.php"
class="btn btn-info btn-lg btn-sistema">

Acessar Sistema

</a>

</div>

<div class="col-lg-5 text-center">

<img
src="https://cdn-icons-png.flaticon.com/512/1055/1055687.png"
class="img-fluid"
width="350">

</div>

</div>

<div class="servicos">

<div class="row g-4">

<div class="col-md-3">
<div class="card-servico">
<i class="bi bi-code-slash"></i>
<h5>Desenvolvimento Web</h5>
<p>Sites, sistemas web e aplicações personalizadas.</p>
</div>
</div>

<div class="col-md-3">
<div class="card-servico">
<i class="bi bi-diagram-3"></i>
<h5>Redes</h5>
<p>Projetos, WiFi corporativo e cabeamento estruturado.</p>
</div>
</div>

<div class="col-md-3">
<div class="card-servico">
<i class="bi bi-cpu"></i>
<h5>Automação</h5>
<p>Automação predial, industrial e IoT.</p>
</div>
</div>

<div class="col-md-3">
<div class="card-servico">
<i class="bi bi-bar-chart"></i>
<h5>Monitoramento</h5>
<p>Zabbix, Grafana e monitoramento corporativo.</p>
</div>
</div>

<div class="col-md-3">
<div class="card-servico">
<i class="bi bi-telephone"></i>
<h5>VoIP</h5>
<p>PABX Asterisk e telefonia IP.</p>
</div>
</div>

<div class="col-md-3">
<div class="card-servico">
<i class="bi bi-router"></i>
<h5>Mikrotik</h5>
<p>VPN, Firewall, Failover e Load Balance.</p>
</div>
</div>

<div class="col-md-3">
<div class="card-servico">
<i class="bi bi-hdd-network"></i>
<h5>Infraestrutura</h5>
<p>Servidores Linux, Proxmox e Data Center.</p>
</div>
</div>

<div class="col-md-3">
<div class="card-servico">
<i class="bi bi-camera-video"></i>
<h5>CFTV</h5>
<p>Monitoramento IP e segurança eletrônica.</p>
</div>
</div>

</div>

</div>

</div>

</section>

<footer>

© 2026 LLA Software - Alessandro Batista

</footer>

<script>

const slides = document.querySelectorAll('.slide');

let atual = 0;

setInterval(() => {

    slides[atual].classList.remove('active');

    atual++;

    if(atual >= slides.length){
        atual = 0;
    }

    slides[atual].classList.add('active');

}, 5000);

</script>

</body>
</html>
