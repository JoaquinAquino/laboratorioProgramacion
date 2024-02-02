
<?php
include_once("flor.class.php");
$flores = Flor::obtenerFlores();
$letras= $_GET['letras'];

$resultadoFlor = array(
  "estado"=> "No existe en stock",
  "flor"=> null,
  'sucursales' =>array()
);


foreach ($flores as $flor) {
	
    if ($letras == $flor->getNombre()) {
		$resultadoFlor["estado"]=" Flor Valido";
		$objTemp = new StdClass();
		$objTemp->id =$flor->getId();
		$objTemp->flor =$flor->getNombre();
		$objTemp->tipo =$flor->getTipo();
		
		include_once("sucursal.class.php");
		$sucursales= Sucursal::obtenerSucursales($flor->getId());
		
		$cant=0;
		
		foreach ($sucursales as $sucursal) {
			$sucurTemp=new StdClass();
			$sucurTemp->stock =$sucursal->getCantidad();
			$sucurTemp->sucursal=$sucursal->getNombre();
			$cant+=$sucursal->getCantidad();
			$resultadoFlor["sucursales"][] =$sucurTemp;  
		}
		
		$objTemp->cantidadTotal =$cant;
		$objTemp->importeStock =$flor->getImporte()*$cant;

		$resultadoFlor["flor"]=$objTemp;
		break;
		
    }
}

$myJSON =json_encode($resultadoFlor);
echo $myJSON;

?>