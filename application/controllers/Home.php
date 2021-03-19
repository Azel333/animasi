<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
        // $this->load->model('cart_model');
        // is_logged_admin();
	}

	public function index()
	{
        $data['title'] = 'Beranda';
		//jika role_id adalah 2
		// if ($this->session->userdata('role_id') == 1)
		// {
		// 	$this->template->layout('Home/v_beranda', $data);
		// }
		// else
		// {
		// 	$this->template->layout('Home/v_beranda', $data);
		// }
		redirect('index.php/signin');
	}
}
