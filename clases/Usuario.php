<?php 

class Usuario{
	private $sapellido_usuario;
	private $scodigo_perfil;
	private $scorreo_usuario;
	private $sedad_usuario;
	private $sfechanacimiento_usuario;
	private $sid_usuario;
	private $slogin_usuario;
	private $snombre_usuario;
	private $spass_usuario;
	private $querysel;
	private $querydel;
	private $queryins;
	
	function __construct($sid=NULL,$sap=NULL,$scp=NULL,$scu=NULL,$seu=NULL,$sfu=NULL,$slu=NULL,$susr=NULL,$sclave=NULL){
		$this->sapellido_usuario=$sap;
		$this->scodigo_perfil=$scp;
		$this->scorreo_usuario=$scu;
		$this->sedad_usuario=$seu;
		$this->sfechanacimiento_usuario=$sfu;
		$this->sid_usuario=$sid;
		$this->slogin_usuario=$slu;
		$this->snombre_usuario=$susr;
		$this->spass_usuario=md5($sclave);
	}
	
	
	public function getApellido_usuario(){
		return $this->sapellido_usuario;
	}
	
	public function getCodigo_perfil(){
		return $this->scodigo_perfil;
	}
	
	public function getCorreo_usuario(){
		return $this->scorreo_usuario;
	}
	
	function getEdad_usuario(){
		return $this->sedad_usuario;
	}
	
	function getFechanacimiento_usuario(){
		return $this->sfechanacimiento_usuario;
	}
	
	function getId_usuario(){
		return $this->sid_usuario;
	}
	
	function setId_usuario($id){
		$this->sid_usuario=$id;
	}
	
	function getLogin_usuario(){
		return $this->slogin_usuario;
	}
	
	function getNombre_usuario(){
		return $this->snombre_usuario;
	}
	
	function getPass_usuario(){
		return $this->spass_usuario;
	}
	
	
	function VerificaUsuario(){
		$db=dbconnect();
		/*Definici�n del query que permitira ingresar un nuevo registro*/
		$sqlsel="select nombre_usuario from usuario
		where login_usuario=:usr";

		/*Preparaci�n SQL*/
		$querysel=$db->prepare($sqlsel);

		/*Asignaci�n de parametros utilizando bindparam*/
		$querysel->bindParam(':usr',$this->snombre_usuario);
		
		$datos=$querysel->execute();
		
		if ($querysel->rowcount()==1)return true; else return false;

	}
	
	
	

	function VerificaAcceso(){
		$db=dbconnect();
		/*Definici�n del query que permitira ingresar un nuevo registro*/
		$sqlsel="select nombre_usuario from usuario
		where login_usuario=:usr and pass_usuario=:pwd";

		/*Preparaci�n SQL*/
		$querysel=$db->prepare($sqlsel);

		/*Asignaci�n de parametros utilizando bindparam*/
		$querysel->bindParam(':usr',$this->slogin_usuario);
		$querysel->bindParam(':pwd',$this->spass_usuario);

		$datos=$querysel->execute();

		if ($querysel->rowcount()==1){
			$this->snombre_usuario=$querysel->fetchColumn();
			return true;
		}
		else{
			return false;
		}		

	}
	
function Selecciona(){
		
		if (!$this->querysel){
		$db=dbconnect();
		/*Definición del query que permitira ingresar un nuevo registro*/
		
			$sqlsel="SELECT apellido_usuario, codigo_perfil, correo_usuario, edad_usuario, fechanacimiento_usuario, id_usuario, login_usuario, nombre_usuario, pass_usuario FROM usuario ORDER BY nombre_usuario";
		
			/*Preparación SQL*/
			$this->querysel=$db->prepare($sqlsel);
		
			$this->querysel->execute();
		}
		
		$registro = $this->querysel->fetch();
		if ($registro){
			return new self($registro['id_usuario'], $registro['nombre_usuario'], $registro['apellido_usuario'],$registro['login_usuario'],$registro['pass_usuario'],$registro['correo_usuario'],$registro['fechanacimiento_usuario'],$registro['edad_usuario'],$registro['codigo_perfil']);
		}
		else {
			return false;
			
		}
	}
	
	function Elimina($id){
	
		$db=dbconnect();
	
		/*Definición del query que permitira eliminar un registro*/
		$sqldel="delete from usuario where id_acceso=:id";
	
		/*Preparación SQL*/
		$querydel=$db->prepare($sqldel);
			
		$querydel->bindParam(':id',$id);
			
		$valaux=$querydel->execute();
	
		return $valaux;
	}
	
	function Agregar(){
		$db=dbconnect();
		$sqlins="insert into usuario (apellido_usuario,scodigo_perfil,scorreo_usuario,edad_usuario,fechanacimiento_usuario,id_usuario,
	    login_usuario,nombre_usuario,pass_usuario) values (:ape,:cod,:correo,:edad,:fecha,:id,:log,:nom,:pwd)";
	
		// Valida si usuario existe, si existe no lo agrega.
		if ($this->VerificaUsuario()){
			echo "Clase Usuario:Agregar: El usuario $this->sUsuario existe en la base de datos.";
			return false;
		}
	
		/*Preparacion SQL*/
		try {
			$queryins=$db->prepare($sqlins);
			}
			catch( PDOException $Exception ) {
			echo "Clase Usuario:ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
				return false;
			}
	
		/*Asignacion de parametros utilizando bindparam*/
			$queryins->bindParam(':ape',$this->sapellido_usuario);
			$queryins->bindParam(':cod',$this->scodigo_perfil);
			$queryins->bindParam(':correo',$this->scorreo_usuario);
			$queryins->bindParam(':edad',$this->sedad_usuario);
			$queryins->bindParam(':fecha',$this->sfechanacimiento_usuario);
			$queryins->bindParam(':id',$this->sid_usuario);
			$queryins->bindParam(':log',$this->slogin_usuario);
			$queryins->bindParam(':nom',$this->snombre_usuario);
			$queryins->bindParam(':pwd',$this->spass_usuario);
	
						try {
						$queryins->execute();
						}
						catch( PDOException $Exception ) {
						echo "Clase Usuario:ERROR:Ejecucion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
						}
			}
			
			
			
			function Actualizar(){
				$db=dbconnect();
				$sqlupd = " UPDATE usuario SET nombre=:nom, nomusuario=:nus, pwdusuario=:pus ";
				$sqlupd.= " WHERE idacceso=:id ";
			
				/*Preparacion SQL*/
				try {
					$queryupd=$db->prepare($sqlupd);
				} catch( PDOException $Exception ) {
					echo "Clase Usuario:ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
				}
			
				/*Asignacion de parametros utilizando bindparam*/
				$queryupd->bindParam(':id',$this->sId);
				$queryupd->bindParam(':nom',$this->snombre);
				$queryupd->bindParam(':nus',$this->susuario);
				$queryupd->bindParam(':pus',$this->sclave);
				
			
				try {
					$queryupd->execute();
				} catch( PDOException $Exception ) {
					echo "Clase Usuario:ERROR:Ejecucion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
				}
			}

}
?>