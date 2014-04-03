/* 检查变量脚本 */


function $(idValue)
{
	return document.getElementById(idValue);    //通用函数，来获取元素对象
}


window.onload = function()  //窗口加载函数
{
	$('regname').focus();   
	
	var cname1,cpwd1,cpwd2,cemail;  //需要检查的五项数据
	
	function chkreg()
	{
		if((cname1 == 'yes')&&(cpwd1 == 'yes')&&(cpwd2 == 'yes')&&(cemail == 'yes'))
		{
			$('regbtn').disabled = false;  //所有变量都为yes时注册按钮被激活
		}
		else
		{
			$('regbtn').disabled = true;
		}
	}
	
	
	//验证用户名
	$('regname').onkeyup = function()
	{
		name = $('regname').value;	//获取用户名
		cname2 = '';
		if(name.match(/^[a-zA-Z]*/) == '')
		{
			$('namediv').innerHTML = '<font color=red>必须以字或者下划线开头</font>';
			cname1 = '';
		}
		else
			if(name.length <= 3)
			{
				$('namediv').innerHTML = '<font color=red>注册名称必须大于3位</font>';
				cname1 = '';
			}
			else
			{
				$('namediv').innerHTML = '<font color=green>注册名称符合标准</font>';
				cname1 = 'yes';
			}
	}
	
	/* //检测用户名是否重复
	$('regname').onblur = funtion()
	{
		name = $('regname').value;	//获取用户名
		if(cname1 == 'yes')
		{
			xmlhttp.open('GET','chkname.php?name='+name,true);  //创建新请求
			xmlhttp.onreadystatechange = function()
			{
				if(xmlhttp.readystate == 4)
				{
					if(xmlhttp.status == 200)
					{
						var msg = xmlhttp.responseText; //获取响应的内容
						if(msg == '1')
						{
							$('namediv').innerHTML = '<font color=red>恭喜该用户名可以使用！</font>';
							cname2 == 'yes';
						}
						else
							if(msg == '2')
							{
								$('namediv').innerHTML = '<font color=red>用户名被占用！</font>';
								cname2 == '';
							}
							else
							{
								$('namediv').innerHTML = '<font color=red>"+msg+"</font>';
								cname2 == '';
							}
					}	
				}
				//chkreg();
			}
			xmlhttp.send(null);
		}
	
	}  */
	
	
	//验证密码
	$('regpwd1').onkeyup = function()
	{
		pwd = $('regpwd1').value;
		pwd2 = $('regpwd2').value;
		
		if(pwd.length<6)	//密码长度小于6
		{
			$('pwddiv').innerHTML = '<font color=red>密码长度至少6位！</font>';
			cpwd1 == '';
		}
		else
			if(pwd.length>=6&&pwd.length<12)
			{
				$('pwddiv').innerHTML = '<font color=green>密码符合要求，强度：弱！</font>';
				cpwd1 == 'yes';
			}
			else
				if((pwd.match(/^[0-9]*$/)!=null)||(pwd.match(/^[a-zA-Z]*$/)!=null))		//密码中纯数字或纯字母
				{
					$('pwddiv').innerHTML = '<font color=green>密码符合要求，强度：中！</font>';
					cpwd1 == 'yes';
				}
				else
				{
					$('pwddiv').innerHTML = '<font color=green>密码符合要求，强度：高！</font>';
					cpwd1 == 'yes';
				}
		
		if(pwd2!=''&&pwd!=pwd2)
		{
			$('pwddiv2').innerHTML = '<font color=red>两次密码不一致!</font>';
			cpwd2 == 'yes';
		}
		else
			if(pwd2!=''&&pwd == pwd2)
			{
				$('pwddiv2').innerHTML = '<font color=red>密码输入正确!</font>';
				cpwd2 == 'yes';
			}
		//chkreg();
	}
	
	
	//验证二次密码
	$('regpwd2').onkeyup = function()
	{
		pwd1 = $('regpwd1').value;
		pwd2 = $('regpwd2').value;
		
		if(pwd1!=''&&pwd2!='')   //密码不能有空
		{
			if(pwd1!=pwd2)
			{
				$('pwddiv2').innerHTML = '<font color=red>两次密码不一致</font>';
				cpwd2 == '';
			}
			else
			{
				$('pwddiv2').innerHTML = '<font color=green>密码输入正确！</font>';
				cpwd2 == 'yes';
			}
		}
		else
		{
			$('pwddiv2').innerHTML = '<font color=red>密码不能有空</font>';
			cpwd2 == '';
		}
		//chkreg();
	}
	
	
	//验证email
	$('email').onkeyup = function()
	{
		emailreg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
		$('email').value.match(emailreg);
		
		if($('email').value.match(emailreg) == null)
		{
			$('emaildiv').innerHTML = '<font color=red>邮箱格式不正确！</font>';
			cemail == '';
		}
		else
		{
			$('emaildiv').innerHTML = '<font color=green>输入正确!</font>';
			cemail == 'yes';
		}
		
		//chkreg();
	}
	
	//注册按钮
	$('regbtn').onclick = function()
	{
	
		//$('pwddiv').innerHTML = '<font color=green>按钮成功！</font>';
		
		url = 'register_chk.php?name='+$('regname').value+'&pwd='+$('regpwd1').value+'&email='+$('email').value;
		alert(url);
		
		//ajax方式验证
		// $('pwddiv').innerHTML = '<font color=green>开始Ajax！</font>';
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.open('GET',url,true);
		xmlhttp.onreadystatechange = function()
		{
			if(xmlhttp.readyState == 4)
			{
				if(xmlhttp.status == 200)
				{
				//$('pwddiv').innerHTML = '<font color=green>返回消息成功！</font>';
					msg == xmlhttp.responseText;
						if(msg == '1')
							alert('注册成功！');
				
				}
			}
		
		}
		xmlhttp.send(null);
	}
	
}


	



