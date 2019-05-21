<?php
 $vPAGINA = $_POST['vPAGINA'];
 $vMENU = $_POST['vMENU'];
 $vPESQUISA = $_POST['vPESQUISA'];
 $vACAO = $_POST['vACAO'];
 $vCAMPO_CHAVE = $_POST['vCAMPO_CHAVE'];

  echo $vPAGINA."?vMENU=".$vMENU."&vPESQUISA=".base64_encode($vPESQUISA)."&vACAO=".$vACAO."&vCAMPO_CHAVE=".$vCAMPO_CHAVE."|".$vMENU;
