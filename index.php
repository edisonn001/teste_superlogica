<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/bootadmin.min.css">
    <!-- Data Tables CSS -->
    <link rel="stylesheet" href="datatables/dataTables.bs4.css" />
    <link rel="stylesheet" href="datatables/dataTables.bs4-custom.css" />
    <title>Teste Superlógica Inventário</title>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand navbar-dark bg-primary">
    <a class="sidebar-toggle mr-3" href="#"><i class="fa fa-bars"></i></a>
    <a class="navbar-brand" href="#">Teste Superlógica Inventário</a>
</nav>

<div class="d-flex">
    <div class="sidebar sidebar-dark bg-dark">
        <ul class="list-unstyled">
            <li>
                <a href="#sm_expand_1" data-toggle="collapse">
                    <i class="fa fa-fw fa-edit"></i> Cadastro
                </a>
                <ul id="sm_expand_1" class="list-unstyled collapse">
                    <li><a href="#" onclick="__carregarPagina('FLisProduto.php','FLisProduto','1','');"><i class="fa fa-fw fa-database"></i>Produtos</a></li>
                </ul>
            </li>

            <li>
                <a href="#sm_expand_2" data-toggle="collapse">
                    <i class="fa fa-fw fa-balance-scale"></i> Inventário
                </a>
                <ul id="sm_expand_2" class="list-unstyled collapse">
                    <li><a href="#" onclick="__carregarPagina('FCadProdutoGeraInventario.php','FCadProdutoGeraInventario','1','');"><i class="fa fa-fw fa-database"></i>Produtos</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <!-- exibe as paginas-->
        <div id="vCarregaPagina"></div> 
    </div>
</div>

<script src="js/jquery/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
 <script src="js/bootadmin.min.js"></script>
<!-- js -->
<script src="js/global.js"></script>
<script src="js/FValidaCampos.js"></script>
<script src="js/FProduto.js"></script>
<script src="js/FProdutoInventario.js"></script>
<!-- jquery -->
<script src="js/jquery/jquery.maskMoney.js"></script><!-- mascara para tipo moeda-->
<!-- Data Tables -->
<script src="datatables/dataTables.min.js"></script>
<script src="datatables/dataTables.bootstrap.min.js"></script>
<!-- Custom Data Tables -->
<script src="datatables/custom/custom-datatables.js"></script>
<script src="datatables/custom/fixedHeader.js"></script>

</body>
</html>