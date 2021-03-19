<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignupController extends CI_Controller {

	/**
     * SignupController constructor.
     */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('auth_model');
    }
    
    /**
     * Set validation rule for Signup form
     */
	public function setValidationRules()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|is_unique[user.username]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|is_unique[user.email]');
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]');
	}

	/**
     * Show Signup form
     */
    public function signup()
	{
		//If user role id is 1
		if ($this->session->userdata('role_id') == 1)
		{
			//redirect ke user
			redirect('index.php/profile');
		}
		//If user role id is not 1
		else
		{
            $this->setValidationRules();
			if ($this->form_validation->run() == false)
			{
				$data = [
                    'data_user'	=> $this->db->get_where('meta_user', ['id_meta' => $this->session->userdata('id_meta')])->row_array(),
                    'user'		=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
                    'title' => 'Halaman Daftar'
                ];
				$this->template->layout('user/v_tambah_user',$data);
			}
			else
			{
                $email		= $this->input->post('email',TRUE);
                // $token		= base64_encode(openssl_random_pseudo_bytes(32));
                $this->postMetaData();
                $this->postUserData($email);
                // $this->userToken($email, $token);
				// $this->_sendEmail($token);
				$this->session->set_flashdata('tambah_user','<div class="alert alert-success alert-dismissible" role="alert">Tambah User Berhasil<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect(base_url('index.php/signup'));
			}
		}
	}

    /**
     * Post Data User
     */
    private function postMetaData()
    {
        $nama_depan = $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $pisah = explode('-',$tgl_lahir);
        $array = array($pisah[2],$pisah[1],$pisah[0]);
        $satukan = implode('-',$array);
        $nomor_hp= $this->input->post('nomor_hp');
        $no_hp = preg_replace('/[^0-9]/', '', $nomor_hp);
        $kelamin = $this->input->post('kelamin');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $meta_data	= [
            'id_meta'		=> $this->auth_model->id_meta(),
            'back_image'	=> 'thumb.png',
            'nama_depan' => $nama_depan,
            'nama_belakang' => $nama_belakang,
            'tgl_lahir' => $satukan,
            'nomor_hp' => $no_hp,
            'kelamin' => $kelamin,
            'tempat_lahir' => $tempat_lahir,
        ];
        $this->db->insert('meta_user', $meta_data);
    }

    private function postUserData($email)
    {
        $user_data		= [
            'id'			=> $this->auth_model->id_user(),
            'username'		=> htmlspecialchars($this->input->post('username',TRUE)),
            'email'			=> htmlspecialchars($email),
            'image'			=> 'default.jpg',
            'password'		=> $this->input->post('password1'),
            'role_id'		=> $this->input->post('role_id'),
            'is_active'		=> 1,
            'id_meta'		=> $this->auth_model->id_meta(),
            'date_created'	=> time()
        ];
        $this->db->insert('user', $user_data);
    }

    private function userToken($email, $token)
    {
        $user_token =
        [
            'email'			=> $email,
            'token'			=> $token,
            'date_created'	=> time()
        ];
        $this->db->insert('user_token', $user_token);
    }

    /**
     * Send Email
     * 
     * @param $token
     */
    private function _sendEmail($token)
	{
		//load library
		$this->load->config('email');
        $this->load->library('email');

		//inputan pengiriman
		$this->email->from('volkanonseitz@gmail.com', 'volkanon');
		$this->email->to($this->input->post('email', TRUE));

        //kirim verifikasi password
        $this->email->subject('Verifikasi Akun');
        $this->email->message('Klik link untuk aktivasi : <a href="' . base_url() . 'auth/verifikasi?email=' . $this->input->post('email', TRUE) . '&token=' . urlencode($token) . '"> Aktivasi</a>');

		//jika email berhasil dikirim
		if ($this->email->send())
		{
			return TRUE;
		}
		else
		{
			echo $this->email->print_debugger();
			die;
		}
	}
}