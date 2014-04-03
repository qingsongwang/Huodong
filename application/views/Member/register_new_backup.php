<!DOCTYPE html>
<html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>爱活动注册</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<link class="bootstrap library" rel="stylesheet" type="text/css" href="<?=base_url()?>static/css/bootstrap.min.css">
	<script class="bootstrap library" src="<?=base_url()?>static/js/jquery.js" type="text/javascript"></script>
	<script class="bootstrap library" src="<?=base_url()?>static/js/bootstrap.min.js" type="text/javascript"></script>
	<link class="bootstrap library" rel="stylesheet" type="text/css" href="<?=base_url()?>static/css/bootstrap-responsive.min.css">
	<!-- Validate plugin -->
	<script src="<?=base_url()?>static/js/jquery.validate.js"></script>
	<!--Defined Validate Method-->
	<script src="<?=base_url()?>static/js/additional-methods.js"></script>
	
	<style>
		
		label.valid {
		  width: 24px;
		  height: 24px;
		  background: url(<?=base_url()?>static/img/valid.png) center center no-repeat;
		  display: inline-block;
		  text-indent: -9999px;
		}
		label.error {
			font-weight: bold;
			color: red;
			padding: 2px 8px;
			margin-top: 2px;
		}
		.page-header
		{
			text-align:center;
		}
		.row
		{
			 width:770px;
			 margin:0 auto;
		}
		
		
	</style>
	
  </head>
  <body>
		<div class="container">
		    <div class="page-header">
			    <h1>欢迎注册i活动大学生活动平台</h1>
		    </div>
				<div class="row">
				<div id="maincontent" class="span8">

				<div class="tabbable">
					<div class="tab-content">
				    <div id="demo" class="tab-pane active">
				    	<div class="alert alert-success">
				    		<h4>温馨提示</h4>
				    		<ul>
				    			<li>为了与您更方便的交流互动，请您如实填写注册信息.</li>
						    </ul>
				    	</div><!-- notes .alert -->
						<form action="<?base_url()?>member/submit_ok" method="post" id="contact-form" class="form-horizontal">
						  <fieldset>
						  
						    <div class="control-group">
						      <label class="control-label" for="email">注册邮箱</label>
						      <div class="controls">
						        <input type="text" class="input-xlarge" name="email" id="email" onblur="check_email()">
								<div id="email_msg"></div>
							  </div>
						    </div>
							<div class="control-group">
						      <label class="control-label" for="regpwd1">注册密码</label>
						      <div class="controls">
						        <input type="password" class="input-xlarge" name="regpwd1" id="regpwd1">
						      </div>
						    </div>
							<div class="control-group">
						      <label class="control-label" for="regpwd2">再次填写</label>
						      <div class="controls">
						        <input type="password" class="input-xlarge" name="regpwd2" id="regpwd2">
						      </div>
						    </div>
							 <div class="control-group">
						      <label class="control-label" for="regstuId">学号</label>
						      <div class="controls">
						        <input type="text" class="input-xlarge" name="regstuId" id="regstuId">
						      </div>
						    </div>
							 <div class="control-group">
						      <label class="control-label" for="regname">姓名</label>
						      <div class="controls">
						        <input type="text" class="input-xlarge" name="regname" id="regname">
						      </div>
						    </div>
							 <div class="control-group">
						      <label class="control-label" for="regtel">手机</label>
						      <div class="controls">
						        <input type="text" class="input-xlarge" name="regtel" id="regtel">
						      </div>
						    </div>
						    
	              <div class="form-actions">
			            <button type="submit" class="btn btn-primary btn-large">确认注册</button>
	    			      <button type="reset" class="btn">清空表单</button>
	        			</div>
						  </fieldset>
						</form>
					</div><!-- .tab-pane -->
				</div><!-- .tab-content -->
				</div><!-- .tabbable -->

				</div><!-- .span -->
			</div><!-- .row -->

      <hr>

    </div> <!-- .container -->

<!-- ==============================================
		 JavaScript below! 															-->

<!-- jQuery via Google + local fallback, see h5bp.com -->



	 


<!-- Scripts for check email -->
		<script src="<?=base_url()?>static/js/reg_validation.js"></script>

		<script>
		 function check_email()
		 {
				$.ajax({
					url:'<?=base_url()?>index.php/member/check_email', //验证Email是否已经被注册了
					type:'post',         //数据发送方式
					dataType:'text',     //接受数据格式
					data:"email="+$("#email").val(),
					success:function(data){  //回传函数(这里是函数名)
						if(data == 1)
						{
							$('#contact-form').validate(
							{
								highlight: function(element) 
								{
									$(element).closest('.control-group').removeClass('success').addClass('error');
								},
							});
						}
							
							
							//$("#email_msg").html('<img src="<?=base_url()?>static/img/error.png" />非常遗憾这个帐号已经被人注册了！');
					},
				});
		}
		
		$(document).ready(function(){

	// Validate
	// http://bassistance.de/jquery-plugins/jquery-plugin-validation/
	// http://docs.jquery.com/Plugins/Validation/
	// http://docs.jquery.com/Plugins/Validation/validate#toptions

		$('#contact-form').validate({
	    rules: {
		 
	      regname: {
	        minlength: 2,
			isName: true,
	        required: true
	      },
	      email: {
  		    
			required: true,
	        email: true
	      },
	      regpwd1: {
	      	minlength: 6,
	        required: true
	      },
		  regpwd2:
		  {
			minlength: 6,
	        required: true,
			equalTo: "#regpwd1",
		  },
		  
		  regtel:
		  {
			required: true,
			isTel:true,
		  },
		  
		  regstuId:
		  {
			required: true,
			isStuid: true
		  }
			},
		
			highlight: function(element) {
				$(element).closest('.control-group').removeClass('success').addClass('error');
			},
			success: function(element) {
				element
				.text('OK!').addClass('valid')
				.closest('.control-group').removeClass('error').addClass('success');
			},
			
			
		});

	}); // end document.ready
		
		</script>

  </body>
</html>
