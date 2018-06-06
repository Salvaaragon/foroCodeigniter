<?php
	class usuarios_model extends CI_Model 
	{	
		function __construct()
		{
			parent::__construct();
		}

		function insertar_usuario($nick, $password, $email, $nombre, $apellidos, $imagen)
		{
			$this->load->database();
			$data = array(
				'Nick' => $nick,
				'Password' => $password,
				'Nombre' => $nombre,
				'Apellidos' => $apellidos,
				'Correo' => $email,
				'imagen' => $imagen
			);

			return $this->db->insert('Usuario', $data);
		}

		function existe_usuario($nick, $password)
		{
			$this->load->helper('url');
			$this->load->database();
			$this->db->select('Id');
			$this->db->from('usuario');
			$this->db->where('Nick', $nick);
			$this->db->where('Password', $password);
			$query = $this->db->get();
			$resultado = $query->result();

			if($query->num_rows() == 1)
				return $resultado;
			else 
				return 0;
		}

		function estaBaneado($nick)
		{
			$this->load->database();
			$this->db->select('EstaBaneado');
			$this->db->where('Nick', $nick);
			$query = $this->db->get('usuario');
			return $query->result();
		}
	}
?>