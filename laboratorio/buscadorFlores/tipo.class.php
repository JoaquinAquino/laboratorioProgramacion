<?php

	class TipoFlor{
	
		private $nombre;
	
		function __construct(){
		}
		
		
		function getNombre(){
			return $this->nombre;
		}
		
		function setNombre($texto){
			$this->nombre=$texto;
		}
		
		
		
		public static function obtenerTipos(){			
		$listadoFlores=array();
		$conexion = new mysqli("localhost", "root", "", "floreria") or die("No se pudo conectar al servidor");
		
		$query =  "SELECT *  FROM TIPO_FLOR;";
		
		$listado = $conexion->query($query) or die("No se pudo ejecutar la consulta de selección");
				   
				while ($reg = $listado->fetch_object()) {
					$tipoFlor= new TipoFlor();
					$tipoFlor->setNombre($reg->TIPO_FLOR);
					$listadoFlores[]=$tipoFlor;
				}
				
		$listado->free();
		$conexion->close();
		return $listadoFlores;
		}	
	
		
	}

?>