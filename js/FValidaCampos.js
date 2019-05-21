function __validaCampos(vForm, vAcao){
    vMsgRetorno = '<strong>O (s) campo(s) abaixo(s) é (são) obrigatório(s):</strong><br>';
	var vCont = true;
	
    if(vForm == "Produto"){
		if( (vAcao == 1) || (vAcao == 2) ){
			document.getElementById("txtCodigo").style.border =  "2px solid #009688";
			document.getElementById("txtQuantidade").style.border =  "2px solid #009688";
			document.getElementById("txtDescricao").style.border =  "2px solid #009688";		
			var vPreco = parseFloat(document.getElementById("txtPreco").value.replace(',', '.'));

			if(document.getElementById("txtCodigo").value <= 0){
				vMsgRetorno += 'O Campo Código é obrigatório!<br>';
				document.getElementById("txtCodigo").style.border =  "2px solid #FF0000";
				vCont = false;
			}

			if(document.getElementById("txtQuantidade").value <= 0){
				vMsgRetorno += 'O Campo Quantidade é obrigatório!<br>';
				document.getElementById("txtQuantidade").style.border =  "2px solid #FF0000";
				vCont = false;
			}
			
			if(document.getElementById("txtDescricao").value == ""){
				vMsgRetorno += 'O Campo Descrição é obrigatório!<br>';
				document.getElementById("txtDescricao").style.border =  "2px solid #FF0000";
				vCont = false;
			}

			if((vPreco == "") || (vPreco <= 0) || (Number.isNaN(vPreco))){
				vMsgRetorno += 'O Campo Preço é obrigatório!<br>';
				document.getElementById("txtPreco").style.border =  "2px solid #FF0000";
				vCont = false
			}
		}//fim vAcao
	}//fim vForm

    if(!vCont){
        $("#vRetorno"+vForm).empty();
        $("#vRetorno"+vForm).show();
        $("#vRetorno"+vForm).html('<div class="alert alert-danger alert-dismissible fade show" role="alert">' + vMsgRetorno +
		 '<button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
            '<span aria-hidden="true">&times;</span>\n' + '</button>\n' +
            '</div>');
        $("#vRetorno"+vForm).fadeOut(10000);
        return false;
    }else{
        return true;
    }
}