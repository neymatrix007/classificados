<?php
include('../config.php');

$uid = $_POST['id'];
$data = $_POST['data'];
$categoria = $_POST['categoria'];
$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$telefone = $_POST['telefone'];
$estado = $_POST['estado'];

$sql = mysql_query("INSERT INTO posts VALUES('', '".$uid."', '".$data."', '".$categoria."', '".$titulo."', '".$descricao."', '".$preco."', '".$telefone."', '".$estado."')");

if($sql){$busca = mysql_query("SELECT * FROM posts WHERE uid = '".$uid."' AND data = '".$data."' AND categoria = '".$categoria."' AND titulo = '".$titulo."' AND descricao = '".$descricao."' AND preco = '".$preco."' AND telefone = '".$telefone."' AND estado = '".$estado."'");
while($escrever = mysql_fetch_array($busca)){$id = $escrever['id'];}}

if($busca){header('Location: ../posting.php?execute=e2s3&what='.$id.'');}
?>