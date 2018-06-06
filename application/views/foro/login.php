<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container" >
		<center><img src="<?=base_url()?>imagenes/logoforo" WIDTH = 850 height =304>
		</div>
		<br>
    <nav class="navbar navbar-inverse col-md-10 col-md-offset-1">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?=base_url()?>">
            	<span class="glyphicon glyphicon-home"></span>&nbsp;
            	Inicio</a></li>
            <li><a href="<?=base_url()?>index.php/foro/registro">
            	<span class="glyphicon glyphicon-new-window"></span>&nbsp;
            	Registrarse</a></li>
            <li class="active"><a href="<?=base_url()?>index.php/foro/inicio_sesion">
            	<span class="glyphicon glyphicon-log-in"></span>&nbsp;
            	Ingresar</a></li>
            	<li><a></a></li>
        <li><a></a></li></li><li><a>|</a></li>
            <li>
            		<a><?php date_default_timezone_set("Europe/Madrid"); 
        					$datestring = '%d of %F %Y, %H:%i';
        					$time = time();
					 		echo mdate($datestring, $time); 
					 	?>
					</a>
			</li>
			<li><a>|</a></li>
			<li><a></a></li>
			<li><a></a></li>
			<li><a></a></li>
			<li><a></a></li>
			<li><a></a></li>
			<li><a>Bienvenido, invitado</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

	<div class="container col-md-4 col-md-offset-4" style="margin-top:30px">
		<div>
			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="panel-title"><strong><center>Iniciar sesión 
					</strong></h3></div>
				<div class="panel-body">
					<form role="form" method="post" action="<?php echo base_url('index.php/foro/valida_usuario');?>">
						<div class="form-group">
							<label for="Nick">Nick de usuario: </label>
							<input type="nick" class="form-control" name="nick"
								placeholder="Introduce tu nick">
								<span class="help-block"<?php echo form_error('nick');?></span>
						</div>
  						<div class="form-group">
							<label for="Password">Contraseña:</label>
							<input type="password" class="form-control" name="password" 
								placeholder="Contraseña">
							<span class="help-block"<?php echo form_error('password');?></span>
							<span class="help-block"><center><?=@$error?> </span>
							</div>
  						<button type="submit" class="btn btn-sm btn-default">Sign in</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="container col-md-12">
		<center>Copyright © 2016 Creado por los alumnos de la asignatura programación web. Todos los derechos
    reservados.
    <br>
	</div>
</body>
</html>