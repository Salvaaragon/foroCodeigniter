<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorPost extends CI_Controller {

	function __construct() {

		parent::__construct();
		//$this->load->helper('mihelper');
		//$this->load->model('foro');
		$this->load->helper('date');
		$this->load->model("foro_model", "foro");
		$this->load->helper('url');
	}

	public function index() 
	{
		
	}

	public function buscar($Id_usuario, $nick)
	{
		$filtros['subforo'] = $this->foro->obtenerDatos("subforo");
		
		$filtros['meses'] = array( 1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo',
			4 => 'Abril', 5 => 'Mayo', 6 => 'Junio', 7 => 'Julio',
			8 => 'Agosto', 9 => 'Septiembre', 10 => 'Octubre',
			11 => 'Noviembre', 12 => 'Diciembre');
			
		$filtros['nick'] = $nick;
		$filtros['IdUser'] = $Id_usuario;
		$filtros['admin'] = $this->foro->esAdmin($nick);

		$this->load->view('headers');
		$this->load->view('Busqueda/busqueda', $filtros);
	}

	public function resultadosBusqueda($Id_usuario, $nick) {

		$datos = array(
			'subforo' => $this->input->post('subforo'),
			'usuario' => $this->input->post('usuario'),
			'nombre' => $this->input->post('nombre'),
			'fechadia' => $this->input->post('fecha_dia'),
			'fechames' => $this->input->post('fecha_mes'),
			'fechaanio' => $this->input->post('fecha_ano')
		);

		$resultado['filtro'] = $this->foro->filtrarBusqueda($datos);
		$resultado['nick'] = $nick;
		$resultado['IdUser'] = $Id_usuario;
		$resultado['admin'] = $this->foro->esAdmin($nick);

		$this->load->view('headers');
		$this->load->view('Busqueda/resultadoBusqueda', $resultado);
	}

	/*
	public function nuevoComentario(){

		$datos = array(
			'Id_post' => $this->uri->segment(3),
			'Id_Usuario' => 1,
			'Titulo' => "Fecha mas lo que sea",
			'Descripcion' => $this->input->post('comentario'),
			'Likes' => 0,
			'Dislikes' => 0
		);

		$this->foro->insertar($datos);

	}
	*/

	public function mostrarPost($Nick) {

		if($this->input->post('comentario')) {

			$fecha = getdate();
			$array = "Creado por ".$Nick." el ".$fecha['mday'].' de '.$fecha['month'].' de '.$fecha['year'].', a las'.$fecha['hours'].':'.$fecha['minutes'].':'.$fecha['seconds'];

			$datos = array(
				'Id_Post' => $this->input->post("id"),
				'Id_Usuario' => $Nick,
				'Titulo' => $array,
				'Descripcion' => $this->input->post('comentario'),
				'Likes' => 0,
				'Dislikes' => 0
			);

			$this->foro->insertar('comentario', $datos);
		}

		if($this->input->post('megusta') !== NULL) {

			//$yacomentado = false;

			$datos['valor'] = $this->input->post('megusta') + 1;
			$datos['id'] = $this->input->post('id_comentario');
			$datos['valoracion'] = 'Likes';
			//$datos['id_user'] = $this->input->post('usuario');
			
			/*
			if($dar['$datos[id]']['$datos[id_user]'] != $this->input->post('nick')) {
				$dar['$datos[id]']['$datos[id_user]'] = $this->input->post('nick');
				$yacomentado = true;
			}

			
			if($yacomentado)
			*/	
			$this->foro->actualizar('comentario', $datos);
		}

		if($this->input->post('nomegusta') !== NULL) {

			//$yacomentado = false;

			$datos['valor'] = $this->input->post('nomegusta') + 1;
			$datos['id'] = $this->input->post('id_comentario');
			$datos['valoracion'] = 'Dislikes';
			/*$datos['id_user'] = $this->input->post('usuario');
			$x = $datos['id'];
			$y = $datos['id_user'];
			
			if($dar['$x']['$y'] != $this->input->post('nick')) {
				$dar[$datos['id']][$datos['id_user']] = $this->input->post('nick');
				$yacomentado = true;
			}

			
			if(!$yacomentado)
			*/
			$this->foro->actualizar('comentario', $datos);
		}
		
		$datos['comentarios'] = $this->foro->obtenerComentarios($this->uri->segment(3));	
		$datos['usuarios'] = $this->foro->obtenerDatos("usuario");
		$datos['post'] = $this->foro->obtenerDato("post", $this->uri->segment(3));

		$this->load->view('Post/post', $datos);
	}


	public function crearPost($id_subforo,$IdUser, $nick) {

		$filtros['subforo'] = $this->foro->obtenerDatos("subforo");
		$filtros['IdUser'] = $IdUser;
		$filtros['nick'] = $nick;
		$filtros['admin'] = $this->foro->esAdmin($nick);
		$filtros['idsubforo'] = $id_subforo;
		$this->load->view('Post/crearPost', $filtros);
	}

	public function almacenarPost($id_subforo, $Id_Usuario, $nick) {

		// Tomar fecha del sistema.
		$hoy = getdate();
		$fecha = $hoy['year'];

		if($hoy['mon'] < 10)
			$fecha = $fecha.'0'.$hoy['mon'];
		else
			$fecha = $fecha.$hoy['mon'];

		if($hoy['mday'] < 10)
			$fecha = $fecha.'0'.$hoy['mday'];
		else
			$fecha = $fecha.$hoy['mday'];

		// User variable session (Eso espero ajajajajaja).

		// Palabras exploud.
		$palabra = $this->input->post('titulo');
		$palabras = multiexplode(array(",",".","|",":"," "), $palabra);
		$final = "";

		for($i=0; $i<count($palabras); $i++)
			$final = $final.$palabras[$i].',';

		$final = substr($final, 0, -1);

		$datos = array(
			'Id_Subforo' => $id_subforo,
			'Id_Usuario' => $Id_Usuario,
			'Nombre' => $this->input->post('titulo'),
			'Palabras' => $final,
			'Descripcion' => $this->input->post('descripcion'),
			'fechaCreacion' => $fecha
		);

		$this->foro->insertar('post', $datos);
		$lastId = $this->foro->ultimoId();

		$datos['query'] = $this->foro->obtenerComentarios($lastId);	
		$datos['usuarios'] = $this->foro->obtenerDatos("usuario");
		$datos['post'] = $this->foro->obtenerDato("post", $lastId);
		$datos['IdUser'] = $Id_Usuario;
		$datos['nick'] = $nick;

		$this->load->view('foro/postlogueado', $datos);
	}

	

}
	function multiexplode ($delimiters,$string) {
   
    	$ready = str_replace($delimiters, $delimiters[0], $string);
   	 	$launch = explode($delimiters[0], $ready);
    	return  $launch;
	}
?>