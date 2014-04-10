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
	
	//执行角色添加
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
	
	//执行角色删除
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
	
	//执行更新角色
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
	/*****************END role*********************/
	
	/********************article*********************/
	
	//执行文章分类操作
	function do_category_add()
	{
		$categoryName = @$_POST['categoryName'];
		$aName = @$_POST['aName'];
		$remark = @$_POST['remark'];
		
		$this->load->model('Marticle');
		$result = $this->Marticle->insert_category($categoryName,$aName,$remark);
		
		if($result)
			echo '0';
		else
			echo '1';
	}
	
	//执行文章分类更新
	function do_category_update($id)
	{
		$categoryName = @$_POST['categoryName'];
		$aName = @$_POST['aName'];
		$remark = @$_POST['remark'];
	
		$this->load->model('Marticle');
		$result = $this->Marticle->update_role($id,$categoryName,$aName,$remark);
		
		if($result)
			echo '0';
		else
			echo '1';
	
	}
	
	//执行文章分类删除
	function do_category_delete()
	{
		$id = @$_POST['delId'];
		
		$this->load->model('Marticle');
		$result = $this->Marticle->delete_role($id);
		if($result)
			echo '0';
		else
		    echo '1';
	
	}
	
	//执行发布文章操作
	function do_article_add()
	{
		$title = @$_POST['title'];
		$author = @$_POST['author'];
		$cname = @$_POST['category'];
		$content = @$_POST['content'];
		
		$this->load->model('Marticle');
		$category_id = $this->Marticle->get_categoryId_ByName($cname); //根据分类查找文章分类id
		$result = $this->Marticle->insert_article($title,$author,$category_id,$content);
		if($result)
			echo '0';
		else
			echo '1';	
	
	}
	/*****************END article********************/
	
	
	/********************菜单功能**********************/
	
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
	
	//权限列表
	function purviewList()
	{
		
		if($this->user->auth_check('purviewList'))
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
	
	//文章列表
	function articleList()
	{
		if($this->user->auth_check('articleList'))
		{
		
			if($this->user->session_check())
			{
				$this->public_load();
				$this->article_list();
				$this->load->view('/Include/footer');	
			}
			else
				$this->load->view('/Member/login');
			}
		else
			$this->load->view('/Manage/no_auth');
		
	}
	
	//发布文章
	function articleAdd()
	{
		if($this->user->auth_check('articleAdd'))
		{
		
			if($this->user->session_check())
			{
				$this->public_load();
				$this->article_add();
				$this->load->view('/Include/footer');	
			}
			else
				$this->load->view('/Member/login');
			}
		else
			$this->load->view('/Manage/no_auth');
	}
		
		
	//文章分类列表
	function categoryList()
	{
		if($this->user->auth_check('categoryList'))
		{
		
			if($this->user->session_check())
			{
				$this->public_load();
				$this->category_list();
				$this->load->view('/Include/footer');	
			}
			else
				$this->load->view('/Member/login');
			}
		else
			$this->load->view('/Manage/no_auth');
	
	
	}
	
	
	/*****************************************************/
	//加载角色列表内容()
	function role_list()
	{
		$this->load->model('Mrbac');
		$data['role_list'] = $this->Mrbac->get_all_role();
		//var_dump($data['role_list']);
		$this->load->view('/Manage/Role/role_edit',$data);
	}
	
	//加载文章列表内容
	function article_list()
	{
		$this->load->model('Mrbac');
		$data['role_list'] = $this->Mrbac->get_all_role();
		//var_dump($data['role_list']);
		$this->load->view('/Manage/Article/article_list',$data);
	}
	
	//加载文章目录内容
	function category_list()
	{
		$this->load->model('Marticle');
		$data['category_list'] = $this->Marticle->get_all_category();
		//var_dump($data['role_list']);
		$this->load->view('/Manage/Article/category_list',$data);
	}
	
	function article_add()
	{
		$this->load->model('Marticle');
	
		$this->load->view('/Manage/Article/article_add');
	}
	/***********************************************************/
	//获取相对应项目的json数据
	
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
	
	function get_categoryJson_byId($id)
	{
		$this->load->model('Marticle');
		$result= $this->Marticle->get_category_by_id($id);
		foreach($result as $row)
		{
			$cname = $row->name;
			$aname = $row->aname;
			$remark = $row->remark;
		}
		
		@$category = array(
			"cname" => $cname,
			"aname" => $aname,
			"remark" => $remark
		);
		echo $msg=json_encode($category);
	}
	/**********************************************************/
}