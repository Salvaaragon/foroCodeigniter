<?php 

	if (!defined('BASEPATH'))
		exit('No direct script access allowed');
	
	class Foro extends CI_Controller 
	{
		function __construct()
		{
			parent::__construct();
		}
	
		function index()
		{
			$this->load->helper('date');
			$this->load->helper('url');
			$this->load->model("foro_model", "foro");
			$vars['query'] = $this->foro->getSecciones(false);
			//$this->load->view("header");
			//if(!$login)
				$this->load->view("foro/index", $vars);
			//else
				//$this->load->view("foro/indexConLogin", $vars);
			//$this->load->view("footer");
		}

		function indexConLogin($Id_usuario, $nick)
		{
			$this->load->helper('date');
			$this->load->helper('url');
			$this->load->model("foro_model", "foro");
			$vars['query'] = $this->foro->getSecciones(true);
			$vars['IdUser'] = $Id_usuario;
			$vars['nick'] = $nick;
			$vars['admin'] = $this->foro->esAdmin($nick);
			$this->load->view("foro/indexConLogin", $vars);
		}

		function subforoConLogin($id = 0, $Id_usuario, $Nick)
		{
			if((int)$id <= 0)
			{
				echo "Error, no existe un subforo con esta id.";	
			}
			else
			{
				$this->load->helper('date');
				$this->load->helper('url');
				$this->load->model("foro_model", "foro");			
				
				$vars['query'] = $this->foro->getPosts($id);
				//$vars['usuario'] = $this->session->userdata('logueado');
				$vars['IdUser'] = $Id_usuario;
				$vars['nick'] = $Nick;
				$vars['admin'] = $this->foro->esAdmin($Nick);
				$vars['idsubforo'] = $id;

				//$this->load->view("header");
				$this->load->view("foro/subforologueado", $vars);
				//$this->load->view("footer");				
			}
		}

		function subforoSinLogin($id = 0)
		{
			if((int)$id <= 0)
			{
				echo "Error, no existe un subforo con esta id.";	
			}
			else
			{
				$this->load->helper('date');
				$this->load->helper('url');
				$this->load->model("foro_model", "foro");			
				
				$vars['query'] = $this->foro->getPosts($id);
				//$vars['usuario'] = $this->session->userdata('logueado');
				//$vars['nick'] = $this->session->userdata('Nick');
				//$this->load->view("header");
				//$vars['usuario'] = $user_logueado;
				$this->load->view("foro/subforonologueado", $vars);
				//$this->load->view("footer");				
			}
		}

		function postNoLogueado($id = 0)
		{
			$this->load->model("foro_model", "foro");
			
			if((int)$id <= 0)
			{
				echo "Error, no existe un post con esta id.";	
			}
			else
			{
				$this->load->helper('date');
				$this->load->helper('url');
				$this->load->model("foro_model", "foro");			
					
				$vars['usuarios'] = $this->foro->obtenerDatos("usuario");
				$vars['post'] = $this->foro->obtenerDato("post", $id);
				$vars['query'] = $this->foro->obtenerComentarios($id);
				//$vars['usuario'] = $this->session->userdata('logueado');
				//$this->load->view("header");
				$this->load->view("foro/postnologueado", $vars);
				//$this->load->view("footer");				
			}
		}

		function postLogueado($id = 0, $Id_usuario, $Nick)
		{	
			$this->load->model("foro_model", "foro");
			
			if($this->input->post('comentario') !== NULL) {

			date_default_timezone_set("Europe/Madrid"); 
			$fecha = getdate();
			$array = "Creado por ".$Nick." el ".$fecha['mday'].' de '.$fecha['month'].' de '.$fecha['year'].', a las '
				.$fecha['hours'].':'.$fecha['minutes'].':'.$fecha['seconds'];

			$datos = array(
				'Id_Post' => $id,
				'Id_Usuario' => $Id_usuario,
				'Titulo' => $array,
				'Descripcion' => $this->input->post('comentario'),
				'Likes' => 0,
				'Dislikes' => 0
			);

			$this->foro->insertar('comentario', $datos);
			}

			if((int)$id <= 0)
			{
				echo "Error, no existe un post con esta id.";	
			}
			else
			{
				$this->load->helper('date');
				$this->load->helper('url');
				$this->load->model("foro_model", "foro");			
					
				$vars['usuarios'] = $this->foro->obtenerDatos("usuario");
				$vars['post'] = $this->foro->obtenerDato("post", $id);
				$vars['query'] = $this->foro->obtenerComentarios($id);
				//$vars['usuario'] = $this->session->userdata('logueado');
				$vars['IdUser'] = $Id_usuario;
				$vars['nick'] = $Nick;
				$vars['admin'] = $this->foro->esAdmin($Nick);
				//$this->load->view("header");
				$this->load->view("foro/postlogueado", $vars);
				//$this->load->view("footer");				
			}
		}

		function registro() 
		{
			$this->load->helper('date');
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_message('required', 'El campo %s es obligatorio');
			$this->form_validation->set_message('is_unique', 'Ya existe un usuario registrado con ese %s');
			$this->form_validation->set_message('min_length', 'El campo %s ha de tener mínimo %d caracteres');
			$this->form_validation->set_message('max_length', 'El campo %s ha de tener máximo %d caracteres');
			$this->form_validation->set_message('valid_email', 'El campo %s no tiene un formato válido');
			$this->form_validation->set_message('matches', 'El campo %s no coincide con %s');
			$this->form_validation->set_rules('nick', 'Nick', 'required|min_length[4]|max_length[10]|callback_checknick');
			$this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[6]');
			$this->form_validation->set_rules('passconf', 'Confirmar contraseña', 'required|min_length[6]|matches[password]');
			$this->form_validation->set_rules('nombre', 'Nombre', 'max_length[16]');
			$this->form_validation->set_rules('apellidos', 'Nombre', 'max_length[32]');
			$this->form_validation->set_rules('email', 'Correo electronico', 'required|callback_checkemail|valid_email');
			$this->form_validation->set_rules('files', 'Imagen', 'max_size[2]');
			if($this->form_validation->run() === true) {

				$nick = $this->input->post('nick');
				$password = $this->input->post('password');
				$email = $this->input->post('email');
				$nombre = " ";
				if($this->input->post('nombre') != null)
					$nombre = $this->input->post('nombre');
				$apellidos = " ";
				if($this->input->post('apellidos') != null)
					$apellidos = $this->input->post('apellidos');

				$config['upload_path']	= './imagenes';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2000';
				$config['max_width'] = '2024';
				$config['max_height'] = '2008';
				$config['file_name'] = $nick;

				$this->load->library('upload', $config);
				if($_FILES['files']['size'] != 0){
					if (!$this->upload->do_upload('files'))
					{
						$error = array('error' => $this->upload->display_errors());

						$this->load->view("foro/registro",$error);
					}
					else{
						$this->load->model('usuarios_model');
						$file_info = $this->upload->data();
			            $data = array('upload_data' => $this->upload->data());
			            $imagen = $file_info['file_name'];    
			            //$data['titulo'] = $titulo;
			           // $data['imagen'] = $imagen;
			            //$this->load->view('imagen_subida_view', $data);
						$this->usuarios_model->insertar_usuario($nick, $password, $email, 
							$nombre, $apellidos, $imagen);
						redirect("index.php/foro/inicio_sesion");
					}
				}
				else{
					$this->load->model('usuarios_model');
					$this->usuarios_model->insertar_usuario($nick, $password, $email, 
						$nombre, $apellidos, 'default.png');
					redirect("index.php/foro/inicio_sesion");
				}

			}
			else
				$this->load->view("foro/registro");


		}

		function checknick($nick)
		{
			if($nick != null){
			$this->load->database();
			$this->db->like('nick', $nick);
			$q = $this->db->get('Usuario');
			if($q->num_rows() != 0)
				$this->form_validation->set_message('checknick', 'Ya existe un usuario con ese %s');

			return ($q->num_rows() == 0);}
		}

		function checkemail($email)
		{
			if($email != null){
			$this->load->database();
			$this->db->like('Correo', $email);
			$q = $this->db->get('Usuario');
			if($q->num_rows() != 0)
				$this->form_validation->set_message('checkemail', 'Ya existe un usuario con ese %s');

			return ($q->num_rows() == 0); }
		}

		function inicio_sesion()
		{
			$this->load->helper('date');
			$this->load->helper('url');
			$this->load->library('form_validation');
			$this->load->view("foro/login");
		}

		function valida_usuario()
		{
			$this->load->helper('date');
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');

			$this->form_validation->set_message('required', 'El campo %s es obligatorio');
			$this->form_validation->set_rules('nick', 'Nick', 'trim|required');
			$this->form_validation->set_rules('password', 'Contraseña', 'trim|required');
			if ($this->form_validation->run() == TRUE)
			{
				$this->load->helper('url');
				$nick = $this->input->post('nick');
				$password = $this->input->post('password');
				//comprobamos si existen en la base de datos enviando los datos al modelo
				$this->load->model('usuarios_model');
				$login = $this->usuarios_model->existe_usuario($nick, $password);
				foreach($this->usuarios_model->estaBaneado($nick) as $row)
					$baneado = $row->EstaBaneado;
				if($login == true && !$baneado)
				{					
					foreach($login as $row)
						redirect('index.php/foro/logueado/'.$row->Id.'/'.$nick);
				}
				else
				{
					if($baneado){
						$error = array('error' => 'El usuario está baneado');
						$this->load->view("foro/login",$error);
					}
					else
					{
						$error = array('error' => 'Usuario o contraseña incorrectos');
						$this->load->view("foro/login",$error);
					}
				}
			}
			else
				$this->load->view("foro/login");
		}

		function logueado($Id_usuario, $Nick) 
		{
			$this->load->helper('date');
			$this->load->helper('url');
			$this->load->model("foro_model", "foro");
			$this->load->helper('url');
			//if($this->session->userdata('logueado'))
			//{
				//$vars = array();
				//$vars['query'] = $this->foro->getSecciones(true);
				//$vars['Nick'] = $this->session->userdata('Nick');
				redirect('index.php/foro/indexConLogin/'.$Id_usuario.'/'.$Nick);
				//$this->load->view('foro/indexConLogin',$vars);
			//}
			//else
				//redirect('index.php/foro/login');
		}

		function logout() 
		{
			$this->load->helper('url');
			/*$usuario_data = array(
						'Id' => '',
						'Nick' => '',
						'logueado' => false
						);*/
			//$this->session->set_userdata($usuario_data);
			//$this->session->unset_userdata($usuario_data);
			//$this->session->session_destroy();
   			//$this->session->unset_userdata($result); # error
			//$this->load->view('index.php','refresh');
			redirect(base_url(),'refresh');
		}

	}

?>