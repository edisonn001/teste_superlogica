<?php
  
function __Arredx($vValor, $vCasas) { 
  $vFator = pow(10, $vCasas); 
  $vValor1 = (round($vValor * $vFator) / $vFator);
  return number_format($vValor1,$vCasas,',','.');
}

function __Arred($vValor){ 
   $vFator = round($vValor * 100) / 100; 
   return number_format($vFator,2,',','.');
} 

function __trataDecimal($vValor){
  return str_replace(',','.',str_replace('.','',$vValor));
}

?>
