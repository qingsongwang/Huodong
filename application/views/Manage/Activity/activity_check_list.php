

    <?php include 'side_bar.php'?>;


	<!-- main container -->
    <div class="content">
        
  
        <div class="container">
            <div id="pad-wrapper">
                <div class="table-wrapper products-table section">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4><?=$activity_name?>活动报名审核</h4>
                        </div>
                    </div>

                    <div class="row-fluid filter-block">
                        <div class="pull-right">
                            <div class="ui-select">
                                <select>
                                  <option />正在进行
                                  <option />已经结束
                                
                                </select>
                            </div>
                            <input type="text" class="search" />
                           
                        </div>
                    </div>
					
                    <div class="row-fluid">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="span1">
                                        <input type="checkbox" />
                                    </th>
                                  
                                    <th class="span1">
                                        <span class="line"></span>用户姓名
                                    </th>
                                    <th class="span1">
                                        <span class="line"></span>系部
                                    </th>
                                    <th class="span1">
                                        <span class="line"></span>班级
                                    </th>
                                    <th class="span1">
                                        <span class="line"></span>报名时间
                                    </th>
                                   
                                     <th class="span2">
                                        <span class="line"></span>操作
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
						   <?if(!empty($check_list)):?>
							<? foreach ($check_list as $row):?> 
                                <tr class="first">
                                    <td>
                                        <input type="checkbox" />
                                    </td>
                                  
                                    <td>
                                       <?=$row->tb_users_name?>
                                    </td>
                                    <td>
									  <?=$row->tb_users_department?>
                                    </td>
                                    <td>
                                        <?=$row->tb_users_class?>
                                    </td>
                                    <td>
                                       
                                    </td>
                                  
                                    <td>
                                     
                      <button class="btn" onclick=check(<?=$row->id?>)>审核通过</button>
    </div>
                                        
                                    </td>
                                </tr>
                                <!-- row -->
								
                              
                             <? endforeach;?>  
                            <?endif;?>
                            </tbody>
							
                        </table>
                    </div>
					
                </div>
                <!-- end products table -->

              
            </div>
        </div>
		
    </div>
	
    <script src="<?=base_url()?>static/admin/js/theme.js"></script>

    <script type="text/javascript">
    
    function check($id)
    {
       $.post(
            'do_check_ActivitApply',
            {"id":id},
            function(data)
            {
                $('#container').html(data);

            },
            'html'
            );
    }    

    </script>