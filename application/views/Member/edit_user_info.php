<html>
<head>
<meta charset="UTF8">
	
</head>

<body>
<form action="<?=base_url()?>index.php/member/save_user" method="post"  name="user_info" id="user_info" class="form-horizontal">
  <p>
    <label for="name"></label>
  </p>
  <table width="368" border="0" align="center">
    <tr>
      <td width="121"><div align="right">姓名：</div></td>
      <td width="237"><label for="name2"></label>
      <input type="text" name="name" id="name" value="<?php echo $name?>" /></td>
    </tr>
    <tr>
      <td><div align="right">学号：</div></td>
      <td><input type="text" name="stuId" id="stuId" value="<?php echo $stuId?>" /></td>
    </tr>
    <tr>
      <td><div align="right">性别：</div></td>
      <td><select name="sex" id="sex"  >
        
		<option value="M" <?php if($sex=='M'):?>selected<?endif;?>>男</option>
		<option value="F" <?php if($sex=='F'):?>selected<?endif;?>>女</option>
		
      </select></td>
    </tr>
    <tr>
     
    </tr>
    <tr>
      <td><div align="right">生日：</div></td>
      <td> 
		
	  </td>
    </tr>
    <tr>
      <td><div align="right">年龄：</div></td>
      <td><input type="text" name="age" id="age" value="<?php echo $age?>" /></td>
    </tr>
    <tr>
      <td height="21"><p align="right">身份证：</p></td>
      <td><input type="text" name="idcard" id="idcard" value="<?php echo $idcard?>" /></td>
    </tr>
    <tr>
      <td><div align="right">政治面貌：</div></td>
      <td><select name="politicStatus" id="politicStatus"  >
        
		<option value="群众" <?php if($politicStatus='群众'):?>selected<?endif;?>>群众</option>
		<option value="共青团员" <?php if($politicStatus='共青团员'):?>selected<?endif;?>>共青团员</option>
		<option value="中共预备党员" <?php if($politicStatus='中共预备党员'):?>selected<?endif;?>>中共预备党员</option>
		<option value="中共党员" <?php if($politicStatus='中共党员'):?>selected<?endif;?>>中共党员</option>
      </select></td>
    </tr>
    <tr>
      <td height="21"><p align="right">系部：</p></td>
      <td><select name="department" id="department" >
	
	<option value="">请选择你的系别</option>
    <option value="电子信息与电气工程系">电子信息与电气工程系</option>
    <option value="化学与材料工程系">化学与材料工程系</option>
    <option value="计算机科学与技术系">计算机科学与技术系</option>
    <option value="教育系">教育系</option>
	<option value="旅游系">旅游系</option>
    <option value="数学与物理系">数学与物理系 </option>
    <option value="管理系">管理系</option>
	<option value="艺术系">艺术系</option>
	<option value="机械工程系">机械工程系</option>
    <option value="建筑工程系">建筑工程系</option>   
	<option value="经济系">经济系</option>
    <option value="生物与环境工程系">生物与环境工程系</option> 
	<option value="外国语言系">外国语言系</option>
    <option value="中国语言文学系">中国语言文学系</option>  
      </select></td>
    </tr>
    <tr>
      <td><div align="right">地址：</div></td>
      <td><input type="text" name="address" id="address" value="<?php echo $address?>"/></td>
    </tr>
    <tr>
      <td><div align="right">特长：</div></td>
      <td><textarea type="text" name="skills" id="skills" ><?php echo $skills?></textarea></td>
    </tr>
    <tr>
      <td><div align="right">签名：</div></td>
      <td><textarea type="text" name="signature" id="signature" ><?php echo $signature?></textarea></td>
    </tr>
    <tr>
      <td><div align="right">头像：</div></td>
      <td><label for="photo"></label>
	
		<p><?php echo $avatarhtml; ?></p> 
		<a href="<?=base_url()?>index.php/member/upload_avatar" target="_blank">修改头像</a>
	  </td>
	  </td>
    </tr>
    <tr>
      <td colspan="2" align="center" valign="middle">
	  <input hidden=true name="uid" id="uid" value=<?php echo $uid?> />
	  <input type="submit" name="submit" id="submit" value="提交" />
      <input type="reset" name="cancel" id="cancel" value="重置" /></td>
    </tr>
  </table>
  <a href="<?=base_url()?>index.php/member/logout">退出</a>
</form>



</body>
</html>
