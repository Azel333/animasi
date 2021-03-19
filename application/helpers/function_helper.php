<?php 

function is_logged_in()
{
	$ci = get_instance();
	if(!$ci->session->userdata('email') && !$ci->session->userdata('username')) {
		redirect('index.php/signin');
	}
}