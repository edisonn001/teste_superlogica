//funcao responsavel por carregar as paginas
function __carregarPagina(vPagina,vMenu,vAcao,vCampoChave){
	$.ajax({
        type: "POST",
        dataType: "html",
        url: "php/paginas/pesquisa/FCarregarPaginaAction.php",
        async: true,
        data: {
               vPAGINA: vPagina,
               vMENU: vMenu,
               vPESQUISA: "",
               vACAO: vAcao,
			   vCAMPO_CHAVE: vCampoChave,
              },
        success: function(vResposta){
            var vResposta  = vResposta.split("|");
            if(vResposta['0'].substring(0,4) == 'FCad') {
                $("#vCarregaPagina").load('php/paginas/cadastro/'+vResposta['0'].replace(/(?:(?:^|\n)\s+|\s+(?:$|\n))/g,'').replace(/\s+/g,' '));
            }else if(vResposta['0'].substring(0,4) == 'FLis') {
                $("#vCarregaPagina").load('php/paginas/pesquisa/' +vResposta['0'].replace(/(?:(?:^|\n)\s+|\s+(?:$|\n))/g,'').replace(/\s+/g,' '));
			}

        }
    });
}

//funcao responsavel deixa o texto em maiusculas
function __maiuscula(z){
    v = z.value.toUpperCase();
    z.value = v;
}