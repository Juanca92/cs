<?php

namespace App\Controllers;

use App\Libraries\Templater;
use App\Models\Querys;
use CodeIgniter\Controller;

class Auth extends Controller
{

	protected $helpers = ['SanPedro'];
	protected $db = null;

	function __construct()
	{
		$this->templater = new Templater(\Config\Services::request());
		$this->session = \Config\Services::session();
		$this->querys = new Querys();
		$this->db = \Config\Database::connect();
	}

	#Index
	public function index()
	{
		return redirect()->to(base_url('/auth/login'));
	}

	#Login
	public function login()
	{
		if (authenticated()) {
			return redirect()->to(base_url('/'));
		} else {
			echo view('login');
		}
	}

	#authenticate = autentificar al usuario
	public function authenticate()
	{
		#Recibimos parametros username y password
		$username = trim($this->request->getPost('username'));
		$password = $this->request->getPost('password');
		#Bucasmos en la base de datos los 2 datos que nos mando el Login
		$userSearched = $this->querys->view_users(['usuario' => $username, 'clave' => hash("sha512", $password)]);
		// var_dump($this->db->getLastQuery());
		#Contamos si $userSearched es ugual a 1 si lo es entendemos que podemos aprobar el inicio de sesion
		if (count($userSearched) >= 1) {

			# Agregamos una sesion al navegador
			$this->session->set(['id_persona' => $userSearched[0]['id_persona']]);
			$this->session->set(['nombre_grupo' => $userSearched[0]['nombre_grupo']]);
			$_SESSION['id_persona'] = $userSearched[0]['id_persona'];
			$_SESSION['nombres'] = $userSearched[0]['nombres'];
			$_SESSION['paterno'] = $userSearched[0]['paterno'];
			$_SESSION['materno'] = $userSearched[0]['materno'];
			$_SESSION['foto'] 	 = $userSearched[0]['foto'];
			$_SESSION['nombre_grupo']     = $userSearched[0]['nombre_grupo'];
			$_SESSION['telefono_celular'] = $userSearched[0]['telefono_celular'];
			$_SESSION['avatar']  		  = substr($userSearched[0]['nombres'], 0, 1) . '' . substr($userSearched[0]['paterno'], 0, 1);

			# Redireccionamos a la pagina principal
			return redirect()->to(base_url('/home'));
		} else {
			#Si $userSearched no es igual a 1 debemos devolverlo al mismo login
			$this->session->destroy();
			return redirect()->to(base_url('/auth/login'));
		}
	}

	public function access()
	{
		$this->session->set(['nombre_grupo' => $this->request->getPost('nombre_grupo')]);
		return redirect()->to(base_url('/'));
	}

	// funcion para cerrar sesion
	public function logout()
	{
		$this->session->destroy();
		return redirect()->to(base_url('/'));
	}
}// class
