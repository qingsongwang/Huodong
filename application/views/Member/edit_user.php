<!DOCTYPE html>
<html>
<head>
    <title></title>
<link href="<?=base_url()?>/static/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="<?=base_url()?>/static/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
</head>

<body>
<div class="container">
    <form action="" class="form-horizontal">
        <fieldset>
            <legend>Test</legend>
           
			<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<div class="navbar">
				<div class="navbar-inner">
					<div class="container-fluid">
						 <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a> <a href="#" class="brand">网站名</a>
						<div class="nav-collapse collapse navbar-responsive-collapse">
							<ul class="nav">
								<li class="active">
									<a href="#">主页</a>
								</li>
								<li>
									<a href="#">链接</a>
								</li>
								<li>
									<a href="#">链接</a>
								</li>
								<li class="dropdown">
									 <a data-toggle="dropdown" class="dropdown-toggle" href="#">下拉菜单<strong class="caret"></strong></a>
									<ul class="dropdown-menu">
										<li>
											<a href="#">下拉导航1</a>
										</li>
										<li>
											<a href="#">下拉导航2</a>
										</li>
										<li>
											<a href="#">其他</a>
										</li>
										<li class="divider">
										</li>
										<li class="nav-header">
											标签
										</li>
										<li>
											<a href="#">链接1</a>
										</li>
										<li>
											<a href="#">链接2</a>
										</li>
									</ul>
								</li>
							</ul>
							<ul class="nav pull-right">
								<li>
									<a href="#">右边链接</a>
								</li>
								<li class="divider-vertical">
								</li>
								<li class="dropdown">
									 <a data-toggle="dropdown" class="dropdown-toggle" href="#">下拉菜单<strong class="caret"></strong></a>
									<ul class="dropdown-menu">
										<li>
											<a href="#">下拉导航1</a>
										</li>
										<li>
											<a href="#">下拉导航2</a>
										</li>
										<li>
											<a href="#">其他</a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="#">链接3</a>
										</li>
									</ul>
								</li>
							</ul>
						</div>
						
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span4">
		</div>
		<div class="span4">
		</div>
		<div class="span4">
			<img alt="140x140" src="img/a.jpg" class="img-circle" />
		</div>
	</div>
	<div class="row-fluid">
		<div class="span12">
			<form class="form-horizontal">
				<div class="control-group">
					<label class="control-label" for="inputEmail">邮箱</label>
					<div class="controls">
						<input id="inputEmail" type="text" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputPassword">密码</label>
					<div class="controls">
						<div>
							<input id="inputPassword" type="password" />
						</div>
						
						<div>
							<input id="inputPassword" type="password" />
						</div>
						
						<div>
							<input id="inputPassword" type="password" />
						</div>
						
						<div>
							<input id="inputPassword" type="password" />
						</div>
						
						<div>
							<input id="inputPassword" type="password" />
						</div>
						
						<div>
							<input id="inputPassword" type="password" />
						</div>
						
						<div>
							<input id="inputPassword" type="password" />
						</div>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<label class="checkbox"><input type="checkbox" /> Remember me</label> <button class="btn" type="submit">登陆</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
			
        </fieldset>
    </form>
</div>

<script type="text/javascript" src="<?=base_url()?>/static/js/jquery.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?=base_url()?>/static/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>/static/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?=base_url()?>/static/js/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
<script type="text/javascript">
    
	$('.form_date').datetimepicker({
        language:  'zh-CN',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	
</script>

</body>
</html>
