

    <!-- sidebar -->
    <div id="sidebar-nav">
        <ul id="dashboard-menu">
            
            <li >
                <a>
                    <i class="icon-edit"></i>
                    <span>文章管理</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="<?=base_url()?>index.php/manage/articleAdd">写文章</a></li>
                    <li><a href="<?=base_url()?>index.php/manage/categoryList">目录分类</a></li>
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
                            <a class="btn-flat success new-product" href="articleAdd">+ 发布新文章</a>
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
								
								<? foreach ($article_list as $row):?>
                                <!-- row -->
                                <tr class="first">
                                    <td>
                                        <input type="checkbox" />
                                        <div class="img">
                                            <?= $row->article_id?>
                                        </div>
                                       
                                        <a href="#" class="name"><?=anchor('manage/article/'.$row->article_id,$row->title)?></a>
                                    </td>
                                    <td class="author">
                                       <?php $no="未知"; print !empty($row->author)?$row->author:$no;?>
                                    </td>
                                    <td>
										<a><?=$row->name?></a>
                                        <ul class="actions">
                                            <li><a href="#">Edit</a></li>
                                            <li class="last"><a href="#">Delete</a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- row -->
								<? endforeach;?>
                              
                               
                            </tbody>
							
                        </table>
                    </div>
					<div id="page">
						<ul class="pager">
							<li><a href="<?=$pre?>">上一页</a></li>
							<li><a href="<?=$next?>">下一页</a></li>
						</ul>
					</div>
                </div>
                <!-- end products table -->

              
            </div>
        </div>
		
    </div>
	
    <script src="<?=base_url()?>static/admin/js/theme.js"></script>