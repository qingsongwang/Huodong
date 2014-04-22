<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * 功能：用户类，含有常用的一些方法
 *  
 * Created on 2014-3-27
 * 
 * @author:qingsongwang
 *
 */

class User
{
	private $_CI;
	
	/**
	 * construct of user class
	 * @access public
	 */
	function __construct()
	{
		$this->_CI = &get_instance();
	}

	function getUserNodes()
	{
		$this->_CI->load->model('Mrbac');
		$nodes = $this->_CI->Mrbac->get_user_nodes();
		return $nodes;
	}
	
	//检查session，判断是否已经登陆
	function session_check()
	{
		if($this->_CI->session->userdata('email'))
			return true;
		else
			return false;
	}
	
	//权限检查
	function auth_check($action)
	{
		$uid = $this->_CI->session->userdata('uid');
		$this->_CI->load->model('Mrbac');
		$result = $this->_CI->Mrbac->action_check($uid,$action);
		return $result;
	}
	
	function upload($fileElementName,$upFilePath,$allowType)
	{
		
		$num = strrpos($_FILES[$fileElementName]['name'],'.'); //查找‘.’在字符串中最后出现的位置
		$fileSuffixName   = substr($_FILES[$fileElementName]['name'],$num,4);  //截取后缀名字
		$fileSuffixName   = strtolower($fileSuffixName); //转化成小写

		if(!empty($_FILES[$fileElementName]['error']))
		{
			echo 'error';
		}else
		{
			if(empty($_FILES[$fileElementName]['tmp_name']) || $_FILES[$fileElementName]['tmp_name'] == 'none')
			{
  				 $error = '没有上传文件.';
			}
			else
			{
				if(!in_array($fileSuffixName,$allowType)) //存在在$allowType总返回true
				{
  				 	echo '不允许上传的文件类型'; 
				}
				else
				{
					$newFile = time().rand(1001,9999).$fileSuffixName;
					$ok=@move_uploaded_file($_FILES[$fileElementName]['tmp_name'],$upFilePath.$newFile);
   					if($ok == FALSE)
   					{
   						$file_infor = array("file_infor" => "上传失败",
   							'name' => $_FILES['img']['error']);
    						echo json_encode($file_infor);
   					}
   					else
   					{
    					$file_infor = array("file_infor" => "上传成功",
    						"url" => $newFile);
    					echo json_encode($file_infor);
					}
				}

			}
			
		}
	}

}