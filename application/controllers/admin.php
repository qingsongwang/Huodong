<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * function：Admin Control Class
	 * author: qingsongwang
	 * time: 2014年3月25日 16:45:03
	 */
	public function index()
	{
		$this->load->view('Admin/index.php');
	}
	
	//个人信息
	function personal_info()
	{
		$this->load->view('Admin/personal_info.php');
	}
}
