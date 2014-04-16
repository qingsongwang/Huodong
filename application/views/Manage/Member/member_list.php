

    <?php include 'side_bar.php'?>;


	<!-- main container -->
    <div class="content">
        
  
        <div class="container-fluid">
            <div id="pad-wrapper">
                <div class="table-wrapper products-table section">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4>注册会员列表</h4>
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
                            <a class="btn-flat success new-product" href="#">+ 添加新会员</a>
                        </div>
                    </div>
					
                    <div class="row-fluid">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="span1">
                                        <input type="checkbox" />
                                        会员编号：
                                    </th>
                                    <th class="span1">
                                        <span class="line"></span>姓名
                                    </th>
                                    <th class="span1">
                                        <span class="line"></span>学号
                                    </th>
                                    <th class="span1">
                                        <span class="line"></span>联系方式
                                    </th>
                                    <th class="span1">
                                        <span class="line"></span>系部
                                    </th>
                                    <th class="span1">
                                        <span class="line"></span>用户组
                                    </th>
                                     <th class="span2">
                                        <span class="line"></span>操作
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
								
							<? foreach ($member_list as $row):?> 
                                <tr class="first">
                                    <td>
                                        <input type="checkbox" />
                                        <div class="img">
                                          <?=$row->tb_users_id?>
                                        </div>
                                    </td>
                                    <td>
                                        <?=$row->tb_users_name?>
                                    </td>
                                    <td>
                                       <?=$row->tb_users_stuId?>
                                    </td>
                                    <td>
									  <?=$row->tb_users_telphone?>
                                    </td>
                                    <td>
                                        <?=$row->tb_users_department?>
                                    </td>
                                    <td>
                                        <?=$row->role_name?>
                                    </td>
                                    <td>
                                     
                                           编辑
                                            删除
                                            加入的社团
                                       
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