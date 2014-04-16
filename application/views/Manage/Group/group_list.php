

    <?php include 'side_bar.php'?>;


	<!-- main container -->
    <div class="content">
        
  
        <div class="container-fluid">
            <div id="pad-wrapper">
                <div class="table-wrapper products-table section">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4>社团学生组织</h4>
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
                            <a class="btn-flat success new-product" href="<?=site_url('manage/groupAdd')?>">+ 添加新社团</a>
                        </div>
                    </div>
					
                    <div class="row-fluid">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="span4">
                                        <input type="checkbox" />
                                        社团名称：
                                    </th>
                                    <th class="span2">
                                        <span class="line"></span>负责人
                                    </th>
                                    <th class="span2">
                                        <span class="line"></span>QQ群
                                    </th>
                                    <th class="span2">
                                        <span class="line"></span>联系方式
                                    </th>
                                    <th class="span2">
                                        <span class="line"></span>操作
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
								
							<? foreach ($group_list as $row):?> 
                                <tr class="first">
                                    <td>
                                        <input type="checkbox" />
                                        <div class="img">
                                          <?=$row->gid?>
                                        </div>
                                       
                                       <?=$row->name?>
                                    </td>
                                    <td class="author">
                                       <?=$row->chairman?>
                                    </td>
                                    <td>
									  <?=$row->qqGroup?>
                                    </td>
                                    <td>
                                        <?=$row->contact?>
                                    </td>
                                    <td>
                                     
                                           编辑
                                            删除
                                            查看会员
                                       
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