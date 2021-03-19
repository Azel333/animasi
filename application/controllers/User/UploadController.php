<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UploadController extends CI_Controller {

	/**
     * UploadController constructor.
     */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model(['video_model']);
	}

	public function setValidationRules()
    {
        $this->form_validation->set_rules('komentar','Komentar','trim|required|max_length[125]');
	}

	/**
     * Show upload form
     */
	public function upload()
	{
			$data = [
			'data_user'	=> $this->db->get_where('meta_user', ['id_meta' => $this->session->userdata('id_meta')])->row_array(),
			'user'		=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'title'		=> 'Halaman Unggah Video'
		];
		$this->template->layout('user/v_upload', $data);
	}

	public function upload_video()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$f_du			= $this->input->post('f_du');
			$id_video = $this->video_model->id_video();
			// $upload_thumb			= $_FILES['thumb']['name'];
			$title			= $this->input->post('title');
			$description			= $this->input->post('description');
			
			if($f_du>20)
			{
				$this->session->set_flashdata('status_upload','<div class="alert alert-danger alert-dismissible" role="alert">Video lebih dari 20 detik!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			}
			else
			{
				$data = array(
						'id_meta'				=> $this->session->userdata('id_meta'),
						'id_video'		=> $id_video,
						// 'upload_video'		=> $new_video,
						'judul_video'		=> $title,
						// 'thumb'		=> $new_thumb,
						'deskripsi_video'		=> $description,
						'tgl_upload_video'	=> time()
					);
					$this->db->insert('video',$data);
				$upload_video = $_FILES['video']['name'];
				if($upload_video)
				{
					$video = "video_".time();
					$config = array(
						'upload_path'	=> './assets/video/pengguna/',
						'allowed_types' => 'gif|jpg|png|jpeg|mp4|3gp|flv|webm',
						'file_name' => $video
					);
					
					$this->load->library('upload', $config);
					
					if ( ! $this->upload->do_upload('video'))
					{
						$error = $this->upload->display_errors();
						var_dump($error);
						die();
					}
					else
					{
						$new_video = $this->upload->data('file_name');
					}
				}
				$data2 = array(
						// 'id_meta'				=> $this->session->userdata('id_meta'),
						// 'id_video'		=> $id_video,
						'upload_video'		=> $new_video,
						// 'judul_video'		=> $title,
						// 'thumb'		=> $new_thumb,
						// 'deskripsi_video'		=> $description,
						// 'tgl_upload_video'	=> time()
					);
					$this->db->where('id_video', $id_video);
					$this->db->update('video',$data2);

				$upload_thumb			= $_FILES['thumb']['name'];
				if($upload_thumb)
		{
            $thumba = "thumb".time();
			$config1 = array(
				'upload_path'	=> './asset/img/user/thumbnail/',
				'allowed_types'	=> 'gif|jpg|png|jpeg|mp4|3gp|flv|webm',
                'file_name' => $thumba
			);
			$this->upload->initialize($config1);
			$this->load->library('upload', $config1);
			if ( ! $this->upload->do_upload('thumb'))
					{
						$error = $this->upload->display_errors();
						var_dump($error);
						die();
					}
					else
					{
						$new_thumb = $this->upload->data('file_name');
					}

		} else {
			$new_thumb = 'single-video.png';
		}
$data1 = array(
						// 'id_meta'				=> $this->session->userdata('id_meta'),
						// 'id_video'		=> $id_video,
						// 'upload_video'		=> $new_video,
						// 'judul_video'		=> $title,
						'thumb'		=> $new_thumb,
						// 'deskripsi_video'		=> $description,
						// 'tgl_upload_video'	=> time()
					);
					$this->db->where('id_video', $id_video);
					$this->db->update('video',$data1);
				
					$this->session->set_flashdata('status_upload','<div class="alert alert-success alert-dismissible" role="alert">Data Berhasil Diunggah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			}
			
		}
	}

	public function video_saya()
	{
		$data = [
			'video'	=> $this->db->get_where('video', array('id_video'=>$this->uri->segment(2)))->row_array(),
			'user'		=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
			'data_user'	=> $this->db->get_where('meta_user', ['id_meta' => $this->session->userdata('id_meta')])->row_array(),
		];
		$this->template->layout('User/v_video_saya', $data);
	}

	public function komentar_video()
	{
		$this->setValidationRules();
		$id = $this->input->post('id_video');
		// if ($this->form_validation->run() == TRUE)
		// {
			$data = [
				'sasaran' => $this->input->post('sasaran'),
				'prinsip' => $this->input->post('prinsip'),
				'cek' => $this->input->post('cek'),
				'komentar' => $this->input->post('komentar')
			];
			// var_dump($data);die;
			$this->db->where('id_video',$id);
			$this->db->update('video',$data);
		// }
		redirect('index.php/video_user');
	}
}