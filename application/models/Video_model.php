<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video_model extends CI_Model
{
    function id_video()
	{
		$this->db->select('id_video');
		$this->db->order_by('id_video', 'DESC');
		$query = $this->db->get('video');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->id_video) + 1;
		} else {
			$kode = 1;
		}
		return $kode;
    }
    
}

/* End of file video_model.php */
/* Location: ./application/models/video_model.php */