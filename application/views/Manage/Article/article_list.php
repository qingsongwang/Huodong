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
                <a class="dropdown-toggle" href="#">
                    <i class="icon-edit"></i>
                    <span>文章管理</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li  class="active"><a href="form-showcase.html">写文章</a></li>
                    <li><a href="form-wizard.html">目录分类</a></li>
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
                <div class="table-wrapper products-table section">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4>文章列表</h4>
                        </div>
                    </div>

                    <div class="row-fluid filter-block">
                        <div class="pull-right">
                            <div class="ui-select">
                                <select>
                                  <option />Filter users
                                  <option />Signed last 30 days
                                  <option />Active users
                                </select>
                            </div>
                            <input type="text" class="search" />
                            <a class="btn-flat success new-product">+ 发布新文章</a>
                        </div>
                    </div>

                    <div class="row-fluid">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="span4">
                                        <input type="checkbox" />
                                        标题
                                    </th>
                                    <th class="span1">
                                        <span class="line"></span>作者
                                    </th>
                                    <th class="span3">
                                        <span class="line"></span>分类
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- row -->
                                <tr class="first">
                                    <td>
                                        <input type="checkbox" />
                                       
                                        <a href="#" class="name">关于开展2014年合肥学院大学生科技活动周的通知 </a>
                                    </td>
                                    <td class="author">
                                       汪青松
                                    </td>
                                    <td>
										<a>公告</a>
                                        <ul class="actions">
                                            <li><a href="#">Edit</a></li>
                                            <li class="last"><a href="#">Delete</a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- row -->
                              
                              
                               
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end products table -->

              
            </div>
        </div>
    </div>
	
    <script src="<?=base_url()?>static/admin/js/theme.js"></script>