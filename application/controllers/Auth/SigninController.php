<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SigninController extends CI_Controller {

	/**
     * SigninController constructor.
     */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('auth_model');
	}

	/**
     * Set validation rule for Signin form
     */
	public function setValidationRules()
    {
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
        $this->form_validation->set_rules('password','Password','trim|required');
	}

	/**
     * Show Signin form
     */
	public function signIn()
	{
		if($this->session->userdata('email')) {
			redirect('index.php/profile');
		}
		$this->setValidationRules();
		if ($this->form_validation->run() == FALSE)
		{
			$data['title'] = 'Halaman Masuk';
			// $this->template->layout('auth/v_signin',$data);
			$this->load->view('template/header',$data);
			$this->load->view('auth/v_signin',$data);
			$this->load->view('template/footer',$data);
		}
		else
		{
			$this->_signin();
		}
	}

	/**
     * Attempt SIgnin if POST request.
     */
	private function _signin()
	{
		if($this->input->server('REQUEST_METHOD') == 'POST'){
		$email	= $this->input->post('email', TRUE);
		$password	= $this->input->post('password');
		$user		= $this->auth_model->validate($email)->row_array();

		// If user exist
		if ($user)
		{
			//If user is active
			if ($user['is_active'] == 1)
			{
				//if password is true
				if ($password = $user['password'])
				{
					//Set user session
                    $this->setUserSession($user);
					if ($user['role_id'] == 1) 
					{
						redirect('index.php/profile');
					}
				}
				//If password is wrong
				else
				{
					$this->session->set_flashdata('password_salah','<span class="helper-text white-text">Password Salah</span>');
					redirect(base_url('index.php/signin'));
				}
			}
			//If user is not active
			else
			{
				$this->session->set_flashdata('email_belum_teraktivasi','<span class="helper-text white-text">Email belum Teraktivasi</span>');
				redirect(base_url('index.php/signin'));
			}
		}
		//if the user does not exist
		else
		{
			$this->session->set_flashdata('email_salah','<span class="helper-text white-text">Email atau Username Salah</span>');
			redirect(base_url('index.php/signin'));
		}
	}
	redirect(base_url('index.php/signin'));
	}
	
	/**
     * Set Users Signin session
     *
     * @param $user
     */
    private function setUserSession($user)
    {

        $logged_in = array(
			'email'		=> $user['email'],
			'role_id'	=> $user['role_id'],
			'id_meta'	=> $user['id_meta']
        );
        $this->session->set_userdata($logged_in);
    }
}