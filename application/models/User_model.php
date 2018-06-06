<?php
class User_model extends CI_Model {

	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}
	
	public function get_id_usuario($nick) {
		
		$this->db->select('id');
		$this->db->from('usuario');
		$this->db->where('Nick', $nick);

		return $this->db->get()->row('id');
		
	}

	public function get_usuario($id_usuario) {
		
		$this->db->from('usuario');
		$this->db->where('id', $id_usuario);
		return $this->db->get()->row();
		
	}

	public function get_usuarios() {
		
		$this->db->from('usuario');
		return $this->db->get()->result();
		
	}

	public function actualizar_usuario($id_usuario, $data) {
		
		if (!empty($data)) {
			
			$this->db->where('id', $id_usuario);
			return $this->db->update('usuario', $data);			
		}
		return false;		
	}

	public function borrar_usuario($id_usuario) 
	{		
		$this->db->where('id', $id_usuario);
		if ($this->db->delete('usuario')) 
		{
			$this->db->where('id_usuario', $id_usuario);
			if ($this->db->delete('post')) 
			{
				$this->db->where('id_usuario', $id_usuario);
				return $this->db->delete('comentario');
			}
			return false;
		}
		return false;		
	}	
}
