<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activity extends CI_Controller {

	function __construct(){
		parent::__construct(); 
		
	}

	public function index()
	{
		$this->load->view('Activity/header');
		$this->load->view('Activity/nav');
		$this->load->view('Activity/banner');
		$this->load->view('Activity/content');
		
	}

	//前台活动
	function hd()
	{
		if($this->user->session_check())
		{
			$this->load->model('Mmember');
			$data['uid'] = $this->session->userdata('uid');
			$row = $this->Mmember->get_user_info($data['uid']);   //根据uid获取用户的信息
			$data['name'] = $row['tb_users_name'];
		}
		
		$this->load->model('Mactivity');
			//$this->Mactivity->get_activity_page();
		
		$config['per_page']=3; //一页显示的活动数
		$config['page']=0;
		$data['last_id'] = $config['page'];
		$data['activity_list']=$this->Mactivity->get_activity_page($config['page'],$config['per_page']);
		
		//$this->load->view('Activity/header2');
		$this->load->view('Activity/loadPoster',$data);
	}

	//前台社团
	function group()
	{
		if($this->user->session_check())
		{
			$this->load->model('Mmember');
			$data['uid'] = $this->session->userdata('uid');
			$row = $this->Mmember->get_user_info($data['uid']);   //根据uid获取用户的信息
			$data['name'] = $row['tb_users_name'];
		}

		$this->load->model('Mactivity');
		//$this->Mactivity->get_activity_page();
		
		$config['per_page']=3; //一页显示的社团数
		$config['page']=0;
		$data['last_id'] = $config['page'];
		$data['group_list']=$this->Mactivity->get_page($config['page'],$config['per_page']);
		
		//$this->load->view('Activity/header2');
		$this->load->view('Activity/loadGroup',$data);

	}

	//ajax获取剩下的海报
	function getPosterMore()
	{
		$last_id =$_GET['last_id'];  //最后一张海报id
		
		$this->load->model('Mactivity');
		$config['total_rows']=$this->Mactivity->get_activities_num(); //获取总数

		$config['per_page']=3; //一页显示的活动数
		$config['page']=$last_id+$config['per_page'];
		if($config['page']<$config['total_rows'])
		{
			$activity_list = $this->Mactivity->get_activity_page($config['page'],$config['per_page']);
			//var_dump($activity_list);
			$list = json_encode($activity_list);
			echo $list;
		}
		else
			echo 'errro';
		
	}

	//ajax获取剩下的社团
	function getGroupMore()
	{
		$last_id =$_GET['last_id'];  //最后一张海报id
		
		$this->load->model('Mactivity');
		$config['total_rows']=$this->Mactivity->get_group_num(); //获取总数

		$config['per_page']=3; //一页显示的社团数
		$config['page']=$last_id+$config['per_page'];
		if($config['page']<$config['total_rows'])
		{
			$activity_list = $this->Mactivity->get_page($config['page'],$config['per_page']);
			//var_dump($activity_list);
			$list = json_encode($activity_list);
			echo $list;
		}
		else
			echo 'errro';
		
	}

	//报名活动
	function applyActivity()
	{
		if($this->user->session_check())
		{
			
			$aid = trim($_POST['id']); //活动id
			$this->load->model('Mmember');
			$data['uid'] = $this->session->userdata('uid');
			$row = $this->Mmember->get_user_info($data['uid']);   //根据uid获取用户的信息
			$data['name'] = $row['tb_users_name'];
			
		}
		else
			echo '你必须得登录'; 
	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */