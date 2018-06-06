<?php

class User extends CI_Controller {

	public function __construct() 
	{		
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->helper('date');
		$this->load->model('foro_model','foro');
		$this->load->model('user_model');
		$this->load->model('forum_model');
		$this->load->helper('form');		
	}

	public function index($nick) {

			
	}

	public function perfil($Id_Usuario, $nick)
	{
		$usuario    = $this->user_model->get_usuario($Id_Usuario);
	
		$edit_button = '<a href="' . base_url().'index.php/User/editar/'.$Id_Usuario.'/'.$usuario->Nick.'" class="btn btn-xs btn-success">Editar perfil</a>';
		
		$datos['usuario'] = $usuario;
		$datos['edit_button'] = $edit_button;
		$datos['IdUser'] = $Id_Usuario;
		$datos['nick'] = $nick;
		$datos['admin'] = $this->foro->esAdmin($nick);

		$this->load->view('user/profile/profile', $datos);	
	}

	public function editar($Id_Usuario, $nick) 
	{			
		$usuario    = $this->user_model->get_usuario($Id_Usuario);
		
		$update_data = [];
		
		if ($this->input->post('nombre') != '') {
			$update_data['nombre'] = $this->input->post('nombre');
		}
		if ($this->input->post('apellido') != '') {
			$update_data['apellidos'] = $this->input->post('apellido');
		}
		if ($this->input->post('correo') != '') {
			$update_data['correo'] = $this->input->post('correo');
		}
		if ($this->input->post('password') != '') {
			$update_data['password'] = $this->input->post('password');
		}

		if (isset($_FILES['userfile']['name']) && !empty($_FILES['userfile']['name'])) 
		{
				
			$config['upload_path']      = './imagenes';
			$config['allowed_types']    = 'gif|jpg|png';
			$config['max_size']         = 2048;
			$config['max_width']        = 1024;
			$config['max_height']       = 1024;
			$config['file_ext_tolower'] = true;
			$config['encrypt_name']     = true;			
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload()) 
			{
				
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('upload_form', $error);
			
			} else {
				
				$update_data['avatar'] = $this->upload->data('file_name');				
			}
				
		}

		$datos['usuario'] = $usuario;
		$datos['IdUser'] = $Id_Usuario;
		$datos['nick'] = $nick;
		$datos['admin'] = $this->foro->esAdmin($nick);
		

		if ($update_data != NULL) 
		{					
			$this->user_model->actualizar_usuario($Id_Usuario, $update_data);		
			$this->load->view('user/profile/edit', $datos);			
		} 
		else
		{

			$this->load->view('user/profile/edit', $datos);			
		}		
	}

	public function borrar($Id_Usuario, $nick) 
	{		
		$usuario  = $this->user_model->get_usuario($Id_Usuario);

		$datos['usuario'] = $usuario;
		$datos['IdUser'] = $Id_Usuario;
		$datos['nick'] = $nick;
		$datos['admin'] = $this->foro->esAdmin($nick);

		if ($nick != NULL) {
			$this->user_model->borrar_usuario($Id_Usuario);

			$this->load->view('user/profile/delete', $datos);			
		} else {
			
			$this->load->view('user/profile/edit', $datos);			
		}		
	}	
}
