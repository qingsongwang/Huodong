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

	function viewGroup()
	{
		if($this->user->session_check())
		{
			$this->load->model('Mmember');
			$data['uid'] = $this->session->userdata('uid');
			$row = $this->Mmember->get_user_info($data['uid']);   //根据uid获取用户的信息
			$data['name'] = $row['tb_users_name'];
		}
		$this->load->model('Mactivity');
				
		$gid =$this->uri->segment(3, 0); 

		if($gid == 0)
		{
			redirect('activity/group');
		}
		else
		{
			$query = $this->Mactivity->get_group_byId($gid);
			if($query->num_rows()>0)
			{
				$result_array = $this->Mactivity->get_group_IngActivity($gid);
				
				$result = $query->row_array();
				$data['groupName'] = $result['name'];
				$data['chairman'] = $result['chairman'];
				$data['qqgroup'] = $result['qqGroup'];
				$data['tel'] = $result['contact'];
				$data['intro'] = $result['introduce'];
				$data['logo'] = $result['logo'];
				$data['activity_array'] = $result_array;
				$this->load->view('Activity/view_group',$data);
			}
			else
				redirect('activity/group');
		}
		
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
			echo 'error';
		
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
	function do_applyActivity()
	{
		if($this->user->session_check())
		{
			$aid = trim($_POST['id']); //活动aid
			$this->load->model('Mmember');
			$data['uid'] = $this->session->userdata('uid'); //从session中获取uid
			$row = $this->Mmember->get_user_info($data['uid']);   //根据uid获取用户的信息
			$data['name'] = $row['tb_users_name'];
			$this->load->model('Mactivity');
			$result = $this->Mactivity->apply_activity($data['uid'],$aid);  //写入数据库

			if($result == 1)
			{
				echo '<div class="alert alert-success">报名成功，等待审核！</div><a class="btn"   href="refresh">好的</a>';
			}	
			else
			{
				if($result == '0') //已经报名啦
					echo '<div class="alert alert-error">该活动你已经报名过啦！</div><a class="btn"   href="refresh">好的，我知道了！</a>';
				else
					echo '<div class="alert alert-error">很抱歉，报名失败</div>';
			}
		}
		else
			echo  '你必须得登录后操作<a href="http://127.0.0.1/Activites/index.php/member/login">去登录</a>';  //链接有问题
	}

	function getActivityJsonById($id)
	{	
		$this->load->model('Mactivity');
		$result = $this->Mactivity->get_activity_byId($id);
		echo $msg=json_encode($result);
	}

	function refresh()
	{
		 redirect('activity/hd', 'refresh');
	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */