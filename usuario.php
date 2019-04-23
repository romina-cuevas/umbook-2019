<?php
	include_once "conexiondb-singleton.php";
	class Usuario{
		private $usuarioId;
		private $nombre;
		private $apellido;
		private $email;
		private $telefono;
		private $password;
		
		function __construct($datos){
			if(isset($datos["usuarioId"])){
				$this -> usuarioId = $datos["usuarioId"];
			}
			if(isset($datos["nombre"])){
				$this -> nombre = $datos["nombre"];
			}
			if(isset($datos["apellido"])){
				$this -> apellido = $datos["apellido"];
			}
			if(isset($datos["email"])){
				$this -> email = $datos["email"];
			}
			if(isset($datos["telefono"])){
				$this -> telefono = $datos["telefono"];
			}
			if(isset($datos["password"])){
				$this -> password = $datos["password"];
			}
		}

		public function setUsuarioId($usuarioId){
			$this -> usuarioId = $usuarioId;
		}
		
		public function setNombre($nombre){
			$this -> nombre = $nombre;
		}
		
		public function setApellido($apellido){
			$this -> apellido = $apellido;
		}
		
		public function setEmail($email){
			$this -> email = $email;
		}

		public function setTelefono($telefono){
			$this -> telefono = $telefono;
		}
		
		public function setPassword($password){
			$this -> password = $password;
		}
		
		public function getUsuarioId(){
			return $this -> usuarioId;
		}

		public function getNombre(){
			return $this -> nombre;
		}
		
		public function getApellido(){
			return $this -> apellido;
		}

		public function getEmail(){
			return $this -> email;
		}
		
		public function getTelefono(){
			return $this -> telefono;
		}

		public function getPassword(){
			return $this -> password;
		}

		public function agregar(){
			$conexion=Conexion::getConexion();
			$consulta = 'INSERT INTO usuarios VALUES (NULL,"'.$this -> nombre.'","'.$this -> apellido.'","'.$this -> email.'","'.$this -> telefono.'","'.password_hash($this -> password,PASSWORD_DEFAULT).'")';
			if(!$conexion->query($consulta)){
				echo $conexion->getConection()->error;
			}
	    	echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
			echo '  <strong>Exito!</strong> Se ha creado el usuario '.$this -> getNombre().' '.$this -> getApellido().'.';
			echo '  <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
			echo '   <span aria-hidden="true">&times;</span>';
			echo ' </button>';
			echo '</div>';
		}
		
		public function editar(){
			$conexion=Conexion::getConexion();
			$consulta = 'UPDATE usuarios SET nombre="'.$this -> nombre.'",apellido="'.$this -> apellido.'",email="'.$this -> email.'",telefono="'.$this -> telefono.'" WHERE usuarioId=('.$this -> usuarioId.')';
			if(!$conexion->query($consulta)){
				echo $conexion->getConection()->error;
			}
	    	echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
			echo '  <strong>Exito!</strong> Se ha editado el usuario '.$this -> getNombre().' '.$this -> getApellido().'.';
			echo '  <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
			echo '   <span aria-hidden="true">&times;</span>';
			echo ' </button>';
			echo '</div>';
		}

		public function eliminar(){
			$conexion=Conexion::getConexion();
			$consulta='DELETE FROM usuarios WHERE usuarioId="'.$this -> usuarioId.'"';

			if(!$conexion->query($consulta)){
				echo $conexion->getConection()->error;
			}
		    	echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
				echo '  <strong>Exito!</strong> Se ha borrado el usuario '.$this -> getNombre().' '.$this -> getApellido().'.';
				echo '  <button type="button" class="close" data-dismiss="alert" aria-label="Close">';
				echo '    <span aria-hidden="true">&times;</span>';
				echo '  </button>';
				echo '</div>';
		}
	}

?>