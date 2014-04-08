<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 权限控制Rbac模块
 *
 * Created on 2014-4-1
 *
 * @author:qingsongwang
 *
 * remark:从Mmember中分离出来，引用了user类
 */
//header("Content-type:text/html;charset=utf-8"); //very important !
 
class Mrbac extends CI_Model
{
	function  __construct(){
		parent::__construct();
		$this->load->library('pagination');  //加载分页类
		$this->load->helper('function');
		$this->load->database();
	}
	
	
	///////////////////////////////////////
	// 								     //
	//--------Rbac权限控制块----------   //
	//									 //
	//									 //
	///////////////////////////////////////
	
	//验证用户动作的权限
	function action_check($id,$action)
	{
		$sql = "SELECT * FROM users,rbac_action,rbac_access,rbac_node,rbac_role WHERE
			users.tb_users_id = '$id' 
			AND users.role_id = rbac_access.role_id 
			AND  rbac_access.node_id  =  rbac_action.node_id 
			AND rbac_action.action = '$action'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
			return true;
		else
			return false;
	
	}
	
	//根据role_id获取角色名称
	function get_role_shortname($role_id)
	{
		$sql = "SELECT * FROM rbac_role WHERE role_id = $role_id"; //查询
		$query = $this->db->query($sql);
		if($query->num_rows)
		{
			return $query->first_row()->role_shortname;
		}
		else
			return false;
	}
	
	//根据role_id获取角色信息
	function get_role_by_id($role_id)
	{
		$sql = "SELECT * FROM rbac_role WHERE role_id = $role_id"; //查询
		$query = $this->db->query($sql);
		if($query->num_rows)
		{
			return $query->result();
		}
		else
			return false;
	}

	//获取所有role信息
	function get_all_role()
	{
		$sql =  "SELECT * FROM rbac_role";
		$query = $this->db->query($sql);
		$result = $query->result();
		//var_dump($result);
		return 	$result;
	}
		
	//获取Session中的用户id
	function get_session_uid()
	{
		$uid = $this->session->userdata('uid');
		return $uid;
	}
	
		
	//获取用户node节点
	function get_user_nodes()
	{
		$uid = $this->get_session_uid();  //获取uid
		$nodes = $this->get_user_list_node($uid); //获取节点数据
		return $nodes;	
	}
	
	//根据uid获取节点列表
	function get_user_list_node($uid)
	{
		
		$all_nodes = $this->get_all_node($uid); //获取该uid下所有节点
		foreach($all_nodes as $all_node) 
		{	
			//echo "$all_node->node_id "; //true
			if($all_node->pid > 0)
			{
				$parent_node = $this->get_user_parent_node($all_node->pid);  //获取该节点的父节点
				if(!isset($node[$parent_node->node_id]))
				{
					$node[$parent_node->node_id] = array('parent_name' => $parent_node->node_name);
				}
				//下拉列表
				$sub_node_item['name'] = $all_node->node_name;
				$sub_node_item['url'] = $all_node->node_url;
				$node[$parent_node->node_id][] = array('name' => $sub_node_item['name'],
														'url' => $sub_node_item['url']
				);
			}
			else
			{
				//***
			}
		}
		return $node;
	}
	
	//获取该id所能够到达的节点
	function get_all_node($uid)
	{
		$sql = "SELECT rbac_node.* FROM users,rbac_role,rbac_node,rbac_access
		WHERE users.role_id = rbac_role.role_id 
		AND rbac_role.role_id = rbac_access.role_id
		AND rbac_access.node_id = rbac_node.node_id 
		AND users.tb_users_id = $uid";
		
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			foreach($query->result() as $node)
			{
				$nodes[] = $node;  //所有节点存到$node数组中去	
			}
			
			return $nodes;
		}
		else
			return false;
	}
	
	//获取父节点
	function get_user_parent_node($pid)
	{
		//$sql = "SELECT * FROM rbac_node WHERE node_id = $sub_node_id";
		//$query = $this->db->query($sql);
		//if($query->num_rows>0)
		//{
			//$pid = $query->first_row()->pid;
			//$sql = "SELECT * FROM rbac_node WHERE pid = $pid";
			//$node = $this->db->query($sql);
			
			//return $node->first_row();
		//}
		$sql = "SELECT * FROM rbac_node WHERE node_id = $pid";  
		$query = $this->db->query($sql);
		if($query->num_rows)
		{
			return $query->first_row();
		}
		else
			return false;		
	}
	
	
	//向数据库中插入角色信息
	function insert_role($roleName,$shortName,$remark)
	{
		$sql = "INSERT INTO rbac_role(role_name,role_shortname,remark) VALUES('$roleName','$shortName','$remark')";
		$this->db->query($sql);
		
		return $this->db->affected_rows();
	}
	
	//更新数据库中的角色信息
	function update_role($id,$roleName,$shortName,$role_remark)
	{
		$sql = "UPDATE rbac_role SET role_name='$roleName', role_shortname='$shortName', remark='$role_remark' WHERE role_id='$id'";
		$this->db->query($sql);
		
		return $this->db->affected_rows();
	}
	
	//删除数据库中的角色信息
	function delete_role($id)
	{
		$sql = "DELETE FROM rbac_role WHERE role_id = '$id'";
		$result = $this->db->query($sql);	
		return $this->db->affected_rows();
	}
	
}