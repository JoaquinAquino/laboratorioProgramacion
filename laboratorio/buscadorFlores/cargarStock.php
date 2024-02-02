<!DOCTYPE html>
<html>
<head>
	<title> </title>
	<link rel="stylesheet" href="formulario.css">
</head>

<body>
 <header><h1>cargarStock</h1> </header>
	<section>
		<article> 
	
		
	<?php
	if (isset($_POST['boton'])){
		$conexion = new mysqli("localhost", "root", "", "floreria") or die("No se pudo conectar al servidor");
		
		
		$query = "UPDATE stock SET CANTIDAD = '".$_POST['cantidad']. "' WHERE ID_FLOR = '".$_POST['flor']."'";		
		$resu = $conexion->query($query) or die("No se pudo ejecutar la consulta de selección");
		if($resu==1){
			echo "se actualizo correctamente";
			
		}else{
			echo "no se actualizo correctamente";

		}
		echo "<br> <a href=index.php>volver</a>";

		$conexion->close();
		
			
	} else {
			echo "IDflor= ".$_GET['idFlor'];
			echo "Sucursal= ".$_GET['sucursal'];

	?>
		<form action="cargarStock.php" method="post" name="formulario" id="idFormulario">
		
			
			<input type="hidden" name="flor" value="<?php echo $_GET['idFlor']; ?>">
			<input type="hidden" name="sucursal" value="<?php echo $_GET['sucursal']; ?>">

			<div class="fila">
				<div class="columna">
					<p>cantidad</p>
				</div>
						
				<div class="columna">
					<input id="idCantidad" name="cantidad" type="number" required>							
				</div>
			</div>
			<div id="filaBoton">	
						<input name="boton" id="botonId" type="submit" value="cargar">
			</div>
			

		</form>
	<?php
	}
	?>
	</article>
	</section>
		
</body>

<footer>

</footer>
</html>