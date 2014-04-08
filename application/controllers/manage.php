<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 功能：后台管理manage控制器
 *  
 * Created on 2014-3-27
 *
 * @author:qingsongwang
 *
 */

class Manage extends CI_Controller
{
	function __construct(){
		parent::__construct(); 
		
	}
	
	function index()
	{
		if($this->user->session_check())
		{
			$this->load->model('Mmember');
			$data['uid'] = $this->session->userdata('uid');
			$row = $this->Mmember->get_user_info($data['uid']);   //根据uid获取用户的信息
			$data['name'] = $row['tb_users_name'];
			$this->load->view('/Include/header');
			$this->load->view('/Include/nav',$data);
			$this->load->view('/Manage/index');
			$this->load->view('/Include/footer');	
		}
		else
			$this->load->view('/Member/login');
	}
	
	//公共加载的头部
	function public_load()
	{
		$this->load->model('Mmember');
		$data['uid'] = $this->session->userdata('uid');
		$row = $this->Mmember->get_user_info($data['uid']);   //根据uid获取用户的信息
		$data['name'] = $row['tb_users_name'];
		$this->load->view('/Include/header');
		$this->load->view('/Include/nav',$data);
	}
	
	
	//*************role******************//
	function roleAdd()
	{
		if($this->user->session_check())
		{
			$this->public_load();
			$this->load->view('/Manage/Role/role_add');
		}
		else
			$this->load->view('/Member/login');
	}
	
	function do_role_add()
	{
		$roleName = @$_POST['roleName'];
		$shortName = @$_POST['shortName'];
		$remark = @$_POST['remark'];
		
		$this->load->model('Mrbac');
		$result = $this->Mrbac->insert_role($roleName,$shortName,$remark);
		
		if($result)
			echo '0';
		else
			echo '1';
	}
	
	function do_role_delete()
	{
		$id = @$_POST['delId'];
		
		$this->load->model('Mrbac');
		$result = $this->Mrbac->delete_role($id);
		if($result)
			echo '0';
		else
		    echo '1';
	}
	
	function do_role_update($id)
	{
		$roleName = @$_POST['roleName'];
		$shortName = @$_POST['shortName'];
		$remark = @$_POST['remark'];
	
		$this->load->model('Mrbac');
		$result = $this->Mrbac->update_role($id,$roleName,$shortName,$remark);
		
		if($result)
			echo '0';
		else
			echo '1';
	}
	
	//角色列表
	function roleList()
	{
		
		if($this->user->auth_check('roleList'))
		{
		
			if($this->user->session_check())
			{
				$this->public_load();
				$this->role_list();
				$this->load->view('/Include/footer');	
			}
			else
				$this->load->view('/Member/login');
			}
		else
			$this->load->view('/Manage/no_auth');
	}
	
	//加载角色列表内容()
	function role_list()
	{
		$this->load->model('Mrbac');
		$data['role_list'] = $this->Mrbac->get_all_role();
		//var_dump($data['role_list']);
		$this->load->view('/Manage/Role/role_edit',$data);
	}
	
	function get_roleJson_byId($id)
	{
		$this->load->model('Mrbac');
		$result= $this->Mrbac->get_role_by_id($id);
		foreach($result as $row)
		{
			$role_name = $row->role_name;
			$role_shortname = $row->role_shortname;
			$remark = $row->remark;
		}
		
		@$role = array(
			"role_name" => $role_name,
			"role_shortname" => $role_shortname,
			"remark" => $remark
		);
		echo $msg=json_encode($role);
	}

}