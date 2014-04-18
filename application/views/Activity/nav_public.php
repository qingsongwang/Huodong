<body>
<div class="container">
	<div class="row">
		<div class="span12">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#">首页</a>
				</li>
				<li>
					<a href="<?=site_url('activity/hd')?>">活动</a>
				</li>
				<li class="disabled">
					<a href="<?=site_url('activity/group')?>">社团</a>
				</li>

				
				<?php

					if(empty($name))
					{
						$html = "<li class=\"disabled pull-right\"><a href=\"".
						site_url('member/reg').
						"\">注册</a></li><li class=\"disabled pull-right\"><a href=\"".site_url('member/login')."\">登录</a></li>";
						echo $html;
					}
					else
					{

						$html = "<li class=\"dropdown pull-right\"><a href=\"".site_url('memeber/login')."\" data-toggle=\"dropdown\"  class=\"dropdown-toggle\"> 欢迎你，$name<strong class=\"caret\"></strong></a><ul class=\"dropdown-menu\">
							<li>
							<a href=\"".site_url('member/edit_user')."\">查看个人信息</a>
							</li>
						
							<li class=\"divider\">
							</li>
							<li>
								<a href=\"".site_url('member/logout')."\">登出</a>
							</li>
						</ul>
						</li>";
						echo $html;
						
						
					}

				?>

			
				
			</ul>
		</div>
	</div>

	<script type="text/javascript">
		$(document).function()
		{


		}
	</script>