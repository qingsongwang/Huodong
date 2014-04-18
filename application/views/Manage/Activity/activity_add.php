
 <link href="<?=base_url()?>static/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
   
    <?php include 'side_bar.php'?>;

	<!-- main container -->
<div class="content">
  <div class="container-fluid">
    <div id="pad-wrapper">
      <div id="writor">
				<div id=msg></div>
               
        <div>活动名称：<input class="input-xlarge" type="text" id="aname" name="aname"></div>
				
        <div>发起人或社团组织：<input  type="text" id="organizer" name="organizer"></div>
				
				<div>联系方式：<input  type="text" id="contact" name="contact"></div>
				
        <div>开始时间：
          <input size="16" type="text" id="startTime" value="2014-4-17 20:50" readonly class="form_datetime">
        </div>

        <div>结束时间：
          <input size="16" type="text" id="endTime" value="2014-4-17 20:51" readonly class="form_datetime">
        </div>

        <div>活动地点：<input  type="text" id="place" name="place"></div>
        
        <textarea  id="introduce"  name="introduce"  rows="10" style="width: 500px;"></textarea>                
        

        <input id="url" type="hidden"/>

				<div>活动海报： 
			   	<input id="poster" type="file" size="45" name="poster" class="input">
				  <button id="view">查看</button>
          <button class="button" id="buttonUpload" onclick="return ajaxFileUpload();">上传</button>
        </div>

        <div>
          <button class="btn btn-primary" onclick="submitAdd()" id="submitBtn">确认添加</button>
          <button class="btn btn-primary">重置</button>
        </div>
      </div>
		</div> 
  </div>       
  </div>


<!--poster modal-->
<div id="viewPoster" class="modal hide fade">
   <div class="modal-body">
   <div class="delete-modal-body" id="delete-modal-body">
    
    <img id="viewImg" />
  
  </div>
  </div>
</div>


	<script type="text/javascript" src="<?=base_url()?>static/js/activity.js"></script>
	<script type="text/javascript" src="<?=base_url()?>static/js/ajaxfileupload.js"></script>
  <script type="text/javascript" src="<?=base_url()?>static/js/bootstrap-datetimepicker.min.js"></script>
   <script type="text/javascript" src="<?=base_url()?>static/js/bootstrap-datetimepicker.zh-CN.js"></script>
<script>

$("#view").click(function(){
    $('#viewPoster').modal({show:true});
});

function ajaxFileUpload()
{
      $.ajaxFileUpload({
                            url:'do_poster_upload', //你处理上传文件的服务端
                            secureuri:false,
                            fileElementId:'poster',
                            dataType: 'json',
                            success: function (data)
                                  {
                                    alert(data.file_infor);
                                    $('#viewImg').attr('src',getRootWeb()+'/static/resources/poster/'+data.url);
                                    $('#url').attr('value',data.url);

                                  }
                               }
                         )

                       return false;
                 } 

   function getRootWeb(){
    	var strFullPath=window.document.location.href; 
    	var strPath=window.document.location.pathname; 
    	var pos=strFullPath.indexOf(strPath); 
    	var prePath=strFullPath.substring(0,pos); 
    	var postPath=strPath.substring(0,strPath.substr(1).indexOf('/')+1); 
    	return(prePath+postPath); 
    }

   $(".form_datetime").datetimepicker({
    language:  'zh-CN',
    format: 'yyyy-mm-dd hh:ii'});

</script>