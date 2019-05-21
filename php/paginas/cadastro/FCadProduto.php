<?php
    include('../../conexao/FConexao.php');
    include('../../biblioteca/bibliotecaFuncoes.php');
    $vACAO = $_GET['vACAO'];
    $vCAMPO_CHAVE = $_GET['vCAMPO_CHAVE'];
    $vTituloPagina = 'Cadastro de Produto';
    $vTituloBotao = 'Salvar Produto';
    $vCorIconeBotão = 'btn-success';
    $vIconeBotao = 'fa-save';
    $vDesabilitaCampo = '';
    $vCampoCodigo = '';

    if($vACAO == 2){
        $vTituloPagina = 'Alteração de Produto';
        $vTituloBotao = 'Alterar Produto';
        $vCorIconeBotão = 'btn-warning';
        $vIconeBotao = 'fa-edit';
        $vCampoCodigo = "readonly='readonly'";
    }
    else if( ($vACAO == 3) or ($vACAO == 4)){
        $vCampoCodigo = 'readonly';
        $vDesabilitaCampo = 'readonly';
        if($vACAO == 3){
            $vTituloPagina = 'Exclusão de Produto';
            $vTituloBotao = 'Excluir Produto';
            $vCorIconeBotão = 'btn-danger';
            $vIconeBotao = 'fa-trash';
        }else if($vACAO == 4){
            $vTituloPagina = 'Detalhes do Produto';
            $vCorIconeBotão = 'btn-warning';
            $vIconeBotao = 'fa-eye';
        }
    }
    //inicializa variaveis 
    $codigo = ''  ;
    $quantidade = 1;
    $preco = '0,00';
    $precoTotal = '0,00';

    if($vACAO <> 1){
        $sql = "SELECT * FROM produto WHERE codigo = $vCAMPO_CHAVE";
        $resSql = mysqli_query($conexao, $sql);
        $dados = mysqli_fetch_assoc($resSql);
        $codigo = $dados['codigo'];
        $descricao = $dados['descricao'];
        $quantidade = $dados['quantidade'];
        $preco = __Arred($dados['preco']);
        $precoTotal = __Arred($dados['precoTotal']);
    }

    if($vACAO == 1){
        $sqlProximoCodigo = "SELECT MAX(codigo) + 1 AS PROXIMO_CODIGO FROM produto";
        $resProximoCodigo = mysqli_query($conexao, $sqlProximoCodigo);
        $dadosProximoCodigo = mysqli_fetch_assoc($resProximoCodigo);
        $vProximoCodigo = 'Sugestão para o próximo código: '.$dadosProximoCodigo['PROXIMO_CODIGO'];
        if( ($dadosProximoCodigo['PROXIMO_CODIGO'] == 0) or ($dadosProximoCodigo['PROXIMO_CODIGO'] == '') ){
            $vProximoCodigo = 'Sugestão para o próximo código: 1';
        }
    }
?>
<div class="card" style="width: 100%">
    <div class="card-body">
        <div class="btn-group" style="float:right">
        <?php
        if($vACAO <> 4){?><!-- detalhes-->
            <button type="button" class="btn <?php echo $vCorIconeBotão?> vbtn_acao" onclick="__gerenciarProduto('<?php echo $vACAO?>','<?php echo $codigo?>');" style="margin-right:2px;">
                    <i class="fa <?php echo $vIconeBotao?>" style="padding-right:5px;"></i><?php echo $vTituloBotao?>
            </button>
            <?php
            }
        ?>
        <button type="button" class="btn btn-info vbtn_acao" onclick="__carregarPagina('FLisProduto.php','FLisProduto','1','');">
                <i class="fa fa-reply" style="padding-right:5px;"></i>Voltar
        </button>
        </div>
        <h5 class="card-title" style="padding-top:4px;"><?php echo $vTituloPagina?></h5>  
        <hr>
            <div id="vRetornoProduto"></div>
            <form id="FCadProduto" name="FCadProduto">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="Código">Código</label>
                        <input type="number" class="form-control input_obrigatorios" id="txtCodigo" name="txtCodigo" placeholder="<?php echo $vProximoCodigo?>" onkeyup="__maiuscula(this)" value="<?php echo $codigo?>" <?php echo $vCampoCodigo?>>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="Descrição">Descrição</label>
                        <input type="text" class="form-control input_obrigatorios" id="txtDescricao" name="txtDescricao" placeholder="Descrição" onkeyup="__maiuscula(this)" value="<?php echo $descricao ?? '' ?>" <?php echo $vDesabilitaCampo?>>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="Quantidade">Quantidade</label>
                        <input type="number" class="form-control input_obrigatorios" id="txtQuantidade" name="txtQuantidade" placeholder="Quantidade" onKeyPress="__calcularTotalProduto();" onKeyUp="__calcularTotalProduto();" onKeyDown="__calcularTotalProduto();" value="<?php echo $quantidade?>" <?php echo $vDesabilitaCampo?>>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="Preço">Preço</label>
                        <input type="text" class="form-control input_obrigatorios moeda" id="txtPreco" name="txtPreco" placeholder="Preço" onKeyPress="__calcularTotalProduto();" onKeyUp="__calcularTotalProduto();" onKeyDown="__calcularTotalProduto();" value="<?php echo $preco?>" <?php echo $vDesabilitaCampo?>>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="Preço Total">Preço Total</label>
                        <input type="text" class="form-control input_obrigatorios moeda" id="txtPrecoTotal" name="txtPrecoTotal" placeholder="Preço Total" readonly value="<?php echo $precoTotal?>">
                    </div>
                </div>
            </form>
    </div>
</div>

<script>
    var vAcao = <?php echo $vACAO?>;
    if(vAcao == 1){//insert
        $("#txtCodigo").focus();
    }
    else if(vAcao == 2){//update
        $("#txtDescricao").focus();
    }

    /* mascara para campo do tipo moeda / valor monetario */
    $(function(){
	    $(".moeda").maskMoney({thousands:'.', decimal:',', precision:2}); 
    })
</script>

<!-- estilo para campos obrigatorios -->
<style>
    .input_obrigatorios {
        border-left-color: #F00;
        border-left-width: medium;
}
</style>