<?php
    include('../../conexao/FConexao.php');
    include('../../biblioteca/bibliotecaFuncoes.php'); 
    $vencimento = date('m/d/Y');

    //pega valor total de todo o estoque
    $sqlValorTotalInventario = "SELECT SUM(precoTotal) AS VALOR_INVENTARIO FROM produto";
    $resValorTotalInventario = mysqli_query($conexao, $sqlValorTotalInventario);            
    $rowValorInventario = mysqli_fetch_assoc($resValorTotalInventario);
    $valor = $rowValorInventario['VALOR_INVENTARIO'];

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.pjbank.com.br/contadigital/eb2af021c5e2448c343965a7a80d7d090eb64164/recebimentos/transacoes",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>"{\n  \"vencimento\": \"$vencimento\",\n  \"valor\": $valor,\n  \"juros\": 0,\n  \"multa\": 0,\n  \"desconto\": \"\",\n  \"nome_cliente\": \"JOSE EDISON DA SILVA\",\n  \"cpf_cliente\": \"88124762015\",\n  \"endereco_cliente\": \"Avenida Domiciano Perini Neto\",\n  \"numero_cliente\": \"38\",\n  \"complemento_cliente\": \"\",\n  \"bairro_cliente\": \"Cidade Satelite Iris\",\n  \"cidade_cliente\": \"Campinas\",\n  \"estado_cliente\": \"SP\",\n  \"cep_cliente\": \"13059591\",\n  \"logo_url\": \"http://www.jesilva.com.br/img/E.png\",\n  \"texto\": \"Emissão de boleto para o teste de Desenvolvedor PHP Jr / Pleno para criar um CRUD de inventário para a Empresa: Superlógica\",\n  \"grupo\": \"Boletos\",\n  \"pedido_numero\": \"01TESTE\"\n}",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json"
        ),
    ));
      
    $response = curl_exec($curl);
    $erro = curl_error($curl);
    
    curl_close($curl);
    
    $vRetorno = json_decode($response);
    //retorna os dados para o javascript    
    echo $vRetorno->status.'|'. $vRetorno->msg.' '.$erro.'|'. $vRetorno->linkBoleto;
?>