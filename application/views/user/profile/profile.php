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
            <li ><a href="<?=base_url()?>index.php/foro/indexConLogin/<?=$IdUser?>/<?=$nick?>">
            	<span class="glyphicon glyphicon-home"></span>&nbsp;
            	Inicio</a></li>
            <li><a href="<?=base_url()?>index.php/foro/logout">
                <span class="glyphicon glyphicon-log-out"></span>&nbsp;
                Logout</a></li>
            <li class="active"><a href="<?=base_url()?>index.php/User/perfil/<?=$IdUser?>/<?=$nick?>">
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
				<center><h1>Perfil de usuario <small><?= $usuario->Nick ?></small> <?= $edit_button ?></h1>
			</div>
		</div>
		<div class="col-md-12">
			<div class="row">
				<div class="col-sm-2 col-sm-offset-4 text-center">
					<img class="avatar" src="<?= base_url('imagenes/' . $usuario->imagen) ?>" WIDTH = 150 height =150>
					
				</div>
				<div class="col-sm-4 ">
					<p>Nombre: <?= $usuario->Nombre ?></p>
					<p>Apellidos: <?= $usuario->Apellidos ?></p>
					<p>Correo: <?= $usuario->Correo ?></p>
					<p>Nick: <?= $usuario->Nick ?></p>
				</div>
			</div><!-- .row -->
		</div>
	</div><!-- .row -->
</div><!-- .container -->

<center>Copyright © 2016 Creado por los alumnos de la asignatura programación web. Todos los derechos
    reservados.
    <br>


<?php //var_dump($usuario); ?>