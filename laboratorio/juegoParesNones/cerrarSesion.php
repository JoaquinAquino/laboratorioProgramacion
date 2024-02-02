<?php
	session_start();
	$_SESSION=array();
	session_destroy();
	echo" saliste del juego hasta la proxima!!  <br>";
	echo '<a href="index.php">iniciar sesion</a>';

?>