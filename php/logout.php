<title>HANGAR 474 - Deslogando</title>
<?php
	session_start();
	session_destroy();
	header("Location: ../");
?>