<? include('header2.php')?>
<? include('nav_public.php')?>


<div class="row">
	
	<div class="span12">		
	<div class="row">
		<div class="span4">
			<ul class="thumbnails">
			<li class="span4">
				<a href="#" class="thumbnail">
				<img class="img-circle" src="<?=base_url('static/resources/grouplogo/').'/'.$logo?>" style="width: 300px; height: 300px;"/>
				</a>
			</li>
			</ul>
			
		</div>
		
		<div class="span8">
			<h1><?=$groupName?></h1>
			<h4><i class="icon-search"></i>负责人：<?=$chairman?></h4>
			<h5><i class="icon-envelope"></i>QQ群：<?=$qqgroup?></h5>
			<h5><i class="icon-user"></i>电话：<?=$tel?></h5>
			<h5><i class="icon-tags"></i>简介：<?=$intro?></h5>
		</div>
		
	</div>
	
	<div class="row">
		<div class="span12">
		<h3>近期开展的活动</h3>
			<table class="table table-condensed">
				 <th>活动编号</th>
    			  <th>活动名称</th>
    			  <th>发布时间</th>
    			  <th>地点</th>
    			  <th>状态</th>

			<? foreach($activity_array as $row):?>
				<tr class="success">
  				 				  
				
  				  <td><?=$row['id']?></td>
    			  <td><?=$row['name']?></td>
    			  <td><?=$row['createTime']?></td>
    			  <td><?=$row['place']?></td>
    			  <td>
    			  	 <?php 
                        if($row['isEnd'] == 0)
                            echo '<span class="label label-success">正在进行中</span>';
                        else
                           echo '<span class="label">已经结束</span>';
                     ?>
    			  </td>
    			
 				 </tr>
 			<? endforeach;?>
			</table>
		</div>
	</div>

	</div>
</div>


<script type="text/javascript">	


function getRootWeb(){
    	var strFullPath=window.document.location.href; 
    	var strPath=window.document.location.pathname; 
    	var pos=strFullPath.indexOf(strPath); 
    	var prePath=strFullPath.substring(0,pos); 
    	var postPath=strPath.substring(0,strPath.substr(1).indexOf('/')+1); 
    	return(prePath+postPath); 
    }
</script>

</div> <!-- container-->
</body>