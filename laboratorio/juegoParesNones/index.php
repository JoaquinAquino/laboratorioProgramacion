<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title> </title>
	<link rel="stylesheet"href="estilo.css">

</head>

<body>

<?php
	if(isset($_POST['boton'])){
			$identificador=$_POST['nombre'];
		if (!isset($_COOKIE[$identificador])){
			$fecha=date("d/m/Y");
			setcookie($identificador,"Nombre: ".$identificador." fecha: ".$fecha,time()+(30 * 24 * 60 * 60));
			setcookie($identificador.'cantidadJugadas',1,time()+(30 * 24 * 60 * 60));

		}
			$_SESSION['identificador']=$identificador;
			$_SESSION['ingreso']=true;
			header("Location: juego.php");
			exit;
			

	}else{
?>

	<section>
	
		<article> 
		<form action="index.php" method="post" name="idformu" id="idformu">
		 <div class="grupo">
		  <h2>Iniciar Sesion</h2>
					<div class="fila">
						<div class="columna">
							<p>nombre </p>
						</div>
						
						<div class="columna">
							<input id="idNomrbe" name="nombre" type="text" required>							
						</div>
					</div>
					
					<div id="filaBoton">					
						<input name="boton" id="botonId" type="submit" value="procesar">					
					</div>
					
				 </div>
		</form>
		</article>
		<article>

		</article>
	</section>
	<?php		
	}
	?>
</body>

<footer>

</footer>
</html>