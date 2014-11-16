<?php include('config.php'); ?>
<?php
	session_start();
	
	$login = $_SESSION['email'];
	$sql = mysql_query("SELECT * FROM usuarios WHERE email = '$login'");
	while($linha = mysql_fetch_array($sql)){
		$nome = $linha['apelido'];
		$id = $linha['id'];
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Anúncios - GEMEOS</title>
<link rel="stylesheet" href="css/estilo.css" />
</head>

<body>
<?php include('header/topo.php'); ?>
<div class="results">
<?php
$busca = mysql_query('SELECT * FROM posts WHERE estado = '.$_GET['estado'].'');
while($escrever = mysql_fetch_array($busca)){ ?>
<div class="cla"><?php echo $escrever['titulo']; ?></div>
<?php } ?>
</div>
<?php include('header/footer.php'); ?>
</body>
</html>