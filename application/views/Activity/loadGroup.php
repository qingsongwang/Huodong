<? include('header2.php')?>
<? include('nav_group.php')?>


<div id="liu" class="liu">
<? foreach($group_list as $row):?>
	<div class="item" style="height:550px;">
		<h3><?=$row->name?></h3>
		<p><img src="<?=base_url('static/resources/grouplogo/').'/'.$row->logo?>" style="width: 300px; height: 400px;"/>
		<p>介绍：<?=$row->introduce?> 
		<p>注册人数：<?=$row->memberCount?> 
		<p><button class="btn" onclick=viewGroup("<?=$row->gid?>")>查看社团</button>
	</div>
<? endforeach;?>
<input id="last_id" type="hidden" />
</div>

<div id="loading" class="loading-wrap">
	<span class="loading">加载中，请稍后...</span>
</div>

<div class="footer"><center>来追我啊o(︶︿︶)o</center></div>


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
				"getGroupMore",
				{"last_id":$last_id},  //传最后一个poster id
				function(data){
					var html = "";
					if($.isArray(data)){
						for(i in data){
							var l = getRootWeb()+'/static/resources/grouplogo/'+data[i]['logo'];

							html += "<div class=\"item\" style=\"height:550px;\">";
							html += "<h3>"+data[i]['name']+"</h3>";
							html += "<p><img src="+l+" style=\"width: 300px; height: 400px;\"/>"
							html += "<p>介绍："+data[i]['introduce']+"<p>注册人数："+data[i]['memberCount'];
							html += "<p><button class=\"btn\" onclick=viewGroup("+data[i]['gid']+")>查看社团</button></div>"
							
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
				},
				"json"
			);
		}
	});
});


function getRootWeb(){
    	var strFullPath=window.document.location.href; 
    	var strPath=window.document.location.pathname; 
    	var pos=strFullPath.indexOf(strPath); 
    	var prePath=strFullPath.substring(0,pos); 
    	var postPath=strPath.substring(0,strPath.substr(1).indexOf('/')+1); 
    	return(prePath+postPath); 
    }

 function viewGroup(id)
 {
 	var url = getRootWeb()+'/index.php/activity/viewGroup/'+id;
	// window.location.href= url; //直接跳转
	 window.open(url,'','height=768,width=1024,scrollbars=yes,status =yes')
 }
</script>

</div> <!-- container-->
</body>