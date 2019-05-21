<?php 
  include('bibliotecaFuncoes.php');
  $QUANTIDADE = $_POST['QUANTIDADE'];
  $PRECO = str_replace(',','.',str_replace('.','',$_POST['PRECO']));
  $PRECO_FINAL = 0;

  if( ($QUANTIDADE > 0) and ($PRECO > 0 ) ){
    $PRECO_FINAL = ($QUANTIDADE * $PRECO);
  }
  
  $PRECO_FINAL = __Arredx($PRECO_FINAL, 2);
  echo ($PRECO_FINAL);
?>
	 