<?php
    include('../../conexao/FConexao.php');
    include('../../biblioteca/bibliotecaFuncoes.php');
    $vMsg = '';
    //carrega variaveis vindo do post / serialize
    $vAcao = $_POST['vAcao'];// 1 - INSERT, 2 - UPDATE, 3 - DELETE
    $codigo = trim($_POST['txtCodigo']);
    $descricao = trim($_POST['txtDescricao']);
    $quantidade = $_POST['txtQuantidade'];
    $preco = __trataDecimal($_POST['txtPreco']);
    $precoTotal = __trataDecimal($_POST['txtPrecoTotal']);

    //validando quantidade
    if($quantidade <= 0){
        $quantidade = 1;
    }

    //validando o preco
    if($preco <= 0){
        echo 'O CAMPO: <b>Preço</b> É OBRIGATÓRIO, VERIFIQUE.';
        exit;
    }

    //validando a descricao
    if(empty($descricao) ){
        echo 'O CAMPO: <b>Descrição</b> É OBRIGATÓRIO, VERIFIQUE.';
        exit;
    }

    try{

        //INSERT
        if($vAcao == 1){
            //validando o campo codigo
            if($codigo <= 0){
                echo 'O CAMPO: <b>Código</b> É OBRIGATÓRIO, VERIFIQUE.';
                exit;
            }

            //verifica se o codigo do produto ja existe
            $sqlVerificaCodigo = "SELECT codigo FROM produto WHERE codigo = $codigo";
            $resVerificaCodigo = mysqli_query($conexao, $sqlVerificaCodigo);            
            if(mysqli_num_rows($resVerificaCodigo) > 0){
                echo 'O CÓDIGO: <b>'.$codigo.'</b> JÁ ESTA CADASTRADO NO SISTEMA, VERIFIQUE.';
                exit;  
            }

            $sql = "INSERT INTO produto (codigo, descricao, quantidade, preco, precoTotal)
                            VALUES($codigo, '$descricao', $quantidade, '$preco', '$precoTotal')";
            $resSql = mysqli_query($conexao, $sql);
        
        //UPDATE
        }else if($vAcao == 2){
            $sql = "UPDATE produto SET descricao = '$descricao', quantidade = $quantidade, preco = '$preco', precoTotal = '$precoTotal'";
            $sql.=" WHERE codigo = $codigo";
            $resSql = mysqli_query($conexao, $sql);
        
        //DELETE
        }else if($vAcao == 3){
            $sql = "DELETE FROM produto WHERE codigo = $codigo";
            $resSql = mysqli_query($conexao, $sql);
        }
        
        //retorno para o java script
        if($resSql){
            $vMsg = 1;//sucesso
        }
        else{
            $vMsg = 'ERRO: '.$conexao->error;
        }
    
  }catch(Exception  $e){
    $vMsg = $e->getMessage(); 
  }	

  echo $vMsg;
?>