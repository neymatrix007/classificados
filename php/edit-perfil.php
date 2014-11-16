<?php
include('../config.php');

$uid = $_POST['id'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$sexo = $_POST['sexo'];
$sobre = $_POST['sobre'];
$interesse = $_POST['interesse'];
$site = $_POST['site'];

$sql = mysql_query("UPDATE usuarios SET estado = '".$estado."', cidade = '".$cidade."', bairro = '".$bairro."', nome = '".$nome."', telefone = '".$telefone."', sexo = '".$sexo."', sobre = '".$sobre."', interesse = '".$interesse."', site = '".$site."' WHERE id = '".$uid."'");

if($sql){header('Location: ../perfil.php?uid='.$uid.'&jar=resume');}
?>