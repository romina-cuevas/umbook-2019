<?php 
	include_once "usuario.php";
	include_once "sesion.php";
	if(isset($_GET["init"]) && $_GET["init"]==1){
		$sesion = new Sesion();
		$sesion->iniciarSesion($_POST);
	}
	if(isset($_GET["cerrar"])){
		$sesion = new Sesion();
		$sesion -> cerrarSesion();
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
		<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
			<a class="navbar-brand" href="/Dog Support/frontpage.php"> UMBook</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav mr-auto">
			    	<li class="nav-item active">
				        <a class="nav-link" href="/Dog Support/frontpage.php"><i class="fas fa-home"></i> Inicio <span class="sr-only">(current)</span></a>
				    </li>
       			<?php if(isset($_SESSION["id"])) { ?>
			    <ul class="navbar-nav ml-auto float-right">
			    	<li>
			    		<button class="btn btn-success" aria-disabled="true" disabled>"Hola <?php echo $_SESSION["nombre"]." ".$_SESSION["apellido"]?>"</button>
			    	</li>
			        <li>
			        	<a href="#cerrarSesion" class="cerrar" data-toggle="modal"><button class="btn btn-danger btn-block">Cerrar Sesion</button></a>
			        </li>
			    </ul>
			    <?php } 
			    else { ?>

			    </ul>
		            <ul class="nav navbar-nav ml-auto">
		            	<li class="dropdown order-1">
		                    <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-secondary"><i class="fas fa-users"></i> Login <span class="caret"></span></button>
		                    <ul class="dropdown-menu dropdown-menu-right mt-3">
		                       <li class="px-3 py-2">
		                           <form class="form" method="POST" action="/UMBook/home.php?init=1" role="form">
		                                <div class="form-group">
		                                    <input name="email" placeholder="Email" class="form-control form-control-sm" type="text" required>
		                                </div>
		                                <div class="form-group">
		                                    <input name="contrasenia" placeholder="Password" pattern="[A-Za-z0-9]{1,255}" class="form-control form-control-sm" type="password" required>
		                                </div>
		                                <div class="form-group">
		                                    <button type="submit" class="btn btn-primary btn-block">Login</button>
		                                </div>
		                            </form>
		                        </li>
		                    </ul>
		                </li>
		            </ul>

				<?php }?>
			</div>
		</nav>
		<!-- Cerrar Sesion Modal -->
		<div id="cerrarSesion" class="modal fade" style="margin-top: 15%">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">					
						<p>Esta seguro de que desea cerrar sesion?</p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<a href="home.php?cerrar=si" class="btn btn-danger">Cerrar Sesion</a>
					</div>
				</div>
			</div>
		</div>

		<?php if((isset($_GET["error"])) && $_GET["error"]=="si") { ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 100px;">
		<strong>Error!</strong> Ha ocurrido un error al iniciar sesion, por favor intentelo nuevamente.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		</div>
		<?php } ?>

	<body>
<html>
