<?php
    include('../../conexao/FConexao.php');
    include('../../biblioteca/bibliotecaFuncoes.php');
    //verifica se existe produto para exibir o botão de gerar inventario
    $sqlVerificaProduto = "SELECT codigo FROM produto";
    $resVerificaProduto = mysqli_query($conexao, $sqlVerificaProduto);            
?>
<div class="card" style="width: 100%">
    <div class="card-body">
        <h5 class="card-title" style="padding-top:4px;">Gerar Inventário de Produto (s)</h5>  
        <hr>
        
            <div id="vRetornoInventario"></div>
            <form id="FCadProduto" name="FCadProduto">
                <?php
                //só vai exibir o botão para gerar o inventario, se tiver produto
                if(mysqli_num_rows($resVerificaProduto) > 0){?>
                    <div class="btn-group">       
                        <button type="button" class="btn btn-success btn btn-lg" id="btn_gera_inventario" name="btn_gera_inventario" onclick="__gerarInventarioProduto();">
                            <i class="fa fa-check" style="padding-right:5px;"></i>Gerar Inventário de Produto (s)
                        </button>
                        <button class="btn btn-primary" disabled id="btb_processando" style="display:none;">
                            <span class="spinner-border spinner-border-sm"></span>
                                Aguarde o Processamento...
                        </button>
                    </div> 
                <?php
                }else{?>
                    <div class="alert alert-danger" role="alert"><strong>Sem produto (s), </strong>Não há produto (s) cadastrado (s) para Gerar o (s) Inventário (s), cadastre pelo menos um PRODUTO.</div>
                    <?php
                }
                ?>
            </form>
    </div>
</div>