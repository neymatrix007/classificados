<?php 

		$mysql_host 	= "localhost";
		$mysql_user 	= "root";
		$mysql_pass 	= "";
		$mysql_db	= "classificados";

		mysql_connect($mysql_host, $mysql_user, $mysql_pass) OR
		die("Impossível conectar ao banco de dados!.<br /> Erro: ".mysql_error());	
		
		mysql_select_db($mysql_db) OR
		die("Erro durante a seleção do banco de dados!.<br /> Erro: ".mysql_error()); ?>