<?php
	include_once 'conexiondb-singleton.php';
	class Sesion{
		
		function __construct(){
		
		}
		
		public function iniciarSesion($datos){
			$conexion=Conexion::getConexion();
			$email=$datos["email"];
			$pass=$datos["contrasenia"];

			$consulta= "SELECT nombre, apellido, id, contrasenia FROM usuarios WHERE email='".$email."'";
			$resultado=$conexion->query($consulta);
			if (mysqli_num_rows($resultado)==0) {
				$this -> escribirLog("Inicio fallido", $email, "");
				header("location:/UMBook/home.php?error=si");
			}else{
				$usuario=$resultado->fetch_assoc();
				if (password_verify($pass,$usuario["contrasenia"])) {
	                $_SESSION["id"]=$usuario["id"];
	                $_SESSION["nombre"]=$usuario["nombre"];
	                $_SESSION["apellido"]=$usuario["apellido"];
	                $this -> escribirLog("Inicio", $email, $_SESSION["id"]);
	                header("location:/UMBook/home.php");
	            }else{
	                $this -> escribirLog("Inicio fallido", $email, "");
	                header("location:/UMBook/home.php?error=si");	
	            }
			}
		}
		
		public function cerrarSesion(){
			session_start();
			$this -> escribirLog("Cierre sesion", "", $_SESSION["id"]);
			session_unset();
			session_destroy();
			header("location:/UMBook/home.php");
		}

		function escribirLog($accion, $email, $id){
			$archivo=fopen("sesion.log", "a+");
			fwrite($archivo, date(DATE_ATOM).",".$accion.",".$email.",".$id.PHP_EOL);
			fclose($archivo);
		}
	}

?>