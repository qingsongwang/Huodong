<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * 功能：用户类，含有常用的一些方法
 *  
 * Created on 2014-3-27
 * 
 * @author:qingsongwang
 *
 */

class User
{
	private $_CI;
	
	/**
	 * construct of user class
	 * @access public
	 */
	function __construct()
	{
		$this->_CI = &get_instance();
	}

	function getUserNodes()
	{
		$this->_CI->load->model('Mrbac');
		$nodes = $this->_CI->Mrbac->get_user_nodes();
		return $nodes;
	}
	
	//检查session，判断是否已经登陆
	function session_check()
	{
		if($this->_CI->session->userdata('email'))
			return true;
		else
			return false;
	}
	
	

}