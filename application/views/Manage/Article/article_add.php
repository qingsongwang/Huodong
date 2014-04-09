 <!-- navbar -->
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
          

        
        </div>
    </div>
    <!-- end navbar -->

    <!-- sidebar -->
    <div id="sidebar-nav">
        <ul id="dashboard-menu">
            
            <li >
                <a>
                    <i class="icon-edit"></i>
                    <span>文章管理</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul>
                    <li><a href="articleAdd">写文章</a></li>
                    <li><a href="categoryList">目录分类</a></li>
                </ul>
            </li>         
          
        </ul>
    </div>
    <!-- end sidebar -->


	<!-- main container -->
    <div class="content">
        
  
        <div class="container-fluid">
            <div id="pad-wrapper">
                
                <!-- products table-->
                <!-- the script for the toggle all checkboxes from header is located in js/theme.js -->
                <div id="title">标题：<input class="input-xxlarge" type="text" ></div>
				
				<div id="category">分类：<select class="span2">
					<option/>测试
				</select></div>
				
				<div id="content">
				<p>文章内容：
				 <textarea class="summernote"></textarea>
				</div>
			
				
                <!-- end products table -->

              
            </div>
        </div>
    </div>
	<link rel="stylesheet" href="<?=base_url()?>static/summernote/summernote.css">
	<script type="text/javascript" src="<?=base_url()?>static/summernote/summernote.js"></script>
	

	<script>
		 $(function() {
      $('.summernote').summernote({
        height: 200
      });
    });
	</script>