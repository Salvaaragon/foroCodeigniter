<?php

class Admin extends CI_Controller {

	public function __construct() 
	{		
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->helper('date');
		$this->load->model('foro_model','foro');
		$this->load->model('forum_model');
		$this->load->model('user_model');
		$this->load->model('admin_model');
	}
	
	public function index() 
	{		
		
	}

	public function admin($Id_usuario, $nick)
	{
		$data['IdUser'] = $Id_usuario;
		$data['nick'] = $nick;
		$data['admin'] = $this->foro->esAdmin($nick);

		$this->load->view('admin/home/index', $data);	
	}
	
	public function users($Id_usuario, $nick) 
	{
		$usuario['data'] =$this->user_model->get_usuarios();
		$usuario['IdUser'] = $Id_usuario;
		$usuario['nick'] = $nick;
		$usuario['admin'] = $this->foro->esAdmin($nick);

		$this->load->view('admin/users/users', $usuario);		
	}
	
	public function banear_usuario($nick, $Id_admin, $nick_admin) 
	{		
		$id_usuario = $this->user_model->get_id_usuario($nick);
		$usuario    = $this->user_model->get_usuario($id_usuario);
	
		if ($usuario->EstaBaneado === '1') {
			$options  = '<option value="0" selected>Desbanear</option>';
		} else {
			$options  = '<option value="1">Banear</option>';
		}
		

		$EstaBaneado = $this->input->post('user_rights');

		$this->load->helper('form');
		
		/*if (*/$this->admin_model->banear_usuario($id_usuario, $EstaBaneado);//) {
			/*$data->success = $usuario->Nombre . ' ha sido baneado/desbaneado correctamente.';
		} else {
			$data->error = 'Hubo un error mientras se actualizaba el estado del usuario. Intentelo de nuevo.';
		}*/

		$datos['options'] = $options;
		$datos['usuario'] = $usuario;
		$datos['IdUser'] = $Id_admin;
		$datos['nick'] = $nick_admin;
		$datos['admin'] = $this->foro->esAdmin($nick);

		$this->load->view('admin/users/edit_user', $datos);	
	}	
}
