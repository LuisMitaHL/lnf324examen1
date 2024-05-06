<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CuentaBancaria_model extends CI_Model {

	public function __construct()
	{
	    parent::__construct();
	}
	// EJERCICIO 5
	public function ListarCuentas()
	{
		$this->load->database();
        $query = $this->db->query('SELECT * FROM CuentaBancaria WHERE activo=1');
        return $query->result();
	}
    public function EliminarCuenta($id)
    {
        $this->load->database();
        $this->db->where('id', $id);
        $this->db->update('CuentaBancaria', array('activo' => 0));
    }
    // EJERCICIO 7
    public function ConsolidadoPorDepartamento()
	{
		$this->load->database();
        $q = "SELECT 
            SUM(CASE WHEN p.departamento = 'lpz' THEN cb.saldo ELSE 0 END) AS 'lpz',
            SUM(CASE WHEN p.departamento = 'scz' THEN cb.saldo ELSE 0 END) AS 'scz',
            SUM(CASE WHEN p.departamento = 'oru' THEN cb.saldo ELSE 0 END) AS 'oru',
            SUM(CASE WHEN p.departamento = 'pti' THEN cb.saldo ELSE 0 END) AS 'pti',
            SUM(CASE WHEN p.departamento = 'cbb' THEN cb.saldo ELSE 0 END) AS 'cbb',
            SUM(CASE WHEN p.departamento = 'ben' THEN cb.saldo ELSE 0 END) AS 'ben',
            SUM(CASE WHEN p.departamento = 'pnd' THEN cb.saldo ELSE 0 END) AS 'pnd',
            SUM(CASE WHEN p.departamento = 'chq' THEN cb.saldo ELSE 0 END) AS 'chq',
            SUM(CASE WHEN p.departamento = 'tja' THEN cb.saldo ELSE 0 END) AS 'tja'
            FROM Persona p
            JOIN CuentaBancaria cb ON p.id = cb.id_persona;";
        $query = $this->db->query($q);
        return $query->result();
	}
    
}
