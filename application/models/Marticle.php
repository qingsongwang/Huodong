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
	
	//根据分类获取id
	function get_categoryId_ByName($cname)
	{
		$sql = "SELECT category_id FROM article_category WHERE name = '$cname'"; //查询
		$query = $this->db->query($sql);
		if($query->num_rows)
		{
			return $query->row()->category_id;
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
	
	//删除分组
	function delete_role($id)
	{
		$sql = "DELETE FROM article_category WHERE category_id = '$id'";
		$result = $this->db->query($sql);	
		return $this->db->affected_rows();
	}
	/**********************************************/
	
	/******************文章操作**********************/
	//插入文章
	function insert_article($title,$author,$category_id,$content)
	{
		$sql = "INSERT INTO articles(title,author,category,content,create_time) VALUES('$title','$author','$category_id','$content',now())";
		$this->db->query($sql);
		
		return $this->db->affected_rows();
	}

	//获取文章总数
	function get_article_num()
	{
		$sql = "SELECT * FROM articles";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}
	
	//获取相应category下的文章数目
	function get_article_num_by_cateogyId($id)
	{
		$sql = "SELECT * FROM articles WHERE articles.category = $id";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}	
	
	//获取页面
	function get_page($offset,$num) //分页
	{
			$query=$this->db->query("SELECT article_id,title,author,content,name,category_id FROM articles,article_category WHERE article_category.category_id = articles.category order by article_id desc limit $offset,$num");	//位置，数目
			return $query->result();
	}
	
	function get_page_by_category($offset,$num,$id)
	{
		$query=$this->db->query("SELECT article_id,title,author,content,name,category_id FROM articles,article_category WHERE article_category.category_id = articles.category and articles.category = '$id' order by article_id desc limit $offset,$num");	//位置，数目
		return $query->result();
	}
	
	/**********************************************/
	
}