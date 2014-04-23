

    <?php include 'side_bar.php'?>;


	<!-- main container -->
    <div class="content">
        
  
        <div class="container">
            <div id="pad-wrapper">
                <div class="table-wrapper products-table section">
                    <div class="row-fluid head">
                        <div class="span12">
                            <h4>活动列表</h4>
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
                            <a class="btn-flat success new-product" href="<?=site_url('manage/activityAdd')?>">+ 发布新活动</a>
                        </div>
                    </div>
					
                    <div class="row-fluid">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="span1">
                                        <input type="checkbox" />
                                        编号：
                                    </th>
                                    <th class="span2">
                                        <span class="line"></span>活动名称
                                    </th>
                                    <th class="span1">
                                        <span class="line"></span>发起组织
                                    </th>
                                    <th class="span1">
                                        <span class="line"></span>开始时间
                                    </th>
                                    <th class="span1">
                                        <span class="line"></span>结束时间
                                    </th>
                                    <th class="span1">
                                        <span class="line"></span>地点
                                    </th>
                                    <th class="span1">
                                        <span class="line"></span>状态
                                    </th>
                                     <th class="span2">
                                        <span class="line"></span>操作
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
						   <?if(!empty($activity_list)):?>
							<? foreach ($activity_list as $row):?> 
                                <tr class="first">
                                    <td>
                                        <input type="checkbox" />
                                        <div class="img">
                                          <?=$row->id?>
                                        </div>
                                    </td>
                                    <td>
                                        <?=$row->name?>
                                    </td>
                                    <td>
                                       <?=$row->organizer?>
                                    </td>
                                    <td>
									  <?=$row->startTime?>
                                    </td>
                                    <td>
                                        <?=$row->endTime?>
                                    </td>
                                    <td>
                                        <?=$row->place?>
                                    </td>
                                    <td>
                                        <?php 
                                            if($row->isEnd == 0)
                                                echo '<span class="label label-success">正在进行中</span>';
                                            else
                                                echo '<span class="label">已经结束</span>';
                                        ?>
                                    </td>
                                    <td>
                                     
                                        <button class="btn" >编辑</button>
                                        <button class="btn" >删除</button>
                                         <button><?=anchor('manage/activityCheck/'.$row->id,'报名审核')?></button>
                                       
                                    </td>
                                </tr>
                                <!-- row -->
								
                              
                             <? endforeach;?>  
                            <?endif;?>
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