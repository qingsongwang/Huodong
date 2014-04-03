<!DOCTYPE html>
<html>
<head>
	<title>我的个人信息</title>
    
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
     <!-- bootstrap -->
    <link href="<?=base_url()?>static/admin/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="<?=base_url()?>static/admin/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="<?=base_url()?>static/admin/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- libraries -->
    <link href="<?=base_url()?>static/admin/css/lib/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>static/admin/css/lib/font-awesome.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>static/admin/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>static/admin/css/elements.css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>static/admin/css/icons.css" />

    <!-- this page specific styles -->
    <link rel="stylesheet" href="<?=base_url()?>static/admin/css/compiled/personal-info.css" type="text/css" media="screen" />    

    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />

    <!-- lato font -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

    <!-- navbar -->
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <a class="brand" href="index"><h2 style="color:white">爱活动</h2></a>
			
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
			
			 <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="active"><a href="<?=base_url()?>index.php/manage">后台管理主页</a></li>
                </ul>
            </div>
			
           
            <ul class="nav pull-right">
                <li class="hidden-phone">
                    <input class="search" type="text" />
                </li>
                <li class="settings">
                    <a href="personal-info.html" role="button">
                        <span class="navbar_icon"></span>
                    </a>
                </li>
                <li id="fat-menu" class="dropdown">
                    <a href="<?=base_url()?>index.php/member/logout" role="button" class="logout" alt="退出">
                        <span class="icon-share-alt"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- end navbar -->

	<!-- main container .wide-content is used for this layout without sidebar :)  -->
    <div class="content wide-content">
        <div class="container-fluid">
            <div class="settings-wrapper" id="pad-wrapper">
                <!-- avatar column -->
                <div class="span3 avatar-box">
                    <div class="personal-image">
                        
						<?php echo $avatarhtml; ?>
                        
						<p>更换你的头像</p>
                        
						<a class="btn btn-large btn-primary" href="<?=base_url()?>index.php/member/upload_avatar" target="_blank">修改头像</a>
                    </div>
                </div>

                <!-- edit form column -->
               
				<div class="span7 personal-info">
                    <div class="alert alert-info">
                        <i class="icon-lightbulb"></i>
						这是你的资料页，你可以完善的个人信息，让更多的人来了解你！</br>
                    </div>
					
					<div class="alert alert-success" id="success" style="display:none">
                        <i class="icon-ok-sign"></i>修改信息成功
                    </div>
					
                    <h5 class="personal-title">个人信息</h5>
					
					<!--form-->
                    <form action="<?=base_url()?>index.php/member/save_user" method="post">
                        <div class="field-box">
                            <label>姓名:</label>
                            <input class="span5 inline-input" type="text" name="name" id="name" value="<?php echo $name?>" />
                        </div>
                        <div class="field-box">
                            <label>学号:</label>
                            <input class="span5 inline-input" type="text" name="stuId" id="stuId" value="<?php echo $stuId?>" />
                        </div>
                        <div class="field-box">
                            <label>性别:</label>
                            <div class="ui-select">
                                <select id="sex_group" name="sex_group">
                                    <option value="M" <?php if($sex=='M'):?>selected<?endif;?>>男</option>
									<option value="F" <?php if($sex=='F'):?>selected<?endif;?>>女</option>                      
                                </select>
                            </div>
                        </div>
                        <div class="field-box">
                            <label>Email:</label>
                            <input class="span5 inline-input" type="text" value="<?php echo $email?>" />
                        </div>
                        <div class="field-box">
                            <label>系部:</label>
                            <div class="ui-select">
                                <select id="department" name="department">
                                    <option value="">请选择你的系别</option>
									<option value="电子信息与电气工程系">电子信息与电气工程系</option>
									<option value="化学与材料工程系">化学与材料工程系</option>
    								<option value="计算机科学与技术系" selected>计算机科学与技术系</option>
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
                                </select>
                            </div>
                        </div>
                        <div class="field-box">
                            <label>年龄:</label>
                            <input class="span5 inline-input" type="text" name="age" id="age" value="<?php echo $age?>" />
                        </div>
						<div class="field-box">
                            <label>身份证:</label>
                            <input class="span5 inline-input" type="text" name="idcard" id="idcard" value="<?php echo $idcard?>" />
                        </div>
						 <div class="field-box">
                            <label>政治面貌:</label>
                            <div class="ui-select">
                                <select id="politic_group" name="politic_group">
                                    <option value="群众" <?php if($politicStatus=='群众'):?>selected<?endif;?>>群众</option>
									<option value="共青团员" <?php if($politicStatus=='共青团员'):?>selected<?endif;?>>共青团员</option>
									<option value="中共预备党员" <?php if($politicStatus=='中共预备党员'):?>selected<?endif;?>>中共预备党员</option>
									<option value="中共党员" <?php if($politicStatus=='中共党员'):?>selected<?endif;?>>中共党员</option>                            
                                </select>
                            </div>
                        </div>
						<div class="field-box">
                            <label>地址:</label>
                            <input class="span5 inline-input" type="text" name="address" id="address" value="<?php echo $address?>" />
                        </div>
                       	<div class="field-box">
                            <label>特长:</label>
                            <input class="span5 inline-input" type="text" name="skills" id="skills" value="<?php echo $skills?>" />
                        </div>
							<div class="field-box">
                            <label>签名:</label>
                            <input class="span5 inline-input" type="text" name="signature" id="signature" value="<?php echo $signature?>" />
                        </div>
                        <div class="span6 field-box actions">
                            <input type="submit" class="btn-glow primary" value="保存" id="submit" name="submit"/>
                            <span>OR</span>
                            <input type="reset" value="重置" class="reset" />
                        </div>
                    </form>
                </div>
				
            </div>
        </div>
    </div>
    <!-- end main container -->


	<!-- scripts -->
    <script src="<?=base_url()?>static/js/jquery.js"></script>
    <script src="<?=base_url()?>static/admin/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>static/admin/js/theme.js"></script>

</body>
</html>