<? include('header2.php')?>
<? include('nav_hd.php')?>


<div id="liu" class="liu">
<? foreach($activity_list as $row):?>
	<div class="item" style="height:550px;">
		<h3><?=$row->name?></h3>
		<p><img src="<?=base_url('static/resources/poster/').'/'.$row->poster?>" style="width: 300px; height: 400px;"/>
		<p>时间：<?=$row->startTime?> - <?=$row->endTime?>
		<p>地点：<?=$row->place?> 
		<?	$id = $row->id;echo ($row->isEnd == 1)?'<p><button class=\"btn btn-warning\">活动已经结束</button>': '<p><button class="btn" onclick="viewPoster('.$id.')">报名围观</button>';
		?>
	</div>
<? endforeach;?>
<input id="last_id" type="hidden" />
</div>

<div id="loading" class="loading-wrap">
	<span id="load" class="loading">加载中，请稍后...</span>
</div>

<div class="footer"><center>来追我啊o(︶︿︶)o</center></div>

<!--viewPoster--> 
<div id="viewPoster" class="modal hide fade">
 <div class="modal-body">
	<div id="container" style="margin:0px auto;width:500px;">
		<div><img  id="mPoster" src=""/></div>
		<div id="mTime"></div>
		<div id="mPlace"></div>
		<div id="mApply"></div>
		<input type="hidden" id="mId"/><!--标记id-->
		<button class="btn" onclick=applyActivity()>确认报名</button>
	</div>
 </div>
</div>


<script type="text/javascript" src="<?=base_url('static/js/jquery.masonry.min.js')?>"></script>


<script type="text/javascript">	
$(function(){
   
   	var $last_id = $("#last_id").val();

    //执行瀑布流
    var $container = $('#liu');
	  $container.masonry({
	    itemSelector : '.item',
	    isAnimated: true
	  });

	var loading = $("#loading").data("on", false);  
	$(window).scroll(function(){
		if(loading.data("on")) return;
		if($(document).scrollTop() > 
			$(document).height()-$(window).height()-$('.footer').height()){
			//加载更多数据
			loading.data("on", true).fadeIn();
			$.get(
				"getPosterMore",
				{"last_id":$last_id},  //传最后一个poster id
				function(data){
				
				if("error" == data)
				{
					alert('到头了亲');
				}
				else
				{	var html = "";
					
					if($.isArray(data)){
			
						for(i in data){
							var l = getRootWeb()+'/static/resources/poster/'+data[i]['poster'];
							var isEnd = data[i]['isEnd'];
							html += "<div class=\"item\" style=\"height:550px;\">";
							html += "<h3>"+data[i]['name']+"</h3>";
							html += "<p><img src="+l+" style=\"width: 300px; height: 400px;\"/>";
							html += "<p>时间："+data[i]['startTime']+"-"+data[i]['endTime']+"<p>地点："+data[i]['place'];
							;
							
							(isEnd == 1) ? html += "<p><button class=\"btn btn-warning\">活动已经结束</button></div>" : html += "<p><button class=\"btn\" onclick=viewPoster("+data[i]['id']+")>报名围观</button></div>";

						}
						$last_id = Number($last_id) + 3;
						$("#last_id").attr('value',$last_id);

						var $newElems = $(html).css({ opacity: 0 }).appendTo($container);
						$newElems.imagesLoaded(function(){
							$newElems.animate({ opacity: 1 });
							$container.masonry( 'appended', $newElems, true ); 
				        });
				        loading.data("on", false);
					}
					loading.fadeOut();
				
				}
				},
				"json"
			);
		}
	});
});

	//获取文章根目录
	function getRootWeb(){
    	var strFullPath=window.document.location.href; 
    	var strPath=window.document.location.pathname; 
    	var pos=strFullPath.indexOf(strPath); 
    	var prePath=strFullPath.substring(0,pos); 
    	var postPath=strPath.substring(0,strPath.substr(1).indexOf('/')+1); 
    	return(prePath+postPath); 
    }

    function applyActivity()
    {
    	var id = $('#mId').val();
    	$.post(
    		'do_applyActivity',
    		{"id":id},
    		function(data)
    		{
    			$('#container').html(data);

    		},
    		'html'
    		);
    }

    //modal窗口展示海报
    function viewPoster(id)
    {
    	
    	$('#mId').attr('value',id);	
    	$.getJSON('getActivityJsonById/'+id,function(data){
    	if(data)
		{
			var startTime = data[0]['startTime'];
			var endTime = data[0]['endTime'];
			var place = data[0]['place'];
			var poster = getRootWeb()+'/static/resources/poster/'+data[0]['poster'];
			var count = data[0]['count'];
			$('#mTime').html("时间："+startTime+"-"+endTime);
			$('#mPlace').html("地点："+place);
			$('#mApply').html("报名人数："+count);
			$('#mPoster').attr("src",poster);
			
		}
		else
			alert('加载数据失败了亲o(︶︿︶)o 唉');

    	});
    	
    	$('#viewPoster').modal({show:true});
    }
  
</script>

</div> <!-- container-->
</body>