<!--前端使用了foundation框架-->

<html class="no-js"  lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>用户中心</title>

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
		margin:90px;
	}
	
	#userinfo
	{
		
	width: 100%;
	position: absolute;
	top:20px;
	left:0;
	height: 500px;
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
	<div id="userinfo">
	   <form action="../../index.php/member/submit_ok" method="post" data-abide>
			<div class="row">
				<div class="small-9">
					<div class="row">
						<div class="small-6 columns"><label for="right-label" class="right"><h3>Email：</h3></label></div>
						<div class="small-6 columns"><input type="email" required name="email" id="email" value="<?php echo $email?>"></div>
					</div>
				</div>
				<small class="error">An email address is required.</small>

			</div>

			<div class="row">
				<div class="small-9">
					<div class="row">
						<div class="small-6 columns"><label for="right-label" class="right"><h3>姓名：</h3></label></div>
						<div class="small-6 columns"><input type="text" name="name" id="name" value="<?php echo $name?>"></div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="small-9">
					<div class="row">
						<div class="small-6 columns"><label for="right-label" class="right"><h3>学号：</h3></label></div>
						<div class="small-6 columns"><input type="text" name="stuId" id="stuId" value="<?php echo $stuId?>"></div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="small-9">
					<div class="row">
						<div class="small-6 columns"><label for="right-label" class="right"><h3>手机：</h3></label></div>
						<div class="small-6 columns"><input type="text" name="telphone" id="telphone" value="<?php echo $telphone?>"></div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="small-9">
					<div class="row">
						<div class="small-6 columns"><label for="right-label" class="right"><h3>性别：</h3></label></div>
						<div class="small-6 columns">
						<input type="radio" name="telphone" id="telphone" ><label for="pokemonRed">男</label>
						<input type="radio" name="telphone" id="telphone" ><label for="pokemonBlue">女</label>
						</div>
					</div>
				</div>
			</div>
			
		
			
			<div class="row">
				
					<input type="submit"   name="submit" id="submit" class="button">
					<input type="reset" name="cancel" id="resetbtn" class="button">
				
			</div>


	   </form>
	   
	   <a href="../../index.php/member/logout">退出</a>
	</div>




	<div id="footer"></div>
  </div>




  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>
</html>