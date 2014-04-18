<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <title>爱活动登录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<link class="bootstrap library" rel="stylesheet" type="text/css" href="<?=base_url()?>static/css/bootstrap.min.css">
	<script class="bootstrap library" src="<?=base_url()?>static/js/jquery.js" type="text/javascript"></script>
	<script class="bootstrap library" src="<?=base_url()?>static/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?=base_url()?>static/js/jquery.validate.js"></script>
	<style>
		*{margin:0;padding: 0;}
		body{font-family:"宋体";}
		.loginBox{width:420px;height:230px;padding:0 20px;border:1px solid #fff; color:#000; margin-top:40px; border-radius:8px;background: white;box-shadow:0 0 15px #222; background: -moz-linear-gradient(top, #fff, #efefef 8%);background: -webkit-gradient(linear, 0 0, 0 100%, from(#f6f6f6), to(#f4f4f4));font:11px/1.5em 'Microsoft YaHei' ;position: absolute;left:50%;top:50%;margin-left:-210px;margin-top:-115px;}
		.loginBox h2{height:45px;font-size:18px;font-weight:normal;}
		.loginBox .left{border-right:1px solid #ccc;height:100%;padding-right: 20px; }
		.regBtn{margin-top:21px;}
	</style>
  
  </head>
  <body>
    <div class="container">

        <section class="loginBox row-fluid">
          <section class="span7 left">
            <h2>会员登录</h2>
			<form id="user-form">
			
						<input type="text"  name="loginemail" id="loginemail" placeholder="您注册时的邮箱">
						<div id="msg"></div>
						<input type="password"  name="loginpwd" id="loginpwd" placeholder="密码">
		
		
			<section class="row-fluid">
				<section class="span1"><input type="button" value=" 登录 " class="btn btn-primary" onclick="login()"></section>
            </section>
			
          </section>
          <section class="span5 right">
            <h2>没有帐户？</h2>
            <section>
              <p>爱活动（iHuodong）是合肥学院在线的大学生活动发布平台</p>
							
              <p><input type="button" value=" 注册 " class="btn regBtn" onclick="reg()"></p>
            </section>
          </section>
		  </form>
        </section><!-- /loginBox -->
    </div> <!-- /container -->
	<script>
		function reg()
		{
			window.location="<?=base_url()?>index.php/member/reg"
		}

		function login()
		{
			var email = $("#loginemail").val();//取框中的用户名 
			var password = $("#loginpwd").val();//取框中的密码 
				$.ajax({
					url:'<?=base_url()?>index.php/member/do_login', //登录
					type:'post',         //数据发送方式
					dataType:'text',     //接受数据格式
					
					data:  'loginemail='+email+'&loginpwd='+password, 
					success:function(data){  //回传函数(这里是函数名)
						if(data == 1)
						{
							$("#msg").html('<p style="color:red">帐号或密码错误</p>');
						}
						else
							  window.location.href="<?=site_url('activity/hd')?>";
							
							//$("#email_msg").html('<img src="<?=base_url()?>static/img/error.png" />非常遗憾这个帐号已经被人注册了！');
					},
				});
		}
	
	</script>
	
  </body>
</html>
