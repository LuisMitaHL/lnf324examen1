<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CuentaBancaria extends CI_Controller {
	public function __construct()
	{
    	parent::__construct();
    	$this->load->library('session');
	}

	// EJERCICIO 5
	public function index()
	{
		$this->load->model('CuentaBancaria_model');
		$filas = $this->CuentaBancaria_model->ListarCuentas();
		$datos['filas']=$filas;
		$datos['sesion']=array('usuario' => $this->session->usuario, 'rol' => $this->session->rol, 'id_persona' => $this->session->id_persona);
		$this->load->view('view_ListarCuentas', $datos);
	}
	public function Eliminar()
	{
		$id = $this->input->post('id');
		$this->load->model('CuentaBancaria_model');
		$this->CuentaBancaria_model->EliminarCuenta($id);
		$this->load->view('view_OperacionEjecutada', array('siguiente' => '/index.php/CuentaBancaria/'));
	}
	public function Consolidado()
	{
		$this->load->model('CuentaBancaria_model');
		$filas = $this->CuentaBancaria_model->ConsolidadoPorDepartamento();
		$datos['filas']=$filas;
		$datos['sesion']=array('usuario' => $this->session->usuario, 'rol' => $this->session->rol, 'id_persona' => $this->session->id_persona);
		$this->load->view('view_ListarConsolidado', $datos);
	}

}
