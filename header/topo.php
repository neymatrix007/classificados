<div id="barra"><a href="../"><img class="logo" src="images/logo.png" /></a>
<div class="beta">
<ul>
<?php if(isset($nome)){ ?>
<li><span class="mc" onclick="javascript:mostraDiv();"><?php echo $nome; ?></span> |</li>
<?php }else{ ?>
<li><a href="register.php?what=cadastro">Cadastre-se</a> |</li>
<li><a href="register.php?what=login">Entre</a> |</li>
<?php } ?>
<li><a href="vender.php">Vender</a> |</li>
<li><a href="contato.php">Contato</a></li>
</ul>
</div>
<div id="op">
<a href="../perfil.php?uid=<?php echo $id; ?>&jar=resume">Minha Conta</a><br /><br />
<a href="../php/logout.php">Sair</a>
</div></div>