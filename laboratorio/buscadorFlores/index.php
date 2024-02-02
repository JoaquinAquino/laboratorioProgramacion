
<!DOCTYPE html>
<html>
<head>
	<title> </title>
	<link rel="stylesheet"href="css.css">


<script>

	function validarFlor(){

	var letras = document.getElementById("idFlor").value;
	var peticion= new XMLHttpRequest();
	peticion.open("GET","operacion.php?letras="+letras, true);
	peticion.onreadystatechange = devolverResultado;
	peticion.send(null);
	
		function devolverResultado() {
			  if (peticion.readyState === 4 && peticion.status === 200) {
				
				var contenedorEstado= document.getElementById("estado");
				contenedorEstado.innerHTML = "";
				
				var contenedorFlor= document.getElementById("resultado1");
				contenedorFlor.innerHTML = "";
				
				var contenedorTabla= document.getElementById("resultado2");
				contenedorTabla.innerHTML = "";
				
				var resultado= JSON.parse(peticion.responseText)
				
				var texto = document.createElement("p");
				texto.textContent = resultado.estado;
				
				if(resultado.estado === "No existe en stock"){
					texto.style.color = "yellow";
					contenedorFlor.innerHTML= '<br> <a href="crearFlor.php">dar de alta la flor</a>';

				}else{
					texto.style.color = "green";
					flor=resultado.flor;
					contenedorFlor.innerHTML= "<b>Datos de la Flor</b><br><br> flor: "+flor.flor+"<br> tipo: "+flor.tipo+"<br> cantidad total: "+flor.cantidadTotal+"<br> importe Stock: "+flor.importeStock;	
					
					
					contenedorEstado.appendChild(texto);
				
				var sucursales= resultado.sucursales;
				var tabla = document.createElement("table");
					var encabezado = document.createElement("tr");

					var thSucursal = document.createElement("th");
					thSucursal.textContent = "Sucursal";
					encabezado.appendChild(thSucursal);

					var thStock = document.createElement("th");
					thStock.textContent = "Stock";
					encabezado.appendChild(thStock);

					var thDisponible = document.createElement("th");
					thDisponible.textContent = "Disponible p/Envio";
					encabezado.appendChild(thDisponible);
					
					var thCargar = document.createElement("th");
					thCargar.textContent = "CARGAR";
					encabezado.appendChild(thCargar);

					tabla.appendChild(encabezado);

					var movimientos = resultado.movimientos;

					sucursales.forEach(function (sucursal) {
						var fila = document.createElement("tr");

						var tdSucursal = document.createElement("td");
						tdSucursal.textContent = sucursal.sucursal;
						fila.appendChild(tdSucursal);

						var tdStock = document.createElement("td");
						tdStock.textContent = sucursal.stock;
						fila.appendChild(tdStock);

						var tdDisponible = document.createElement("td");
						tdDisponible.textContent = sucursal.stock*0.1;
						fila.appendChild(tdDisponible);
						
						var tdCargar = document.createElement("td");
						var atributos="";
						atributos=flor.id+"&sucursal="+sucursal.sucursal;
						tdCargar.innerHTML = '<a href="cargarStock.php?idFlor='+atributos+'">cargar</a>';
						fila.appendChild(tdCargar);

						tabla.appendChild(fila);
					});
					contenedorTabla.appendChild(tabla);
					
				}
				
			}	
		}
		
	}
	
		
</script>

</head>

<body>
 <header><h1>Busqueda de flores</h1> </header>


	
	<section>
		<article>
			<h2>secuencia de busqueda</h2>

			<div class="fila">
				<div class="columna">
					<p class="sinEspacio" >Flor:</p>
				</div>

				<div class="columna">
						
					<input type="text" id="idFlor" name="txtFlor"  onKeyup="validarFlor();"> 
				</div>
				<div class="columna">	
					<span id="estado"> </span>		
					
				</div>
			</div>
			<div id="resultado1"></div>
			<div id="resultado2"></div>
			<div id="resultado3"></div>
			<div id="resultado4"></div>
	

		</article>
	</section>

</body>

<footer>

</footer>
</html>