<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activity extends CI_Controller {

	
	public function index()
	{
		$this->load->view('Activity/activity_list.php');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */