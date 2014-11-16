<?php include('../config.php'); ?>

<html>

<head>
<title>Redirecionando...</title>
<script type="text/javascript">
function loginsuccessfully(){
	setTimeout("window.location='../'", 3000);
}

function loginfailed(){
	setTimeout("window.location='../'", 3000);
}
</script>
</head>

<body>
<?php
$login=$_POST['login'];
$senha=$_POST['senha'];
$sql = mysql_query("SELECT * FROM usuarios WHERE email = '$login' and senha = '$senha'") or die(mysql_error());
$row = mysql_num_rows($sql);
if($row > 0) {
	session_start();
	$_SESSION['email']=$_POST['login'];
	$_SESSION['senha']=$_POST['senha'];
	echo "<center><h2>Login efetuado com sucesso! Aguarde um instante...</h2></center>";
	echo "<script>loginsuccessfully()</script>";
} else {
	echo "<center><h2>Login ou Senha Invalidos! Aguarde um instante para tentar novamente!</h2></center>";
	echo "<script>loginfailed()</script>";
}
?>
</body>

</html>