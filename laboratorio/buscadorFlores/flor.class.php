<?php

	class Flor{
	
		private $idFlor;
		private $nombre;
		private $tipo;
		private $importe;
		
		function __construct(){
		}
		
		
		function getNombre(){
			return $this->nombre;
		}
		
		function setNombre($texto){
			$this->nombre=$texto;
		}
		
		function getId(){
			return $this->idFlor;
		}
		
		function setId($id){
			$this->idFlor=$id;
		}
		
		function getTipo(){
			return $this->tipo;
		}
		
		function setTipo($tip){
			$this->tipo=$tip;
		}
		
		function getImporte(){
			return $this->importe;
		}
		
		function setImporte($imp){
			$this->importe=$imp;
		}
		
		
		public static function obtenerFlores(){			
		$listadoFlores=array();
		$conexion = new mysqli("localhost", "root", "", "floreria") or die("No se pudo conectar al servidor");
		
		$query =  "SELECT *  FROM flor";
		
		$listado = $conexion->query($query) or die("No se pudo ejecutar la consulta de selección");
				   
				while ($reg = $listado->fetch_object()) {
					$flor= new Flor();
					$flor->setId($reg->ID_FLOR);
					$flor->setNombre($reg->NOMBRE_FLOR);
					$flor->setTipo($reg->TIPO);
					$flor->setImporte($reg->IMPORTE);

					$listadoFlores[]=$flor;
				}
				
		$listado->free();
		$conexion->close();
		return $listadoFlores;
		}	
	
		
		public static function obtenerFlor($nombreFlor){			
		$flor=null;
		$conexion = new mysqli("localhost", "root", "", "floreria") or die("No se pudo conectar al servidor");
		
		$query =  "SELECT *  FROM flor WHERE NOMBRE_FLOR='".$nombreFlor."'";
		
		$listado = $conexion->query($query) or die("No se pudo ejecutar la consulta de selección");
				   
				while ($reg = $listado->fetch_object()) {
					$flor= new Flor();
					$flor->setId($reg->ID_FLOR);
				}
				
		$listado->free();
		$conexion->close();
		return $flor;
		}	
	}

?>