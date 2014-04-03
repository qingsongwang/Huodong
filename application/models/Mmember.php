<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * 会员中心Model层
 *
 * Created on 2014-3-14
 *
 * @author:qingsongwang
 *
 *
 */
 header("Content-type:text/html;charset=utf-8"); //very important !
 
class Mmember extends CI_Model
{
	function  __construct(){
		parent::__construct();
		$this->load->library('pagination');  //加载分页类
		$this->load->helper('function');
		$this->load->database();
	}

	//插入用户
	function insert_user()
	{
		$email = $this->input->post('email');	//邮箱
		$regpwd1 = MD5($this->input->post('regpwd1'));	//密码
		$regpwd2 = MD5($this->input->post('regpwd2'));

		$stuId = $this->input->post('regstuId');  //学号
		$name = $this->input->post('regname');  //姓名
		$telphone = $this->input->post('regtel');   //手机
	

		$sql = "INSERT INTO users(tb_users_id,tb_users_email,tb_users_password,tb_users_stuId,tb_users_name,tb_users_telphone,tb_users_createTime,tb_users_updateTime)
		VALUES('','$email','$regpwd1','$stuId','$name','$telphone',now(),now())";

		$this->db->query($sql);
		return $this->db->affected_rows();
	}
	
	//更新用户信息
	function update_user($uid)
	{
		$name = $this->input->post('name');
		$stuId = $this->input->post('stuId');
		$sex = $this->input->post('sex_group');
		$province = $this->input->post('province');
		$birthdate = $this->input->post('birthdate');
		$age = $this->input->post('age');
		$idcard = $this->input->post('idcard');
		$politic = $this->input->post('politic_group');
		$department = $this->input->post('department');
		$address = $this->input->post('address');
		$skills = $this->input->post('skills');
		$signature = $this->input->post('signature');
		
		//完整版sql
		//$sql = "UPDATE users SET tb_users_name = $name ,tb_users_stuId = $stuId ,tb_users_sex = $sex, tb_users_province = $province, tb_users_birthdate = $birthdate, tb_users_age = $age, tb_users_idcard = $idcard ,tb_users_politicStatus = $politicStatus,tb_users_department = $department,tb_users_address = $address ,tb_users_skills = $skills , tb_users_signature = $signature
		//	WHERE tb_users_id = $uid)";
		
		//暂时去掉了省份，生日
		
		$sql = "UPDATE users SET tb_users_name = '$name' ,tb_users_stuId = '$stuId' ,tb_users_sex = '$sex', tb_users_age = '$age', tb_users_idcard = '$idcard' ,tb_users_politicStatus = '$politic',tb_users_department = '$department',tb_users_address = '$address' ,tb_users_skills = '$skills' , tb_users_signature = '$signature'
			WHERE tb_users_id = $uid";	
		$this->db->query($sql);
		return $this->db->affected_rows();
	
	}
	
	//根据用户uid获取用户信息
	function get_user_info($uid)
	{
		$sql = "SELECT * FROM users WHERE tb_users_id = '$uid'";
		$query = $this->db->query($sql);
			
		return $query->row_array();
	}

	//比对用户名和密码
	function check_user_pwd($loginemail,$loginpwd)
	{
		$email = $loginemail;
		$password = $loginpwd;
		//print($email);
		$sql = "SELECT * FROM users WHERE tb_users_email = '$email' AND tb_users_password = '$password'";
		$query = $this->db->query($sql);
		
		
		return $query;
	}
	
	//查询邮箱是否已经存在
	function check_email($email)
	{
		$sql = "SELECT tb_users_email FROM users WHERE tb_users_email = '$email'";
		$query = $this->db->query($sql);
		return	$this->db->affected_rows();
	}
	
}