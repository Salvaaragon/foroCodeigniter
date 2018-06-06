<?php
class Forum extends CI_Controller 
{
	public function __construct() 
	{
		
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->helper('date');
		$this->load->model('foro_model','foro');
		$this->load->model('forum_model');
		$this->load->model('user_model');	
		$this->load->helper('form');	
	}

	public function crear_subforo($Id_Usuario, $nick) 
	{		
				
		$secciones   = $this->forum_model->get_secciones();
		$options = '';
		foreach ($secciones as $secciones) 
		{
			
			$options .= '<option value="'.$secciones->id.'" selected>'.$secciones->nombre.'</option>';
			
		}

		$nombre       = $this->input->post('Nombre');
		$descripcion = $this->input->post('Descripcion');
		$id_seccion = $this->input->post('Seccion');

		$datos['options'] = $options;
		$datos['IdUser'] = $Id_Usuario;
		$datos['nick'] = $nick;
		$datos['admin'] = $this->foro->esAdmin($nick);
		
		if ($nombre != NULL) {

			$this->forum_model->crear_subforo($nombre, $descripcion,$id_seccion);

			$this->load->view('forum/create/create_success', $datos);

		} else {

			$this->load->view('forum/create/create', $datos);			
		}		
	}

	public function borrar_subforo($Id_Usuario, $nick) {
		
		$forums = $this->forum_model->get_subforo();
		$foros = '';
		foreach ($forums as $forum)
		{	
			$foros .= '<option value="'.$forum->Id.'">'.$forum->Nombre.'</option>';	
		}

		$id_subforo = $this->input->post('subforo');			
		$nombre_tabla = 'subforo';

		$datos['foros'] = $foros;
		$datos['IdUser'] = $Id_Usuario;
		$datos['nick'] = $nick;
		$datos['admin'] = $this->foro->esAdmin($nick);
		
		if ($id_subforo != NULL) {
			$this->forum_model->borrar_subforo($id_subforo,$nombre_tabla);
			$this->load->view('forum/create/delete_success', $datos);
			
		} else {
						
			$this->load->view('forum/create/delete', $datos);				
		}		
	}	
}
