<?php
SESSION_START();
if(!isset($_SESSION['ingreso'])){
	echo "usted no tiene autorizacion";
	echo '<br> <a href="index.php">iniciar sesion</a>';
	die();
}
$identificador=$_SESSION['identificador'];
echo "<br>".$_COOKIE[$identificador];
echo"<br>". "cantidad jugadas: ".$_COOKIE[$identificador.'cantidadJugadas']."<br>";

if(isset($_POST['jugar'])){

		$numeroJugador = $_POST['numero'];
		$EleccionJugador = $_POST['valor'];
		$numeroMaquina = rand(1,2);	
		
		if($EleccionJugador == "par"){
			$EleccionMaquina = "none";
		}else {
			$EleccionMaquina = "par";
		}
		
		$suma = $numeroJugador + $numeroMaquina;
		
		if (!isset($_SESSION['PuntajeJugador'])){
			$_SESSION['PuntajeJugador']=0;
		}
		if (!isset($_SESSION['PuntajeMaquina'])){
			$_SESSION['PuntajeMaquina']=0;
		}
		
		echo "<br>Eleccion del Jugador : ". $EleccionJugador;
		echo "<br>Eleccion de la Maquina : ".  $EleccionMaquina;
		echo "<br>Numero del Jugador: ". $numeroJugador;
		echo "<br>Numero de la maquina: ". $numeroMaquina."<br>";
		if($suma % 2 == 0 && $EleccionJugador == "par"){
			echo "el ganador es el Jugador";
			$_SESSION['PuntajeJugador']+=$suma;
		}else if ($suma % 2 != 0 && $EleccionJugador == "none"){
			echo "el ganador es el Jugador";
			$_SESSION['PuntajeJugador']+=$suma;
		}else {
			echo "gano la maquina";
			$_SESSION['PuntajeMaquina']+=$suma;
		}
	    echo"<br><br> Puntaje total ". $_SESSION['PuntajeMaquina']." de la maquina";
	    echo"<br> Puntaje total ". $_SESSION['PuntajeJugador']." del jugador<br>";
		$ganadorMasquina=$_SESSION['PuntajeMaquina'];
		$ganadorJugador=$_SESSION['PuntajeJugador'];
		
		if($ganadorJugador >= 15){
			$condicion=true;
			echo "el ganador de la partida es el jugador";	
		}else if($ganadorMasquina>=15){
			$condicion=true;
			echo "el ganador de la partida es la maquina";
		}
		if (isset($condicion)){
			$_SESSION['PuntajeJugador']=0;
			$_SESSION['PuntajeMaquina']=0;	
			$numero=$_COOKIE[$identificador.'cantidadJugadas']+1;
			setcookie($identificador.'cantidadJugadas');	
			setcookie($identificador.'cantidadJugadas',$numero,time()+(30 * 24 * 60 * 60));
		}
		
	
}else if(isset($_POST['abandonar'])){
		
		$numero=$_COOKIE[$identificador.'cantidadJugadas']+1;
		setcookie($identificador.'cantidadJugadas');	
		setcookie($identificador.'cantidadJugadas',$numero,time()+(30 * 24 * 60 * 60));
		echo "<br>no hay ganadores";

}else if(isset($_POST['salir'])){
		$numero=$_COOKIE[$identificador.'cantidadJugadas']+1;
		$fecha=date('d/m/Y');
		setcookie($identificador);
		setcookie($identificador.'cantidadJugadas');
		setcookie($identificador,"Nombre: ".$identificador." fecha: ".$fecha,time()+(30 * 24 * 60 * 60));
		setcookie($identificador.'cantidadJugadas',$numero,time()+(30 * 24 * 60 * 60));
        header('location: cerrarSesion.php');
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>ParesNones</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
	<form name="formu1" id="idformu1" method="POST" action="juego.php">
       <div class="grupo">
	   <h2>Juego Pares y Nones</h2>
		<label for="numero">Elija para jugar:</label>
		
		<select name='numero'>
			<option value='1'>1</option>
			<option value='2'>2</option>
		</select>	
		<select name='valor'>
			<option value='par'>Par</option>
			<option value='none'>None</option> 
		</select>
		<input class="boton" type="submit"  name="jugar" value="Jugar">
		<input class="boton" type="submit"  name="salir" value="salir">
		<input class="boton" type="submit"  name="abandonar" value="abandonar">
       </div>
    </form>  
</body>
</html>
  
       