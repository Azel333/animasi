<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

	/**
     * UserController constructor.
     */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
	}

	public function setValidationRules()
    {
        $this->form_validation->set_rules('nomor_hp', 'Nomor Handphone', 'required');
	}

	/**
     * Show upload form
     */
	public function profile_saya()
	{
		$data = [
			'title'			=> 'Halaman Profile Saya',
			'user'			=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'data_user'		=> $this->db->get_where('meta_user', ['id_meta' => $this->session->userdata('id_meta')])->row_array(),
        ];
		$this->template->layout('user/v_about', $data);
	}
	
	public function video_saya()
	{
		$data = [
			'title'			=> 'Halaman Video Saya',
			'user'			=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'data_user'		=> $this->db->get_where('meta_user', ['id_meta' => $this->session->userdata('id_meta')])->row_array(),
        ];
		$this->template->layout('user/v_videosaya', $data);
	}

	public function video_user()
	{
		$data = [
			'title'			=> 'Halaman Video Saya',
			'user'			=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'data_user'		=> $this->db->get_where('meta_user', ['id_meta' => $this->session->userdata('id_meta')])->row_array(),
        ];
		$this->template->layout('user/v_video_user', $data);
	}
    
    public function informasi_dasar()
	{
        $this->setValidationRules();
		if ($this->form_validation->run() == false)
		{
            $data =[
                'data_user'	=> $this->db->get_where('meta_user', ['id_meta' => $this->session->userdata('id_meta')])->row_array(),
                'user'		=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
                'title'		=> 'Halaman Ganti Informasi Dasar'
            ];
			$this->template->layout('user/v_info_dasar', $data);
		}
		else
		{
			$nama_depan = $this->input->post('nama_depan');
			$nama_belakang = $this->input->post('nama_belakang');
			$email = $this->input->post('email');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$pisah = explode('-',$tgl_lahir);
			$array = array($pisah[2],$pisah[1],$pisah[0]);
			$satukan = implode('-',$array);
			$nomor_hp= $this->input->post('nomor_hp');
			$no_hp = preg_replace('/[^0-9]/', '', $nomor_hp);
			$kelamin = $this->input->post('kelamin');
			$tempat_lahir = $this->input->post('tempat_lahir');
			$deskripsi = $this->input->post('deskripsi');
			
			$data = array(
				'nama_depan' => $nama_depan,
				'nama_belakang' => $nama_belakang,
				'tgl_lahir' => $satukan,
				'nomor_hp' => $no_hp,
				'kelamin' => $kelamin,
				'tempat_lahir' => $tempat_lahir,
			);
			$this->db->where('id_meta', $this->session->userdata('id_meta'));
			$this->db->update('meta_user', $data);

			$this->session->set_flashdata('info_dasar','<div class="alert alert-success alert-dismissible" role="alert">Data Berhasil Diubah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('index.php/info');
		}
    }
    
    public function ganti_foto()
	{
		$data = [
			'data_user'	=> $this->db->get_where('meta_user', ['id_meta' => $this->session->userdata('id_meta')])->row_array(),
			'user'		=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'title'		=> 'Halaman Ganti Foto'
		];
		$this->template->layout('user/v_ganti_foto',$data);
	}

	public function upload_foto()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$upload_image = $_FILES['image']['name'];
		$upload_back_image = $_FILES['back_image']['name'];
		if($upload_image)
		{
            $image = "image_".time();
			$config = array(
				'upload_path'	=> './asset/img/user/profile/',
				'allowed_types'	=> 'gif|jpg|png',
				'max_size'		=> '3048',
				'max_width'		=> '1732',
                'max_height'	=> '1732',
                'file_name' => $image
			);
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('image'))
			{
				$error = $this->upload->display_errors();
				var_dump($error);
				die();
			}
			else
			{
				$old_image = $data['user']['image'];
				if ($old_image != 'default.jpg')
				{
					//FCPATH atau Front Controller PATH untuk menuju root folder dari codeigniter
					unlink(FCPATH.'./asset/img/user/profile/'.$old_image);
				}
				$new_image = $this->upload->data('file_name');
				$this->db->set('image', $new_image);
				$this->db->where('id_meta', $this->session->userdata('id_meta'));
				$this->db->update('user');
			}

		}

		if($upload_back_image)
		{
            $image2 = "sampul_".time();
			$config1 = array(
				'upload_path'	=> './asset/img/user/background/',
				'allowed_types'	=> 'gif|jpg|png',
				'max_size'		=> '3048',
				'max_width'		=> '1732',
				'max_height'	=> '1732',
                'file_name' => $image2
			);
			$this->upload->initialize($config1);
			$this->load->library('upload', $config1);
			
			if ( ! $this->upload->do_upload('back_image'))
			{
				$error = $this->upload->display_errors();
				var_dump($error);
				die();
			}
			else
			{
				$old_image = $data['data_user']['back_image'];
				if ($old_image != 'thumb.png')
				{
					//FCPATH atau Front Controller PATH untuk menuju root folder dari codeigniter
					unlink(FCPATH.'./asset/img/user/background/'.$old_image);
				}
				$new_back_image = $this->upload->data('file_name');
				$this->db->set('back_image', $new_back_image);

				$this->db->where('id_meta', $this->session->userdata('id_meta'));
				$this->db->update('meta_user');
			}
		}
		

		$this->session->set_flashdata('edit','<span class="helper-text white-text">data telah diedit</span>');
		redirect('index.php/ganti_foto');
    }
    
    public function ubah_password()
	{
		$data = [
			'data_user'	=> $this->db->get_where('meta_user', ['id_meta' => $this->session->userdata('id_meta')])->row_array(),
			'user'		=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'title'		=> 'Halaman Ganti Password'
		];
		$this->form_validation->set_rules('password_lama', 'Password Lama', 'trim|required');
		$this->form_validation->set_rules('password_baru1', 'Password Baru', 'trim|required|min_length[6]|matches[password_baru2]');
		$this->form_validation->set_rules('password_baru2', 'Konfirmasi Password Baru', 'trim|required|matches[password_baru1]');
		if ($this->form_validation->run() == false)
		{
			$this->template->layout('user/v_ganti_password', $data);
		}
		else
		{
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru1');
			if ($password_lama = $data['user']['password'])
			{
				if ($password_lama == $password_baru)
				{
					$this->session->set_flashdata('password_sudah_pernah','<div class="alert alert-danger alert-dismissible" role="alert">Anda sudah pernah menggunakan password tersebut<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('index.php/ganti_password');
				}
				else
				{
					$this->db->set('password', $password_baru);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');
					$this->session->set_flashdata('ganti_password_berhasil','<div class="alert alert-success alert-dismissible" role="alert">Password Berhasil di Ganti<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('index.php/ganti_password');
				}
			}
			else
			{
				$this->session->set_flashdata('password_lama_salah','<div class="alert alert-danger alert-dismissible" role="alert">Password Lama Salah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('index.php/ganti_password');
			}
		}
	}
}