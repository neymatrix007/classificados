<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Classificados gemeosanuncia.com - Anúncios Classificados Grátis no Brasil: Carros, Motos, Casas, Apartamentos e outros produtos.</title>
<link rel="stylesheet" href="css/estilo.css" />
</head>

<body>
<div id="barra">
<?php include('header/topo.php'); ?>
</div>
<?php include('config.php'); ?>
<div class="bloco">
<h1>Acesse seus anúncios</h1>
<form action="<?php if($_GET['what'] == 'cadastro'){echo 'php/cadastro.php';}elseif($_GET['what'] == 'login'){echo 'php/login.php';} ?>" method="post">
<span class="sfor">E-mail</span><br /><?php if($_GET['what'] == 'cadastro'){ ?><input type="hidden" name="data" value="<?php echo date("d/m/Y"); ?>" /><?php } ?><input type="text" name="login" /><br />
<span class="sfor">Senha</span><?php if($_GET['what'] == 'login'){ ?><a href="">Esqueceu a senha?</a><?php } ?><br /><input type="password" name="senha" /><br />
<input type="submit" value="<?php if($_GET['what'] == 'cadastro'){echo 'Cadastrar';}elseif($_GET['what'] == 'login'){echo 'Entrar';} ?>" />
</form>
</div>
</body>
</html>