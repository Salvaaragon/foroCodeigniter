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
            <li class ="active"><a href="<?=base_url()?>index.php/foro/indexConLogin/<?=$IdUser?>/<?=$nick?>">
            	<span class="glyphicon glyphicon-home"></span>&nbsp;
            	Inicio</a></li>
            <li><a href="<?=base_url()?>">
                        <span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                        Logout</a>
                    </li>
                      <li><a href="<?=base_url()?>index.php/User/index/<?=$nick?>">
                <span class="glyphicon glyphicon-log-out"></span>&nbsp;
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

<div class="container col-md-4 col-md-offset-4" style="margin-top:30px">
		<div>
			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="panel-title"><strong><center>Crear post 
					</strong></h3></div>
				<div class="panel-body">
					<form role="form" method="post" action="<?=base_url()?>index.php/controladorPost/almacenarPost/<?=$idsubforo?>/<?=$IdUser?>/<?=$nick?>">
						<div class="form-group">
							<label for="titulo">Titulo: </label><br>
							<input type="text" name="titulo">
						</div>
						<br>
						<div class="form-group">
							<label for="descripcion"> Descripcion:</label><br>
							<textarea cols=50 rows=9 name="descripcion"></textarea>
							<br>
							
							</div>
  							<button type="submit" name="Crear">Crear post</button>
					</form>
				</div>
			</div>
		</div>

<center>Copyright © 2016 Creado por los alumnos de la asignatura programación web. Todos los derechos
    reservados.
    <br>
</body>
</html>