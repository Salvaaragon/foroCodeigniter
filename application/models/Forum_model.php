<?php
class Forum_model extends CI_Model 
{
	public function __construct() 
	{	
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('url'));		
	}
	
	public function crear_subforo($nombre, $descripcion,$id_seccion) 
	{		
		$data = array(
			'Nombre'       => $nombre,
			'Descripcion' => $descripcion,
			'Id_Seccion'  => $id_seccion,
		);
		
		return $this->db->insert('subforo', $data);		
	}

	public function borrar_subforo($id, $nombre_tabla) 
	{		
		$this->db->where('id', $id);
   		$this->db->delete($nombre_tabla);	
	}

	public function get_subforo() {
		
		return $this->db->get('subforo')->result();
		
	}

	public function get_secciones() {

		$this->db->select('id,nombre');
		$this->db->from('seccion');
		return $this->db->get()->result();		
	}
}
