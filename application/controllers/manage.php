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
	
	//post check
	function pc($post) 
	{ 
		if(!get_magic_quotes_gpc()) 
		{ 
			$post = addslashes($post);
		} 
		$post = str_replace("_", "\_", $post); 
		$post = str_replace("%", "\%", $post); 
		$post = nl2br($post); 
		$post = htmlspecialchars($post); 
     
		return $post; 
	}
	
	//string check test
	function strCheck()
	{
		$str = "Who's John Adams?";
		echo $str ;
		echo mysql_real_escape_string($str);
	}
	
	//后台首页
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
	
	//加载后台导航栏
	function nav()
	{
		$this->load->view('/Include/header');
		$this->load->view('/Include/nav_new');
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
		if($this->user->auth_check('articleAdd'))
		{

		if(isset($_POST)&&$this->user->session_check())  //检查是否有post值和session
		{
			$title = $this->pc(trim(@$_POST['title']));
			$author =$this->pc(trim(@$_POST['author']));
			$cname = $this->pc(trim(@$_POST['category']));
			$content = $this->pc(trim(@$_POST['content']));	
				
			if(!empty($title)&&!empty($author)&&!empty($cname)&&!empty($content))
			{
				$this->load->model('Marticle');
				$category_id = $this->Marticle->get_categoryId_ByName($cname); //根据分类查找文章分类id
				$result = $this->Marticle->insert_article($title,$author,$category_id,$content);
				if($result)
					echo '0';
				else
					echo '1';	
			}
			else
				echo 'error1';
		}
		else
			echo 'error2';

		}
		else
		{
			$this->load->view('/Manage/no_auth');
		}
	
	}
	/*****************END article********************/
	
	/*****************group********************/
	function do_group_add()
	{
		if($this->user->auth_check('groupAdd'))
		{

			if(isset($_POST)&&$this->user->session_check())  //检查是否有post值和session,按照逻辑默认是具有增加社团权限
			{
				$gname = $this->pc(trim(@$_POST['gname']));
				$chairman = $this->pc(trim(@$_POST['chairman']));
				$qqgroup = $this->pc(trim(@$_POST['qqgroup']));
				$contact = $this->pc(trim(@$_POST['contact']));
				$content = $this->pc(trim(@$_POST['content']));
					
				if(!empty($gname)&&!empty($chairman)&&!empty($qqgroup)&&!empty($contact)&&!empty($content))
				{
					$this->load->model('Mactivity');
					$result = $this->Mactivity->insert_group($gname,$chairman,$qqgroup,$contact,$content);
					if($result)
						echo '0';
					else
						echo '1';	
				}
				else
					echo 'error1';
			}
			else
			{
				echo 'error2';
			}
		}
		else 	//have no purview
		{
			$this->load->view('/Manage/no_auth');
		}
		
	}

	//上传社团logo
	function do_logo_upload()
	{
		
		$upFilePath = "c:/wamp/www/Activites/static/resources/grouplogo/";
    	$fileElementName = 'img';
    	$allowType = array(".jpg",".gif",".png");
		$this->load->library ( 'user' );
		$this->user->upload($fileElementName,$upFilePath,$allowType); 
	}

	/*****************END group*************************/

	/*****************member*************************/

	/*****************END member*************************/

	
	/********************菜单功能**********************/
	
	//菜单功能节点列表
	function nodeList()
	{
		if($this->user->auth_check('nodeList'))
		{
			if($this->user->session_check())
			{
				$this->public_load();
				$this->node_list();
				$this->load->view('/Include/footer');	
			}
			else
				$this->load->view('/Member/login');
			}
		else
			$this->load->view('/Manage/no_auth');

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
	
	//权限列表 （暂未启用 2014年4月14日 15:06:46）
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
	
	//根据category id列表文章
	function listByCategory()
	{
		$id =  $this->uri->segment(3,0);
		if($this->user->auth_check('listByCategory')&&!empty($id))
		{
		
			if($this->user->session_check())
			{	
				$this->public_load();
				$this->list_by_category($id);
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
	
	//社团列表
	function groupList()
	{
		if($this->user->auth_check('groupList'))
		{
		
			if($this->user->session_check())
			{
				$this->public_load();
				$this->group_list();
				$this->load->view('/Include/footer');	
			}
			else
				$this->load->view('/Member/login');
			}
		else
			$this->load->view('/Manage/no_auth');
	}
	
	//添加社团
	function groupAdd()
	{
		if($this->user->auth_check('groupAdd'))
		{
		
			if($this->user->session_check())
			{
				$this->public_load();
				$this->group_add();
				$this->load->view('/Include/footer');	
			}
			else
				$this->load->view('/Member/login');
			}
		else
			$this->load->view('/Manage/no_auth');
	
	
	}

	//会员列表
	function memberList()
	{
		if($this->user->auth_check('memberList'))
		{
		
			if($this->user->session_check())
			{
				$this->public_load();
				$this->member_list();
				$this->load->view('/Include/footer');	
			}
			else
				$this->load->view('/Member/login');
		}
		else
			$this->load->view('/Manage/no_auth');
	}

	/*****************************************************/
	//加载功能节点内容
	function node_list()
	{
		$this->load->model('Mrbac');
		$data['node_list'] = $this->Mrbac->get_node();
		//var_dump($data['role_list']);
		$this->load->view('/Manage/Role/node_list',$data);

	}



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
		$this->load->model('Marticle');
		
 		$config['total_rows']=$this->Marticle->get_article_num();//分类文章总数
		$config['per_page']=4; //一页显示的文章数
		$config['page'] = $this->uri->segment(3,0);
		
	
		$pre = $config['page'] - $config['per_page'];
		if($pre < 0)   //如果小于0，则到头
		{
			$pre = 0;
		}
				
		$next = $config['page'] + $config['per_page'];
		if($next > $config['total_rows'])
		{
			$next = $next - $config['per_page'];
		}		
		$data['pre'] = base_url().'index.php/manage/articleList/'.$pre;
		$data['next'] = base_url().'index.php/manage/articleList/'.$next;
		
		$data['article_list']=$this->Marticle->get_page($config['page'],$config['per_page']);		 
		
		$this->load->view('/Manage/Article/article_list',$data);
	}
	
	//根据category id来查看文章
	function list_by_category($id)
	{
		$this->load->model('Marticle');
		
 		$config['total_rows']=$this->Marticle->get_article_num_by_cateogyId($id);//分类文章总数
		$config['per_page']=4; //一页显示的文章数
		$config['page'] = $this->uri->segment(4,0);
		
	
		$pre = $config['page'] - $config['per_page'];
		if($pre < 0)   //如果小于0，则到头
		{
			$pre = 0;
		}
				
		$next = $config['page'] + $config['per_page'];
		if($next > $config['total_rows'])
		{
			$next = $next - $config['per_page'];
		}		
		$data['pre'] = base_url().'index.php/manage/listByCategory/'.$id.'/'.$pre;
		$data['next'] = base_url().'index.php/manage/listByCategory/'.$id.'/'.$next;
		
		$data['article_list']=$this->Marticle->get_page_by_category($config['page'],$config['per_page'],$id);		 
		
		$this->load->view('/Manage/Article/list_by_category',$data);
	
	}
	
	//加载文章目录内容
	function category_list()
	{
		$this->load->model('Marticle');
		$data['category_list'] = $this->Marticle->get_all_category();
		//var_dump($data['role_list']);
		$this->load->view('/Manage/Article/category_list',$data);
	}
	
	//发布文章
	function article_add()
	{
		$this->load->model('Marticle');
		$data['select'] = $this->Marticle->get_all_category();
		
		$this->load->view('/Manage/Article/article_add',$data);
	}
	
	//社团列表
	function group_list()
	{
		$this->load->model('Mactivity');
		$config['total_rows']=$this->Mactivity->get_group_num();//社团总数
		$config['per_page']=4; //一页显示的社团数
		$config['page'] = $this->uri->segment(3,0);
		
	
		$pre = $config['page'] - $config['per_page'];
		if($pre < 0)   //如果小于0，则到头
		{
			$pre = 0;
		}
				
		$next = $config['page'] + $config['per_page'];
		if($next > $config['total_rows'])
		{
			$next = $next - $config['per_page'];
		}		
		$data['pre'] = base_url().'index.php/manage/groupList/'.$pre;
		$data['next'] = base_url().'index.php/manage/groupList/'.$next;
		
		$data['group_list']=$this->Mactivity->get_page($config['page'],$config['per_page']);

		$this->load->view('/Manage/Group/group_list',$data);
	}
	
	//添加社团
	function group_add()
	{
		$this->load->view('/Manage/Group/group_add');
	}
	
	function member_list()
	{
		$this->load->model('Mmember');
		$config['total_rows']=$this->Mmember->get_member_num();//会员总数
		$config['per_page']=4; //一页显示的社团数
		$config['page'] = $this->uri->segment(3,0);
		
	
		$pre = $config['page'] - $config['per_page'];
		if($pre < 0)   //如果小于0，则到头
		{
			$pre = 0;
		}
				
		$next = $config['page'] + $config['per_page'];
		if($next > $config['total_rows'])
		{
			$next = $next - $config['per_page'];
		}		
		$data['pre'] = base_url().'index.php/manage/memberList/'.$pre;
		$data['next'] = base_url().'index.php/manage/memberList/'.$next;
		
		$data['member_list']=$this->Mmember->get_page($config['page'],$config['per_page']);

		$this->load->view('/Manage/Member/member_list',$data);


	}

	
	
	/***********************************************************/
	
	
	
	//获取相对应项目的json数据
	
	//根据id获取role名称
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
	
	//根据id获取category名称
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