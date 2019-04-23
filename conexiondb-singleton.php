<?php

error_reporting(E_ALL);
ini_set("display_errors",1);

class Conexion
{
	private $host="localhost";
	private $user="admin";
	private $pass="campana12";
	private $db="umbookdb";
	private $conexion;
	
	private static $instance;

	protected function __construct()
	{
		$this->conexion = mysqli_connect($this->host,$this->user,$this->pass,$this->db);
	}

	public function getConection()
	{
		return $this->conexion;
	}

	public static function getConexion()
	{
		if(!isset(self::$instance))
		{
			self::$instance=new self;
		}
		return self::$instance;
		
	}
	public function query($consulta)
	{
		if (!($resultado=$this->conexion->query($consulta))){
				echo $this->conexion->error;
		}
		return $resultado;
	}

}

session_start();


?>