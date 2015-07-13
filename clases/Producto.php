<?php

class Producto{

	private $nCodigo;
	private $sDescripcion;
	private $sCantidad;
	private $sPrecio;
	private $sidtipo;

	function __construct($ncod=NULL, $sdes=NULL, $scan=NULL, $spre=NULL, $sidt=NULL){
		$this->nCodigo = $ncod;
		$this->sDescripcion = $sdes;		
		$this->sCantidad = $scan;
		$this->sPrecio = $spre;
		$this->sistipo = $sidt;
	}
	

	
	function getCodigo(){
		return $this->nCodigo;
	}
	function setCodigo($ncod){
		$this->nCodigo = $ncod;
	}
	
	function getDescripcion(){
		return $this->sDescripcion;
	}
	function setDescripcion($sdes){
		$this->sDescripcion = $sdes;
	}	
	
	function getCantidad(){
		return $this->sCantidad;
	}
	function setCantidad($scan){
		$this->sCantidad = $scan;
	}
	
	function getPrecio(){
		return $this->sPrecio;
	}
	function setPrecio($spre){
		$this->sPrecio = $spre;
	}
	
	function getIdtipo(){
		return $this->sidtipo;
	}
	function setIdtipo($sidt){
		$this->sPrecio = $sidt;
	}
	

	function Elimina($id){
	
		$db=dbconnect();
	
		/*Definición del query que permitira eliminar un registro*/
		$sqldel="DELETE FROM productos WHERE id_producto=:id";
	
		/*Preparación SQL*/
		$querydel=$db->prepare($sqldel);
			
		$querydel->bindParam(':id',$id);
		
		$valaux=$querydel->execute();
	
		return $valaux;
	}
	
	
	function Agregar(){
		$db=dbconnect();
		$sqlins = " INSERT INTO productos (descripcion, unidad, precio)";
		$sqlins.= " VALUES (:des, :uni, :pre ) ";
		
		/*Preparacion SQL*/
		try {
			$queryins=$db->prepare($sqlins);
		} catch( PDOException $Exception ) {
			echo "Clase Producto:ERROR:Ejecucion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
		}
		
		/*Asignacion de parametros utilizando bindparam*/
		$queryins->bindParam(':des',$this->sDescripcion);
		$queryins->bindParam(':uni',$this->sCantidad);
		$queryins->bindParam(':pre',$this->sPrecio);
	
		try {
			$queryins->execute();
		} catch( PDOException $Exception ) {
			echo "Clase Producto:ERROR:Ejecucion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
		}
	}
	
	
	function Actualizar(){
		$db=dbconnect();
		$sqlupd = " UPDATE productos SET descripcion=:des, unidad=:uni, precio=:pre ";
		$sqlupd.= " WHERE id_producto=:id ";
		
		/*Preparacion SQL*/
		try {
			$queryupd=$db->prepare($sqlupd);
		} catch( PDOException $Exception ) {
			echo "Clase Producto:ERROR:Ejecucion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
		}
		
		/*Asignacion de parametros utilizando bindparam*/
		$queryupd->bindParam(':des',$this->sDescripcion);
		$queryupd->bindParam(':uni',$this->sCantidad);
		$queryupd->bindParam(':pre',$this->sPrecio);
		$queryupd->bindParam(':id',$this->nCodigo);
		
		try {
			$queryupd->execute();
		} catch( PDOException $Exception ) {
			echo "Clase Producto:ERROR:Ejecucion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
		}
	}
	
	
	function Selecciona(){
	
		if (!$this->querysel){
			$db=dbconnect();
			/*Definición del query que permitira ingresar un nuevo registro*/
	
			$sqlsel = " SELECT id_producto, descripcion, unidad, precio ";
			$sqlsel.= " FROM productos ORDER BY descripcion ";
				
			/*Preparación SQL*/
			$this->querysel=$db->prepare($sqlsel);
				
			$this->querysel->execute();
		}
	
		$registro = $this->querysel->fetch();
		if ($registro){
			return new self($registro['id_producto'], $registro['descripcion'], $registro['unidad'], $registro['precio']);
		}
		else {
			return false;
		}
	}
	
	function LeerRegistro(){
		if (!$this->querysel){
			$db=dbconnect();
			/*Definición del query que permitira ingresar un nuevo registro*/
			
			$sqlsel = " SELECT id_producto, descripcion, unidad, precio ";
			$sqlsel.= " FROM productos WHERE id_producto=:id ";
			
			/*Preparación SQL*/
			$querysel=$db->prepare($sqlsel);
			
			$querysel->bindParam(':id',$this->nCodigo);
			
			$querysel->execute();
		}
		
		$registro = $querysel->fetch();
		if ($registro){
			return new self($registro['id_producto'], $registro['descripcion'], $registro['unidad'], $registro['precio']);
		}
		else {
			return false;
		}
	}
}
?>