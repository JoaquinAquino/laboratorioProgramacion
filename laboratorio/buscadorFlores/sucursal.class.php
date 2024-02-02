<?php

	class Sucursal{
	
		private $nombre;
		private $cantidad;
		
		function __construct(){
		}
		
		
		function getNombre(){
			return $this->nombre;
		}
		
		function setNombre($texto){
			$this->nombre=$texto;
		}
		
		function getCantidad(){
			return $this->cantidad;
		}
		
		function setCantidad($cantidad){
			$this->cantidad=$cantidad;
		}
	
		public static function obtenerSucursales($id){			
		$listadoSucursales=array();
		$conexion = new mysqli("localhost", "root", "", "floreria") or die("No se pudo conectar al servidor");
		
		$query =  "SELECT *  FROM stock WHERE ID_FLOR= ".$id;
		
		$listado = $conexion->query($query) or die("No se pudo ejecutar la consulta de selección");
				   
				while ($reg = $listado->fetch_object()) {
					$sucursal= new Sucursal();
					$sucursal->setCantidad($reg->CANTIDAD);
					$sucursal->setNombre($reg->SUCURSAL);
					$listadoSucursales[]=$sucursal;
				}
				
		$listado->free();
		$conexion->close();
		return $listadoSucursales;
		
		}	
		
		public static function obtenerTodasSucursales(){			
		$listadoSucursales=array();
		$conexion = new mysqli("localhost", "root", "", "floreria") or die("No se pudo conectar al servidor");
		
		$query =  "SELECT *  FROM stock ";
		
		$listado = $conexion->query($query) or die("No se pudo ejecutar la consulta de selección");
				   
				while ($reg = $listado->fetch_object()) {
					$sucursal= new Sucursal();
					$sucursal->setCantidad($reg->CANTIDAD);
					$sucursal->setNombre($reg->SUCURSAL);
					$listadoSucursales[]=$sucursal;
				}
		$listadoSucursales = array_unique($listadoSucursales, SORT_REGULAR);
		
		$listado->free();
		$conexion->close();
		return $listadoSucursales;
		
		}
	}

?>