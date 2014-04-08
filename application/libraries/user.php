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
	
	//权限检查
	function auth_check($action)
	{
		$uid = $this->_CI->session->userdata('uid');
		$this->_CI->load->model('Mrbac');
		$result = $this->_CI->Mrbac->action_check($uid,$action);
		return $result;
	}
	
	

}