function __gerarInventarioProduto(){
    $("#btn_gera_inventario").hide();
    document.getElementById('btb_processando').style.display = 'inline';
    $.ajax({
		type: 'POST',
		dataType: 'html',
		url: "php/paginas/cadastro/FCadProdutoGeraInventarioAction.php",
		async: true,
        data: {},
        success: function(vResposta) {
            $("#btn_gera_inventario").show();
            document.getElementById('btb_processando').style.display = 'none';
            vResposta = vResposta.replace(/(?:(?:^|\n)\s+|\s+(?:$|\n))/g,'').replace(/\s+/g,' ');
            vResposta = vResposta.split("|");
            if(vResposta[0] == '200'){//sucesso ao gerar o boleto
                window.open(vResposta[2],'_blank');//abre o boleto em um nova guia para impressao
            }
            else{
                $("#btn_gera_inventario").show();
                document.getElementById('btb_processando').style.display = 'none';
                //exibe o erro se tiver
                $("#vRetornoInventario").empty();
                $("#vRetornoInventario").show();
                $("#vRetornoInventario").html('<div class="alert alert-danger alert-dismissible fade show" role="alert">' + vResposta[1] + 
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                '<span aria-hidden="true">&times;</span>\n' + '</button>\n' +
                '</div>');
                $("#vRetornoInventario").fadeOut(10000);
            }
        }//fim success
	  });//fim $.ajax
}//fim function

