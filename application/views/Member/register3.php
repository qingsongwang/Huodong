<!--前端使用了foundation框架-->

<html class="no-js"  lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>欢迎注册合肥学院大学生活动平台</title>

  <!-- If you are using CSS version, only link these 2 files, you may add app.css to use for your overrides if you like. -->
  <link rel="stylesheet" href="../../static/css/normalize.css">
  <link rel="stylesheet" href="../../static/css/foundation.css">

  <!-- If you are using the gem version, you need this only -->
  <link rel="stylesheet" href="../../static/css/app.css">

  <script src="js/vendor/modernizr.js"></script>
  
  <style>
	#container
	{
		text-align:center;
		margin:20px;
	}
	
	#regbox
	{
		
	width: 100%;
	position: absolute;
	
	left:0;
	height: 700px;
	overflow: hidden;

	}

  </style>

</head>
<body>
  <!-- body content here -->

  <div id="container">
	<div id="header">

	</div>

	<!--注册页-->
	<div id="regbox">
	   <form action="../../index.php/member/submit_ok" method="post" data-abide>
			<div class="row">
				<label>邮箱<small>必须</small>
					<input type="email" id="email" name="email" required  placeholder="您的邮箱">
				</label>
				<small class="error">邮箱格式不正确</small>
			</div>

			<div class="row">
				<label>密码<small>必须</small>
					<input type="password" id="regpwd1" name="regpwd1" required pattern="pwd"  placeholder="注意保管">
				</label>
				<small class="error">密码太弱</small>
			</div>
			
			<div class="row">
				<label>密码<small>必须</small>
					<input type="password" id="regpwd2" name="regpwd2"  required  data-equalto="regpwd1" placeholder="注意保管">
				</label>
				<small class="error">密码不一致</small>
			</div>
			
			<div class="row">
				<label>学号<small></small>
					<input type="text" id="regstuId" name="regstuId" required pattern="stuid"  placeholder="您的学号">
				</label>
				<small class="error">学号不正确</small>
			</div>
			
			<div class="row">
				<label>姓名<small>必须</small>
					<input type="text" id="regname" name="regname" required  pattern="name" placeholder="您的姓名">
				</label>
				<small class="error">请填写正确的姓名</small>
			</div>
			
			<div class="row">
				<label>手机<small>必须</small>
					<input type="text" id="regtel" name="regtel" required pattern="tel" placeholder="手机">
				</label>
				<small class="error">请填写正确的手机号</small>
			</div>

		
			
			<div class="row">
				
					<input type="submit"   name="submit" id="submit" class="button" value="注册">
					<input type="reset" name="cancel" id="resetbtn" class="button" value="重置">
				
			</div>


	   </form>
	   
	</div>




	<div id="footer"></div>
  </div>




 <script src="../../static/js/vendor/jquery.js"></script>
  <script src="../../static/js/foundation.min.js"></script>
  <script src="../../static/js/foundation.abide.js"></script>
  <script>
    $(document).foundation({
    abide : {
      patterns: {
		pwd:/^[\@A-Za-z0-9\!\#\$\%\^\&\*\.\~]{6,22}$/,
		name: /[\u4E00-\u9FA5]{2,4}/,
		stuid: /^\d{10}$/,
		tel: /^(13[0-9]|15[0|3|6|7|8|9]|18[8|9])\d{8}$/,
        ip_address: /^((25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])\.){3}(25[0-5]|2[0-4][0-9]|1[0-9][0-9]|[1-9][0-9]|[0-9])$/
      }
    }
  });
  </script>
</body>
</html>