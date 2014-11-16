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
<title>Resumo - GEMEOS</title>
<link rel="stylesheet" href="css/estilo.css" />
<script src="js/jquery-1.8.3.min.js"></script>
<script language="javascript">
function mostraDiv(){
document.getElementById("op").style.display="block";}
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$("select[name=estado]").change(function(){
		$("select[name=cidade]").html('<option value="0">Carregando...</option>');
		
		$.post("cidades.php",
		{estado:$(this).val()},
		function(valor){
		$("select[name=cidade]").html(valor);
		}
		)
		})
	})
</script>
</head>

<body>
<?php include('header/topo.php'); ?>
<div id="publi">

</div>
<div class="opcp">
<ul>
<a href="perfil.php?uid=<?php echo $id; ?>&jar=resume"><li>Seus Anúncios<div style="float:right;">&#9658;</div></li></a>
<a href=""><li>Mensagens<div style="float:right;">&#9658;</div></li></a>
<li style="background:#ffc;">Configurações<div style="float:right;">&#9660;</div></li><ul style="margin-left:12%; list-style:inside;"><a href="perfil.php?uid=<?php echo $id; ?>&jar=visualizar"><li><span>Visualizar perfil</span></li></a><a href="perfil.php?uid=<?php echo $id; ?>&jar=editar"><li><span>Editar perfil</span></li></a></ul>
</ul>
</div>
<div class="edit">
<?php
$buscar = mysql_query('SELECT * FROM usuarios WHERE id = '.$id.'');
while($escrever = mysql_fetch_array($buscar)){
?>
<?php
$be = mysql_query('SELECT * FROM estado WHERE id = '.$escrever['estado'].'');
while($re = mysql_fetch_array($be)){$nestado = $re['nome'];}
?>
<?php
$bc = mysql_query('SELECT * FROM cidade WHERE id = '.$escrever['cidade'].'');
while($rc = mysql_fetch_array($bc)){$ncidade = $rc['nome'];}
?>
<?php if($_GET['jar'] == 'editar'){ ?>
<h1>Editar meu perfil</h1>
<form action="php/edit-perfil.php" method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<span class="ord">Localização:</span><select name="estado">
<option value="<?php echo $escrever['estado']; ?>" selected="selected"><?php if($escrever['estado'] == 0){echo 'Estado';}else{echo $nestado;}; ?></option>
<?php
$sql = "SELECT * FROM estado ORDER BY nome ASC";
$qr = mysql_query($sql) or die(mysql_error());
while($ln = mysql_fetch_assoc($qr)){
echo '<option value="'.(int)$ln['id'].'">'.utf8_encode($ln['nome']).'</option>';
}
?>
</select><br />
<select name="cidade">
<option value="<?php echo $escrever['cidade']; ?>" selected="selected"><?php if($escrever['cidade'] == 0){echo 'Cidade';}else{echo utf8_encode($ncidade);}; ?></option>
</select><br />
<input type="text" name="bairro" placeholder="Bairro" value="<?php echo $escrever['bairro']; ?>" /><br />
<span class="ord">Nome Completo:</span><input type="text" name="nome" value="<?php echo $escrever['nome']; ?>" /><br />
<span class="ord">Telefone:</span><input type="text" name="telefone" value="<?php echo $escrever['telefone']; ?>" /><br />
<span class="ord">Sexo:</span><select name="sexo"><option value="<?php echo $escrever['sexo']; ?>"><?php echo $escrever['sexo']; ?></option><option value="Masculino">Masculino</option><option value="Feminino">Feminino</option></select><br />
<span class="ord">Sobre mim:</span><textarea name="sobre"><?php echo $escrever['sobre']; ?></textarea><br />
<span class="ord">Interesses:</span><textarea name="interesse"><?php echo $escrever['interesse']; ?></textarea><br />
<span class="ord">Seu Site:</span><input type="text" name="site" value="<?php echo $escrever['site']; ?>" /><br />
<input type="submit" value="Confirmar" />
</form>

<?php }elseif($_GET['jar'] == 'visualizar'){ ?>
<h1>Perfil de <?php echo $nome; ?></h1>
<span class="listinha">Localização:</span><span class="listinha2"><?php echo utf8_encode($nestado).', '.utf8_encode($ncidade).', '.utf8_encode($escrever['bairro']); ?></span><br />
<span class="listinha">Nome:</span><span class="listinha2"><?php echo $escrever['nome']; ?></span><br />
<span class="listinha">Telefone:</span><span class="listinha2"><?php echo $escrever['telefone']; ?></span><br />
<span class="listinha">Sexo:</span><span class="listinha2"><?php echo $escrever['sexo']; ?></span><br />
<span class="listinha">Site:</span><span class="listinha2"><?php echo $escrever['site']; ?></span><br />
<span class="listinha">Sobre mim:</span><span class="listinha2"><?php echo $escrever['sobre'].'.'; ?></span><br />
<span class="listinha">Interesses:</span><span class="listinha2"><?php echo $escrever['interesse']; ?></span><br />
<?php }elseif($_GET['jar'] == 'resume'){ ?>
<h1>Meus Anúncios</h1>
<?php
$ma = mysql_query('SELECT * FROM posts WHERE uid = '.$id.'');
while($ra = mysql_fetch_array($ma)){ ?>
<div class="ma"><?php echo $ra['titulo']; ?></div>
<?php } ?>
<?php } ?>
<?php } ?>
</div>
<?php include('header/footer.php'); ?>
</body>
</html>