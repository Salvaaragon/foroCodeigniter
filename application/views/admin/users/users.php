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
            <li><a href="<?=base_url()?>index.php/User/perfil/<?=$IdUser?>/<?=$nick?>">
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
                <li class ="active"><a href="<?=base_url()?>index.php/Admin/admin/<?=$IdUser?>/<?=$nick?>">
                <span class="glyphicon glyphicon-info-sign"></span>&nbsp;
                ADMIN</a></li>
			<li><a>Bienvenido, <?php echo $nick; ?></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<div class="container">
	<div class="row">
		<div class="col-md-2">
			<ul class="nav nav-pills nav-stacked">
				<li role="presentation"><a href="<?=base_url()?>index.php/Admin/admin/<?=$IdUser?>/<?=$nick?>">Menu</a></li>
				<li role="presentation" class="active"><a href="#">Usuarios</a></li>
			</ul>
		</div>
		<div class="col-md-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Usuarios</h3>
				</div>
				<div class="panel-body">
					<table class="table table-striped">
						<caption></caption>
						<thead>
							<tr>
								<th>#</th>
								<th>Usuarios</th>
								<th>Baneado</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($data as $usuario) : ?>
								<tr>
									<td><?= $usuario->Id ?></td>
									<td><?= $usuario->Nick ?></a></td>
									<?php if ($usuario->EstaBaneado) : ?>
									<td>Si</td>
									<?php else : ?>
									<td>No</td>
									<?php endif; ?>
									<td><a class="btn btn-xs btn-primary" href="<?= base_url().'index.php/Admin/banear_usuario/'.$usuario->Nick.'/'.$IdUser.'/'.$nick?>">Banear/Desbanear</a></td>

								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>					
				</div>
			</div>
		</div>
	</div><!-- .row -->
</div><!-- .container -->

</div><!-- /.container -->
    <center>Copyright © 2016 Creado por los alumnos de la asignatura programación web. Todos los derechos
    reservados.
    <br>

<?php //var_dump($usuarios); ?>