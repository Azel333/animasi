<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignoutController extends CI_Controller {

	/**
     * SignoutController constructor.
     */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('auth_model');
    }
    
    public function signout()
	{
		$this->db->set('date_logout', time());
		$this->db->where('email', $this->session->userdata('email'));
		$this->db->update('user');
		
		$data = [ 
			'email'		=> $this->session->userdata('email'),
			'role_id'	=> $this->session->userdata('role_id'),
			'id_meta'	=> $this->session->userdata('id_meta')
		];

		// Unset session
		$this->session->unset_userdata($data);

		// Destroy session
		$this->session->sess_destroy();

		// Recreate session
		session_start();
		$this->session->sess_regenerate(TRUE);

		redirect('');
	}
}