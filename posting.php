<?php include('config.php'); ?>
<?php
	session_start();
	
	$login = $_SESSION['email'];
	$sql = mysql_query("SELECT * FROM usuarios WHERE email = '$login'");
	while($linha = mysql_fetch_array($sql)){
		$nome = $linha['apelido'];
		$id = $linha['id'];
		$estado = $linha['estado'];
		$email = $linha['email'];
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Anunciar - GEMEOS</title>
<link rel="stylesheet" href="css/estilo.css" />
<script src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("select[name=tempo]").change(function(){
		$("#dvalor").html('');
		
		$.post("php/valores.php",
		{tempo:$(this).val()},
		function(valor){
		$("#dvalor").html(valor);
		}
		)
		})
	})
</script>
</head>

<body>
<?php include('header/topo.php'); ?>
<?php if($_GET['execute'] == 'e3s3'){ ?>
<div class="obr">
<img src="images/relogio.png" />
<h3>Obrigado! O seu anúncio estará ativo em breve.</h3>
<span>Quando o seu anúncio estiver ativo você receberá um e-mail. Enquanto isso, você pode <a href="posting.php?execute=e1s3">continuar desapegando</a>!</span><br />
<span>Anúncios inseridos à noite e aos finais de semana poderão levar mais tempo para serem publicados.</span>
</div>
<?php }else{ ?>
<div class="sepr">
<h1>Falta pouco para você desapegar!</h1>
As informações marcadas com asterisco (*) são obrigatórias
</div>
<?php } ?>
<div class="anunc"><table><tr>
<td class="<?php if($_GET['execute'] == 'e1s3'){echo 'vai';}elseif($_GET['execute'] == 'e2s3' or $_GET['execute'] == 'e3s3'){echo 'pronto';} ?>">Informações</td><td class="<?php if($_GET['execute'] == 'e2s3'){echo 'vai';}elseif($_GET['execute'] == 'e1s3'){echo 'ainda';}elseif($_GET['execute'] == 'e3s3'){echo 'pronto';} ?>">Fotos</td><td class="<?php if($_GET['execute'] == 'e1s3' or $_GET['execute'] == 'e2s3'){echo 'ainda';}elseif($_GET['execute'] == 'e3s3'){echo 'vai';} ?>">Destaque</td></tr></table><br />
<?php if($_GET['execute'] == 'e1s3'){ ?>
<form action="php/informacoes.php" method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>" /><input type="hidden" name="data" value="<?php echo date("d/m/Y"); ?>" /><span class="note">*Categoria:</span><select name="categoria">
<?php
$busca = mysql_query('SELECT * FROM categoria');
while($escrever = mysql_fetch_array($busca)){
?>
<option value="<?php echo $escrever['id']; ?>"><?php echo utf8_encode($escrever['categoria']); ?></option>
<?php } ?>
</select><br />
<span class="note">* Título do anúncio:</span><input type="text" name="titulo" /><br />
<span class="note">* Descrição do anúncio:</span><textarea name="descricao"></textarea><br />
<span class="note">Preço:</span><input type="text" name="preco" /><br />
<span class="note">*Telefone:</span><input type="text" name="telefone" /><br /><input type="hidden" name="estado" value="<?php echo $estado; ?>" />
<input type="submit" name="twd" value="Avançar" />
</form>
<?php }elseif($_GET['execute'] == 'e2s3'){ ?>
<div class="xfor">
<?php
if(isset($_POST['acao']) && $_POST['acao'] == 'enviar'):
	$imagem = $_FILES["imagem"];
	$contar = count($imagem['tmp_name']);
	for($i = 0; $i <= $contar-1; $i++){
		if(move_uploaded_file($imagem['tmp_name'][$i], 'fotoposts/'.$imagem['name'][$i])){
			mysql_query("INSERT INTO fotos VALUES('', '".$_GET['what']."', '".$imagem['name'][$i]."')");
			echo '<img src="fotoposts/'.$imagem['name'][$i].'" />';
		}
	}
endif;
?>
<form action="" method="post" enctype="multipart/form-data">
<?php if(!isset($imagem)){ ?><input type="file" name="imagem[]" multiple/><?php } ?>
<input type="hidden" name="acao" value="enviar" />
<?php if(!isset($imagem)){ ?><input type="submit" name="carl" value="Ver/Conferir" /><?php }else{ ?><a href="posting.php?execute=e3s3&what=<?php echo $_GET['what']; ?>"><input name="carl" value="Avançar" /></a><?php } ?>
</form>
</div>
<?php }elseif($_GET['execute'] == 'e3s3'){ ?>
<div class="jampa">
<h1>Seu Anúncio mais visível</h1>
<form action="php/destacar.php" method="post">
<input type="hidden" name="anuncio" value="<?php echo $_GET['what']; ?>" /><input type="hidden" name="email" value="<?php echo $email; ?>" />
<label>Por quanto tempo deseja destacar seu anúncio?</label><select name="tempo">
<option value="" selected="selected">Escolha...</option>
<option value="30">30 Dias</option>
<option value="60">60 Dias</option>
<option value="90">90 Dias</option>
</select>
<a href="perfil.php?uid=1&jar=resume"><button>Pular</button></a><input type="submit" value="Confirmar" />
</form>
<span id="dvalor"></span>
</div>
<?php } ?>
</div>
<?php include('header/footer.php'); ?>
</body>
</html>