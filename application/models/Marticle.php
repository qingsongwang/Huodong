<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 文章article model
 *
 * Created on 2014年4月9日
 *
 * @author:qingsongwang
 *
 */
//header("Content-type:text/html;charset=utf-8"); //very important !
 
class Marticle extends CI_Model
{
	function  __construct(){
		parent::__construct();
		$this->load->library('pagination');  //加载分页类
		$this->load->helper('function');
		$this->load->database();
	}
	
	/************category目录操作******************/
	
	//获取所有文章目录分类
	function get_all_category()
	{
		$sql = "SELECT * FROM article_category";
		$query =  $this->db->query($sql);
		$result = $query->result();
		return $result;	
	}
	
	//根据id获取分类
	function get_category_by_id($id)
	{
		$sql = "SELECT * FROM article_category WHERE category_id = $id"; //查询
		$query = $this->db->query($sql);
		if($query->num_rows)
		{
			return $query->result();
		}
		else
			return false;
	}
	
	//插入分组
	function insert_category($categoryName,$aName,$remark)
	{
		$sql = "INSERT INTO article_category(name,aname,remark) VALUES('$categoryName','$aName','$remark')";
		$this->db->query($sql);
		
		return $this->db->affected_rows();
	}
	
	//更新分组
	function update_role($id,$categoryName,$aName,$remark)
	{
		$sql = "UPDATE article_category SET name='$categoryName', aname='$aName', remark='$remark' WHERE category_id='$id'";
		$this->db->query($sql);
		
		return $this->db->affected_rows();
	}
	
	function delete_role($id)
	{
		$sql = "DELETE FROM article_category WHERE category_id = '$id'";
		$result = $this->db->query($sql);	
		return $this->db->affected_rows();
	}
	/**********************************************/
	
}