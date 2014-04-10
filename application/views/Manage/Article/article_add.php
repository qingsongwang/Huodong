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
                <div id="title">标题：<input class="input-xxlarge" type="text" id="title" name="title"></div>
				
                <div id="author">作者：：<input  type="text" id="author" name="authour"></div>
                
				<div id="category" name="category">分类：
                <select class="span2">
					<option>1</option>
                    <option>2</option>
				</select>
                </div>
			
			  <div id="content" name="content" style="margin:10px 0 auto" >
				<p>文章内容：
			    <textarea class="summernote"></textarea>                
			  </div>
              
              <div id="button">
              	<button class="btn btn-primary">更新</button>
                <button class="btn btn-primary">重置</button>
              </div>

              
            </div>
        </div>
    </div>
	
	<link rel="stylesheet" href="<?=base_url()?>static/summernote/summernote.css">
	<script type="text/javascript" src="<?=base_url()?>static/summernote/summernote.js"></script>
	
	<script>
		 $(function() {
      $('.summernote').summernote({
        height: 200,
		width:800,
		
		toolbar: [
   
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['font', ['strike']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']],
  
  ]
      });
    });
	</script>