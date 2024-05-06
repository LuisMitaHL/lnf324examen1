<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
    	parent::__construct();
    	$this->load->library('session');
	}

	// EJERCICIO 6
	public function index()
	{
        // Mostrar form
		$this->load->view('view_MostrarLogin');
	}
	public function IniciaSesion()
	{
		$usuario = $this->input->post('usuario');
        $contrasena = $this->input->post('contrasena');
        $this->load->model('Login_model');
		$resultado = $this->Login_model->VerificarLogin($usuario, $contrasena);
        if($resultado) {
            $this->load->view('view_OperacionEjecutada', array('siguiente' => '/index.php/CuentaBancaria/', 'mensaje' => 'Correcto, se le enviara al panel.'));
        } else {
            $this->load->view('view_OperacionEjecutada', array('siguiente' => '/index.php/Login/', 'mensaje' =>'Incorrecto'));
        }
	}
    public function Logout()
	{
        $this->session->sess_destroy();
        $this->load->view('view_OperacionEjecutada', array('siguiente' => '/index.php/CuentaBancaria/', 'mensaje' => 'Se solicito el cierre de sesion. Se le enviara al panel.'));
	}

}
