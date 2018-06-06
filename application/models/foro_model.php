<?php
	class Foro_model extends CI_Model 
	{	
		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		function esAdmin($nick)
		{
			$this->db->select("EsAdmin");
			$this->db->where("Nick",$nick);
			$q = $this->db->get('Usuario');
			return $q->result();
		}
		
		function getSecciones($login)
		{
			$this->load->database();
			if(!$login)
				$this->db->where("Id",1);
			$q = $this->db->get('Seccion');
			return $q;
		}

		function getNumTemas($Id_Subforo)
		{
			$this->load->database();
			$this->db->select('COUNT(Id) as total');
			$this->db->where("Id_Subforo", $Id_Subforo);
			$q = $this->db->get('Post');
			return $q;
		}

		function getSubforos($Id_Seccion)
		{
			$this->load->database();
			$this->db->where("Id_Seccion", $Id_Seccion);
			$q = $this->db->get('Subforo');
			return $q;
		}

		function getNombreSubforo($Id = 0)
		{
			$this->load->database();
			$this->db->where("Id", $Id);
			$this->db->select("Nombre");
			$q = $this->db->get("Subforo");
			
			return $q->result();
		}
		
		function getPosts($Id_Subforo = 0)
		{
			$this->load->database();
			$this->db->where("Id_Subforo", $Id_Subforo);
			$q = $this->db->get("Post");
			return $q;
		}

		function getNumComentarios($Id_Post)
		{
			$this->load->database();
			$this->db->select('COUNT(Id) as total');
			$this->db->where("Id_Post", $Id_Post);
			$q = $this->db->get('Comentario');
			return $q;
		}

		function getNickUsuario($Id_Usuario)
		{
			$this->load->database();
			$this->db->where("Id", $Id_Usuario);
			$q = $this->db->get("Usuario");
			return $q->result();
		}

		function getImagenUsuario($Id_Usuario)
		{
			$this->load->database();
			$this->db->select('Imagen');
			$this->db->where("Id", $Id_Usuario);
			$q = $this->db->get("Usuario");
			return $q->result();
		}

		public function obtenerDato($tabla, $id) 
		{

			$this->db->where('Id', $id);
			$query = $this->db->get($tabla);

			if($query->num_rows() > 0) {
				return $query;
			}
			else { return 0; }
		}

		public function obtenerDatos($tabla) {

			$query = $this->db->get($tabla);

			if($query->num_rows() > 0) {
				return $query;
			}
			else { return 0; }
		}

		public function filtrarBusqueda($datos) {

			$usuario = "";
			$nombre = "";
			$fechaCreacion = "";
			$conSubforo = "";
			$contador = 0;

			if($datos['usuario']) {
				$this->db->where('Nick', $datos['usuario']);
				$user = $this->db->get('usuario');

				foreach ($user->result() as $value)
					$usuario = $value->Id;
				$contador += 1;

				$this->db->where('Id_Usuario', $usuario);
			}

			if($datos['nombre']) {
				$nombre= $datos['nombre'];
				$contador += 1;
				/*
				$palabras = multiexplode((array(",",".","|",":"," "), $datos['nombre']);

				$posts = obtenerDatos("post");
				$iter = 0; 
				foreach ($posts->result() as $value) {
					$pclave[$iter] = $value->palabras;
					$id_[$iter] = $value->Id;
					$iter += 1;

				}
				*/
				$this->db->where("Nombre LIKE '".$nombre."' OR Nombre LIKE '%".$nombre."' OR Nombre LIKE '".$nombre."%'");

				//$this->db->where('Nombre', $nombre);
			}

			if($datos['fechadia'] && $datos['fechames'] && $datos['fechaanio']) {

				$fecha = $datos['fechaanio'].$datos['fechames'].$datos['fechadia'];
				$fechaCreacion = $fecha;
				$contador += 1;

				$this->db->where('fechaCreacion >', $fechaCreacion);
			}

			if($datos['subforo'][0] != "") {

				foreach ($datos['subforo'] as  $value) {
					$conSubforo = $conSubforo.'Id_Subforo = '.$value.' OR ';
				}

				$conSubforo = substr($conSubforo, 0, -4);
				$contador += 1;

				$this->db->where($conSubforo);
			}

			$query = $this->db->get('Post');

			if($query->num_rows() > 0) {
				return $query;
			}
			else { return 0; }
		}

		public function obtenerComentarios($id_post) {

			$this->db->where('Id_Post', $id_post);
			$query = $this->db->get('Comentario');

			if($query->num_rows() > 0) {
				return $query;
			}
			else { return 0; }
		}

		public function insertar($tabla, $datos) {

			$this->db->insert($tabla, $datos);
		}

		public function actualizar($tabla, $dato) {

			$valor = array($dato['valoracion'] => $dato['valor']);

			$this->db->where('Id', $dato['id']);
			$this->db->update($tabla, $valor);
		}

		public function ultimoId() {

			$id = $this->db->insert_id();
			return $id;
		}
	}
?>