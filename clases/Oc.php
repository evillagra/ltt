<?php 

class Usuario{
	private $sestado;
	private $sfechaemi;
	private $sidoc;
	private $siduser;
	private $stotaloc;

	
	function __construct($set=NULL,$sfe=NULL,$sdc=NULL,$sid=NULL,$stot=NULL){
		$this->sestado=$set;
		$this->ssfechaemi=$sfe;
		$this->ssidoc=$sdc;
		$this->ssiduser=$sid;		
		$this->sstotaloc=$stot;
		
	}
	
	
	public function getEstado(){
		return $this->sestado;
	}
	
	public function getFechaemi(){
		return $this->sfechaemi;
	}
	
	public function getIdoc(){
		return $this->sidoc;
	}
	
	function setIdoc($id){
		$this->sidoc=$id;
	}
	
	function getIduser(){
		return $this->siduser;
	}
	
	function getStot(){
		return $this->stotaloc;
	}
	
		

	
function Selecciona(){
		
		if (!$this->querysel){
		$db=dbconnect();
		/*Definición del query que permitira ingresar un nuevo registro*/
		
			$sqlsel="SELECT estado, fecha_emision, id_oc, id_usuario, total_oc FROM orden_compras ORDER BY estado";
		
			/*Preparación SQL*/
			$this->querysel=$db->prepare($sqlsel);
		
			$this->querysel->execute();
		}
		
		$registro = $this->querysel->fetch();
		if ($registro){
			return new self($registro['estado'], $registro['fecha_emision'], $registro['id_oc'],$registro['id_usuario'],$registro['total_oc']);
		}
		else {
			return false;
			
		}
	}
	
	function Elimina($id){
	
		$db=dbconnect();
	
		/*Definición del query que permitira eliminar un registro*/
		$sqldel="delete from orden_compras where id_oc=:id";
	
		/*Preparación SQL*/
		$querydel=$db->prepare($sqldel);
			
		$querydel->bindParam(':id',$id);
			
		$valaux=$querydel->execute();
	
		return $valaux;
	}
	
	function Agregar(){
		$db=dbconnect();
		$sqlins="insert into orden_compras (estado, fecha_emision, id_oc, id_usuario, total_oc) values (:est,:fec,:idoc,:iduser,:tot)";
	
		// Valida si usuario existe, si existe no lo agrega.
		if ($this->VerificaUsuario()){
			echo "Clase OC:Agregar: El usuario $this->sidoc existe en la base de datos.";
			return false;
		}
	
		/*Preparacion SQL*/
		try {
			$queryins=$db->prepare($sqlins);
			}
			catch( PDOException $Exception ) {
			echo "Clase OC:ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
				return false;
			}
	
		/*Asignacion de parametros utilizando bindparam*/
			$queryins->bindParam(':est',$this->sestado);
			$queryins->bindParam(':fec',$this->sfechaemi);
			$queryins->bindParam(':idoc',$this->sidoc);
			$queryins->bindParam(':iduser',$this->siduser);
			$queryins->bindParam(':tot',$this->stotaloc);
			
	
						try {
						$queryins->execute();
						}
						catch( PDOException $Exception ) {
						echo "Clase OC:ERROR:Ejecucion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
						}
			}
			
			
			
			function Actualizar(){
				$db=dbconnect();
				$sqlupd = " UPDATE orden_compras SET estado=:est, fecha_emision=:fec, id_usuario=iduser, total_oc=:tot ";
				$sqlupd.= " WHERE id_oc=:id ";
			
				/*Preparacion SQL*/
				try {
					$queryupd=$db->prepare($sqlupd);
				} catch( PDOException $Exception ) {
					echo "Clase OC :ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
				}
			
				/*Asignacion de parametros utilizando bindparam*/
				$queryins->bindParam(':est',$this->sestado);
				$queryins->bindParam(':fec',$this->sfechaemi);
				$queryins->bindParam(':idoc',$this->sidoc);
				$queryins->bindParam(':iduser',$this->siduser);
				$queryins->bindParam(':tot',$this->stotaloc);
				
			
				try {
					$queryupd->execute();
				} catch( PDOException $Exception ) {
					echo "Clase OC:ERROR:Ejecucion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
				}
			}

}
?>