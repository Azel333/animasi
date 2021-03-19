<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{
	protected $_ci;

	function __construct()
	{
		$this->_ci = &get_instance();
	}

	function layout($content, $data = NULL)
	{
		/*
		 * $data['headernya'] , $data['contentnya'] , $data['footernya']
		 * variabel diatas ^ nantinya akan dikirim ke file views/template/index.php
		 *
		 */
		// $data['headernya'] = $this->_ci->load->view('template/layout', $data, TRUE);
		$data['content'] = $this->_ci->load->view($content, $data, TRUE);

		$this->_ci->load->view('template/header', $data);
		$this->_ci->load->view('template/body', $data);
		$this->_ci->load->view('template/footer');
	}

}

/* End of file template.php */
/* Location: ./application/libraries/template.php */
