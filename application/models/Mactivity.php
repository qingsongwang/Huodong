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
	
	
	function check()
	{
		
	
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

	//分页
	function get_page($offset,$num)
	{
		$query=$this->db->query("SELECT gid,name,chairman,qqGroup,contact FROM groups order by gid desc limit $offset,$num");	//位置，数目
			return $query->result();
	}

	//获取活动总数目
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
		$query=$this->db->query("SELECT * FROM activities order by id desc limit $offset,$num");	//位置，数目
			return $query->result();
	}


	//*************************activity操作**************************
	function insert_activity($aname,$organizer,$contact,$startTime,$endTime,$place,$introduce,$poster)
	{
		$sql = "INSERT INTO activities(name,organizer,contact,startTime,endTime,place,introduce,poster,createTime) VALUES('$aname','$organizer','$contact','$startTime','$endTime','$place','$introduce','$poster',now())";
		$this->db->query($sql);
		
		return $this->db->affected_rows();	
	}


}