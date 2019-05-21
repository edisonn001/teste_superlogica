<?php
  include('../../conexao/FConexao.php');
  include('../../biblioteca/bibliotecaFuncoes.php');
  $sql = "SELECT * FROM produto ORDER BY descricao";
  $resSql = mysqli_query($conexao, $sql);
?>

<div class="card" style="width: 100%">
  <div class="card-body">
  <button type="button" class="btn btn-success" onclick="__carregarPagina('FCadProduto.php','Produto','1','');" style="float:right">
        <i class="fa fa-plus" style="padding-right:5px;"></i>Novo Produto
    </button>
  <h5 class="card-title" style="padding-top:4px;">Listagem de Produto (s)</h5>  
  <hr>
  <br>
    <div class="table-responsive">
        <table id="tbl_produtos" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="text-align:center;">Código</th>
                    <th style="text-align:center;">Descrição</th>
                    <th style="text-align:center;">Quantidade</th>
                    <th style="text-align:center;">Preço</th>
                    <th style="text-align:center;">Preço Total</th>
                    <th style="text-align:center;">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($dados = mysqli_fetch_assoc($resSql)){
                ?>
                <tr>
                    <td style="text-align:left;"><?php echo $dados['codigo']?></td>
                    <td style="text-align:left;"><?php echo $dados['descricao']?></td>
                    <td style="text-align:right;"><?php echo $dados['quantidade']?></td>
                    <td style="text-align:right;"><?php echo __Arred($dados['preco'])?></td>
                    <td style="text-align:right;"><?php echo __Arred($dados['precoTotal'])?></td>
                        <td width="90">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Ações<span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu" style="margin-top:5px;">
                                <li><a href="javascript:void(0);" class="dropdown-item" onClick="__carregarPagina('FCadProduto.php','FCadProduto','2','<?php echo $dados['codigo']?>');" title="Alterar registro"><i class="btn btn-warning btn-sm fa fa fa-edit" style="margin-right:3px;"></i>Alterar</a></li>
                                <div class="dropdown-divider"></div>
                                
                                <li><a href="javascript:void(0);" class="dropdown-item" onClick="__carregarPagina('FCadProduto.php','FCadProduto','3','<?php echo $dados['codigo']?>');" title="Excluir registro"><i class="btn btn-danger btn-sm fa fa fa-trash" style="margin-right:3px;"></i>Excluir</a></li>
                                <div class="dropdown-divider"></div>
                                
                                <li><a href="javascript:void(0);" class="dropdown-item" onClick="__carregarPagina('FCadProduto.php','FCadProduto','4','<?php echo $dados['codigo']?>');" title="Detalhes do registro"><i class="btn btn-info btn-sm fa fa fa-eye" style="margin-right:3px;"></i>Detalhes</a></li>
                            </ul>
                        </td>
                </tr>
                <?php
                }//fim while listagem dos dados
                ?>
            </tbody>
        </table>
    </div>
  </div>
</div>
<!-- paginacao -->
<script>
    $(document).ready(function() {
    $('#tbl_produtos').DataTable( {
        "paging":   true,
        "ordering": true,
        "info":     true,
        "sEmptyTable": "Nenhum registro encontrado",
        stateSave: true,
		"oLanguage": {
            "sLengthMenu": "Mostrar _MENU_ Registro por Páginas",
            "sZeroRecords": "Nenhum registro encontrado",
            "sInfo": "Mostrando _START_ / _END_ de _TOTAL_ Registro(s)",
            "sInfoEmpty": "Mostrando 0 / 0 de 0 Registro",
            "sInfoFiltered": "(filtrado de _MAX_ registros)",
            "sSearch": "Pesquisar: ",
            "oPaginate": {
                "sFirst": "Início",
                "sPrevious": "Anterior",
                "sNext": "Próximo",
                "sLast": "Último"
            }
        },
        "aaSorting": [[0, 'desc']],
        "aoColumnDefs": [
            {"sType": "num-html", "aTargets": [0]}
 
        ]	
		
    } );
	
} );
</script>
