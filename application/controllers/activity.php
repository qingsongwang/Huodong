<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activity extends CI_Controller {

	
	public function index()
	{
		$this->load->view('Activity/header');
		$this->load->view('Activity/nav');
		//$this->load->view('Activity/welcome_message.php');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */