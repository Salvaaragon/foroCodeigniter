<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Subforo</title>
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
            <li><a href="<?=base_url()?>index.php/foro/inicio_sesion">
            	<span class="glyphicon glyphicon-log-in"></span>&nbsp;
            	Ingresar</a></li>
            <li><a></a></li>
        	<li><a></a></li></li><li><a>|</a></li>
            		<li><a><?php date_default_timezone_set("Europe/Madrid"); 
        					$datestring = '%d of %F %Y, %H:%i';
        					$time = time();
					 		echo mdate($datestring, $time); 
					 	?>
					</a></li>
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
    <div class="container">

        <p>
<?php
	
	echo '<div class="col-md-12">';
	echo '<table class="table table-bordered"><thead>';
	$nombre = $this->foro->getNombreSubforo((int)$this->uri->segment(3));
			foreach($nombre as $row)
		echo '<h2>'.$row->Nombre.'</h2>';
	echo '<tr class="info">';
	echo '<th class="col-sm-4">Asunto</th>';
	echo '<th class="col-sm-1"><center>Creado por</th>';
	echo '<th class="col-sm-1"><center>Respuestas</th>';
	echo '</tr>';
	echo '</thead>';
	echo '<tbody>';
	echo '<ul>';
	if($query->num_rows() > 0)
	{
		foreach($query->result() as $row)
		{
			echo '<tr><td class="col-sm-2"><a href="'.base_url().'index.php/foro/postNoLogueado/'.$row->Id.'">'
				.$row->Nombre.'</a></td>';
			$usuario = $this->foro->getNickUsuario($row->Id_Usuario);
			foreach($usuario as $row2)
				echo '<td class="col-sm-2">'.$row2->Nick.'</td>';
			$comentarios = $this->foro->getNumComentarios($row->Id);
			foreach($comentarios->result() as $row3)
				echo '<td class="col-sm-2"><center>'.$row3->total.'</td>';
		}
		
		
		echo '</ul>';
	}
		else
		{
			echo '<tr><td colspan="4">No hay ningun post creado</td></tr>';	
		}
		echo '</tbody></table></div>';
	?>
	
	</p>
    </div>
    <center>Copyright © 2016 Creado por los alumnos de la asignatura programación web. Todos los derechos
    reservados.
    <br>
    


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>