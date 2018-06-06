<html>
<head>
	<style>
		.thumb {
			height: 100px;
			border: 1px solid #000;
			margin: 10px 5px 0 0;
		}
	</style>
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
            <li class="active"><a href="<?=base_url()?>index.php/foro/registro">
            	<span class="glyphicon glyphicon-new-window"></span>&nbsp;
            	Registrarse</a></li>
            <li><a href="<?=base_url()?>index.php/foro/inicio_sesion">
            	<span class="glyphicon glyphicon-log-in"></span>&nbsp;
            	Ingresar</a></li>
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

	<div class="container col-md-6 col-md-offset-3" style="margin-top:30px">
		<div>
			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="panel-title"><strong><center>Registro 
					</strong></h3></div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="post" 
						action="<?php echo base_url('index.php/foro/registro');?>" enctype="multipart/form-data">
						<div class="form-group">
							<label for="avatar" class="col-lg-5 control-label">Añadir imagen de usuario:</label>
							<div class="col-lg-5">
							<input type="file" id="files" name="files">
							<output id="list"></output>
							<p class="help-block">Añade una imagen de usuario</p>
							<span class="help-block"><?=@$error?> </span>
							</div>
						</div>
						<div class="form-group">
							<label for="Nick" class="col-lg-5 control-label"><h5>
								<strong>Nick de usuario: </strong></h5></label>
							<div class="col-lg-5">
							<input type="nick" class="form-control" name="nick"
								placeholder="Introduce nick de usuario">
								<span class="help-block"<?php echo form_error('nick');?></span>
							</div>
						</div>
  						<div class="form-group">
							<label for="Password" class="col-lg-5 control-label">
								<h5><strong>Contraseña: </strong></h5></label>
							<div class="col-lg-5">
							<input type="password" class="form-control" name="password" 
								placeholder="Contraseña">
							<span class="help-block"<?php echo form_error('password');?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="Passconf" class="col-lg-5 control-label"><h5><strong>Confirmar contraseña: 
								</strong></h5></label>
							<div class="col-lg-5">
							<input type="password" class="form-control" name="passconf" 
								placeholder="Confirma tu contraseña">
							<span class="help-block"<?php echo form_error('passconf');?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="Nombre" class="col-lg-5 control-label"><h5><strong>Nombre: </strong></h5></label>
							<div class="col-lg-5">
							<input type="nombre" class="form-control" name="nombre" 
								placeholder="Introduce tu nombre">
							<span class="help-block"<?php echo form_error('nombre');?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="Apellidos" class="col-lg-5 control-label"><h5><strong>Apellidos: </strong></h5></label>
							<div class="col-lg-5">
							<input type="apellidos" class="form-control" name="apellidos" 
								placeholder="Introduce tus apellidos">
							<span class="help-block"<?php echo form_error('apellidos');?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="Email" class="col-lg-5 control-label"><h5><strong>Correo electrónico: </strong></h5>
								</label>
							<div class="col-lg-5">
							<input type="email" class="form-control" name="email" 
								placeholder="Introduce tu email">
							<span class="help-block"<?php echo form_error('email');?></span>
							</div>
						</div>
  						<button type="submit" class="btn btn-sm btn-primary col-md-offset-10">Registrarse</button>
					</form>
				</div>
			</div>
		</div>
		<center>Copyright © 2016 Creado por los alumnos de la asignatura programación web. Todos los derechos
    reservados.
    <br>
		<script>
			function archivo(evt) {
				var files = evt.target.files; // FileList object
				// Obtenemos la imagen del campo "file".
				for (var i = 0, f; f = files[i]; i++) {
					//Solo admitimos imágenes.
					//f = files;
					if (!f.type.match('image.*')) {
						continue;
					}

					var reader = new FileReader();

					reader.onload = (function(theFile) {
						return function(e) {
							// Insertamos la imagen
							document.getElementById("list").innerHTML = 
								['<img class="thumb" src="', e.target.result,'" title="', 
									escape(theFile.name), '"/>'].join('');
						};
						})(f);

					reader.readAsDataURL(f);
				}
			}
			document.getElementById('files').addEventListener('change', archivo, false);
		</script>
</body>
</html>