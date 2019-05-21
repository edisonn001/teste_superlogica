function __gerenciarProduto(vAcao,vCodigoProduto){
    var vCodigo = vCodigoProduto;//codigo do produto
	if(__validaCampos('Produto',vAcao)) {
        var vMsg = "";
        if (vAcao == 1) {
            vMsg = "Registro (s) SALVO com Sucesso.";
            vCodigo = $("#txtCodigo").val();
        }else if (vAcao == 2) {
            vMsg = "Registro (s) ALTERADO com Sucesso.";
        }else if (vAcao == 3) {
            vMsg = "Registro (s) REMOVIDO com Sucesso.";
        }

        $(".vbtn_acao").hide();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "php/paginas/cadastro/FCadProdutoAction.php",
            async: true,
			data: $("#FCadProduto").serialize()+"&vAcao="+vAcao+"&txtCodigo="+vCodigo,
            success: function (vResposta) {
                if (vResposta == 1) {
                  $("#vRetornoProduto").empty();
                  $("#vRetornoProduto").show();
                  $("#vRetornoProduto").html('<div class="alert alert-success alert-dismissible fade show" role="alert">' + vMsg + 
					'<button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' + '</button>\n' +
                    '</div>');                    
                    $("#vRetornoProduto").fadeOut(3000);
                    if (vAcao == 1) {//insert
                        $("#FCadProduto").each(function(){ this.reset(); });//limpa campos do form
                        setTimeout(function () {
                            __carregarPagina('FCadProduto.php', 'FCadProduto', '1','');
                        }, 3000);
                    }
                    else if( (vAcao == 2) || (vAcao == 3)){//update, delete
                        setTimeout(function () {
                        __carregarPagina('FLisProduto.php', 'FLisProduto', '2','');
                        }, 3000);
                    }
                }
                else{
                    //exibe erros
                    $(".vbtn_acao").show();
                    $("#vRetornoProduto").empty();
                    $("#vRetornoProduto").show();
                    $("#vRetornoProduto").html('<div class="alert alert-danger alert-dismissible fade show" role="alert">' + vResposta + 
					'<button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                 '<span aria-hidden="true">&times;</span>\n' + '</button>\n' +
                 '</div>');
                $("#vRetornoProduto").fadeOut(10000);
              }
            }//fim success
        });//fim $.ajax
    }//fim __validaCampos
}//fim function

//calcula o total do produto final
function __calcularTotalProduto(){
    $.ajax({
		type: 'POST',
		dataType: 'html',
		url: 'php/biblioteca/FCalculaTotalProduto.php',
		async: true,
		data: {
			   QUANTIDADE: $('#txtQuantidade').val(),
		       PRECO: $('#txtPreco').val(),
			   },
		  success: function(vResposta) {
               vResposta = vResposta.replace(/(?:(?:^|\n)\s+|\s+(?:$|\n))/g,'').replace(/\s+/g,' ');
               $('#txtPrecoTotal').val(vResposta); 			     
		  }//fim success
	  });//fim $.ajax
}