<?php include('../config.php'); ?>
<?php
$email = $_POST['login'];
$senha = $_POST['senha'];
$data = $_POST['data'];

$sql = mysql_query("INSERT INTO usuarios VALUES('', '".$email."', '".$senha."', '".$data."')");
if($sql){header('Location: ../register.php?what=login');}
?>