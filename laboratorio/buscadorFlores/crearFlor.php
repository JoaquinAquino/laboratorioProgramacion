
<!DOCTYPE html>
<html>
<head>
	<title> </title>
	<link rel="stylesheet"href="formulario.css">
</head>

<body>

 <header><h1>FLORERIA</h1> </header>
	<section>
	<h2> Alta de flor </h2>
		<article> 
		
	<?php

	if (isset($_POST['boton'])){
		$conexion = new mysqli("localhost", "root", "", "floreria") or die("No se pudo conectar al servidor");
		
		$query1 = "INSERT INTO flor (NOMBRE_FLOR, TIPO, IMPORTE) VALUES ('".$_POST['nombre']."', '".$_POST['tiposFlores']."', '".$_POST['importe']."')";

		$resu1 = $conexion->query($query1) or die("No se pudo ejecutar la consulta de selección");
		
		
		
		require("flor.class.php");
		$flor= Flor::obtenerFlor($_POST['nombre']);

		$id=$flor->getId();
		
		$query2 = "INSERT INTO stock (SUCURSAL, ID_FLOR, CANTIDAD) VALUES ('".$_POST['tiposSucursales']."', '".$id."', '".$_POST['cantidad']."')";
		
		$resu2 = $conexion->query($query2) or die("No se pudo ejecutar la consulta de selección");

		if($resu1==1){
			echo "la flor fue dada de alta ";

		}else{
			echo "no se agrego la flor correctamente";
		}
		
		if($resu2==1){
			echo "la flor fue agregada al stock ";

		}else{
			echo "no se agrego al stock";
		}
		echo '<br> <a href="index.php">Volver</a>';

		$conexion->close();
		
			
	} else {
	?>
		<form action="crearFlor.php" method="post" name="formulario" id="idFormulario">
					
					<div class="fila">
						<div class="columna">
							<p>nombre </p>
						</div>
						
						<div class="columna">
							<input id="idNombre" name="nombre" type="text" required>							
						</div>
					</div>
					
					<div class="fila">
						<div class="columna">
							<p>tipo de flor </p>
						</div>
						
						<div class="columna">
							<select name="tiposFlores" id="idTiposFlores">
							<option value="0">-----</option>
								<?php							
									include_once("tipo.class.php");
									$listadoFlores = TipoFlor::obtenerTipos();																
									if (count($listadoFlores)>0){
										foreach($listadoFlores as $flor){
											echo '<option  value="'.$flor->getNombre().'">'.$flor->getNombre().'</option>';
										}
									} 							
								?>	
							</select>						
						</div>
					</div>
					
					<div class="fila">
						<div class="columna">
							<p>importe </p>
						</div>
						
						<div class="columna">
							<input id="idImporte" name="importe" type="number" required>							
						</div>
					</div>
					
					<div class="fila">
						<div class="columna">
							<p>sucursal</p>
						</div>
						
						<div class="columna">
							<select name="tiposSucursales" id="idTiposSucursales">
							<option value="0">-----</option>
								<?php							
									require("sucursal.class.php");
									$listadoSucursales = Sucursal::obtenerTodasSucursales();																
									if (count($listadoSucursales)>0){
										foreach($listadoSucursales as $sucursal){
											echo '<option  value="'.$sucursal->getNombre().'">'.$sucursal->getNombre().'</option>';
										}
									} 							
								?>	
							</select>	
						</div>
					</div>
					
					<div class="fila">
						<div class="columna">
							<p>cantidad </p>
						</div>
						
						<div class="columna">
							<input id="idCantidad" name="cantidad" type="number" required>							
						</div>
					</div>
												
					
					<div id="filaBoton">	
						<input name="boton" id="botonId" type="submit" value="alta">
					</div>
					<div id="filaBoton">	
						<a href="index.php">cancelar</a>
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