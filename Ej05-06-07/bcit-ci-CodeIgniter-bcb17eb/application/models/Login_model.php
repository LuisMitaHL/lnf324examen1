<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
    // EJERCICIO 6
    function VerificarLogin($usuario, $contrasena) {
        $this->load->database();
        $this->db->where('usuario', $usuario);
        $this->db->where('contrasena', $contrasena);
        $query = $this->db->get('Usuarios');
        if($query->num_rows() > 0) {
            $user = $query->row();
            $this->session->rol = $user->rol;
            $this->session->usuario = $user->usuario;
            $this->session->id_persona = $user->id_persona;
            return true;
        } else {
            return false;
        }
    }
}