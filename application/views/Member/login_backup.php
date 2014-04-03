<!--前端使用了foundation框架-->
<!DOCTYPE html>
<html>

<head>
  	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>欢迎登陆合肥学院大学生活动平台</title>

  <!-- If you are using CSS version, only link these 2 files, you may add app.css to use for your overrides if you like. -->
  <link rel="stylesheet" href="<?=base_url()?>static/css/normalize.css">
  <link rel="stylesheet" href="<?=base_url()?>static/css/foundation.css">

  <!-- If you are using the gem version, you need this only -->
  <link rel="stylesheet" href="<?=base_url()?>static/css/app.css">

  <script src="js/vendor/modernizr.js"></script>
  
  <script>
	//跳转
	function reg_goto()
	{
		window.location = "<?=base_url()?>index.php/member/register";
	}
  </script>
  
  <style>
	#container
	{
		text-align:center;
		margin:90px;
	}
	
	#regbox
	{
		
	width: 100%;
	position: absolute;
	top:150px;
	left:0;
	height: 300px;
	overflow: hidden;

	}

  </style>

</head>
<body>
  <!-- body content here -->

  <div id="container">
	<div id="header">
		<h1>爱活动</h1><h3>合肥学院大学生活动平台</h3>
	</div>

	<!--注册页-->
	<div id="regbox">
		<form action="<?=base_url()?>index.php/member/do_login" method="post" data-abide>
			
		<div class="row">
			<label>邮箱<small>必须</small>
				<input type="email" name="loginemail" required  placeholder="您的邮箱">
			</label>
			<small class="error">邮箱格式不正确</small>
		</div>
		<div class="row">
			<label>密码<small>必须</small>
				<input type="password" name="loginpwd" required>
			</label>
			<small class="error">密码不能为空</small>
		</div>
			<input type="submit"   name="submit" id="submit" class="button" value="登陆">
			<input type="reset" name="cancel" id="resetbtn" class="button" value="取消">
			<input type="button" class="button" value="注册" onclick="reg_goto()">
		</form>
	   
	</div>

	<div id="footer"></div>
  </div>

  <script src="<?=base_url()?>static/js/vendor/jquery.js"></script>
  <script src="<?=base_url()?>static/js/foundation.min.js"></script>
  <script src="<?=base_url()?>static/js/foundation.abide.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>
</html>