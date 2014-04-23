<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 活动activity model
 *
 * Created on 2014年4月9日
 *
 * @author:qingsongwang
 *
 */
//header("Content-type:text/html;charset=utf-8"); //very important !
 
class Mactivity extends CI_Model
{
	function  __construct(){
		parent::__construct();
		$this->load->library('pagination');  //加载分页类
		$this->load->helper('function');
		$this->load->database();
	}
	
	
	
	function inject_check($sql_str) 
    {
        return eregi('select|insert|and|or|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile', $sql_str);
    }
	
	
	
	/******************社团group操作**********************/
	//插入社团
	function insert_group($gname,$chairman,$qqgroup,$contact,$content)
	{
		$sql = "INSERT INTO groups(name,chairman,qqgroup,contact,introduce,createTime) VALUES('$gname','$chairman','$qqgroup','$contact','$content',now())";
		$this->db->query($sql);
		
		return $this->db->affected_rows();
	}

	//获取社团总数目
	function get_group_num()
	{
		$sql = "SELECT * FROM groups";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	//社团分页
	function get_page($offset,$num)
	{
		$query=$this->db->query("SELECT * FROM groups order by gid desc limit $offset,$num");	//位置，数目
			return $query->result();
	}

	//获取单个社团活动总数目
	function get_group_activities_num($gid)
	{
		$sql = "SELECT * FROM activities WHERE gid = '$gid'";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	//获取所有社团数目
	function get_activities_num()
	{
		$sql = "SELECT * FROM activities";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	//活动分页
	//分页 
	function get_activity_page($offset,$num)
	{
		$query=$this->db->query("SELECT id,endTime FROM activities order by id desc limit $offset,$num ");	//位置，数目
		$result = $query->result_array();
		foreach ($result as $row)	//遍历查询的结果，将已过期的活动isEnd设为1
		{	
			if($this->timeCheck($row['endTime']))
			{
				$update_id = $row['id'];
				$sql  =  "UPDATE activities SET isEnd = '1' WHERE id = '$update_id'";
				$this->db->query($sql);
			}
		}
		$query=$this->db->query("SELECT * FROM activities order by id desc limit $offset,$num ");
		return $query->result();
	}
	
	//检查结束时间与当前的时间戳
	function timeCheck($time)
	{
		$t1 = strtotime($time); //截至时间
		$time2 = date("Y-m-d H:i:s");  //当前时间
		$t2 = strtotime($time2);

		if($t1 < $t2)
			return true;
		else
			return false;
	}



	//新的活动分页
	function get_group_activity_page($offset,$num,$gid)
	{
		$query=$this->db->query("SELECT * FROM activities WHERE gid = '$gid'  order by id desc limit $offset,$num");	//位置，数目
			return $query->result();
	}

	//根据id获取活动信息
	function get_activity_byId($id)
	{
		$query = $this->db->query("SELECT * FROM activities WHERE id = '$id'");
		return $query->result_array();
	}


	//*************************activity操作**************************
	function insert_activity($aname,$organizer,$contact,$startTime,$endTime,$place,$introduce,$poster)
	{
		$sql = "INSERT INTO activities(name,organizer,contact,startTime,endTime,place,introduce,poster,createTime) VALUES('$aname','$organizer','$contact','$startTime','$endTime','$place','$introduce','$poster',now())";
		$this->db->query($sql);
		
		return $this->db->affected_rows();	
	}


	//*************************user-activity操作**************************
	//报名活动 参数为 用户id 和 活动id
	function apply_activity($uid,$aid)
	{
		$sql = "SELECT uid FROM user_activity_relation WHERE uid = '$uid' AND aid='$aid'";
		 $this->db->query($sql);
		 $isHave = $this->db->affected_rows();
		if($isHave == 0)	 // 查询记录为0执行插入语句
		{
			$sql = "INSERT INTO user_activity_relation(uid,aid,createTime) VALUES('$uid','$aid',now())";
			$this->db->query($sql);
			return $this->db->affected_rows();	
		}
		else 
			return '0';	//已经报名了
	}

	//根据活动id获取待审核报名用户
	function get_unCheckUserId_Byaid($aid)
	{
		$sql = "SELECT user_activity_relation.id ,users.tb_users_name,users.tb_users_department,users.tb_users_class 
			FROM  user_activity_relation  LEFT join users on user_activity_relation.uid = users.tb_users_id WHERE aid = '$aid'";
	
		$query = $this->db->query($sql);
		return $query->result();
	}

	//审核通过，更新relation表中的ischeck
	function update_user_activity_relation($id)
	{
		$sql = "UPDATE user_activity_relation SET isCheck = '1' WHERE id = '$id'";
		$this->db->query($sql);
		return $this->db->affected_rows();
	}






}