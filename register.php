<?php 
	include_once "usuario.php";
	if(isset($_POST["nombre"])){
		$pepito = new Usuario($_POST);
		$pepito->agregar();
	}
 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Dog Support</title>
		<link rel="shortcut icon" href="../favicon-paw.ico">
		<meta charset="utf-8">
		<!--Colocar el viewport -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!--Incluir JS de Bootstrap-->
		<!--<script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>-->
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
		<style>
			.dropdown-submenu {
			    position: relative;
			}
			#carouselExampleIndicators {
			    top: 10px;
			}
			.dropdown-submenu .dropdown-menu {
			    top: 0;
			    left: 100%;
			    margin-top: -1px;
			}
			body{
			    background-image: url("grey-paw-print-with-gradient.svg");
			    background-repeat: no-repeat;
			    background-attachment: fixed;
			    background-size: cover;
			    background-position: center;
			}
		</style>
	</head>
	<body>
		<div class="container jumbotron" style="margin-top: 40px">
			<form class="form" role="form" autocomplete="off" action="register.php" id="loginForm" method="POST">
				<div class="form-group row">
				  	<label for="nombre" class="col-2 col-form-label">Nombre</label>
				  	<div class="col-10">
				    	<input class="form-control" type="text" placeholder="Ingrese su nombre..." pattern="[A-Za-z]{1,255}" id="nombre" name="nombre" required />
				    	<div class="invalid-feedback">Por favor ingrese su nombre</div>
				  	</div>
				</div>
				<div class="form-group row">
				  	<label for="apellido" class="col-2 col-form-label">Apellido</label>
				  	<div class="col-10">
				    	<input class="form-control" type="text" placeholder="Ingrese su apellido..." pattern="[A-Za-z]{1,255}" id="apellido" name="apellido" required />
				  		<div class="invalid-feedback">Por favor ingrese su apellido</div>
				  	</div>
				</div>
				<div class="form-group row">
				  	<label for="email" class="col-2 col-form-label">Email</label>
				  	<div class="col-10">
				   	 	<input class="form-control" type="email" placeholder="direccion@mail.com" id="email" name="email" required />
				  		<div class="invalid-feedback">Por favor ingrese una direccion de email</div>
				  	</div>
				</div>
				<div class="form-group row">
				  	<label for="tel" class="col-2 col-form-label">Teléfono</label>
				  	<div class="col-10">
				    	<input class="form-control" type="tel" placeholder="1-(555)-555-5555" pattern="[0-9]{1-25}" id="tel" name="telefono" required />
				  		<div class="invalid-feedback">Por favor ingrese su numero de telefono</div>
				  	</div>
				</div>
				<div class="form-group row">
				  	<label for="password" class="col-2 col-form-label">Contraseña</label>
				  	<div class="col-10">
				    	<input class="form-control" type="password" placeholder="Ingrese su contraseña..." pattern="[A-Za-z0-9]{1,255}"  id="password" name="password" required />
				  		<div class="invalid-feedback">Por favor ingrese su contraseña</div>
				  	</div>
				</div>
				<button type="submit" class="btn btn-success btn-lg float-right" id="btnRegister">Registrar</button>
			</form>
		</div>
	<body>
<html>
