<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Foro con login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>estilos/estilo.css" />
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container" >
		<center><img src="<?=base_url()?>imagenes/logoforo" WIDTH = 850 height =304 >
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
            <li><a href="<?=base_url()?>index.php/foro/indexConLogin/<?=$IdUser?>/<?=$nick?>">
            	<span class="glyphicon glyphicon-home"></span>&nbsp;
            	Inicio</a></li>
            <li><a href="<?=base_url()?>index.php/foro/logout">
                <span class="glyphicon glyphicon-log-out"></span>&nbsp;
                Logout</a></li>
            <li class ="active"><a href="<?=base_url()?>index.php/User/perfil/<?=$IdUser?>/<?=$nick?>">
                <span class="glyphicon glyphicon-user"></span>&nbsp;
                Perfil</a></li>
            <li><a href="<?=base_url()?>index.php/controladorPost/buscar/<?=$IdUser?>/<?=$nick?>">
                <span class="glyphicon glyphicon-search"></span>&nbsp;
                Buscar</a></li>
            	<li><a></a></li>
            	<li><a>|</a></li>
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
                <?php if($admin) ?>
                <li><a href="<?=base_url()?>index.php/Admin/admin/<?=$IdUser?>/<?=$nick?>">
                <span class="glyphicon glyphicon-info-sign"></span>&nbsp;
                ADMIN</a></li>
			<li><a>Bienvenido, <?php echo $nick; ?></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1>Editar Perfil de Usuario <small><?= $usuario->Nick ?></small></h1>
			</div>
		</div>
		<div class="col-md-12">
			<div class="row">
				<form class="form-horizontal" role="form" method="post" 
						action ="<?=base_url().'index.php/User/editar/'.$IdUser.'/'.$usuario->Nick?>" 
						enctype="multipart/form-data">
					<div class="col-md-9">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Editar Perfil</h3>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-sm-3 text-center">
										<img class="avatar" src="<?= base_url('imagenes/' . $usuario->imagen) ?>" WIDTH = 150 height =150>
										<br><br>
										<div class="form-group">
											<label for="avatar">Cambia tu foto de perfil</label>
											<input type="file" id="avatar" name="userfile" style="word-wrap: break-word">
										</div>
									</div>
									<div class="col-sm-6 col-sm-offset-2">
										<div class="form-group">
											<label for="nombre">Nombre</label>
											<input type="text" class="form-control" id="nombre" name="nombre" placeholder="<?= $usuario->Nombre ?>">
										</div>
										<div class="form-group">
											<label for="apellido">Apellidos</label>
											<input type="text" class="form-control" id="apellido" name="apellido" placeholder="<?= $usuario->Apellidos ?>">
										</div>
										<div class="form-group">
											<label for="correo">Correo</label>
											<input type="correo" class="form-control" id="correo" name="correo" placeholder="<?= $usuario->Correo ?>">
										</div>
										<div class="form-group">
											<label for="current_password">Contraseña</label>
											<input type="password" class="form-control" id="current_password" name="current_password" placeholder="Introduce una contraseña si quieres cambiarla">
										</div>
										<div class="form-group">
											<label for="password">Nueva contraseña</label>
											<input type="password" class="form-control" id="password" name="password" placeholder="Introduce aqui la nueva contraseña">
										</div>
										<div class="form-group">
											<label for="password_confirm">Confirma nueva contraseña</label>
											<input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirma la nueva contraseña">
										</div>
										<input type="submit" class="btn btn-primary" value="Actualizar Perfil">
									</div>
								</div><!-- .row -->
							</div>
						</div>
					</div>			
					<div class="col-md-3">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Borrar cuenta</h3>
							</div>
							<div class="panel-body">
								<p>Si quieres borrar tu cuenta haz click abajo.</p>
								<p><strong>CUIDADO. Si pulsas abajo tu cuenta sera borrada instantanea y definitivamente. No hay vuelta atras.</strong></p>
								<a href="<?= base_url()?>index.php/User/borrar/<?=$IdUser?>/<?=$usuario->Nick?>" class="btn btn-danger btn-block btn-sm" onclick="return confirm('¿Estas seguro?')">Borrar tu cuenta</a>
							</div>
						</div>	
					</div>
				</form>
			</div><!-- .row -->
		</div>
	</div><!-- .row -->
</div><!-- .container -->


<center>Copyright © 2016 Creado por los alumnos de la asignatura programación web. Todos los derechos
    reservados.
    <br>

<?php //var_dump($usuario); ?>