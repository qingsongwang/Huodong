<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 功能：会员member控制器
 *  
 * Created on 2014-3-14
 *
 * @author:qingsongwang
 *
 */

class Member extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->library ( 'avatarlib' ); 
		$this->load->library ( 'user' ); 
	}
	
	//用户中心主页
	public function index()
	{
		$this->edit_user();
	}

	//注册页面
	public function register_old()
	{
		$this->logout();
		$this->load->view("/Member/register3.php");
	}
	
	//注册新界面
	function reg()
	{
		$this->load->view('/Member/register_new');
	}

	//初始注册用户
	public function submit_ok()
	{
 		if($this->input->post('submit'))
 		{
 			$this->load->model('Mmember');
 			$query = $this->Mmember->insert_user();
 			if($query)
 			{
				$this->session->sess_destroy();
 				$this->load->view("/Member/register_success.php");
				
 			}
 			else
 				echo "error";
 		}
 		else
 			echo "没submit";
	}

	//用户登录
	public function login()
	{
		$this->load->view("/Member/login.php");
	}
		 
	//退出登录
	function logout()
	{
		$this->session->sess_destroy();
		$this->load->view('Member/login');
	}
	
	//登录界面登陆验证
	function do_login()
	{
		$loginemail = $_POST['loginemail'];
		$loginpwd = MD5($_POST['loginpwd']);
		
		
			$this->load->model('Mmember');
			$query = $this->Mmember->check_user_pwd($loginemail,$loginpwd);

			if($query->num_rows > 0)  //查询数据库结果不为0时
			{
				$r = $query->row();
				$sess_data = array('uid'=>$r->tb_users_id,'email'=>$r->tb_users_email,'role_id'=>$r->role_id);
				$this->session->set_userdata($sess_data);  //设置cookies
				echo '0';
			}
			else
				//echo "error!";
				echo '1';
	}

	//保存用户信息
	function save_user()
	{
		if($this->input->post('submit'))
		{
			$uid =  $this->session->userdata('uid');  //get user's id from session
			$this->load->model('Mmember');
			$query = $this->Mmember->update_user($uid);
 			if($query)
 			{
				$this->load->view('/Member/edit_success');
			}
			else
				echo "error";
		}
	}
	
	//上传头像方法
	public function upload_avatar() 
	{ 
			if($this->user->session_check())
			{
				$data['uid'] = $this->session->userdata('uid');
				$data ['avatarflash'] = $this->avatarlib->uc_avatar ( $data ['uid'] ); 
				$data ['avatarhtml'] = $this->avatarlib->avatar_show($data ['uid'] ,'big'); 
				$this->load->view ( 'avatar', $data );
			}
			else
				$this->load->view('/Member/login');
	 	
	}
	
	//完成头像上传
	function doavatar()
	{ 
		$action='on'.$_GET['a']; 
		$data = $this->avatarlib->$action(); 
		echo $data;
	}
	
	//编辑用户信息（登陆完成后默认显示的界面）
	function edit_user()
	{
		
		if($this->user->session_check())
		{
			$data['email'] = $this->session->userdata('email');
			$data['uid'] = $this->session->userdata('uid');
			$this->load->model('Mmember');
			$row = $this->Mmember->get_user_info($data['uid']);   //根据uid获取用户的信息
			
			//user_infomations
			$data['name'] = $row['tb_users_name'];
			$data['stuId'] = $row['tb_users_stuId'];
			$data['sex'] = $row['tb_users_sex'];
			$data['province'] = $row['tb_users_province'];
			$data['birthdate'] = $row['tb_users_birthdate'];
			$data['age'] = $row['tb_users_age'];
			$data['idcard'] = $row['tb_users_idcard'];
			$data['politicStatus'] = $row['tb_users_politicStatus'];
			$data['telphone'] = $row['tb_users_telphone'];
			$data['email'] = $row['tb_users_email'];
			$data['department'] = $row['tb_users_department'];
			$data['class'] = $row['tb_users_class'];
			$data['address'] = $row['tb_users_address'];
			$data['skills'] = $row['tb_users_skills'];
			$data['signature'] = $row['tb_users_signature'];
			
			
			//$data ['avatarflash'] = $this->avatarlib->uc_avatar ( $data ['uid'] ); 
			$data ['avatarhtml'] = $this->avatarlib->avatar_show($data ['uid'] ,'middle');  //显示头像 
		
			
			$this->load->view('Member/personal_info.php',$data);
		}
		else
			$this->login();
	}
		
	
	//ajax判断邮箱是否已经被注册了
	function check_email()
	{
		$email =  $_GET['email'];
		//$email = 'cnsongzi@foxmail.com';
		$this->load->model('Mmember');
		$row = $this->Mmember->check_email($email);
		if($row > 0)
			echo 'false';
		else
			echo 'true';
	}
	

	
}