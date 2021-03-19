<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataController extends CI_Controller {

	/**
     * DataController constructor.
     */
	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
	}

	public function setValidationRules()
    {
        $this->form_validation->set_rules('komentar','Komentar','trim|required|max_length[125]');
	}

	/**
     * Show upload form
     */
	public function video()
	{
        if ($this->session->userdata('role_id')==1) {
            $data = [
            'video'	=> $this->db->get_where('video', ['id_meta' => $this->session->userdata('id_meta')])->result(),
            'user'		=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'title'		=> 'Halaman Unggah Video'
            ];
        } else {
           $data = [
            'video'	=> $this->db->get('video')->result(),
            'user'		=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'title'		=> 'Halaman Unggah Video'
            ];
        }
        
		$this->template->layout('user/v_video', $data);
    }

	public function cetak()
	{
        $id = $this->uri->segment(2);
        $data = [
            'video'	=> $this->db->get_where('video', ['id_video' => $id])->row_array(),
            'user'		=> $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(),
            'title'		=> 'Halaman Unggah Video' 
        ];
        
		$this->load->view('user/cetak', $data);
    }
    
}