<?php
class Admin_model extends CI_Model
{
	public function __construct() 
	{		
		parent::__construct();
		$this->load->database();		
	}
	
	public function banear_usuario($id_usuario, $EstaBaneado) 
	{		
		$data = array(
			'EstaBaneado'     => $EstaBaneado,
		);
		
		$this->db->where('id', $id_usuario);
		return $this->db->update('usuario', $data);		
	}	
}
