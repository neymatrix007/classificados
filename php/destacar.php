<?php
include('../config.php');

$anuncio = $_POST['anuncio'];
$email = $_POST['email'];
$tempo = $_POST['tempo'];
$data = date("d/m/Y");

$sql = mysql_query("INSERT INTO premium VALUES('', '".$anuncio."', '".$tempo."', '".$email."', '".$data."')");

if($sql){header('Location: ../perfil.php?uid=1&jar=resume');}

?>